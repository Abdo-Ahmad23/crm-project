@extends('layouts.front')

@section('content')
<h1 class="text-center text-danger my-5">Create New Classroom</h1>

<form action="{{route('classroom.store')}}" method="post" class="w-75 mx-auto my-5">
    @csrf
      <div class="my-5 form-group">
        <label for="name" class="mb-2">Classroom Name</label>
        <input type="text" class="form-control" name="name">
        @error('name')
            <p class="text-danger">
                {{$message}}
            </p>
        @enderror
    </div>
    <input type="submit" value="Add Class" class="w-100 btn btn-success">
</form>
@endsection
