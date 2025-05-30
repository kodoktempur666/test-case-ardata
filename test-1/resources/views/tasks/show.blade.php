@extends('layouts.dashboard')

@section('content')
<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Detail Task</h3>
                    <p class="text-subtitle text-muted">Informasi lengkap mengenai tugas yang dipilih.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('tasks.index') }}">Tasks</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $task->title }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{ $task->title }}</h4>
                        </div>
                        <div class="card-body">
                            <p><strong>Description:</strong> {{ $task->description }}</p>
                            <p><strong>Assigned To:</strong> {{ $task->employee->full_name ?? '-' }}</p>
                            <p><strong>Due Date:</strong> {{ \Carbon\Carbon::parse($task->due_date)->format('d M Y') }}</p>
                            <p><strong>Status:</strong> <span class="badge bg-success">{{ $task->status }}</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
