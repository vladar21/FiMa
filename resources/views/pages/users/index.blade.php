@extends('admin.layout')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Profile
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>        
        <li class="active">Blank page</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    

      <!-- Default box -->
      <div class="box">
            <div class="box-header">
              <h3 class="box-title">Personal Date</h3>
              @include('admin.errors')  
              @include('pages.flashmessages')
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>id</th>
                  <th>name</th>
                  <th>email</th>
                  <th>info</th>
                  <th>avatar</th>
                  <th>action</th>
                </tr>
                </thead>
                <tbody>                
               
                  <tr>                 
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->info}}</td>
                    <td><img src="{{$user->getAvatar()}}" alt="" class="img-responsive" width="150"></td>
                    <td><a href="{{route('users.edit', $user->id)}}" class="fa fa-pencil"></a>
                    {{Form::open([
                      'route'=>['users.destroy', $user->id], 
                      'method'=>'delete'
                    ])}}  
                    <button class="delete" onclick="return confirm('are you sure?')"  type="submit">
                    <i class="fa fa-remove"></i>
                    </button>
                    {{Form::close()}}
                    </td>
                  </tr>
             

                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
      <!-- /.box -->
   
    </section>
    <!-- /.content -->
 
@endsection