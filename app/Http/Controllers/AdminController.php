<?php

namespace App\Http\Controllers;

use App\Model\AdminModel;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    /**
     * AdminController constructor.
     * hàm khởi tạo của class được chạy ngay khi khởi tạo
     */
    public function __construct()
    {
        $this->middleware('auth:admin')->only('index');
    }

    public  function index(){
        return view('admin.dashboard');

    }



    public function create(){
        //return view('admin.auth.register');
        return view('admin.auth.registertemplate');

    }


    public function store(Request $request){
        /**
         * valifate dữ liệu
         */
        $this->validate($request,array(
            'name'=>'required',
            'email'=>'required',
            'password'=>'required'

        ));
        /**
         * khởi tạo model
         */
        $adminModel=new AdminModel();
        $adminModel->name = $request->name;
        $adminModel->email =$request->email;
        $adminModel->password=bcrypt($request->password);
        $adminModel->save();

        return redirect()->route('admin.auth.login');

    }


}
