@extends('layouts.app')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Tambah Karyawan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.index') }}">Halaman Utama</a>
                    </li>
                    <li class="breadcrumb-item active">Tambah Karyawan</li>
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
                        <h5 class="text-center mt-2">Tambah Karyawan Baru</h5>
                    </div>
                    @include('messages.alerts')
                    <form action="{{ route('admin.employees.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="card-body">
                            <fieldset>
                                <div class="form-group">
                                    <label>Nama Awal</label>
                                    <input type="text" name="first_name" value="{{ old('first_name') }}" class="form-control">
                                    @error('first_name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Nama Akhir</label>
                                    <input type="text" name="last_name" value="{{ old('last_name') }}" class="form-control">
                                    @error('last_name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="email" value="{{ old('email') }}" class="form-control">
                                    @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="dob">Tanggal Lahir</label>
                                    <input type="text" name="dob" id="dob" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select name="sex" class="form-control">
                                        <option hidden disabled selected value> -- Pilih Opsi -- </option>
                                        <option value="Male" {{ old('sex') == 'Male' ? 'selected' : '' }}>Laki-Laki</option>
                                        <option value="Female" {{ old('sex') == 'Female' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                    @error('sex')
                                    <div class="text-danger">Please select an valid option</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="join_date">Tanggal Bergabung</label>
                                    <input type="text" name="join_date" id="join_date" class="form-control">
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Jabatan</label>
                                        <select name="desg" class="form-control">
                                            <option hidden disabled selected value> -- Pilih Opsi -- </option>
                                            @foreach ($desgs as $desg)
                                            <option value="{{ $desg }}" {{ old('desg') == $desg ? 'selected' : '' }}>{{ $desg }}</option>
                                            @endforeach
                                        </select>
                                        @error('desg')
                                        <div class="text-danger">Silahkan Pilih Opsi Valid</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label>Department</label>
                                        <select name="department_id" class="form-control">
                                            <option hidden disabled selected value> -- Pilih Opsi -- </option>
                                            @foreach ($departments as $department)
                                            <option value="{{ $department->id }}" {{ old('department_id') == $department->id ? 'selected' : '' }}>
                                                {{ $department->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('department')
                                        <div class="text-danger">Silahkan Pilih Opsi Valid</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Gaji</label>
                                    <input type="text" name="salary" value="{{ old('salary') }}" class="form-control">
                                    @error('salary')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Foto</label>
                                    <input type="file" name="photo" class="form-control-file">
                                    @error('photo')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" value="{{ old('password') }}" class="form-control">
                                    @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Konfirmasi Password</label>
                                    <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" class="form-control">
                                    @error('password_confirmation')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </fieldset>
                        </div>
                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-flat btn-primary" style="width: 40%; font-size:1.3rem">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('extra-js')
<script>
    $().ready(function () {
        const dobVal = '{{ old('dob') }}';
        const joinVal = '{{ old('join_date') }}';
        if (dobVal) {
            const dob = moment(dobVal, 'DD-MM-YYYY');
            const join_date = moment(joinVal, 'DD-MM-YYYY');
            $('#dob').daterangepicker({
                "startDate": dob,
                "singleDatePicker": true,
                "showDropdowns": true,
                "locale": { "format": "DD-MM-YYYY" }
            });
            $('#join_date').daterangepicker({
                "startDate": join_date,
                "singleDatePicker": true,
                "showDropdowns": true,
                "locale": { "format": "DD-MM-YYYY" }
            });
        } else {
            $('#dob, #join_date').daterangepicker({
                "singleDatePicker": true,
                "showDropdowns": true,
                "locale": { "format": "DD-MM-YYYY" }
            });
        }
    });
</script>
@endsection
