@extends('layouts.app')        

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Daftar Hari Libur</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('employee.index') }}">Dashboard Karyawan</a>
                    </li>
                    <li class="breadcrumb-item active">
                        Daftar Hari Libur
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
            <div class="col-12"> <!-- Full width -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Daftar Hari Libur</h3>
                    </div>
                    <div class="card-body">
                        @if ($holidays->count())
                        <table class="table table-bordered table-hover" id="dataTable">
                            <thead class="text-center">
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Bulan</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Berakhir</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($holidays as $index => $holiday)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $holiday->name }}</td>
                                    <td>{{ Carbon\Carbon::parse($holiday->start_date)->format('F') }}</td>
                                    <td>{{ Carbon\Carbon::parse($holiday->start_date)->format('d')}}</td>
                                    @if($holiday->end_date) 
                                    <td>{{ Carbon\Carbon::parse($holiday->end_date)->format('d') }}</td>
                                    @else
                                    <td>Sehari</td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                        <div class="alert alert-info text-center">
                            <h4>Tidak Ada Data</h4>
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
$(document).ready(function(){
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
});
</script>
@endsection
