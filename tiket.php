<?php

abstract class Tiket {
    // Properti terenkapsulasi (protected) yang dipetakan dari kolom database
    protected int $idTiket;
    protected string $namaFilm;
    protected DateTime $jadwalTayang;
    protected int $jumlahKursi;
    protected float $hargaDasarTiket;

    // Constructor untuk menginisialisasi nilai data dari database
    public function __construct(int $idTiket, string $namaFilm, DateTime $jadwalTayang, int $jumlahKursi, float $hargaDasarTiket) {
        $this->idTiket = $idTiket;
        $this->namaFilm = $namaFilm;
        $this->jadwalTayang = $jadwalTayang;
        $this->jumlahKursi = $jumlahKursi;
        $this->hargaDasarTiket = $hargaDasarTiket;
    }

    // Metode Abstrak (Tanpa isi/body, wajib di-override di kelas anak)
    abstract public function hitungTotalHarga(): float;
    abstract public function tampilkanInfoFasilitas(): void;

    // Getter dan Setter untuk akses properti dari luar class (Enkapsulasi)
    public function getIdTiket(): int { return $this->idTiket; }
    public function setIdTiket(int $idTiket): void { $this->idTiket = $idTiket; }

    public function getNamaFilm(): string { return $this->namaFilm; }
    public function setNamaFilm(string $namaFilm): void { $this->namaFilm = $namaFilm; }

    public function getJadwalTayang(): DateTime { return $this->jadwalTayang; }
    public function setJadwalTayang(DateTime $jadwalTayang): void { $this->jadwalTayang = $jadwalTayang; }

    public function getJumlahKursi(): int { return $this->jumlahKursi; }
    public function setJumlahKursi(int $jumlahKursi): void { $this->jumlahKursi = $jumlahKursi; }

    public function getHargaDasarTiket(): float { return $this->hargaDasarTiket; }
    public function setHargaDasarTiket(float $hargaDasarTiket): void { $this->hargaDasarTiket = $hargaDasarTiket; }
}