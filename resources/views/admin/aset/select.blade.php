@extends('admin.layout.template')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css') }}">
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
                    {{-- <a class="btn btn-sm btn-secondary space-x-1" href="/administrator/aset/import">
                        <i class="fa fa-plus opacity-50"></i>
                        <span>Tambah Barang</span>
                    </a> --}}
                    <a class="btn btn-sm btn-success space-x-1" href="/administrator/aset/import">
                        <i class="fa fa-upload opacity-50"></i>
                        <span>Import Barang</span>
                    </a>
                </div>
            </div>
        </div>
        <!-- END Hero -->

        <!-- Page Content -->
        <div class="content">
            <!-- Dynamic Table Responsive -->
            <div class="block block-rounded">
                <div class="block-content block-content-full">
                    <div class="dropdown">
                        <button type="button" class="btn btn-primary btn-sm dropdown-toggle" id="dropdown-default-primary"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Pilih Kategori
                        </button>
                        <div class="dropdown-menu fs-sm" aria-labelledby="dropdown-default-primary">
                            <a class="dropdown-item" href="/administrator/aset">ALL</a>
                            @foreach ($kategori as $ktg)
                                <a class="dropdown-item"
                                    href="/administrator/aset/kategori/{{ $ktg->slug }}">{{ $ktg->nama_kategori }}</a>
                            @endforeach
                        </div>
                    </div>
                    <!-- DataTables init on table by adding .js-dataTable-responsive class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-responsive">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="no-print">Kategori</th>
                                <th class="d-none">Kode Satker</th>
                                <th class="d-none">Nama Satker</th>
                                <th class="">Kode Barang</th>
                                <th class="">Nama Barang</th>
                                <th class="">NUP</th>
                                <th class="d-none">Kondisi</th>
                                <th class="">Merek</th>
                                <th class="d-none">Tipe</th>
                                <th class="d-none">Tgl Perolehan</th>
                                <th class="d-none">Tgl Awal Pakai</th>
                                <th class="d-none">Nilai Perolehan Pertama</th>
                                <th class="d-none">Nilai Mutasi</th>
                                <th class="d-none">Nilai Perolehan</th>
                                <th class="d-none">Nilai Penyusutan</th>
                                <th class="d-none">Nilai Buku</th>
                                <th class="d-none">Kuantitas</th>
                                <th class="d-none">Jml Foto</th>
                                <th class="d-none">Status Penggunaan</th>
                                <th class="d-none">No PSP</th>
                                <th class="d-none">Tgl PSP</th>
                                <th class="d-none">No Tiket Usul PSP</th>
                                <th class="d-none">Intra/Ekstra</th>
                                <th class="d-none">Status BPYBDS</th>
                                <th class="d-none">Status Henti Guna</th>
                                <th class="d-none">Status Kemitraan</th>
                                <th class="d-none">Status Barang Hilang</th>
                                <th class="d-none">Status Barang DKTP</th>
                                <th class="d-none">Status Usul Rusak Berat</th>
                                <th class="d-none">Status Usul Hapus</th>
                                <th class="d-none">Sisa Umur (Semester)</th>
                                <th class="d-none">Status SAKTI</th>
                                <th>Kode Register SAKTI</th>
                                <th>Lokasi Sekarang</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($barang as $data)
                                <tr>
                                    <td class="text-center fs-sm">{{ $loop->iteration }}</td>
                                    <th class="no-print">{{ $data->kategori->nama_kategori }}</th>
                                    <th class="d-none">{{ $data->kode_satker }}</th>
                                    <th class="d-none">{{ $data->nama_satker }}</th>
                                    <th class="">{{ $data->kode_barang }}</th>
                                    <th class="">{{ $data->nama_barang }}</th>
                                    <th class="">{{ $data->nup }}</th>
                                    <th class="d-none">{{ $data->kondisi }}</th>
                                    <th class="">{{ $data->merek }}</th>
                                    <th class="d-none">{{ $data->tipe }}</th>
                                    <th class="d-none">{{ $data->tanggal_perolehan }}</th>
                                    <th class="d-none">{{ $data->tanggal_awal_pakai }}</th>
                                    <th class="d-none">{{ $data->nilai_perolehan_pertama }}</th>
                                    <th class="d-none">{{ $data->nilai_mutasi }}</th>
                                    <th class="d-none">{{ $data->nilai_perolehan }}</th>
                                    <th class="d-none">{{ $data->nilai_penyusutan }}</th>
                                    <th class="d-none">{{ $data->nilai_buku }}</th>
                                    <th class="d-none">{{ $data->kuantitas }}</th>
                                    <th class="d-none">{{ $data->jumlah_foto }}</th>
                                    <th class="d-none">{{ $data->status_penggunaan }}</th>
                                    <th class="d-none">{{ $data->no_psp }}</th>
                                    <th class="d-none">{{ $data->tanggal_psp }}</th>
                                    <th class="d-none">{{ $data->no_tiket_usul_psp }}</th>
                                    <th class="d-none">{{ $data->intra_ekstra }}</th>
                                    <th class="d-none">{{ $data->status_bpybds }}</th>
                                    <th class="d-none">{{ $data->status_henti_guna }}</th>
                                    <th class="d-none">{{ $data->status_kemitraan }}</th>
                                    <th class="d-none">{{ $data->status_barang_hilang }}</th>
                                    <th class="d-none">{{ $data->status_barang_dktp }}</th>
                                    <th class="d-none">{{ $data->status_usul_rusak_berat }}</th>
                                    <th class="d-none">{{ $data->status_usul_hapus }}</th>
                                    <th class="d-none">{{ $data->sisa_umur }}</th>
                                    <th class="d-none">{{ $data->status_sakti }}</th>
                                    <th>{{ $data->kode_register_sakti }}</th>
                                    <th>Belum Ditentukan <button type="button" class="btn btn-sm btn-alt-secondary editButton" data-id="{{ $data->id_barang }}" data-name="{{ $ktg->nama_kategori }}"><i class="fa fa-fw fa-pencil-alt"></i></button></th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Dynamic Table Responsive -->
        </div>
        <!-- END Page Content -->
    </main>
@endsection

@section('javascript')
    <!-- jQuery (required for DataTables plugin) -->

    <script src="{{ asset('assets/js/lib/jquery.min.js') }}"></script>

    <!-- Page JS Plugins -->
    <script src="{{ asset('assets/js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-buttons/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-buttons-jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-buttons-pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-buttons-pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-buttons/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-buttons/buttons.html5.min.js') }}"></script>

    <!-- Page JS Code -->
    <script src="{{ asset('assets/js/pages/be_tables_datatables.min.js') }}"></script>
@endsection
