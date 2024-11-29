-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2024 at 12:29 PM
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
-- Database: `loanlast`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_details`
--

CREATE TABLE `account_details` (
  `account_id` bigint(20) UNSIGNED NOT NULL,
  `loan_id` bigint(20) UNSIGNED NOT NULL,
  `cust_id` bigint(20) UNSIGNED NOT NULL,
  `bank_name` varchar(50) NOT NULL,
  `branch_address` text NOT NULL,
  `account_holder_name` varchar(200) NOT NULL,
  `account_number` varchar(200) NOT NULL,
  `Type_of_Account` varchar(50) NOT NULL,
  `account_oprete_since` varchar(200) NOT NULL,
  `ifsc_code` varchar(200) NOT NULL,
  `micr_code` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_details`
--

INSERT INTO `account_details` (`account_id`, `loan_id`, `cust_id`, `bank_name`, `branch_address`, `account_holder_name`, `account_number`, `Type_of_Account`, `account_oprete_since`, `ifsc_code`, `micr_code`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 'HDFC', 'Amalsad', 'Shivang Thakorbhai Patel', '74125863222', 'Saving', '2022', 'hdfc0135', 'oplo456', '2024-11-19 05:02:57', '2024-11-19 05:02:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `adjustables`
--

CREATE TABLE `adjustables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `loan_id` int(11) DEFAULT NULL,
  `cust_id` int(11) DEFAULT NULL,
  `charges_detail` varchar(255) NOT NULL,
  `percentage` decimal(8,2) DEFAULT NULL,
  `amount` decimal(15,2) DEFAULT NULL,
  `total_amount` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `adjustables`
--

INSERT INTO `adjustables` (`id`, `loan_id`, `cust_id`, `charges_detail`, `percentage`, `amount`, `total_amount`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 'Processing Fee', 12.00, 5400.00, '7750.00', '2024-11-27 03:46:39', '2024-11-27 05:19:30', NULL),
(2, 1, 1, 'GST', 5.00, 2250.00, '7750.00', '2024-11-27 03:46:39', '2024-11-27 05:19:30', NULL),
(3, 1, 1, 'Stamp Charges', NULL, 22.00, '7750.00', '2024-11-27 03:46:39', '2024-11-27 05:19:30', NULL),
(4, 1, 1, 'Insurance', NULL, 24.00, '7750.00', '2024-11-27 03:46:39', '2024-11-27 05:19:30', NULL),
(5, 1, 1, 'Existing Loan OutStading', NULL, 26.00, '7750.00', '2024-11-27 03:46:39', '2024-11-27 05:19:30', NULL),
(6, 1, 1, 'Broken Period Interest', NULL, 28.00, '7750.00', '2024-11-27 03:46:39', '2024-11-27 05:19:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cams`
--

CREATE TABLE `cams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `lon_id` bigint(20) UNSIGNED NOT NULL,
  `excel_uplod` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cams`
--

INSERT INTO `cams` (`id`, `customer_id`, `lon_id`, `excel_uplod`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '1732016282.xlsx', '2024-11-19 06:08:02', '2024-11-19 06:08:02');

-- --------------------------------------------------------

--
-- Table structure for table `countrycode`
--

CREATE TABLE `countrycode` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `state_name` varchar(100) NOT NULL,
  `state_code` varchar(50) NOT NULL,
  `country_code` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countrycode`
--

INSERT INTO `countrycode` (`id`, `state_name`, `state_code`, `country_code`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Andaman and Nicobar Islands', 'AN', 'IN-AN', '2024-04-16 08:33:03', '2024-04-16 08:33:03', NULL),
(2, 'Andhra Pradesh', 'AP', 'IN-AP', '2024-04-16 08:33:15', '2024-04-16 08:33:15', NULL),
(3, 'Arunachal Pradesh', 'AR', 'IN-AR', '2024-04-16 08:33:24', '2024-04-16 08:33:24', NULL),
(4, 'Assam', 'AS', 'IN-AS', '2024-04-16 08:34:01', '2024-04-16 08:34:01', NULL),
(5, 'Bihar', 'BR', 'IN-BR', '2024-04-16 08:34:34', '2024-04-16 08:34:34', NULL),
(6, 'Chandigarh', 'CH', 'IN-CH', '2024-04-16 08:35:07', '2024-04-16 08:35:07', NULL),
(7, 'Chattisgarh', 'CG', 'IN-CG', '2024-04-16 08:35:07', '2024-04-16 08:35:07', NULL),
(8, 'Dadra and Nagar Haveli', 'DN', 'IN-DH*', '2024-04-16 08:36:13', '2024-04-16 08:36:13', NULL),
(9, 'Daman and Diu', 'DD', 'IN-DH*', '2024-04-16 08:36:13', '2024-04-16 08:36:13', NULL),
(10, 'Delhi', 'DL', 'IN-DL', '2024-04-16 08:37:53', '2024-04-16 08:37:53', NULL),
(11, 'Goa', 'GA', 'IN-GA', '2024-04-16 08:37:53', '2024-04-16 08:37:53', NULL),
(12, 'Gujarat', 'GJ', 'IN-GJ', '2024-04-16 08:39:11', '2024-04-16 08:39:11', NULL),
(13, 'Haryana', 'HR', 'IN-HR', '2024-04-16 08:39:11', '2024-04-16 08:39:11', NULL),
(14, 'Himachal Pradesh', 'HP', 'IN-HP', '2024-04-16 08:40:04', '2024-04-16 08:40:04', NULL),
(15, 'Jammu and Kashmir', 'JK', 'IN-JK', '2024-04-16 08:40:04', '2024-04-16 08:40:04', NULL),
(16, 'Jharkhand', 'JH', 'IN-JH', '2024-04-16 08:41:08', '2024-04-16 08:41:08', NULL),
(17, 'Karnataka', 'KA', 'IN-KA', '2024-04-16 08:41:08', '2024-04-16 08:41:08', NULL),
(18, 'Kerala', 'KL', 'IN-KL', '2024-04-16 08:42:07', '2024-04-16 08:42:07', NULL),
(19, 'Ladakh', 'LA', 'IN-LA', '2024-04-16 08:42:07', '2024-04-16 08:42:07', NULL),
(20, 'Lakshadweep', 'LD', 'IN-LD', '2024-04-16 08:43:04', '2024-04-16 08:43:04', NULL),
(21, 'Madhya Pradesh', 'MP', 'IN-MP', '2024-04-16 08:43:04', '2024-04-16 08:43:04', NULL),
(22, 'Maharashtra', 'MH', 'IN-MH', '2024-04-16 08:44:04', '2024-04-16 08:44:04', NULL),
(23, 'Manipur', 'MN', 'IN-MN', '2024-04-16 08:44:04', '2024-04-16 08:44:04', NULL),
(24, 'Meghalaya', 'ML', 'IN-ML', '2024-04-16 08:45:45', '2024-04-16 08:45:45', NULL),
(25, 'Mizoram', 'MZ', 'IN-MZ', '2024-04-16 08:45:45', '2024-04-16 08:45:45', NULL),
(26, 'Nagaland', 'NL', 'IN-NL', '2024-04-16 08:47:05', '2024-04-16 08:47:05', NULL),
(27, 'Odisha', 'OR', 'IN-OD', '2024-04-16 08:47:05', '2024-04-16 08:47:05', NULL),
(28, 'Puducherry', 'PY', 'IN-PY', '2024-04-16 08:48:58', '2024-04-16 08:48:58', NULL),
(29, 'Punjab', 'PB', 'IN-PB', '2024-04-16 08:48:58', '2024-04-16 08:48:58', NULL),
(30, 'Rajasthan', 'RJ', 'IN-RJ', '2024-04-16 08:49:51', '2024-04-16 08:49:51', NULL),
(31, 'Sikkim', 'SK', 'IN-SK', '2024-04-16 08:49:51', '2024-04-16 08:49:51', NULL),
(32, 'Tamil Nadu', 'TN', 'IN-TN', '2024-04-16 08:50:53', '2024-04-16 08:50:53', NULL),
(33, 'Telangana', 'TS', 'IN-TS', '2024-04-16 08:50:53', '2024-04-16 08:50:53', NULL),
(34, 'Tripura', 'TR', 'IN-TR', '2024-04-16 08:51:53', '2024-04-16 08:51:53', NULL),
(35, 'Uttar Pradesh', 'UP', 'IN-UP', '2024-04-16 08:51:53', '2024-04-16 08:51:53', NULL),
(36, 'Uttarakhand', 'UA', 'IN-UK', '2024-04-16 08:53:07', '2024-04-16 08:53:07', NULL),
(37, 'West Bengal', 'WB', 'IN-WB', '2024-04-16 08:53:07', '2024-04-16 08:53:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `country_codes`
--

CREATE TABLE `country_codes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `co_customer_details`
--

CREATE TABLE `co_customer_details` (
  `co_cust_id` bigint(20) UNSIGNED NOT NULL,
  `loan_id` bigint(20) UNSIGNED NOT NULL,
  `cust_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(20) NOT NULL,
  `co_cust_name` text NOT NULL,
  `relation_with_applicant` enum('Partner','Director','Proprietor','Promoter','Karta','Benificiary','Others') NOT NULL,
  `applying_as_co_borrower` enum('Yes','No') NOT NULL,
  `father_or_spouse_name` varchar(50) NOT NULL,
  `shareholding_with_cust_entity` varchar(20) NOT NULL,
  `Date_of_Birth` date NOT NULL,
  `Gender` enum('Male','Female','Other') NOT NULL,
  `Marital_Status` enum('Married','UnMarried') NOT NULL,
  `Citizenship` varchar(20) NOT NULL,
  `Residential_Status` enum('Resident Individual','Non Resident India','Foreign National','Person of Indian Origin') NOT NULL,
  `Occupation_type` enum('Service','Business','Not categorized','Others') NOT NULL,
  `Different_from_Permanent_addess` enum('Yes','No') NOT NULL,
  `Current_Residence_Address` text NOT NULL,
  `Current_Landmark` varchar(100) NOT NULL,
  `Current_City` varchar(100) NOT NULL,
  `Current_District` varchar(100) NOT NULL,
  `Current_State` varchar(100) NOT NULL,
  `Current_pincode` int(11) NOT NULL,
  `Current_State_code` varchar(100) NOT NULL,
  `Current_Country_Code` varchar(100) NOT NULL,
  `Residence_Type` enum('Rented','Owned','Parental','Other') NOT NULL,
  `Current_Residences_years` varchar(50) NOT NULL,
  `Address_as_per_proof` enum('Yes','No') NOT NULL,
  `Permanent_Residence_Address` text NOT NULL,
  `Permanent_Landmark` varchar(100) NOT NULL,
  `Permanent_City` varchar(100) NOT NULL,
  `Permanent_District` varchar(100) NOT NULL,
  `Permanent_State` varchar(100) NOT NULL,
  `Permanent_pincode` int(11) NOT NULL,
  `Permanent_State_code` varchar(100) NOT NULL,
  `Permanent_Country_Code` varchar(100) NOT NULL,
  `co_cust_Mobile_no` varchar(20) NOT NULL,
  `co_cust_email` varchar(50) NOT NULL,
  `co_cust_pannumber` varchar(50) NOT NULL,
  `co_cust_Form_60` enum('Yes','No') NOT NULL,
  `co_cust_adharnumber` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `credits`
--

CREATE TABLE `credits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `lon_id` bigint(20) UNSIGNED NOT NULL,
  `cam_uplod` varchar(255) NOT NULL,
  `final_uplod` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `credits`
--

INSERT INTO `credits` (`id`, `customer_id`, `lon_id`, `cam_uplod`, `final_uplod`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '1732016425.xlsx', '1732016425.xlsx', '2024-11-19 06:10:25', '2024-11-19 06:10:25'),
(2, 1, 1, '1732018886.xlsx', '1732018886.xlsx', '2024-11-19 06:51:26', '2024-11-19 06:51:26');

-- --------------------------------------------------------

--
-- Table structure for table `creditstage`
--

CREATE TABLE `creditstage` (
  `credit_id` bigint(20) UNSIGNED NOT NULL,
  `loan_id` bigint(20) UNSIGNED NOT NULL,
  `cust__id` bigint(20) UNSIGNED NOT NULL,
  `requested_amount` varchar(20) NOT NULL,
  `requested_tenure` varchar(10) NOT NULL,
  `sanctioned_amount` varchar(50) NOT NULL,
  `maximum_sanctioned_amount` varchar(50) DEFAULT NULL,
  `sanctioned_tenure` varchar(50) NOT NULL,
  `maximum_sanctioned_tenure` varchar(50) DEFAULT NULL,
  `sanctionedInterest` varchar(50) NOT NULL,
  `policyrate` varchar(50) NOT NULL,
  `applicable_rate` varchar(50) NOT NULL,
  `reason` varchar(200) DEFAULT NULL,
  `application` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `creditstage`
--

INSERT INTO `creditstage` (`credit_id`, `loan_id`, `cust__id`, `requested_amount`, `requested_tenure`, `sanctioned_amount`, `maximum_sanctioned_amount`, `sanctioned_tenure`, `maximum_sanctioned_tenure`, `sanctionedInterest`, `policyrate`, `applicable_rate`, `reason`, `application`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, '50000', '24', '45000', NULL, '24', NULL, '15', '15', '15', 'ffffffkjjjjjjjjjjjjjjjeeeeeeeeeeeeeee', 'Approve', '2024-11-19 06:50:42', '2024-11-19 06:50:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer_details`
--

CREATE TABLE `customer_details` (
  `cust_id` bigint(20) UNSIGNED NOT NULL,
  `loan_id` bigint(20) UNSIGNED NOT NULL,
  `cust_name` varchar(100) NOT NULL,
  `cust_entity_type` varchar(255) NOT NULL,
  `Date_of_Incorporation` date NOT NULL,
  `Principal_office_address` text NOT NULL,
  `Principal_City` varchar(50) NOT NULL,
  `Principal_District` varchar(50) NOT NULL,
  `Principal_State` varchar(50) NOT NULL,
  `Principal_pincode` varchar(20) NOT NULL,
  `Principal_State_code` varchar(5) NOT NULL,
  `Principal_Country_Code` varchar(5) NOT NULL,
  `Permanent_office_address` text NOT NULL,
  `Permanent_City` varchar(50) NOT NULL,
  `Permanent_District` varchar(50) NOT NULL,
  `Permanent_State` varchar(50) NOT NULL,
  `Permanent_pincode` varchar(20) NOT NULL,
  `Permanent_State_code` varchar(5) NOT NULL,
  `Permanent_Country_Code` varchar(5) NOT NULL,
  `Place_of_incorporation` varchar(100) NOT NULL,
  `cust_Telephone` varchar(20) NOT NULL,
  `cust_email` varchar(50) NOT NULL,
  `Type_of_Industry` varchar(40) NOT NULL,
  `Segment` varchar(40) NOT NULL,
  `cust_gst` varchar(20) NOT NULL,
  `cust_pannumber` varchar(40) NOT NULL,
  `docu_uplod` varchar(20) DEFAULT NULL,
  `Form_60` enum('YES','NO') NOT NULL,
  `Overall_Business_Vintage` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_details`
--

INSERT INTO `customer_details` (`cust_id`, `loan_id`, `cust_name`, `cust_entity_type`, `Date_of_Incorporation`, `Principal_office_address`, `Principal_City`, `Principal_District`, `Principal_State`, `Principal_pincode`, `Principal_State_code`, `Principal_Country_Code`, `Permanent_office_address`, `Permanent_City`, `Permanent_District`, `Permanent_State`, `Permanent_pincode`, `Permanent_State_code`, `Permanent_Country_Code`, `Place_of_incorporation`, `cust_Telephone`, `cust_email`, `Type_of_Industry`, `Segment`, `cust_gst`, `cust_pannumber`, `docu_uplod`, `Form_60`, `Overall_Business_Vintage`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Shivang', 'Proprietorship', '2024-11-20', 'Dambher', 'Adada', 'Navsari', 'Gujarat', '396445', 'GJ', 'IN-GJ', 'Dambher', 'Adada', 'Navsari', 'Gujarat', '396445', 'GJ', 'IN-GJ', '105, manek bhavan Kailash road Valsad, valsad,gujarat 396001', '9687758595', 'patelshivang810@gmail.com', 'cement', 'Trading', 'abcd456987', 'ABGPP6638J', NULL, 'YES', 'yes', '2024-11-19 04:26:52', '2024-11-19 04:34:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer_reference`
--

CREATE TABLE `customer_reference` (
  `ref_id` bigint(20) UNSIGNED NOT NULL,
  `loan_id` bigint(20) UNSIGNED NOT NULL,
  `cust_id` bigint(20) UNSIGNED NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Address` text NOT NULL,
  `City` varchar(50) NOT NULL,
  `pincode` varchar(200) NOT NULL,
  `State` varchar(50) NOT NULL,
  `Country` varchar(50) NOT NULL,
  `Phone` varchar(255) NOT NULL,
  `Mobile` varchar(255) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Relation_with_applicant` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_reference`
--

INSERT INTO `customer_reference` (`ref_id`, `loan_id`, `cust_id`, `Name`, `Address`, `City`, `pincode`, `State`, `Country`, `Phone`, `Mobile`, `Email`, `Relation_with_applicant`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 1, 1, 'Shiv', 'Dambher', 'Navsari', '396445', 'Gujarat', 'Gujarat', '9687758595', '9687758595', 'admin@gmail.com', 'brother', '2024-11-19 05:03:54', '2024-11-19 05:03:54', NULL),
(3, 1, 1, 'AMITKUMAR PATEL', 'Manek Smruti\r\nParvati Baug vijalpore', 'Navsari', '396450', 'Gujarat', 'India', '9724287681', '9724287681', 'shi@gmail.com', 'brother', '2024-11-19 05:03:54', '2024-11-19 05:03:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `disbursal_details`
--

CREATE TABLE `disbursal_details` (
  `disbursal_id` int(11) NOT NULL,
  `loan_id` int(11) DEFAULT NULL,
  `cust_id` int(11) NOT NULL,
  `sanction_amount` varchar(255) DEFAULT NULL,
  `sanction_date` date DEFAULT NULL,
  `tenure` varchar(255) DEFAULT NULL,
  `roi` varchar(255) DEFAULT NULL,
  `app_disbursal_amount` varchar(255) DEFAULT NULL,
  `app_adjustment_amount` varchar(255) DEFAULT NULL,
  `disbursal_type` varchar(255) DEFAULT NULL,
  `application_status` varchar(255) DEFAULT NULL,
  `loan_account_number` varchar(255) DEFAULT NULL,
  `disbursal_date` date DEFAULT NULL,
  `disbursal_amount` varchar(255) DEFAULT NULL,
  `adjustment_amount` varchar(255) DEFAULT NULL,
  `actual_payment_amount` varchar(255) DEFAULT NULL,
  `bussiness_partner_type` varchar(255) DEFAULT NULL,
  `bussiness_partner_name_appant_id` varchar(255) DEFAULT NULL,
  `bussiness_partner_name_appant_name` varchar(255) DEFAULT NULL,
  `bussiness_disbursal_amount` varchar(255) DEFAULT NULL,
  `bussiness_adjustment_amount` varchar(255) DEFAULT NULL,
  `payment_amount` varchar(255) DEFAULT NULL,
  `effective_payment_date` varchar(255) DEFAULT NULL,
  `payment_mode` varchar(255) DEFAULT NULL,
  `business_partner_type` varchar(255) DEFAULT NULL,
  `beneficiary_name` varchar(255) DEFAULT NULL,
  `business_acccount_type` varchar(255) DEFAULT NULL,
  `beneficiary_account_number` varchar(255) DEFAULT NULL,
  `bankvalidation` varchar(255) DEFAULT NULL,
  `bankdealing` varchar(255) DEFAULT NULL,
  `bankcode` varchar(255) DEFAULT NULL,
  `bankName` varchar(255) DEFAULT NULL,
  `branch` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `disbursal_details`
--

INSERT INTO `disbursal_details` (`disbursal_id`, `loan_id`, `cust_id`, `sanction_amount`, `sanction_date`, `tenure`, `roi`, `app_disbursal_amount`, `app_adjustment_amount`, `disbursal_type`, `application_status`, `loan_account_number`, `disbursal_date`, `disbursal_amount`, `adjustment_amount`, `actual_payment_amount`, `bussiness_partner_type`, `bussiness_partner_name_appant_id`, `bussiness_partner_name_appant_name`, `bussiness_disbursal_amount`, `bussiness_adjustment_amount`, `payment_amount`, `effective_payment_date`, `payment_mode`, `business_partner_type`, `beneficiary_name`, `business_acccount_type`, `beneficiary_account_number`, `bankvalidation`, `bankdealing`, `bankcode`, `bankName`, `branch`, `location`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, '45000', '2024-11-19', '24', '15', '37250', '7750.00', 'Single', 'Not Disbursed', NULL, NULL, '37250', '7750.00', '37250', 'BORROWER', NULL, 'Shivang', '37250', '7750.00', '37250', NULL, 'Open this select menu', 'Open this select menu', 'Shivang Thakorbhai Patel', 'cc', '74125863222', 'fgrfg', 'rffrttg', 'hdfc0135', 'HDFC', 'Amalsad', 'navsari', '2024-11-23 04:47:17', '2024-11-27 05:19:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `lon_id` bigint(20) UNSIGNED NOT NULL,
  `proprietor_id` bigint(200) DEFAULT NULL,
  `identity_proof` varchar(255) DEFAULT NULL,
  `bank_statement` varchar(255) DEFAULT NULL,
  `salary_slip` varchar(255) DEFAULT NULL,
  `business_proof` varchar(200) DEFAULT NULL,
  `adresss_proof` varchar(200) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `customer_id`, `lon_id`, `proprietor_id`, `identity_proof`, `bank_statement`, `salary_slip`, `business_proof`, `adresss_proof`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '1732016962.png', '1732013298.pdf', '1732013298.pdf', '1732013298.pdf', '1732013298.pdf', '1', '2024-11-19 05:18:18', '2024-11-19 06:19:22'),
(2, 1, 1, 2, '1732013734.png', '1732013734.csv', '1732013734.csv', '1732013734.csv', '1732013734.csv', '1', '2024-11-19 05:25:34', '2024-11-19 05:25:34');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `form_offices`
--

CREATE TABLE `form_offices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loan_application`
--

CREATE TABLE `loan_application` (
  `loan_id` bigint(20) UNSIGNED NOT NULL,
  `ckyc_no` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `Prospect_No` varchar(20) NOT NULL,
  `Months` varchar(10) NOT NULL,
  `Loan_Amount` varchar(50) NOT NULL,
  `Purpose` varchar(50) NOT NULL,
  `Application_Type` varchar(100) NOT NULL,
  `Account_Type` varchar(100) NOT NULL,
  `app_status` enum('','office approved','document pending','cam approved','credit approved','document done') NOT NULL,
  `lon_type` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loan_application`
--

INSERT INTO `loan_application` (`loan_id`, `ckyc_no`, `date`, `customer_id`, `Prospect_No`, `Months`, `Loan_Amount`, `Purpose`, `Application_Type`, `Account_Type`, `app_status`, `lon_type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'SP260193', '2024-11-19', 1, 'FD0119112024', '24', '50000', 'personal', 'new', 'normal', 'credit approved', 'personal', '2024-11-19 04:25:25', '2024-11-21 04:40:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(31, '2014_10_12_000000_create_users_table', 1),
(32, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(33, '2019_08_19_000000_create_failed_jobs_table', 1),
(34, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(35, '2024_03_11_055021_create_permission_tables', 1),
(36, '2024_04_03_063551_create_loan_application_table', 2),
(37, '2024_04_03_070055_create_customer_details_table', 3),
(38, '2024_04_03_074813_create_proprietor_details_table', 4),
(39, '2024_04_03_101730_create_co_customer_details_table', 5),
(40, '2024_04_03_105221_create_partners_details_table', 6),
(41, '2024_04_03_122917_create_account_details_table', 7),
(42, '2024_04_03_123727_create_customer_reference_table', 8),
(43, '2024_04_04_114557_create_form_offices_table', 9),
(44, '2024_04_04_115737_add_column_to_loan_application_table', 9),
(45, '2024_04_04_120002_add_column_to_loan_application_table', 10),
(46, '2024_04_12_085901_add_column_to_account_details_table', 11),
(47, '2024_04_12_090117_add_column_to_account_details_table', 12),
(48, '2024_04_12_111854_create_references_table', 13),
(49, '2024_04_16_082301_create_countrycode_table', 13),
(50, '2024_04_16_093611_create_country_codes_table', 14),
(51, '2024_05_27_053356_create_documents_table', 14),
(52, '2024_05_27_131421_create_cams_table', 15),
(53, '2024_05_31_113912_create_credits_table', 16),
(54, '2024_06_29_075819_create_creditstage_table', 17),
(55, '2024_11_23_115943_create_adjustables_table', 18);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 3),
(3, 'App\\Models\\User', 4),
(6, 'App\\Models\\User', 7),
(7, 'App\\Models\\User', 9),
(7, 'App\\Models\\User', 10);

-- --------------------------------------------------------

--
-- Table structure for table `partners_details`
--

CREATE TABLE `partners_details` (
  `co_partner_id` bigint(20) UNSIGNED NOT NULL,
  `loan_id` bigint(20) UNSIGNED NOT NULL,
  `cust_id` bigint(20) UNSIGNED NOT NULL,
  `partners_name` text NOT NULL,
  `Date_of_Birth` date NOT NULL,
  `partners_pannumber` varchar(50) NOT NULL,
  `partners_Residence_Address` text NOT NULL,
  `partners_Mobile_no` varchar(20) NOT NULL,
  `partners_workexp` varchar(20) NOT NULL,
  `shareholding_with_cust_entity` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `partners_details`
--

INSERT INTO `partners_details` (`co_partner_id`, `loan_id`, `cust_id`, `partners_name`, `Date_of_Birth`, `partners_pannumber`, `partners_Residence_Address`, `partners_Mobile_no`, `partners_workexp`, `shareholding_with_cust_entity`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 1, 'SURAJ', '1970-01-01', '5242521452', 'surat', '7485258585', '2', '20', '2024-11-18 02:28:36', '2024-11-18 02:28:36', NULL),
(2, 2, 1, 'MEET', '1970-01-01', '5242521452', 'navsari', '8523854585', '2', '20', '2024-11-18 02:28:36', '2024-11-18 02:28:36', NULL),
(3, 2, 1, 'SHIVANG', '1970-01-01', '5242521452', 'surat', '8523854585', '2', '20', '2024-11-18 02:28:36', '2024-11-18 02:28:36', NULL),
(13, 1, 1, 'SHIVANG PATEL', '1993-01-26', 'polo4569po1', 'Dambher', '9687758594', '2', '10', '2024-11-19 05:01:02', '2024-11-19 05:01:02', NULL),
(14, 1, 1, 'BHAVIK', '1990-12-25', 'polo4569po1', 'Parvati Baug vijalpore', '9988776654', '2', '10', '2024-11-19 05:01:02', '2024-11-19 05:01:02', NULL),
(15, 1, 1, 'AMITKUMAR P', '1989-01-26', 'polo4569po1', 'navsari', '8877556694', '2', '10', '2024-11-19 05:01:02', '2024-11-19 05:01:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'User access', 'web', '2024-03-13 00:37:35', '2024-03-13 00:37:35'),
(2, 'User edit', 'web', '2024-03-13 00:37:35', '2024-03-13 00:37:35'),
(3, 'User create', 'web', '2024-03-13 00:37:35', '2024-03-13 00:37:35'),
(4, 'User delete', 'web', '2024-03-13 00:37:36', '2024-03-13 00:37:36'),
(5, 'Role access', 'web', '2024-03-13 00:37:36', '2024-03-13 00:37:36'),
(6, 'Role edit', 'web', '2024-03-13 00:37:36', '2024-03-13 00:37:36'),
(7, 'Role create', 'web', '2024-03-13 00:37:36', '2024-03-13 00:37:36'),
(8, 'Role delete', 'web', '2024-03-13 00:37:36', '2024-03-13 00:37:36'),
(9, 'Permission access', 'web', '2024-03-13 00:37:36', '2024-03-13 00:37:36'),
(10, 'Permission edit', 'web', '2024-03-13 00:37:36', '2024-03-13 00:37:36'),
(11, 'Permission create', 'web', '2024-03-13 00:37:36', '2024-03-13 00:37:36'),
(12, 'Permission delete', 'web', '2024-03-13 00:37:36', '2024-03-13 00:37:36'),
(13, 'Application access', 'web', '2024-05-27 03:22:36', '2024-05-27 03:40:26'),
(14, 'Application Create', 'web', '2024-05-27 03:39:45', '2024-05-27 03:39:45'),
(15, 'Document access', 'web', '2024-05-27 07:17:56', '2024-05-27 07:32:44');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `proprietor_details`
--

CREATE TABLE `proprietor_details` (
  `proprietor_id` bigint(20) UNSIGNED NOT NULL,
  `loan_id` bigint(20) UNSIGNED NOT NULL,
  `cust_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(20) NOT NULL,
  `proprietor_name` text NOT NULL,
  `relation_with_applicant` enum('Partner','Director','Proprietor','Promoter','Karta','Benificiary','Others') NOT NULL,
  `applying_as_co_borrower` enum('Partner','No') NOT NULL,
  `father_or_spouse_name` varchar(50) NOT NULL,
  `shareholding_with_cust_entity` varchar(20) NOT NULL,
  `Date_of_Birth` date NOT NULL,
  `Gender` enum('Male','Female','Other') NOT NULL,
  `Marital_Status` varchar(200) DEFAULT NULL,
  `Citizenship` varchar(20) NOT NULL,
  `Residential_Status` enum('Resident Individual','Non Resident India','Foreign National','Person of Indian Origin') NOT NULL,
  `Occupation_type` enum('Service','Business','Not categorized','Others') NOT NULL,
  `Different_from_Permanent_addess` enum('Yes','No') NOT NULL,
  `Current_Residence_Address` text NOT NULL,
  `Current_Landmark` varchar(100) NOT NULL,
  `Current_City` varchar(100) NOT NULL,
  `Current_District` varchar(100) NOT NULL,
  `Current_State` varchar(100) NOT NULL,
  `Current_pincode` int(11) NOT NULL,
  `Current_State_code` varchar(100) NOT NULL,
  `Current_Country_Code` varchar(100) NOT NULL,
  `Residence_Type` enum('Rented','Owned','Parental','Other') NOT NULL,
  `Current_Residences_years` varchar(50) DEFAULT NULL,
  `Address_as_per_proof` varchar(200) DEFAULT NULL,
  `Permanent_Residence_Address` text NOT NULL,
  `Permanent_Landmark` varchar(100) NOT NULL,
  `Permanent_City` varchar(100) NOT NULL,
  `Permanent_District` varchar(100) NOT NULL,
  `Permanent_State` varchar(100) NOT NULL,
  `Permanent_pincode` int(11) NOT NULL,
  `Permanent_State_code` varchar(100) NOT NULL,
  `Permanent_Country_Code` varchar(100) NOT NULL,
  `proprietor_Mobile_no` varchar(20) NOT NULL,
  `proprietor_email` varchar(50) NOT NULL,
  `proprietor_pannumber` varchar(50) NOT NULL,
  `docu_uplod` varchar(20) DEFAULT NULL,
  `proprietor_Form_60` enum('Yes','No') NOT NULL,
  `proprietor_adharnumber` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `proprietor_details`
--

INSERT INTO `proprietor_details` (`proprietor_id`, `loan_id`, `cust_id`, `title`, `proprietor_name`, `relation_with_applicant`, `applying_as_co_borrower`, `father_or_spouse_name`, `shareholding_with_cust_entity`, `Date_of_Birth`, `Gender`, `Marital_Status`, `Citizenship`, `Residential_Status`, `Occupation_type`, `Different_from_Permanent_addess`, `Current_Residence_Address`, `Current_Landmark`, `Current_City`, `Current_District`, `Current_State`, `Current_pincode`, `Current_State_code`, `Current_Country_Code`, `Residence_Type`, `Current_Residences_years`, `Address_as_per_proof`, `Permanent_Residence_Address`, `Permanent_Landmark`, `Permanent_City`, `Permanent_District`, `Permanent_State`, `Permanent_pincode`, `Permanent_State_code`, `Permanent_Country_Code`, `proprietor_Mobile_no`, `proprietor_email`, `proprietor_pannumber`, `docu_uplod`, `proprietor_Form_60`, `proprietor_adharnumber`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 1, 1, 'mr', 'Amit patel', 'Partner', 'Partner', 'thakorbhai', '10', '1989-01-19', 'Male', 'Single', 'Indian', 'Resident Individual', 'Service', 'Yes', 'Manek Smruti', 'gandhi bridge', 'Eru', 'Navsari', 'Gujarat', 396450, 'GJ', 'IN-GJ', 'Rented', NULL, '', 'Manek Smruti', 'gandhi bridge', '', 'Navsari', 'Gujarat', 396450, 'GJ', 'IN-GJ', '9687758595', 'sssss@gmail.com', 'asdc74589', NULL, 'Yes', '741025803690', '2024-11-19 05:20:36', '2024-11-19 05:20:36', NULL),
(3, 1, 1, 'mr', 'Bhupendra patil', 'Partner', 'Partner', 'thakorbhai', '10', '1989-01-19', 'Male', 'Single', 'Indian', 'Resident Individual', 'Service', 'Yes', 'Manek Smruti', 'gandhi bridge', 'Eru', 'Navsari', 'Gujarat', 396450, 'GJ', 'IN-GJ', 'Rented', NULL, '', 'Manek Smruti', 'gandhi bridge', '', 'Navsari', 'Gujarat', 396450, 'GJ', 'IN-GJ', '9687758595', 'sssss@gmail.com', 'asdc74589', NULL, 'Yes', '741025803690', '2024-11-19 05:20:36', '2024-11-19 05:20:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `references`
--

CREATE TABLE `references` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `repeyment_details`
--

CREATE TABLE `repeyment_details` (
  `repayment_id` int(11) NOT NULL,
  `loan_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `application_amount` varchar(50) NOT NULL,
  `disbursal_type` varchar(50) NOT NULL,
  `number_od_disbursal` varchar(50) NOT NULL,
  `disbursal_to` varchar(50) NOT NULL,
  `recovery_type` varchar(50) NOT NULL,
  `recovery_sub_type` varchar(50) NOT NULL,
  `repayment_type` varchar(50) NOT NULL,
  `repayment_frequency` varchar(50) NOT NULL,
  `tenure` varchar(50) NOT NULL,
  `tenure_in` varchar(50) NOT NULL,
  `installment_type` varchar(100) NOT NULL,
  `installment_based_on` varchar(100) NOT NULL,
  `installment_mode` varchar(100) NOT NULL,
  `number_of_advance_installment` varchar(20) NOT NULL,
  `total_number_of_installment` varchar(20) NOT NULL,
  `policy_rate` varchar(10) NOT NULL,
  `rate` varchar(10) NOT NULL,
  `spread` varchar(20) NOT NULL,
  `due_day` varchar(10) NOT NULL,
  `interest_startdate` date NOT NULL,
  `first_installment_date` date NOT NULL,
  `broken_period_adjustment` enum('Yes','No','','') NOT NULL,
  `interest_charge_type` varchar(50) NOT NULL,
  `interest_charged` varchar(50) NOT NULL,
  `actual_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `repeyment_details`
--

INSERT INTO `repeyment_details` (`repayment_id`, `loan_id`, `cust_id`, `application_amount`, `disbursal_type`, `number_od_disbursal`, `disbursal_to`, `recovery_type`, `recovery_sub_type`, `repayment_type`, `repayment_frequency`, `tenure`, `tenure_in`, `installment_type`, `installment_based_on`, `installment_mode`, `number_of_advance_installment`, `total_number_of_installment`, `policy_rate`, `rate`, `spread`, `due_day`, `interest_startdate`, `first_installment_date`, `broken_period_adjustment`, `interest_charge_type`, `interest_charged`, `actual_date`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 0, '50000', 'Two', '12', 'Customer', 'Interest', 'Non_Revolving', 'Only_Principal', 'Yearly', '24', 'Month', 'Equated installment', 'Rate Base', 'Arrears', '11', '11', '15', '15', '16', '7', '2024-11-21', '2024-11-22', 'Yes', 'Yes', 'Three', '2024-11-23', '2024-11-20 07:47:44', '2024-11-22 06:46:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2024-03-13 00:37:35', '2024-03-13 00:37:35'),
(2, 'Manager', 'web', '2024-03-13 00:37:35', '2024-03-13 00:37:35'),
(3, 'CA', 'web', '2024-03-13 00:37:35', '2024-03-13 00:37:35'),
(6, 'Ca456', 'web', '2024-03-13 02:02:59', '2024-03-13 02:02:59'),
(7, 'Myone', 'web', '2024-03-16 00:18:42', '2024-03-16 00:18:42');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 7),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(4, 1),
(4, 2),
(4, 7),
(5, 1),
(5, 2),
(5, 7),
(6, 1),
(6, 2),
(7, 1),
(7, 2),
(8, 1),
(9, 1),
(9, 2),
(9, 6),
(10, 1),
(11, 1),
(12, 1),
(12, 6),
(13, 1),
(13, 7),
(15, 1),
(15, 2),
(15, 7);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Admin', 'admin@admin.in', NULL, '$2y$12$RFTGRHf4L0qR7r3IROyz8eEA1Lmj9fguMtJIG3H0CSaofB3s5vrWm', NULL, '2024-03-13 00:37:34', '2024-03-13 00:37:34'),
(3, 'Manager', 'manager@manager.in', NULL, '$2y$12$uzDLGLL4O8TVKAHyWDYV3uviqjjEYiq7HXob8.k/qPTddWnbdSC4W', NULL, '2024-03-13 00:37:34', '2024-03-13 00:37:34'),
(4, 'CA', 'caca@caca.in', NULL, '$2y$12$nnxp6KptTWkAuaCf8dN3F.DCUN/1H0TQh.K6waKkTeJ8io11fAsne', NULL, '2024-03-13 00:37:35', '2024-03-13 00:37:35'),
(9, 'shivang', 'shivang@gmail.com', NULL, '$2y$12$kghQItlZKob5JLg1uvO3yObxV7LoGtwoKpWzdL0X2.nTvzC0sVVp2', NULL, '2024-03-16 00:18:08', '2024-03-16 00:18:08'),
(10, 'Document', 'Document@gmail.com', NULL, '$2y$12$pZ..8UEuvA2I9uf8/fcK.eNP1/ti4pKnuzDNhhnNVWmt8E8/s5/wi', NULL, '2024-05-27 03:45:20', '2024-05-27 03:45:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_details`
--
ALTER TABLE `account_details`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `adjustables`
--
ALTER TABLE `adjustables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cams`
--
ALTER TABLE `cams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countrycode`
--
ALTER TABLE `countrycode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country_codes`
--
ALTER TABLE `country_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `co_customer_details`
--
ALTER TABLE `co_customer_details`
  ADD PRIMARY KEY (`co_cust_id`);

--
-- Indexes for table `credits`
--
ALTER TABLE `credits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `creditstage`
--
ALTER TABLE `creditstage`
  ADD PRIMARY KEY (`credit_id`);

--
-- Indexes for table `customer_details`
--
ALTER TABLE `customer_details`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `customer_reference`
--
ALTER TABLE `customer_reference`
  ADD PRIMARY KEY (`ref_id`);

--
-- Indexes for table `disbursal_details`
--
ALTER TABLE `disbursal_details`
  ADD PRIMARY KEY (`disbursal_id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `form_offices`
--
ALTER TABLE `form_offices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_application`
--
ALTER TABLE `loan_application`
  ADD PRIMARY KEY (`loan_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `partners_details`
--
ALTER TABLE `partners_details`
  ADD PRIMARY KEY (`co_partner_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `proprietor_details`
--
ALTER TABLE `proprietor_details`
  ADD PRIMARY KEY (`proprietor_id`);

--
-- Indexes for table `references`
--
ALTER TABLE `references`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `repeyment_details`
--
ALTER TABLE `repeyment_details`
  ADD PRIMARY KEY (`repayment_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_details`
--
ALTER TABLE `account_details`
  MODIFY `account_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `adjustables`
--
ALTER TABLE `adjustables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `cams`
--
ALTER TABLE `cams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `countrycode`
--
ALTER TABLE `countrycode`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `country_codes`
--
ALTER TABLE `country_codes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `co_customer_details`
--
ALTER TABLE `co_customer_details`
  MODIFY `co_cust_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `credits`
--
ALTER TABLE `credits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `creditstage`
--
ALTER TABLE `creditstage`
  MODIFY `credit_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer_details`
--
ALTER TABLE `customer_details`
  MODIFY `cust_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer_reference`
--
ALTER TABLE `customer_reference`
  MODIFY `ref_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `disbursal_details`
--
ALTER TABLE `disbursal_details`
  MODIFY `disbursal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `form_offices`
--
ALTER TABLE `form_offices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loan_application`
--
ALTER TABLE `loan_application`
  MODIFY `loan_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `partners_details`
--
ALTER TABLE `partners_details`
  MODIFY `co_partner_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `proprietor_details`
--
ALTER TABLE `proprietor_details`
  MODIFY `proprietor_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `references`
--
ALTER TABLE `references`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `repeyment_details`
--
ALTER TABLE `repeyment_details`
  MODIFY `repayment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
