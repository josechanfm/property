<?php

namespace App\Policies;

use App\Models\Form;
use App\Models\AdminUser;
use App\Models\Community;
use Illuminate\Auth\Access\HandlesAuthorization;

class FormPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(AdminUser $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(AdminUser $user, Form $form)
    {
        if($user->hasRole('admin')){
            return true;
        }
        return $form->community->hasUser($user);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(AdminUser $user)
    {
        if($user->hasRole(['admin','community'])){
            return true;
        }

    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(AdminUser $user, Form $form)
    {
        if($user->hasRole('admin')){
            return true;
        }
        return $form->community->hasUser($user);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(AdminUser $user, Form $form)
    {
        if($user->hasRole('admin')){
            return true;
        }
        return $form->community->hasUser($user);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(AdminUser $user, Form $form)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(AdminUser $user, Form $form)
    {
        //
    }
}
