@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{__('Cars')}}</div>

                    <div class="card-body">
                        @can('create')
                            <a class="btn btn-info" href="{{route("cars.create")}}">{{__('Add new car')}}</a>
                        @endcan
                        @can('search')
                            <hr/>
                            <form method="post" action="{{route("cars.search")}}">
                                @csrf
                                <div class="mb-3">
                                    <input class="form-control" name="name"
                                           placeholder="Find car (by registration number, brand or model)"
                                           value="{{$searchCarName}}">
                                </div>
                                <button class="btn btn-success">Find</button>
                            </form>
                            <hr/>
                        @endcan
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
                                @can('view_specific_cars', $car)
                                    <tr>
                                        <td>
                                            @if ($car->image!=null)
                                                <img src="{{asset("/storage/cars/".$car->image)}}" width="100">
                                            @endif
                                        </td>
                                        <td>{{$car->id}}</td>
                                        <td>{{$car->reg_number}}</td>
                                        <td>{{$car->brand}} {{$car->model}}</td>
                                        <td>{{$car->owner->name}} {{$car->owner->surname}}</td>

                                        <td style="width: 100px;">
                                            @can('update_car', $car)
                                                <a class="btn btn-outline-info"
                                                   href="{{ route("cars.edit",$car->id) }}">Edit</a>
                                            @endcan
                                        </td>
                                        <td style="width: 100px;">
                                            @can('delete_car', $car)
                                                <form method="post" action="{{route('cars.destroy',$car->id)}}">
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
