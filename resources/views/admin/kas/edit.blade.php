@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ $title }}</h1>

    <!-- Main Content goes here -->



    <form action="{{ route('admin-kas.update', $data->getKey()) }}" method="post">
        @csrf
        @method('PATCH')

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="tipe">Tipe</label>
                    <select class="form-control @error('tipe') is-invalid @enderror" name="tipe" id="tipe">
                        <option value="">Pilih tipe</option>
                        <option value="masuk" @selected(old('tipe', $data->tipe) == 'masuk')>Masuk</option>
                        <option value="keluar" @selected(old('tipe', $data->tipe) == 'keluar')>Keluar</option>
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
                           name="tanggal" id="tanggal" value="{{ old('tanggal', $data->tanggal->format('Y-m-d')) }}"
                           placeholder="Tanggal transaksi">
                    @error('tanggal')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="kode">Kode</label>
                    <input type="text" class="form-control @error('kode') is-invalid @enderror"
                           name="kode" id="kode" value="{{ old('kode', $data->kode) }}"
                           placeholder="Kode transaksi">
                    @error('kode')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="kelas_id">Kelas</label>
                    <select class="form-control @error('kelas_id') is-invalid @enderror" name="kelas_id" id="kelas_id">
                        <option>Pilih kelas</option>
                        @foreach ($classes as $kelas)
                        <option value="{{ $kelas->getKey() }}" @selected(old('kelas_id', $data->kelas_id) == $kelas->getKey())>{{ $kelas->nama }}</option>
                        @endforeach
                    </select>
                    @error('kelas_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="jumlah">Jumlah</label>
                    <input type="text" class="form-control @error('jumlah') is-invalid @enderror"
                           name="jumlah" id="jumlah" value="{{ old('jumlah', $data->jumlah) }}"
                           placeholder="Jumlah transaksi">
                    @error('jumlah')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>



        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" id="keterangan" rows="3">{{ old('keterangan', $data->keterangan) }}</textarea>
            @error('keterangan')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>

        <a href="{{ route('admin-kas.index') }}" class="btn btn-secondary">
            Kembali
        </a>

    </form>
@endsection
