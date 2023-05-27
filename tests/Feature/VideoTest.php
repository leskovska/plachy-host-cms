<?php

namespace Tests\Feature;

use App\Http\Livewire\Video\Edit;
use App\Models\User;
use App\Models\Video;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

/**
 * @group videos
 */
class VideoTest extends TestCase
{
    use DatabaseTransactions;
    use WithFaker;

    protected User $user;
    private array $routeNamesWithoutParameters = [
        'admin-videos',
        'admin-video-new',
    ];

    public function setUp(): void
    {
        parent::setUp();
        $this->user = $this->createUser();
    }

    public function test_video_pages_should_be_rendered(): void
    {
        foreach ($this->routeNamesWithoutParameters as $routeName) {
            $this->actingAs($this->user)
                ->get(route($routeName))
                ->assertOk();
        }
    }

    public function test_video_pages_should_not_be_rendered(): void
    {
        foreach ($this->routeNamesWithoutParameters as $routeName) {
            $this->get(route($routeName))
                ->assertRedirect('login');
        }
    }

    public function test_should_create_new_video(): void
    {
        $videoData = [
            'title' => $this->faker->words(5, true),
            'slug' => $this->faker->slug(),
        ];

        $this->actingAs($this->user)
            ->get(route('admin-video-new'))
            ->assertOk();

        Livewire::test(Edit::class)
            ->set($videoData)
            ->call('submit')
            ->assertHasNoFormErrors()
            ->assertRedirect('/admin/video')
        ;

        $this->assertDatabaseHas('videos', $videoData);
    }

    public function test_should_not_create_new_video(): void
    {
        $videoData = [
            'title' => $this->faker->words(5, true),
        ];

        Livewire::test(Edit::class)
            ->set($videoData)
            ->call('submit')
            ->assertHasErrors()
            ->assertNoRedirect()
        ;

        $this->assertDatabaseMissing('videos', $videoData);
    }

    public function test_should_edit_video(): void
    {
        $videoData = [
            'title' => $this->faker->words(5, true),
            'slug' => $this->faker->slug,
        ];

        Livewire::test(Edit::class)
            ->set([
                'title' => 'Old Video Name',
                'slug' => 'video-edit-test',
            ])
            ->call('submit')
        ;

        Livewire::test(Edit::class,
                Video::whereSlug('video-edit-test')->get()->toArray())
            ->set($videoData)
            ->call('submit')
            ->assertHasNoFormErrors()
            ->assertRedirect('/admin/video')
        ;

        $this->assertDatabaseHas('videos', $videoData);
    }
}
