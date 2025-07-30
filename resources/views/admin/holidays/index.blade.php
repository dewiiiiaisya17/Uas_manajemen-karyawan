@extends('layouts.app')        

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Daftar Hari Libur</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard Admin</a></li>
                    <li class="breadcrumb-item active">Daftar Hari Libur</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 mx-auto">
                @include('messages.alerts')
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Daftar Hari Libur</h3>
                    </div>
                    <div class="card-body">
                        @if ($holidays->count())
                        <table class="table table-bordered table-hover" id="dataTable">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Bulan</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Selesai</th>
                                    <th class="none">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($holidays as $holiday)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $holiday->name }}</td>
                                    <td>{{ \Carbon\Carbon::parse($holiday->start_date)->translatedFormat('F') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($holiday->start_date)->format('d M Y') }}</td>
                                    <td>
                                        @if($holiday->end_date)
                                            {{ \Carbon\Carbon::parse($holiday->end_date)->format('d M Y') }}
                                        @else
                                            Sehari
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.holidays.edit', $holiday->id) }}" 
                                           class="btn btn-warning btn-sm" title="Edit Hari Libur">
                                            Edit
                                        </a>
                                        <button class="btn btn-danger btn-sm" 
                                                title="Hapus Hari Libur"
                                                data-toggle="modal" 
                                                data-target="#deleteModal{{ $holiday->id }}">
                                            Hapus
                                        </button>
                                    </td>
                                </tr>

                                <!-- Modal Delete -->
                                <div class="modal fade" id="deleteModal{{ $holiday->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $holiday->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="card card-danger mb-0">
                                                <div class="card-header text-center">
                                                    <h5>Yakin ingin menghapus?</h5>
                                                </div>
                                                <div class="card-body text-center">
                                                    <form action="{{ route('admin.holidays.delete', $holiday->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Ya</button>
                                                        <button type="button" class="btn btn-secondary ml-2" data-dismiss="modal">Tidak</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                        <div class="alert alert-info text-center w-75 mx-auto">
                            <h4>Tidak Ada Data Hari Libur</h4>
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
    });
</script>
@endsection
