-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3308
-- Generation Time: Apr 04, 2019 at 09:01 AM
-- Server version: 5.6.34-log
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codemapper`
--

-- --------------------------------------------------------

--
-- Table structure for table `challenges`
--

CREATE TABLE `challenges` (
  `challenge_id` int(11) NOT NULL,
  `title` text,
  `time_in_seconds` int(11) DEFAULT NULL,
  `compilation_calls` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `challenges`
--

INSERT INTO `challenges` (`challenge_id`, `title`, `time_in_seconds`, `compilation_calls`) VALUES
(1, 'TXP Challenge', 7200, 20),
(2, 'Techxposure2.0', 7200, 20),
(3, 'Codemapper contest 1', 432000, 20),
(4, 'End Sem Challenge', 7200, 20);

-- --------------------------------------------------------

--
-- Table structure for table `challenge_questions_mapping`
--

CREATE TABLE `challenge_questions_mapping` (
  `challenge_id` int(11) NOT NULL,
  `qid` int(10) NOT NULL,
  `qno` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `challenge_questions_mapping`
--

INSERT INTO `challenge_questions_mapping` (`challenge_id`, `qid`, `qno`) VALUES
(1, 25, 1),
(1, 27, 2),
(2, 1, 1),
(2, 2, 2),
(2, 29, 3),
(2, 30, 4),
(4, 32, 1);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `qid` int(10) NOT NULL,
  `question` text NOT NULL,
  `initial_code` text NOT NULL,
  `function_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`qid`, `question`, `initial_code`, `function_name`) VALUES
(1, 'Write a python function prime_list(l) that takes a python list as a parameter and returns a list of all the prime numbers in the parameter list. The result list should not contain duplicate elements.', 'def prime_list(l):\r\n  #code below', 'prime_list()'),
(2, 'Write a function matched(s) that takes as input a string s and checks if the brackets \"(\" and \")\" in s are matched: that is, every \"(\" has a matching \")\" after it and every \")\" has a matching \"(\" before it.  Your function should ignore all other symbols that appear in s.  Your function should return True if s has matched brackets and False if it does not.', 'def matched(s):\r\n  #code here', 'matched()'),
(3, 'A list of integers is said to be a valley if it consists of a sequence of strictly decreasing values followed by a sequence of strictly increasing values. The decreasing and increasing sequences must be of length at least 2. The last value of the decreasing sequence is the first value of the increasing sequence.\r\nWrite a Python function valley(l) that takes a list of integers and returns True if l is a valley and False otherwise.', 'def valley(l):\r\n  #code here', 'valley()'),
(4, 'write a python function fact(n) to calculate factorial of a number', 'def fact(n): #code_below', 'fact(n)'),
(7, 'write a python function fact(n) to calculate factorial of a number', 'def fact: #code_below', 'fact'),
(8, 'write a python function fact(n) to calculate factorial of a number', 'def fact: #code_below', 'fact'),
(9, 'write a python function fact(n) to calculate factorial of a number', 'def fact: #code_below', 'fact'),
(10, 'write a python function fact(n) to calculate factorial of a number', 'def fact: #code_below', 'fact'),
(13, 'write a function fact(n) to find factorial of a number', 'def fact: #code_below', 'fact'),
(14, 'write a function fact(n) to find factorial of a number', 'def fact: #code_below', 'fact'),
(15, 'write a function fact(n) to find factorial of a number', 'def fact: #code_below', 'fact'),
(16, 'write a function fact(n) to find factorial of a number', 'def fact: #code_below', 'fact'),
(17, 'write a function fact(n) to find factorial of a number', 'def fact: #code_below', 'fact'),
(22, 'write a function fact(n) to print factorial of a number', 'def fact: #code_below', 'fact'),
(23, 'write a function fact(n) to print factorial of a number', '0', 'fact'),
(24, 'write a fact prog', 'def fact: #code_below', 'fact'),
(25, 'write a fact prog', 'def fact: #code_below', 'fact'),
(26, 'write a fact prog', 'def fact: #code_below', 'fact'),
(27, 'write a fact prog', 'def fact: #code_below', 'fact'),
(28, 'write a fact prog', '0', 'fact'),
(29, 'write a program fact(n)', '0', 'fact'),
(30, 'write a fact func', 'def fact: #code_below', 'fact'),
(31, '', 'def : #code_below', ''),
(32, 'Write a function matched(s) that takes as input a string s and checks if the brackets \"(\" and \")\" in s are matched: that is, every \"(\" has a matching \")\" after it and every \")\" has a matching \"(\" before it.  Your function should ignore all other symbols that appear in s.  Your function should return True if s has matched brackets and False if it does not.', 'def matched(s): #code_below', 'matched');

-- --------------------------------------------------------

--
-- Table structure for table `sample_test_cases`
--

CREATE TABLE `sample_test_cases` (
  `st_id` int(1) NOT NULL,
  `input` text NOT NULL,
  `output` text NOT NULL,
  `qid` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sample_test_cases`
--

INSERT INTO `sample_test_cases` (`st_id`, `input`, `output`, `qid`, `id`) VALUES
(1, '[2,3,6,7]', '[2, 3, 7]', 1, 4),
(2, '[4,6,8,10]', '[]', 1, 5),
(3, '[44,71,356,1032]', '[71]', 1, 6),
(1, '\"zb%78\"', 'True', 2, 10),
(2, '\"(7)(a\"', 'False', 2, 11),
(3, '\"a)*(?\"', 'False', 2, 12),
(1, '[3,2,1,2,3]', 'True', 3, 13),
(2, '[3,2,1]', 'False', 3, 14),
(3, '[3,3,2,1,2]', 'False', 3, 15),
(1, '4', '24', 9, 16),
(1, '4', '24', 9, 17),
(1, '4', '24', 10, 18),
(2, '2', '2', 10, 19),
(1, '2', '2', 13, 22),
(2, '5', '120', 13, 23),
(1, '2', '2', 14, 24),
(2, '3', '6', 14, 25),
(1, '2', '2', 15, 26),
(2, '3', '6', 15, 27),
(1, '4', '24', 22, 29),
(2, '3', '6', 22, 30),
(1, '4', '24', 0, 33),
(2, '3', '6', 0, 34),
(3, '5', '120', 0, 35),
(1, '3', '6', 0, 36),
(1, '4', '24', 0, 37),
(1, '5', '120', 0, 38),
(1, '5', '120', 0, 40),
(1, '5', '120', 29, 42),
(1, '5', '120', 30, 45),
(1, '\"zb%78\"', 'True', 32, 46),
(2, '\"(7)(a\"', 'False', 32, 47);

-- --------------------------------------------------------

--
-- Table structure for table `testcase`
--

CREATE TABLE `testcase` (
  `tc_no` int(11) NOT NULL,
  `input` text NOT NULL,
  `input_function_call` text NOT NULL,
  `expected_output` text NOT NULL,
  `qid` int(11) DEFAULT NULL,
  `tc_id` int(11) NOT NULL,
  `difficulty_level` int(11) DEFAULT NULL,
  `type` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testcase`
--

INSERT INTO `testcase` (`tc_no`, `input`, `input_function_call`, `expected_output`, `qid`, `tc_id`, `difficulty_level`, `type`) VALUES
(1, '[2,3,6,7]', 'print(prime_list([2,3,6,7]))', '[2, 3, 7]', 1, 6, 5, 'sample'),
(2, '[4,6,8,10]', 'print(prime_list([4,6,8,10]))', '[]', 1, 7, 10, 'sample'),
(3, '', 'print(prime_list([44,71,356,1032]))', '[71]', 1, 8, 5, 'sample'),
(4, '', 'print(prime_list([2,3,3,6,7,2]))', '[2, 3, 7]', 1, 9, 10, 'hidden'),
(5, '', 'print(prime_list([5,6,9,8,5,6,9,8]))', '[5]', 1, 10, 10, 'hidden'),
(1, '', 'print(matched(\"zb%78\"))', 'True', 2, 16, 10, 'sample'),
(2, '', 'print(matched(\"(7)(a\"))', 'False', 2, 17, 10, 'sample'),
(3, '', 'print(matched(\"a)*(?\"))', 'False', 2, 18, 20, 'sample'),
(4, '', 'print(matched(\"((jkl)78(A)&l(8(dd(FJI:),):)?)\"))', 'True', 2, 19, 20, 'hidden'),
(5, '', 'print(matched(\"a3qw3;4w3(aasdgsd)((agadsgdsgag)agaga)\"))', 'True', 2, 20, 20, 'hidden'),
(1, '', 'print(valley([2]))', 'False', 3, 21, 40, 'hidden'),
(2, '', 'print(valley([3,3,2,1,2]))', 'False', 3, 22, 40, 'sample'),
(3, '', 'print(valley([3,2,1]))', 'False', 3, 23, 30, 'sample'),
(4, '', 'print(valley([3,2,1,2,3]))', 'True', 3, 24, 10, 'sample'),
(5, '', 'print(valley([5,4,3,2,1,2]))', 'True', 3, 25, 20, 'hidden'),
(5, '', 'print(prime_list([]))', '[]', 1, 29, 10, 'hidden'),
(5, '', 'print(matched(\"(ag(Gaga(agag)Gaga)GG)a)33)cc(\"))', 'False', 2, 30, 20, 'hidden'),
(5, '', 'print (valley([17,1,2,3,4,5]))', 'True', 3, 31, 10, 'hidden'),
(2, '', 'print(fact(5))', '', 11, 32, 0, 'hidden'),
(3, '', 'print(fact(5))', '', 11, 33, 0, 'hidden'),
(2, '', 'print(fact(2))', '', 12, 34, 0, 'hidden'),
(3, '', 'print(fact(2))', '', 12, 35, 0, 'hidden'),
(1, '', 'print(fact(2))', '2', 13, 36, 5, 'sample'),
(2, '', 'print(fact(5))', '120', 13, 37, 5, 'sample'),
(2, '', 'print(fact(6))', '720', 13, 38, 0, 'hidden'),
(3, '', 'print(fact(7))', '5040', 13, 39, 0, 'hidden'),
(1, '', 'print(fact(2))', '2', 14, 40, 5, 'sample'),
(2, '', 'print(fact(3))', '6', 14, 41, 5, 'sample'),
(2, '', 'print(fact(6))', '720', 14, 42, 0, 'hidden'),
(3, '', 'print(fact(7))', '5040', 14, 43, 0, 'hidden'),
(1, '', 'print(fact(2))', '2', 15, 44, 5, 'sample'),
(2, '', 'print(fact(3))', '6', 15, 45, 5, 'sample'),
(3, '', 'print(fact(5))', '120', 15, 46, 5, 'hidden'),
(4, '', 'print(fact(6))', '720', 15, 47, 5, 'hidden'),
(1, '', 'print(fact())', '', 17, 48, 0, 'sample'),
(1, '', 'print(fact(f))', 'gvb', 18, 49, 7, 'sample'),
(1, '', 'print(fact(6))', '720', 19, 50, 7, 'sample'),
(2, '', 'print(fact(7))', '5040', 19, 51, 5, 'hidden'),
(1, '', 'print(())', '', 20, 52, 0, 'sample'),
(1, '4', 'print(fact(4))', '24', 22, 53, 5, 'sample'),
(2, '3', 'print(fact(3))', '6', 22, 54, 5, 'sample'),
(3, '7', 'print(fact(7))', '5040', 22, 55, 5, 'hidden'),
(4, '10', 'print(fact(10))', '1000', 22, 56, 5, 'hidden'),
(1, '4', 'print(fact(4))', '24', 0, 61, 5, 'sample'),
(2, '3', 'print(fact(3))', '6', 0, 62, 5, 'sample'),
(3, '5', 'print(fact(5))', '120', 0, 63, 5, 'sample'),
(4, '7', 'print(fact(7))', '5040', 0, 64, 5, 'hidden'),
(5, '10', 'print(fact(10))', '1000', 0, 65, 3, 'hidden'),
(1, '3', 'print(fact(3))', '6', 0, 66, 5, 'sample'),
(2, '5', 'print(fact(5))', '120', 0, 67, 5, 'hidden'),
(1, '4', 'print(fact(4))', '24', 0, 68, 5, 'sample'),
(2, '5', 'print(fact(5))', '120', 0, 69, 5, 'hidden'),
(1, '5', 'print((5))', '120', 0, 70, 5, 'sample'),
(2, '4', 'print((4))', '24', 0, 71, 5, 'hidden'),
(1, '5', 'print(fact(5))', '120', 0, 74, 3, 'sample'),
(2, '2', 'print(fact(2))', '2', 0, 75, 10, 'hidden'),
(1, '5', 'print(fact(5))', '120', 29, 78, 10, 'sample'),
(2, '2', 'print(fact(2))', '2', 29, 79, 5, 'hidden'),
(1, '5', 'print(fact(5))', '120', 30, 84, 5, 'sample'),
(2, '10', 'print(fact(10))', '1000', 30, 85, 5, 'hidden'),
(1, '[2,5,6]', 'print(prime_list([2,5,6]))', '[2,5]', 31, 86, 5, 'sample'),
(2, '[8,9,6]', 'print(prime_list([8,9,6]))', '[]', 31, 87, 10, 'sample'),
(3, '[]', 'print(prime_list([]))', '[]', 31, 88, 5, 'hidden'),
(1, '\"zb%78\"', 'print(matched(\"zb%78\"))', 'True', 32, 89, 5, 'sample'),
(2, '\"(7)(a\"', 'print(matched(\"(7)(a\"))', 'False', 32, 90, 5, 'sample'),
(3, '\"((jkl)78(A)&l(8(dd(FJI:),):)?)\"', 'print(matched(\"((jkl)78(A)&l(8(dd(FJI:),):)?)\"))', 'True', 32, 91, 5, 'hidden'),
(4, '\"a3qw3;4w3(aasdgsd)((agadsgdsgag)agaga)\"', 'print(matched(\"a3qw3;4w3(aasdgsd)((agadsgdsgag)agaga)\"))', 'True', 32, 92, 5, 'hidden');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_first` varchar(256) NOT NULL,
  `user_last` varchar(256) NOT NULL,
  `user_email` varchar(256) NOT NULL,
  `user_pwd` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_first`, `user_last`, `user_email`, `user_pwd`) VALUES
(7, 'Rucha', 'Mahabal', 'ruchamahabal812@gmail.com', '$2y$10$mYIGoONQegdFU0yTaivWyuO36NFcHolWMYQPabH7n0uNejqt8VB7C'),
(8, 'rucha', 'mahabal', 'ruchamahabal2@gmail.com', '$2y$10$h5zcYxhyo/s/ZgIEx/0HZ.KyI9mm6m7dXafjVpox2K1mE3DlGmYxe'),
(10, 'Jasraj', 'Bedekar', 'abc@xyz.com', '$2y$10$oGy/4dk/sArtTSuWT0aFxeokoinTDAGwX3PkxvHUoy2Y2clqcqMOy'),
(11, 'parth', 'm', 'parth.majethia@somaiya.edu', '$2y$10$8bQYqWpbZmwNx8x0kCCoUO73lYY8eiiKmI/OBFmBtseNIBcxX6NIG'),
(12, 'Gursheen', 'Anand', 'gur.k.anand@gmail.com', '$2y$10$5vrgUrKUsDUlslwGK/NNtukdA1WuNt3xPqMXR1YCYD2h01a55UTyO'),
(13, 'het', 'vejani', 'vejanihet12@gmail.com', '$2y$10$uNmK6LRUD9tvO53cEVxNZu.skaNcMUSomJHCpGhFEL8yElKx/OFja'),
(14, 'Vishal', 'parab', 'vishalparab@gmail.com', '$2y$10$eRRC8rbgHFRhBteLbeNgzOubtMk5Hv8KWDYgkxQTGSuniLH6BMwyW'),
(15, 'Shubham', 'Parchure', 'parchureshubham211@gmail.com', '$2y$10$vYNBSHolgW4wx71CrQzU4On4lArMUlEGo8jSVbBV5Zf2Sub56Cx2e'),
(16, 'jlkjhjh', 'iiiii', 'o5648740@nwytg.net', '$2y$10$RXeI5dveEd6FncKMN/8EKedxv7Z0XMM7GvfTM1N6EMJi9m.fcEEIy'),
(17, 'Om', 'Thakkar', 'om.t@somaiya.edu', '$2y$10$DuDP/sYHK34qkWI5xmCLpO70retiCx/3qcrNmIKYdeZD0oZ4GEjOO');

-- --------------------------------------------------------

--
-- Table structure for table `user_scores`
--

CREATE TABLE `user_scores` (
  `user_id` int(11) DEFAULT NULL,
  `score` int(11) DEFAULT NULL,
  `total_score` int(11) NOT NULL,
  `time_remaining` int(11) DEFAULT NULL,
  `total_time` int(11) NOT NULL,
  `compilation_calls_remaining` int(11) DEFAULT NULL,
  `total_compilation_calls` int(11) NOT NULL,
  `hidden_passed` int(11) NOT NULL,
  `total_hidden_testcases` int(11) NOT NULL,
  `challenge_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_scores`
--

INSERT INTO `user_scores` (`user_id`, `score`, `total_score`, `time_remaining`, `total_time`, `compilation_calls_remaining`, `total_compilation_calls`, `hidden_passed`, `total_hidden_testcases`, `challenge_id`) VALUES
(12, 210, 0, 6124, 0, 14, 0, 0, 0, NULL),
(8, 0, 0, 0, 0, 20, 0, 0, 0, NULL),
(8, 0, 0, 0, 0, 19, 0, 0, 0, NULL),
(8, 300, 0, 28, 0, 16, 0, 9, 0, NULL),
(8, 0, 0, 105, 0, -1, 0, 0, 0, NULL),
(8, 0, 0, 112, 0, 0, 0, 0, 0, NULL),
(8, 0, 0, 113, 0, 0, 0, 0, 0, NULL),
(8, 20, 4, 7186, 0, 19, 0, 2, 0, 4),
(8, 20, 20, 120, 120, 19, 0, 2, 2, 4),
(8, 20, 20, 7190, 7200, 19, 20, 2, 2, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `challenges`
--
ALTER TABLE `challenges`
  ADD PRIMARY KEY (`challenge_id`);

--
-- Indexes for table `challenge_questions_mapping`
--
ALTER TABLE `challenge_questions_mapping`
  ADD KEY `challenge_id` (`challenge_id`),
  ADD KEY `qid` (`qid`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`qid`);

--
-- Indexes for table `sample_test_cases`
--
ALTER TABLE `sample_test_cases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `qid` (`qid`);

--
-- Indexes for table `testcase`
--
ALTER TABLE `testcase`
  ADD PRIMARY KEY (`tc_id`),
  ADD KEY `qid` (`qid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_scores`
--
ALTER TABLE `user_scores`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `challenge_id` (`challenge_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `challenges`
--
ALTER TABLE `challenges`
  MODIFY `challenge_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `qid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `sample_test_cases`
--
ALTER TABLE `sample_test_cases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `testcase`
--
ALTER TABLE `testcase`
  MODIFY `tc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `challenge_questions_mapping`
--
ALTER TABLE `challenge_questions_mapping`
  ADD CONSTRAINT `challenge_questions_mapping_ibfk_1` FOREIGN KEY (`challenge_id`) REFERENCES `challenges` (`challenge_id`),
  ADD CONSTRAINT `challenge_questions_mapping_ibfk_2` FOREIGN KEY (`qid`) REFERENCES `questions` (`qid`);

--
-- Constraints for table `user_scores`
--
ALTER TABLE `user_scores`
  ADD CONSTRAINT `user_scores_ibfk_1` FOREIGN KEY (`challenge_id`) REFERENCES `challenges` (`challenge_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
