@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach( $errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="post" action="{{ route('cars.store') }}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Registration number</label>
                                <input type="text" name="reg_number"/>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Brand</label>
                                <input type="text" name="brand"/>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Model</label>
                                <input type="text" name="model"/>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Owner</label>
                                <select class="form-select" name="owner_id">
                                    @foreach($owners as $owner)
                                        <option value="{{$owner->id}}">{{$owner->name}} {{$owner->surname}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button class="btn btn-success">Add</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
