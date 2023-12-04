@extends('Admin.layout')
@section ('body')
@include('success')

{{trans('message.Category Name')}} :{{$category->name}} <br>
{{trans('message.Description')}} :{{$category->desc}} <hr>
{{trans('message.Category Products')}}<br>
@foreach($category->products as $product)
{{trans('message.Product Name')}} :{{$product->name}}<br>
                  {{trans('message.Price')}}: {{$product->price}}<br>
                  {{trans('message.Quantity')}}: {{$product->quantity}}<br>
@endforeach

            <form action="{{url("category/deleteCategory/$category->id")}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">{{trans('message.Delete')}}</button>
            </form>
            <h1>
                <a class="btn btn-success" href="{{url("category/editCategory/$category->id")}}" >{{trans('message.Edit')}}</a>
            </h1>

@endsection