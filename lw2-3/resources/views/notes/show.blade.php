@extends('notes.layout')

@section('content')
<div class="container">
    <a type="button" class="w-100 btn mb-3 mt-3 btn-lg btn-secondary" href="{{ route('note.index') }}">Back</a>
    <h3 class="mb-3 border-bottom border-1 pb-2">Note №{{$note->id}}</h3>
    <div class="">
        @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                <li> {{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="col">
            <div class="card border border-danger bg-dark">
                <div class="card-body">
                    <h3 class="pb-1">{{$note->title}}</h3>
                    <p class="card-text border-bottom border-danger pb-3">{{$note->description}}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <a type="button" class="btn btn-sm btn-outline-danger" href="{{ route('note.edit',$note->id) }}">Edit</a>
                        </div>
                        <form action="{{ route('note.destroy',$note->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>