@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Owner</div>

                    <div class="card-body">
                        <a class="btn btn-info" href="{{route("owners.create")}}">Add new owners</a>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Surname</th>
                                <th>Cars owner</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($owners as $owner)
                                <tr>
                                    <td>{{$owner->id}}</td>
                                    <td>{{$owner->name}}</td>
                                    <td>{{$owner->surname}}</td>
                                    <td>
                                        @foreach($own->cars as $car)
                                            {{$car->brand}} {{$car->model}}
                                        @endforeach
                                    </td>

                                    <td style="width: 100px;">
                                        <a class="btn btn-outline-info" href="{{ route("owners.edit",$owner->id) }}">Edit</a>
                                    </td>
                                    <td style="width: 100px;">
                                        <form method="post" action="{{route('owners.destroy',$owner->id)}}">
                                            @csrf
                                            @method("delete")
                                            <button class="btn btn-outline-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
