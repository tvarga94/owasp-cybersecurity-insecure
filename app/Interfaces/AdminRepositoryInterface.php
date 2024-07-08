<?php

declare(strict_types=1);

namespace App\Interfaces;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface AdminRepositoryInterface
{
    public function getAllUsers(): Collection;
    public function findUserById(int $id): ?User;
    public function updateUser(User $user, array $attributes): bool;
    public function deleteUser(User $user): bool;
}
