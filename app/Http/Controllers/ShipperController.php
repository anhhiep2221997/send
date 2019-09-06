<?php

namespace App\Http\Controllers;

use App\Model\ShipperModel;
use Illuminate\Http\Request;

class ShipperController extends Controller
{
    //
    public function __construct()
    {

        $this->middleware('auth:shipper')->only('index');
    }
    public  function index(){
        return view('shipper.dashboard');

    }
    public function create(){
        return view('shipper.auth.register');

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
        $shipperModel=new ShipperModel();
        $shipperModel->name = $request->name;
        $shipperModel->email =$request->email;
        $shipperModel->password=bcrypt($request->password);
        $shipperModel->save();

        return redirect()->route('shipper.auth.login');

    }

}
