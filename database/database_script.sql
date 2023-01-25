SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";
--
-- Table structure for table `people`
--

CREATE TABLE `people` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `people`
--

INSERT INTO `people` (`id`, `name`) VALUES
(1, 'Oscar Wilde'),
(2, 'Marilyn Monroe'),
(3, 'Albert Einstein'),
(4, 'Franklin D. Roosevelt'),
(5, 'Steve Jobs'),
(6, 'Oprah Winfrey'),
(7, 'Benjamin Franklin');

-- --------------------------------------------------------

--
-- Table structure for table `quotes`
--

CREATE TABLE `quotes` (
  `id` bigint(20) NOT NULL,
  `quote` text NOT NULL,
  `person_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quotes`
--

INSERT INTO `quotes` (`id`, `quote`, `person_id`) VALUES
(1, 'I’m selfish, impatient and a little insecure. I make mistakes, I am out of control and at times hard to handle. But if you can’t handle me at my worst, then you sure as hell don’t deserve me at my best.', 2),
(2, 'I\'m not interested in money. I just want to be wonderful.', 2),
(3, 'If you can\'t handle me at my worst, then you sure as hell don\'t deserve me at my best.', 2),
(4, 'Always forgive your enemies; nothing annoys them so much.', 1),
(5, 'Be yourself; everyone else is already taken.', 1),
(6, 'Strive not to be a success, but rather to be of value.', 3),
(7, 'In the middle of difficulty lies opportunity.', 3),
(8, 'Great minds discuss ideas; average minds discuss events; small minds discuss people.', 4),
(9, 'The only way to do great work is to love what you do.', 5),
(10, 'Turn your wounds into wisdom.', 6),
(11, 'Well done is better than well said.', 7),
(12, 'We have nothing to fear but fear itself.', 7),
(13, 'Your time is limited, don\'t waste it living someone else\'s life.', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotes`
--
ALTER TABLE `quotes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `people`
--
ALTER TABLE `people`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `quotes`
--
ALTER TABLE `quotes`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;
