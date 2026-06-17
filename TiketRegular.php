<?php
require_once 'Tiket.php';

class TiketRegular extends Tiket {
    // Properti tambahan spesifik
    private ?string $tipeAudio;
    private ?string $lokasiBaris;

    // Constructor menerima parameter induk + parameter spesifik
    public function __construct(
        int $idTiket, string $namaFilm, DateTime $jadwalTayang, int $jumlahKursi, float $hargaDasarTiket,
        ?string $tipeAudio, ?string $lokasiBaris
    ) {
        // Memanggil constructor milik parent class (Tiket)
        parent::__construct($idTiket, $namaFilm, $jadwalTayang, $jumlahKursi, $hargaDasarTiket);
        $this->tipeAudio = $tipeAudio;
        $this->lokasiBaris = $lokasiBaris;
    }

    // Mengimplementasikan hitungTotalHarga() untuk Regular
    public function hitungTotalHarga(): float {
        // Total harga = harga dasar dikali jumlah kursi yang dibeli
        return $this->hargaDasarTiket * $this->jumlahKursi;
    }

    // Mengimplementasikan tampilkanInfoFasilitas() untuk Regular
    public function tampilkanInfoFasilitas(): void {
        echo "=== FASILITAS STUDIO REGULAR ===<br>";
        echo "Lokasi Baris Kursi: " . ($this->lokasiBaris ?? "Tidak ditentukan") . "<br>";
        echo "Tipe Audio        : " . ($this->tipeAudio ?? "Standard Stereo") . "<br>";
    }

    // Getter & Setter spesifik
    public function getTipeAudio(): ?string { return $this->tipeAudio; }
    public function setTipeAudio(?string $tipeAudio): void { $this->tipeAudio = $tipeAudio; }

    public function getLokasiBaris(): ?string { return $this->lokasiBaris; }
    public function setLokasiBaris(?string $lokasiBaris): void { $this->lokasiBaris = $lokasiBaris; }
}