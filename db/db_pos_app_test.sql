-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Jun 2020 pada 11.40
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
-- Database: `db_pos_app_test`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `barcode_barang` varchar(300) DEFAULT NULL,
  `nama_barang` varchar(100) DEFAULT NULL,
  `harga_barang` int(11) DEFAULT NULL,
  `kemasan_barang` varchar(50) DEFAULT NULL,
  `detail_barang` varchar(1000) NOT NULL,
  `gambar_barang` varchar(1000) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `stock_barang` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `barcode_barang`, `nama_barang`, `harga_barang`, `kemasan_barang`, `detail_barang`, `gambar_barang`, `kategori_id`, `created_at`, `updated_at`, `stock_barang`) VALUES
(27, 'A001', 'SEDAAP Mie Goreng [90 g]', 2400, 'PCS', 'SEDAAP Mie Goreng [90 g] merupakan salah satu varian dengan taburan bawang goreng lebih banyak, tekstur mie yang lebih kenyal dan tidak cepat lunak akan menghasilkan kenikmatan lebih di mulut Anda. Diperkaya 7 vitamin, juga diproduksi dan diproses secara higienis di bawah pengawasan ketat dari para ahli sehingga menghasilkan sebuah rasa premium dalam sajian yang praktis.', 'barang-200524-2e65aa3330d05bb1e1c416f2b11ad4b7.jpg', 26, '2020-05-21 07:27:16', '2020-06-01 08:46:37', 222),
(28, 'A002', 'Sedap Baso Spesial Mie Instan 77 g', 2500, 'PCS', 'Sedap Baso Spesial Mie Instan 77 g [8998866200929] merupakan mie kuah instant dengan rasa baso sapi spesial yang dibuat dari bahan-bahan berkualitas tinggi. Cocok untuk dinikmati saat santai bersama teman, kerabat, dan keluarga.', 'barang-200524-8b0a960244ca398508fa431c744a81ff.jpg', 26, '2020-05-21 07:29:11', '2020-05-24 06:02:08', 208),
(29, 'A003', 'Indomie Jumbo Goreng Mie Instant', 3500, 'PCS', 'Indomie Jumbo Goreng Mie Instant merupakan mie instan yang memiliki rasa yang gurih dan lezat. Terbuat dari bahan mie tepung terigu, minyak sayur, tepung tapioka, garam, pemantap, pengatur keasaman, mineral (zat besi), pewarna (tartrazine Cl19140), dan antioksidan (TBHQ).', 'barang-200524-84e836c6cea6946a2962c2cc4ca080dd.jpg', 26, '2020-05-21 07:31:47', '2020-06-01 20:28:21', 207),
(30, 'B001', 'AQUA Air Mineral [48 cup/ 220 mL/ Karton]', 33000, 'Kardus', 'AQUA merupakan air mineral yang dibuat dari mata air pegunungan alami dan diproses secara higienis. Dengan kandungan manfaat yang dapat menyehatkan tubuh, menyegarkan dahaga, serta menghidrasi tubuh.', 'barang-200524-dd2796eb257415ab0e639584c0198661.jpg', 27, '2020-05-21 07:33:19', '2020-06-01 08:46:37', 10),
(31, 'B002', 'BIG Cola Minuman Bersoda [3.1 L/ Kemasan PET]', 20000, 'Satuan', 'BIG Cola Minuman Bersoda [3.1 L/ Kemasan PET] adalah minuman bersoda dengan kemasan yang super besar dan rasa cola yang segar akan memberikan inspirasi untuk pewujudan mimpi-mimpi besar Anda setiap hari. Semangat berbedanya menjadikan Big Cola pilihan yang disukai di berbagai belahan dunia. Bermimpi besarlah bersama Big Cola Pet 3.1 L dan jadikan hari-harimu menjadi lebih bersemangat', 'barang-200524-819b898efbcc3c142fe86fe966c72e9b.jpg', 27, '2020-05-21 07:34:14', '2020-06-01 13:27:14', 16),
(32, 'C001', 'Shinzui Kirei Bar Soap [85 g]', 3800, 'PCS', 'Shinzui Kirei Bar Soap [85 g] merupakan sabun mandi yang dapat membantu melembabkan dan mencerahkan kulit yang kusam dengan Herba Matsu-Oil yang bisa membantu mengubah pigmen melamin penyebab warna kulit gelap, menjadi leuko-melamin yang lebih cerah. Sakura Flower Extract yang bisa membantu proses regenerasi sel kulit sehingga kulit tidak kusam dan menjadikan kulit tampak bening dan kenyal.', 'barang-200524-867fd6ffd3981478e412ec750a8f2c28.jpg', 29, '2020-05-21 07:35:43', '2020-06-01 20:28:21', 51),
(33, 'C002', 'Systema Smart Clean Toothbrush [3 pcs]', 8900, 'PCS', 'Systema Smart Clean Toothbrush [3 pcs] merupakan dari sikat gigi dengan teknologi Micro Clean, bulu sikat yang super halus (0.02 mm) yang bisa menjangkau sampai ke sela gigi dan gusi tersempit. Dengan bulu sikat yang banyak dan bentuk kepala sikat yang lebih besar. Sangat efektif untuk mencegah akumulasi bakteri sehingga terhindar dari penyakit gusi.', 'barang-200524-9c0cb71244c5473939a33b4496df2e7a.jpg', 29, '2020-05-21 07:37:00', '2020-06-01 20:24:22', 19),
(34, 'D001', 'Philips Lampu LED Bulb 3 W (25W) Cool Day Light/Putih', 24000, 'PCS', 'Bohlam lampu Philips LED telah dibekali teknologi pencahayaan yang mutakhir. Dengan begitu lampu LED Philips pas untuk menerangi setiap sudut ruangan rumah / kantor. Tidak hanya menghasilkan cahaya lampu yang lebih terang, ternyata konsumsi daya yang dibutuhkan juga akan lebih hemat sehingga dengan begitu asupan listrik yang dibutuhkan akan lebih minin. Keunggulan lain dari penggunaan bohlam lampu LED yaitu mengurangi resiko terjadinya fluktuasi tegangan listrik.', 'barang-200524-62e5070286f65c9a17bdb5b92e35a2a2.jpg', 28, '2020-05-21 07:38:22', '2020-06-01 20:28:21', 12),
(35, 'Z001', 'Testter1', 12000, 'Karung', 'Testter', 'barang-200524-6085dc5e9b99cda684e58c33b1f5a8bf.jpg', 26, '2020-05-21 07:39:01', '2020-05-24 06:05:02', 700),
(38, 'M003', 'TestStock', 12000, 'PCS', 'ggkg', 'barang-200601-ef03b2336501b882b3bc74f6e2452cd4.jpg', 27, '2020-05-29 04:34:52', '2020-06-01 17:00:38', 20);

-- --------------------------------------------------------

--
-- Struktur dari tabel `item_transaksi`
--

CREATE TABLE `item_transaksi` (
  `id_item_transaksi` int(11) NOT NULL,
  `harga_item_transaksi` int(11) DEFAULT NULL,
  `qty_item_transaksi` int(11) DEFAULT NULL,
  `total_item_transaksi` int(11) DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `id_transaksi` int(11) DEFAULT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `item_transaksi`
--

INSERT INTO `item_transaksi` (`id_item_transaksi`, `harga_item_transaksi`, `qty_item_transaksi`, `total_item_transaksi`, `id_barang`, `id_transaksi`, `created_at`) VALUES
(141, 2400, 2, 4800, 27, 104, '2020-05-21'),
(142, 3500, 1, 3500, 29, 104, '2020-05-21'),
(143, 20000, 1, 20000, 31, 104, '2020-05-21'),
(144, 3800, 1, 3800, 32, 104, '2020-05-21'),
(145, 3500, 6, 21000, 29, 105, '2020-05-21'),
(146, 20000, 1, 20000, 31, 105, '2020-05-21'),
(147, 8900, 1, 8900, 33, 105, '2020-05-21'),
(148, 2500, 1, 2500, 28, 106, '2020-05-21'),
(149, 8900, 4, 35600, 33, 106, '2020-05-21'),
(150, 24000, 1, 24000, 34, 107, '2020-05-21'),
(151, 20000, 1, 20000, 31, 107, '2020-05-21'),
(152, 24000, 1, 24000, 34, 108, '2020-05-21'),
(153, 8900, 1, 8900, 33, 108, '2020-05-21'),
(154, 20000, 1, 20000, 31, 108, '2020-05-21'),
(155, 2500, 1, 2500, 28, 108, '2020-05-21'),
(156, 2400, 1, 2400, 27, 108, '2020-05-21'),
(157, 2400, 2, 4800, 27, 109, '2020-05-21'),
(158, 33000, 1, 33000, 30, 109, '2020-05-21'),
(159, 3800, 10, 38000, 32, 109, '2020-05-21'),
(160, 2400, 1, 2400, 27, 110, '2020-05-21'),
(161, 3800, 1, 3800, 32, 111, '2020-05-23'),
(163, 3800, 1, 3800, 32, 113, '2020-05-24'),
(164, 33000, 1, 33000, 30, 114, '2020-05-29'),
(171, 33000, 1, 33000, 30, 119, '2020-06-01'),
(172, 20000, 1, 20000, 31, 119, '2020-06-01'),
(173, 2400, 3, 7200, 27, 119, '2020-06-01'),
(174, 3800, 1, 3800, 32, 120, '2020-06-01'),
(175, 20000, 1, 20000, 31, 121, '2020-06-01');

--
-- Trigger `item_transaksi`
--
DELIMITER $$
CREATE TRIGGER `min_stock` AFTER INSERT ON `item_transaksi` FOR EACH ROW BEGIN
	UPDATE barang SET stock_barang = stock_barang - NEW.qty_item_transaksi
    WHERE id_barang = NEW.id_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `item_transaksi_tunda`
--

CREATE TABLE `item_transaksi_tunda` (
  `id_item_transaksi_tunda` int(11) NOT NULL,
  `harga_tunda` int(30) NOT NULL,
  `qty_tunda` int(30) NOT NULL,
  `total_tunda` int(30) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_transaksi_tunda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `item_transaksi_tunda`
--

INSERT INTO `item_transaksi_tunda` (`id_item_transaksi_tunda`, `harga_tunda`, `qty_tunda`, `total_tunda`, `id_barang`, `id_transaksi_tunda`) VALUES
(71, 2500, 5, 12500, 28, 77),
(72, 24000, 2, 48000, 34, 77);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(26, 'Makanan', '2020-05-21 07:25:49', '2020-05-21 07:25:49'),
(27, 'Minuman', '2020-05-21 07:25:55', '2020-05-21 07:25:55'),
(28, 'Elektronik', '2020-05-21 07:26:02', '2020-05-21 07:26:02'),
(29, 'Peralatan Mandi', '2020-05-21 07:26:07', '2020-05-21 07:26:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nama_pegawai` varchar(50) DEFAULT NULL,
  `alamat_pegawai` text DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `no_telp` int(12) DEFAULT NULL,
  `jabatan` enum('1','2','3','4') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama_pegawai`, `alamat_pegawai`, `jenis_kelamin`, `no_telp`, `jabatan`, `created_at`, `updated_at`) VALUES
(18, 'Arnan', 'Ngawi, Jawa Timur', 'L', 2147483647, '1', '2020-05-10 09:24:20', '2020-05-10 09:24:20'),
(20, 'Sugabriel', 'Jepara, Kalimantan Tengah', 'P', 987678654, '3', '2020-05-10 09:26:38', '2020-05-10 09:26:38'),
(22, 'Test1', 'sdsdsccccccsas', 'L', 2147483647, '1', '2020-05-16 09:45:21', '2020-05-16 09:45:21'),
(24, 'Test User', 'Klaten', 'L', 2147483647, '1', '2020-05-21 10:45:38', '2020-05-21 10:45:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stocks`
--

CREATE TABLE `stocks` (
  `id_stock` int(11) NOT NULL,
  `type` enum('In','Out') DEFAULT NULL,
  `detail` varchar(200) DEFAULT NULL,
  `jumlah` int(15) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `barang_id` int(11) NOT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `stocks`
--

INSERT INTO `stocks` (`id_stock`, `type`, `detail`, `jumlah`, `tanggal`, `barang_id`, `supplier_id`, `user_id`, `created_at`, `updated_at`) VALUES
(81, 'In', 'Stock Awal Bulan', 230, '2020-05-21', 27, 35, 15, '2020-05-21', '2020-05-21 07:43:27'),
(82, 'In', 'Stock Awal Bulan', 210, '2020-05-21', 28, 35, 15, '2020-05-21', '2020-05-21 07:43:56'),
(83, 'In', 'Stock Awal Bulan', 215, '2020-05-21', 29, 35, 15, '2020-05-21', '2020-05-21 07:44:34'),
(84, 'In', 'Stock Bulanan', 13, '2020-05-21', 30, 36, 15, '2020-05-21', '2020-05-21 07:44:57'),
(85, 'In', 'Stock Bulanan', 23, '2020-05-21', 31, 36, 15, '2020-05-21', '2020-05-21 07:45:15'),
(86, 'In', 'Stock Bulanan', 67, '2020-05-21', 32, 38, 15, '2020-05-21', '2020-05-21 07:45:33'),
(87, 'In', 'Stock Bulanan', 27, '2020-05-21', 33, 38, 15, '2020-05-21', '2020-05-21 07:45:54'),
(88, 'In', 'Stock Tambahan', 16, '2020-05-21', 34, 37, 15, '2020-05-21', '2020-05-21 07:46:25'),
(89, 'In', 'Testter', 1000, '2020-05-21', 35, NULL, 15, '2020-05-21', '2020-05-21 07:46:58'),
(90, 'Out', 'Testter', 300, '2020-05-21', 35, NULL, 15, '2020-05-21', '2020-05-21 07:48:01'),
(91, 'In', 'Tambahan', 3, '2020-05-21', 27, 35, 15, '2020-05-21', '2020-05-21 10:44:05'),
(92, 'In', 'Bonus', 3, '2020-05-23', 30, 36, 25, '2020-05-23', '2020-05-23 14:56:54'),
(93, 'In', 'UjiCoba', 27, '2020-06-01', 38, 38, 25, '2020-06-01', '2020-06-01 08:50:51'),
(94, 'Out', 'Test Out', 7, '2020-06-01', 38, NULL, 25, '2020-06-01', '2020-06-01 08:52:05'),
(95, 'In', 'Tambahan', 9, '2020-06-01', 33, 38, 25, '2020-06-02', '2020-06-01 17:17:55'),
(96, 'Out', 'Rusak', 1, '2020-06-01', 33, NULL, 25, '2020-06-02', '2020-06-01 17:18:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL,
  `nama_supplier` varchar(100) DEFAULT NULL,
  `no_telp` int(15) DEFAULT NULL,
  `alamat` varchar(250) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `no_telp`, `alamat`, `deskripsi`, `created_at`, `updated_at`) VALUES
(35, 'Sedaap Supplier', 2147483647, 'Kalasan, Sleman, Jogjakarta', 'Supplier khusus Mie Sedaap', '2020-05-21 07:41:31', '2020-05-21 07:41:31'),
(36, 'Drink-Shop', 2147483647, 'Berbah, Kalasan, Sleman, Jogjakarta', 'Supplier Minuman', '2020-05-21 07:41:43', '2020-05-21 07:41:43'),
(37, 'Philips-Lamp Jogja', 2147483647, 'Malioboro, Jogjkarta', 'Supplier Lampu', '2020-05-21 07:42:20', '2020-05-21 07:42:20'),
(38, 'Soap-Supplier', 2147483647, 'Babarsari, Sleman, Jogja', 'Supplier Peralatan Mandi', '2020-05-21 07:42:55', '2020-05-21 07:42:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `temp_keranjang`
--

CREATE TABLE `temp_keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `no_transaksi` varchar(50) DEFAULT NULL,
  `tanggal_transaksi` date DEFAULT NULL,
  `nomor` int(11) DEFAULT NULL,
  `total_utama` int(30) NOT NULL,
  `bayar` int(40) NOT NULL,
  `kembali` int(40) NOT NULL,
  `potongan` int(40) NOT NULL,
  `catatan` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `no_transaksi`, `tanggal_transaksi`, `nomor`, `total_utama`, `bayar`, `kembali`, `potongan`, `catatan`, `user_id`) VALUES
(104, 'TRX/2020/05/0001', '2020-01-21', 1, 32000, 32000, 0, 100, 'Terimakasih Sudah menghabiskan uang Anda :)', 15),
(105, 'TRX/2020/05/0002', '2020-02-21', 2, 49900, 50000, 100, 0, 'Terimakasih Sudah menghabiskan uang Anda :)', 15),
(106, 'TRX/2020/05/0003', '2020-03-21', 3, 38000, 38000, 0, 100, 'Terimakasih Sudah menghabiskan uang Anda :)', 15),
(107, 'TRX/2020/05/0004', '2020-04-21', 4, 44000, 44000, 0, 0, 'Terimakasih Sudah menghabiskan uang Anda :)', 15),
(108, 'TRX/2020/05/0005', '2020-05-21', 5, 57800, 60000, 2200, 0, 'Terimakasih Sudah menghabiskan uang Anda :)', 15),
(109, 'TRX/2020/05/0006', '2020-05-21', 6, 75000, 76000, 1000, 800, 'Terimakasih Sudah menghabiskan uang Anda :)', 26),
(110, 'TRX/2020/05/0007', '2020-05-21', 7, 2400, 2500, 100, 0, 'Terimakasih Sudah menghabiskan uang Anda :)', 26),
(111, 'TRX/2020/05/0008', '2020-05-23', 8, 3800, 4000, 200, 0, 'Terimakasih Sudah menghabiskan uang Anda :)', 25),
(113, 'TRX/2020/05/0010', '2020-05-23', 10, 3800, 4000, 200, 0, 'Terimakasih Sudah menghabiskan uang Anda :)', 25),
(114, 'TRX/2020/05/0011', '2020-05-29', 11, 33000, 35000, 2000, 0, 'Terimakasih Sudah menghabiskan uang Anda :)', 25),
(119, 'TRX/2020/06/0001', '2020-06-01', 1, 60000, 60000, 0, 200, 'Terimakasih Sudah menghabiskan uang Anda :)', 25),
(120, 'TRX/2020/06/0002', '2020-06-01', 2, 3800, 4000, 200, 0, 'Terimakasih Sudah menghabiskan uang Anda :)', 25),
(121, 'TRX/2020/06/0003', '2020-06-01', 3, 20000, 20000, 0, 0, 'Terimakasih Sudah menghabiskan uang Anda :)', 25);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_tunda`
--

CREATE TABLE `transaksi_tunda` (
  `id_transaksi_tunda` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `no_tunda` varchar(200) NOT NULL,
  `tanggal` date NOT NULL,
  `nomor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi_tunda`
--

INSERT INTO `transaksi_tunda` (`id_transaksi_tunda`, `user_id`, `no_tunda`, `tanggal`, `nomor`) VALUES
(77, 25, 'TUNDA/2020/06/0001', '2020-06-01', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(200) DEFAULT NULL,
  `level` enum('1','2','3','4') DEFAULT NULL,
  `token` varchar(200) NOT NULL,
  `is_active` tinyint(4) DEFAULT 0,
  `pegawai_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `first_login` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `email`, `password`, `level`, `token`, `is_active`, `pegawai_id`, `created_at`, `updated_at`, `first_login`) VALUES
(15, 'testter', 'vowena1716@reqaxv.com', '$2y$10$MPCdG0vSb5tgoa0zoqvbQeO3URhCSWYHkEse3BDGVUlK8EhERErTi', '1', '9904cfe8f3889cbdc0b53412154ff969', 1, 6, '2020-05-07 11:23:58', '2020-05-16 11:22:36', 0),
(24, 'admindua', 'alvinkoclok@mailcupp.com', '$2y$10$roEHeZ52dmF/TUkFdAgA5.G4oBVoEzcTAPw3NelevoLbjiF03/PvC', '2', '4ed118abcf21c8dc095785786e1fc329', 1, 22, '2020-05-16 11:37:25', '2020-06-01 09:44:31', 0),
(25, 'Theoarnan', 'arnantheofilus@gmail.com', '$2y$10$FsJMyti9U4DBQK17lU.he./aBUciMAyY0s61F1iqXSATK7iHc79bG', '1', 'c9b884aaada6540506de3adb92a6ec54', 1, 18, '2020-05-21 07:53:01', '2020-06-01 20:39:03', 0),
(26, 'testterbaru', 'testpos@aprimail.com', '$2y$10$kBxrWhUDsVuVjRfcPc0Wxu/1z2QkXkkLFQ/FhwuJtSaAQ7/yiWvky', '1', '020cf1c02a1aba679997ff8fdf89854f', 1, 24, '2020-05-21 10:46:09', '2020-05-21 10:47:50', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD UNIQUE KEY `barcode_barang` (`barcode_barang`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indeks untuk tabel `item_transaksi`
--
ALTER TABLE `item_transaksi`
  ADD PRIMARY KEY (`id_item_transaksi`),
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indeks untuk tabel `item_transaksi_tunda`
--
ALTER TABLE `item_transaksi_tunda`
  ADD PRIMARY KEY (`id_item_transaksi_tunda`),
  ADD KEY `item_transaksi_tunda_ibfk_1` (`id_barang`),
  ADD KEY `item_transaksi_tunda_ibfk_2` (`id_transaksi_tunda`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indeks untuk tabel `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id_stock`),
  ADD KEY `barang_id` (`barang_id`),
  ADD KEY `supplier_id` (`supplier_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indeks untuk tabel `temp_keranjang`
--
ALTER TABLE `temp_keranjang`
  ADD PRIMARY KEY (`id_keranjang`),
  ADD KEY `barang_id` (`barang_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `transaksi_tunda`
--
ALTER TABLE `transaksi_tunda`
  ADD PRIMARY KEY (`id_transaksi_tunda`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `pegawai_id` (`pegawai_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `item_transaksi`
--
ALTER TABLE `item_transaksi`
  MODIFY `id_item_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=182;

--
-- AUTO_INCREMENT untuk tabel `item_transaksi_tunda`
--
ALTER TABLE `item_transaksi_tunda`
  MODIFY `id_item_transaksi_tunda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id_stock` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT untuk tabel `transaksi_tunda`
--
ALTER TABLE `transaksi_tunda`
  MODIFY `id_transaksi_tunda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id_kategori`);

--
-- Ketidakleluasaan untuk tabel `item_transaksi`
--
ALTER TABLE `item_transaksi`
  ADD CONSTRAINT `item_transaksi_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`),
  ADD CONSTRAINT `item_transaksi_ibfk_2` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`);

--
-- Ketidakleluasaan untuk tabel `item_transaksi_tunda`
--
ALTER TABLE `item_transaksi_tunda`
  ADD CONSTRAINT `item_transaksi_tunda_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`),
  ADD CONSTRAINT `item_transaksi_tunda_ibfk_2` FOREIGN KEY (`id_transaksi_tunda`) REFERENCES `transaksi_tunda` (`id_transaksi_tunda`);

--
-- Ketidakleluasaan untuk tabel `stocks`
--
ALTER TABLE `stocks`
  ADD CONSTRAINT `stocks_ibfk_1` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id_barang`),
  ADD CONSTRAINT `stocks_ibfk_2` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`id_supplier`),
  ADD CONSTRAINT `stocks_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
