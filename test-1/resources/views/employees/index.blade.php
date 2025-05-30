@extends('layouts.dashboard')

@section('content')
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="card-title">Daftar Karyawan</h4>
            <a href="{{ route('employees.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Masukkan Karyawan Baru
            </a>

        </div>

        <section class="section">
            <div class="row" id="table-striped">
                <div class="col-12">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>No. Telepon</th>
                                        <th>Alamat</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($employees as $employee)
                                        <tr>
                                            <td class="text-bold-500">{{ $employee->full_name }}</td>
                                            <td>{{ $employee->email }}</td>
                                            <td>{{ $employee->phone_number }}</td>
                                            <td>{{ $employee->address }}</td>
                                            <td>{{ \Carbon\Carbon::parse($employee->birth_date)->format('d M Y') }}</td>
                                            <td>
                                                <a href="{{ route('employees.edit', $employee->id) }}"
                                                    class="btn btn-sm btn-primary">Edit</a>
                                                <form action="{{ route('employees.destroy', $employee->id) }}" method="POST"
                                                    style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Hapus data ini?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>
    </div>

@endsection