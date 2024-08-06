@extends('layouts.front')

@section('content')
<h1 class="text-center text-danger my-5">Hello All student</h1>
<div class="mx-auto my-5 w-75">
<table class="table">
    <thead class="table-dark">
        <th> Id</th>
        <th>image</th>
        <th>name</th>
        <th>phone</th>
        <th>level</th>
        <th>dateofbirth</th>
        <th>address</th>
        <th>classroom</th>
        <th>created at</th>
        <th> Action</th>
    </thead>
    <tbody>

        <?php $i=0?>

        @foreach ($students as $student)
        <?php $i++?>
        <tr>
        <td>{{$student->id}}</td>
        <td>
            <a href="{{$student->image}}" target="_blank">
                <img width="50px" class="" src="{{$student->image}}" alt="">
            </a>
        </td>
        <td>{{$student->name}}</td>
        <td>{{$student->phone}}</td>
        <td>{{$student->level}}</td>
        <td>{{$student->dateofbirth}}</td>
        <td>{{$student->address}}</td>
        <td>{{$student->classroom->name}}</td>
        <td>{{$student->created_at->diffForHumans()}}</td>
        <td style="display: flex;"class="gap-2 ">
            <a href="{{route('student.edit',$student->id)}}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
            <form action="{{route('student.destroy',$student->id)}}" method="post">
                @csrf
                @method('delete')

            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete {{$student->name}}?')"><i class="fa fa-trash"></i></button>
            </form>
        </td>
        </tr>
        @endforeach
        
    </tbody>
</table>
</div>
@endsection
