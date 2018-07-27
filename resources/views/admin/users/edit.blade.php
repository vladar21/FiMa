@extends('admin.layout')

@section('content')

    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
    <section class="content">
    {{Form::open([
        'route' => ['users.update', $user->id],
        'method' => 'put',
        'files' => true
    ])}}
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Profile</h3>
          @include('admin.errors')  
          @include('pages.flashmessages')
        </div>
        <div class="box-body">
          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleInputEmail1">name</label>
              <input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="" value="{{$user->name}}">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">email</label>
              <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="" value="{{$user->email}}">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">info</label>
              <input type="text" class="form-control" id="exampleInputEmail1" name="info" placeholder="" value="{{$user->info}}">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">password</label>
              <input type="password" class="form-control" id="exampleInputEmail1" name="password" placeholder="">
            </div>
            <div class="form-group">
              <img src="{{$user->getAvatar()}}" alt="" width="200" class="img-responsive">
              <label for="exampleInputFile">Аватар</label>
              <input type="file" name="avatar" id="exampleInputFile">

              <p class="help-block">Какое-нибудь уведомление о форматах..</p>
            </div>
            <div>         
          <button class="btn btn-success pull-right">Изменить</button>
        </div>
        </div>
      </div>
        <!-- /.box-body -->
        
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    {{Form::close()}}
    </section>
    <!-- /.content -->
 
@endsection
