@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{__('Owners')}}</div>

                    <div class="card-body">
                        @can('create')
                            <a class="btn btn-info" href="{{route("owners.create")}}">{{__("Add new owners")}}</a>
                        @endcan
                        <hr/>
                        @can('search')
                            <form method="post" action="{{route("owners.search")}}">
                                @csrf
                                <div class="mb-3">
                                    <input class="form-control" name="name"
                                           placeholder="Find owner (by name or surname)" value="{{$searchOwnerName}}">
                                </div>
                                <button class="btn btn-success">Find</button>
                            </form>
                            <hr/>
                        @endcan
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
                                @can('view_specific_owners', $owner)
                                    <tr>
                                        <td>{{$owner->id}}</td>
                                        <td>{{$owner->name}}</td>
                                        <td>{{$owner->surname}}</td>
                                        <td>
                                            @foreach($owner->cars as $car)
                                                {{$car->brand}} {{$car->model}}
                                            @endforeach
                                        </td>

                                        <td style="width: 100px;">
                                            @can('update', $owner)
                                                <a class="btn btn-outline-info"
                                                   href="{{ route("owners.edit",$owner->id) }}">Edit</a>
                                            @endcan
                                        </td>
                                        <td style="width: 100px;">
                                            @can('delete', $owner)
                                                <form method="post" action="{{route('owners.destroy',$owner->id)}}">
                                                    @csrf
                                                    @method("delete")
                                                    <button class="btn btn-outline-danger">Delete</button>
                                                </form>
                                            @endcan
                                        </td>
                                    </tr>
                                @endcan
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
