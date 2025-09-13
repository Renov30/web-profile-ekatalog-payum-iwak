<?php

namespace App\Policies;

use App\Models\KategoriProduk;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class KategoriProdukPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        if ($user->can('view kategori produk'))
            return true;
        else
            return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, KategoriProduk $kategoriproduk): bool
    {
        if ($user->can('view kategori produk'))
            return true;
        else
            return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        if ($user->can('view kategori produk'))
            return true;
        else
            return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, KategoriProduk $kategoriproduk): bool
    {
        if ($user->can('view kategori produk'))
            return true;
        else
            return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, KategoriProduk $kategoriproduk): bool
    {
        if ($user->can('view kategori produk'))
            return true;
        else
            return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, KategoriProduk $kategoriproduk): bool
    {
        if ($user->can('view kategori produk'))
            return true;
        else
            return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, KategoriProduk $kategoriproduk): bool
    {
        if ($user->can('view kategori produk'))
            return true;
        else
            return false;
    }
}
