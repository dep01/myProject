-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 18 Apr 2020 pada 17.18
-- Versi Server: 10.1.28-MariaDB
-- PHP Version: 7.0.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `management_project`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `active_status`
--

CREATE TABLE `active_status` (
  `id_active_status` int(11) NOT NULL,
  `active_status` varchar(15) NOT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_active_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gender_table`
--

INSERT INTO `gender_table` (`id_gender`, `gender`, `created`, `updated`, `id_active_status`) VALUES
(1, 'Male', '2020-03-19 15:59:56', '2020-04-17 14:19:36', 1),
(2, 'Female', '2020-03-19 15:59:56', '2020-04-17 14:19:46', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobbase_table`
--

CREATE TABLE `jobbase_table` (
  `id_user` int(11) NOT NULL,
  `id_jobbase` int(11) NOT NULL,
  `jobbase` varchar(30) NOT NULL,
  `percentageFee` int(11) DEFAULT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_active_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jobbase_table`
--

INSERT INTO `jobbase_table` (`id_user`, `id_jobbase`, `jobbase`, `percentageFee`, `created`, `updated`, `id_active_status`) VALUES
(1, 1, 'PM', 20, '2020-04-08 15:09:44', '2020-04-11 15:59:27', 1),
(1, 2, 'Acountan', 40, '2020-04-08 15:30:54', '2020-04-11 15:59:27', 1),
(1, 3, 'Back end', 40, '2020-04-08 15:40:01', '2020-04-18 19:49:14', 9),
(1, 4, 'Kang kopi', 30, '2020-04-08 15:44:33', '2020-04-18 19:52:10', 9),
(1, 5, 'Back end', 30, '2020-04-09 15:47:13', '2020-04-11 14:22:05', 1),
(1, 6, 'Kang kopi', 30, '2020-04-09 16:02:48', '2020-04-18 19:49:07', 9),
(2, 7, 'Back end', 40, '2020-04-09 16:04:34', '2020-04-09 16:04:34', 1),
(1, 8, 'Jaringan', 50, '2020-04-18 19:50:58', '2020-04-18 19:51:22', 1);

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
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_status`
--

CREATE TABLE `job_status` (
  `id_job_status` int(11) NOT NULL,
  `job_status` varchar(20) NOT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_active_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `job_status`
--

INSERT INTO `job_status` (`id_job_status`, `job_status`, `created`, `updated`, `id_active_status`) VALUES
(1, 'Process', '2020-03-19 15:59:57', '2020-03-19 15:59:57', 1),
(2, 'Finished', '2020-03-19 15:59:57', '2020-03-19 15:59:57', 1),
(3, 'Waiting', '2020-03-19 15:59:57', '2020-04-01 13:18:46', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `list_friend`
--

CREATE TABLE `list_friend` (
  `id_user` int(11) NOT NULL,
  `id_user_friend` int(11) DEFAULT NULL,
  `id_list_friend_status` int(11) NOT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `list_friend`
--

INSERT INTO `list_friend` (`id_user`, `id_user_friend`, `id_list_friend_status`, `created`, `updated`) VALUES
(1, 2, 2, '2020-04-08 15:56:20', '2020-04-08 15:59:10'),
(2, 1, 1, '2020-04-08 15:59:49', '2020-04-08 15:59:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `list_friend_status`
--

CREATE TABLE `list_friend_status` (
  `id_list_friend_status` int(11) NOT NULL,
  `list_friend_status` varchar(30) NOT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_active_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `list_friend_status`
--

INSERT INTO `list_friend_status` (`id_list_friend_status`, `list_friend_status`, `created`, `updated`, `id_active_status`) VALUES
(1, 'Request', '2020-04-08 15:50:26', '2020-04-08 15:50:26', 1),
(2, 'Following', '2020-04-08 15:50:26', '2020-04-08 15:50:26', 1),
(3, 'Team', '2020-04-08 15:50:49', '2020-04-08 15:50:49', 1);

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
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_active_status` int(11) NOT NULL,
  `image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `profile_table`
--

INSERT INTO `profile_table` (`id_profile`, `id_user`, `fullname`, `birthday`, `id_gender`, `phone`, `address`, `created`, `updated`, `id_active_status`, `image`) VALUES
(1, 1, 'Diaz erlangga putra', '1999-01-30', 1, '081213157674', 'Villa mutiara gading blok c5/23 desa setia asih', '2020-04-08 15:07:55', '2020-04-18 21:21:28', 1, '158721968815872191371.jpg'),
(2, 2, 'Dani alfest', '1996-03-28', 1, '085781564225', 'Jalan', '2020-04-08 15:54:57', '2020-04-08 15:54:57', 1, NULL),
(3, 3, 'Udin sedunia', '1996-03-26', 1, '08132545532', 'jalan', '2020-04-09 16:13:15', '2020-04-09 16:13:15', 1, NULL),
(4, 8, 'Dani alfest', '1995-04-24', 1, '08132545532', 'kiminonawa', '2020-04-18 21:27:22', '2020-04-18 21:27:22', 1, '15872200151.jpg');

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
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_project_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `project_detail`
--

CREATE TABLE `project_detail` (
  `id_project` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_jobbase` int(11) NOT NULL,
  `id_status_user` int(11) NOT NULL,
  `job_detail` varchar(1000) NOT NULL,
  `start_job` date NOT NULL,
  `finish_job` date NOT NULL,
  `deadline_job` int(11) NOT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_job_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `project_payment_status`
--

CREATE TABLE `project_payment_status` (
  `id_project_payment_status` int(11) NOT NULL,
  `project_payment_status` varchar(30) NOT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `project_status`
--

CREATE TABLE `project_status` (
  `id_project_status` int(11) NOT NULL,
  `project_status` varchar(20) NOT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_active_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `project_status`
--

INSERT INTO `project_status` (`id_project_status`, `project_status`, `created`, `updated`, `id_active_status`) VALUES
(1, 'Prepare', '2020-03-19 15:59:56', '2020-04-17 14:01:42', 1),
(2, 'Process', '2020-03-19 15:59:56', '2020-04-17 14:01:36', 1),
(3, 'Presentation', '2020-03-19 15:59:56', '2020-04-17 14:01:29', 1),
(4, 'Finished', '2020-03-19 15:59:56', '2020-04-17 14:01:22', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_user`
--

CREATE TABLE `status_user` (
  `id_status_user` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_active_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_active_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_table`
--

INSERT INTO `user_table` (`id_user`, `username`, `user_mail`, `password`, `verify_code`, `id_verify_status`, `created`, `updated`, `id_active_status`) VALUES
(1, 'dep01', 'diazerlanggaputra@ymail.com', 'nAbhUdwwSVZjNnFp', 123456, 2, '2020-04-08 15:06:57', '2020-04-18 15:00:29', 1),
(2, 'dep02', 'diazerlangga77@yahoo.com', '21m1Btw0', 123456, 2, '2020-04-08 15:54:26', '2020-04-08 15:54:26', 1),
(3, 'dep03', 'diazerlangga77@yahoo.co.id', '21m1Btw0', 123456, 2, '2020-04-09 16:12:51', '2020-04-09 16:12:51', 1),
(4, 'dep04', 'ontohodfc@yahoo.com', '21m1Btw0', 123456, 2, '2020-04-09 16:18:41', '2020-04-09 16:18:41', 1),
(5, 'adagan', 'adagan@yahoo.com', '21m1Bg==', 123456, 2, '2020-04-18 15:48:07', '2020-04-18 15:48:07', 1),
(6, 'safa', 'safa@yahoo.com', '21m1Bg==', 123456, 2, '2020-04-18 15:49:58', '2020-04-18 15:49:58', 1),
(7, 'ina', 'ina@yahoo.com', '21m1Btw0TQo=', 123456, 2, '2020-04-18 15:51:09', '2020-04-18 15:51:09', 1),
(8, 'dudu', 'alhamdu@yahoo.com', 'jgLnSIxwFlNoISE9', 123456, 2, '2020-04-18 21:26:43', '2020-04-18 21:26:43', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `verify_status`
--

CREATE TABLE `verify_status` (
  `id_verify_status` int(11) NOT NULL,
  `verify_status` varchar(15) NOT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `verify_status`
--

INSERT INTO `verify_status` (`id_verify_status`, `verify_status`, `created`, `updated`) VALUES
(0, 'unverify', '2020-03-19 15:59:56', '2020-03-19 15:59:56'),
(1, 'onverify', '2020-03-19 15:59:56', '2020-03-19 15:59:56'),
(2, 'verify', '2020-03-19 15:59:56', '2020-03-19 15:59:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `active_status`
--
ALTER TABLE `active_status`
  ADD PRIMARY KEY (`id_active_status`);

--
-- Indexes for table `gender_table`
--
ALTER TABLE `gender_table`
  ADD PRIMARY KEY (`id_gender`),
  ADD KEY `fk_id_active_status_gender_table` (`id_active_status`);

--
-- Indexes for table `jobbase_table`
--
ALTER TABLE `jobbase_table`
  ADD PRIMARY KEY (`id_jobbase`),
  ADD KEY `fk_id_user_jobbase_table` (`id_user`),
  ADD KEY `fk_id_active_status_jobbase_table` (`id_active_status`);

--
-- Indexes for table `job_payment`
--
ALTER TABLE `job_payment`
  ADD PRIMARY KEY (`id_job_payment`),
  ADD KEY `fk_id_project_job_payment` (`id_project`),
  ADD KEY `fk_id_user_job_payment` (`id_user`),
  ADD KEY `fk_id_project_payment_status_job_payment` (`id_project_payment_status`);

--
-- Indexes for table `job_status`
--
ALTER TABLE `job_status`
  ADD PRIMARY KEY (`id_job_status`),
  ADD KEY `fk_id_active_status_job_status` (`id_active_status`);

--
-- Indexes for table `list_friend`
--
ALTER TABLE `list_friend`
  ADD KEY `fk_id_user_list_friend` (`id_user`),
  ADD KEY `fk_id_user_friend_list_friend` (`id_user_friend`),
  ADD KEY `fk_id_list_friend_status_list_friend` (`id_list_friend_status`);

--
-- Indexes for table `list_friend_status`
--
ALTER TABLE `list_friend_status`
  ADD PRIMARY KEY (`id_list_friend_status`),
  ADD KEY `fk_id_active_status_list_friend_status` (`id_active_status`);

--
-- Indexes for table `profile_table`
--
ALTER TABLE `profile_table`
  ADD PRIMARY KEY (`id_profile`),
  ADD KEY `fk_id_user_profile_table` (`id_user`),
  ADD KEY `fk_id_active_status_profile_table` (`id_active_status`),
  ADD KEY `fk_id_gender_profile_table` (`id_gender`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id_project`),
  ADD KEY `fk_id_user_project` (`id_user`),
  ADD KEY `fk_id_project_status_project` (`id_project_status`);

--
-- Indexes for table `project_detail`
--
ALTER TABLE `project_detail`
  ADD KEY `fk_id_project_project_detail` (`id_project`),
  ADD KEY `fk_id_user_project_detail` (`id_user`),
  ADD KEY `fk_id_jobbase_project_detail` (`id_jobbase`),
  ADD KEY `fk_id_status_user_project_detail` (`id_status_user`),
  ADD KEY `fk_id_job_status_project_detail` (`id_job_status`);

--
-- Indexes for table `project_payment`
--
ALTER TABLE `project_payment`
  ADD PRIMARY KEY (`id_project_payment`),
  ADD KEY `fk_id_project_project_payment` (`id_project`),
  ADD KEY `fk_id_project_payment_status_project_payment` (`id_project_payment_status`);

--
-- Indexes for table `project_payment_status`
--
ALTER TABLE `project_payment_status`
  ADD PRIMARY KEY (`id_project_payment_status`);

--
-- Indexes for table `project_status`
--
ALTER TABLE `project_status`
  ADD PRIMARY KEY (`id_project_status`),
  ADD KEY `fk_id_active_status_project_status` (`id_active_status`);

--
-- Indexes for table `status_user`
--
ALTER TABLE `status_user`
  ADD PRIMARY KEY (`id_status_user`),
  ADD KEY `fk_id_active_status_status_user` (`id_active_status`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `fk_id_verify_status_user_table` (`id_verify_status`),
  ADD KEY `fk_id_active_status_user_table` (`id_active_status`);

--
-- Indexes for table `verify_status`
--
ALTER TABLE `verify_status`
  ADD PRIMARY KEY (`id_verify_status`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jobbase_table`
--
ALTER TABLE `jobbase_table`
  MODIFY `id_jobbase` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `job_payment`
--
ALTER TABLE `job_payment`
  MODIFY `id_job_payment` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `list_friend_status`
--
ALTER TABLE `list_friend_status`
  MODIFY `id_list_friend_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `profile_table`
--
ALTER TABLE `profile_table`
  MODIFY `id_profile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id_project` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_payment`
--
ALTER TABLE `project_payment`
  MODIFY `id_project_payment` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_payment_status`
--
ALTER TABLE `project_payment_status`
  MODIFY `id_project_payment_status` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
-- Ketidakleluasaan untuk tabel `project_detail`
--
ALTER TABLE `project_detail`
  ADD CONSTRAINT `fk_id_job_status_project_detail` FOREIGN KEY (`id_job_status`) REFERENCES `job_status` (`id_job_status`),
  ADD CONSTRAINT `fk_id_jobbase_project_detail` FOREIGN KEY (`id_jobbase`) REFERENCES `jobbase_table` (`id_jobbase`),
  ADD CONSTRAINT `fk_id_project_project_detail` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`),
  ADD CONSTRAINT `fk_id_status_user_project_detail` FOREIGN KEY (`id_status_user`) REFERENCES `status_user` (`id_status_user`),
  ADD CONSTRAINT `fk_id_user_project_detail` FOREIGN KEY (`id_user`) REFERENCES `user_table` (`id_user`);

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
