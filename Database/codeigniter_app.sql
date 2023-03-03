-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2023 at 10:07 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codeigniter_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `create_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `status`, `create_at`) VALUES
(1, 'admin', '$2y$10$829U09QVV52p/kRsdSJCYeiiXJGuF0ngEiD2XFi5DbNj8aopxaWhO', 1, '2023-02-17');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `category` int(11) NOT NULL,
  `author` varchar(50) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `description`, `image`, `category`, `author`, `status`, `create_at`, `update_at`) VALUES
(14, '10 GitHub Repos To Make You a Better Developer. Guaranteed.', '                                    <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae esse officia iusto rem rerum iure hic, sapiente sunt deserunt architecto. Dicta tempore ipsum culpa voluptas itaque ullam alias similique cum adipisci repudiandae fugit ea dignissimos aut, minus commodi ipsa pariatur, consectetur enim nihil non sequi dolore expedita. Nesciunt excepturi eos tempora, odit repudiandae nisi architecto iure saepe voluptatum aliquam sed accusamus sapiente. Tempora quis asperiores repellendus sed quia nobis dolor nostrum perspiciatis dolorem, laborum, at eligendi accusamus laudantium, illum ratione rerum dolorum? Nesciunt eaque dignissimos iure ex tenetur laboriosam alias veritatis provident necessitatibus. Velit delectus, aut laudantium doloremque tempore laboriosam.</div><div><br></div><div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae esse officia iusto rem rerum iure hic, sapiente sunt deserunt architecto. Dicta tempore ipsum culpa voluptas itaque ullam alias similique cum adipisci repudiandae fugit ea dignissimos aut, minus commodi ipsa pariatur, consectetur enim nihil non sequi dolore expedita. Nesciunt excepturi eos tempora, odit repudiandae nisi architecto iure saepe voluptatum aliquam sed accusamus sapiente. Tempora quis asperiores repellendus sed quia nobis dolor nostrum perspiciatis dolorem, laborum, at eligendi accusamus laudantium, illum ratione rerum dolorum? Nesciunt eaque dignissimos iure ex tenetur laboriosam alias veritatis provident necessitatibus. Velit delectus, aut laudantium doloremque tempore laboriosam.</div><div><br></div><div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae esse officia iusto rem rerum iure hic, sapiente sunt deserunt architecto. Dicta tempore ipsum culpa voluptas itaque ullam alias similique cum adipisci repudiandae fugit ea dignissimos aut, minus commodi ipsa pariatur, consectetur enim nihil non sequi dolore expedita. Nesciunt excepturi eos tempora, odit repudiandae nisi architecto iure saepe voluptatum aliquam sed accusamus sapiente. Tempora quis asperiores repellendus sed quia nobis dolor nostrum perspiciatis dolorem, laborum, at eligendi accusamus laudantium, illum ratione rerum dolorum? Nesciunt eaque dignissimos iure ex tenetur laboriosam alias veritatis provident necessitatibus. Velit delectus, aut laudantium doloremque tempore laboriosam.<br></div><div><br></div> \r\n                                ', 'b59c940ad85fba076ac090241cde55d8.jpg', 8, 'Mr.OhmYim', 1, '2023-03-03 06:00:38', '2023-03-03 06:00:58'),
(15, '9 Projects You Can Do to Become a Front-End Master in 2023', '<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae esse officia iusto rem rerum iure hic, sapiente sunt deserunt architecto. Dicta tempore ipsum culpa voluptas itaque ullam alias similique cum adipisci repudiandae fugit ea dignissimos aut, minus commodi ipsa pariatur, consectetur enim nihil non sequi dolore expedita. Nesciunt excepturi eos tempora, odit repudiandae nisi architecto iure saepe voluptatum aliquam sed accusamus sapiente. Tempora quis asperiores repellendus sed quia nobis dolor nostrum perspiciatis dolorem, laborum, at eligendi accusamus laudantium, illum ratione rerum dolorum? Nesciunt eaque dignissimos iure ex tenetur laboriosam alias veritatis provident necessitatibus. Velit delectus, aut laudantium doloremque tempore laboriosam.</div><div><br></div><div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae esse officia iusto rem rerum iure hic, sapiente sunt deserunt architecto. Dicta tempore ipsum culpa voluptas itaque ullam alias similique cum adipisci repudiandae fugit ea dignissimos aut, minus commodi ipsa pariatur, consectetur enim nihil non sequi dolore expedita. Nesciunt excepturi eos tempora, odit repudiandae nisi architecto iure saepe voluptatum aliquam sed accusamus sapiente. Tempora quis asperiores repellendus sed quia nobis dolor nostrum perspiciatis dolorem, laborum, at eligendi accusamus laudantium, illum ratione rerum dolorum? Nesciunt eaque dignissimos iure ex tenetur laboriosam alias veritatis provident necessitatibus. Velit delectus, aut laudantium doloremque tempore laboriosam.</div><div><br></div><div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae esse officia iusto rem rerum iure hic, sapiente sunt deserunt architecto. Dicta tempore ipsum culpa voluptas itaque ullam alias similique cum adipisci repudiandae fugit ea dignissimos aut, minus commodi ipsa pariatur, consectetur enim nihil non sequi dolore expedita. Nesciunt excepturi eos tempora, odit repudiandae nisi architecto iure saepe voluptatum aliquam sed accusamus sapiente. Tempora quis asperiores repellendus sed quia nobis dolor nostrum perspiciatis dolorem, laborum, at eligendi accusamus laudantium, illum ratione rerum dolorum? Nesciunt eaque dignissimos iure ex tenetur laboriosam alias veritatis provident necessitatibus. Velit delectus, aut laudantium doloremque tempore laboriosam.<br></div><div><br></div>                                                                         \r\n                                 \r\n                                ', '42fb0f4a957aa93100b91f20f7de17dc.jpg', 8, 'Mr.OhmYim', 1, '2023-03-03 06:03:39', '2023-03-03 06:03:51'),
(16, 'It’s 2022, Please Don’t Just Use “console.log” Anymore', '                                    <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae esse officia iusto rem rerum iure hic, sapiente sunt deserunt architecto. Dicta tempore ipsum culpa voluptas itaque ullam alias similique cum adipisci repudiandae fugit ea dignissimos aut, minus commodi ipsa pariatur, consectetur enim nihil non sequi dolore expedita. Nesciunt excepturi eos tempora, odit repudiandae nisi architecto iure saepe voluptatum aliquam sed accusamus sapiente. Tempora quis asperiores repellendus sed quia nobis dolor nostrum perspiciatis dolorem, laborum, at eligendi accusamus laudantium, illum ratione rerum dolorum? Nesciunt eaque dignissimos iure ex tenetur laboriosam alias veritatis provident necessitatibus. Velit delectus, aut laudantium doloremque tempore laboriosam.</div><div><br></div><div><div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae esse officia iusto rem rerum iure hic, sapiente sunt deserunt architecto. Dicta tempore ipsum culpa voluptas itaque ullam alias similique cum adipisci repudiandae fugit ea dignissimos aut, minus commodi ipsa pariatur, consectetur enim nihil non sequi dolore expedita. Nesciunt excepturi eos tempora, odit repudiandae nisi architecto iure saepe voluptatum aliquam sed accusamus sapiente. Tempora quis asperiores repellendus sed quia nobis dolor nostrum perspiciatis dolorem, laborum, at eligendi accusamus laudantium, illum ratione rerum dolorum? Nesciunt eaque dignissimos iure ex tenetur laboriosam alias veritatis provident necessitatibus. Velit delectus, aut laudantium doloremque tempore laboriosam.</div></div><div><br></div><div><div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae esse officia iusto rem rerum iure hic, sapiente sunt deserunt architecto. Dicta tempore ipsum culpa voluptas itaque ullam alias similique cum adipisci repudiandae fugit ea dignissimos aut, minus commodi ipsa pariatur, consectetur enim nihil non sequi dolore expedita. Nesciunt excepturi eos tempora, odit repudiandae nisi architecto iure saepe voluptatum aliquam sed accusamus sapiente. Tempora quis asperiores repellendus sed quia nobis dolor nostrum perspiciatis dolorem, laborum, at eligendi accusamus laudantium, illum ratione rerum dolorum? Nesciunt eaque dignissimos iure ex tenetur laboriosam alias veritatis provident necessitatibus. Velit delectus, aut laudantium doloremque tempore laboriosam.</div></div><div><br></div>                                     \r\n                                 \r\n                                ', 'c4b8093821a747ef693d757a1e3d628b.jpg', 8, 'Mr.OhmYim', 1, '2023-03-03 06:06:56', NULL),
(17, 'ChatGPT: Your New Best Friend in Frontend Development', '<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae esse officia iusto rem rerum iure hic, sapiente sunt deserunt architecto. Dicta tempore ipsum culpa voluptas itaque ullam alias similique cum adipisci repudiandae fugit ea dignissimos aut, minus commodi ipsa pariatur, consectetur enim nihil non sequi dolore expedita. Nesciunt excepturi eos tempora, odit repudiandae nisi architecto iure saepe voluptatum aliquam sed accusamus sapiente. Tempora quis asperiores repellendus sed quia nobis dolor nostrum perspiciatis dolorem, laborum, at eligendi accusamus laudantium, illum ratione rerum dolorum? Nesciunt eaque dignissimos iure ex tenetur laboriosam alias veritatis provident necessitatibus. Velit delectus, aut laudantium doloremque tempore laboriosam.</div><div><br></div><div><div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae esse officia iusto rem rerum iure hic, sapiente sunt deserunt architecto. Dicta tempore ipsum culpa voluptas itaque ullam alias similique cum adipisci repudiandae fugit ea dignissimos aut, minus commodi ipsa pariatur, consectetur enim nihil non sequi dolore expedita. Nesciunt excepturi eos tempora, odit repudiandae nisi architecto iure saepe voluptatum aliquam sed accusamus sapiente. Tempora quis asperiores repellendus sed quia nobis dolor nostrum perspiciatis dolorem, laborum, at eligendi accusamus laudantium, illum ratione rerum dolorum? Nesciunt eaque dignissimos iure ex tenetur laboriosam alias veritatis provident necessitatibus. Velit delectus, aut laudantium doloremque tempore laboriosam.</div></div><div><br></div><div><div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae esse officia iusto rem rerum iure hic, sapiente sunt deserunt architecto. Dicta tempore ipsum culpa voluptas itaque ullam alias similique cum adipisci repudiandae fugit ea dignissimos aut, minus commodi ipsa pariatur, consectetur enim nihil non sequi dolore expedita. Nesciunt excepturi eos tempora, odit repudiandae nisi architecto iure saepe voluptatum aliquam sed accusamus sapiente. Tempora quis asperiores repellendus sed quia nobis dolor nostrum perspiciatis dolorem, laborum, at eligendi accusamus laudantium, illum ratione rerum dolorum? Nesciunt eaque dignissimos iure ex tenetur laboriosam alias veritatis provident necessitatibus. Velit delectus, aut laudantium doloremque tempore laboriosam.</div></div><div><br></div>                                     \r\n                                ', 'b283053f088a5c5bb740dfdb673066db.jpg', 8, 'Mr.OhmYim', 1, '2023-03-03 06:11:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `status`, `created_at`, `updated_at`) VALUES
(8, 'Programming', 'c903dcfdd96afb70832ca6f2f7c7218d.jpg', 1, '2023-03-03 05:40:45', 2023),
(9, 'Game', 'eaeceaf49d46f6224d39dc7704b664d3.jpg', 1, '2023-03-03 06:11:56', NULL),
(10, 'Travel', 'ee81fd392be40ed702a9d83b20b37a09.jpg', 1, '2023-03-03 06:12:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `comment` text NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `article_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `comment`, `status`, `article_id`, `created_at`) VALUES
(1, 'OhmYim', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fugit mollitia nesciunt iste consequatur est dolores itaque optio doloribus laudantium asperiores quidem autem, et ut nostrum, soluta minus rem aliquam deserunt corporis. Est itaque error dignissimos aliquam, fugit qui autem quo illum debitis totam ducimus accusantium nesciunt aperiam, rem dolorum', 1, 13, '2023-02-28 08:58:24'),
(2, 'Phongphan', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fugit mollitia nesciunt iste consequatur est dolores itaque optio doloribus laudantium asperiores quidem autem, et ut nostrum, soluta minus rem aliquam deserunt corporis. Est itaque error dignissimos aliquam, fugit qui autem quo illum debitis totam ducimus accusantium nesciunt aperiam, rem dolorum', 1, 12, '2023-02-28 08:58:44'),
(3, 'OhmYim', 'This is a dummy commment', 1, 14, '2023-03-03 06:02:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
