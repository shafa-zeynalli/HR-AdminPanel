@extends('layout.admin')


@section('content')

   <div class="container">
       Welcome <span class="text-success ">{{$roles[0]}}</span> {{$name->first_name}} {{$name->last_name}}
   </div>


@endsection
