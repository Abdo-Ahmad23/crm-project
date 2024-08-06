@extends('layouts.front')

@section('content')
    <h1 class="text-center text-danger my-5">Edit student</h1>

    <form action="{{route('student.update',$student->id)}}" enctype="multipart/form-data" method="post" class="w-75 mx-auto my-5">
        {{-- action="{{ route('classroom.update',$classroom->id) }}" --}}
        @csrf
        @method('put')
        <div class="my-2 form-group">
            <label for="name" class="mb-2">Student Name</label>
            <input value='{{$student->name}}'  type="text" class="form-control" name="name">
            @error('name')
                <p class="text-danger">
                    {{$message}}
                </p>
            @enderror

        </div>

        <div class="my-2 form-group">
            <label for="phone" class="mb-2">Student phone</label>
            <input value='{{$student->phone}}'  type="text" class="form-control" name="phone">
            @error('phone')
                <p class="text-danger">
                    {{$message}}
                </p>
            @enderror

        </div>
        <div class="my-2 form-group">
            <label for="level" class="mb-2">Student level</label>
            <input value='{{$student->level}}'  type="text" class="form-control" name="level">
            @error('level')
                <p class="text-danger">
                    {{$message}}
                </p>
            @enderror

        </div>
        <div class="my-2 form-group">
            <label for="dateofbirth" class="mb-2"> date of birth</label>
            <input value='{{$student->dateofbirth}}'  type="date" class="form-control" name="dateofbirth">
            @error('dateofbirth')
                <p class="text-danger">
                    {{$message}}
                </p>
            @enderror

        </div>
        <div class="my-2 form-group">
            <label for="address" class="mb-2">Student address</label>
            <input  value='{{$student->address}}'  type="text" class="form-control" name="address">
            @error('address')
                <p class="text-danger">
                    {{$message}}
                </p>
            @enderror

        </div>
        <div class="my-2 form-group">
            <label for="Student_id" class="mb-2">Student Classroom</label>

            <select name="classroom_id">
                <option selected disabled class="form-control" >Choose Classroom</option>
                @foreach ($classrooms as $classroom)
                <option @selected($student->classroom_id==$classroom->id) value="{{$classroom->id}}">{{$classroom->name}}</option>
                @endforeach
                {{-- @dd($classrooms) --}}
            </select>
            @error('classroom_id')
                <p class="text-danger">
                    {{$message}}
                </p>
            @enderror

        </div>
        <div class="my-2 form-group">
            <label for="name" class="mb-2">Student image</label>

            <input type="file" class="form-control" name="image">
            @error('image')
                <p class="text-danger">
                    {{$message}}
                </p>
            @enderror

        </div>
        <input type="submit" value="Update Class" class="w-100 btn btn-warning">
    </form>
@endsection
