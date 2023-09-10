@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ $title }}</h1>

    <!-- Main Content goes here -->

    <a href="{{ route('admin-kas.create') }}" class="btn btn-primary mb-3">
        <i class="fa fa-plus" aria-hidden="true"></i>
        Tambah Data
    </a>

    <table class="table" id="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Tipe</th>
                <th>Tanggal</th>
                <th>Kode</th>
                <th>Kelas</th>

                <th>Keterangan</th>
                <th>Jumlah</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $masuk = 0;
            $keluar = 0;
            $total = 0;
            ?>
            @foreach ($data as $d)
                <tr>
                    <td scope="row"> {{ $loop->iteration }}</td>
                    <td>{{ str($d->tipe)->ucfirst() }}</td>
                    <td>{{ $d->tanggal->format('d F Y') }}</td>
                    <td>{{ $d->kode }}</td>
                    <td>{{ $d->kelas->nama }}</td>

                    <td>{{ $d->keterangan }}</td>
                    <td>IDR {{ number_format($d->jumlah, 0, ',', '.') }}</td>
                    <td>
                        <form action="{{ route('admin-kas.destroy', $d->getKey()) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <a href="{{ route('admin-kas.edit', $d->getKey()) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin?')"><i class="fa fa-trash"></i> Hapus</button>
                        </form>
                    </td>
                </tr>
                <?php
                if ($d->tipe == 'masuk') {
                    $masuk = $masuk + $d->jumlah;
                } else {
                    $keluar = $keluar + $d->jumlah;
                }
                $total = $masuk - $keluar;
                ?>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="6" class="text-right">Total Masuk</td>
                <td colspan="2">IDR {{ number_format($masuk, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td colspan="6" class="text-right">Total Keluar</td>
                <td colspan="2">IDR {{ number_format($keluar, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td colspan="6" class="text-right">Total</td>
                <td colspan="2">IDR {{ number_format($total, 0, ',', '.') }}</td>
            </tr>
        </tfoot>
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
