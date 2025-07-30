@extends('layouts.app')        

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Register Absensi</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('employee.index') }}">Dashboard Karyawan</a>
                    </li>
                    <li class="breadcrumb-item active">Register Absensi</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- FULL WIDTH -->
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">
                            Absensi Hari ini 
                            <?php $time = date("H:i:s"); $dt = date("d-M-Y"); echo $dt." ".$time; ?>
                        </h3>
                    </div>

                    @include('messages.alerts')

                    @if (!$attendance)
                        <form method="POST" action="{{ route('employee.attendance.store', $employee->id) }}">
                    @else
                        <form method="POST" action="{{ route('employee.attendance.update', $attendance->id) }}">
                            @method('PUT')
                    @endif
                        @csrf
                        <div class="card-body">
                        <?php if(date('H') >= 17) { echo "<div class='alert alert-danger'>Absensi Ditutup</div>"; } else { ?>

                            <!-- WAKTU MASUK -->
                            <div class="row text-center">
                                <div class="col-md-3">
                                    <label>Waktu Absensi</label>
                                    <input type="text" class="form-control text-center" id="entry_time"
                                        value="{{ $attendance ? Carbon\Carbon::parse($attendance->created_at)->format('d-m-Y, H:i:s') : '' }}"
                                        disabled style="{{ $attendance ? 'background:#333; color:#fff' : '' }}">
                                </div>
                                <div class="col-md-6">
                                    <label>Lokasi Absensi</label>
                                    <input type="text" class="form-control text-center" id="entry_loc"
                                        value="{{ $attendance ? $attendance->entry_location : 'Memuat Lokasi...' }}"
                                        disabled style="{{ $attendance ? 'background:#333; color:#fff' : '' }}">
                                    <input type="hidden" name="entry_location" id="entry_location">
                                </div>
                                <div class="col-md-3">
                                    <label>IP Address</label>
                                    <input type="text" class="form-control text-center" id="entry_ip"
                                        value="{{ $attendance ? $attendance->entry_ip : '' }}"
                                        disabled style="{{ $attendance ? 'background:#333; color:#fff' : '' }}">
                                </div>
                            </div>

                            <!-- WAKTU KELUAR -->
                            <div class="row text-center mt-4">
                                <div class="col-md-3">
                                    <label>Waktu Selesai</label>
                                    <input type="text" class="form-control text-center" id="exit_time"
                                        value="{{ $registered_attendance ? Carbon\Carbon::parse($attendance->updated_at)->format('d-m-Y, H:i:s') : '' }}"
                                        disabled style="{{ $registered_attendance ? 'background:#333; color:#fff' : '' }}">
                                </div>
                                <div class="col-md-6">
                                    <label>Lokasi Selesai</label>
                                    <input type="text" class="form-control text-center" id="exit_loc"
                                        value="{{ $registered_attendance ? $attendance->exit_location : 'Memuat Lokasi...' }}"
                                        disabled style="{{ $registered_attendance ? 'background:#333; color:#fff' : '' }}">
                                    <input type="hidden" name="exit_location" id="exit_location">
                                </div>
                                <div class="col-md-3">
                                    <label>IP Address</label>
                                    <input type="text" class="form-control text-center" id="exit_ip"
                                        value="{{ $registered_attendance ? $attendance->exit_ip : '' }}"
                                        disabled style="{{ $registered_attendance ? 'background:#333; color:#fff' : '' }}">
                                </div>
                            </div>

                        <?php } ?>
                        </div>

                        <!-- Tombol -->
                        @if (!$registered_attendance && date('H') < 17)
                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-lg btn-primary">
                                {{ !$attendance ? 'Absen Masuk' : 'Absen Keluar/Selesai' }}
                            </button>
                        </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('extra-js')
<script>
$(document).ready(function() {
    if ("geolocation" in navigator) {
        navigator.geolocation.getCurrentPosition(position => {
            $.post("/employee/attendance/get-location", {
                lat: position.coords.latitude,
                lon: position.coords.longitude,
                '_token': $('meta[name=csrf-token]').attr('content'),
            }, function(data) {
                $('#entry_loc').val(data);
                $('#entry_location').val(data);
                $('#exit_loc').val(data);
                $('#exit_location').val(data);
            });
        }, function() {
            $('#entry_loc').val('Izin lokasi ditolak');
        });
    } else {
        $('#entry_loc').val("Geolocation tidak tersedia");
    }

    // Fetch IP address
    fetch("https://api.ipify.org?format=json")
        .then(response => response.json())
        .then(data => {
            $('#entry_ip').val(data.ip);
            $('#exit_ip').val(data.ip);
        });
});
</script>
@endsection
