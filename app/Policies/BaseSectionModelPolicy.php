<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
//use Modules;

class BaseSectionModelPolicy
{
    use HandlesAuthorization;

    protected $model;

    /**
     * @param User $user
     * @param Roles $section
     * @param Role $item
     *
     * @return bool
     */
    public function display(User $user, $section, $item)
    {
        return $user->isAdmin();// || Modules::checkAccess($this->getModel(), 'display');
    }

    public function create(User $user, $section, $item)
    {
        return $user->isAdmin();// || Modules::checkAccess($this->getModel(), 'create');
    }

    /**
     * @param User $user
     * @param Roles $section
     * @param Role $item
     *
     * @return bool
     */
    public function edit(User $user, $section, $item)
    {
        return $user->isAdmin();// || Modules::checkAccess($this->getModel(), 'edit');
    }

    /**
     * @param User $user
     * @param Roles $section
     * @param Role $item
     *
     * @return bool
     */
    public function delete(User $user, $section, $item)
    {
        return $user->isAdmin();// || Modules::checkAccess($this->getModel(), 'delete');
    }

    private function getModel(){
        return $this->model;
    }
}
