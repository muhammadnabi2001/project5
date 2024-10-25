@extends('main')

@section('title', 'Category')

@section('content')
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
                    <h1 class="m-0">Products</h1>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-sm-6 mt-2">
                    <a href="/createproduct" class="btn btn-primary">Create</a>
                    
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <table class="table table-striped">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Count</th>
                            <th>Image</th>
                            <th>Delete</th>
                            <th>Detail</th>
                        </tr>
                        @foreach ($models as $model)
                            <tr>
                                <th>{{$model->id}}</th>
                                <td>{{$model->name}}</td>
                                <td>{{$model->price}}</td>
                                <td>{{$model->count}}</td>
                                <td>
                                    @php
                                        $imagePath = public_path($model->img);
                                    @endphp
                                
                                    @if($model->img && file_exists($imagePath))
                                        <img src="{{ asset($model->img) }}" alt="Product Image" width="100px">
                                    @else
                                        <span class="text-muted">No Image</span>
                                    @endif
                                </td>
                                
                                <td>{{$model->user_id}}</td>                            
                                <td>
                                    <form action="/company/{{$model->id}}"  method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                                <td>
                                    <a href="/detailproduct/{{$model->id}}" class="btn btn-info"><svg xmlns="http://www.w3.org/2000/svg"
                                            width="16" height="16" fill="currentColor" class="bi bi-info"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0" />
                                        </svg></a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection
