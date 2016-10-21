-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2016 at 03:48 PM
-- Server version: 5.7.12-log
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finance`
--

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `country_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`country_name`) VALUES
('Afghanistan'),
('Akrotiri'),
('Albania'),
('Algeria'),
('American Samoa'),
('Andorra'),
('Angola'),
('Anguilla'),
('Antarctica'),
('Antigua and Barbuda'),
('Argentina'),
('Armenia'),
('Aruba'),
('Ashmore and Cartier Islands'),
('Australia'),
('Austria'),
('Azerbaijan'),
('Bahamas, The'),
('Bahrain'),
('Bangladesh'),
('Barbados'),
('Bassas da India'),
('Belarus'),
('Belgium'),
('Belize'),
('Benin'),
('Bermuda'),
('Bhutan'),
('Bolivia'),
('Bosnia and Herzegovina'),
('Botswana'),
('Bouvet Island'),
('Brazil'),
('British Indian Ocean Territory'),
('British Virgin Islands'),
('Brunei'),
('Bulgaria'),
('Burkina Faso'),
('Burma'),
('Burundi'),
('Cambodia'),
('Cameroon'),
('Canada'),
('Cape Verde'),
('Cayman Islands'),
('Central African Republic'),
('Chad'),
('Chile'),
('China'),
('Christmas Island'),
('Clipperton Island'),
('Cocos (Keeling) Islands'),
('Colombia'),
('Comoros'),
('Congo, Democratic Republic of the'),
('Congo, Republic of the'),
('Cook Islands'),
('Coral Sea Islands'),
('Costa Rica'),
('Cote d Ivoire'),
('Croatia'),
('Cuba'),
('Cyprus'),
('Czech Republic'),
('Denmark'),
('Dhekelia'),
('Djibouti'),
('Dominica'),
('Dominican Republic'),
('Ecuador'),
('Egypt'),
('El Salvador'),
('Equatorial Guinea'),
('Eritrea'),
('Estonia'),
('Ethiopia'),
('Europa Island'),
('Falkland Islands (Islas Malvinas)'),
('Faroe Islands'),
('Fiji'),
('Finland'),
('France'),
('French Guiana'),
('French Polynesia'),
('French Southern and Antarctic Lands'),
('Gabon'),
('Gambia, The'),
('Gaza Strip'),
('Georgia'),
('Germany'),
('Ghana'),
('Gibraltar'),
('Glorioso Islands'),
('Greece'),
('Greenland'),
('Grenada'),
('Guadeloupe'),
('Guam'),
('Guatemala'),
('Guernsey'),
('Guinea'),
('Guinea-Bissau'),
('Guyana'),
('Haiti'),
('Heard Island and McDonald Islands'),
('Holy See (Vatican City)'),
('Honduras'),
('Hong Kong'),
('Hungary'),
('Iceland'),
('India'),
('Indonesia'),
('Iran'),
('Iraq'),
('Ireland'),
('Isle of Man'),
('Israel'),
('Italy'),
('Jamaica'),
('Jan Mayen'),
('Japan'),
('Jersey'),
('Jordan'),
('Juan de Nova Island'),
('Kazakhstan'),
('Kenya'),
('Kiribati'),
('Korea, North'),
('Korea, South'),
('Kuwait'),
('Kyrgyzstan'),
('Laos'),
('Latvia'),
('Lebanon'),
('Lesotho'),
('Liberia'),
('Libya'),
('Liechtenstein'),
('Lithuania'),
('Luxembourg'),
('Macau'),
('Macedonia'),
('Madagascar'),
('Malawi'),
('Malaysia'),
('Maldives'),
('Mali'),
('Malta'),
('Marshall Islands'),
('Mauritania'),
('Mauritius'),
('Mayotte'),
('Mexico'),
('Micronesia, Federated States of'),
('Moldova'),
('Monaco'),
('Mongolia'),
('Montenegro'),
('Montserrat'),
('Morocco'),
('Mozambique'),
('Namibia'),
('Nauru'),
('Navassa Island'),
('Nepal'),
('Netherlands'),
('Netherlands Antilles'),
('New Caledonia'),
('New Zealand'),
('Nicaragua'),
('Niger'),
('Nigeria'),
('Niue'),
('Norfolk Island'),
('Northern Mariana Islands'),
('Norway'),
('Oman'),
('Pakistan'),
('Palau'),
('Panama'),
('Papua New Guinea'),
('Paracel Islands'),
('Paraguay'),
('Peru'),
('Philippines'),
('Pitcairn Islands'),
('Poland'),
('Portugal'),
('Puerto Rico'),
('Qatar'),
('Reunion'),
('Romania'),
('Russia'),
('Rwanda'),
('Saint Helena'),
('Saint Kitts and Nevis'),
('Saint Lucia'),
('Saint Pierre and Miquelon'),
('Saint Vincent and the Grenadines'),
('Samoa'),
('San Marino'),
('Sao Tome and Principe'),
('Saudi Arabia'),
('Senegal'),
('Serbia'),
('Seychelles'),
('Sierra Leone'),
('Singapore'),
('Slovakia'),
('Slovenia'),
('Solomon Islands'),
('Somalia'),
('South Africa'),
('South Georgia and the South Sandwich Islands'),
('Spain'),
('Spratly Islands'),
('Sri Lanka'),
('Sudan'),
('Suriname'),
('Svalbard'),
('Swaziland'),
('Sweden'),
('Switzerland'),
('Syria'),
('Taiwan'),
('Tajikistan'),
('Tanzania'),
('Thailand'),
('Timor-Leste'),
('Togo'),
('Tokelau'),
('Tonga'),
('Trinidad and Tobago'),
('Tromelin Island'),
('Tunisia'),
('Turkey'),
('Turkmenistan'),
('Turks and Caicos Islands'),
('Tuvalu'),
('Uganda'),
('Ukraine'),
('United Arab Emirates'),
('United Kingdom'),
('United States'),
('Uruguay'),
('Uzbekistan'),
('Vanuatu'),
('Venezuela'),
('Vietnam'),
('Virgin Islands'),
('Wake Island'),
('Wallis and Futuna'),
('West Bank'),
('Western Sahara'),
('Yemen'),
('Zambia'),
('Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `expenses_category`
--

CREATE TABLE `expenses_category` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `expenses_category`
--

INSERT INTO `expenses_category` (`ID`, `Name`) VALUES
(4, 'Debts'),
(3, 'Entertainment'),
(5, 'Fixed expenses'),
(2, 'Food & beverage'),
(6, 'Others'),
(1, 'Transport');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Password` varchar(50) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `Gender` enum('Male','Female') NOT NULL,
  `Country` varchar(50) DEFAULT NULL,
  `Occupation` varchar(50) DEFAULT NULL,
  `AboutMe` text,
  `RegisterDate` datetime NOT NULL,
  `LastLoginDate` datetime NOT NULL,
  `LastLoginIP` varchar(50) DEFAULT NULL,
  `EmailVerified` tinyint(1) NOT NULL,
  `LastChangePasswordDate` datetime NOT NULL,
  `LastUpdateDate` datetime NOT NULL,
  `User_Image` text,
  `Token` text,
  `Token_expTime` datetime DEFAULT NULL,
  `Verification_Code` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `Email`, `FirstName`, `LastName`, `Password`, `DOB`, `Gender`, `Country`, `Occupation`, `AboutMe`, `RegisterDate`, `LastLoginDate`, `LastLoginIP`, `EmailVerified`, `LastChangePasswordDate`, `LastUpdateDate`, `User_Image`, `Token`, `Token_expTime`, `Verification_Code`) VALUES
(1, '123456789@gmail.com', 'A', 'B', '202cb962ac59075b964b07152d234b70', '2016-09-01', 'Male', 'Malaysia', '', '', '2016-09-20 00:00:00', '2016-09-25 16:05:53', '100.100.100.100', 0, '2016-09-25 15:58:42', '2016-09-20 00:00:00', '1474887492969R80853.jpg', NULL, NULL, NULL),
(7, '123@yahoo.com', 'aa', 'bb', '202cb962ac59075b964b07152d234b70', '2010-01-01', 'Male', 'Singapore', '', '', '2016-09-20 00:00:00', '2016-09-20 00:00:00', '123,123,123,123', 0, '2016-09-20 00:00:00', '2016-09-20 00:00:00', '123@yahoo.com.jpg', NULL, NULL, NULL),
(8, 'aa@gmail.com', 'aaa', 'sss', '202cb962ac59075b964b07152d234b70', '2016-02-02', 'Female', 'American', 'God', 'I am GOD!!', '2016-09-21 00:00:00', '2016-09-25 16:01:43', '87.87.87.87', 0, '2016-09-21 00:00:00', '2016-09-21 00:00:00', NULL, NULL, NULL, NULL),
(9, '123@gmail.com', 'aaa', 'bbb', '202cb962ac59075b964b07152d234b70', '2016-10-20', 'Male', 'Singapore', 'Student', 'AAA', '2016-09-27 15:14:20', '2016-09-27 15:14:20', '22.22.22.22', 0, '2016-09-27 15:14:20', '2016-09-27 15:14:20', NULL, NULL, NULL, NULL),
(11, '1234@gmail.com', 'aaa', 'bbb', '202cb962ac59075b964b07152d234b70', '2016-10-20', 'Male', 'Singapore', 'Student', NULL, '2016-09-27 15:15:44', '2016-09-27 15:15:44', '22.22.22.22', 0, '2016-09-27 15:15:44', '2016-09-27 15:15:44', NULL, NULL, NULL, NULL),
(14, 'a@b', 'a', 'a', '0cc175b9c0f1b6a831c399e269772661', '2016-10-20', 'Male', 'AF', 'a', NULL, '2016-10-03 19:22:41', '2016-10-03 19:22:41', NULL, 1, '2016-10-03 19:22:41', '2016-10-03 19:22:41', NULL, '2b3b9969209e4e4518b442d1a5fdf595', '2016-10-04 19:22:41', NULL),
(26, 'junx_lau@hotmail.com', 'Lau', 'Jun Xian', '0cc175b9c0f1b6a831c399e269772661', '2016-10-20', 'Male', 'BH', 'aaaa', NULL, '2016-10-05 11:49:53', '2016-10-05 11:49:53', NULL, 0, '2016-10-05 11:49:53', '2016-10-05 11:49:53', NULL, '8039623c5f620d3f7f3b41b0325eaf8c', '2016-10-06 11:49:53', NULL),
(33, 'a70537952@gmail.com', '怡杰', '赖', 'f9081c919595a5e0f794c2a941e93f05', '2016-10-05', 'Male', NULL, NULL, NULL, '2016-10-05 15:36:09', '2016-10-05 15:41:00', '::1', 0, '2016-10-05 15:36:09', '2016-10-05 15:36:09', NULL, 'd4e6d184c61afd29c6175eb109d2ac71', '2016-10-06 15:36:09', 'jipbbrbX');

-- --------------------------------------------------------

--
-- Table structure for table `user_expense`
--

CREATE TABLE `user_expense` (
  `Expense_ID` bigint(20) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Expense_Name` varchar(100) NOT NULL,
  `Expense_Amount` decimal(65,2) NOT NULL,
  `Expense_Category` varchar(50) NOT NULL,
  `Expense_Description` text,
  `Expense_EnterDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_expense`
--

INSERT INTO `user_expense` (`Expense_ID`, `User_ID`, `Expense_Name`, `Expense_Amount`, `Expense_Category`, `Expense_Description`, `Expense_EnterDate`) VALUES
(2, 1, '', '1000.00', 'Transport', 'FGFFFSFAS', '2016-09-24');

-- --------------------------------------------------------

--
-- Table structure for table `user_income`
--

CREATE TABLE `user_income` (
  `Income_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Income_Name` varchar(100) NOT NULL,
  `Income_Amount` int(11) NOT NULL,
  `Income_Description` text NOT NULL,
  `Income_EnterDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_income`
--

INSERT INTO `user_income` (`Income_ID`, `User_ID`, `Income_Name`, `Income_Amount`, `Income_Description`, `Income_EnterDate`) VALUES
(1, 7, '', 2222, 'haha1ha', '2016-09-25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`country_name`),
  ADD UNIQUE KEY `country_name` (`country_name`),
  ADD UNIQUE KEY `country_name_2` (`country_name`),
  ADD UNIQUE KEY `country_name_3` (`country_name`);

--
-- Indexes for table `expenses_category`
--
ALTER TABLE `expenses_category`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Name` (`Name`),
  ADD KEY `Name_2` (`Name`),
  ADD KEY `Name_3` (`Name`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD KEY `ID` (`ID`);

--
-- Indexes for table `user_expense`
--
ALTER TABLE `user_expense`
  ADD PRIMARY KEY (`Expense_ID`),
  ADD KEY `User_ID` (`User_ID`),
  ADD KEY `Expense_ID` (`Expense_ID`),
  ADD KEY `Expense_Category` (`Expense_Category`);

--
-- Indexes for table `user_income`
--
ALTER TABLE `user_income`
  ADD PRIMARY KEY (`Income_ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `expenses_category`
--
ALTER TABLE `expenses_category`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `user_expense`
--
ALTER TABLE `user_expense`
  MODIFY `Expense_ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_income`
--
ALTER TABLE `user_income`
  MODIFY `Income_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_expense`
--
ALTER TABLE `user_expense`
  ADD CONSTRAINT `UserExpense_Category` FOREIGN KEY (`Expense_Category`) REFERENCES `expenses_category` (`Name`) ON UPDATE CASCADE,
  ADD CONSTRAINT `UserExpense_UserID` FOREIGN KEY (`User_ID`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_income`
--
ALTER TABLE `user_income`
  ADD CONSTRAINT `UserIncome_UserID` FOREIGN KEY (`User_ID`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
