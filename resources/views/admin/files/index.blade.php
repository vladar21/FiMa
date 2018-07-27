@extends('admin.layout')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Blank page
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
   
      <!-- Default box -->
      <div class="box">
            <div class="box-header">
              <h3 class="box-title">Manage files</h3>  
              @include('admin.errors')  
              @include('pages.flashmessages')           
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="form-group">
                <a href="{{route('files.create')}}" class="btn btn-success">Upload file</a>
              </div>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>id</th>
                  <th>user</th>
                  <th>title</th>
                  <th>extention</th>
                  <th>size</th>
                  <th>upload</th>
                  <th>downloaded</th>
                  <th>description</th>                  
                  <th>actions</th>
                </tr>
                </thead>
                <tbody>
               
                @foreach($files as $file)
                <tr>
                  <td>{{$file->id}}</td>
                 
                  <td>{{App\User::find($file->user_id)->name}}</td>
                  <td>{{$file->title}}</td>
                  <td>{{$file->extention}}</td>
                  <td>{{$file->size}}</td>                  
                  <td>{{$file->date}}</td>                  
                  <td>{{$file->downloaded}}</td>
                  <td>{!!$file->description!!}</td>                  
                  <td>
                    <a href="{{ route('download', $file->id) }}" class="fa fa-download"></a>
                   
                    <a href="{{route('files.edit', $file->id)}}" class="fa fa-pencil"></a>
                      
                    {{Form::open(['route'=>['files.destroy', $file->id], 'method'=>'DELETE'])}}  
                    
                    <button class="delete" onclick="return confirm('are you sure?')" type="submit"><i class="fa fa-remove"></i></button>

                    {{Form::close()}}

                    

                  </td>
                </tr>
                @endforeach
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
      <!-- /.box -->
   
    </section>
    <!-- /.content -->
  
@endsection