-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-11-10 04:59:36
-- 服务器版本： 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finance`
--

DELIMITER $$
--
-- 存储过程
--
CREATE DEFINER='wilsandb'@'localhost' PROCEDURE `fixed_expense_15seconds` ()  NO SQL
begin
DECLARE U_ID int;  
DECLARE s int default 0;
DECLARE cursor_user CURSOR FOR select ID from user;  
DECLARE CONTINUE HANDLER FOR SQLSTATE '02000' SET s=-1; 

OPEN cursor_user;
fetch  cursor_user into U_ID;  
while s <> -1 do  
                           
                            insert into user_expense (User_ID,Expense_Name,Expense_Amount,Expense_Category,Expense_Description,Expense_EnterDate)
SELECT 
User_ID,Expense_Name,Expense_Amount,Expense_Category,Expense_Description,now() from user_fixed_expense where User_ID=U_ID and Expense_PayEvery='15 seconds';
                           fetch  cursor_user into U_ID;
                      
end while;  
CLOSE cursor_user ;  
END$$

CREATE DEFINER='wilsandb'@'localhost' PROCEDURE `fixed_expense_day` ()  begin
DECLARE U_ID int;  
DECLARE s int default 0;
DECLARE cursor_user CURSOR FOR select ID from user;  
DECLARE CONTINUE HANDLER FOR SQLSTATE '02000' SET s=-1; 

OPEN cursor_user;
fetch  cursor_user into U_ID;  
while s <> -1 do  
                           
                            insert into user_expense (User_ID,Expense_Name,Expense_Amount,Expense_Category,Expense_Description,Expense_EnterDate)
SELECT 
User_ID,Expense_Name,Expense_Amount,Expense_Category,Expense_Description,now() from user_fixed_expense where User_ID=U_ID and Expense_PayEvery='Day';
                           fetch  cursor_user into U_ID;
                      
end while;  
CLOSE cursor_user ;  
END$$

CREATE DEFINER='wilsandb'@'localhost' PROCEDURE `fixed_expense_month` ()  NO SQL
begin
DECLARE U_ID int;  
DECLARE s int default 0;
DECLARE cursor_user CURSOR FOR select ID from user;  
DECLARE CONTINUE HANDLER FOR SQLSTATE '02000' SET s=-1; 

OPEN cursor_user;
fetch  cursor_user into U_ID;  
while s <> -1 do  
                           
                            insert into user_expense (User_ID,Expense_Name,Expense_Amount,Expense_Category,Expense_Description,Expense_EnterDate)
SELECT 
User_ID,Expense_Name,Expense_Amount,Expense_Category,Expense_Description,now() from user_fixed_expense where User_ID=U_ID and Expense_PayEvery='Month';
                           fetch  cursor_user into U_ID;
                      
end while;  
CLOSE cursor_user ;  
END$$

CREATE DEFINER='wilsandb'@'localhost' PROCEDURE `fixed_income_15seconds` ()  NO SQL
begin
DECLARE U_ID int;  
DECLARE s int default 0;
DECLARE cursor_user CURSOR FOR select ID from user;  
DECLARE CONTINUE HANDLER FOR SQLSTATE '02000' SET s=-1; 

OPEN cursor_user;
fetch  cursor_user into U_ID;  
while s <> -1 do  
                           
                            insert into user_income (User_ID,	Income_Name,Income_Amount,Income_Category,Income_Description,	Income_EnterDate)SELECT 
User_ID,Income_Name,Income_Amount,'Fixed Income',Income_Description,now() from user_fixed_income where User_ID=U_ID and Income_PayEvery='15 seconds';
                           fetch  cursor_user into U_ID;
                      
end while;  
CLOSE cursor_user ;  
END$$

CREATE DEFINER='wilsandb'@'localhost' PROCEDURE `fixed_income_day` ()  NO SQL
begin
DECLARE U_ID int;  
DECLARE s int default 0;
DECLARE cursor_user CURSOR FOR select ID from user;  
DECLARE CONTINUE HANDLER FOR SQLSTATE '02000' SET s=-1; 

OPEN cursor_user;
fetch  cursor_user into U_ID;  
while s <> -1 do  
                           
                            insert into user_income (User_ID,	Income_Name,Income_Amount,Income_Category,Income_Description,	Income_EnterDate)SELECT 
User_ID,Income_Name,Income_Amount,'Fixed Income',Income_Description,now() from user_fixed_income where User_ID=U_ID and Income_PayEvery='Day';
                           fetch  cursor_user into U_ID;
                      
end while;  
CLOSE cursor_user ;  
END$$

CREATE DEFINER='wilsandb'@'localhost' PROCEDURE `fixed_income_month` ()  NO SQL
begin
DECLARE U_ID int;  
DECLARE s int default 0;
DECLARE cursor_user CURSOR FOR select ID from user;  
DECLARE CONTINUE HANDLER FOR SQLSTATE '02000' SET s=-1; 

OPEN cursor_user;
fetch  cursor_user into U_ID;  
while s <> -1 do  
                           
                            insert into user_income (User_ID,	Income_Name,Income_Amount,Income_Category,Income_Description,	Income_EnterDate)SELECT 
User_ID,Income_Name,Income_Amount,'Fixed Income',Income_Description,now() from user_fixed_income where User_ID=U_ID and Income_PayEvery='Month';
                           fetch  cursor_user into U_ID;
                      
end while;  
CLOSE cursor_user ;  
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- 表的结构 `countries`
--

CREATE TABLE `countries` (
  `country_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `countries`
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
-- 表的结构 `expenses_category`
--

CREATE TABLE `expenses_category` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `expenses_category`
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
-- 表的结构 `income_category`
--

CREATE TABLE `income_category` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `income_category`
--

INSERT INTO `income_category` (`ID`, `Name`) VALUES
(1, 'Fixed Income'),
(2, 'Other');

-- --------------------------------------------------------

--
-- 表的结构 `paytime_category`
--

CREATE TABLE `paytime_category` (
  `id` int(11) NOT NULL,
  `paytime_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `paytime_category`
--

INSERT INTO `paytime_category` (`id`, `paytime_name`) VALUES
(3, '15 seconds'),
(1, 'Day'),
(2, 'Month');

-- --------------------------------------------------------

--
-- 表的结构 `target`
--

CREATE TABLE `target` (
  `Target_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Target_Name` varchar(100) NOT NULL,
  `Target_Amount` int(11) NOT NULL,
  `Target_Days` int(11) NOT NULL,
  `Target_AchieveDate` date DEFAULT NULL,
  `Target_EnterDate` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `target`
--

INSERT INTO `target` (`Target_ID`, `User_ID`, `Target_Name`, `Target_Amount`, `Target_Days`, `Target_AchieveDate`, `Target_EnterDate`) VALUES
(26, 7, 'limit 10', 33, 3, '2016-11-09', '2016-11-06'),
(25, 7, 'new CAR', 2000, 9, '2016-11-15', '2016-11-06'),
(13, 7, 'SD card reader', 20, 16, '2016-11-16', '2016-11-01'),
(22, 7, 'dd', 14, 4, '2016-11-09', '2016-11-05'),
(24, 7, 'new iphone 7', 2000, 18, '2016-11-24', '2016-11-06');

-- --------------------------------------------------------

--
-- 表的结构 `user`
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
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`ID`, `Email`, `FirstName`, `LastName`, `Password`, `DOB`, `Gender`, `Country`, `Occupation`, `AboutMe`, `RegisterDate`, `LastLoginDate`, `LastLoginIP`, `EmailVerified`, `LastChangePasswordDate`, `LastUpdateDate`, `User_Image`, `Token`, `Token_expTime`, `Verification_Code`) VALUES
(35, 'a@c', 'a', 'a1', '202cb962ac59075b964b07152d234b70', '2015-01-01', 'Female', 'Anguilla', 'a', '', '2016-10-22 11:10:54', '2016-11-09 11:38:23', '::1', 1, '2016-10-31 17:57:18', '2016-10-28 18:28:23', 'Default/Male.jpg', '1088c1ee4c896e6517e913813034ee4f', '2016-10-23 11:10:54', NULL),
(36, '1240327852654803@facebook.com', '怡杰', '赖', 'f9081c919595a5e0f794c2a941e93f05', '2016-10-22', 'Male', 'Malaysia', '', 'bb', '2016-10-22 11:11:07', '2016-11-10 12:56:38', '::1', 0, '2016-10-27 15:28:50', '2016-11-01 16:32:14', '1477554877551R28031.jpg', 'aa62f9d8a8e32287ce035b1e28a909a5', '2016-10-23 11:11:07', NULL),
(40, 'SUSANMILLER64676@testing.com', 'SUSAN', 'MILLER', '202cb962ac59075b964b07152d234b70', '2016-11-05', 'Female', 'Malaysia', 'Student', NULL, '2016-11-05 14:00:06', '2016-11-05 14:00:06', NULL, 0, '2016-11-05 14:00:06', '2016-11-05 14:00:06', 'Default/Female.jpg', '20b17dd55ed7087eaf700df138054c79', '2016-11-06 14:00:06', NULL),
(41, 'LISATAYLOR64469@testing.com', 'LISA', 'TAYLOR', '202cb962ac59075b964b07152d234b70', '2016-11-05', 'Female', 'Malaysia', 'Student', NULL, '2016-11-05 14:00:06', '2016-11-05 14:00:06', NULL, 0, '2016-11-05 14:00:06', '2016-11-05 14:00:06', 'Default/Female.jpg', 'f341cc4fd0152d52299c38fb3fd461b8', '2016-11-06 14:00:06', NULL),
(42, 'LAURANELSON14065@testing.com', 'LAURA', 'NELSON', '202cb962ac59075b964b07152d234b70', '2016-11-05', 'Male', 'Malaysia', 'Student', NULL, '2016-11-05 14:00:06', '2016-11-05 14:00:06', NULL, 0, '2016-11-05 14:00:06', '2016-11-05 14:00:06', 'Default/Male.jpg', 'f0c15270a1aa009cbdffa3282ff83bef', '2016-11-06 14:00:06', NULL),
(43, 'LISAHARRIS60343@testing.com', 'LISA', 'HARRIS', '202cb962ac59075b964b07152d234b70', '2016-11-05', 'Male', 'Malaysia', 'Student', NULL, '2016-11-05 14:00:06', '2016-11-05 14:00:06', NULL, 0, '2016-11-05 14:00:06', '2016-11-05 14:00:06', 'Default/Male.jpg', '36f227c105ac5c632fcd662c5536e6cb', '2016-11-06 14:00:06', NULL),
(44, 'LISATAYLOR173@testing.com', 'LISA', 'TAYLOR', '202cb962ac59075b964b07152d234b70', '2016-11-05', 'Male', 'Malaysia', 'Student', NULL, '2016-11-05 14:00:06', '2016-11-05 14:00:06', NULL, 0, '2016-11-05 14:00:06', '2016-11-05 14:00:06', 'Default/Male.jpg', 'b747e017da89f1ac83d6c30193a2f5b3', '2016-11-06 14:00:06', NULL),
(45, 'LISATAYLOR80435@testing.com', 'LISA', 'TAYLOR', '202cb962ac59075b964b07152d234b70', '2016-11-05', 'Male', 'Malaysia', 'Student', NULL, '2016-11-05 14:00:06', '2016-11-05 14:00:06', NULL, 0, '2016-11-05 14:00:06', '2016-11-05 14:00:06', 'Default/Male.jpg', '5aa00c9a0a9a62e8f085cd9ffabc6ef3', '2016-11-06 14:00:06', NULL),
(46, 'LISAMARTIN98002@testing.com', 'LISA', 'MARTIN', '202cb962ac59075b964b07152d234b70', '2016-11-05', 'Female', 'Malaysia', 'Student', NULL, '2016-11-05 14:00:06', '2016-11-05 14:00:06', NULL, 0, '2016-11-05 14:00:06', '2016-11-05 14:00:06', 'Default/Female.jpg', '35de266b7d0887d9d69135a9e5afcf05', '2016-11-06 14:00:06', NULL),
(47, 'JamesBROOKS99747@testing.com', 'James', 'BROOKS', '202cb962ac59075b964b07152d234b70', '2016-11-05', 'Female', 'Malaysia', 'Student', NULL, '2016-11-05 14:00:06', '2016-11-05 14:00:06', NULL, 0, '2016-11-05 14:00:06', '2016-11-05 14:00:06', 'Default/Female.jpg', '0f76158c79bbe68f0e9b9c6ca94d0ab4', '2016-11-06 14:00:06', NULL),
(48, 'MARYBROOKS82547@testing.com', 'MARY', 'BROOKS', '202cb962ac59075b964b07152d234b70', '2016-11-05', 'Female', 'Malaysia', 'Student', NULL, '2016-11-05 14:00:06', '2016-11-05 14:00:06', NULL, 0, '2016-11-05 14:00:06', '2016-11-05 14:00:06', 'Default/Female.jpg', '6c6a44cf807e7e57e32505951de63b9f', '2016-11-06 14:00:06', NULL),
(49, 'LISAHARRIS93277@testing.com', 'LISA', 'HARRIS', '202cb962ac59075b964b07152d234b70', '2016-11-05', 'Female', 'Malaysia', 'Student', NULL, '2016-11-05 14:00:06', '2016-11-05 14:00:06', NULL, 0, '2016-11-05 14:00:06', '2016-11-05 14:00:06', 'Default/Female.jpg', '702b171b7a5895b668f194fbef101b97', '2016-11-06 14:00:06', NULL),
(50, 'SUSANTAYLOR89661@testing.com', 'SUSAN', 'TAYLOR', '202cb962ac59075b964b07152d234b70', '2016-11-05', 'Female', 'Malaysia', 'Student', NULL, '2016-11-05 14:21:13', '2016-11-05 14:21:13', NULL, 0, '2016-11-05 14:21:13', '2016-11-05 14:21:13', 'Default/Female.jpg', 'cf63a8d855e699ee175c6ebfefc16fa3', '2016-11-06 14:21:13', NULL),
(51, 'MARYHARRIS93116@testing.com', 'MARY', 'HARRIS', '202cb962ac59075b964b07152d234b70', '2016-11-05', 'Male', 'Malaysia', 'Student', NULL, '2016-11-05 14:21:13', '2016-11-05 14:21:13', NULL, 0, '2016-11-05 14:21:13', '2016-11-05 14:21:13', 'Default/Male.jpg', '1c39dbfaa0c72eeca41f1cf1e8946669', '2016-11-06 14:21:13', NULL),
(52, 'RICHARDWALKER67468@testing.com', 'RICHARD', 'WALKER', '202cb962ac59075b964b07152d234b70', '2016-11-05', 'Male', 'Malaysia', 'Student', NULL, '2016-11-05 14:21:13', '2016-11-05 14:21:13', NULL, 0, '2016-11-05 14:21:13', '2016-11-05 14:21:13', 'Default/Male.jpg', '05ce092afee996c11059d431e93e9f76', '2016-11-06 14:21:13', NULL),
(53, 'MARKEDWARDS97095@testing.com', 'MARK', 'EDWARDS', '202cb962ac59075b964b07152d234b70', '2016-11-05', 'Female', 'Malaysia', 'Student', NULL, '2016-11-05 14:21:13', '2016-11-05 14:21:13', NULL, 0, '2016-11-05 14:21:13', '2016-11-05 14:21:13', 'Default/Female.jpg', '45ae1fb10695db18cd3c884aa83cf6ac', '2016-11-06 14:21:13', NULL),
(54, 'JamesEDWARDS16369@testing.com', 'James', 'EDWARDS', '202cb962ac59075b964b07152d234b70', '2016-11-05', 'Female', 'Malaysia', 'Student', NULL, '2016-11-05 14:21:13', '2016-11-05 14:21:13', NULL, 0, '2016-11-05 14:21:13', '2016-11-05 14:21:13', 'Default/Female.jpg', '4e8f2c12d48cf4cc17bb1b5a623f1047', '2016-11-06 14:21:13', NULL),
(55, 'MARKTAYLOR9668@testing.com', 'MARK', 'TAYLOR', '202cb962ac59075b964b07152d234b70', '2016-11-05', 'Male', 'Malaysia', 'Student', NULL, '2016-11-05 14:21:13', '2016-11-05 14:21:13', NULL, 0, '2016-11-05 14:21:13', '2016-11-05 14:21:13', 'Default/Male.jpg', 'dc3f1686345bef26042d51f99df59872', '2016-11-06 14:21:13', NULL),
(56, 'CYNTHIANELSON11364@testing.com', 'CYNTHIA', 'NELSON', '202cb962ac59075b964b07152d234b70', '2016-11-05', 'Female', 'Malaysia', 'Student', NULL, '2016-11-05 14:21:13', '2016-11-05 14:21:13', NULL, 0, '2016-11-05 14:21:13', '2016-11-05 14:21:13', 'Default/Female.jpg', '74ade694eb422f0090e792eba0e5b432', '2016-11-06 14:21:13', NULL),
(57, 'JamesMILLER5835@testing.com', 'James', 'MILLER', '202cb962ac59075b964b07152d234b70', '2016-11-05', 'Female', 'Malaysia', 'Student', NULL, '2016-11-05 14:21:13', '2016-11-05 14:21:13', NULL, 0, '2016-11-05 14:21:13', '2016-11-05 14:21:13', 'Default/Female.jpg', 'a82befa6e7ff413e209fc4053b36a770', '2016-11-06 14:21:13', NULL),
(58, 'MICHAELWALKER27453@testing.com', 'MICHAEL', 'WALKER', '202cb962ac59075b964b07152d234b70', '2016-11-05', 'Male', 'Malaysia', 'Student', NULL, '2016-11-05 14:21:13', '2016-11-05 14:21:13', NULL, 0, '2016-11-05 14:21:13', '2016-11-05 14:21:13', 'Default/Male.jpg', '53ba475556cbe48864bbcdd64520c9c9', '2016-11-06 14:21:13', NULL),
(59, 'DAVIDMARTIN60596@testing.com', 'DAVID', 'MARTIN', '202cb962ac59075b964b07152d234b70', '2016-11-05', 'Female', 'Malaysia', 'Student', NULL, '2016-11-05 14:21:14', '2016-11-05 14:21:14', NULL, 0, '2016-11-05 14:21:14', '2016-11-05 14:21:14', 'Default/Female.jpg', '456685b6b91f69fec11bc28946020fe1', '2016-11-06 14:21:14', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `user_expense`
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
-- 转存表中的数据 `user_expense`
--

INSERT INTO `user_expense` (`Expense_ID`, `User_ID`, `Expense_Name`, `Expense_Amount`, `Expense_Category`, `Expense_Description`, `Expense_EnterDate`) VALUES
(5, 36, '33', '3000.00', 'Fixed expenses', '33', '2016-10-22'),
(7, 36, '1', '2000.00', 'Entertainment', '', '2016-10-29'),
(8, 36, '1', '3000.00', 'Transport', '', '2016-10-29'),
(9, 36, '2', '1500.00', 'Food & beverage', '', '2016-10-29'),
(10, 36, '3', '2300.00', 'Debts', '', '2016-10-29'),
(11, 36, '1', '1000.00', 'Others', '', '2016-10-29'),
(12, 36, '33', '123.00', 'Fixed expenses', '33', '2016-09-22'),
(13, 36, '1', '200.00', 'Entertainment', '', '2016-09-29'),
(14, 36, '1', '500.00', 'Transport', '', '2016-09-29'),
(15, 36, '2', '1200.00', 'Food & beverage', '', '2016-09-29'),
(16, 36, '3', '2500.00', 'Debts', '', '2016-09-29'),
(17, 36, '1', '1100.00', 'Others', '', '2016-09-29'),
(18, 36, '33', '1123.00', 'Fixed expenses', '33', '2016-08-22'),
(19, 36, '1', '2000.00', 'Entertainment', '', '2016-08-29'),
(20, 36, '1', '3500.00', 'Transport', '', '2016-08-29'),
(21, 36, '2', '2400.00', 'Food & beverage', '', '2016-08-29'),
(22, 36, '3', '2150.00', 'Debts', '', '2016-08-29'),
(23, 36, '1', '1420.00', 'Others', '', '2016-08-29'),
(24, 36, '1123', '1001.12', 'Fixed expenses', '1', '2016-11-02'),
(25, 36, '1', '1000.00', 'Debts', '', '2016-11-03'),
(26, 36, '2', '2000.00', 'Entertainment', '', '2016-11-03'),
(28, 35, '1', '1000.00', 'Debts', '', '2016-11-03'),
(29, 35, '2', '2000.00', 'Entertainment', '', '2016-11-03'),
(30, 35, '3', '3000.00', 'Others', '', '2016-11-03'),
(31, 36, '1', '1000.00', 'Debts', '', '2016-11-03'),
(32, 36, '1', '2000.00', 'Others', '1', '2016-11-03'),
(33, 36, '11', '1.00', 'Fixed expenses', '11', '2016-11-03'),
(35, 36, '2', '2123.00', 'Others', '', '2016-11-05'),
(36, 36, '3', '3000.00', 'Transport', '', '2016-11-05'),
(37, 36, '1', '1000.00', 'Transport', '', '2016-11-05'),
(744, 40, 'testExpense40', '7000.00', 'Transport', 'test', '2016-11-05'),
(745, 40, 'testExpense40', '4000.00', 'Fixed expenses', 'test', '2016-11-05'),
(746, 40, 'testExpense40', '7000.00', 'Food & beverage', 'test', '2016-11-05'),
(747, 40, 'testExpense40', '6000.00', 'Fixed expenses', 'test', '2016-11-05'),
(748, 40, 'testExpense40', '6000.00', 'Entertainment', 'test', '2016-11-05'),
(749, 40, 'testExpense40', '9000.00', 'Debts', 'test', '2016-11-05'),
(750, 40, 'testExpense40', '9000.00', 'Others', 'test', '2016-11-05'),
(751, 40, 'testExpense40', '1000.00', 'Entertainment', 'test', '2016-11-05'),
(752, 40, 'testExpense40', '5000.00', 'Fixed expenses', 'test', '2016-11-05'),
(753, 40, 'testExpense40', '1000.00', 'Fixed expenses', 'test', '2016-11-05'),
(754, 40, 'testExpense40', '6000.00', 'Entertainment', 'test', '2016-11-05'),
(755, 40, 'testExpense40', '4000.00', 'Entertainment', 'test', '2016-11-05'),
(756, 40, 'testExpense40', '6000.00', 'Debts', 'test', '2016-11-05'),
(757, 40, 'testExpense40', '10000.00', 'Transport', 'test', '2016-11-05'),
(758, 40, 'testExpense40', '7000.00', 'Entertainment', 'test', '2016-11-05'),
(759, 40, 'testExpense40', '1000.00', 'Debts', 'test', '2016-11-05'),
(760, 40, 'testExpense40', '7000.00', 'Fixed expenses', 'test', '2016-11-05'),
(761, 40, 'testExpense40', '9000.00', 'Debts', 'test', '2016-11-05'),
(762, 40, 'testExpense40', '7000.00', 'Transport', 'test', '2016-11-05'),
(763, 40, 'testExpense40', '3000.00', 'Food & beverage', 'test', '2016-11-05'),
(764, 40, 'testExpense40', '10000.00', 'Debts', 'test', '2016-11-05'),
(765, 40, 'testExpense40', '8000.00', 'Food & beverage', 'test', '2016-11-05'),
(766, 40, 'testExpense40', '8000.00', 'Fixed expenses', 'test', '2016-11-05'),
(767, 40, 'testExpense40', '8000.00', 'Food & beverage', 'test', '2016-11-05'),
(768, 40, 'testExpense40', '5000.00', 'Debts', 'test', '2016-11-05'),
(769, 40, 'testExpense40', '1000.00', 'Transport', 'test', '2016-11-05'),
(770, 40, 'testExpense40', '3000.00', 'Others', 'test', '2016-11-05'),
(771, 40, 'testExpense40', '7000.00', 'Transport', 'test', '2016-11-05'),
(772, 40, 'testExpense40', '3000.00', 'Entertainment', 'test', '2016-11-05'),
(773, 40, 'testExpense40', '6000.00', 'Fixed expenses', 'test', '2016-11-05'),
(774, 40, 'testExpense40', '5000.00', 'Fixed expenses', 'test', '2016-11-05'),
(775, 40, 'testExpense40', '6000.00', 'Debts', 'test', '2016-11-05'),
(776, 40, 'testExpense40', '2000.00', 'Others', 'test', '2016-11-05'),
(777, 40, 'testExpense40', '8000.00', 'Transport', 'test', '2016-11-05'),
(778, 40, 'testExpense40', '7000.00', 'Entertainment', 'test', '2016-11-05'),
(779, 40, 'testExpense40', '8000.00', 'Entertainment', 'test', '2016-11-05'),
(780, 40, 'testExpense40', '6000.00', 'Debts', 'test', '2016-11-05'),
(781, 40, 'testExpense40', '7000.00', 'Others', 'test', '2016-11-05'),
(782, 40, 'testExpense40', '10000.00', 'Food & beverage', 'test', '2016-11-05'),
(783, 40, 'testExpense40', '8000.00', 'Others', 'test', '2016-11-05'),
(784, 40, 'testExpense40', '1000.00', 'Fixed expenses', 'test', '2016-11-05'),
(785, 40, 'testExpense40', '5000.00', 'Fixed expenses', 'test', '2016-11-05'),
(786, 40, 'testExpense40', '9000.00', 'Fixed expenses', 'test', '2016-11-05'),
(787, 40, 'testExpense40', '8000.00', 'Transport', 'test', '2016-11-05'),
(788, 40, 'testExpense40', '1000.00', 'Food & beverage', 'test', '2016-11-05'),
(789, 40, 'testExpense40', '2000.00', 'Food & beverage', 'test', '2016-11-05'),
(790, 40, 'testExpense40', '6000.00', 'Debts', 'test', '2016-11-05'),
(791, 40, 'testExpense40', '4000.00', 'Transport', 'test', '2016-11-05'),
(792, 40, 'testExpense40', '4000.00', 'Others', 'test', '2016-11-05'),
(793, 40, 'testExpense40', '2000.00', 'Others', 'test', '2016-11-05'),
(794, 40, 'testExpense40', '4000.00', 'Fixed expenses', 'test', '2016-11-05'),
(795, 40, 'testExpense40', '9000.00', 'Debts', 'test', '2016-11-05'),
(796, 40, 'testExpense40', '2000.00', 'Entertainment', 'test', '2016-11-05'),
(797, 40, 'testExpense40', '5000.00', 'Fixed expenses', 'test', '2016-11-05'),
(798, 40, 'testExpense40', '5000.00', 'Debts', 'test', '2016-11-05'),
(799, 40, 'testExpense40', '9000.00', 'Others', 'test', '2016-11-05'),
(800, 40, 'testExpense40', '4000.00', 'Food & beverage', 'test', '2016-11-05'),
(801, 40, 'testExpense40', '4000.00', 'Debts', 'test', '2016-11-05'),
(802, 40, 'testExpense40', '4000.00', 'Transport', 'test', '2016-11-05'),
(803, 40, 'testExpense40', '5000.00', 'Entertainment', 'test', '2016-11-05'),
(804, 40, 'testExpense40', '1000.00', 'Entertainment', 'test', '2016-11-05'),
(805, 40, 'testExpense40', '8000.00', 'Fixed expenses', 'test', '2016-11-05'),
(806, 40, 'testExpense40', '10000.00', 'Debts', 'test', '2016-11-05'),
(807, 40, 'testExpense40', '5000.00', 'Food & beverage', 'test', '2016-11-05'),
(808, 40, 'testExpense40', '2000.00', 'Fixed expenses', 'test', '2016-11-05'),
(809, 40, 'testExpense40', '1000.00', 'Others', 'test', '2016-11-05'),
(810, 40, 'testExpense40', '10000.00', 'Others', 'test', '2016-11-05'),
(811, 40, 'testExpense40', '8000.00', 'Fixed expenses', 'test', '2016-11-05'),
(812, 40, 'testExpense40', '10000.00', 'Others', 'test', '2016-11-05'),
(813, 40, 'testExpense40', '3000.00', 'Others', 'test', '2016-11-05'),
(814, 40, 'testExpense40', '4000.00', 'Debts', 'test', '2016-11-05'),
(815, 40, 'testExpense40', '3000.00', 'Others', 'test', '2016-11-05'),
(816, 40, 'testExpense40', '2000.00', 'Fixed expenses', 'test', '2016-11-05'),
(817, 40, 'testExpense40', '7000.00', 'Transport', 'test', '2016-11-05'),
(818, 40, 'testExpense40', '7000.00', 'Entertainment', 'test', '2016-11-05'),
(819, 40, 'testExpense40', '10000.00', 'Transport', 'test', '2016-11-05'),
(820, 40, 'testExpense40', '1000.00', 'Transport', 'test', '2016-11-05'),
(821, 40, 'testExpense40', '3000.00', 'Others', 'test', '2016-11-05'),
(822, 40, 'testExpense40', '8000.00', 'Food & beverage', 'test', '2016-11-05'),
(823, 40, 'testExpense40', '7000.00', 'Entertainment', 'test', '2016-11-05'),
(824, 40, 'testExpense40', '6000.00', 'Others', 'test', '2016-11-05'),
(825, 40, 'testExpense40', '5000.00', 'Others', 'test', '2016-11-05'),
(826, 40, 'testExpense40', '5000.00', 'Transport', 'test', '2016-11-05'),
(827, 40, 'testExpense40', '4000.00', 'Transport', 'test', '2016-11-05'),
(828, 40, 'testExpense40', '8000.00', 'Entertainment', 'test', '2016-11-05'),
(829, 40, 'testExpense40', '1000.00', 'Food & beverage', 'test', '2016-11-05'),
(830, 40, 'testExpense40', '6000.00', 'Food & beverage', 'test', '2016-11-05'),
(831, 40, 'testExpense40', '9000.00', 'Fixed expenses', 'test', '2016-11-05'),
(832, 40, 'testExpense40', '6000.00', 'Transport', 'test', '2016-11-05'),
(833, 40, 'testExpense40', '6000.00', 'Others', 'test', '2016-11-05'),
(834, 40, 'testExpense40', '8000.00', 'Others', 'test', '2016-11-05'),
(835, 40, 'testExpense40', '2000.00', 'Transport', 'test', '2016-11-05'),
(836, 40, 'testExpense40', '2000.00', 'Transport', 'test', '2016-11-05'),
(837, 40, 'testExpense40', '8000.00', 'Others', 'test', '2016-11-05'),
(838, 40, 'testExpense40', '10000.00', 'Food & beverage', 'test', '2016-11-05'),
(839, 40, 'testExpense40', '1000.00', 'Food & beverage', 'test', '2016-11-05'),
(840, 40, 'testExpense40', '5000.00', 'Transport', 'test', '2016-11-05'),
(841, 40, 'testExpense40', '3000.00', 'Transport', 'test', '2016-11-05'),
(842, 41, 'testExpense41', '8000.00', 'Debts', 'test', '2016-11-05'),
(843, 41, 'testExpense41', '7000.00', 'Transport', 'test', '2016-11-05'),
(844, 41, 'testExpense41', '7000.00', 'Entertainment', 'test', '2016-11-05'),
(845, 41, 'testExpense41', '8000.00', 'Debts', 'test', '2016-11-05'),
(846, 41, 'testExpense41', '2000.00', 'Food & beverage', 'test', '2016-11-05'),
(847, 42, 'testExpense42', '7000.00', 'Debts', 'test', '2016-11-05'),
(848, 42, 'testExpense42', '6000.00', 'Debts', 'test', '2016-11-05'),
(849, 42, 'testExpense42', '9000.00', 'Food & beverage', 'test', '2016-11-05'),
(850, 42, 'testExpense42', '8000.00', 'Debts', 'test', '2016-11-05'),
(851, 42, 'testExpense42', '2000.00', 'Entertainment', 'test', '2016-11-05'),
(852, 43, 'testExpense43', '4000.00', 'Entertainment', 'test', '2016-11-05'),
(853, 43, 'testExpense43', '3000.00', 'Entertainment', 'test', '2016-11-05'),
(854, 43, 'testExpense43', '5000.00', 'Debts', 'test', '2016-11-05'),
(855, 43, 'testExpense43', '8000.00', 'Transport', 'test', '2016-11-05'),
(856, 43, 'testExpense43', '1000.00', 'Others', 'test', '2016-11-05'),
(857, 44, 'testExpense44', '6000.00', 'Debts', 'test', '2016-11-05'),
(858, 44, 'testExpense44', '9000.00', 'Entertainment', 'test', '2016-11-05'),
(859, 44, 'testExpense44', '8000.00', 'Debts', 'test', '2016-11-05'),
(860, 44, 'testExpense44', '7000.00', 'Entertainment', 'test', '2016-11-05'),
(861, 44, 'testExpense44', '5000.00', 'Entertainment', 'test', '2016-11-05'),
(862, 45, 'testExpense45', '1000.00', 'Debts', 'test', '2016-11-05'),
(863, 45, 'testExpense45', '7000.00', 'Fixed expenses', 'test', '2016-11-05'),
(864, 45, 'testExpense45', '2000.00', 'Debts', 'test', '2016-11-05'),
(865, 45, 'testExpense45', '6000.00', 'Others', 'test', '2016-11-05'),
(866, 45, 'testExpense45', '6000.00', 'Fixed expenses', 'test', '2016-11-05'),
(867, 46, 'testExpense46', '8000.00', 'Transport', 'test', '2016-11-05'),
(868, 46, 'testExpense46', '8000.00', 'Food & beverage', 'test', '2016-11-05'),
(869, 46, 'testExpense46', '7000.00', 'Fixed expenses', 'test', '2016-11-05'),
(870, 46, 'testExpense46', '3000.00', 'Transport', 'test', '2016-11-05'),
(871, 46, 'testExpense46', '7000.00', 'Transport', 'test', '2016-11-05'),
(872, 47, 'testExpense47', '2000.00', 'Entertainment', 'test', '2016-11-05'),
(873, 47, 'testExpense47', '3000.00', 'Fixed expenses', 'test', '2016-11-05'),
(874, 47, 'testExpense47', '9000.00', 'Entertainment', 'test', '2016-11-05'),
(875, 47, 'testExpense47', '6000.00', 'Others', 'test', '2016-11-05'),
(876, 47, 'testExpense47', '8000.00', 'Food & beverage', 'test', '2016-11-05'),
(877, 48, 'testExpense48', '2000.00', 'Transport', 'test', '2016-11-05'),
(878, 48, 'testExpense48', '4000.00', 'Transport', 'test', '2016-11-05'),
(879, 48, 'testExpense48', '10000.00', 'Others', 'test', '2016-11-05'),
(880, 48, 'testExpense48', '4000.00', 'Others', 'test', '2016-11-05'),
(881, 48, 'testExpense48', '9000.00', 'Others', 'test', '2016-11-05'),
(882, 49, 'testExpense49', '2000.00', 'Others', 'test', '2016-11-05'),
(883, 49, 'testExpense49', '2000.00', 'Transport', 'test', '2016-11-05'),
(884, 49, 'testExpense49', '2000.00', 'Entertainment', 'test', '2016-11-05'),
(885, 49, 'testExpense49', '2000.00', 'Debts', 'test', '2016-11-05'),
(886, 49, 'testExpense49', '5000.00', 'Entertainment', 'test', '2016-11-05'),
(887, 50, 'testExpense50', '2000.00', 'Debts', 'test', '2016-11-05'),
(888, 50, 'testExpense50', '4000.00', 'Debts', 'test', '2016-11-05'),
(889, 50, 'testExpense50', '2000.00', 'Fixed expenses', 'test', '2016-11-05'),
(890, 50, 'testExpense50', '7000.00', 'Food & beverage', 'test', '2016-11-05'),
(891, 50, 'testExpense50', '6000.00', 'Entertainment', 'test', '2016-11-05'),
(892, 51, 'testExpense51', '5000.00', 'Fixed expenses', 'test', '2016-11-05'),
(893, 51, 'testExpense51', '4000.00', 'Food & beverage', 'test', '2016-11-05'),
(894, 51, 'testExpense51', '1000.00', 'Food & beverage', 'test', '2016-11-05'),
(895, 51, 'testExpense51', '9000.00', 'Others', 'test', '2016-11-05'),
(896, 51, 'testExpense51', '1000.00', 'Others', 'test', '2016-11-05'),
(897, 52, 'testExpense52', '2000.00', 'Food & beverage', 'test', '2016-11-05'),
(898, 52, 'testExpense52', '8000.00', 'Food & beverage', 'test', '2016-11-05'),
(899, 52, 'testExpense52', '2000.00', 'Food & beverage', 'test', '2016-11-05'),
(900, 52, 'testExpense52', '4000.00', 'Debts', 'test', '2016-11-05'),
(901, 52, 'testExpense52', '4000.00', 'Others', 'test', '2016-11-05'),
(902, 53, 'testExpense53', '1000.00', 'Transport', 'test', '2016-11-05'),
(903, 53, 'testExpense53', '3000.00', 'Entertainment', 'test', '2016-11-05'),
(904, 53, 'testExpense53', '4000.00', 'Debts', 'test', '2016-11-05'),
(905, 53, 'testExpense53', '6000.00', 'Transport', 'test', '2016-11-05'),
(906, 53, 'testExpense53', '4000.00', 'Food & beverage', 'test', '2016-11-05'),
(907, 54, 'testExpense54', '3000.00', 'Others', 'test', '2016-11-05'),
(908, 54, 'testExpense54', '1000.00', 'Transport', 'test', '2016-11-05'),
(909, 54, 'testExpense54', '4000.00', 'Transport', 'test', '2016-11-05'),
(910, 54, 'testExpense54', '7000.00', 'Debts', 'test', '2016-11-05'),
(911, 54, 'testExpense54', '8000.00', 'Others', 'test', '2016-11-05'),
(912, 55, 'testExpense55', '5000.00', 'Fixed expenses', 'test', '2016-11-05'),
(913, 55, 'testExpense55', '5000.00', 'Entertainment', 'test', '2016-11-05'),
(914, 55, 'testExpense55', '6000.00', 'Entertainment', 'test', '2016-11-05'),
(915, 55, 'testExpense55', '1000.00', 'Debts', 'test', '2016-11-05'),
(916, 55, 'testExpense55', '9000.00', 'Fixed expenses', 'test', '2016-11-05'),
(917, 56, 'testExpense56', '7000.00', 'Food & beverage', 'test', '2016-11-05'),
(918, 56, 'testExpense56', '2000.00', 'Fixed expenses', 'test', '2016-11-05'),
(919, 56, 'testExpense56', '6000.00', 'Fixed expenses', 'test', '2016-11-05'),
(920, 56, 'testExpense56', '9000.00', 'Transport', 'test', '2016-11-05'),
(921, 56, 'testExpense56', '4000.00', 'Entertainment', 'test', '2016-11-05'),
(922, 57, 'testExpense57', '8000.00', 'Fixed expenses', 'test', '2016-11-05'),
(923, 57, 'testExpense57', '7000.00', 'Food & beverage', 'test', '2016-11-05'),
(924, 57, 'testExpense57', '8000.00', 'Food & beverage', 'test', '2016-11-05'),
(925, 57, 'testExpense57', '4000.00', 'Debts', 'test', '2016-11-05'),
(926, 57, 'testExpense57', '7000.00', 'Debts', 'test', '2016-11-05'),
(927, 58, 'testExpense58', '10000.00', 'Fixed expenses', 'test', '2016-11-05'),
(928, 58, 'testExpense58', '6000.00', 'Others', 'test', '2016-11-05'),
(929, 58, 'testExpense58', '3000.00', 'Debts', 'test', '2016-11-05'),
(930, 58, 'testExpense58', '3000.00', 'Others', 'test', '2016-11-05'),
(931, 58, 'testExpense58', '6000.00', 'Transport', 'test', '2016-11-05'),
(932, 59, 'testExpense59', '4000.00', 'Transport', 'test', '2016-11-05'),
(933, 59, 'testExpense59', '9000.00', 'Entertainment', 'test', '2016-11-05'),
(934, 59, 'testExpense59', '6000.00', 'Entertainment', 'test', '2016-11-05'),
(935, 59, 'testExpense59', '2000.00', 'Entertainment', 'test', '2016-11-05'),
(936, 59, 'testExpense59', '10000.00', 'Entertainment', 'test', '2016-11-05'),
(937, 36, '2', '10000.00', 'Transport', '', '2016-11-05'),
(938, 36, '1', '1000.00', 'Food & beverage', '', '2016-11-07'),
(939, 36, '555', '100.00', 'Fixed expenses', '', '2016-11-10'),
(940, 36, '555', '100.00', 'Fixed expenses', '', '2016-11-10');

-- --------------------------------------------------------

--
-- 表的结构 `user_fixed_expense`
--

CREATE TABLE `user_fixed_expense` (
  `Expense_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Expense_Name` varchar(100) NOT NULL,
  `Expense_Amount` decimal(65,2) NOT NULL,
  `Expense_Category` varchar(50) NOT NULL,
  `Expense_Description` text,
  `Expense_EnterDate` date NOT NULL,
  `Expense_PayEvery` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user_fixed_expense`
--

INSERT INTO `user_fixed_expense` (`Expense_ID`, `User_ID`, `Expense_Name`, `Expense_Amount`, `Expense_Category`, `Expense_Description`, `Expense_EnterDate`, `Expense_PayEvery`) VALUES
(1, 36, 'fixed expense', '1234.00', 'Fixed expenses', 'testing fixed expense', '2016-11-09', 'Day'),
(4, 36, '2', '0.02', 'Fixed expenses', '2', '2016-11-06', 'Month');

-- --------------------------------------------------------

--
-- 表的结构 `user_fixed_income`
--

CREATE TABLE `user_fixed_income` (
  `Income_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Income_Name` varchar(100) NOT NULL,
  `Income_Amount` decimal(65,2) NOT NULL,
  `Income_Category` varchar(50) NOT NULL DEFAULT 'Fixed Income',
  `Income_Description` text NOT NULL,
  `Income_EnterDate` date DEFAULT NULL,
  `Income_PayEvery` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user_fixed_income`
--

INSERT INTO `user_fixed_income` (`Income_ID`, `User_ID`, `Income_Name`, `Income_Amount`, `Income_Category`, `Income_Description`, `Income_EnterDate`, `Income_PayEvery`) VALUES
(1, 36, 'test fixed income', '1122.00', 'Fixed Income', 'test fixed income', '2016-11-01', 'Day'),
(3, 36, '1', '0.01', 'Fixed Income', '1', '2016-11-06', 'Day');

-- --------------------------------------------------------

--
-- 表的结构 `user_income`
--

CREATE TABLE `user_income` (
  `Income_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Income_Name` varchar(100) NOT NULL,
  `Income_Amount` decimal(65,2) NOT NULL,
  `Income_Category` varchar(50) NOT NULL,
  `Income_Description` text NOT NULL,
  `Income_EnterDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user_income`
--

INSERT INTO `user_income` (`Income_ID`, `User_ID`, `Income_Name`, `Income_Amount`, `Income_Category`, `Income_Description`, `Income_EnterDate`) VALUES
(4, 36, '1', '2000.00', 'Fixed Income', '', '2016-10-29'),
(6, 36, '2', '2000.00', 'Other', '', '2016-10-29'),
(7, 36, '253', '11000.00', 'Fixed Income', '1', '2016-10-30'),
(8, 36, '2', '2200.00', 'Other', '', '2016-09-29'),
(9, 36, '253', '8000.00', 'Fixed Income', '1', '2016-09-30'),
(10, 36, '2', '3300.00', 'Other', '', '2016-08-29'),
(11, 36, '253', '18300.00', 'Fixed Income', '12', '2016-08-31'),
(13, 36, '123', '10123.00', 'Other', '1', '2016-11-01'),
(14, 36, '1000', '2000.00', 'Other', '', '2016-11-03'),
(15, 36, '123', '2000.00', 'Other', '1', '2016-11-05'),
(815, 40, 'testIncome40', '3000.00', 'Other', '', '2016-11-05'),
(816, 40, 'testIncome40', '1000.00', 'Other', '', '2016-11-05'),
(817, 40, 'testIncome40', '7000.00', 'Other', '', '2016-11-05'),
(818, 40, 'testIncome40', '8000.00', 'Other', '', '2016-11-05'),
(819, 40, 'testIncome40', '6000.00', 'Other', '', '2016-11-05'),
(820, 41, 'testIncome41', '7000.00', 'Other', '', '2016-11-05'),
(821, 41, 'testIncome41', '4000.00', 'Other', '', '2016-11-05'),
(822, 41, 'testIncome41', '7000.00', 'Other', '', '2016-11-05'),
(823, 41, 'testIncome41', '6000.00', 'Other', '', '2016-11-05'),
(824, 41, 'testIncome41', '10000.00', 'Other', '', '2016-11-05'),
(825, 42, 'testIncome42', '6000.00', 'Other', '', '2016-11-05'),
(826, 42, 'testIncome42', '4000.00', 'Other', '', '2016-11-05'),
(827, 42, 'testIncome42', '8000.00', 'Other', '', '2016-11-05'),
(828, 42, 'testIncome42', '7000.00', 'Other', '', '2016-11-05'),
(829, 42, 'testIncome42', '7000.00', 'Other', '', '2016-11-05'),
(830, 43, 'testIncome43', '5000.00', 'Other', '', '2016-11-05'),
(831, 43, 'testIncome43', '5000.00', 'Other', '', '2016-11-05'),
(832, 43, 'testIncome43', '10000.00', 'Other', '', '2016-11-05'),
(833, 43, 'testIncome43', '7000.00', 'Other', '', '2016-11-05'),
(834, 43, 'testIncome43', '9000.00', 'Other', '', '2016-11-05'),
(835, 44, 'testIncome44', '3000.00', 'Other', '', '2016-11-05'),
(836, 44, 'testIncome44', '8000.00', 'Other', '', '2016-11-05'),
(837, 44, 'testIncome44', '10000.00', 'Other', '', '2016-11-05'),
(838, 44, 'testIncome44', '2000.00', 'Other', '', '2016-11-05'),
(839, 44, 'testIncome44', '3000.00', 'Other', '', '2016-11-05'),
(840, 45, 'testIncome45', '3000.00', 'Other', '', '2016-11-05'),
(841, 45, 'testIncome45', '4000.00', 'Other', '', '2016-11-05'),
(842, 45, 'testIncome45', '5000.00', 'Other', '', '2016-11-05'),
(843, 45, 'testIncome45', '3000.00', 'Other', '', '2016-11-05'),
(844, 45, 'testIncome45', '3000.00', 'Other', '', '2016-11-05'),
(845, 46, 'testIncome46', '3000.00', 'Other', '', '2016-11-05'),
(846, 46, 'testIncome46', '2000.00', 'Other', '', '2016-11-05'),
(847, 46, 'testIncome46', '3000.00', 'Other', '', '2016-11-05'),
(848, 46, 'testIncome46', '1000.00', 'Other', '', '2016-11-05'),
(849, 46, 'testIncome46', '8000.00', 'Other', '', '2016-11-05'),
(850, 47, 'testIncome47', '4000.00', 'Other', '', '2016-11-05'),
(851, 47, 'testIncome47', '1000.00', 'Other', '', '2016-11-05'),
(852, 47, 'testIncome47', '5000.00', 'Other', '', '2016-11-05'),
(853, 47, 'testIncome47', '1000.00', 'Other', '', '2016-11-05'),
(854, 47, 'testIncome47', '6000.00', 'Other', '', '2016-11-05'),
(855, 48, 'testIncome48', '8000.00', 'Other', '', '2016-11-05'),
(856, 48, 'testIncome48', '7000.00', 'Other', '', '2016-11-05'),
(857, 48, 'testIncome48', '1000.00', 'Other', '', '2016-11-05'),
(858, 48, 'testIncome48', '9000.00', 'Other', '', '2016-11-05'),
(859, 48, 'testIncome48', '10000.00', 'Other', '', '2016-11-05'),
(860, 49, 'testIncome49', '5000.00', 'Other', '', '2016-11-05'),
(861, 49, 'testIncome49', '4000.00', 'Other', '', '2016-11-05'),
(862, 49, 'testIncome49', '7000.00', 'Other', '', '2016-11-05'),
(863, 49, 'testIncome49', '9000.00', 'Other', '', '2016-11-05'),
(864, 49, 'testIncome49', '3000.00', 'Other', '', '2016-11-05'),
(865, 50, 'testIncome50', '5000.00', 'Other', '', '2016-11-05'),
(866, 50, 'testIncome50', '10000.00', 'Other', '', '2016-11-05'),
(867, 50, 'testIncome50', '2000.00', 'Other', '', '2016-11-05'),
(868, 50, 'testIncome50', '3000.00', 'Other', '', '2016-11-05'),
(869, 50, 'testIncome50', '2000.00', 'Other', '', '2016-11-05'),
(870, 51, 'testIncome51', '4000.00', 'Other', '', '2016-11-05'),
(871, 51, 'testIncome51', '2000.00', 'Other', '', '2016-11-05'),
(872, 51, 'testIncome51', '3000.00', 'Other', '', '2016-11-05'),
(873, 51, 'testIncome51', '5000.00', 'Other', '', '2016-11-05'),
(874, 51, 'testIncome51', '9000.00', 'Other', '', '2016-11-05'),
(875, 52, 'testIncome52', '2000.00', 'Other', '', '2016-11-05'),
(876, 52, 'testIncome52', '5000.00', 'Other', '', '2016-11-05'),
(877, 52, 'testIncome52', '7000.00', 'Other', '', '2016-11-05'),
(878, 52, 'testIncome52', '1000.00', 'Other', '', '2016-11-05'),
(879, 52, 'testIncome52', '1000.00', 'Other', '', '2016-11-05'),
(880, 53, 'testIncome53', '2000.00', 'Other', '', '2016-11-05'),
(881, 53, 'testIncome53', '9000.00', 'Other', '', '2016-11-05'),
(882, 53, 'testIncome53', '9000.00', 'Other', '', '2016-11-05'),
(883, 53, 'testIncome53', '7000.00', 'Other', '', '2016-11-05'),
(884, 53, 'testIncome53', '2000.00', 'Other', '', '2016-11-05'),
(885, 54, 'testIncome54', '4000.00', 'Other', '', '2016-11-05'),
(886, 54, 'testIncome54', '9000.00', 'Other', '', '2016-11-05'),
(887, 54, 'testIncome54', '1000.00', 'Other', '', '2016-11-05'),
(888, 54, 'testIncome54', '7000.00', 'Other', '', '2016-11-05'),
(889, 54, 'testIncome54', '1000.00', 'Other', '', '2016-11-05'),
(890, 55, 'testIncome55', '2000.00', 'Other', '', '2016-11-05'),
(891, 55, 'testIncome55', '1000.00', 'Other', '', '2016-11-05'),
(892, 55, 'testIncome55', '5000.00', 'Other', '', '2016-11-05'),
(893, 55, 'testIncome55', '4000.00', 'Other', '', '2016-11-05'),
(894, 55, 'testIncome55', '3000.00', 'Other', '', '2016-11-05'),
(895, 56, 'testIncome56', '6000.00', 'Other', '', '2016-11-05'),
(896, 56, 'testIncome56', '9000.00', 'Other', '', '2016-11-05'),
(897, 56, 'testIncome56', '2000.00', 'Other', '', '2016-11-05'),
(898, 56, 'testIncome56', '1000.00', 'Other', '', '2016-11-05'),
(899, 56, 'testIncome56', '5000.00', 'Other', '', '2016-11-05'),
(900, 57, 'testIncome57', '7000.00', 'Other', '', '2016-11-05'),
(901, 57, 'testIncome57', '10000.00', 'Other', '', '2016-11-05'),
(902, 57, 'testIncome57', '3000.00', 'Other', '', '2016-11-05'),
(903, 57, 'testIncome57', '8000.00', 'Other', '', '2016-11-05'),
(904, 57, 'testIncome57', '2000.00', 'Other', '', '2016-11-05'),
(905, 58, 'testIncome58', '6000.00', 'Other', '', '2016-11-05'),
(906, 58, 'testIncome58', '8000.00', 'Other', '', '2016-11-05'),
(907, 58, 'testIncome58', '2000.00', 'Other', '', '2016-11-05'),
(908, 58, 'testIncome58', '1000.00', 'Other', '', '2016-11-05'),
(909, 58, 'testIncome58', '5000.00', 'Other', '', '2016-11-05'),
(910, 59, 'testIncome59', '3000.00', 'Other', '', '2016-11-05'),
(911, 59, 'testIncome59', '9000.00', 'Other', '', '2016-11-05'),
(912, 59, 'testIncome59', '7000.00', 'Other', '', '2016-11-05'),
(913, 59, 'testIncome59', '5000.00', 'Other', '', '2016-11-05'),
(914, 59, 'testIncome59', '7000.00', 'Other', '', '2016-11-05'),
(915, 36, '123', '1.00', 'Other', '', '2016-11-07'),
(916, 36, '123', '0.01', 'Other', '1', '2016-11-07'),
(917, 36, '123', '1.00', 'Other', '', '2016-11-10'),
(918, 36, '123', '2.00', 'Fixed Income', '', '2016-11-10');

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
-- Indexes for table `income_category`
--
ALTER TABLE `income_category`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Name` (`Name`);

--
-- Indexes for table `paytime_category`
--
ALTER TABLE `paytime_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paytime_name` (`paytime_name`);

--
-- Indexes for table `target`
--
ALTER TABLE `target`
  ADD PRIMARY KEY (`Target_ID`);

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
-- Indexes for table `user_fixed_expense`
--
ALTER TABLE `user_fixed_expense`
  ADD PRIMARY KEY (`Expense_ID`),
  ADD KEY `Expense_PayEvery` (`Expense_PayEvery`),
  ADD KEY `Expense_Category` (`Expense_Category`);

--
-- Indexes for table `user_fixed_income`
--
ALTER TABLE `user_fixed_income`
  ADD PRIMARY KEY (`Income_ID`),
  ADD KEY `Income_PayEvery` (`Income_PayEvery`),
  ADD KEY `Income_Category` (`Income_Category`);

--
-- Indexes for table `user_income`
--
ALTER TABLE `user_income`
  ADD PRIMARY KEY (`Income_ID`),
  ADD KEY `User_ID` (`User_ID`),
  ADD KEY `Income_Category` (`Income_Category`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `expenses_category`
--
ALTER TABLE `expenses_category`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- 使用表AUTO_INCREMENT `income_category`
--
ALTER TABLE `income_category`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `paytime_category`
--
ALTER TABLE `paytime_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- 使用表AUTO_INCREMENT `target`
--
ALTER TABLE `target`
  MODIFY `Target_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- 使用表AUTO_INCREMENT `user_expense`
--
ALTER TABLE `user_expense`
  MODIFY `Expense_ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=941;
--
-- 使用表AUTO_INCREMENT `user_fixed_expense`
--
ALTER TABLE `user_fixed_expense`
  MODIFY `Expense_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- 使用表AUTO_INCREMENT `user_fixed_income`
--
ALTER TABLE `user_fixed_income`
  MODIFY `Income_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- 使用表AUTO_INCREMENT `user_income`
--
ALTER TABLE `user_income`
  MODIFY `Income_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=919;
--
-- 限制导出的表
--

--
-- 限制表 `user_expense`
--
ALTER TABLE `user_expense`
  ADD CONSTRAINT `UserExpense_Category` FOREIGN KEY (`Expense_Category`) REFERENCES `expenses_category` (`Name`) ON UPDATE CASCADE,
  ADD CONSTRAINT `UserExpense_UserID` FOREIGN KEY (`User_ID`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `user_fixed_expense`
--
ALTER TABLE `user_fixed_expense`
  ADD CONSTRAINT `expense_paycategory` FOREIGN KEY (`Expense_PayEvery`) REFERENCES `paytime_category` (`paytime_name`),
  ADD CONSTRAINT `fixed_expense_category` FOREIGN KEY (`Expense_Category`) REFERENCES `expenses_category` (`Name`);

--
-- 限制表 `user_fixed_income`
--
ALTER TABLE `user_fixed_income`
  ADD CONSTRAINT `fixed_income_category` FOREIGN KEY (`Income_Category`) REFERENCES `income_category` (`Name`),
  ADD CONSTRAINT `income_paycategory` FOREIGN KEY (`Income_PayEvery`) REFERENCES `paytime_category` (`paytime_name`);

--
-- 限制表 `user_income`
--
ALTER TABLE `user_income`
  ADD CONSTRAINT `UserIncome_Category` FOREIGN KEY (`Income_Category`) REFERENCES `income_category` (`Name`) ON UPDATE CASCADE,
  ADD CONSTRAINT `UserIncome_UserID` FOREIGN KEY (`User_ID`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

DELIMITER $$
--
-- 事件
--
CREATE DEFINER='wilsandb'@'localhost' EVENT `event_fixedExpense_day` ON SCHEDULE EVERY 1 DAY STARTS '2016-11-06 00:00:00' ON COMPLETION PRESERVE ENABLE DO call fixed_expense_day()$$

CREATE DEFINER='wilsandb'@'localhost' EVENT `event_fixedExpense_month` ON SCHEDULE EVERY 1 MONTH STARTS '2016-11-06 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO call fixed_expense_month()$$

CREATE DEFINER='wilsandb'@'localhost' EVENT `event_fixedIncome_month` ON SCHEDULE EVERY 1 MONTH STARTS '2016-11-06 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO call fixed_income_month()$$

CREATE DEFINER='wilsandb'@'localhost' EVENT `event_fixedIncome_day` ON SCHEDULE EVERY 1 DAY STARTS '2016-11-06 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO call fixed_income_day()$$

CREATE DEFINER='wilsandb'@'localhost' EVENT `event_fixedIncome_15seconds` ON SCHEDULE EVERY 15 SECOND STARTS '2016-11-10 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO CALL `fixed_income_15seconds`()$$

CREATE DEFINER='wilsandb'@'localhost' EVENT `event_fixedExpense_15seconds` ON SCHEDULE EVERY 15 SECOND STARTS '2016-11-10 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO CALL `fixed_expense_15seconds`()$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
