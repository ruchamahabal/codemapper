-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3308
-- Generation Time: Apr 09, 2019 at 01:54 AM
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
(5, 'Codemapper level 1', 7200, 20),
(7, 'Codemapper level 2', 7200, 10),
(8, 'Codemapper level 3', 7200, 15),
(9, 'Techxposure 2.0', 7200, 16),
(10, 'Python Mania', 7200, 17);

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
(5, 34, 1),
(5, 35, 2),
(5, 36, 3),
(7, 37, 1),
(7, 38, 2),
(7, 39, 3),
(8, 34, 1),
(8, 35, 2),
(8, 36, 3),
(8, 37, 4),
(8, 38, 5),
(8, 39, 6),
(9, 36, 1),
(9, 37, 2),
(10, 34, 1),
(10, 35, 2),
(10, 38, 3);

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
(34, 'write a function fact(n) that takes as parameter a number and returns factorial of that number', 'def fact(n): #code_below', 'fact'),
(35, 'write a python function list_sum(l) that takes as input a list and returns sum of the elements of that list', 'def list_sum(l): #code_below', 'list_sum'),
(36, 'write a python function end_by_zero(n) that takes as parameter a number and checks whether the number ends by zero', 'def end_by_zero(n): #code_below', 'end_by_zero'),
(37, 'write a python function prime_list(l) that takes a list as paramter and returns another list that contains only prime numbers from the input list. Also, elements should not be repeated in the result list', 'def prime_list(l): #code_below', 'prime_list'),
(38, 'Write a function matched(s) that takes as input a string s and checks if the brackets \"(\" and \")\" in s are matched: that is, every \"(\" has a matching \")\" after it and every \")\" has a matching \"(\" before it.  Your function should ignore all other symbols that appear in s.  Your function should return True if s has matched brackets and False if it does not.', 'def matched(s): #code_below', 'matched'),
(39, ' A list of integers is said to be a valley if it consists of a sequence of strictly decreasing values followed by a sequence of strictly increasing values. The decreasing and increasing sequences must be of length at least 2. The last value of the decreasing sequence is the first value of the increasing sequence.\n\nWrite a Python function valley(l) that takes a list of integers and returns True if l is a valley and False otherwise.', 'def valley(l): #code_below', 'valley');

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
(1, '[3,2,1,2,3]', 'True', 39, 69),
(2, '[3,2,1]', 'False', 39, 70),
(3, '[3,3,2,1,2]', 'False', 39, 71),
(1, '[2,3,5]', '10', 35, 74),
(2, '[2,0,0]', '2', 35, 75),
(1, '10', 'True', 36, 85),
(2, '101', 'False', 36, 86),
(1, '\"zb%78\"', 'True', 38, 87),
(2, '\"(7)(a\"', 'False', 38, 88),
(3, '\"a)*(?\"', 'False', 38, 89),
(1, '2', '2', 34, 94),
(2, '6', '720', 34, 95),
(1, '[2,3,6,7,3,7]', '[2, 3, 7]', 37, 96),
(2, '[4,6,8,10]', '[]', 37, 97),
(3, '[44,71,356,1032]', '[71]', 37, 98);

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
(1, '[3,2,1,2,3]', 'print(valley([3,2,1,2,3]))', 'True', 39, 145, 5, 'sample'),
(2, '[3,2,1]', 'print(valley([3,2,1]))', 'False', 39, 146, 5, 'sample'),
(3, '[3,3,2,1,2]', 'print(valley([3,3,2,1,2]))', 'False', 39, 147, 5, 'sample'),
(4, '[2]', 'print(valley([2]))', 'False', 39, 148, 10, 'hidden'),
(5, '[5,4,3,2,1,2]', 'print(valley([5,4,3,2,1,2]))', 'True', 39, 149, 10, 'hidden'),
(6, '[17,1,2,3,4,5]', 'print(valley([17,1,2,3,4,5]))', 'True', 39, 150, 10, 'hidden'),
(1, '[2,3,5]', 'print(list_sum([2,3,5]))', '10', 35, 155, 5, 'sample'),
(2, '[2,0,0]', 'print(list_sum([2,0,0]))', '2', 35, 156, 5, 'sample'),
(3, '[2,-2]', 'print(list_sum([2,-2]))', '0', 35, 157, 10, 'hidden'),
(4, '[]', 'print(list_sum([]))', '0', 35, 158, 10, 'hidden'),
(1, '10', 'print(end_by_zero(10))', 'True', 36, 177, 5, 'sample'),
(2, '101', 'print(end_by_zero(101))', 'False', 36, 178, 5, 'sample'),
(3, '1', 'print(end_by_zero(1))', 'False', 36, 179, 10, 'hidden'),
(4, '0', 'print(end_by_zero(0))', 'True', 36, 180, 10, 'hidden'),
(1, '\"zb%78\"', 'print(matched(\"zb%78\"))', 'True', 38, 181, 5, 'sample'),
(2, '\"(7)(a\"', 'print(matched(\"(7)(a\"))', 'False', 38, 182, 5, 'sample'),
(3, '\"a)*(?\"', 'print(matched(\"a)*(?\"))', 'False', 38, 183, 5, 'sample'),
(4, '\"((jkl)78(A)&l(8(dd(FJI:),):)?)\"', 'print(matched(\"((jkl)78(A)&l(8(dd(FJI:),):)?)\"))', 'True', 38, 184, 10, 'hidden'),
(5, '\"a3qw3;4w3(aasdgsd)((agadsgdsgag)agaga)\"', 'print(matched(\"a3qw3;4w3(aasdgsd)((agadsgdsgag)agaga)\"))', 'True', 38, 185, 10, 'hidden'),
(6, '\"(ag(Gaga(agag)Gaga)GG)a)33)cc(\"', 'print(matched(\"(ag(Gaga(agag)Gaga)GG)a)33)cc(\"))', 'False', 38, 186, 10, 'hidden'),
(1, '2', 'print(fact(2))', '2', 34, 195, 5, 'sample'),
(2, '6', 'print(fact(6))', '720', 34, 196, 5, 'sample'),
(3, '10', 'print(fact(10))', '1000', 34, 197, 10, 'hidden'),
(4, '0', 'print(fact(0))', '1', 34, 198, 10, 'hidden'),
(1, '[2,3,6,7,3,7]', 'print(prime_list([2,3,6,7,3,7]))', '[2, 3, 7]', 37, 199, 5, 'sample'),
(2, '[4,6,8,10]', 'print(prime_list([4,6,8,10]))', '[]', 37, 200, 5, 'sample'),
(3, '[44,71,356,1032]', 'print(prime_list([44,71,356,1032]))', '[71]', 37, 201, 5, 'sample'),
(4, '[2,3,3,6,7,2]', 'print(prime_list([2,3,3,6,7,2]))', '[2,3,7]', 37, 202, 10, 'hidden'),
(5, '[5,6,9,8,5,6,9,8]', 'print(prime_list([5,6,9,8,5,6,9,8]))', '[5]', 37, 203, 10, 'hidden'),
(6, '[]', 'print(prime_list([]))', '[]', 37, 204, 10, 'hidden');

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
(8, 70, 90, 7145, 7200, 17, 20, 4, 6, 5),
(8, 125, 135, 7078, 7200, 5, 10, 8, 9, 7);

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
  MODIFY `challenge_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `qid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `sample_test_cases`
--
ALTER TABLE `sample_test_cases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;
--
-- AUTO_INCREMENT for table `testcase`
--
ALTER TABLE `testcase`
  MODIFY `tc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;
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
