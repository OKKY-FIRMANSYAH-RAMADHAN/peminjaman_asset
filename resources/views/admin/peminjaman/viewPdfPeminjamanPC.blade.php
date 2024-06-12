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
                    <h5 style="margin-top: -20px;margin-left: -80px;font-weight:normal">BADAN PENGEMBANGAN SUMBER DAYA
                        MANUSIA</h5>
                    <h4 style="margin-top: -20px;margin-left: -80px;">BALAI PENGEMBANGAN KOMPETENSI PUPR
                        WILAYAH VI SURABAYA</h4>
                    <h6 style="margin-top: -20px;margin-left: -80px;font-weight:normal">Jalan Gayung Kebonsari 48,
                        Gayungan, Surabaya 60234, Telepon (031) 8291040, 8286501 Faksimili 8275847</h6>
                </div>
            </div>
        </div>
        <br>
        <div class="isi">
            <div class="judul">
                <p style="margin-top: 3px; text-align:center; font-weight:bold;">
                    SURAT IZIN PEMAKAIAN LAPTOP UNTUK OPERASIONAL <br> KEMENTERIAN PEKERJAAN UMUM DAN PERUMAHAN RAKYAT
                    <br> NOMOR : 02/KET/Mo/2024</p>
                <table>
                    <tr>
                        <td>Dalam rangka penggunaan pemakaian Laptop/Notebook pada Satuan Kerja Balai Pengembangan Kompetensi Wilayah VI Surabaya, dengan ini:</td>
                    </tr>
                </table>
                <table style="margin-top: 10px">
                    <tr>
                        <td>Nama</td>
                        <td style="padding-left:50px;">:</td>
                        <td>{{ $peminjaman[0]->peminjam }}</td>
                    </tr>
                    <tr>
                        <td>NIP</td>
                        <td style="padding-left:50px;">:</td>
                        <td>{{ $peminjaman[0]->instansi }}</td>
                    </tr>
                    <tr>
                        <td>Pangkat/Golongan</td>
                        <td style="padding-left:50px;">:</td>
                        <td style="word-wrap: break-word;vertical-align:top">{{ $peminjaman[0]->alamat }}</td>
                    </tr>
                    <tr>
                        <td>Jabatan</td>
                        <td style="padding-left:50px;">:</td>
                        <td>{{ $peminjaman[0]->no_telp }}</td>
                    </tr>
                    <tr>
                        <td>Alamat Rumah</td>
                        <td style="padding-left:50px;">:</td>
                        <td>{{ $peminjaman[0]->no_telp }}</td>
                    </tr>
                </table>
                <p style="margin-top: 10px; text-align:center; font-weight:bold;">DIIZINKAN</p>
                <table>
                    <tr>
                        <td>Untuk memakai dan menyimpan di rumah 1 (satu) unit Laptop / Notebook yaitu:</td>
                    </tr>
                </table>
                <table style="margin-top: 5px">
                    <tr>
                        <td>Laptop/Notebook</td>
                        <td style="padding-left:50px;">:</td>
                        <td>{{ $peminjaman[0]->peminjam }}</td>
                    </tr>
                    <tr>
                        <td>Merk / Type</td>
                        <td style="padding-left:50px;">:</td>
                        <td>{{ $peminjaman[0]->instansi }}</td>
                    </tr>
                    <tr>
                        <td>Warna</td>
                        <td style="padding-left:50px;">:</td>
                        <td style="word-wrap: break-word;vertical-align:top">{{ $peminjaman[0]->alamat }}</td>
                    </tr>
                    <tr>
                        <td>Kode Barang/NUP</td>
                        <td style="padding-left:50px;">:</td>
                        <td>{{ $peminjaman[0]->no_telp }}</td>
                    </tr>
                    <tr>
                        <td>Tahun</td>
                        <td style="padding-left:50px;">:</td>
                        <td>{{ $peminjaman[0]->no_telp }}</td>
                    </tr>
                </table>
                <table style="margin-top: 10px;">
                    <tr>
                        <td>Dengan Ketentuan:</td>
                    </tr>
                </table>
                <div style="margin-top: -15px;">
                    <ol>
                        <li>Izin bersifat sementara dan akan disesuaikan dengan kebutuhan dinas dan penugasan pejabat yang bersangkutan;</li>
                        <li>Pemakai bertanggung jawab atas segala perawatan, pemeliharaan, kerusakan dan kehilangan, dan bersedia dikenakan Tuntutan Ganti Rugi sesuai dengan ketentuan peraturan perundang-undangan;</li>
                        <li>Laptop/Notebook hanya untuk keperluan dinas/tugas, dan tidak dibenarkan untuk keperluan pribadi/keluarga;</li>
                        <li>Pemakai menandatangani Surat Pernyataan Kesediaan mengembalikan Laptop/Notebook  kepada Satuan Kerja selaku Kuasa Pengguna Barang, sebagaimana terlampir;</li>
                        <li>SIP ini berlaku selama 2 (dua) tahun sejak ditandatanganinya surat ini.</li>
                    </ol>
                </div>
            </div>

            <div class="ttd-container" style="margin-top:15px;">
                <table style="border-collapse: collapse; width: 100%;">
                    <thead style="text-align: center;">
                        <tr>
                            <td><br><br>Pemakai <br> Laptop/Notebook</td>
                            <td></td>
                            <td>Surabaya, {{ Carbon::parse(date('Y-m-d'))->locale('id')->translatedFormat('d F Y') }}
                                <br><br>Kepala Satuan Kerja <br> Selaku Kuasa Pengguna Barang</td>
                        </tr>
                    </thead>
                    <tbody style="text-align: center; text-indent: 5px;">
                        <tr>
                            <td style="height:130px; vertical-align:bottom"><span
                                    style="text-decoration: underline; font-weight:bold">Heru Kurniawan, S.Pd.,
                                    M.T.</span> <br>NIP. 198308242010121005</td>
                            <td style="height:50px; width: 160px;"></td>
                            <td style="height:130px; vertical-align:bottom"><span
                                style="text-decoration: underline; font-weight:bold">Diki Zulkarnaen, S.T., M.Sc.</span> <br>NIP. 197904182005021001</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
