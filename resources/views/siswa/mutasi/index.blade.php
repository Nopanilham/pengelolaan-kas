@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ $title }}</h1>

    <!-- Main Content goes here -->

    

    <table class="table" id="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Dari Kelas</th>
                <th>Ke Kelas</th>
                <th>Tanggal</th>
                <th>Nominal</th>
                <th>Operator</th>
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
                    
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection


    

@push('js')
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        });
    </script>
@endpush
