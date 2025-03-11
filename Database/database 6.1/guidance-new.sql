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

 Date: 11/03/2025 20:12:10
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
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of appointments
-- ----------------------------
INSERT INTO `appointments` VALUES (1, '0000002', '14:24:00', '2024-12-01', 'Woiw', 'Nightmares', 12312355, 'Request', 'd', 'asdgfa', NULL);
INSERT INTO `appointments` VALUES (2, '', '11:25:00', '2025-03-20', 'aw', 'N/A', 12312355, 'Request', NULL, NULL, 'Solo');
INSERT INTO `appointments` VALUES (3, '', '01:25:00', '2025-01-07', 'asd', 'N/A', 12312355, 'Request', NULL, NULL, 'Group');
INSERT INTO `appointments` VALUES (4, '0000002', '02:26:00', '2025-01-06', 'asd', 'N/A', 12312355, 'Closure', 'asd', 'asd', 'Group');
INSERT INTO `appointments` VALUES (5, '0000001', '04:30:00', '2025-01-27', 'Woiw', 'N/A', 12312355, 'Request', NULL, NULL, 'Group');

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
) ENGINE = InnoDB AUTO_INCREMENT = 33 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of education
-- ----------------------------
INSERT INTO `education` VALUES (1, 1, 'Kindergarten', 'n/an/a', 'n/a', 'n/a');
INSERT INTO `education` VALUES (2, 1, 'Elementary', 'n/a', 'n/a', 'n/a');
INSERT INTO `education` VALUES (3, 1, 'Junior High School', 'n/a', 'n/a', 'n/a');
INSERT INTO `education` VALUES (4, 1, 'Senior High School', 'n/a', 'n/a', 'n/a');
INSERT INTO `education` VALUES (5, 4, 'Kindergarten', 'asd', 'asd', 'asd');
INSERT INTO `education` VALUES (6, 4, 'Elementary', 'asd', 'asd', 'asd');
INSERT INTO `education` VALUES (7, 4, 'Junior High School', 'asd', 'asd', 'asd');
INSERT INTO `education` VALUES (8, 4, 'Senior High School', 'asd', 'asd', 'asd');
INSERT INTO `education` VALUES (9, 5, 'Kindergarten', 'asd', 'asd', 'asd');
INSERT INTO `education` VALUES (10, 5, 'Elementary', 'sda', 'asd', 'asd');
INSERT INTO `education` VALUES (11, 5, 'Junior High School', 'asd', 'asd', 'asd');
INSERT INTO `education` VALUES (12, 5, 'Senior High School', 'asd', 'asd', 'asd');
INSERT INTO `education` VALUES (13, 6, 'Kindergarten', 'asd', 'asd', 'asd');
INSERT INTO `education` VALUES (14, 6, 'Elementary', 'asd', 'asd', 'asd');
INSERT INTO `education` VALUES (15, 6, 'Junior High School', 'asd', 'asd', 'asd');
INSERT INTO `education` VALUES (16, 6, 'Senior High School', 'asd', 'asd', 'asd');
INSERT INTO `education` VALUES (17, 7, 'Kindergarten', 'asd', 'asd', 'asd');
INSERT INTO `education` VALUES (18, 7, 'Elementary', 'asd', 'asd', 'asd');
INSERT INTO `education` VALUES (19, 7, 'Junior High School', 'asd', 'asd', 'asd');
INSERT INTO `education` VALUES (20, 7, 'Senior High School', 'asd', 'asd', 'asd');
INSERT INTO `education` VALUES (21, 8, 'Kindergarten', 'asd', 'asd', 'asd');
INSERT INTO `education` VALUES (22, 8, 'Elementary', 'asd', 'asd', 'asd');
INSERT INTO `education` VALUES (23, 8, 'Junior High School', 'asd', 'asd', 'asd');
INSERT INTO `education` VALUES (24, 8, 'Senior High School', 'asd', 'asd', 'asd');
INSERT INTO `education` VALUES (25, 9, 'Kindergarten', 'asd', 'asd', 'asd');
INSERT INTO `education` VALUES (26, 9, 'Elementary', 'asd', 'asd', 'asd');
INSERT INTO `education` VALUES (27, 9, 'Junior High School', 'asd', 'asd', 'asd');
INSERT INTO `education` VALUES (28, 9, 'Senior High School', 'asd', 'asd', 'asd');
INSERT INTO `education` VALUES (29, 10, 'Kindergarten', 'asd', 'asd', 'asd');
INSERT INTO `education` VALUES (30, 10, 'Elementary', 'asd', 'asd', 'asd');
INSERT INTO `education` VALUES (31, 10, 'Junior High School', 'asd', 'asd', 'asd');
INSERT INTO `education` VALUES (32, 10, 'Senior High School', 'asd', 'asd', 'asd');

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
) ENGINE = InnoDB AUTO_INCREMENT = 25 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of employment
-- ----------------------------
INSERT INTO `employment` VALUES (1, 1, '2025-02-27', 'n/a', 'n/a', 'n/a');
INSERT INTO `employment` VALUES (2, 3, '2025-02-13', 'n/a', 'n/a', 'n/a');
INSERT INTO `employment` VALUES (3, 3, '0000-00-00', 'n/a', 'n/a', 'n/a');
INSERT INTO `employment` VALUES (4, 4, '2025-02-13', 'asd', 'asd', 'sad');
INSERT INTO `employment` VALUES (5, 4, '2025-02-15', 'asd', 'asd', 'asd');
INSERT INTO `employment` VALUES (6, 4, '2025-02-20', 'asd', 'asd', 'sad');
INSERT INTO `employment` VALUES (7, 5, '2025-02-04', 'asd', 'asd', 'asd');
INSERT INTO `employment` VALUES (8, 5, '2025-02-27', 'asd', 'sad', 'asd');
INSERT INTO `employment` VALUES (9, 5, '2025-02-28', 'asd', 'asd', 'asd');
INSERT INTO `employment` VALUES (10, 6, '2025-02-19', 'asd', 'asd', 'asd');
INSERT INTO `employment` VALUES (11, 6, '2025-02-20', 'asd', 'asd', 'asd');
INSERT INTO `employment` VALUES (12, 6, '2025-02-13', 'asd', 'asd', 'asd');
INSERT INTO `employment` VALUES (13, 7, '2025-02-19', 'asd', 'asd', 'asd');
INSERT INTO `employment` VALUES (14, 7, '2025-02-20', 'asd', 'asd', 'asd');
INSERT INTO `employment` VALUES (15, 7, '2025-02-13', 'asd', 'asd', 'asd');
INSERT INTO `employment` VALUES (16, 8, '2025-02-19', 'asd', 'asd', 'asd');
INSERT INTO `employment` VALUES (17, 8, '2025-02-20', 'asd', 'asd', 'asd');
INSERT INTO `employment` VALUES (18, 8, '2025-02-13', 'asd', 'asd', 'asd');
INSERT INTO `employment` VALUES (19, 9, '2025-02-19', 'asd', 'asd', 'asd');
INSERT INTO `employment` VALUES (20, 9, '2025-02-20', 'asd', 'asd', 'asd');
INSERT INTO `employment` VALUES (21, 9, '2025-02-13', 'asd', 'asd', 'asd');
INSERT INTO `employment` VALUES (22, 10, '2025-02-19', 'asd', 'asd', 'asd');
INSERT INTO `employment` VALUES (23, 10, '2025-02-20', 'asd', 'asd', 'asd');
INSERT INTO `employment` VALUES (24, 10, '2025-02-13', 'asd', 'asd', 'asd');

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
) ENGINE = InnoDB AUTO_INCREMENT = 32 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of household_members
-- ----------------------------
INSERT INTO `household_members` VALUES (1, 1, 'n/a', 'n/a', '', 0, '', '');
INSERT INTO `household_members` VALUES (2, 2, 'n/a', 'n/a', '', 0, '', '');
INSERT INTO `household_members` VALUES (3, 3, 'n/a', 'n/a', '', 0, '', '');
INSERT INTO `household_members` VALUES (4, 4, 'asd', 'asd', 'ad', 123, 'asd', 'asd');
INSERT INTO `household_members` VALUES (5, 4, 'asd', 'asd', 'asd', 123, 'ad', 'asd');
INSERT INTO `household_members` VALUES (6, 4, 'asd', 'asd', 'asd', 231, 'asd', 'asd');
INSERT INTO `household_members` VALUES (7, 4, 'asd', 'asd', 'asd', 123, 'asd', 'asd');
INSERT INTO `household_members` VALUES (8, 5, 'asd', 'asd', 'asd', 123, 'asd', 'asd');
INSERT INTO `household_members` VALUES (9, 5, 'asd', 'asd', 'asd', 123, 'sad', 'asd');
INSERT INTO `household_members` VALUES (10, 5, 'asd', 'asd', 'sda', 123, 'asd', 'asd');
INSERT INTO `household_members` VALUES (11, 5, 'asd', 'asd', '123ad', 123, 'asd', 'asd');
INSERT INTO `household_members` VALUES (12, 6, 'asd', 'asd', 'sasd', 123, 'asd', 'asd');
INSERT INTO `household_members` VALUES (13, 6, 'asd', 'asd', 'asd', 123, 'asd', 'asd');
INSERT INTO `household_members` VALUES (14, 6, 'asd', 'asd', 'ad', 123, 'asd', 'asd');
INSERT INTO `household_members` VALUES (15, 6, 'asd', 'asd', 'asd', 123, 'ads', 'asd');
INSERT INTO `household_members` VALUES (16, 7, 'asd', 'asd', 'sasd', 123, 'asd', 'asd');
INSERT INTO `household_members` VALUES (17, 7, 'asd', 'asd', 'asd', 123, 'asd', 'asd');
INSERT INTO `household_members` VALUES (18, 7, 'asd', 'asd', 'ad', 123, 'asd', 'asd');
INSERT INTO `household_members` VALUES (19, 7, 'asd', 'asd', 'asd', 123, 'ads', 'asd');
INSERT INTO `household_members` VALUES (20, 8, 'asd', 'asd', 'sasd', 123, 'asd', 'asd');
INSERT INTO `household_members` VALUES (21, 8, 'asd', 'asd', 'asd', 123, 'asd', 'asd');
INSERT INTO `household_members` VALUES (22, 8, 'asd', 'asd', 'ad', 123, 'asd', 'asd');
INSERT INTO `household_members` VALUES (23, 8, 'asd', 'asd', 'asd', 123, 'ads', 'asd');
INSERT INTO `household_members` VALUES (24, 9, 'asd', 'asd', 'sasd', 123, 'asd', 'asd');
INSERT INTO `household_members` VALUES (25, 9, 'asd', 'asd', 'asd', 123, 'asd', 'asd');
INSERT INTO `household_members` VALUES (26, 9, 'asd', 'asd', 'ad', 123, 'asd', 'asd');
INSERT INTO `household_members` VALUES (27, 9, 'asd', 'asd', 'asd', 123, 'ads', 'asd');
INSERT INTO `household_members` VALUES (28, 10, 'asd', 'asd', 'sasd', 123, 'asd', 'asd');
INSERT INTO `household_members` VALUES (29, 10, 'asd', 'asd', 'asd', 123, 'asd', 'asd');
INSERT INTO `household_members` VALUES (30, 10, 'asd', 'asd', 'ad', 123, 'asd', 'asd');
INSERT INTO `household_members` VALUES (31, 10, 'asd', 'asd', 'asd', 123, 'ads', 'asd');

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
) ENGINE = InnoDB AUTO_INCREMENT = 23 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of parents_info
-- ----------------------------
INSERT INTO `parents_info` VALUES (1, 6, 'father', 'asd', 'asd', 'N/A', '', '11111111111111111111', 'asd@gmail.com', 'High School', 'asd', 'asd', 'asd', 'asd');
INSERT INTO `parents_info` VALUES (2, 6, 'mother', 'asd', 'asd', 'N/A', '', '1111111111', 'asd@gmail.com', 'Undergraduate', 'asd', 'asd', 'asd', 'asd');
INSERT INTO `parents_info` VALUES (3, 1, 'father', 'sample', 'sample', 'Christian', 'native', '123123', 'reymark@gmail.com', 'High School', 'bisaya', 'b', 'sample', 'sa');
INSERT INTO `parents_info` VALUES (4, 1, 'mother', 'sample', 'sample', 'Other', 'nativr', '123123', 'reymark@gmail.com', 'High School', 'bisaya', 'sampl', 'sam', 'sam');
INSERT INTO `parents_info` VALUES (5, 2, 'father', 'sample', 'sample', 'Christian', 'native', '123123', 'reymark@gmail.com', 'High School', 'bisaya', 'b', 'sample', 'sa');
INSERT INTO `parents_info` VALUES (6, 2, 'mother', 'sample', 'sample', 'Other', 'nativr', '123123', 'reymark@gmail.com', 'High School', 'bisaya', 'sampl', 'sam', 'sam');
INSERT INTO `parents_info` VALUES (7, 3, 'father', 'sample', 'sample', 'Christian', 'native', '123123', 'reymark@gmail.com', 'High School', 'bisaya', 'b', 'sample', 'sa');
INSERT INTO `parents_info` VALUES (8, 3, 'mother', 'sample', 'sample', 'Other', 'nativr', '123123', 'reymark@gmail.com', 'High School', 'bisaya', 'sampl', 'sam', 'sam');
INSERT INTO `parents_info` VALUES (9, 4, 'father', 'asd', 'asd', 'Christian', 'asd', '123', 'asd@gmail.com', 'High School', 'asd', 'asd', 'asd', 'asd');
INSERT INTO `parents_info` VALUES (10, 4, 'mother', 'asd', 'sad', 'Christian', 'asd', '1231', 'asd@gmail.com', 'High School', 'asd', 'asd', 'asd', 'asd');
INSERT INTO `parents_info` VALUES (11, 5, 'father', 'asd', 'asd', 'Christian', 'asd', '123', 'asd@gmail.com', 'High School', 'asd', 'sd', 'asd', 'asd');
INSERT INTO `parents_info` VALUES (12, 5, 'mother', 'asd', 'asd', 'Christian', 'asd', '123', 'asd@gmail.com', 'High School', 'asd', 'sda', 'asd', 'asd');
INSERT INTO `parents_info` VALUES (13, 6, 'father', 'asd', 'asd', 'Christian', 'ad', '123', 'asd@gmail.com', 'High School', 'asd', 'asd', 'asd', 'asd');
INSERT INTO `parents_info` VALUES (14, 6, 'mother', 'asd', 'asd', 'Christian', 'asd', '123', 'reymark@gmail.com', 'High School', 'asd', 'asd', 'asd', 'asd');
INSERT INTO `parents_info` VALUES (15, 7, 'father', 'asd', 'asd', 'Christian', 'ad', '123', 'asd@gmail.com', 'High School', 'asd', 'asd', 'asd', 'asd');
INSERT INTO `parents_info` VALUES (16, 7, 'mother', 'asd', 'asd', 'Christian', 'asd', '123', 'reymark@gmail.com', 'High School', 'asd', 'asd', 'asd', 'asd');
INSERT INTO `parents_info` VALUES (17, 8, 'father', 'asd', 'asd', 'Christian', 'ad', '123', 'asd@gmail.com', 'High School', 'asd', 'asd', 'asd', 'asd');
INSERT INTO `parents_info` VALUES (18, 8, 'mother', 'asd', 'asd', 'Christian', 'asd', '123', 'reymark@gmail.com', 'High School', 'asd', 'asd', 'asd', 'asd');
INSERT INTO `parents_info` VALUES (19, 9, 'father', 'asd', 'asd', 'Christian', 'ad', '123', 'asd@gmail.com', 'High School', 'asd', 'asd', 'asd', 'asd');
INSERT INTO `parents_info` VALUES (20, 9, 'mother', 'asd', 'asd', 'Christian', 'asd', '123', 'reymark@gmail.com', 'High School', 'asd', 'asd', 'asd', 'asd');
INSERT INTO `parents_info` VALUES (21, 10, 'father', 'asd', 'asd', 'Christian', 'ad', '123', 'asd@gmail.com', 'High School', 'asd', 'asd', 'asd', 'asd');
INSERT INTO `parents_info` VALUES (22, 10, 'mother', 'asd', 'asd', 'Christian', 'asd', '123', 'reymark@gmail.com', 'High School', 'asd', 'asd', 'asd', 'asd');

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
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of patient_table
-- ----------------------------
INSERT INTO `patient_table` VALUES (1, 'samples', NULL, 'sample', 'sample12@gmail.com', '11111111111', '2024-12-02', 'Female', NULL, NULL, 'sample', '@Iysfuresaill12', 'No', NULL, 'sample', NULL);
INSERT INTO `patient_table` VALUES (2, 'sample', NULL, 'sample', 'admin@gmail.com', '09124804022', '2024-12-01', 'Male', NULL, NULL, 'admins', '@Iysfuresaill12', 'No', '0000001', 'sample', NULL);
INSERT INTO `patient_table` VALUES (3, 'counselor', NULL, 'counselor', 'counselor@gmail.com', '09125805022', '2024-12-03', 'Male', NULL, NULL, 'counselor', '@Iysfuresaill12', 'Yes', '0000002', 'counselor', NULL);
INSERT INTO `patient_table` VALUES (4, 'patients', NULL, 'patients', 'patient@gmail.com', '11111111111', '2024-12-03', 'Female', NULL, NULL, 'patient', '@Iysfuresaill12', 'Yes', '123123', 'patient', NULL);
INSERT INTO `patient_table` VALUES (5, 'Hilda', 'Hilda', 'hilda', 'hilda@gmail.com', '09635438188', '2021-01-01', 'Female', NULL, NULL, 'hilda', '@Dm1n123', 'No', '12312355', 'hilda', NULL);
INSERT INTO `patient_table` VALUES (6, 'asd', 'asd', 'asd', 'asdasdasd@3', '12312312312', '2025-03-11', 'Non-Binary', NULL, NULL, 'asdasd', 'asdasdasda', 'No', '1231231', 'asd', '2025-03-10 11:53:27');

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
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pds_table
-- ----------------------------
INSERT INTO `pds_table` VALUES (1, 12312355, 4, 'sample', 'single', '2', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `pds_table` VALUES (2, 12312355, 4, 'sample', 'single', '2', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `pds_table` VALUES (3, 12312355, 4, 'sample', 'single', '2', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `pds_table` VALUES (4, 12312355, 4, 'asdasdd', '', '123', 'asd', 'asd', 'asd', 'asd', 'oldest', 'N/A', 'asd', 'asd', 'living-together', 'mother', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `pds_table` VALUES (5, 12312355, 4, 'asd', '', '123', 'asd', 'asd', 'asd', 'asd', 'oldest', 'N/A', 'asd', 'asd', 'living-together', 'both-parents', 'asd', 'asd', 0, 'asd', 'asd', '10k-20k', 'jeep', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `pds_table` VALUES (6, 12312355, 4, 'asd', 'single', '123', 'asd', 'asd', 'asd', 'asd', 'oldest', 'boarding-house', 'asd', '123', 'living-together', 'father', 'asd', 'asd', 123, 'asd', 'asd', '10k-20k', 'tricycle', 'Yes', 'asd', 'Yes', 'asd', 'asd', 'Yes', 'asd', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `pds_table` VALUES (7, 12312355, 4, 'asd', 'single', '123', 'asd', 'asd', 'asd', 'asd', 'oldest', 'boarding-house', 'asd', '123', 'living-together', 'father', 'asd', 'asd', 123, 'asd', 'asd', '10k-20k', 'tricycle', 'Yes', 'asd', 'Yes', 'asd', 'asd', 'Yes', 'asd', 'Music', 'asd', 'Yes', 'Yes', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `pds_table` VALUES (8, 12312355, 4, 'asd', 'single', '123', 'asd', 'asd', 'asd', 'asd', 'oldest', 'boarding-house', 'asd', '123', 'living-together', 'father', 'asd', 'asd', 123, 'asd', 'asd', '10k-20k', 'tricycle', 'Yes', 'asd', 'Yes', 'asd', 'asd', 'Yes', 'asd', 'Music', 'asd', 'Yes', 'Yes', 'asd', 'asd', 'asd', 'asd', 'good', 'good', 'fair', '', '', '', '', '');
INSERT INTO `pds_table` VALUES (9, 12312355, 4, 'asd', 'single', '123', 'asd', 'asd', 'asd', 'asd', 'oldest', 'boarding-house', 'asd', '123', 'living-together', 'father', 'asd', 'asd', 123, 'asd', 'asd', '10k-20k', 'tricycle', 'Yes', 'asd', 'Yes', 'asd', 'asd', 'Yes', 'asd', 'Music', 'asd', 'Yes', 'Yes', 'asd', 'asd', 'asd', 'asd', 'good', 'good', 'fair', 'fair', 'fair', 'asd', 'asd', 'sad');
INSERT INTO `pds_table` VALUES (10, 12312355, 4, 'asd', 'single', '123', 'asd', 'asd', 'asd', 'asd', 'oldest', 'boarding-house', 'asd', '123', 'living-together', 'father', 'asd', 'asd', 123, 'asd', 'asd', '10k-20k', 'tricycle', 'Yes', 'asd', 'Yes', 'asd', 'asd', 'Yes', 'asd', 'Music', 'asd', 'Yes', 'Yes', 'asd', 'asd', 'asd', 'asd', 'good', 'good', 'fair', 'fair', 'fair', 'asd', 'asd', 'sad');

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
