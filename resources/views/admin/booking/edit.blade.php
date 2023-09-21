@extends('layouts.dashboard')
@section('title','Category')
@section('page','Edit')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Edit Category</h4>
        <form class="forms-sample" method="POST" action="{{ route('categories.update',$category->id) }}">
            @csrf
            @method('put')
          <div class="form-group">
            <x-forms.input label="Category Name" name="name" value="{{ $category->name }}" /> 
          </div>
          
          <div class="form-group">
            <x-forms.text-area label="Description" name="description" value="{{ $category->description }}"  />
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <x-forms.radio label="Status" name="status" :checked="$category->status" :options="['active'=>'Active','archived'=>'Archived']"/>
            </div>
          </div>
          <button type="submit" class="btn btn-primary me-2">Update</button>
          <button class="btn btn-dark"><a style="text-decoration:none" href="{{ route('categories') }}">
                Cancle</a></button>
        </form>
      </div>
    </div>
  </div>
@endsection
