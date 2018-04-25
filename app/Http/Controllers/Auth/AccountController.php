<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Account Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for managing the user account
    |
    */
    
    /**
     * Upgrades the user account by adding a telephone number and changing
     * the account type to 1
     *
     * @param  array  $request
     * @return back()
     */
    function upgrade(Request $request) {
        $this->validate(request(), [
            'telephone_num' => 'required|filled|numeric|digits_between:6,25'
        ]);
        
        $user = User::find(auth()->user()->id);
        
        $user->account_type = 1;
        $user->telephone_num = request()->telephone_num;
        $user->save();
        
        return back();
    }
}
