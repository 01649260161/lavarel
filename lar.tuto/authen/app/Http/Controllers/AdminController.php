<?php

namespace App\Http\Controllers;

use App\Model\AdminModel;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    //phuong thuc tra ve view khi dang nhap admin thanh cong
    public function index(){
        return view('admin.dashboard');
    }
    //
    //phuong thuc tra ve view dung de dang ki tai khoang admin
    public function create(){
        return view('admin.auth.register');
    }

    public  function store(Request $request){
        //validate du lieu duoc gui tu form di
        $this->validate($request,array(
                'name'=>'required',
                'email' => 'required',
                'password'=>'required'
        ));
        //khoi tao model de  luu admin moi
        $adminModel = new AdminModel();
        $adminModel->name = $request->name;
        $adminModel->email = $request->email;
        $adminModel->password = bcrypt($request->password);
        $adminModel->save();
        //@todo
        return redirect()->route();
    }
}


