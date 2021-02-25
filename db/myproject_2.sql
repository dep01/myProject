-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Feb 2021 pada 14.10
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myproject_2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `active_status`
--

CREATE TABLE `active_status` (
  `id_active_status` int(11) NOT NULL,
  `active_status` varchar(15) NOT NULL,
  `created` datetime DEFAULT current_timestamp(),
  `updated` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `active_status`
--

INSERT INTO `active_status` (`id_active_status`, `active_status`, `created`, `updated`) VALUES
(1, 'active', '2020-03-19 15:59:56', '2020-03-19 15:59:56'),
(9, 'delete', '2020-03-19 15:59:56', '2020-04-07 11:34:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gender_table`
--

CREATE TABLE `gender_table` (
  `id_gender` int(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `created` datetime DEFAULT current_timestamp(),
  `updated` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_active_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `gender_table`
--

INSERT INTO `gender_table` (`id_gender`, `gender`, `created`, `updated`, `id_active_status`) VALUES
(1, 'male', '2020-03-19 15:59:56', '2020-03-19 15:59:56', 1),
(2, 'female', '2020-03-19 15:59:56', '2020-03-19 15:59:56', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobbase_table`
--

CREATE TABLE `jobbase_table` (
  `id_user` int(11) NOT NULL,
  `id_jobbase` int(11) NOT NULL,
  `jobbase` varchar(30) NOT NULL,
  `percentageFee` int(11) DEFAULT NULL,
  `created` datetime DEFAULT current_timestamp(),
  `updated` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_active_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jobbase_table`
--

INSERT INTO `jobbase_table` (`id_user`, `id_jobbase`, `jobbase`, `percentageFee`, `created`, `updated`, `id_active_status`) VALUES
(1, 1, 'FULLSTACK!', 100, '2021-02-25 19:40:42', '2021-02-25 19:40:42', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_payment`
--

CREATE TABLE `job_payment` (
  `id_job_payment` int(11) NOT NULL,
  `id_project` int(11) NOT NULL,
  `invoice_document` varchar(30) NOT NULL,
  `id_user` int(11) NOT NULL,
  `payment_amount` decimal(18,2) NOT NULL,
  `payment_progress` int(11) NOT NULL,
  `job_progress` int(11) NOT NULL,
  `id_project_payment_status` int(11) NOT NULL,
  `created` datetime DEFAULT current_timestamp(),
  `updated` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_status`
--

CREATE TABLE `job_status` (
  `id_job_status` int(11) NOT NULL,
  `job_status` varchar(20) NOT NULL,
  `created` datetime DEFAULT current_timestamp(),
  `updated` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_active_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `job_status`
--

INSERT INTO `job_status` (`id_job_status`, `job_status`, `created`, `updated`, `id_active_status`) VALUES
(1, 'Waiting', '2020-03-19 15:59:57', '2021-02-25 19:58:44', 1),
(2, 'Process', '2020-03-19 15:59:57', '2021-02-25 19:59:01', 1),
(3, 'Finished', '2020-03-19 15:59:57', '2021-02-25 19:59:09', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `list_friend`
--

CREATE TABLE `list_friend` (
  `id_user` int(11) NOT NULL,
  `id_user_friend` int(11) DEFAULT NULL,
  `id_list_friend_status` int(11) NOT NULL,
  `created` datetime DEFAULT current_timestamp(),
  `updated` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `list_friend_status`
--

CREATE TABLE `list_friend_status` (
  `id_list_friend_status` int(11) NOT NULL,
  `list_friend_status` varchar(30) NOT NULL,
  `created` datetime DEFAULT current_timestamp(),
  `updated` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_active_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `profile_table`
--

CREATE TABLE `profile_table` (
  `id_profile` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `birthday` date NOT NULL,
  `id_gender` int(11) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `created` datetime DEFAULT current_timestamp(),
  `updated` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_active_status` int(11) NOT NULL,
  `image` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `profile_table`
--

INSERT INTO `profile_table` (`id_profile`, `id_user`, `fullname`, `birthday`, `id_gender`, `phone`, `address`, `created`, `updated`, `id_active_status`, `image`) VALUES
(2, 1, 'Diaz erlangga putra', '1999-01-30', 1, '081213157674', 'hehehe', '2021-02-25 19:26:53', '2021-02-25 19:26:53', 1, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `project`
--

CREATE TABLE `project` (
  `id_user` int(11) NOT NULL,
  `id_project` int(11) NOT NULL,
  `project_name` varchar(50) NOT NULL,
  `project_start` date NOT NULL,
  `project_end` date NOT NULL,
  `project_fee` decimal(18,2) NOT NULL,
  `project_deadline` int(11) NOT NULL,
  `created` datetime DEFAULT current_timestamp(),
  `updated` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_project_status` int(11) NOT NULL,
  `actual_start` date DEFAULT NULL,
  `actual_finish` date DEFAULT NULL,
  `actual_timeline` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `project`
--

INSERT INTO `project` (`id_user`, `id_project`, `project_name`, `project_start`, `project_end`, `project_fee`, `project_deadline`, `created`, `updated`, `id_project_status`, `actual_start`, `actual_finish`, `actual_timeline`) VALUES
(1, 1, 'Management Project', '2021-03-06', '2021-04-05', '15000000.00', 30, '2021-02-25 19:29:41', '2021-02-25 19:59:54', 2, '2021-02-25', NULL, NULL),
(1, 2, 'Management Project', '2021-03-06', '2021-04-05', '15000000.00', 30, '2021-02-25 19:32:05', '2021-02-25 19:32:05', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `project_detail`
--

CREATE TABLE `project_detail` (
  `id_project` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_status_user` int(11) NOT NULL,
  `job_detail` varchar(1000) NOT NULL,
  `start_job` date NOT NULL,
  `finish_job` date NOT NULL,
  `deadline_job` int(11) NOT NULL,
  `created` datetime DEFAULT current_timestamp(),
  `updated` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_job_status` int(11) NOT NULL,
  `actual_start` date DEFAULT NULL,
  `actual_finish` date DEFAULT NULL,
  `actual_timeline` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `project_detail`
--

INSERT INTO `project_detail` (`id_project`, `id_user`, `id_status_user`, `job_detail`, `start_job`, `finish_job`, `deadline_job`, `created`, `updated`, `id_job_status`, `actual_start`, `actual_finish`, `actual_timeline`, `id`) VALUES
(1, 1, 0, 'Bangsat nyusahin', '2021-02-25', '2021-02-26', 1, '2021-02-25 19:55:48', '2021-02-25 19:56:16', 3, NULL, '2021-02-25', 0, 2),
(1, 1, 0, 'Bangsat nyusahin', '2021-02-25', '2021-02-26', 1, '2021-02-25 20:00:18', '2021-02-25 20:00:18', 2, NULL, NULL, NULL, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `project_payment`
--

CREATE TABLE `project_payment` (
  `id_project_payment` int(11) NOT NULL,
  `id_project` int(11) NOT NULL,
  `invoice_document` varchar(30) NOT NULL,
  `payment_amount` decimal(18,2) NOT NULL,
  `payment_progress` int(11) NOT NULL,
  `project_progress` int(11) NOT NULL,
  `id_project_payment_status` int(11) NOT NULL,
  `created` datetime DEFAULT current_timestamp(),
  `updated` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `project_payment_status`
--

CREATE TABLE `project_payment_status` (
  `id_project_payment_status` int(11) NOT NULL,
  `project_payment_status` varchar(30) NOT NULL,
  `created` datetime DEFAULT current_timestamp(),
  `updated` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `project_status`
--

CREATE TABLE `project_status` (
  `id_project_status` int(11) NOT NULL,
  `project_status` varchar(20) NOT NULL,
  `created` datetime DEFAULT current_timestamp(),
  `updated` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_active_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `project_status`
--

INSERT INTO `project_status` (`id_project_status`, `project_status`, `created`, `updated`, `id_active_status`) VALUES
(1, 'Prepare', '2020-03-19 15:59:56', '2020-03-19 15:59:56', 1),
(2, 'Process', '2020-03-19 15:59:56', '2020-03-19 15:59:56', 1),
(3, 'Presentation', '2020-03-19 15:59:56', '2020-03-19 15:59:56', 1),
(4, 'Finished', '2020-03-19 15:59:56', '2020-03-19 15:59:56', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `project_team`
--

CREATE TABLE `project_team` (
  `id_project` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_jobbase` int(11) DEFAULT NULL,
  `percentageFee` int(11) NOT NULL,
  `fee` decimal(18,2) NOT NULL,
  `id_project_team_status` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `project_team`
--

INSERT INTO `project_team` (`id_project`, `id_user`, `id_jobbase`, `percentageFee`, `fee`, `id_project_team_status`, `created`, `updated`) VALUES
(1, 1, 1, 100, '15000000.00', 2, '0000-00-00 00:00:00', '2021-02-25 19:32:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `project_team_status`
--

CREATE TABLE `project_team_status` (
  `id_project_team_status` int(11) NOT NULL,
  `project_team_status` varchar(15) NOT NULL,
  `created` datetime DEFAULT current_timestamp(),
  `updated` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_active_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `project_team_status`
--

INSERT INTO `project_team_status` (`id_project_team_status`, `project_team_status`, `created`, `updated`, `id_active_status`) VALUES
(1, 'Request', '2021-02-25 19:19:41', '2021-02-25 19:19:41', 1),
(2, 'Accepted', '2021-02-25 19:19:41', '2021-02-25 19:19:41', 1),
(3, 'Rejected', '2021-02-25 19:19:41', '2021-02-25 19:19:41', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_user`
--

CREATE TABLE `status_user` (
  `id_status_user` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `created` datetime DEFAULT current_timestamp(),
  `updated` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_active_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `status_user`
--

INSERT INTO `status_user` (`id_status_user`, `status`, `created`, `updated`, `id_active_status`) VALUES
(1, 'Author', '2020-03-19 15:59:56', '2020-03-19 15:59:56', 1),
(2, 'Team', '2020-03-19 15:59:56', '2020-03-19 15:59:56', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_table`
--

CREATE TABLE `user_table` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `user_mail` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `verify_code` int(11) NOT NULL,
  `id_verify_status` int(11) DEFAULT NULL,
  `created` datetime DEFAULT current_timestamp(),
  `updated` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_active_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_table`
--

INSERT INTO `user_table` (`id_user`, `username`, `user_mail`, `password`, `verify_code`, `id_verify_status`, `created`, `updated`, `id_active_status`) VALUES
(1, 'dep001', 'diazerlanggaputra@ymail.com', '21m1Btw0TQo=', 123456, 2, '2021-02-25 19:22:02', '2021-02-25 19:22:02', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `verify_status`
--

CREATE TABLE `verify_status` (
  `id_verify_status` int(11) NOT NULL,
  `verify_status` varchar(15) NOT NULL,
  `created` datetime DEFAULT current_timestamp(),
  `updated` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `verify_status`
--

INSERT INTO `verify_status` (`id_verify_status`, `verify_status`, `created`, `updated`) VALUES
(1, 'unverify', '2020-03-19 15:59:56', '2020-03-19 15:59:56'),
(2, 'onverify', '2020-03-19 15:59:56', '2020-03-19 15:59:56'),
(3, 'verify', '2020-03-19 15:59:56', '2020-03-19 15:59:56');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `active_status`
--
ALTER TABLE `active_status`
  ADD PRIMARY KEY (`id_active_status`);

--
-- Indeks untuk tabel `gender_table`
--
ALTER TABLE `gender_table`
  ADD PRIMARY KEY (`id_gender`),
  ADD KEY `fk_id_active_status_gender_table` (`id_active_status`);

--
-- Indeks untuk tabel `jobbase_table`
--
ALTER TABLE `jobbase_table`
  ADD PRIMARY KEY (`id_jobbase`),
  ADD KEY `fk_id_user_jobbase_table` (`id_user`),
  ADD KEY `fk_id_active_status_jobbase_table` (`id_active_status`);

--
-- Indeks untuk tabel `job_payment`
--
ALTER TABLE `job_payment`
  ADD PRIMARY KEY (`id_job_payment`),
  ADD KEY `fk_id_project_job_payment` (`id_project`),
  ADD KEY `fk_id_user_job_payment` (`id_user`),
  ADD KEY `fk_id_project_payment_status_job_payment` (`id_project_payment_status`);

--
-- Indeks untuk tabel `job_status`
--
ALTER TABLE `job_status`
  ADD PRIMARY KEY (`id_job_status`),
  ADD KEY `fk_id_active_status_job_status` (`id_active_status`);

--
-- Indeks untuk tabel `list_friend`
--
ALTER TABLE `list_friend`
  ADD KEY `fk_id_user_list_friend` (`id_user`),
  ADD KEY `fk_id_user_friend_list_friend` (`id_user_friend`),
  ADD KEY `fk_id_list_friend_status_list_friend` (`id_list_friend_status`);

--
-- Indeks untuk tabel `list_friend_status`
--
ALTER TABLE `list_friend_status`
  ADD PRIMARY KEY (`id_list_friend_status`),
  ADD KEY `fk_id_active_status_list_friend_status` (`id_active_status`);

--
-- Indeks untuk tabel `profile_table`
--
ALTER TABLE `profile_table`
  ADD PRIMARY KEY (`id_profile`),
  ADD KEY `fk_id_user_profile_table` (`id_user`),
  ADD KEY `fk_id_gender_profile_table` (`id_gender`),
  ADD KEY `fk_id_active_status_profile_table` (`id_active_status`);

--
-- Indeks untuk tabel `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id_project`),
  ADD KEY `fk_id_user_project` (`id_user`),
  ADD KEY `fk_id_project_status_project` (`id_project_status`);

--
-- Indeks untuk tabel `project_detail`
--
ALTER TABLE `project_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_project_project_detail` (`id_project`),
  ADD KEY `fk_id_user_project_detail` (`id_user`),
  ADD KEY `fk_id_status_user_project_detail` (`id_status_user`),
  ADD KEY `fk_id_job_status_project_detail` (`id_job_status`);

--
-- Indeks untuk tabel `project_payment`
--
ALTER TABLE `project_payment`
  ADD PRIMARY KEY (`id_project_payment`),
  ADD KEY `fk_id_project_project_payment` (`id_project`),
  ADD KEY `fk_id_project_payment_status_project_payment` (`id_project_payment_status`);

--
-- Indeks untuk tabel `project_payment_status`
--
ALTER TABLE `project_payment_status`
  ADD PRIMARY KEY (`id_project_payment_status`);

--
-- Indeks untuk tabel `project_status`
--
ALTER TABLE `project_status`
  ADD PRIMARY KEY (`id_project_status`),
  ADD KEY `fk_id_active_status_project_status` (`id_active_status`);

--
-- Indeks untuk tabel `project_team`
--
ALTER TABLE `project_team`
  ADD KEY `fk_id_project_project_team` (`id_project`),
  ADD KEY `fk_id_user_project_team` (`id_user`),
  ADD KEY `fk_id_jobbase_project_team` (`id_jobbase`);

--
-- Indeks untuk tabel `project_team_status`
--
ALTER TABLE `project_team_status`
  ADD PRIMARY KEY (`id_project_team_status`),
  ADD KEY `fk_id_active_status_project_team_status` (`id_active_status`);

--
-- Indeks untuk tabel `status_user`
--
ALTER TABLE `status_user`
  ADD PRIMARY KEY (`id_status_user`),
  ADD KEY `fk_id_active_status_status_user` (`id_active_status`);

--
-- Indeks untuk tabel `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `fk_id_verify_status_user_table` (`id_verify_status`),
  ADD KEY `fk_id_active_status_user_table` (`id_active_status`);

--
-- Indeks untuk tabel `verify_status`
--
ALTER TABLE `verify_status`
  ADD PRIMARY KEY (`id_verify_status`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jobbase_table`
--
ALTER TABLE `jobbase_table`
  MODIFY `id_jobbase` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `job_payment`
--
ALTER TABLE `job_payment`
  MODIFY `id_job_payment` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `list_friend_status`
--
ALTER TABLE `list_friend_status`
  MODIFY `id_list_friend_status` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `profile_table`
--
ALTER TABLE `profile_table`
  MODIFY `id_profile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `project`
--
ALTER TABLE `project`
  MODIFY `id_project` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `project_detail`
--
ALTER TABLE `project_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `project_payment`
--
ALTER TABLE `project_payment`
  MODIFY `id_project_payment` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `project_payment_status`
--
ALTER TABLE `project_payment_status`
  MODIFY `id_project_payment_status` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `project_team_status`
--
ALTER TABLE `project_team_status`
  MODIFY `id_project_team_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user_table`
--
ALTER TABLE `user_table`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `gender_table`
--
ALTER TABLE `gender_table`
  ADD CONSTRAINT `fk_id_active_status_gender_table` FOREIGN KEY (`id_active_status`) REFERENCES `active_status` (`id_active_status`);

--
-- Ketidakleluasaan untuk tabel `jobbase_table`
--
ALTER TABLE `jobbase_table`
  ADD CONSTRAINT `fk_id_active_status_jobbase_table` FOREIGN KEY (`id_active_status`) REFERENCES `active_status` (`id_active_status`),
  ADD CONSTRAINT `fk_id_user_jobbase_table` FOREIGN KEY (`id_user`) REFERENCES `user_table` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `job_payment`
--
ALTER TABLE `job_payment`
  ADD CONSTRAINT `fk_id_project_job_payment` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`),
  ADD CONSTRAINT `fk_id_project_payment_status_job_payment` FOREIGN KEY (`id_project_payment_status`) REFERENCES `project_payment_status` (`id_project_payment_status`),
  ADD CONSTRAINT `fk_id_user_job_payment` FOREIGN KEY (`id_user`) REFERENCES `user_table` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `job_status`
--
ALTER TABLE `job_status`
  ADD CONSTRAINT `fk_id_active_status_job_status` FOREIGN KEY (`id_active_status`) REFERENCES `active_status` (`id_active_status`);

--
-- Ketidakleluasaan untuk tabel `list_friend`
--
ALTER TABLE `list_friend`
  ADD CONSTRAINT `fk_id_list_friend_status_list_friend` FOREIGN KEY (`id_list_friend_status`) REFERENCES `list_friend_status` (`id_list_friend_status`),
  ADD CONSTRAINT `fk_id_user_friend_list_friend` FOREIGN KEY (`id_user_friend`) REFERENCES `user_table` (`id_user`),
  ADD CONSTRAINT `fk_id_user_list_friend` FOREIGN KEY (`id_user`) REFERENCES `user_table` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `list_friend_status`
--
ALTER TABLE `list_friend_status`
  ADD CONSTRAINT `fk_id_active_status_list_friend_status` FOREIGN KEY (`id_active_status`) REFERENCES `active_status` (`id_active_status`);

--
-- Ketidakleluasaan untuk tabel `profile_table`
--
ALTER TABLE `profile_table`
  ADD CONSTRAINT `fk_id_active_status_profile_table` FOREIGN KEY (`id_active_status`) REFERENCES `active_status` (`id_active_status`),
  ADD CONSTRAINT `fk_id_gender_profile_table` FOREIGN KEY (`id_gender`) REFERENCES `gender_table` (`id_gender`),
  ADD CONSTRAINT `fk_id_user_profile_table` FOREIGN KEY (`id_user`) REFERENCES `user_table` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `fk_id_project_status_project` FOREIGN KEY (`id_project_status`) REFERENCES `project_status` (`id_project_status`),
  ADD CONSTRAINT `fk_id_user_project` FOREIGN KEY (`id_user`) REFERENCES `user_table` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `project_payment`
--
ALTER TABLE `project_payment`
  ADD CONSTRAINT `fk_id_project_payment_status_project_payment` FOREIGN KEY (`id_project_payment_status`) REFERENCES `project_payment_status` (`id_project_payment_status`),
  ADD CONSTRAINT `fk_id_project_project_payment` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`);

--
-- Ketidakleluasaan untuk tabel `project_status`
--
ALTER TABLE `project_status`
  ADD CONSTRAINT `fk_id_active_status_project_status` FOREIGN KEY (`id_active_status`) REFERENCES `active_status` (`id_active_status`);

--
-- Ketidakleluasaan untuk tabel `project_team`
--
ALTER TABLE `project_team`
  ADD CONSTRAINT `fk_id_jobbase_project_team` FOREIGN KEY (`id_jobbase`) REFERENCES `jobbase_table` (`id_jobbase`),
  ADD CONSTRAINT `fk_id_project_project_team` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`),
  ADD CONSTRAINT `fk_id_user_project_team` FOREIGN KEY (`id_user`) REFERENCES `user_table` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `project_team_status`
--
ALTER TABLE `project_team_status`
  ADD CONSTRAINT `fk_id_active_status_project_team_status` FOREIGN KEY (`id_active_status`) REFERENCES `active_status` (`id_active_status`);

--
-- Ketidakleluasaan untuk tabel `status_user`
--
ALTER TABLE `status_user`
  ADD CONSTRAINT `fk_id_active_status_status_user` FOREIGN KEY (`id_active_status`) REFERENCES `active_status` (`id_active_status`);

--
-- Ketidakleluasaan untuk tabel `user_table`
--
ALTER TABLE `user_table`
  ADD CONSTRAINT `fk_id_active_status_user_table` FOREIGN KEY (`id_active_status`) REFERENCES `active_status` (`id_active_status`),
  ADD CONSTRAINT `fk_id_verify_status_user_table` FOREIGN KEY (`id_verify_status`) REFERENCES `verify_status` (`id_verify_status`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
