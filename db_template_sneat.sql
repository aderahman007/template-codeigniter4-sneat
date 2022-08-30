<<<<<<< HEAD
/*
SQLyog Ultimate v12.5.1 (32 bit)
MySQL - 5.7.33 : Database - db_template_sneat
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_template_sneat` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_template_sneat`;

/*Table structure for table `manajemen_sistem` */

DROP TABLE IF EXISTS `manajemen_sistem`;

CREATE TABLE `manajemen_sistem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) DEFAULT NULL,
  `alamat` text,
=======


--
-- Database: `db_template_sneat`
--

CREATE DATABASE db_template_sneat;
USE db_template_sneat;

--
-- Table structure for table `manajemen_sistem`
--

CREATE TABLE `manajemen_sistem` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
>>>>>>> 4d88ee4a47cab338d56cbb24151a8225a9707f33
  `owner` varchar(200) DEFAULT NULL,
  `telpon` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `logo` varchar(200) DEFAULT NULL,
  `favicon` varchar(200) DEFAULT NULL,
<<<<<<< HEAD
  `running_text` text,
  `tentang` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `manajemen_sistem` */

insert  into `manajemen_sistem`(`id`,`nama`,`alamat`,`owner`,`telpon`,`email`,`logo`,`favicon`,`running_text`,`tentang`,`created_at`,`updated_at`) values 
(1,'Zean Organizer',NULL,'dhdbha','083197974297','zeanorganizer@gmail.com','1658817800_885b50fd031a768c196e.png','1658817815_82b3b110cb763ee7beef.png',NULL,'Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Vivamus suscipit tortor eget felis porttitor volutpat. Pellentesque in ipsum id orci porta dapibus. Curabitur aliquet quam id dui posuere blandit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Sed porttitor lectus nibh. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Vivamus suscipit tortor eget felis porttitor volutpat. Sed porttitor lectus nibh. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi.\r\n\r\nPraesent sapien massa, convallis a pellentesque nec, egestas non nisi. Pellentesque in ipsum id orci porta dapibus. Pellentesque in ipsum id orci porta dapibus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum congue leo eget malesuada. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Nulla quis lorem ut libero malesuada feugiat. Proin eget tortor risus. Cras ultricies ligula sed magna dictum porta. Donec rutrum congue leo eget malesuada. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Donec rutrum congue leo eget malesuada. Donec sollicitudin molestie malesuada. Vivamus suscipit tortor eget felis porttitor volutpat. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus.','2022-07-21 18:43:39','2022-08-27 00:04:46');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(150) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `telepon` varchar(100) DEFAULT NULL,
=======
  `running_text` text DEFAULT NULL,
  `tentang` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manajemen_sistem`
--

INSERT INTO `manajemen_sistem` (`id`, `nama`, `alamat`, `owner`, `telpon`, `email`, `logo`, `favicon`, `running_text`, `tentang`, `created_at`, `updated_at`) VALUES
(1, 'GIS Pariwisata', NULL, 'dhdbha', '083197974297', 'gis@gmail.com', '1658817800_885b50fd031a768c196e.png', '1658817815_82b3b110cb763ee7beef.png', NULL, 'Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Vivamus suscipit tortor eget felis porttitor volutpat. Pellentesque in ipsum id orci porta dapibus. Curabitur aliquet quam id dui posuere blandit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Sed porttitor lectus nibh. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Vivamus suscipit tortor eget felis porttitor volutpat. Sed porttitor lectus nibh. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi.\r\n\r\nPraesent sapien massa, convallis a pellentesque nec, egestas non nisi. Pellentesque in ipsum id orci porta dapibus. Pellentesque in ipsum id orci porta dapibus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum congue leo eget malesuada. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Nulla quis lorem ut libero malesuada feugiat. Proin eget tortor risus. Cras ultricies ligula sed magna dictum porta. Donec rutrum congue leo eget malesuada. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Donec rutrum congue leo eget malesuada. Donec sollicitudin molestie malesuada. Vivamus suscipit tortor eget felis porttitor volutpat. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus.', '2022-07-21 18:43:39', '2022-07-26 13:41:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(150) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
>>>>>>> 4d88ee4a47cab338d56cbb24151a8225a9707f33
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `hak_akses` enum('admin','user') DEFAULT NULL,
  `foto` varchar(150) DEFAULT 'default.png',
  `lasted_login` datetime DEFAULT NULL,
  `status` enum('aktif','tidak_aktif') DEFAULT NULL,
<<<<<<< HEAD
  `reset_token` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

/*Data for the table `users` */

insert  into `users`(`id`,`nama`,`username`,`telepon`,`email`,`password`,`hak_akses`,`foto`,`lasted_login`,`status`,`reset_token`,`created_at`,`updated_at`) values 
(1,'Ade Rahman','ade',NULL,'ade@gmail.com','$2y$10$GHkl5DgSN1JsjfchFDJ2.uDzk3poaTjm3DFkxloFN5fIlTnjM0HUG','admin','default.png','2022-07-24 02:31:46','aktif','(NULL)','2022-07-24 02:31:53','2022-07-24 23:56:21'),
(6,'Ade Rahman','jabrik3111@gmail.com','085366125569','aderahman9908@gmail.com','$2y$10$SDvuN7bWOEPBHxF7DvhZ7.99tPiCCYmk8erljsJdloz8JvLhgjMLm','admin','default.png',NULL,'aktif','0c60b22c49f8c1efcf7b035c71e381e4ced6a7e598423c4672766b9f6c9f44eb3f338e2cca426d8db4f5b667a107ac669f45b61813121f4364d2860b2b82aa1a8a42bc28a05c88d7d2df9f91ffd209541182a2a096d55ed3a45b8b5ff131bfbc82a6c6e5','2022-07-25 01:36:45','2022-08-27 01:54:51');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
=======
  `reset_token` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `email`, `password`, `hak_akses`, `foto`, `lasted_login`, `status`, `reset_token`, `created_at`, `updated_at`) VALUES
(1, 'Ade Rahman', 'ade', 'ade@gmail.com', '$2y$10$GHkl5DgSN1JsjfchFDJ2.uDzk3poaTjm3DFkxloFN5fIlTnjM0HUG', 'admin', 'default.png', '2022-07-24 02:31:46', 'aktif', '(NULL)', '2022-07-24 02:31:53', '2022-07-24 23:56:21'),
(6, 'Fitriyani', 'jabrik3111@gmail.com', 'jabrik3111@gmail.com', '$2y$10$SDvuN7bWOEPBHxF7DvhZ7.99tPiCCYmk8erljsJdloz8JvLhgjMLm', 'admin', 'default.png', NULL, 'aktif', '(NULL)', '2022-07-25 01:36:45', '2022-07-25 08:54:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `manajemen_sistem`
--
ALTER TABLE `manajemen_sistem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

-- AUTO_INCREMENT for table `manajemen_sistem`
--
ALTER TABLE `manajemen_sistem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

>>>>>>> 4d88ee4a47cab338d56cbb24151a8225a9707f33
