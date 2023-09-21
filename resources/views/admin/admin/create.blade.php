@extends('layouts.dashboard')
@section('title','Category')
@section('page','Main')
@section('content')
<form action="{{ route('admins.store') }}" method="POST" style="padding-left:110px">
    @csrf
    <div class="form-group">
        <x-forms.input label="Name" name="name" value="" type="text"/>
    </div>

    <div class="form-group">
        <x-forms.input label="Email" name="email" value="" type="email"/>
    </div>

    <div class="form-group">
        <x-forms.input label="Password" name="password" value="" type="password"/>
    </div>


    {{-- <div class="form-group">
        <label for="">Role</label>
        <select name="role_id" aria-placeholder="Role" class="form-control" style="width: 450px">
            @foreach ($roles as $role)
                <option value="{{ $role->id }}">{{ $role->name }}</option>
            @endforeach
        </select>
        @error('role_id')
             <div class="text-danger" style="width: 450px">{{ $message }}</div>
        @enderror
    </div> --}}

    <div class="form-group">
        <label for="">Role</label>
        @foreach($roles as $role)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="roles[{{$role->id}}]" value="{{ $role->id }}">
                <label class="form-check-label" for="flexRadioDefault1">
                {{ $role->name }}
                </label>
            </div>
        @endforeach
    </div>

    <div class="form-group">
        <x-forms.radio label="Super Admin" name="super_admin" :options="[0=>'No',1=>'Yes']"/>
    </div>

    {{-- <div class="form-group">
        <x-forms.input label="Image" type="file" name="image"/>
    </div> --}}

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>

@endsection
