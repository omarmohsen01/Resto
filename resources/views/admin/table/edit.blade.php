@extends('layouts.dashboard')
@section('title','Table')
@section('page','Edit')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Edit Table</h4>
        <form class="forms-sample" method="POST" action="{{ route('tables.update',$table->id) }}">
            @csrf
            @method('put')
          <div class="form-group">
            <x-forms.input label="Capacity" name="capacity" value="{{ $table->capacity }}" /> 
          </div>
          
          <div class="form-group">
            <x-forms.text-area label="Description" name="description" value="{{ $table->description }}"  />
          </div>

          <button type="submit" class="btn btn-primary me-2">Update</button>
          <button class="btn btn-dark"><a style="text-decoration:none" href="{{ route('tables') }}">
                Cancle</a></button>
        </form>
      </div>
    </div>
  </div>
@endsection
