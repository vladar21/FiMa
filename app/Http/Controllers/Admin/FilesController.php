<?php

namespace App\Http\Controllers\Admin;

use App\File;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Response;
use Redirect;

class FilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->is_admin == 1){                       
            $files = File::all();           
            return view('admin.files.index', ['files'=>$files]);
        }else{
            $id = Auth::user()->id;        
            $files = File::where('user_id', Auth::id())->get();                   
            return view('pages.files.index', ['files'=>$files]);
        }
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.files.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'nullable',
            'path'  => 'required',            
            'description' => 'nullable'       
        ]);
        
        $file = File::add($request->all()); 
             
        $file->uploadFile($request->file('path'));            

        return redirect()->route('files.index');       
      
    }   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $file = File::find($id);
        return view('admin.files.edit', compact(
            'file'
        ));
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
        $this->validate($request, [
            'title' => 'nullable',
            // 'path'  => 'required',            
            'description' => 'nullable'          
        ]);
        
        $file = File::find($id); 
        $file-> edit($request->all());
        if ($request->file('path') != null){
            $file->uploadFile($request->file('path'));            
        }
        // dd($file->originalname);
        return redirect()->route('files.index');
        
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {      
            File::find($id)->remove();
          
       return redirect()->route('files.index');
    }

    public function download($id)
    {        
        $file = File::find($id);              
        $file->countDownload($id);         

        return Response::download('uploads/'.$file -> filename, $file -> originalname);        
        
    }
}
