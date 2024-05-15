<?php

namespace App\Policies;

use App\Models\Book;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class BookPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        // return $user->hasRole(['Admin','Visitor','User']);
        // if($user->hasRole(['Admin','Visitor','User'])||$user->hasPermissionTo('Create Books')){
        if($user->hasRole(['Admin','Visitor','User']))
        {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Book $book): bool
    {
        return $user->hasRole(['Admin','Visitor','User']);
        // if($user->hasPermissionTo('View Books')){
        //     return true;
        // }
        // return false;

    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasRole('Admin');
        // if($user->hasPermissionTo('Create Books')){
        //     return true;
        // }
        // return false;

    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Book $book): bool
    {
        return $user->hasRole('Admin');

    //     if($user->hasPermissionTo('Update Books')){
    //         return true;
    //     }
    //     return false;
     }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Book $book): bool
    {
        return $user->hasRole('Admin');

        // if($user->hasPermissionTo('Delete Books')){
        //     return true;
        // }
        // return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Book $book): bool
    {
        return $user->hasRole('Admin');

    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Book $book): bool
    {
        //
    }
}
