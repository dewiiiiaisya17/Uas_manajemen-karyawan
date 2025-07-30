@extends('layouts.app')        

@section('content')
<!-- Content Header -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Tambah Hari Libur</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.index') }}">Dashboard Admin</a>
                    </li>
                    <li class="breadcrumb-item active">Tambah Hari Libur</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<!-- Main Content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12"> <!-- Full Width -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Form Tambah Hari Libur</h3>
                    </div>

                    @include('messages.alerts')

                    <form action="{{ route('admin.holidays.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Nama Libur</label>
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control" required>
                                @error('name')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Libur Lebih dari 1 Hari?</label>
                                <select name="multiple-days" class="form-control" onchange="toggleDateInput()" id="toggleSelect">
                                    <option value="tidak">Tidak</option>
                                    <option value="ya">Ya</option>
                                </select>
                            </div>

                            <div class="form-group" id="single-date">
                                <label for="date1">Tanggal</label>
                                <input type="text" name="date" id="date1" class="form-control" placeholder="Pilih Tanggal">
                            </div>

                            <div class="form-group d-none" id="multiple-date">
                                <label for="date2">Rentang Tanggal</label>
                                <input type="text" name="date_range" id="date2" class="form-control" placeholder="Pilih Rentang Tanggal">
                                @error('date_range')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-primary px-4">Submit</button>
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
    $(document).ready(function () {
        $('#date1').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            locale: { format: 'DD-MM-YYYY' }
        });

        $('#date2').daterangepicker({
            showDropdowns: true,
            locale: { format: 'DD-MM-YYYY' }
        });
    });

    function toggleDateInput() {
        const isMultiple = $('#toggleSelect').val() === 'ya';
        $('#single-date').toggleClass('d-none', isMultiple);
        $('#multiple-date').toggleClass('d-none', !isMultiple);
    }
</script>
