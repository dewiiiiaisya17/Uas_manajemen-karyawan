@extends('layouts.app')        

@section('content')
<!-- Content Header -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Daftar Cuti Karyawan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard Admin</a></li>
                    <li class="breadcrumb-item active">Daftar Cuti Karyawan</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<!-- Main Content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-10 mx-auto">
                @include('messages.alerts')

                @error('status')
                    <div class="alert alert-danger">Pilih Opsi Valid</div>
                @enderror

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Daftar Cuti</h3>
                    </div>

                    <div class="card-body">
                        @if ($leaves->count())
                        <table class="table table-bordered table-hover" id="dataTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Pengajuan</th>
                                    <th>Nama</th>
                                    <th>Departemen</th>
                                    <th>Jabatan</th>
                                    <th>Alasan</th>
                                    <th>Status</th>
                                    <th class="none">Setengah Hari?</th>
                                    <th class="none">Tanggal Awal</th>
                                    <th class="none">Tanggal Akhir</th>
                                    <th class="none">Deskripsi</th>
                                    <th class="none">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($leaves as $leave)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ \Carbon\Carbon::parse($leave->created_at)->format('d-m-Y') }}</td>
                                    <td>{{ $leave->employee->first_name . ' ' . $leave->employee->last_name }}</td>
                                    <td>{{ $leave->employee->department }}</td>
                                    <td>{{ $leave->employee->desg }}</td>
                                    <td>{{ $leave->reason }}</td>
                                    <td>
                                        <span class="badge badge-pill
                                            @if ($leave->status == 'pending') badge-warning
                                            @elseif ($leave->status == 'ditolak') badge-danger
                                            @elseif ($leave->status == 'diterima') badge-success
                                            @endif">
                                            {{ ucfirst($leave->status) }}
                                        </span>
                                    </td>
                                    <td>{{ ucfirst($leave->half_day) }}</td>
                                    <td>{{ \Carbon\Carbon::parse($leave->start_date)->format('d-m-Y') }}</td>
                                    <td>
                                        @if($leave->end_date) 
                                            {{ \Carbon\Carbon::parse($leave->end_date)->format('d-m-Y') }}
                                        @else
                                            Sehari
                                        @endif
                                    </td>
                                    <td>{{ $leave->description }}</td>
                                    <td>
                                        <button class="btn btn-info btn-sm"
                                            data-toggle="modal"
                                            data-target="#updateStatusModal{{ $leave->id }}">
                                            Ubah Status
                                        </button>
                                    </td>
                                </tr>

                                <!-- Modal Ubah Status -->
                                <div class="modal fade" id="updateStatusModal{{ $leave->id }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel{{ $leave->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="card card-info mb-0">
                                                <div class="card-header text-center">
                                                    <h5>Ubah Status Cuti</h5>
                                                </div>
                                                <form action="{{ route('admin.leaves.update', $leave->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="card-body text-center">
                                                        <div class="form-group">
                                                            <label>Pilih Status</label>
                                                            <select name="status" class="form-control mx-auto" style="width: 80%;">
                                                                <option hidden disabled selected value> -- Pilih -- </option>
                                                                <option value="pending">Pending</option>
                                                                <option value="diterima">Diterima</option>
                                                                <option value="ditolak">Ditolak</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer text-center">
                                                        <button type="submit" class="btn btn-info">Update</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                        <div class="alert alert-info text-center w-75 mx-auto">
                            <h4>Data Tidak Ada</h4>
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
                    buttons: ['copy','excel', 'csv', 'pdf']
                }
            ]
        });
        $('[data-toggle="popover"]').popover();
        $('[data-toggle="tooltip"]').tooltip({ trigger: 'hover' });
    });
</script>
@endsection
