@extends('layouts.master')

@section('title')
    Admin Panel: About Us
@endsection

@section('content')
    <div class="modal fade" id="addAbout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('abouts.store')}}" method="POST">
                    {{csrf_field()}}
                <div class="modal-body">
                        <div class="form-group">
                            <label for="title" class="col-form-label">Title:</label>
                            <input type="text" name="title" class="form-control" id="title-name">
                        </div>
                        <div class="form-group">
                            <label for="sub-title" class="col-form-label">Sub-title:</label>
                            <input type="text" name="sub-title" class="form-control" id="sub-title-name">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Description:</label>
                            <textarea class="form-control" name="desc" id="message-text"></textarea>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                </form>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">About Us</h4>
                    @if (session('status'))
                        <div class="alert alert-dismissable alert-success" role="alert">

                            {{ session('status') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#addAbout" >Add New</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                            <tr><th>
                                    Title
                                </th>
                                <th>
                                    Sub-Title
                                </th>
                                <th>
                                    Description
                                </th>
                                <th>
                                    Edit
                                </th>
                                <th>
                                    Delete
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($abouts as $about)
                            <tr>
                                <td>
                                    {{$about->title}}
                                </td>
                                <td>
                                    {{$about->subtitle}}
                                </td>
                                <td>
                                    {{$about->description}}
                                </td>
                                <td>
                                    <a href="#" class="btn btn-outline-success">EDIT</a>
                                </td>
                                <td>
                                    <a href="#" class="btn btn-outline-danger">DELETE</a>

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
