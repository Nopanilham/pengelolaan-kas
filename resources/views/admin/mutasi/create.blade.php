@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ $title }}</h1>

    <!-- Main Content goes here -->



    <form action="{{ route('mutasi.store') }}" method="post">
        @csrf

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="dari_kelas">Dari Kelas</label>
                    <select class="form-control @error('dari_kelas') is-invalid @enderror" name="dari_kelas" id="dari_kelas">
                        <option value="">Pilih kelas</option>
                        @foreach ($classes as $kelas)
                        <option value="{{ $kelas->getKey() }}" @selected(old('dari_kelas') == $kelas->getKey())>{{ $kelas->nama }}</option>
                        @endforeach
                    </select>
                    @error('dari_kelas')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
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

        <a href="{{ route('mutasi.index') }}" class="btn btn-secondary">
            Kembali
        </a>

    </form>
@endsection
