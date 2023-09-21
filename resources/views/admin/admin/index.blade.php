@extends('layouts.dashboard')
@section('title','Category')
@section('page','Main')
@section('content')

<div class="mb-3">
    @if(Auth::user()->can('admins.create'))
        <a href="{{ route('admins.create') }}" class="btn btn-sm btn-outline-primary ml-2">Create</a>
    @endif
</div>

<x-alert/>
<form action="{{ URL::current() }}" method="get" class="d-flex justify-content-between mbl-4 ml-10">
    <x-forms.input name="name" placeholder="Name" class="mx-2" :value="request('name')"/>
    <x-forms.input name="email" placeholder="Eamil" class="mx-2" :value="request('email')"/>
    <select name="super_admin" class="form-control mx-2" aria-placeholder="Super Admin">
        <option value="">All</option>
        <option value="1" @selected(request('super_admin')==1)>Super Admin</option>
        <option value="0" @selected(request('super_admin')==0)>Admin</option>
    </select>
    <button class="btn btn-dark mx-2">Filter</button>
</form>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Created At</th>
            <th colspan="2"></th>
        </tr>
    </thead>
    <tbody>
        @forelse ($admins as $admin)
            <tr>
                <td>{{ $admin->id }}</td>
                <td>{{ $admin->name }}</td>
                <td>{{ $admin->email }}</td>
                <td>{{ $admin->created_at }}</td>
                <td>
                    @can('admins.update')
                        <a href="{{ route('admins.edit',$admin->id) }}" class="btn btn-sm btn-outline-success">Edit</a>
                    @endcan
                </td>
                <td>
                    @can('admins.delete')
                        <form method="POST" action="{{ route('admins.destroy',$admin->id) }}">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                            @method('delete')
                        </form>
                    @endcan
                </td>
            </tr>
            @empty
                <tr>
                    <td colspan="9">No admin Found</td>
                </tr>
        @endforelse
    </tbody>
</table>

{{ $admins->withQueryString()->links() }}

@endsection
