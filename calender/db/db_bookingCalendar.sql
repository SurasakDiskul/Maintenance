
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `tb_booking` (
  `id` int(11) NOT NULL,
  `booking_id` bigint(20) DEFAULT NULL,
  `staff_name` varchar(100) DEFAULT NULL,
  `booking_type` varchar(250) DEFAULT NULL,
  `purpose` varchar(250) DEFAULT NULL,
  `booking_start_date` datetime DEFAULT NULL,
  `booking_end_date` datetime DEFAULT NULL,
  `action` enum('accept','reject') DEFAULT NULL,
  `status` enum('accept','reject','Suspend') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `tb_booking` (`id`, `booking_id`, `staff_name`, `booking_type`, `purpose`, `booking_start_date`, `booking_end_date`, `action`, `status`) VALUES
(1, 1, 'boychawin.com', 'ห้อง 1', 'ประชุม', '2021-04-17 12:40:49', '2021-04-18 17:40:49', 'accept', 'accept'),
(2, 2, 'boychawin.com', 'ห้อง 2', 'ประชุม 2', '2021-04-01 12:40:49', '2021-04-02 17:40:49', NULL, NULL),
(3, 3, 'boychawin.com', 'ห้อง 3', 'ประชุม 3', '2021-04-01 12:40:49', '2021-04-02 17:40:49', 'accept', NULL),
(4, 4, 'boychawin.com', 'ห้อง 4', 'ประชุม 4', '2021-04-01 12:40:49', '2021-04-02 17:40:49', 'accept', 'accept');

ALTER TABLE `tb_booking`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `tb_booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;
