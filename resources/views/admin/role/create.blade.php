@extends('layouts.dashboard')
@section('title','Category')
@section('page','Create')
@section('content')

<form action="{{ route('roles.store') }}" method="POST" style="padding-left:110px">
    @csrf
    <div class="form-group">
        <x-forms.input label="Role Name" name="name" value="" type="text"/>   
    </div>

    <fieldset>
        <legend>Abilities</legend>
        @foreach (config('abilities') as $abilities_code=>$abilities_name)
            <div class="row mb-2">
                <div class="col-md-4">
                    <h5><b>{{ $abilities_name }}</b></h5>
                </div>
                <div class="col-md-2">
                    <input type="radio" name="abilities[{{ $abilities_code }}]" value="allow" checked>Allow
                </div>
                <div class="col-md-2">
                    <input type="radio" name="abilities[{{ $abilities_code }}]" value="deny">Deny
                </div>
                <div class="col-md-2">
                    <input type="radio" name="abilities[{{ $abilities_code }}]" value="inherit">Inherit
                </div>
            </div>
            {{ $abilities_code }}
            <hr>
        @endforeach
    </fieldset>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form> 

@endsection