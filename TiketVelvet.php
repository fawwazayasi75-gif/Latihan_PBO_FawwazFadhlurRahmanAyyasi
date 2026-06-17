<?php
require_once 'Tiket.php';

class TiketVelvet extends Tiket {
    // Properti tambahan spesifik
    private ?string $bantalSelimutPack;
    private ?string $layananButler;

    public function __construct(
        int $idTiket, string $namaFilm, DateTime $jadwalTayang, int $jumlahKursi, float $hargaDasarTiket,
        ?string $bantalSelimutPack, ?string $layananButler
    ) {
        parent::__construct($idTiket, $namaFilm, $jadwalTayang, $jumlahKursi, $hargaDasarTiket);
        $this->bantalSelimutPack = $bantalSelimutPack;
        $this->layananButler = $layananButler;
    }

    // Mengimplementasikan hitungTotalHarga() untuk Velvet
    public function hitungTotalHarga(): float {
        $biayaPremiumService = 50000.00; // Tambahan biaya kenyamanan bed + butler service
        return ($this->hargaDasarTiket + $biayaPremiumService) * $this->jumlahKursi;
    }

    // Mengimplementasikan tampilkanInfoFasilitas() untuk Velvet
    public function tampilkanInfoFasilitas(): void {
        echo "=== FASILITAS STUDIO VELVET ===<br>";
        echo "Paket Kenyamanan : " . ($this->bantalSelimutPack ?? "Standard Pillow") . "<br>";
        echo "Layanan Butler   : " . ($this->layananButler ?? "Tidak Tersedia") . "<br>";
    }

    // Getter & Setter spesifik
    public function getBantalSelimutPack(): ?string { return $this->bantalSelimutPack; }
    public function setBantalSelimutPack(?string $bantalSelimutPack): void { $this->bantalSelimutPack = $bantalSelimutPack; }

    public function getLayananButler(): ?string { return $this->layananButler; }
    public function setLayananButler(?string $layananButler): void { $this->layananButler = $layananButler; }
}