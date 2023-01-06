@extends('layouts.app')

@section('content')
<div class="container py-5">
    <img src="{{$item->image}}" alt="">
    <h1>{{$item->name}}</h1>
    <p>{{$item->description}}</p>
    <span>price: {{$item->price}} €</span>
</div>

@endsection