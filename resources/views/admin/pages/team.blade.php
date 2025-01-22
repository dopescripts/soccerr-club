@extends('admin.layout.app')

@section('title', 'Team - ')

@section('content')

<div class="content-wrapper">
    <div class="page-header d-flex justify-content-between">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-warning text-white mr-2">
                <i class="mdi mdi-account-multiple"></i>
            </span> Team
        </h3>
        <button class="btn btn-primary btn-lg btn-icon-text d-inline-flex" type="button" data-bs-toggle="modal"
            data-bs-target="#teamModal"><i class="mdi mdi-plus-circle btn-icon-prepend"></i>
            Add Team member</button>
        <div class="modal fade" id="teamModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header align-items-center">
                        <h5 class="modal-title" id="exampleModalLabel">Add Team</h5>
                        <button class="btn btn-icon" data-bs-dismiss="modal" aria-label="Close">
                            <span><i class="mdi mdi-close"></i></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('team.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="category_name" class="col-form-label">Full Name:</label>
                                <input type="text" class="form-control" id="category_name" name="name"
                                    placeholder="example: Ava elizabeth" required>
                            </div>
                            <div class="form-group">
                                <label for="postname" class="col-form-label">Post:</label>
                                <input type="text" class="form-control" id="postname" name="post"
                                    placeholder="example: Customer Service Lead" required>
                            </div>
                            <div class="form-group">
                                <label>File upload</label>
                                <input type="file" name="image" class="file-upload-default" accept="image/*" required>
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled=""
                                        placeholder="Upload Image">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                    </span>
                                </div>
                            </div>
                            <p>Please upload a portrait image</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Upload</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body table-responsive">
                    @if ($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li class="text-danger">{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Post</th>
                                <th>image</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($teams->count() > 0)
                            @foreach ($teams as $team)
                            <tr>
                                <td>{{ $team->id }}</td>
                                <td>{{ $team->name }}</td>
                                <td>{{ $team->post }}</td>
                                <td><img src="{{ asset('public/team/' . $team->image) }}" alt="" class="img-fluid"></td>
                                <td>
                                    <!-- Pass team data to the edit modal -->
                                    <button class="btn btn-success"
                                        data-bs-target="#CategoryEditModal{{ $team->id }}" data-bs-toggle="modal">
                                        <i class="mdi mdi-pencil"></i>
                                    </button>
                                </td>
                                <td>
                                    <form action="{{ route('team.delete', $team->id) }}" method="get">
                                        @csrf
                                        <button type="submit" class="btn btn-danger"><i
                                                class="mdi mdi-delete"></i></button>
                                    </form>
                                </td>
                            </tr>
                            <div class="modal fade" id="CategoryEditModal{{ $team->id }}" tabindex="-1"
                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header align-items-center">
                                            <h5 class="modal-title" id="exampleModalLabel">Add Team</h5>
                                            <button class="btn btn-icon" data-bs-dismiss="modal" aria-label="Close">
                                                <span><i class="mdi mdi-close"></i></span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="{{ route('team.update', $team->id) }}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="category_name" class="col-form-label">Full Name:</label>
                                                    <input type="text" class="form-control" id="category_name" name="name"
                                                        placeholder="example: Ava elizabeth" required value="{{ $team->name }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="postname" class="col-form-label">Post:</label>
                                                    <input type="text" class="form-control" id="postname" name="post"
                                                        placeholder="example: Customer Service Lead" required value="{{ $team->post }}">
                                                </div>
                                                <div class="form-group">
                                                    <label>File upload</label>
                                                    <input type="file" name="image" class="file-upload-default" accept="image/*" required>
                                                    <div class="input-group col-xs-12">
                                                        <input type="text" class="form-control file-upload-info" disabled=""
                                                            placeholder="Upload Image">
                                                        <span class="input-group-append">
                                                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                                        </span>
                                                    </div>
                                                </div>
                                                <p>Please upload a portrait image</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Upload</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @else
                            <p>No records found</p>
                            @endif
                        </tbody>
                    </table>
                    <div>
                        {{ $teams->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
            @if(session('toast_error'))
                $.toast({
                    heading: 'Delete',
                    text: '{{ session('toast_error') }}',
                    icon: 'error',
                    loaderBg: '#46c35f',
                    position: 'top-right'
                });
            @endif
        });
</script>
@endsection