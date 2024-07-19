<?php

namespace App\Http\Controllers;

use Hash;
use Session;
use Throwable;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterValidate;
session_start();
class ProfileController extends Controller
{
    public function showProfile()
    {
        if (Auth::check())
        {
            $this->data['errorMessage'] = 'Vui lòng kiểm tra lại dữ liệu';
            return view('profile/main',$this->data);
        }
        return redirect()->route('show-form-login');
    }

    public function showUpDateFile()
    {
        if (Auth::check())
        {
            return view('profile/addNewAddress');
        }
        return redirect()->route('show-form-login');
    }
    public function updatefile(Request $request)
    {
        // dd($request->all());
        if(Auth::user()->role == 0) { 
            $id = Auth::user()->UserID;
            $user = User::find($id);
            $user->name = $request->name;
            $user->UserBirthday = $request->UserBirthday;
            $user->UserGender = $request->UserGender; 
            $user->UserPhone = $request->UserPhone;
            $user->UserAddress = $request->UserAddress;
            $user->UserCountry = $request->UserCountry;
            $user->UserCity = $request->UserCity;
            $user->UserState = $request->UserState;
            $user->UserZip = $request->UserZip;
            // if($user->password) {
            //     $user->password = Hash::make($request->password);
            // }
            $user->save();

            return redirect()->route('show-updatefile')->with('success_1','Cập nhật thông tin thành công');
            // return view('profile/addNewAddress');
        }
        else {
            return view('profile/addNewAddress');
        }
    }

    public function showChangePassword()
    {
        if (Auth::check())
        {
            $this->data['error_message'] = 'Vui lòng kiểm tra lại dữ liệu';
            return view('profile/changePassword',$this->data);
        }
        return redirect()->route('show-form-login');
    }
    public function changePassword(Request $request)
    {
        $array_rules = [
            'password_old' => 'required|min:6',
            'password' => 'required|min:6',
            'password_comfirm' => 'required|same:password'
        ];
        $array_messages = [
            'password_old.required' => 'Bạn chưa nhập mật khẩu cũ',
            'password_old.min' => 'Mật khẩu cũ không được nhỏ hơn :min kí tự',
            'password.required' => 'Bạn chưa nhập mật khẩu mới',
            'password.min' => 'Mật khẩu mới không được nhỏ hơn :min kí tự',
            'password_comfirm.required' => 'Xác nhận mật khẩu không được bỏ trống',
            'password_comfirm.same' => 'Xác nhận mật khẩu phải khớp với mật khẩu',
        ];
        $request->validate($array_rules, $array_messages);
        $id = Auth::user()->UserID;
        $user = User::find($id);
        if (Hash::check($request->password_old,$user->password)) {
            $user = User::find($id);
            $user -> password = bcrypt($request->password);
            $user -> save();
            return redirect()->route('show-changepassword')->with('success_2','Cập nhật mật khẩu thành công');
            // return redirect()->back()->with('success_1','Cập nhật mật khẩu thành công');
        }
        return redirect()->back();
    }
}
