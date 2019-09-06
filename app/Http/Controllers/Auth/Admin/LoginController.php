<?php

namespace App\Http\Controllers\Auth\Admin;

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
        $this->middleware('guest:admin')->except('logout');
    }

    /**
     * phương thức trả về view dùng để đăng nhập admin
     */
    public function login(){
       // return view('admin.auth.login');
        return view('admin.auth.logintemplate');

    }
    public function loginAdmin(Request $request){
        $this->validate($request, array(
            'email' => 'required|email',
            'password' => 'required|min:6'
        ));
        /**
         * đăng nhập
         */
        if (Auth::guard('admin')->attempt(
            ['email'=> $request->email,'password'=>$request->password],$request->remember

        )){
             // nếu đăng nhập thành công thì chuyenr hướng về view dashboard của adm

            return redirect()->intended(route('admin.dashboard'));

        }
        // nếu đăng nhập thất bại thì quay trở về from đăng nhập với giá trị của 2 ô inputlà email và password
        return redirect()->back()->withInput($request->only('email','remember'));

    }
    public function logout(){
        Auth::guard('admin')->logout();

        /**
         * chuyển hướng về trang login của admin
         */
        return redirect()->route('admin.auth.login');

    }
}
