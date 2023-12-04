@extends('Admin.layout')
@section ('body')
@include('errors')
@include('success')
<table class="table">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">{{trans('message.Name')}}</th>
        <th scope="col">Aciton</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category )
    <tr>
          <th scope="row">{{$loop->iteration}}</th>
        <td>{{$category->name}}</td>
        <td>
        <h1>
             <a class="btn btn-success" href="{{url("categories/showCategory/$category->id")}}" >{{trans('message.Show')}}</a>
        </h1>
        </td>
    </tr>
    @endforeach

    </tbody>
  </table>
@endsection