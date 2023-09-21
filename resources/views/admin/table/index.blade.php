@extends('layouts.dashboard')
@section('title','Table')
@section('page','Main')
@section('content')
      <div class="row">
        <div class="grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Tables</h4>
              <a href="{{ route('tables.create') }}" class="btn btn-sm btn-outline-primary ml-2"><i class="mdi mdi-plus"></i>Create table</a>
              </p>
              
              <div class="table-responsive">
                <x-alert/>
                <table class="table">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Capacity</th>
                      <th colspan="2"></th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($tables as $table)
                        <tr>
                            <td>{{ $table->id }}</td>
                            <td>{{ $table->capacity }}</td>
                            <td>
                                <a href="{{ route('tables.edit',$table->id) }}" class="btn btn-outline-success">
                                  <i class="mdi mdi-update"></i>Edit</a>
                            </td>
                            <td>
                                <form method="POST" action="{{ route('tables.destroy',$table->id) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger"><i class="mdi mdi-delete"></i>Delete</button>
                                    @method('delete')
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9">No table Found</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
              </div>
            </div>
    {{ $tables->withQueryString()->links() }}

@endsection