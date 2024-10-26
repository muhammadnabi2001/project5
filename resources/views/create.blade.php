@extends('main')
@section('title', 'Category')
@section('content')
<div class="content-wrapper">
  <a href="/" class="btn btn-primary m-2">Create</a>

  <form action="/create" method="post">
    @csrf
    <div class="card-body">
      <div class="row">
        <div class="form-group col-5">
          <!-- 12 kolonkali bo'lishi uchun o'zgartirildi -->
          <label for="username">Username</label>
          <input type="text" class="form-control @error('name') is-invalid @enderror" id="username"
            placeholder="Enter Username" name="name" value="{{ old('name') }}">

          @error('name')
          <div class="alert alert-danger mt-2">{{ $message }}</div>
          @enderror
        </div>
      </div>
      <div class="row">
        <div class="form-group col-5">
          <!-- 12 kolonkali bo'lishi uchun o'zgartirildi -->
          <label for="email">Email</label>
          <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
            placeholder="Enter useremail" name="email" value="{{ old('email') }}">

          @error('email')
          <div class="alert alert-danger mt-2">{{ $message }}</div>
          @enderror
        </div>
        <div class="row">
          <div class="form-group col-5">
            <!-- 12 kolonkali bo'lishi uchun o'zgartirildi -->
            <label for="email">Password</label>
            <input type="text" class="form-control @error('password') is-invalid @enderror" id="email"
              placeholder="Enter password" name="password" value="{{ old('password') }}">

            @error('password')
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