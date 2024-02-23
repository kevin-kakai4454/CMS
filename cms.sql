-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2024 at 09:02 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(3) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'TECH'),
(2, 'World'),
(3, 'Health'),
(4, 'Bussiness'),
(5, 'Entertainment'),
(6, 'Investing'),
(7, 'Education'),
(21, 'Economy'),
(22, 'Sports');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(3) NOT NULL,
  `comment_post_id` int(3) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(3, 2, 'Kevin kakai', 'kevinkakaikk3@gmail.com', 'when hero stumbles cowards rejoice', 'approved', '2024-01-05'),
(12, 1, 'EDWIN DIAZ', 'HJGHJJVBJ', 'IUYTREWSDFGHHH', 'approved', '2024-01-06'),
(15, 1, 'EDWIN DIAZ', 'HJGHJJVBJ', 'IUYTREWSDFGHHH', 'approved', '2024-01-06'),
(16, 2, 'JEFF', 'jeffkoinange@gmail.com', 'work on your grammar ', 'approved', '2024-01-07'),
(17, 1, 'Shez wakaukha', 'shezwakukha@gmail.com', 'great work brother ', 'approved', '2024-01-07'),
(18, 6, 'SYLVIA', 'sylvia@wakukha', 'Nice picture kevin', 'approved', '2024-01-07'),
(19, 10, 'Sharleen', 'sharleen@gmail.com', 'Financial freedom is my  ', 'approved', '2024-01-07'),
(20, 26, 'Kevin kakai', 'kebv', 'hjvhbdjh', 'approved', '2024-01-14'),
(21, 27, 'Kevin kakai', 'gvhbjbjhvb', 'Correct but its too shallow', 'approved', '2024-01-16'),
(22, 34, 'gabriel', 'gabriel@gmail.com', 'Nice article', 'approved', '2024-01-25'),
(23, 24, 'Ken', 'ken@yahoo.com', 'you are very right', 'approved', '2024-01-25'),
(24, 36, 'fgfd', 'ddf', 'ffrdrg', 'approved', '2024-01-25'),
(25, 35, 'JEFF', 'gabriel@gmail.com', 'fdddddddvdr', 'approved', '2024-01-25'),
(27, 32, ' b x b', ' cbjdj', 'udhbhj', 'approved', '2024-01-25'),
(28, 8, 'cnb ndb', ',skjnslij', 'osjhuhufb', 'approved', '2024-01-25'),
(29, 30, 'vgv nb', 'bsg v', 'sgvdjnb', 'approved', '2024-01-25'),
(30, 28, 'vh nbc ', ' vbndb', 'hgvdhvdjh', 'approved', '2024-01-25'),
(31, 31, 'gdchgv', 'vgsg', 'bjvdgvd', 'approved', '2024-01-25'),
(32, 38, 'vbb', 'gabriel@gmail.com', 'good article', 'Unapproved', '2024-01-27'),
(33, 37, 'Kevin kakai', 'joel@mwema', 'Nice article', 'approved', '2024-01-27'),
(34, 33, 'JEFF', 'jeffkoinange@gmail.com', 'nice article', 'approved', '2024-01-27'),
(35, 39, 'JOEL', 'jeffkoinange@gmail.com', 'Nice article', 'Unapproved', '2024-01-28'),
(36, 42, 'Kevin kakai', 'kevin', '', 'Unapproved', '2024-02-04'),
(37, 42, 'Kevin kakai', 'kevinkakaikk3@gmail.com', 'The lack of money is the  source of evil', 'Unapproved', '2024-02-04'),
(38, 41, 'Sharleen', 'sharleen@gmail.com', 'Nice article', 'Unapproved', '2024-02-04'),
(39, 44, 'james', 'james@gmail.coom', 'the content is hot', 'approved', '2024-02-17');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_user` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` text NOT NULL,
  `post_comment_count` int(11) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft',
  `post_views` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_user`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`, `post_views`) VALUES
(1, 1, 'Kakai Kevin website', 'jobwanjala', '', '2024-02-16', 'mypic.jpg', 'Hello my readers today being a very good day in the and many things are happening. The matrix wants you be distracted. As a man you should remain focused no matter what, and be self disciplined. ', 'kevin,PHP, JAVASCRIPT', 1, 'Published', 48),
(2, 1, 'THEMES COMES AFTER THE RAIN', 'kevinkk', '', '2024-02-16', 'WIN_20230428_06_24_28_Pro.jpg', 'Resilience and Healing: The book likely explores the theme of resilience after experiencing challenges or hardships.\r\nLessons may include insights into overcoming difficulties, finding strength in adversity and the process of healing emotionally and mentally.\r\n\r\nPHP Include & Require Statements\r\nPHP code can get cluttered, which means that if you want to later change something, it becomes a hard task to do. Include and\r\nrequire statements are two almost identical statements that help in an important aspect of coding, the organization of code, and\r\nmaking it more readable and flexible. The include/require statement copies all text, code or any other markup from one existing\r\nfile to the file using the statement. In a simple viewpoint, do consider these statements like this:', 'JS, python, kotlin', 0, 'Published', 22),
(6, 1, 'MYSQLI database', 'karanKE', '', '2024-01-14', 'WIN_20230324_23_52_07_Pro.jpg', 'publish all the content you have', 'C, C++', 5, 'Published', 8),
(8, 5, 'shida', 'shida shida', '', '2024-02-04', 'image_1.jpg', 'publish the post', 'shida', 4, 'Published', 5),
(10, 1, 'FINACIAL FREEDOM', 'kevin wakukha', '', '2024-02-04', 'image_1.jpg', 'Financial freedom is when you have freedom to buy what you want without considering the price and without strain with something next', 'Python', 5, 'Published', 4),
(24, 1, 'The Economical war ', 'Larry Madowo', '', '2024-01-14', 'image_2.jpg', 'publishhdbfcjbhmvzvjzhdbbncjkzcxdhgsv dvh', 'TECH', 1, 'Published', 10),
(26, 1, 'nvcbgbvn', 'karanKE', '', '2024-02-18', 'image_1.jpg', 'gdcjdhmbn ndvjnhdvjdkdkhvshvj,bj,bj,\r\ndbhmfcbjmbjxbjkcfb\r\nbcdmbcfmn', 'cfjvh', 1, 'Published', 1),
(27, 3, 'Africa The cradle of Mankind', 'Charles Darwin', '', '2024-01-16', 'image_4.jpg', 'Africa is considered as the cradle of mankind due to the existence of archeological sites in all over the continent and and its good worm climatic conditions that are suitable for man and their land terrain.', 'History', 1, 'Published', 0),
(28, 1, 'dhabj', 'KEVIN KAKAI', '', '2024-01-19', 'image_1.jpg', 'chbjkbjkkl\r\ndxbjcn', 'bchcb', 0, 'Published', 2),
(30, 1, 'THEMES COMES AFTER THE RAIN', 'karanKE', '', '2024-02-18', 'WIN_20230428_06_24_28_Pro.jpg', 'Resilience and Healing: The book likely explores the theme of resilience after experiencing challenges or hardships.\r\nLessons may include insights into overcoming difficulties, finding strength in adversity and the process of healing emotionally and mentally.\r\n\r\nPHP Include & Require Statements\r\nPHP code can get cluttered, which means that if you want to later change something, it becomes a hard task to do. Include and\r\nrequire statements are two almost identical statements that help in an important aspect of coding, the organization of code, and\r\nmaking it more readable and flexible. The include/require statement copies all text, code or any other markup from one existing\r\nfile to the file using the statement. In a simple viewpoint, do consider these statements like this:', 'TECH, TRADE', 0, 'Published', 3),
(31, 3, 'Africa The cradle of Mankind', 'Charles Darwin', '', '2024-01-21', 'image_4.jpg', 'Africa is considered as the cradle of mankind due to the existence of archeological sites in all over the continent and and its good worm climatic conditions that are suitable for man and their land terrain.', 'History', 0, 'Published', 3),
(32, 1, 'The Economical war ', 'Larry Madowo', '', '2024-01-21', 'image_2.jpg', 'publishhdbfcjbhmvzvjzhdbbncjkzcxdhgsv dvh', 'TECH', 0, 'Published', 2),
(33, 1, 'FINACIAL FREEDOM', 'kevinkk', '', '2024-02-16', 'image_1.jpg', 'Financial freedom is when you have freedom to buy what you want without considering the price and without strain with something next', 'Python', 0, 'Published', 4),
(34, 1, 'MYSQLI database', 'karanKE', '', '2024-02-18', 'WIN_20230324_23_52_07_Pro.jpg', 'publish all the content you have', 'C, C++', 0, 'Published', 6),
(35, 1, 'THEMES COMES AFTER THE RAIN', 'kevinKE', '', '2024-02-17', 'WIN_20230428_06_24_28_Pro.jpg', 'Resilience and Healing: The book likely explores the theme of resilience after experiencing challenges or hardships.\r\nLessons may include insights into overcoming difficulties, finding strength in adversity and the process of healing emotionally and mentally.\r\n\r\nPHP Include & Require Statements\r\nPHP code can get cluttered, which means that if you want to later change something, it becomes a hard task to do. Include and\r\nrequire statements are two almost identical statements that help in an important aspect of coding, the organization of code, and\r\nmaking it more readable and flexible. The include/require statement copies all text, code or any other markup from one existing\r\nfile to the file using the statement. In a simple viewpoint, do consider these statements like this:', 'TECH, TREND', 0, 'Published', 8),
(36, 1, 'Kakai Kevin website', 'kevinKE', '', '2024-02-16', 'mypic.jpg', 'Hello my readers today being a very good day in the and many things are happening. The matrix wants you be distracted. As a man you should remain focused no matter what, and be self disciplined. ', 'kevin,PHP, JS', 0, 'Published', 3),
(37, 1, 'Mens Talk', 'kevinKE', '', '2024-02-16', 'WIN_20230428_06_22_58_Pro.jpg', 'It is easy for an indigenous cow to give birth to an exotic calf than it is for an indigenous bull to sire an exotic calf. ', 'No Tag', 0, 'Published', 13),
(38, 1, 'Artificial Inteligence (AI)', 'kevinkk', '', '2024-02-09', 'WIN_20230428_06_22_53_Pro.jpg', 'Artificial intelligence is the technology that is growing very fast and its very promising in terms of investing. Big companies like Google, Microsoft, Meta and Apple have invested a lot of money to make sure to develop their AIs. ', 'OOP', 0, 'Published', 12),
(39, 4, 'Tech Guy', 'kevinkk', '', '2024-01-27', 'image_3.jpg', 'The tech guy is my mentor', 'PHP, JAVA', 0, 'Published', 5),
(41, 1, 'THEMES COMES AFTER THE RAIN', 'jobwanjala', '', '2024-02-16', 'WIN_20230428_06_24_28_Pro.jpg', 'Resilience and Healing: The book likely explores the theme of resilience after experiencing challenges or hardships.\r\nLessons may include insights into overcoming difficulties, finding strength in adversity and the process of healing emotionally and mentally.\r\n\r\nPHP Include & Require Statements\r\nPHP code can get cluttered, which means that if you want to later change something, it becomes a hard task to do. Include and\r\nrequire statements are two almost identical statements that help in an important aspect of coding, the organization of code, and\r\nmaking it more readable and flexible. The include/require statement copies all text, code or any other markup from one existing\r\nfile to the file using the statement. In a simple viewpoint, do consider these statements like this:', 'JS, python, kotlin', 0, 'Published', 2),
(42, 3, 'ONLINE WRITING', 'kevinkk', '', '2024-02-02', 'image_3.jpg', 'Make friendship with Money\r\nWhile traditional wisdom often emphasizes the value of genuine human connections, one cannot overlook the profound impact that money can have on a person\'s life, positioning it as a steadfast companion. Money serves as a versatile ally, capable of providing security, comfort, and access to a plethora of opportunities. It acts as a reliable buffer against life\'s uncertainties, offering a sense of stability and the means to address basic needs. In many instances, financial resources empower individuals to pursue their aspirations, fulfill dreams, and navigate the complexities of the modern world. While genuine relationships are undoubtedly invaluable, the financial support afforded by money can be an unwavering companion, easing the burdens of daily existence and fostering a life of greater autonomy and fulfillment.', 'writing, content creation', 0, 'Published', 4),
(43, 7, 'DIPLOMA IN ICT', 'kevinkk', '', '2024-02-11', 'image_2.jpg', 'DIPLOMA IN ICT TABLE OF CONTENTS\r\n10.1.6. BINARY CODES .......................56\r\n11.1.6.1T LOGIC GATES AND BOOLEAN ALGEBRA (7 HOURS) ......57\r\n11.1.6.2T ALGEBRA .........................................59\r\n11.1.6.3T DISCRETE COUNTING ................................................60\r\n11.1.6.4T GRAPHS AND FUNCTION ...........................................61\r\n11.1.6.5T ELEMENTS OF PROBABILITY......................................62\r\n11.1.6.6T DATA COLLECTION AND PRESENTATION ..................63\r\n11.1.6.7T MEASURES OF CENTRAL TENDENCY ........................63\r\n11.1.6.8T MEASURES OF DISPERSION .......................................64\r\n12.1.7. OPERATING SYSTEMS (100 HOURS) ..............................65\r\n12.1.7.1T INTRODUCTION OPERATING SYSTEMS .....................66\r\n12.1.7.2T PROCESS MANAGEMENT ...........................................67\r\niii\r\n12.1.7.3T MEMORY MANAGEMENT .........................................68\r\n12.1.7.4T DEVICE I/O MANAGEMENT ......................................69\r\n13.1.7.5T FILE MANAGEMENT ................................................71', 'education, tech', 0, 'Published', 4),
(44, 1, 'MYSQLI database', 'karanKE', '', '2024-02-16', 'WIN_20230324_23_52_07_Pro.jpg', 'publish all the content you have', 'C, C++', 0, 'Published', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_firstname` varchar(50) NOT NULL,
  `user_lastname` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_image` text NOT NULL,
  `user_role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`) VALUES
(1, 'kevinkk', 'kevinkakai.kk@gmail.com', 'kelvin', 'kakai', 'kevinkakai.kk@gmail.com', 'xx', 'admin'),
(3, 'jobwanjala', '65ggd', 'Job', 'Wanjala', 'jobwanjala@gmail.com', '', 'Admin'),
(4, 'jobwanjala', '65ggd', 'Job', 'Wanjala', 'jobwanjala@gmail.com', '', 'Admin'),
(7, 'karanKE', '445410', 'John', 'karani', 'johnkarani@gmail.com', '', 'Admin'),
(11, 'kevinKE', '445410', 'kevin', 'kakai', 'kevinkakai@gmail.com', '', 'Admin'),
(14, 'jayblessings', '445410', 'jay', 'blessings', 'jay@gmail.com', '', 'Admin'),
(15, 'Edufire', '445410', 'Edwin', 'Simiyu', 'simiyuedwin@gmail.com', '', 'Admin'),
(22, 'javan', '*0', '', '', 'javanlusweti@gmail.com', '', 'Subscriber'),
(29, 'sam', '*0', '', '', 'sa@gmail.com', '', 'Subscriber'),
(30, 'sam', '*0', '', '', 'sam@yahoo.com', '', 'Subscriber'),
(31, 'sam', '$2y$10$3q6gcGE3V3yupMhNWtcimuY/HfD/ux/oTNJ1b8YTHxL', '', '', 'sam@gmail.com', '', 'Subscriber'),
(34, 'braxydis', '$2y$12$Wo9TCCYHsq/lsskSVRl8we6W.XcAvLQeD6K9WTUm/9H', '', '', 'braxy@gmail.con', '', 'Admin'),
(35, 'gadi', '$2y$10$hcaz7smWwD8tkjq8PKFK/./wiFx9tlzyt0xKqm.hs4P', 'Guadian', 'wekesa', 'wekesa@yahoo.com', '', 'admin'),
(36, 'gadi', '$2y$10$szC46gz/AE23xRNsLucU.Oiw/qOtV5Tcip2syYxq55l', 'Guadian', 'wekesa', 'wekesa@yahoo.com', '', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `users_online`
--

CREATE TABLE `users_online` (
  `id` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `time` int(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_online`
--

INSERT INTO `users_online` (`id`, `session`, `time`) VALUES
(6, '8dgqbdcah0is7lpn1620t082ha', 1708237481),
(7, 'gehr5v193jj56siiu470ur0on3', 1705915544),
(8, 'opg6tg4a8eg92p5sbtmpmvvaqm', 1705917240),
(9, '8s0fblg8s3l97mf1cb8qsmemk8', 1705917551),
(10, '9bqls7scbd0ole6oqv0sj4tpms', 1705932736),
(11, 'ln1sv68in8ogqsjfr7n2e7p9gf', 1705951286);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users_online`
--
ALTER TABLE `users_online`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `users_online`
--
ALTER TABLE `users_online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
