@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ $title }}</h1>

    <!-- Main Content goes here -->



    <form action="{{ route('bendahara-mutasi.store') }}" method="post">
        @csrf

        <input type="hidden" name="kelas_id" value="{{ auth()->user()->kelas_id }}">

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="ke_kelas">Ke Kelas</label>
                    <select class="form-control @error('ke_kelas') is-invalid @enderror" name="ke_kelas" id="ke_kelas">
                        <option value="">Pilih kelas</option>
                        @foreach ($classes as $kelas)
                        <option value="{{ $kelas->getKey() }}" @selected(old('ke_kelas') == $kelas->getKey())>{{ $kelas->nama }}</option>
                        @endforeach
                    </select>
                    @error('ke_kelas')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>

        <a href="{{ route('bendahara-mutasi.index') }}" class="btn btn-secondary">
            Kembali
        </a>

    </form>
@endsection
