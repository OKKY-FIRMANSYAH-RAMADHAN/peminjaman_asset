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
                <img style="background-color: blue;" src="{{ $logo }}" alt="pupr" width="80"
                    height="80">
                <div class="heading" style="text-align: center; width: 80%; float: right;">
                    <h4 style="margin-top: 5px;margin-left: -80px;">KEMENTERIAN PEKERJAAN UMUM DAN PERUMAHAN RAKYAT</h4>
                    <h4 style="margin-top: -20px;margin-left: -80px;font-weight:normal">BADAN PENGEMBANGAN SUMBER DAYA
                        MANUSIA</h4>
                    <h5 style="margin-top: -20px;margin-left: -80px;">SATKER BALAI PENGEMBANGAN KOMPETENSI PUPR
                        WILAYAH VI SURABAYA</h5>
                    <h6 style="margin-top: -20px;margin-left: -80px;font-weight:normal">Jalan Gayung Kebonsari 48 Surabaya, Telepon (031) 8291040, 8286501 Faksimili 8275847 E-mail : balai_4@yahoo.co.id</h6>
                </div>
            </div>
        </div>
        <br>
        <div class="isi">
            <div class="judul">
                <p
                    style="margin-bottom: 20px; margin-top: 3px; text-align:center; font-weight:bold;">
                    PERMOHONAN</p>
                <p style="margin-top: -20px; text-align:center;">ANGKUTAN KENDARAAN BERMOTOR KENDARAAN DINAS <br> (F-01/DM/P/TU/10//BD04. Ref : 00) <br> (DIISI PEMOHON)</p>
                <table style="margin-top: 20px">
                    <tr>
                        <td>Nama</td>
                        <td style="padding-left:50px;">:</td>
                        <td>{{ $peminjaman[0]->peminjam }}</td>
                    </tr>
                    <tr>
                        <td>Jabatan</td>
                        <td style="padding-left:50px;">:</td>
                        <td>{{ $peminjaman[0]->peminjam }}</td>
                    </tr>
                    <tr>
                        <td>Tujuan</td>
                        <td style="padding-left:50px;">:</td>
                        <td>{{ $peminjaman[0]->instansi }}</td>
                    </tr>
                    <tr>
                        <td>Keperluan</td>
                        <td style="padding-left:50px;">:</td>
                        <td style="word-wrap: break-word;vertical-align:top">{{ $peminjaman[0]->deskripsi }}</td>
                    </tr>
                    <tr>
                        <td>Tanggal yang diperlukan</td>
                        <td style="padding-left:50px;">:</td>
                        <td>{{ Carbon::parse($peminjaman[0]->tanggal_pinjam)->locale('id')->translatedFormat('d F Y') }} - {{ Carbon::parse($peminjaman[0]->tanggal_kembali)->locale('id')->translatedFormat('d F Y') }}</td>
                    </tr>
                    <tr>
                        <td>Lama Pemakaian</td>
                        <td style="padding-left:50px;">:</td>
                        <td>{{ max(1, Carbon::parse($peminjaman[0]->tanggal_pinjam)->diffInDays(Carbon::parse($peminjaman[0]->tanggal_kembali))) }} hari</td>
                    </tr>
                </table>
            </div>

            <div class="ttd-container" style="margin-top:25px;">
                <table style="border-collapse: collapse; width: 100%;">
                    <thead style="text-align: center;">
                        <tr>
                            <td>Mengetahui, <br> Kepala Subbagian Tata Usaha</td>
                            <td></td>
                            <td>Pemohon</td>
                        </tr>
                    </thead>
                    <tbody style="text-align: center; text-indent: 5px;">
                        <tr>
                            <td style="height:130px; vertical-align:bottom"><span style="text-decoration: underline; font-weight:bold">Heru Kurniawan, S.Pd., M.T.</span> <br>NIP. 198308242010121005</td>
                            <td style="height:50px; width: 160px;"></td>
                            <td style="height:50px; vertical-align:bottom">{{ $peminjaman[0]->peminjam }} <br>NIP. <span
                                    style="color:white">197004242007011</span> </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="isi-surat" style="margin-top: 10px">
                <h3 style="font-weight: bold">PERINTAH JALAN</h3>
                <hr style="border:0; height:2px; background-color:black; margin:0; margin-top:-15px">
                <p style="margin-top: 0px">ANGKUTAN BERMOTOR KENDARAAN DINAS <br> (F-01/DM/P/TU/10//BD04. Ref : 00) <br> Nomor : UM 02 04 - </p>
                <hr style="border:0; height:2px; background-color:black; margin:0; margin-top:-15px">

                <table style="border-collapse: collapse; width: 100%; border: 1px solid black; text-align: center; margin-top:10px">
                    <thead style="border: 1px solid black;">
                        <tr>
                            <th style="border: 1px solid black;">No</th>
                            <th style="border: 1px solid black;">Jenis Kendaraan</th>
                            <th style="border: 1px solid black;">No. Polisi</th>
                            <th style="border: 1px solid black;">Tujuan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($peminjaman[0]->detailPeminjaman as $detail)
                            <tr style="border: 1px solid black;">
                                <td style="border: 1px solid black;">{{ $loop->iteration }}</td>
                                <td style="border: 1px solid black;">
                                    {{ $detail->barang->merek }}</td>
                                <td style="border: 1px solid black;">
                                    {{ $detail->barang->no_polisi }} </td>
                                    <td style="border: 1px solid black;">
                                        {{ $detail->lokasi_akhir }} </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="ttd-container" style="margin-top:30px;">
            <table style="border-collapse: collapse; width: 100%;">
                <thead style="text-align: center;">
                    <tr>
                        <td></td>
                        <td></td>
                        <td>Surabaya,
                            {{ Carbon::parse(date('Y-m-d'))->locale('id')->translatedFormat('d F Y') }}<br><br>Petugas Pemeliharaan</td>
                    </tr>
                </thead>
                <tbody style="text-align: center; text-indent: 5px;">
                    <tr>
                        <td style="height:135px; vertical-align:bottom"></td>
                        <td style="height:50px; width: 400px;"></td>
                        <td style="height:50px; vertical-align:bottom">{{$petugas[0]->nama}} <br>NIP. {{$petugas[0]->nip}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
