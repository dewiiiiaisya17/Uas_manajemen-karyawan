@extends('layouts.app')        

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Daftar Absensi</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('employee.index') }}">Dashboard Karyawan</a>
                    </li>
                    <li class="breadcrumb-item active">Daftar Absensi</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Pencarian rentang tanggal -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="text-center text-primary">Cari Absensi dengan Rentang Tanggal</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('employee.attendance.index') }}" method="POST">
                            @csrf
                            <div class="row justify-content-center align-items-center">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Rentang Tanggal</label>
                                        <input type="text" name="date_range" id="date_range" class="form-control text-center" placeholder="DD-MM-YYYY - DD-MM-YYYY">
                                        @error('date_range')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label>&nbsp;</label>
                                    <input type="submit" class="btn btn-primary btn-block" value="Cari">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabel daftar absensi -->
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header text-center">
                        <h5 class="card-title mb-0">Absensi {{ $filter ? 'dari Rentang Tanggal' : '' }}</h5>
                    </div>
                    <div class="card-body">
                        @if ($attendances->count())
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="dataTable">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Tanggal</th>
                                        <th>Status</th>
                                        <th>Waktu Absensi</th>
                                        <th>Lokasi Absensi</th>
                                        <th>Waktu Selesai</th>
                                        <th>Lokasi Selesai</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($attendances as $index => $attendance)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ Carbon\Carbon::parse($attendance->created_at)->format('d-m-Y') }}</td>
                                        <td class="text-center">
                                            @switch($attendance->registered)
                                                @case('ya')
                                                    <span class="badge badge-success">Hadir</span>
                                                    @break
                                                @case('no')
                                                    <span class="badge badge-danger">Absen</span>
                                                    @break
                                                @case('sun')
                                                    <span class="badge badge-info">Minggu</span>
                                                    @break
                                                @case('leave')
                                                    <span class="badge badge-info">Leave</span>
                                                    @break
                                                @case('holiday')
                                                    <span class="badge badge-success">Hari Libur</span>
                                                    @break
                                                @default
                                                    <span class="badge badge-warning">Setengah Jam Kerja</span>
                                            @endswitch
                                        </td>
                                        <td class="text-center">
                                            {{ $attendance->registered === 'ya' || $attendance->registered === null ? Carbon\Carbon::parse($attendance->created_at)->format('H:i:s') : '—' }}
                                        </td>
                                        <td class="text-center">{{ $attendance->entry_location ?? '—' }}</td>
                                        <td class="text-center">
                                            {{ $attendance->exit_location ? Carbon\Carbon::parse($attendance->updated_at)->format('H:i:s') : '—' }}
                                        </td>
                                        <td class="text-center">{{ $attendance->exit_location ?? '—' }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        @else
                        <div class="alert alert-info text-center">
                            <h5>Data Tidak Ditemukan</h5>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('extra-js')
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
            responsive: true,
            autoWidth: false,
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'collection',
                    text: 'Export',
                    buttons: ['copy', 'excel', 'csv', 'pdf']
                }
            ]
        });

        $('#date_range').daterangepicker({
            maxDate: new Date(),
            locale: {
                format: 'DD-MM-YYYY'
            }
        });
    });
</script>
@endsection
