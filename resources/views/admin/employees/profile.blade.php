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
                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Profil</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h5 class="text-center mt-2">Profil Karyawan</h5>
                    </div>
                    <div class="card-body">
                        @include('messages.alerts')
                        <div class="row mb-3">
                            <div class="col text-center">
                                <img src="/storage/employee_photos/{{ $employee->photo }}" class="rounded-circle img-fluid" alt="Foto"
                                     style="box-shadow: 2px 4px rgba(0,0,0,0.1); width: 180px; height: 180px; object-fit: cover;">
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover profile-table">
                                <tr>
                                    <td>Nama Awal</td>
                                    <td>{{ $employee->first_name }}</td>
                                </tr>
                                <tr>
                                    <td>Nama Akhir</td>
                                    <td>{{ $employee->last_name }}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Lahir</td>
                                    <td>{{ Carbon\Carbon::parse($employee->dob)->format('d M, Y') }}</td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td>{{ $employee->sex }}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Bergabung</td>
                                    <td>{{ Carbon\Carbon::parse($employee->join_date)->format('d M, Y') }}</td>
                                </tr>
                                <tr>
                                    <td>Jabatan</td>
                                    <td>{{ $employee->desg }}</td>
                                </tr>
                                <tr>
                                    <td>Department</td>
                                    <td>{{ $employee->department->name }}</td>
                                </tr>
                                <tr>
                                    <td>Gaji</td>
                                    <td>Rp. {{ number_format($employee->salary, 0, ',', '.') }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer text-center" style="height: 2rem;">
                        <!-- Opsional: tombol kembali atau edit -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
