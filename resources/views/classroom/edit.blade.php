@extends('layouts.front')

@section('content')
    <h1 class="text-center text-danger my-5">Edit Classroom</h1>

    <form action="{{ route('classroom.update',$classroom->id) }}" method="post" class="w-75 mx-auto my-5">
        @csrf
        @method('put')
        <div class="my-5 form-group">
            <label for="name" class="mb-2">Classroom Name</label>
            <input value="{{ $classroom->name }}" type="text" class="form-control" name="name">
            @error('name')
                <p class="text-danger">
                    {{ $message }}
                </p>
            @enderror
        </div>
        <input type="submit" value="Update Class" class="w-100 btn btn-warning">
    </form>
@endsection
