@extends('layouts.dashboard')
@section('title','Food')
@section('page','Edit')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Edit Food</h4>
        <form class="forms-sample" method="POST" action="{{ route('foods.update',$food->id) }}">
            @csrf
            @method('put')
          <div class="form-group">
            <x-forms.input label="food Name" name="name" value="{{ $food->name }}" />
          </div>
        <hr>

          <div class="form-group">
            <label for="">Category</label>
            <select name="category_id" class="form-control" style="width: 450px">
              @foreach (App\Models\Food::all() as $foods)
              <option value="{{ $foods->category_id }}"
                  @selected(old('category_id',$foods->category_id) == $foods->id)>
                  {{ $food->category->name }}
              </option>
              @endforeach
            </select>
            @error('category_id')
            <div class="text-danger" style="width: 450px">{{ $message }}</div>
            @enderror
          </div>
        <hr>

          <div class="form-group">
            <x-forms.text-area label="Description" name="description" value="{{ $food->description }}"  />
          </div>
          <hr>

        <h3 class="text-primary">Price</h3>

          <div class="form-group">
            <label>Small Price</label>
            <input type="number" name="price_small" class="form-control" value="{{ $food->price['small'] }}"/>
            <label>Medium Price</label>
            <input type="number" name="price_medium" class="form-control" value="{{ $food->price['medium'] }}"/>
            <label>Large Price</label>
            <input type="number" name="price_large" class="form-control" value="{{ $food->price['large'] }}"/>
          </div>
          <hr>

        <h3 class="text-primary">Compare Price</h3>

          <div class="form-group">
            <label>Small Compare Price</label>
            <input type="number" name="compare_price_small" class="form-control" value="{{ $food->compare_price['small'] }}"/>
            <label>Medium Compare Price</label>
            <input type="number" name="compare_price_medium" class="form-control" value="{{ $food->compare_price['medium'] }}"/>
            <label>Large Compare Price</label>
            <input type="number" name="compare_price_large" class="form-control" value="{{ $food->compare_price['large'] }}"/>
          </div>
          <hr>

          <div class="col-md-6">
            <div class="form-group">
              <x-forms.radio label="Status" name="status" :checked="$food->status" :options="['active'=>'Active','archived'=>'Archived']"/>
            </div>
          </div>

          <button type="submit" class="btn btn-primary me-2">Update</button>
          <button class="btn btn-dark"><a style="text-decoration:none" href="{{ route('foods') }}">
                Cancle</a></button>
        </form>
      </div>
    </div>
  </div>
@endsection
