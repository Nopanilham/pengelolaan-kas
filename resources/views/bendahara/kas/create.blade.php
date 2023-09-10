@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ $title }}</h1>

    <!-- Main Content goes here -->



    <form action="{{ route('bendahara-kas.store') }}" method="post">
        @csrf

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="tipe">Tipe</label>
                    <select class="form-control @error('tipe') is-invalid @enderror" name="tipe" id="tipe">
                        <option value="">Pilih tipe</option>
                        <option value="masuk" @selected(old('tipe') == 'masuk')>Masuk</option>
                        <option value="keluar" @selected(old('tipe') == 'keluar')>Keluar</option>
                    </select>
                    @error('tipe')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" class="form-control @error('tanggal') is-invalid @enderror"
                           name="tanggal" id="tanggal" value="{{ old('tanggal') }}"
                           placeholder="Tanggal transaksi">
                    @error('tanggal')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="kode">Kode</label>
                    <input type="text" class="form-control @error('kode') is-invalid @enderror"
                           name="kode" id="kode" value="{{ old('kode') }}"
                           placeholder="Kode transaksi">
                    @error('kode')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="jumlah">Jumlah</label>
                    <input type="text" class="form-control @error('jumlah') is-invalid @enderror"
                           name="jumlah" id="jumlah" value="{{ old('jumlah') }}"
                           placeholder="Jumlah transaksi">
                    @error('jumlah')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>

        <div class="col-md-4">


        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" id="keterangan" rows="3">{{ old('keterangan') }}</textarea>
            @error('keterangan')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>

        <a href="{{ route('bendahara-kas.index') }}" class="btn btn-secondary">
            Kembali
        </a>

    </form>
@endsection