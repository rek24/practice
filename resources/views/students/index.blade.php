@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ __('Student Management') }}</h1>
            </div>
        </div>
    </div>
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <a href="{{ route('students.create') }}" class="btn btn-info mb-3">Add New Student</a>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Student List</h3>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered table-striped text-black">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Middle Name</th>
                                    <th>Age</th>
                                    <th>Address</th>
                                    <th>Zip</th>
                                    <th>Actions</th>
                                    <th>Feedback</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $items)
                                <tr>
                                    <td>{{ $items->id }}</td>
                                    <td>{{ $items->fname }}</td>
                                    <td>{{ $items->lname }}</td>
                                    <td>{{ $items->midname }}</td>
                                    <td>{{ $items->age }}</td>
                                    <td>{{ $items->address }}</td>
                                    <td>{{ $items->zip }}</td>
                                    <td>
                                        <a href="{{ route('students.edit', $items->id) }}"
                                            class="btn btn-success btn-sm">Edit</a>
                                        <a href="{{ route('students.delete', $items->id) }}"
                                            class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="card-footer">
                        {{-- Optional: Add pagination or footer text --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection