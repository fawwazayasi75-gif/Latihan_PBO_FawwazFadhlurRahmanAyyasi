<?php
// Mengimport seluruh kelas yang dibutuhkan
require_once 'Tiket.php';
require_once 'TiketRegular.php';
require_once 'TiketIMAX.php';
require_once 'TiketVelvet.php';

// 1. Koneksi ke Database
$host     = "localhost";
$username = "root";
$password = "";
$database = "DB_LATIHAN_PBO_TI_1D_FawwazFadhlurRahmanAyyasi";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Koneksi database gagal: " . $conn->connect_error);
}

// 2. Mengambil data dari tabel tiket
$sql = "SELECT * FROM tiket";
$result = $conn->query($sql);

// Wadah untuk mengelompokkan objek tiket berdasarkan jenis studio
$daftarTiket = [
    'regular' => [],
    'IMAX'    => [],
    'velvet'  => []
];

// 3. Proses Polimorfisme: Mengubah baris tabel database menjadi Objek Spesifik
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $id       = (int)$row['id_tiket'];
        $film     = $row['nama_film'];
        $jadwal   = new DateTime($row['jadwal_tayang']);
        $kursi    = (int)$row['jumlah_kursi'];
        $harga    = (float)$row['harga_dasar_tiket'];
        $studio   = $row['jenis_studio'];

        // Instansiasi objek secara polimorfik berdasarkan jenis studio dari database
        if ($studio === 'regular') {
            $daftarTiket['regular'][] = new TiketRegular($id, $film, $jadwal, $kursi, $harga, $row['tipe_audio'], $row['lokasi_baris']);
        } elseif ($studio === 'IMAX') {
            $daftarTiket['IMAX'][] = new TiketIMAX($id, $film, $jadwal, $kursi, $harga, $row['kacamata_3d_id'], $row['efek_gerak_fitur']);
        } elseif ($studio === 'velvet') {
            $daftarTiket['velvet'][] = new TiketVelvet($id, $film, $jadwal, $kursi, $harga, $row['bantal_selimut_pack'], $row['layanan_butler']);
        }
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Tiket Bioskop - Fawwaz</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f4f6f9; color: #333; margin: 20px; }
        h1 { text-align: center; color: #2c3e50; }
        h2 { background-color: #2c3e50; color: white; padding: 10px; border-radius: 5px; margin-top: 30px; }
        .grid-container { display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 20px; margin-top: 15px; }
        .card { background: white; padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.05); border-left: 5px solid #ccc; }
        .card.regular { border-left-color: #3498db; }
        .card.IMAX { border-left-color: #e67e22; }
        .card.velvet { border-left-color: #9b59b6; }
        .film-title { font-size: 1.2em; font-weight: bold; margin-bottom: 10px; color: #222; }
        .info-row { margin-bottom: 6px; font-size: 0.95em; }
        .label { font-weight: bold; color: #666; }
        .fasilitas-box { background: #f8f9fa; padding: 10px; border-radius: 5px; margin-top: 10px; border: 1px dashed #ddd; font-size: 0.9em; }
        .total-harga { font-size: 1.1em; font-weight: bold; color: #27ae60; margin-top: 12px; border-top: 1px solid #eee; padding-top: 8px; }
    </style>
</head>
<body>

    <h1>Daftar Pesanan Tiket Bioskop</h1>

    <?php foreach ($daftarTiket as $jenisStudio => $kumpulanTiket): ?>
        <h2>Studio <?= strtoupper($jenisStudio) ?> (<?= count($kumpulanTiket) ?> Tiket)</h2>
        <div class="grid-container">
            <?php if (empty($kumpulanTiket)): ?>
                <p>Tidak ada pemesanan untuk tipe studio ini.</p>
            <?php else: ?>
                <?php foreach ($kumpulanTiket as $tiket): ?>
                    <div class="card <?= $jenisStudio ?>">
                        <div class="film-title"><?= htmlspecialchars($tiket->getNamaFilm()) ?></div>
                        <div class="info-row"><span class="label">ID Tiket:</span> #<?= $tiket->getIdTiket() ?></div>
                        <div class="info-row"><span class="label">Jadwal:</span> <?= $tiket->getJadwalTayang()->format('d M Y - H:i') ?> WIB</div>
                        <div class="info-row"><span class="label">Jumlah Kursi:</span> <?= $tiket->getJumlahKursi() ?></div>
                        <div class="info-row"><span class="label">Harga Dasar:</span> Rp<?= number_format($tiket->getHargaDasarTiket(), 0, ',', '.') ?></div>
                        
                        <div class="fasilitas-box">
                            <?php $tiket->tampilkanInfoFasilitas(); ?>
                        </div>

                        <div class="total-harga">
                            Total Bayar: Rp<?= number_format($tiket->hitungTotalHarga(), 0, ',', '.') ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>

</body>
</html>