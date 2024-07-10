<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Interfaces\AdminRepositoryInterface;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;

class AdminRepository implements AdminRepositoryInterface
{
    public function getAllUsers(): Collection
    {
        $users = User::where('is_admin', false)->get();
        Log::info('Fetched all users', ['user_count' => $users->count(), 'timestamp' => now()]);
        return $users;
    }

    public function findUserById(int $id): ?User
    {
        $user = User::find($id);
        Log::info('Fetched user by ID', ['user_id' => $id, 'timestamp' => now()]);
        return $user;
    }

    public function updateUser(User $user, array $attributes): bool
    {
        $updated = $user->update($attributes);
        Log::info('Updated user', ['user_id' => $user->id, 'updated' => $updated, 'timestamp' => now()]);
        return $updated;
    }

    public function deleteUser(User $user): bool
    {
        $deleted = $user->delete();
        Log::info('Deleted user', ['user_id' => $user->id, 'deleted' => $deleted, 'timestamp' => now()]);
        return $deleted;
    }
}
