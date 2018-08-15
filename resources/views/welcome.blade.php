@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Auth::check() is the Laravel function to check whether user is logged in or not. It gives true or false as return. -->
    @if (Auth::check()) 
    <h2>Tasks List</h2>
    <a href="/task" class="btn btn-primary">Add new Task</a>
    <table class="table">
        <thead><tr>
                <th colspan="2">Tasks</th>
            </tr>
        </thead>
        <tbody>@foreach($user->tasks as $task)
            <tr>
                <td>
                    {{$task->description}}
                </td>
                <td>

                    <form action="/task/{{$task->id}}">
                        <button type="submit" name="edit" class="btn btn-primary">Edit</button>
                        <button type="submit" name="delete" formmethod="POST" class="btn btn-danger">Delete</button>
                        {{ csrf_field() }}
                    </form>
                    <!-- {{  csrf_field() }} is used to generate csrf token and insert in the form. This token is used to verify that the authenticated logged user is the one making request in application. This is the security feature provided by Laravel out of the box. -->
                </td>
            </tr>
            @endforeach</tbody>
    </table>
    @else
    <h3>You need to log in. <a href="/login">Click here to login</a></h3>
    @endif
</div>
@endsection