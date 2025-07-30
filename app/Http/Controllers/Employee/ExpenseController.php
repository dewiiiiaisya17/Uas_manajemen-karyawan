<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use App\Models\Expense;

class ExpenseController extends Controller
{
    public function index()
    {
        $employee = Auth::user()->employee;
        $expenses = Expense::where('employee_id', $employee->id)->latest()->get();
        return view('employee.expenses.index', compact('expenses', 'employee'));
    }

    public function create()
    {
        $employee = Auth::user()->employee;

        // Dummy perhitungan jam & biaya lembur — kamu bisa ubah ke hitung dari database
        $jumlah_jam_lembur = 3;
        $overtime_cost = 20000;
        $upah_lembur = $jumlah_jam_lembur * $overtime_cost;

        return view('employee.expenses.create', compact('employee', 'jumlah_jam_lembur', 'overtime_cost', 'upah_lembur'));
    }

    public function store(Request $request, $employee_id)
    {
        $request->validate([
            'reason' => 'required|string',
            'description' => 'required|string',
            'receipt' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $fileName = null;

        if ($request->hasFile('receipt')) {
            $file = $request->file('receipt');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/receipts', $fileName);
        }

        Expense::create([
            'employee_id' => $employee_id,
            'reason' => $request->input('reason'),
            'description' => $request->input('description'),
            'amount' => $request->input('amount'),
            'receipt' => $fileName,
        ]);

        return redirect()->route('employee.expenses.index')->with('success', 'Pengajuan berhasil disimpan.');
    }

    public function show($id)
    {
        $expense = Expense::findOrFail($id);
        Gate::authorize('employee-expenses-access', $expense);

        return view('employee.expenses.show', compact('expense'));
    }

    public function destroy($id)
    {
        $expense = Expense::findOrFail($id);
        Gate::authorize('employee-expenses-access', $expense);

        if ($expense->receipt) {
            $filepath = storage_path('app/public/receipts/' . $expense->receipt);
            if (File::exists($filepath)) {
                File::delete($filepath);
            }
        }

        $expense->delete();

        return redirect()->route('employee.expenses.index')->with('success', 'Data pengajuan berhasil dihapus.');
    }
}
