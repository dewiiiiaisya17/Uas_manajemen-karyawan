<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Gate;
use Intervention\Image\ImageManagerStatic as Image;


use App\Models\Employee;
use App\Models\Department;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function reset_password()
    {
        return view('auth.reset-password');
    }

    public function update_password(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);
        if (Hash::check($request->old_password, $user->password) === true) {
            $user->password = Hash::make($request->password);
            $request->session()->flash('success', 'Password Berhasil di Update');
            $user->save();
            return back();
        } else {
            $request->session()->flash('error', 'Password Salah');
            return back();
        }
    }

    public function adminProfile($admin_id)
    {
        $admin = Employee::findOrFail($admin_id);
        return view('admin.profile')->with('admin', $admin);
    }

    public function profile_edit($admin_id)
    {
        Gate::authorize('admin-profile-access', intval($admin_id));

        $data = [
            'admin' => Employee::findOrFail($admin_id),
            'departments' => Department::all(),
            'desgs' => ['Manajer', 'Asistent Manajer', 'Projek Manajer', 'Staff']
        ];

        return view('admin.profile-edit')->with($data);
    }

    public function profile_update(Request $request, $admin_id)
    {
        Gate::authorize('admin-profile-access', intval($admin_id));

        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'photo' => 'image|nullable'
        ]);
    }
}