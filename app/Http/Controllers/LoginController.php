<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Middleware\AuthMiddleware;
use App\Models\AdminsModel;

// use App\Models\LoginModel;
// use Illuminate\Support\Facades\Auth;
// use App\Http\Middleware\LogMiddleware;

class LoginController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(LogMiddleware::class);
    // }

    public function index(Request $request)
    {
        $err = '';

        if($request->get('err') == 1)
        {
            $err = '登入失敗';
        }
        else if($request->get('err') == 2)
        {
            $err = '資料異常登出';
        }

        session_start();

        if(isset($_SESSION['a_Id']))
        {
            session_unset();
            session_destroy();
        }

        return view('login', ['err'=>$err]);
    }

    public function login(Request $request)
    {
        // Validate
        $fields = $request->validate([
            'account' => ['required', 'min:5', 'max:10'],
            'password' => ['required', 'min:3', 'max:20']
        ]);


        // print_r($request->all());
        $Admins = new AdminsModel();
        $data = $Admins
        ->where('a_Id', $request->account)
        ->where('a_PassWord', $request->password)
        ->get()
        ->first();
        // AdminsModel::create(['a_Id' => 'C12345','a_PassWord' => '123', 'a_Name' => 'Nikki']);

        // $data = $request->session()->all();
        // $data = $request->session()->only(['username', 'email']);
        // $data = $request->session()->except(['username', 'email']);

        // session(['key' => 'value']);

        if(isset($data->a_Id))
        {
            // session_start();

            $request->session()->put('a_Id', $data->a_Id);
            $request->session()->put('a_Name', $data->a_Name);

            // $_SESSION['a_Id'] = $data->a_Id;
            // $_SESSION['a_Name'] = $data->a_Name;
            return redirect()->route('home');
        }
        else
        {
            return redirect()->route('login',['err'=>1]);
        }
        // Load Value

        // $user =  User::create(['a_Id'=>$request->account,'email'=>'12yu32','password'=>'11223']);
        // $data = LoginModel::create(['a_Id'=>'A12345','email'=>'A12345@yahoo.com.tw','a_PassWord'=>'12345']);
        // dd($request->account);

        // Auth::login($user);
        // if(Auth::attempt($fields, ['Nigo'=>'ok']))
        // {
        //     return redirect()->intended('Home');
        // }
        // return redirect()->route('Home');
        // return back()->withErrors([ // 針對error 自定義
        //     'failed'=>'輸入錯誤...'
        // ]);
    }

    public function logout(Request $request)
    {
        // Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('Login');
    }
}
