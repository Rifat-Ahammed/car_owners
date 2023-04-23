@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{__('Cars')}}</div>

                    <div class="card-body">
                        <a class="btn btn-info" href="{{route("cars.create")}}">{{__('Add new car')}}</a>
                        <hr/>
                        <form method="post" action="{{route("cars.search")}}">
                            @csrf
                            <div class="mb-3">
                                <input class="form-control" name="name"
                                       placeholder="Find car (by registration number, brand or model)" value="{{$searchCarName}}">
                            </div>
                            <button class="btn btn-success">Find</button>
                        </form>
                        <hr/>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Reg. number</th>
                                <th>Model</th>
                                <th>Owner</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cars as $car)
                                <tr>
                                    <td>{{$car->id}}</td>
                                    <td>{{$car->reg_number}}</td>
                                    <td>{{$car->brand}} {{$car->model}}</td>
                                    <td>{{$car->owner->name}} {{$car->owner->surname}}</td>

                                    <td style="width: 100px;">
                                        <a class="btn btn-outline-info" href="{{ route("cars.edit",$car->id) }}">Edit</a>
                                    </td>
                                    <td style="width: 100px;">
                                        <form method="post" action="{{route('cars.destroy',$car->id)}}">
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
