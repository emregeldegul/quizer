-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 13 Nis 2019, 21:09:18
-- Sunucu sürümü: 10.1.24-MariaDB
-- PHP Sürümü: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `yeg_quizer`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `quizer_answers`
--

CREATE TABLE `quizer_answers` (
  `answer_id` int(11) NOT NULL,
  `answer_uid` int(11) NOT NULL,
  `answer_eid` int(11) NOT NULL,
  `answer_content` text NOT NULL,
  `answer_read` tinyint(1) DEFAULT '0',
  `answer_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `quizer_exams`
--

CREATE TABLE `quizer_exams` (
  `exam_id` int(11) NOT NULL,
  `exam_status` tinyint(1) DEFAULT '1',
  `exam_name` varchar(50) NOT NULL,
  `exam_lang` varchar(25) NOT NULL DEFAULT 'text',
  `exam_startDate` date NOT NULL,
  `exam_finishDate` date NOT NULL,
  `exam_brifing` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `quizer_pm`
--

CREATE TABLE `quizer_pm` (
  `pm_id` int(11) NOT NULL,
  `pm_sender` int(11) NOT NULL,
  `pm_title` varchar(50) NOT NULL,
  `pm_content` text NOT NULL,
  `pm_date` datetime NOT NULL,
  `pm_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `quizer_site`
--

CREATE TABLE `quizer_site` (
  `site_url` varchar(255) NOT NULL,
  `site_name` varchar(50) NOT NULL,
  `site_desc` text NOT NULL,
  `site_status` tinyint(1) NOT NULL DEFAULT '0',
  `site_memb` tinyint(1) NOT NULL DEFAULT '0',
  `site_notf` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `quizer_site`
--

INSERT INTO `quizer_site` (`site_url`, `site_name`, `site_desc`, `site_status`, `site_memb`, `site_notf`) VALUES
('http://quizer.yeg', 'Quizer', 'Quizer Sınav Uygulaması © Yunus Emre Geldegül', 1, 1, 'Kaydedilen sınavlar bir daha güncellenmez. Sınavları kaydederken dikkatli olun.');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `quizer_users`
--

CREATE TABLE `quizer_users` (
  `user_id` int(11) NOT NULL,
  `user_mail` varchar(255) NOT NULL,
  `user_password` varchar(32) NOT NULL,
  `user_status` int(11) NOT NULL DEFAULT '1',
  `user_name` varchar(50) NOT NULL,
  `user_surname` varchar(50) NOT NULL,
  `user_schoolNo` varchar(10) NOT NULL,
  `user_note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `quizer_users`
--

INSERT INTO `quizer_users` (`user_id`, `user_mail`, `user_password`, `user_status`, `user_name`, `user_surname`, `user_schoolNo`, `user_note`) VALUES
(1, 'yeg@quizer.yeg', 'e10adc3949ba59abbe56e057f20f883e', 3, 'Yunus Emre', 'Geldegül', '', 'https://emregeldegul.net');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `quizer_answers`
--
ALTER TABLE `quizer_answers`
  ADD PRIMARY KEY (`answer_id`);

--
-- Tablo için indeksler `quizer_exams`
--
ALTER TABLE `quizer_exams`
  ADD PRIMARY KEY (`exam_id`);

--
-- Tablo için indeksler `quizer_pm`
--
ALTER TABLE `quizer_pm`
  ADD PRIMARY KEY (`pm_id`);

--
-- Tablo için indeksler `quizer_site`
--
ALTER TABLE `quizer_site`
  ADD PRIMARY KEY (`site_url`);

--
-- Tablo için indeksler `quizer_users`
--
ALTER TABLE `quizer_users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_mail` (`user_mail`,`user_schoolNo`),
  ADD UNIQUE KEY `user_schoolNo` (`user_schoolNo`),
  ADD UNIQUE KEY `user_mail_2` (`user_mail`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `quizer_answers`
--
ALTER TABLE `quizer_answers`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;
--
-- Tablo için AUTO_INCREMENT değeri `quizer_exams`
--
ALTER TABLE `quizer_exams`
  MODIFY `exam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Tablo için AUTO_INCREMENT değeri `quizer_pm`
--
ALTER TABLE `quizer_pm`
  MODIFY `pm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Tablo için AUTO_INCREMENT değeri `quizer_users`
--
ALTER TABLE `quizer_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
