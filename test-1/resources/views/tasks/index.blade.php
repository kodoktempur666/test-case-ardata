@extends('layouts.dashboard')

@section('content')

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Task</h3>
                    <p class="text-subtitle text-muted">Handle Tugas Karyawan</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page">Task</li>
                            <li class="breadcrumb-item active" aria-current="page">Index</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">
                        Data
                    </h5>
                </div>
                <div class="card-body">
                    <div class="d-flex">
                        <a href="" class="btn btn-primary mb-3 ms-auto">Tambah Tugas Baru</a>

                    </div>
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Assign To</th>
                                <th>Due Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $task)
                                <tr>
                                    <td>{{ $task->title }}</td>
                                    <td>{{ $task->employee->full_name }}</td>
                                    <td>{{ \Carbon\Carbon::parse($task->due_date)->format('d M Y') }}</td>
                                    <td>
                                        @if($task->status == 'pending')
                                            <span class="text-warning">{{ $task->status }}</span></span>
                                        @elseif($task->status == 'done')
                                            <span class="text-success">{{$task->status}}</span></span>
                                        @else
                                            <span class="text-info">{{ $task->status }}</span></span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="" class="btn btn-info btn-sm">View</a>
                                        <a href="" class="btn btn-success btn-sm">Mark Done</a>
                                        <a href="" class="btn btn-warning btn-sm">Mark Pending</a>
                                        <a href="" class="btn btn-white btn-sm">Edit</a>
                                        <a href="" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>

        </section>
    </div>
@endsection