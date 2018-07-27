<?php

namespace App\Http\Controllers\Admin;

use Auth;
use File;
use Storage;
use App\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->is_admin == 1){
            $users = User::all();
            return view('admin.users.index', ['users' => $users]);
        }else{
            $user = Auth::user();        
            return view('pages.users.index', ['user' => $user]);
        }        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->is_admin == 1){
            return view('admin.users.create');
        }else{
            return view('pages.users.create');
        }
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        if ($request->avatar != null){
            if ($request->avatar->getSize() > 200000000){         
                return redirect()->back()->withInput()->with('status', 'Размер загружаемого файла '.($request->avatar->getSize()/1000000).'Мб превышает лимит в 200Мб.');
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
        // Auth::loginUsingId($user->id);
        if(Auth::user()->is_admin == 1){
            $users = User::all();
            return view('admin.users.index', ['users' => $users]);
        }else{                                                     
            return view('pages.users.index', ['user' => $user]);
        }
        
       }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $this->validate($request, [
            'name' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user->id),
            ],
            'info' => 'nullable',
            'avatar' => 'nullable|image'
        ]);
        
        $user->edit($request->all());
        $user->generatePassword($request->get('password'));
        $user->uploadAvatar($request->file('avatar'));

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {        

       $UserFiles = User::find($id)->files()->get(); // удаление файлов из папки     
    //    $UserFilesId=$UserFiles->pluck('id')->toArray(); 
       foreach($UserFiles as $file){   
           if (file_exists('uploads/'.$file->filename)){
            Storage::delete('uploads/'.$file->filename); 
           }
       }

       User::find($id)->files()->delete();// удаляем записи о файлах из базы данных

       User::find($id)->remove(); // удаление данных пользователя
        if(Auth::user()->is_admin == 1){
            return redirect('/admin/users');
        }else{
            Auth::logout();
            return redirect('/')->with('status', 'Вы успешно удалили свой аккаунт и все свои файлы.');
        }      
        
    }

    
}
