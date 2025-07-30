@extends('layouts.app')        

@section('content')
<!-- Content Header -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Hari Libur</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard Admin</a></li>
                    <li class="breadcrumb-item active">Edit Hari Libur</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<!-- Main Content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Form Edit Hari Libur</h3>
                    </div>

                    @include('messages.alerts')

                    <form action="{{ route('admin.holidays.update', $holiday->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Nama Libur</label>
                                <input type="text" name="name" value="{{ $holiday->name }}" class="form-control" required>
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Libur Lebih dari 1 Hari?</label>
                                <select name="multiple-days" id="toggleSelect" class="form-control" onchange="toggleDateInput()">
                                    <option value="tidak" {{ $holiday->end_date ? '' : 'selected' }}>Tidak</option>
                                    <option value="ya" {{ $holiday->end_date ? 'selected' : '' }}>Ya</option>
                                </select>
                            </div>

                            <div class="form-group {{ $holiday->end_date ? 'd-none' : '' }}" id="single-date">
                                <label for="date1">Tanggal</label>
                                <input type="text" name="date" id="date1" class="form-control">
                            </div>

                            <div class="form-group {{ $holiday->end_date ? '' : 'd-none' }}" id="multiple-date">
                                <label for="date2">Rentang Tanggal</label>
                                <input type="text" name="date_range" id="date2" class="form-control">
                                @error('date_range')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="card-footer">
                            <button class="btn btn-primary" type="submit">Simpan</button>
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
        const hasEndDate = '{{ $holiday->end_date ? 'true' : '' }}';

        const start = moment('{{ $holiday->start_date }}', 'YYYY-MM-DD');
        const end = moment('{{ $holiday->end_date ?? $holiday->start_date }}', 'YYYY-MM-DD');

        $('#date1').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            startDate: start,
            locale: { format: 'DD-MM-YYYY' }
        });

        $('#date2').daterangepicker({
            showDropdowns: true,
            startDate: start,
            endDate: end,
            locale: { format: 'DD-MM-YYYY' }
        });
    });

    function toggleDateInput() {
        const isMultiple = $('#toggleSelect').val() === 'ya';
        $('#single-date').toggleClass('d-none', isMultiple);
        $('#multiple-date').toggleClass('d-none', !isMultiple);
    }
</script>
@endsection
