@extends('admin.layout')

@section('content')


    <!-- Main content -->
    <section class="content">
    {{Form::open([
      'route' => 'users.store', 
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
              <p class="help-block">Файлы загружать размером до 200 Mb. Ограничения по типам: doc, docx, xls, xlsx, pdf, jpg, png, rar, zip.
              </p>
            </div>
        </div>
      </div>
        <!-- /.box-body -->
        <div class="box-footer">  
          <button class="btn btn-success pull-right">Добавить</button>
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
      {{Form::close()}}

    </section>
    <!-- /.content -->
 
@endsection