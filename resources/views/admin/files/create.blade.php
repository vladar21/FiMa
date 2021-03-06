@extends('admin.layout')

@section('content')
  
    <!-- Main content -->
    <section class="content">
    {{Form::open([
      'route' => 'files.store',
      'files' => true
      ])}}

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Add file</h3>
          @include('admin.errors')  
          @include('pages.flashmessages')
        </div>
        <div class="box-body">
          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleInputEmail1">title</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="title" value="{{old('title')}}">
            </div>            
            <div class="form-group">
              <label for="exampleInputFile">upload file</label>
              <input type="file" id="exampleInputFile" name="path">
              <p class="help-block">Файлы загружать размером до 200 Mb. Ограничения по типам: doc, docx, xls, xlsx, pdf, jpg, png, rar, zip.
              </p>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label for="exampleInputEmail1">description</label>
              <textarea name="description" id="" cols="30" rows="2" class="form-control" placeholder="Напишите что-нибудь о файле">{!!old('description')!!}</textarea>
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