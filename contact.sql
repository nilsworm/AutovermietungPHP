-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 24. Nov 2017 um 17:01
-- Server-Version: 10.1.16-MariaDB
-- PHP-Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Datenbank: `blog`
--

-- --------------------------------------------------------

CREATE TABLE `contact` (
  `id` varchar(36) NOT NULL,
  `topicCode` tinyint(2) NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(300) NOT NULL,
  `phone` varchar(16) NULL,
  `content` varchar(500) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`)
