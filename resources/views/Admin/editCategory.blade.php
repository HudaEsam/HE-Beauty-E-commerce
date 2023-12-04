@extends('Admin.layout')
@section ('body')
@include('errors')
@include('success')
<form method="POST" action="{{url("category/$category->id")}}" enctype="multipart/form-data">
   @csrf
    @method('PUT')
    
    <div class="form-group">
      <label for="exampleInputEmail1">{{trans('message.Category Name')}}</label>
      <input type="text" name="name" class="form-control text-white" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$category->name}}">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">{{trans('message.Category Description')}}</label>
        <textarea type="text" name="desc" class="form-control text-white" id="exampleInputEmail1" aria-describedby="emailHelp" >{{$category->desc}}</textarea>
      </div>
    <button type="submit" class="btn btn-primary">{{trans('message.Submit')}}</button>
  </form>
@endsection
  
