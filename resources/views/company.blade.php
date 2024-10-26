@extends('main')

@section('title', 'Category')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            @if(session('delete'))
            <div class="alert alert-success" role="alert">
                {{session('delete')}}
            </div>
            @endif
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Companies</h1>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-sm-6 mt-2">
                    <a href="/createcompany" class="btn btn-primary">Create</a>

                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-10">
                    <form action="{{route('company.search')}}" method="get">
                        @csrf
                        <input type="text" class="form-control m-3" id="username0" name="search">
                </div>
                <div class="col-1">
                    <input type="submit" value="search" class="btn btn-primary m-3" name="ok">
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <table class="table table-striped">
                        <tr>
                            <th>ID</th>
                            <th>CompanyName</th>
                            <th>Update</th>
                            <th>Delete</th>
                            <th>Detail</th>
                        </tr>
                        @foreach ($models as $model)
                        <tr>
                            <th>{{$model->id}}</th>
                            <td>{{$model->name}}</td>
                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal{{$model->id}}">
                                    Update
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal{{$model->id}}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel{{$model->id}}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('company.update',   $model->id  )}}"
                                                    method="post">
                                                    @csrf
                                                    @method('put')
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Company
                                                            Name</label>
                                                        <input type="text" class="form-control" name="name"
                                                            value="{{$model->name}}">
                                                    </div>


                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-success">Update</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <form action="/company/{{$model->id}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                            <td>
                                <a href="/detailcompany/{{$model->id}}" class="btn btn-warning">show
                                    </a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    {{ $models->links() }}
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
@endsection