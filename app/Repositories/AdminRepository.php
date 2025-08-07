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

        return $users;
    }

    public function findUserById(int $id): ?User
    {
        $user = User::find($id);

        return $user;
    }

    public function updateUser(User $user, array $attributes): bool
    {
        $updated = $user->update($attributes);

        return $updated;
    }

    public function deleteUser(User $user): bool
    {
        $deleted = $user->delete();

        return $deleted;
    }
}
