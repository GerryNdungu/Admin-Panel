@extends('layouts.master')

@section('title')
    Admin Panel: Titles
@endsection

@section('content')
    {{--Add Modal    --}}
    <div class="modal fade" id="addAbout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Titles</h5>
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
    {{-- Delete Modal    --}}
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="delete-modalForm" method="post">
                    {{method_field('delete')}}
                    {{csrf_field()}}
                <div class="modal-body">
                    <input type="hidden" id="deleteAboutsId">
                    <h5>Are you sure you wish to delete this?</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Yes, Delete it</button>
                </div>
                </form>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Titles</h4>

                    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#addAbout" >Add New</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="datatable">
                            <thead class=" text-primary">
                            <tr>
                                <th>
                                    Id
                                </th>
                                <th>
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
                                <input type="hidden" class="title_delete_val" value="{{$about->id}}">

                                <td>
                                    {{$about->id}}
                                </td>
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
                                    <a href="{{route('abouts.show',$about->id)}}" class="btn btn-outline-success">EDIT</a>
                                </td>
                                <td>
{{--                                    <a href="javascript:void(0)" class="btn btn-outline-danger deletebtn" data-toggle="modal" data-target="#deleteModal">Delete</a>--}}
                                    <button type="button"class="btn btn-outline-danger titledeleteBtn">Delete</button>
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
    <script>
        $(document).ready( function () {
            $('#datatable').DataTable();

            $('#datatable').on('click','.deletebtn', function (){
                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function (){
                    return $(this).text();
                }).get();

                console.log(data);
                $('#deleteAboutsId').val(data[0]);
                $('#delete-modalForm').attr('action','/aboutsd/'+data[0]);
                $('#deleteModal').modal('show');
            });
        } );
    </script>
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.titledeleteBtn').click(function (e) {
                e.preventDefault();

                var delete_id = $(this).closest('tr').find('.title_delete_val').val();
                // alert(delete_id);
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this imaginary file!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((willDelete) => {
                        if (willDelete) {
                            var data = {
                                "_token": $('input[name="_token"]').val(),
                                "id": delete_id,
                            };

                            $.ajax({

                                type: 'DELETE',
                                url: '/titlesd/'+delete_id,
                                data: data,
                                success: function (response) {
                                    swal(response.status, {
                                        icon: "success",
                                    })
                                        .then((result) => {
                                            location.reload();
                                        });
                                }

                            });
                        }
                    });
            });
        });
    </script>
@endsection
