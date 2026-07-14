<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class Account extends Facade
{
    /**
     * @method static \App\Model\User create(array $data)
     * @method static string signIn(string $email, string $password)
     *
     * @see \App\Service\Account\AccountService)
     */
    protected static function getFacadeAccessor(): string
    {
        //
        return 'account_service';
    }
}
