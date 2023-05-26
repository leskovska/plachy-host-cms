<?php

namespace Tests\Feature;

use App\Http\Livewire\Concert\Edit;
use App\Models\User;
use App\Models\Concert;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

/**
 * @group concerts
 */
class ConcertTest extends TestCase
{
    use DatabaseTransactions;
    use WithFaker;

    protected User $user;
    private array $routeNamesWithoutParameters = [
        'admin-concerts',
        'admin-concert-new',
    ];

    public function setUp(): void
    {
        parent::setUp();
        $this->user = $this->createUser();
    }

    public function test_concert_pages_should_be_rendered(): void
    {
        foreach ($this->routeNamesWithoutParameters as $routeName) {
            $this->actingAs($this->user)
                ->get(route($routeName))
                ->assertOk();
        }
    }

    public function test_concert_pages_should_not_be_rendered(): void
    {
        foreach ($this->routeNamesWithoutParameters as $routeName) {
            $this->get(route($routeName))
                ->assertStatus(500);
        }
    }

    public function test_should_create_new_concert(): void
    {
        $concertData = [
            'title' => $this->faker->words(5, true),
            'date' => date('Y-m-d', strtotime($this->faker->date())),
        ];

        $this->actingAs($this->user)
            ->get(route('admin-concert-new'))
            ->assertOk();

        Livewire::test(Edit::class)
            ->set($concertData)
            ->call('submit')
            ->assertHasNoFormErrors()
            ->assertRedirect('/admin/concert')
        ;

        $this->assertDatabaseHas('concerts', $concertData);
    }

    public function test_should_not_create_new_concert(): void
    {
        $concertData = [
            'title' => $this->faker->words(5, true),
        ];

        Livewire::test(Edit::class)
            ->set($concertData)
            ->call('submit')
            ->assertHasErrors()
            ->assertNoRedirect()
        ;

        $this->assertDatabaseMissing('concerts', $concertData);
    }

    public function test_should_edit_concert(): void
    {
        $oldConcertData = [
            'title' => $this->faker->words(5, true),
            'date' => Carbon::parse($this->faker->date())->toDateString(),
        ];
        $newConcertData = [
            'title' => $this->faker->words(5, true),
            'date' => Carbon::parse($this->faker->date())->toDateString(),
        ];

        Livewire::test(Edit::class)
            ->set($oldConcertData)
            ->call('submit')
        ;

        Livewire::test(Edit::class,
                Concert::whereTitle($oldConcertData['title'])->get()->toArray())
            ->set($newConcertData)
            ->call('submit')
            ->assertHasNoFormErrors()
            ->assertRedirect('/admin/concert')
        ;

        $this->assertDatabaseHas('concerts', $newConcertData);
    }
}
