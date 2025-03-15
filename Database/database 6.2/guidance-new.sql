/*
 Navicat Premium Dump SQL

 Source Server         : miste_ry
 Source Server Type    : MySQL
 Source Server Version : 100432 (10.4.32-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : guidance-new

 Target Server Type    : MySQL
 Target Server Version : 100432 (10.4.32-MariaDB)
 File Encoding         : 65001

 Date: 15/03/2025 23:44:56
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin_table
-- ----------------------------
DROP TABLE IF EXISTS `admin_table`;
CREATE TABLE `admin_table`  (
  `AdminId` int NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `LastName` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `PhoneNumber` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `DateOfBirth` date NULL DEFAULT NULL,
  `Gender` enum('Male','Female','Non-Binary','Other','Prefer not to say') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ProfilePictureURL` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `Bio` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `Username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `Password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `Archive` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `Admin_Id` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `Address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`AdminId`) USING BTREE,
  UNIQUE INDEX `Email`(`Email` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin_table
-- ----------------------------
INSERT INTO `admin_table` VALUES (1, 'Johnmy', 'Data', 'encoder@gmail.com', '22222222222', '2024-12-11', 'Male', NULL, NULL, 'asd', 'asds', 'No', '1', 'CITY HEIGHT');
INSERT INTO `admin_table` VALUES (2, 'Johnmy', 'Data', 'admin@gmail.com', '22222222222', '2024-12-11', 'Male', NULL, NULL, 'asd', 'asds', 'No', '1', 'CITY HEIGHT');
INSERT INTO `admin_table` VALUES (3, 'Johnmy', 'Data', 'admisn@gmail.com', '22222222222', '2024-12-11', 'Male', NULL, NULL, 'asd', 'asds', 'No', '1', 'CITY HEIGHT');
INSERT INTO `admin_table` VALUES (4, 'Johnmy', 'Data', 'admin@gmail.coms', '22222222222', '2024-12-11', 'Male', NULL, NULL, 'asd', 'asds', 'No', '0000001', 'CITY HEIGHT');
INSERT INTO `admin_table` VALUES (5, 'Johnmyr', 'Data', 'evaluator@gmail.com', '11111111111', '2024-12-18', 'Male', NULL, NULL, 'luffy', 'luffy', 'Yes', '0000002', 'gensan davao');
INSERT INTO `admin_table` VALUES (6, 'sample', 'sample', 'sample@gmail.com', '11111111111', '2024-12-01', 'Male', NULL, NULL, 'sad', '@Iysfuresaill12', 'No', '0000003', 'CITY HEIGHTS');
INSERT INTO `admin_table` VALUES (7, 'Johnmyr', 'Data', 'admins@gmail.com', '12312312312', '2024-12-09', 'Female', NULL, NULL, 'as', '@Iysfuresaill12', 'No', '0000004', 'asdddddddddddd');
INSERT INTO `admin_table` VALUES (8, 'sampless', 'sampless', 'sample5@gmail.cojm', '11111111111', '2025-01-28', 'Male', NULL, NULL, 'sample', '@Iysfuresaill12', 'No', '0000005', 'CITY HEIGHTS');

-- ----------------------------
-- Table structure for appointments
-- ----------------------------
DROP TABLE IF EXISTS `appointments`;
CREATE TABLE `appointments`  (
  `Appointment_Id` int NOT NULL AUTO_INCREMENT,
  `Counselor_Id` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Appointment_Time` time NOT NULL,
  `Appointment_Date` date NOT NULL,
  `Reason_for_Appointment` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Treatment` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Patient_Id` int NULL DEFAULT NULL,
  `Status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `Diagnosed` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `Referral` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `Appointment_Type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`Appointment_Id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of appointments
-- ----------------------------

-- ----------------------------
-- Table structure for counselor_table
-- ----------------------------
DROP TABLE IF EXISTS `counselor_table`;
CREATE TABLE `counselor_table`  (
  `CounselorId` int NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `LastName` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `PhoneNumber` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `DateOfBirth` date NULL DEFAULT NULL,
  `Gender` enum('Male','Female','Non-Binary','Other','Prefer not to say') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ProfilePictureURL` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `Bio` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `Username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `Password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `Archive` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `Counselor_Id` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `Address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `Validity_Period` date NULL DEFAULT NULL,
  `Licensed_No` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `Education_Bg` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `Specialization` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`CounselorId`) USING BTREE,
  UNIQUE INDEX `Email`(`Email` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of counselor_table
-- ----------------------------
INSERT INTO `counselor_table` VALUES (1, 'samples', 'sample', 'sample@gmail.com', '11111111111', '2024-12-02', 'Female', NULL, NULL, 'sample', '@Iysfuresaill12', 'No', NULL, 'sample', NULL, NULL, NULL, NULL);
INSERT INTO `counselor_table` VALUES (2, 'sample', 'sample', 'admin@gmail.com', '09124804022', '2024-12-01', 'Male', NULL, NULL, 'admin', '@Iysfuresaill12', 'No', '0000001', 'sample', '2024-12-07', '1235555', 'master', 'academic');
INSERT INTO `counselor_table` VALUES (3, 'counselor', 'counselor', 'counselor@gmail.com', '09125805022', '2024-12-03', 'Male', NULL, NULL, 'counselor', '@Iysfuresaill12', 'No', '0000002', 'counselor', '2024-12-07', '220', 'phd', 'academic');

-- ----------------------------
-- Table structure for education
-- ----------------------------
DROP TABLE IF EXISTS `education`;
CREATE TABLE `education`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `student_id` int NOT NULL,
  `level` enum('Kindergarten','Elementary','Junior High School','Senior High School') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `school_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `school_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `awards` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of education
-- ----------------------------
INSERT INTO `education` VALUES (1, 1, 'Kindergarten', 'YUsavile', 'yusaville sinawal', 'N/A');
INSERT INTO `education` VALUES (2, 1, 'Elementary', 'nEW sOCIETY hIGH SCHOOL', 'nEW sOCIETY hIGH SCHOOL', 'n/a');
INSERT INTO `education` VALUES (3, 1, 'Junior High School', 'nEW sOCIETY hIGH SCHOOL', 'nEW sOCIETY hIGH SCHOOL', 'n/a');
INSERT INTO `education` VALUES (4, 1, 'Senior High School', 'nEW sOCIETY hIGH SCHOOL', 'n/a', 'n/a');

-- ----------------------------
-- Table structure for employment
-- ----------------------------
DROP TABLE IF EXISTS `employment`;
CREATE TABLE `employment`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `student_id` int NOT NULL,
  `employment_date` date NOT NULL,
  `company_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `employment_place` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `job_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of employment
-- ----------------------------
INSERT INTO `employment` VALUES (1, 1, '0000-00-00', 'n/a', 'n/a', 'n/a');
INSERT INTO `employment` VALUES (2, 1, '0000-00-00', 'n/a', 'n/a', 'n/a');
INSERT INTO `employment` VALUES (3, 1, '0000-00-00', 'n/a', 'n/a', 'n/a');

-- ----------------------------
-- Table structure for household_members
-- ----------------------------
DROP TABLE IF EXISTS `household_members`;
CREATE TABLE `household_members`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `student_id` int NULL DEFAULT NULL,
  `firstname` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lastname` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `sex` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `age` int NULL DEFAULT NULL,
  `civil_status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `relationship` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of household_members
-- ----------------------------
INSERT INTO `household_members` VALUES (1, 1, 'n/a', 'n/a', 'n/a', 0, 'n/a', 'n/a');
INSERT INTO `household_members` VALUES (2, 1, 'n/a', 'n/a', 'n/a', 0, 'n/a', 'n/a');
INSERT INTO `household_members` VALUES (3, 1, 'n/a', 'n/a', 'n/a', 0, 'n/a', 'n/a');
INSERT INTO `household_members` VALUES (4, 1, 'n/a', 'n/a', 'n/a', 0, 'n/a', 'n/a');

-- ----------------------------
-- Table structure for incident_reports
-- ----------------------------
DROP TABLE IF EXISTS `incident_reports`;
CREATE TABLE `incident_reports`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `incident_date` date NOT NULL,
  `incident_time` time NOT NULL,
  `incident_location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `incident_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `parties_involved` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `witnesses` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `actions_taken` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `reported_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `contact_info` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `picture_path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of incident_reports
-- ----------------------------
INSERT INTO `incident_reports` VALUES (1, '2024-12-12', '05:56:00', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', NULL, '2024-12-05 16:55:33');
INSERT INTO `incident_reports` VALUES (2, '2024-12-05', '05:57:00', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', NULL, '2024-12-05 16:56:59');
INSERT INTO `incident_reports` VALUES (3, '2024-12-18', '18:59:00', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', NULL, '2024-12-05 16:57:31');

-- ----------------------------
-- Table structure for parents_info
-- ----------------------------
DROP TABLE IF EXISTS `parents_info`;
CREATE TABLE `parents_info`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `student_id` int NOT NULL,
  `parent_type` enum('father','mother') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `firstname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lastname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `religion` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tribe` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `cellphone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `schoolattain` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `language` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `occupation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `business` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `position` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of parents_info
-- ----------------------------
INSERT INTO `parents_info` VALUES (1, 1, 'father', 'Leopoldo', 'Escalante', 'Buddhist', 'native', '091234444444444', 'leopoldo@gmail.com', 'Undergraduate', 'bisaya', 'Home', 'N/A', 'N/A');
INSERT INTO `parents_info` VALUES (2, 1, 'mother', 'lUZVIMINDA', 'ESCALANTE', 'Christian', 'nativr', '1231', 'reymark@gmail.com', 'High School', 'bisaya', 'CALL CENTER', 'N/A', 'N/A');

-- ----------------------------
-- Table structure for patient_table
-- ----------------------------
DROP TABLE IF EXISTS `patient_table`;
CREATE TABLE `patient_table`  (
  `PatientId` int NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `MiddleName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `LastName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `PhoneNumber` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `DateOfBirth` date NULL DEFAULT NULL,
  `Gender` enum('Male','Female','Non-Binary','Other','Prefer not to say') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ProfilePictureURL` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `Bio` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `Username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `Password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `Archive` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `Patient_Id` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `Address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `registration_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`PatientId`) USING BTREE,
  UNIQUE INDEX `Email`(`Email` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of patient_table
-- ----------------------------
INSERT INTO `patient_table` VALUES (1, 'REymark', 'Salazar', 'EScalante', 'scammas2018@gmail.com', '09635438188', '1998-11-08', 'Male', NULL, NULL, 'mistery12', 'mistery12', 'No', '721306', 'yusaville sinawal gensan ', NULL);

-- ----------------------------
-- Table structure for pds_table
-- ----------------------------
DROP TABLE IF EXISTS `pds_table`;
CREATE TABLE `pds_table`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `student_id` int NOT NULL,
  `age` int NOT NULL,
  `birth_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `civil_status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `solo_parent_children` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `religion` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tribe` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `language_spoken` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ip_belongin` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `birth_order` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `stay_in_gensan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `landlord_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `landlord_number` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `marital_status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `live_present` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `wife_firstname` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `wife_lastname` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `wife_age` int NULL DEFAULT NULL,
  `wife_occupation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `wife_educ` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `family_income` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `family_transpo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `repeat_grade` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `repeat_why` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `failed_subject` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `listfailed` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `taketimesub` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `difficultinschool` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `difficultinschoolwhy` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `school_activities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `work_experience` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `employmentrecord` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `basic_benefits` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `preferred_vocation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `preferred_job` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `plans_after_college` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `personality_traits` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `grooming` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `posture` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `seriousness` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `academic_ability` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `academic_achievement` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `emergency_relationship` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `emergency_contact` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `emergency_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pds_table
-- ----------------------------
INSERT INTO `pds_table` VALUES (1, 721306, 26, 'Yusaville Sinawal', 'single', '1', 'catholic', 'native', 'bisaya', 'N/A', 'oldest', 'N/A', 'N/A', 'n/a', 'living-together', 'father', 'n/a', 'n/a', 0, 'n/a', 'n/a', '10k-20k', 'motorcycle', 'No', 'n/a', 'No', 'n/a', 'n/a', 'No', 'n/a', 'Sports', 'n/a', 'No', 'No', 'n/a', 'n/a', 'n/a', 'n/a', 'excellent', 'excellent', 'excellent', 'excellent', 'excellent', 'n/a', 'n/a', 'n/a');

-- ----------------------------
-- Table structure for specializations
-- ----------------------------
DROP TABLE IF EXISTS `specializations`;
CREATE TABLE `specializations`  (
  `SpecializationID` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  PRIMARY KEY (`SpecializationID`) USING BTREE,
  UNIQUE INDEX `Name`(`Name` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of specializations
-- ----------------------------

SET FOREIGN_KEY_CHECKS = 1;
