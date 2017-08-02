-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2017 at 12:48 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `charity`
--

-- --------------------------------------------------------

--
-- Table structure for table `charities`
--

CREATE TABLE `charities` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `short_desc` varchar(255) DEFAULT NULL,
  `description` text,
  `charity_type_id` int(11) UNSIGNED NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `vdo_url` varchar(255) DEFAULT NULL,
  `images` text,
  `address` varchar(255) DEFAULT NULL,
  `district_id` int(11) UNSIGNED DEFAULT NULL,
  `province_id` int(11) UNSIGNED NOT NULL,
  `has_reward` tinyint(1) NOT NULL DEFAULT '0',
  `reward` text,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `charities`
--

INSERT INTO `charities` (`id`, `name`, `short_desc`, `description`, `charity_type_id`, `logo`, `thumbnail`, `vdo_url`, `images`, `address`, `district_id`, `province_id`, `has_reward`, `reward`, `created_at`, `updated_at`) VALUES
(2, 'Animal wants org.', 'รองเท้าวิ่งผู้ชาย Nike Air Zoom Pegasus 34 ใหม่ล่าสุด โดดเด่นด้วยผ้า Flymesh ปรับใหม่เพื่อการระบายอากาศเหนือชั้นและการลดแรงกระแทกเบาตอบสนองได้ดี ช่วยให้คุณรู้สึกสบายตลอดทุกระยะทาง', '<div class="pi-tier3" style="margin: 0px; padding: 0px; color: #666666; font-family: Helvetica, ArialMT, sans-serif; font-size: 12px;">\r\n<div class="pi-pdpmainbody" style="margin: 0px; padding: 0px;">\r\n<p style="margin: 0px; padding: 0px;"><span class="nsg-font-family--platform" style="font-family: OneNikeCurrency, ''TradeGothicW01-BoldCn20 675334'', ''Helvetica Neue W31'', Helvetica, ''Arial Bold'', Arial, Tahoma, Thonburi, Ayuthaya, sans-serif; font-size: 40px; text-transform: uppercase; letter-spacing: -1px; color: #333333; padding-top: 0px; padding-bottom: 12px; display: inline-block; line-height: 1.1; margin-bottom: 4px;">รวดเร็วและสอดรับทุกการใช้งาน</span></p>\r\n<p style="margin: 0px; padding: 0px;">รองเท้าวิ่งผู้ชาย Nike Air Zoom Pegasus 34 ใหม่ล่าสุด โดดเด่นด้วยผ้า Flymesh ปรับใหม่เพื่อการระบายอากาศเหนือชั้นและการลดแรงกระแทกเบาตอบสนองได้ดี ช่วยให้คุณรู้สึกสบายตลอดทุกระยะทาง</p>\r\n<p style="margin: 0px; padding: 0px;"><span class="nsg-font-family--platform" style="font-family: OneNikeCurrency, ''TradeGothicW01-BoldCn20 675334'', ''Helvetica Neue W31'', Helvetica, ''Arial Bold'', Arial, Tahoma, Thonburi, Ayuthaya, sans-serif; font-size: 20px; text-transform: uppercase; letter-spacing: -1px; color: #333333; padding-top: 22px; padding-bottom: 12px; display: inline-block;">สบายระบายอากาศได้ดี</span></p>\r\n<p style="margin: 0px; padding: 0px;">ผ้า Flymesh ไร้รอยต่อ เนื้อเบา และระบายอากาศได้ดี ช่วยระบายความร้อนเพื่อความเย็นสบายยาวนาน</p>\r\n<p style="margin: 0px; padding: 0px;"><span class="nsg-font-family--platform" style="font-family: OneNikeCurrency, ''TradeGothicW01-BoldCn20 675334'', ''Helvetica Neue W31'', Helvetica, ''Arial Bold'', Arial, Tahoma, Thonburi, Ayuthaya, sans-serif; font-size: 20px; text-transform: uppercase; letter-spacing: -1px; color: #333333; padding-top: 22px; padding-bottom: 12px; display: inline-block;">ล็อคกระชับมั่นคง</span></p>\r\n<p style="margin: 0px; padding: 0px;">เส้นใย Dynamic Flywire โอบรับส่วนโค้งของเท้า เพื่อการรองรับกระชับพอดีและสัมผัสล็อคกระชับมั่นคง</p>\r\n<p style="margin: 0px; padding: 0px;"><span class="nsg-font-family--platform" style="font-family: OneNikeCurrency, ''TradeGothicW01-BoldCn20 675334'', ''Helvetica Neue W31'', Helvetica, ''Arial Bold'', Arial, Tahoma, Thonburi, Ayuthaya, sans-serif; font-size: 20px; text-transform: uppercase; letter-spacing: -1px; color: #333333; padding-top: 22px; padding-bottom: 12px; display: inline-block;">ตอบสนองต่อแรงกระแทก</span></p>\r\n<p style="margin: 0px; padding: 0px;">โฟม Cushlon ระดับพรีเมียมและ Zoom Air ที่ส่วนปลายเท้าและส้นเท้า มอบสัมผัสที่สปริงตัวและตอบสนองได้ดีใต้ฝ่าเท้า</p>\r\n<p style="margin: 0px; padding: 0px;"><span class="nsg-font-family--platform" style="font-family: OneNikeCurrency, ''TradeGothicW01-BoldCn20 675334'', ''Helvetica Neue W31'', Helvetica, ''Arial Bold'', Arial, Tahoma, Thonburi, Ayuthaya, sans-serif; font-size: 20px; text-transform: uppercase; letter-spacing: -1px; color: #333333; padding-top: 22px; padding-bottom: 12px; display: inline-block;">รายละเอียดเพิ่มเติม</span></p>\r\n<ul>\r\n<li style="margin: 0px; padding: 0px; list-style: disc inside;">ตาข่ายชั้นในบางส่วนเพื่อเสริมความสบายยิ่งขึ้น</li>\r\n<li style="margin: 0px; padding: 0px; list-style: disc inside;">ส้นด้านหลังแข็งแน่นกระชับเพื่อสัมผัสมั่นคง</li>\r\n<li style="margin: 0px; padding: 0px; list-style: disc inside;">ขอบยางกันกระแทกบริเวณด้านข้างพื้นรองเท้าชั้นนอกช่วยให้ถ่ายเทน้ำหนักได้ราบรื่น</li>\r\n<li style="margin: 0px; padding: 0px; list-style: disc inside;">ยางยกสูงช่วยดูดซับแรงกระแทกและเสริมการยึดเกาะ</li>\r\n<li style="margin: 0px; padding: 0px; list-style: disc inside;">รอบตัดเล็กๆ ที่พื้นรองเท้าชั้นนอกเสริมความยืดหยุ่น</li>\r\n<li style="margin: 0px; padding: 0px; list-style: disc inside;">น้ำหนัก: 10.4 ออนซ์ (รองเท้าผู้ชายไซส์ 10)</li>\r\n<li style="margin: 0px; padding: 0px; list-style: disc inside;">ระยะถ่วง: 10 มม.</li>\r\n</ul>\r\n</div>\r\n</div>\r\n<div class="exp-pdp-country-of-origin" style="margin: 14px 0px 0px; padding: 0px; color: #666666; font-family: Helvetica, ArialMT, sans-serif; font-size: 12px;">ประเทศที่ผลิต: เวียดนาม</div>', 4, 'http://www.cr.com/get_image/149966811580313407350182983851.png', 'http://www.cr.com/get_image/1500634727188287412538749203888.jpg', 'https://www.youtube.com/embed/lyceTa-1mis', '["http:\\/\\/cr.local\\/get_image\\/15000881099083081180391795969586.jpg","http:\\/\\/cr.local\\/get_image\\/15000131262921095852874431737505.jpg","http:\\/\\/cr.local\\/get_image\\/1500012938990680376654253239362.png","http:\\/\\/cr.local\\/get_image\\/15000880658250522215136290995745.jpg","http:\\/\\/cr.local\\/get_image\\/150008807337661997238569991186213.jpg","http:\\/\\/cr.local\\/get_image\\/150008807761490074201500091436825.jpg","http:\\/\\/cr.local\\/get_image\\/150008808286703663179186221196998.jpg","http:\\/\\/cr.local\\/get_image\\/150008808980670764734587571376682.jpg","http:\\/\\/cr.local\\/get_image\\/150008809764120378294622941140301.jpg","http:\\/\\/cr.local\\/get_image\\/150008810137243393650402331094555.jpg"]', NULL, NULL, 18, 1, '<div class="donate-box">\n                    <div class="donate-info">\n                      <h2 class="donate-amount">บริจาค 300 บาทขึ้นไป</h2>\n                      <h3 class="reward-title">รับเสื้อมูลนิธิ</h3>\n                      <p class="reward-info">เสื้อสวยๆจากมูลนิธิ (คำอธิบายของรางวัล)</p>\n                    </div>\n                  </div>', '2017-07-10 01:48:56', '2017-07-21 18:00:08'),
(3, 'The Electric State - Simon Stålenhag''s New Narrative Artbook', 'From acclaimed artist Simon Stålenhag comes a new narrative artbook about a girl and her robot traveling west in an alternate 90s USA.', '<p>aaaa</p>', 1, NULL, 'http://www.cr.com/get_image/150063450071653987242306953716.jpg', NULL, '[]', NULL, NULL, 13, 0, NULL, '2017-07-10 02:06:25', '2017-07-21 17:55:30'),
(4, 'A''losh - Spreading confidence and positivity.', '"ไม่มีผู้ใดที่สมัครรักใคร่ในความเจ็บปวด หรือเสาะแสวงหาและปรารถนาจะครอบครองความเจ็บปวด นั่นก็เป็นเพราะว่ามันเจ็บปวด..."', '<h2 style="margin: 0px 0px 10px; padding: 0px; font-weight: 400; line-height: 24px; font-family: DauphinPlain; font-size: 24px;">Lorem Ipsum คืออะไร?</h2>\r\n<p style="margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: ''Open Sans'', Arial, sans-serif;">Lorem Ipsum คือ เนื้อหาจำลองแบบเรียบๆ ที่ใช้กันในธุรกิจงานพิมพ์หรืองานเรียงพิมพ์ มันได้กลายมาเป็นเนื้อหาจำลองมาตรฐานของธุรกิจดังกล่าวมาตั้งแต่ศตวรรษที่ 16 เมื่อเครื่องพิมพ์โนเนมเครื่องหนึ่งนำรางตัวพิมพ์มาสลับสับตำแหน่งตัวอักษรเพื่อทำหนังสือตัวอย่าง Lorem Ipsum อยู่ยงคงกระพันมาไม่ใช่แค่เพียงห้าศตวรรษ แต่อยู่มาจนถึงยุคที่พลิกโฉมเข้าสู่งานเรียงพิมพ์ด้วยวิธีทางอิเล็กทรอนิกส์ และยังคงสภาพเดิมไว้อย่างไม่มีการเปลี่ยนแปลง มันได้รับความนิยมมากขึ้นในยุค ค.ศ. 1960 เมื่อแผ่น Letraset วางจำหน่ายโดยมีข้อความบนนั้นเป็น Lorem Ipsum และล่าสุดกว่านั้น คือเมื่อซอฟท์แวร์การทำสื่อสิ่งพิมพ์ (Desktop Publishing) อย่าง Aldus PageMaker ได้รวมเอา Lorem Ipsum เวอร์ชั่นต่างๆ เข้าไว้ในซอฟท์แวร์ด้วย</p>\r\n<p style="margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: ''Open Sans'', Arial, sans-serif;">&nbsp;</p>\r\n<p style="margin: 0px 0px 15px; padding: 0px; font-family: ''Open Sans'', Arial, sans-serif; text-align: center;"><img src="../../../get_image/1500634915213720200346050133585.jpg" width="960" height="540" /></p>', 1, 'http://cr.local/get_image/149966811580313407350182983851.png', 'http://www.cr.com/get_image/1500634915213720200346050133585.jpg', 'https://www.youtube.com/embed/nX5gd4GXcv0', '[]', NULL, NULL, 2, 0, NULL, '2017-07-14 06:27:26', '2017-07-21 18:02:51'),
(5, 'A Dollar for a little Mystery Sketch', 'For a dollar I''ll draw a random sketch for you and mail it right to your door. It''ll be filled with thought and a little bit of mystery', NULL, 1, NULL, NULL, NULL, '["http:\\/\\/cr.local\\/safe_image\\/15000129296087674556165354143181.jpg","http:\\/\\/cr.local\\/safe_image\\/1500012938990680376654253239362.png"]', NULL, NULL, 2, 0, NULL, '2017-07-14 06:47:30', '2017-07-21 18:00:55'),
(6, 'qqqq', NULL, NULL, 1, NULL, NULL, NULL, '["http:\\/\\/cr.local\\/safe_image\\/15000129296087674556165354143181.jpg","http:\\/\\/cr.local\\/safe_image\\/1500012938990680376654253239362.png",null,null,null,null,null,null,null,null]', NULL, NULL, 2, 0, NULL, '2017-07-14 06:47:31', '2017-07-14 06:50:00'),
(7, 'CORAL: The Art of Pernille Ørum', 'A follow-up book to ''Blush'' and a collection of my off-the-clock artwork.', '<p style="margin: 0px 0px 20px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; line-height: inherit; font-family: ''Maison Neue Book'', ''Helvetica Neue'', Helvetica, Arial, ''Liberation Sans'', FreeSans, sans-serif; font-size: 1.6rem; vertical-align: baseline; color: #353535;">WELCOME TO MY KICKSTARTER</p>\r\n<p style="margin: 0px 0px 20px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; line-height: inherit; font-family: ''Maison Neue Book'', ''Helvetica Neue'', Helvetica, Arial, ''Liberation Sans'', FreeSans, sans-serif; font-size: 1.6rem; vertical-align: baseline; color: #353535;">My name is Pernille &Oslash;rum. I''m a Freelance Illustrator and Visual Artist living in Copenhagen, Denmark.&nbsp;I have done work for companies like Disney Publishing, Nickelodeon Jr., Mattel, DreamWorks and recently Warner Brothers where I were the Lead Character Designer on DC Superhero Girls.&nbsp;</p>', 1, NULL, 'http://www.cr.com/get_image/150063111142251719195425042258.jpg', NULL, '[]', NULL, NULL, 2, 1, NULL, '2017-07-21 17:02:02', '2017-07-21 17:02:02');

-- --------------------------------------------------------

--
-- Table structure for table `charity_types`
--

CREATE TABLE `charity_types` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `charity_types`
--

INSERT INTO `charity_types` (`id`, `name`) VALUES
(1, 'มูลนิธิเพื่อเด็ก'),
(2, 'มูลนิธิเพื่อผู้สูงอายุ'),
(3, 'มูลนิธิเพื่อคนพิการ'),
(4, 'มูลนิธิเพื่อช่วยเหลือสัตว์'),
(5, 'องค์กรสิทธิมนุษยชน'),
(6, 'องค์กรคุ้มครองสิ่งแวดล้อม'),
(7, 'องค์กรบรรเทาภัยพิบัติและดูแลสุขภาพ');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(11) UNSIGNED NOT NULL,
  `province_id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `zip_code` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `province_id`, `name`, `name_en`, `zip_code`) VALUES
(1, 1, 'ลำทับ', 'Lum Tub', '81120'),
(2, 1, 'เมืองกระบี่', 'Muang', '81000'),
(3, 1, 'เกาะลันตา', 'Khao Lanta', '81150'),
(4, 1, 'เขาพนม', 'Kho Phanom', '81140'),
(5, 1, 'คลองท่อม', 'Khong Thom', '81120'),
(6, 1, 'ปลายพระยา', 'Plai Phraya', '81160'),
(7, 1, 'เหนือคลอง', 'Nua Klong', '81130'),
(8, 1, 'อ่าวลึก', 'Ao Luk', '81110'),
(9, 2, 'คลองสาน', 'Klong San', '10600'),
(10, 2, 'วัฒนา', 'Thawiwatthana', '10110'),
(11, 2, 'คลองเตย', 'Khlong Toei', '10110'),
(12, 2, 'จอมทอง', 'Chom Thong', '10150'),
(13, 2, 'หลักสี่', 'Lak Si', '10210'),
(14, 2, 'จตุจักร', 'Chatuchak', '10900'),
(15, 2, 'ดุสิต', 'Dusit', '10300'),
(16, 2, 'ดอนเมือง', 'Don Muang', '10210'),
(17, 2, 'ตลิ่งชัน', 'Taling Chan', '10170'),
(18, 2, 'บางกอกน้อย', 'Bangkok Noi', '10700'),
(19, 2, 'บางกะปิ', 'Bang Kapi', '10240'),
(20, 2, 'สายไหม', 'Sai Mai', '10220'),
(21, 2, 'บางเขน', 'Bang Khen', '10220'),
(22, 2, 'บางคอแหลม', 'Bang Kho Laem', '10120'),
(23, 2, 'บางซื่อ', 'Bang Su', '10800'),
(24, 2, 'บางรัก', 'Bang Rak', '10500'),
(25, 2, 'ประเวศ', 'Prawet', '10250'),
(26, 2, 'ปทุมวัน', 'Pathum Wan', '10330'),
(27, 2, 'ป้อมปราบศัตรูพ่าย', 'Pom Prap', '10100'),
(28, 2, 'พญาไท', 'Phaya Thai', '10400'),
(29, 2, 'พระโขนง', 'Phra Khanong', '10260'),
(30, 2, 'พระนคร', 'Phra Nakhon', '10200'),
(31, 2, 'ภาษีเจริญ', 'Phasi Charoen', '10160'),
(32, 2, 'มีนบุรี', 'Min Buri', '10510'),
(33, 2, 'ราษฎร์บูรณะ', 'Rat Burana', '10140'),
(34, 2, 'ลาดกระบัง', 'Lat Krabang', '10520'),
(35, 2, 'ลาดพร้าว', 'Lat Phrao', '10310'),
(36, 2, 'หนองจอก', 'Nong Chok', '10530'),
(37, 2, 'คันนายาว', 'Khannayao', '10230'),
(38, 2, 'บางขุนเทียน', 'Bang Khun Thian', '10150'),
(39, 2, 'ธนบุรี', 'Thon Buri', '10600'),
(40, 2, 'บางกอกใหญ่', 'Bangkok Yai ', '10600'),
(41, 2, 'บางบอน', 'Bang Bon', '10150'),
(42, 2, 'บางพลัด', 'Bang Phlat', '10700'),
(43, 2, 'สะพานสูง', 'Saphansung', '10240'),
(44, 2, 'บึงกุ่ม', 'Bung Kum', '10240'),
(45, 2, 'ยานนาวา', 'Yan Nawa', '10120'),
(46, 2, 'สัมพันธวงศ์', 'Samphanthawong', '10100'),
(47, 2, 'ดินแดง', 'Din Daeng', '10400'),
(48, 2, 'ราชเทวี', 'Ratchthewi', '10400'),
(49, 2, 'บางนา', 'Bang Na', '10260'),
(50, 2, 'บางแค', 'Bang Kae', '10160'),
(51, 2, 'คลองสามวา', 'Klongsamwa', '10510'),
(52, 2, 'หนองแขม', 'Nong Khaem', '10160'),
(53, 2, 'ทุ่งครุ', 'Thung Khru', '10140'),
(54, 2, 'วังทองหลาง', 'Wangthonglang ', '10310'),
(55, 2, 'ห้วยขวาง', 'Huai Khwang', '10310'),
(56, 2, 'สาทร', 'Sathon', '10120'),
(57, 2, 'ทวีวัฒนา', 'Thawi Watthana', '10170'),
(58, 2, 'สวนหลวง', 'Suan Luang', '10250'),
(59, 3, 'เมืองกาญจนบุรี', 'Muang', '71000'),
(60, 3, 'ด่านมะขามเตี้ย', 'Dan Makham Tia', '71260'),
(61, 3, 'ทองผาภูมิ', 'Thong Pha Phum', '71180'),
(62, 3, 'ท่าม่วง', 'Tha Muang', '71110'),
(63, 3, 'ท่ามะกา', 'Tha Maka', '71120'),
(64, 3, 'ไทรโยค', 'Saiyok', '71150'),
(65, 3, 'บ่อพลอย', 'Bo Phloi', '71160'),
(66, 3, 'พนมทวน', 'Phanom Thuan', '71140'),
(67, 3, 'เลาขวัญ', 'Lao Khwan', '71210'),
(68, 3, 'ศรีสวัสดิ์', 'Srisawatt', '71250'),
(69, 3, 'สังขละบุรี', 'Sangkhla Buri', '71240'),
(70, 3, 'หนองปรือ', 'Nong Pru', '71220'),
(71, 3, 'ห้วยกระเจา', 'Huai Krajao ', '71170'),
(72, 4, 'เมืองกาฬสินธุ์', 'Muang', '46000'),
(73, 4, 'กมลาไสย', 'Kamalasai', '46130'),
(74, 4, 'กุฉินารายณ์', 'Kuchinarai', '46110'),
(75, 4, 'เขาวง', 'Khao Wong', '46160'),
(76, 4, 'คำม่วง', 'Khum Muang', '46180'),
(77, 4, 'ท่าคันโท', 'Tha Khantho', '46190'),
(78, 4, 'นามน', 'Na Mon', '46230'),
(79, 4, 'ยางตลาด', 'Yang Talat', '46120'),
(80, 4, 'ร่องคำ', 'Rong Kham', '46210'),
(81, 4, 'สมเด็จ', 'Somdet', '46150'),
(82, 4, 'สหัสขันธ์', 'Sahasakan', '46140'),
(83, 4, 'หนองกุงศรี', 'Nong Kung Sri', '46220'),
(84, 4, 'ห้วยผึ้ง', 'Huai Phung', '46240'),
(85, 4, 'ห้วยเม็ก', 'Huai Mek', '46170'),
(86, 4, 'ดอนจาน', 'Don Jan', '46000'),
(87, 4, 'ฆ้องชัย', 'Khong Chai', '46130'),
(88, 4, 'นาคู', 'Na Ku', '46160'),
(89, 4, 'สามชัย', 'Sam Chai', '46180'),
(90, 5, 'เมืองกำแพงเพชร', 'Muang', '62000'),
(91, 5, 'ขาณุวรลักษบุรี', 'Khanu Woralaksaburi', '62130'),
(92, 5, 'คลองขลุง', 'Khlong Khlung', '62120'),
(93, 5, 'คลองลาน', 'Klong Lan', '62180'),
(94, 5, 'ทรายทองวัฒนา', 'Saithong Wattana', '62190'),
(95, 5, 'ไทรงาม', 'Sai Ngam', '62150'),
(96, 5, 'พรานกระต่าย', 'Phran Kratai', '62110'),
(97, 5, 'ลานกระบือ', 'Lan Krabu', '62170'),
(98, 5, 'บึงสามัคคี', 'Bungsamukkee', '62210'),
(99, 5, 'โกสัมพีนคร', 'Kosumpinakhon', '62000'),
(100, 5, 'ปางศิลาทอง', 'Pang Silathong ', '62120'),
(101, 6, 'เมืองขอนแก่น', 'Muang', '40000'),
(102, 6, 'เขาสวนกวาง', 'Kaosuankwang ', '40280'),
(103, 6, 'โคกโพธิ์ไชย', 'Nong Na Kham', '40160'),
(104, 6, 'ชนบท', 'Chonnabot', '40180'),
(105, 6, 'ชุมแพ', 'Chum Phae', '40130'),
(106, 6, 'น้ำพอง', 'Nam Phong', '40140'),
(107, 6, 'บ้านไผ่', 'Ban Phai', '40110'),
(108, 6, 'หนองนาคำ', 'Nom Sila', '40150'),
(109, 6, 'บ้านฝาง', 'Ban Fang', '40270'),
(110, 6, 'เปือยน้อย', 'Puai Noi', '40340'),
(111, 6, 'พล', 'Phon', '40120'),
(112, 6, 'พระยืน', 'Phra Yun', '40320'),
(113, 6, 'ภูเวียง', 'Phu Wiang', '40150'),
(114, 6, 'ภูผาม่าน', 'Phupaman', '40350'),
(115, 6, 'แวงน้อย', 'Waeng Noi', '40230'),
(116, 6, 'แวงใหญ่', 'Waeng Yai', '40330'),
(117, 6, 'สีชมพู', 'Sichomphoo', '40220'),
(118, 6, 'หนองสองห้อง', 'Nong Song Hong', '40190'),
(119, 6, 'หนองเรือ', 'Nong Rua', '40210'),
(120, 6, 'อุบลรัตน์', 'Ubolratana', '40250'),
(121, 6, 'มัญจาคีรี', 'Mancha Khiri', '40160'),
(122, 6, 'บ้านแฮด', 'Ban Haad', '40110'),
(123, 6, 'โนนศิลา', 'Non Sila', '40110'),
(124, 6, 'กระนวน', 'Kranuan', '40170'),
(125, 7, 'เมืองฉะเชิงเทรา', 'Muang', '24000'),
(126, 7, 'บางคล้า', 'Bang Khla', '24110'),
(127, 7, 'บางน้ำเปรี้ยว', 'Bang Nam Prieo', '24150'),
(128, 7, 'บางปะกง', 'Bang Pakong', '24130'),
(129, 7, 'บ้านโพธิ์', 'Ban Pho', '24140'),
(130, 7, 'แปลงยาว', 'Plaeng Yao', '24190'),
(131, 7, 'พนมสารคาม', 'Phanom Sarakam ', '24120'),
(132, 7, 'สนามชัยเขต', 'Sanam Chaiket ', '24160'),
(133, 7, 'คลองเขื่อน', 'Klong Kuang', '24000'),
(134, 7, 'ราชสาส์น', 'Ratchasan', '24120'),
(135, 7, 'ท่าตะเกียบ', 'Tha Takep', '24160'),
(136, 8, 'เมืองจันทบุรี', 'Muang', '22000'),
(137, 8, 'แก่งหางแมว', 'Kaeng Hang Maeo', '22160'),
(138, 8, 'ขลุง', 'Khlung', '22110'),
(139, 8, 'ท่าใหม่', 'Tha Mai', '22120'),
(140, 8, 'โป่งน้ำร้อน', 'Pong Nam Ron', '22140'),
(141, 8, 'มะขาม', 'Makham', '22150'),
(142, 8, 'สอยดาว', 'Soi Dao', '22180'),
(143, 8, 'แหลมสิงห์', 'Laem Sing', '22130'),
(144, 8, 'เขาคิชฌกูฏ', 'Khao Kitchagoot', '22210'),
(145, 8, 'นายายอาม', 'Na Yai Am', '22160'),
(146, 9, 'เมืองชลบุรี', 'Muang', '20000'),
(147, 9, 'เกาะสีชัง', 'Ko Sichang', '20120'),
(148, 9, 'บ่อทอง', 'Bo Tong', '20270'),
(149, 9, 'บางละมุง', 'Bang Lamung', '20150'),
(150, 9, 'บ้านบึง', 'Ban Bung', '20170'),
(151, 9, 'พานทอง', 'Phan Thong', '20160'),
(152, 9, 'พนัสนิคม', 'Phanut Nikhom', '20140'),
(153, 9, 'ศรีราชา', 'Sri Racha', '20110'),
(154, 9, 'สัตหีบ', 'Satahip', '20180'),
(155, 9, 'หนองใหญ่', 'Nong Yai', '20190'),
(156, 9, 'เกาะจันทร์', 'Ko Chan', '20240'),
(157, 10, 'เมืองชัยนาท', 'Muang', '17000'),
(158, 10, 'มโนรมย์', 'Manorom', '17110'),
(159, 10, 'วัดสิงห์', 'Wat Singh', '17120'),
(160, 10, 'สรรคบุรี', 'Sankhaburi', '17140'),
(161, 10, 'สรรพยา', 'Sanphaya', '17150'),
(162, 10, 'หันคา', 'Hankha', '17130'),
(163, 10, 'หนองมะโมง', 'Nong Ma Mong', '17120'),
(164, 10, 'เนินขาม', 'Noen Kham', '17130'),
(165, 11, 'เมืองชัยภูมิ', 'Muang', '36000'),
(166, 11, 'เกษตรสมบูรณ์', 'Kaset Sombun', '36120'),
(167, 11, 'แก้งคร้อ', 'Kaeng Khlo', '36150'),
(168, 11, 'คอนสวรรค์', 'Khon Sawan', '36140'),
(169, 11, 'คอนสาร', 'Khon San', '36180'),
(170, 11, 'จัตุรัส', 'Chaturat', '36130'),
(171, 11, 'เทพสถิต', 'Thep Sathit', '36230'),
(172, 11, 'บ้านเขว้า', 'Ban Klwao', '36170'),
(173, 11, 'บ้านแท่น', 'Ban Thaen', '36190'),
(174, 11, 'บำเหน็จณรงค์', 'Bamnet Narong', '36160'),
(175, 11, 'ภูเขียว', 'Phu Khieo', '36110'),
(176, 11, 'ภักดีชุมพล', 'Phakdi Chum Phon', '36260'),
(177, 11, 'หนองบัวแดง', 'Nong Bua Daeng', '36210'),
(178, 11, 'หนองบัวระเหว', 'Nong Bua Rahaew', '36250'),
(179, 11, 'ซับใหญ่', 'Sub Yai', '36130'),
(180, 11, 'เนินสง่า', 'Noen Sanga', '36130'),
(181, 12, 'เมืองชุมพร', 'Muang', '86000'),
(182, 12, 'ท่าแซะ', 'Tha Sae', '86140'),
(183, 12, 'ทุ่งตะโก', 'Thung Tako', '86220'),
(184, 12, 'ปะทิว', 'Pathiu', '86160'),
(185, 12, 'พะโต๊ะ', 'Phato', '86180'),
(186, 12, 'ละแม', 'Lamae', '86170'),
(187, 12, 'สวี', 'Sawi', '86130'),
(188, 12, 'หลังสวน', 'Lang Suan', '86110'),
(189, 13, 'ดอยหลวง', 'Doi Luang ', '57110'),
(190, 13, 'เมืองเชียงราย', 'Muang', '57000'),
(191, 13, 'ขุนตาล', 'Khun Tan', '57340'),
(192, 13, 'เชียงของ', 'Chiang Khong', '57140'),
(193, 13, 'เชียงแสน', 'Chiang Saen', '57150'),
(194, 13, 'เทิง', 'Thoeng', '57160'),
(195, 13, 'ป่าแดด', 'Pa Daet', '57190'),
(196, 13, 'พาน', 'Phan', '57120'),
(197, 13, 'แม่จัน', 'Mae Chan', '57110'),
(198, 13, 'เวียงเชียงรุ้ง', 'Chiang Rung', '57210'),
(199, 13, 'แม่สรวย', 'Mae Suai', '57180'),
(200, 13, 'แม่สาย', 'Mae Sai', '57130'),
(201, 13, 'เวียงแก่น', 'Wiang Kaen', '57310'),
(202, 13, 'เวียงชัย', 'Wiang Chai', '57210'),
(203, 13, 'เวียงป่าเป้า', 'Waing Papao', '57170'),
(204, 13, 'พญาเม็งราย', 'Phraya Meng Rai ', '57290'),
(205, 13, 'แม่ลาว', 'Mae Lao', '57250'),
(206, 13, 'แม่ฟ้าหลวง', 'Mae Fa Luang', '57110'),
(207, 14, 'ดอยหล่อ', 'Doi Lo', '50160'),
(208, 14, 'เมืองเชียงใหม่', 'Muang', '50000'),
(209, 14, 'เชียงดาว', 'Chiang Dao', '50170'),
(210, 14, 'ไชยปราการ', 'Chai Prakan', '50320'),
(211, 14, 'ดอยเต่า', 'Doi Tao', '50260'),
(212, 14, 'ดอยสะเก็ด', 'Doi Saket', '50220'),
(213, 14, 'ฝาง', 'Fang', '50110'),
(214, 14, 'พร้าว', 'Phrao', '50190'),
(215, 14, 'แม่แจ่ม', 'Mae Chaem', '50270'),
(216, 14, 'แม่แตง', 'Mae Taeng', '50150'),
(217, 14, 'แม่ริม', 'Mae Rim', '50180'),
(218, 14, 'แม่วาง', 'Mae Wang', '50360'),
(219, 14, 'แม่อาย', 'Mae Ai', '50280'),
(220, 14, 'แม่ออน', 'Mae On', '50130'),
(221, 14, 'เวียงแหง', 'Wiang Haeng', '50350'),
(222, 14, 'สะเมิง', 'Samoeng', '50250'),
(223, 14, 'สันทราย', 'San Sai', '50210'),
(224, 14, 'สันป่าตอง', 'San Pa Tong', '50120'),
(225, 14, 'สารภี', 'Saraphi', '50140'),
(226, 14, 'หางดง', 'Hang Dong', '50230'),
(227, 14, 'อมก๋อย', 'Omkoi', '50310'),
(228, 14, 'ฮอด', 'Hot', '50240'),
(229, 14, 'สันกำแพง', 'San Kamphaeng', '50130'),
(230, 15, 'เมืองตราด', 'Muang', '23000'),
(231, 15, 'เกาะช้าง', 'Ko  Chang', '23170'),
(232, 15, 'เขาสมิง', 'Khao  Saming', '23130'),
(233, 15, 'คลองใหญ่', 'Khlong  Yai', '23110'),
(234, 15, 'บ่อไร่', 'Bo  Rai', '23140'),
(235, 15, 'แหลมงอบ', 'Lam  Ngop', '23120'),
(236, 15, 'เกาะกูด', 'Ko  Kut', '23000'),
(237, 16, 'เมืองตรัง', 'Muang', '92000'),
(238, 16, 'กันตัง', 'Kantang', '92110'),
(239, 16, 'ปะเหลียน', 'Palian', '92120'),
(240, 16, 'ย่านตาขาว', 'Yan  Takhoa', '92140'),
(241, 16, 'รัษฎา', 'Rasda', '92160'),
(242, 16, 'สิเกา', 'Sikao', '92150'),
(243, 16, 'ห้วยยอด', 'Huai  Yot', '92130'),
(244, 16, 'วังวิเศษ', 'Wang  Wiset', '92220'),
(245, 16, 'นาโยง', 'Na  Yong', '92170'),
(246, 16, 'หาดสำราญ', 'Had  Someran', '92120'),
(247, 17, 'เมืองตาก', 'Muang', '63000'),
(248, 17, 'ท่าสองยาง', 'Tha  Song  Yang', '63150'),
(249, 17, 'บ้านตาก', 'Ban  Tak', '63120'),
(250, 17, 'พบพระ', 'Phop  Phra', '63160'),
(251, 17, 'แม่ระมาด', 'Mae  Ramat', '63140'),
(252, 17, 'แม่สอด', 'Mae  Sot', '63110'),
(253, 17, 'สามเงา', 'Sam  Hgao', '63130'),
(254, 17, 'อุ้มผาง', 'Umphang', '63170'),
(255, 17, 'วังเจ้า', 'Wang  Jao', '63000'),
(256, 18, 'เมืองนครนายก', 'Muang', '26000'),
(257, 18, 'บ้านนา', 'Ban  Na', '26110'),
(258, 18, 'ปากพลี', 'Pak  Phli', '26130'),
(259, 18, 'องครักษ์', 'Ongkarak', '26120'),
(260, 19, 'เมืองนครปฐม', 'Muang', '73000'),
(261, 19, 'กำแพงแสน', 'Kampheng  Saen', '73140'),
(262, 19, 'ดอนตูม', 'Don  Tom', '73150'),
(263, 19, 'นครชัยศรี', 'Nakhon  Chaisi', '73120'),
(264, 19, 'บางเลน', 'Bang  Len', '73130'),
(265, 19, 'พุทธมณฑล', 'Buddha  Monthon', '73170'),
(266, 19, 'สามพราน', 'Sam  Pharn', '73110'),
(267, 20, 'เมืองนครพนม', 'Muang', '48000'),
(268, 20, 'ท่าอุเทน', 'Tha  Uthen', '48120'),
(269, 20, 'ธาตุพนม', 'That  Phanom', '48110'),
(270, 20, 'นาแก', 'Na  Kae', '48130'),
(271, 20, 'นาหว้า', 'Nawa', '48180'),
(272, 20, 'บ้านแพง', 'Ban  Phaeng', '48140'),
(273, 20, 'ปลาปาก', 'Pla  Pak', '48160'),
(274, 20, 'โพนสวรรค์', 'Phon  Sawan', '48190'),
(275, 20, 'เรณูนคร', 'Ranu  Nakhon', '48170'),
(276, 20, 'ศรีสงคราม', 'Si  Song  Khram', '48150'),
(277, 20, 'วังยาง', 'Wong  Yang', '48130'),
(278, 20, 'นาทม', 'Na  Thom', '48140'),
(279, 21, 'เมืองนครราชสีมา', 'Muang', '30000'),
(280, 21, 'แก้งสนามนาง', 'Kaeng  Snam  Nang', '30440'),
(281, 21, 'ขามทะเลสอ', 'Kham  Thale  So', '30280'),
(282, 21, 'ขามสะแกแสง', 'Kham  Sakae  Saeng', '30290'),
(283, 21, 'คง', 'Kong', '30260'),
(284, 21, 'ครบุรี', 'Khon  Buri', '30250'),
(285, 21, 'จักราช', 'Chakkarat', '30230'),
(286, 21, 'ลำทะเมนชัย', 'Lum  Thamen  Chai', '30270'),
(287, 21, 'ชุมพวง', 'Chum  Phuang', '30270'),
(288, 21, 'เทพารักษ์', 'Tepharak', '30210'),
(289, 21, 'โชคชัย', 'Chok  Chai', '30190'),
(290, 21, 'ด่านขุนทด', 'Dan  Khun  Thot', '30210'),
(291, 21, 'โนนแดง', 'Non  Daeng', '30360'),
(292, 21, 'โนนไทย', 'Non  Thai', '30220'),
(293, 21, 'โนนสูง', 'Non  Sung', '30160'),
(294, 21, 'บัวใหญ่', 'Bua  Yai', '30120'),
(295, 21, 'บ้านเหลื่อม', 'Ban  Luam', '30350'),
(296, 21, 'ประทาย', 'Pra  Thai', '30180'),
(297, 21, 'ปักธงชัย', 'Pak  Thong  Chai', '30150'),
(298, 21, 'ปากช่อง', 'Pak  Chong', '30130'),
(299, 21, 'พิมาย', 'Phimai', '30110'),
(300, 21, 'วังน้ำเขียว', 'Wong  Namkhieo', '30370'),
(301, 21, 'สีคิ้ว', 'Si  Khiu', '30140'),
(302, 21, 'สูงเนิน', 'Sung  Noen', '30170'),
(303, 21, 'เสิงสาง', 'Soeng  Sang', '30330'),
(304, 21, 'ห้วยแถลง', 'Huai  Thalaeng', '30240'),
(305, 21, 'หนองบุญมาก', 'Nong Bun Mak', '30410'),
(306, 21, 'สีดา', 'Si  Da', '30430'),
(307, 21, 'เฉลิมพระเกียรติ', 'Chaloem Phra Kiat', '30230'),
(308, 21, 'เมืองยาง', 'Muang  Yang', '30270'),
(309, 21, 'พระทองคำ', 'Phrathorngkham', '30220'),
(310, 21, 'บัวลาย', 'Bua  Lai', '30120'),
(311, 22, 'เมืองนครศรีธรรมราช', 'Muang', '80000'),
(312, 22, 'ขนอม', 'Khanom', '80210'),
(313, 22, 'ฉวาง', 'Chawang', '80150'),
(314, 22, 'ชะอวด', 'Vha  Uat', '80180'),
(315, 22, 'เชียรใหญ่', 'Chian  Yai', '80190'),
(316, 22, 'นบพิตำ', 'Nobpitum', '80160'),
(317, 22, 'ท่าศาลา', 'Tha  Sala', '80160'),
(318, 22, 'ทุ่งใหญ่', 'Thung  Yai', '80240'),
(319, 22, 'ทุ่งสง', 'Thung  Song', '80110'),
(320, 22, 'นาบอน', 'Na  Bon', '80220'),
(321, 22, 'บางขัน', 'Bang  Kun', '80360'),
(322, 22, 'ปากพนัง', 'Pak  Phanang', '80140'),
(323, 22, 'พรหมคีรี', 'Phrom  Khire', '80320'),
(324, 22, 'พิปูน', 'Phipun', '80270'),
(325, 22, 'ร่อนพิบูลย์', 'Ron  Phibun', '80130'),
(326, 22, 'สิชล', 'Sichon', '80120'),
(327, 22, 'หัวไทร', 'Hua  Sai', '80170'),
(328, 22, 'ช้างกลาง', 'Chang  Klang', '80250'),
(329, 22, 'ถ้ำพรรณรา', 'Tham  Phanara', '80260'),
(330, 22, 'พระพรหม', 'Phra  Phrom', '80000'),
(331, 22, 'จุฬาภรณ์', 'Chula  Porn', '80130'),
(332, 23, 'เมืองนครสวรรค์', 'Muang', '60000'),
(333, 23, 'เก้าเลี้ยว', 'Kao  Lieo', '60230'),
(334, 23, 'โกรกพระ', 'Krok  Phra', '60170'),
(335, 23, 'ชุมแสง', 'Chum  Saeng', '60120'),
(336, 23, 'ตากฟ้า', 'Tak  Fa', '60190'),
(337, 23, 'ตาคลี', 'Ta  Khli', '60140'),
(338, 23, 'ท่าตะโก', 'Tha  Tako', '60160'),
(339, 23, 'บรรพตพิสัย', 'Banphot  Phisai', '60180'),
(340, 23, 'ไพศาลี', 'Phaisali', '60220'),
(341, 23, 'แม่วงก์', 'Mae  Wong', '60150'),
(342, 23, 'หนองบัว', 'Nong  Bua', '60110'),
(343, 23, 'ชุมตาบง', 'Chum Tabong', '60150'),
(344, 23, 'แม่เปิน', 'Mae Pean', '60150'),
(345, 23, 'ลาดยาว', 'Lat  Yao', '60150'),
(346, 24, 'เมืองนนทบุรี', 'Muang', '11000'),
(347, 24, 'ไทรน้อย', 'Sai  Noi', '11150'),
(348, 24, 'บางกรวย', 'Bang  Kruai', '11130'),
(349, 24, 'บางบัวทอง', 'Bang  Bua  Thong', '11110'),
(350, 24, 'บางใหญ่', 'Bang  Yai', '11140'),
(351, 24, 'ปากเกร็ด', 'Pak  Kret', '11120'),
(352, 25, 'เจาะไอร้อง', 'Jo Ai Rong', '96130'),
(353, 25, 'เมืองนราธิวาส', 'Muang', '96000'),
(354, 25, 'จะแนะ', 'Ja-nae', '96220'),
(355, 25, 'ตากใบ', 'Takbai', '96110'),
(356, 25, 'บาเจาะ', 'Bacho', '96170'),
(357, 25, 'ยี่งอ', 'Yi-ngo', '96180'),
(358, 25, 'ระแงะ', 'Rangae', '96130'),
(359, 25, 'รือเสาะ', 'Ruso', '96150'),
(360, 25, 'แว้ง', ' waeng', '96160'),
(361, 25, 'ศรีสาคร', 'Si  Sakhon', '96210'),
(362, 25, 'สุคิริน', 'Sukhirin', '96190'),
(363, 25, 'สุไหงโกลก', 'Sungai Kolok', '96120'),
(364, 25, 'สุไหงปาดี', 'Sungai  Padi', '96140'),
(365, 26, 'เมืองน่าน', 'Muang', '55000'),
(366, 26, 'เชียงกลาง', 'Chiang  Klang', '55160'),
(367, 26, 'ท่าวังผา', 'Tha  Wang  Pha', '55140'),
(368, 26, 'ทุ่งช้าง', 'Thung  Chang', '55130'),
(369, 26, 'นาน้อย', 'Na  Noi', '55150'),
(370, 26, 'นาหมื่น', 'Na  Mun', '55180'),
(371, 26, 'บ้านหลวง', 'Ban  Luang', '55190'),
(372, 26, 'ปัว', 'Pua', '55120'),
(373, 26, 'แม่จริม', 'Mae  Charim', '55170'),
(374, 26, 'เวียงสา', 'Wieng  Sa', '55110'),
(375, 26, 'สันติสุข', 'Santisuk', '55210'),
(376, 26, 'บ่อเกลือ', 'Bo  Klua', '55220'),
(377, 26, 'ภูเพียง', 'Phu  Pieng', '55000'),
(378, 26, 'สองแคว', 'Song  Kwar', '55160'),
(379, 27, 'บ้านด่าน', 'Ban  Dan', '31000'),
(380, 27, 'เมืองบุรีรัมย์', 'Muang', '31000'),
(381, 27, 'กระสัง', 'Krasang', '31160'),
(382, 27, 'คูเมือง', 'Khu  Muang', '31190'),
(383, 27, 'ชำนิ', 'Cham  Ni', '31110'),
(384, 27, 'พุทไธสง', 'Phuttatisong', '31120'),
(385, 27, 'นาโพธิ์', 'Na  Pho', '31230'),
(386, 27, 'โนนดินแดง', 'Non  Din  Daeng', '31260'),
(387, 27, 'บ้านกรวด', 'Ban  Kruat', '31180'),
(388, 27, 'พลับพลาชัย', 'Phlapphla  Chai', '31250'),
(389, 27, 'บ้านใหม่ไชยพจน์', 'Ban  Mai  Chaiyapot', '31120'),
(390, 27, 'ประโคนชัย', 'Phakhon  Chai', '31140'),
(391, 27, 'ปะคำ', 'Pa  Kham', '31220'),
(392, 27, 'ละหานทราย', 'Lanhan  Sai', '31170'),
(393, 27, 'ลำปลายมาศ', 'Lum  Plaimat', '31130'),
(394, 27, 'สตึก', 'Satuk', '31150'),
(395, 27, 'หนองกี่', 'Nong  Ki', '31210'),
(396, 27, 'หนองหงส์', 'Nong  Hong', '31240'),
(397, 27, 'ห้วยราช', 'Huai  Rat', '31000'),
(398, 27, 'แคนดง', 'Can  Dong', '31150'),
(399, 27, 'โนนสุวรรณ', 'Non  Suwan', '31110'),
(400, 27, 'นางรอง', 'Nang  Rong', '31110'),
(401, 28, 'เมืองปทุมธานี', 'Muang', '12000'),
(402, 28, 'คลองหลวง', 'Khlong  Luang', '12120'),
(403, 28, 'ธัญบุรี', 'Thanyaburi', '12110'),
(404, 28, 'ลาดหลุมแก้ว', 'Lat  Lum  Kaeo', '12140'),
(405, 28, 'ลำลูกกา', 'Lam  Luk  Ka', '12150'),
(406, 28, 'สามโคก', 'Sam  Khok', '12160'),
(407, 28, 'หนองเสือ', 'Nong  Sua', '12170'),
(408, 29, 'เมืองประจวบคีรีขันธ์', 'Muang', '77000'),
(409, 29, 'กุยบุรี', 'Kuiburi', '77150'),
(410, 29, 'ทับสะแก', 'Thap  Sakae', '77130'),
(411, 29, 'บางสะพาน', 'Bang  Saphan', '77140'),
(412, 29, 'บางสะพานน้อย', 'Bang  Saphan  Noi', '77170'),
(413, 29, 'ปราณบุรี', 'Pran  Buri', '77120'),
(414, 29, 'หัวหิน', 'Hua  Hin', '77110'),
(415, 29, 'สามร้อยยอด', 'Sam  Roi  Yot', '77180'),
(416, 30, 'เมืองปราจีนบุรี', 'Muang', '25000'),
(417, 30, 'กบินทร์บุรี', 'Kabin  Buri', '25110'),
(418, 30, 'ศรีมโหสถ', 'Sri  Maho  Sot', '25190'),
(419, 30, 'นาดี', 'Na  Di', '25220'),
(420, 30, 'บ้านสร้าง', 'Ban  Sang', '25150'),
(421, 30, 'ประจันตคาม', 'Prachantakham', '25130'),
(422, 30, 'ศรีมหาโพธิ', 'Si  Maha  Phot', '25140'),
(423, 31, 'เมืองปัตตานี', 'Muang', '94000'),
(424, 31, 'กะพ้อ', 'Kapho', '94230'),
(425, 31, 'โคกโพธิ์', 'Khok  Pho', '94120'),
(426, 31, 'ทุ่งยางแดง', 'Thung  Yang  Daeng', '94140'),
(427, 31, 'ปะนาเระ', 'Panare', '94130'),
(428, 31, 'ไม้แก่น', 'Mai  Kaen', '94220'),
(429, 31, 'ยะรัง', 'Yarang', '94160'),
(430, 31, 'ยะหริ่ง', 'Yaring', '94150'),
(431, 31, 'สายบุรี', 'Sai  Buri', '94110'),
(432, 31, 'หนองจิก', 'Nong  Chilk', '94170'),
(433, 31, 'แม่ลาน', 'Mae  Lan', '94180'),
(434, 31, 'มายอ', 'Mayo', '94140'),
(435, 32, 'พระนครศรีอยุธยา', 'Phra  Nakhon  Si ayutthaya', '13000'),
(436, 32, 'ท่าเรือ', 'Tha  Rua', '13130'),
(437, 32, 'นครหลวง', 'Nakhon  Luang', '13260'),
(438, 32, 'บางซ้าย', 'Bang  Sai', '13270'),
(439, 32, 'บางไทร', 'Bang  Sai', '13190'),
(440, 32, 'บางบาล', 'Bang  Ban', '13250'),
(441, 32, 'บางปะหัน', 'Bang  Pahan', '13220'),
(442, 32, 'บางปะอิน', 'Bang  Pa-in', '13160'),
(443, 32, 'บ้านแพรก', 'Ban  Phraek', '13240'),
(444, 32, 'ผักไห่', 'Phak  Hai', '13120'),
(445, 32, 'ภาชี', 'Phachi', '13140'),
(446, 32, 'มหาราช', 'Maharat', '13150'),
(447, 32, 'ลาดบัวหลวง', 'Lat  Bua  Luang', '13230'),
(448, 32, 'วังน้อย', 'Wang  Noi', '13170'),
(449, 32, 'เสนา', 'Sena', '13110'),
(450, 32, 'อุทัย', 'Uthai', '13210'),
(451, 33, 'เมืองพะเยา', 'Muang', '56000'),
(452, 33, 'จุน', 'Chun', '56150'),
(453, 33, 'เชียงคำ', 'Chiang  Kham', '56110'),
(454, 33, 'เชียงม่วน', 'Chiang  Muan', '56160'),
(455, 33, 'ดอกคำใต้', 'Dok  Kham  Tai', '56120'),
(456, 33, 'ปง', 'Pong', '56140'),
(457, 33, 'แม่ใจ', 'Mae  Chai', '56130'),
(458, 33, 'ภูกามยาว', 'Phu  Kam  Yao', '56000'),
(459, 33, 'ภูซาง', 'Phu  Sang', '56110'),
(460, 34, 'เมืองพิจิตร', 'Muang', '66000'),
(461, 34, 'ตะพานหิน', 'Taphan  Hin', '66110'),
(462, 34, 'ทับคล้อ', 'Thap  Khlo', '66150'),
(463, 34, 'บางมูลนาก', 'Bang  Mun  Nak', '66120'),
(464, 34, 'โพทะเล', 'Pho  Thalae', '66130'),
(465, 34, 'โพธิ์ประทับช้าง', 'Pho  Prathap  Chang', '66190'),
(466, 34, 'สามง่าม', 'Sam  Ngam', '66140'),
(467, 34, 'วังทรายพูน', 'Wang  Sai  Phun', '66180'),
(468, 34, 'สากเหล็ก', 'Sak  Lek', '66160'),
(469, 34, 'ดงเจริญ', 'Dong  Charoen', '66210'),
(470, 34, 'บึงนาราง', 'Bung  Narang', '66130'),
(471, 34, 'วชิรบารมี', 'Wachirabarami', '66140'),
(472, 35, 'เมืองพิษณุโลก', 'Muang', '65000'),
(473, 35, 'นครไทย', 'Nakhon  Thai', '65120'),
(474, 35, 'ชาติตระการ', 'Chat  Trakan', '65170'),
(475, 35, 'เนินมะปราง', 'Noen  Maprang', '65190'),
(476, 35, 'บางกระทุ่ม', 'Bang  Krathum', '65110'),
(477, 35, 'บางระกำ', 'Bang  Rakam', '65140'),
(478, 35, 'พรหมพิราม', 'Phrom  Phiram', '65150'),
(479, 35, 'วังทอง', 'Wang  Thong', '65130'),
(480, 35, 'วัดโบสถ์', 'Wat  Bot', '65160'),
(481, 36, 'เมืองเพชรบูรณ์', 'Muang', '67000'),
(482, 36, 'เขาค้อ', 'Khao  Kho', '67270'),
(483, 36, 'ชนแดน', 'Chon  Daen', '67150'),
(484, 36, 'น้ำหนาว', 'Nam  Nao', '67260'),
(485, 36, 'บึงสามพัน', 'Bung  Sam  Phan', '67160'),
(486, 36, 'วิเชียรบุรี', 'Wichain  Buri', '67130'),
(487, 36, 'ศรีเทพ', 'Si  Thap', '67170'),
(488, 36, 'หนองไผ่', 'Nong  Phai', '67140'),
(489, 36, 'หล่มเก่า', 'Lom  Kao', '67120'),
(490, 36, 'หล่มสัก', 'Lom  Sak', '67110'),
(491, 36, 'วังโป่ง', 'Wang  Pong', '67240'),
(492, 37, 'เมืองเพชรบุรี', 'Muang', '76000'),
(493, 37, 'แก่งกระจาน', 'Kaeng  Krachan', '76170'),
(494, 37, 'เขาย้อย', 'Khao  Yoi', '76140'),
(495, 37, 'ชะอำ', 'Cha-am', '76120'),
(496, 37, 'ท่ายาง', 'Tha  Yang', '76130'),
(497, 37, 'บ้านลาด', 'Ban  Lat', '76150'),
(498, 37, 'บ้านแหลม', 'Ban  Laern', '76110'),
(499, 37, 'หนองหญ้าปล้อง', 'Nong  Ya  Plong', '76160'),
(500, 38, 'เมืองแพร่', 'Muang', '54000'),
(501, 38, 'เด่นชัย', 'Den  Chai', '54110'),
(502, 38, 'ร้องกวาง', 'Rong  Kwang', '54140'),
(503, 38, 'ลอง', 'Long', '54150'),
(504, 38, 'วังชิ้น', 'Wang  Chin', '54160'),
(505, 38, 'สอง', 'Song', '54120'),
(506, 38, 'หนองม่วงไข่', 'Nong  Muang  Kai', '54170'),
(507, 38, 'สูงเม่น', 'Sung  Men', '54130'),
(508, 39, 'เมืองพังงา', 'Muang', '82000'),
(509, 39, 'กะปง', 'Kapong', '82170'),
(510, 39, 'เกาะยาว', 'Ko  Yao', '82160'),
(511, 39, 'คุระบุรี', 'Khura  Buri', '82150'),
(512, 39, 'ตะกั่วทุ่ง', 'Takuo  Thung', '82130'),
(513, 39, 'ตะกั่วป่า', 'Takuo  Pa', '82110'),
(514, 39, 'ทับปุด', 'Thap  Put', '82180'),
(515, 39, 'ท้ายเหมือง', 'Thai  Muang', '82120'),
(516, 40, 'เมืองพัทลุง', 'Muang', '93000'),
(517, 40, 'กงหรา', 'Kong  Ra', '93180'),
(518, 40, 'เขาชัยสน', 'Khao  Chaison', '93130'),
(519, 40, 'ควนขนุน', 'Khuan  Khanun', '93110'),
(520, 40, 'ตะโหมด', 'Tamot', '93160'),
(521, 40, 'ปากพะยูน', 'Pak  Phayun', '93120'),
(522, 40, 'ป่าบอน', 'Pa  Bon', '93170'),
(523, 40, 'ศรีบรรพต', 'Si  Banphot', '93190'),
(524, 40, 'บางแก้ว', 'Bang  Kaeo', '93140'),
(525, 40, 'ศรีนครินทร์', 'Sinakarin', '93000'),
(526, 40, 'ป่าพะยอม', 'Pa  Phayom', '93110'),
(527, 41, 'เมืองภูเก็ต', 'Muang', '83000'),
(528, 41, 'กะทู้', 'Krathu', '83120'),
(529, 41, 'ถลาง', 'Thalang', '83110'),
(530, 42, 'เมืองมุกดาหาร', 'Muang', '49000'),
(531, 42, 'คำชะอี', 'Khamcha-i', '49110'),
(532, 42, 'ดงหลวง', 'Dong  Luang', '49140'),
(533, 42, 'ดอนตาล', 'Don  Tan', '49120'),
(534, 42, 'นิคมคำสร้อย', 'Nikhom  Kham  Soi', '49130'),
(535, 42, 'หนองสูง', 'Nong  Sung', '49160'),
(536, 42, 'หว้านใหญ่', 'Wan  Yai', '49150'),
(537, 43, 'เมืองมหาสารคาม', 'Muang', '44000'),
(538, 43, 'กันทรวิชัย', 'Kanthara  Wichai', '44150'),
(539, 43, 'แกดำ', 'Kao  Dam', '44190'),
(540, 43, 'โกสุมพิสัย', 'Kosum  Phisai', '44140'),
(541, 43, 'เชียงยืน', 'Chiang  Yun', '44160'),
(542, 43, 'นาเชือก', 'Na  Chuak', '44170'),
(543, 43, 'นาดูน', 'Na  Dun', '44180'),
(544, 43, 'บรบือ', 'Borabu', '44130'),
(545, 43, 'พยัคฆภูมิพิสัย', 'Phayakhaphum  Phisai', '44110'),
(546, 43, 'วาปีปทุม', 'Wapi  Pathum', '44120'),
(547, 43, 'ยางสีสุราช', 'Yang  Si  Surat', '44210'),
(548, 43, 'ชื่นชม', 'Chun  Chom', '44160'),
(549, 43, 'กุดรัง', 'Kut  Rang', '44130'),
(550, 44, 'เมืองแม่ฮ่องสอน', 'Muang', '58000'),
(551, 44, 'ขุนยวม', 'Khun  Yuam', '58140'),
(552, 44, 'ปางมะผ้า', 'Pangmapha', '58150'),
(553, 44, 'ปาย', 'Pai', '58130'),
(554, 44, 'แม่ลาน้อย', 'Mae  La  Noi', '58120'),
(555, 44, 'แม่สะเรียง', 'Mae  Sariang', '58110'),
(556, 44, 'สบเมย', 'Sop  Moi', '58110'),
(557, 45, 'เมืองยะลา', 'Muang', '95000'),
(558, 45, 'กาบัง', 'Kabang', '95120'),
(559, 45, 'ธารโต', 'Than  To', '95150'),
(560, 45, 'บันนังสตา', 'Bannang  Sata', '95130'),
(561, 45, 'เบตง', 'Betong', '95110'),
(562, 45, 'รามัน', 'Raman', '95140'),
(563, 45, 'กรงปินัง', 'Kong  Phinang', '95000'),
(564, 45, 'ยะหา', 'Yaha', '95120'),
(565, 46, 'เมืองยโสธร', 'Muang', '35000'),
(566, 46, 'กุดชุม', 'Kut  Chum', '35140'),
(567, 46, 'ค้อวัง', 'Kho  Wang', '35160'),
(568, 46, 'คำเขื่อนแก้ว', 'Kham  Khuan  Kaeo', '35110'),
(569, 46, 'ไทยเจริญ', 'Thai  Charoen', '35120'),
(570, 46, 'ทรายมูล', 'Sai  Mun', '35170'),
(571, 46, 'ป่าติ้ว', 'Pa  Tu', '35150'),
(572, 46, 'มหาชนะชัย', 'Maha  Chana  Chai', '35130'),
(573, 46, 'เลิงนกทา', 'Loeng  Nok  Tha', '35120'),
(574, 47, 'เมืองร้อยเอ็ด', 'Muang', '45000'),
(575, 47, 'ทุ่งเขาหลวง', 'Thung  Kao  Luang', '45170'),
(576, 47, 'เกษตรวิสัย', 'Kaset  Wisai', '45150'),
(577, 47, 'จตุรพักตรพิมาน', 'Chaturaphak Phiman', '45180'),
(578, 47, 'ธวัชบุรี', 'Thawatchaburi', '45170'),
(579, 47, 'ปทุมรัตต์', 'Pathum Rat', '45190'),
(580, 47, 'พนมไพร', 'Panom  Phrai', '45140'),
(581, 47, 'โพธิ์ชัย', 'Pho  Chai', '45230'),
(582, 47, 'โพนทราย', 'Phon  Sai', '45240'),
(583, 47, 'โพนทอง', 'Phon  Thong', '45110'),
(584, 47, 'เมยวดี', 'Moi  Wadi', '45250'),
(585, 47, 'เมืองสรวง', 'Muang  Suang', '45220'),
(586, 47, 'เสลภูมิ', 'Selaphum', '45120'),
(587, 47, 'สุวรรณภูมิ', 'Suwannaphum', '45130'),
(588, 47, 'หนองพอก', 'Nong  Phok', '45210'),
(589, 47, 'อาจสามารถ', 'At  Samat', '45160'),
(590, 47, 'เชียงขวัญ', 'Chiang  Khwan', '45000'),
(591, 47, 'ศรีสมเด็จ', 'Srisomdet', '45000'),
(592, 47, 'จังหาร', 'Jung  Han', '45000'),
(593, 47, 'หนองฮี', 'Nong  Hee', '45140'),
(594, 48, 'เมืองระนอง', 'Muang', '85000'),
(595, 48, 'กระบุรี', 'Kra  Buri', '85110'),
(596, 48, 'กะเปอร์', 'Kaper', '85120'),
(597, 48, 'ละอุ่น', 'La-un', '85130'),
(598, 48, 'สุขสำราญ', 'Sook  Samran', '85120'),
(599, 49, 'เมืองระยอง', 'Muang', '21000'),
(600, 49, 'แกลง', 'Klaeng', '21110'),
(601, 49, 'บ้านค่าย', 'Ban  Khai', '21120'),
(602, 49, 'บ้านฉาง', 'Ban  Chang', '21130'),
(603, 49, 'ปลวกแดง', 'Pluak  Daeng', '21140'),
(604, 49, 'วังจันทร์', 'Wang  Chan', '21210'),
(605, 49, 'นิคมพัฒนา', 'Nikhom  Phathana', '21180'),
(606, 49, 'เขาชะเมา', 'Khao  Chamao', '21110'),
(607, 50, 'เมืองราชบุรี', 'Muang', '70000'),
(608, 50, 'จอมบึง', 'Chom  Bung', '70150'),
(609, 50, 'ดำเนินสะดวก', 'Damnoen  Saduak', '70130'),
(610, 50, 'บางแพ', 'Bang  Phae', '70160'),
(611, 50, 'บ้านโป่ง', 'Ban  Pong', '70110'),
(612, 50, 'ปากท่อ', 'Pak  Tho', '70140'),
(613, 50, 'โพธาราม', 'Photharam', '70120'),
(614, 50, 'วัดเพลง', 'Wat  Phleng', '70170'),
(615, 50, 'สวนผึ้ง', 'Suan  Phung', '70180'),
(616, 50, 'บ้านคา', 'Ban  Kha', '70180'),
(617, 51, 'เมืองลพบุรี', 'Muang', '15000'),
(618, 51, 'โคกเจริญ', 'Khok Charoen', '15250'),
(619, 51, 'โคกสำโรง', 'Khok Samrung', '15120'),
(620, 51, 'ชัยบาดาล', 'Chai Badan', '15130'),
(621, 51, 'ท่าวุ้ง', 'Tha Wung', '15150'),
(622, 51, 'ท่าหลวง', 'Tha Luang', '15230'),
(623, 51, 'บ้านหมี่', 'Ban Mi', '15110'),
(624, 51, 'พัฒนานิคม', 'Phatthana Nikhom', '15140'),
(625, 51, 'ลำสนธิ', 'Lam Sonth', '15190'),
(626, 51, 'หนองม่วง', 'Nong Muang', '15170'),
(627, 52, 'เมืองลำปาง', 'Muang', '52000'),
(628, 52, 'เกาะคา', 'Ko Kha', '52130'),
(629, 52, 'งาว', 'Ngao', '52110'),
(630, 52, 'แจ้ห่ม', 'Chae Hom', '52120'),
(631, 52, 'เถิน', 'Thoen', '52160'),
(632, 52, 'แม่ทะ', 'Mae Tha', '52150'),
(633, 52, 'แม่พริก', 'Mae Phrik', '52180'),
(634, 52, 'เมืองปาน', 'Mueang Pan', '52240'),
(635, 52, 'แม่เมาะ', 'Mae Mo', '52220'),
(636, 52, 'วังเหนือ', 'Wang Nue', '52140'),
(637, 52, 'สบปราบ', 'Sop Prap', '52170'),
(638, 52, 'เสริมงาม', 'Some Ngam', '52210'),
(639, 52, 'ห้างฉัตร', 'Hang Chat', '52190'),
(640, 53, 'เมืองลำพูน', 'Muang', '51000'),
(641, 53, 'ทุ่งหัวช้าง', 'Tung Hau Chang', '51160'),
(642, 53, 'บ้านโฮ่ง', 'Ban Hong', '51130'),
(643, 53, 'ป่าซาง', 'Pa Chang', '51120'),
(644, 53, 'แม่ทา', 'Mae Ta', '51140'),
(645, 53, 'ลี้', 'Li', '51110'),
(646, 53, 'บ้านธิ', 'Ban Ti', '51180'),
(647, 53, 'เวียงหนองล่อง', 'Wieng Nong Long', '51120'),
(648, 54, 'เมืองเลย', 'Muang', '42000'),
(649, 54, 'เชียงคาน', 'Chiang Khan', '42110'),
(650, 54, 'ด่านซ้าย', 'Dan Sa', '42120'),
(651, 54, 'ท่าลี่', 'Tha Li', '42140'),
(652, 54, 'นาด้วง', 'Na Duang', '42210'),
(653, 54, 'นาแห้ว', 'Na Haeo', '42170'),
(654, 54, 'ปากชม', 'Pak Chom', '42150'),
(655, 54, 'ผาขาว', 'Pha Khao', '42240'),
(656, 54, 'ภูกระดึง', 'Phu Kradueng', '42180'),
(657, 54, 'ภูเรือ', 'Phu Ruea', '42160'),
(658, 54, 'ภูหลวง', 'Phu Luang', '42230'),
(659, 54, 'วังสะพุง', 'Wang Saphung', '42130'),
(660, 54, 'เอราวัณ', 'Erawan', '42220'),
(661, 54, 'หนองหิน', 'Nong Hin', '42190'),
(662, 55, 'กันทรลักษ์', 'Kantharalak', '33110'),
(663, 55, 'กันทรารมย์', 'Kanthararom', '33130'),
(664, 55, 'ขุขันธ์', 'Khukhan', '33140'),
(665, 55, 'ขุนหาญ', 'Khun han', '33150'),
(666, 55, 'โนนคูณ', 'Non  Khun', '33250'),
(667, 55, 'บึงบูรพ์', 'Bang bun', '33220'),
(668, 55, 'ปรางค์กู่', 'Prang ku', '33170'),
(669, 55, 'พยุห์', 'Phayu', '33230'),
(670, 55, 'ไพรบึง', 'Phrai bung', '33180'),
(671, 55, 'โพธิ์ศรีสุวรรณ', 'Pho si suwan', '33120'),
(672, 55, 'ศิลาลาด', 'Sila lat', '33190'),
(673, 55, 'ยางชุมน้อย', 'Yang  Chumnoi', '33190'),
(674, 55, 'ราษีไศล', 'Rasi salai', '33160'),
(675, 55, 'วังหิน', 'Wang  Hin', '33270'),
(676, 55, 'ศรีรัตนะ', 'Sri  Ratana', '33240'),
(677, 55, 'ห้วยทับทัน', 'Huai thap Than', '33210'),
(678, 55, 'น้ำเกลี้ยง', 'Nam  Kliang', '33130'),
(679, 55, 'ภูสิงห์', 'Phu Sing', '33140'),
(680, 55, 'อุทุมพรพิสัย', 'Uthumphon phisai', '33120'),
(681, 55, 'เมืองจันทร์', 'Muang  Chan', '33120'),
(682, 56, 'เมืองสกลนคร', 'Muang', '47000'),
(683, 56, 'กุดบาก', 'Kut bak', '47180'),
(684, 56, 'กุสุมาลย์', 'Kusuman', '47210'),
(685, 56, 'คำตากล้า', 'Kham Ta kla', '47250'),
(686, 56, 'เจริญศิลป์', 'Charoen silp', '47290'),
(687, 56, 'เต่างอย', 'Tao ngoi', '47260'),
(688, 56, 'นิคมน้ำอูน', 'Nikhom nam un', '47270'),
(689, 56, 'บ้านม่วง', 'Ban muang', '47140'),
(690, 56, 'พรรณานิคม', 'Phanna nikhom', '47130'),
(691, 56, 'พังโคน', 'Phang khon', '47160'),
(692, 56, 'วานรนิวาส', 'Wanan niwat', '47120'),
(693, 56, 'วาริชภูมิ', 'Waritchaphum', '47150'),
(694, 56, 'โคกศรีสุพรรณ', 'Khok si suphan', '47280'),
(695, 56, 'สว่างแดนดิน', 'Sawang dan din', '47110'),
(696, 56, 'ส่องดาว', 'Song dao', '47190'),
(697, 56, 'อากาศอำนวย', 'Kat aamnuai', '47170'),
(698, 56, 'โพนนาแก้ว', 'Phonnakaeo', '47230'),
(699, 56, 'ภูพาน', 'Phu Phan', '47180'),
(700, 57, 'เมืองสงขลา', 'Muang', '90000'),
(701, 57, 'กระแสสินธุ์', 'Krasae  Sin', '90270'),
(702, 57, 'ควนเนียง', 'Khuan  Niang', '90220'),
(703, 57, 'จะนะ', 'Chana', '90130'),
(704, 57, 'เทพา', 'Thepha', '90150'),
(705, 57, 'นาทวี', 'Na  Thawi', '90160'),
(706, 57, 'นาหม่อม', 'Na  Mom', '90310'),
(707, 57, 'บางกล่ำ', 'Bang  Khum', '90110'),
(708, 57, 'ระโนด', 'Ranot', '90140'),
(709, 57, 'รัตภูมิ', 'Rattaphum', '90180'),
(710, 57, 'สทิงพระ', 'Sathing Phra', '90190'),
(711, 57, 'สะเดา', 'Sadao', '90120'),
(712, 57, 'สะบ้าย้อย', 'Saba  Yoi', '90210'),
(713, 57, 'สิงหนคร', 'Singha nakhon', '90280'),
(714, 57, 'คลองหอยโข่ง', 'Klong Hong Kong', '90230'),
(715, 57, 'หาดใหญ่', 'Hat  Yai', '90110'),
(716, 58, 'เมืองสตูล', 'Muang', '91000'),
(717, 58, 'ควนกาหลง', 'Khuan  Ka  Long', '91130'),
(718, 58, 'ควนโดน', 'Khuan  Don', '91160'),
(719, 58, 'ท่าแพ', 'Tha  Phae', '91150'),
(720, 58, 'ทุ่งหว้า', 'Thung  Wa', '91120'),
(721, 58, 'ละงู', 'Langu', '91110'),
(722, 58, 'มะนัง', 'Manang', '91130'),
(723, 59, 'เมืองสมุทรสาคร', 'Muang', '74000'),
(724, 59, 'กระทุ่มแบน', 'Krathumbaen', '74110'),
(725, 59, 'บ้านแพ้ว', 'Ban  Phaeo', '74120'),
(726, 60, 'เมืองสมุทรสงคราม', 'Muang', '75000'),
(727, 60, 'อัมพวา', 'Amphawa', '75110'),
(728, 61, 'เมืองสระแก้ว', 'Muang', '27000'),
(729, 61, 'คลองหาด', 'Khong  Hat', '27260'),
(730, 61, 'ตาพระยา', 'Ta  Phaya', '27180'),
(731, 61, 'วังน้ำเย็น', 'Wang  Nam  Yen', '27210'),
(732, 61, 'วัฒนานคร', 'Watthana  Nakhon', '27160'),
(733, 61, 'อรัญประเทศ', 'Aranyaprathet', '27120'),
(734, 61, 'วังสมบูรณ์', 'Wang  Somboon', '27250'),
(735, 61, 'เขาฉกรรจ์', 'Kao Chakan', '27000'),
(736, 61, 'โคกสูง', 'Khok  Sung', '27120'),
(737, 62, 'เมืองสระบุรี', 'Muang', '18000'),
(738, 62, 'แก่งคอย', 'Kaeng  Khoy', '18110'),
(739, 62, 'ดอนพุด', 'Don  Phut', '18210'),
(740, 62, 'บ้านหมอ', 'Ban  Mo', '18130'),
(741, 62, 'พระพุทธบาท', 'Phra  Phutthabat', '18120'),
(742, 62, 'มวกเหล็ก', 'Muak  Lek', '18180'),
(743, 62, 'วิหารแดง', 'Wihan  Daeng', '18150'),
(744, 62, 'เสาไห้', 'Sao  Hai', '18160'),
(745, 62, 'หนองแค', 'Nong  Khae', '18140'),
(746, 62, 'หนองแซง', 'Nong  Saeng', '18170'),
(747, 62, 'หนองโดน', 'Nong  Don', '18190'),
(748, 62, 'วังม่วง', 'Wong  Muang', '18220'),
(749, 62, 'เฉลิมพระเกียรติ', 'Chalermprakiat', '18000'),
(750, 63, 'เมืองสิงห์บุรี', 'Muang', '16000'),
(751, 63, 'ค่ายบางระจัน', 'Khai  Bang  Rachan', '16150'),
(752, 63, 'ท่าช้าง', 'Tha  Chang', '16140'),
(753, 63, 'บางระจัน', 'Bang  Rachan', '16130'),
(754, 63, 'พรหมบุรี', 'Phrom  Buri', '16120'),
(755, 63, 'อินทร์บุรี', 'In  Buri', '16110'),
(756, 64, 'เมืองสุโขทัย', 'Muang', '64000'),
(757, 64, 'กงไกรลาศ', 'Kong  Kralilat', '64170'),
(758, 64, 'คีรีมาศ', 'Khiri  Mat', '64160'),
(759, 64, 'ทุ่งเสลี่ยม', 'Thung  Saliam', '64150'),
(760, 64, 'บ้านด่านลานหอย', 'Ban  Dan  Lan  Hoi', '64140'),
(761, 64, 'ศรีนคร', 'Si  Nakhon', '64180'),
(762, 64, 'ศรีสัชนาลัย', 'Si  Satchanalai', '64130'),
(763, 64, 'ศรีสำโรง', 'Si  Sam  Rong', '64120'),
(764, 64, 'สวรรคโลก', 'Sawankhalok', '64110'),
(765, 65, 'เมืองสุพรรณบุรี', 'Muang', '72000'),
(766, 65, 'ดอนเจดีย์', 'Don  Chedi', '72170'),
(767, 65, 'ด่านช้าง', 'Dan  Chang', '72180'),
(768, 65, 'เดิมบางนางบวช', 'Doembang  Nangbuat', '72120'),
(769, 65, 'บางปลาม้า', 'Bang  Plama', '72150'),
(770, 65, 'ศรีประจันต์', 'Si  Prachan', '72140'),
(771, 65, 'สองพี่น้อง', 'Song  Phi  Nong', '72110'),
(772, 65, 'สามชุก', 'Sam  Chuk', '72130'),
(773, 65, 'อู่ทอง', 'Nong  Yasai ', '72160'),
(774, 65, 'หนองหญ้าไซ', 'U-thong', '72240'),
(775, 66, 'วิภาวดี', 'Wiphawadi', '84180'),
(776, 66, 'เมืองสุราษฎร์ธานี', 'Muang', '84000'),
(777, 66, 'กาญจนดิษฐ์', 'Kanchanadit', '84160'),
(778, 66, 'เกาะพะงัน', 'Ko  Phangan', '84280'),
(779, 66, 'เกาะสมุย', 'Ko  Samui', '84140'),
(780, 66, 'คีรีรัฐนิคม', 'Khiriratthanikhom', '84180'),
(781, 66, 'เคียนซา', 'Khian  Sa', '84260'),
(782, 66, 'ชัยบุรี', 'Chai  Buri', '84350'),
(783, 66, 'ไชยา', 'Chaiya', '84110'),
(784, 66, 'ดอนสัก', 'Don  Sak', '84220'),
(785, 66, 'ท่าฉาง', 'Tha  Chang', '84150'),
(786, 66, 'ท่าชนะ', 'Tha  Chana', '84170'),
(787, 66, 'บ้านตาขุน', 'Ban  Ta  Khun', '84230'),
(788, 66, 'บ้านนาเดิม', 'Ban  Na  Doem', '84240'),
(789, 66, 'บ้านนาสาร', 'Ban  Na  San', '84120'),
(790, 66, 'พนม', 'Phanom', '84250'),
(791, 66, 'พระแสง', 'Phra  Saeng', '84210'),
(792, 66, 'พุนพิน', 'Phun  Phin', '84130'),
(793, 66, 'เวียงสระ', 'Wieng Sa', '84190'),
(794, 67, 'เมืองสุรินทร์', 'Muang', '32000'),
(795, 67, 'กาบเชิง', 'Kap  Choeng', '32210'),
(796, 67, 'จอมพระ', 'Chom  Phra', '32180'),
(797, 67, 'ชุมพลบุรี', 'Chumphon  Buri', '32190'),
(798, 67, 'ท่าตูม', 'Tha  Tum', '32120'),
(799, 67, 'บัวเชด', 'Bua chet', '32230'),
(800, 67, 'ปราสาท', 'Pra  Sat', '32140'),
(801, 67, 'รัตนบุรี', 'Rattana Buri', '32130'),
(802, 67, 'ลำดวน', 'Lamduan', '32220'),
(803, 67, 'ศีขรภูมิ', 'Sikhoraphum', '32110'),
(804, 67, 'สนม', 'Sanom', '32160'),
(805, 67, 'สังขะ', 'Sungkha', '32150'),
(806, 67, 'สำโรงทาบ', 'Samrong  Thap', '32170'),
(807, 67, 'เขวาสินรินทร์', 'Khewasinarin', '32000'),
(808, 67, 'พนมดงรัก', 'Phanom  Dong  Rak', '32140'),
(809, 67, 'โนนนารายณ์', 'Nhon narai', '32130'),
(810, 67, 'ศรีณรงค์', 'Sri  Narong', '32150'),
(811, 68, 'เมืองหนองคาย', 'Muang', '43000'),
(812, 68, 'ท่าบ่อ', 'Tha  Bo', '43110'),
(813, 68, 'โพนพิสัย', 'Phon  Phisai', '43120'),
(814, 68, 'โพธิ์ตาก', 'Pho  Tak', '43130'),
(815, 68, 'ศรีเชียงใหม่', 'Sri  Chaing  Mai', '43130'),
(816, 68, 'สังคม', 'Sangkhom', '43160'),
(817, 68, 'สระใคร่', 'Sa  Khai', '43100'),
(818, 68, 'เฝ้าไร่', 'Fao Rai', '43120'),
(819, 68, 'รัตนวาปี', 'Rat Ana Wapi', '43120'),
(820, 69, 'เมืองหนองบัวลำภู', 'Muang', '39000'),
(821, 69, 'โนนสัง', 'Non  Sung', '39140'),
(822, 69, 'ศรีบุญเรือง', 'Si  Bun  Ruang', '39180'),
(823, 69, 'สุวรรณคูหา', 'Suwan  Khuha', '39270'),
(824, 69, 'นาวัง', 'Na  Wang', '39170'),
(825, 70, 'เมืองอ่างทอง', 'Muang', '14000'),
(826, 70, 'ไชโย', 'Chai yo', '14140'),
(827, 70, 'ป่าโมก', 'Pa mok', '14130'),
(828, 70, 'โพธิ์ทอง', 'Po thong', '14120'),
(829, 70, 'วิเศษชัยชาญ', 'Wiset  Chai  Chan', '14110'),
(830, 70, 'สามโก้', 'Sam  Ko', '14160'),
(831, 70, 'แสวงหา', 'Sawaengha', '14150'),
(832, 71, 'เมืองอุบลราชธานี', 'Muang', '34000'),
(833, 71, 'นาตาล', 'Natan', '34170'),
(834, 71, 'กุดข้าวปุ้น', 'Kut  Khao  Pun', '34270'),
(835, 71, 'เขมราฐ', 'Khemarat', '34170'),
(836, 71, 'เขื่องใน', 'Khuang  Nai', '34150'),
(837, 71, 'โขงเจียม', 'Khong  Chiam', '34220'),
(838, 71, 'เดชอุดม', 'Det  Udom', '34160'),
(839, 71, 'น้ำขุ่น', 'Nam Khun', '34260'),
(840, 71, 'ตระการพืชผล', 'Trakan  Phutphon', '34130'),
(841, 71, 'ตาลสุม', 'Tan  Sum', '34330'),
(842, 71, 'นาจะหลวย', 'Na  Chaluai', '34280'),
(843, 71, 'น้ำยืน', 'Nam  Yun', '34260'),
(844, 71, 'บุณฑริก', 'Buntharik', '34230'),
(845, 71, 'พิบูลมังสาหาร', 'Phibun  Mangsahan', '34110'),
(846, 71, 'โพธิ์ไทร', 'Pho  Sai', '34340'),
(847, 71, 'ม่วงสามสิบ', 'Muang  Samsip', '34140'),
(848, 71, 'วารินชำราบ', 'Warin  Shamrap', '34190'),
(849, 71, 'ศรีเมืองใหม่', 'Si  Muang  Mai', '34250'),
(850, 71, 'สำโรง', 'Samrong', '34360'),
(851, 71, 'สิรินธร', 'Sirinthon', '34350'),
(852, 71, 'ดอนมดแดง', 'Don  Mot  Daeng', '34000'),
(853, 71, 'นาเยีย', 'Na Year', '34160'),
(854, 71, 'เหล่าเสือโก้ก', 'Loa Sua Kok', '34000'),
(855, 71, 'ทุ่งศรีอุดม', 'Thung  Si  Udom', '34160'),
(856, 71, 'สว่างวีระวงศ์', 'Swang  Weerawong', '34190'),
(857, 72, 'เมืองอุทัยธานี', 'Muang', '61000'),
(858, 72, 'ทัพทัน', 'Thap  Than', '61120'),
(859, 72, 'บ้านไร่', 'Ban  Rai', '61140'),
(860, 72, 'ลานสัก', 'Lan  Sak', '61160'),
(861, 72, 'สว่างอารมณ์', 'Sawang  Arom', '61150'),
(862, 72, 'หนองขาหย่าง', 'Nong  Khayang', '61130'),
(863, 72, 'หนองฉาง', 'Nong  Chang', '61110'),
(864, 72, 'ห้วยคต', 'Huai  Khot', '61170'),
(865, 73, 'เมืองอุดรธานี', 'Muang', '41000'),
(866, 73, 'กู่แก้ว', 'Ku  Kaeo', '41130'),
(867, 73, 'กุดจับ', 'Kut  Chap', '41250'),
(868, 73, 'กุมภวาปี', 'Kumphawapi', '41110'),
(869, 73, 'ไชยวาน', 'Chai  Wan', '41290'),
(870, 73, 'ทุ่งฝน', 'Thung  Fon', '41310'),
(871, 73, 'นายูง', 'Na  Yung', '41380'),
(872, 73, 'น้ำโสม', 'Nam  Som', '41210'),
(873, 73, 'โนนสะอาด', 'Non  Sa-at', '41240'),
(874, 73, 'บ้านดุง', 'Ban  Dung', '41190'),
(875, 73, 'บ้านผือ', 'Ban  Phu', '41160'),
(876, 73, 'เพ็ญ', 'Phen', '41150'),
(877, 73, 'วังสามหมอ', 'Wang  Sam  Mo', '41280'),
(878, 73, 'ศรีธาตุ', 'Sri  That', '41230'),
(879, 73, 'สร้างคอม', 'Sang  Khom', '41260'),
(880, 73, 'หนองวัวซอ', 'Nong  Wua  So', '41220'),
(881, 73, 'หนองแสง', 'Nong  Saeng', '41340'),
(882, 73, 'หนองหาน', 'Nong  Han', '41130'),
(883, 73, 'พิบูลย์รักษ์', 'Phibun  Rak', '41130'),
(884, 74, 'เมืองอุตรดิตถ์', 'Muang', '53000'),
(885, 74, 'ตรอน', 'Tron', '53140'),
(886, 74, 'ทองแสนขัน', 'Thong  Saen  Khan', '53230'),
(887, 74, 'ท่าปลา', 'Tha  Pla', '53150'),
(888, 74, 'น้ำปาด', 'Nam  Pat', '53110'),
(889, 74, 'บ้านโคก', 'Ban  Khok', '53180'),
(890, 74, 'พิชัย', 'Phichai', '53120'),
(891, 74, 'ฟากท่า', 'Fak  Tha', '53160'),
(892, 74, 'ลับแล', 'Laplae', '53130'),
(893, 75, 'ลืออำนาจ', 'Lu  Amnat', '37000'),
(894, 75, 'เมืองอำนาจเจริญ', 'Muang', '37000'),
(895, 75, 'ชานุมาน', 'Chanuman', '37210'),
(896, 75, 'ปทุมราชวงศา', 'Pathum  Rachawongsa', '37110'),
(897, 75, 'พนา', 'Phana', '37180'),
(898, 75, 'เสนางคนิคม', 'Senangkanikhom', '37290'),
(899, 75, 'หัวตะพาน', 'Hua  Taphan', '37240'),
(900, 76, 'เมืองสมุทรปราการ', 'Muang', '10270'),
(901, 76, 'บางบ่อ', 'Bang  Bo', '10560'),
(902, 76, 'บางพลี', 'Bang  Phli', '10540'),
(903, 76, 'พระประแดง', 'Phra  Pradaeng', '10130'),
(904, 76, 'พระสมุทรเจดีย์', 'Phra  Samutjede', '10290'),
(905, 76, 'บางเสาธง', 'Bang  Sao  Thong', '10540'),
(906, 77, 'เซกา', 'Seka', '43150'),
(907, 77, 'โซ่พิสัย', 'So  Phisai', '43170'),
(908, 77, 'เมืองบึงกาฬ', 'Muang Bung  Kan', '43140'),
(909, 77, 'ปากคาด', 'Pak  Khat', '43190'),
(910, 77, 'พรเจริญ', 'Phon  Charoen', '43180'),
(911, 77, 'ศรีวิไล', 'Srivilai', '43210'),
(912, 77, 'บุ่งคล้า', 'Bung  Khla', '43140'),
(913, 77, 'บึงโขงหลง', 'Bueng Khong Long', '43220');

-- --------------------------------------------------------

--
-- Table structure for table `donate_vias`
--

CREATE TABLE `donate_vias` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `alias` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `donate_vias`
--

INSERT INTO `donate_vias` (`id`, `name`, `alias`) VALUES
(1, 'โอนเงินผ่านบัญชีธนาคาร', NULL),
(2, 'paypal', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `id` int(11) UNSIGNED NOT NULL,
  `model` varchar(255) NOT NULL,
  `model_id` int(11) UNSIGNED NOT NULL,
  `code` varchar(32) NOT NULL,
  `unidentified` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `guest_name` varchar(255) DEFAULT NULL,
  `acc_no` varchar(128) DEFAULT NULL,
  `amount` decimal(15,2) NOT NULL,
  `transfer_date` datetime NOT NULL,
  `get_reward` tinyint(1) NOT NULL DEFAULT '0',
  `reward` text,
  `shipping_address` text,
  `donate_via_id` int(11) UNSIGNED NOT NULL,
  `verified` tinyint(1) DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`id`, `model`, `model_id`, `code`, `unidentified`, `user_id`, `guest_name`, `acc_no`, `amount`, `transfer_date`, `get_reward`, `reward`, `shipping_address`, `donate_via_id`, `verified`, `created_at`, `updated_at`) VALUES
(1, 'Charity', 2, '201718-E9C546FF', 0, 1, NULL, NULL, '1000.00', '2017-07-04 00:00:00', 0, NULL, NULL, 0, 1, '2017-07-18 13:05:46', '2017-07-18 13:37:26'),
(2, 'Charity', 2, '201721-0967C350', 0, NULL, 'xxx', NULL, '600.00', '2017-07-05 04:00:00', 0, NULL, NULL, 0, 0, '2017-07-21 15:58:01', '2017-07-21 15:58:01'),
(3, 'Charity', 4, '201723-3EA5C61F', 0, NULL, 'aaa', NULL, '100.00', '2017-07-26 00:00:00', 0, NULL, NULL, 0, 0, '2017-07-23 09:49:16', '2017-07-23 09:49:16'),
(4, 'Charity', 2, '201723-658A1D0E', 0, NULL, 'xxx', NULL, '1111.00', '2017-07-25 00:00:00', 0, NULL, NULL, 0, 0, '2017-07-23 23:42:17', '2017-07-23 23:42:17'),
(5, 'Charity', 2, '201724-60435CB8', 0, NULL, 'xxx', NULL, '1000.00', '2017-07-27 17:00:00', 0, NULL, NULL, 0, 0, '2017-07-24 10:18:16', '2017-07-24 10:18:16'),
(6, 'Charity', 2, '201724-D5979E20', 0, NULL, 'xxx', NULL, '1000.00', '2017-07-10 03:00:00', 0, NULL, NULL, 0, 0, '2017-07-24 11:50:02', '2017-07-24 11:50:02'),
(7, 'Charity', 3, '201724-6D625357', 0, 2, NULL, NULL, '1000.00', '2017-07-06 00:00:00', 0, NULL, NULL, 0, 0, '2017-07-24 11:55:27', '2017-07-24 11:55:27'),
(8, 'Charity', 2, '201724-ECBE3FBB', 0, 2, NULL, NULL, '1111.00', '2017-07-03 00:00:00', 0, NULL, NULL, 0, 0, '2017-07-24 12:07:39', '2017-07-24 12:07:39'),
(9, 'Charity', 2, '201724-90CE1366', 0, 3, NULL, NULL, '2000.00', '2017-07-03 00:00:00', 0, NULL, NULL, 0, 0, '2017-07-24 13:15:03', '2017-07-24 13:15:03'),
(10, 'Charity', 2, '201729-D6AF94A5', 0, 3, NULL, NULL, '1000.00', '2017-07-06 00:00:00', 0, NULL, NULL, 0, 0, '2017-07-29 14:24:20', '2017-07-29 14:24:20'),
(11, 'Charity', 4, '201702-D16E62D9', 0, 3, NULL, NULL, '2200.00', '2017-08-22 17:00:00', 0, NULL, NULL, 1, 1, '2017-08-02 17:22:28', '2017-08-02 17:38:20');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) UNSIGNED NOT NULL,
  `charity_id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `short_desc` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `charity_id`, `title`, `short_desc`, `description`, `thumbnail`, `created_at`, `updated_at`) VALUES
(1, 2, 'new news', NULL, '<p>sdfsdfs</p>', 'http://sundaysquare.com/safe_image/14993228903503831079596525114985.jpg', '2017-07-10 16:13:50', '2017-07-10 16:23:55'),
(2, 2, 'จะนำมาใช้ได้จากที่ไหน?', 'มีท่อนต่างๆ ของ Lorem Ipsum ให้หยิบมาใช้งานได้มากมาย แต่ส่วนใหญ่แล้วจะถูกนำไปปรับให้เป็นรูปแบบอื่นๆ', '<p><span style="font-family: ''Open Sans'', Arial, sans-serif; text-align: justify;">มีท่อนต่างๆ ของ Lorem Ipsum ให้หยิบมาใช้งานได้มากมาย แต่ส่วนใหญ่แล้วจะถูกนำไปปรับให้เป็นรูปแบบอื่นๆ อาจจะด้วยการสอดแทรกมุกตลก หรือด้วยคำที่มั่วขึ้นมาซึ่งถึงอย่างไรก็ไม่มีทางเป็นเรื่องจริงได้เลยแม้แต่น้อย ถ้าคุณกำลังคิดจะใช้ Lorem Ipsum สักท่อนหนึ่ง คุณจำเป็นจะต้องตรวจให้แน่ใจว่าไม่มีอะไรน่าอับอายซ่อนอยู่ภายในท่อนนั้นๆ ตัวสร้าง Lorem Ipsum บนอินเทอร์เน็ตทุกตัวมักจะเอาท่อนที่แน่ใจแล้วมาใช้ซ้ำๆ ทำให้กลายเป็นที่มาของตัวสร้างที่แท้จริงบนอินเทอร์เน็ต ในการสร้าง Lorem Ipsum ที่ดูเข้าท่า ต้องใช้คำจากพจนานุกรมภาษาละตินถึงกว่า 200 คำ ผสมกับรูปแบบโครงสร้างประโยคอีกจำนวนหนึ่ง เพราะฉะนั้น Lorem Ipsum ที่ถูกสร้างขึ้นใหม่นี้ก็จะไม่ซ้ำไปซ้ำมา ไม่มีมุกตลกซุกแฝงไว้ภายใน หรือไม่มีคำใดๆ ที่ไม่บ่งบอกความหมาย</span></p>', 'http://cr.local/get_image/150008808286703663179186221196998.jpg', '2017-07-15 14:08:35', '2017-07-15 14:09:29');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) UNSIGNED NOT NULL,
  `charity_id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `short_desc` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `current_amount` decimal(15,0) DEFAULT '0',
  `target_amount` decimal(15,0) NOT NULL,
  `end_date` datetime NOT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `vdo_url` varchar(255) DEFAULT NULL,
  `images` text,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `charity_id`, `name`, `short_desc`, `description`, `current_amount`, `target_amount`, `end_date`, `thumbnail`, `vdo_url`, `images`, `created_at`, `updated_at`) VALUES
(1, 2, 'สร้างบ้านให้หมา แมว', 'องเท้าวิ่งผู้ชาย Nike Air Zoom Pegasus 34 ใหม่ล่าสุด โดดเด่นด้วยผ้า Flymesh ปรับใหม่เพื่อการระบายอากาศเหนือชั้นและการลดแรงกระแทกเบาตอบสนองได้ดี ช่วยให้คุณรู้สึกสบายตลอดทุกระยะทาง', '<div class="pi-tier3" style="margin: 0px; padding: 0px; color: #666666; font-family: Helvetica, ArialMT, sans-serif; font-size: 12px;">\r\n<div class="pi-pdpmainbody" style="margin: 0px; padding: 0px;">\r\n<p style="margin: 0px; padding: 0px;"><span class="nsg-font-family--platform" style="font-family: OneNikeCurrency, ''TradeGothicW01-BoldCn20 675334'', ''Helvetica Neue W31'', Helvetica, ''Arial Bold'', Arial, Tahoma, Thonburi, Ayuthaya, sans-serif; font-size: 40px; text-transform: uppercase; letter-spacing: -1px; color: #333333; padding-top: 0px; padding-bottom: 12px; display: inline-block; line-height: 1.1; margin-bottom: 4px;">ประสิทธิภาพเหนือแรงโน้มถ่วง</span></p>\r\n<p style="margin: 0px; padding: 0px;">รองเท้าบาสเก็ตบอลผู้ชาย Air Jordan XXXI Low ตอบสนองระดับสูงสุด และลดแรงกระแทกมากขึ้น เพื่อช่วยให้ว่องไว และสบายในระหว่างเกมแข่งขันอันตึงเครียด</p>\r\n<p style="margin: 0px; padding: 0px;"><span class="nsg-font-family--platform" style="font-family: OneNikeCurrency, ''TradeGothicW01-BoldCn20 675334'', ''Helvetica Neue W31'', Helvetica, ''Arial Bold'', Arial, Tahoma, Thonburi, Ayuthaya, sans-serif; font-size: 20px; text-transform: uppercase; letter-spacing: -1px; color: #333333; padding-top: 22px; padding-bottom: 12px; display: inline-block;">การระเบิดพลังที่ตอบสนองได้ดี</span></p>\r\n<p style="margin: 0px; padding: 0px;">เทคโนโลยี FlightSpeed กระจายการรัดกล้ามเนื้ออย่างสม่ำเสมอทั่วทั้งเท้าที่ส่วนบน ใช้ Nike Zoom Air เต็มฝ่าเท้า และยังให้การตอบสนองที่ดีดตัวกลับได้ดีระดับสูงสุดเพื่อระเบิดพลังก้าวของคุณได้มากขึ้น</p>\r\n<p style="margin: 0px; padding: 0px;"><span class="nsg-font-family--platform" style="font-family: OneNikeCurrency, ''TradeGothicW01-BoldCn20 675334'', ''Helvetica Neue W31'', Helvetica, ''Arial Bold'', Arial, Tahoma, Thonburi, Ayuthaya, sans-serif; font-size: 20px; text-transform: uppercase; letter-spacing: -1px; color: #333333; padding-top: 22px; padding-bottom: 12px; display: inline-block;">การรองรับยืดหยุ่น</span></p>\r\n<p style="margin: 0px; padding: 0px;">หนังสังเคราะห์ที่ส้น และ Flyweave ยืดหยุ่นที่ปลายเท้า ผสานกันแบบไร้รอยต่อ เท้าจึงเคลื่อนไหวได้อย่างเป็นธรรมชาติ พร้อมทั้งยังคงการรองรับระหว่างการเปลี่ยนทิศทางอย่างรวดเร็วและการถ่ายเทน้ำหนัก</p>\r\n<p style="margin: 0px; padding: 0px;"><span class="nsg-font-family--platform" style="font-family: OneNikeCurrency, ''TradeGothicW01-BoldCn20 675334'', ''Helvetica Neue W31'', Helvetica, ''Arial Bold'', Arial, Tahoma, Thonburi, Ayuthaya, sans-serif; font-size: 20px; text-transform: uppercase; letter-spacing: -1px; color: #333333; padding-top: 22px; padding-bottom: 12px; display: inline-block;">ความสบายเหนือระดับ</span></p>\r\n<p style="margin: 0px; padding: 0px;">ชั้นบุด้านในโอบรับเท้าของคุณเพื่อความพอดีแบบเฉพาะตัว</p>\r\n<p style="margin: 0px; padding: 0px;"><span class="nsg-font-family--platform" style="font-family: OneNikeCurrency, ''TradeGothicW01-BoldCn20 675334'', ''Helvetica Neue W31'', Helvetica, ''Arial Bold'', Arial, Tahoma, Thonburi, Ayuthaya, sans-serif; font-size: 20px; text-transform: uppercase; letter-spacing: -1px; color: #333333; padding-top: 22px; padding-bottom: 12px; display: inline-block;">รายละเอียดเพิ่มเติม</span></p>\r\n<ul>\r\n<li style="margin: 0px; padding: 0px; list-style: disc inside;">เส้นใย Flywire โอบรับส่วนกลางเท้าเพื่อให้ล็อคกระชับพอดี</li>\r\n<li style="margin: 0px; padding: 0px; list-style: disc inside;">พื้นรองเท้าด้านนอกผลิตจากยางทึบและทนทาน</li>\r\n<li style="margin: 0px; padding: 0px; list-style: disc inside;">องค์ประกอบงานดีไซน์ทำให้หวนคิดถึง Jordan รุ่นออริจินัล</li>\r\n</ul>\r\n</div>\r\n</div>\r\n<div class="exp-pdp-country-of-origin" style="margin: 14px 0px 0px; padding: 0px; color: #666666; font-family: Helvetica, ArialMT, sans-serif; font-size: 12px;">ประเทศที่ผลิต: เวียดนาม</div>', '0', '50000', '2017-07-21 23:59:59', 'http://www.cr.com/get_image/1500644646340779741748326243381.jpg', 'https://www.youtube.com/watch?v=rphE_jdX35k', '[]', '2017-07-10 08:02:01', '2017-07-21 20:44:50'),
(2, 2, 'Persephone - One-volume comic adaptation', 'Sensual and inspired comic retelling of the classic Greek romance of Hades and Persephone.', '<p style="margin: 0px 0px 20px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; line-height: inherit; font-family: ''Maison Neue Book'', ''Helvetica Neue'', Helvetica, Arial, ''Liberation Sans'', FreeSans, sans-serif; font-size: 1.6rem; vertical-align: baseline; color: #353535;">In his ancient hymns, Homer tells us of the unyielding Lord of the Dead who kidnapped the innocent daughter of Demeter. He tells us quite a bit, in fact, for someone who wasn&rsquo;t there.</p>\r\n<p style="margin: 0px 0px 20px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; line-height: inherit; font-family: ''Maison Neue Book'', ''Helvetica Neue'', Helvetica, Arial, ''Liberation Sans'', FreeSans, sans-serif; font-size: 1.6rem; vertical-align: baseline; color: #353535;">Persephone is no tragic victim, but a kind young woman held in place by her overbearing mother. A failed scheme by Apollo leads her to a chance encounter with the humorless Hades, who is struck by love&rsquo;s arrow. Now he must wrestle with his aching heart before he loses control entirely.</p>\r\n<p style="margin: 0px 0px 20px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; line-height: inherit; font-family: ''Maison Neue Book'', ''Helvetica Neue'', Helvetica, Arial, ''Liberation Sans'', FreeSans, sans-serif; font-size: 1.6rem; vertical-align: baseline; color: #353535;">...Not that the infatuated Persephone has any complaints regarding Hades'' plight. &nbsp;</p>\r\n<p style="margin: 0px 0px 20px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; line-height: inherit; font-family: ''Maison Neue Book'', ''Helvetica Neue'', Helvetica, Arial, ''Liberation Sans'', FreeSans, sans-serif; font-size: 1.6rem; vertical-align: baseline; color: #353535;">As desire blooms between the secluded goddess of the harvest and the ruler of the underworld, the world changes both above and below.</p>', '0', '25000', '2017-07-31 23:59:59', 'http://www.cr.com/get_image/1500692673243710637696948399449.png', NULL, '[]', '2017-07-22 10:04:51', '2017-07-22 10:04:51');

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `region` varchar(2) DEFAULT NULL,
  `top` tinyint(1) NOT NULL DEFAULT '9'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `name`, `region`, `top`) VALUES
(1, 'กระบี่', 's', 9),
(2, 'กรุงเทพมหานคร', 'c', 1),
(3, 'กาญจนบุรี', 'w', 9),
(4, 'กาฬสินธุ์', 'ne', 9),
(5, 'กำแพงเพชร', 'c', 9),
(6, 'ขอนแก่น', 'ne', 9),
(7, 'จันทบุรี', 'e', 9),
(8, 'ฉะเชิงเทรา', 'e', 9),
(9, 'ชลบุรี', 'e', 9),
(10, 'ชัยนาท', 'c', 9),
(11, 'ชัยภูมิ', 'ne', 9),
(12, 'ชุมพร', 's', 9),
(13, 'เชียงราย', 'n', 9),
(14, 'เชียงใหม่', 'n', 9),
(15, 'ตรัง', 's', 9),
(16, 'ตราด', 'e', 9),
(17, 'ตาก', 'w', 9),
(18, 'นครนายก', 'c', 9),
(19, 'นครปฐม', 'c', 9),
(20, 'นครพนม', 'ne', 9),
(21, 'นครราชสีมา', 'ne', 9),
(22, 'นครศรีธรรมราช', 's', 9),
(23, 'นครสวรรค์', 'c', 9),
(24, 'นนทบุรี', 'c', 9),
(25, 'นราธิวาส', 's', 9),
(26, 'น่าน', 'n', 9),
(27, 'บึงกาฬ', 'ne', 9),
(28, 'บุรีรัมย์', 'ne', 9),
(29, 'ปทุมธานี', 'c', 9),
(30, 'ประจวบคีรีขันธ์', 'w', 9),
(31, 'ปราจีนบุรี', 'e', 9),
(32, 'ปัตตานี', 's', 9),
(33, 'พระนครศรีอยุธยา', 'c', 9),
(34, 'พะเยา', 'n', 9),
(35, 'พังงา', 's', 9),
(36, 'พัทลุง', 's', 9),
(37, 'พิจิตร', 'c', 9),
(38, 'พิษณุโลก', 'c', 9),
(39, 'เพชรบุรี', 'w', 9),
(40, 'เพชรบูรณ์', 'c', 9),
(41, 'แพร่', 'n', 9),
(42, 'ภูเก็ต', 's', 9),
(43, 'มหาสารคาม', 'ne', 9),
(44, 'มุกดาหาร', 'ne', 9),
(45, 'แม่ฮ่องสอน', 'n', 9),
(46, 'ยโสธร', 'ne', 9),
(47, 'ยะลา', 's', 9),
(48, 'ร้อยเอ็ด', 'ne', 9),
(49, 'ระนอง', 's', 9),
(50, 'ระยอง', 'e', 9),
(51, 'ราชบุรี', 'w', 9),
(52, 'ลพบุรี', 'c', 9),
(53, 'ลำปาง', 'n', 9),
(54, 'ลำพูน', 'n', 9),
(55, 'เลย', 'ne', 9),
(56, 'ศรีสะเกษ', 'ne', 9),
(57, 'สกลนคร', 'ne', 9),
(58, 'สงขลา', 's', 9),
(59, 'สตูล', 's', 9),
(60, 'สมุทรปราการ', 'c', 9),
(61, 'สมุทรสงคราม', 'c', 9),
(62, 'สมุทรสาคร', 'c', 9),
(63, 'สระแก้ว', 'e', 9),
(64, 'สระบุรี', 'c', 9),
(65, 'สิงห์บุรี', 'c', 9),
(66, 'สุโขทัย', 'c', 9),
(67, 'สุพรรณบุรี', 'c', 9),
(68, 'สุราษฎร์ธานี', 's', 9),
(69, 'สุรินทร์', 'ne', 9),
(70, 'หนองคาย', 'ne', 9),
(71, 'หนองบัวลำภู', 'ne', 9),
(72, 'อ่างทอง', 'c', 9),
(73, 'อำนาจเจริญ', 'ne', 9),
(74, 'อุดรธานี', 'ne', 9),
(75, 'อุตรดิตถ์', 'n', 9),
(76, 'อุทัยธานี', 'c', 9),
(77, 'อุบลราชธานี', 'ne', 9);

-- --------------------------------------------------------

--
-- Table structure for table `social_providers`
--

CREATE TABLE `social_providers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `alias` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `social_providers`
--

INSERT INTO `social_providers` (`id`, `name`, `alias`) VALUES
(1, 'facebook', 'fb'),
(2, 'twitter', '');

-- --------------------------------------------------------

--
-- Table structure for table `stock_images`
--

CREATE TABLE `stock_images` (
  `id` int(11) UNSIGNED NOT NULL,
  `filename` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stock_images`
--

INSERT INTO `stock_images` (`id`, `filename`, `created_at`, `updated_at`) VALUES
(1, '1499668107900801580066789216278.png', '2017-07-10 06:28:40', '2017-07-10 06:28:40'),
(2, '149966811140360576880568894455.png', '2017-07-10 06:28:40', '2017-07-10 06:28:40'),
(3, '149966811580313407350182983851.png', '2017-07-10 06:28:40', '2017-07-10 06:28:40'),
(4, '149966811900829830725431002808.png', '2017-07-10 06:28:40', '2017-07-10 06:28:40'),
(5, '1500012897808897208373420816278.png', '2017-07-14 06:14:59', '2017-07-14 06:14:59'),
(6, '15000129296087674556165354143181.jpg', '2017-07-14 06:15:58', '2017-07-14 06:15:58'),
(7, '1500012938990680376654253239362.png', '2017-07-14 06:15:58', '2017-07-14 06:15:58'),
(8, '1500012942250854466365473846214.png', '2017-07-14 06:15:58', '2017-07-14 06:15:58'),
(9, '1500012947478379745540005320697.png', '2017-07-14 06:15:58', '2017-07-14 06:15:58'),
(10, '1500012957642235315398249620180.png', '2017-07-14 06:15:58', '2017-07-14 06:15:58'),
(11, '15000131262921095852874431737505.jpg', '2017-07-14 06:18:47', '2017-07-14 06:18:47'),
(12, '15000880658250522215136290995745.jpg', '2017-07-15 10:08:34', '2017-07-15 10:08:34'),
(13, '150008807337661997238569991186213.jpg', '2017-07-15 10:08:34', '2017-07-15 10:08:34'),
(14, '150008807761490074201500091436825.jpg', '2017-07-15 10:08:34', '2017-07-15 10:08:34'),
(15, '150008808286703663179186221196998.jpg', '2017-07-15 10:08:34', '2017-07-15 10:08:34'),
(16, '150008808980670764734587571376682.jpg', '2017-07-15 10:08:35', '2017-07-15 10:08:35'),
(17, '150008809764120378294622941140301.jpg', '2017-07-15 10:08:35', '2017-07-15 10:08:35'),
(18, '150008810137243393650402331094555.jpg', '2017-07-15 10:08:35', '2017-07-15 10:08:35'),
(19, '15000881099083081180391795969586.jpg', '2017-07-15 10:08:35', '2017-07-15 10:08:35'),
(20, '1500088113231008519612576879506.jpg', '2017-07-15 10:08:35', '2017-07-15 10:08:35'),
(21, '150063111142251719195425042258.jpg', '2017-07-21 16:58:32', '2017-07-21 16:58:32'),
(22, '150063450071653987242306953716.jpg', '2017-07-21 17:55:01', '2017-07-21 17:55:01'),
(23, '1500634727188287412538749203888.jpg', '2017-07-21 17:58:50', '2017-07-21 17:58:50'),
(24, '1500634915213720200346050133585.jpg', '2017-07-21 18:01:59', '2017-07-21 18:01:59'),
(25, '1500644646340779741748326243381.jpg', '2017-07-21 20:44:07', '2017-07-21 20:44:07'),
(26, '1500692673243710637696948399449.png', '2017-07-22 10:04:34', '2017-07-22 10:04:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `social_provider_id` int(11) DEFAULT NULL,
  `social_user_id` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `shipping_address` text,
  `remember_token` varchar(100) DEFAULT NULL,
  `email_verified` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `social_provider_id`, `social_user_id`, `email`, `password`, `name`, `avatar`, `shipping_address`, `remember_token`, `email_verified`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, '1', '$2y$10$6jLCCDdQojI7ppn0LpeUPunvNsu8B7JeMFknKMMXCbIes9YEyW7gm', 'zzz', NULL, NULL, 'B4dTA2PTEoOg8Y52y2vw6FtDns4Y4gJnbwR9Sj5dOpvmsKoPG1vIg4V8UTBA', 0, '2017-07-13 08:25:55', '2017-07-20 11:23:15'),
(2, 1, '114320059216837', 'sundaysquare.contact@gmail.com', '$2y$10$y3x6hZM/sVBwt/HlinhyzeLJCimxa9UeOZKxaf873UijF4hF.pDau', 'Ittipol Kaewprasert', NULL, NULL, 'FdsAmYllC37CQXxNtILKik8vs6Qc18s2Kp63HMUsFU1lMAr2nzq2prmXMvAf', 0, '2017-07-24 11:50:34', '2017-07-24 13:13:00'),
(3, 1, '1345823938847781', 'ittipol_master@hotmail.com', '$2y$10$URwutbQcIwoplATS6UFARerEAvEyYixszv2JmS5ZSa93dsHFZHj.S', 'test', '1501583311050447192539910399449.png', NULL, 'p4lOrKe0POsXSIxnj7KEIKMo9IKsP2xnwtCvjXyFIfIRpd7gCIf4bm2FJbRF', 0, '2017-07-24 11:53:35', '2017-08-01 17:31:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `charities`
--
ALTER TABLE `charities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `charity_types`
--
ALTER TABLE `charity_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donate_vias`
--
ALTER TABLE `donate_vias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_providers`
--
ALTER TABLE `social_providers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_images`
--
ALTER TABLE `stock_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `charities`
--
ALTER TABLE `charities`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `charity_types`
--
ALTER TABLE `charity_types`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=914;
--
-- AUTO_INCREMENT for table `donate_vias`
--
ALTER TABLE `donate_vias`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
--
-- AUTO_INCREMENT for table `social_providers`
--
ALTER TABLE `social_providers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `stock_images`
--
ALTER TABLE `stock_images`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
