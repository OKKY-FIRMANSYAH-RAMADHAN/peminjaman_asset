@extends('admin.layout.template')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css') }}">
@endsection

@section('content')
    @php
        use Carbon\Carbon;
    @endphp
    <main id="main-container">
        <!-- Page Content -->
        <div class="content">
            <div class="row">
                <div class="col-xl-12 order-xl-12">
                    <!-- Product -->
                    <div class="block block-rounded">
                        <div class="block-content">
                            <a href="/administrator/aset" class="btn btn-sm btn-danger text-start">Kembali</a>
                            <!-- Extra Info Tabs -->
                            <div class="block block-rounded">
                                <h2 class="mt-4">{{ $barang->nama_barang }}</h2>
                                <ul class="nav nav-tabs nav-tabs-alt align-items-center" role="tablist">
                                    <li class="nav-item">
                                        <button type="button" class="nav-link active" id="ecom-product-info-tab"
                                            data-bs-toggle="tab" data-bs-target="#ecom-product-info" role="tab"
                                            aria-controls="ecom-product-reviews" aria-selected="true">Detail Info</button>
                                    </li>
                                    <li class="nav-item">
                                        <button type="button" class="nav-link" id="ecom-product-comments-tab"
                                            data-bs-toggle="tab" data-bs-target="#ecom-product-comments" role="tab"
                                            aria-controls="ecom-product-reviews" aria-selected="false">Riwayat
                                            Lokasi</button>
                                    </li>
                                </ul>
                                <div class="block-content tab-content">
                                    <!-- Info -->
                                    <div class="tab-pane pull-x active" id="ecom-product-info" role="tabpanel"
                                        aria-labelledby="ecom-product-info-tab" tabindex="0">
                                        <table class="table table-striped table-borderless">
                                            <tbody>
                                                <tr>
                                                    <td style="width: 20%;">Kategori</td>
                                                    <td>
                                                        {{ $barang->kategori->nama_kategori }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Kode Satker</td>
                                                    <td>
                                                        {{ $barang->kode_satker }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Nama Satker</td>
                                                    <td>
                                                        {{ $barang->nama_satker }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Kode Barang</td>
                                                    <td>
                                                        {{ $barang->kode_barang }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>NUP</td>
                                                    <td>
                                                        {{ $barang->nup }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Kondisi</td>
                                                    <td>
                                                        {{ $barang->kondisi }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Merek</td>
                                                    <td>
                                                        {{ $barang->merek }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Tipe</td>
                                                    <td>
                                                        {{ $barang->tipe }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Tanggal Perolehan</td>
                                                    <td>
                                                        {{ Carbon::parse($barang->tanggal_perolehan)->locale('id')->translatedFormat('d F Y') }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Tanggal Awal Pakai</td>
                                                    <td>
                                                        {{ Carbon::parse($barang->tanggal_awal_pakai)->locale('id')->translatedFormat('d F Y') }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Nilai Perolehan Pertama</td>
                                                    <td>
                                                        {{ 'Rp ' . number_format($barang->nilai_perolehan_pertama, 0, ',', '.') }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Nilai Mutasi</td>
                                                    <td>
                                                        {{ $barang->nilai_mutasi }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Nilai Perolehan</td>
                                                    <td>
                                                        {{ 'Rp ' . number_format($barang->nilai_perolehan, 0, ',', '.') }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Nilai Penyusutan</td>
                                                    <td>
                                                        {{ 'Rp ' . number_format($barang->nilai_penyusutan, 0, ',', '.') }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Nilai Buku</td>
                                                    <td>
                                                        {{ $barang->nilai_buku }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Kuantitas</td>
                                                    <td>
                                                        {{ $barang->kuantitas }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Jumlah Foto</td>
                                                    <td>
                                                        {{ $barang->jumlah_foto }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Status Penggunaan</td>
                                                    <td>
                                                        {{ $barang->status_penggunaan }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>No PSP</td>
                                                    <td>
                                                        {{ $barang->no_psp }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Tanggal PSP</td>
                                                    <td>
                                                        {{ $barang->tanggal_psp }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>No Tiket Usul PSP</td>
                                                    <td>
                                                        {{ $barang->no_tiket_usul_psp != null ? $barang->no_tiket_usul_psp : '-' }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Intra/Ekstra</td>
                                                    <td>
                                                        {{ $barang->intra_ekstra }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Status BPYBDS</td>
                                                    <td>
                                                        {{ $barang->status_bpybds }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Status Henti Guna</td>
                                                    <td>
                                                        {{ $barang->status_henti_guna }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Status Kemitraan</td>
                                                    <td>
                                                        {{ $barang->status_kemitraan }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Status Barang Hilang</td>
                                                    <td>
                                                        {{ $barang->status_barang_hilang }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Status Barang DKTP</td>
                                                    <td>
                                                        {{ $barang->status_barang_dktp }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Status Usul Rusak Berat</td>
                                                    <td>
                                                        {{ $barang->status_usul_rusak_berat }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Status Usul Hapus</td>
                                                    <td>
                                                        {{ $barang->status_usul_hapus }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Sisa Umur (Semester)</td>
                                                    <td>
                                                        {{ $barang->sisa_umur }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Status SAKTI</td>
                                                    <td>
                                                        {{ $barang->status_sakti }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Kode Register SAKTI</td>
                                                    <td>
                                                        {{ $barang->kode_register_sakti }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Lokasi Sekarang</td>
                                                    <td>
                                                        {{ $barang->lokasi != null ? $barang->lokasi : '-' }}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- END Info -->

                                    <!-- Comments -->
                                    <div class="tab-pane pull-x fs-sm" id="ecom-product-comments" role="tabpanel"
                                        aria-labelledby="ecom-product-comments-tab" tabindex="0">
                                        <div class="d-flex push">
                                            <div class="block-content block-content-full">
                                                <table
                                                    class="table table-bordered table-striped table-vcenter js-dataTable-simple">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">No</th>
                                                            <th class="text-center">Tanggal</th>
                                                            <th class="text-center">Deskripsi</th>
                                                            <th class="text-center">Lokasi Tujuan</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($lokasi as $lks)
                                                            <tr>
                                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                                <td class="text-center">
                                                                    {{ Carbon::parse($lks->created_at)->locale('id')->translatedFormat('d F Y') }}
                                                                </td>
                                                                <td class="text-center">
                                                                    @if ($lks->id_peminjaman == null)
                                                                        Barang Dipindah Oleh Admin
                                                                    @elseif ($lks->id_peminjaman != null && $lks->status == '0')
                                                                        Barang Dipinjam Oleh
                                                                        {{ $lks->peminjaman->peminjam }}
                                                                    @elseif ($lks->id_peminjaman != null && $lks->status == '1')
                                                                        Barang Dikembalikan Oleh
                                                                        {{ $lks->peminjaman->peminjam }}
                                                                    @endif
                                                                </td>
                                                                <td class="text-center">{{ $lks->lokasi }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END Comments -->
                                </div>
                            </div>
                            <!-- END Extra Info Tabs -->
                        </div>
                    </div>
                    <!-- END Product -->
                </div>
            </div>
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
