@extends('layouts.dashboard')
@section('title','Admin')
@section('page','Edit')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Edit Admin</h4>
        <form class="forms-sample" method="POST" action="{{ route('admins.update',$admin->id) }}">
            @csrf
            @method('put')
          <div class="form-group">
            <x-forms.input label="Name" name="name" value="{{ $admin->name }}" />
          </div>

          <div class="form-group">
            <x-forms.input label="Email" name="email" value="{{ $admin->email }}"  />
          </div>

          <div class="form-group">
            <x-forms.input label="Password" name="password" value="{{ $admin->password }}" type="password"/>
          </div>

          <div class="form-group">
            <label for="">Role</label>
            @foreach($roles as $role)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="roles[]" value="{{ $role->id }}">
                    <label class="form-check-label" for="flexRadioDefault1">
                    {{ $role->name }}
                    </label>
                </div>
            @endforeach
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <x-forms.radio label="Super Admin" name="super_admin" :checked="$admin->super_admin" :options="[0=>'No',1=>'Yes']"/>
            </div>
          </div>

          <button type="submit" class="btn btn-primary me-2">Update</button>
          <button class="btn btn-dark"><a style="text-decoration:none" href="{{ route('admins') }}">
                Cancle</a></button>
        </form>
      </div>
    </div>
  </div>
@endsection
