@extends('layouts.dashboard')
@section('title','Role')
@section('page','Main')
@section('content')

<div class="mb-3">
    {{-- @if(Auth::user()->can('roles.create')) --}}
        <a href="{{ route('roles.create') }}" class="btn btn-sm btn-outline-primary ml-2">Create</a>
    {{-- @endif --}}
    {{-- <a href="{{ route('roles.trash') }}" class="btn btn-sm btn-outline-primary ml-2">Trash</a> --}}
</div>

<x-alert/>


<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Created At</th>
            <th colspan="2"></th> 
        </tr>
    </thead>
    <tbody>
        @forelse ($roles as $role)
            <tr>
                <td>{{ $role->id }}</td>
                <td><a href="{{ route('roles.show',$role->id) }}"> {{ $role->name }}</a></td>
                <td>{{ $role->created_at }}</td>
                <td>
                    @can('roles.update')
                        <a href="{{ route('roles.edit',$role->id) }}" class="btn btn-sm btn-outline-success">Edit</a>
                    @endcan
                </td>
                <td>
                    @can('roles.delete')
                        <form method="POST" action="{{ route('roles.destroy',$role->id) }}">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                            @method('delete')
                        </form>
                    @endcan
                </td>
            </tr>
            @empty
                <tr>
                    <td colspan="4">No role Found</td>
                </tr>
        @endforelse
    </tbody>        
</table>

{{ $roles->withQueryString()->links() }}

@endsection