@extends('layouts.master')

@section('title')
    Admin Panel: About Us Edit
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit: {{$about->title}} About Us</h4>
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
                    <form action="{{route('abouts.update',$about->id)}}" method="POST">
                        {{csrf_field()}}
                        {{method_field('put')}}
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="title" class="col-form-label">Title:</label>
                                <input type="text" name="title" value="{{$about->title}}" class="form-control" id="title-name">
                            </div>
                            <div class="form-group">
                                <label for="sub-title" class="col-form-label">Sub-title:</label>
                                <input type="text" name="sub-title" value="{{$about->subtitle}}" class="form-control" id="sub-title-name">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Description:</label>
                                <textarea class="form-control" name="desc" id="message-text">{{$about->description}}</textarea>
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

    </div>
@endsection

@section('scripts')
@endsection
