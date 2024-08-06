@extends('layouts.front')

@section('content')
<h1 class="text-center text-danger my-5">Hello All Classroom</h1>
<div class="mx-auto my-5 w-75">
<table class="table">
    <thead class="table-dark">
        <th> Id</th>
        <th> Name</th>
        <th> Count</th>
        <th> Date</th>
        <th> Action</th>
    </thead>
    <tbody>
        @foreach ($classrooms as $classroom)
        <tr>
        <td>{{$classroom->id}}</td>
        <td>{{$classroom->name}}</td>
        <td>{{$classroom->student->count()}}</td>
        <td>{{$classroom->created_at->diffForHumans()}}</td>
        <td style="display: flex;"class="gap-2 ">
            <a href="{{route('classroom.edit',$classroom->id)}}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
            <form action="{{route('classroom.destroy',$classroom->id)}}" method="post">
                @csrf
                @method('delete')

            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete {{$classroom->name}}?')"><i class="fa fa-trash"></i></button>
            </form>
        </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection
