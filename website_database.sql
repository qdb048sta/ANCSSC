
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `website_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id_announcement` int(11) NOT NULL,
  `id_user_f` int(11) NOT NULL,
  `announcement` text NOT NULL,
  `time_an` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id_announcement`, `id_user_f`, `announcement`, `time_an`) VALUES
(1, 2, 'Hi! This is a new announcement!', '2020-03-28 13:51:18'),
(2, 2, 'Hi! This is a new announcement!', '2020-03-28 13:59:58'),
(3, 2, 'Hi! This is a new announcement!', '2020-03-28 14:00:48'),
(4, 2, 'New Announcement!', '2020-03-28 14:01:04'),
(5, 2, 'Hello!', '2020-04-01 19:23:27'),
(6, 2, 'Hello!', '2020-04-02 14:10:23'),
(7, 2, 'Hello!', '2020-04-08 14:32:27');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id_comment` int(11) NOT NULL,
  `id_sector_f` int(11) NOT NULL,
  `id_user_f` int(11) NOT NULL,
  `comment` text NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id_comment`, `id_sector_f`, `id_user_f`, `comment`, `time`) VALUES
(1, 1, 1, 'This is a test comment. Improving cattle health is improving cattle health. I will be cattle health. This is a comment. Test.', '2020-03-26 21:14:33'),
(2, 1, 1, 'This is another comment. Test test test test.', '2020-03-26 21:14:33'),
(3, 1, 1, 'This is yet another comment. Test test test. TEST!!', '2020-03-26 21:14:33'),
(4, 1, 1, 'This is yet another comment. Test test test. TEST!!', '2020-03-26 21:14:33'),
(5, 2, 1, 'This is a comment about pensions.', '2020-03-26 21:14:33'),
(6, 3, 1, 'This is a comment about loan systems.', '2020-03-26 21:14:33'),
(7, 1, 1, 'This is yet another comment, which is still a test', '2020-03-26 21:14:33'),
(8, 2, 1, 'This is a test comment.', '2020-03-26 21:14:33'),
(9, 1, 1, 'Hello!', '2020-03-26 21:14:33'),
(10, 1, 2, 'Hello!', '2020-03-26 21:14:33'),
(11, 1, 2, 'Hello!', '2020-03-26 21:15:51'),
(12, 1, 2, 'Another comment!', '2020-03-26 21:17:39'),
(13, 2, 2, 'Sasha', '2020-03-29 16:21:13'),
(14, 14, 2, 'Comment!', '2020-04-02 14:11:14'),
(15, 15, 1, 'hello!', '2020-04-06 18:06:15'),
(16, 15, 1, 'EYyyyyy', '2020-04-06 18:06:20'),
(17, 14, 2, 'cement', '2020-04-06 18:40:54'),
(18, 1, 1, 'hello!', '2020-04-07 20:17:20'),
(19, 21, 2, 'new comment', '2020-04-08 14:32:02');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id_project` int(11) NOT NULL,
  `id_sector_f` int(11) NOT NULL,
  `id_user_f` int(11) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `project_summary` text NOT NULL,
  `project_description` text NOT NULL,
  `project_keywords` text NOT NULL,
  `project_pictures` int(11) DEFAULT NULL,
  `project_ngo_name` varchar(255) NOT NULL,
  `project_location` varchar(255) NOT NULL,
  `project_contact_person` varchar(255) NOT NULL,
  `project_email` varchar(255) NOT NULL,
  `project_phone` varchar(255) NOT NULL,
  `project_website` varchar(255) NOT NULL,
  `project_sdg` varchar(255) NOT NULL,
  `project_timeline` varchar(255) NOT NULL,
  `project_budget` varchar(255) NOT NULL,
  `project_beneficiaries` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id_project`, `id_sector_f`, `id_user_f`, `project_name`, `project_summary`, `project_description`, `project_keywords`, `project_pictures`, `project_ngo_name`, `project_location`, `project_contact_person`, `project_email`, `project_phone`, `project_website`, `project_sdg`, `project_timeline`, `project_budget`, `project_beneficiaries`) VALUES
(1, 5, 18, '1', '1', '1', '1', 1, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1'),
(2, 9, 14, '1', '1', '1', '1', 1, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1'),
(3, 22, 1, 'Wells in Bangladesh', 'Built 4 wells to help vulnerable minorities near Dhaka Bangladesh.', 'Built 4 wells in rural area of Bangladesh. We faced the following challenges. We built the following well type. The main takeaways were the following...', 'Wells, Rural, Success', NULL, 'NGO ABCD', 'Dhaka, Bangladesh', 'John Jones', 'johnjones@gmail.com', '+4465247890', 'ngo_website.com', 6, 'May 2009 - June 2011', 'Low', 'Rural Bengalis'),
(4, 31, 1, 'Microfinance Swaziland', 'Providing microfinance for rural people in Swaziland', 'NGO set up microfinance opportunities for rural people in Swaziland. The main achievements were... the main takeaways were...', 'Microfinance, Africa, loans', NULL, 'NGO ABCD', 'Swaziland, Africa', 'Jon Jones', 'johnjones@gmail.com', '+4465247890', 'ngo_website.com', 10, 'December 2016 - September 2018', 'Medium', 'Rural poor in Swaziland'),
(5, 31, 1, 'abc Microfinance Swaziland', 'Providing microfinance for rural people in Swaziland', 'NGO set up microfinance opportunities for rural people in Swaziland. The main achievements were... the main takeaways were...', 'Microfinance, Africa, loans', NULL, 'abc NGO ABCD', 'abc Swaziland, Africa', 'Jon Jones', 'johnjones@gmail.com', '+4465247890', 'ngo_website.com', 10, 'December 2016 - September 2018', 'Medium', 'Rural poor in Swaziland'),
(6, 4, 20, 'Project abcdef', 'Project helloProject helloProject hello', 'Project helloProject helloProject helloProject helloProject helloProject helloProject helloProject helloProject helloProject helloProject helloProject helloProject helloProject helloProject hello', 'add, def, derek', NULL, '3', 'Project hello', 'Project hello', 'Project hello', 'Project hello', 'Project hello', 2, 'Project hello', 'Low', 'Project hello');

-- --------------------------------------------------------

--
-- Stand-in structure for view `projects_sectors_sdg`
-- (See below for the actual view)
--
CREATE TABLE `projects_sectors_sdg` (
`id_project` int(11)
,`id_sector_f` int(11)
,`id_user_f` int(11)
,`project_name` varchar(255)
,`project_summary` text
,`project_description` text
,`project_keywords` text
,`project_pictures` int(11)
,`project_ngo_name` varchar(255)
,`project_location` varchar(255)
,`project_contact_person` varchar(255)
,`project_email` varchar(255)
,`project_phone` varchar(255)
,`project_website` varchar(255)
,`project_sdg` varchar(255)
,`project_timeline` varchar(255)
,`project_budget` varchar(255)
,`project_beneficiaries` varchar(255)
,`id_sectors` int(11)
,`sector_name` varchar(255)
,`id_sdg_f` int(11)
,`id_sdg` int(11)
,`sdg_name` varchar(255)
,`sdg_pic` varchar(255)
,`sdg_num` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `sdg`
--

CREATE TABLE `sdg` (
  `id_sdg` int(11) NOT NULL,
  `sdg_name` varchar(255) NOT NULL,
  `sdg_pic` varchar(255) NOT NULL,
  `sdg_num` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sdg`
--

INSERT INTO `sdg` (`id_sdg`, `sdg_name`, `sdg_pic`, `sdg_num`) VALUES
(1, 'No Poverty', 'sdg1.png', 1),
(2, 'Zero Hunger', 'sdg2.png', 2),
(3, 'Good Health and Well-Being', 'sdg3.png', 3),
(4, 'Quality Education', 'sdg4.png', 4),
(5, 'Gender Equality', 'sdg5.jpg', 5),
(6, 'Clean Water and Sanitation', 'sdg6.png', 6),
(7, 'Affordable and Clean Energy', 'sdg7.jpg', 7),
(8, 'Decent Work and Economic Growth', 'sdg8.png', 8),
(9, 'Industry, Innovation and Infrastructure', 'sdg9.png', 9),
(10, 'Reduced Inequalities', 'sdg10.png', 10),
(11, 'Sustainable Cities and Commerce', 'sdg11.jpg', 11),
(12, 'Responsible Consumption and Production', 'sdg12.png', 12),
(13, 'Climate Action', 'sdg13.png', 13),
(14, 'Life Below Water', 'sdg14.png', 14),
(15, 'Life on Land', 'sdg15.png', 15),
(16, 'Peace, Justice and Strong Institutions', 'sdg16.png', 16),
(17, 'Partnership for the Goals', 'sdg17.jpg', 17);

-- --------------------------------------------------------

--
-- Stand-in structure for view `sdg_sectors`
-- (See below for the actual view)
--
CREATE TABLE `sdg_sectors` (
`id_sectors` int(11)
,`sector_name` varchar(255)
,`id_sdg_f` int(11)
,`id_sdg` int(11)
,`sdg_name` varchar(255)
,`sdg_pic` varchar(255)
,`sdg_num` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `sectors`
--

CREATE TABLE `sectors` (
  `id_sectors` int(11) NOT NULL,
  `sector_name` varchar(255) NOT NULL,
  `id_sdg_f` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sectors`
--

INSERT INTO `sectors` (`id_sectors`, `sector_name`, `id_sdg_f`) VALUES
(1, 'Improving cattle health', 2),
(2, 'Indexation of pensions', 1),
(3, 'Improving loan system', 1),
(4, 'Better cattle food', 2),
(5, 'Cattle improvement', 1),
(6, 'Sector 3', 5),
(7, 'Sector 4', 5),
(8, 'Sector 5', 2),
(9, 'Hello', 5),
(10, 'Sector 43', 5),
(11, 'Better education', 4),
(12, 'Sector 44', 5),
(13, 'Sector 45', 5),
(14, 'Sector 5', 3),
(15, 'Sector 4', 2),
(16, 'New sector', 2),
(17, 'sector 4', 2),
(18, 'hello', 2),
(19, 'hello', 3),
(20, 'help', 2),
(21, 'sector5', 1),
(22, 'Building Wells', 6),
(23, 'Cleaning Groundwater', 6),
(24, 'Off-grid solar panels', 7),
(25, 'Wave power for lakes', 7),
(26, 'Rural Work from home', 8),
(27, 'Accounting Masterclasses', 8),
(28, 'Paving roads', 9),
(29, 'Clearing waterways', 9),
(30, 'Fairer taxes', 10),
(31, 'Encourage Microfinance', 10),
(32, 'Public Transport', 11),
(33, 'Educating young people', 11),
(34, 'Reducing waste', 12),
(35, 'Recycling', 12),
(36, 'Lobbying government', 13),
(37, 'Reducing emissions', 13),
(38, 'Reduce overfishing', 14),
(39, 'Reduce plastic pollution', 14),
(40, 'Stop deforestation', 15),
(41, 'Counting species', 15),
(42, 'Stronger courts', 16),
(43, 'Anti-war', 16),
(44, 'South South collaboration', 17),
(45, 'Triangular cooperation', 17);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `ngo_name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `contact_person` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `number_of_employees` int(10) NOT NULL,
  `number_of_volunteers` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `countries_of_operation` text NOT NULL,
  `ngo_status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `ngo_name`, `address`, `contact_person`, `phone`, `email`, `number_of_employees`, `number_of_volunteers`, `username`, `password`, `website`, `countries_of_operation`, `ngo_status`) VALUES
(1, 'NGO ABCD', '61 Onslow square, SW7 3LS, London', 'Jane Janes', '+4465247890', 'johnjones@gmail.com', 50, 99, 'ngo_abc123', 'c4ca4238a0b923820dcc509a6f75849b', 'website.com', 'Mongolia, Nicaragua, Zimbabwe', 1),
(2, '', '', '', '', '', 0, 0, 'Admin', '21232f297a57a5a743894a0e4a801fc3', '', '', 1),
(4, 'qwe', 'qwe', 'John', '000999', 'ka@email.com', 9, 9, '3', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 'jsisj', 'Albania', 1),
(5, 'qwe', 'qwe', 'John', '000999', 'ka@email.com', 9, 9, '3', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 'jsisj', 'Albania', 1),
(6, 'qwe', 'qwe', 'John', '000999', 'ka@email.com', 9, 9, '3', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 'jsisj', 'Albania', 1),
(7, 'qwe', 'qwe', 'John', '000999', 'ka@email.com', 9, 9, '3', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 'jsisj', 'Albania', 1),
(8, 'qwe', 'qwe', 'John', '000999', 'ka@email.com', 9, 9, '3', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 'jsisj', 'Albania', 1),
(11, 'qwe', 'qwe', 'John', '000999', 'ka@email.com', 9, 9, '3', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 'jsisj', 'Albania', 1),
(12, 'qwe', 'qwe', 'John', '000999', 'ka@email.com', 9, 9, '3', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 'jsisj', 'Albania', 1),
(13, 'qwe', 'qwe', 'John', '000999', 'ka@email.com', 9, 9, '3', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 'jsisj', 'Albania', 1),
(14, '1', '1', '1', '1', '1', 1, 1, '1', '1', '1', '1', 1),
(15, '1', '1', '1', '1', '1@o.com', 1, 1, '1', '96e79218965eb72c92a549dd5a330112', '1', '1', 1),
(18, 'NGO ABC', '61 Onslow Square, Flat 4', 'John', '7538039258', 'korolev_pavel@me.com', 12, 13, 'pashakorolev', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'www.com', 'Russia', 1),
(19, 'NGO 123', '61 Onslow Square, Flat 4', 'Mr Popper', '7538039258', 'a@a.com', 13, 122, '123456', 'e10adc3949ba59abbe56e057f20f883e', 'website.com', 'London, Moscow', 1),
(20, '3', '3', '3', '3', '3@3.com', 3, 3, '3', '33333333', '3', '3', 1);

-- --------------------------------------------------------

--
-- Structure for view `projects_sectors_sdg`
--
DROP TABLE IF EXISTS `projects_sectors_sdg`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `projects_sectors_sdg`  AS  select `projects`.`id_project` AS `id_project`,`projects`.`id_sector_f` AS `id_sector_f`,`projects`.`id_user_f` AS `id_user_f`,`projects`.`project_name` AS `project_name`,`projects`.`project_summary` AS `project_summary`,`projects`.`project_description` AS `project_description`,`projects`.`project_keywords` AS `project_keywords`,`projects`.`project_pictures` AS `project_pictures`,`projects`.`project_ngo_name` AS `project_ngo_name`,`projects`.`project_location` AS `project_location`,`projects`.`project_contact_person` AS `project_contact_person`,`projects`.`project_email` AS `project_email`,`projects`.`project_phone` AS `project_phone`,`projects`.`project_website` AS `project_website`,`projects`.`project_sdg` AS `project_sdg`,`projects`.`project_timeline` AS `project_timeline`,`projects`.`project_budget` AS `project_budget`,`projects`.`project_beneficiaries` AS `project_beneficiaries`,`sdg_sectors`.`id_sectors` AS `id_sectors`,`sdg_sectors`.`sector_name` AS `sector_name`,`sdg_sectors`.`id_sdg_f` AS `id_sdg_f`,`sdg_sectors`.`id_sdg` AS `id_sdg`,`sdg_sectors`.`sdg_name` AS `sdg_name`,`sdg_sectors`.`sdg_pic` AS `sdg_pic`,`sdg_sectors`.`sdg_num` AS `sdg_num` from (`projects` left join `sdg_sectors` on((`projects`.`id_sector_f` = `sdg_sectors`.`id_sectors`))) ;

-- --------------------------------------------------------

--
-- Structure for view `sdg_sectors`
--
DROP TABLE IF EXISTS `sdg_sectors`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sdg_sectors`  AS  select `sectors`.`id_sectors` AS `id_sectors`,`sectors`.`sector_name` AS `sector_name`,`sectors`.`id_sdg_f` AS `id_sdg_f`,`sdg`.`id_sdg` AS `id_sdg`,`sdg`.`sdg_name` AS `sdg_name`,`sdg`.`sdg_pic` AS `sdg_pic`,`sdg`.`sdg_num` AS `sdg_num` from (`sectors` left join `sdg` on((`sectors`.`id_sdg_f` = `sdg`.`id_sdg`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id_announcement`),
  ADD KEY `id_user_f_cosntr` (`id_user_f`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `id_sector_f` (`id_sector_f`),
  ADD KEY `id_user_f` (`id_user_f`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id_project`),
  ADD KEY `id_sector_f_constr` (`id_sector_f`),
  ADD KEY `id_user_f_constr` (`id_user_f`);

--
-- Indexes for table `sdg`
--
ALTER TABLE `sdg`
  ADD PRIMARY KEY (`id_sdg`);

--
-- Indexes for table `sectors`
--
ALTER TABLE `sectors`
  ADD PRIMARY KEY (`id_sectors`),
  ADD KEY `id_sdg_f` (`id_sdg_f`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id_announcement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id_project` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sdg`
--
ALTER TABLE `sdg`
  MODIFY `id_sdg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `sectors`
--
ALTER TABLE `sectors`
  MODIFY `id_sectors` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `announcements`
--
ALTER TABLE `announcements`
  ADD CONSTRAINT `id_user_f_cosntr` FOREIGN KEY (`id_user_f`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `id_sector_f` FOREIGN KEY (`id_sector_f`) REFERENCES `sectors` (`id_sectors`),
  ADD CONSTRAINT `id_user_f` FOREIGN KEY (`id_user_f`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `id_sector_f_constr` FOREIGN KEY (`id_sector_f`) REFERENCES `sectors` (`id_sectors`),
  ADD CONSTRAINT `id_user_f_constr` FOREIGN KEY (`id_user_f`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `sectors`
--
ALTER TABLE `sectors`
  ADD CONSTRAINT `id_sdg_constr` FOREIGN KEY (`id_sdg_f`) REFERENCES `sdg` (`id_sdg`);