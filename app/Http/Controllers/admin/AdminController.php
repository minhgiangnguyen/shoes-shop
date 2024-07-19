<?php

namespace App\Http\Controllers\admin;

// use Auth;
use Throwable;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function index(){
        return view("admin/home/index");
    }

    public function logon()
    {
        return view('admin/logon');
    }

    public function postLogon(Request $request)
    {
        //validate
        $array_rules = [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ];
        $array_messages = [
            'email.required' => 'Bạn chưa nhập email',
            'email.email' => 'Bạn nhập chưa phải là email',
            'password.required' => 'Bạn chưa nhập mật khẩu',
            'password.min' => 'Mật khẩu không được nhỏ hơn :min kí tự',
        ];
        $request->validate($array_rules, $array_messages);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role'=>1])) {
            return redirect()->route('admin.home');
        }else{
            return redirect()->back()->with('error', 'Tài khoản hoặc mật khẩu không chính xác');
        }
    }

    public function signOut()
    {
        Auth::logout();
        return redirect()->route('logon');
    }


    //User Manage
    public function guestManagement(){
        $keyword = request('keyword');
        $data = User::orderBy('UserID','DESC')->paginate(10);
        if($keyword){
            $data = User::orderBy('UserID','DESC')
            ->where('name','LIKE','%'.$keyword.'%')
            ->paginate(10);
        }
        return view('admin/user/guest',compact('data'));
    }
    public function guestInformation($id){
        $data = User::find($id);
        return view('admin/user/guestInformation',compact('data'));
    }
    
    //Admin Manage
    public function addNewAdmin(Request $req){
        if($req->isMethod('GET')){
            return view('admin/user/addNewAdmin');
        }
        if($req->isMethod('POST')){
            // dd('123');
            $req->validate([
                'name' => 'required|min:3|max:50',
                'email' => 'required|unique:users',
                'password' => 'required|min:6',
                'confirm-password' => 'required|same:password'
            ]);
            $req->merge(['password'=>Hash::make($req->password)]);
            // dd($req->all());
            User::create($req->all());
            return redirect('admin/admin-manage')->with('success', "Successfully!"); 
        } 
        
    }
    
    public function adminManagement(){
        $keyword = request('keyword');
        $data = User::orderBy('UserID','DESC')->get();
        if($keyword){
            $data = User::orderBy('UserID','DESC')
            ->where('name','LIKE','%'.$keyword.'%')
            ->get();
        }
        return view('admin/user/admin',compact('data'));
    }
    public function adminInformation(Request $req, $id){
        if($req->isMethod('GET')){
            $data = User::find($id);
            return view('admin/user/adminInformation',compact('data'));
        }
        if($req->isMethod('POST')){
            $data = $req->only('name','email','UserPhone','UserCity','UserState','UserZip','UserBirthday','UserCountry','UserAddress');
            // dd($data);
            User::find($id)->update($data);
            return redirect()->back()->with('success', "Successfully!");
        } 
    }
    public function adminDelete(Request $req){
        $id = $req->ids;
        if(empty($id)){
            return back()->with('success', "Not selected yet!");
        }
        User::whereIn('UserID',$id)->Delete();
        return back()->with('success', "Successfully!");       
    }
}