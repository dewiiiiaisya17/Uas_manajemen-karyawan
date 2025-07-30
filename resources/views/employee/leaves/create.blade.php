<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Employee;

class EmployeeLeaveController extends Controller
{
    public function create()
    {
        // Ambil data employee dari user yang login
        $employee = Auth::user()->employee;

        // Kirim ke view
        return view('employee.expenses.create')->with('employee', $employee);
    }

    public function store(Request $request, $employee_id)
    {
        // Validasi form
        $this->validate($request, [
            'reason' => 'required',
            'description' => 'required',
            'date_range' => 'required',
        ]);

        // Simpan data cuti ke database
        // (Anda bisa sesuaikan dengan model Leave/LeaveRequest jika sudah ada)
        // Contoh:
        // Leave::create([...]);

        $request->session()->flash('success', 'Pengajuan cuti berhasil dikirim!');
        return redirect()->route('employee.index');
    }
}
