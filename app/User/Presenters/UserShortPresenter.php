<?php

namespace App\User\Presenters;

use App\Models\User;
use App\User\ResourceModels\UserShortResourceModel;

class UserShortPresenter
{
    public function present(?User $user): ?UserShortResourceModel
    {
        if (! $user) {
            return null;
        }

        $userShort = new UserShortResourceModel();

        $userShort->id = $user->id;
        $userShort->email = $user->email;

        return $userShort;
    }
}
