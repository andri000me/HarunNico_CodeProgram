-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Jan 2020 pada 08.06
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proyek3`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun_pengguna`
--

CREATE TABLE `akun_pengguna` (
  `id_pengguna` varchar(7) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(255) NOT NULL,
  `hak_akses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `akun_pengguna`
--

INSERT INTO `akun_pengguna` (`id_pengguna`, `username`, `password`, `hak_akses`) VALUES
('USER001', 'harun', '$2y$10$nxax1fn6c57V6iowJLujx.0mN0D3olNxO6y3n6wJmX5Q7..ztFuY6', 0),
('USER002', 'nico', '$2y$10$NHdTA7Zw2lnc0QePdmKCGuV.czTKaO2Bfu0H0dB5pZ95K8/unHH4G', 3),
('USER003', 'cecep', '$2y$10$jeXKqbsrO4pFF7BG0whUNekRgvwWuh4xJ1mJqMYUMjka8DPUDZo72', 1),
('USER004', 'jajang', '$2y$10$6Ub/hqI4mteovlM2erlYp.Te0Xr0idzVIHRNT5JzDTmVobsQv/WCa', 3),
('USER005', 'aegistar', '$2y$10$lRihLiQMZ1P10qDzvGYoBuBTHkwbIgI/nlX0JfyIVub3mtdFYzyum', 4),
('USER006', 'luna', '$2y$10$YbWr/5dGlmdy5eCWO4OkAuom5WBUAclig6wdlCYG9sim32wAbD6Fe', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `asal_barang`
--

CREATE TABLE `asal_barang` (
  `id_asal` varchar(6) NOT NULL,
  `nama_lokasi_asal` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `asal_barang`
--

INSERT INTO `asal_barang` (`id_asal`, `nama_lokasi_asal`) VALUES
('FRM001', 'Subang'),
('FRM002', 'Bandung'),
('FRM003', 'Cikarang'),
('FRM004', 'Semarang'),
('FRM005', 'Jakarta'),
('FRM006', 'Surabaya'),
('FRM007', 'Madura');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id_barang_keluar` varchar(7) NOT NULL,
  `id_lorong` varchar(7) DEFAULT NULL,
  `id_pengemudi` varchar(9) DEFAULT NULL,
  `id_kendaraan` varchar(7) DEFAULT NULL,
  `id_tujuan` varchar(6) DEFAULT NULL,
  `waktu_keluar` datetime DEFAULT NULL,
  `waktu_selesai` datetime DEFAULT NULL,
  `waktu_ambil` datetime DEFAULT NULL,
  `status_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang_keluar`
--

INSERT INTO `barang_keluar` (`id_barang_keluar`, `id_lorong`, `id_pengemudi`, `id_kendaraan`, `id_tujuan`, `waktu_keluar`, `waktu_selesai`, `waktu_ambil`, `status_barang`) VALUES
('ITOU001', 'LANE001', 'DRV002', 'TNPS004', 'LCT001', '2020-01-10 20:33:35', '2020-01-10 20:36:24', '2020-01-15 21:15:30', 2),
('ITOU002', 'LANE002', 'DRV001', 'TNPS006', 'LCT002', '2020-01-12 20:56:03', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id_barang` varchar(7) NOT NULL,
  `id_asal` varchar(6) NOT NULL,
  `id_lorong` varchar(7) NOT NULL,
  `waktu_masuk` datetime DEFAULT NULL,
  `jumlah_brg_masuk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang_masuk`
--

INSERT INTO `barang_masuk` (`id_barang`, `id_asal`, `id_lorong`, `waktu_masuk`, `jumlah_brg_masuk`) VALUES
('ITEM001', 'FRM004', 'LANE001', '2020-01-10 20:33:23', 200),
('ITEM002', 'FRM003', 'LANE003', '2020-01-12 20:55:23', 300),
('ITEM003', 'FRM003', 'LANE003', '2020-01-12 20:55:46', 500);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `data_pengeluaran`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `data_pengeluaran` (
`id_barang_keluar` varchar(7)
,`total_dimensi` int(11)
,`seluruh_dimensi` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `detail_barang_android`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `detail_barang_android` (
`id_pengemudi` varchar(9)
,`id_kendaraan` varchar(7)
,`id_barang_keluar` varchar(7)
,`id_barang` varchar(7)
,`id_ktgr_brg` varchar(7)
,`id_nama_barang` varchar(8)
,`id_merk_barang` varchar(7)
,`jmlh_brg_klr` int(11)
,`dimensi_barang` int(11)
,`total_dimensi` int(11)
,`nama_ktgr_brg` varchar(50)
,`nama_barang` varchar(50)
,`nama_merk_barang` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `detail_barang_keluar`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `detail_barang_keluar` (
`id_barang_keluar` varchar(7)
,`id_pengemudi` varchar(9)
,`id_kendaraan` varchar(7)
,`id_tujuan` varchar(6)
,`nama` varchar(50)
,`nama_kendaraan` varchar(25)
,`nama_lokasi_tujuan` varchar(50)
,`status_barang` int(11)
,`waktu_keluar` datetime
,`waktu_selesai` datetime
,`waktu_ambil` datetime
,`waktu_respon` time
,`waktu_perjalanan` time
,`total_keseluruhan` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `detail_barang_masuk`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `detail_barang_masuk` (
`nama_ktgr_brg` varchar(50)
,`nama_barang` varchar(50)
,`nama_merk_barang` varchar(50)
,`nama_lokasi_asal` varchar(50)
,`waktu_masuk` datetime
,`jumlah_brg_masuk` int(11)
,`id_barang` varchar(7)
,`id_lorong` varchar(7)
,`nama_lorong` varchar(50)
,`stok_barang` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `detail_data_pemesanan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `detail_data_pemesanan` (
`id_pemesanan` varchar(12)
,`id_toko` varchar(8)
,`bukti_pembayaran` varchar(50)
,`status_pemesanan` int(11)
,`nama_toko` varchar(30)
,`alamat_toko` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `detail_kendaraan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `detail_kendaraan` (
`id_kendaraan` varchar(7)
,`id_merk_kendaraan` varchar(7)
,`id_nama_kendaraan` varchar(8)
,`jenis_kendaraan` int(11)
,`kapasitas` int(11)
,`no_kendaraan` varchar(10)
,`status_kendaraan` int(11)
,`nama_mk` varchar(25)
,`nama_kendaraan` varchar(25)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `detail_merk_barang`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `detail_merk_barang` (
`id_merk_barang` varchar(7)
,`id_nama_barang` varchar(8)
,`nama_merk_barang` varchar(50)
,`nama_barang` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `detail_nama_barang`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `detail_nama_barang` (
`id_nama_barang` varchar(8)
,`id_ktgr_brg` varchar(7)
,`nama_barang` varchar(50)
,`nama_ktgr_brg` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `detail_nama_kendaraan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `detail_nama_kendaraan` (
`nama_mk` varchar(25)
,`id_nama_kendaraan` varchar(8)
,`id_merk_kendaraan` varchar(7)
,`nama_kendaraan` varchar(25)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `detail_pemesanan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `detail_pemesanan` (
`id_pemesanan` varchar(12)
,`jmlh_pemesanan` int(11)
,`nama_ktgr_brg` varchar(50)
,`nama_barang` varchar(50)
,`nama_merk_barang` varchar(50)
,`status_pemesanan` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `detail_pengeluaran`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `detail_pengeluaran` (
`nama_ktgr_brg` varchar(50)
,`nama_barang` varchar(50)
,`nama_merk_barang` varchar(50)
,`id_barang_keluar` varchar(7)
,`jmlh_brg_klr` int(11)
,`dimensi_barang` int(11)
,`total_dimensi` int(11)
,`status_barang` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `detail_pengemudi`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `detail_pengemudi` (
`id_pengguna` varchar(7)
,`nama` varchar(50)
,`umur` int(11)
,`alamat_pengguna` varchar(100)
,`id_pengemudi` varchar(9)
,`tanggal_lahir` date
,`no_hp_penggemudi` varchar(15)
,`foto_penggemudi` varchar(50)
,`status_pengemudi` int(11)
,`email_pengemudi` varchar(30)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `detail_pengguna`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `detail_pengguna` (
`id_pengguna` varchar(7)
,`nama` varchar(50)
,`umur` int(11)
,`alamat_pengguna` varchar(100)
,`username` varchar(16)
,`password` varchar(255)
,`hak_akses` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `detail_rak`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `detail_rak` (
`id_rak` varchar(6)
,`nama_lorong` varchar(50)
,`nama_ktgr_brg` varchar(50)
,`id_lorong` varchar(7)
,`id_ktgr_brg` varchar(7)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `detail_stok`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `detail_stok` (
`id_nama_barang` varchar(8)
,`nama_ktgr_brg` varchar(50)
,`nama_barang` varchar(50)
,`nama_merk_barang` varchar(50)
,`stok` decimal(32,0)
,`jenis_barang` int(11)
,`panjang_barang` int(11)
,`lebar_barang` int(11)
,`tinggi_barang` int(11)
,`id_barang` varchar(7)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `detail_stok_khusus`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `detail_stok_khusus` (
`nama_ktgr_brg` varchar(50)
,`nama_barang` varchar(50)
,`nama_merk_barang` varchar(50)
,`stok_barang` int(11)
,`panjang_barang` int(11)
,`lebar_barang` int(11)
,`tinggi_barang` int(11)
,`id_barang` varchar(7)
,`id_ktgr_brg` varchar(7)
,`id_nama_barang` varchar(8)
,`id_merk_barang` varchar(7)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `detail_toko`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `detail_toko` (
`id_pengguna` varchar(7)
,`nama` varchar(50)
,`umur` int(11)
,`alamat_pengguna` varchar(100)
,`id_toko` varchar(8)
,`nama_toko` varchar(30)
,`alamat_toko` varchar(100)
,`notel_toko` varchar(15)
,`id_tujuan` varchar(6)
,`nama_lokasi_tujuan` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `detail_tujuan_android`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `detail_tujuan_android` (
`id_barang_keluar` varchar(7)
,`id_pengemudi` varchar(9)
,`id_kendaraan` varchar(7)
,`id_tujuan` varchar(6)
,`nama_lokasi_tujuan` varchar(50)
,`latitude` varchar(30)
,`longitude` varchar(30)
,`status_barang` int(11)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_barang`
--

CREATE TABLE `kategori_barang` (
  `id_ktgr_brg` varchar(7) NOT NULL,
  `nama_ktgr_brg` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori_barang`
--

INSERT INTO `kategori_barang` (`id_ktgr_brg`, `nama_ktgr_brg`) VALUES
('CTGR001', 'Makanan'),
('CTGR002', 'Minuman'),
('RCK003', 'Alat Tulis Kantor');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kendaraan`
--

CREATE TABLE `kendaraan` (
  `id_kendaraan` varchar(7) NOT NULL,
  `id_merk_kendaraan` varchar(7) NOT NULL,
  `id_nama_kendaraan` varchar(8) NOT NULL,
  `jenis_kendaraan` int(11) NOT NULL,
  `kapasitas` int(11) NOT NULL,
  `no_kendaraan` varchar(10) NOT NULL,
  `status_kendaraan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kendaraan`
--

INSERT INTO `kendaraan` (`id_kendaraan`, `id_merk_kendaraan`, `id_nama_kendaraan`, `jenis_kendaraan`, `kapasitas`, `no_kendaraan`, `status_kendaraan`) VALUES
('TNPS001', 'MRKT003', 'TNAME006', 0, 2592000, 'D1234AD', 0),
('TNPS002', 'MRKT001', 'TNAME001', 1, 4738000, 'D1174BD', 0),
('TNPS003', 'MRKT001', 'TNAME002', 2, 24640000, 'D1902FB', 0),
('TNPS004', 'MRKT002', 'TNAME004', 2, 24640000, 'D4096NS', 0),
('TNPS005', 'MRKT004', 'TNAME007', 2, 24640000, 'D6987EH', 0),
('TNPS006', 'MRKT005', 'TNAME010', 3, 31878000, 'D5321JH', 0),
('TNPS007', 'MRKT004', 'TNAME008', 3, 31878000, 'D3790PK', 0),
('TNPS008', 'MRKT002', 'TNAME005', 3, 31878000, 'D9876KL', 0),
('TNPS009', 'MRKT001', 'TNAME003', 3, 31650000, 'D2464IS', 0),
('TNPS010', 'MRKT005', 'TNAME010', 4, 63480000, 'D6349EH', 0),
('TNPS011', 'MRKT003', 'TNAME006', 0, 2592000, 'B1890LH', 0),
('TNPS012', 'MRKT003', 'TNAME006', 0, 2592000, 'B1987KY', 0),
('TNPS013', 'MRKT001', 'TNAME001', 1, 4738000, 'B1476JK', 0),
('TNPS014', 'MRKT001', 'TNAME001', 1, 4738000, 'B3768IK', 0),
('TNPS015', 'MRKT005', 'TNAME009', 4, 63480000, 'B6754PK', 0),
('TNPS016', 'MRKT005', 'TNAME010', 4, 63480000, 'D7634LK', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_pengguna`
--

CREATE TABLE `log_pengguna` (
  `id_pengguna` varchar(7) NOT NULL,
  `log_tipe` varchar(50) DEFAULT NULL,
  `log_aksi` varchar(50) DEFAULT NULL,
  `log_item` varchar(50) DEFAULT NULL,
  `log_assign_to` varchar(50) DEFAULT NULL,
  `log_assign_type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `log_pengguna`
--

INSERT INTO `log_pengguna` (`id_pengguna`, `log_tipe`, `log_aksi`, `log_item`, `log_assign_to`, `log_assign_type`) VALUES
('USER006', 'Pemesanan', 'Menambah Pemesanan', '', '', ''),
('USER006', 'Detail Pemesanan', 'Menambah Detail Pemesanan', '', '', ''),
('USER006', 'Pemesanan', 'Mengubah Pemesanan', '', '', ''),
('USER003', 'Stok Barang', 'Menambah Stok Barang', 'ITEM001', '', ''),
('USER003', 'Barang Masuk', 'Menambah Barang Masuk', '', '', ''),
('USER003', 'Barang Keluar', 'Menambah Barang Keluar', '', '', ''),
('USER003', 'Barang Keluar', 'Menambah Detail Barang Keluar', '', '', ''),
('USER003', 'Stok Barang', 'Mengubah Stok Barang', '', '', ''),
('USER003', 'Barang Keluar', 'Mengubah Barang Keluar', '', '', ''),
('USER003', 'Pengemudi', 'Mengubah Pengemudi', '', '', ''),
('USER003', 'Kendaraan', 'Mengubah Kendaraan', '', '', ''),
('USER003', 'Pemesanan', 'Mengubah Pemesanan', '', '', ''),
('USER003', 'Barang Keluar', 'Menambah Barang Keluar', '', '', ''),
('USER003', 'Barang Keluar', 'Menambah Detail Barang Keluar', '', '', ''),
('USER003', 'Stok Barang', 'Mengubah Stok Barang', '', '', ''),
('USER001', 'Pengguna', 'Mengubah Pengguna', '', '', ''),
('USER001', 'User', 'Mengubah User', '', '', ''),
('USER001', 'User', 'Mengubah User', '', '', ''),
('USER001', 'Pengemudi', 'Mengubah Pengemudi', '', '', ''),
('USER001', 'Pengemudi', 'Mengubah Pengemudi', '', '', ''),
('USER001', 'Pengemudi', 'Mengubah Pengemudi', '', '', ''),
('USER006', 'Pemesanan', 'Menambah Pemesanan', '', '', ''),
('USER006', 'Detail Pemesanan', 'Menambah Detail Pemesanan', '', '', ''),
('USER006', 'Pemesanan', 'Menambah Pemesanan', '', '', ''),
('USER006', 'Detail Pemesanan', 'Menambah Detail Pemesanan', '', '', ''),
('USER006', 'Pemesanan', 'Mengubah Pemesanan', '', '', ''),
('USER003', 'Stok Barang', 'Menambah Stok Barang', 'ITEM001', '', ''),
('USER003', 'Barang Masuk', 'Menambah Barang Masuk', '', '', ''),
('USER003', 'Barang Keluar', 'Menambah Barang Keluar', '', '', ''),
('USER003', 'Barang Keluar', 'Menambah Detail Barang Keluar', '', '', ''),
('USER003', 'Stok Barang', 'Mengubah Stok Barang', '', '', ''),
('USER003', 'Barang Keluar', 'Mengubah Barang Keluar', '', '', ''),
('USER003', 'Pengemudi', 'Mengubah Pengemudi', '', '', ''),
('USER003', 'Kendaraan', 'Mengubah Kendaraan', '', '', ''),
('USER003', 'Pemesanan', 'Mengubah Pemesanan', '', '', ''),
('USER001', 'Pengguna', 'Mengubah Pengguna', '', '', ''),
('USER001', 'User', 'Mengubah User', '', '', ''),
('USER001', 'Toko', 'Mengubah Toko', '', '', ''),
('USER001', 'Toko', 'Mengubah Toko', '', '', ''),
('USER006', 'Pemesanan', 'Menambah Pemesanan', '', '', ''),
('USER006', 'Detail Pemesanan', 'Menambah Detail Pemesanan', '', '', ''),
('USER006', 'Detail Pemesanan', 'Menambah Detail Pemesanan', '', '', ''),
('USER006', 'Pemesanan', 'Mengubah Pemesanan', '', '', ''),
('USER003', 'Stok Barang', 'Menambah Stok Barang', 'ITEM002', '', ''),
('USER003', 'Barang Masuk', 'Menambah Barang Masuk', '', '', ''),
('USER003', 'Stok Barang', 'Menambah Stok Barang', 'ITEM003', '', ''),
('USER003', 'Barang Masuk', 'Menambah Barang Masuk', '', '', ''),
('USER003', 'Barang Keluar', 'Menambah Barang Keluar', '', '', ''),
('USER003', 'Barang Keluar', 'Menambah Detail Barang Keluar', '', '', ''),
('USER003', 'Stok Barang', 'Mengubah Stok Barang', '', '', ''),
('USER003', 'Barang Keluar', 'Menambah Detail Barang Keluar', '', '', ''),
('USER003', 'Stok Barang', 'Mengubah Stok Barang', '', '', ''),
('USER003', 'Barang Keluar', 'Mengubah Barang Keluar', '', '', ''),
('USER003', 'Pengemudi', 'Mengubah Pengemudi', '', '', ''),
('USER003', 'Kendaraan', 'Mengubah Kendaraan', '', '', ''),
('USER003', 'Pemesanan', 'Mengubah Pemesanan', '', '', ''),
('USER006', 'Pemesanan', 'Menambah Pemesanan', '', '', ''),
('USER006', 'Detail Pemesanan', 'Menambah Detail Pemesanan', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lorong`
--

CREATE TABLE `lorong` (
  `id_lorong` varchar(7) NOT NULL,
  `id_tujuan` varchar(6) NOT NULL,
  `nama_lorong` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lorong`
--

INSERT INTO `lorong` (`id_lorong`, `id_tujuan`, `nama_lorong`) VALUES
('LANE001', 'LCT001', 'Subang'),
('LANE002', 'LCT002', 'Bandung'),
('LANE003', 'LCT003', 'Medan'),
('LANE004', 'LCT004', 'Semarang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `merk_barang`
--

CREATE TABLE `merk_barang` (
  `id_merk_barang` varchar(7) NOT NULL,
  `id_nama_barang` varchar(8) NOT NULL,
  `nama_merk_barang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `merk_barang`
--

INSERT INTO `merk_barang` (`id_merk_barang`, `id_nama_barang`, `nama_merk_barang`) VALUES
('MRKB001', 'ITMN001', 'Chitato'),
('MRKB002', 'ITMN001', 'Chitos'),
('MRKB003', 'ITMN002', 'Sprite'),
('MRKB004', 'ITMN002', 'Fanta'),
('MRKB005', 'ITMN003', 'Jordan'),
('MRKB006', 'ITMN003', 'Sari Roti'),
('MRKB007', 'ITMN004', 'Hemaviton'),
('MRKB008', 'ITMN004', 'Kraktingdeng'),
('MRKB009', 'ITMN005', 'Boss');

-- --------------------------------------------------------

--
-- Struktur dari tabel `merk_kendaraan`
--

CREATE TABLE `merk_kendaraan` (
  `id_merk_kendaraan` varchar(7) NOT NULL,
  `nama_mk` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `merk_kendaraan`
--

INSERT INTO `merk_kendaraan` (`id_merk_kendaraan`, `nama_mk`) VALUES
('MRKT001', 'Mitsubishi'),
('MRKT002', 'Hino'),
('MRKT003', 'Daihatsu'),
('MRKT004', 'Isuzu'),
('MRKT005', 'Mercedes Benz');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nama_barang`
--

CREATE TABLE `nama_barang` (
  `id_nama_barang` varchar(8) NOT NULL,
  `id_ktgr_brg` varchar(7) NOT NULL,
  `nama_barang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nama_barang`
--

INSERT INTO `nama_barang` (`id_nama_barang`, `id_ktgr_brg`, `nama_barang`) VALUES
('ITMN001', 'CTGR001', 'Ringan'),
('ITMN002', 'CTGR002', 'Bersoda'),
('ITMN003', 'CTGR001', 'Roti'),
('ITMN004', 'CTGR002', 'Berenergi'),
('ITMN005', 'RCK003', 'Buku');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nama_kendaraan`
--

CREATE TABLE `nama_kendaraan` (
  `id_nama_kendaraan` varchar(8) NOT NULL,
  `id_merk_kendaraan` varchar(7) NOT NULL,
  `nama_kendaraan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nama_kendaraan`
--

INSERT INTO `nama_kendaraan` (`id_nama_kendaraan`, `id_merk_kendaraan`, `nama_kendaraan`) VALUES
('TNAME001', 'MRKT001', 'L300'),
('TNAME002', 'MRKT001', 'Colt Diesel'),
('TNAME003', 'MRKT001', 'Fuso'),
('TNAME004', 'MRKT002', 'Dutro'),
('TNAME005', 'MRKT002', 'Hino 500'),
('TNAME006', 'MRKT003', 'Grand Max'),
('TNAME007', 'MRKT004', 'Elf'),
('TNAME008', 'MRKT004', 'Giga'),
('TNAME009', 'MRKT005', 'Actross'),
('TNAME010', 'MRKT005', 'Axor');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` varchar(12) NOT NULL,
  `id_toko` varchar(8) NOT NULL,
  `bukti_pembayaran` varchar(50) DEFAULT NULL,
  `status_pemesanan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `id_toko`, `bukti_pembayaran`, `status_pemesanan`) VALUES
('20200110001', 'STORE002', 'sniper_dota_22.jpg', 2),
('20200112002', 'STORE002', 'sniper_dota_22.jpg', 2),
('20200113003', 'STORE002', NULL, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan_toko`
--

CREATE TABLE `pemesanan_toko` (
  `id_pemesanan` varchar(12) NOT NULL,
  `id_ktgr_brg` varchar(7) NOT NULL,
  `id_nama_barang` varchar(8) NOT NULL,
  `id_merk_barang` varchar(7) NOT NULL,
  `jmlh_pemesanan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemesanan_toko`
--

INSERT INTO `pemesanan_toko` (`id_pemesanan`, `id_ktgr_brg`, `id_nama_barang`, `id_merk_barang`, `jmlh_pemesanan`) VALUES
('20200110001', 'RCK003', 'ITMN005', 'MRKB009', 200),
('20200112002', 'CTGR002', 'ITMN002', 'MRKB004', 200),
('20200112002', 'RCK003', 'ITMN005', 'MRKB009', 250),
('20200113003', 'CTGR001', 'ITMN001', 'MRKB001', 200);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id_barang_keluar` varchar(7) NOT NULL,
  `id_barang` varchar(7) NOT NULL,
  `id_ktgr_brg` varchar(7) NOT NULL,
  `id_nama_barang` varchar(8) NOT NULL,
  `id_merk_barang` varchar(7) NOT NULL,
  `jmlh_brg_klr` int(11) NOT NULL,
  `dimensi_barang` int(11) NOT NULL,
  `total_dimensi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengeluaran`
--

INSERT INTO `pengeluaran` (`id_barang_keluar`, `id_barang`, `id_ktgr_brg`, `id_nama_barang`, `id_merk_barang`, `jmlh_brg_klr`, `dimensi_barang`, `total_dimensi`) VALUES
('ITOU001', 'ITEM001', 'RCK003', 'ITMN005', 'MRKB009', 200, 24000, 4800000),
('ITOU002', 'ITEM002', 'RCK003', 'ITMN005', 'MRKB009', 250, 125000, 31250000),
('ITOU002', 'ITEM003', 'CTGR002', 'ITMN002', 'MRKB003', 50, 8000, 400000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengemudi`
--

CREATE TABLE `pengemudi` (
  `id_pengemudi` varchar(9) NOT NULL,
  `email_pengemudi` varchar(30) NOT NULL,
  `id_pengguna` varchar(7) NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `no_hp_penggemudi` varchar(15) NOT NULL,
  `foto_penggemudi` varchar(50) DEFAULT NULL,
  `status_pengemudi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengemudi`
--

INSERT INTO `pengemudi` (`id_pengemudi`, `email_pengemudi`, `id_pengguna`, `tanggal_lahir`, `no_hp_penggemudi`, `foto_penggemudi`, `status_pengemudi`) VALUES
('DRV001', 'nicosembiring52@gmail.com', 'USER002', '1999-02-19', '+6281361327635', '1st_hokage.jpg', 2),
('DRV002', 'jajang@yahoo.com', 'USER004', '1998-05-18', '+6287714778776', '4th_hokage.jpg', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` varchar(7) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `umur` int(11) NOT NULL,
  `alamat_pengguna` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama`, `umur`, `alamat_pengguna`) VALUES
('USER001', 'Harun Ar - Rasyid', 20, 'Subang'),
('USER002', 'Nico Sembiring', 20, 'Medan'),
('USER003', 'Cecep', 20, 'Bandung'),
('USER004', 'Jajang', 30, 'Ujung Kulon'),
('USER005', 'Aegistar', 20, 'Subang'),
('USER006', 'Luna', 20, 'Bandung');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rak_barang`
--

CREATE TABLE `rak_barang` (
  `id_rak` varchar(6) NOT NULL,
  `id_lorong` varchar(7) NOT NULL,
  `id_ktgr_brg` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rak_barang`
--

INSERT INTO `rak_barang` (`id_rak`, `id_lorong`, `id_ktgr_brg`) VALUES
('RCK001', 'LANE001', 'CTGR001'),
('RCK004', 'LANE002', 'CTGR001'),
('RCK007', 'LANE003', 'CTGR001'),
('RCK010', 'LANE004', 'CTGR001'),
('RCK002', 'LANE001', 'CTGR002'),
('RCK005', 'LANE002', 'CTGR002'),
('RCK008', 'LANE003', 'CTGR002'),
('RCK011', 'LANE004', 'CTGR002'),
('RCK003', 'LANE001', 'RCK003'),
('RCK006', 'LANE002', 'RCK003'),
('RCK009', 'LANE003', 'RCK003'),
('RCK012', 'LANE004', 'RCK003');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok_barang`
--

CREATE TABLE `stok_barang` (
  `id_barang` varchar(7) NOT NULL,
  `id_ktgr_brg` varchar(7) NOT NULL,
  `id_merk_barang` varchar(7) NOT NULL,
  `id_nama_barang` varchar(8) NOT NULL,
  `id_rak` varchar(6) NOT NULL,
  `stok_barang` int(11) DEFAULT NULL,
  `jenis_barang` int(11) DEFAULT NULL,
  `panjang_barang` int(11) NOT NULL,
  `lebar_barang` int(11) NOT NULL,
  `tinggi_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `stok_barang`
--

INSERT INTO `stok_barang` (`id_barang`, `id_ktgr_brg`, `id_merk_barang`, `id_nama_barang`, `id_rak`, `stok_barang`, `jenis_barang`, `panjang_barang`, `lebar_barang`, `tinggi_barang`) VALUES
('ITEM001', 'RCK003', 'MRKB009', 'ITMN005', 'RCK003', 0, 2, 20, 30, 40),
('ITEM002', 'RCK003', 'MRKB009', 'ITMN005', 'RCK009', 50, 1, 50, 50, 50),
('ITEM003', 'CTGR002', 'MRKB003', 'ITMN002', 'RCK008', 450, 0, 20, 20, 20);

-- --------------------------------------------------------

--
-- Struktur dari tabel `token`
--

CREATE TABLE `token` (
  `id_token` int(11) NOT NULL,
  `id_pengemudi` varchar(9) NOT NULL,
  `token` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `token`
--

INSERT INTO `token` (`id_token`, `id_pengemudi`, `token`) VALUES
(2, 'DRV001', 'bSdfGtwi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `toko`
--

CREATE TABLE `toko` (
  `id_toko` varchar(8) NOT NULL,
  `id_pengguna` varchar(7) NOT NULL,
  `nama_toko` varchar(30) NOT NULL,
  `alamat_toko` varchar(100) NOT NULL,
  `id_tujuan` varchar(6) NOT NULL,
  `notel_toko` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `toko`
--

INSERT INTO `toko` (`id_toko`, `id_pengguna`, `nama_toko`, `alamat_toko`, `id_tujuan`, `notel_toko`) VALUES
('STORE001', 'USER005', 'Bintang', 'Jl. Bintang, Kecamatan Subang, Kabupaten Subang, Provinsi Jawa Barat', 'LCT001', '+6289655615033'),
('STORE002', 'USER006', 'Miku', 'Jl. Bukit Raya Atas, Kec. Cidadap, Kota Bandung, Prov. Jawa Barat', 'LCT002', '+6285703824891');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tujuan`
--

CREATE TABLE `tujuan` (
  `id_tujuan` varchar(6) NOT NULL,
  `nama_lokasi_tujuan` varchar(50) NOT NULL,
  `latitude` varchar(30) NOT NULL,
  `longitude` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tujuan`
--

INSERT INTO `tujuan` (`id_tujuan`, `nama_lokasi_tujuan`, `latitude`, `longitude`) VALUES
('LCT001', 'Subang', '-6.571280', '107.759689'),
('LCT002', 'Bandung', '-6.917464', '107.619125'),
('LCT003', 'Medan', '-6.821820', '107.630219'),
('LCT004', 'Semarang', '-7.005145', '110.438126');

-- --------------------------------------------------------

--
-- Struktur untuk view `data_pengeluaran`
--
DROP TABLE IF EXISTS `data_pengeluaran`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `data_pengeluaran`  AS  select `barang_keluar`.`id_barang_keluar` AS `id_barang_keluar`,`pengeluaran`.`total_dimensi` AS `total_dimensi`,sum(`pengeluaran`.`total_dimensi`) AS `seluruh_dimensi` from (`barang_keluar` join `pengeluaran` on(`pengeluaran`.`id_barang_keluar` = `barang_keluar`.`id_barang_keluar`)) group by `pengeluaran`.`id_barang_keluar` ;

-- --------------------------------------------------------

--
-- Struktur untuk view `detail_barang_android`
--
DROP TABLE IF EXISTS `detail_barang_android`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detail_barang_android`  AS  select `barang_keluar`.`id_pengemudi` AS `id_pengemudi`,`barang_keluar`.`id_kendaraan` AS `id_kendaraan`,`pengeluaran`.`id_barang_keluar` AS `id_barang_keluar`,`pengeluaran`.`id_barang` AS `id_barang`,`pengeluaran`.`id_ktgr_brg` AS `id_ktgr_brg`,`pengeluaran`.`id_nama_barang` AS `id_nama_barang`,`pengeluaran`.`id_merk_barang` AS `id_merk_barang`,`pengeluaran`.`jmlh_brg_klr` AS `jmlh_brg_klr`,`pengeluaran`.`dimensi_barang` AS `dimensi_barang`,`pengeluaran`.`total_dimensi` AS `total_dimensi`,`kategori_barang`.`nama_ktgr_brg` AS `nama_ktgr_brg`,`nama_barang`.`nama_barang` AS `nama_barang`,`merk_barang`.`nama_merk_barang` AS `nama_merk_barang` from (((((`pengeluaran` join `barang_keluar` on(`barang_keluar`.`id_barang_keluar` = `pengeluaran`.`id_barang_keluar`)) join `stok_barang` on(`stok_barang`.`id_barang` = `pengeluaran`.`id_barang`)) join `kategori_barang` on(`kategori_barang`.`id_ktgr_brg` = `pengeluaran`.`id_ktgr_brg`)) join `nama_barang` on(`nama_barang`.`id_nama_barang` = `pengeluaran`.`id_nama_barang`)) join `merk_barang` on(`merk_barang`.`id_merk_barang` = `pengeluaran`.`id_merk_barang`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `detail_barang_keluar`
--
DROP TABLE IF EXISTS `detail_barang_keluar`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detail_barang_keluar`  AS  select `barang_keluar`.`id_barang_keluar` AS `id_barang_keluar`,`detail_pengemudi`.`id_pengemudi` AS `id_pengemudi`,`detail_kendaraan`.`id_kendaraan` AS `id_kendaraan`,`tujuan`.`id_tujuan` AS `id_tujuan`,`detail_pengemudi`.`nama` AS `nama`,`detail_kendaraan`.`nama_kendaraan` AS `nama_kendaraan`,`tujuan`.`nama_lokasi_tujuan` AS `nama_lokasi_tujuan`,`barang_keluar`.`status_barang` AS `status_barang`,`barang_keluar`.`waktu_keluar` AS `waktu_keluar`,`barang_keluar`.`waktu_selesai` AS `waktu_selesai`,`barang_keluar`.`waktu_ambil` AS `waktu_ambil`,timediff(`barang_keluar`.`waktu_selesai`,`barang_keluar`.`waktu_keluar`) AS `waktu_respon`,timediff(`barang_keluar`.`waktu_selesai`,`barang_keluar`.`waktu_ambil`) AS `waktu_perjalanan`,sum(`pengeluaran`.`total_dimensi`) AS `total_keseluruhan` from ((((`barang_keluar` join `detail_pengemudi` on(`detail_pengemudi`.`id_pengemudi` = `barang_keluar`.`id_pengemudi`)) join `detail_kendaraan` on(`detail_kendaraan`.`id_kendaraan` = `barang_keluar`.`id_kendaraan`)) join `tujuan` on(`tujuan`.`id_tujuan` = `barang_keluar`.`id_tujuan`)) join `pengeluaran` on(`pengeluaran`.`id_barang_keluar` = `barang_keluar`.`id_barang_keluar`)) group by `barang_keluar`.`id_barang_keluar` ;

-- --------------------------------------------------------

--
-- Struktur untuk view `detail_barang_masuk`
--
DROP TABLE IF EXISTS `detail_barang_masuk`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detail_barang_masuk`  AS  select `kategori_barang`.`nama_ktgr_brg` AS `nama_ktgr_brg`,`nama_barang`.`nama_barang` AS `nama_barang`,`merk_barang`.`nama_merk_barang` AS `nama_merk_barang`,`asal_barang`.`nama_lokasi_asal` AS `nama_lokasi_asal`,`barang_masuk`.`waktu_masuk` AS `waktu_masuk`,`barang_masuk`.`jumlah_brg_masuk` AS `jumlah_brg_masuk`,`stok_barang`.`id_barang` AS `id_barang`,`lorong`.`id_lorong` AS `id_lorong`,`lorong`.`nama_lorong` AS `nama_lorong`,`stok_barang`.`stok_barang` AS `stok_barang` from ((((((`stok_barang` join `kategori_barang` on(`kategori_barang`.`id_ktgr_brg` = `stok_barang`.`id_ktgr_brg`)) join `nama_barang` on(`nama_barang`.`id_nama_barang` = `stok_barang`.`id_nama_barang`)) join `merk_barang` on(`merk_barang`.`id_merk_barang` = `stok_barang`.`id_merk_barang`)) join `barang_masuk` on(`barang_masuk`.`id_barang` = `stok_barang`.`id_barang`)) join `asal_barang` on(`asal_barang`.`id_asal` = `barang_masuk`.`id_asal`)) join `lorong` on(`lorong`.`id_lorong` = `barang_masuk`.`id_lorong`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `detail_data_pemesanan`
--
DROP TABLE IF EXISTS `detail_data_pemesanan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detail_data_pemesanan`  AS  select `pemesanan`.`id_pemesanan` AS `id_pemesanan`,`pemesanan`.`id_toko` AS `id_toko`,`pemesanan`.`bukti_pembayaran` AS `bukti_pembayaran`,`pemesanan`.`status_pemesanan` AS `status_pemesanan`,`toko`.`nama_toko` AS `nama_toko`,`toko`.`alamat_toko` AS `alamat_toko` from (`pemesanan` join `toko` on(`toko`.`id_toko` = `pemesanan`.`id_toko`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `detail_kendaraan`
--
DROP TABLE IF EXISTS `detail_kendaraan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detail_kendaraan`  AS  select `kendaraan`.`id_kendaraan` AS `id_kendaraan`,`kendaraan`.`id_merk_kendaraan` AS `id_merk_kendaraan`,`kendaraan`.`id_nama_kendaraan` AS `id_nama_kendaraan`,`kendaraan`.`jenis_kendaraan` AS `jenis_kendaraan`,`kendaraan`.`kapasitas` AS `kapasitas`,`kendaraan`.`no_kendaraan` AS `no_kendaraan`,`kendaraan`.`status_kendaraan` AS `status_kendaraan`,`merk_kendaraan`.`nama_mk` AS `nama_mk`,`nama_kendaraan`.`nama_kendaraan` AS `nama_kendaraan` from ((`kendaraan` join `merk_kendaraan` on(`merk_kendaraan`.`id_merk_kendaraan` = `kendaraan`.`id_merk_kendaraan`)) join `nama_kendaraan` on(`nama_kendaraan`.`id_nama_kendaraan` = `kendaraan`.`id_nama_kendaraan`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `detail_merk_barang`
--
DROP TABLE IF EXISTS `detail_merk_barang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detail_merk_barang`  AS  select `merk_barang`.`id_merk_barang` AS `id_merk_barang`,`merk_barang`.`id_nama_barang` AS `id_nama_barang`,`merk_barang`.`nama_merk_barang` AS `nama_merk_barang`,`nama_barang`.`nama_barang` AS `nama_barang` from (`merk_barang` join `nama_barang` on(`nama_barang`.`id_nama_barang` = `merk_barang`.`id_nama_barang`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `detail_nama_barang`
--
DROP TABLE IF EXISTS `detail_nama_barang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detail_nama_barang`  AS  select `nama_barang`.`id_nama_barang` AS `id_nama_barang`,`nama_barang`.`id_ktgr_brg` AS `id_ktgr_brg`,`nama_barang`.`nama_barang` AS `nama_barang`,`kategori_barang`.`nama_ktgr_brg` AS `nama_ktgr_brg` from (`nama_barang` join `kategori_barang` on(`kategori_barang`.`id_ktgr_brg` = `nama_barang`.`id_ktgr_brg`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `detail_nama_kendaraan`
--
DROP TABLE IF EXISTS `detail_nama_kendaraan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detail_nama_kendaraan`  AS  select `merk_kendaraan`.`nama_mk` AS `nama_mk`,`nama_kendaraan`.`id_nama_kendaraan` AS `id_nama_kendaraan`,`nama_kendaraan`.`id_merk_kendaraan` AS `id_merk_kendaraan`,`nama_kendaraan`.`nama_kendaraan` AS `nama_kendaraan` from (`nama_kendaraan` join `merk_kendaraan` on(`merk_kendaraan`.`id_merk_kendaraan` = `nama_kendaraan`.`id_merk_kendaraan`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `detail_pemesanan`
--
DROP TABLE IF EXISTS `detail_pemesanan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detail_pemesanan`  AS  select `pemesanan_toko`.`id_pemesanan` AS `id_pemesanan`,`pemesanan_toko`.`jmlh_pemesanan` AS `jmlh_pemesanan`,`kategori_barang`.`nama_ktgr_brg` AS `nama_ktgr_brg`,`nama_barang`.`nama_barang` AS `nama_barang`,`merk_barang`.`nama_merk_barang` AS `nama_merk_barang`,`pemesanan`.`status_pemesanan` AS `status_pemesanan` from ((((`pemesanan_toko` join `kategori_barang` on(`kategori_barang`.`id_ktgr_brg` = `pemesanan_toko`.`id_ktgr_brg`)) join `nama_barang` on(`nama_barang`.`id_nama_barang` = `pemesanan_toko`.`id_nama_barang`)) join `merk_barang` on(`merk_barang`.`id_merk_barang` = `pemesanan_toko`.`id_merk_barang`)) join `pemesanan` on(`pemesanan`.`id_pemesanan` = `pemesanan_toko`.`id_pemesanan`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `detail_pengeluaran`
--
DROP TABLE IF EXISTS `detail_pengeluaran`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detail_pengeluaran`  AS  select `kategori_barang`.`nama_ktgr_brg` AS `nama_ktgr_brg`,`nama_barang`.`nama_barang` AS `nama_barang`,`merk_barang`.`nama_merk_barang` AS `nama_merk_barang`,`pengeluaran`.`id_barang_keluar` AS `id_barang_keluar`,`pengeluaran`.`jmlh_brg_klr` AS `jmlh_brg_klr`,`pengeluaran`.`dimensi_barang` AS `dimensi_barang`,`pengeluaran`.`total_dimensi` AS `total_dimensi`,`barang_keluar`.`status_barang` AS `status_barang` from ((((`pengeluaran` join `kategori_barang` on(`kategori_barang`.`id_ktgr_brg` = `pengeluaran`.`id_ktgr_brg`)) join `nama_barang` on(`nama_barang`.`id_nama_barang` = `pengeluaran`.`id_nama_barang`)) join `merk_barang` on(`merk_barang`.`id_merk_barang` = `pengeluaran`.`id_merk_barang`)) join `barang_keluar` on(`barang_keluar`.`id_barang_keluar` = `pengeluaran`.`id_barang_keluar`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `detail_pengemudi`
--
DROP TABLE IF EXISTS `detail_pengemudi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detail_pengemudi`  AS  select `pengguna`.`id_pengguna` AS `id_pengguna`,`pengguna`.`nama` AS `nama`,`pengguna`.`umur` AS `umur`,`pengguna`.`alamat_pengguna` AS `alamat_pengguna`,`pengemudi`.`id_pengemudi` AS `id_pengemudi`,`pengemudi`.`tanggal_lahir` AS `tanggal_lahir`,`pengemudi`.`no_hp_penggemudi` AS `no_hp_penggemudi`,`pengemudi`.`foto_penggemudi` AS `foto_penggemudi`,`pengemudi`.`status_pengemudi` AS `status_pengemudi`,`pengemudi`.`email_pengemudi` AS `email_pengemudi` from (`pengguna` join `pengemudi` on(`pengemudi`.`id_pengguna` = `pengguna`.`id_pengguna`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `detail_pengguna`
--
DROP TABLE IF EXISTS `detail_pengguna`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detail_pengguna`  AS  select `pengguna`.`id_pengguna` AS `id_pengguna`,`pengguna`.`nama` AS `nama`,`pengguna`.`umur` AS `umur`,`pengguna`.`alamat_pengguna` AS `alamat_pengguna`,`akun_pengguna`.`username` AS `username`,`akun_pengguna`.`password` AS `password`,`akun_pengguna`.`hak_akses` AS `hak_akses` from (`pengguna` join `akun_pengguna` on(`pengguna`.`id_pengguna` = `akun_pengguna`.`id_pengguna`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `detail_rak`
--
DROP TABLE IF EXISTS `detail_rak`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detail_rak`  AS  select `rak_barang`.`id_rak` AS `id_rak`,`lorong`.`nama_lorong` AS `nama_lorong`,`kategori_barang`.`nama_ktgr_brg` AS `nama_ktgr_brg`,`rak_barang`.`id_lorong` AS `id_lorong`,`rak_barang`.`id_ktgr_brg` AS `id_ktgr_brg` from ((`rak_barang` join `lorong` on(`lorong`.`id_lorong` = `rak_barang`.`id_lorong`)) join `kategori_barang` on(`kategori_barang`.`id_ktgr_brg` = `rak_barang`.`id_ktgr_brg`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `detail_stok`
--
DROP TABLE IF EXISTS `detail_stok`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detail_stok`  AS  select `stok_barang`.`id_nama_barang` AS `id_nama_barang`,`kategori_barang`.`nama_ktgr_brg` AS `nama_ktgr_brg`,`nama_barang`.`nama_barang` AS `nama_barang`,`merk_barang`.`nama_merk_barang` AS `nama_merk_barang`,sum(`stok_barang`.`stok_barang`) AS `stok`,`stok_barang`.`jenis_barang` AS `jenis_barang`,`stok_barang`.`panjang_barang` AS `panjang_barang`,`stok_barang`.`lebar_barang` AS `lebar_barang`,`stok_barang`.`tinggi_barang` AS `tinggi_barang`,`stok_barang`.`id_barang` AS `id_barang` from (((`stok_barang` join `kategori_barang` on(`kategori_barang`.`id_ktgr_brg` = `stok_barang`.`id_ktgr_brg`)) join `nama_barang` on(`nama_barang`.`id_nama_barang` = `stok_barang`.`id_nama_barang`)) join `merk_barang` on(`merk_barang`.`id_merk_barang` = `stok_barang`.`id_merk_barang`)) group by `stok_barang`.`id_nama_barang` ;

-- --------------------------------------------------------

--
-- Struktur untuk view `detail_stok_khusus`
--
DROP TABLE IF EXISTS `detail_stok_khusus`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detail_stok_khusus`  AS  select `kategori_barang`.`nama_ktgr_brg` AS `nama_ktgr_brg`,`nama_barang`.`nama_barang` AS `nama_barang`,`merk_barang`.`nama_merk_barang` AS `nama_merk_barang`,`stok_barang`.`stok_barang` AS `stok_barang`,`stok_barang`.`panjang_barang` AS `panjang_barang`,`stok_barang`.`lebar_barang` AS `lebar_barang`,`stok_barang`.`tinggi_barang` AS `tinggi_barang`,`stok_barang`.`id_barang` AS `id_barang`,`kategori_barang`.`id_ktgr_brg` AS `id_ktgr_brg`,`nama_barang`.`id_nama_barang` AS `id_nama_barang`,`merk_barang`.`id_merk_barang` AS `id_merk_barang` from (((`stok_barang` join `kategori_barang` on(`kategori_barang`.`id_ktgr_brg` = `stok_barang`.`id_ktgr_brg`)) join `nama_barang` on(`nama_barang`.`id_nama_barang` = `stok_barang`.`id_nama_barang`)) join `merk_barang` on(`merk_barang`.`id_merk_barang` = `stok_barang`.`id_merk_barang`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `detail_toko`
--
DROP TABLE IF EXISTS `detail_toko`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detail_toko`  AS  select `pengguna`.`id_pengguna` AS `id_pengguna`,`pengguna`.`nama` AS `nama`,`pengguna`.`umur` AS `umur`,`pengguna`.`alamat_pengguna` AS `alamat_pengguna`,`toko`.`id_toko` AS `id_toko`,`toko`.`nama_toko` AS `nama_toko`,`toko`.`alamat_toko` AS `alamat_toko`,`toko`.`notel_toko` AS `notel_toko`,`tujuan`.`id_tujuan` AS `id_tujuan`,`tujuan`.`nama_lokasi_tujuan` AS `nama_lokasi_tujuan` from ((`pengguna` join `toko` on(`toko`.`id_pengguna` = `pengguna`.`id_pengguna`)) join `tujuan` on(`tujuan`.`id_tujuan` = `toko`.`id_tujuan`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `detail_tujuan_android`
--
DROP TABLE IF EXISTS `detail_tujuan_android`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detail_tujuan_android`  AS  select `barang_keluar`.`id_barang_keluar` AS `id_barang_keluar`,`barang_keluar`.`id_pengemudi` AS `id_pengemudi`,`barang_keluar`.`id_kendaraan` AS `id_kendaraan`,`barang_keluar`.`id_tujuan` AS `id_tujuan`,`tujuan`.`nama_lokasi_tujuan` AS `nama_lokasi_tujuan`,`tujuan`.`latitude` AS `latitude`,`tujuan`.`longitude` AS `longitude`,`barang_keluar`.`status_barang` AS `status_barang` from (`barang_keluar` join `tujuan` on(`tujuan`.`id_tujuan` = `barang_keluar`.`id_tujuan`)) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun_pengguna`
--
ALTER TABLE `akun_pengguna`
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indeks untuk tabel `asal_barang`
--
ALTER TABLE `asal_barang`
  ADD PRIMARY KEY (`id_asal`);

--
-- Indeks untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id_barang_keluar`),
  ADD KEY `fk_bk_kendaraan` (`id_kendaraan`),
  ADD KEY `fk_bk_tujuan` (`id_tujuan`),
  ADD KEY `fk_bk_pengemudi` (`id_pengemudi`),
  ADD KEY `barang_keluar_index` (`id_lorong`,`id_kendaraan`,`id_tujuan`,`id_pengemudi`) USING BTREE;

--
-- Indeks untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD KEY `fk_bm_asal` (`id_asal`),
  ADD KEY `index_barang_masuk` (`id_barang`,`id_asal`,`id_lorong`) USING BTREE,
  ADD KEY `fk_bm_lorong` (`id_lorong`);

--
-- Indeks untuk tabel `kategori_barang`
--
ALTER TABLE `kategori_barang`
  ADD PRIMARY KEY (`id_ktgr_brg`);

--
-- Indeks untuk tabel `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`id_kendaraan`),
  ADD KEY `fk_ken_nk` (`id_nama_kendaraan`),
  ADD KEY `index_kendaraan` (`id_nama_kendaraan`,`id_merk_kendaraan`) USING BTREE,
  ADD KEY `fk_ken_mk` (`id_merk_kendaraan`);

--
-- Indeks untuk tabel `log_pengguna`
--
ALTER TABLE `log_pengguna`
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indeks untuk tabel `lorong`
--
ALTER TABLE `lorong`
  ADD PRIMARY KEY (`id_lorong`),
  ADD KEY `index_lorong` (`id_tujuan`) USING BTREE;

--
-- Indeks untuk tabel `merk_barang`
--
ALTER TABLE `merk_barang`
  ADD PRIMARY KEY (`id_merk_barang`),
  ADD KEY `index_merk_barang` (`id_nama_barang`) USING BTREE;

--
-- Indeks untuk tabel `merk_kendaraan`
--
ALTER TABLE `merk_kendaraan`
  ADD PRIMARY KEY (`id_merk_kendaraan`);

--
-- Indeks untuk tabel `nama_barang`
--
ALTER TABLE `nama_barang`
  ADD PRIMARY KEY (`id_nama_barang`),
  ADD KEY `index_nama_barang` (`id_ktgr_brg`) USING BTREE;

--
-- Indeks untuk tabel `nama_kendaraan`
--
ALTER TABLE `nama_kendaraan`
  ADD PRIMARY KEY (`id_nama_kendaraan`),
  ADD KEY `id_merk_kendaraan` (`id_merk_kendaraan`);

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `id_toko` (`id_toko`);

--
-- Indeks untuk tabel `pemesanan_toko`
--
ALTER TABLE `pemesanan_toko`
  ADD KEY `fk_pt_kbrg` (`id_ktgr_brg`),
  ADD KEY `fk_pt_nbrg` (`id_nama_barang`),
  ADD KEY `fk_pt_mbrg` (`id_merk_barang`),
  ADD KEY `pemesanan_toko` (`id_pemesanan`,`id_ktgr_brg`,`id_nama_barang`,`id_merk_barang`) USING BTREE;

--
-- Indeks untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD KEY `fk_pengiriman_brg` (`id_barang`),
  ADD KEY `index_pengiriman` (`id_barang_keluar`,`id_barang`,`id_ktgr_brg`,`id_nama_barang`,`id_merk_barang`) USING BTREE,
  ADD KEY `fk_pengiriman_ktgr` (`id_ktgr_brg`),
  ADD KEY `fk_pengiriman_nb` (`id_nama_barang`),
  ADD KEY `fk_pengiriman_mb` (`id_merk_barang`);

--
-- Indeks untuk tabel `pengemudi`
--
ALTER TABLE `pengemudi`
  ADD PRIMARY KEY (`id_pengemudi`),
  ADD KEY `id_pengguna` (`id_pengguna`) USING BTREE,
  ADD KEY `fk_pengemudi_tujuan` (`id_pengguna`) USING BTREE;

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indeks untuk tabel `rak_barang`
--
ALTER TABLE `rak_barang`
  ADD PRIMARY KEY (`id_rak`),
  ADD KEY `fk_rak_ktgrB` (`id_ktgr_brg`),
  ADD KEY `rak_index` (`id_ktgr_brg`,`id_lorong`) USING BTREE,
  ADD KEY `fk_rak_lorong` (`id_lorong`);

--
-- Indeks untuk tabel `stok_barang`
--
ALTER TABLE `stok_barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `fk_stok_rak` (`id_rak`),
  ADD KEY `index_stok_barang` (`id_nama_barang`,`id_rak`,`id_ktgr_brg`,`id_merk_barang`) USING BTREE,
  ADD KEY `fk_stok_merk` (`id_merk_barang`),
  ADD KEY `fk_stok_ktgr` (`id_ktgr_brg`);

--
-- Indeks untuk tabel `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`id_token`),
  ADD KEY `token` (`id_pengemudi`);

--
-- Indeks untuk tabel `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`id_toko`),
  ADD KEY `index_toko` (`id_pengguna`,`id_tujuan`) USING BTREE,
  ADD KEY `fk_toko_tujuan` (`id_tujuan`);

--
-- Indeks untuk tabel `tujuan`
--
ALTER TABLE `tujuan`
  ADD PRIMARY KEY (`id_tujuan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `token`
--
ALTER TABLE `token`
  MODIFY `id_token` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `akun_pengguna`
--
ALTER TABLE `akun_pengguna`
  ADD CONSTRAINT `fk_akun_pengguna` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD CONSTRAINT `fk_bk_kendaraan` FOREIGN KEY (`id_kendaraan`) REFERENCES `kendaraan` (`id_kendaraan`),
  ADD CONSTRAINT `fk_bk_lorong` FOREIGN KEY (`id_lorong`) REFERENCES `lorong` (`id_lorong`),
  ADD CONSTRAINT `fk_bk_pengemudi` FOREIGN KEY (`id_pengemudi`) REFERENCES `pengemudi` (`id_pengemudi`),
  ADD CONSTRAINT `fk_bk_tujuan` FOREIGN KEY (`id_tujuan`) REFERENCES `tujuan` (`id_tujuan`);

--
-- Ketidakleluasaan untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD CONSTRAINT `fk_bm_asal` FOREIGN KEY (`id_asal`) REFERENCES `asal_barang` (`id_asal`),
  ADD CONSTRAINT `fk_bm_barang` FOREIGN KEY (`id_barang`) REFERENCES `stok_barang` (`id_barang`),
  ADD CONSTRAINT `fk_bm_lorong` FOREIGN KEY (`id_lorong`) REFERENCES `lorong` (`id_lorong`);

--
-- Ketidakleluasaan untuk tabel `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD CONSTRAINT `fk_ken_mk` FOREIGN KEY (`id_merk_kendaraan`) REFERENCES `merk_kendaraan` (`id_merk_kendaraan`),
  ADD CONSTRAINT `fk_ken_nk` FOREIGN KEY (`id_nama_kendaraan`) REFERENCES `nama_kendaraan` (`id_nama_kendaraan`);

--
-- Ketidakleluasaan untuk tabel `log_pengguna`
--
ALTER TABLE `log_pengguna`
  ADD CONSTRAINT `fk_log_pengguna` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`);

--
-- Ketidakleluasaan untuk tabel `lorong`
--
ALTER TABLE `lorong`
  ADD CONSTRAINT `fk_lorong_tujuan` FOREIGN KEY (`id_tujuan`) REFERENCES `tujuan` (`id_tujuan`);

--
-- Ketidakleluasaan untuk tabel `merk_barang`
--
ALTER TABLE `merk_barang`
  ADD CONSTRAINT `fk_mb_nb` FOREIGN KEY (`id_nama_barang`) REFERENCES `nama_barang` (`id_nama_barang`);

--
-- Ketidakleluasaan untuk tabel `nama_barang`
--
ALTER TABLE `nama_barang`
  ADD CONSTRAINT `fk_nb_ktgr` FOREIGN KEY (`id_ktgr_brg`) REFERENCES `kategori_barang` (`id_ktgr_brg`);

--
-- Ketidakleluasaan untuk tabel `nama_kendaraan`
--
ALTER TABLE `nama_kendaraan`
  ADD CONSTRAINT `fk_nk_mk` FOREIGN KEY (`id_merk_kendaraan`) REFERENCES `merk_kendaraan` (`id_merk_kendaraan`);

--
-- Ketidakleluasaan untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `fk_pemesanan_toko` FOREIGN KEY (`id_toko`) REFERENCES `toko` (`id_toko`);

--
-- Ketidakleluasaan untuk tabel `pemesanan_toko`
--
ALTER TABLE `pemesanan_toko`
  ADD CONSTRAINT `fk_pt_kbrg` FOREIGN KEY (`id_ktgr_brg`) REFERENCES `kategori_barang` (`id_ktgr_brg`),
  ADD CONSTRAINT `fk_pt_mbrg` FOREIGN KEY (`id_merk_barang`) REFERENCES `merk_barang` (`id_merk_barang`),
  ADD CONSTRAINT `fk_pt_nbrg` FOREIGN KEY (`id_nama_barang`) REFERENCES `nama_barang` (`id_nama_barang`),
  ADD CONSTRAINT `fk_pt_pemesanan` FOREIGN KEY (`id_pemesanan`) REFERENCES `pemesanan` (`id_pemesanan`);

--
-- Ketidakleluasaan untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD CONSTRAINT `fk_pengiriman_bk` FOREIGN KEY (`id_barang_keluar`) REFERENCES `barang_keluar` (`id_barang_keluar`),
  ADD CONSTRAINT `fk_pengiriman_brg` FOREIGN KEY (`id_barang`) REFERENCES `stok_barang` (`id_barang`),
  ADD CONSTRAINT `fk_pengiriman_ktgr` FOREIGN KEY (`id_ktgr_brg`) REFERENCES `kategori_barang` (`id_ktgr_brg`),
  ADD CONSTRAINT `fk_pengiriman_mb` FOREIGN KEY (`id_merk_barang`) REFERENCES `merk_barang` (`id_merk_barang`),
  ADD CONSTRAINT `fk_pengiriman_nb` FOREIGN KEY (`id_nama_barang`) REFERENCES `nama_barang` (`id_nama_barang`);

--
-- Ketidakleluasaan untuk tabel `pengemudi`
--
ALTER TABLE `pengemudi`
  ADD CONSTRAINT `fk_pengemudi_pengguna` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`);

--
-- Ketidakleluasaan untuk tabel `rak_barang`
--
ALTER TABLE `rak_barang`
  ADD CONSTRAINT `fk_rak_ktgrB` FOREIGN KEY (`id_ktgr_brg`) REFERENCES `kategori_barang` (`id_ktgr_brg`),
  ADD CONSTRAINT `fk_rak_lorong` FOREIGN KEY (`id_lorong`) REFERENCES `lorong` (`id_lorong`);

--
-- Ketidakleluasaan untuk tabel `stok_barang`
--
ALTER TABLE `stok_barang`
  ADD CONSTRAINT `fk_stok_ktgr` FOREIGN KEY (`id_ktgr_brg`) REFERENCES `kategori_barang` (`id_ktgr_brg`),
  ADD CONSTRAINT `fk_stok_merk` FOREIGN KEY (`id_merk_barang`) REFERENCES `merk_barang` (`id_merk_barang`),
  ADD CONSTRAINT `fk_stok_nb` FOREIGN KEY (`id_nama_barang`) REFERENCES `nama_barang` (`id_nama_barang`),
  ADD CONSTRAINT `fk_stok_rak` FOREIGN KEY (`id_rak`) REFERENCES `rak_barang` (`id_rak`);

--
-- Ketidakleluasaan untuk tabel `toko`
--
ALTER TABLE `toko`
  ADD CONSTRAINT `fk_toko_pengguna` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`),
  ADD CONSTRAINT `fk_toko_tujuan` FOREIGN KEY (`id_tujuan`) REFERENCES `tujuan` (`id_tujuan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
