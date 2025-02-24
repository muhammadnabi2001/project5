@extends('main')
@section('title', 'Category')
@section('content')
<div class="content-wrapper">
  <a href="/company" class="btn btn-primary m-2">Create</a>

  <form action="/create" method="post">
    @csrf
    <div class="card-body">
      <div class="row">
        <div class="form-group col-5">
          <label for="username">CompanyName</label>
          <input type="text" class="form-control @error('name') is-invalid @enderror" id="username" placeholder="CompanyName" name="name" value="{{ old('name') }}">

          @error('name')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
          @enderror
        </div>
      </div>
      
      <div class="row mt-3">
        <div class="form-group col-5">
          <label for="category">Users</label>
          <select class="form-control @error('user_id') is-invalid @enderror" id="user_id" name="user_id">
            <option value=""></option>
            @foreach($users as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
          </select>
          @error('user_id')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
          @enderror
        </div>
      </div>
    </div>

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
</div>
@endsection
