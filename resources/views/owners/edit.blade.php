@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit owner</div>

                    <div class="card-body">
                        <form method="post" action="{{ route('owners.update',$owner->id) }}">
                            @csrf
                            @method("put")
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input class="form-control" type="text" name="name" value="{{$owner->name}}"/>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Surname</label>
                                <input class="form-control" type="text" name="surname" value="{{$owner->surname}}"/>
                            </div>
                            <button class="btn btn-success">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
