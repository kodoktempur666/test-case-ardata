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
                        <li class="breadcrumb-item"><a href="{{ route('tasks.index') }}">Task</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Edit Tugas</h5>
            </div>
            <div class="card-body">

                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" id="title" class="form-control @error('title') is-invalid @enderror"
                            name="title" value="{{ old('title', $task->title) }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="assigned_to" class="form-label">Karyawan</label>
                        <select id="assigned_to" class="form-control @error('assigned_to') is-invalid @enderror"
                            name="assigned_to" required>
                            <option value="">-- Pilih Karyawan --</option>
                            @foreach ($employees as $employee)
                                <option value="{{ $employee->id }}"
                                    {{ (old('assigned_to', $task->assigned_to) == $employee->id) ? 'selected' : '' }}>
                                    {{ $employee->full_name }}
                                </option>
                            @endforeach
                        </select>
                        @error('assigned_to')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="due_date" class="form-label">Due Date</label>
                        <input type="datetime-local" id="due_date"
                            class="form-control @error('due_date') is-invalid @enderror"
                            value="{{ old('due_date', \Carbon\Carbon::parse($task->due_date)->format('Y-m-d\TH:i')) }}"
                            name="due_date" required>
                        @error('due_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select id="status" class="form-control @error('status') is-invalid @enderror" name="status"
                            required>
                            <option value="done" {{ old('status', $task->status) == 'done' ? 'selected' : '' }}>Done</option>
                            <option value="pending" {{ old('status', $task->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="on progres" {{ old('status', $task->status) == 'on progres' ? 'selected' : '' }}>On Progres</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea id="description" name="description"
                            class="form-control @error('description') is-invalid @enderror"
                            required>{{ old('description', $task->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-success">Perbarui Tugas</button>
                    <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Batal</a>
                </form>

            </div>
        </div>
    </section>
</div>

@endsection
