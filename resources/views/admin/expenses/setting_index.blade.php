@extends('layouts.app')        

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Setting Lembur</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.index') }}">Admin Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Setting Lembur</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10 col-xl-8 mx-auto">
                @include('messages.alerts')
                @error('status')
                    <div class="alert alert-danger text-center">Pilih Status Validasi</div>
                @enderror

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Daftar Setting Lembur per Department</h3>
                    </div>
                    <div class="card-body">
                        @if ($departments->count())
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered" id="dataTable">
                                <thead class="thead-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Department</th>
                                        <th>Batas Awal</th>
                                        <th>Batas Akhir</th>
                                        <th>Upah/Jam</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($departments as $index => $department)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $department->name }}</td>
                                        <td>{{ $department->overtime_start }}</td>
                                        <td>{{ $department->overtime_end }}</td>
                                        <td>Rp. {{ number_format($department->overtime_cost, 0, ',', '.') }}</td>
                                        <td>
                                            <a href="{{ route('admin.expenses.setting_edit', $department->id) }}" class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @else
                        <div class="alert alert-info text-center w-75 mx-auto">
                            <h5>Belum ada data pengaturan lembur.</h5>
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
        ],
        columnDefs: [
            { responsivePriority: 1, targets: 0 },
            { responsivePriority: 2, targets: -1 }
        ]
    });
});
</script>
@endsection
