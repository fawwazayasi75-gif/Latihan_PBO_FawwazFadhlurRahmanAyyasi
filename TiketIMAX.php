<?php
require_once 'Tiket.php';

class TiketIMAX extends Tiket {
    // Properti tambahan spesifik
    private ?string $kacamata3dId;
    private ?string $efekGerakFitur;

    public function __construct(
        int $idTiket, string $namaFilm, DateTime $jadwalTayang, int $jumlahKursi, float $hargaDasarTiket,
        ?string $kacamata3dId, ?string $efekGerakFitur
    ) {
        parent::__construct($idTiket, $namaFilm, $jadwalTayang, $jumlahKursi, $hargaDasarTiket);
        $this->kacamata3dId = $kacamata3dId;
        $this->efekGerakFitur = $efekGerakFitur;
    }

    // Mengimplementasikan hitungTotalHarga() untuk IMAX
    public function hitungTotalHarga(): float {
        $biayaTambahanIMAX = 25000.00; // Contoh biaya sewa kacamata & efek imersif
        return ($this->hargaDasarTiket + $biayaTambahanIMAX) * $this->jumlahKursi;
    }

    // Mengimplementasikan tampilkanInfoFasilitas() untuk IMAX
    public function tampilkanInfoFasilitas(): void {
        echo "=== FASILITAS STUDIO IMAX ===<br>";
        echo "ID Kacamata 3D   : " . ($this->kacamata3dId ?? "Tidak Menggunakan 3D") . "<br>";
        echo "Fitur Efek Gerak : " . ($this->efekGerakFitur ?? "Standard Vibration") . "<br>";
    }

    // Getter & Setter spesifik
    public function getKacamata3dId(): ?string { return $this->kacamata3dId; }
    public function setKacamata3dId(?string $kacamata3dId): void { $this->kacamata3dId = $kacamata3dId; }

    public function getEfekGerakFitur(): ?string { return $this->efekGerakFitur; }
    public function setEfekGerakFitur(?string $efekGerakFitur): void { $this->efekGerakFitur = $efekGerakFitur; }
}