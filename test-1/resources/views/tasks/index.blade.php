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
                        <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3 ms-auto">Tambah Tugas Baru</a>

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
                                        <a href="{{ route('tasks.updateStatus', ['task' => $task->id, 'status' => 'done']) }}"
                                            class="btn btn-success btn-sm"
                                            onclick="event.preventDefault(); document.getElementById('mark-done-{{ $task->id }}').submit();">
                                            Mark Done
                                        </a>

                                        <form id="mark-done-{{ $task->id }}"
                                            action="{{ route('tasks.updateStatus', ['task' => $task->id, 'status' => 'done']) }}"
                                            method="POST" class="d-none">
                                            @csrf
                                            @method('PATCH')
                                        </form>

                                        <a href="{{ route('tasks.updateStatus', ['task' => $task->id, 'status' => 'pending']) }}"
                                            class="btn btn-warning btn-sm"
                                            onclick="event.preventDefault(); document.getElementById('mark-pending-{{ $task->id }}').submit();">
                                            Mark Pending
                                        </a>

                                        <form id="mark-pending-{{ $task->id }}"
                                            action="{{ route('tasks.updateStatus', ['task' => $task->id, 'status' => 'pending']) }}"
                                            method="POST" class="d-none">
                                            @csrf
                                            @method('PATCH')
                                        </form>

                                        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-light btn-sm">Edit</a>

                                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST"
                                            style="display:inline-block;"
                                            onsubmit="return confirm('Yakin ingin menghapus tugas ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>

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