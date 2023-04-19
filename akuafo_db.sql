drop database if exists akuafo_db;
create database akuafo_db;
use akuafo_db;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- CREATING TABLES --
CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_firstname` varchar(100) NOT NULL,
  `customer_lastname` varchar(100) NOT NULL,
  `customer_email` varchar(50) NOT NULL,
  `customer_pass` varchar(150) NOT NULL,
  `customer_contact` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `customer` (`customer_id`, `customer_firstname`, `customer_lastname`, `customer_email`, `customer_pass`, `customer_contact`) VALUES
(1, 'Akua ', 'Darko', 'afriyie@gmail.com', '$2y$10$.aQtZV1DUn9/SW0hSzGByO9OfIHc/JojzIUrRQgk5C8ZpBW47mjBy', '0244417579'),
(2, 'Ohemaa', 'Boadu', 'ohemaaboadu01@gmail.com', '$2y$10$ovhoe1ouQPB3lN40a97KpeSWxOALwlKHu6E29HTVYxCZH3aBLXCp2', '0204312787'),
(3, 'Gerald ', 'Darko ', 'gerald.darko@ashesi.edu.gh', '$2y$10$kpdgQvLHwVnV1NF4OzMzW.8QGUHkX7p1Y0l7D2FjULTeuWMcPSjy.', '0244417579');


ALTER TABLE `customer`
ADD PRIMARY KEY (`customer_id`),
ADD UNIQUE KEY `customer_email` (`customer_email`);

ALTER TABLE `customer`
MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

CREATE TABLE sensor_data (
    SensorData_Id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    humidity FLOAT,
    temperature FLOAT,
    soil_moisture INT(11),
    water_level FLOAT
);