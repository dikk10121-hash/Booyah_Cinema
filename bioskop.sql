-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Waktu pembuatan: 25 Okt 2025 pada 05.37
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bioskop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `film`
--

CREATE TABLE `film` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `genre` varchar(100) DEFAULT NULL,
  `duration` varchar(50) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `produser` varchar(225) DEFAULT NULL,
  `sutradara` varchar(225) DEFAULT NULL,
  `penulis` varchar(225) DEFAULT NULL,
  `produksi` varchar(225) DEFAULT NULL,
  `aktor` varchar(225) DEFAULT NULL,
  `sinopsis` text DEFAULT NULL,
  `poster` varchar(255) DEFAULT NULL,
  `status` enum('now','coming') DEFAULT 'now',
  `release_date` date DEFAULT NULL,
  `trailer` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `film`
--

INSERT INTO `film` (`id`, `title`, `genre`, `duration`, `age`, `produser`, `sutradara`, `penulis`, `produksi`, `aktor`, `sinopsis`, `poster`, `status`, `release_date`, `trailer`) VALUES
(2, 'Frozen III', 'Animation, Adventure, Family', '110 Menit', 0, 'Peter Del Vecho', 'Chris Buck, Jennifer Lee', 'Jennifer Lee', 'Walt Disney Animation Studios', 'Idina Menzel, Kristen Bell, Josh Gad', 'Elsa dan Anna menghadapi petualangan baru yang mengungkap rahasia kuno kerajaan Arendelle.', 'uploads/frozen3.jpg', 'coming', '2025-12-20', 'https://www.youtube.com/watch?v=TbQm5doF_Uc'),
(3, 'Avatar 3', 'Sci-Fi, Adventure', '180 Menit', 13, 'James Cameron, Jon Landau', 'James Cameron', 'James Cameron', '20th Century Studios, Lightstorm Entertainment', 'Sam Worthington, Zoe Saldana, Sigourney Weaver', 'Kisah lanjutan dari keluarga Sully di Pandora yang harus menghadapi ancaman baru yang lebih besar.', 'uploads/avatar3.jpg', 'coming', '2025-12-19', 'https://www.youtube.com/watch?v=d9MyW72ELq0'),
(4, 'The Avengers: Secret Wars', 'Action, Sci-Fi', '180 Menit', 13, 'Kevin Feige', 'Destin Daniel Cretton', 'Michael Waldron', 'Marvel Studios', 'Benedict Cumberbatch, Tom Holland, Brie Larson', 'Para Avengers menghadapi ancaman multiverse terbesar yang pernah ada.', 'uploads/avengers_secret_wars.jpg', 'coming', '2026-05-07', 'https://www.youtube.com/watch?v=eOrNdBpGMv8'),
(5, 'Zootopia 2', 'Animation, Adventure, Comedy', '105 Menit', 0, 'Clark Spencer', 'Jared Bush', 'Phil Johnston, Jared Bush', 'Walt Disney Animation Studios', 'Ginnifer Goodwin, Jason Bateman', 'Judy Hopps dan Nick Wilde kembali memecahkan kasus baru di kota Zootopia.', 'uploads/zootopia2.jpg', 'coming', '2025-11-15', 'https://www.youtube.com/watch?v=jWM0ct-OLsM'),
(6, 'Doctor Strange in the Multiverse of Madness', 'Action, Fantasy', '126 Menit', 13, 'Kevin Feige', 'Sam Raimi', 'Michael Waldron', 'Marvel Studios', 'Benedict Cumberbatch, Elizabeth Olsen', 'Doctor Strange menjelajahi multiverse untuk menghentikan ancaman kosmik yang membahayakan semua realitas.', 'uploads/doctorstrange2.jpg', 'now', '2022-05-06', 'https://www.youtube.com/watch?v=aWzlQ2N6qqg'),
(7, 'Spider-Man: No Way Home', 'Action, Adventure', '148 Menit', 13, 'Kevin Feige, Amy Pascal', 'Jon Watts', 'Chris McKenna, Erik Sommers', 'Marvel Studios, Columbia Pictures', 'Tom Holland, Zendaya, Benedict Cumberbatch', 'Peter Parker meminta bantuan Doctor Strange yang berujung pada kekacauan multiverse.', 'uploads/spiderman_nwh.jpg', 'now', '2021-12-17', 'https://www.youtube.com/watch?v=JfVOs4VSpmA'),
(8, 'Tenet', 'Sci-Fi, Action', '150 Menit', 13, 'Emma Thomas, Christopher Nolan', 'Christopher Nolan', 'Christopher Nolan', 'Syncopy, Warner Bros.', 'John David Washington, Robert Pattinson', 'Seorang agen rahasia berusaha mencegah bencana global dengan teknologi pembalikan waktu.', 'uploads/tenet.jpg', 'now', '2020-09-03', 'https://www.youtube.com/watch?v=LdOM0x0XDMo'),
(9, 'Black Panther: Wakanda Forever', 'Action, Drama', '161 Menit', 13, 'Kevin Feige, Nate Moore', 'Ryan Coogler', 'Ryan Coogler, Joe Robert Cole', 'Marvel Studios', 'Letitia Wright, Angela Bassett, Tenoch Huerta', 'Wakanda berjuang melindungi kerajaan setelah kematian Raja T’Challa.', 'uploads/wakanda_forever.jpg', 'now', '2022-11-11', 'https://www.youtube.com/watch?v=_Z3QKkl1WyM'),
(10, 'The Nun', 'Horror, Supernatural', '96 Menit', 17, 'James Wan, Peter Safran', 'Corin Hardy', 'Gary Dauberman, James Wan', 'New Line Cinema, Warner Bros.', 'Taissa Farmiga, Bonnie Aarons, Demián Bichir', 'Seorang biarawati bunuh diri di Rumania memanggil kekuatan gelap, dan biara terpencil menjadi tempat kengerian yang tak terduga terjadi.', 'uploads/the_nun.jpg', 'now', '2018-09-07', 'https://www.youtube.com/watch?v=pzD9zGcUNrw'),
(11, 'The Conjuring', 'Horror, Mystery', '112 Menit', 17, 'Peter Safran, Rob Cowan, James Wan', 'James Wan', 'Chad Hayes, Carey W. Hayes', 'New Line Cinema', 'Patrick Wilson, Vera Farmiga, Ron Livingston, Lili Taylor', 'Penyelidik paranormal Ed dan Lorraine Warren menghadapi teror gaib di rumah keluarga Perron dimana fenomena jahat mulai muncul.', 'uploads/the_conjuring.jpg', 'now', '2013-07-19', 'https://www.youtube.com/watch?v=k10ETZ41q5o'),
(12, 'Talk To Me', 'Horror, Supernatural', '100 Menit', 17, 'Samantha Jennings, Kristina Ceyton', 'Danny Philippou, Michael Philippou', 'Danny Philippou, Bill Hinzman', 'A24', 'Sophie Wilde, Miranda Otto, Alexandra Jensen', 'Sekelompok remaja menemukan cara untuk memanggil roh melalui tangan yang telah diawetkan, dan konsekuensi perbuatannya membuka pintu ke kengerian dunia gaib.', 'uploads/talk_to_me.jpg', 'now', '2022-07-28', 'https://www.youtube.com/watch?v=aLAKJu9aJys'),
(13, 'Inception', 'Science Fiction, Action', '148 Menit', 13, 'Emma Thomas, Christopher Nolan', 'Christopher Nolan', 'Christopher Nolan', 'Warner Bros.', 'Leonardo DiCaprio, Joseph Gordon-Levitt, Ellen Page, Tom Hardy', 'Dom Cobb pemberi jasa pencuri mimpi, ditawari tugas menanam ide di alam bawah sadar musuh; tapi misi ini penuh risiko.', 'uploads/inception.jpg', 'now', '2010-07-16', 'https://www.youtube.com/watch?v=8hP9D6kZseM'),
(14, 'IT', 'Horror, Mystery', '135 Menit', 17, 'Roy Lee, Dan Lin, Seth Grahame-Smith', 'Andrés Muschietti', 'Chase Palmer, Cary Fukunaga, Gary Dauberman', 'New Line Cinema', 'Bill Skarsgård, Jaeden Lieberher, Finn Wolfhard, Sophia Lillis', 'Ketika anak-anak mulai hilang di kota Derry, sekelompok anak kecil menghadapi teror dari Pennywise sang badut iblis.', 'uploads/it.jpg', 'now', '2025-09-09', 'https://www.youtube.com/watch?v=xKJmEC5ieOk'),
(16, 'DEMON SLAYER : KIMETSU NO YAIBA - INFINITY CASTLE', 'Anime, Action, Adventure', '155 Menit', 15, 'Akifumi Fujio, Masanori Miyake, Yuma Takahashi', 'Haruo Sotozaki', 'Koyoharu Gotouge', 'Aniplex, Crunchyroll, Sony Pictures', 'Natsuki Hanae, Reina Ueda, Saori Hayami, Yoshitsugu Matsuoka, Hiro Shimono, Akari Kito', 'Korps pembasmi iblis dijebak menuju \"Infinity Castle\" oleh Muzan. Di markas besar para iblis itu, Tanjiro, Nezuko dan para Hashira akan menghadapi iblis-iblis bulan atas yang sangat mengerikan.', 'uploads/demonslayer.jpg', 'now', '0000-00-00', 'https://www.youtube.com/watch?v=x7uLutVRBfI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `seat` varchar(10) NOT NULL,
  `price` int(11) NOT NULL,
  `payment` varchar(50) NOT NULL,
  `ticket_id` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tickets`
--

INSERT INTO `tickets` (`id`, `username`, `title`, `seat`, `price`, `payment`, `ticket_id`, `created_at`) VALUES
(14, 'Dhika', 'Black Panther: Wakanda Forever', 'E11', 45000, 'Cash', '', '2025-10-08 16:49:41'),
(15, 'Dhika', 'IT', 'F10', 45000, 'Gopay', '', '2025-10-08 16:50:12'),
(16, 'Dhika', 'IT', 'D4', 45000, 'Gopay', '', '2025-10-08 16:50:12'),
(17, 'Dhika', 'DEMON SLAYER : KIMETSU NO YAIBA - INFINITY CASTLE', 'B10', 45000, 'Cash', '', '2025-10-09 01:17:24'),
(18, 'Dhika', 'DEMON SLAYER : KIMETSU NO YAIBA - INFINITY CASTLE', 'E12', 45000, 'Cash', '', '2025-10-09 01:17:24'),
(19, 'Dhika', 'DEMON SLAYER : KIMETSU NO YAIBA - INFINITY CASTLE', 'D4', 45000, 'Cash', '', '2025-10-09 01:17:24'),
(20, 'Dhika', 'Talk To Me', 'C12', 45000, 'ShopeePay', '', '2025-10-15 04:48:18'),
(21, 'Dhika', 'Talk To Me', 'C13', 45000, 'ShopeePay', '', '2025-10-15 04:48:18'),
(22, 'Dhika', 'Talk To Me', 'B13', 45000, 'ShopeePay', '', '2025-10-15 04:48:18'),
(23, 'Dhika', 'Talk To Me', 'A11', 45000, 'ShopeePay', '', '2025-10-15 04:48:18'),
(24, 'Dhika', 'Talk To Me', 'C10', 45000, 'ShopeePay', '', '2025-10-15 04:48:18'),
(25, 'Dhika', 'Talk To Me', 'D10', 45000, 'ShopeePay', '', '2025-10-15 04:48:18'),
(26, 'Dhika', 'Talk To Me', 'D11', 45000, 'ShopeePay', '', '2025-10-15 04:48:18'),
(27, 'Dhika', 'Doctor Strange in the Multiverse of Madness', 'D10', 45000, 'Cash', '', '2025-10-16 04:48:23'),
(28, 'Dhika', 'Doctor Strange in the Multiverse of Madness', 'D9', 45000, 'Cash', '', '2025-10-16 04:48:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(225) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`) VALUES
(1, 'dikk10121@gmail.com', 'user', 'userr'),
(2, 'dhikag932@gmail.com', 'Dhika', 'dhika1234'),
(3, 'rayhan987@gmail.com', 'rayhan', 'rehan1122'),
(4, 'dikk10121@gmail.com', 'admin', 'admin1234'),
(5, 'dikk10121@gmail.com', 'Dhika', 'Dika1234');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `film`
--
ALTER TABLE `film`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
