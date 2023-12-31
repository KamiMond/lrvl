<?php

namespace App\Services\Interfaces;

use App\Models\User;
use Laravel\Socialite\Contracts\User as SocialUser;

interface SocialInterface
{
    public function findOrCreateUser(SocialUser $socialUser): User;
}
