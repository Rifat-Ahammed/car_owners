@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        <form method="post" action="{{ route('cars.update', $car->id) }} "enctype="multipart/form-data">
                            @csrf
                            @method("put")
                            <div class="mb-3">
                                <label class="form-label">Registration number</label>
                                <input type="text" name="reg_number" value="{{$car->reg_number}}"/>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Brand</label>
                                <input type="text" name="brand" value="{{$car->brand}}"/>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Model</label>
                                <input type="text" name="model" value="{{$car->model}}"/>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">"Image</label>
                                <input class="form-control" type="file" name="image">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Owner: {{$car->owner->name}} {{$car->owner->surname}}</label>
                                {{--                                <select class="form-select" name="owner_id">--}}
                                {{--                                    @foreach($owners as $owner)--}}
                                {{--                                        @if($car->owner_id == $owner->id)--}}
                                {{--                                        <option selected value="{{$owner->id}}">{{$owner->name}} {{$owner->surname}}</option>--}}
                                {{--                                        @else--}}
                                {{--                                        <option value="{{$owner->id}}">{{$owner->name}} {{$owner->surname}}</option>--}}
                                {{--                                        @endif--}}
                                {{--                                    @endforeach--}}
                                {{--                                </select>--}}
                            </div>
                            <button class="btn btn-success">Add</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
