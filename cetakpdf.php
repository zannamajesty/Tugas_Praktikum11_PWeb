<?php 
    include('koneksi.php');
    require_once("dompdf/autoload.inc.php");
    use Dompdf\Dompdf;

    $dompdf = new Dompdf();
    $query = mysqli_query($koneksi,"select * from data_diri");
    $html = '<center><h3>Daftar Nama Siswa</h3></center><hr/><br/>';
    $html .= '<table border="1" cellspacing="0" width="100%">
        <tr>
        <th>ID</th>
        <th>Jenis Pendaftaran</th>
        <th>Tanggal Masuk</th>
        <th>NIS</th>
        <th>Nomor Ujian</th>
        <th>Paud</th>
        <th>TK</th>
        <th>SKHUN Lama</th>
        <th>Ijazah Lama</th>
        <th>Hobi</th>
        <th>Cita-cita</th>
        <th>Nama Lengkap</th>
        <th>Jenis Kelamin</th>
        <th>NISN</th>
        <th>NIK</th>
        <th>Tempat Lahir</th>
        <th>Tanggal Lahir</th>
        <th>Agama</th>
        <th>Berkebutuhan Khusus</th>
        <th>Alamat Jalan</th>
        <th>RT</th>
        <th>RW</th>
        <th>Nama Dusun</th>
        <th>Nama Kelurahan/Desa</th>
        <th>Kecamatan</th>
        <th>Kode Pos</th>
        <th>Tempat Tinggal</th>
        <th>Mode Transportasi</th>
        <th>Nomor HP</th>
        <th>Email Pribadi</th>
        <th>Penerima KPS/PKH/KIP</th>
        <th>No. KPS/PKH/KIP</th>
        <th>Kewarganegaraan</th>
        <th>Negara</th>
        </tr>';
    $no = 1;

    while ($row = mysqli_fetch_array($query)) {
        $html .= "<tr>
        <td>".$no."</td>
        <td>".$row['jenis_pendaftaran']."</td>
        <td>".$row['tgl_msk']."</td>
        <td>".$row['nis']."</td>
        <td>".$row['no_ujian']."</td>
        <td>".$row['paud']."</td>
        <td>".$row['tk']."</td>
        <td>".$row['skhun']."</td>
        <td>".$row['ijazah']."</td>
        <td>".$row['hobi']."</td>
        <td>".$row['cita2']."</td>
        <td>".$row['nama']."</td>
        <td>".$row['jenis_kelamin']."</td>
        <td>".$row['nisn_sekarang']."</td>
        <td>".$row['nik']."</td>
        <td>".$row['tempat_lahir']."</td>
        <td>".$row['tanggal_lahir']."</td>
        <td>".$row['agama']."</td>
        <td>".$row['berkebutuhan']."</td>
        <td>".$row['alamat']."</td>
        <td>".$row['rt']."</td>
        <td>".$row['rw']."</td>
        <td>".$row['dusun']."</td>
        <td>".$row['kelurahan']."</td>
        <td>".$row['kecamatan']."</td>
        <td>".$row['kode_pos']."</td>
        <td>".$row['tempat_tinggal']."</td>
        <td>".$row['transportasi']."</td>
        <td>".$row['no_hp']."</td>
        <td>".$row['email']."</td>
        <td>".$row['kps']."</td>
        <td>".$row['no_kps']."</td>
        <td>".$row['kewarganegaraan']."</td>
        <td>".$row['negara']."</td>
        </tr>";
        
        $no++;
    }
    
    $html .= "</html>";
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A1','landscape');
    $dompdf->render();
    $dompdf->stream('laporan_form_pendaftaran.pdf');
 ?>