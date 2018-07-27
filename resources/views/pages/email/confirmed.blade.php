@extends('admin.layout')

@section('content')
<div class="box">
    <div class="box-header">
        @include('admin.errors')  
        @include('pages.flashmessages')   
        <h3 class="box-title alert alert-success">На ваш {{$user->email}} направлена ссылка, перейдя по которой вы подтвердите свою регистрацию и получите доступ к сервисам системы</h3>   
               
    </div>
</div>
@endsection