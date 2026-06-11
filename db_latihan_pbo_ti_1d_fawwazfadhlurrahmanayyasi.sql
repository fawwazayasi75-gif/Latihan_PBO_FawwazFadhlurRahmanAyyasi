-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 11, 2026 at 07:16 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_latihan_pbo_ti_1d_fawwazfadhlurrahmanayyasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tiket`
--

CREATE TABLE `tiket` (
  `id_tiket` int NOT NULL,
  `nama_film` varchar(150) NOT NULL,
  `jadwal_tayang` datetime NOT NULL,
  `jumlah_kursi` int NOT NULL,
  `harga_dasar_tiket` decimal(10,2) NOT NULL,
  `jenis_studio` enum('regular','IMAX','velvet') NOT NULL,
  `tipe_audio` varchar(50) DEFAULT NULL,
  `lokasi_baris` varchar(10) DEFAULT NULL,
  `kacamata_3d_id` varchar(50) DEFAULT NULL,
  `efek_gerak_fitur` varchar(100) DEFAULT NULL,
  `bantal_selimut_pack` varchar(50) DEFAULT NULL,
  `layanan_butler` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tiket`
--

INSERT INTO `tiket` (`id_tiket`, `nama_film`, `jadwal_tayang`, `jumlah_kursi`, `harga_dasar_tiket`, `jenis_studio`, `tipe_audio`, `lokasi_baris`, `kacamata_3d_id`, `efek_gerak_fitur`, `bantal_selimut_pack`, `layanan_butler`) VALUES
(1, 'The Batman', '2026-06-12 13:00:00', 120, '40000.00', 'regular', NULL, 'Row A', NULL, NULL, NULL, NULL),
(2, 'Spider-Man: No Way Home', '2026-06-12 15:30:00', 120, '40000.00', 'regular', NULL, 'Row B', NULL, NULL, NULL, NULL),
(3, 'Inception', '2026-06-12 18:45:00', 100, '45000.00', 'regular', NULL, 'Row C', NULL, NULL, NULL, NULL),
(4, 'Interstellar', '2026-06-13 12:00:00', 100, '45000.00', 'regular', NULL, 'Row D', NULL, NULL, NULL, NULL),
(5, 'Conjuring 4', '2026-06-13 21:00:00', 120, '50000.00', 'regular', NULL, 'Row E', NULL, NULL, NULL, NULL),
(6, 'Agak Laen 2', '2026-06-14 14:00:00', 150, '40000.00', 'regular', NULL, 'Row F', NULL, NULL, NULL, NULL),
(7, 'KKN di Desa Penari 2', '2026-06-14 17:00:00', 150, '40000.00', 'regular', NULL, 'Row G', NULL, NULL, NULL, NULL),
(8, 'Avatar: The Way of Water', '2026-06-12 14:00:00', 80, '75000.00', 'IMAX', 'Dolby Atmos 11.1', NULL, 'Xpand 3D-01', 'Hydro-Motion', NULL, NULL),
(9, 'Dune: Part Two', '2026-06-12 19:30:00', 80, '75000.00', 'IMAX', 'IMAX 12-Channel', NULL, 'Xpand 3D-02', 'Bass-Shaker', NULL, NULL),
(10, 'Oppenheimer', '2026-06-13 13:00:00', 80, '80000.00', 'IMAX', 'IMAX 6-Track', NULL, NULL, 'Standard Vibration', NULL, NULL),
(11, 'Top Gun: Maverick', '2026-06-13 16:30:00', 80, '80000.00', 'IMAX', 'Dolby Atmos 11.1', NULL, NULL, 'G-Force Simulator', NULL, NULL),
(12, 'The Matrix Resurrections', '2026-06-14 13:00:00', 70, '75000.00', 'IMAX', 'Dolby Atmos', NULL, 'Xpand 3D-03', 'Tilt-Motion', NULL, NULL),
(13, 'Avengers: Secret Wars', '2026-06-14 16:15:00', 90, '90000.00', 'IMAX', 'IMAX 12-Channel', NULL, 'Xpand 3D-04', 'Full-Motion', NULL, NULL),
(14, 'Star Wars: New Jedi Order', '2026-06-14 20:00:00', 90, '90000.00', 'IMAX', 'IMAX 12-Channel', NULL, 'Xpand 3D-05', 'Full-Motion', NULL, NULL),
(15, 'Titanic Remastered', '2026-06-12 15:00:00', 30, '120000.00', 'velvet', NULL, NULL, NULL, NULL, 'Premium Pack A', 'Personal Butler - Adi'),
(16, 'La La Land', '2026-06-12 20:15:00', 30, '120000.00', 'velvet', NULL, NULL, NULL, NULL, 'Premium Pack B', 'Personal Butler - Siska'),
(17, 'The Godfather', '2026-06-13 14:00:00', 24, '150000.00', 'velvet', NULL, NULL, NULL, NULL, 'Luxury Silk Pack', 'VIP Butler - Budi'),
(18, 'Gladiator II', '2026-06-13 19:00:00', 24, '150000.00', 'velvet', NULL, NULL, NULL, NULL, 'Luxury Silk Pack', 'VIP Butler - Mega'),
(19, 'Past Lives', '2026-06-14 15:30:00', 30, '120000.00', 'velvet', NULL, NULL, NULL, NULL, 'Premium Pack A', 'Personal Butler - Dodi'),
(20, 'Interstellar (Special Screening)', '2026-06-14 19:00:00', 24, '150000.00', 'velvet', NULL, NULL, NULL, NULL, 'Luxury Silk Pack', 'VIP Butler - Rian');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`id_tiket`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tiket`
--
ALTER TABLE `tiket`
  MODIFY `id_tiket` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
