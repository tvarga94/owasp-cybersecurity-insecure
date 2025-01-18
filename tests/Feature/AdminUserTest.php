<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class AdminUserTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Test updating a user's information without refreshing the database.
     *
     * @return void
     */
    public function test_admin_can_update_user()
    {
        $admin = User::factory()->create(['is_admin' => 1]);
        $this->actingAs($admin);

        $user = User::factory()->create(['is_admin' => 0]);

        $updatedData = [
            'name' => fake()->name,
            'email' => fake()->unique()->safeEmail,
        ];

        $response = $this->put(route('admin.users.update', $user), $updatedData);

        $response->assertRedirect();
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => $updatedData['name'],
            'email' => $updatedData['email'],
        ]);
    }

    /**
     * Test deleting a user without refreshing the database.
     *
     * @return void
     */
    public function test_admin_can_delete_user()
    {
        $admin = User::factory()->create(['is_admin' => 1]);
        $this->actingAs($admin);

        $user = User::factory()->create(['is_admin' => 0]);

        $response = $this->delete(route('admin.users.destroy', $user));

        $response->assertRedirect();
        $response->assertSessionHas('success');

        $this->assertDatabaseMissing('users', ['id' => $user->id]);
    }
}
