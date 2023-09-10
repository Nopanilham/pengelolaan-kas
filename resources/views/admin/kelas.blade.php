@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ $title }}</h1>

    <!-- Main Content goes here -->

    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addModal">
        Tambah Kelas
    </button>

    <table class="table" id="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Kelas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $d)
                <tr>
                    <td scope="row"> {{ $loop->iteration }}</td>
                    <td>{{ $d->nama }}</td>
                    <td>
                        <form action="{{ route('kelas.destroy', $d->getKey()) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <a id="edit_data"
                                data-toggle="modal"
                                data-target="#editModal"
                                data-id="{{ $d->getKey() }}"
                                data-nama="{{ $d->nama }}"
                                class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin?')"><i class="fa fa-trash"></i> Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('kelas.store') }}" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="nama">Nama Kelas</label>
                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama kelas">
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-primary">Simpan</button></form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Ubah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="modal_edit">
                    <form action="" method="post" id="edit_form">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="nama">Nama Kelas</label>
                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama kelas">
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button></form>
                </div>
            </div>
        </div>
    </div>

    <!-- End of Main Content -->
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

        $(document).on("click", "#edit_data", function(){
            var id= $(this).data('id');
            var nama = $(this).data('nama');

            var edit_form = document.getElementById('edit_form');
            var aksi = "{{ route('kelas.index') }}/" + id;
            edit_form.action = aksi ;

            $("#modal_edit #nama").val(nama);

            console.log('aksi: ' + aksi);
        })
    </script>
@endpush
