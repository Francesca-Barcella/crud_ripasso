@extends('layouts.app')

@section('content')

<!-- 1° step - validation lato frontend - aggiungo required agli input del form -->
<div class="container py-5">
    <h3>Add New Item</h3>
    <h1>Create Post</h1>
<!-- 2° step - validation lato frontend - inserisco snipped per il redirect per validatione fallita -->
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{route('items.store')}}" method="post">
        @csrf
        <div class="form-group my-2">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Insert name" aria-describedby="helpId" required>
        </div>
        <div class="form-group my-2">
            <label for="image">Image</label>
            <input type="text" name="image" id="image" class="form-control" placeholder="Insert image" aria-describedby="helpId" required>
        </div>
        <div class="form-group my-2">
            <label for="price">Price</label>
            <input type="number" step="0.01" name="price" id="price" class="form-control" placeholder="Insert price" aria-describedby="helpId" required>
        </div>
        <div class="form-group my-2">
            <label for="description">Description</label>
            <input type="text" name="description" id="description" class="form-control" placeholder="Insert description" aria-describedby="helpId" required>
        </div>
        <button type="submit" class="btn btn-primary mt-5">Add</button>
    </form>
</div>

@endsection