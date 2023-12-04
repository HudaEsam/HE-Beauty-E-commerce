@extends('Admin.layout')
@section ('body')
@include('errors')
@include('success')
<form method="POST" action="{{url("product/$product->id")}}" enctype="multipart/form-data">
   
    @csrf
    @method('PUT')
     <div class="form-group">
        <label for="exampleInputEmail1">{{trans('message.Select Category Name')}}</label>
        <select name="category_id" id="">
        @foreach($categories as $category)
        <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">{{trans('message.Product Name')}}</label>
      <input type="text" name="name" class="form-control text-white" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$product->name}}">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">{{trans('message.Description')}}</label>
        <textarea type="text" name="desc" class="form-control text-white" id="exampleInputEmail1" aria-describedby="emailHelp" >{{$product->desc}}</textarea>
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">{{trans('message.Price')}}</label>
        <input type="number" name="price" class="form-control text-white" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$product->price}}">
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">{{trans('message.Quantity')}}</label>
        <input type="text" name="quantity" class="form-control text-white" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$product->quantity}}">
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">{{trans('message.Old Image')}}</label>
        <img src="{{asset("storage/$product->image")}}" width="100" alt="" srcset="">
        <input type="file" name="image" class="form-control text-white" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
      </div>

    <button type="submit" class="btn btn-primary">{{trans('message.Submit')}}</button>
  </form>
  @endsection
  
