<?php

namespace App;

use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;


class File extends Model
{    
    protected $fillable = ['path', 'downloaded', 'title', 'description'];

    public function owner()     
    {
        return $this->hasOne(User::class);
    }

    public static function add($fields)
    {    
        $file = new static;
        $file -> fill($fields);        
        $file -> user_id = Auth::id();
        $file -> downloaded = 0;
        if ($file -> title == null){
            $file -> title = $file -> path -> getClientOriginalName();
        }         
        $file -> date = Carbon::now(); 
        $file -> save();
        return $file;  
    }

    public function edit($fields)
    {    
       
        $this -> fill($fields);             
        $this -> date = Carbon::now();       
        if ($this -> title == null){
            if($this -> originalname){
                $this -> title = $this -> originalname;
            }           
        }              
        $this -> save();
    }

    public function remove()
    {
       
        // удаление        
        $this->removeFile();    
        $this->delete();  
    }

      public function uploadFile()
    {   
                                         
        if($this == null){ return; } 
        $this->removeFile();        
        $filename = str_random(10).'.'.$this->path->getClientOriginalExtension();       
        $this->path->storeAs('uploads', $filename);
        $this->filename = $filename;                
        $this->originalname = $this->path->getClientOriginalName();
        $this->extention = $this->path->getClientOriginalExtension();
        $this->size = $this->path->getSize(); 
        $this->save();
    }

    public function removeFile()    
    {   
        // dd($this->filename);
        if($this->filename != null)
        {              
            Storage::delete('uploads/'.$this->filename); // удаление файла
        }        
    }

    public function getFile()
    {
        if($this->filename == null)
        {
            return '/img/no-file.png';
        }
        return 'uploads/' . $this->filename;
    }

    public function countDownload($id)
    {
        $file = File::find($id);                 
        $file -> downloaded ++;
        $file -> save();
       
    }

   
}