@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <div id="section-to-print">
        <h1 class="h3 mb-4 text-gray-800">{{ $title }}</h1>

        <p>Kelas : {{ $kelas ?? 'Semua' }}</p>
        <p>Dari Periode : {{ $dari_periode }}</p>
        <p>Ke Periode : {{ $ke_periode ?? $dari_periode }}</p>

        <!-- Main Content goes here -->

        <a href="{{ route('laporan.index') }}" class="btn btn-primary mb-3 no-print">
            <i class="fa fa-arrow-left" aria-hidden="true"></i>
            Kembali
        </a>

        <a href="#" class="btn btn-success mb-3 no-print" onclick="javascript:window.print()">
            <i class="fa fa-print" aria-hidden="true"></i>
            Cetak
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
                    <td>IDR {{ number_format($masuk, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <td colspan="6" class="text-right">Total Keluar</td>
                    <td>IDR {{ number_format($keluar, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <td colspan="6" class="text-right">Total</td>
                    <td>IDR {{ number_format($total, 0, ',', '.') }}</td>
                </tr>
            </tfoot>
        </table>
    </div>
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

@push('css')
    <style>
        @media print {
            body * {
                visibility: hidden;
            }

            #section-to-print,
            #section-to-print * {
                visibility: visible;
            }

            #section-to-print {
                position: absolute;
                left: 0;
                top: 0;
            }

            .no-print {
                display: none;
            }
        }

    </style>
@endpush
