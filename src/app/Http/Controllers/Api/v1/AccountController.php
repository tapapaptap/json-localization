<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Account\CreateAccountRequest;
use App\Service\Account\AccountService;
use App\Facades\Account;
use App\Http\Requests\Account\SignInRequest;
use App\Http\Resources\Account\UserResource;


class AccountController extends Controller
{
    //
    public function create(CreateAccountRequest $request)
    {
        $request->createAccount();
        return responseOk();
    }

    public function signIn(SignInRequest $request)
    {
        return [
            'token' => $request->signIn(),
        ];
    }

    public function show()
    {
        $user = auth()->user();
        return new UserResource($user);
    }
}
