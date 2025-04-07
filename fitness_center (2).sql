-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2024 at 01:35 PM
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
-- Database: `fitness_center`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user_name`, `password`) VALUES
(1, 'sithmi', '$2y$10$pdG2gwyXozh.8q839I6JqOepgI6M9Zj94/vXFVoPqKPSXjFs1SqtG'),
(2, 'sithmi', '$2y$10$RBDtlYRs1RTyTJu4dU6E8uKfqRf3XGpZCY7b/RKWJqJ1g9dKJp32u');

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `username`, `password`) VALUES
(2, 'sithmi.nemashaz@gmail.com', '$2y$10$aUTnloY1KAOHgVvUiwKQYu1I/RKFOdLa6x9o5a2feFFZF0ujvNoIO'),
(6, 'siluni@', '$2y$10$q8q/X.QIHQQ3uxlv9L0Qg.njW9HIjsx/nvwkVN/oC0v8WpjsAxveW'),
(7, 'janiths@gmail.com', '$2y$10$c0ygSWchpq54ZoY4LqClyuIj/Q6oGattE0P9efBEMP2X9EBEPK9Bq'),
(8, 'SNV', '$2y$10$GRuglPaJjUpr6mUZTm0NA.UWazN3LRuhG7upwzPMCMOJb4hxw6lz2'),
(9, 'Admin', '$2y$10$bUU0dC4QHmpWHFR1hxxGmeEZQp/3/HHLd83K2eQ7atLAtSVMRh2gO'),
(10, 'Admin1', '$2y$10$DOo0X5z1R1vleQayeUitIe6h7UrBQ.vbOHyqdIil6udSnp.1IR76i');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blog_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `author` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blog_id`, `title`, `content`, `author`, `created_at`) VALUES
(1, 'Fitness Tips for Beginners', 'This is a blog post that covers some fitness tips for beginners...', 'John Doe', '2024-11-05 05:03:48'),
(2, 'Why Strength Training is Important', 'Strength training is key to overall fitness because...', 'Jane Smith', '2024-11-05 05:03:48'),
(3, 'The Importance of Rest in Fitness', 'Rest and recovery are crucial parts of any workout regimen...', 'Dr. Sarah Lee', '2024-11-05 05:03:48');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `image` varchar(255) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `author`, `date`, `image`, `content`) VALUES
(1, '5 Tips for Effective Weight Training', 'Jane Doe', '2024-11-01', 'img/main_image_14896800-5145-47d8-ac24-bdf3c1e5ca80_3500x.jpg', 'Weight training is essential for building muscle and strength. Here are five tips to help you maximize your results...'),
(2, 'Nutrition Essentials for Fitness Enthusiasts', 'John Smith', '2024-10-28', 'img/p1bm5844cb6oacnd1std183s12gt6.jpg', 'A well-balanced diet is crucial for optimal performance. Learn about the essential nutrients you need for your fitness journey...'),
(3, 'The Importance of Stretching Before and After Workouts', 'Mary Johnson', '2024-10-25', 'img/AdobeStock_132111328-1024x683.jpeg', 'Stretching helps improve flexibility and prevent injuries. Here’s how to properly incorporate stretching into your routine...');

-- --------------------------------------------------------

--
-- Table structure for table `contact_form`
--

CREATE TABLE `contact_form` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_form`
--

INSERT INTO `contact_form` (`id`, `name`, `email`, `message`, `submitted_at`, `created_at`) VALUES
(1, 'sithmi Nemasha', 'sithmi.nemashaz@gmail.com', 'hi ', '2024-11-07 06:05:33', '2024-11-08 08:04:58'),
(2, 'sithmi Nemasha', 'sithmi.nemashaz@gmail.com', 'hi ', '2024-11-07 06:10:31', '2024-11-08 08:04:58'),
(4, 'Sithmi Nemasha Vithana Arachchi', 'sithminemashaz@gmail.com', 'fhhvnfcmnv', '2024-11-13 10:31:48', '2024-11-13 10:31:48'),
(5, 'Sithmi Nemasha Vithana Arachchi', 'sithminemashaz@gmail.com', 'Hi', '2024-11-15 12:27:19', '2024-11-15 12:27:19');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `schedule` varchar(100) DEFAULT NULL,
  `price` varchar(50) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `description`, `schedule`, `price`, `duration`, `start_date`, `end_date`) VALUES
(1, 'Strength Training', 'High-intensity workouts to keep your heart healthy and burn calories.', 'Mon, Wed, Fri - 8:00 AM to 9:00 AM', '$40 per month', NULL, NULL, NULL),
(2, 'Cardio Training', 'High-intensity workouts to keep your heart healthy and burn calories.', 'Mon, Wed, Fri - 8:00 AM to 9:00 AM', '$40 per month', NULL, NULL, NULL),
(3, 'Martial Art', 'Improve muscle strength and endurance with our specialized equipment.', 'Tue, Thu - 6:00 PM to 7:00 PM', '$50 per month', NULL, NULL, NULL),
(4, 'Yoga', 'Find your balance with beginner and advanced yoga classes.', 'Every Day - 7:00 AM to 8:00 AM', '$30 per month', NULL, NULL, NULL),
(5, 'Personal Training', 'Customized workouts with certified trainers tailored just for you.', 'By Appointment', '$70 per session', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `course_booking`
--

CREATE TABLE `course_booking` (
  `id` int(11) NOT NULL,
  `course` varchar(255) NOT NULL,
  `course_data` date NOT NULL,
  `course_time` time NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `course_email` varchar(255) NOT NULL,
  `course_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_booking`
--

INSERT INTO `course_booking` (`id`, `course`, `course_data`, `course_time`, `course_name`, `course_email`, `course_date`) VALUES
(1, 'Strength Training', '0000-00-00', '15:46:00', 'imasha', 'imasha@gmail.com', '2024-11-14'),
(2, 'Zumba', '0000-00-00', '15:53:00', 'imasha', 'imasha@gmail.com', '2024-11-15'),
(3, 'Strength Training', '0000-00-00', '16:42:00', 'imasha', 'imasha@gmail.com', '2024-11-08'),
(4, 'Yoga', '0000-00-00', '12:24:00', 'sithmi nemasha', 'ddddd@gmail.com', '2024-11-08'),
(5, 'Yoga', '0000-00-00', '10:00:00', 'sithmi nemasha', 'sithminemashaz@gmail.com', '2024-11-08');

-- --------------------------------------------------------

--
-- Table structure for table `course_bookings`
--

CREATE TABLE `course_bookings` (
  `id` int(11) NOT NULL,
  `course` int(11) NOT NULL,
  `course_data` int(11) NOT NULL,
  `course_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `membership_type` varchar(50) NOT NULL,
  `start_date` date NOT NULL,
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `email`, `phone`, `membership_type`, `start_date`, `registration_date`) VALUES
(1, 'sithmi Nemasha', 'sithmi.nemashaz@gmail.com', '123456890', 'VIP', '2002-06-01', '2024-11-03 14:32:47'),
(2, 'sithmi Nemasha', 'sithmi.nemashaz@gmail.com', '0988766540', 'VIP', '2024-11-21', '2024-11-07 08:30:05');

-- --------------------------------------------------------

--
-- Table structure for table `memberships`
--

CREATE TABLE `memberships` (
  `id` int(11) NOT NULL,
  `membership_plan` varchar(255) NOT NULL,
  `membership_name` varchar(255) NOT NULL,
  `membership_email` varchar(255) NOT NULL,
  `membership_phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `memberships`
--

INSERT INTO `memberships` (`id`, `membership_plan`, `membership_name`, `membership_email`, `membership_phone`) VALUES
(1, 'Premium', 'imasha', 'ima@gmail.com', '0776381603'),
(2, 'Premium', 'imasha', 'ima@gmail.com', '0776381603'),
(3, 'Elite', 'imasha', 'ima@gmail.com', '0776381603'),
(4, 'Basic', 'sithmi', 'sithminemasha@outlook.com', '123577'),
(5, 'Basic', 'sithmi', 'sithminemasha@outlook.com', '123577'),
(6, 'Basic', 'sithmi', 'sithminemasha@outlook.com', '123577'),
(7, 'Premium', 'sithmi', 'sdfgh@gmail.com', '123577'),
(8, 'Premium', 'sithmi', 'sdfgh@gmail.com', '123577'),
(9, 'Premium', 'sithmi', 'sdfgh@gmail.com', '123577'),
(10, 'Premium', 'sithmi', 'sdfgh@gmail.com', '123577'),
(11, 'Basic', 'sithmi', 'sithminemasha@outlook.com', '123577'),
(12, 'Premium', 'Sithmi Nemasha Vithana Arachchi', 'sithminemashaz@gmail.com', '0771234567');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `package_id` int(11) NOT NULL,
  `package_name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `duration` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`package_id`, `package_name`, `description`, `price`, `duration`, `created_at`) VALUES
(1, 'Basic Membership', 'Access to the gym and group classes.', 30.00, '1 Month', '2024-11-05 05:03:48'),
(2, 'Premium Membership', 'Access to the gym, group classes, and personal training.', 60.00, '1 Month', '2024-11-05 05:03:48'),
(3, 'Yearly Membership', 'Unlimited access to all services for one year.', 300.00, '1 Year', '2024-11-05 05:03:48');

-- --------------------------------------------------------

--
-- Table structure for table `remove_revie`
--

CREATE TABLE `remove_revie` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `Text` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `rating` int(11) NOT NULL,
  `review` text NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `name`, `rating`, `review`, `image_path`, `created_at`) VALUES
(12, 'K.G.De Silva', 5, '\"Life-Changing Fitness Journey!\"\r\nI’ve been a member of FitZone for six months now, and the results have been amazing! The trainers are highly knowledgeable and always push me to reach my goals. The gym has state-of-the-art equipment, and the atmosphere is motivating. I highly recommend this fitness center to anyone looking to improve their fitness!', 'uploads/466ee90e5fd096df9da0d80e546684a0.jpg', '2024-11-13 08:19:16'),
(13, 'John K', 4, '\"Best Gym Experience Ever!\"\r\nI’ve been to several gyms, but FitZone is by far the best. The staff is friendly and welcoming, and the variety of classes offered is outstanding. Whether you\'re into weight training, yoga, or cardio, there’s something for everyone. Plus, the clean and modern facilities make it a pleasant environment to work out in. Love this place!\r\n\r\n- John K.\r\n\r\n', 'uploads/close-up-handsome-man-portrait-indoors_23-2150771179.avif', '2024-11-13 08:20:13'),
(14, 'Lisa T', 5, '\"Amazing Trainers, Highly Recommended!\"\r\nFitZone\'s personal trainers are top-notch. They take the time to understand your fitness goals and help you achieve them. Whether you’re a beginner or a seasoned athlete, they cater to all fitness levels. The gym is also always clean, and the staff is friendly. 100% recommend!\r\n\r\n- Lisa T.', 'uploads/workout3.jpg', '2024-11-13 08:21:00'),
(18, 'James W', 5, '\"The Best Fitness Center in Town!\"\r\nI joined FitZone because I was tired of the crowded, old-fashioned gyms in the area, and I couldn’t be happier! The facility is always clean, and the equipment is brand new. The staff is very helpful, and the trainers truly care about your progress. It’s a great place to build your fitness routine and stay motivated!\r\n\r\n- James W.', 'uploads/d4db6d1f-f954-459b-a256-4b9484d3d29b.jpg', '2024-11-13 08:23:55');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `user_name`, `rating`, `comment`, `created_at`) VALUES
(1, 'Alice', 5, 'Great gym! Excellent trainers and facilities. Highly recommend!', '2024-11-05 05:03:48'),
(2, 'Bob', 4, 'Good facilities, but I wish they had more yoga classes.', '2024-11-05 05:03:48'),
(3, 'Charlie', 5, 'Amazing experience! The personal training sessions really helped me achieve my goals.', '2024-11-05 05:03:48');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `username`, `password`, `email`) VALUES
(1, 'sithmi', '$2y$10$wS7uiSvCZ2cPpV0EUzkkXuIvld.Iwn1wchQFh/5sUwcTJvjFfFiiW', 'sith@gmail.com'),
(2, 'Staff', '$2y$10$I5zFfD7DMur/OhMrZcyKz.lCE.7ht.f9TFcnq4TthtNu8NbMA0G9G', 'staff@gmail.com'),
(3, 'Admin', '$2y$10$wDi8uBy3pI9xXvIrDSsYrujwdvBrLjD5mRpftV16TG5JVIsPrW8k2', 'sithminemashaz@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `trainers`
--

CREATE TABLE `trainers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `specialty` varchar(255) NOT NULL,
  `experience` varchar(255) NOT NULL,
  `bio` text NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trainers`
--

INSERT INTO `trainers` (`id`, `name`, `specialty`, `experience`, `bio`, `photo`) VALUES
(2, 'John Doe', 'Strength and Conditioning', '5 years', 'ohn specializes in strength training and helping clients build muscle and endurance.', 'uploads/pexels-ron-lach-8745172.jpg'),
(3, 'Margot Robbie', 'Yoga and Flexibility', '7 years', 'Jane is a certified yoga instructor with a passion for flexibility and mindfulness training', 'uploads/pexels-annushka-ahuja-7991652.jpg'),
(4, 'Keiran Lee', 'Cardio and Weight Loss', '4 years', 'Mike helps clients achieve weight loss goals through cardio-intensive workouts.', 'uploads/pexels-annushka-ahuja-7991604.jpg'),
(5, 'Scarlot Johanson', 'Martial Arts', '8 years', 'Mike helps clients achieve weight loss goals through cardio-intensive workouts.', 'uploads/pexels-annushka-ahuja-7991652.jpg'),
(6, 'Bella Porch', 'Cardio and Weight Loss', '4 years', 'Mike helps clients achieve weight loss goals through cardio-intensive workouts', 'uploads/pexels-pixabay-416809.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `weight` decimal(5,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `age`, `weight`, `created_at`) VALUES
(33, 'customer@gmail.com', '$2y$10$Hk32pf7x.z.9uMxiRwXFceidIFta7CJq/bDT8AAfyMoGX1aECS3Om', 'Customer', 22, 50.00, '2024-11-15 11:02:28'),
(37, 'customer2@gmail.com', '$2y$10$4MKljofJq1ox5O66Mvc5EOvxe5t40uKRVRcGJ2oXX4wMmUkAydr8C', 'Customer2', 22, 50.00, '2024-11-17 06:42:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_form`
--
ALTER TABLE `contact_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_booking`
--
ALTER TABLE `course_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `memberships`
--
ALTER TABLE `memberships`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`package_id`);

--
-- Indexes for table `remove_revie`
--
ALTER TABLE `remove_revie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainers`
--
ALTER TABLE `trainers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact_form`
--
ALTER TABLE `contact_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `course_booking`
--
ALTER TABLE `course_booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `memberships`
--
ALTER TABLE `memberships`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `trainers`
--
ALTER TABLE `trainers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
