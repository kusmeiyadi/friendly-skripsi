<?php

namespace App\Policies;

use App\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any posts.
     *
     * @param  \App\Model\Admin\Admin  $user
     * @return mixed
     */
    public function viewAny(Admin $user)
    {
        //
    }

    /**
     * Determine whether the user can view the post.
     *
     * @param  \App\Model\Admin\Admin  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function view(Admin $user)
    {
        //
    }

    /**
     * Determine whether the user can create posts.
     *
     * @param  \App\Model\Admin\Admin  $user
     * @return mixed
     */
    public function create(Admin $user)
    {
        return $this->getPermission($user,5);
    }

    /**
     * Determine whether the user can update the post.
     *
     * @param  \App\Model\Admin\Admin  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function update(Admin $user)
    {
      return $this->getPermission($user,6);
    }

    /**
     * Determine whether the user can delete the post.
     *
     * @param  \App\Model\Admin\Admin  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function delete(Admin $user)
    {
      return $this->getPermission($user,7);
    }

    public function tag(Admin $user)
    {
      return $this->getPermission($user,12);
    }

    public function category(Admin $user)
    {
      return $this->getPermission($user,13);
    }

    public function getPermission($user, $p_id)
    {
      foreach ($user->roles as $role) {
        foreach ($role->permissions as $permission) {
          if ($permission->id == $p_id) {
            return true;
          }
        }
      }
      return false;
    }

    /**
     * Determine whether the user can restore the post.
     *
     * @param  \App\Model\Admin\Admin  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function restore(Admin $user)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the post.
     *
     * @param  \App\Model\Admin\Admin  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function forceDelete(Admin $user)
    {
        //
    }
}
