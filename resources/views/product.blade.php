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
                                
                                <td>
                                    <form action="/deleteproduct/{{$model->id}}"  method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                                <td>
                                    <a href="/detailproduct/{{$model->id}}" class="btn btn-warning">show
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
@endsection
