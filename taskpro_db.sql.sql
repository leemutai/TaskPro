-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2025 at 08:37 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `taskpro_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL,
  `recipient` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `is_read` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `message`, `recipient`, `type`, `date`, `is_read`) VALUES
(1, '\'CPU Optimization.\' has been assigned to you. Please review and start working on it', 2, 'New Task Assigned', '0000-00-00', 0),
(2, '\'Employee onboarding\' has been assigned to you. Please review and start working on it', 3, 'New Task Assigned', '0000-00-00', 1),
(3, '\'Fix login redirect bug\' has been assigned to you. Please review and start working on it', 18, 'New Task Assigned', '0000-00-00', 0),
(4, '\'Optimize database queries\' has been assigned to you. Please review and start working on it', 17, 'New Task Assigned', '0000-00-00', 0),
(5, '\'Update user profile UI\' has been assigned to you. Please review and start working on it', 16, 'New Task Assigned', '0000-00-00', 0),
(6, '\'Implement email notifications\' has been assigned to you. Please review and start working on it', 15, 'New Task Assigned', '0000-00-00', 0),
(7, '\'Create password reset flow\' has been assigned to you. Please review and start working on it', 14, 'New Task Assigned', '0000-00-00', 0),
(8, '\'Refactor registration validation\' has been assigned to you. Please review and start working on it', 13, 'New Task Assigned', '0000-00-00', 0),
(9, '\'Add file upload to task form\' has been assigned to you. Please review and start working on it', 12, 'New Task Assigned', '0000-00-00', 0),
(10, '\'Audit session management\' has been assigned to you. Please review and start working on it', 11, 'New Task Assigned', '0000-00-00', 0),
(11, '\'Design landing page\' has been assigned to you. Please review and start working on it', 10, 'New Task Assigned', '0000-00-00', 0),
(12, '\'Set up unit tests for User model\' has been assigned to you. Please review and start working on it', 9, 'New Task Assigned', '0000-00-00', 0),
(13, '\'Create user activity log\' has been assigned to you. Please review and start working on it', 8, 'New Task Assigned', '0000-00-00', 0),
(14, '\'Add dark mode support\' has been assigned to you. Please review and start working on it', 6, 'New Task Assigned', '0000-00-00', 0),
(15, '\'Develop API endpoint for tasks\' has been assigned to you. Please review and start working on it', 5, 'New Task Assigned', '0000-00-00', 0),
(16, '\'Fix broken logout redirect\' has been assigned to you. Please review and start working on it', 4, 'New Task Assigned', '0000-00-00', 1),
(17, '\'Create dashboard analytics\' has been assigned to you. Please review and start working on it', 5, 'New Task Assigned', '0000-00-00', 0),
(18, '\'Enable task search &amp; filter\' has been assigned to you. Please review and start working on it', 4, 'New Task Assigned', '0000-00-00', 0),
(19, '\'Implement role-based sidebar\' has been assigned to you. Please review and start working on it', 3, 'New Task Assigned', '0000-00-00', 0),
(20, '\'Set up cron for overdue tasks\' has been assigned to you. Please review and start working on it', 2, 'New Task Assigned', '0000-00-00', 0),
(21, '\'Fix mobile navbar toggle\' has been assigned to you. Please review and start working on it', 3, 'New Task Assigned', '0000-00-00', 0),
(22, '\'Document API endpoints\' has been assigned to you. Please review and start working on it', 18, 'New Task Assigned', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `assigned_to` int(11) DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `status` enum('pending','in_progress','completed') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `title`, `description`, `assigned_to`, `due_date`, `status`, `created_at`) VALUES
(1, 'CPU Optimization.', 'We are palling to optimize CPU utiization on of our core routers', 2, '2025-07-17', 'pending', '2025-07-14 22:22:23'),
(2, 'Employee onboarding', 'Assist in onboarding our new employees with our systems and processes.', 3, '2025-07-18', 'completed', '2025-07-14 22:26:32'),
(3, 'Fix login redirect bug', 'Users are not being redirected to their dashboard after login. Investigate and resolve the issue.', 18, '2025-07-15', 'pending', '2025-07-15 05:08:00'),
(4, 'Optimize database queries', 'Analyze slow-performing queries and apply indexing or query optimization.', 17, '2025-07-15', 'pending', '2025-07-15 05:08:19'),
(5, 'Update user profile UI', 'Revamp the front-end of the profile page to improve usability and responsiveness.', 16, '2025-07-17', 'pending', '2025-07-15 05:08:37'),
(6, 'Implement email notifications', 'Set up automatic emails when a task is assigned to a user.', 15, '2025-07-15', 'pending', '2025-07-15 05:09:21'),
(7, 'Create password reset flow', 'Develop a secure password recovery mechanism using email OTP or reset links.', 14, '2025-07-20', 'pending', '2025-07-15 05:12:16'),
(8, 'Refactor registration validation', 'Clean up the registration form logic and apply better validation rules.', 13, '2025-07-16', 'pending', '2025-07-15 05:12:45'),
(9, 'Add file upload to task form', 'Enable attachments (e.g., PDF, DOC) when creating or editing a task.', 12, '2025-07-20', 'pending', '2025-07-15 05:13:08'),
(10, 'Audit session management', 'Review how sessions are handled across the app to improve security and reliability.', 11, '2025-07-25', 'pending', '2025-07-15 05:13:30'),
(11, 'Design landing page', 'Build a modern landing page for TaskPro with key features and call to action.', 10, '2025-07-19', 'pending', '2025-07-15 05:13:49'),
(12, 'Set up unit tests for User model', 'Write PHPUnit tests to cover basic CRUD operations in the User model.', 9, '2025-07-10', 'pending', '2025-07-15 05:14:26'),
(13, 'Create user activity log', 'Track actions like login, logout, task status change for auditing purposes.', 8, '2025-07-14', 'pending', '2025-07-15 05:14:41'),
(14, 'Add dark mode support', 'Implement a toggle for light/dark mode using CSS variables and localStorage.', 6, '2025-07-14', 'pending', '2025-07-15 05:14:59'),
(15, 'Develop API endpoint for tasks', 'Create a JSON API endpoint to fetch tasks by user or status.', 5, '2025-07-15', 'completed', '2025-07-15 05:15:15'),
(16, 'Fix broken logout redirect', 'After logout, users should be redirected to the login page with a success message.', 4, '2025-07-17', 'in_progress', '2025-07-15 05:15:30'),
(17, 'Create dashboard analytics', 'Build simple charts to visualize task distribution, user roles, and deadlines.', 5, '2025-07-18', 'completed', '2025-07-15 05:15:46'),
(18, 'Enable task search &amp; filter', 'Add search input and filter dropdowns for status, date, and assignee in task list.', 4, '2025-07-19', 'completed', '2025-07-15 05:16:01'),
(19, 'Implement role-based sidebar', 'Dynamically show/hide sidebar links depending on whether user is admin or employee.', 3, '2025-07-20', 'pending', '2025-07-15 05:16:14'),
(20, 'Set up cron for overdue tasks', 'Run a daily job to flag overdue tasks and notify the responsible user.', 2, '2025-07-20', 'pending', '2025-07-15 05:16:30'),
(21, 'Fix mobile navbar toggle', 'The mobile menu icon doesn&#039;t open the sidebar properly on small screens.', 3, '2025-07-21', 'pending', '2025-07-15 05:16:44'),
(22, 'Document API endpoints', 'Create a simple API documentation page for developers using the task API.', 18, '2025-07-15', 'pending', '2025-07-15 05:17:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','employee') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `username`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'James New', 'jemo', 'james@gmail.com', '$2y$10$HPM6T7fzduCrVhvMCOh73OJ6rL13CJYB99YiZErExR96deOoRtsue', 'admin', '2025-07-14 21:12:43'),
(2, 'Sally Too', 'sally', 'sally@gmail.com', '$2y$10$U0LOqywIh41sA8ecV4T9U.rrS1CuBtYXpzAfRSGYZBxhLuiwhpcrO', 'employee', '2025-07-14 22:09:38'),
(3, 'Elly Yego', 'elly', 'elly@gmail.com', '$2y$10$CLAUnImUBPM3eHTHyemA1ujXJYwl/BKG1bBTfAx2wdOmeVvKEoqA6', 'employee', '2025-07-14 22:22:55'),
(4, 'Stacey C', 'stacey', 'stacey@gmail.com', '$2y$10$Rpn/I2bQeq30ZJran2mRNO7Aw2jzbsTak.C1Q9wL7eDoywcFdldmO', 'employee', '2025-07-14 22:23:31'),
(5, 'Ken K', 'ken', 'ken@gmail.com', '$2y$10$551/qzQi82VDsckV0Hl2ZORKu3X.Qa7Qbu7l6UuzuRsqzqBEUd3VK', 'employee', '2025-07-14 22:24:42'),
(6, 'Kevin Z', 'kevin', 'kevin@gmail.com', '$2y$10$pBBE4b.OKHgL6OLnEnVgj.Dm1muk6lpCmLeaxnT5dtGL/SOruwl7y', 'employee', '2025-07-14 22:25:09'),
(8, 'Ian Kelo', 'Ian', 'ian@gmail.com', '$2y$10$pOHXRliNkUrWtEoR7168VO2CRvRDoASQtLbRQJuB2BYDNAFSb9R82', 'employee', '2025-07-15 04:44:19'),
(9, 'Neima Hussein', 'neima', 'neima@gmail.com', '$2y$10$UHh9HtiG8685orDYvtg6Vuyg438rTEl.TkQtUFb0JRIjQuhNQ3bK2', 'employee', '2025-07-15 04:48:06'),
(10, 'Amin Huda', 'amin', 'amin@gmail.com', '$2y$10$sqB3kToXqT.O4Dznxe09hOb0/UQVilnrbpwyzq0mArLuMwoGdRfnS', 'employee', '2025-07-15 04:48:42'),
(11, 'Stella M', 'stella', 'stella@gmail.com', '$2y$10$sNU6Yl.Bk.fb0uzyhg/y/utFkCql5qeHEgh5QwXFpewygno4XcHvK', 'employee', '2025-07-15 04:49:14'),
(12, 'Ivy M', 'ivy', 'ivy@gmail.com', '$2y$10$x9KgMm3U8NucBJskmgrkP.37zcHGP3L7aPoKZl6YT9KV4iREcG6MC', 'employee', '2025-07-15 04:50:04'),
(13, 'Clara T', 'clara', 'clara@gmail.com', '$2y$10$vGQlYgJTH6IjUVxaxRvex.LI1IXpqKrYUSWXiZrbX3IPoh013yVve', 'employee', '2025-07-15 05:01:52'),
(14, 'Tony Kinyanjui', 'tony', 'tony@gmail.com', '$2y$10$f6cYLDOwBlHFmPMWkJLCY.wCGKBLZTlujHzlcg/tmZ9OTqquNd3zC', 'employee', '2025-07-15 05:02:16'),
(15, 'Yvette Osodo', 'yvette', 'yvette@gmail.com', '$2y$10$x2fz59QR/xlriqHolczAD.zTSRhdBD1VJGi8Lk6oV/U3WjPkJmsta', 'employee', '2025-07-15 05:02:42'),
(16, 'Julu Martin', 'julu', 'julu@gmail.com', '$2y$10$F9lsK0n7rGJnd0QvNpRgt.drfwTybvxj5JAwi3p0iA5VHty04XZBW', 'employee', '2025-07-15 05:03:36'),
(17, 'Said Hassan', 'said', 'said@gmail.com', '$2y$10$kBUHtwdu1.jkvse5bYdL..vLOs/lT2b.4kb63OTIXvQhxEFTjcL2W', 'employee', '2025-07-15 05:04:02'),
(18, 'Naomi Tuju', 'naomi', 'naomi@gmail.com', '$2y$10$LYXU.6IRh2ddORj7o0RXYeV1cpWVN6Kr2N4Cwqe7JiT8pQ1zmcWg.', 'employee', '2025-07-15 05:04:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assigned_to` (`assigned_to`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`assigned_to`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
