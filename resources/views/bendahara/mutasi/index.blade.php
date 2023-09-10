@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ $title }}</h1>

    <!-- Main Content goes here -->

    <a href="{{ route('bendahara-mutasi.create') }}" class="btn btn-primary mb-3">
        <i class="fa fa-plus" aria-hidden="true"></i>
        Tambah Data
    </a>

    <table class="table" id="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Dari Kelas</th>
                <th>Ke Kelas</th>
                <th>Tanggal</th>
                <th>Nominal</th>
                <th>Operator</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $d)
                <tr>
                    <td scope="row"> {{ $loop->iteration }}</td>
                    <td>{{ $d->sumber->nama }}</td>
                    <td>{{ $d->tujuan->nama }}</td>
                    <td>{{ $d->created_at->format('d F Y') }}</td>
                    <td>IDR {{ number_format($d->nominal, 0, ',', '.') }}</td>
                    <td>{{ $d->user->full_name }}</td>
                    <td>
                        <form action="{{ route('bendahara-mutasi.destroy', $d->getKey()) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin?')"><i class="fa fa-trash"></i> Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
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

@push('js')
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        });
    </script>
@endpush
