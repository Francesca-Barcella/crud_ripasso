@extends('layouts.app')

@section('content')
<!-- <div class="container py-5">
    <div class="row row-cols-1 row-cols-md-4 g-4">
        @forelse($items as $item)
        <div class="col">
            <a href="{{route('items.show', $item->id)}}">
                <div class="card">
                    <img class="card-img-top" src="{{$item->image}}" alt="">
                    <div class="card-body">
                        <h4 class="card-title">{{$item->name}}</h4>
                        <p class="card-text">{{$item->description}}</p>
                    </div>
                </div>
            </a>
        </div>
        @empty
        <div class="col">
            <p>no items</p>
        </div>
        @endforelse
    </div>
</div> -->

<div class="table-responsive">
    <table class="table table-primary">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Image</th>
                <th scope="col">Description</th>
                <th scope="col">Price</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($items as $item)
            <tr class="">
                <td scope="row">{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td><img src="{{$item->image}}" alt="{{$item->image}}" width="80"></td>
                <td>{{$item->description}}</td>
                <td>price: {{$item->price}}€</td>
            </tr>
            @empty
            <div class="container">
                <p>no items</p>
            </div>
            @endforelse
        </tbody>
    </table>
</div>

@endsection