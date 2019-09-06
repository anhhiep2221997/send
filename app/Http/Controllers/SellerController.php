<?php

namespace App\Http\Controllers;

use App\Model\SellerModel;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    //
    /**
     * sellerController constructor.
     * hàm khởi tạo của class được chạy ngay khi khởi tạo
     */
    public function __construct()
    {
        $this->middleware('auth:seller')->only('index');
    }

    public  function index(){
        return view('seller.dashboard');

    }

    public function create(){
        return view('seller.auth.register');

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
        $sellerModel=new SellerModel();
        $sellerModel->name = $request->name;
        $sellerModel->email =$request->email;
        $sellerModel->password=bcrypt($request->password);
        $sellerModel->save();

        return redirect()->route('seller.auth.login');

    }

}
