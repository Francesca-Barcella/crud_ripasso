@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h3>Add New Item</h3>
    <form action="{{route('items.store')}}" method="post">
        @csrf
        <div class="form-group my-2">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Insert name" aria-describedby="helpId">
        </div>
        <div class="form-group my-2">
            <label for="image">Image</label>
            <input type="text" name="image" id="image" class="form-control" placeholder="Insert image" aria-describedby="helpId">
        </div>
        <div class="form-group my-2">
            <label for="price">Price</label>
            <input type="number" step="0.01" name="price" id="price" class="form-control" placeholder="Insert price" aria-describedby="helpId">
        </div>
        <div class="form-group my-2">
            <label for="description">Description</label>
            <input type="text" name="description" id="description" class="form-control" placeholder="Insert description" aria-describedby="helpId">
        </div>
        <button type="submit" class="btn btn-primary mt-5">Add</button>
    </form>
</div>

@endsection