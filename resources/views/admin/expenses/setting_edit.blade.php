@extends('layouts.app')        

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Setting Lembur</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.index') }}">Dashboard Admin</a>
                    </li>
                    <li class="breadcrumb-item active">
                        Edit Setting Lembur
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-lg-6 mx-auto">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Setting Lembur</h3>
                    </div>
                    @include('messages.alerts')
                    <form action="{{ route('admin.expenses.setting_update', $department->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Nama Department</label>
                                <input type="text" name="name" value="{{ $department->name }}" class="form-control">
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="overtime_start">Batas Awal Waktu Lembur</label>
                                <input type="time" name="overtime_start" value="{{ $department->overtime_start }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="overtime_end">Batas Akhir Waktu Lembur</label>
                                <input type="time" name="overtime_end" value="{{ $department->overtime_end }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="overtime_cost">Upah Lembur Per Jam</label>
                                <input type="text" name="overtime_cost" value="{{ $department->overtime_cost }}" class="form-control">
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <button class="btn btn-primary btn-lg px-4" type="submit">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
