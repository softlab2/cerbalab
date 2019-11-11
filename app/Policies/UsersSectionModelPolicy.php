<?php

namespace App\Policies;
use App\User;

class UsersSectionModelPolicy extends BaseSectionModelPolicy
{
    protected $model = \App\User::class;
    /**
     * @param User $user
     * @param Roles $section
     * @param Role $item
     *
     * @return bool
     */
    public function display(User $user, $section, $item)
    {
        return true;
    }

    public function create(User $user, $section, $item)
    {
        return false;
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
        return true;
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
}
