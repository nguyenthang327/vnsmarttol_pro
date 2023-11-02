<?php

namespace App\Policies;

use App\Models\Discount;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DiscountPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {

    }

    public function view(User $user, Discount $discount): bool
    {
    }

    public function create(User $user): bool
    {
    }

    public function update(User $user, Discount $discount): bool
    {
    }

    public function delete(User $user, Discount $discount): bool
    {
    }

    public function restore(User $user, Discount $discount): bool
    {
    }

    public function forceDelete(User $user, Discount $discount): bool
    {
    }
}
