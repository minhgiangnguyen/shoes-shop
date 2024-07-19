<?php

namespace App\Http\Controllers;
use Hash;
use Str;
use Mail;
use Session;
use Throwable;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterValidate;
session_start();

class LogInController extends Controller
{
    public function showFormRegister()
    {
        $this->data['errormessage'] = 'Vui lòng kiểm tra lại dữ liệu';
        return view('register', $this->data);
    }
    public function register(Request $req)
    {
        //validate
        $array_rules = [
            'name' => 'required|min:3|max:50',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'confirm-password' => 'required|same:password'
        ];
        $array_messages = [
            'name.required' => 'Bạn chưa nhập họ và tên',
            'name.min' => 'Họ và tên không được nhỏ hơn :min kí tự',
            'name.max' => 'Họ và tên không được lớn hơn :max kí tự',
            'email.required' => 'Bạn nhập chưa nhập email',
            'email.email' => 'Bạn chưa phải là email',
            'password.required' => 'Bạn chưa nhập mật khẩu',
            'password.min' => 'Mật khẩu không được nhỏ hơn :min kí tự',
            'confirm-password.required' => 'Xác nhận mật khẩu không được bỏ trống',
            'confirm-password.same' => 'Xác nhận mật khẩu phải khớp với mật khẩu',
        ];
        $req->validate($array_rules, $array_messages);

        $token = strtoupper(Str::random(10));
        $data = $req->all();
        $password_h = bcrypt($req->password);
        $data['password'] = $password_h;
        $data['UserToken'] = $token;
        
        if ($User = User::create($data)) {
            Mail::send('email/active_account', compact('User'), function($email) use($User){
                $email->subject('Karma Shop - Xác nhận tài khoản');
                $email->to($User->email, $User->name);
            });
            return redirect()->route('show-form-register')->with('success', 'Registered successfully');
        }


        // $req->merge(['password'=>Hash::make($req->password)]);
        // try {
        //     User::create($req->all());
        // } catch (Throwable $th) {
        //     // dd($th);
        // }
        // return redirect()->route('show-form-register')->with('success', 'Registered successfully');
            //    return redirect()->route('show-form-register')->with('success', 'Registered successfully');
    }

    public function showFormLogin()
    {
        return view('login');
    }
    public function login(Request $request)
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

        $login = Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password, 'role'=>0], $request->has('remember'));
        if($login){
            if (Auth::guard('web')->User()->UserStatus == 0) {
                Auth::guard('web')->logout();
                return redirect()->route('show-form-login')->with('error', 'Tài khoản của bạn chưa kích hoạt, vui lòng kiểm tra Email');
            }
            $OrderUserID = DB::table('users')->where('email', $request->email)->value('UserID');
            Session::put('OrderUserID',$OrderUserID);
            return redirect()->route('home.index');
        }
        return redirect()->back()->with('error', 'Tài khoản hoặc mật khẩu không chính xác');


        // if (Auth::attempt(['email' => $req->email, 'password' => $req->password, 'role'=>0])) {
        //     $OrderUserID = DB::table('users')->where('email', $req->email)->value('UserID');
        //     // dd($user_id);
        //     Session::put('OrderUserID',$OrderUserID);
        //     return redirect()->route('home');

        // }else{
        //     // return redirect()->back();
        //     return redirect()->back()->with('error', 'Tài khoản hoặc mật khẩu không chính xác');
        // }
    }

    public function actived(User $User, $token)
    {
        if($User->UserToken === $token){
            $User->update(['UserStatus'=>1, 'UserToken'=>null]);
            return redirect()->route('show-form-login')->with('success', 'Kích hoạt tài khoản thành công');
        }else{
            return redirect()->route('show-form-login')->with('error', 'Mã xác nhận không hợp lệ');
        }
    }

    public function logout()
    {
       Auth::logout();
       Session::forget('shipping_id');
       Session::forget('OrderUserID');
       return redirect()->route('show-form-login');
    //    return redirect()->back();
    }

}