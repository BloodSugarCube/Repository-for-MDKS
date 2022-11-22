@extends('notes.layout')

@section('content')
<div class="container">
    <a type="button" class="w-100 btn mb-3 mt-3 btn-lg btn-secondary" href="{{ route('note.index') }}">Back</a>
    <div class="w-100 rounded border border-3 border-danger bg-dark p-5 justify-content-between d-flex flex-column">
        <h3 class="mb-3 border-bottom border-1 pb-2">Add note</h3>

        @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                <li> {{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form class="justify-content-between d-flex flex-column" action="{{ route('note.update',$note->id) }}" method="POST">
            @csrf

            @method('PUT')
            <div class="input-group mb-3">
                <span class="input-group-text">Title</span>
                <input type="text" class="form-control" name="title" value="{{ $note->title }}"aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Description</span>
                <textarea name="description" class="form-control" class="input-group-text">{{ $note->description }}</textarea>
            </div>
            <button class="btn btn-danger btn-lg" type="submit">Submit</button>
        </form>
    </div>
</div>