<?php

namespace App;

use \Storage;
use Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'info',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'token',
       
    ];

    public function files()   
    {
        return $this->hasMany(File::class);
    }

    public static function add($fields)
    {
        $user = new static;
        $user -> fill($fields); 
        
        if(Auth::user() && Auth::user()->is_admin == 1){
            $user -> token = null;               
        } else{
            $user -> token = str_random('100'); 
        }                    
        $user -> save();
        return $user;   
    }

    public function edit($fields)
    {
        $this ->fill($fields);        
        
        $this -> save();
    }

    public function generatePassword($password)
    {
        if($password != null)
        {
            $this -> password = bcrypt($password);
            $this -> save();
        }
    }

    public function remove()        
    {
        $this->removeAvatar(); // удаление аватарки
        $this->delete();

        return redirect('/');
    }

  

    public function uploadAvatar($image)
    {
        if($image == null){ return; }
       
       $this->removeAvatar();
        
        $filename = str_random(10).'.'.$image->extension();
        $image->storeAs('uploads', $filename);
        $this->avatar = $filename;
        $this->save();
    }

    public function removeAvatar()
    {
        if($this->avatar != null)
        {
            Storage::delete('/uploads//'.$this->avatar); // удаление раннее загруженной аватарки
        }
    }

    public function getAvatar()
    {
        if($this->avatar == null)
        {
            return '/img/no-user-image.png';
        }
        return '/uploads//' . $this->avatar;
    }

    public function makeAdmin()
    {
        $this -> is_admin = 1;
        $this -> save();
    }

    public function makeNormal()
    {
        $this -> is_admin = 0;
        $this -> save();
    }

    public function toggleAdmin()
    {
        if($value == null)
        {
            return $this -> makeNormal();
        }

        return $this -> makeAdmin();
    }

    // public function activation($email)
    // {
    //     $activ = new static;
    //     $activ -> email = $email;
    //     $activ -> token = str_random(100)
    //     $activ -> save();

    //     return $activ;
    // }

}
