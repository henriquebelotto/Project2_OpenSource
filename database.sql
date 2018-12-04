-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2018 at 07:47 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `as3_henrique`
--
CREATE DATABASE IF NOT EXISTS `as3_henrique` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `as3_henrique`;

-- --------------------------------------------------------

--
-- Table structure for table `emp`
--

CREATE TABLE `emp` (
  `empno` varchar(5) NOT NULL,
  `empname` varchar(25) DEFAULT NULL,
  `department` varchar(15) DEFAULT NULL,
  `empjob` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp`
--

INSERT INTO `emp` (`empno`, `empname`, `department`, `empjob`) VALUES
('1000', 'Mike', 'IT', 'Intern'),
('1001', 'Henrique', 'IT', 'Programmer'),
('1002', 'John', 'financial', 'HR Manager'),
('1004', 'Maria', 'financial', 'HR Manager'),
('10042', 'John', 'Sales', 'HR Manager'),
('1005', 'Anna', 'IT', 'Scrum Master'),
('1006', 'Professor', 'IT', 'CEO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `emp`
--
ALTER TABLE `emp`
  ADD PRIMARY KEY (`empno`);
--
-- Database: `assignment4-henrique`
--
CREATE DATABASE IF NOT EXISTS `assignment4-henrique` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `assignment4-henrique`;

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `name` varchar(15) NOT NULL,
  `city` varchar(15) NOT NULL,
  `Tel` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`name`, `city`, `Tel`) VALUES
('Henrique', 'Ottawa', '64712312345'),
('John', 'Vancouver', ''),
('Mary', 'Whitby', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`name`);
--
-- Database: `emp`
--
CREATE DATABASE IF NOT EXISTS `emp` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `emp`;
--
-- Database: `eventschedule`
--
CREATE DATABASE IF NOT EXISTS `eventschedule` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `eventschedule`;

-- --------------------------------------------------------

--
-- Table structure for table `registered`
--

CREATE TABLE `registered` (
  `email` varchar(25) NOT NULL,
  `status` varchar(15) NOT NULL,
  `city` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registered`
--

INSERT INTO `registered` (`email`, `status`, `city`) VALUES
('henriqdsto@gmail.com', 'student', 'Toronto'),
('henriquebelotto@gmail.com', 'student', 'Toronto'),
('John@gmail.com', 'graduate', 'Ottawa'),
('mike@gmail.com', 'student', 'Montreal'),
('newTest@gmail.com', 'graduate', 'Vancouver');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `registered`
--
ALTER TABLE `registered`
  ADD PRIMARY KEY (`email`);
--
-- Database: `myeshop`
--
CREATE DATABASE IF NOT EXISTS `myeshop` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `myeshop`;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CustNo` varchar(15) NOT NULL,
  `CustName` varchar(25) NOT NULL,
  `CustAddr` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CustNo`, `CustName`, `CustAddr`) VALUES
('1', 'Name 1', '1 ST'),
('1234', 'Test', '1 Toronto St'),
('12345', 'Test New', '1 Toronto St'),
('4', 'Name 4', '4421 ST');

-- --------------------------------------------------------

--
-- Table structure for table `emp`
--

CREATE TABLE `emp` (
  `empno` varchar(6) NOT NULL,
  `ename` varchar(20) NOT NULL,
  `job` varchar(20) NOT NULL,
  `salary` int(11) NOT NULL,
  `hiredate` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp`
--

INSERT INTO `emp` (`empno`, `ename`, `job`, `salary`, `hiredate`) VALUES
('1001', 'Henrique', 'job', 1000000, '3-10-2018'),
('10012', 'Henrique', 'job', 1000000, '3-10-2018'),
('100441', '412', 'fsafsa', 12412, '421421'),
('100442', '41fs', 'fsa', 0, 'fsa'),
('101', 'Henry', 'Software Developer', 1000000, '01-10-2018'),
('99999', 'Name', 'Job', 999999, '01-01-2018');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CustNo`);

--
-- Indexes for table `emp`
--
ALTER TABLE `emp`
  ADD PRIMARY KEY (`empno`);
--
-- Database: `mystore`
--
CREATE DATABASE IF NOT EXISTS `mystore` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `mystore`;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `custNo` int(11) NOT NULL,
  `CustName` varchar(20) NOT NULL,
  `CustAddr` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`custNo`, `CustName`, `CustAddr`) VALUES
(1001, 'Jonh', '1 Toronto St'),
(1002, 'Mike', '1 Spadina Ave'),
(1003, 'Chai', '1 China St'),
(1004, 'Felipe', '1 Yonge St');

-- --------------------------------------------------------

--
-- Table structure for table `emp`
--

CREATE TABLE `emp` (
  `EmpNo` int(11) NOT NULL,
  `EmpName` varchar(15) NOT NULL,
  `Sal` int(11) NOT NULL,
  `Job` varchar(15) NOT NULL,
  `Hiredate` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp`
--

INSERT INTO `emp` (`EmpNo`, `EmpName`, `Sal`, `Job`, `Hiredate`) VALUES
(1001, 'Mike', 45000, 'Software Dev', '11/10/2018'),
(1002, 'John', 60000, 'Software Tester', '11/1/2017'),
(1003, 'Antony', 80000, 'CEO', '1/1/2010'),
(1004, 'Tony', 49000, 'Babaca', '11/5/2015');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `emp`
--
ALTER TABLE `emp`
  ADD PRIMARY KEY (`EmpNo`);
--
-- Database: `nov29`
--
CREATE DATABASE IF NOT EXISTS `nov29` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `nov29`;

-- --------------------------------------------------------

--
-- Table structure for table `phonebook`
--

CREATE TABLE `phonebook` (
  `ContactNo` int(10) NOT NULL,
  `ContactName` varchar(20) NOT NULL,
  `ContactAddress` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `phonebook`
--

INSERT INTO `phonebook` (`ContactNo`, `ContactName`, `ContactAddress`) VALUES
(2147483647, 'Henrique', '1 Yonge St'),
(2147483647, 'Henrique', '1 Yonge St'),
(2147483647, 'Henrique', '1 Yonge St'),
(643213242, 'Humberto', '1 Toronto St'),
(2147483647, 'Marcos', '1 Finch St'),
(12412412, 'name_practice', '1 Pract St');
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(11) NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data for table `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"xyztravelagency\",\"table\":\"interest\"},{\"db\":\"xyztravelagency\",\"table\":\"useraccount\"},{\"db\":\"xyztravelagency\",\"table\":\"date\"},{\"db\":\"xyztravelagency\",\"table\":\"adminaccount\"},{\"db\":\"xyztravelagency\",\"table\":\"dates\"},{\"db\":\"XYZTravelAgency\",\"table\":\"useraccount\"},{\"db\":\"XYZTravelAgency\",\"table\":\"interest\"},{\"db\":\"XYZTravelAgency\",\"table\":\"adminaccount\"},{\"db\":\"nov29\",\"table\":\"phonebook\"},{\"db\":\"week13\",\"table\":\"customer\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT '0',
  `x` float UNSIGNED NOT NULL DEFAULT '0',
  `y` float UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

--
-- Dumping data for table `pma__table_info`
--

INSERT INTO `pma__table_info` (`db_name`, `table_name`, `display_field`) VALUES
('xyzcompany', 'incidentreports', 'report_id');

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

--
-- Dumping data for table `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'xyztravelagency', 'useraccount', '{\"sorted_col\":\"`useraccount`.`interestID` ASC\"}', '2018-12-04 18:21:29');

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin,
  `data_sql` longtext COLLATE utf8_bin,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2018-12-04 17:57:13', '{\"Console\\/Mode\":\"collapse\",\"NavigationWidth\":0}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
--
-- Database: `week8-henrique`
--
CREATE DATABASE IF NOT EXISTS `week8-henrique` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `week8-henrique`;

-- --------------------------------------------------------

--
-- Table structure for table `userlogin`
--

CREATE TABLE `userlogin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlogin`
--

INSERT INTO `userlogin` (`username`, `password`, `email`) VALUES
('chai', 'otario', 'chai@otario.com'),
('shabi', '1234', '1234@otario.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `userlogin`
--
ALTER TABLE `userlogin`
  ADD PRIMARY KEY (`username`);
--
-- Database: `week13`
--
CREATE DATABASE IF NOT EXISTS `week13` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `week13`;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `name` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`name`, `address`) VALUES
('John', 'Highway 21'),
('John', 'Highway 21'),
('John', 'Highway 21');

-- --------------------------------------------------------

--
-- Table structure for table `oldcustomers`
--

CREATE TABLE `oldcustomers` (
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `phonebook`
--

CREATE TABLE `phonebook` (
  `phoneno` varchar(11) NOT NULL,
  `email` varchar(25) NOT NULL,
  `name` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `phonebook`
--

INSERT INTO `phonebook` (`phoneno`, `email`, `name`, `address`) VALUES
('6471119992', 'customer1@gmail.com', 'customername1', '1 Toronto st'),
('6424132123', 'customer2@gmail.com', 'customername2', '1424 Yonge st'),
('6471119992', 'customer1@gmail.com', 'customername1', '1 Toronto st'),
('6424132123', 'customer2@gmail.com', 'customername2', '1424 Yonge st'),
('6471119992', 'customer1@gmail.com', 'customername1', '1 Toronto st'),
('6424132123', 'customer2@gmail.com', 'customername2', '1424 Yonge st'),
('6471119992', 'customer1@gmail.com', 'customername1', '1 Toronto st'),
('6424132123', 'customer2@gmail.com', 'customername2', '1424 Yonge st'),
('6471119992', 'customer1@gmail.com', 'customername1', '1 Toronto st'),
('6424132123', 'customer2@gmail.com', 'customername2', '1424 Yonge st'),
('6471119992', 'customer1@gmail.com', 'customername1', '1 Toronto st'),
('6424132123', 'customer2@gmail.com', 'customername2', '1424 Yonge st'),
('6471119992', 'customer1@gmail.com', 'customername1', '1 Toronto st'),
('6424132123', 'customer2@gmail.com', 'customername2', '1424 Yonge st'),
('6471119992', 'customer1@gmail.com', 'customername1', '1 Toronto st'),
('6424132123', 'customer2@gmail.com', 'customername2', '1424 Yonge st');
--
-- Database: `xyzagency`
--
CREATE DATABASE IF NOT EXISTS `xyzagency` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `xyzagency`;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `ContactNo` varchar(15) NOT NULL,
  `ContactName` varchar(25) NOT NULL,
  `ContactAddress` varchar(45) NOT NULL,
  `contactEmail` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`ContactNo`, `ContactName`, `ContactAddress`, `contactEmail`) VALUES
('1001', 'John Mayer', '1 Toronto st', NULL),
('1002', 'Mike Antony', '1 Toronto st', NULL),
('1003', 'Clinton Bill', '1 Toronto st', NULL),
('1004', 'Testla', '1 Toronto st', NULL),
('1005', 'SpaceX', '1 Toronto st', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `emp`
--

CREATE TABLE `emp` (
  `EmpNo` varchar(15) NOT NULL,
  `Ename` varchar(25) DEFAULT NULL,
  `job` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp`
--

INSERT INTO `emp` (`EmpNo`, `Ename`, `job`) VALUES
('1001', 'Henrique', 'Software Developer');

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `id` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`id`) VALUES
('ABC'),
(''),
('test41241'),
('GSAGSA'),
(''),
('');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`ContactNo`);

--
-- Indexes for table `emp`
--
ALTER TABLE `emp`
  ADD PRIMARY KEY (`EmpNo`);
--
-- Database: `xyzcompany`
--
CREATE DATABASE IF NOT EXISTS `xyzcompany` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `xyzcompany`;

-- --------------------------------------------------------

--
-- Table structure for table `incidentcategories`
--

CREATE TABLE `incidentcategories` (
  `incident_id` varchar(4) NOT NULL,
  `incident_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `incidentcategories`
--

INSERT INTO `incidentcategories` (`incident_id`, `incident_name`) VALUES
('101', 'Not Found'),
('102', 'Wifi Problems'),
('103', 'Printer Problems'),
('105', 'Network Issue');

-- --------------------------------------------------------

--
-- Table structure for table `incidentreports`
--

CREATE TABLE `incidentreports` (
  `report_id` varchar(5) NOT NULL,
  `incident_name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  `urgency_level` varchar(20) NOT NULL,
  `location` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `incidentreports`
--

INSERT INTO `incidentreports` (`report_id`, `incident_name`, `description`, `urgency_level`, `location`, `email`) VALUES
('10', 'Not Found', 'new report again', 'low', 'Ottawa', 'guestUser@user.com'),
('5', 'Wifi Problems', 'wifi does not connect', 'medium', 'Toronto', 'guestUser@user.com'),
('6', 'Not Found', 'new Report', 'low', 'Toronto', 'guestUser@user.com'),
('8', 'Printer Problems', 'New report', 'low', 'Montreal', 'guestUser@user.com'),
('9', 'Not Found', 'new report', 'low', 'Montreal', 'guestUser@user.com');

-- --------------------------------------------------------

--
-- Table structure for table `useraccounts`
--

CREATE TABLE `useraccounts` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `emp_id` varchar(10) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(20) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `category_emp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `useraccounts`
--

INSERT INTO `useraccounts` (`username`, `password`, `emp_id`, `phone`, `email`, `firstname`, `lastname`, `address`, `category_emp`) VALUES
('chai', '1234', 'N001', '111111', 'chai@humber.ca', 'Fuchun', 'Chai', '1 Toronto', 'admin'),
('guestUser', '1234', 'guest2', '1111111111', 'guestUser@user.com', 'guest', 'user', '1 Guest St', 'guest'),
('henrique', '1234', 'guest1', '1111111111', 'henrique@humber.ca', 'henrique', 'belotto', '1 Toronto St', 'guest'),
('newAdmin1', '1234', 'N123456', '123124124', 'newAdmin1@humber.ca', 'New', 'Admin1', '1 Admin St', 'admin'),
('newAdmin', '1234', 'N002', '123124124', 'newAdmin@humber.ca', 'New', 'Admin', '1 St', 'regular');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `incidentcategories`
--
ALTER TABLE `incidentcategories`
  ADD PRIMARY KEY (`incident_name`) USING BTREE,
  ADD UNIQUE KEY `incident_id` (`incident_id`);

--
-- Indexes for table `incidentreports`
--
ALTER TABLE `incidentreports`
  ADD PRIMARY KEY (`report_id`),
  ADD KEY `email_emp_fk` (`email`),
  ADD KEY `incident_name_fk` (`incident_name`);

--
-- Indexes for table `useraccounts`
--
ALTER TABLE `useraccounts`
  ADD PRIMARY KEY (`email`) USING BTREE,
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `Emp_id` (`emp_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `incidentreports`
--
ALTER TABLE `incidentreports`
  ADD CONSTRAINT `email_emp_fk` FOREIGN KEY (`email`) REFERENCES `useraccounts` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `incident_name_fk` FOREIGN KEY (`incident_name`) REFERENCES `incidentcategories` (`incident_name`) ON DELETE CASCADE ON UPDATE CASCADE;
--
-- Database: `xyztravelagency`
--
CREATE DATABASE IF NOT EXISTS `xyztravelagency` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `xyztravelagency`;

-- --------------------------------------------------------

--
-- Table structure for table `adminaccount`
--

CREATE TABLE `adminaccount` (
  `adminID` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `adminaccount`
--

INSERT INTO `adminaccount` (`adminID`, `email`, `password`) VALUES
('01', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `date`
--

CREATE TABLE `date` (
  `dateID` varchar(10) NOT NULL,
  `date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `date`
--

INSERT INTO `date` (`dateID`, `date`) VALUES
('d1', '10-12-2018'),
('d2', '14-12-2018'),
('d3', '15-12-2018'),
('d4', '22-12-2018'),
('d5', '25-12-2018'),
('d6', '26-12-2018');

-- --------------------------------------------------------

--
-- Table structure for table `interest`
--

CREATE TABLE `interest` (
  `interestID` varchar(10) NOT NULL,
  `description` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `interest`
--

INSERT INTO `interest` (`interestID`, `description`) VALUES
('O1', 'CN Tower'),
('O2', 'Wonderland'),
('O3', 'Thousand Island'),
('Q1', 'Mountain Royal');

-- --------------------------------------------------------

--
-- Table structure for table `useraccount`
--

CREATE TABLE `useraccount` (
  `email` varchar(50) NOT NULL,
  `registrationID` varchar(50) NOT NULL,
  `name` varchar(10) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `interestID` varchar(20) NOT NULL,
  `groupID` varchar(10) NOT NULL,
  `dateID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `useraccount`
--

INSERT INTO `useraccount` (`email`, `registrationID`, `name`, `address`, `phone`, `interestID`, `groupID`, `dateID`) VALUES
('ehh@ggassga', '1405', 'Henrique R', '77 Roehampton Avenue, Unit 307 - Buzz to H. Belott', '6478789749', 'O1', '', 'd1'),
('chai@gmail.com', '2039', 'Chai', '1 toronto st', '12312321', 'O2', '', 'd3'),
('henrique@gmail.com', '2695', 'henrique', '1 toronto st', '51523', 'O1', '', 'd1'),
('henrique@gmail.com', '4177', 'henrique', '4112 tafs', '214241', 'O1', '', 'd4'),
('henrique@gmail.com', '6880', 'Henrique', '1 toronto st', '123213121', 'O3', '', 'd4'),
('henrique@gmail.com', '7097', 'henrique', '421 Toronto St', '14221421421', 'O2', '', 'd3'),
('henrique@gmail.com', '7403', 'henrique', '1 Spadina Ave', '1231312', 'O2', '', 'd4'),
('henrique@gmail.com', '8753', 'henrique', '1 Admin St', '412241421', 'Q1', '', 'd6'),
('henrique@gmail.com', '8955', 'henrique', '4112 tafs', '214241', 'O1', '', 'd4'),
('chai@gmail.com', '9350', 'Chai', '1 toronto st', '12312321', 'O2', '', 'd3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminaccount`
--
ALTER TABLE `adminaccount`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `date`
--
ALTER TABLE `date`
  ADD PRIMARY KEY (`dateID`);

--
-- Indexes for table `interest`
--
ALTER TABLE `interest`
  ADD PRIMARY KEY (`interestID`);

--
-- Indexes for table `useraccount`
--
ALTER TABLE `useraccount`
  ADD PRIMARY KEY (`registrationID`),
  ADD KEY `interest_fk` (`interestID`),
  ADD KEY `date_fk` (`dateID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `useraccount`
--
ALTER TABLE `useraccount`
  ADD CONSTRAINT `date_fk` FOREIGN KEY (`dateID`) REFERENCES `date` (`dateID`),
  ADD CONSTRAINT `interest_fk` FOREIGN KEY (`interestID`) REFERENCES `interest` (`interestID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
