<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Pet;

class PetPolicy
{
    /**
     * Xem danh sách thú cưng
     */
    public function viewAny(User $user): bool
    {
        // tất cả role đều xem được
        return true;
    }

    /**
     * Xem 1 thú cưng cụ thể
     */
    public function view(User $user, Pet $pet): bool
    {
        return true; // ai cũng xem được
    }

    /**
     * Tạo mới thú cưng
     */
    public function create(User $user): bool
    {
        return in_array($user->role, [
            'admin',
            'staff',
            'partner',
            'owner',
        ]);
    }

    /**
     * Cập nhật thú cưng
     */
    public function update(User $user, Pet $pet): bool
    {
        if ($user->role === 'admin') {
            return true;
        }

        if (in_array($user->role, ['staff', 'partner'])) {
            // staff, partner có thể sửa mọi thú cưng
            return true;
        }

        if ($user->role === 'owner') {
            // chỉ sửa thú cưng của chính mình
            return $pet->user_id === $user->id;
        }

        return false;
    }

    /**
     * Xóa thú cưng
     */
    public function delete(User $user, Pet $pet): bool
    {
        if ($user->role === 'admin') {
            return true;
        }

        if (in_array($user->role, ['staff', 'partner'])) {
            return true;
        }

        if ($user->role === 'owner') {
            return $pet->user_id === $user->id;
        }

        return false;
    }

    /**
     * Khôi phục thú cưng (nếu soft delete)
     */
    public function restore(User $user, Pet $pet): bool
    {
        return $user->role === 'admin';
    }

    /**
     * Xóa vĩnh viễn
     */
    public function forceDelete(User $user, Pet $pet): bool
    {
        return $user->role === 'admin';
    }
}
