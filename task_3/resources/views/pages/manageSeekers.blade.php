@extends('layouts.app')
@section('content')

<table class="table table-borded">
    <tr>
        <th>Seeker ID</th>
        <th>Seeker Name</th>
        <th>Seeker Email</th>
        <th>Seeker Phone</th>
        <th>Seeker Username</th>
        <th>Seeker Date Of Birth</th>
        <th>Seeker Gender</th>
        <th></th>
    </tr>
    @foreach($seekers as $seeker)
        <tr>
            <td>{{$seeker->id}}</td>
            <td>{{$seeker->name}}</td>
            <td>{{$seeker->email}}</td>
            <td>{{$seeker->phone}}</td>
            <td>{{$seeker->username}}</td>
            <td>{{$seeker->dob}}</td>
            <td>{{$seeker->gender}}</td>
            <td><a href="/seeker/edit/{{$seeker->id}}/{{$seeker->name}}" class="btn btn-primary">Edit</a></td>
            <td><a href="/seeker/delete/{{$seeker->id}}/{{$seeker->name}}" class="btn btn-danger">Delete</a></td>
        </tr>
    @endforeach
</table>

@endsection