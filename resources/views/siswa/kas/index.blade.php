@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ $title }}</h1>

    <!-- Main Content goes here -->


    <table class="table" id="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Tipe</th>
                <th>Tanggal</th>
                <th>Kode</th>

                <th>Keterangan</th>
                <th>Jumlah</th>
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

                    <td>{{ $d->keterangan }}</td>
                    <td>IDR {{ number_format($d->jumlah, 0, ',', '.') }}</td>
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
@push('js')
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        });
    </script>
@endpush

