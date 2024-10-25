@extends('main')
@section('title', 'Category')
@section('content')
<div class="content-wrapper">
  <a href="/" class="btn btn-primary m-2">Create</a>

  <form action="/create" method="post">
    @csrf
    <div class="card-body">
      <div class="row">
        <div class="form-group col-5"> <!-- 12 kolonkali bo'lishi uchun o'zgartirildi -->
          <label for="username">ProductName</label>
          <input type="text" class="form-control @error('name') is-invalid @enderror" id="username" placeholder="Enter Productname" name="name" value="{{ old('name') }}">

          @error('name')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
          @enderror
        </div>
      </div>
      <div class="row">
        <div class="form-group col-5"> <!-- 12 kolonkali bo'lishi uchun o'zgartirildi -->
          <label for="price">Price</label>
          <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" placeholder="Enter Product price" name="price" value="{{ old('price') }}">

          @error('price')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
          @enderror
        </div>
      <div class="row">
        <div class="form-group col-5"> <!-- 12 kolonkali bo'lishi uchun o'zgartirildi -->
          <label for="count">Count</label>
          <input type="number" class="form-control @error('count') is-invalid @enderror" id="count" placeholder="Enter Product count" name="count" value="{{ old('count') }}">

          @error('count')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
          @enderror
        </div>
      </div>
    </div>
    <div class="row mt-3">
        <div class="form-group col-5">
          <label for="category">Users</label>
          <option value=""></option>
          <select class="form-control @error('user') is-invalid @enderror" id="user" name="user_id">
            @foreach($users as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
          </select>
          @error('category')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
          @enderror
        </div>
      </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
</div>
@endsection
