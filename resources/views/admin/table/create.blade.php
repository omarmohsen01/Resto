@extends('layouts.dashboard')
@section('title','Table')
@section('page','Create')
@section('content')
<div class="col-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Create Table</h4>
      <form class="forms-sample" method="POST" action="{{ route('tables.store') }}">
        @csrf
        <div class="form-group">
          <x-forms.input label="Capacity" name="capacity" value="" />
        </div>

        <div class="form-group">
          <x-forms.text-area label="Description" name="description" vlaue="" />
        </div>

        <button type="submit" class="btn btn-primary me-2">Submit</button>
        <button class="btn btn-dark"><a style="text-decoration:none" href="{{ route('tables') }}">
            Cancle</a></button>
      </form>
    </div>
  </div>
</div>
@endsection