@extends('layouts.app')        

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Profil</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="#">Home</a>
                    </li>
                    <li class="breadcrumb-item active">
                        Profil
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>

<!-- Main content -->
<section class="content">
    <div class="container-fluid"><!-- full width -->
        <div class="row">
            <div class="col-12"><!-- full width column -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h5 class="text-center mt-2">Profil Saya</h5>
                    </div>
                    <div class="card-body">
                        @include('messages.alerts')
                        <div class="row mb-3 justify-content-center">
                            <div class="col-md-3 text-center">
                                <img src="/storage/employee_photos/{{ $admin->photo }}" class="rounded-circle img-fluid" alt=""
                                style="max-height: 180px; box-shadow: 2px 4px rgba(0,0,0,0.1)">
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover profile-table">
                                <tr>
                                    <th>Nama Awal</th>
                                    <td>{{ $admin->first_name }}</td>
                                </tr>
                                <tr>
                                    <th>Nama Akhir</th>
                                    <td>{{ $admin->last_name }}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal Lahir</th>
                                    <td>{{ Carbon\Carbon::parse($admin->dob)->format('d M, Y') }}</td>
                                </tr>
                                <tr>
                                    <th>Jenis Kelamin</th>
                                    <td>{{ $admin->sex }}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal Bergabung</th>
                                    <td>{{ Carbon\Carbon::parse($admin->join_date)->format('d M, Y') }}</td>
                                </tr>
                                <tr>
                                    <th>Jabatan</th>
                                    <td>{{ $admin->desg }}</td>
                                </tr>
                                <tr>
                                    <th>Department</th>
                                    <td>{{ $admin->department->name }}</td>
                                </tr>
                                <tr>
                                    <th>Gaji</th>
                                    <td>Rp. {{ number_format($admin->salary, 0, ',', '.') }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <a href="{{ route('admin.profile-edit', $admin->id) }}" class="btn btn-flat btn-primary">Edit Profil</a>
                        <a href="{{ route('admin.reset-password') }}" class="btn btn-danger">Ganti Password</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
