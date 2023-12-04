@extends('Admin.layout')
@section ('body')
@include('success')

{{trans('message.Category Name')}}: {{$product->category}} <br>
{{trans('message.Product Name')}} :{{$product->name}} <br>
{{trans('message.Description')}} :{{$product->desc}} <br>
{{trans('message.Price')}} :{{$product->price}} <br>
{{trans('message.Price')}} :{{$product->quantity}} <br>
{{trans('message.Image')}}: <br>
<img src="{{url(asset("storage/$product->image"))}}" width="300px" alt="" srcset="">
            <form action="{{url("product/delete/$product->id")}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">{{trans('message.Delete')}}</button>
            </form>
            <h1>
                <a class="btn btn-success" href="{{url("product/edit/$product->id")}}" >{{trans('message.Edit')}}</a>
            </h1>

@endsection