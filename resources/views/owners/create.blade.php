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
                        <form method="post" action="{{ route('owners.store') }}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input class="form-control" type="text" name="name" value=""/>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Surname</label>
                                <input class="form-control" type="text" name="surname" value=""/>
                            </div>
                            <button class="btn btn-success">Add</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
