@php
    use Carbon\Carbon;
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/jspdf@latest/dist/jspdf.umd.min.js"></script>
    <title>{{ $peminjaman[0]->peminjam }}
        ({{ Carbon::parse($peminjaman[0]->tanggal_pinjam)->locale('id')->translatedFormat('d F Y') }})</title>
</head>

<style>
    * {
        font-family: 'Roboto', sans-serif;
    }

    td {
        word-wrap: break-word;
    }

    p,
    li {
        text-align: justify
    }
</style>


<body>

    <div class="container">
        <div class="kopsurat" style="border-bottom: 1px solid black;">
            <div class="wrapper">
                <img style="background-color: blue;" src="{{ $logo }}" alt="pupr" width="75"
                    height="75">
                <div class="heading" style="text-align: center; width: 80%; float: right;">
                    <h5 style="margin-top: 5px;margin-left: -80px;">KEMENTERIAN PEKERJAAN UMUM DAN PERUMAHAN RAKYAT</h5>
                    <h5 style="margin-top: -20px;margin-left: -80px;font-weight:normal">BADAN PENGEMBANGAN SUMBER DAYA
                        MANUSIA</h5>
                    <h5 style="margin-top: -20px;margin-left: -80px;">SATUAN KERJA BALAI PENGEMBANGAN KOMPETENSI PUPR
                        WILAYAH VI SURABAYA</h5>
                    <h6 style="margin-top: -20px;margin-left: -80px;font-weight:normal">Jalan Gayung Kebonsari 48,
                        Gayungan, Surabaya 60234, Telepon (031) 8291040, 8286501 Faksimili 8275847</h6>
                </div>
            </div>
        </div>
        <br>
        <div class="isi">
            <div class="judul">
                <p
                    style="margin-bottom: 20px; margin-top: 3px; text-align:center; font-weight:bold; text-decoration:underline">
                    SURAT PEMINJAMAN BMN</p>
                <table>
                    <tr>
                        <td>Kami yang bertanda tangan dibawah ini:</td>
                    </tr>
                </table>
                <table>
                    <tr>
                        <td>Nama Peminjam</td>
                        <td style="padding-left:50px;">:</td>
                        <td>{{ $peminjaman[0]->peminjam }}</td>
                    </tr>
                    <tr>
                        <td>Instansi Peminjam</td>
                        <td style="padding-left:50px;">:</td>
                        <td>{{ $peminjaman[0]->instansi }}</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td style="padding-left:50px;">:</td>
                        <td style="word-wrap: break-word;vertical-align:top">{{ $peminjaman[0]->alamat }}</td>
                    </tr>
                    <tr>
                        <td>Nomor Telp / HP</td>
                        <td style="padding-left:50px;">:</td>
                        <td>{{ $peminjaman[0]->no_telp }}</td>
                    </tr>
                </table>
            </div>
            <div class="isi-surat">
                <p>Telah meminjam barang milik negara, dari Balai Pengembangan Kompetensi Wilayah VI Surabaya peralatan
                    dibawah ini:</p>

                <table style="border-collapse: collapse; width: 100%; border: 1px solid black; text-align: center;">
                    <thead style="border: 1px solid black;">
                        <tr>
                            <th style="border: 1px solid black;">No</th>
                            <th style="border: 1px solid black;">Nama Barang</th>
                            <th style="border: 1px solid black;">Merk / Type</th>
                            <th style="border: 1px solid black;">Jumlah</th>
                            <th style="border: 1px solid black;">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($peminjaman[0]->detailPeminjaman as $detail)
                            <tr style="border: 1px solid black;">
                                <td style="border: 1px solid black;">{{ $loop->iteration }}</td>
                                <td style="border: 1px solid black;">
                                    {{ $detail->barang->nama_barang . ' (' . $detail->barang->nup . ')' }}</td>
                                <td style="border: 1px solid black;">
                                    {{ $detail->barang->merek . ' / ' . $detail->barang->tipe }} </td>
                                <td style="border: 1px solid black;">1</td>
                                <td style="border: 1px solid black;">{{ $detail->deskripsi }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <p>Untuk keperluan :
                    {{ $peminjaman[0]->deskripsi == null ? 'kegiatan melaksanakan tugas panitia' : $peminjaman[0]->deskripsi }}
                </p>

                <table style="border-collapse: collapse; width: 100%; border: 1px solid black;">
                    <thead style="border: 1px solid black; text-align: center;">
                        <tr>
                            <th style="border: 1px solid black;">Tanggal Pinjam : <br> <span
                                    style="font-weight: normal;">{{ Carbon::parse($peminjaman[0]->tanggal_pinjam)->locale('id')->translatedFormat('d F Y') }}</span>
                            </th>
                            <th style="border: 1px solid black;">Tanggal Kembali : <br> <span
                                    style="font-weight: normal;">
                                    @if ($peminjaman[0]->status == '0')
                                        {{ Carbon::parse($peminjaman[0]->tanggal_kembali)->locale('id')->translatedFormat('d F Y') }}
                                    @else
                                        {{ Carbon::parse($peminjaman[0]->updated_at)->locale('id')->translatedFormat('d F Y') }}
                                    @endif

                                </span></th>
                            <th style="border: 1px solid black;">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody style="text-align: left; text-indent: 5px;">
                        <tr style="border: 1px solid black;">
                            <td style="border: 1px solid black; height:50px;">T. tangan : </td>
                            <td style="border: 1px solid black; height:50px;">T. tangan : </td>
                            <td rowspan="2" style="border: 1px solid black; text-align:center"></td>
                        </tr>
                        <tr style="border: 1px solid black;">
                            <td style="border: 1px solid black; height:50px;">Kondisi alat : Baik</td>
                            <td style="border: 1px solid black; height:50px;">Kondisi alat : Baik</td>
                        </tr>
                    </tbody>
                </table>

                <p style="line-height: 1.5;">
                    Menyatakan bahwa saya sebagai peminjam / pengguna peralatan milik Balai Pengembangan Kompetensi
                    Wilayah VI Surabaya akan memakai peralatan tersebut dengan hati-hati, sesuai dengan prosedur dan
                    spesifikasi peralatan tersebut.</p>
            </div>
        </div>

        <div class="ttd-container" style="margin-top:30px;">
            <table style="border-collapse: collapse; width: 100%;">
                <thead style="text-align: center;">
                    <tr>
                        <td><br><br>Pengelola BMN</td>
                        <td></td>
                        <td>Surabaya,
                            {{ Carbon::parse(date('Y-m-d'))->locale('id')->translatedFormat('d F Y') }}<br><br>Pengguna
                            BMN</td>
                    </tr>
                </thead>
                <tbody style="text-align: center; text-indent: 5px;">
                    <tr>
                        <td style="height:150px; vertical-align:bottom">Ispamuji <br>NIP. 197004242007011003</td>
                        <td style="height:50px; width: 160px;"></td>
                        <td style="height:50px; vertical-align:bottom">{{ $peminjaman[0]->peminjam }} <br>NIP. <span
                                style="color:white">197004242007011</span> </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
