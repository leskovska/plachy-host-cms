<?php

namespace Tests\Feature;

use App\Http\Livewire\Introduction\Index;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

/**
 * @group introduction
 */
class IntroductionTest extends TestCase
{
    use DatabaseTransactions;
    use WithFaker;

    protected User $user;
    private array $routeNamesWithoutParameters = [
        'admin-introduction',
    ];

    public function setUp(): void
    {
        parent::setUp();
        $this->user = $this->createUser();
    }

    public function test_introduction_pages_should_be_rendered(): void
    {
        foreach ($this->routeNamesWithoutParameters as $routeName) {
            $this->actingAs($this->user)
                ->get(route($routeName))
                ->assertOk();
        }
    }

    public function test_introduction_pages_should_not_be_rendered(): void
    {
        foreach ($this->routeNamesWithoutParameters as $routeName) {
            $this->get(route($routeName))
                ->assertRedirect('login');
        }
    }

    public function test_should_create_new_introduction(): void
    {
        $introductionData = [
            'text' => $this->faker->randomHtml(),
        ];

        $this->actingAs($this->user);
        Livewire::test(Index::class)
            ->set($introductionData)
            ->call('submit')
            ->assertHasNoFormErrors()
            ->assertRedirect('/admin/introduction')
        ;

        $this->assertDatabaseHas('introductions', $introductionData);
    }

    public function test_should_not_create_new_introduction(): void
    {
        $introductionData = [
            'text' => "",
        ];

        Livewire::test(Index::class)
            ->set($introductionData)
            ->call('submit')
            ->assertHasErrors()
            ->assertNoRedirect()
        ;

        $this->assertDatabaseMissing('introductions', $introductionData);
    }
}
