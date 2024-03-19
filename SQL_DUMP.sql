-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 19, 2024 at 09:48 PM
-- Server version: 8.0.36-0ubuntu0.20.04.1
-- PHP Version: 7.4.3-4ubuntu2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dappa`
--

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `ID` int NOT NULL,
  `Name` text NOT NULL,
  `Img` text NOT NULL,
  `Link` text NOT NULL,
  `Active` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`ID`, `Name`, `Img`, `Link`, `Active`) VALUES
(2, 'DEMON\'S TILT', 'https://cdn.akamai.steamstatic.com/steam/apps/422510/header.jpg?t=1676171216', 'https://store.steampowered.com/app/422510/DEMONS_TILT/', 1),
(3, 'Hell is Other Demons', 'https://fs-prod-cdn.nintendo-europe.com/media/images/10_share_images/games_15/nintendo_switch_download_software_1/H2x1_NSwitchDS_HellIIsOtherDemons_image1600w.jpg', 'https://store.steampowered.com/app/595790/Hell_is_Other_Demons/', 1),
(4, 'Rising Hell', 'https://fs-prod-cdn.nintendo-europe.com/media/images/10_share_images/games_15/nintendo_switch_download_software_1/H2x1_NSwitchDS_RisingHell.jpg', 'https://store.steampowered.com/app/657000/Rising_Hell/', 1),
(5, 'Tiny Tina’s Wonderlands', 'https://cdn.cloudflare.steamstatic.com/steam/apps/1286680/capsule_616x353.jpg?t=1660273090', 'https://store.steampowered.com/app/1286680/Tiny_Tinas_Wonderlands/', 1),
(8, 'Borderlands GOTY Enhanced', 'https://cdn-ext.fanatical.com/production/product/original/0da619c0-6890-47c2-b0e3-9815933594ae.jpeg?w=1200', 'https://store.steampowered.com/sub/212504/', 1),
(9, 'Brawlhalla', 'https://cdn.akamai.steamstatic.com/steam/apps/291550/header.jpg?t=1676414920', 'https://store.steampowered.com/app/291550/Brawlhalla/', 1),
(10, 'The Coin Game', 'https://cdn.akamai.steamstatic.com/steam/apps/598980/header.jpg?t=1618575496', 'https://store.steampowered.com/app/598980/The_Coin_Game/', 1),
(12, 'Dead by Daylight', 'https://cdn.akamai.steamstatic.com/steam/apps/381210/header.jpg?t=1679674232', 'https://store.steampowered.com/app/381210/Dead_by_Daylight/', 1),
(13, 'Drawful 2', 'https://image.api.playstation.com/cdn/EP8915/CUSA05045_00/9JNtxqBfnxGxLk3OmyGvTKO8biZLsCqB.png?w=440', 'https://www.jackboxgames.com/drawful-two/', 1),
(15, 'Everhood', 'https://cdn.akamai.steamstatic.com/steam/apps/1229380/header.jpg?t=1651958159', 'https://store.steampowered.com/app/1229380/Everhood/', 1),
(16, 'Garry\'s Mod', 'https://cdn.akamai.steamstatic.com/steam/apps/4000/header.jpg?t=1663621793', 'https://cdn.akamai.steamstatic.com/steam/apps/4000/header.jpg?t=1663621793', 1),
(17, 'Golf With Your Friends', 'https://cdn.akamai.steamstatic.com/steam/apps/431240/header.jpg?t=1677583623', 'https://store.steampowered.com/app/431240/Golf_With_Your_Friends/', 1),
(18, 'Gunfire Reborn', 'https://cdn.akamai.steamstatic.com/steam/apps/1217060/header.jpg?t=1674888345', 'https://store.steampowered.com/app/1217060/Gunfire_Reborn/', 1),
(19, 'Hardspace: Shipbreaker', 'https://cdn.akamai.steamstatic.com/steam/apps/1161580/header.jpg?t=1675271526', 'https://store.steampowered.com/app/1161580/Hardspace_Shipbreaker/', 1),
(20, 'Jackbox Party Pack 4', 'https://cdn.cloudflare.steamstatic.com/steam/apps/610180/header.jpg?t=1667412730', 'https://www.jackboxgames.com/party-pack-four/', 1),
(21, 'Jackbox Party Pack 5', 'https://fs-prod-cdn.nintendo-europe.com/media/images/10_share_images/games_15/nintendo_switch_download_software_1/H2x1_NSwitchDS_TheJackboxPartyPack5.jpg', 'https://www.jackboxgames.com/party-pack-five/', 1),
(22, 'Jackbox Party Pack 6', 'https://fs-prod-cdn.nintendo-europe.com/media/images/10_share_images/games_15/nintendo_switch_download_software_1/H2x1_NSwitchDS_TheJackboxPartyPack6.jpg', 'https://www.jackboxgames.com/party-pack-six/', 1),
(23, 'Jackbox Party Pack 7', 'https://fs-prod-cdn.nintendo-europe.com/media/images/10_share_images/games_15/nintendo_switch_download_software_1/H2x1_NSwitchDS_TheJackboxPartyPack7_image1600w.jpg', 'https://www.jackboxgames.com/party-pack-seven/', 1),
(24, 'Jackbox Party Pack 8\r\n', 'https://fs-prod-cdn.nintendo-europe.com/media/images/10_share_images/games_15/nintendo_switch_download_software_1/H2x1_NSwitchDS_TheJackboxPartyPack8_image1600w.jpg', 'https://www.jackboxgames.com/party-pack-eight/', 1),
(25, 'Left 4 Dead', 'https://cdn.akamai.steamstatic.com/steam/apps/500/header.jpg?t=1677105590', 'https://store.steampowered.com/app/500/Left_4_Dead/', 1),
(26, 'Left 4 Dead 2', 'https://cdn.akamai.steamstatic.com/steam/apps/550/header.jpg?t=1675801903', 'https://store.steampowered.com/app/550/Left_4_Dead_2/', 1),
(28, 'Max Payne', 'https://cdn.akamai.steamstatic.com/steam/apps/12140/header.jpg?t=1618852800', 'https://store.steampowered.com/app/12140/Max_Payne/', 1),
(29, 'Monster Rancher 1 & 2 DX', 'https://cdn.akamai.steamstatic.com/steam/apps/1716120/header.jpg?t=1673514457', 'https://store.steampowered.com/app/1716120/Monster_Rancher_1__2_DX/', 1),
(30, 'Muse Dash', 'https://cdn.akamai.steamstatic.com/steam/apps/774171/header.jpg?t=1679558716', 'https://store.steampowered.com/app/774171/Muse_Dash/', 1),
(31, 'Nightmare Reaper', 'https://cdn.akamai.steamstatic.com/steam/apps/1051690/header.jpg?t=1663272481', 'https://store.steampowered.com/app/1051690/Nightmare_Reaper/', 1),
(32, 'Oddworld: Abe\'s Oddysee®', 'https://cdn.akamai.steamstatic.com/steam/apps/15700/header.jpg?t=1666185068', 'https://store.steampowered.com/app/15700/Oddworld_Abes_Oddysee/', 1),
(33, 'Oddworld: Abe\'s Exoddus®', 'https://cdn.akamai.steamstatic.com/steam/apps/15710/header.jpg?t=1666108471', 'https://store.steampowered.com/app/15710/Oddworld_Abes_Exoddus/', 1),
(34, 'Oddworld: Munch’s Oddysee', 'https://cdn.akamai.steamstatic.com/steam/apps/15740/header.jpg?t=1666108763', 'https://store.steampowered.com/app/15740/Oddworld_Munchs_Oddysee/', 1),
(35, 'Oddworld: Stranger’s Wrath HD', 'https://cdn.akamai.steamstatic.com/steam/apps/15750/header.jpg?t=1666108690', 'https://store.steampowered.com/app/15750/Oddworld_Strangers_Wrath_HD/', 1),
(36, 'Peggle Deluxe', 'https://cdn.akamai.steamstatic.com/steam/apps/3480/header.jpg?t=1593276392', 'https://store.steampowered.com/app/3480/Peggle_Deluxe/', 1),
(37, 'Peggle Extreme', 'https://cdn.akamai.steamstatic.com/steam/apps/3483/header.jpg?t=1643671245', 'https://store.steampowered.com/app/3483/Peggle_Extreme/', 1),
(38, 'Peggle Nights', 'https://cdn.akamai.steamstatic.com/steam/apps/3540/header.jpg?t=1615208369', 'https://store.steampowered.com/app/3540/Peggle_Nights/', 1),
(39, 'Phantom Abyss', 'https://cdn.akamai.steamstatic.com/steam/apps/989440/header.jpg?t=1632423837', 'https://store.steampowered.com/app/989440/Phantom_Abyss/', 1),
(40, 'Phasmophobia', 'https://cdn.akamai.steamstatic.com/steam/apps/739630/header.jpg?t=1674232976', 'https://store.steampowered.com/app/739630/Phasmophobia/', 0),
(41, 'Project Playtime', 'https://cdn.akamai.steamstatic.com/steam/apps/1961460/header.jpg?t=1676674802', 'https://store.steampowered.com/app/1961460/PROJECT_PLAYTIME/', 1),
(42, 'Scorn', 'https://cdn.akamai.steamstatic.com/steam/apps/698670/header.jpg?t=1679049073', 'https://store.steampowered.com/app/698670/Scorn/', 1),
(43, 'Soldat', 'https://cdn.akamai.steamstatic.com/steam/apps/638490/header.jpg?t=1662126960', 'https://store.steampowered.com/app/638490/Soldat/', 1),
(45, 'Splitgate', 'https://cdn.akamai.steamstatic.com/steam/apps/677620/header.jpg?t=1663343172', 'https://store.steampowered.com/app/677620/Splitgate/', 1),
(46, 'Stream Racer', 'https://cdn.akamai.steamstatic.com/steam/apps/1333410/header.jpg?t=1671229070', 'https://store.steampowered.com/app/1333410/Stream_Racer/', 1),
(48, 'The Typing of The Dead: Overkill', 'https://cdn.akamai.steamstatic.com/steam/apps/246580/header.jpg?t=1603130707', 'https://store.steampowered.com/app/246580/The_Typing_of_The_Dead_Overkill/', 1),
(49, 'Vampire Survivors', 'https://cdn.akamai.steamstatic.com/steam/apps/1794680/header.jpg?t=1674639510', 'https://store.steampowered.com/app/1794680/Vampire_Survivors/', 1),
(50, 'Warhammer: Vermintide 2', 'https://cdn.akamai.steamstatic.com/steam/apps/552500/header.jpg?t=1678449064', 'https://store.steampowered.com/app/552500/Warhammer_Vermintide_2/', 1),
(51, 'What The Dub?!', 'https://cdn.akamai.steamstatic.com/steam/apps/1495860/header.jpg?t=1679697197', 'https://store.steampowered.com/app/1495860/What_The_Dub/', 1),
(53, 'Disc Room', 'https://cdn.akamai.steamstatic.com/steam/apps/1229580/header.jpg?t=1646676793', 'https://store.steampowered.com/app/1229580/Disc_Room/', 1),
(54, 'Forza Horizon 4', 'https://cdn.akamai.steamstatic.com/steam/apps/1293830/header.jpg?t=1667326422', 'https://store.steampowered.com/app/1293830/Forza_Horizon_4/', 1),
(55, 'Halo Infinite', 'https://cdn.akamai.steamstatic.com/steam/apps/1240440/header.jpg?t=1679430743', 'https://store.steampowered.com/app/1240440/Halo_Infinite/', 1),
(56, 'Hi-Fi RUSH', 'https://cdn.akamai.steamstatic.com/steam/apps/1817230/header.jpg?t=1678893432', 'https://store.steampowered.com/app/1817230/HiFi_RUSH/', 1),
(57, 'Metal: Hellsinger', 'https://cdn.akamai.steamstatic.com/steam/apps/1061910/header.jpg?t=1679583474', 'https://store.steampowered.com/app/1061910/Metal_Hellsinger/', 1),
(62, 'Bioshock 2 Remastered', 'https://cdn.akamai.steamstatic.com/steam/apps/8850/capsule_616x353.jpg?t=1568765660', 'https://store.steampowered.com/app/409720/BioShock_2_Remastered/', 1),
(63, 'Wreckfest', 'https://cdn.akamai.steamstatic.com/steam/apps/228380/header.jpg?t=1664963447', 'https://store.steampowered.com/app/228380/Wreckfest/', 1),
(64, 'Loop Hero', 'https://fs-prod-cdn.nintendo-europe.com/media/images/10_share_images/games_15/nintendo_switch_download_software_1/H2x1_NSwitchDS_LoopHero.jpg', 'https://store.steampowered.com/app/1282730/Loop_Hero/', 1),
(67, 'Overwatch 2', 'https://cdn.segmentnext.com/wp-content/uploads/2019/10/Overwatch-2-1-e1572643026849.jpg', 'https://overwatch.blizzard.com/', 1),
(68, 'Inscryption', 'https://www.gamespace.com/wp-content/uploads/2022/02/inscryption-banner.png', 'https://launcher.store.epicgames.com/en-US/p/inscryption-6b29ab', 1),
(69, 'Fortnite', 'https://cdn2.unrealengine.com/15br-bplaunch-egs-s3-2560x1440-2560x1440-687570387.jpg', 'https://launcher.store.epicgames.com/en-US/p/fortnite', 1),
(70, 'Potion Craft: Alchemist Simulator', 'https://giochipcgratis.com/wp-content/uploads/2022/01/Potion-Craft-Alchemist-Simulator-gratis.jpg', 'https://www.microsoft.com/store/productId/9MW7WD7J3PPK', 1),
(71, 'Fall Guys: Ultimate Knockout', 'https://www.want.nl/wp-content/uploads/2021/03/Fall-Guys-Season-4.jpeg', 'https://launcher.store.epicgames.com/en-US/p/fall-guys', 1),
(72, 'Trackmania Turbo', 'https://www.gamesload.de/images/products/Ubisoft/Background-Trackmania-Turbo-v2.jpg', 'https://launcher.store.epicgames.com/en-US/p/trackmania-turbo', 1);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `ID` int NOT NULL,
  `Username` text NOT NULL,
  `Password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`ID`, `Username`, `Password`) VALUES
(1, 'dawson-dappa', 'FAKEPASSWORD'),
(2, 'dappa', 'FAKEPASSWORD');

-- --------------------------------------------------------

--
-- Table structure for table `login_key`
--

CREATE TABLE `login_key` (
  `ID` int NOT NULL,
  `pass_key` text NOT NULL,
  `time` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `login_key`
--

INSERT INTO `login_key` (`ID`, `pass_key`, `time`) VALUES
(25, 'FAKEKEY', '1690182831');

-- --------------------------------------------------------

--
-- Table structure for table `prevgameselection`
--

CREATE TABLE `prevgameselection` (
  `UID` int NOT NULL,
  `GID` text NOT NULL,
  `TimeStamp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `prevgameselection`
--

INSERT INTO `prevgameselection` (`UID`, `GID`, `TimeStamp`) VALUES
(1, '60', '1679870388'),
(2, '50', '1680479293'),
(3, '60', '1681082673'),
(4, '13', '1681689343'),
(5, '26', '1682293504'),
(6, '67', '1682897427'),
(8, '61', '1683503875'),
(9, '7', '1684107892'),
(10, '26', '1684713195'),
(11, '56', '1687550085'),
(12, '45', '1688342069'),
(13, '9', '1688981618'),
(14, '62', '1689587939'),
(15, '26', '1690182891');

-- --------------------------------------------------------

--
-- Table structure for table `subm_pass`
--

CREATE TABLE `subm_pass` (
  `ID` int NOT NULL,
  `Pass` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `subm_pass`
--

INSERT INTO `subm_pass` (`ID`, `Pass`) VALUES
(0, 'FAKE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `login_key`
--
ALTER TABLE `login_key`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `prevgameselection`
--
ALTER TABLE `prevgameselection`
  ADD PRIMARY KEY (`UID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login_key`
--
ALTER TABLE `login_key`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `prevgameselection`
--
ALTER TABLE `prevgameselection`
  MODIFY `UID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
