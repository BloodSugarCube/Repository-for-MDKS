@extends('notes.layout')

@section('content')
<div class="container">
    <a type="button" class="w-100 btn mb-3 mt-3 btn-lg btn-danger" href="{{ route('note.create') }}">Create new note</a>
    @if ($message = Session::get('success'))
    <div class="border border-secondary mb-3 p-2">
        <p>{{ $message }}</p>
    </div>
    @endif
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-1 g-3">

        @foreach($notes as $note)
        <div class="col">
            <div class="card border border-danger bg-dark">
                <div class="card-body">
                    <h3 class="pb-1">{{$note->title}}</h3>
                    <p class="card-text border-bottom border-danger pb-3">{{$note->description}}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <a type="button" class="btn btn-sm btn-outline-danger" href="{{ route('note.show',$note->id) }}">Show</a>
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
        @endforeach
    </div>
</div>