<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Member;
use PHPUnit\Framework\Attributes\Test;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class MemberTest extends TestCase
{
    // use RefreshDatabase;

    // protected $member;

    // protected function setUp(): void
    // {
    //     parent::setUp();

    //     // Create a member before each test
    //     $this->member = Member::factory()->create([
    //         'name' => 'John Doe',
    //         'jabatan' => 'Developer',
    //         'image' => 'member_images/profile_image_test.jpg',
    //     ]);
    // }

    // #[Test]
    // public function it_can_create_a_member()
    // {
    //     $this->assertDatabaseHas('members', [
    //         'id' => $this->member->id,
    //         'name' => 'John Doe',
    //         'jabatan' => 'Developer',
    //     ]);
    // }

    // #[Test]
    // public function it_can_update_a_member()
    // {
    //     Storage::fake('public');

    //     $image = UploadedFile::fake()->image('avatar.jpg', 1000, 1000)->size(250); // 250 KB

    //     $data = [
    //         'name' => 'Jane Doe',
    //         'jabatan' => 'Senior Developer',
    //         'image' => $image,
    //     ];

    //     $response = $this->put("/dashboard/members/{$this->member->id}", $data);

    //     // Debug: Print response content
    //     echo $response->getContent();

    //     $response->assertRedirect('/dashboard/members');
        
    //     $this->assertDatabaseHas('members', [
    //         'id' => $this->member->id,
    //         'name' => 'Jane Doe',
    //         'jabatan' => 'Senior Developer',
    //     ]);

    //     // Debug: List all files in the storage
    //     $files = Storage::disk('public')->allFiles('member_images');
    //     var_dump($files);

    //     // Assert the file was stored
    //     $this->assertTrue(Storage::disk('public')->exists('member_images/' . $image->hashName()));
    // }

    // #[Test]
    // public function it_can_delete_a_member()
    // {
    //     $response = $this->delete("/dashboard/members/{$this->member->id}");

    //     $response->assertRedirect('/dashboard/members');
    //     $this->assertDatabaseMissing('members', ['id' => $this->member->id]);
    // }
}
