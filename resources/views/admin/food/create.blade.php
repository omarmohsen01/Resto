@extends('layouts.dashboard')
@section('title','Food')
@section('page','Create')
@section('content')
<div class="col-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Create Food</h4>
      <form class="forms-sample" method="POST" action="{{ route('foods.store') }}">
        @csrf
        <div class="form-group">
          <x-forms.input label="Food Name" name="name" value="" />
        </div>

        <hr>

        <div class="form-group">
          <label for="">Category</label>
          <select name="category_id" class="form-control" style="width: 450px">
            @foreach (App\Models\Category::all() as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
          </select>
          @error('category_id')
          <div class="text-danger" style="width: 450px">{{ $message }}</div>
          @enderror
        </div>

        <hr>

        <h3 class="text-primary">Price</h3>
        <div class="form-group">
          <label>Small Price</label>
          <input type="number" name="small" class="form-control" />
          <label>Medium Price</label>
          <input type="number" name="medium" class="form-control" />
          <label>Large Price</label>
          <input type="number" name="large" class="form-control" />
        </div>

        <hr>

        <h3 class="text-primary">Compare Price</h3>
        <div class="form-group">
            <label>Small Compare Price</label>
            <input type="number" name="compare_price_small" class="form-control" />
            <label>Medium Compare Price</label>
            <input type="number" name="compare_price_medium" class="form-control"/>
            <label>Large Compare Price</label>
            <input type="number" name="compare_price_large" class="form-control"/>
        </div>

        <hr>

        <div class="form-group">
          <x-forms.text-area label="Description" name="description" vlaue="" />
        </div>

        <hr>

        <div class="col-md-6">
          <div class="form-group">
            <x-forms.radio label="Status" name="status" :options="['active'=>'Active','archived'=>'Archived']" />
          </div>
        </div>
        <button type="submit" class="btn btn-primary me-2">Submit</button>
        <button class="btn btn-dark"><a style="text-decoration:none" href="{{ route('foods') }}">
            Cancle</a></button>
      </form>
    </div>
  </div>
</div>
@endsection