@extends('admin.layout')

@section('content')

    <!-- Content Header (Page header) -->
   

    <!-- Main content -->
    <section class="content">
    {{Form::open([
      'action' => 'AuthController@store', 
      'files' => true
      ])}}

      <!-- Default box -->
      <div class="form-horizontal contact-form">
        
          <h3 class="text-uppercase">Registration</h3>          
          @include('admin.errors')  
          @include('pages.flashmessages')
          <br>

        <div class="box-body">
          <div class="col-md-8">
            <div class="form-group">  
              <button class="btn btn-success pull-right">Добавить</button>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">name</label>
              <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="" value="{{old('name')}}">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">email</label>
              <input type="text" name="email" class="form-control" id="exampleInputEmail1" placeholder="" value="{{old('email')}}">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">password</label>
              <input type="password" name="password" class="form-control" id="exampleInputEmail1" placeholder="">
            </div>
            <div class="form-group">
              <label for="password-confirm">confirm password</label>              
              <input id="exampleInputEmail1" type="password" class="form-control" name="password_confirmation">     
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">info</label>
              <input type="text" name="info" class="form-control" id="exampleInputEmail1" placeholder="" value="{{old('info')}}">
            </div>
            <div class="form-group">
              <label for="exampleInputFile">avatar</label>
              <input type="file" name="avatar" id="exampleInputFile">
              <p class="help-block">Файлы загружать размером до 200 Mb. Ограничения по типам: только файлы изображений.</p>
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