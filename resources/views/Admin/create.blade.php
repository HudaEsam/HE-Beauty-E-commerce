@extends('Admin.layout')
@section ('body')
@include('errors')
@include('success')

<form method="POST" action="{{route('store')}}" enctype="multipart/form-data">
    <div class="form-group">
        <label for="exampleInputEmail1">{{trans('message.Select Category Name')}}</label>
        <select name="category_id" id="">
        @foreach($categories as $category)
        <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
    </div>
     @csrf
   <div class="form-group">
      <label for="exampleInputEmail1">{{trans('message.Product Name')}}</label>
      <input type="text" name="name" class="form-control text-white" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">{{trans('message.Description')}}</label>
        <textarea type="text" name="desc" class="form-control text-white" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter description"></textarea>
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1"> {{trans('message.Price')}}</label>
        <input type="number" name="price" class="form-control text-white" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter price">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">{{trans('message.Quantity')}}</label>
        <input type="text" name="quantity" class="form-control text-white" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter quantity">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">{{trans('message.Image')}}</label>
        <input type="file" name="image" class="form-control text-white" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter image">
    </div>

    <button type="submit" class="btn btn-primary">{{trans('message.Submit')}}</button>
</form>
@endsection