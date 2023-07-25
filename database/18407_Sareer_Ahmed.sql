/*
SQLyog Ultimate v12.5.0 (64 bit)
MySQL - 10.4.27-MariaDB : Database - 18407_sareer_ahmed
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`18407_sareer_ahmed` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `18407_sareer_ahmed`;

/*Table structure for table `blog` */

DROP TABLE IF EXISTS `blog`;

CREATE TABLE `blog` (
  `blog_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `blog_title` varchar(200) DEFAULT NULL,
  `post_per_page` int(11) DEFAULT NULL,
  `blog_background_image` text DEFAULT NULL,
  `blog_status` enum('Active','InActive') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`blog_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `blog_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `blog` */

insert  into `blog`(`blog_id`,`user_id`,`blog_title`,`post_per_page`,`blog_background_image`,`blog_status`,`created_at`,`updated_at`) values 
(1,1,'Bachelor',6,'images/1684667741_1684125257_post2.png','Active','2023-05-24 02:41:19','2023-05-22 01:35:34'),
(2,1,'Master',3,'images/1684125257_post2.png','Active','2023-05-21 02:02:58','2023-05-21 02:02:58'),
(3,1,'Phd',3,'images/1684125257_post2.png','Active','2023-05-21 02:02:59','2023-05-21 02:02:59'),
(4,1,'Exchange Programs',6,'images/1684516348_politecno 356x220.png','Active','2023-05-21 02:03:00','2023-05-21 02:03:00'),
(5,1,'Interships',3,'images/1684134511_1684131228_boy.jpg','Active','2023-05-21 02:03:02','2023-05-21 02:03:02'),
(9,1,'Online Courses',3,'images/1684519828_1684126809_kaist.png','Active','2023-05-21 02:03:04','2023-05-21 02:03:04');

/*Table structure for table `category` */

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_title` varchar(100) DEFAULT NULL,
  `category_description` text DEFAULT NULL,
  `category_status` enum('Active','InActive') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `category` */

insert  into `category`(`category_id`,`category_title`,`category_description`,`category_status`,`created_at`,`updated_at`) values 
(1,'Pakistan','About Master Scholarships only','InActive','2023-05-24 02:36:47','2023-05-21 20:31:43'),
(2,'USA','USA Scolarships','Active','2023-05-24 02:36:53','2023-12-12 11:01:38'),
(7,'Saudi Arabia','Saudi Arabia Scholarships','Active','2023-05-15 09:35:18','2023-05-15 09:35:18'),
(8,'Australia','Australia Scholarships','Active','2023-05-24 02:36:56','2023-05-15 09:37:38'),
(9,'UK','UK Scholarships','Active','2023-05-24 02:36:59','2023-05-15 09:44:18'),
(10,'Switzerland','Switzerland Scholarships','Active','2023-05-24 02:37:03','2023-05-15 09:51:21'),
(11,'South Korea','South Korea','Active','2023-05-15 09:59:07','2023-05-15 09:59:07'),
(12,'Germany','Germany','Active','2023-05-15 10:03:32','2023-05-15 10:03:32'),
(13,'Turkey','Turkey','Active','2023-05-15 10:05:49','2023-05-15 10:05:49'),
(14,'Italy','Italy Scholarship ','Active','2023-05-24 02:37:10','2023-05-15 10:40:37'),
(15,'Germany','Germany','Active','2023-05-15 10:43:33','2023-05-15 10:43:33'),
(16,'Japan','Japan','Active','2023-05-16 10:46:24','2023-05-16 10:46:24');

/*Table structure for table `following_blog` */

DROP TABLE IF EXISTS `following_blog`;

CREATE TABLE `following_blog` (
  `follow_id` int(11) NOT NULL AUTO_INCREMENT,
  `follower_id` int(11) DEFAULT NULL,
  `blog_following_id` int(11) DEFAULT NULL,
  `status` enum('Followed','Unfollowed') DEFAULT 'Followed',
  `created_at` varchar(200) DEFAULT NULL,
  `updated_at` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`follow_id`),
  KEY `blog_following_id` (`blog_following_id`),
  KEY `follower_id` (`follower_id`),
  CONSTRAINT `following_blog_ibfk_1` FOREIGN KEY (`blog_following_id`) REFERENCES `blog` (`blog_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `following_blog_ibfk_2` FOREIGN KEY (`follower_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `following_blog` */

insert  into `following_blog`(`follow_id`,`follower_id`,`blog_following_id`,`status`,`created_at`,`updated_at`) values 
(27,1,1,'Followed','2023-05-16 16:16:03','2023-05-21 02:47:50'),
(28,1,3,'Unfollowed','2023-05-16 16:24:25','2023-05-16 16:24:27'),
(29,1,4,'Followed','2023-05-16 16:24:31','2023-05-21 17:06:10'),
(33,1,5,'Unfollowed','2023-05-21 18:33:32','2023-05-21 18:33:35');

/*Table structure for table `post` */

DROP TABLE IF EXISTS `post`;

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `blog_id` int(11) DEFAULT NULL,
  `post_title` varchar(200) NOT NULL,
  `post_summary` text NOT NULL,
  `post_description` longtext NOT NULL,
  `featured_image` text DEFAULT NULL,
  `post_status` enum('Active','InActive') DEFAULT NULL,
  `is_comment_allowed` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`post_id`),
  KEY `blog_id` (`blog_id`),
  CONSTRAINT `post_ibfk_1` FOREIGN KEY (`blog_id`) REFERENCES `blog` (`blog_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `post` */

insert  into `post`(`post_id`,`blog_id`,`post_title`,`post_summary`,`post_description`,`featured_image`,`post_status`,`is_comment_allowed`,`created_at`,`updated_at`) values 
(13,5,'UNESCO World Heritage Forum 2023 in Saudi Arabia (Fully Funded)','UNESCO World Heritage Forum 2023 in Saudi Arabia (Fully Funded)','&lt;p&gt;The &lt;strong&gt;UNESCO&lt;/strong&gt; World Heritage Forum 2023 in &lt;strong&gt;Saudi Arabia&lt;/strong&gt; is a &lt;strong&gt;fully funded 10-day&lt;/strong&gt; forum that will take place in &lt;strong&gt;Riyadh&lt;/strong&gt; and the Al-Ahsa Oasis. The Forum will invite young applicants from &lt;strong&gt;September 3 to 12, 2023&lt;/strong&gt;. The Kingdom of Saudi Arabia hosts the Forum with the Heritage Committee and UNESCO. &lt;strong&gt;IELTS/TOEFL is not required&lt;/strong&gt;. All Expenses will be covered.&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;The theme of the forum is &lt;strong&gt;&amp;ldquo;Looking Ahead: The Next 50 Years of Protecting Natural and Cultural Heritage.&amp;rdquo;&lt;/strong&gt; The Forum is &lt;strong&gt;open to anyone from any part of the world&lt;/strong&gt;. Young applicants will learn from the experts in the related fields. UNESCO Forum attracts motivated, energetic, and committed individuals who are eager to implement the results of the Forum in their respective countries. More details are given below.&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;h2&gt;&lt;strong&gt;etails About UNESCO World Heritage Forum 2023 in Saudi Arabia&lt;/strong&gt;&lt;/h2&gt;\r\n&lt;div id=&quot;ez-toc-container&quot; class=&quot;ez-toc-v2_0_49 counter-hierarchy ez-toc-counter ez-toc-light-blue ez-toc-container-direction&quot;&gt;\r\n&lt;div class=&quot;ez-toc-title-container&quot;&gt;\r\n&lt;p class=&quot;ez-toc-title&quot;&gt;Table of Contents&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div id=&quot;ez-toc-container&quot; class=&quot;ez-toc-v2_0_49 counter-hierarchy ez-toc-counter ez-toc-light-blue ez-toc-container-direction&quot;&gt;&lt;/div&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;&lt;strong&gt;Host Country: &lt;/strong&gt;Saudi Arabia&lt;/li&gt;\r\n&lt;li&gt;&lt;strong&gt;No of Days: &lt;/strong&gt;10&lt;/li&gt;\r\n&lt;li&gt;&lt;strong&gt;No of Participants&lt;/strong&gt;: 30&lt;/li&gt;\r\n&lt;li&gt;&lt;strong&gt;Forum Dates: &lt;/strong&gt;September 03, 2023, to September 12, 2023&lt;/li&gt;\r\n&lt;li&gt;&lt;strong&gt;Deadline: &lt;span style=&quot;color: #ff0000;&quot;&gt;6th June 2023&lt;/span&gt;&lt;/strong&gt;\r\n&lt;h3&gt;&lt;strong&gt;Financial Benefits of the UNESCO World Heritage Young Professionals Forum 2023&lt;/strong&gt;&lt;/h3&gt;\r\n&lt;p&gt;If you are the lucky one to be selected for the forum from around the world. You will be provided with:&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;Assistance with Traveling.&lt;/li&gt;\r\n&lt;li&gt;Support in Arranging a visa.&lt;/li&gt;\r\n&lt;li&gt;Economy flight Airfare.&lt;/li&gt;\r\n&lt;li&gt;Meals.&lt;/li&gt;\r\n&lt;li&gt;Accommodation facility.&lt;/li&gt;\r\n&lt;li&gt;Exposure to meet heritage experts.&lt;/li&gt;\r\n&lt;li&gt;Trips during the forum.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;h3&gt;&lt;span id=&quot;Who_can_Apply_for_the_UNESCO_World_Heritage_Forum_2023&quot; class=&quot;ez-toc-section&quot;&gt;&lt;/span&gt;&lt;strong&gt;Who can Apply for the UNESCO World Heritage Forum 2023?&lt;/strong&gt;&lt;/h3&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;Young people, educators, and heritage experts from different parts of the world discover new roles for themselves in heritage conservation.&lt;/li&gt;\r\n&lt;li&gt;Applicants who are studying or&amp;nbsp;working in the field of heritage conservation:\r\n&lt;ul&gt;\r\n&lt;li&gt;Heritage&lt;/li&gt;\r\n&lt;li&gt;Archaeology&lt;/li&gt;\r\n&lt;li&gt;Architecture&lt;/li&gt;\r\n&lt;li&gt;Conservation&lt;/li&gt;\r\n&lt;li&gt;Cultural tourism&lt;/li&gt;\r\n&lt;li&gt;Digital technology&lt;/li&gt;\r\n&lt;li&gt;Environmental science&lt;/li&gt;\r\n&lt;li&gt;History&lt;/li&gt;\r\n&lt;li&gt;Law&lt;/li&gt;\r\n&lt;li&gt;Landscape architecture&lt;/li&gt;\r\n&lt;li&gt;Museum studies&lt;/li&gt;\r\n&lt;li&gt;Planning&lt;/li&gt;\r\n&lt;li&gt;Public policy&lt;/li&gt;\r\n&lt;li&gt;Restoration&lt;/li&gt;\r\n&lt;li&gt;Sustainable development&lt;/li&gt;\r\n&lt;li&gt;Urban planning&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;h3&gt;&lt;span id=&quot;Eligibility_Criteria&quot; class=&quot;ez-toc-section&quot;&gt;&lt;/span&gt;&lt;strong&gt;Eligibility Criteria&lt;/strong&gt;&lt;/h3&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;The UNESCO World Heritage Young Professional Forum is open to all students from all around the world.&lt;/li&gt;\r\n&lt;li&gt;Applicants should be aged between 23 and 32 years.&lt;/li&gt;\r\n&lt;li&gt;Should be a motivated student&lt;/li&gt;\r\n&lt;li&gt;Must be available to attend the full forum.&lt;/li&gt;\r\n&lt;li&gt;Fluent in English.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;/li&gt;\r\n&lt;/ul&gt;','images/1684881377_unisco.png','Active',0,'2023-05-24 03:36:17','2023-05-24 03:36:17'),
(14,1,'Study in Australian Universities Without IELTS (2023)','Study in Australian Universities Without IELTS (2023)','&lt;p&gt;Is there a way to &lt;strong&gt;Study in Australia Without IELTS&lt;/strong&gt;? Know here. International students can Study in &lt;strong&gt;Australian Universities&lt;/strong&gt; Without IELTS in 2023. We will find you a way so you can get admission into &lt;strong&gt;Top&lt;/strong&gt; Australian universities without IELTS. Australia is the &lt;strong&gt;3rd&lt;/strong&gt; most popular country for international students with a lot of opportunities and much to give.&lt;/p&gt;\r\n&lt;p&gt;World Top ranked Universities are located in Australia. And some of those are on the list of Australian Universities without IELTS. These Universities gives option other than IELTS as well. Not only study bachelor&amp;rsquo;s but also &lt;strong&gt;master&amp;rsquo;s in Australia without IELTS&lt;/strong&gt;. So, if you are an international student and looking to study in Australia, then read more below.&lt;/p&gt;\r\n&lt;h2&gt;&lt;strong&gt;List of Universities to Study in Australian Universities Without IELTS (2023)&lt;/strong&gt;&lt;/h2&gt;\r\n&lt;div id=&quot;ez-toc-container&quot; class=&quot;ez-toc-v2_0_49 counter-hierarchy ez-toc-counter ez-toc-light-blue ez-toc-container-direction&quot;&gt;\r\n&lt;div class=&quot;ez-toc-title-container&quot;&gt;\r\n&lt;p class=&quot;ez-toc-title&quot;&gt;Table of Contents&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div id=&quot;ez-toc-container&quot; class=&quot;ez-toc-v2_0_49 counter-hierarchy ez-toc-counter ez-toc-light-blue ez-toc-container-direction&quot;&gt;&lt;/div&gt;\r\n&lt;p&gt;The List of the Australian Universities Without IELTS in 2023:&lt;/p&gt;\r\n&lt;ol&gt;\r\n&lt;li&gt;University of Queensland&lt;/li&gt;\r\n&lt;li&gt;University of Adelaide&lt;/li&gt;\r\n&lt;li&gt;Victoria University&lt;/li&gt;\r\n&lt;li&gt;University of New South Wales&lt;/li&gt;\r\n&lt;li&gt;Macquarie University&lt;/li&gt;\r\n&lt;li&gt;Bond University&lt;/li&gt;\r\n&lt;li&gt;University of South Australia&lt;/li&gt;\r\n&lt;li&gt;Swinburne University of Technology&lt;/li&gt;\r\n&lt;li&gt;Australian National University&lt;/li&gt;\r\n&lt;/ol&gt;','images/1684881167_1684871452_1684125651_Australian.png','Active',1,'2023-05-24 03:32:47','2023-05-24 03:32:47'),
(15,9,'Harvard University CS50 Online Courses With Free Certificates (2023)','Harvard University CS50 Online Courses With Free Certificates (2023)','&lt;p&gt;Do you want to get &lt;strong&gt;Free Certificates&lt;/strong&gt; from Harvard University? Harvard University has Free Certificates. You can apply for the &lt;strong&gt;Harvard University &lt;span style=&quot;color: #ff0000;&quot;&gt;CS50&lt;/span&gt; Online Courses With Free Certificates&lt;/strong&gt;. The CS50 is a complete set of courses that comes with Computer Science, Artificial Intelligence, Python, Business, Gaming, and much more. All these come with Free certificates.&lt;/p&gt;\r\n&lt;p&gt;o get a &lt;strong&gt;CS50 Free certificate&lt;/strong&gt;, you will have to complete a course on edX. Edx is an American massive open online course provider &lt;strong&gt;created by Harvard and MIT&lt;/strong&gt;. The Harvard University CS50 Online course is open to anyone from any country. Anyone can get a Free CS50 Certificate upon the successful completion of the course. More details are given below.&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;&lt;strong&gt;Course by&lt;/strong&gt;: Harvard University&lt;/li&gt;\r\n&lt;li&gt;&lt;strong&gt;Taught by&lt;/strong&gt;: Harvard Instructors&lt;/li&gt;\r\n&lt;li&gt;&lt;strong&gt;Platform&lt;/strong&gt;: Edx&lt;/li&gt;\r\n&lt;li&gt;&lt;strong&gt;Free Certificates&lt;/strong&gt;: Yes&lt;/li&gt;\r\n&lt;li&gt;&lt;strong&gt;Deadline&lt;/strong&gt;: &lt;span style=&quot;color: #ff0000;&quot;&gt;&lt;strong&gt;31st December 2023&lt;/strong&gt;&lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;\r\n&lt;h3&gt;&lt;strong&gt;List of CS50 Free Courses with Free Certificates&lt;/strong&gt;&lt;/h3&gt;\r\n&lt;ul&gt;\r\n&lt;li data-id=&quot;cs50s-introduction-to-artificial-intelligence-with-python&quot;&gt;CS50&amp;rsquo;s Introduction to Artificial Intelligence with Python&lt;/li&gt;\r\n&lt;li data-id=&quot;cs50scomputer-science-for-business-professionals&quot;&gt;CS50&amp;rsquo;s&lt;br&gt;Computer Science for Business Professionals&lt;/li&gt;\r\n&lt;li data-id=&quot;cs50sintroduction-to-game-development&quot;&gt;CS50&amp;rsquo;s&lt;br&gt;Introduction to Game Development&lt;/li&gt;\r\n&lt;li data-id=&quot;cs50sintroduction-to-game-development&quot;&gt;CS50&amp;rsquo;s Computer Science for Lawyers&lt;/li&gt;\r\n&lt;li data-id=&quot;cs50sintroduction-to-game-development&quot;&gt;CS50&amp;rsquo;s Introduction to Programming with Python&lt;/li&gt;\r\n&lt;li data-id=&quot;cs50sintroduction-to-game-development&quot;&gt;CS50&amp;rsquo;s Introduction to Programming with Scratch&lt;/li&gt;\r\n&lt;li data-id=&quot;cs50sintroduction-to-game-development&quot;&gt;CS50&amp;rsquo;s Understanding Technology&lt;/li&gt;\r\n&lt;li data-id=&quot;cs50sintroduction-to-game-development&quot;&gt;CS50&amp;rsquo;s Web Programming with Python and JavaScript&lt;/li&gt;\r\n&lt;li data-id=&quot;cs50sintroduction-to-game-development&quot;&gt;This is CS50x CS50&amp;rsquo;s Introduction to Computer Science&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;h3&gt;&lt;span id=&quot;Deadline&quot; class=&quot;ez-toc-section&quot;&gt;&lt;/span&gt;&lt;strong&gt;Deadline&lt;/strong&gt;&lt;/h3&gt;\r\n&lt;p&gt;If you want to get a Free CS50 Certificate then you have to complete the course by 31st December 2023. The&amp;nbsp;final deadline is Monday, January 1, 2024, at 9:59 AM GMT+5.&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;/ul&gt;','images/1684881020_harvard online.png','Active',1,'2023-05-24 03:30:20','2023-05-24 03:30:20'),
(16,5,'CSIS Internships 2023 in USA | Apply Now','CSIS Internships 2023 in USA | Apply Now','&lt;p&gt;The applications are open to apply for the &lt;strong&gt;&lt;a href=&quot;https://opportunitiescorners.com/csis-internships/&quot;&gt;CSIS Internships&lt;/a&gt; 2023 in USA&lt;/strong&gt;. The CSIS stands for Center for Strategic and International Studies. It is an &lt;strong&gt;American&lt;/strong&gt;-based think tank organization that analyzes global issues and developed practical solutions to the world&amp;rsquo;s greatest challenges. &lt;strong&gt;Foreign&lt;/strong&gt; &lt;strong&gt;applicants&lt;/strong&gt; as well as &lt;strong&gt;US-based citizens&lt;/strong&gt; can apply for the CSIS &lt;strong&gt;paid&lt;/strong&gt; internship program.&lt;/p&gt;\r\n&lt;p&gt;he Internship is open to &lt;strong&gt;Undergraduate&lt;/strong&gt; students, &lt;strong&gt;graduate&lt;/strong&gt; students, or recent &lt;strong&gt;graduates&lt;/strong&gt; from around the world. The CSIS does not restrict applicants on the basis of nationality. The CSIS intern makes approximately &lt;strong&gt;$20/hour&lt;/strong&gt;. Note that each internship position has a different hourly wage. More details about the CSIS Summer Internship 2023 is given below.&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;&lt;strong&gt;Internship Country&lt;/strong&gt;: USA&lt;/li&gt;\r\n&lt;li&gt;&lt;strong&gt;Internship Location&lt;/strong&gt;: Washington D.C.&lt;/li&gt;\r\n&lt;li&gt;&lt;strong&gt;Organization Name&lt;/strong&gt;: CSIS&lt;/li&gt;\r\n&lt;li&gt;&lt;strong&gt;Who can Apply&lt;/strong&gt;: Foreign students and US Citizens&lt;/li&gt;\r\n&lt;li&gt;&lt;strong&gt;Deadline&lt;/strong&gt;: Until the hiring&lt;/li&gt;\r\n&lt;li&gt;&amp;nbsp;&lt;/li&gt;\r\n&lt;/ul&gt;','images/1684880819_csis.png','Active',0,'2023-05-24 03:26:59','2023-05-24 03:26:59'),
(17,5,'CERN Administrative Student Program 2023, Switzerland (Fully Funded)','CERN Administrative Student Program 2023, Switzerland (Fully Funded)','&lt;p&gt;Imagine completing a &lt;strong&gt;Fully Funded Internship&lt;/strong&gt; in Switzerland before graduating from University. Apply for the &lt;strong&gt;CERN Administrative Student Program 2023&lt;/strong&gt;. This Program enables Students, &lt;strong&gt;Bachelors&lt;/strong&gt;, &lt;strong&gt;Masters&lt;/strong&gt; students from around the world to spend &lt;strong&gt;2 to 12 months&lt;/strong&gt; at CERN. Gain work experience through an internship, imagine doing this at CERN in Geneva. The CERN will cover all the expenses.&lt;/p&gt;\r\n&lt;p&gt;The Panel will select &lt;strong&gt;50&lt;/strong&gt; students. &lt;strong&gt;IELTS is not required&lt;/strong&gt; for CERN. Each year CERN Invites students from around the world. If you are looking for Technical Internships or Engineering Internships then do apply for &lt;strong&gt;CERN Short term Internship&lt;/strong&gt; positions. CERN doesn&amp;rsquo;t charge any application fee at any stage. More details about the Program are given below.&lt;/p&gt;\r\n&lt;h2&gt;&lt;strong&gt;Details About CERN Administrative Student Program 2023, Switzerland&lt;/strong&gt;&lt;/h2&gt;\r\n&lt;div id=&quot;ez-toc-container&quot; class=&quot;ez-toc-v2_0_49 counter-hierarchy ez-toc-counter ez-toc-light-blue ez-toc-container-direction&quot;&gt;\r\n&lt;div class=&quot;ez-toc-title-container&quot;&gt;\r\n&lt;p class=&quot;ez-toc-title&quot;&gt;Table of Contents&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div id=&quot;ez-toc-container&quot; class=&quot;ez-toc-v2_0_49 counter-hierarchy ez-toc-counter ez-toc-light-blue ez-toc-container-direction&quot;&gt;&lt;/div&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;&lt;strong&gt;Host Country&lt;/strong&gt;: Swizterland&lt;/li&gt;\r\n&lt;li&gt;&lt;strong&gt;Location&lt;/strong&gt;: CERN Headquarters, Geneva&lt;/li&gt;\r\n&lt;li&gt;&lt;strong&gt;Duration&lt;/strong&gt;: 2-12 Months&lt;/li&gt;\r\n&lt;li&gt;&lt;strong&gt;Coverage&lt;/strong&gt;: Fully Funded&lt;/li&gt;\r\n&lt;li&gt;&lt;strong&gt;No of Interns&lt;/strong&gt;: 50&lt;/li&gt;\r\n&lt;li&gt;&lt;strong&gt;Deadline&lt;/strong&gt;: &lt;span style=&quot;color: #ff0000;&quot;&gt;&lt;strong&gt;31st July 2023&lt;/strong&gt;&lt;/span&gt;\r\n&lt;h3&gt;&lt;strong&gt;What is CERN Administrative Student Program?&lt;/strong&gt;&lt;/h3&gt;\r\n&lt;p&gt;If you are looking for an &lt;strong&gt;International Internship&lt;/strong&gt; in an Administrative related field then you have no other option than CERN, because it is a Fully Funded Internship.&lt;/p&gt;\r\n&lt;h3&gt;&lt;span id=&quot;Administrative_Internship_Fields_at_CERN&quot; class=&quot;ez-toc-section&quot;&gt;&lt;/span&gt;&lt;strong&gt;Administrative Internship Fields at CERN&lt;/strong&gt;&lt;/h3&gt;\r\n&lt;p&gt;Translation, human resources, advanced secretarial work, business administration, logistics, law, finance, accounting, library and information science, engineering management, science communication, education, audiovisual, communication and public relations, psychology, and audit are but a few examples of the many domains in which successful applicants will learn and contribute their knowledge.&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;/ul&gt;','images/1684880496_cern.png','Active',1,'2023-05-24 03:21:36','2023-05-24 03:21:36'),
(18,4,'KAIST EE Camp 2023 (Fully Funded Trip to South Korea)','KAIST EE Camp 2023 (Fully Funded Trip to South Korea)','&lt;p&gt;&lt;strong&gt;Fully Funded Trip to South Korea&lt;/strong&gt;: Apply for the &lt;strong&gt;KAIST EE Camp 2023&lt;/strong&gt;. You all know that KAIST is a world-class Korean University. Each year KAIST University arranges a &lt;strong&gt;short Camp&lt;/strong&gt; for students to &lt;strong&gt;Visit&lt;/strong&gt; KAIST University, experience the University, and then decide if they would like to pursue &lt;strong&gt;Full degree&lt;/strong&gt; programs like &lt;strong&gt;Bachelors, Masters, PhD&lt;/strong&gt; at KAIST University. This year applications are open for KAIST Camp 2023.&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;&lt;strong&gt;Host Country&lt;/strong&gt;: South Korea&lt;/li&gt;\r\n&lt;li&gt;&lt;strong&gt;Host University&lt;/strong&gt;: KAIST&lt;/li&gt;\r\n&lt;li&gt;&lt;strong&gt;Camp Dates&lt;/strong&gt;: 17,18 August 2023&lt;/li&gt;\r\n&lt;li&gt;&lt;strong&gt;Financial Benefits&lt;/strong&gt;: Fully Funded&lt;/li&gt;\r\n&lt;li&gt;&lt;strong&gt;Deadline: &lt;span style=&quot;color: #ff0000;&quot;&gt;19th May 2023&lt;/span&gt;&lt;/strong&gt;&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;h3&gt;&lt;span id=&quot;Financial_Benefits&quot; class=&quot;ez-toc-section&quot;&gt;&lt;/span&gt;&lt;strong&gt;Financial Benefits&lt;/strong&gt;&lt;/h3&gt;\r\n&lt;p&gt;You are welcome to enjoy in-person Travel to KAIST University. The KAIST EE fully supports the costs associated with the camp that includes:&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;Round Trip Flight&lt;/li&gt;\r\n&lt;li&gt;Accommodation&lt;/li&gt;\r\n&lt;li&gt;Meals&lt;/li&gt;\r\n&lt;/ul&gt;','images/1684878397_1684867481_1684126809_kaist.png','Active',1,'2023-05-24 02:46:37','2023-05-24 02:46:37'),
(19,4,'The Einstein Fellowship 2024 in Germany (Fully Funded)','The Einstein Fellowship 2024 in Germany (Fully Funded)','&lt;p&gt;he Applications for the &lt;strong&gt;Einstein Fellowship 2024&lt;/strong&gt; are going to close soon. If you haven&amp;rsquo;t applied for the &lt;strong&gt;Fully Funded Fellowship in Germany&lt;/strong&gt;, still you have time to make it happen. The Einstein Fellowship Program is offered by the Einstein Forum and the Wittenstein Foundation to young applicants from &lt;strong&gt;all around the world&lt;/strong&gt;. All Expenses Covered.&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;Applicants will live in &lt;strong&gt;Einstein`s own summerhouse&lt;/strong&gt; in Caputh, Brandenburg. It&amp;rsquo;s a &lt;strong&gt;Fully Funded&lt;/strong&gt; Summer Fellowship in Germany. The &lt;strong&gt;Duration&lt;/strong&gt; of the Program is &lt;strong&gt;five to six months&lt;/strong&gt; and the &lt;strong&gt;Accommodation&lt;/strong&gt;, &lt;strong&gt;Stipend&lt;/strong&gt; of EUR 10,000, and &lt;strong&gt;Travel&lt;/strong&gt; costs will be &lt;strong&gt;covered&lt;/strong&gt; by the Einstein Fellowship Program. What do you have to do in order to be eligible for this Fellowship?&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;h2&gt;&lt;strong&gt;Details About Einstein Fellowship 2024 in Germany&lt;/strong&gt;&lt;/h2&gt;\r\n&lt;div id=&quot;ez-toc-container&quot; class=&quot;ez-toc-v2_0_49 counter-hierarchy ez-toc-counter ez-toc-light-blue ez-toc-container-direction&quot;&gt;\r\n&lt;div class=&quot;ez-toc-title-container&quot;&gt;\r\n&lt;p class=&quot;ez-toc-title&quot;&gt;Table of Contents&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div id=&quot;ez-toc-container&quot; class=&quot;ez-toc-v2_0_49 counter-hierarchy ez-toc-counter ez-toc-light-blue ez-toc-container-direction&quot;&gt;&lt;/div&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;&lt;strong&gt;Host Country: &lt;/strong&gt;Germany&lt;/li&gt;\r\n&lt;li&gt;&lt;strong&gt;Program Location: &lt;/strong&gt;Einstein Summer House&lt;/li&gt;\r\n&lt;li&gt;&lt;strong&gt;Duration: &lt;/strong&gt;Six Months&lt;/li&gt;\r\n&lt;li&gt;&lt;strong&gt;Financial Benefits: &lt;/strong&gt;Fully Funded&lt;/li&gt;\r\n&lt;li&gt;&lt;strong&gt;Deadline: &lt;span style=&quot;color: #ff0000;&quot;&gt;15th May 2023&lt;/span&gt;&lt;/strong&gt;&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;h3&gt;&lt;span id=&quot;What_is_Einstein_Fellowship_Program&quot; class=&quot;ez-toc-section&quot;&gt;&lt;/span&gt;&lt;strong&gt;What is Einstein Fellowship Program?&lt;/strong&gt;&lt;/h3&gt;\r\n&lt;p&gt;Albert Einstein Set this Fellowship program for outstanding young thinkers who wish to pursue a project in a different field from that of their previous research.&lt;/p&gt;\r\n&lt;p&gt;Your proposed project must not be part of your dissertation or thesis.&lt;/p&gt;','images/1684880245_1684776923_1684127049_einstien_fellowship.png','Active',1,'2023-05-24 03:17:25','2023-05-24 03:17:25'),
(20,4,'ILEM Summer School in Turkey 2023 (Fully Funded)','ILEM Summer School in Turkey 2023 (Fully Funded)','&lt;p&gt;ll right Ladies and gentlemen. Here is a &lt;strong&gt;Shoutout&lt;/strong&gt; for &lt;strong&gt;Summer School in Turkey in 2023&lt;/strong&gt;. The applications are open to apply for the &lt;strong&gt;ILEM International Summer School 8 in Turkey in 2023&lt;/strong&gt;. The 8th Edition of the Summer School is &lt;strong&gt;Fully Funded&lt;/strong&gt; and all the expenses of the applicants will be covered. The Summer Program is organized in partnership with ICYF, YTB, FSMV University, ILM, IRCICA, and Oranje Institut. Are you Ready for the Next Level?&lt;/p&gt;\r\n&lt;p&gt;The ILEM International Summer School will take &lt;strong&gt;place from July 24th to July 30th, 2023&lt;/strong&gt;, in &lt;strong&gt;Istanbul&lt;/strong&gt;, Turkiye. ILEM International &lt;span style=&quot;color: #000000;&quot;&gt;&lt;a style=&quot;color: #000000;&quot; href=&quot;https://opportunitiescorners.com/science-summer-camp-hongkong/&quot;&gt;Summer School&lt;/a&gt;&lt;/span&gt; aims to bring together academics, researchers, and artists from &lt;strong&gt;diverse backgrounds&lt;/strong&gt; to serve as a forum for discussing major issues concerning the Islamic world. The Program is open to all students from around the world with any nationality. &lt;strong&gt;NO IELTS, No Application Fee required.&lt;/strong&gt;&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;h2&gt;&lt;strong&gt;Details About ILEM Summer School in Turkey 2023&lt;/strong&gt;&lt;/h2&gt;\r\n&lt;div id=&quot;ez-toc-container&quot; class=&quot;ez-toc-v2_0_49 counter-hierarchy ez-toc-counter ez-toc-light-blue ez-toc-container-direction&quot;&gt;\r\n&lt;div class=&quot;ez-toc-title-container&quot;&gt;\r\n&lt;p class=&quot;ez-toc-title&quot;&gt;Table of Contents&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div id=&quot;ez-toc-container&quot; class=&quot;ez-toc-v2_0_49 counter-hierarchy ez-toc-counter ez-toc-light-blue ez-toc-container-direction&quot;&gt;&lt;/div&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;&lt;strong&gt;Host Country&lt;/strong&gt;: Turkey&lt;/li&gt;\r\n&lt;li&gt;&lt;strong&gt;Program Location&lt;/strong&gt;: Istanbul, Turkiye&lt;/li&gt;\r\n&lt;li&gt;&lt;strong&gt;Dates&lt;/strong&gt;: July 24th to July 30th, 2023&lt;/li&gt;\r\n&lt;li&gt;&lt;strong&gt;Financial Benefits&lt;/strong&gt;: Fully Funded&lt;/li&gt;\r\n&lt;li&gt;&lt;strong&gt;Deadline&lt;/strong&gt;: &lt;strong&gt;&lt;span style=&quot;color: #ff0000;&quot;&gt;1st May 2023&lt;/span&gt;&lt;/strong&gt;&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;h3&gt;&lt;span id=&quot;Financial_Benefits&quot; class=&quot;ez-toc-section&quot;&gt;&lt;/span&gt;&lt;strong&gt;Financial Benefits&lt;/strong&gt;&lt;/h3&gt;\r\n&lt;p&gt;Is there any Fee to Participate in ILEM International Summer School?&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;&lt;strong&gt;The answer is a BIG NO&amp;hellip;&lt;/strong&gt;&lt;/li&gt;\r\n&lt;li&gt;IISS-8 is a free-of-charge event.&lt;/li&gt;\r\n&lt;li&gt;Accommodation&lt;/li&gt;\r\n&lt;li&gt;Meals&lt;/li&gt;\r\n&lt;li&gt;Transportation (from accommodation location to ILEM)&lt;/li&gt;\r\n&lt;li&gt;Social-cultural program expenses will be covered by IISS 8&lt;/li&gt;\r\n&lt;li&gt;Travel Tickets to/from Istanbul will be Covered and mostly intended to provide funding for travel as well.&lt;/li&gt;\r\n&lt;/ul&gt;','images/1684880142_1684618698_1684127185_summer_turkey.png','Active',0,'2023-05-24 03:15:42','2023-05-24 03:15:42'),
(21,1,'Italy Government Scholarship 2023-24 (Fully Funded)','Italy Government Scholarship 2023-24 (Fully Funded)','&lt;p&gt;&lt;strong&gt;Call for 2023-24 Applications&lt;/strong&gt;. Apply for the &lt;strong&gt;MAECI Italy Government Scholarship 2023-24.&lt;/strong&gt; Each year the Italian &lt;strong&gt;Ministry&lt;/strong&gt; of &lt;strong&gt;Foreign&lt;/strong&gt; &lt;strong&gt;Affairs&lt;/strong&gt; and International Cooperation (MAECI) offers Italian government scholarships for foreign students and Italian Citizens. The &lt;strong&gt;MAECI Scholarship&lt;/strong&gt; is to pursue &lt;strong&gt;Master and PhD&lt;/strong&gt; programs from Italy Public Universities. Through this Scholarship, the Italian Government aims to promote the Italian language and culture.&lt;/p&gt;\r\n&lt;p&gt;Participants can apply for this &lt;strong&gt;&lt;a href=&quot;https://opportunitiescorners.com/&quot;&gt;Fully Funded Scholarship&lt;/a&gt;&lt;/strong&gt; if they apply for admission to any Italian Public University. So, this Scholarship will give cover their &lt;strong&gt;Tuition Fee, Enrollment Free, Health Insurance, and Monthly allowance&lt;/strong&gt; to cover their expenses. More information about the MAECI Italy Government Scholarship 2023 is given below.&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;&lt;strong&gt;Host Country&lt;/strong&gt;: Italy&lt;/li&gt;\r\n&lt;li&gt;&lt;strong&gt;Scholarship Name&lt;/strong&gt;: MAECI Scholarship (Study in Italy) by Ministry of Foreign Affairs&lt;/li&gt;\r\n&lt;li&gt;&lt;strong&gt;Who can Apply&lt;/strong&gt;: Students who are looking for Master&amp;rsquo;s or PhD Scholarships.&lt;/li&gt;\r\n&lt;li&gt;&lt;strong&gt;Deadline&lt;/strong&gt;: &lt;strong&gt;&lt;span style=&quot;color: #ff0000;&quot;&gt;9th June 2023&lt;/span&gt;&lt;/strong&gt;&lt;/li&gt;\r\n&lt;/ul&gt;','images/1684879982_1684689791_1684129290_italy.png','Active',1,'2023-05-24 03:13:02','2023-05-24 03:13:02'),
(26,2,'Politecnico Di Milano Scholarships 2023-24 in Italy | Apply Now (Fully Funded)','Politecnico Di Milano Scholarships 2023-24 in Italy','&lt;p&gt;Applications for the &lt;strong&gt;Politecnico Di Milano Scholarships 2023-24&lt;/strong&gt; are open. Recently Italy has been in the eyes of International students. Because numerous Universities announced the Greatest number of Scholarships. This call is for &lt;strong&gt;February 2024 intake&lt;/strong&gt;. Politecnico Di Milano&amp;nbsp;scholarships in Italy are open to all students from around the world.&lt;/p&gt;\r\n&lt;p&gt;The&amp;nbsp;&lt;strong&gt;Polytechnic University of Milan&lt;/strong&gt;&amp;nbsp;(&lt;span title=&quot;Italian-language text&quot;&gt;&lt;em lang=&quot;it&quot;&gt;Politecnico di Milano&lt;/em&gt;&lt;/span&gt;)&amp;nbsp;is the &lt;strong&gt;largest&amp;nbsp;&lt;/strong&gt;technical university&amp;nbsp;in&amp;nbsp;Italy. The&amp;nbsp;university offers &lt;strong&gt;undergraduate&lt;/strong&gt;, &lt;strong&gt;graduate&lt;/strong&gt;, and higher education courses in&amp;nbsp;engineering,&amp;nbsp;architecture,&amp;nbsp;and&amp;nbsp;design. The acceptance rate of the University is &lt;strong&gt;75-80 %&lt;/strong&gt;. Want to know more? Detailed information is given below.&lt;/p&gt;\r\n&lt;h2&gt;&lt;strong&gt;Details About Politecnico Di Milano Scholarships 2023-24 in Italy&lt;/strong&gt;&lt;/h2&gt;\r\n&lt;div id=&quot;ez-toc-container&quot; class=&quot;ez-toc-v2_0_49 counter-hierarchy ez-toc-counter ez-toc-light-blue ez-toc-container-direction&quot;&gt;\r\n&lt;div class=&quot;ez-toc-title-container&quot;&gt;\r\n&lt;p class=&quot;ez-toc-title&quot;&gt;Table of Contents&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div id=&quot;ez-toc-container&quot; class=&quot;ez-toc-v2_0_49 counter-hierarchy ez-toc-counter ez-toc-light-blue ez-toc-container-direction&quot;&gt;&lt;/div&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;&lt;strong&gt;Host Country&lt;/strong&gt;: Italy&lt;/li&gt;\r\n&lt;li&gt;&lt;strong&gt;Host University&lt;/strong&gt;: Politecnico Di Milano&lt;/li&gt;\r\n&lt;li&gt;&lt;strong&gt;Course Level&lt;/strong&gt;: Undergraduate, Graduate&lt;/li&gt;\r\n&lt;li&gt;&lt;strong&gt;Intake&lt;/strong&gt;: February 2024&lt;/li&gt;\r\n&lt;li&gt;&lt;strong&gt;Deadline: &lt;span style=&quot;color: #ff0000;&quot;&gt;18th July 2023&lt;/span&gt;&lt;/strong&gt;&lt;/li&gt;\r\n&lt;li&gt;\r\n&lt;h3&gt;&lt;strong&gt;Scholarships Available at Politecnico Di Milano University&lt;/strong&gt;&lt;/h3&gt;\r\n&lt;p&gt;The Politecnico di Milano offers a numerous number of Financial aid services as well as Scholarship opportunities are also available for international students.&lt;/p&gt;\r\n&lt;p&gt;The List of Scholarships at Politecnico di Milano University are:&lt;/p&gt;\r\n&lt;ul class=&quot;ce-menu ce-menu-0 &quot;&gt;\r\n&lt;li class=&quot;&quot;&gt;&lt;strong&gt;University Financial Aid &amp;ndash; Diritto allo Studio Universitario (DSU)&lt;/strong&gt;\r\n&lt;ul class=&quot;ce-menu ce-menu-0 &quot;&gt;\r\n&lt;li&gt;&lt;strong&gt;DSU Covers&lt;/strong&gt;:\r\n&lt;ul class=&quot;ce-menu ce-menu-0 &quot;&gt;\r\n&lt;li&gt;One free Meal per day,&lt;/li&gt;\r\n&lt;li&gt;The tuition Fee is fully covered.&lt;/li&gt;\r\n&lt;li&gt;Hostel Accommodation&lt;/li&gt;\r\n&lt;li&gt;A grant of 6000 Euros if the hostel and meal are not available. If available then 3,000 euros will be given.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;/li&gt;\r\n&lt;li class=&quot;&quot;&gt;Merit-based scholarships&lt;/li&gt;\r\n&lt;li class=&quot;&quot;&gt;Other scholarships&lt;/li&gt;\r\n&lt;li class=&quot;&quot;&gt;UNICORE 5.0 scholarships &amp;ndash; University Corridors for Refugees (2023)&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;/li&gt;\r\n&lt;/ul&gt;','images/1684879439_politecno 356x220.png','Active',0,'2023-05-24 03:03:59','2023-05-24 03:03:59'),
(34,4,'Awaji Youth Federation Fellowship 2023 (Fully Funded Trip to Japan','Awaji Youth Federation Fellowship 2023 (Fully Funded Trip to Japan','&lt;p&gt;Where are&lt;strong&gt; Boys and Girls?&lt;/strong&gt; Call for &lt;strong&gt;Awaji Youth Federation Fellowship 2023&lt;/strong&gt;. Fully Funded Free Tour to Japan. The Awaji Youth Fellowship is a &lt;strong&gt;9 Month&lt;/strong&gt; live working and training program in Awaji Island. Awaji is the name of an Island in Japan. This is the popular Exchange Program in Japan where Participants from different countries come to one place and fulfill the needs of the Japanese Work Place. It attracts both male and female participants. The Fellowship is Funded by the Pasona Group.&lt;/p&gt;\r\n&lt;p&gt;Young applicants &lt;strong&gt;aged 24-35&lt;/strong&gt; years who are graduated or going to be graduate with &lt;strong&gt;Bachelor, Masters Degree&lt;/strong&gt; can apply for this Fellowship program. The AYF consists of three different programs that connect each other named &lt;strong&gt;Lectures, Challenges, and Projects.&lt;/strong&gt; One aim, one goal to bring participants from around the world to challenge themselves and sharpen their skills in a multicultural environment that fulfills the needs of the Japanese Workplace. More details about the Fellowship are given below.&lt;/p&gt;\r\n&lt;p&gt;&lt;strong&gt;Details About Awaji Youth Federation Fellowship 2023 (Fully Funded Trip to Japan)&lt;/strong&gt;&lt;/p&gt;\r\n&lt;div id=&quot;ez-toc-container&quot; class=&quot;ez-toc-v2_0_49 counter-hierarchy ez-toc-counter ez-toc-light-blue ez-toc-container-direction&quot;&gt;\r\n&lt;div class=&quot;ez-toc-title-container&quot;&gt;\r\n&lt;p class=&quot;ez-toc-title&quot;&gt;Table of Contents&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div id=&quot;ez-toc-container&quot; class=&quot;ez-toc-v2_0_49 counter-hierarchy ez-toc-counter ez-toc-light-blue ez-toc-container-direction&quot;&gt;&lt;/div&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;Host Country: Japan&lt;/li&gt;\r\n&lt;li&gt;Location: Awaji Island&lt;/li&gt;\r\n&lt;li&gt;Duration: 9 Months (Begins in September 2023)&lt;/li&gt;\r\n&lt;li&gt;Who can Apply: Bachelors, Masters Students&lt;/li&gt;\r\n&lt;li&gt;Financial Coverage: Fully Funded&lt;/li&gt;\r\n&lt;li&gt;Deadline: 31st May 2023\r\n&lt;h3&gt;&lt;strong&gt;Financial Coverage&lt;/strong&gt;&lt;/h3&gt;\r\n&lt;p&gt;The Awaji Youth Fellowship will cover all the Expenses for 9 months. Many applicants went to Japan on this Fellowship with the help of Opportunities Corners. &lt;strong&gt;So, Apply Now.&lt;/strong&gt;&lt;/p&gt;\r\n&lt;p&gt;The Benefits Include:&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;&lt;strong&gt;Monthly Salary&lt;/strong&gt; (Base salary + Overtime)-JPY 197,000&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;kt-svg-icon-list-text&quot;&gt;All Government &lt;strong&gt;fees and taxes&lt;/strong&gt; are covered.&lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;kt-svg-icon-list-text&quot;&gt;&lt;strong&gt;Accommodation &amp;amp; Meals&lt;/strong&gt; covered for 9 Months.&lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;kt-svg-icon-list-text&quot;&gt;&lt;strong&gt;The room &lt;/strong&gt;will be provided&amp;nbsp;in either Japanese or Western style&lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;kt-svg-icon-list-text&quot;&gt;&lt;strong&gt;Utility costs&lt;/strong&gt; such as electricity and Wi-Fi are included.&lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;Halal, Vegetarian, Good, and healthy Foods are available.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;p&gt;Ok, so now almost 90% of the expenses are covered, now let&amp;rsquo;s come to what exactly the AYF fellowship consists of:&lt;/p&gt;\r\n&lt;h3&gt;&lt;span id=&quot;AYF_Fellowship_Theme_and_Structure&quot; class=&quot;ez-toc-section&quot;&gt;&lt;/span&gt;&lt;strong&gt;AYF Fellowship Theme and Structure&lt;/strong&gt;&lt;/h3&gt;\r\n&lt;div class=&quot;sec-col-item-3&quot;&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;Leadership and Project Management&lt;/li&gt;\r\n&lt;li&gt;Innovation and Intrapreneurship&lt;/li&gt;\r\n&lt;li&gt;PR and Marketing&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;p&gt;The AYF Fellowship consists of 3 components that link to and support one another, namely:&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;/li&gt;\r\n&lt;/ul&gt;','images/1684878991_awaji.png','Active',1,'2023-05-24 03:43:40','2023-05-24 03:43:40'),
(55,1,'MEXT Scholarship 2024 (Japanese Government) Study in Japan','MEXT Scholarship 2024 (Japanese Government) Study in Japan','&lt;p&gt;The MEXT &lt;strong&gt;Embassy Recommendation&lt;/strong&gt; Scholarship for 2024 is now open. We are happy to announce that the call for &lt;strong&gt;MEXT Scholarship 2024&lt;/strong&gt; is now open in different parts of the world. MEXT is a Japanese Government &lt;strong&gt;Fully Funded Scholarship&lt;/strong&gt; Without &lt;strong&gt;IELTS&lt;/strong&gt; and Japanese Language. There is &lt;strong&gt;No&lt;/strong&gt; Application &lt;strong&gt;Fee&lt;/strong&gt; required and MEXT is the Largest ever Japanese Scholarship that is Funded by the &lt;strong&gt;Monbukagakusho&lt;/strong&gt;, the Japanese Ministry of Education, Culture, Sports, Science, and Technology (MEXT).&lt;/p&gt;\r\n&lt;p&gt;&lt;strong&gt;Key Points&lt;/strong&gt;&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;\r\n&lt;p&gt;&lt;strong&gt;Scholarship Name&lt;/strong&gt;: MEXT&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li&gt;\r\n&lt;p&gt;&lt;strong&gt;Funded by&lt;/strong&gt;: Japanese Government&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li&gt;\r\n&lt;p&gt;&lt;strong&gt;Who can Apply&lt;/strong&gt;: Anyone&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li&gt;\r\n&lt;p&gt;&lt;strong&gt;Is IELTS Required For MEXT&lt;/strong&gt;: No&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li&gt;\r\n&lt;p&gt;&lt;strong&gt;Is the Japanese Langauge Mandatory for MEXT&lt;/strong&gt;: No&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li&gt;\r\n&lt;p&gt;&lt;strong&gt;Is there any Application Fee&lt;/strong&gt;: No&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li&gt;\r\n&lt;p&gt;&lt;strong&gt;How you can Apply&lt;/strong&gt;: Online through Embassy&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;/ul&gt;','images/1684879781_jpan-min-356x220.png','Active',0,'2023-05-24 04:11:29','2023-05-24 04:11:29');

/*Table structure for table `post_atachment` */

DROP TABLE IF EXISTS `post_atachment`;

CREATE TABLE `post_atachment` (
  `post_atachment_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) DEFAULT NULL,
  `post_attachment_title` varchar(200) DEFAULT NULL,
  `post_attachment_path` text DEFAULT NULL,
  `is_active` enum('Active','InActive') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`post_atachment_id`),
  KEY `fk1` (`post_id`),
  CONSTRAINT `fk1` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `post_atachment` */

insert  into `post_atachment`(`post_atachment_id`,`post_id`,`post_attachment_title`,`post_attachment_path`,`is_active`,`created_at`,`updated_at`) values 
(19,18,'attachment one ppt ','Images/1684878465_Course_Plan_Presentation.pptx','Active','2023-05-24 02:47:45','2023-05-24 02:47:45'),
(20,18,'attachment two ','Images/1684878465_Looping and Branching (Day-4).ppt','Active','2023-05-24 02:47:45','2023-05-24 02:47:45'),
(21,34,'new image','Images/1684879087_1684617766_1684125257_post2.png','Active','2023-05-24 02:56:58','2023-05-24 02:58:07');

/*Table structure for table `post_category` */

DROP TABLE IF EXISTS `post_category`;

CREATE TABLE `post_category` (
  `post_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`post_category_id`),
  KEY `post_id` (`post_id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `post_category_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `post_category_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `post_category` */

insert  into `post_category`(`post_category_id`,`post_id`,`category_id`,`created_at`,`updated_at`) values 
(6,13,7,'2023-05-24 03:36:17','2023-05-24 03:36:17'),
(7,14,8,'2023-05-24 03:32:47','2023-05-24 03:32:47'),
(8,15,9,'2023-05-24 03:30:20','2023-05-24 03:30:20'),
(9,16,2,'2023-05-24 03:26:59','2023-05-24 03:26:59'),
(10,17,10,'2023-05-24 03:21:36','2023-05-24 03:21:36'),
(11,18,11,'2023-05-24 02:46:37','2023-05-24 02:46:37'),
(12,19,12,'2023-05-24 03:17:25','2023-05-24 03:17:25'),
(13,20,13,'2023-05-24 03:15:42','2023-05-24 03:15:42'),
(14,21,14,'2023-05-24 03:13:02','2023-05-24 03:13:02'),
(19,26,14,'2023-05-24 03:03:59','2023-05-24 03:03:59'),
(27,34,16,'2023-05-24 03:43:40','2023-05-24 03:43:40'),
(48,55,16,'2023-05-24 04:11:29','2023-05-24 04:11:29');

/*Table structure for table `post_comment` */

DROP TABLE IF EXISTS `post_comment`;

CREATE TABLE `post_comment` (
  `post_comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `is_active` enum('Active','InActive') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`post_comment_id`),
  KEY `user_id` (`user_id`),
  KEY `post_id` (`post_id`),
  CONSTRAINT `post_comment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `post_comment_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `post_comment` */

/*Table structure for table `role` */

DROP TABLE IF EXISTS `role`;

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_type` varchar(50) NOT NULL,
  `is_active` enum('Active','InActive') DEFAULT 'Active',
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `role` */

insert  into `role`(`role_id`,`role_type`,`is_active`) values 
(1,'Admin','Active'),
(2,'User','Active');

/*Table structure for table `setting` */

DROP TABLE IF EXISTS `setting`;

CREATE TABLE `setting` (
  `setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `setting_key` varchar(100) DEFAULT NULL,
  `setting_value` varchar(100) DEFAULT NULL,
  `setting_status` enum('Active','InActive') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`setting_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `setting_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=166 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `setting` */

insert  into `setting`(`setting_id`,`user_id`,`setting_key`,`setting_value`,`setting_status`,`created_at`,`updated_at`) values 
(157,1,'post-title-font-size','32','Active','2023-05-24 04:11:49',NULL),
(158,1,'post-title-font-color','#000000','Active','2023-05-24 04:11:49',NULL),
(159,1,'post-title-background-color','#f8f9fa','Active','2023-05-24 04:11:49',NULL),
(160,1,'post-summary-font-size','28','Active','2023-05-24 04:11:49',NULL),
(161,1,'post-summary-font-color','#000000','Active','2023-05-24 04:11:49',NULL),
(162,1,'post-summary-background-color','#f8f9fa','Active','2023-05-24 04:11:49',NULL),
(163,1,'post-description-font-size','20','Active','2023-05-24 04:11:50',NULL),
(164,1,'post-description-font-color','#ffff00','Active','2023-05-24 04:11:50',NULL),
(165,1,'post-description-background-color','#004040','Active','2023-05-24 04:12:02',NULL);

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` text NOT NULL,
  `gender` enum('Male','Female') DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `user_image` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `is_approved` enum('Pending','Approved','Rejected') DEFAULT 'Pending',
  `is_active` enum('Active','InActive') DEFAULT NULL,
  `created_at` varchar(200) DEFAULT NULL,
  `updated_at` varchar(200) DEFAULT 'current_timestamp()',
  PRIMARY KEY (`user_id`),
  KEY `role_id` (`role_id`),
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `user` */

insert  into `user`(`user_id`,`role_id`,`first_name`,`last_name`,`email`,`password`,`gender`,`date_of_birth`,`user_image`,`address`,`is_approved`,`is_active`,`created_at`,`updated_at`) values 
(1,1,'Sareer','Ahmed','sareer@gmail.com',' Hidayaa@2','Male','2001-05-17','images/1684883548_1684776621_1684529936_sareer.jpg','Sindh','Approved','Active','2023-05-11 10:40:44','2023-24-24 4:29:25'),
(4,1,'Fahad','Ahmed','sareer.ahmed.hidaya@gmail.com','12345678','Male','2023-05-08','1684875141_boy.jpg','jamshoro','Approved','Active','2023-05-11 10:39:30','2023-05-15 11:18:27'),
(59,2,'Ahsan','Khan','ahsan@gmail.com','Ahsan123@','Male','2023-12-05','1684875141_boy.jpg','Hyderbad','Approved','Active','2023-05-24 01:37:51 am','2023-24-24 1:52:35'),
(60,2,'Abdullah','Ahmed','Abdullah@gmail.com','Hidayaa@2','Male','2023-05-16','Images/1684882319_boy.jpg','Khairpur','Approved','Active','2023-05-24 03:51:59','2023-05-24 03:57:23');

/*Table structure for table `user_feedback` */

DROP TABLE IF EXISTS `user_feedback`;

CREATE TABLE `user_feedback` (
  `feedback_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `user_email` varchar(100) DEFAULT NULL,
  `feedback` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`feedback_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `user_feedback_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `user_feedback` */

insert  into `user_feedback`(`feedback_id`,`user_id`,`user_name`,`user_email`,`feedback`,`created_at`,`updated_at`) values 
(1,1,'Sareer Ahmed','sareer@gmail.com','Hellow','2023-05-15 14:39:12','2023-05-15 14:39:12'),
(8,NULL,'Sareer Ahmed','taimoor@gmail.com','feedback something ','2023-05-15 14:42:57','2023-05-15 14:42:57'),
(9,NULL,'Sareer Ahmed','taimoor@gmail.com','feedback something\r\n','2023-05-15 14:44:20','2023-05-15 14:44:20'),
(10,1,'Sareer Ahmed','sareer@gmail.com','Hellow','2023-05-20 00:51:07','2023-05-20 00:51:07'),
(11,1,'Sareer Ahmed','sareer@gmail.com','Hellow','2023-05-20 00:54:20','2023-05-20 00:54:20');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
