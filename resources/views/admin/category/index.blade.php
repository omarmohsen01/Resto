@extends('layouts.dashboard')
@section('title','Category')
@section('page','Main')
@section('content')
      <div class="row">
        <div class="grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Categories</h4>
              <a href="{{ route('categories.create') }}" class="btn btn-sm btn-outline-primary ml-2"><i class="mdi mdi-plus"></i>Create Category</a>
              </p>
              <form action="{{ URL::current() }}" method="get" class="d-flex justify-content-between">
                 <x-forms.input name="name" placeholder="Category"/>
                 <select name="status" class="form-control">
                  <option value="">ALL</option>
                  <option value="active">Active</option>
                  <option value="archived">Archived</option>
                 </select>
                 <button class="btn btn-dark">Search</button>
              </form>
              <div class="table-responsive">
                <x-alert/>
                <table class="table">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Created</th>
                      <th>Status</th>
                      <th colspan="2"></th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->created_at }}</td>
                            <td><label class="{{ ($category->status=='active')?'badge badge-success':'badge badge-danger' }}">
                                {{ $category->status }}</label>
                            </td>
                            <td>
                                <a href="{{ route('categories.edit',$category->id) }}" class="btn btn-outline-success">
                                  <i class="mdi mdi-update"></i>Edit</a>
                            </td>
                            <td>
                                <form method="POST" action="{{ route('categories.destroy',$category->id) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger"><i class="mdi mdi-delete"></i>Delete</button>
                                    @method('delete')
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9">No Category Found</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
              </div>
            </div>
    {{ $categories->withQueryString()->links() }}

@endsection