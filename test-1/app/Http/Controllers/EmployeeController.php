<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;


class EmployeeController extends Controller
{
    // menampilkan semua data karyawan
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }

    // membuat data karyawan baru
    public function create()
    {
        return view('employees.create');
    }

    // menyimpan data karyawan baru
    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email',
            'phone_number' => 'nullable|string|max:20',
            'address' => 'required|string',
            'birth_date' => 'required|date',
            'hire_date' => 'required|date',
            'status' => 'required|in:active,inactive',
        ]);

        \App\Models\Employee::create([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'birth_date' => $request->birth_date,
            'hire_date' => $request->hire_date,
            'status' => $request->status,
        ]);

        return redirect()->route('employees.index')->with('success', 'Karyawan baru berhasil ditambahkan.');
    }

    // mengedit data karyawan
    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }
    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email,' . $employee->id,
            'phone_number' => 'nullable|string|max:20',
            'address' => 'required|string',
            'birth_date' => 'required|date',
            'hire_date' => 'required|date',
            'status' => 'required|in:active,inactive',
        ]);

        $employee->update($request->all());

        return redirect()->route('employees.index')->with('success', 'Data karyawan berhasil diperbarui.');
    }

    // menghapus data karyawan
    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Karyawan berhasil dihapus.');
    }




}
