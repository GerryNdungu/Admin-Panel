@extends('layouts.master')

@section('title')
    Registered Roles: Dashboard
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Registered Roles</h4>
                    @if (session('status'))
                        <div class="alert alert-dismissable alert-success" role="alert">

                            {{ session('status') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                            <tr><th>
                                    Name
                                </th>
                                <th>
                                    Phone
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    UserType
                                </th>
                                <th class="text-right">
                                    Edit
                                </th>
                                <th>
                                    Delete
                                </th>
                            </tr></thead>
                            <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>
                                    {{$user->name}}
                                </td>
                                <td>
                                    {{$user->phone}}
                                </td>
                                <td>
                                    {{$user->email}}
                                </td>
                                <td>
                                    {{$user->usertype}}
                                </td>
                                <td class="text-right">
                                    <a href="{{route('users.edit',$user->id)}}" class="btn btn-outline-success">Edit</a>
                                </td>
                                <td>
                                    <form action="{{route('users.destroy',$user->id)}}" method="post">
                                        {{method_field('delete')}}
                                        {{csrf_field()}}
                                        <button type="submit" class="btn btn-outline-danger">Delete</button>
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

@section('scripts')
@endsection
