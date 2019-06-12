-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2019 at 09:53 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `notes`
--

-- --------------------------------------------------------

--
-- Table structure for table `downs`
--

CREATE TABLE `downs` (
  `id` int(10) NOT NULL,
  `user` int(10) NOT NULL,
  `note` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `downs`
--

INSERT INTO `downs` (`id`, `user`, `note`) VALUES
(1, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `user_name` varchar(256) NOT NULL,
  `user_email` varchar(256) NOT NULL,
  `user_subject` varchar(256) NOT NULL,
  `user_message` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `n_id` int(10) NOT NULL,
  `n_name` varchar(50) NOT NULL,
  `course` varchar(50) NOT NULL,
  `author` int(11) NOT NULL,
  `stat` int(11) NOT NULL,
  `file_loc` varchar(100) NOT NULL,
  `likes` int(10) NOT NULL,
  `date` date NOT NULL,
  `type` int(2) NOT NULL,
  `description` varchar(255) NOT NULL,
  `size` int(10) NOT NULL,
  `ban_req` int(10) NOT NULL,
  `invalid` int(10) NOT NULL,
  `downloads` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`n_id`, `n_name`, `course`, `author`, `stat`, `file_loc`, `likes`, `date`, `type`, `description`, `size`, `ban_req`, `invalid`, `downloads`) VALUES
(4, 'Some Stuff', 'Stuff', 16, 0, 'uploaded/db.docx', 0, '2019-03-08', 0, '', 15476, 0, 0, 1),
(6, 'OtherStuff', 'OS', 1, 1, 'uploaded/4_6048733576898282609.pdf', 0, '2019-03-08', 0, '', 0, 0, 0, 0),
(7, 'HippityHop', 'Hiphop', 1, 1, 'uploaded/03_RAlgebra(1).pdf', 0, '2019-03-08', 1, 'Niggas only.', 326376, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `note_likes`
--

CREATE TABLE `note_likes` (
  `id` int(10) NOT NULL,
  `user` int(10) NOT NULL,
  `notes` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `quotes`
--

CREATE TABLE `quotes` (
  `id` int(10) NOT NULL,
  `quote` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quotes`
--

INSERT INTO `quotes` (`id`, `quote`) VALUES
(1, 'Eat a dick.'),
(2, 'Fuck off.'),
(3, 'Why won\'t you just die...Do the world a favor.'),
(5, 'No one likes you.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_first` varchar(256) NOT NULL,
  `user_last` varchar(256) NOT NULL,
  `user_uid` varchar(256) NOT NULL,
  `user_email` varchar(256) NOT NULL,
  `user_pwd` varchar(256) NOT NULL,
  `pro_pic` varchar(50) DEFAULT NULL,
  `t_likes` int(10) NOT NULL,
  `inst` varchar(50) NOT NULL,
  `type` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_first`, `user_last`, `user_uid`, `user_email`, `user_pwd`, `pro_pic`, `t_likes`, `inst`, `type`) VALUES
(1, 'Joseph', 'Benaw', 'Jo10', 'yosephte@gmail.com', '$2y$10$x1v7bs.GXnFip74rcie12uwxdZ2QrkhI8Rqj7kdiT7XtgN4h4CzTS', 'Profile/Pics/ani2.jpg', 0, '', 1),
(2, 'Nigga', 'Boi', 'NiggaBoi', 'Niggers@gmail.com', '$2y$10$7qeD30hQ5YW80vY80fH9HeLdHef4L0vYfT569N0S9SwhhuRi4LHCa', '', 0, '', 0),
(3, 'KEvo', 'Keco', 'KeK', 'kek@gmail.com', '$2y$10$n0VOBMAR/B/Nh5qu1RREZ.K8dDVfeVyVbehwvlFh5JXMyYZIqCs36', '', 0, '', 0),
(4, 'lord', 'kek', 'kev', 'kev@gmail.com', '$2y$10$sz0F962kX3rwiZ6FKlSP3OqYE.qSSFsH1/Ou0o9qGvhz2eSOe7O.C', '', 0, '', 0),
(5, 'jzkxbc', 'dsfassdaf', 'hey', 'hey@vsause.com', '$2y$10$b89OKeANg9szOnUvMpCQOOmNSIRYsw10e4AJ.dtDswQ9.NtH8dDc6', '../UniNotes/images/clarton.png', 0, '', 0),
(6, 'Diri', 'Dea', 'Dea', 'dea@diri.com', '$2y$10$Uvcdx6p1UJ1C4WA/SpnjMeePFxlFjS9V5ptH/fO6Sytr2WamsaoX6', 'Profile/Pics/ani1.jpg', 0, 'AASTU', 0),
(7, 'Jasper', 'Gem', 'Jasper', 'f@g.com', '$2y$10$Rgf2CkX4/nEzMNsUSIWHy.jtIgMdR3lW17z2zCvG0Bt6LtB8sHaOO', 'Profile/Pics/ani4.jpg', 0, 'Homeworld', 0),
(8, 'WOLF', 'erra', 'WOLF', 'at@gmail.com', '$2y$10$k6j9D3g4hKHnIxPGmq/fruMQ8eSrGJs4WNtA1IyYfL0RZGUvqspbi', '../UniNotes/images/green.png', 0, '', 0),
(9, 'Ass', 'Getting', 'Iggy', 'i@gmail.com', '$2y$10$YHowb7PjCd18StLBHsOfgO6hJte4d3ax8T3T03TzWBlUWkQ3orchO', 'Profile/Pics/ani4.jpg', 0, 'Rap', 0),
(16, 'Vsauce', 'sadf', 'VMik', 'heys@vsause.com', '$2y$10$J7PQ5DXMmlLMc7FS3O.etu2yUTUGbrR.z.okQ7F6VwUSX6NJ93tk2', 'Profile/Pics/ani1.jpg', 0, 'yt', 0),
(17, 'TYS', 'STude', 'STv', 'wSwUc@gmail.com', '$2y$10$Q4OEVAYc7/6AtTZpGlTXN.NHNzm50DMorl1g7GOD/qcVKW3xhwyo.', '../UniNotes/images/yellow.png', 0, 'AASTU', 1),
(18, 'Nigga', 'Bio', 'N.Boii', 'N@gmail.com', '$2y$10$Vpc.aM034ZnlULgzc5e8duRTrCpQ92mCoJTkE0F8vrNMqORz1EBXO', '../UniNotes/images/white.png', 0, 'addis ababa', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `downs`
--
ALTER TABLE `downs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`user_name`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`n_id`);

--
-- Indexes for table `note_likes`
--
ALTER TABLE `note_likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotes`
--
ALTER TABLE `quotes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `downs`
--
ALTER TABLE `downs`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `n_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `quotes`
--
ALTER TABLE `quotes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
