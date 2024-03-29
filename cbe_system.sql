-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2022 at 01:35 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cbe_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`id`, `name`, `surname`, `gender`, `email`, `username`, `password`, `token`, `position`) VALUES
(1, 'Mrs. Folakemi', 'Jegede', 'Female', 'jegedeoluwafemi1998@gmail.com', 'admin', '$2y$10$/LmJfpNx.nODYJ1qlmXpJeBe7v3ujU9aG.jcBX/.l4WahYES1D7yG', '3b4439366d25394e2f391e52ed10fa5f', 'Proprietor'),
(2, 'Tope', 'Olajide', 'Male', 'tope@gmail.com', 'Joshua', '$2y$10$F3/F7Zhg6cHRLwX8Y1Nb4u5dmRH7y1oh1q.eW3O/FZZ6/goihqfyi', 'ed8e4275e4db6ab20418e5337e7c2c08', 'Principal'),
(3, 'Goodluck', 'Evweikama', 'Male', 'evweikamagoodluck@gmail.com', 'gudy123', '$2y$10$kOqZfBZWP49lBDQLCXsiQOIAeWV/4Va8L2izAE8.irYvcoRURLKIu', '1ba8953be6c6d9959f1b8f2dc24f5468', 'Teacher'),
(4, 'Clifford', 'Nwabuike', 'Male', 'nwabuikecliff@gmail.com', 'instructorc', '$2y$10$dQoqdbSQ9.zjO6FV6jq3Luv4O5xfPj2x8M/D/3XhglAUXlQka0gKq', '010b953ffff70aee91a3cd25a74e7793', 'Teacher'),
(5, 'Grace', 'Morolahun', 'Female', 'morolahungrace@gmail.com', 'oyelola', '$2y$10$CYpIeDBrhzE5Nm9F3Y0QEO1Htjc/UbfOxsR2jcsxLyTwaNonwqZf.', '523bc226bc968578e033fe2aa5c5d48a', 'Teacher'),
(6, 'ADEOYE', 'ADEDAYO', 'Male', 'dayosuper01@yahoo.com', 'ADEXTOBA', '$2y$10$4gZrLo54oz87ljGPlPjtLeKXt6IJvc0S5aEBfmaGeAfkQM0TN9unq', 'f280b1e313eec2332b8423c15549d711', 'Teacher'),
(7, 'Modupe', 'Adejoro', 'Female', 'adejoromodupe2020@gmail.com', 'modupeade', '$2y$10$MhNnZfbxcOlyQEkb0jYwMePrjO5zSbNBZ9FoPMmkQG9bqyGRsuwze', 'ac974d4b86d4c0441e92d71650d82c0a', 'Teacher'),
(8, 'Oluwadamilola', 'Oyebode', 'Male', 'mrbead2006@gmail.com', 'comr.dami', '$2y$10$82WGB0ynVASXt5sLK8Oy6OsEKb9iJOBrHgfFcD50y11wuaQI737pS', '83caf79b4de5d39e308f78994931c91f', 'Teacher'),
(9, 'ODUNAYO', 'FAYOKUN', 'Female', 'fayokunabiolaodunayo@gmail.com', 'odunayomi', '$2y$10$QLCymnaklYIOT/JNwWZtbuPj/Eegfp9YiFxdq1L2HgF1xVI7VAVyO', '07a61c738f261c249a55357a88015e2f', 'Teacher'),
(10, 'Esechie', 'Ilevbaoje', 'Male', 'ilevbaoje@gmail.com', 'James', '$2y$10$Ysmo9J9JMWkWvU5D.nPjTuWm.hSuz1NBAttM4G1qW7TN99KwFZ4OC', 'c2dc161ef276120fcd9eed8df26ffb3c', 'Principal'),
(11, 'TOLULOPE', 'FAKUNLE', 'Female', 'mercytolu50@gmail.com', 'mercytolu50', '$2y$10$wU/qy2G2f36fsJ5fj2D35ue5Zk4waxjKEgN3fSZiJEY.QhaFslMOi', '21e0add5514d0c8d89ba58b65159906f', 'Vice Principal'),
(12, 'Opeyemi', 'John', 'Male', 'lorunfem2018@gmail.com', 'LORUNFEM', '$2y$10$v4nXxM/f59tSN891Qf3uMeD.J6Ts9QcrtcOxsjZDM.2C8.zN4JEl2', '73233644df254ba280e685663e45f8d1', 'Teacher'),
(13, 'Tosin', 'Popoola', 'Male', 'tosinpopoola2801@gmail.com', 'jerrylove', '$2y$10$tuW92xeqNw78zdbpvu6YleLSQYzMjmDAeWwTjoGqi61aujR/wGu0q', '91b2c58b830cebc4179024da54d98962', 'Teacher'),
(14, 'Motunrayo', 'Ayeni', 'Female', 'ayenimotunrayo@gmail.com', 'MOTUNRAYO', '$2y$10$qc91VgLivNy19XG3MMh5euWftK6vLjsn1o/L.Ya2ve1dvJZYZfCeC', 'f7c472fe0b50d387249109c25cec3249', 'Teacher'),
(15, 'Olaoluwa', 'Oyeladun', 'Male', 'oyeladunolaoluwa@gmail.com', 'uncle music', '$2y$10$YJegYKdRR3U13Lxvq7EC4Ox2GyrflVPxmd.RwCpn8YIN8N7NOHtZS', '4cc88244e2cb7f06a9e8a6540ef68a7c', 'Proprietor'),
(16, 'Noah', 'Rufus', 'Male', 'rufusnoah31@gmail.com', 'Ruffy', '$2y$10$eWKQwJprkSrw0vrqRpx9/.xSdSoeb.Z7qBsP4cYys3zwaCyVilsIe', 'e9dc8ab79129b86a7070f9bfe32dbbe5', 'Teacher'),
(17, 'Adediwura', 'Oladipo', 'Female', 'oladipoopeyemimary22@gmail.com', 'Adegold', '$2y$10$d1dhyPLYznASc7nr3OjdzegLBnje0M9C563CPazvvuayennNao/Zy', '8428229b42ea80f3000aa214af65f6e0', 'Teacher'),
(18, 'Olaoluwa', 'Ogunjobi', 'Male', 'ogunjobiolaoluwa2016@gmail.com', 'Ogunjobi', '$2y$10$2rXgTEXzqOAm8XNXhXFoZO3S1sKXHEi1RoNCIF3KvaUwrm/gEt..O', '5585cf1bb2c18a95c8fb6d85f32c5467', 'Teacher'),
(19, 'Bola', 'Olusegun', 'Male', 'tomiwaolusegun17@gmail.com', 'Ayanfeoluwa', '$2y$10$ZCj2keP0QQKucDDOzBvge.USlkok9ikUcQdX8z2StyzbpI.kRy4Cu', '4a66ed73251f7106af443df0fadb420d', 'Teacher'),
(20, 'opeyemi', 'Oladipo', 'Female', 'oladipoopeyemimary@gmail.comi', 'titilayo', '$2y$10$aOmi1PW1EIBjOf0vDq.2DOFQoTf1yQLMDutA82cwZLk/1HcxGQEWC', '329c37f9fd2a37e39fd8d5590e630dbd', 'Teacher'),
(21, 'oyeladun', 'Music', 'Male', 'music@gmail.com', 'music', '$2y$10$DvPcg73QJhQX6yNsFtUWcevd4VezuurxET8LAxbhoq8lMoW45j0g6', '43010284538381bf1ea5e919c65a0aee', 'Teacher'),
(22, 'Adegold', 'English', 'Female', 'english@gmail.com', 'English', '$2y$10$w/ejQNdnJEZqIVBnXlcUJ.v37FOYd/YQwPtLbjuFlTKFZMELn07Zu', 'c73e549f452d9867b2ec47a91c376c16', 'Teacher'),
(23, 'Rnv', 'ogunjobi', 'Male', 'rnv@gmail.com', 'rnv', '$2y$10$SSQHsPA3AqmXA3Y426BsAuqI4KaJrIF0xM6iOqRE7n/SzcnQVmPJ2', '6cdb3ac57c28dbc6762c19e0220d76b5', 'Teacher'),
(24, 'Ayeni', 'Kayode', 'Female', 'yoruba@gmail.com', 'yoruba', '$2y$10$MD54uZW8sikLMI200NAK/etp8dKAVVmm1A1p8c463sTjCBp6qJ0Nm', 'b3885388db3c2fda9cfbe878b3379734', 'Teacher');

-- --------------------------------------------------------

--
-- Table structure for table `class_tbl`
--

CREATE TABLE `class_tbl` (
  `id` int(11) NOT NULL,
  `class` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class_tbl`
--

INSERT INTO `class_tbl` (`id`, `class`) VALUES
(1, 'JSS-1'),
(2, 'JSS-2'),
(3, 'JSS-3'),
(4, 'SSS-1'),
(5, 'SSS-2'),
(6, 'SSS-3');

-- --------------------------------------------------------

--
-- Table structure for table `evaluation`
--

CREATE TABLE `evaluation` (
  `id` int(11) NOT NULL,
  `term` varchar(225) NOT NULL,
  `session` varchar(225) NOT NULL,
  `adm_no` varchar(225) NOT NULL,
  `overall_score` int(11) NOT NULL,
  `out_of` int(11) NOT NULL,
  `percent_score` float NOT NULL,
  `t_comment` varchar(500) NOT NULL,
  `p_comment` varchar(500) NOT NULL,
  `n_absent` int(11) NOT NULL,
  `n_present` int(11) NOT NULL,
  `punctuality` int(11) NOT NULL,
  `attentiveness` int(11) NOT NULL,
  `neatness` int(11) NOT NULL,
  `honesty` int(11) NOT NULL,
  `relationship` int(11) NOT NULL,
  `skills` int(11) NOT NULL,
  `sport` int(11) NOT NULL,
  `clubs` int(11) NOT NULL,
  `fluency` int(11) NOT NULL,
  `handwriting` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `promoted_to` varchar(225) NOT NULL,
  `next_term_date` varchar(225) NOT NULL,
  `class` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `exam_controller`
--

CREATE TABLE `exam_controller` (
  `c_id` int(11) NOT NULL,
  `day` varchar(255) NOT NULL,
  `exam_order` varchar(255) NOT NULL,
  `term` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_controller`
--

INSERT INTO `exam_controller` (`c_id`, `day`, `exam_order`, `term`) VALUES
(1, 'DAY-1', 'First', 'First Term');

-- --------------------------------------------------------

--
-- Table structure for table `ft_answer_sheet`
--

CREATE TABLE `ft_answer_sheet` (
  `A_id` int(11) NOT NULL,
  `subject` mediumtext NOT NULL,
  `paper_type` text NOT NULL,
  `course_code` varchar(255) NOT NULL,
  `teacher` varchar(255) NOT NULL,
  `teacher_token` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `duration` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `adm_no` varchar(255) NOT NULL,
  `CA1` int(11) NOT NULL,
  `CA2` int(11) NOT NULL,
  `CA3` int(11) NOT NULL,
  `test` int(11) NOT NULL,
  `obj_score` int(11) NOT NULL,
  `essay_score` int(11) NOT NULL,
  `exam_total` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `grade` text NOT NULL,
  `remark` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `Q1` int(255) NOT NULL,
  `Qid1` text NOT NULL,
  `Q2` int(255) NOT NULL,
  `Qid2` text NOT NULL,
  `Q3` int(255) NOT NULL,
  `Qid3` text NOT NULL,
  `Q4` int(255) NOT NULL,
  `Qid4` text NOT NULL,
  `Q5` int(255) NOT NULL,
  `Qid5` text NOT NULL,
  `Q6` int(255) NOT NULL,
  `Qid6` text NOT NULL,
  `Q7` int(255) NOT NULL,
  `Qid7` text NOT NULL,
  `Q8` int(255) NOT NULL,
  `Qid8` text NOT NULL,
  `Q9` int(255) NOT NULL,
  `Qid9` text NOT NULL,
  `Q10` int(255) NOT NULL,
  `Qid10` text NOT NULL,
  `Q11` int(255) NOT NULL,
  `Qid11` text NOT NULL,
  `Q12` int(255) NOT NULL,
  `Qid12` text NOT NULL,
  `Q13` int(255) NOT NULL,
  `Qid13` text NOT NULL,
  `Q14` int(255) NOT NULL,
  `Qid14` text NOT NULL,
  `Q15` int(255) NOT NULL,
  `Qid15` text NOT NULL,
  `Q16` int(255) NOT NULL,
  `Qid16` text NOT NULL,
  `Q17` int(255) NOT NULL,
  `Qid17` text NOT NULL,
  `Q18` int(255) NOT NULL,
  `Qid18` text NOT NULL,
  `Q19` int(255) NOT NULL,
  `Qid19` text NOT NULL,
  `Q20` int(255) NOT NULL,
  `Qid20` text NOT NULL,
  `Q21` int(255) NOT NULL,
  `Qid21` text NOT NULL,
  `Q22` int(255) NOT NULL,
  `Qid22` text NOT NULL,
  `Q23` int(255) NOT NULL,
  `Qid23` text NOT NULL,
  `Q24` int(255) NOT NULL,
  `Qid24` text NOT NULL,
  `Q25` int(255) NOT NULL,
  `Qid25` text NOT NULL,
  `Q26` int(255) NOT NULL,
  `Qid26` text NOT NULL,
  `Q27` int(255) NOT NULL,
  `Qid27` text NOT NULL,
  `Q28` int(255) NOT NULL,
  `Qid28` text NOT NULL,
  `Q29` int(255) NOT NULL,
  `Qid29` text NOT NULL,
  `Q30` int(255) NOT NULL,
  `Qid30` text NOT NULL,
  `Q31` int(255) NOT NULL,
  `Qid31` text NOT NULL,
  `Q32` int(255) NOT NULL,
  `Qid32` text NOT NULL,
  `Q33` int(255) NOT NULL,
  `Qid33` text NOT NULL,
  `Q34` int(255) NOT NULL,
  `Qid34` text NOT NULL,
  `Q35` int(255) NOT NULL,
  `Qid35` text NOT NULL,
  `Q36` int(255) NOT NULL,
  `Qid36` text NOT NULL,
  `Q37` int(255) NOT NULL,
  `Qid37` text NOT NULL,
  `Q38` int(255) NOT NULL,
  `Qid38` text NOT NULL,
  `Q39` int(255) NOT NULL,
  `Qid39` text NOT NULL,
  `Q40` int(255) NOT NULL,
  `Qid40` text NOT NULL,
  `Q41` int(255) NOT NULL,
  `Qid41` text NOT NULL,
  `Q42` int(255) NOT NULL,
  `Qid42` text NOT NULL,
  `Q43` int(255) NOT NULL,
  `Qid43` text NOT NULL,
  `Q44` int(255) NOT NULL,
  `Qid44` text NOT NULL,
  `Q45` int(255) NOT NULL,
  `Qid45` text NOT NULL,
  `Q46` int(255) NOT NULL,
  `Qid46` text NOT NULL,
  `Q47` int(255) NOT NULL,
  `Qid47` text NOT NULL,
  `Q48` int(255) NOT NULL,
  `Qid48` text NOT NULL,
  `Q49` int(255) NOT NULL,
  `Qid49` text NOT NULL,
  `Q50` int(255) NOT NULL,
  `Qid50` text NOT NULL,
  `Q51` int(255) NOT NULL,
  `Qid51` text NOT NULL,
  `Q52` int(255) NOT NULL,
  `Qid52` text NOT NULL,
  `Q53` int(255) NOT NULL,
  `Qid53` text NOT NULL,
  `Q54` int(255) NOT NULL,
  `Qid54` text NOT NULL,
  `Q55` int(255) NOT NULL,
  `Qid55` text NOT NULL,
  `Q56` int(255) NOT NULL,
  `Qid56` text NOT NULL,
  `Q57` int(255) NOT NULL,
  `Qid57` text NOT NULL,
  `Q58` int(255) NOT NULL,
  `Qid58` text NOT NULL,
  `Q59` int(255) NOT NULL,
  `Qid59` text NOT NULL,
  `Q60` int(255) NOT NULL,
  `Qid60` text NOT NULL,
  `Q61` int(255) NOT NULL,
  `Qid61` text NOT NULL,
  `Q62` int(255) NOT NULL,
  `Qid62` text NOT NULL,
  `Q63` int(255) NOT NULL,
  `Qid63` text NOT NULL,
  `Q64` int(255) NOT NULL,
  `Qid64` text NOT NULL,
  `Q65` int(255) NOT NULL,
  `Qid65` text NOT NULL,
  `Q66` int(255) NOT NULL,
  `Qid66` text NOT NULL,
  `Q67` int(255) NOT NULL,
  `Qid67` text NOT NULL,
  `Q68` int(255) NOT NULL,
  `Qid68` text NOT NULL,
  `Q69` int(255) NOT NULL,
  `Qid69` text NOT NULL,
  `Q70` int(255) NOT NULL,
  `Qid70` text NOT NULL,
  `Q71` int(255) NOT NULL,
  `Qid71` text NOT NULL,
  `Q72` int(255) NOT NULL,
  `Qid72` text NOT NULL,
  `Q73` int(255) NOT NULL,
  `Qid73` text NOT NULL,
  `Q74` int(255) NOT NULL,
  `Qid74` text NOT NULL,
  `Q75` int(255) NOT NULL,
  `Qid75` text NOT NULL,
  `Q76` int(255) NOT NULL,
  `Qid76` text NOT NULL,
  `Q77` int(255) NOT NULL,
  `Qid77` text NOT NULL,
  `Q78` int(255) NOT NULL,
  `Qid78` text NOT NULL,
  `Q79` int(255) NOT NULL,
  `Qid79` text NOT NULL,
  `Q80` int(255) NOT NULL,
  `Qid80` text NOT NULL,
  `Q81` int(255) NOT NULL,
  `Qid81` text NOT NULL,
  `Q82` int(255) NOT NULL,
  `Qid82` text NOT NULL,
  `Q83` int(255) NOT NULL,
  `Qid83` text NOT NULL,
  `Q84` int(255) NOT NULL,
  `Qid84` text NOT NULL,
  `Q85` int(255) NOT NULL,
  `Qid85` text NOT NULL,
  `Q86` int(255) NOT NULL,
  `Qid86` text NOT NULL,
  `Q87` int(255) NOT NULL,
  `Qid87` text NOT NULL,
  `Q88` int(255) NOT NULL,
  `Qid88` text NOT NULL,
  `Q89` int(255) NOT NULL,
  `Qid89` text NOT NULL,
  `Q90` int(255) NOT NULL,
  `Qid90` text NOT NULL,
  `Q91` int(255) NOT NULL,
  `Qid91` text NOT NULL,
  `Q92` int(255) NOT NULL,
  `Qid92` text NOT NULL,
  `Q93` int(255) NOT NULL,
  `Qid93` text NOT NULL,
  `Q94` int(255) NOT NULL,
  `Qid94` text NOT NULL,
  `Q95` int(255) NOT NULL,
  `Qid95` text NOT NULL,
  `Q96` int(255) NOT NULL,
  `Qid96` text NOT NULL,
  `Q97` int(255) NOT NULL,
  `Qid97` text NOT NULL,
  `Q98` int(255) NOT NULL,
  `Qid98` text NOT NULL,
  `Q99` int(255) NOT NULL,
  `Qid99` text NOT NULL,
  `Q100` int(255) NOT NULL,
  `Qid100` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ft_answer_sheet`
--

INSERT INTO `ft_answer_sheet` (`A_id`, `subject`, `paper_type`, `course_code`, `teacher`, `teacher_token`, `class`, `duration`, `session`, `username`, `fullname`, `adm_no`, `CA1`, `CA2`, `CA3`, `test`, `obj_score`, `essay_score`, `exam_total`, `total`, `grade`, `remark`, `color`, `status`, `Q1`, `Qid1`, `Q2`, `Qid2`, `Q3`, `Qid3`, `Q4`, `Qid4`, `Q5`, `Qid5`, `Q6`, `Qid6`, `Q7`, `Qid7`, `Q8`, `Qid8`, `Q9`, `Qid9`, `Q10`, `Qid10`, `Q11`, `Qid11`, `Q12`, `Qid12`, `Q13`, `Qid13`, `Q14`, `Qid14`, `Q15`, `Qid15`, `Q16`, `Qid16`, `Q17`, `Qid17`, `Q18`, `Qid18`, `Q19`, `Qid19`, `Q20`, `Qid20`, `Q21`, `Qid21`, `Q22`, `Qid22`, `Q23`, `Qid23`, `Q24`, `Qid24`, `Q25`, `Qid25`, `Q26`, `Qid26`, `Q27`, `Qid27`, `Q28`, `Qid28`, `Q29`, `Qid29`, `Q30`, `Qid30`, `Q31`, `Qid31`, `Q32`, `Qid32`, `Q33`, `Qid33`, `Q34`, `Qid34`, `Q35`, `Qid35`, `Q36`, `Qid36`, `Q37`, `Qid37`, `Q38`, `Qid38`, `Q39`, `Qid39`, `Q40`, `Qid40`, `Q41`, `Qid41`, `Q42`, `Qid42`, `Q43`, `Qid43`, `Q44`, `Qid44`, `Q45`, `Qid45`, `Q46`, `Qid46`, `Q47`, `Qid47`, `Q48`, `Qid48`, `Q49`, `Qid49`, `Q50`, `Qid50`, `Q51`, `Qid51`, `Q52`, `Qid52`, `Q53`, `Qid53`, `Q54`, `Qid54`, `Q55`, `Qid55`, `Q56`, `Qid56`, `Q57`, `Qid57`, `Q58`, `Qid58`, `Q59`, `Qid59`, `Q60`, `Qid60`, `Q61`, `Qid61`, `Q62`, `Qid62`, `Q63`, `Qid63`, `Q64`, `Qid64`, `Q65`, `Qid65`, `Q66`, `Qid66`, `Q67`, `Qid67`, `Q68`, `Qid68`, `Q69`, `Qid69`, `Q70`, `Qid70`, `Q71`, `Qid71`, `Q72`, `Qid72`, `Q73`, `Qid73`, `Q74`, `Qid74`, `Q75`, `Qid75`, `Q76`, `Qid76`, `Q77`, `Qid77`, `Q78`, `Qid78`, `Q79`, `Qid79`, `Q80`, `Qid80`, `Q81`, `Qid81`, `Q82`, `Qid82`, `Q83`, `Qid83`, `Q84`, `Qid84`, `Q85`, `Qid85`, `Q86`, `Qid86`, `Q87`, `Qid87`, `Q88`, `Qid88`, `Q89`, `Qid89`, `Q90`, `Qid90`, `Q91`, `Qid91`, `Q92`, `Qid92`, `Q93`, `Qid93`, `Q94`, `Qid94`, `Q95`, `Qid95`, `Q96`, `Qid96`, `Q97`, `Qid97`, `Q98`, `Qid98`, `Q99`, `Qid99`, `Q100`, `Qid100`) VALUES
(1, 'English Language', 'Type A', 'ENG401', 'Mrs. Folakemi', '3b4439366d25394e2f391e52ed10fa5f', 'SSS-1', 7, '2021/2022', 'JayJ', 'Joshua Jegede', 'E261652686357', 10, 10, 8, 28, 2, 33, 35, 63, 'B2', 'Good', 'LightSeaGreen', 'UNDONE', 0, 'B', 0, '', 0, '', 0, '', 0, 'C', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, ''),
(5, 'English Language', 'Type B', 'ENG401', 'Mrs. Folakemi', '3b4439366d25394e2f391e52ed10fa5f', 'SSS-1', 6, '2021/2022', 'Adore', 'Adore Joyce', '688408', 9, 8, 10, 27, 10, 35, 43, 70, 'A', 'Good', 'Lime', 'DONE', 1, 'D', 1, 'B', 1, 'A', 1, 'A', 1, 'A', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, ''),
(9, 'English Language', 'Type C', 'ENG401', 'Mrs. Folakemi', '3b4439366d25394e2f391e52ed10fa5f', 'SSS-1', 6, '2020/2021', 'Adore', 'Adore Joyce', '688408', 10, 9, 9, 28, 10, 40, 50, 78, 'A', 'V.Good', 'LimeGreen', 'DONE', 1, 'D', 1, 'B', 1, 'A', 1, 'A', 1, 'A', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `ft_answer_type_a`
--

CREATE TABLE `ft_answer_type_a` (
  `id` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `user_token` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `course_code` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `question_number` int(11) NOT NULL,
  `is_correct` int(11) NOT NULL,
  `alpha_opt` varchar(255) NOT NULL,
  `text` varchar(1000) NOT NULL,
  `quest_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ft_answer_type_a`
--

INSERT INTO `ft_answer_type_a` (`id`, `session`, `user_token`, `subject`, `course_code`, `class`, `question_number`, `is_correct`, `alpha_opt`, `text`, `quest_code`) VALUES
(170, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG401', 'SSS-1', 1, 1, 'A', 'Yellow', 'ID1'),
(171, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG401', 'SSS-1', 1, 0, 'B', 'Yelow', 'ID1'),
(172, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG401', 'SSS-1', 1, 0, 'C', 'Yeallow', 'ID1'),
(173, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG401', 'SSS-1', 2, 1, 'A', 'Conclusion', 'ID2'),
(174, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG401', 'SSS-1', 2, 0, 'B', 'Conclussion', 'ID2'),
(175, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG401', 'SSS-1', 2, 0, 'C', 'Konclusion', 'ID2'),
(176, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG401', 'SSS-1', 2, 0, 'D', 'Cunclusion', 'ID2'),
(177, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG401', 'SSS-1', 3, 1, 'A', 'water', 'ID3'),
(178, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG401', 'SSS-1', 3, 0, 'B', 'waters', 'ID3'),
(179, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG401', 'SSS-1', 3, 0, 'C', 'watering', 'ID3'),
(180, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG401', 'SSS-1', 4, 0, 'A', 'foods', 'ID4'),
(181, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG401', 'SSS-1', 4, 1, 'B', 'food', 'ID4'),
(182, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG401', 'SSS-1', 4, 0, 'C', 'All of the above', 'ID4'),
(183, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG401', 'SSS-1', 4, 0, 'D', 'None of the above', 'ID4'),
(184, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG401', 'SSS-1', 5, 0, 'A', 'loaf of bread', 'ID5'),
(185, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG401', 'SSS-1', 5, 0, 'B', 'loafs of breads', 'ID5'),
(186, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG401', 'SSS-1', 5, 0, 'C', 'loave of bread', 'ID5'),
(187, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG401', 'SSS-1', 5, 1, 'D', 'loaves of bread', 'ID5');

-- --------------------------------------------------------

--
-- Table structure for table `ft_answer_type_b`
--

CREATE TABLE `ft_answer_type_b` (
  `id` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `user_token` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `course_code` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `question_number` int(11) NOT NULL,
  `is_correct` int(11) NOT NULL,
  `alpha_opt` varchar(255) NOT NULL,
  `text` varchar(1000) NOT NULL,
  `quest_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ft_answer_type_b`
--

INSERT INTO `ft_answer_type_b` (`id`, `session`, `user_token`, `subject`, `course_code`, `class`, `question_number`, `is_correct`, `alpha_opt`, `text`, `quest_code`) VALUES
(170, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG401', 'SSS-1', 3, 1, 'A', 'Yellow', 'ID1'),
(171, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG401', 'SSS-1', 3, 0, 'B', 'Yelow', 'ID1'),
(172, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG401', 'SSS-1', 3, 0, 'C', 'Yeallow', 'ID1'),
(173, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG401', 'SSS-1', 4, 1, 'A', 'Conclusion', 'ID2'),
(174, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG401', 'SSS-1', 4, 0, 'B', 'Conclussion', 'ID2'),
(175, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG401', 'SSS-1', 4, 0, 'C', 'Konclusion', 'ID2'),
(176, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG401', 'SSS-1', 4, 0, 'D', 'Cunclusion', 'ID2'),
(177, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG401', 'SSS-1', 5, 1, 'A', 'water', 'ID3'),
(178, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG401', 'SSS-1', 5, 0, 'B', 'waters', 'ID3'),
(179, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG401', 'SSS-1', 5, 0, 'C', 'watering', 'ID3'),
(180, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG401', 'SSS-1', 1, 0, 'A', 'foods', 'ID4'),
(181, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG401', 'SSS-1', 1, 1, 'B', 'food', 'ID4'),
(182, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG401', 'SSS-1', 1, 0, 'C', 'All of the above', 'ID4'),
(183, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG401', 'SSS-1', 1, 0, 'D', 'None of the above', 'ID4'),
(184, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG401', 'SSS-1', 2, 0, 'A', 'loaf of bread', 'ID5'),
(185, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG401', 'SSS-1', 2, 0, 'B', 'loafs of breads', 'ID5'),
(186, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG401', 'SSS-1', 2, 0, 'C', 'loave of bread', 'ID5'),
(187, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG401', 'SSS-1', 2, 1, 'D', 'loaves of bread', 'ID5');

-- --------------------------------------------------------

--
-- Table structure for table `ft_answer_type_c`
--

CREATE TABLE `ft_answer_type_c` (
  `id` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `user_token` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `course_code` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `question_number` int(11) NOT NULL,
  `is_correct` int(11) NOT NULL,
  `alpha_opt` varchar(255) NOT NULL,
  `text` varchar(1000) NOT NULL,
  `quest_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ft_answer_type_c`
--

INSERT INTO `ft_answer_type_c` (`id`, `session`, `user_token`, `subject`, `course_code`, `class`, `question_number`, `is_correct`, `alpha_opt`, `text`, `quest_code`) VALUES
(170, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG401', 'SSS-1', 5, 1, 'A', 'Yellow', 'ID1'),
(171, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG401', 'SSS-1', 5, 0, 'B', 'Yelow', 'ID1'),
(172, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG401', 'SSS-1', 5, 0, 'C', 'Yeallow', 'ID1'),
(173, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG401', 'SSS-1', 4, 1, 'A', 'Conclusion', 'ID2'),
(174, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG401', 'SSS-1', 4, 0, 'B', 'Conclussion', 'ID2'),
(175, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG401', 'SSS-1', 4, 0, 'C', 'Konclusion', 'ID2'),
(176, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG401', 'SSS-1', 4, 0, 'D', 'Cunclusion', 'ID2'),
(177, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG401', 'SSS-1', 3, 1, 'A', 'water', 'ID3'),
(178, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG401', 'SSS-1', 3, 0, 'B', 'waters', 'ID3'),
(179, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG401', 'SSS-1', 3, 0, 'C', 'watering', 'ID3'),
(180, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG401', 'SSS-1', 2, 0, 'A', 'foods', 'ID4'),
(181, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG401', 'SSS-1', 2, 1, 'B', 'food', 'ID4'),
(182, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG401', 'SSS-1', 2, 0, 'C', 'All of the above', 'ID4'),
(183, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG401', 'SSS-1', 2, 0, 'D', 'None of the above', 'ID4'),
(184, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG401', 'SSS-1', 1, 0, 'A', 'loaf of bread', 'ID5'),
(185, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG401', 'SSS-1', 1, 0, 'B', 'loafs of breads', 'ID5'),
(186, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG401', 'SSS-1', 1, 0, 'C', 'loave of bread', 'ID5'),
(187, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG401', 'SSS-1', 1, 1, 'D', 'loaves of bread', 'ID5');

-- --------------------------------------------------------

--
-- Table structure for table `ft_exam_type_a`
--

CREATE TABLE `ft_exam_type_a` (
  `Q_id` int(11) NOT NULL,
  `user_token` varchar(255) NOT NULL,
  `session` varchar(255) NOT NULL,
  `subject` varchar(1000) NOT NULL,
  `course_code` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `question_number` int(255) NOT NULL,
  `text` text NOT NULL,
  `quest_code` varchar(255) NOT NULL,
  `quest_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ft_exam_type_a`
--

INSERT INTO `ft_exam_type_a` (`Q_id`, `user_token`, `session`, `subject`, `course_code`, `class`, `question_number`, `text`, `quest_code`, `quest_img`) VALUES
(41, '3b4439366d25394e2f391e52ed10fa5f', '2020/2021', 'English Language', 'ENG401', 'SSS-1', 1, 'I love _____ as my favorite colour', 'ID1', ''),
(42, '3b4439366d25394e2f391e52ed10fa5f', '2020/2021', 'English Language', 'ENG401', 'SSS-1', 2, 'Which of these has the right spelling?', 'ID2', ''),
(43, '3b4439366d25394e2f391e52ed10fa5f', '2020/2021', 'English Language', 'ENG401', 'SSS-1', 3, 'Audi found some _____ in the buckets.', 'ID3', ''),
(44, '3b4439366d25394e2f391e52ed10fa5f', '2020/2021', 'English Language', 'ENG401', 'SSS-1', 4, 'The child has eaten a lot of ______', 'ID4', ''),
(45, '3b4439366d25394e2f391e52ed10fa5f', '2020/2021', 'English Language', 'ENG401', 'SSS-1', 5, 'Plural representation of \'loaf of bread\' is ______', 'ID5', '');

-- --------------------------------------------------------

--
-- Table structure for table `ft_exam_type_b`
--

CREATE TABLE `ft_exam_type_b` (
  `Q_id` int(11) NOT NULL,
  `user_token` varchar(255) NOT NULL,
  `session` varchar(255) NOT NULL,
  `subject` varchar(1000) NOT NULL,
  `course_code` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `question_number` int(255) NOT NULL,
  `text` text NOT NULL,
  `quest_code` varchar(255) NOT NULL,
  `quest_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ft_exam_type_b`
--

INSERT INTO `ft_exam_type_b` (`Q_id`, `user_token`, `session`, `subject`, `course_code`, `class`, `question_number`, `text`, `quest_code`, `quest_img`) VALUES
(41, '3b4439366d25394e2f391e52ed10fa5f', '2020/2021', 'English Language', 'ENG401', 'SSS-1', 3, 'I love _____ as my favorite colour', 'ID1', ''),
(42, '3b4439366d25394e2f391e52ed10fa5f', '2020/2021', 'English Language', 'ENG401', 'SSS-1', 4, 'Which of these has the right spelling?', 'ID2', ''),
(43, '3b4439366d25394e2f391e52ed10fa5f', '2020/2021', 'English Language', 'ENG401', 'SSS-1', 5, 'Audi found some _____ in the buckets.', 'ID3', ''),
(44, '3b4439366d25394e2f391e52ed10fa5f', '2020/2021', 'English Language', 'ENG401', 'SSS-1', 1, 'The child has eaten a lot of ______', 'ID4', ''),
(45, '3b4439366d25394e2f391e52ed10fa5f', '2020/2021', 'English Language', 'ENG401', 'SSS-1', 2, 'Plural representation of \'loaf of bread\' is ______', 'ID5', '');

-- --------------------------------------------------------

--
-- Table structure for table `ft_exam_type_c`
--

CREATE TABLE `ft_exam_type_c` (
  `Q_id` int(11) NOT NULL,
  `user_token` varchar(255) NOT NULL,
  `session` varchar(255) NOT NULL,
  `subject` varchar(1000) NOT NULL,
  `course_code` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `question_number` int(255) NOT NULL,
  `text` text NOT NULL,
  `quest_code` varchar(255) NOT NULL,
  `quest_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ft_exam_type_c`
--

INSERT INTO `ft_exam_type_c` (`Q_id`, `user_token`, `session`, `subject`, `course_code`, `class`, `question_number`, `text`, `quest_code`, `quest_img`) VALUES
(41, '3b4439366d25394e2f391e52ed10fa5f', '2020/2021', 'English Language', 'ENG401', 'SSS-1', 5, 'I love _____ as my favorite colour', 'ID1', ''),
(42, '3b4439366d25394e2f391e52ed10fa5f', '2020/2021', 'English Language', 'ENG401', 'SSS-1', 4, 'Which of these has the right spelling?', 'ID2', ''),
(43, '3b4439366d25394e2f391e52ed10fa5f', '2020/2021', 'English Language', 'ENG401', 'SSS-1', 3, 'Audi found some _____ in the buckets.', 'ID3', ''),
(44, '3b4439366d25394e2f391e52ed10fa5f', '2020/2021', 'English Language', 'ENG401', 'SSS-1', 2, 'The child has eaten a lot of ______', 'ID4', ''),
(45, '3b4439366d25394e2f391e52ed10fa5f', '2020/2021', 'English Language', 'ENG401', 'SSS-1', 1, 'Plural representation of \'loaf of bread\' is ______', 'ID5', '');

-- --------------------------------------------------------

--
-- Table structure for table `header_footer`
--

CREATE TABLE `header_footer` (
  `hf_id` int(11) NOT NULL,
  `header_col` varchar(255) NOT NULL,
  `footer_col` varchar(255) NOT NULL,
  `header_txt_col` varchar(255) NOT NULL,
  `footer_txt_col` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `header_footer`
--

INSERT INTO `header_footer` (`hf_id`, `header_col`, `footer_col`, `header_txt_col`, `footer_txt_col`) VALUES
(2, '#8b008b', '#8b008b', '#ffffff', '#ffffff'),
(3, '#0c2b4b', '#0c2b4b', '#ffffff', '#ffffff');

-- --------------------------------------------------------

--
-- Table structure for table `instruction_tbl`
--

CREATE TABLE `instruction_tbl` (
  `id` int(11) NOT NULL,
  `instruction1` mediumtext NOT NULL,
  `instruction2` mediumtext NOT NULL,
  `instruction3` mediumtext NOT NULL,
  `instruction4` mediumtext NOT NULL,
  `instruction5` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instruction_tbl`
--

INSERT INTO `instruction_tbl` (`id`, `instruction1`, `instruction2`, `instruction3`, `instruction4`, `instruction5`) VALUES
(1, '1. Do not shutdown the computer system for any reason.', '2. Do not carry out examination malpractice.', '3. Avoid side talk. You shouldn\'t be caught talking to your neighbour.', '4. choose your answer and click on the select button to move to the next question.', '5. If you are done with your exam, click on the submit button to submit your answers');

-- --------------------------------------------------------

--
-- Table structure for table `result_checker`
--

CREATE TABLE `result_checker` (
  `id` int(11) NOT NULL,
  `fullname` varchar(225) NOT NULL,
  `adm_no` varchar(225) NOT NULL,
  `term` varchar(255) NOT NULL,
  `session` varchar(225) NOT NULL,
  `code` varchar(225) NOT NULL,
  `validity` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result_checker`
--

INSERT INTO `result_checker` (`id`, `fullname`, `adm_no`, `term`, `session`, `code`, `validity`) VALUES
(1, 'Adore Joyce', '688408', 'First Term', '2021/2022', '21F909745', ''),
(2, 'Adore Joyce', '688408', 'Second Term', '2021/2022', '21S176853', '');

-- --------------------------------------------------------

--
-- Table structure for table `school_details`
--

CREATE TABLE `school_details` (
  `id` int(11) NOT NULL,
  `sch_phone` varchar(100) NOT NULL,
  `sch_phone2` varchar(100) NOT NULL,
  `sch_email` varchar(100) NOT NULL,
  `sch_facebook` varchar(1000) NOT NULL,
  `sch_whatsapp` varchar(1000) NOT NULL,
  `sch_twitter` varchar(1000) NOT NULL,
  `sch_instagram` varchar(1000) NOT NULL,
  `sch_name` varchar(255) NOT NULL,
  `sch_name2` varchar(100) NOT NULL,
  `sch_address` varchar(255) NOT NULL,
  `sch_logo` varchar(255) NOT NULL,
  `header_col` varchar(255) NOT NULL,
  `header_txt_col` varchar(255) NOT NULL,
  `term` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school_details`
--

INSERT INTO `school_details` (`id`, `sch_phone`, `sch_phone2`, `sch_email`, `sch_facebook`, `sch_whatsapp`, `sch_twitter`, `sch_instagram`, `sch_name`, `sch_name2`, `sch_address`, `sch_logo`, `header_col`, `header_txt_col`, `term`) VALUES
(1, '07069056472', '7034876144', 'ekreat2016@gmail.com', 'https://facebook.com', 'https://wa.me/+2348061284140', 'https://twitter.com', 'https://instagram.com', 'EKREAT SCHOOLS', 'Success gateway', '16, Orire lane Adebayo, Ado-Ekiti. Ekiti State', 'eksu logo.png', '#bef9e7', '#0d0c0c', '');

-- --------------------------------------------------------

--
-- Table structure for table `school_logo`
--

CREATE TABLE `school_logo` (
  `logo_id` int(11) NOT NULL,
  `logo_width` varchar(255) NOT NULL,
  `logo_height` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school_logo`
--

INSERT INTO `school_logo` (`logo_id`, `logo_width`, `logo_height`, `image`) VALUES
(2, '280', '160', 'upload2/IMG-20210318-WA0008.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `school_term`
--

CREATE TABLE `school_term` (
  `session` varchar(255) NOT NULL,
  `sch_term` varchar(100) NOT NULL,
  `code` varchar(100) NOT NULL,
  `T_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school_term`
--

INSERT INTO `school_term` (`session`, `sch_term`, `code`, `T_id`) VALUES
('2021/2022', 'First Term', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sch_session`
--

CREATE TABLE `sch_session` (
  `id` int(11) NOT NULL,
  `session` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sch_session`
--

INSERT INTO `sch_session` (`id`, `session`) VALUES
(2, '2019/2020'),
(3, '2020/2021'),
(4, '2021/2022'),
(5, '2022/2023');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `reg_date` varchar(100) NOT NULL,
  `session` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `class` varchar(100) NOT NULL,
  `adm_no` varchar(255) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `p_image` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `keyp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `reg_date`, `session`, `fullname`, `class`, `adm_no`, `gender`, `phone`, `username`, `email`, `p_image`, `password`, `keyp`) VALUES
(130, '02/06/22', '2021/2022', 'Adore Joyce', 'SSS-1', '688408', 'Male', '07034876144', 'Adore', 'adore@gmail.com', 'profile_images/car.jpeg', '$2y$10$gPnbZDue.pjw.f2OtsevWeGa/rUNLNeip72WFqk2ogFqpUxE34Wei', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `st_answer_sheet`
--

CREATE TABLE `st_answer_sheet` (
  `A_id` int(11) NOT NULL,
  `subject` mediumtext NOT NULL,
  `paper_type` text NOT NULL,
  `course_code` varchar(255) NOT NULL,
  `teacher` varchar(255) NOT NULL,
  `teacher_token` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `duration` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `adm_no` varchar(255) NOT NULL,
  `ft_score` int(11) NOT NULL,
  `CA1` int(11) NOT NULL,
  `CA2` int(11) NOT NULL,
  `CA3` int(11) NOT NULL,
  `test` int(11) NOT NULL,
  `obj_score` int(11) NOT NULL,
  `essay_score` int(11) NOT NULL,
  `exam_total` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `grade` text NOT NULL,
  `remark` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `Q1` int(255) NOT NULL,
  `Qid1` text NOT NULL,
  `Q2` int(255) NOT NULL,
  `Qid2` text NOT NULL,
  `Q3` int(255) NOT NULL,
  `Qid3` text NOT NULL,
  `Q4` int(255) NOT NULL,
  `Qid4` text NOT NULL,
  `Q5` int(255) NOT NULL,
  `Qid5` text NOT NULL,
  `Q6` int(255) NOT NULL,
  `Qid6` text NOT NULL,
  `Q7` int(255) NOT NULL,
  `Qid7` text NOT NULL,
  `Q8` int(255) NOT NULL,
  `Qid8` text NOT NULL,
  `Q9` int(255) NOT NULL,
  `Qid9` text NOT NULL,
  `Q10` int(255) NOT NULL,
  `Qid10` text NOT NULL,
  `Q11` int(255) NOT NULL,
  `Qid11` text NOT NULL,
  `Q12` int(255) NOT NULL,
  `Qid12` text NOT NULL,
  `Q13` int(255) NOT NULL,
  `Qid13` text NOT NULL,
  `Q14` int(255) NOT NULL,
  `Qid14` text NOT NULL,
  `Q15` int(255) NOT NULL,
  `Qid15` text NOT NULL,
  `Q16` int(255) NOT NULL,
  `Qid16` text NOT NULL,
  `Q17` int(255) NOT NULL,
  `Qid17` text NOT NULL,
  `Q18` int(255) NOT NULL,
  `Qid18` text NOT NULL,
  `Q19` int(255) NOT NULL,
  `Qid19` text NOT NULL,
  `Q20` int(255) NOT NULL,
  `Qid20` text NOT NULL,
  `Q21` int(255) NOT NULL,
  `Qid21` text NOT NULL,
  `Q22` int(255) NOT NULL,
  `Qid22` text NOT NULL,
  `Q23` int(255) NOT NULL,
  `Qid23` text NOT NULL,
  `Q24` int(255) NOT NULL,
  `Qid24` text NOT NULL,
  `Q25` int(255) NOT NULL,
  `Qid25` text NOT NULL,
  `Q26` int(255) NOT NULL,
  `Qid26` text NOT NULL,
  `Q27` int(255) NOT NULL,
  `Qid27` text NOT NULL,
  `Q28` int(255) NOT NULL,
  `Qid28` text NOT NULL,
  `Q29` int(255) NOT NULL,
  `Qid29` text NOT NULL,
  `Q30` int(255) NOT NULL,
  `Qid30` text NOT NULL,
  `Q31` int(255) NOT NULL,
  `Qid31` text NOT NULL,
  `Q32` int(255) NOT NULL,
  `Qid32` text NOT NULL,
  `Q33` int(255) NOT NULL,
  `Qid33` text NOT NULL,
  `Q34` int(255) NOT NULL,
  `Qid34` text NOT NULL,
  `Q35` int(255) NOT NULL,
  `Qid35` text NOT NULL,
  `Q36` int(255) NOT NULL,
  `Qid36` text NOT NULL,
  `Q37` int(255) NOT NULL,
  `Qid37` text NOT NULL,
  `Q38` int(255) NOT NULL,
  `Qid38` text NOT NULL,
  `Q39` int(255) NOT NULL,
  `Qid39` text NOT NULL,
  `Q40` int(255) NOT NULL,
  `Qid40` text NOT NULL,
  `Q41` int(255) NOT NULL,
  `Qid41` text NOT NULL,
  `Q42` int(255) NOT NULL,
  `Qid42` text NOT NULL,
  `Q43` int(255) NOT NULL,
  `Qid43` text NOT NULL,
  `Q44` int(255) NOT NULL,
  `Qid44` text NOT NULL,
  `Q45` int(255) NOT NULL,
  `Qid45` text NOT NULL,
  `Q46` int(255) NOT NULL,
  `Qid46` text NOT NULL,
  `Q47` int(255) NOT NULL,
  `Qid47` text NOT NULL,
  `Q48` int(255) NOT NULL,
  `Qid48` text NOT NULL,
  `Q49` int(255) NOT NULL,
  `Qid49` text NOT NULL,
  `Q50` int(255) NOT NULL,
  `Qid50` text NOT NULL,
  `Q51` int(255) NOT NULL,
  `Qid51` text NOT NULL,
  `Q52` int(255) NOT NULL,
  `Qid52` text NOT NULL,
  `Q53` int(255) NOT NULL,
  `Qid53` text NOT NULL,
  `Q54` int(255) NOT NULL,
  `Qid54` text NOT NULL,
  `Q55` int(255) NOT NULL,
  `Qid55` text NOT NULL,
  `Q56` int(255) NOT NULL,
  `Qid56` text NOT NULL,
  `Q57` int(255) NOT NULL,
  `Qid57` text NOT NULL,
  `Q58` int(255) NOT NULL,
  `Qid58` text NOT NULL,
  `Q59` int(255) NOT NULL,
  `Qid59` text NOT NULL,
  `Q60` int(255) NOT NULL,
  `Qid60` text NOT NULL,
  `Q61` int(255) NOT NULL,
  `Qid61` text NOT NULL,
  `Q62` int(255) NOT NULL,
  `Qid62` text NOT NULL,
  `Q63` int(255) NOT NULL,
  `Qid63` text NOT NULL,
  `Q64` int(255) NOT NULL,
  `Qid64` text NOT NULL,
  `Q65` int(255) NOT NULL,
  `Qid65` text NOT NULL,
  `Q66` int(255) NOT NULL,
  `Qid66` text NOT NULL,
  `Q67` int(255) NOT NULL,
  `Qid67` text NOT NULL,
  `Q68` int(255) NOT NULL,
  `Qid68` text NOT NULL,
  `Q69` int(255) NOT NULL,
  `Qid69` text NOT NULL,
  `Q70` int(255) NOT NULL,
  `Qid70` text NOT NULL,
  `Q71` int(255) NOT NULL,
  `Qid71` text NOT NULL,
  `Q72` int(255) NOT NULL,
  `Qid72` text NOT NULL,
  `Q73` int(255) NOT NULL,
  `Qid73` text NOT NULL,
  `Q74` int(255) NOT NULL,
  `Qid74` text NOT NULL,
  `Q75` int(255) NOT NULL,
  `Qid75` text NOT NULL,
  `Q76` int(255) NOT NULL,
  `Qid76` text NOT NULL,
  `Q77` int(255) NOT NULL,
  `Qid77` text NOT NULL,
  `Q78` int(255) NOT NULL,
  `Qid78` text NOT NULL,
  `Q79` int(255) NOT NULL,
  `Qid79` text NOT NULL,
  `Q80` int(255) NOT NULL,
  `Qid80` text NOT NULL,
  `Q81` int(255) NOT NULL,
  `Qid81` text NOT NULL,
  `Q82` int(255) NOT NULL,
  `Qid82` text NOT NULL,
  `Q83` int(255) NOT NULL,
  `Qid83` text NOT NULL,
  `Q84` int(255) NOT NULL,
  `Qid84` text NOT NULL,
  `Q85` int(255) NOT NULL,
  `Qid85` text NOT NULL,
  `Q86` int(255) NOT NULL,
  `Qid86` text NOT NULL,
  `Q87` int(255) NOT NULL,
  `Qid87` text NOT NULL,
  `Q88` int(255) NOT NULL,
  `Qid88` text NOT NULL,
  `Q89` int(255) NOT NULL,
  `Qid89` text NOT NULL,
  `Q90` int(255) NOT NULL,
  `Qid90` text NOT NULL,
  `Q91` int(255) NOT NULL,
  `Qid91` text NOT NULL,
  `Q92` int(255) NOT NULL,
  `Qid92` text NOT NULL,
  `Q93` int(255) NOT NULL,
  `Qid93` text NOT NULL,
  `Q94` int(255) NOT NULL,
  `Qid94` text NOT NULL,
  `Q95` int(255) NOT NULL,
  `Qid95` text NOT NULL,
  `Q96` int(255) NOT NULL,
  `Qid96` text NOT NULL,
  `Q97` int(255) NOT NULL,
  `Qid97` text NOT NULL,
  `Q98` int(255) NOT NULL,
  `Qid98` text NOT NULL,
  `Q99` int(255) NOT NULL,
  `Qid99` text NOT NULL,
  `Q100` int(255) NOT NULL,
  `Qid100` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `st_answer_sheet`
--

INSERT INTO `st_answer_sheet` (`A_id`, `subject`, `paper_type`, `course_code`, `teacher`, `teacher_token`, `class`, `duration`, `session`, `username`, `fullname`, `adm_no`, `ft_score`, `CA1`, `CA2`, `CA3`, `test`, `obj_score`, `essay_score`, `exam_total`, `total`, `grade`, `remark`, `color`, `status`, `Q1`, `Qid1`, `Q2`, `Qid2`, `Q3`, `Qid3`, `Q4`, `Qid4`, `Q5`, `Qid5`, `Q6`, `Qid6`, `Q7`, `Qid7`, `Q8`, `Qid8`, `Q9`, `Qid9`, `Q10`, `Qid10`, `Q11`, `Qid11`, `Q12`, `Qid12`, `Q13`, `Qid13`, `Q14`, `Qid14`, `Q15`, `Qid15`, `Q16`, `Qid16`, `Q17`, `Qid17`, `Q18`, `Qid18`, `Q19`, `Qid19`, `Q20`, `Qid20`, `Q21`, `Qid21`, `Q22`, `Qid22`, `Q23`, `Qid23`, `Q24`, `Qid24`, `Q25`, `Qid25`, `Q26`, `Qid26`, `Q27`, `Qid27`, `Q28`, `Qid28`, `Q29`, `Qid29`, `Q30`, `Qid30`, `Q31`, `Qid31`, `Q32`, `Qid32`, `Q33`, `Qid33`, `Q34`, `Qid34`, `Q35`, `Qid35`, `Q36`, `Qid36`, `Q37`, `Qid37`, `Q38`, `Qid38`, `Q39`, `Qid39`, `Q40`, `Qid40`, `Q41`, `Qid41`, `Q42`, `Qid42`, `Q43`, `Qid43`, `Q44`, `Qid44`, `Q45`, `Qid45`, `Q46`, `Qid46`, `Q47`, `Qid47`, `Q48`, `Qid48`, `Q49`, `Qid49`, `Q50`, `Qid50`, `Q51`, `Qid51`, `Q52`, `Qid52`, `Q53`, `Qid53`, `Q54`, `Qid54`, `Q55`, `Qid55`, `Q56`, `Qid56`, `Q57`, `Qid57`, `Q58`, `Qid58`, `Q59`, `Qid59`, `Q60`, `Qid60`, `Q61`, `Qid61`, `Q62`, `Qid62`, `Q63`, `Qid63`, `Q64`, `Qid64`, `Q65`, `Qid65`, `Q66`, `Qid66`, `Q67`, `Qid67`, `Q68`, `Qid68`, `Q69`, `Qid69`, `Q70`, `Qid70`, `Q71`, `Qid71`, `Q72`, `Qid72`, `Q73`, `Qid73`, `Q74`, `Qid74`, `Q75`, `Qid75`, `Q76`, `Qid76`, `Q77`, `Qid77`, `Q78`, `Qid78`, `Q79`, `Qid79`, `Q80`, `Qid80`, `Q81`, `Qid81`, `Q82`, `Qid82`, `Q83`, `Qid83`, `Q84`, `Qid84`, `Q85`, `Qid85`, `Q86`, `Qid86`, `Q87`, `Qid87`, `Q88`, `Qid88`, `Q89`, `Qid89`, `Q90`, `Qid90`, `Q91`, `Qid91`, `Q92`, `Qid92`, `Q93`, `Qid93`, `Q94`, `Qid94`, `Q95`, `Qid95`, `Q96`, `Qid96`, `Q97`, `Qid97`, `Q98`, `Qid98`, `Q99`, `Qid99`, `Q100`, `Qid100`) VALUES
(2, 'English Language', 'Type A', 'ENG402', 'Mrs. Folakemi', '3b4439366d25394e2f391e52ed10fa5f', 'SSS-1', 10, '2020/2021', 'Adore', 'Adore Joyce', '688408', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 'UNDONE', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `st_answer_type_a`
--

CREATE TABLE `st_answer_type_a` (
  `id` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `user_token` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `course_code` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `question_number` int(11) NOT NULL,
  `is_correct` int(11) NOT NULL,
  `alpha_opt` varchar(255) NOT NULL,
  `text` varchar(1000) NOT NULL,
  `quest_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `st_answer_type_a`
--

INSERT INTO `st_answer_type_a` (`id`, `session`, `user_token`, `subject`, `course_code`, `class`, `question_number`, `is_correct`, `alpha_opt`, `text`, `quest_code`) VALUES
(1, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG402', 'SSS-1', 1, 1, 'A', 'Yellow', 'ID1'),
(2, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG402', 'SSS-1', 1, 0, 'B', 'Yelow', 'ID1'),
(3, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG402', 'SSS-1', 1, 0, 'C', 'Yeallow', 'ID1'),
(4, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG402', 'SSS-1', 2, 1, 'A', 'Conclusion', 'ID2'),
(5, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG402', 'SSS-1', 2, 0, 'B', 'Conclussion', 'ID2'),
(6, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG402', 'SSS-1', 2, 0, 'C', 'Konclusion', 'ID2'),
(7, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG402', 'SSS-1', 2, 0, 'D', 'Cunclusion', 'ID2'),
(8, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG402', 'SSS-1', 3, 1, 'A', 'water', 'ID3'),
(9, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG402', 'SSS-1', 3, 0, 'B', 'waters', 'ID3'),
(10, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG402', 'SSS-1', 3, 0, 'C', 'watering', 'ID3'),
(11, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG402', 'SSS-1', 4, 0, 'A', 'foods', 'ID4'),
(12, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG402', 'SSS-1', 4, 1, 'B', 'food', 'ID4'),
(13, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG402', 'SSS-1', 4, 0, 'C', 'All of the above', 'ID4'),
(14, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG402', 'SSS-1', 4, 0, 'D', 'None of the above', 'ID4'),
(15, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG402', 'SSS-1', 5, 0, 'A', 'loaf of bread', 'ID5'),
(16, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG402', 'SSS-1', 5, 0, 'B', 'loafs of breads', 'ID5'),
(17, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG402', 'SSS-1', 5, 0, 'C', 'loave of bread', 'ID5'),
(18, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG402', 'SSS-1', 5, 1, 'D', 'loaves of bread', 'ID5');

-- --------------------------------------------------------

--
-- Table structure for table `st_answer_type_b`
--

CREATE TABLE `st_answer_type_b` (
  `id` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `user_token` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `course_code` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `question_number` int(11) NOT NULL,
  `is_correct` int(11) NOT NULL,
  `alpha_opt` varchar(255) NOT NULL,
  `text` varchar(1000) NOT NULL,
  `quest_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `st_answer_type_b`
--

INSERT INTO `st_answer_type_b` (`id`, `session`, `user_token`, `subject`, `course_code`, `class`, `question_number`, `is_correct`, `alpha_opt`, `text`, `quest_code`) VALUES
(1, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG402', 'SSS-1', 3, 1, 'A', 'Yellow', 'ID1'),
(2, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG402', 'SSS-1', 3, 0, 'B', 'Yelow', 'ID1'),
(3, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG402', 'SSS-1', 3, 0, 'C', 'Yeallow', 'ID1'),
(4, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG402', 'SSS-1', 4, 1, 'A', 'Conclusion', 'ID2'),
(5, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG402', 'SSS-1', 4, 0, 'B', 'Conclussion', 'ID2'),
(6, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG402', 'SSS-1', 4, 0, 'C', 'Konclusion', 'ID2'),
(7, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG402', 'SSS-1', 4, 0, 'D', 'Cunclusion', 'ID2'),
(8, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG402', 'SSS-1', 5, 1, 'A', 'water', 'ID3'),
(9, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG402', 'SSS-1', 5, 0, 'B', 'waters', 'ID3'),
(10, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG402', 'SSS-1', 5, 0, 'C', 'watering', 'ID3'),
(11, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG402', 'SSS-1', 1, 0, 'A', 'foods', 'ID4'),
(12, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG402', 'SSS-1', 1, 1, 'B', 'food', 'ID4'),
(13, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG402', 'SSS-1', 1, 0, 'C', 'All of the above', 'ID4'),
(14, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG402', 'SSS-1', 1, 0, 'D', 'None of the above', 'ID4'),
(15, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG402', 'SSS-1', 2, 0, 'A', 'loaf of bread', 'ID5'),
(16, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG402', 'SSS-1', 2, 0, 'B', 'loafs of breads', 'ID5'),
(17, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG402', 'SSS-1', 2, 0, 'C', 'loave of bread', 'ID5'),
(18, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG402', 'SSS-1', 2, 1, 'D', 'loaves of bread', 'ID5');

-- --------------------------------------------------------

--
-- Table structure for table `st_answer_type_c`
--

CREATE TABLE `st_answer_type_c` (
  `id` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `user_token` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `course_code` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `question_number` int(11) NOT NULL,
  `is_correct` int(11) NOT NULL,
  `alpha_opt` varchar(255) NOT NULL,
  `text` varchar(1000) NOT NULL,
  `quest_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `st_answer_type_c`
--

INSERT INTO `st_answer_type_c` (`id`, `session`, `user_token`, `subject`, `course_code`, `class`, `question_number`, `is_correct`, `alpha_opt`, `text`, `quest_code`) VALUES
(1, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG402', 'SSS-1', 5, 1, 'A', 'Yellow', 'ID1'),
(2, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG402', 'SSS-1', 5, 0, 'B', 'Yelow', 'ID1'),
(3, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG402', 'SSS-1', 5, 0, 'C', 'Yeallow', 'ID1'),
(4, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG402', 'SSS-1', 4, 1, 'A', 'Conclusion', 'ID2'),
(5, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG402', 'SSS-1', 4, 0, 'B', 'Conclussion', 'ID2'),
(6, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG402', 'SSS-1', 4, 0, 'C', 'Konclusion', 'ID2'),
(7, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG402', 'SSS-1', 4, 0, 'D', 'Cunclusion', 'ID2'),
(8, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG402', 'SSS-1', 3, 1, 'A', 'water', 'ID3'),
(9, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG402', 'SSS-1', 3, 0, 'B', 'waters', 'ID3'),
(10, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG402', 'SSS-1', 3, 0, 'C', 'watering', 'ID3'),
(11, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG402', 'SSS-1', 2, 0, 'A', 'foods', 'ID4'),
(12, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG402', 'SSS-1', 2, 1, 'B', 'food', 'ID4'),
(13, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG402', 'SSS-1', 2, 0, 'C', 'All of the above', 'ID4'),
(14, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG402', 'SSS-1', 2, 0, 'D', 'None of the above', 'ID4'),
(15, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG402', 'SSS-1', 1, 0, 'A', 'loaf of bread', 'ID5'),
(16, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG402', 'SSS-1', 1, 0, 'B', 'loafs of breads', 'ID5'),
(17, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG402', 'SSS-1', 1, 0, 'C', 'loave of bread', 'ID5'),
(18, '2020/2021', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG402', 'SSS-1', 1, 1, 'D', 'loaves of bread', 'ID5');

-- --------------------------------------------------------

--
-- Table structure for table `st_exam_type_a`
--

CREATE TABLE `st_exam_type_a` (
  `Q_id` int(11) NOT NULL,
  `user_token` varchar(255) NOT NULL,
  `session` varchar(255) NOT NULL,
  `subject` varchar(1000) NOT NULL,
  `course_code` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `question_number` int(255) NOT NULL,
  `text` text NOT NULL,
  `quest_code` varchar(255) NOT NULL,
  `quest_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `st_exam_type_a`
--

INSERT INTO `st_exam_type_a` (`Q_id`, `user_token`, `session`, `subject`, `course_code`, `class`, `question_number`, `text`, `quest_code`, `quest_img`) VALUES
(1, '3b4439366d25394e2f391e52ed10fa5f', '2020/2021', 'English Language', 'ENG402', 'SSS-1', 1, 'I love _____ as my favorite colour', 'ID1', ''),
(2, '3b4439366d25394e2f391e52ed10fa5f', '2020/2021', 'English Language', 'ENG402', 'SSS-1', 2, 'Which of these has the right spelling?', 'ID2', ''),
(3, '3b4439366d25394e2f391e52ed10fa5f', '2020/2021', 'English Language', 'ENG402', 'SSS-1', 3, '<p>Audi found some _____ in the buckets. What is going on?</p>\r\n', 'ID3', 'q_images/frame-906-3.png'),
(4, '3b4439366d25394e2f391e52ed10fa5f', '2020/2021', 'English Language', 'ENG402', 'SSS-1', 4, 'The child has eaten a lot of ______', 'ID4', ''),
(5, '3b4439366d25394e2f391e52ed10fa5f', '2020/2021', 'English Language', 'ENG402', 'SSS-1', 5, '<p>Plural representation of &#39;loaf of bread&#39; is ______</p>\r\n', 'ID5', 'q_images/flower frame.png');

-- --------------------------------------------------------

--
-- Table structure for table `st_exam_type_b`
--

CREATE TABLE `st_exam_type_b` (
  `Q_id` int(11) NOT NULL,
  `user_token` varchar(255) NOT NULL,
  `session` varchar(255) NOT NULL,
  `subject` varchar(1000) NOT NULL,
  `course_code` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `question_number` int(255) NOT NULL,
  `text` text NOT NULL,
  `quest_code` varchar(255) NOT NULL,
  `quest_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `st_exam_type_b`
--

INSERT INTO `st_exam_type_b` (`Q_id`, `user_token`, `session`, `subject`, `course_code`, `class`, `question_number`, `text`, `quest_code`, `quest_img`) VALUES
(1, '3b4439366d25394e2f391e52ed10fa5f', '2020/2021', 'English Language', 'ENG402', 'SSS-1', 3, 'I love _____ as my favorite colour', 'ID1', ''),
(2, '3b4439366d25394e2f391e52ed10fa5f', '2020/2021', 'English Language', 'ENG402', 'SSS-1', 4, 'Which of these has the right spelling?', 'ID2', ''),
(3, '3b4439366d25394e2f391e52ed10fa5f', '2020/2021', 'English Language', 'ENG402', 'SSS-1', 5, '<p>Audi found some _____ in the buckets. What is going on?</p>\r\n', 'ID3', 'q_images/frame-906-3.png'),
(4, '3b4439366d25394e2f391e52ed10fa5f', '2020/2021', 'English Language', 'ENG402', 'SSS-1', 1, 'The child has eaten a lot of ______', 'ID4', ''),
(5, '3b4439366d25394e2f391e52ed10fa5f', '2020/2021', 'English Language', 'ENG402', 'SSS-1', 2, '<p>Plural representation of &#39;loaf of bread&#39; is ______</p>\r\n', 'ID5', 'q_images/flower frame.png');

-- --------------------------------------------------------

--
-- Table structure for table `st_exam_type_c`
--

CREATE TABLE `st_exam_type_c` (
  `Q_id` int(11) NOT NULL,
  `user_token` varchar(255) NOT NULL,
  `session` varchar(255) NOT NULL,
  `subject` varchar(1000) NOT NULL,
  `course_code` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `question_number` int(255) NOT NULL,
  `text` text NOT NULL,
  `quest_code` varchar(255) NOT NULL,
  `quest_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `st_exam_type_c`
--

INSERT INTO `st_exam_type_c` (`Q_id`, `user_token`, `session`, `subject`, `course_code`, `class`, `question_number`, `text`, `quest_code`, `quest_img`) VALUES
(1, '3b4439366d25394e2f391e52ed10fa5f', '2020/2021', 'English Language', 'ENG402', 'SSS-1', 5, 'I love _____ as my favorite colour', 'ID1', ''),
(2, '3b4439366d25394e2f391e52ed10fa5f', '2020/2021', 'English Language', 'ENG402', 'SSS-1', 4, 'Which of these has the right spelling?', 'ID2', ''),
(3, '3b4439366d25394e2f391e52ed10fa5f', '2020/2021', 'English Language', 'ENG402', 'SSS-1', 3, '<p>Audi found some _____ in the buckets. What is going on?</p>\r\n', 'ID3', 'q_images/frame-906-3.png'),
(4, '3b4439366d25394e2f391e52ed10fa5f', '2020/2021', 'English Language', 'ENG402', 'SSS-1', 2, 'The child has eaten a lot of ______', 'ID4', ''),
(5, '3b4439366d25394e2f391e52ed10fa5f', '2020/2021', 'English Language', 'ENG402', 'SSS-1', 1, '<p>Plural representation of &#39;loaf of bread&#39; is ______</p>\r\n', 'ID5', 'q_images/flower frame.png');

-- --------------------------------------------------------

--
-- Table structure for table `subject_tbl`
--

CREATE TABLE `subject_tbl` (
  `id` int(11) NOT NULL,
  `teacher` varchar(255) NOT NULL,
  `user_token` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `course_code` varchar(255) NOT NULL,
  `no_of_quest` int(11) NOT NULL,
  `term` int(11) NOT NULL,
  `course_unit` int(11) NOT NULL,
  `class` varchar(255) NOT NULL,
  `duration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject_tbl`
--

INSERT INTO `subject_tbl` (`id`, `teacher`, `user_token`, `subject`, `course_code`, `no_of_quest`, `term`, `course_unit`, `class`, `duration`) VALUES
(4, 'Mrs. Folakemi', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG401', 5, 1, 2, 'SSS-1', 10),
(6, 'Mrs. Folakemi', '3b4439366d25394e2f391e52ed10fa5f', 'English Language', 'ENG402', 5, 2, 2, 'SSS-1', 10);

-- --------------------------------------------------------

--
-- Table structure for table `subject_time_table`
--

CREATE TABLE `subject_time_table` (
  `id` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `course_code` varchar(255) NOT NULL,
  `exam_order` varchar(255) NOT NULL,
  `day` varchar(255) NOT NULL,
  `gen_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject_time_table`
--

INSERT INTO `subject_time_table` (`id`, `session`, `subject`, `class`, `course_code`, `exam_order`, `day`, `gen_code`) VALUES
(626, '2021/2022', 'English Language', 'SSS-1', 'ENG401', 'First', 'DAY-1', 1),
(627, '2021/2022', 'Physics', 'SSS-1', 'PHY401', 'Second', 'DAY-2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subject_time_table_2`
--

CREATE TABLE `subject_time_table_2` (
  `id` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `course_code` varchar(255) NOT NULL,
  `exam_order` varchar(255) NOT NULL,
  `day` varchar(255) NOT NULL,
  `gen_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subject_time_table_3`
--

CREATE TABLE `subject_time_table_3` (
  `id` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `course_code` varchar(255) NOT NULL,
  `exam_order` varchar(255) NOT NULL,
  `day` varchar(255) NOT NULL,
  `gen_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_reg_key`
--

CREATE TABLE `teacher_reg_key` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_reg_key`
--

INSERT INTO `teacher_reg_key` (`id`, `name`, `surname`, `email`, `token`, `position`) VALUES
(1, 'Mr. Yinka', 'Jegede', 'jegedeoluwafemi1998@gmail.com', 'ee7456c8dee5bef2337277a630a894ab', 'Principal'),
(2, 'Mrs. Toluwani', 'Adebayo', 'ekreat2016@gmail.com', '7a6550c3f4fb3c6378f6d72530853482', 'Teacher'),
(3, 'Toluwanimi', 'Adebayo', 'toluwanimi12@gmail.com', '428fb714944cd4d5868b15c0418d89b5', 'Teacher'),
(4, 'Tosin', 'Jegede', 'ekreat2016@gmail.com', '9634e52b8f64f454a5c18aac08af9636', 'Teacher'),
(5, 'Tope', 'Olajide', 'tope@gmail.com', 'ed8e4275e4db6ab20418e5337e7c2c08', 'Teacher'),
(6, 'Goodluck', 'Evweikama', 'evweikamagoodluck@gmail.com', '1ba8953be6c6d9959f1b8f2dc24f5468', 'Teacher'),
(7, 'Clifford', 'Nwabuike', 'nwabuikecliff@gmail.com', '010b953ffff70aee91a3cd25a74e7793', 'Teacher'),
(8, 'Oluwadamilola', 'Oyebode', 'mrbead2006@gmail.com', '83caf79b4de5d39e308f78994931c91f', 'Teacher'),
(9, 'ADEOYE', 'ADEDAYO', 'dayosuper01@yahoo.com', 'f280b1e313eec2332b8423c15549d711', 'Teacher'),
(10, 'Opeyemi', 'John', 'lorunfem2018@gmail.com', '73233644df254ba280e685663e45f8d1', 'Teacher'),
(11, 'Grace', 'Morolahun', 'morolahungrace@gmail.com', '523bc226bc968578e033fe2aa5c5d48a', 'Teacher'),
(12, 'Modupe', 'Adejoro', 'adejoromodupe2020@gmail.com', 'ac974d4b86d4c0441e92d71650d82c0a', 'Teacher'),
(13, 'TOLULOPE', 'FAKUNLE', 'mercytolu50@gmail.com', '21e0add5514d0c8d89ba58b65159906f', 'Vice Principal'),
(14, 'ODUNAYO', 'FAYOKUN', 'fayokunabiolaodunayo@gmail.com', '07a61c738f261c249a55357a88015e2f', 'Teacher'),
(15, 'Esechie', 'Ilevbaoje', 'ilevbaoje@gmail.com', 'c2dc161ef276120fcd9eed8df26ffb3c', 'Principal'),
(16, 'Tosin', 'Popoola', 'tosinpopoola2801@gmail.com', '91b2c58b830cebc4179024da54d98962', 'Teacher'),
(17, 'Motunrayo', 'Ayeni', 'ayenimotunrayo@gmail.com', 'f7c472fe0b50d387249109c25cec3249', 'Teacher'),
(18, 'Olaoluwa', 'Oyeladun', 'oyeladunolaoluwa@gmail.com', '4cc88244e2cb7f06a9e8a6540ef68a7c', 'Proprietor'),
(19, 'Noah', 'Rufus', 'rufusnoah31@gmail.com', 'e9dc8ab79129b86a7070f9bfe32dbbe5', 'Teacher'),
(20, 'Olaoluwa', 'Ogunjobi', 'ogunjobiolaoluwa2016@gmail.com', '5585cf1bb2c18a95c8fb6d85f32c5467', 'Teacher'),
(21, 'Adediwura', 'Oladipo', 'oladipoopeyemimary22@gmail.com', '8428229b42ea80f3000aa214af65f6e0', 'Teacher'),
(22, 'Bola', 'Olusegun', 'tomiwaolusegun17@gmail.com', '4a66ed73251f7106af443df0fadb420d', 'Teacher'),
(23, 'opeyemi', 'oladipo', 'oladipoopeyemimary22@gmail.com', '929bc5835d06d16bdd1bf20d0f0e52ed', 'Teacher'),
(24, 'opeyemi', 'Oladipo', 'oladipoopeyemimary@gmail.comi', '329c37f9fd2a37e39fd8d5590e630dbd', 'Teacher'),
(25, 'oyeladun', 'Music', 'music@gmail.com', '43010284538381bf1ea5e919c65a0aee', 'Teacher'),
(26, 'Adegold', 'English', 'english@gmail.com', 'c73e549f452d9867b2ec47a91c376c16', 'Teacher'),
(27, 'Rnv', 'ogunjobi', 'rnv@gmail.com', '6cdb3ac57c28dbc6762c19e0220d76b5', 'Teacher'),
(28, 'Ayeni', 'Kayode', 'yoruba@gmail.com', 'b3885388db3c2fda9cfbe878b3379734', 'Teacher');

-- --------------------------------------------------------

--
-- Table structure for table `tt_answer_sheet`
--

CREATE TABLE `tt_answer_sheet` (
  `A_id` int(11) NOT NULL,
  `subject` mediumtext NOT NULL,
  `paper_type` text NOT NULL,
  `course_code` varchar(255) NOT NULL,
  `teacher` varchar(255) NOT NULL,
  `teacher_token` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `duration` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `adm_no` varchar(255) NOT NULL,
  `ft_score` int(11) NOT NULL,
  `st_score` int(11) NOT NULL,
  `CA1` int(11) NOT NULL,
  `CA2` int(11) NOT NULL,
  `CA3` int(11) NOT NULL,
  `test` int(11) NOT NULL,
  `obj_score` int(11) NOT NULL,
  `essay_score` int(11) NOT NULL,
  `exam_total` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `grade` text NOT NULL,
  `remark` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `Q1` int(255) NOT NULL,
  `Qid1` text NOT NULL,
  `Q2` int(255) NOT NULL,
  `Qid2` text NOT NULL,
  `Q3` int(255) NOT NULL,
  `Qid3` text NOT NULL,
  `Q4` int(255) NOT NULL,
  `Qid4` text NOT NULL,
  `Q5` int(255) NOT NULL,
  `Qid5` text NOT NULL,
  `Q6` int(255) NOT NULL,
  `Qid6` text NOT NULL,
  `Q7` int(255) NOT NULL,
  `Qid7` text NOT NULL,
  `Q8` int(255) NOT NULL,
  `Qid8` text NOT NULL,
  `Q9` int(255) NOT NULL,
  `Qid9` text NOT NULL,
  `Q10` int(255) NOT NULL,
  `Qid10` text NOT NULL,
  `Q11` int(255) NOT NULL,
  `Qid11` text NOT NULL,
  `Q12` int(255) NOT NULL,
  `Qid12` text NOT NULL,
  `Q13` int(255) NOT NULL,
  `Qid13` text NOT NULL,
  `Q14` int(255) NOT NULL,
  `Qid14` text NOT NULL,
  `Q15` int(255) NOT NULL,
  `Qid15` text NOT NULL,
  `Q16` int(255) NOT NULL,
  `Qid16` text NOT NULL,
  `Q17` int(255) NOT NULL,
  `Qid17` text NOT NULL,
  `Q18` int(255) NOT NULL,
  `Qid18` text NOT NULL,
  `Q19` int(255) NOT NULL,
  `Qid19` text NOT NULL,
  `Q20` int(255) NOT NULL,
  `Qid20` text NOT NULL,
  `Q21` int(255) NOT NULL,
  `Qid21` text NOT NULL,
  `Q22` int(255) NOT NULL,
  `Qid22` text NOT NULL,
  `Q23` int(255) NOT NULL,
  `Qid23` text NOT NULL,
  `Q24` int(255) NOT NULL,
  `Qid24` text NOT NULL,
  `Q25` int(255) NOT NULL,
  `Qid25` text NOT NULL,
  `Q26` int(255) NOT NULL,
  `Qid26` text NOT NULL,
  `Q27` int(255) NOT NULL,
  `Qid27` text NOT NULL,
  `Q28` int(255) NOT NULL,
  `Qid28` text NOT NULL,
  `Q29` int(255) NOT NULL,
  `Qid29` text NOT NULL,
  `Q30` int(255) NOT NULL,
  `Qid30` text NOT NULL,
  `Q31` int(255) NOT NULL,
  `Qid31` text NOT NULL,
  `Q32` int(255) NOT NULL,
  `Qid32` text NOT NULL,
  `Q33` int(255) NOT NULL,
  `Qid33` text NOT NULL,
  `Q34` int(255) NOT NULL,
  `Qid34` text NOT NULL,
  `Q35` int(255) NOT NULL,
  `Qid35` text NOT NULL,
  `Q36` int(255) NOT NULL,
  `Qid36` text NOT NULL,
  `Q37` int(255) NOT NULL,
  `Qid37` text NOT NULL,
  `Q38` int(255) NOT NULL,
  `Qid38` text NOT NULL,
  `Q39` int(255) NOT NULL,
  `Qid39` text NOT NULL,
  `Q40` int(255) NOT NULL,
  `Qid40` text NOT NULL,
  `Q41` int(255) NOT NULL,
  `Qid41` text NOT NULL,
  `Q42` int(255) NOT NULL,
  `Qid42` text NOT NULL,
  `Q43` int(255) NOT NULL,
  `Qid43` text NOT NULL,
  `Q44` int(255) NOT NULL,
  `Qid44` text NOT NULL,
  `Q45` int(255) NOT NULL,
  `Qid45` text NOT NULL,
  `Q46` int(255) NOT NULL,
  `Qid46` text NOT NULL,
  `Q47` int(255) NOT NULL,
  `Qid47` text NOT NULL,
  `Q48` int(255) NOT NULL,
  `Qid48` text NOT NULL,
  `Q49` int(255) NOT NULL,
  `Qid49` text NOT NULL,
  `Q50` int(255) NOT NULL,
  `Qid50` text NOT NULL,
  `Q51` int(255) NOT NULL,
  `Qid51` text NOT NULL,
  `Q52` int(255) NOT NULL,
  `Qid52` text NOT NULL,
  `Q53` int(255) NOT NULL,
  `Qid53` text NOT NULL,
  `Q54` int(255) NOT NULL,
  `Qid54` text NOT NULL,
  `Q55` int(255) NOT NULL,
  `Qid55` text NOT NULL,
  `Q56` int(255) NOT NULL,
  `Qid56` text NOT NULL,
  `Q57` int(255) NOT NULL,
  `Qid57` text NOT NULL,
  `Q58` int(255) NOT NULL,
  `Qid58` text NOT NULL,
  `Q59` int(255) NOT NULL,
  `Qid59` text NOT NULL,
  `Q60` int(255) NOT NULL,
  `Qid60` text NOT NULL,
  `Q61` int(255) NOT NULL,
  `Qid61` text NOT NULL,
  `Q62` int(255) NOT NULL,
  `Qid62` text NOT NULL,
  `Q63` int(255) NOT NULL,
  `Qid63` text NOT NULL,
  `Q64` int(255) NOT NULL,
  `Qid64` text NOT NULL,
  `Q65` int(255) NOT NULL,
  `Qid65` text NOT NULL,
  `Q66` int(255) NOT NULL,
  `Qid66` text NOT NULL,
  `Q67` int(255) NOT NULL,
  `Qid67` text NOT NULL,
  `Q68` int(255) NOT NULL,
  `Qid68` text NOT NULL,
  `Q69` int(255) NOT NULL,
  `Qid69` text NOT NULL,
  `Q70` int(255) NOT NULL,
  `Qid70` text NOT NULL,
  `Q71` int(255) NOT NULL,
  `Qid71` text NOT NULL,
  `Q72` int(255) NOT NULL,
  `Qid72` text NOT NULL,
  `Q73` int(255) NOT NULL,
  `Qid73` text NOT NULL,
  `Q74` int(255) NOT NULL,
  `Qid74` text NOT NULL,
  `Q75` int(255) NOT NULL,
  `Qid75` text NOT NULL,
  `Q76` int(255) NOT NULL,
  `Qid76` text NOT NULL,
  `Q77` int(255) NOT NULL,
  `Qid77` text NOT NULL,
  `Q78` int(255) NOT NULL,
  `Qid78` text NOT NULL,
  `Q79` int(255) NOT NULL,
  `Qid79` text NOT NULL,
  `Q80` int(255) NOT NULL,
  `Qid80` text NOT NULL,
  `Q81` int(255) NOT NULL,
  `Qid81` text NOT NULL,
  `Q82` int(255) NOT NULL,
  `Qid82` text NOT NULL,
  `Q83` int(255) NOT NULL,
  `Qid83` text NOT NULL,
  `Q84` int(255) NOT NULL,
  `Qid84` text NOT NULL,
  `Q85` int(255) NOT NULL,
  `Qid85` text NOT NULL,
  `Q86` int(255) NOT NULL,
  `Qid86` text NOT NULL,
  `Q87` int(255) NOT NULL,
  `Qid87` text NOT NULL,
  `Q88` int(255) NOT NULL,
  `Qid88` text NOT NULL,
  `Q89` int(255) NOT NULL,
  `Qid89` text NOT NULL,
  `Q90` int(255) NOT NULL,
  `Qid90` text NOT NULL,
  `Q91` int(255) NOT NULL,
  `Qid91` text NOT NULL,
  `Q92` int(255) NOT NULL,
  `Qid92` text NOT NULL,
  `Q93` int(255) NOT NULL,
  `Qid93` text NOT NULL,
  `Q94` int(255) NOT NULL,
  `Qid94` text NOT NULL,
  `Q95` int(255) NOT NULL,
  `Qid95` text NOT NULL,
  `Q96` int(255) NOT NULL,
  `Qid96` text NOT NULL,
  `Q97` int(255) NOT NULL,
  `Qid97` text NOT NULL,
  `Q98` int(255) NOT NULL,
  `Qid98` text NOT NULL,
  `Q99` int(255) NOT NULL,
  `Qid99` text NOT NULL,
  `Q100` int(255) NOT NULL,
  `Qid100` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tt_answer_type_a`
--

CREATE TABLE `tt_answer_type_a` (
  `id` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `user_token` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `course_code` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `question_number` int(11) NOT NULL,
  `is_correct` int(11) NOT NULL,
  `alpha_opt` varchar(255) NOT NULL,
  `text` varchar(1000) NOT NULL,
  `quest_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tt_answer_type_b`
--

CREATE TABLE `tt_answer_type_b` (
  `id` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `user_token` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `course_code` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `question_number` int(11) NOT NULL,
  `is_correct` int(11) NOT NULL,
  `alpha_opt` varchar(255) NOT NULL,
  `text` varchar(1000) NOT NULL,
  `quest_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tt_answer_type_c`
--

CREATE TABLE `tt_answer_type_c` (
  `id` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `user_token` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `course_code` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `question_number` int(11) NOT NULL,
  `is_correct` int(11) NOT NULL,
  `alpha_opt` varchar(255) NOT NULL,
  `text` varchar(1000) NOT NULL,
  `quest_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tt_exam_type_a`
--

CREATE TABLE `tt_exam_type_a` (
  `Q_id` int(11) NOT NULL,
  `user_token` varchar(255) NOT NULL,
  `session` varchar(255) NOT NULL,
  `subject` varchar(1000) NOT NULL,
  `course_code` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `question_number` int(255) NOT NULL,
  `text` text NOT NULL,
  `quest_code` varchar(255) NOT NULL,
  `quest_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tt_exam_type_b`
--

CREATE TABLE `tt_exam_type_b` (
  `Q_id` int(11) NOT NULL,
  `user_token` varchar(255) NOT NULL,
  `session` varchar(255) NOT NULL,
  `subject` varchar(1000) NOT NULL,
  `course_code` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `question_number` int(255) NOT NULL,
  `text` text NOT NULL,
  `quest_code` varchar(255) NOT NULL,
  `quest_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tt_exam_type_c`
--

CREATE TABLE `tt_exam_type_c` (
  `Q_id` int(11) NOT NULL,
  `user_token` varchar(255) NOT NULL,
  `session` varchar(255) NOT NULL,
  `subject` varchar(1000) NOT NULL,
  `course_code` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `question_number` int(255) NOT NULL,
  `text` text NOT NULL,
  `quest_code` varchar(255) NOT NULL,
  `quest_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_tbl`
--
ALTER TABLE `class_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evaluation`
--
ALTER TABLE `evaluation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_controller`
--
ALTER TABLE `exam_controller`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `ft_answer_sheet`
--
ALTER TABLE `ft_answer_sheet`
  ADD PRIMARY KEY (`A_id`);

--
-- Indexes for table `ft_answer_type_a`
--
ALTER TABLE `ft_answer_type_a`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ft_answer_type_b`
--
ALTER TABLE `ft_answer_type_b`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ft_answer_type_c`
--
ALTER TABLE `ft_answer_type_c`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ft_exam_type_a`
--
ALTER TABLE `ft_exam_type_a`
  ADD PRIMARY KEY (`Q_id`);

--
-- Indexes for table `ft_exam_type_b`
--
ALTER TABLE `ft_exam_type_b`
  ADD PRIMARY KEY (`Q_id`);

--
-- Indexes for table `ft_exam_type_c`
--
ALTER TABLE `ft_exam_type_c`
  ADD PRIMARY KEY (`Q_id`);

--
-- Indexes for table `header_footer`
--
ALTER TABLE `header_footer`
  ADD PRIMARY KEY (`hf_id`);

--
-- Indexes for table `instruction_tbl`
--
ALTER TABLE `instruction_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result_checker`
--
ALTER TABLE `result_checker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_details`
--
ALTER TABLE `school_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_logo`
--
ALTER TABLE `school_logo`
  ADD PRIMARY KEY (`logo_id`);

--
-- Indexes for table `school_term`
--
ALTER TABLE `school_term`
  ADD PRIMARY KEY (`T_id`);

--
-- Indexes for table `sch_session`
--
ALTER TABLE `sch_session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `st_answer_sheet`
--
ALTER TABLE `st_answer_sheet`
  ADD PRIMARY KEY (`A_id`);

--
-- Indexes for table `st_answer_type_a`
--
ALTER TABLE `st_answer_type_a`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `st_answer_type_b`
--
ALTER TABLE `st_answer_type_b`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `st_answer_type_c`
--
ALTER TABLE `st_answer_type_c`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `st_exam_type_a`
--
ALTER TABLE `st_exam_type_a`
  ADD PRIMARY KEY (`Q_id`);

--
-- Indexes for table `st_exam_type_b`
--
ALTER TABLE `st_exam_type_b`
  ADD PRIMARY KEY (`Q_id`);

--
-- Indexes for table `st_exam_type_c`
--
ALTER TABLE `st_exam_type_c`
  ADD PRIMARY KEY (`Q_id`);

--
-- Indexes for table `subject_tbl`
--
ALTER TABLE `subject_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject_time_table`
--
ALTER TABLE `subject_time_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject_time_table_2`
--
ALTER TABLE `subject_time_table_2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject_time_table_3`
--
ALTER TABLE `subject_time_table_3`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_reg_key`
--
ALTER TABLE `teacher_reg_key`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tt_answer_sheet`
--
ALTER TABLE `tt_answer_sheet`
  ADD PRIMARY KEY (`A_id`);

--
-- Indexes for table `tt_answer_type_a`
--
ALTER TABLE `tt_answer_type_a`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tt_answer_type_b`
--
ALTER TABLE `tt_answer_type_b`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tt_answer_type_c`
--
ALTER TABLE `tt_answer_type_c`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tt_exam_type_a`
--
ALTER TABLE `tt_exam_type_a`
  ADD PRIMARY KEY (`Q_id`);

--
-- Indexes for table `tt_exam_type_b`
--
ALTER TABLE `tt_exam_type_b`
  ADD PRIMARY KEY (`Q_id`);

--
-- Indexes for table `tt_exam_type_c`
--
ALTER TABLE `tt_exam_type_c`
  ADD PRIMARY KEY (`Q_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `class_tbl`
--
ALTER TABLE `class_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `evaluation`
--
ALTER TABLE `evaluation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exam_controller`
--
ALTER TABLE `exam_controller`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ft_answer_sheet`
--
ALTER TABLE `ft_answer_sheet`
  MODIFY `A_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ft_answer_type_a`
--
ALTER TABLE `ft_answer_type_a`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=188;

--
-- AUTO_INCREMENT for table `ft_answer_type_b`
--
ALTER TABLE `ft_answer_type_b`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=188;

--
-- AUTO_INCREMENT for table `ft_answer_type_c`
--
ALTER TABLE `ft_answer_type_c`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=188;

--
-- AUTO_INCREMENT for table `ft_exam_type_a`
--
ALTER TABLE `ft_exam_type_a`
  MODIFY `Q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `ft_exam_type_b`
--
ALTER TABLE `ft_exam_type_b`
  MODIFY `Q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `ft_exam_type_c`
--
ALTER TABLE `ft_exam_type_c`
  MODIFY `Q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `instruction_tbl`
--
ALTER TABLE `instruction_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `result_checker`
--
ALTER TABLE `result_checker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `school_details`
--
ALTER TABLE `school_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sch_session`
--
ALTER TABLE `sch_session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `st_answer_sheet`
--
ALTER TABLE `st_answer_sheet`
  MODIFY `A_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `st_answer_type_a`
--
ALTER TABLE `st_answer_type_a`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `st_answer_type_b`
--
ALTER TABLE `st_answer_type_b`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `st_answer_type_c`
--
ALTER TABLE `st_answer_type_c`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `st_exam_type_a`
--
ALTER TABLE `st_exam_type_a`
  MODIFY `Q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `st_exam_type_b`
--
ALTER TABLE `st_exam_type_b`
  MODIFY `Q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `st_exam_type_c`
--
ALTER TABLE `st_exam_type_c`
  MODIFY `Q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subject_tbl`
--
ALTER TABLE `subject_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subject_time_table`
--
ALTER TABLE `subject_time_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=628;

--
-- AUTO_INCREMENT for table `subject_time_table_2`
--
ALTER TABLE `subject_time_table_2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subject_time_table_3`
--
ALTER TABLE `subject_time_table_3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teacher_reg_key`
--
ALTER TABLE `teacher_reg_key`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tt_answer_sheet`
--
ALTER TABLE `tt_answer_sheet`
  MODIFY `A_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tt_answer_type_a`
--
ALTER TABLE `tt_answer_type_a`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tt_answer_type_b`
--
ALTER TABLE `tt_answer_type_b`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tt_answer_type_c`
--
ALTER TABLE `tt_answer_type_c`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tt_exam_type_a`
--
ALTER TABLE `tt_exam_type_a`
  MODIFY `Q_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tt_exam_type_b`
--
ALTER TABLE `tt_exam_type_b`
  MODIFY `Q_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tt_exam_type_c`
--
ALTER TABLE `tt_exam_type_c`
  MODIFY `Q_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
