@extends('admin.layout.template')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/select2/css/select2.min.css') }}">
@endsection

@section('content')
    <main id="main-container">
        <!-- Hero -->
        <div class="content">
            <div
                class="d-flex flex-column flex-md-row justify-content-md-between align-items-md-center py-2 text-center text-md-start">
                <div class="flex-grow-1 mb-1 mb-md-0">

                    <h1 class="h3 fw-bold mb-1">
                        {{ $title }}
                    </h1>
                </div>
                <div class="mt-3 mt-md-0 ms-md-3 space-x-1">

                </div>
            </div>
        </div>

        <form action="{{ route('admin.peminjaman.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="content">
                <!-- Floating Labels -->

                <div class="block block-rounded">
                    <div class="block-content block-content-full">
                        <div class="col-12">
                            <div class="form-floating mb-4">
                                <input type="text" class="form-control" id="peminjam" name="peminjam"
                                    placeholder="Nama Peminjam" required>
                                <label for="peminjam">Nama Peminjam</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam"
                                    value="{{ date('Y-m-d') }}" required>
                                <label for="tanggal_pinjam">Tanggal Pinjam</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali">
                                <label for="tanggal_kembali">Tanggal Kembali (optional)</label>
                            </div>
                            <div class="form-floating mb-4">
                                <textarea class="form-control" id="deskripsi" name="deskripsi" style="height: 140px"
                                    placeholder="Tulis Deskripsi Disini"></textarea>
                                <label for="deskripsi">Deskripsi</label>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Floating Labels -->

                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Rincian Barang</h3>
                    </div>
                    <div class="block-content block-content-full">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th width="30%">Barang (NUP) </th>
                                    <th width="20%">Lokasi Awal</th>
                                    <th width="20%">Lokasi Tujuan</th>
                                    <th width="25%">Deskripsi</th>
                                    <th width="5%" class="text-center"><button type="button"
                                            class="btn btn-success btn-sm btn-tambah"><i class="fas fa-plus"></i></button>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-center"></tbody>
                        </table>
                        <div class="mt-2 text-end">
                            <button type="submit" class="btn btn-primary" style="display: none"
                                id="submitButton">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </main>
@endsection

@section('javascript')
    <script src="{{ asset('assets/js/lib/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/select2/js/select2.full.min.js') }}"></script>
    <script></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            One.helpersOnLoad(['jq-select2']);

            const addButton = document.querySelector('.btn-tambah');
            const tableBody = document.querySelector('tbody');
            const submitButton = document.getElementById('submitButton');
            const form = document.querySelector('form');

            function toggleSubmitButton() {
                if (tableBody.children.length === 0) {
                    submitButton.style.display = 'none';
                } else {
                    submitButton.style.display = 'inline-block';
                }
            }

            addButton.addEventListener('click', function() {
                const newRow = document.createElement('tr');
                newRow.classList.add('text-center');
                newRow.innerHTML = `
                    <td>
                        <select class="js-select2 form-select" name="id_barang[]" style="width: 100%;" required>
                            <option value="" selected disabled>Pilih Barang</option>
                            @foreach ($barang as $brg)
                                <option value="{{ $brg->id_barang }}">{{ $brg->nama_barang }} ({{ $brg->nup }})</option>
                            @endforeach
                        </select>
                    </td>
                    <td><input type="text" class="form-control" required name="lokasi_awal[]" placeholder="Lokasi Awal"></td>
                    <td><input type="text" class="form-control" required name="lokasi_akhir[]" placeholder="Lokasi Tujuan" required></td>
                    <td><textarea class="form-control" name="deskripsi_barang[]" placeholder="Deskripsi" rows="1"></textarea></td>
                    <td><button type="button" class="btn btn-danger btn-sm delete-row"><i class="fas fa-times"></i></button></td>
                `;
                tableBody.appendChild(newRow);
                $(newRow).find('.js-select2').select2();
                toggleSubmitButton();
                newRow.querySelector('.delete-row').addEventListener('click', function() {
                    tableBody.removeChild(newRow);
                    toggleSubmitButton();
                });
            });

            form.addEventListener('submit', function(event) {
                if (tableBody.children.length === 0) {
                    event.preventDefault();
                    alert('Anda harus menambahkan minimal satu baris.');
                }
            });

            toggleSubmitButton();
        });
    </script>
@endsection
