@extends('layouts.app')

@section('content')

<!-- 1° step - validation frontend - aggiungo required agli input obbligatori del form -->
<!-- 2° step - validation frontend - inserisco snipped per il redirect per validatione fallita -->
<!-- 3° step - validation frontend - inserisco "OLD" in value per conservare i dati già scritti nel form in caso di validazione fallita" 
[FARE ANCHE IN VIEW EDIT!!!]-->
<!-- 4° step - validation frontend - esporto lo snipped dell'error e sostituisco con include visto che poi mi servirà anche in edit" 
[FARE ANCHE IN VIEW EDIT!!!]-->
<div class="container py-5">
    <h3>Add New Item</h3>
    <h1>Create Post</h1>
    @include('partials.errors')
    <form action="{{route('items.store')}}" method="post">
        @csrf
        <div class="form-group my-2">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Insert name" aria-describedby="helpId" value="{{old('name')}}" required>
        </div>
        <div class="form-group my-2">
            <label for="image">Image</label>
            <input type="text" name="image" id="image" class="form-control" placeholder="Insert image" aria-describedby="helpId" value="{{old('image')}}">
        </div>
        <div class="form-group my-2">
            <label for="price">Price</label>
            <input type="number" step="0.01" name="price" id="price" class="form-control" placeholder="Insert price" aria-describedby="helpId" value="{{old('price')}}">
        </div>
        <div class="form-group my-2">
            <label for="description">Description</label>
            <input type="text" name="description" id="description" class="form-control" placeholder="Insert description" aria-describedby="helpId" value="{{old('description')}}" required>
        </div>
        <button type="submit" class="btn btn-primary mt-5">Add</button>
    </form>
</div>

@endsection