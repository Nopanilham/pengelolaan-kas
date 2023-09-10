@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ $title }}</h1>

    <form action="{{ route('siswa-laporan.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="dari_bulan">Dari Periode <span class="text-danger">*</span></label>
                    <input type="month" class="form-control @error('dari_bulan') is-invalid @enderror" name="dari_bulan" id="dari_bulan" placeholder="Dari bulan" value="{{ old('dari_bulan') }}">
                    @error('dari_bulan')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="ke_bulan">Ke Periode</label>
                    <input type="month" class="form-control @error('ke_bulan') is-invalid @enderror" name="ke_bulan" id="ke_bulan" placeholder="Ke bulan" value="{{ old('ke_bulan') }}">
                    @error('ke_bulan')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary"><i class="fa fa-calendar" aria-hidden="true"></i> Tampilkan</button>
    </form>
@endsection

@push('notif')
    @if (session('success'))
        <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session('status'))
        <div class="alert alert-success border-left-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
@endpush
