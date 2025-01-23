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

 Date: 20/01/2025 11:49:13
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
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

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
INSERT INTO `appointments` VALUES (2, '', '11:25:00', '2025-01-06', 'aw', 'N/A', 12312355, 'Request', NULL, NULL, 'Solo');
INSERT INTO `appointments` VALUES (3, '', '01:25:00', '2025-01-07', 'asd', 'N/A', 12312355, 'Request', NULL, NULL, 'Group');
INSERT INTO `appointments` VALUES (4, '0000002', '02:26:00', '2025-01-06', 'asd', 'N/A', 12312355, 'Request', NULL, NULL, 'Group');
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
-- Table structure for patient_table
-- ----------------------------
DROP TABLE IF EXISTS `patient_table`;
CREATE TABLE `patient_table`  (
  `PatientId` int NOT NULL AUTO_INCREMENT,
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
  `Patient_Id` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `Address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`PatientId`) USING BTREE,
  UNIQUE INDEX `Email`(`Email` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of patient_table
-- ----------------------------
INSERT INTO `patient_table` VALUES (1, 'samples', 'sample', 'sample12@gmail.com', '11111111111', '2024-12-02', 'Female', NULL, NULL, 'sample', '@Iysfuresaill12', 'No', NULL, 'sample');
INSERT INTO `patient_table` VALUES (2, 'sample', 'sample', 'admin@gmail.com', '09124804022', '2024-12-01', 'Male', NULL, NULL, 'admins', '@Iysfuresaill12', 'No', '0000001', 'sample');
INSERT INTO `patient_table` VALUES (3, 'counselor', 'counselor', 'counselor@gmail.com', '09125805022', '2024-12-03', 'Male', NULL, NULL, 'counselor', '@Iysfuresaill12', 'Yes', '0000002', 'counselor');
INSERT INTO `patient_table` VALUES (4, 'patients', 'patients', 'patient@gmail.com', '11111111111', '2024-12-03', 'Female', NULL, NULL, 'patient', '@Iysfuresaill12', 'Yes', '123123', 'patient');
INSERT INTO `patient_table` VALUES (5, 'Hilda', 'hilda', 'hilda@gmail.com', '09635438188', '2024-12-05', 'Female', NULL, NULL, 'hilda', '@Dm1n123', 'No', '12312355', 'hilda');

-- ----------------------------
-- Table structure for pds_table
-- ----------------------------
DROP TABLE IF EXISTS `pds_table`;
CREATE TABLE `pds_table`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `civil_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `solo_parent_children` int NULL DEFAULT NULL,
  `religion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tribe` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `language_spoken` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ip_belonging` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `number_of_siblings` int NULL DEFAULT NULL,
  `birth_order` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `stay_in_gensan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `landlord_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `contact_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `father_firstname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `father_lastname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `mother_firstname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `mother_lastname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `current_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `emergency_relationship` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `emergency_contact` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `emergency_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `school_activities` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `email1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `email2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `highest_education` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `occupation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `business_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `position_held` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `patient_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pds_table
-- ----------------------------
INSERT INTO `pds_table` VALUES (1, 'N/A', 0, 'N/A', 'N/A', 'N/A', 'N/A', 0, 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '0000001');
INSERT INTO `pds_table` VALUES (2, 'N/A', 0, 'N/A', 'N/A', 'N/A', 'N/A', 0, 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '123123');

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
