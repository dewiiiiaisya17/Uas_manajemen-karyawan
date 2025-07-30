<?php

namespace App\Http\Controllers\Employee;

use App\Models\Department;
use App\Models\Employee;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManagerStatic as Image;
use Carbon\Carbon;

class EmployeeController extends Controller
{
    public function index() {
        $data = [
            'employee' => Auth::user()->employee
        ];
        return view('employee.index')->with($data);
    }

    public function profile() {
        $data = [
            'employee' => Auth::user()->employee
        ];
        return view('employee.profile')->with($data);
    }

    public function profile_edit($employee_id) {
        $data = [
            'employee' => Employee::findOrFail($employee_id),
            'departments' => Department::all(),
            'desgs' => ['Manajer', 'Asisten Manajer', 'Projek Manajer', 'Staff']
        ];
        Gate::authorize('employee-profile-access', intval($employee_id));
        return view('employee.profile-edit')->with($data);
    }

    public function profile_update(Request $request, $employee_id) {
        Gate::authorize('employee-profile-access', intval($employee_id));

        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'photo' => 'image|nullable'
        ]);

        $employee = Employee::findOrFail($employee_id);
        $user_employee = User::find($employee->user_id);

        $user_employee->name = $request->first_name . ' ' . $request->last_name;
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->dob = Carbon::parse($request->dob)->format('Y-m-d');
        $employee->sex = $request->gender;
        $employee->join_date = Carbon::parse($request->join_date)->format('Y-m-d');
        $employee->desg = $request->desg;
        $employee->department_id = $request->department_id;

        if ($request->hasFile('photo')) {
            if ($employee->photo !== 'user.png') {
                $old_filepath = public_path('storage/employee_photos/' . $employee->photo);
                if (file_exists($old_filepath)) {
                    unlink($old_filepath);
                }
            }

            $filename_ext = $request->file('photo')->getClientOriginalName();
            $filename = pathinfo($filename_ext, PATHINFO_FILENAME);
            $ext = $request->file('photo')->getClientOriginalExtension();
            $filename_store = $filename . '_' . time() . '.' . $ext;

            $image = $request->file('photo');
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(300, 300);
            $image_resize->save(public_path('storage/employee_photos/' . $filename_store));

            $employee->photo = $filename_store;
        }

        $employee->save();
        $user_employee->save();

        $request->session()->flash('success', 'Profil Anda Berhasil diupdate!');
        return redirect()->route('employee.profile');
    }

    public function reset_password() {
        return view('auth.reset-password');
    }

    public function update_password(Request $request) {
        $user = User::findOrFail(Auth::user()->id);

        if (Hash::check($request->old_password, $user->password)) {
            $user->password = Hash::make($request->password);
            $user->save();

            $request->session()->flash('success', 'Password Berhasil diupdate');
            return back();
        } else {
            $request->session()->flash('error', 'Password lama tidak cocok');
            return back();
        }
    }
}
