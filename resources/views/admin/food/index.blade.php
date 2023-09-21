@extends('layouts.dashboard')
@section('title','Food')
@section('page','Main')
@section('content')
      <div class="row">
        <div class="grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Foods</h4>
              <a href="{{ route('foods.create') }}" class="btn btn-sm btn-outline-primary ml-2"><i class="mdi mdi-plus"></i>Create Food</a>
              </p>
              <form action="{{ URL::current() }}" method="get" class="d-flex justify-content-between">
                 <x-forms.input name="name" placeholder="Food"/>
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
                      <th>Category</th>
                      <th>Status</th>
                      <th>S</th>
                      <th>M</th>
                      <th>L</th>
                      <th>Created</th>
                      <th colspan="2"></th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($foods as $food)
                        <tr>
                            <td>{{ $food->id }}</td>
                            <td>{{ $food->name }}</td>
                            <td>{{ $food->category->name }}</td>
                            <td><label class="{{ ($food->status=='active')?'badge badge-success':'badge badge-danger' }}">
                                {{ $food->status }}</label>
                            </td>
                            <td>${{ $food->small }}</td>
                            <td>${{ $food->medium }}</td>
                            <td>${{ $food->large }}</td>
                            <td>{{ $food->created_at }}</td>
                            <td>
                                <a href="{{ route('foods.edit',$food->id) }}" class="btn btn-outline-success">
                                  <i class="mdi mdi-update"></i>Edit</a>
                            </td>
                            <td>
                                <form method="POST" action="{{ route('foods.destroy',$food->id) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger"><i class="mdi mdi-delete"></i>Delete</button>
                                    @method('delete')
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9">No Food Found</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
              </div>
            </div>
    {{ $foods->withQueryString()->links() }}

@endsection