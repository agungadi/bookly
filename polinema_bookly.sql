-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2020 at 11:17 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `polinema_bookly`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(70) NOT NULL,
  `email` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `email`) VALUES
(1, 'agungadi', '21232f297a57a5a743894a0e4a801fc3', 'agungadi@admin.com'),
(2, 'fmanid', 'e10adc3949ba59abbe56e057f20f883e', 'firman@admin.com'),
(3, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@admin.com');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `nama_buku` varchar(100) NOT NULL,
  `penulis` varchar(50) NOT NULL,
  `tentang_buku` longtext NOT NULL,
  `status_buku` varchar(25) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `nama_buku`, `penulis`, `tentang_buku`, `status_buku`, `foto`) VALUES
(1, 'Sebuah Seni untuk Bersikap Bodo Amat', 'Mark Manson', 'mengoreksi harapan-harapan delusional kita, baik mengenai diri kita sendiri maupun dunia. Ia kini menuangkan buah pikirnya yang keren itu di dalam buku hebat ini.', 'Tersedia', '627-bodomata.jpg'),
(2, '7 in 1 Pemrograman Web Tingkat Lanjut', 'Rohi Abdulloh', 'Laravel dan VueJS merupakan 2 teknologi pemrograman web yang sedang popular saat ini. Keduanya dibahas dalam buku ini beserta integrasinya dalam pembuatan aplikasi. Selain itu, didukung juga dengan materi lain yang tidak kalah penting dengan total 7 materi pemrogaman web.', 'Sedang Dipinjam', '647-7in1pemrograman.jpg'),
(3, 'Logika Pemrograman Java', 'Abdul Kadir', 'Buku ini dirancang sebagai bahan penuntun dalam memprogram komputer menggunakan bahasa pemrograman Java dan dapat digunakan untuk pelajar, mahasiswa, atau siapa saja.', 'Sedang Dipinjam', '339-javalago.jpg'),
(4, 'Mekanisme Reaksi Dan Metabolisme Biomolekul', 'Dr. Yohanis Ngili, M. Si', ' Isi Buku Meliputi Unit Penyusun Biomolekul Dan Ikatan Nonkovalen, Pengantar Metabolisme Bioenergitik, Metabolisme Kerbohidrat ,Metabolisme LIPID, Metabolisme Nitrogen, Contoh Contoh Soal', 'Sedang Dipinjam', '12-metabolisme.jpg'),
(5, 'Kisah Tanah Jawa : Gua Jepang', '@kisahtanahjawa', 'Gua Jepang adalah saksi bisu mereka yang terampas kebebasannya; para romusha yang bekerja siang-malam tanpa istirahat dan makan, tahanan perang yang disiksa, serta jugun ianfu yang dipaksa memuaskan nafsu tentara Jepang. Mereka masih berharap bebas dan bisa kembali pulang hingga meregang nyawa di gua ini.', 'Sedang Dipinjam', '423-9789797809331_kisah-tanah-j.jpg'),
(6, 'Sherlock Holmes Sebuah Skandal Di Bohemia', 'Sir Arthur Conan Doyle', 'Sebuah Skandal di Bohemia berisi cerita tentang seorang bangsawan yang terlibat skandal dengan seorang wanita biasa. Awalnya itu bukan sebuah masalah yang perlu diributkan oleh sang bangsawan. Tetapi, ketika ia akan menikah dengan seorang wanita yang juga seorang bangsawan, ia menjadi resah. Wanita yang pernah dicintai oleh sang bangsawan itu mengancam akan mengacaukan pernikahan mereka.', 'Tersedia', '321-sherlock__sebuah_skandal_di_bohemia.jpg'),
(7, 'Harry Potter and the Prisoner of Azkaban', 'J.k. Rowling', 'Akibat melakukan kekacauan sihir luar biasa, Harry Potter kabur dari keluarga Dursley dan Little Whinging naik Bus Ksatria. Ia mengira bakal mendapat hukuman berat. Namun, Kementerian Sihir punya masalah yang lebih gawat---Sirius Black, tawanan terkenal dan pengikut setia Lord Voldemort, melarikan diri dari penjara Azkaban.', 'Tersedia', '669-9786020383637_Harry-Potter-.jpg'),
(8, 'Your Name. (Kimi No Nawa)', 'SHINKAI MAKOTO', 'Mitsuha, seorang gadis SMA yang tinggal di sebuah desa di pegunungan, bermimpi dia menjadi seorang anak laki-laki. Dia bangun di sebuah kamar yang asing, berteman dengan orang asing, melihat kota Tokyo tepat di depan matanya.', 'Sedang Dipinjam', '496-img508_tsC4kHS.jpg'),
(9, 'Siapa Sebenarnya Markesot?', 'Emha Ainun Nadjib', 'Setelah beberapa kali menyelenggarakan perkumpulan pengajian yang membahas mengenai tafsir Al-Quran, Markesot mulai dibicarakan orang-orang. Mereka bertanya-tanya mengenai latar belakang ilmu agama yang dimiliki Markesot. Dia selama ini tidak dikenal sebagai ulama, ustaz, ataupun lulusan pesantren. Lalu bagaimana bisa dia mengajak anak-anak muda untuk mendiskusikan makna ayat-ayat Al-Quran?', 'Sedang Dipinjam', '396-9786022916147_Siapa-Sebenarnya-Markesot.jpg'),
(10, 'Laskar Pelangi : Edisi Original', 'Andrea Hirata', 'Laskar Pelangi telah menjadi international bestseller, diterjemahkan ke-40 bahasa asing. Telah terbit dalam 22 bahasa, diedarkan di lebih dari 130 negara. Melalui program beasiswa, Hirata meraih Master of Science (Msc) bidang teori ekonomi dari Sheffield Hallam University, UK.', 'Sedang Dipinjam', '363-img212.jpg'),
(11, 'Your Lie In April 08', 'Naoshi Arakawa', 'Mendengar Kaousei akan pergi jauh. Tsubaki menjadi sedih, dan mulai menyadari perasaanya. Di sisi lain, Kaori ternyata sedang dirawat di rumah sakit.', 'Tersedia', '527-9786024281199_your-lie-in-april-08.jpg'),
(12, 'DEMON SLAYER: Kimetsu no Yaiba 02', 'Koyoharu Gotouge', 'Setelah berhasil melewati seleksi akhir ujian untuk menjadi anggota Kisatsutai,Tanjiro ditemani Nezuko yang telah sadarkan diri, pergi ke suatu kota di mana para gadis muda dikabarkan menghilang secara misterius...!! Apakah ini juga ulah iblis!?', 'Sedang Dipinjam', '844-9786230018220_Demon_Slayer_2_logo_di_kecilin-1.jpg'),
(13, 'Light Novel Naruto: Blood Prison', 'Masashi Kishimoto', 'Naruto difitnah sebagai pelaku beberapa percobaan pembunuhan sehingga dikirim ke sebuah penjara bernama Kastil Hozuki di Kusagakure! Cakranya disegel dengan Tenro no Jutsu oleh Mui, sang kepala kastil, sehingga dia tak bisa kabur atau menggunakan ninjutsu.', 'Sedang Dipinjam', '152-719011259_Light_Novel_Naruto_Blood_Prison.jpg'),
(14, 'Boys do Write Love Letters', 'Kansa Airlangga', 'Shenaya mulai percaya, bahwa bukan hanya anak perempuan yang suka menulis. Sebab gadis itu menemukan surat-surat tersebut di lokernya yang tak pernah dikunci. Ia pikir, semuanya adalah surat salah kirim dari seorang siswi, sampai akhirnya Shenaya temukan kode jelas tentang siapa yang menuliskan semuanya.', 'Tersedia', '134-9786024529048_boys_do_write_love_letters.jpg'),
(15, 'Sisi Lain Habib Rizieq', 'Fikry Mahammadi', 'Sebagaimana manusia pada umumnya,Habib Rizieq juga memiliki sisi sisi yang tidak tunggal.Hal ini,boleh jadi,karena manusia terdiri dari tumpukan identitas yang memposisikannya sebagai makhluk multidimensi.', 'Sedang Dipinjam', '544-9786023721269_sisi-lain-habib-rizieq.jpg'),
(16, 'Ahok dan Jakarta', 'Kompasiana', '12 Kompasianer kembali menyuarakan pendapatnya tentang Ahok dan Jakarta. Sebagai petahana, Basuki Tjahaja Purnama atau yang sering disapa dengan Ahok mencalonkan diri kembali menjadi gubernur DKI Jakarta periode tahun 2017-2022 meski pro-kontra mengenai dirinya tak pernah berhenti. Melalui Ahok dan Jakarta, 12 Kompasianer berbagi opini mereka mengenai sosok Ahok dari kacamata warga.', 'Tersedia', '370-ID_EMK2017MTH03ADJA_B.jpg'),
(17, 'Elon Musk: The Real Iron Man', 'The Real Iron Man Ms Anderson', 'Ditulis dengan jernih dan ringan, buku ini menelusuri perjalanan pengusaha teknologi ini sejak lahir di Afrika Selatan, hiruk pikuk tentang perusahaan-perusahaan Elon Musk yang mengubah dunia, sampai pada puncak dunia bisnis global. ', 'Tersedia', '561-9786021527399C_9786021527399.jpg'),
(18, 'Why? People Bill Gates', 'Yearimdang', 'Bill Gates memiliki ketertarikan pada komputer dan juga pernah melakukan programming secara langsung. Setelah memasuki Universitas Harvard, dia mengembangkan sebuah sistem BASIC komputer Altair dan memprediksi betapa pentingnya suatu software. ', 'Tersedia', '545-9786020477428_Why-People-Bi.jpg'),
(19, 'Ensiklopedia Hiu', 'Barbara Taylor Bradford', 'Jelajahi dunia hiu dari hiu putih raksasa dan hiu martil hingga hiu pari dan jenis hiu skate. Subtema dalam buku ini dilengkapi dengan informasi mengenai kehidupan hiu dalam biologi, termasuk caranya berburu mangsa, berkembang biak, dan bermigrasi, serta konservasi hiu di dunia â€“ sehingga buku ini merupakan referensi yang luar biasa. 1. Informasi singkat, mendetail 2. Ratusan ilustrasi dan foto 3. ', 'Tersedia', '362-9786230016868_Ensiklopedia_Hiu_cover.jpg'),
(20, 'Death Note 05', 'Tsugumi Ohba, Takeshi Obata', 'Untuk mengamankan Misa, Light yang terdesak meminta agar dirinya disekap. Setelah itu, ia memberitahu Ryuk untuk membuang DEATH NOTE miliknya! Apa yang sedang direncanakannya? Sementara itu, diamdiam KIRA beraksi kembali!', 'Sedang Dipinjam', '315-f_cover-05.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `denda` varchar(25) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `id_user`, `id_buku`, `tanggal_pinjam`, `tanggal_kembali`, `denda`, `status`) VALUES
(1, 1, 1, '2020-12-28', '2020-12-30', '', 'Dipinjam'),
(2, 2, 4, '2020-12-29', '2021-01-05', '', ''),
(3, 2, 8, '2020-12-29', '2021-01-05', '', ''),
(4, 8, 9, '2020-12-29', '2021-01-07', '', ''),
(5, 9, 2, '2020-12-29', '2021-01-04', '', ''),
(6, 9, 10, '2020-12-29', '2021-01-04', '', ''),
(7, 12, 13, '2020-12-29', '2021-01-06', '', ''),
(8, 12, 20, '2020-12-29', '2021-01-06', '', ''),
(9, 7, 5, '2020-12-29', '2021-01-05', '', ''),
(10, 5, 15, '2020-12-29', '2021-01-08', '', ''),
(11, 3, 12, '2020-12-29', '2021-01-03', '', ''),
(15, 1, 1, '2020-12-29', '2021-01-04', '', 'Dipinjam');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(70) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(80) NOT NULL,
  `email` varchar(40) NOT NULL,
  `no_hp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `alamat`, `email`, `no_hp`) VALUES
(1, 'n0tail', 'e10adc3949ba59abbe56e057f20f883e', 'Johann', 'Jakarta', 'n0tail@gmail.com', '08123457854'),
(2, 'ana', 'e10adc3949ba59abbe56e057f20f883e', 'Anathan', 'Bojonegoro', 'anathan@gmail.com', '08154475496'),
(3, 'topson', 'e10adc3949ba59abbe56e057f20f883e', 'Topias', 'Medan', 'topson@gmail.com', '0875421467'),
(4, 'mocel', 'e10adc3949ba59abbe56e057f20f883e', 'Randy', 'Semarang', 'mocel@gmail.com', '08147567898'),
(5, 'kiky', 'e10adc3949ba59abbe56e057f20f883e', 'kiky rizky', 'Bekasi', 'kiky@gmail.com', '0894561047'),
(6, 'jerax', 'e10adc3949ba59abbe56e057f20f883e', 'Jesse', 'Lamongan', 'jerax@gmail.com', '085215674752'),
(7, 'ramz', 'e10adc3949ba59abbe56e057f20f883e', 'Ramzy', 'Jombang', 'ramz@gmail.com', '08561324724'),
(8, 'drew', 'e10adc3949ba59abbe56e057f20f883e', 'Andrew', 'Surabaya', 'drew@gmail.com', '0875642345'),
(9, 'sumail', 'e10adc3949ba59abbe56e057f20f883e', 'Sumail Hassan', 'Banyuwangi', 'sumail@gmail.com', '08564789241'),
(10, 'ceeeb', 'e10adc3949ba59abbe56e057f20f883e', 'Sebastian Debs', 'Bangkalan', 'ceb@gmail.com', '08956547874'),
(11, 'arteezy', 'e10adc3949ba59abbe56e057f20f883e', 'Artour', 'Gresik', 'rtz@gmail.com', '08789263412'),
(12, 'renata', 'e10adc3949ba59abbe56e057f20f883e', 'Renata', 'Jakarta', 'renata@gmail.com', '087892631246');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `peminjaman_ibfk_1` (`id_buku`),
  ADD KEY `peminjaman_ibfk_2` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
