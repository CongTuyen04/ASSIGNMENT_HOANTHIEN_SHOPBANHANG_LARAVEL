<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\User\UserServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Utilities\Constant;

class AccountController extends Controller
{
    private $userService;
    
    public function __construct(UserServiceInterface $userService)
    {  
        $this->userService = $userService;
    }

    public function login()
    {
        return view('front.account.login');
    }

    public function checkLogin(Request $request)
    {
        $credentials = 
        [
            'email'=> request('email'),
            'password'=> request('password'),
            'level' => Constant::user_level_client, // khách hàng bình thường
        ];

        $remember = $request->remember;

        if (Auth::attempt($credentials, $remember)) { 
            // return redirect('');   
            return redirect()->intended(''); // MẶc định trang chủ
        }else{
            return back()
                  ->with('notification', 'ERROR: Email or Password is wrong');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return back(); 
    }

    public function register()
    {
        return view('front.account.register');
    }

    public function postRegister(Request $request)
    {
        if ($request->password != $request->password_confirmation) {
            return back()
                ->with('notification', 'ERROR: Confirm password does not match');
        }
        $data = 
        [
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> $request->password,
            'level'=> Constant::user_level_client,
        ];

        $this->userService->create($data);
        return redirect('account/login')->with('notification', 'Register Success ! Please Login.');
    }
}
