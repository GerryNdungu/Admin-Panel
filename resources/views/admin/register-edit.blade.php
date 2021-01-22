@extends('layouts.master')

@section('title')
    Edit Registered Roles: Dashboard
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Edit User Role</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="{{route('users.update',[$user->id])}}" method="POST">

{{--                            <form action="/role-update/{{$user->id}}" method="POST">--}}
                                {{csrf_field()}}
                                {{method_field('PUT')}}

                                <div class="form-group">
                                    <label for="name"> User Name</label>
                                    <input type="text" name="username" value="{{$user->name}}" class="form-control">

                                </div>
                                <div class="form-group">
                                    <label for="email">Give Role</label>
                                    <select name="usertype" class="form-control">
                                        <option value="admin" {{$user->usertype == 'admin' ? 'selected': ''}}>Admin</option>
                                        <option value="vendor" {{$user->usertype == 'vendor' ? 'selected': ''}}>Vendor</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>

                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('scripts')
@endsection
