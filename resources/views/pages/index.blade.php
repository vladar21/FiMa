@extends('layout')


@section('content')
@include('pages.leftsidebar')
<!-- Content Wrapper. Contains page content -->
  
    <section class="content-header">
    @include('pages.flashmessages')
      <h1>
        Привет! Это главная страница
        <small>можем приступать..</small>
      </h1>
    </section>

    
    <!-- /.content -->
 

@endsection