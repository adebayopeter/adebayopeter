-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 23, 2019 at 01:47 PM
-- Server version: 5.6.44-cll-lve
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adebayopeterdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(300) DEFAULT NULL,
  `alias` varchar(50) DEFAULT NULL,
  `description` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `alias`, `description`) VALUES
(1, '.NET C#', 'CSharp', 'Applications developed in .NET C# language'),
(2, '.NET Visual Basic', 'VisualBasic', 'Applications developed in .NET Visual Basic language'),
(3, 'php', 'php', 'Applications developed in php language'),
(4, 'Python', 'Python', 'Application developed using Python'),
(6, 'JavaScript/Ajax', 'JavaScript', 'Applications developed in JavaScript/Ajax language'),
(7, 'Ruby', 'Ruby', 'Application developed using Ruby'),
(8, '.NET', 'CSharp', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `sitesprofile`
--

CREATE TABLE `sitesprofile` (
  `id` bigint(20) NOT NULL,
  `sitename` varchar(150) DEFAULT NULL,
  `description` text,
  `image1` varchar(150) DEFAULT NULL,
  `image2` varchar(150) DEFAULT NULL,
  `image3` varchar(150) DEFAULT NULL,
  `categoryid` int(4) DEFAULT NULL,
  `socialmediaid` bigint(20) DEFAULT NULL,
  `emailaddress` varchar(150) DEFAULT NULL,
  `phonenumber1` varchar(50) DEFAULT NULL,
  `phonenumber2` varchar(50) DEFAULT NULL,
  `webaddress` varchar(150) DEFAULT NULL,
  `client` varchar(150) DEFAULT NULL,
  `clientaddress` varchar(150) DEFAULT NULL,
  `datedelivered` date DEFAULT NULL,
  `datecreated` date DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sitesprofile`
--

INSERT INTO `sitesprofile` (`id`, `sitename`, `description`, `image1`, `image2`, `image3`, `categoryid`, `socialmediaid`, `emailaddress`, `phonenumber1`, `phonenumber2`, `webaddress`, `client`, `clientaddress`, `datedelivered`, `datecreated`, `status`) VALUES
(1, 'Ebonyi State Eportal', '<p>testing</p>', '1461698574eb6888.png', NULL, NULL, 1, 0, 'info@ebonyistate.gov.ng', '08084810208', '08189062038', 'http//ebonyistate.gov.ng', 'Ebonyi State Government', 'State Government House Abakaliki', '2016-04-08', '2016-04-26', 1),
(2, 'Adebayo Peter', '<p><em><strong>testing</strong></em></p>', '1461699264eb6888.png', NULL, NULL, 3, NULL, 'info@adebayopeter.com', '08084810208', '08084810208', 'http//adebayopeter.com', 'Adebayo Peter', '41 Ayodele street', '2016-04-28', '2016-04-26', 1),
(3, 'Ignite Africa', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium, cumque, earum blanditiis incidunt minus commodi consequatur provident quae. Nihil, alias, vel consequatur ab aliquam aspernatur optio harum facilis excepturi mollitia autem voluptas cum ex veniam numquam quia <strong><em>correct</em></strong> in iure. Assumenda, vel provident molestiae perferendis officia commodi asperiores earum sapiente inventore quam deleniti mollitia consequatur expedita quaerat natus praesentium beatae aut ipsa non ex ullam atque suscipit ut dignissimos magnam!</p>', '1461699673eb6888.png', NULL, NULL, 3, NULL, 'info@igniteafrica.tv', '08084810208', '08084810208', 'http//igniteafrica.tv', 'Tope Ibrahim', 'New York', '2016-04-29', '2016-04-26', 1),
(4, 'Lasgidi Company', '<p>testing all images</p>', '1461704854_img1_eb6888.png', '1461704854_img1_eb6888.png', '1461704854_img1_eb6888.png', 6, NULL, 'info@lasgidi.com', '08084810208', '08084810208', 'http//lasgidireporters.com', 'Effiong', 'Oshopping Plaza Allen Avenue', '2016-03-15', '2016-04-26', 1),
(5, 'Lasgidi Reporters', '<p><strong>Lasgidi </strong>ipsum dolor sit amet, consectetur adipisicing elit. Accusantium, cumque, earum blanditiis incidunt minus commodi consequatur provident quae. Nihil, alias, vel consequatur ab aliquam aspernatur optio harum facilis excepturi mollitia autem voluptas cum ex veniam numquam quia repudiandae in iure. Assumenda, vel provident molestiae perferendis officia commodi asperiores earum sapiente inventore quam deleniti mollitia consequatur expedita quaerat natus praesentium beatae aut ipsa non ex ullam atque suscipit ut dignissimos magnam!</p>', '1461703233_img1eb6888.png', '1461703233_img2eb6888.png', '1461703233_img3eb6888.png', 3, NULL, 'info@lasgidireporters.com', '08084810208', '08084810208', 'http//lasgidireporters.com', 'Lasgidi Reporters', 'Lion House Bariga Lagos.', '2016-02-05', '2016-04-26', 1),
(6, 'Rulers Assembly', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium, cumque, earum blanditiis incidunt minus commodi consequatur provident quae. Nihil, alias, vel consequatur ab aliquam aspernatur optio harum facilis excepturi mollitia autem voluptas cum ex veniam numquam quia repudiandae in iure. Assumenda, vel provident molestiae perferendis officia commodi asperiores earum sapiente inventore quam deleniti mollitia consequatur expedita quaerat natus praesentium beatae aut ipsa non ex ullam atque suscipit ut dignissimos magnam!</p>', '1461703576_img1_eb6888.png', '1461703576_img2_eb6888.png', '1461703576_img3_eb6888.png', 2, NULL, 'info@rulersassembly.com', '08084810208', '08084810208', 'http//rulersbuildingcampaign.org', 'Tope Ibrahim', 'New York', '2016-01-05', '2016-04-26', 1),
(7, 'Afrizonetv', '<p><em><strong>Afrizonetv</strong></em> ipsum dolor sit amet, consectetur adipisicing elit. Accusantium, cumque, earum blanditiis incidunt minus commodi consequatur provident quae. Nihil, alias, vel consequatur ab aliquam aspernatur optio harum facilis excepturi mollitia autem voluptas cum ex veniam numquam quia repudiandae in iure. Assumenda, vel provident molestiae perferendis officia commodi asperiores earum sapiente inventore quam deleniti mollitia consequatur expedita quaerat natus praesentium beatae aut ipsa non ex ullam atque suscipit ut dignissimos magnam!</p>', '1461704404_img1_eb6888.png', '1461704404_img2_eb6888.png', NULL, 3, NULL, 'info@afrizonetv.com', '08084810208', '08084810208', 'http//afrizonetv.com', 'Mr Chidi', 'Code House Ikeja Lagos', '2016-01-18', '2016-04-26', 1),
(8, 'ParrotTutorsBlog', '<p><strong>Testing</strong></p>', '1461704843_img1_eb6888.png', '1461704843_img2_eb6888.png', NULL, 3, NULL, 'info@parrottutorsblog.com', '08084810208', '08084810208', 'http//parrottutorsblog.com', 'Mr Bayo', 'Morricent Estate Alausa Ikeja Lagos', '2015-06-09', '2016-04-26', 1),
(9, 'Saint Gregory', '<p><strong>Tesing Site</strong></p>', '1461705056_img1_eb6888.png', NULL, NULL, 4, NULL, 'info@saintgregory.com', '08084810208', '08084810208', 'http//saintgregory.com', 'Saint Gregory', 'Obalende Lagos', '2016-04-20', '2016-04-26', 1),
(10, 'University of Calabar', '<p><em>Testing</em></p>', '1461705594_img1_eb6888.png', '1461705594_img2_eb6888.png', NULL, 2, NULL, 'info@unical.org', '08084810208', '08084810208', 'http//unical.org', 'University of Calabar', 'Unical Calabar', '2014-08-21', '2016-04-26', 0),
(11, 'Ignite Africa TV', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium, cumque, earum blanditiis incidunt minus commodi consequatur provident quae. Nihil, alias, vel consequatur ab aliquam aspernatur optio harum facilis excepturi mollitia autem voluptas cum ex veniam numquam quia repudiandae in iure. Assumenda, vel provident molestiae perferendis officia commodi asperiores earum sapiente inventore quam deleniti mollitia consequatur expedita quaerat natus praesentium beatae aut ipsa non ex ullam atque suscipit ut dignissimos magnam!</p>', '1461835540_img1_ignite.jpg', '1461835540_img2_ignite2.jpg', '1461835540_img3_ignite3.jpg', 3, NULL, 'info@igniteafrica.tv', '08084810208', '08189062038', 'http//afrizonetv.com', 'Tope Ibrahim', 'New York', '2014-04-09', '2016-04-28', 1),
(12, 'Ginacooks', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium, cumque, earum blanditiis incidunt minus commodi consequatur provident quae. Nihil, alias, vel consequatur ab aliquam aspernatur optio harum facilis excepturi mollitia autem voluptas cum ex veniam numquam quia repudiandae in iure. Assumenda, vel provident molestiae perferendis officia commodi asperiores earum sapiente inventore quam deleniti mollitia consequatur expedita quaerat natus praesentium beatae aut ipsa non ex ullam atque suscipit ut dignissimos magnam!</p>', '1461841671_img1_gina.jpg', NULL, NULL, 3, NULL, 'info@ginacooks.com', '08084810208', '08189062038', 'http//ginacooks.com', 'Ginacooks', 'Abuja', '2010-04-13', '2016-04-28', 1),
(13, 'Bakassi Foundation', '<p>Bakassi Foundation ipsum dolor sit amet, consectetur adipisicing elit. Accusantium, cumque, earum blanditiis incidunt minus commodi consequatur provident quae. Nihil, alias, vel consequatur ab aliquam aspernatur optio harum facilis excepturi mollitia autem voluptas cum ex veniam numquam quia repudiandae in iure. Assumenda, vel provident molestiae perferendis officia commodi asperiores earum sapiente inventore quam deleniti mollitia consequatur expedita quaerat natus praesentium beatae aut ipsa non ex ullam atque suscipit ut dignissimos magnam!</p>', '1461842580_img1_bakassi.jpg', NULL, NULL, 3, NULL, 'info@bakassifoundation.org', '08084810208', '08189062038', 'http//bakassifoundation.org', 'Senator Ita-Giwa', 'Abuja', '2015-04-21', '2016-04-28', 1),
(14, 'AfrizoneTV.com', '<p>This is a fully customise movie and tv show application. This application was developed using HTML5, CSS3, AngularJS, jQueryand php&nbsp;platform. I started this project and did over 90% of the work. It has a fully functional Administrative side where every thing about the site is being managed from.</p>', '1470143189_img1_ojuokala.jpg', '1470143189_img2_afrizontv.jpg', '1470143189_img3_afrizontv2.jpg', 3, NULL, 'pekunmi@live.com', '08084810208', '08189062038', 'http//afrizonetv.com', 'AfrizoneTV', 'Finkenweg 1658640 Iserlohn Nrw Germany', '2016-05-02', '2016-08-02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `image` varchar(150) DEFAULT NULL,
  `occupation` varchar(100) NOT NULL,
  `emailaddress` varchar(150) DEFAULT NULL,
  `phonenumber1` varchar(50) DEFAULT NULL,
  `phonenumber2` varchar(50) DEFAULT NULL,
  `rolecategory` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `firstname`, `lastname`, `image`, `occupation`, `emailaddress`, `phonenumber1`, `phonenumber2`, `rolecategory`) VALUES
(1, 'admin', '123', 'Adebayo', 'Peter', NULL, 'Web Developer', 'pekunmi@live.com', '08084810208', '08189062038', 'Super Administrator'),
(2, 'fashion', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'Fashion', 'House', '1441013250Abraham.jpg', '', 'Fashion Designer (Clothier)', 'Admin', 'Administrator', 'ADM0002');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sitesprofile`
--
ALTER TABLE `sitesprofile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sitesprofile`
--
ALTER TABLE `sitesprofile`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
