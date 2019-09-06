<?php

namespace App\Http\Controllers\Auth\Seller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    //
    use AuthenticatesUsers;
    public function __construct()
    {
        $this->middleware('guest:seller')->except('logout');
    }

    /**
     * phương thức trả về view dùng để đăng nhập seller
     */
    public function login(){
        return view('seller.auth.login');

    }
    public function loginSeller(Request $request){
        $this->validate($request, array(
            'email' => 'required|email',
            'password' => 'required|min:6'
        ));
        /**
         * đăng nhập
         */
        if (Auth::guard('seller')->attempt(
            ['email'=> $request->email,'password'=>$request->password],$request->remember

        )){
            // nếu đăng nhập thành công thì chuyenr hướng về view dashboard của adm

            return redirect()->intended(route('seller.dashboard'));

        }
        // nếu đăng nhập thất bại thì quay trở về from đăng nhập với giá trị của 2 ô inputlà email và password
        return redirect()->back()->withInput($request->only('email','remember'));

    }
    public function logout(){
        Auth::guard('seller')->logout();

        /**
         * chuyển hướng về trang login của seller
         */
        return redirect()->route('seller.auth.login');

    }
}
