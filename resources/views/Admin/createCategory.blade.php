@extends('Admin.layout')
@section ('body')
@include('errors')
@include('success')

<form method="POST" action="{{route('insert')}}" enctype="multipart/form-data">
   
    @csrf
   <div class="form-group">
      <label for="exampleInputEmail1">{{trans('message.Category Name')}}</label>
      <input type="text" name="name" class="form-control text-white" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">{{trans('message.Category Description')}}</label>
        <textarea type="text" name="desc" class="form-control text-white" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter description"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">{{trans('message.Submit')}}</button>
</form>
@endsection