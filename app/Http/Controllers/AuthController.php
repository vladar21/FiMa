<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\File;
use Session;
use App\Mail\ConfirmedEmail;

class AuthController extends Controller
{
   public function registerForm()
   {
       return view('pages.users.create');
   }   

   public function store(Request $request)
   { 
    if ($request->avatar != null){
        if ($request->avatar->getSize() > 200000000){         
            return redirect()->back()->withInput()->with('status', 'Размер загружаемого файла '.($request->avatar->getSize()).'Мб превышает лимит в 500Мб.');
       } 

        $exts = ['doc', 'docx', 'xls', 'xlsx', 'pdf', 'jpg', 'png', 'rar', 'zip'];
        $errext = 0;
        foreach($exts as $ext){
            if ($request->avatar->getClientOriginalExtension() == $ext){
                $errext++;
            }
        } 
        
        if($errext == 0){      
            return redirect()->back()->withInput()->with('status', 'Расширение файла '.$request->avatar->getClientOriginalExtension().' запрещено.');
        } 
    } 

    $this->validate($request, [
        'name' => 'required',
        'email' => 'required|email|unique:users',       
        'password' => 'required|confirmed',
        'password_confirmation' =>'',
        'info' => 'nullable',
        'avatar' => 'nullable|image'
    ]);
    
    $user = User::add($request->all());
    $user->generatePassword($request->get('password'));
    $user->uploadAvatar($request->file('avatar')); 

    \Mail::to($user)->send(new ConfirmedEmail($user));

    Auth::loginUsingId($user->id);

    return view('pages.email.confirmed', ['user' => $user]); 
    // return view('pages.users.index', ['user' => $user]);
   }

   public function verify($token)
   {
       $user = User::where('token', $token)->firstOrFail();
       $user->token = NULL;
       $user->save();
       Auth::loginUsingId($user->id);
       return redirect('/')->with('status', 'Ваш аккаунт подтвержден.');
   }

   public function loginForm()
   {
    return view('pages.login');
   }

   public function login(Request $request)
   {
       $this->validate($request, [
           'email' => 'required|email',
           'password' => 'required'
       ]);

       if(Auth::attempt([
           'email' => $request->get('email'),
           'password' => $request->get('password')
       ]))
       {            
        $user = Auth::user();         
        if($user->is_admin == 1){
            $users = User::all();   
            return view('admin.users.index', ['users' => $users]);         
        }else{            
            return view('pages.users.index', ['user' => $user]);
        }               
        
       }
      return redirect()->back()->with('status', 'Неправильный логин или пароль');
   }

   public function index()
    {
        $user = Auth::user();
        
        return view('pages.users.index', ['user' => $user]);
    }
  
   public function logout()
   {
       Auth::logout();
       
       return redirect('/');
   }

}
