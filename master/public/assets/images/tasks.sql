-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2023 at 11:48 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `master_piece`
--

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `deadline` datetime NOT NULL,
  `skills_required` varchar(255) DEFAULT NULL,
  `vacancy` int(11) NOT NULL,
  `company` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'open',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `title`, `description`, `location`, `start_date`, `end_date`, `deadline`, `skills_required`, `vacancy`, `company`, `category_id`, `image`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Guest Services Coordinator', 'Coordinate guest services, handle inquiries, assist with check-ins/check-outs, and ensure a positive guest experience.', 'Downtown', '2023-11-25 00:00:00', '2023-12-15 00:00:00', '2023-12-10 00:00:00', 'Customer service, communication skills, multilingual (English and Arabic), problem-solving.', 3, 'Movenpick Resort & Residences Aqaba', 1, 'move.png', 'Open', '2023-11-24 14:06:29', '2023-11-24 14:06:29'),
(3, 'Food and Beverage Supervisor', 'Oversee restaurant and bar operations, manage staff, ensure quality service, and implement food and beverage promotions.', 'Downtown', '2023-12-01 00:00:00', '2023-12-30 00:00:00', '2023-12-25 00:00:00', 'Hospitality management, leadership, communication, knowledge of food safety regulations.', 2, 'Movenpick Resort & Residences Aqaba', 1, 'move.png', 'Active', '2023-11-24 14:06:29', '2023-11-24 14:06:29'),
(4, 'Events Coordinator', 'Plan and coordinate events, conferences, and weddings hosted at the resort, ensuring seamless execution.', 'Downtown', '2023-12-10 00:00:00', '2024-01-15 00:00:00', '2023-12-31 00:00:00', 'Event planning, organizational skills, attention to detail, communication.', 5, 'Movenpick Resort & Residences Aqaba', 1, 'move.png', 'Pending', '2023-11-24 14:06:29', '2023-11-24 14:06:29'),
(5, 'Front Desk Manager', 'Manage front desk operations, supervise staff, handle guest concerns, and ensure efficient check-in/check-out processes.', 'Downtown', '2023-12-05 00:00:00', '2023-12-25 00:00:00', '2023-12-20 00:00:00', 'Hotel management, leadership, customer service, problem-solving.', 2, 'Kempinski Hotel Aqaba Red Sea', 1, 'kemp.png', 'Open', '2023-11-24 14:06:29', '2023-11-24 14:06:29'),
(6, 'Executive Chef', 'Oversee kitchen operations, create menus, manage kitchen staff, and ensure high-quality food standards.', 'Downtown', '2023-12-15 00:00:00', '2024-01-10 00:00:00', '2023-12-31 00:00:00', 'Culinary expertise, leadership, menu planning, food safety knowledge.', 1, 'Kempinski Hotel Aqaba Red Sea', 1, 'kemp.png', 'Active', '2023-11-24 14:06:29', '2023-11-24 14:06:29'),
(7, 'Sales and Marketing Specialist', 'Develop and implement marketing strategies, promote the hotel\'s services, and attract new clients.', 'Downtown', '2023-12-08 00:00:00', '2023-12-20 00:00:00', '2023-12-15 00:00:00', 'Marketing, sales, communication, social media management.', 4, 'Kempinski Hotel Aqaba Red Sea', 1, 'kemp.png', 'Pending', '2023-11-24 14:06:29', '2023-11-24 14:06:29'),
(8, 'Spa and Wellness Coordinator', 'Coordinate spa services, manage appointments, and ensure a relaxing and enjoyable experience for guests.', 'Downtown', '2023-12-20 00:00:00', '2024-01-05 00:00:00', '2023-12-31 00:00:00', 'Spa management, customer service, knowledge of wellness services.', 3, 'InterContinental Aqaba Resort', 1, 'enter.jpg', 'Active', '2023-11-24 14:06:29', '2023-11-24 14:06:29'),
(9, 'Revenue Manager', 'Optimize room rates, maximize revenue, and implement strategies to achieve financial goals.', 'Downtown', '2023-12-03 00:00:00', '2023-12-20 00:00:00', '2023-12-15 00:00:00', 'Revenue management, data analysis, pricing strategies, hospitality industry knowledge.', 2, 'InterContinental Aqaba Resort', 1, 'enter.jpg', 'Open', '2023-11-24 14:06:29', '2023-11-24 14:06:29'),
(10, 'Guest Experience Specialist', 'Enhance guest satisfaction by addressing concerns, providing information, and ensuring a positive overall experience.', 'Downtown', '2023-12-12 00:00:00', '2023-12-28 00:00:00', '2023-12-24 00:00:00', 'Customer service, communication, problem-solving, attention to detail.', 3, 'InterContinental Aqaba Resort', 1, 'enter.jpg', 'Pending', '2023-11-24 14:06:29', '2023-11-24 14:06:29'),
(11, 'Conference and Events Manager', 'Coordinate and manage conferences, meetings, and events hosted at the hotel.', 'Downtown', '2023-12-18 00:00:00', '2024-01-10 00:00:00', '2024-01-05 00:00:00', 'Event planning, negotiation, communication, attention to detail.', 1, 'DoubleTree by Hilton Hotel Aqaba', 1, 'tree.jpg', 'Active', '2023-11-24 14:06:29', '2023-11-24 14:06:29'),
(12, 'Executive Housekeeper', 'Oversee housekeeping operations, manage staff, and ensure high cleanliness standards in guest rooms and public areas.', 'Downtown', '2023-11-25 00:00:00', '2023-12-15 00:00:00', '2023-12-10 00:00:00', 'Housekeeping management, leadership, attention to cleanliness standards.', 3, 'DoubleTree by Hilton Hotel Aqaba', 1, 'tree.jpg', 'Open', '2023-11-24 14:06:29', '2023-11-24 14:06:29'),
(13, '', 'Develop and execute digital marketing campaigns, manage social media platforms, and enhance the hotel\'s online presence.', 'Downtown', '2023-12-01 00:00:00', '2023-12-30 00:00:00', '2023-12-25 00:00:00', 'Digital marketing, social media management, content creation.', 2, 'DoubleTree by Hilton Hotel Aqaba', 1, 'web_dev_project.png', 'Active', '2023-11-24 14:06:29', '2023-11-24 14:06:29'),
(14, 'Beach Club Manager', 'Oversee the operations of the beach club, coordinate events, and ensure a welcoming environment for guests.', 'Downtown', '2023-12-10 00:00:00', '2024-01-15 00:00:00', '2023-12-31 00:00:00', 'Hospitality management, event planning, customer service.', 5, 'Marina Plaza Hotel Aqaba', 1, 'marketing_campaign.jpg', 'Pending', '2023-11-24 14:06:29', '2023-11-24 14:06:29'),
(15, 'Front Office Supervisor', 'Supervise front office staff, manage check-in/check-out processes, and address guest inquiries.', 'Downtown', '2023-12-05 00:00:00', '2023-12-25 00:00:00', '2023-12-20 00:00:00', 'Front desk operations, customer service, leadership.', 2, 'Marina Plaza Hotel Aqaba', 1, 'data_analysis_project.png', 'Open', '2023-11-24 14:06:29', '2023-11-24 14:06:29'),
(16, 'Culinary Supervisor', 'Supervise kitchen operations, assist in menu planning, and ensure high-quality food service.', 'Downtown', '2023-12-15 00:00:00', '2024-01-10 00:00:00', '2023-12-31 00:00:00', 'Culinary expertise, leadership, kitchen management.', 1, 'Marina Plaza Hotel Aqaba', 1, 'graphic_design_task.jpg', 'Active', '2023-11-24 14:06:29', '2023-11-24 14:06:29'),
(17, 'Tourism Information Specialist', 'Provide information to tourists, assist with travel itineraries, and promote local attractions and services.', 'Downtown', '2023-12-08 00:00:00', '2023-12-20 00:00:00', '2023-12-15 00:00:00', 'Knowledge of local attractions, communication, multilingual.', 4, 'Tourist Office', 1, 'customer_support_task.png', 'Pending', '2023-11-24 14:06:29', '2023-11-24 14:06:29'),
(18, 'Marketing and Promotions Coordinator', 'Develop and implement marketing strategies to promote tourism, coordinate promotional events, and engage with potential visitors.', 'Downtown', '2023-12-20 00:00:00', '2024-01-05 00:00:00', '2023-12-31 00:00:00', 'Marketing, event planning, communication.', 3, 'Tourist Office', 1, 'event_planning.jpg', 'Active', '2023-11-24 14:06:29', '2023-11-24 14:06:29'),
(19, 'Travel Consultant', 'Assist travelers with itinerary planning, bookings, and provide personalized travel recommendations.', 'Downtown', '2023-12-03 00:00:00', '2023-12-20 00:00:00', '2023-12-15 00:00:00', 'Travel planning, customer service, knowledge of travel destinations.', 2, 'Tourist Office', 1, 'content_writing_task.png', 'Open', '2023-11-24 14:06:29', '2023-11-24 14:06:29'),
(34, 'Operations Manager', 'Oversee daily terminal operations, manage logistics, coordinate with shipping companies, and ensure efficient cargo handling.', 'Aqaba Container Terminal', '2023-12-06 01:03:24', '2023-12-06 01:03:24', '2023-12-06 01:03:24', 'Port operations, logistics management, leadership, problem-solving', 1, 'Aqaba Container Terminal', 2, 'operation_manager_image.jpg', 'Open', '2023-12-05 22:03:24', '2023-12-05 22:03:24'),
(35, 'Port Engineer', 'Manage and oversee maintenance and repair projects for terminal infrastructure, ensuring compliance with safety standards.', 'Aqaba Container Terminal', '2023-12-06 01:03:24', '2023-12-06 01:03:24', '2023-12-06 01:03:24', 'Marine engineering, maintenance, project management', 1, 'Aqaba Container Terminal', 2, 'port_engineer_image.jpg', 'Open', '2023-12-05 22:03:24', '2023-12-05 22:03:24'),
(36, 'Customs and Compliance Specialist', 'Ensure compliance with customs regulations, manage documentation, and coordinate with relevant authorities.', 'Aqaba Container Terminal', '2023-12-06 01:03:24', '2023-12-06 01:03:24', '2023-12-06 01:03:24', 'Customs regulations, compliance management, attention to detail', 1, 'Aqaba Container Terminal', 2, 'customs_specialist_image.jpg', 'Open', '2023-12-05 22:03:24', '2023-12-05 22:03:24'),
(37, 'Marina Operations Coordinator', 'Coordinate marina activities, manage dock reservations, and assist with events hosted at the marina.', 'Ayla Oasis', '2023-12-06 01:03:24', '2023-12-06 01:03:24', '2023-12-06 01:03:24', 'Marina management, customer service, event planning', 1, 'Ayla Oasis', 2, 'marina_coordinator_image.jpg', 'Open', '2023-12-05 22:03:24', '2023-12-05 22:03:24'),
(38, 'Dive Instructor', 'Instruct and guide individuals and groups in scuba diving activities, ensuring safety and adherence to diving protocols.', 'Ayla Oasis', '2023-12-06 01:03:24', '2023-12-06 01:03:24', '2023-12-06 01:03:24', 'Scuba diving certification, teaching, safety procedures', 1, 'Ayla Oasis', 2, 'dive_instructor_image.jpg', 'Open', '2023-12-05 22:03:24', '2023-12-05 22:03:24'),
(39, 'Marine Biologist', 'Conduct research on marine life, assess environmental impact, and contribute to conservation efforts within the Ayla Oasis area.', 'Ayla Oasis', '2023-12-06 01:03:24', '2023-12-06 01:03:24', '2023-12-06 01:03:24', 'Marine biology, research, environmental conservation', 1, 'Ayla Oasis', 2, 'marine_biologist_image.jpg', 'Open', '2023-12-05 22:03:24', '2023-12-05 22:03:24'),
(40, 'Dive Master', 'Lead dive excursions, ensure safety during dives, and provide guidance and assistance to divers.', 'Red Sea Dive Center', '2023-12-06 01:03:24', '2023-12-06 01:03:24', '2023-12-06 01:03:24', 'Scuba diving expertise, leadership, customer service', 1, 'Red Sea Dive Center', 2, 'dive_master_image.jpg', 'Open', '2023-12-05 22:03:24', '2023-12-05 22:03:24'),
(41, 'Dive Shop Manager', 'Manage dive shop operations, handle equipment sales, and coordinate with dive instructors.', 'Red Sea Dive Center', '2023-12-06 01:03:24', '2023-12-06 01:03:24', '2023-12-06 01:03:24', 'Retail management, scuba diving knowledge, customer service', 1, 'Red Sea Dive Center', 2, 'dive_shop_manager_image.jpg', 'Open', '2023-12-05 22:03:24', '2023-12-05 22:03:24'),
(42, 'Marine Tour Guide', 'Guide tourists on marine excursions, provide information on marine ecosystems, and ensure an enjoyable experience.', 'Red Sea Dive Center', '2023-12-06 01:03:24', '2023-12-06 01:03:24', '2023-12-06 01:03:24', 'Knowledge of marine life, tour guiding, communication', 1, 'Red Sea Dive Center', 2, 'marine_tour_guide_image.jpg', 'Open', '2023-12-05 22:03:24', '2023-12-05 22:03:24'),
(43, 'Water Sports Instructor', 'Instruct and guide individuals in water sports activities such as snorkeling, kayaking, and jet-skiing.', 'Seabreeze for Marine Trips and Sports', '2023-12-06 01:03:24', '2023-12-06 01:03:24', '2023-12-06 01:03:24', 'Water sports expertise, teaching, safety procedures', 1, 'Seabreeze for Marine Trips and Sports', 2, 'water_sports_instructor_image.jpg', 'Open', '2023-12-05 22:03:24', '2023-12-05 22:03:24'),
(44, 'Boat Captain', 'Operate boats for marine trips and sports activities, ensure passenger safety, and provide an informative and enjoyable experience.', 'Seabreeze for Marine Trips and Sports', '2023-12-06 01:03:24', '2023-12-06 01:03:24', '2023-12-06 01:03:24', 'Maritime navigation, boat handling, leadership', 1, 'Seabreeze for Marine Trips and Sports', 2, 'boat_captain_image.jpg', 'Open', '2023-12-05 22:03:24', '2023-12-05 22:03:24'),
(45, 'Sales and Marketing Coordinator', 'Develop and implement marketing strategies, coordinate sales efforts for marine trips and sports activities, and engage with potential customers.', 'Seabreeze for Marine Trips and Sports', '2023-12-06 01:03:24', '2023-12-06 01:03:24', '2023-12-06 01:03:24', 'Marketing, sales, communication', 1, 'Seabreeze for Marine Trips and Sports', 2, 'sales_marketing_coordinator_image.jpg', 'Open', '2023-12-05 22:03:24', '2023-12-05 22:03:24'),
(46, 'Coastal Development Project Manager', 'Oversee and manage coastal development projects, coordinate with contractors and stakeholders, and ensure project timelines and budgets are met.', 'Saraya', '2023-12-06 01:03:24', '2023-12-06 01:03:24', '2023-12-06 01:03:24', 'Project management, coastal development, stakeholder engagement', 1, 'Saraya', 2, 'project_manager_image.jpg', 'Open', '2023-12-05 22:03:24', '2023-12-05 22:03:24'),
(47, 'Environmental Compliance Specialist', 'Ensure compliance with environmental regulations, conduct assessments, and contribute to sustainable development practices.', 'Saraya', '2023-12-06 01:03:24', '2023-12-06 01:03:24', '2023-12-06 01:03:24', 'Environmental regulations, compliance management, research', 1, 'Saraya', 2, 'environmental_specialist_image.jpg', 'Open', '2023-12-05 22:03:24', '2023-12-05 22:03:24'),
(48, 'Harbor Security Officer', 'Oversee harbor security measures, conduct risk assessments, and implement safety protocols for the Saraya maritime area.', 'Saraya', '2023-12-06 01:03:24', '2023-12-06 01:03:24', '2023-12-06 01:03:24', 'Security management, maritime safety, risk assessment', 1, 'Saraya', 2, 'security_officer_image.jpg', 'Open', '2023-12-05 22:03:24', '2023-12-05 22:03:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
