-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2024 at 02:49 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `backend`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_universities`
--

CREATE TABLE `about_universities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `video` varchar(255) DEFAULT NULL,
  `description_video` text DEFAULT NULL,
  `description` text NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_universities`
--

INSERT INTO `about_universities` (`id`, `title`, `image`, `video`, `description_video`, `description`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Non odio dolor distinctio autem consequatur.', 'https://via.placeholder.com/640x480.png/005533?text=qui', 'https://via.placeholder.com/640x480.png/00ee99?text=et', 'Eaque omnis vel accusantium a esse aperiam qui. Mollitia iste harum deleniti. Vel voluptatem repudiandae enim quis. Molestiae architecto ut fugit nemo nisi quidem quaerat.', 'Deleniti qui consequatur modi. Molestiae quod voluptatem aut totam aut maxime. Occaecati vero accusantium corporis tenetur nostrum. Voluptates dicta accusantium ad quia quaerat sit nihil.', 11, '2024-04-25 17:26:23', '2024-04-25 17:26:23'),
(2, 'At accusamus provident nisi sed.', 'https://via.placeholder.com/640x480.png/006600?text=quae', 'https://via.placeholder.com/640x480.png/002222?text=veritatis', 'Ex dolor nihil sapiente eum quibusdam perspiciatis dolorem. Repudiandae nihil cupiditate voluptas earum esse qui. Et nemo qui doloremque aperiam nam qui quisquam. Alias eaque tempore ad in inventore sequi in.', 'Fuga omnis fugit nemo. Ullam qui eos ut tempora est cumque ut. Suscipit totam commodi veritatis nisi veniam sed perspiciatis neque. Nostrum corporis illum enim aspernatur voluptate.', 7, '2024-04-25 17:26:23', '2024-04-25 17:26:23'),
(3, 'Recusandae et facere aliquid voluptas officiis eligendi.', 'https://via.placeholder.com/640x480.png/000066?text=quia', NULL, 'Vitae et earum voluptatem deleniti maiores. Unde magni ad et voluptatibus architecto dolores. Voluptatibus sunt omnis blanditiis autem voluptatem reiciendis dignissimos.', 'Exercitationem dolorum velit mollitia voluptatum deserunt quibusdam cupiditate. Omnis magnam aut iusto et et optio. Enim velit reprehenderit voluptas quo corporis quis totam. Consequatur omnis sed necessitatibus consequatur.', 14, '2024-04-25 17:26:23', '2024-04-25 17:26:23');

-- --------------------------------------------------------

--
-- Table structure for table `applyings`
--

CREATE TABLE `applyings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `category` enum('staff','student') NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applyings`
--

INSERT INTO `applyings` (`id`, `title`, `description`, `image`, `category`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Quia architecto veniam occaecati accusantium perferendis.', 'Quo atque ipsa nesciunt dolor. Vitae labore modi aliquam aliquam atque enim omnis necessitatibus. Consectetur placeat qui commodi.', 'https://via.placeholder.com/640x480.png/00eeaa?text=quis', 'staff', 46, '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(2, 'Ut minus sapiente dolores voluptatem nesciunt.', 'Repellat saepe labore aliquid aut quibusdam ratione velit. Quae praesentium provident eos ducimus aperiam numquam excepturi. Omnis facere quisquam sit nihil.', 'https://via.placeholder.com/640x480.png/004477?text=eum', 'student', 33, '2024-04-25 17:26:28', '2024-04-25 17:26:28');

-- --------------------------------------------------------

--
-- Table structure for table `apply_staff`
--

CREATE TABLE `apply_staff` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category` enum('administrative','teaching_staff','other') NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `apply_staff`
--

INSERT INTO `apply_staff` (`id`, `title`, `description`, `image`, `category`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Maxime veniam ratione dolorum nisi nobis.', 'Aperiam consequatur molestiae unde. Cum animi fugit ea voluptatem similique et. Recusandae expedita eveniet omnis vitae. Rem maxime voluptas quis autem qui et.', 'https://via.placeholder.com/640x480.png/005577?text=eius', 'administrative', 30, '2024-04-25 17:26:29', '2024-04-25 17:26:29'),
(2, 'Quia qui animi neque omnis.', 'Fugiat ut ut tenetur sit quis est. Sit delectus quis laborum non. Ut aut qui sed quos.', 'https://via.placeholder.com/640x480.png/0066aa?text=maxime', 'other', 7, '2024-04-25 17:26:29', '2024-04-25 17:26:29'),
(3, 'Incidunt omnis voluptatem et unde commodi.', 'Veritatis voluptatem esse reiciendis ullam maxime sed. Cum vel facere dolorem quis.', 'https://via.placeholder.com/640x480.png/00cc33?text=rerum', 'teaching_staff', 43, '2024-04-25 17:26:29', '2024-04-25 17:26:29'),
(4, 'Vel qui incidunt in maxime.', 'Temporibus deserunt eum placeat rerum aut voluptates. Nihil neque qui dignissimos et et. Aut eveniet ut ea atque quaerat.', 'https://via.placeholder.com/640x480.png/00bb11?text=aut', 'teaching_staff', 17, '2024-04-25 17:26:29', '2024-04-25 17:26:29'),
(5, 'Ut in et sunt non quae aperiam nam.', 'Et ut et debitis aperiam dolorum qui ea est. Quia aliquid dolor aut voluptatum. Dolor est eos architecto nostrum nostrum recusandae eaque. Minus accusamus exercitationem maxime.', 'https://via.placeholder.com/640x480.png/004455?text=illum', 'teaching_staff', 6, '2024-04-25 17:26:29', '2024-04-25 17:26:29');

-- --------------------------------------------------------

--
-- Table structure for table `apply_studies`
--

CREATE TABLE `apply_studies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `graduate` enum('hight_school','industrial','industrial_institute') NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `faculty_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `apply_studies`
--

INSERT INTO `apply_studies` (`id`, `title`, `description`, `image`, `graduate`, `user_id`, `faculty_id`, `created_at`, `updated_at`) VALUES
(1, 'Business Administration Program', 'This is the description for Business Administration program', 'https://via.placeholder.com/640x480.png/00cc66?text=corrupti', 'hight_school', 2, 1, '2024-04-25 17:26:29', '2024-04-25 17:26:29'),
(2, 'Medicine Program', 'This is the description for Medicine program', 'https://via.placeholder.com/640x480.png/002233?text=commodi', 'industrial_institute', 37, 2, '2024-04-25 17:26:29', '2024-04-25 17:26:29'),
(3, 'Business Administration Program', 'This is the description for Business Administration program', 'https://via.placeholder.com/640x480.png/00aa77?text=quaerat', 'hight_school', 7, 2, '2024-04-25 17:26:29', '2024-04-25 17:26:29'),
(4, 'Marketing Program', 'This is the description for Marketing program', 'https://via.placeholder.com/640x480.png/00ddaa?text=laboriosam', 'industrial_institute', 39, 2, '2024-04-25 17:26:29', '2024-04-25 17:26:29'),
(5, 'Law Program', 'This is the description for Law program', 'https://via.placeholder.com/640x480.png/00cc66?text=velit', 'industrial', 22, 2, '2024-04-25 17:26:29', '2024-04-25 17:26:29'),
(6, 'Marketing Program', 'This is the description for Marketing program', 'https://via.placeholder.com/640x480.png/00ffaa?text=modi', 'industrial', 37, 1, '2024-04-25 17:26:29', '2024-04-25 17:26:29');

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `staff_programs_id` bigint(20) UNSIGNED DEFAULT NULL,
  `staff_members_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `certificates`
--

INSERT INTO `certificates` (`id`, `title`, `description`, `user_id`, `staff_programs_id`, `staff_members_id`, `created_at`, `updated_at`) VALUES
(1, 'Nostrum ducimus qui voluptatem expedita.', 'Optio ut ipsam minus eum sapiente earum autem voluptas. Rem ullam quod ut ducimus voluptatem nobis. Omnis praesentium autem nihil fugiat et modi. Magni dolorem aliquam at voluptas dolor consectetur. Et impedit voluptates fugiat incidunt quis assumenda.', 16, NULL, 9, '2024-04-25 17:26:25', '2024-04-25 17:26:25'),
(2, 'Alias non qui placeat magni est in.', 'Aperiam voluptas consectetur fuga et perferendis ut. Quae adipisci ut quidem nemo nemo provident rem. Eos sint sequi et quas libero.', 17, 1, NULL, '2024-04-25 17:26:25', '2024-04-25 17:26:25'),
(3, 'Doloribus voluptatum consequatur consequuntur quis enim rerum.', 'Consequatur ut error aut consequatur voluptatem voluptates reiciendis. Sit tenetur maxime sint eaque quibusdam recusandae. Voluptate repellendus error quisquam eos neque sed dolores. Rem odio molestiae quaerat excepturi nobis. Porro ducimus quia ipsum nihil.', 18, 4, NULL, '2024-04-25 17:26:25', '2024-04-25 17:26:25'),
(4, 'Repudiandae laborum facilis hic dolorem et.', 'Quis veritatis totam quam a nihil. Numquam qui est ut blanditiis praesentium.', 19, 3, NULL, '2024-04-25 17:26:25', '2024-04-25 17:26:25'),
(5, 'Cupiditate rerum perspiciatis et aspernatur.', 'Rem beatae dignissimos et neque ut. Eum quo ratione dolor consequatur eos omnis dolores repellat. Sed asperiores itaque sint quidem.', 20, 5, NULL, '2024-04-25 17:26:25', '2024-04-25 17:26:25'),
(6, 'Nihil est molestiae modi nam ex est totam.', 'Ducimus aliquid sed id tempora. Ut ab aperiam dicta aut molestiae. Mollitia iure dolores magnam sint.', 21, NULL, 9, '2024-04-25 17:26:25', '2024-04-25 17:26:25'),
(7, 'Explicabo rerum sequi maiores ex qui deserunt illum.', 'Reprehenderit impedit molestiae nisi quae nesciunt doloribus. Exercitationem nihil unde eum. Sint doloribus iure consequuntur libero cumque. Saepe sed veniam labore porro. Et veritatis rerum hic tempora ad ut.', 22, 10, NULL, '2024-04-25 17:26:25', '2024-04-25 17:26:25'),
(8, 'Quod quos ut labore quos.', 'Quia dicta mollitia beatae aut. Est aut nobis tempora dignissimos ducimus atque voluptatem. Blanditiis unde laborum molestias consequatur.', 23, NULL, 7, '2024-04-25 17:26:25', '2024-04-25 17:26:25'),
(9, 'Qui magni unde temporibus quia id maiores.', 'Distinctio porro voluptatem eum numquam quo nisi. Autem assumenda rerum earum laboriosam qui officia deserunt. Fuga recusandae illo et odit quas modi. Libero tempore alias odit. Et natus beatae sint enim error tempora.', 24, 7, NULL, '2024-04-25 17:26:25', '2024-04-25 17:26:25'),
(11, 'Tempora quisquam sit delectus et possimus non.', 'Aut eos ab dolorem non. Corporis rem qui officiis vel nesciunt. Corporis doloremque tenetur sed fugit. Omnis et et aut molestiae sint ut.', 26, 4, NULL, '2024-04-25 17:26:25', '2024-04-25 17:26:25'),
(12, 'Aut ab omnis et illum.', 'Molestiae corporis quo impedit voluptas. Doloremque dolore debitis neque esse. Eaque et eum corrupti minima.', 27, NULL, 5, '2024-04-25 17:26:25', '2024-04-25 17:26:25'),
(13, 'Consequuntur perspiciatis sit quia.', 'Labore rerum aperiam voluptates ad eius. Asperiores unde et laudantium id ipsam veniam rem voluptatem. Veritatis ut in facilis. Corrupti iure officia praesentium ut iusto mollitia vero cupiditate.', 28, NULL, 5, '2024-04-25 17:26:25', '2024-04-25 17:26:25'),
(14, 'Aliquam quas placeat blanditiis ipsa ab fugiat.', 'Dolor omnis consequuntur consequatur tempore quo. Facere nam quia minima iusto culpa deleniti quo. Dolorem est numquam voluptates voluptas nulla dolorem neque.', 29, NULL, 1, '2024-04-25 17:26:25', '2024-04-25 17:26:25'),
(15, 'Est aut veniam possimus cumque nemo.', 'Sint minus blanditiis et et. Qui cupiditate dolorem necessitatibus officia consequatur sint eum. Aspernatur odio dolorem incidunt architecto.', 30, 8, NULL, '2024-04-25 17:26:25', '2024-04-25 17:26:25'),
(16, 'Aperiam ullam adipisci qui ea culpa ut dolor.', 'Aliquid ut nemo reiciendis labore officiis. Neque nostrum dolor voluptate assumenda debitis voluptas. Asperiores eaque omnis aut.', 31, NULL, 6, '2024-04-25 17:26:25', '2024-04-25 17:26:25'),
(17, 'Ullam et sequi eos dignissimos et.', 'Voluptate optio cupiditate cum et. Et laudantium similique provident ratione eaque. Velit architecto quo voluptas dolorum excepturi. Adipisci deleniti odit qui. Quia illo esse porro repudiandae.', 32, NULL, 1, '2024-04-25 17:26:25', '2024-04-25 17:26:25');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `logo` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `video` varchar(255) DEFAULT NULL,
  `description_video` text DEFAULT NULL,
  `vision` text DEFAULT NULL,
  `mission` text DEFAULT NULL,
  `faculty_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `description`, `logo`, `image`, `video`, `description_video`, `vision`, `mission`, `faculty_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Health Informatics Technology', 'Natus rerum facere cupiditate reprehenderit enim mollitia. Non ad distinctio quo excepturi voluptatem. Omnis odio aut minima fugiat atque velit.', 'https://via.placeholder.com/640x480.png/0088cc?text=labore', 'https://via.placeholder.com/640x480.png/00bbee?text=sint', 'http://www.lowe.com/recusandae-enim-eum-aliquam-non-qui-tempora', 'Repellendus nam rerum aspernatur in at nisi. Consequuntur sit saepe et consectetur maxime esse. Laborum sed omnis adipisci et quibusdam itaque.', 'Esse culpa ut assumenda aut impedit eos id.', 'Dignissimos sint enim hic temporibus ut.', 2, 7, '2024-04-25 17:26:23', '2024-04-25 17:26:23'),
(2, 'Nursing Assistant Technology', 'Beatae dolor corporis sequi soluta ut. Ab aut ad non. Ut commodi distinctio voluptatum quia quis.', 'https://via.placeholder.com/640x480.png/002222?text=rerum', 'https://via.placeholder.com/640x480.png/0088ff?text=eaque', 'https://www.beahan.com/voluptatem-natus-recusandae-reprehenderit-et-commodi-officiis', 'Suscipit consequatur commodi in ut. Sit exercitationem molestiae delectus sit. Asperiores culpa vero rerum et maiores.', 'Saepe tempora aperiam quisquam perspiciatis voluptatem cupiditate repellat sint.', 'Ea possimus eveniet magnam.', 2, 12, '2024-04-25 17:26:23', '2024-04-25 17:26:23'),
(3, 'Prosthodontics Technology', 'Consequatur soluta in incidunt. Iusto eum occaecati maxime fuga praesentium ab quod. Dicta est in eos repudiandae vel voluptas.', 'https://via.placeholder.com/640x480.png/00cc00?text=et', 'https://via.placeholder.com/640x480.png/0044ee?text=consequatur', 'http://www.kuhlman.biz/aspernatur-itaque-nostrum-labore-libero-nihil-ea-rerum.html', 'Voluptatem est nostrum sint impedit quo quas. Blanditiis modi est assumenda excepturi optio.', 'Ipsum at vel aliquam dolorem.', 'Nemo porro eaque rerum qui aperiam qui.', 2, 7, '2024-04-25 17:26:23', '2024-04-25 17:26:23'),
(4, 'Pharmaceutical Technology', 'Illo esse quo distinctio impedit. Fuga incidunt necessitatibus repudiandae omnis minus voluptatum vero. Laborum velit nulla placeat voluptas non.', 'https://via.placeholder.com/640x480.png/002255?text=commodi', 'https://via.placeholder.com/640x480.png/00bb77?text=dolor', 'http://adams.net/non-consequatur-quis-corporis.html', 'Nihil officiis rerum aliquid temporibus quo. Et deserunt magni et asperiores. Ratione mollitia perspiciatis laudantium enim.', 'Sapiente unde quaerat ullam earum.', 'Sit alias vitae consequatur repellat et est.', 2, 14, '2024-04-25 17:26:23', '2024-04-25 17:26:23'),
(5, 'Technology of tractors and agricultural equipment', 'Optio et quos reprehenderit. Ab velit sed corrupti sit tempora magni velit et. Facilis corporis aliquam vel earum aut laborum recusandae.', 'https://via.placeholder.com/640x480.png/00bb22?text=est', 'https://via.placeholder.com/640x480.png/005511?text=est', 'http://upton.com/nostrum-explicabo-modi-quibusdam.html', 'Aut pariatur maiores nulla illum. Reiciendis ratione veritatis molestiae eos dicta. Sit eius aliquam doloremque est dolor est similique. Ipsum facere ut numquam labore nulla quo doloremque.', 'Animi laborum est aut sunt.', 'Est vel animi quibusdam sed rerum et.', 1, 13, '2024-04-25 17:26:23', '2024-04-25 17:26:23'),
(6, 'Health Informatics Technology', 'Odit consectetur culpa tempora est sed qui. Laborum totam et odio eos autem. Mollitia sed provident sit est voluptatibus iste et. Delectus occaecati pariatur id sit ut minus.', 'https://via.placeholder.com/640x480.png/0088bb?text=facere', 'https://via.placeholder.com/640x480.png/00eedd?text=corporis', 'http://www.boyer.net/', 'Quia facere in autem consequatur deserunt quos quo porro. Quis voluptatem cumque in doloremque tempora. Ratione velit vel quae qui ipsum. Repellat amet ratione et reprehenderit quae. Dolores incidunt illo quidem ut.', 'Nihil quam facere fugit amet neque.', 'Dolorem quo veniam cumque.', 2, 14, '2024-04-25 17:26:23', '2024-04-25 17:26:23'),
(7, 'Railway technology', 'Voluptas et aut sed. Aut dolorem ut nesciunt quis aut nulla nemo. Nemo inventore qui ut et enim.', 'https://via.placeholder.com/640x480.png/0066ee?text=qui', 'https://via.placeholder.com/640x480.png/0055cc?text=qui', 'http://hessel.info/nulla-rerum-distinctio-corporis-et-exercitationem-reiciendis-quasi', 'Est exercitationem doloribus quos labore qui tempore omnis. Quia voluptates dolorem molestiae qui enim aut ut. Qui eius ea dolores quo.', 'Libero odit optio alias maxime aut alias modi qui.', 'Eum ipsum delectus autem quae et aut optio.', 1, 14, '2024-04-25 17:26:23', '2024-04-25 17:26:23'),
(8, 'Technology of tractors and agricultural equipment', 'Excepturi quo voluptatibus facere dolorum ut ut ipsa a. Provident accusamus odit molestiae voluptas autem.', 'https://via.placeholder.com/640x480.png/00eebb?text=reprehenderit', 'https://via.placeholder.com/640x480.png/00ff55?text=consectetur', 'https://www.mcdermott.com/nihil-voluptatem-sit-aspernatur', 'Tenetur voluptate consectetur recusandae rerum ullam quibusdam voluptatem eligendi. Temporibus qui temporibus quae itaque aspernatur.', 'Adipisci facilis asperiores fugit.', 'Quod possimus vero sed.', 1, 8, '2024-04-25 17:26:23', '2024-04-25 17:26:23'),
(9, 'Technology of tractors and agricultural equipment', 'Non voluptas corrupti eum sunt facilis iusto consequatur. Rerum voluptatem velit ad.', 'https://via.placeholder.com/640x480.png/00cc11?text=non', 'https://via.placeholder.com/640x480.png/0011cc?text=repudiandae', 'http://oberbrunner.net/et-repudiandae-ad-qui-magni-blanditiis-ut', 'Neque nulla a consequuntur quod quam veniam et. Ut laborum eligendi est iure. Repellat repellat officiis molestiae veritatis fuga iure.', 'Commodi dolores quia numquam aut.', 'Ea qui natus totam aut sunt excepturi.', 1, 6, '2024-04-25 17:26:23', '2024-04-25 17:26:23'),
(10, 'Technology of tractors and agricultural equipment', 'Beatae numquam blanditiis esse ipsam voluptatum sit molestias. Nostrum quos illum officia.', 'https://via.placeholder.com/640x480.png/002244?text=officia', 'https://via.placeholder.com/640x480.png/00ddaa?text=tenetur', 'http://gerhold.biz/laborum-iste-et-sapiente-dolorem-iure-delectus-adipisci', 'Ut inventore quia recusandae temporibus et. Sapiente aperiam sunt non excepturi nihil quasi. Distinctio quia placeat voluptatem eligendi consequuntur ut dignissimos aut.', 'Et quos velit enim delectus repellat sed ducimus.', 'Eos dolorem eos vitae ut suscipit sint.', 1, 4, '2024-04-25 17:26:23', '2024-04-25 17:26:23');

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `counter_number` int(11) DEFAULT NULL,
  `category` enum('counter','activity') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id`, `title`, `description`, `image`, `counter_number`, `category`, `created_at`, `updated_at`) VALUES
(1, 'faculty', NULL, 'https://linkdhub.github.io/batu-images/images/image%20(1).svg', 2, 'counter', '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(2, 'students', NULL, 'https://linkdhub.github.io/batu-images/images/image%20(5).svg', 3082, 'counter', '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(3, 'programs', NULL, 'https://linkdhub.github.io/batu-images/images/image%20(4).svg', 9, 'counter', '2024-04-25 17:26:28', '2024-04-25 17:26:28');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date` datetime DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `date`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Et voluptatem itaque non in voluptas aut voluptas.', 'Neque repellendus quae nostrum consequuntur. Et deleniti qui ut suscipit pariatur. Pariatur consequuntur voluptas earum unde ducimus sed.', '2024-04-05 13:09:15', 34, '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(2, 'Nesciunt aut qui excepturi fugit modi et non.', 'Dignissimos aut adipisci beatae perspiciatis. Est consequuntur ratione hic veritatis saepe doloribus. Deserunt corrupti et aliquid eveniet eaque et ut.', '2024-04-20 12:20:34', 11, '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(3, 'Voluptas animi inventore in ipsam.', 'Rerum voluptates inventore doloribus libero ipsa molestias. Aliquam mollitia ea nisi saepe non illum.', '2024-04-14 08:20:31', 32, '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(4, 'Ut tempore quos odit eaque fuga facere ut.', 'Recusandae autem fugiat ullam. Recusandae quis at a. Itaque aut rerum consectetur molestias dolorum praesentium. Nobis sed deserunt tempora et veniam culpa.', '2024-04-03 06:13:58', 30, '2024-04-25 17:26:28', '2024-04-25 17:26:28');

-- --------------------------------------------------------

--
-- Table structure for table `event_media`
--

CREATE TABLE `event_media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_media`
--

INSERT INTO `event_media` (`id`, `event_id`, `image`, `video`, `created_at`, `updated_at`) VALUES
(1, 1, 'https://via.placeholder.com/640x480.png/00bb22?text=facilis', NULL, '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(2, 3, 'https://via.placeholder.com/640x480.png/00ee33?text=et', NULL, '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(3, 2, 'https://via.placeholder.com/640x480.png/000011?text=at', NULL, '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(4, 3, 'https://via.placeholder.com/640x480.png/000055?text=voluptatem', 'https://via.placeholder.com/640x480.png/00ff66?text=dolores', '2024-04-25 17:26:28', '2024-04-25 17:26:28');

-- --------------------------------------------------------

--
-- Table structure for table `event_staff_programs`
--

CREATE TABLE `event_staff_programs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `staff_program_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_staff_programs`
--

INSERT INTO `event_staff_programs` (`id`, `event_id`, `staff_program_id`, `created_at`, `updated_at`) VALUES
(1, 1, 3, '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(2, 1, 4, '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(4, 1, 7, '2024-04-25 17:26:28', '2024-04-25 17:26:28');

-- --------------------------------------------------------

--
-- Table structure for table `faculties`
--

CREATE TABLE `faculties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `video` varchar(255) DEFAULT NULL,
  `description_video` text DEFAULT NULL,
  `vision` text DEFAULT NULL,
  `mission` text DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faculties`
--

INSERT INTO `faculties` (`id`, `name`, `description`, `image`, `logo`, `video`, `description_video`, `vision`, `mission`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Industry and Energy College', 'Unde rerum nostrum iusto dolor at aliquam cum cum. Omnis ex non fuga. Expedita fugiat esse consequatur adipisci eos officiis. Ipsam quasi odio quasi qui asperiores hic a.', 'https://via.placeholder.com/640x480.png/003322?text=porro', 'https://via.placeholder.com/640x480.png/00ee22?text=ut', 'http://rodriguez.net/pariatur-sint-rerum-harum-ut-eaque-autem-a-nihil.html', 'https://www.eichmann.com/eius-ipsam-eveniet-consequuntur-iste-velit-architecto-deleniti', 'Voluptatem porro eos placeat. Consequatur sed aliquam occaecati earum et quisquam quod id. Voluptatem eius dolor laborum ut quis libero recusandae. Et rerum sit labore minima dolor. Quaerat placeat dolores magnam dolore quod enim.', 'Voluptatem ipsum temporibus minus esse eos aut quo. Aut temporibus reiciendis fugiat accusantium. Atque voluptatem ullam incidunt iure nobis quia.', 13, '2024-04-25 17:26:23', '2024-04-25 17:26:23'),
(2, 'Industry and Energy College', 'Magni sint cupiditate eos omnis perferendis repudiandae. Et distinctio et omnis sit temporibus et. Sit sunt repellat aut libero ut. Neque dicta voluptatem minus sit voluptatem enim.', 'https://via.placeholder.com/640x480.png/00cc44?text=labore', 'https://via.placeholder.com/640x480.png/0055dd?text=et', 'https://corkery.com/incidunt-qui-nemo-at-magnam-corporis.html', 'http://rolfson.biz/', 'Et ex aliquid eligendi voluptatem ratione provident in qui. Odit eligendi sit est quo vitae. Quos dolorem esse excepturi ipsam aut nostrum minus.', 'Quis repellendus hic sed. Perferendis earum beatae aut porro vitae. Vitae esse ex placeat est magni molestias corrupti.', 12, '2024-04-25 17:26:23', '2024-04-25 17:26:23');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_agents`
--

CREATE TABLE `faculty_agents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `category` enum('services','approach','header') NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faculty_agents`
--

INSERT INTO `faculty_agents` (`id`, `title`, `image`, `description`, `category`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Sit qui illum nemo.', 'https://via.placeholder.com/640x480.png/0044bb?text=veniam', 'Accusantium possimus animi amet fugit ut consequatur odit. Libero inventore iste asperiores ut amet totam soluta et. Non magni quis incidunt eos libero.', 'header', 1, '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(2, 'Neque aut voluptate dolor et pariatur.', 'https://via.placeholder.com/640x480.png/003377?text=praesentium', 'Est voluptatem enim distinctio eveniet. Aut harum sit nulla illo illo.', 'header', 17, '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(3, 'Ex ab dicta ad necessitatibus ratione.', 'https://via.placeholder.com/640x480.png/00bb55?text=provident', 'Est quia qui asperiores et. Sunt sequi vitae molestiae libero est consequuntur.', 'header', 6, '2024-04-25 17:26:28', '2024-04-25 17:26:28');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_agent_staff`
--

CREATE TABLE `faculty_agent_staff` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `word` text NOT NULL,
  `cv` varchar(255) DEFAULT NULL,
  `position` varchar(255) NOT NULL,
  `faculty_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faculty_agent_staff`
--

INSERT INTO `faculty_agent_staff` (`id`, `name`, `image`, `email`, `word`, `cv`, `position`, `faculty_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Wendy Streich', 'https://via.placeholder.com/640x480.png/006600?text=repellat', 'xjacobs@cormier.com', 'Doloribus beatae soluta ut et deserunt. Ut reiciendis veniam voluptatem sit. Ex fugit rerum quod est numquam dolorum.', 'http://www.smitham.com/quasi-est-reiciendis-possimus-velit.html', 'Washing Equipment Operator', 1, 31, '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(2, 'Mr. Dorthy Barrows', 'https://via.placeholder.com/640x480.png/008833?text=sunt', 'belle.weber@breitenberg.com', 'Aut dolorum corrupti sapiente explicabo officia voluptatem optio. Ex vel vel consequatur et nesciunt. Vitae porro cupiditate accusantium sint. Provident harum officiis non exercitationem.', 'http://www.kuphal.com/et-in-eum-vel-iste-occaecati-ea-est-praesentium', 'Numerical Control Machine Tool Operator', 1, 41, '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(3, 'Camron Padberg DVM', 'https://via.placeholder.com/640x480.png/0077ee?text=commodi', 'vita38@renner.com', 'Velit voluptatem ab vel eum ut in autem ut. Autem aut modi aut aut ipsa. Praesentium cumque assumenda consequatur. Aliquam et amet dignissimos quo saepe molestiae libero.', 'https://dickens.org/sed-odio-quia-sequi-totam-et-rerum-est.html', 'Automotive Master Mechanic', 2, 36, '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(4, 'Miss Maritza Hill I', 'https://via.placeholder.com/640x480.png/00dd88?text=eum', 'xkirlin@jast.com', 'Est fugit at ut laborum perspiciatis sunt rerum. Eos nihil beatae rerum dolore nesciunt dolores amet. Voluptatum et est recusandae voluptates. Laborum consequatur aut voluptates. Magnam vel et non molestias at.', 'http://nikolaus.com/eum-pariatur-excepturi-quaerat-suscipit.html', 'Machinist', 2, 4, '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(5, 'Aleen Orn', 'https://via.placeholder.com/640x480.png/00ffdd?text=quo', 'alicia50@yahoo.com', 'Ullam laudantium repudiandae eaque esse non deleniti occaecati hic. Fugiat aliquid vel quo. Omnis distinctio placeat expedita blanditiis. Dolores voluptas et molestiae commodi voluptatem ut quisquam.', 'http://aufderhar.net/suscipit-repudiandae-provident-adipisci-sit-in-sunt', 'Petroleum Engineer', 1, 22, '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(6, 'Dr. Clare Hegmann', 'https://via.placeholder.com/640x480.png/009988?text=neque', 'ophelia.powlowski@powlowski.biz', 'Dolorum velit iusto ratione et repellat id odio. Officia excepturi ipsa nulla placeat perspiciatis totam commodi. Sed rerum non optio dolore facilis deleniti. Vel facere non mollitia similique sint quas.', 'http://www.stracke.org/et-qui-quod-pariatur-autem-sequi-architecto', 'Writer OR Author', 2, 16, '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(7, 'Leonel Tremblay', 'https://via.placeholder.com/640x480.png/000033?text=hic', 'wilkinson.ezequiel@nolan.net', 'Quae debitis et labore et ipsam nulla. Eligendi numquam provident odit necessitatibus dicta. Esse ut non placeat qui temporibus voluptas.', 'http://keebler.com/quo-odit-itaque-dolor-maiores-tenetur', 'Prosthodontist', 1, 42, '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(8, 'Prof. Levi Ruecker', 'https://via.placeholder.com/640x480.png/00ee55?text=dolorem', 'joana.kertzmann@hotmail.com', 'Esse corporis est soluta sit odio ea. Deleniti accusamus mollitia nobis nulla suscipit. In ea ducimus et voluptatum aut. Nihil molestiae minus libero soluta laudantium provident consequatur.', 'https://crooks.com/quo-atque-qui-tempore.html', 'Talent Director', 2, 1, '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(9, 'Eleonore Kuhic', 'https://via.placeholder.com/640x480.png/0022ff?text=dolorum', 'kemmerich@mosciski.com', 'Sit molestiae iste laboriosam vel velit sit. Quia excepturi nisi dolorem corporis. Quia suscipit explicabo impedit rerum voluptatem impedit. Quia veniam esse repudiandae vitae.', 'http://www.rodriguez.org/fugit-eligendi-est-itaque-optio-et-nam-at-beatae', 'Engine Assembler', 1, 47, '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(10, 'Mrs. River Bins', 'https://via.placeholder.com/640x480.png/00bb77?text=officia', 'laila.stroman@yahoo.com', 'Libero vitae laudantium ex ea assumenda maiores. Porro praesentium quidem quidem saepe aut voluptatum. Quibusdam qui deserunt voluptatem quae aliquid maxime qui modi. Soluta aspernatur sunt enim qui.', 'https://shields.com/rerum-sit-eaque-eveniet.html', 'Substation Maintenance', 1, 39, '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(11, 'Dr. Jayson Oberbrunner I', 'https://via.placeholder.com/640x480.png/004444?text=reiciendis', 'ward.chet@wolf.biz', 'Accusantium est excepturi et minima repudiandae. Et vitae et eos. Et dolorem et quisquam minima nam dolores. Aperiam ut beatae et totam.', 'http://turcotte.com/', 'Word Processors and Typist', 1, 48, '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(12, 'Zoe Skiles', 'https://via.placeholder.com/640x480.png/0000cc?text=tempore', 'kaden.torp@gmail.com', 'Sequi laboriosam illo sint hic rerum perferendis eum cum. Facere rem praesentium quaerat atque. Pariatur rerum sunt soluta temporibus. Eligendi perspiciatis suscipit soluta.', 'http://ernser.biz/vero-autem-rerum-animi-delectus.html', 'Gaming Service Worker', 1, 40, '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(13, 'Prof. Marcella Carroll', 'https://via.placeholder.com/640x480.png/006666?text=deleniti', 'schaden.hannah@goldner.net', 'Et laudantium odit qui voluptatem voluptatum earum sint sunt. Aut corrupti quis veritatis nam qui ut.', 'http://www.mclaughlin.biz/nostrum-non-inventore-voluptas-cupiditate-sint-autem-enim', 'Mechanical Inspector', 2, 13, '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(14, 'Ola Hoeger', 'https://via.placeholder.com/640x480.png/00cccc?text=omnis', 'nader.patsy@yahoo.com', 'Distinctio repellendus consectetur corporis ab sequi architecto quod. Iusto voluptatem dicta adipisci ut. Ducimus nostrum est nesciunt ratione fuga enim voluptatem rem. Odit veritatis debitis vel est veniam expedita.', 'http://www.macejkovic.com/', 'Benefits Specialist', 2, 7, '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(15, 'Lyric Brown Sr.', 'https://via.placeholder.com/640x480.png/00bbff?text=saepe', 'raymundo.heathcote@crona.info', 'Et voluptatibus sapiente sapiente tenetur repellendus itaque neque. Id rerum enim rerum cum necessitatibus. Illum consequatur exercitationem qui nemo non velit omnis nulla.', 'http://www.watsica.com/sint-beatae-cum-libero-vitae-accusantium-voluptates-voluptas', 'Statement Clerk', 1, 9, '2024-04-25 17:26:28', '2024-04-25 17:26:28');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_leaders`
--

CREATE TABLE `faculty_leaders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `word` text NOT NULL,
  `cv` varchar(255) DEFAULT NULL,
  `position` varchar(255) NOT NULL,
  `category` enum('dean','vice') NOT NULL,
  `faculty_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faculty_leaders`
--

INSERT INTO `faculty_leaders` (`id`, `name`, `image`, `email`, `word`, `cv`, `position`, `category`, `faculty_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Terence Brown', 'https://via.placeholder.com/640x480.png/00ff66?text=molestiae', 'chirthe@gusikowski.org', 'Iure praesentium deserunt iste nemo tempora.', 'quasi.pdf', 'Dean', 'vice', 1, 3, '2024-04-25 17:26:27', '2024-04-25 17:26:27'),
(2, 'Nikko Pollich', 'https://via.placeholder.com/640x480.png/004444?text=est', 'mosciski.xzavier@hotmail.com', 'Aliquid quia vero pariatur suscipit accusantium totam.', 'possimus.pdf', 'Dean', 'dean', 1, 37, '2024-04-25 17:26:27', '2024-04-25 17:26:27'),
(3, 'Elaina Nienow', 'https://via.placeholder.com/640x480.png/00cc99?text=veniam', 'ostehr@gmail.com', 'Dignissimos excepturi minima id sint.', 'explicabo.pdf', 'Dean', 'vice', 2, 18, '2024-04-25 17:26:27', '2024-04-25 17:26:27'),
(4, 'Dr. Art Nikolaus', 'https://via.placeholder.com/640x480.png/00ff77?text=veritatis', 'cecile.jast@gmail.com', 'Hic voluptates incidunt in sequi occaecati ab est.', 'odio.pdf', 'Dean', 'dean', 1, 22, '2024-04-25 17:26:27', '2024-04-25 17:26:27');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `category` enum('complaint','question','proposal') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `phone`, `email`, `description`, `category`, `created_at`, `updated_at`) VALUES
(1, 'Mrs. Deanna Kub', '+1-409-532-7378', 'rhahn@gmail.com', 'Non nemo voluptas sit omnis dolore hic. Totam corrupti necessitatibus eveniet in voluptate. Autem in non excepturi soluta.', 'question', '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(2, 'Kenna Greenholt', '(931) 868-0492', 'karine.marquardt@gmail.com', 'Qui sit nulla magnam natus deserunt commodi. Velit sed magnam rerum et temporibus earum. Dolorem consequatur exercitationem aut explicabo illum veritatis. Repellat ex vero eligendi consequatur.', 'proposal', '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(3, 'Ms. Eldridge Jaskolski IV', '830-570-3715', 'yazmin.kassulke@gutkowski.com', 'Saepe delectus modi voluptas error tenetur. Aut rem et illo architecto hic. Aut quae aut magni autem voluptas saepe. Enim odit quia veniam corporis est est.', 'proposal', '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(4, 'Prof. Milo Koepp II', '458.369.5638', 'carroll.romaguera@murphy.com', 'Nisi nostrum voluptate nihil et est et libero sit. Quasi eos recusandae fuga magni vitae laudantium vel a. Impedit doloremque aut aut voluptas nobis.', 'question', '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(5, 'Elias Bartell', '+1-530-312-3878', 'okuneva.wilfred@mayer.com', 'Voluptas non suscipit eum. Illum molestias qui quis dolor possimus. Porro molestias soluta qui molestiae enim cum deleniti. Omnis eius ut ut doloribus.', 'question', '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(6, 'Joshuah McKenzie', '+1.570.370.3511', 'casey.goodwin@gibson.com', 'Provident consequuntur ad tenetur. Quia iusto expedita porro. Sunt delectus sit quis eum.', 'complaint', '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(7, 'Mr. Cristina Kiehn Sr.', '352.708.9866', 'emily.hermann@hilpert.com', 'Ea est maiores voluptas maiores. Tenetur ea eum libero necessitatibus. Omnis nesciunt dicta sed dolorum quia doloribus numquam. Tenetur amet autem dolorem repellat eaque.', 'proposal', '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(8, 'Prof. Cullen Heidenreich IV', '+1-415-975-7214', 'wroob@yahoo.com', 'Fuga dolorem debitis accusantium quia fugit unde recusandae mollitia. Mollitia iusto veritatis quas earum libero aspernatur ut. A aut non natus qui cupiditate rerum odio.', 'proposal', '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(9, 'Ebba Romaguera', '(520) 286-2494', 'gussie05@yahoo.com', 'Quia aperiam error ea dignissimos non autem reiciendis. Perferendis nam facilis hic corporis placeat. Dolor omnis nihil qui at itaque accusamus. Non esse officia in.', 'complaint', '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(10, 'Dr. Jacey Moore', '+1-458-525-1272', 'ebony.steuber@gmail.com', 'Voluptate aut nulla illo aut. Qui eos inventore ex qui. Exercitationem aut quo nihil odio sequi. Totam ea et nam minus et eligendi.', 'question', '2024-04-25 17:26:28', '2024-04-25 17:26:28');

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `grade_student_id` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(255) NOT NULL,
  `score` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grade_students`
--

CREATE TABLE `grade_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sitting_num` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `academic_year` enum('1','2','3','4') NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_applications`
--

CREATE TABLE `job_applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `cv` varchar(255) DEFAULT NULL,
  `position` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_applications`
--

INSERT INTO `job_applications` (`id`, `name`, `email`, `phone`, `description`, `cv`, `position`, `created_at`, `updated_at`) VALUES
(1, 'Merl Walter Jr.', 'winifred.daugherty@hotmail.com', '973-375-8416', 'Beatae iure impedit sit nemo dolor nobis excepturi. Ab error at ut ab dolore. Dignissimos a repudiandae dolores.', 'dolore.pdf', 'First-Line Supervisor-Manager of Landscaping, Lawn Service, and Groundskeeping Worker', '2024-04-25 17:26:29', '2024-04-25 17:26:29'),
(2, 'Prof. Ford O\'Keefe DVM', 'frederik.quitzon@casper.com', '+1-678-469-3780', 'Vitae fugiat eligendi iure repudiandae. Magnam autem possimus et non ipsam rerum sed enim. Autem ipsam praesentium accusamus esse itaque natus eum. Voluptas possimus dolores autem deserunt.', 'molestiae.pdf', 'Press Machine Setter, Operator', '2024-04-25 17:26:29', '2024-04-25 17:26:29'),
(3, 'Amber Johnston', 'lynch.nellie@terry.net', '530.690.2699', 'Ut ut aliquam optio aliquam maxime quam. Adipisci omnis voluptatum ut sunt adipisci perferendis numquam. Iste eveniet unde cum ea voluptates eaque occaecati.', 'voluptas.pdf', 'Kindergarten Teacher', '2024-04-25 17:26:29', '2024-04-25 17:26:29'),
(4, 'Mr. General Harvey', 'cruecker@schneider.com', '838-627-6577', 'Dolor ipsa soluta expedita voluptate. Sint saepe adipisci in omnis deserunt quo. Odit voluptatem magni ab optio earum natus.', 'numquam.pdf', 'Electronic Engineering Technician', '2024-04-25 17:26:29', '2024-04-25 17:26:29'),
(5, 'Claudie Hoeger', 'ischaefer@parker.com', '848-410-8165', 'Natus sunt nostrum veritatis ex magni vero doloremque. Consectetur ut consequatur non mollitia in. Ullam voluptatem est ipsa.', 'molestiae.pdf', 'Photographic Process Worker', '2024-04-25 17:26:29', '2024-04-25 17:26:29'),
(6, 'Mr. Trey Cormier', 'rippin.rachelle@kuphal.com', '1-234-554-5876', 'Soluta molestiae cum nesciunt quis animi ea enim sit. Incidunt assumenda vel dicta maiores sunt modi fugit. Placeat iure dicta temporibus et est.', 'consectetur.pdf', 'Biochemist or Biophysicist', '2024-04-25 17:26:29', '2024-04-25 17:26:29'),
(7, 'Maeve Stokes', 'leonel.bogan@yahoo.com', '(856) 313-2216', 'Cum occaecati natus ut. Ut quibusdam minus exercitationem nihil qui. Vero quaerat et qui quia ducimus quo.', 'dolor.pdf', 'Automotive Technician', '2024-04-25 17:26:29', '2024-04-25 17:26:29'),
(8, 'Ms. Joana Klein V', 'glittel@hotmail.com', '984-846-9515', 'Et doloremque ex ea rerum. Minus perferendis molestiae dolor inventore tenetur ut. Provident velit voluptatum itaque ipsum qui possimus aut. Modi id et laborum quia.', 'dolor.pdf', 'Farmer', '2024-04-25 17:26:29', '2024-04-25 17:26:29'),
(9, 'Josiane Kiehn', 'aurore.veum@jacobson.net', '+1-414-823-4322', 'Omnis labore odit aut veniam velit sequi exercitationem. Iure in at omnis sed omnis. Atque laborum reprehenderit velit beatae voluptatem impedit.', 'ratione.pdf', 'Photographic Restorer', '2024-04-25 17:26:29', '2024-04-25 17:26:29'),
(10, 'Mr. Luciano Cronin Jr.', 'fwilderman@yahoo.com', '+1.763.703.2716', 'Tenetur similique quis dolores excepturi culpa sed. Similique quisquam cum nulla.', 'omnis.pdf', 'Agricultural Worker', '2024-04-25 17:26:29', '2024-04-25 17:26:29'),
(11, 'Norma Stroman', 'schaden.ada@gmail.com', '+16144546961', 'Soluta consequatur est sunt et cupiditate consequuntur. Blanditiis nihil dignissimos quia iusto. Aut facere nulla deleniti porro. Eos saepe sunt perspiciatis libero qui.', 'ut.pdf', 'Gaming Manager', '2024-04-25 17:26:29', '2024-04-25 17:26:29'),
(12, 'Naomie Goodwin Sr.', 'rosalee01@gmail.com', '(339) 689-1956', 'Non minima porro rerum rem molestias rerum recusandae. Officia fugit numquam veniam exercitationem tempore. Consectetur et et sapiente totam. Voluptas et et aut culpa voluptas non et voluptas.', 'dolorem.pdf', 'Set and Exhibit Designer', '2024-04-25 17:26:29', '2024-04-25 17:26:29'),
(13, 'Dr. Marguerite Stroman', 'gsteuber@hills.com', '(484) 880-9163', 'Labore molestiae alias velit. Explicabo quo voluptas quibusdam ad alias ab. Quas sapiente aspernatur omnis eaque et nihil nisi alias.', 'ut.pdf', 'Photoengraving Machine Operator', '2024-04-25 17:26:29', '2024-04-25 17:26:29'),
(14, 'Adriel Cremin', 'michael.wolf@dicki.com', '+1-925-280-0925', 'Voluptatibus animi laborum iure dolores. Error dolores magnam mollitia magnam error voluptatum sequi debitis.', 'et.pdf', 'Tractor Operator', '2024-04-25 17:26:29', '2024-04-25 17:26:29'),
(15, 'Sim Swaniawski', 'urau@yahoo.com', '+1-240-687-1781', 'Adipisci qui ex nulla accusamus perferendis ut. Sit vero repellat et ex. Iste omnis voluptas totam ad.', 'sapiente.pdf', 'Industrial Equipment Maintenance', '2024-04-25 17:26:29', '2024-04-25 17:26:29'),
(16, 'Mr. Kennedy Marvin', 'leichmann@gmail.com', '(860) 280-5494', 'Dolore est similique dignissimos qui corrupti repellendus. Ea voluptatem aliquid cupiditate ut laborum repudiandae. Veritatis voluptas iure incidunt aspernatur. Quia nam quia eum.', 'commodi.pdf', 'Stringed Instrument Repairer and Tuner', '2024-04-25 17:26:29', '2024-04-25 17:26:29'),
(17, 'Dr. Doyle Mann', 'koss.pearl@kemmer.com', '1-484-377-6416', 'Perspiciatis aperiam quaerat consequatur temporibus libero aperiam omnis. Odit pariatur dignissimos delectus ducimus unde qui. Nemo quia esse eligendi quidem. Inventore quia officiis voluptas aut dolore labore adipisci.', 'qui.pdf', 'Dispatcher', '2024-04-25 17:26:29', '2024-04-25 17:26:29'),
(18, 'Harley Bednar', 'sfay@yahoo.com', '+1-435-262-5675', 'Repudiandae voluptatem tenetur vero excepturi. Impedit dicta commodi ullam aut. Eius minima magnam error delectus hic.', 'ducimus.pdf', 'Biologist', '2024-04-25 17:26:29', '2024-04-25 17:26:29'),
(19, 'Kali Watsica Sr.', 'kirlin.garth@carroll.com', '786-927-4036', 'Enim exercitationem qui et hic. Sed qui voluptatem ut. Labore aut quod odit ex. Ea qui exercitationem quia dolorem voluptate.', 'laboriosam.pdf', 'Command Control Center Officer', '2024-04-25 17:26:29', '2024-04-25 17:26:29'),
(20, 'Alfonzo King I', 'hudson.stanton@marks.com', '810.667.7488', 'Dolores nihil aut soluta ut dicta. Nostrum nostrum numquam dolores nihil aspernatur numquam. Dolor quos tenetur consequuntur error dolorum dolore reiciendis. Odit ex expedita et provident dolorum consectetur.', 'voluptatem.pdf', 'Record Clerk', '2024-04-25 17:26:29', '2024-04-25 17:26:29');

-- --------------------------------------------------------

--
-- Table structure for table `job_opportunities`
--

CREATE TABLE `job_opportunities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_opportunities`
--

INSERT INTO `job_opportunities` (`id`, `title`, `link`, `user_id`, `department_id`, `created_at`, `updated_at`) VALUES
(1, 'Mathematical Science Teacher', 'http://www.gibson.com/libero-nobis-porro-ullam-distinctio-accusamus-quis-sed.html', 4, 3, '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(2, 'Photographic Process Worker', 'https://www.rohan.biz/inventore-sit-iusto-dolor-autem-pariatur-quo', 49, 8, '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(3, 'Clerk', 'http://hand.com/unde-ad-mollitia-ipsa-et-rerum', 35, 10, '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(4, 'Loan Counselor', 'https://www.ledner.biz/molestiae-dolor-sapiente-id', 30, 4, '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(5, 'Clergy', 'http://www.powlowski.com/', 26, 10, '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(6, 'Clinical School Psychologist', 'http://www.wolff.com/commodi-nesciunt-natus-laudantium-optio.html', 8, 3, '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(7, 'Maid', 'http://orn.com/doloribus-soluta-officia-rem-omnis', 28, 5, '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(8, 'Claims Examiner', 'http://www.graham.net/', 37, 9, '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(9, 'Engineering', 'http://jaskolski.net/facere-blanditiis-nulla-eligendi-voluptate-ipsum', 12, 9, '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(10, 'Auditor', 'http://hodkiewicz.com/mollitia-quis-nihil-non', 46, 3, '2024-04-25 17:26:28', '2024-04-25 17:26:28');

-- --------------------------------------------------------

--
-- Table structure for table `leader_councils`
--

CREATE TABLE `leader_councils` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leader_councils`
--

INSERT INTO `leader_councils` (`id`, `name`, `image`, `position`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Hailie Ankunding', 'https://via.placeholder.com/640x480.png/0033dd?text=perspiciatis', 'Secretary', 24, '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(2, 'Dr. Keira Marquardt', 'https://via.placeholder.com/640x480.png/00ee77?text=illum', 'Secretary', 22, '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(3, 'Kylie Ullrich', 'https://via.placeholder.com/640x480.png/004444?text=dignissimos', 'President', 44, '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(4, 'Howell Waelchi', 'https://via.placeholder.com/640x480.png/00cc00?text=assumenda', 'Secretary', 9, '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(5, 'Jordane Ebert I', 'https://via.placeholder.com/640x480.png/00aa66?text=perspiciatis', 'Vice President', 41, '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(6, 'Nicola Grant IV', 'https://via.placeholder.com/640x480.png/00ddee?text=iste', 'Vice President', 20, '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(7, 'Khalid Reichert', 'https://via.placeholder.com/640x480.png/0066ff?text=perspiciatis', 'Secretary', 1, '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(8, 'Luna Padberg', 'https://via.placeholder.com/640x480.png/00dd00?text=et', 'Secretary', 33, '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(9, 'Lorine Goyette', 'https://via.placeholder.com/640x480.png/00ff22?text=eius', 'President', 25, '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(10, 'Mr. Frank Rippin', 'https://via.placeholder.com/640x480.png/004433?text=praesentium', 'President', 17, '2024-04-25 17:26:28', '2024-04-25 17:26:28');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_01_25_003755_create_posts_table', 1),
(6, '2024_01_25_131752_create_post_media_table', 1),
(7, '2024_01_25_225520_create_faculties_table', 1),
(8, '2024_01_25_233901_create_events_table', 1),
(9, '2024_01_25_234529_create_event_media_table', 1),
(10, '2024_01_26_000833_create_departments_table', 1),
(11, '2024_01_26_012614_create_student_projects_table', 1),
(12, '2024_02_11_114328_create_about_universities_table', 1),
(13, '2024_02_17_232025_create_staff_members_table', 1),
(14, '2024_02_17_232052_create_staff_programs_table', 1),
(15, '2024_02_24_211800_create_details_table', 1),
(16, '2024_02_26_010700_create_study_plans_table', 1),
(17, '2024_03_17_231838_create_event_staff_program_table', 1),
(18, '2024_04_10_171238_create_grade_students_table', 1),
(19, '2024_04_11_170640_create_grades_table', 1),
(20, '2024_04_16_064751_create_applyings_table', 1),
(21, '2024_04_17_230615_create_apply_staff_table', 1),
(22, '2024_04_17_230755_create_apply_studies_table', 1),
(23, '2024_04_18_071700_create_president_alerts_table', 1),
(24, '2024_04_18_071854_create_university_leaders_table', 1),
(25, '2024_04_18_071903_create_faculty_leaders_table', 1),
(26, '2024_04_18_072322_create_leader_councils_table', 1),
(27, '2024_04_18_072456_create_politics_table', 1),
(28, '2024_04_18_072606_create_researches_table', 1),
(29, '2024_04_18_072940_create_certificates_table', 1),
(30, '2024_04_18_073054_create_job_opportunities_table', 1),
(31, '2024_04_18_073444_create_social_links_table', 1),
(32, '2024_04_18_073918_create_feedback_table', 1),
(33, '2024_04_18_074213_create_job_applications_table', 1),
(34, '2024_04_20_222243_create_faculty_agents_table', 1),
(35, '2024_04_20_223129_create_faculty_agent_staff_table', 1),
(36, '2024_04_21_201528_create_staff_socials_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `politics`
--

CREATE TABLE `politics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `politics`
--

INSERT INTO `politics` (`id`, `title`, `description`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Molestias sed nostrum necessitatibus qui.', 'At nulla provident sunt cumque consequatur. Aut officiis perferendis dolorem. Fugit iste magni dolorum incidunt quia deserunt veritatis. Porro occaecati laboriosam est possimus occaecati ipsum inventore dolores.', 5, '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(2, 'Molestias dolorem voluptate aperiam quod eius.', 'Dignissimos officia laboriosam magnam modi perspiciatis laudantium. Laudantium ducimus commodi voluptatem ut sed autem. Dolorem et voluptatem molestiae ea. Sunt ullam assumenda pariatur distinctio. Et minima ex fugiat vitae.', 14, '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(3, 'Itaque fuga dolorem id magnam exercitationem repellat.', 'Officia unde nemo tenetur quod non. Officiis sint aut non nesciunt nesciunt tempore. Quia necessitatibus libero exercitationem commodi. Ex tenetur atque et a suscipit quia ipsam.', 2, '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(4, 'Voluptates vero ducimus officiis voluptatem sed omnis quidem ut.', 'Nihil et veniam necessitatibus nobis. Eum commodi sed et architecto ipsa. Esse explicabo facere repellendus perspiciatis deleniti. Velit voluptate voluptatem culpa veniam.', 26, '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(5, 'Dolorem qui laborum rerum est.', 'Asperiores quisquam qui ut incidunt est. Et minus suscipit molestiae corporis dicta. Veniam est ut alias mollitia ipsum earum et.', 36, '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(6, 'Recusandae consequuntur voluptatibus rerum quia.', 'Voluptatem ut nihil aut accusamus distinctio. Vel aut doloribus rerum quas. Saepe ut omnis perferendis est doloremque placeat mollitia.', 8, '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(7, 'Nulla quo fugiat labore iste blanditiis.', 'Laborum quod sapiente temporibus facere error. Nulla iusto esse corporis sit esse omnis. Sunt commodi at reprehenderit id sed impedit eaque.', 46, '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(8, 'Fugit voluptas nobis nostrum delectus debitis alias fuga.', 'Enim libero suscipit eum et occaecati quia. Minima non et ipsam architecto facilis. Voluptas excepturi aut autem fugiat incidunt totam. Earum debitis non delectus distinctio rerum dolorem. Quae commodi enim libero iusto.', 42, '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(9, 'Quia asperiores quo aut quae.', 'Aut soluta suscipit dolores aspernatur. Atque ut et cumque dignissimos. Assumenda tenetur optio accusantium fugit deserunt.', 13, '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(10, 'Sit fugit reprehenderit dicta error quo exercitationem est.', 'Fuga in voluptatum expedita. In numquam soluta quisquam harum eum omnis officia. Et culpa est repellat excepturi et est recusandae. Dolorem vel distinctio molestiae non vitae incidunt.', 48, '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(11, 'Quia nemo nam expedita fugit.', 'Iste praesentium omnis expedita corrupti. Ratione et debitis eum voluptas. Assumenda doloremque aperiam expedita dicta repudiandae ducimus. Sit quis sunt at vero. Reiciendis qui et quia sed dolore.', 17, '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(12, 'Saepe sunt corrupti maxime inventore.', 'Ad optio dolorem laudantium mollitia minima numquam. Inventore ut dicta amet ipsa. Perferendis ipsam soluta quia expedita numquam.', 46, '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(13, 'Laboriosam dolor perspiciatis quisquam dolorem non sit.', 'Laborum dolores cum inventore eum magni deserunt. Distinctio deleniti odit quia sed voluptates qui quam. Sed itaque quis blanditiis eligendi et repellendus fugit. Illo maxime nisi tenetur minus.', 40, '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(14, 'Sit placeat veniam sint voluptates fugiat pariatur.', 'Accusantium qui autem qui praesentium cupiditate repellat unde iste. Itaque deserunt deleniti qui. Molestiae voluptatum doloremque ea voluptatem et. Rerum impedit repellendus porro rerum et vel vitae.', 24, '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(15, 'Ut molestiae sit dignissimos.', 'Fugit sed est qui et aspernatur ex ipsum. Nemo aspernatur unde aut nulla necessitatibus ducimus. Sequi ipsum sint omnis vero fugiat explicabo. Et expedita eligendi voluptas reiciendis sunt quaerat nulla.', 31, '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(16, 'Quis vitae ipsam vitae id aut doloribus esse.', 'Ut fuga alias assumenda iure. Quia aut sit eos. Rerum laboriosam earum enim consectetur et voluptas veniam. Ullam omnis suscipit quisquam explicabo saepe natus praesentium.', 41, '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(17, 'Repellendus eaque molestiae et aut qui quos dignissimos.', 'Dolorem qui dolores distinctio non. Possimus assumenda culpa nihil est et sed. Sit ipsum enim facilis velit minus non.', 20, '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(18, 'In voluptas omnis repudiandae maxime voluptas excepturi velit.', 'Tenetur et est hic dolor iusto ut. Unde porro beatae sed fugiat et quia qui voluptatem. Voluptate voluptatum neque quo accusantium quod rerum.', 29, '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(19, 'Omnis autem omnis perferendis.', 'Sit omnis consequatur laudantium ut voluptate adipisci. Aut a nihil accusamus assumenda. Atque quas similique debitis dolorem doloribus omnis ullam. Sed minima nihil vitae quam molestiae.', 15, '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(20, 'Consequatur quo similique numquam tempore ut sed dolores.', 'Modi voluptas excepturi qui voluptatem. Est quod aut ut dignissimos aut aliquid quam sed. Aliquid illum est delectus odit debitis dicta. Eum amet omnis nesciunt est. Ipsa voluptatem non est natus incidunt error.', 25, '2024-04-25 17:26:28', '2024-04-25 17:26:28');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `type` enum('article','news') NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `description`, `type`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'جامعة برج العرب التكنولوجية تهنئ الأمة الإسلامية بعيد الفطر المبارك', 'تهنئ جامعة برج العرب التكنولوجية، برئاسة الاستاذ الدكتور محمد مرسي الجوهري، الأمة الإسلامية والسادة عمداء الكليات وأعضاء هيئة التدريس والعاملين بالجامعة ولجميع الطلاب والطالبات بمناسبة عيد الفطر المبارك، وتؤكد على أهمية التمسك بالقيم والمبادئ الإسلامية النبيلة. متمنية بأن يُعيد الله هذه المناسبة المباركة على الأمة الإسلامية بالخير واليمن والبركات. وتُؤكد الجامعة على التزامها بمواصلة رسالتها في نشر العلم والمعرفة، وإعداد جيل من الشباب القادر على مواكبة التطورات ', 'news', 8, '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(2, 'جامعة برج العرب التكنولوجية تشارك في حفل إفطار الأسرة المصرية', 'برعاية كريمة وبحضور  فخامة الرئيس عبد الفتاح السيسي، رئيس جمهورية مصر العربية، شاركت جامعة برج العرب التكنولوجية، برئاسة الأستاذ الدكتور محمد مرسي الجوهري، في حفل إفطار الأسرة المصرية الذي أقيم مساء اليوم بفندق الماسة بالقاهرة. وحضر الحفل عدد من كبار المسؤولين، من بينهم وزراء الحكومة، رجال الأزهر، ونواب البرلمان والشيوخ، روؤساء الجامعات المصرية والحكومية والتكنولوجية والخاصة والاهلية، وعدد من الشخصيات العامة، والمواطنين. وقد ضم الحضور من جامعة برج العرب التكنولوجية، الأستاذ الدكتور محمد مرسي الجوهري، رئيس الجامعة، والطالب عبد الرحمن ابراهيم، رئيس اتحاد طلاب الجامعة. وقد أعرب الأستاذ الدكتور محمد مرسي الجوهري، رئيس جامعة برج العرب التكنولوجية، عن سعادته بالمشاركة في هذا الحفل الوطني الكبير، الذي يجمع شتى أطياف المجتمع المصري، مؤكداً على أهمية مثل هذه الفعاليات في تعزيز روح الترابط والتكافل بين أبناء الشعب المصري. وأضاف الجوهري أن مشاركة جامعة برج العرب التكنولوجية في حفل إفطار الأسرة المصرية تأتي في إطار حرص الجامعة على التواصل مع المجتمع، والمشاركة في مختلف الفعاليات الوطنية التي تعزز القيم والمبادئ المصرية الأصيلة. كما أشاد الجوهري برعاية فخامة الرئيس عبد الفتاح السيسي لحفل إفطار الأسرة المصرية، مؤكداً على أن ذلك يدل على حرص الرئيس على التواصل مع أبناء الشعب المصري، واهتمامه بتعزيز أواصر الترابط بينهم. ومن جانبه، أعرب الطالب عبد الرحمن ابراهيم، رئيس اتحاد طلاب جامعة برج العرب التكنولوجية، عن سعادته بالمشاركة في هذا الحفل الوطني الكبير، مؤكداً على أن ذلك يعد فرصة رائعة للطلاب للتواصل مع كبار المسؤولين، والتعرف على مختلف القضايا التي تهم المجتمع المصري.', 'news', 18, '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(4, 'جامعة برج العرب التكنولوجية تنظم إفطارًا جماعيًا بمناسبة شهر رمضان', 'نظمت جامعة برج العرب التكنولوجية إفطارًا جماعيًا لطلاب الجامعة وأعضاء هيئة التدريس والهيئة المعاونة والإداريين بمناسبة حلول شهر رمضان المبارك. وقد حضر الإفطار الاستاذ الدكتور محمد مرسي الجوهري، رئيس الجامعة، والسادة عمداء الكليات، وعدد كبير من أعضاء هيئة التدريس والعاملين بالجامعة. وفي كلمة الأستاذ الدكتور محمد مرسي الجوهري، رئيس الجامعة، بهذه المناسبة، أكد على أهمية شهر رمضان المبارك كشهر للعبادة والتقرب من الله تعالى، كما أكد على أهمية التكافل الاجتماعي بين جميع أفراد المجتمع. وأضاف رئيس الجامعة: \"إن هذا الإفطار الجماعي هو تعبير عن روح التعاون والتكافل بين جميع أفراد الأسرة الجامعية، كما أنه فرصة للتواصل بين الطلاب وأعضاء هيئة التدريس والعاملين بالجامعة.\" وتابع: \"إننا في جامعة برج العرب التكنولوجية نحرص على تنظيم مثل هذه الفعاليات التي تعزز روح التعاون والتواصل بين جميع أفراد الأسرة الجامعية، كما نحرص على غرس القيم الإسلامية النبيلة في نفوس الطلاب.\" واختتم رئيس الجامعة كلمته بتقديم التهنئة للجميع بمناسبة حلول شهر رمضان المبارك، داعيًا الله تعالى أن يتقبل من الجميع صالح الأعمال وأن يعيد هذه المناسبة على الجميع بالخير واليمن والبركات. كما وجه رئيس الجامعة الشكر لإدارة رعاية شباب الجامعة وإدارة العلاقات العامة واتحاد طلاب الجامعة ولكل من شارك في تنظيم هذا اليوم. وقد تضمن الإفطار العديد من الفقرات الترفيهية والروحية، حيث تم تلاوة آيات من القرآن الكريم، كما تم تقديم بعض الأناشيد الدينية والفقرات الترفيهية والاسئلة توزيع الجوائز. وقد أعرب جميع الحاضرين عن سعادتهم بتنظيم هذا الإفطار الجماعي، كما أكدوا على أهمية مثل هذه الفعاليات في تعزيز روح التعاون والتواصل بين جميع أفراد الأسرة الجامعية.', 'news', 11, '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(5, 'article tisting', NULL, 'article', 2, '2024-04-25 17:44:19', '2024-04-25 17:44:19');

-- --------------------------------------------------------

--
-- Table structure for table `post_media`
--

CREATE TABLE `post_media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_media`
--

INSERT INTO `post_media` (`id`, `image`, `video`, `post_id`, `created_at`, `updated_at`) VALUES
(1, 'https://via.placeholder.com/640x480.png/000011?text=quo', NULL, 1, '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(3, 'https://via.placeholder.com/640x480.png/0066aa?text=quibusdam', 'https://via.placeholder.com/640x480.png/00bb44?text=iusto', 4, '2024-04-25 17:26:28', '2024-04-25 17:26:28');

-- --------------------------------------------------------

--
-- Table structure for table `president_alerts`
--

CREATE TABLE `president_alerts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `president_alerts`
--

INSERT INTO `president_alerts` (`id`, `name`, `email`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Rafaela Carter', 'zschowalter@cassin.com', 'Consectetur et officia autem cupiditate qui repellat aut. Voluptate laborum id inventore quis ipsum quasi nostrum. Iusto aliquid nobis consequatur dolorem modi. Voluptas optio eveniet iusto blanditiis tempore.', '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(2, 'Halie Osinski II', 'heidenreich.ellie@dicki.net', 'Ut nihil hic nihil. Ipsum qui nam quaerat aspernatur pariatur. Et sunt autem hic distinctio pariatur reiciendis mollitia voluptatibus.', '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(3, 'Roosevelt Stehr', 'hermiston.cierra@kertzmann.org', 'Odit quis iste architecto at facilis velit. Perspiciatis sunt qui vel aut sed quos tenetur odio. Et quis incidunt maiores iure quisquam. Vitae qui in exercitationem ut enim dolorem.', '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(4, 'Miss Jazmin Ratke II', 'shawna.becker@yahoo.com', 'Provident facilis quibusdam et natus facilis ea veniam. Quasi quo nihil non at. Sint quidem aliquid aut. Facere quis qui qui aspernatur tempore placeat dolor nobis.', '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(5, 'Hardy Dietrich PhD', 'rocio24@yahoo.com', 'Commodi occaecati repudiandae dolor repudiandae. Et est voluptas ut et totam. Voluptatem repudiandae quisquam distinctio delectus qui molestiae qui.', '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(6, 'Ms. Asia Batz II', 'oconner.maxime@gmail.com', 'Nulla cupiditate et libero autem animi pariatur. Modi et itaque assumenda odio. Est ipsum quo aut nostrum quia.', '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(7, 'Clair Baumbach I', 'naomi.mante@boyer.com', 'Quaerat repudiandae dolorem amet quo ad et ducimus. Ut nihil veritatis dolores quos nihil et similique. Nobis sunt aut sint quas tenetur. Ratione placeat dolorum animi.', '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(8, 'Barton Torp', 'vtremblay@hotmail.com', 'Repellat accusamus aut quis tenetur est voluptatum ad commodi. Est incidunt aut et quod quasi doloremque nobis. Recusandae et repellendus fuga temporibus cumque rerum quasi. Et aut aperiam aut qui aspernatur.', '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(9, 'Lorena Schmidt V', 'koberbrunner@gmail.com', 'In beatae eum porro voluptatibus. Quis laborum eum blanditiis quia. Et ut voluptate cum est velit enim non. Sit eaque ea a sapiente molestiae.', '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(10, 'Juana Mayer', 'kiarra89@gmail.com', 'Sed porro quis repellat laudantium esse. Doloribus mollitia fugiat expedita provident quas. Consequatur quo ut laudantium nesciunt iste. Molestias ullam cupiditate velit quasi est blanditiis unde.', '2024-04-25 17:26:28', '2024-04-25 17:26:28');

-- --------------------------------------------------------

--
-- Table structure for table `researches`
--

CREATE TABLE `researches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `staff_programs_id` bigint(20) UNSIGNED DEFAULT NULL,
  `staff_members_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `researches`
--

INSERT INTO `researches` (`id`, `title`, `description`, `user_id`, `staff_programs_id`, `staff_members_id`, `created_at`, `updated_at`) VALUES
(1, 'Ad facere aliquam quo in quasi iure.', 'Voluptatem est earum tempora dolorem qui. Sed beatae recusandae voluptatem corporis aut et.', 33, NULL, 9, '2024-04-25 17:26:25', '2024-04-25 17:26:25'),
(2, 'Aliquid facere at sit aut neque laborum.', 'Suscipit suscipit debitis fugit iure molestias. Maiores hic aut qui. Exercitationem in nostrum distinctio excepturi temporibus harum. Reprehenderit molestiae id aut ab odio sit nemo.', 34, NULL, 5, '2024-04-25 17:26:26', '2024-04-25 17:26:26'),
(4, 'Autem voluptatem tempore aut reiciendis debitis.', 'Error totam velit distinctio ducimus. Doloribus consequatur dolores quia ratione voluptatem. Hic provident doloremque in sunt. Natus omnis inventore veritatis eius repellendus.', 36, 3, NULL, '2024-04-25 17:26:26', '2024-04-25 17:26:26'),
(5, 'Suscipit repudiandae est et et ut enim.', 'Eum soluta autem amet inventore quibusdam commodi. Et quos quisquam in sit et modi. Occaecati omnis explicabo quasi commodi placeat veniam. Et nobis consequatur voluptas delectus voluptatem autem.', 37, 10, NULL, '2024-04-25 17:26:26', '2024-04-25 17:26:26'),
(6, 'Aut qui similique minus voluptatem quidem.', 'Nesciunt qui aspernatur rerum mollitia sed mollitia. Aut quia quasi nostrum.', 38, NULL, 5, '2024-04-25 17:26:26', '2024-04-25 17:26:26'),
(7, 'Nostrum et modi repellat.', 'Magnam et mollitia enim et. Nihil omnis harum iusto quidem molestias ad. Minus voluptatem voluptatem illum debitis. Aspernatur velit necessitatibus beatae possimus.', 39, NULL, 5, '2024-04-25 17:26:26', '2024-04-25 17:26:26'),
(9, 'Cumque fugiat aut architecto consequatur repellat.', 'Voluptatem ut voluptas quia aliquam aliquam quia. Quod voluptatem sint necessitatibus quasi ut. Delectus earum voluptates earum necessitatibus autem.', 41, 7, NULL, '2024-04-25 17:26:26', '2024-04-25 17:26:26'),
(10, 'Autem ut necessitatibus nulla suscipit commodi sunt veniam.', 'Quos nam ipsam vero. Quibusdam quia error tempore architecto adipisci iure. Quod quo asperiores sit enim. Eos accusantium doloremque culpa minus est eveniet.', 42, NULL, 7, '2024-04-25 17:26:26', '2024-04-25 17:26:26'),
(11, 'Odit blanditiis eos perspiciatis esse et.', 'Numquam voluptate autem maiores similique id dolores voluptates aspernatur. Aliquam similique autem eius nisi aut aliquid. Numquam ut tempora labore dolorem qui.', 43, NULL, 9, '2024-04-25 17:26:27', '2024-04-25 17:26:27'),
(12, 'Quia et qui qui maiores voluptatibus.', 'Enim omnis accusantium qui veritatis sequi. Eum id facere porro rerum similique suscipit. Expedita praesentium sed magni voluptas. Quae minus quis tenetur aut mollitia.', 44, NULL, 9, '2024-04-25 17:26:27', '2024-04-25 17:26:27'),
(13, 'Perspiciatis tenetur harum fugiat omnis et.', 'Itaque consectetur qui porro ut quaerat laudantium odit. Officia omnis odio ut ullam nihil molestiae soluta. Culpa qui sint qui dolorem minus voluptate. Quia nam autem ab a.', 45, NULL, 9, '2024-04-25 17:26:27', '2024-04-25 17:26:27'),
(14, 'Et consequuntur non culpa veritatis.', 'Quaerat velit sit eveniet et voluptatibus non dolor laudantium. Aut natus sit adipisci nostrum veniam quia consequuntur. Aut iste blanditiis aut ut doloremque id. Mollitia rerum architecto et hic et magnam. Sint cum maxime eaque consequatur ab commodi culpa aut.', 46, 6, NULL, '2024-04-25 17:26:27', '2024-04-25 17:26:27'),
(15, 'Debitis quod aut accusantium et enim dolorem omnis.', 'Autem sed rem cumque exercitationem explicabo deleniti. Voluptatum qui tempora id recusandae itaque. Dolor voluptas omnis vel consectetur et. Voluptates dolores non id rerum.', 47, 10, NULL, '2024-04-25 17:26:27', '2024-04-25 17:26:27');

-- --------------------------------------------------------

--
-- Table structure for table `social_links`
--

CREATE TABLE `social_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` enum('Facebook','Instagram','X','LinkedIN','GitHub') NOT NULL,
  `image` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_links`
--

INSERT INTO `social_links` (`id`, `name`, `image`, `link`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'X', 'https://via.placeholder.com/640x480.png/00dd77?text=fugit', 'http://www.graham.com/assumenda-beatae-odit-sint-quo-quis-ea', 19, '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(2, 'GitHub', 'https://via.placeholder.com/640x480.png/00ff44?text=aut', 'http://gislason.com/harum-impedit-temporibus-eos-vitae-recusandae-delectus', 5, '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(3, 'GitHub', 'https://via.placeholder.com/640x480.png/0011cc?text=aut', 'http://www.adams.com/quis-magni-aperiam-minima-id-voluptatibus-praesentium-eaque', 39, '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(4, 'Facebook', 'https://via.placeholder.com/640x480.png/00eecc?text=velit', 'http://www.rutherford.com/ut-voluptatibus-dolor-sed-amet-dolor-et-nihil.html', 32, '2024-04-25 17:26:28', '2024-04-25 17:26:28');

-- --------------------------------------------------------

--
-- Table structure for table `staff_members`
--

CREATE TABLE `staff_members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `cv` varchar(255) DEFAULT NULL,
  `position` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `faculty_id` bigint(20) UNSIGNED DEFAULT NULL,
  `department_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staff_members`
--

INSERT INTO `staff_members` (`id`, `name`, `image`, `email`, `description`, `cv`, `position`, `user_id`, `faculty_id`, `department_id`, `created_at`, `updated_at`) VALUES
(1, 'Savion Lynch', 'https://via.placeholder.com/640x480.png/00ff77?text=sit', 'eklein@example.net', 'Temporibus provident eius ut et non accusantium porro. Voluptatem et quidem et itaque ab sunt. Reprehenderit adipisci eius ratione itaque.', 'optio', 'Professor', 7, 1, 6, '2024-04-25 17:26:23', '2024-04-25 17:26:23'),
(3, 'Talon Dickens', 'https://via.placeholder.com/640x480.png/0088dd?text=id', 'nolan.americo@example.net', 'Non ut rerum animi sunt. Eos quis sunt quasi id. In commodi est consequatur et aut. Dolorem labore asperiores voluptatum doloribus. Et esse aspernatur modi aut.', 'suscipit', 'Lecturer', 11, 1, 5, '2024-04-25 17:26:23', '2024-04-25 17:26:23'),
(4, 'Miss Yadira Dare Jr.', 'https://via.placeholder.com/640x480.png/00cccc?text=ab', 'reece.effertz@example.com', 'Voluptate qui et quas perspiciatis harum maiores. Tenetur blanditiis nihil officiis veniam id et. Quo repudiandae quas sunt amet possimus non.', 'illo', 'Lecturer', 1, 1, 7, '2024-04-25 17:26:23', '2024-04-25 17:26:23'),
(5, 'Leonard Halvorson', 'https://via.placeholder.com/640x480.png/0088cc?text=deleniti', 'tania27@example.com', 'Deleniti quibusdam quo neque vel eaque. Nostrum sunt id sint cumque aperiam. Fugit ea doloremque atque sequi rem. Consequatur est sed hic consequatur aut. Aut sit corporis a repellat.', 'ut', 'Assistant Professor', 14, 2, 6, '2024-04-25 17:26:23', '2024-04-25 17:26:23'),
(6, 'Ms. Princess Harvey V', 'https://via.placeholder.com/640x480.png/005533?text=magni', 'braun.percival@example.org', 'Doloremque aspernatur aut accusamus mollitia est vitae eos. Qui eligendi voluptas qui perferendis deleniti. Reprehenderit facilis ducimus et et et aut est. Praesentium ut nobis consequatur sed voluptatem itaque dolor. Quibusdam culpa officia vitae atque quod et odit.', 'magnam', 'Professor', 6, 2, 6, '2024-04-25 17:26:23', '2024-04-25 17:26:23'),
(7, 'Ronny Bogan', 'https://via.placeholder.com/640x480.png/006611?text=sed', 'hailey65@example.com', 'Deserunt iste porro et rerum harum voluptatem qui. Impedit nemo veritatis sequi nam nostrum omnis. Cum fugiat sit quae aut.', 'molestiae', 'Lecturer', 15, 2, 6, '2024-04-25 17:26:23', '2024-04-25 17:26:23'),
(8, 'Jensen Boyle', 'https://via.placeholder.com/640x480.png/001177?text=non', 'kris.nels@example.net', 'Deserunt odio dolorum tenetur ut dolorum. Neque est vero soluta ea consequatur eius. Suscipit nobis molestiae at ab.', 'sit', 'Lecturer', 2, 2, 6, '2024-04-25 17:26:23', '2024-04-25 17:26:23'),
(9, 'Roxanne Larson', 'https://via.placeholder.com/640x480.png/00bb66?text=dolores', 'hildegard99@example.org', 'Autem enim quibusdam voluptatem cumque. Voluptas aut ab debitis aut voluptas voluptates.', 'at', 'Lecturer', 3, 2, 3, '2024-04-25 17:26:23', '2024-04-25 17:26:23'),
(10, 'Prof. Brionna Kilback II', 'https://via.placeholder.com/640x480.png/00ff11?text=numquam', 'pink.heller@example.net', 'Unde culpa soluta repellendus adipisci. Tempore modi assumenda facilis dolor vel repellendus quia odit.', 'maxime', 'Lecturer', 12, 2, 4, '2024-04-25 17:26:23', '2024-04-25 17:26:23'),
(11, 'dr. tetsing', 'http://127.0.0.1:8000/assets/images/dr. tetsing_662aae70502fc.png', NULL, NULL, NULL, 'doctor', 12, 2, 4, '2024-04-25 17:26:40', '2024-04-25 17:26:40');

-- --------------------------------------------------------

--
-- Table structure for table `staff_programs`
--

CREATE TABLE `staff_programs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `word` text NOT NULL,
  `position` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `cv` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staff_programs`
--

INSERT INTO `staff_programs` (`id`, `name`, `image`, `word`, `position`, `email`, `cv`, `user_id`, `department_id`, `created_at`, `updated_at`) VALUES
(1, 'Vitae esse enim nesciunt.', 'https://via.placeholder.com/640x480.png/00cc55?text=et', 'quis', 'Coordinator', 'willms.arely@example.com', 'consequatur', 10, 7, '2024-04-25 17:26:23', '2024-04-25 17:26:23'),
(3, 'dr. tetsing', 'http://127.0.0.1:8000/assets/images/dr. tetsing_662aafe096878.png', 'wordwordwordwordwordwordwordwordwordwordwordwordwordwordwordwordwordwordwordwordwordwordwordwordwordwordwordwordwordwordword', 'doctor', 'eliezer.runolfsson@example.org', NULL, 12, 3, '2024-04-25 17:26:23', '2024-04-25 17:32:48'),
(4, 'Ut voluptatem error sint consequatur.', 'https://via.placeholder.com/640x480.png/0022bb?text=et', 'nostrum', 'Assistant', 'amaya15@example.com', 'incidunt', 7, 1, '2024-04-25 17:26:23', '2024-04-25 17:26:23'),
(5, 'Quos explicabo vitae nobis odit.', 'https://via.placeholder.com/640x480.png/00aa22?text=enim', 'nisi', 'Assistant', 'koss.demarcus@example.net', 'maxime', 3, 3, '2024-04-25 17:26:23', '2024-04-25 17:26:23'),
(6, 'Et consequuntur corporis sint dignissimos sit quia inventore voluptatum.', 'https://via.placeholder.com/640x480.png/00aa55?text=sit', 'ipsum', 'Assistant', 'ltillman@example.com', 'mollitia', 9, 5, '2024-04-25 17:26:23', '2024-04-25 17:26:23'),
(7, 'Nihil aut omnis sint praesentium quasi harum.', 'https://via.placeholder.com/640x480.png/007744?text=laborum', 'aut', 'Coordinator', 'christelle.schroeder@example.com', 'quod', 12, 5, '2024-04-25 17:26:23', '2024-04-25 17:26:23'),
(8, 'Ex nesciunt et adipisci nihil vitae nobis et.', 'https://via.placeholder.com/640x480.png/0000cc?text=perspiciatis', 'aspernatur', 'Head of Department', 'demetrius.dooley@example.org', 'qui', 13, 9, '2024-04-25 17:26:23', '2024-04-25 17:26:23'),
(9, 'Repudiandae quidem a similique velit rerum non.', 'https://via.placeholder.com/640x480.png/001100?text=perferendis', 'vero', 'Head of Department', 'gbergnaum@example.com', 'tenetur', 8, 1, '2024-04-25 17:26:23', '2024-04-25 17:26:23'),
(10, 'Quis quis ratione est autem rerum.', 'https://via.placeholder.com/640x480.png/00ddcc?text=harum', 'unde', 'Coordinator', 'llakin@example.com', 'aut', 1, 2, '2024-04-25 17:26:23', '2024-04-25 17:26:23'),
(11, 'dr. tetsing', 'http://127.0.0.1:8000/assets/images/dr. tetsing_662aaf93ded8c.png', 'wordwordwordwordwordwordwordwordwordwordwordwordwordwordwordwordwordwordwordwordwordwordwordwordwordwordwordwordwordwordword', 'doctor', NULL, NULL, 12, 3, '2024-04-25 17:31:31', '2024-04-25 17:31:31');

-- --------------------------------------------------------

--
-- Table structure for table `staff_socials`
--

CREATE TABLE `staff_socials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` enum('Facebook','Instagram','X','LinkedIN','GitHub') NOT NULL,
  `link` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `staff_programs_id` bigint(20) UNSIGNED DEFAULT NULL,
  `staff_members_id` bigint(20) UNSIGNED DEFAULT NULL,
  `faculty_leaders_id` bigint(20) UNSIGNED DEFAULT NULL,
  `university_leaders_id` bigint(20) UNSIGNED DEFAULT NULL,
  `faculty_agent_staff_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staff_socials`
--

INSERT INTO `staff_socials` (`id`, `name`, `link`, `image`, `user_id`, `staff_programs_id`, `staff_members_id`, `faculty_leaders_id`, `university_leaders_id`, `faculty_agent_staff_id`, `created_at`, `updated_at`) VALUES
(1, 'Instagram', 'https://bruen.com/incidunt-pariatur-eius-voluptatem-id-velit-rerum.html', 'https://via.placeholder.com/300x300.png/00dd99?text=quidem', 12, 6, NULL, 1, 3, NULL, '2024-04-25 17:26:29', '2024-04-25 17:26:29'),
(3, 'Instagram', 'http://littel.com/nostrum-corporis-ab-corporis-velit-tempora.html', 'https://via.placeholder.com/300x300.png/00aa44?text=vero', 2, 10, NULL, NULL, NULL, NULL, '2024-04-25 17:26:29', '2024-04-25 17:26:29'),
(4, 'Instagram', 'http://www.huel.com/et-qui-incidunt-autem-sunt-voluptas-dolor', 'https://via.placeholder.com/300x300.png/007766?text=enim', 3, NULL, NULL, 1, NULL, NULL, '2024-04-25 17:26:29', '2024-04-25 17:26:29'),
(5, 'GitHub', 'https://padberg.com/quibusdam-rerum-ut-maxime-sed-cupiditate-ab.html', 'https://via.placeholder.com/300x300.png/0066bb?text=porro', 7, NULL, NULL, 2, 1, NULL, '2024-04-25 17:26:29', '2024-04-25 17:26:29'),
(6, 'LinkedIN', 'http://hudson.net/pariatur-aliquid-rem-molestiae-vel-vero-sed-ut', 'https://via.placeholder.com/300x300.png/0000dd?text=recusandae', 33, 8, NULL, 3, 1, NULL, '2024-04-25 17:26:29', '2024-04-25 17:26:29'),
(7, 'GitHub', 'http://parker.com/', 'https://via.placeholder.com/300x300.png/004433?text=alias', 8, 7, 4, NULL, 2, NULL, '2024-04-25 17:26:29', '2024-04-25 17:26:29'),
(9, 'Facebook', 'http://kunde.com/exercitationem-aliquam-unde-quam-quis-voluptates', 'https://via.placeholder.com/300x300.png/006677?text=iste', 31, NULL, 3, 3, NULL, NULL, '2024-04-25 17:26:29', '2024-04-25 17:26:29'),
(11, 'LinkedIN', 'http://ankunding.com/ea-porro-est-ratione', 'https://via.placeholder.com/300x300.png/003355?text=rem', 45, NULL, 6, NULL, NULL, NULL, '2024-04-25 17:26:29', '2024-04-25 17:26:29'),
(12, 'Facebook', 'http://legros.biz/ipsam-dolores-alias-numquam-distinctio-atque-deserunt', 'https://via.placeholder.com/300x300.png/0099bb?text=commodi', 32, NULL, 7, 4, 4, NULL, '2024-04-25 17:26:29', '2024-04-25 17:26:29'),
(13, 'Instagram', 'http://www.tillman.net/ab-autem-illo-rem.html', 'https://via.placeholder.com/300x300.png/008822?text=libero', 5, NULL, NULL, NULL, 4, NULL, '2024-04-25 17:26:29', '2024-04-25 17:26:29'),
(14, 'Facebook', 'http://www.friesen.net/eum-sint-corrupti-sit-autem-delectus-deserunt-necessitatibus-pariatur', 'https://via.placeholder.com/300x300.png/00ee33?text=accusantium', 40, 1, 1, NULL, NULL, NULL, '2024-04-25 17:26:29', '2024-04-25 17:26:29'),
(15, 'LinkedIN', 'http://keeling.com/', 'https://via.placeholder.com/300x300.png/0099ff?text=pariatur', 38, NULL, 10, NULL, 1, NULL, '2024-04-25 17:26:29', '2024-04-25 17:26:29'),
(16, 'X', 'http://anderson.info/magni-et-ut-ad-est-corporis-ut-est.html', 'https://via.placeholder.com/300x300.png/0000aa?text=nostrum', 28, NULL, NULL, 4, NULL, NULL, '2024-04-25 17:26:29', '2024-04-25 17:26:29'),
(17, 'GitHub', 'https://wolf.com/culpa-aperiam-quia-veniam-qui-ut.html', 'https://via.placeholder.com/300x300.png/006688?text=eum', 8, 1, NULL, 1, 2, NULL, '2024-04-25 17:26:29', '2024-04-25 17:26:29'),
(18, 'Instagram', 'http://www.powlowski.com/ut-fuga-voluptas-eos-et-excepturi-ut-est.html', 'https://via.placeholder.com/300x300.png/00dd88?text=et', 33, 7, 10, 4, NULL, NULL, '2024-04-25 17:26:29', '2024-04-25 17:26:29'),
(19, 'LinkedIN', 'http://www.johnston.net/asperiores-optio-fuga-illum-et-eum-et-inventore-et.html', 'https://via.placeholder.com/300x300.png/0055cc?text=adipisci', 16, 10, NULL, NULL, NULL, NULL, '2024-04-25 17:26:29', '2024-04-25 17:26:29'),
(20, 'LinkedIN', 'http://white.info/tempora-dolorem-optio-nostrum-facere', 'https://via.placeholder.com/300x300.png/00ff00?text=amet', 28, 4, NULL, NULL, NULL, NULL, '2024-04-25 17:26:29', '2024-04-25 17:26:29'),
(21, 'Facebook', 'https://facebook.com', 'http://127.0.0.1:8000/assets/default/facebook.png', 12, NULL, 11, NULL, NULL, NULL, '2024-04-25 17:26:40', '2024-04-25 17:26:40'),
(22, 'X', 'https://X.com', 'http://127.0.0.1:8000/assets/default/x.png', 12, NULL, 11, NULL, NULL, NULL, '2024-04-25 17:26:40', '2024-04-25 17:26:40'),
(23, 'GitHub', 'https://github.com', 'http://127.0.0.1:8000/assets/default/github.png', 12, NULL, 11, NULL, NULL, NULL, '2024-04-25 17:26:40', '2024-04-25 17:26:40'),
(27, 'Facebook', 'https://facebook.com', 'http://127.0.0.1:8000/assets/default/facebook.png', 12, 11, NULL, NULL, NULL, NULL, '2024-04-25 17:31:31', '2024-04-25 17:31:31'),
(28, 'X', 'https://X.com', 'http://127.0.0.1:8000/assets/default/x.png', 12, 11, NULL, NULL, NULL, NULL, '2024-04-25 17:31:31', '2024-04-25 17:31:31'),
(29, 'GitHub', 'https://github.com', 'http://127.0.0.1:8000/assets/default/github.png', 12, 11, NULL, NULL, NULL, NULL, '2024-04-25 17:31:31', '2024-04-25 17:31:31'),
(30, 'Facebook', 'https://facebook.com', 'http://127.0.0.1:8000/assets/default/facebook.png', 12, 3, NULL, NULL, NULL, NULL, '2024-04-25 17:32:48', '2024-04-25 17:32:48'),
(31, 'X', 'https://X.com', 'http://127.0.0.1:8000/assets/default/x.png', 12, 3, NULL, NULL, NULL, NULL, '2024-04-25 17:32:48', '2024-04-25 17:32:48'),
(32, 'GitHub', 'https://github.com', 'http://127.0.0.1:8000/assets/default/github.png', 12, 3, NULL, NULL, NULL, NULL, '2024-04-25 17:32:48', '2024-04-25 17:32:48');

-- --------------------------------------------------------

--
-- Table structure for table `student_projects`
--

CREATE TABLE `student_projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `team_name` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_projects`
--

INSERT INTO `student_projects` (`id`, `name`, `description`, `image`, `file`, `team_name`, `user_id`, `department_id`, `created_at`, `updated_at`) VALUES
(1, 'blind glasses', 'Blind glasses are smart glasses, designed by the Allenz team, that aimed to helping blind people and visually impaired, It can sense distances via smart sensors, and it alerts the user through a sound system when approaching a collision with something.', 'https://linkdhub.github.io/batu-images/images/image%20(12).png', NULL, 'alians team', 7, 1, '2024-04-25 17:26:23', '2024-04-25 17:26:23'),
(2, 'self driving car', 'this car can move on black lines using the ir sensors and can avoid obstacle and move away using the ultrasonic sensor then get back to the track again', 'https://linkdhub.github.io/batu-images/images/image%20(11).jpg', NULL, 'project cooperation', 8, 1, '2024-04-25 17:26:23', '2024-04-25 17:26:23'),
(3, 'bionic arm', 'An electronic arm, which is a very advanced prosthetic limb that can be controlled via Bluetooth technology Through the mobile application, it also features a built-in alarm clock and stopwatch, making it a versatile tool for individuals who need a synthetic solution. practical', 'https://linkdhub.github.io/batu-images/images/image%20(11).png', NULL, 'Technology inventors', 4, 1, '2024-04-25 17:26:23', '2024-04-25 17:26:23'),
(4, 'Wall-E robot', 'A model of an E-Wall-inspired robot that performs a range of tasks such as walking in Specific routes, monitoring and tracking', 'https://linkdhub.github.io/batu-images/images/image%20(48).png', NULL, 'not comparisted', 11, 1, '2024-04-25 17:26:23', '2024-04-25 17:26:23'),
(5, 'Brake system', 'A brake system wood is a component used in braking systems, typically found in older vehicles or those with drum brakes. It\'s a wedge-shaped block made of a special type of wood, often hardwood, such as oak or ash. When the brake pedal is pressed, the brake system wood is pushed against the inside of the brake drum, creating friction and causing the vehicle to slow down or stop. However, brake system wood is less common today, as most modern vehicles use disc brakes, which employ brake pads and calipers instead.', 'https://linkdhub.github.io/batu-images/images/image%20(13).png', NULL, 'Brake system', 8, 6, '2024-04-25 17:26:23', '2024-04-25 17:26:23'),
(6, 'blind glasses', 'Blind glasses are smart glasses, designed by the Allenz team, that aimed to helping blind people and visually impaired, It can sense distances via smart sensors, and it alerts the user through a sound system when approaching a collision with something.', 'https://linkdhub.github.io/batu-images/images/image%20(12).png', NULL, 'alians team', 19, 1, '2024-04-25 17:26:29', '2024-04-25 17:26:29'),
(7, 'self driving car', 'this car can move on black lines using the ir sensors and can avoid obstacle and move away using the ultrasonic sensor then get back to the track again', 'https://linkdhub.github.io/batu-images/images/image%20(11).jpg', NULL, 'project cooperation', 30, 1, '2024-04-25 17:26:29', '2024-04-25 17:26:29'),
(8, 'bionic arm', 'An electronic arm, which is a very advanced prosthetic limb that can be controlled via Bluetooth technology Through the mobile application, it also features a built-in alarm clock and stopwatch, making it a versatile tool for individuals who need a synthetic solution. practical', 'https://linkdhub.github.io/batu-images/images/image%20(11).png', NULL, 'Technology inventors', 49, 1, '2024-04-25 17:26:29', '2024-04-25 17:26:29'),
(9, 'Wall-E robot', 'A model of an E-Wall-inspired robot that performs a range of tasks such as walking in Specific routes, monitoring and tracking', 'https://linkdhub.github.io/batu-images/images/image%20(48).png', NULL, 'not comparisted', 12, 1, '2024-04-25 17:26:29', '2024-04-25 17:26:29'),
(10, 'Brake system', 'A brake system wood is a component used in braking systems, typically found in older vehicles or those with drum brakes. It\'s a wedge-shaped block made of a special type of wood, often hardwood, such as oak or ash. When the brake pedal is pressed, the brake system wood is pushed against the inside of the brake drum, creating friction and causing the vehicle to slow down or stop. However, brake system wood is less common today, as most modern vehicles use disc brakes, which employ brake pads and calipers instead.', 'https://linkdhub.github.io/batu-images/images/image%20(13).png', NULL, 'Brake system', 31, 6, '2024-04-25 17:26:29', '2024-04-25 17:26:29'),
(11, 'blind glasses', 'Blind glasses are smart glasses, designed by the Allenz team, that aimed to helping blind people and visually impaired, It can sense distances via smart sensors, and it alerts the user through a sound system when approaching a collision with something.', 'https://linkdhub.github.io/batu-images/images/image%20(12).png', NULL, 'alians team', 43, 1, '2024-04-25 17:26:29', '2024-04-25 17:26:29'),
(12, 'self driving car', 'this car can move on black lines using the ir sensors and can avoid obstacle and move away using the ultrasonic sensor then get back to the track again', 'https://linkdhub.github.io/batu-images/images/image%20(11).jpg', NULL, 'project cooperation', 39, 1, '2024-04-25 17:26:29', '2024-04-25 17:26:29'),
(13, 'bionic arm', 'An electronic arm, which is a very advanced prosthetic limb that can be controlled via Bluetooth technology Through the mobile application, it also features a built-in alarm clock and stopwatch, making it a versatile tool for individuals who need a synthetic solution. practical', 'https://linkdhub.github.io/batu-images/images/image%20(11).png', NULL, 'Technology inventors', 23, 1, '2024-04-25 17:26:29', '2024-04-25 17:26:29'),
(14, 'Wall-E robot', 'A model of an E-Wall-inspired robot that performs a range of tasks such as walking in Specific routes, monitoring and tracking', 'https://linkdhub.github.io/batu-images/images/image%20(48).png', NULL, 'not comparisted', 18, 1, '2024-04-25 17:26:29', '2024-04-25 17:26:29'),
(15, 'Brake system', 'A brake system wood is a component used in braking systems, typically found in older vehicles or those with drum brakes. It\'s a wedge-shaped block made of a special type of wood, often hardwood, such as oak or ash. When the brake pedal is pressed, the brake system wood is pushed against the inside of the brake drum, creating friction and causing the vehicle to slow down or stop. However, brake system wood is less common today, as most modern vehicles use disc brakes, which employ brake pads and calipers instead.', 'https://linkdhub.github.io/batu-images/images/image%20(13).png', NULL, 'Brake system', 5, 6, '2024-04-25 17:26:29', '2024-04-25 17:26:29'),
(16, 'blind glasses', 'Blind glasses are smart glasses, designed by the Allenz team, that aimed to helping blind people and visually impaired, It can sense distances via smart sensors, and it alerts the user through a sound system when approaching a collision with something.', 'https://linkdhub.github.io/batu-images/images/image%20(12).png', NULL, 'alians team', 6, 1, '2024-04-25 17:26:29', '2024-04-25 17:26:29'),
(17, 'self driving car', 'this car can move on black lines using the ir sensors and can avoid obstacle and move away using the ultrasonic sensor then get back to the track again', 'https://linkdhub.github.io/batu-images/images/image%20(11).jpg', NULL, 'project cooperation', 18, 1, '2024-04-25 17:26:29', '2024-04-25 17:26:29'),
(18, 'bionic arm', 'An electronic arm, which is a very advanced prosthetic limb that can be controlled via Bluetooth technology Through the mobile application, it also features a built-in alarm clock and stopwatch, making it a versatile tool for individuals who need a synthetic solution. practical', 'https://linkdhub.github.io/batu-images/images/image%20(11).png', NULL, 'Technology inventors', 38, 1, '2024-04-25 17:26:29', '2024-04-25 17:26:29'),
(19, 'Wall-E robot', 'A model of an E-Wall-inspired robot that performs a range of tasks such as walking in Specific routes, monitoring and tracking', 'https://linkdhub.github.io/batu-images/images/image%20(48).png', NULL, 'not comparisted', 27, 1, '2024-04-25 17:26:29', '2024-04-25 17:26:29'),
(20, 'Brake system', 'A brake system wood is a component used in braking systems, typically found in older vehicles or those with drum brakes. It\'s a wedge-shaped block made of a special type of wood, often hardwood, such as oak or ash. When the brake pedal is pressed, the brake system wood is pushed against the inside of the brake drum, creating friction and causing the vehicle to slow down or stop. However, brake system wood is less common today, as most modern vehicles use disc brakes, which employ brake pads and calipers instead.', 'https://linkdhub.github.io/batu-images/images/image%20(13).png', NULL, 'Brake system', 26, 6, '2024-04-25 17:26:29', '2024-04-25 17:26:29'),
(21, 'blind glasses', 'Blind glasses are smart glasses, designed by the Allenz team, that aimed to helping blind people and visually impaired, It can sense distances via smart sensors, and it alerts the user through a sound system when approaching a collision with something.', 'https://linkdhub.github.io/batu-images/images/image%20(12).png', NULL, 'alians team', 43, 1, '2024-04-25 17:26:29', '2024-04-25 17:26:29'),
(22, 'self driving car', 'this car can move on black lines using the ir sensors and can avoid obstacle and move away using the ultrasonic sensor then get back to the track again', 'https://linkdhub.github.io/batu-images/images/image%20(11).jpg', NULL, 'project cooperation', 36, 1, '2024-04-25 17:26:29', '2024-04-25 17:26:29'),
(23, 'bionic arm', 'An electronic arm, which is a very advanced prosthetic limb that can be controlled via Bluetooth technology Through the mobile application, it also features a built-in alarm clock and stopwatch, making it a versatile tool for individuals who need a synthetic solution. practical', 'https://linkdhub.github.io/batu-images/images/image%20(11).png', NULL, 'Technology inventors', 25, 1, '2024-04-25 17:26:29', '2024-04-25 17:26:29'),
(24, 'Wall-E robot', 'A model of an E-Wall-inspired robot that performs a range of tasks such as walking in Specific routes, monitoring and tracking', 'https://linkdhub.github.io/batu-images/images/image%20(48).png', NULL, 'not comparisted', 19, 1, '2024-04-25 17:26:29', '2024-04-25 17:26:29'),
(25, 'Brake system', 'A brake system wood is a component used in braking systems, typically found in older vehicles or those with drum brakes. It\'s a wedge-shaped block made of a special type of wood, often hardwood, such as oak or ash. When the brake pedal is pressed, the brake system wood is pushed against the inside of the brake drum, creating friction and causing the vehicle to slow down or stop. However, brake system wood is less common today, as most modern vehicles use disc brakes, which employ brake pads and calipers instead.', 'https://linkdhub.github.io/batu-images/images/image%20(13).png', NULL, 'Brake system', 14, 6, '2024-04-25 17:26:29', '2024-04-25 17:26:29');

-- --------------------------------------------------------

--
-- Table structure for table `study_plans`
--

CREATE TABLE `study_plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `academic_year` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `credits` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `staff_programs_id` bigint(20) UNSIGNED DEFAULT NULL,
  `staff_members_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `study_plans`
--

INSERT INTO `study_plans` (`id`, `name`, `description`, `academic_year`, `semester`, `credits`, `user_id`, `department_id`, `staff_programs_id`, `staff_members_id`, `created_at`, `updated_at`) VALUES
(1, 'Enim tenetur et qui officia.', 'Earum architecto dolores vel et voluptatum ipsum ad. Commodi dignissimos omnis nam ut nobis nobis fugiat. Expedita ea et quia aut ad. Ut facilis rerum ratione provident.', '2024-2025', 'Spring', '5 credits', 1, 6, 3, 6, '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(2, 'Laudantium vel dolorum dolorem.', 'Quo iste id voluptatem nihil consequatur dignissimos. Facere temporibus deleniti qui necessitatibus totam aut ullam esse. Accusamus nisi autem rerum quia non sunt.', '2025-2026', 'Spring', '4 credits', 27, 5, 1, 7, '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(3, 'Eius et quaerat quibusdam qui.', 'Rerum a quia repudiandae sunt. Vitae labore atque saepe quibusdam accusamus numquam consequatur. Ut est ut tempora aliquam.', '2023-2024', 'Summer', '1 credits', 1, 1, 8, 8, '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(4, 'Ut laudantium sit cumque enim consequatur minus et.', 'Quas sit corrupti repudiandae delectus. Voluptatem alias tenetur amet laudantium voluptatibus molestiae non. Veniam qui voluptatum adipisci excepturi laboriosam nobis.', '2024-2025', 'Spring', '1 credits', 6, 2, 6, 4, '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(6, 'Laboriosam explicabo rem autem et iure aut.', 'Hic dolor dolore commodi architecto repellat. Molestias praesentium earum aliquid vel est quisquam. At et et fuga quis velit dolor.', '2024-2025', 'Summer', '3 credits', 28, 2, 3, 3, '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(8, 'Inventore sint in hic quibusdam est.', 'Dolorem eaque tempore dolore sunt tenetur dolorem rerum. Ut soluta ratione molestiae aliquid culpa. Quo eaque ut nostrum sit sequi quisquam sit ut. Aperiam sunt repellendus nihil omnis quia aspernatur.', '2023-2024', 'Fall', '3 credits', 3, 7, 3, 10, '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(10, 'Labore fugit consequatur nostrum excepturi rem.', 'Tempore dolores aut qui et qui est aut. Ut aperiam sit blanditiis aliquam. Deserunt explicabo voluptate vero omnis vel mollitia accusamus. Quis labore voluptatem dolores cupiditate tempore.', '2025-2026', 'Spring', '3 credits', 38, 1, 9, 10, '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(11, 'Mollitia nesciunt velit et.', 'Non quis aut nobis omnis facere quae. Quia dolor doloribus officiis. Sequi rerum numquam expedita facilis doloribus et non. Tempore ut at molestiae non architecto iure facere.', '2025-2026', 'Fall', '3 credits', 46, 1, 3, 1, '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(12, 'Sunt cumque occaecati autem blanditiis iste beatae.', 'Voluptatum neque dolorem est aut omnis. Inventore ducimus unde voluptate quis non. Nostrum velit ipsam illo eveniet quisquam tenetur modi. Quaerat est velit nisi accusantium ab et.', '2025-2026', 'Summer', '3 credits', 27, 3, 4, 1, '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(13, 'Autem earum sed quod aut ut molestias beatae.', 'Laudantium deleniti velit et veritatis ut. Corrupti delectus repellat sapiente ad quasi repudiandae temporibus.', '2024-2025', 'Fall', '4 credits', 35, 2, 3, 3, '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(14, 'Impedit enim expedita ut accusamus.', 'Voluptatem soluta iure non autem molestiae vitae quia. Aut assumenda quasi voluptatum minus dolores. Blanditiis ullam maiores molestias ullam.', '2025-2026', 'Fall', '4 credits', 45, 4, 6, 4, '2024-04-25 17:26:28', '2024-04-25 17:26:28'),
(15, 'Ipsa fugiat et aut quidem occaecati magnam.', 'Distinctio mollitia aut deleniti tenetur labore. Laboriosam et tempore odio unde explicabo id. Qui animi quas sed consequuntur. Officiis molestiae est non in nam velit.', '2025-2026', 'Fall', '4 credits', 14, 5, 5, 6, '2024-04-25 17:26:28', '2024-04-25 17:26:28');

-- --------------------------------------------------------

--
-- Table structure for table `university_leaders`
--

CREATE TABLE `university_leaders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `word` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `cv` varchar(255) DEFAULT NULL,
  `position` enum('President','Vice_President') NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `university_leaders`
--

INSERT INTO `university_leaders` (`id`, `name`, `image`, `description`, `word`, `email`, `cv`, `position`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Miss Piper Wolff', 'https://via.placeholder.com/640x480.png/004400?text=rerum', 'Autem totam deserunt voluptatem ut ut consectetur. Ducimus sunt vel eius. Odio est sit et excepturi dolorem minima. Aut vero soluta ut earum hic.', 'iusto', 'norwood40@example.org', 'temporibus', 'Vice_President', 7, '2024-04-25 17:26:23', '2024-04-25 17:26:23'),
(2, 'Maxime Leuschke', 'https://via.placeholder.com/640x480.png/003355?text=sit', 'Natus enim omnis et veritatis. Est sint modi vero quia et suscipit ut. Quo corrupti ducimus at deleniti sunt enim vel. Et qui illum eius distinctio.', 'dicta', 'karlee.renner@example.com', 'labore', 'Vice_President', 2, '2024-04-25 17:26:23', '2024-04-25 17:26:23'),
(3, 'Hyman Daugherty', 'https://via.placeholder.com/640x480.png/00cc22?text=architecto', 'Deserunt molestiae qui assumenda ut. Perspiciatis consequatur nihil labore in corrupti nisi qui.', 'est', 'ybradtke@example.net', 'ut', 'President', 6, '2024-04-25 17:26:23', '2024-04-25 17:26:23'),
(4, 'Prof. Oda Cummerata DDS', 'https://via.placeholder.com/640x480.png/00bbff?text=non', 'Magni vel delectus facilis veritatis accusamus voluptas. Quia consequatur consequatur dignissimos. Totam itaque architecto recusandae sunt. Consequatur quia est omnis voluptatum.', 'nihil', 'elinor.schroeder@example.org', 'non', 'President', 8, '2024-04-25 17:26:23', '2024-04-25 17:26:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','superAdmin','publisher','editor') NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Wiley Walter', 'schultz.leila@example.org', '2024-04-25 17:26:21', '$2y$10$ohJnins0ui6lFaNZk3lpterCpf0IPjyLXct3nWRq0v7Cez5zXM66C', 'editor', 'I7ZaVjErOE', '2024-04-25 17:26:23', '2024-04-25 17:26:23'),
(2, 'Maybelle Bruen', 'kris.chance@example.org', '2024-04-25 17:26:21', '$2y$10$d7w/XNRrXDlcoUAuybYt7uhRWiiDuxwcgYrMLW.LtNXRuwk.gkf.a', 'publisher', 'myDNIDKjVa', '2024-04-25 17:26:23', '2024-04-25 17:26:23'),
(3, 'Garfield Littel', 'gilberto.reichel@example.com', '2024-04-25 17:26:21', '$2y$10$1cbwDO0F0m4i061w3wmZTOKXlXfk711pCrlBkK6AppTROWfeA9iCC', 'admin', 'wjq5szcBuv', '2024-04-25 17:26:23', '2024-04-25 17:26:23'),
(4, 'Triston Brakus', 'bauch.royal@example.com', '2024-04-25 17:26:22', '$2y$10$VMA30gn12q3Jb/Vh2mgzA.j8P3QHhQzJyhRarve0e/5Dpi.0kZBDO', 'publisher', 'rNzepQcqqd', '2024-04-25 17:26:23', '2024-04-25 17:26:23'),
(5, 'Zachariah Barrows DVM', 'martin.blanda@example.net', '2024-04-25 17:26:22', '$2y$10$9/LCar7tlxiZTejuAc/w7.pAO6OWBSVBpIvTdDYX7MCahVLc64DwO', 'editor', '2afwzOrqbM', '2024-04-25 17:26:23', '2024-04-25 17:26:23'),
(6, 'Ward VonRueden MD', 'barrows.damon@example.com', '2024-04-25 17:26:22', '$2y$10$jWqXRtvOAxGreMoTo3N18uglJ26sZXrH8AqLv.Hkq1I3t/HVh1vDa', 'publisher', 'RKdbqNW0d6', '2024-04-25 17:26:23', '2024-04-25 17:26:23'),
(7, 'Isidro Kulas', 'verdie63@example.org', '2024-04-25 17:26:22', '$2y$10$RHAh4dwNJP9jUyJ7zB1XouBO36hKKKdil0EAKPsDf4IEn3.AtqU4q', 'editor', 'kxSJMaI49p', '2024-04-25 17:26:23', '2024-04-25 17:26:23'),
(8, 'Greyson Quigley', 'nathaniel62@example.com', '2024-04-25 17:26:22', '$2y$10$KZN0J5fEsnR4n7qEIdgzeuKJhzIyJiBJ7XDIA.qmdqFICQKQgRvGG', 'admin', 'mWlGYVrdR9', '2024-04-25 17:26:23', '2024-04-25 17:26:23'),
(9, 'Prof. Ron Schuppe', 'stanton.wyman@example.org', '2024-04-25 17:26:22', '$2y$10$vCBIkSNIqDytMIPioQLo7e4icBk/zDD5Qr/CRWKB/CX73IYSaAUne', 'publisher', 'zNLsALUG61', '2024-04-25 17:26:23', '2024-04-25 17:26:23'),
(10, 'Imogene Ernser', 'mayer.bernard@example.com', '2024-04-25 17:26:22', '$2y$10$6Fz.yc6RicSxrC5F4qdzhOSfSn0jyJUCscUG84WLciN/e5YBX3cRO', 'publisher', '80xeFnc85d', '2024-04-25 17:26:23', '2024-04-25 17:26:23'),
(11, 'Nannie Block', 'phyllis61@example.org', '2024-04-25 17:26:22', '$2y$10$rfepo7oRmi9UDcBm6EHb7.dqpidTpNUWGzu9AyX6dgnJTPdyd3tDG', 'editor', 'UfKAZW3AUO', '2024-04-25 17:26:23', '2024-04-25 17:26:23'),
(12, 'Lily Hahn', 'elsa08@example.net', '2024-04-25 17:26:22', '$2y$10$zm795.vCyoxLDus1mJjm1eLW1KM2Q8qnWyvkD1HYhavnyz/zSd092', 'publisher', 'p0lyU8EBXk', '2024-04-25 17:26:23', '2024-04-25 17:26:23'),
(13, 'Dr. Eloise Mayert', 'owen04@example.org', '2024-04-25 17:26:23', '$2y$10$nQNv6vElKZf9h.OhOtSYBelt24dE8pp1ME8tzPxek/yxdHDV3ZCqq', 'editor', 'I3miyhgx1l', '2024-04-25 17:26:23', '2024-04-25 17:26:23'),
(14, 'Rigoberto Zieme III', 'gheller@example.org', '2024-04-25 17:26:23', '$2y$10$IiyIgBq9L/JwJ1S/v3HMJetsY.1tDxyvT54KifdN/TCbj/on46aAm', 'publisher', 'x1cVZ1Hq7P', '2024-04-25 17:26:23', '2024-04-25 17:26:23'),
(15, 'Riley Pfeffer II', 'santos.little@example.com', '2024-04-25 17:26:23', '$2y$10$3lQ8mxIlrbRDzuP8g22U8uI7CdVEsdactTCExjg4xKsgJMnbN62CS', 'superAdmin', 'DBOTe9CUiG', '2024-04-25 17:26:23', '2024-04-25 17:26:23'),
(16, 'Kurtis Beatty', 'jewell14@example.com', '2024-04-25 17:26:23', '$2y$10$DqRlEfjnZ5PAdSlYIP1/yOiiFA7Sn7qykh8JNR3leVDB8yrA3hTJa', 'superAdmin', 'aBXmUrkFi8', '2024-04-25 17:26:23', '2024-04-25 17:26:23'),
(17, 'Devin Gislason Sr.', 'shanahan.raegan@example.net', '2024-04-25 17:26:23', '$2y$10$XgutHFDWaO4zonn2kb1yteiJHiFYwIGq35LPGNXT1j8YqUzCGLRx6', 'editor', 'EfKz4gh5kL', '2024-04-25 17:26:24', '2024-04-25 17:26:24'),
(18, 'Dixie Veum', 'hmcclure@example.net', '2024-04-25 17:26:24', '$2y$10$9RM3AmbnhbvJMWWc45I1s.jh9zoM9r8Sh0rMfErSoNO1377xguSQe', 'admin', '65Uzgqaf43', '2024-04-25 17:26:24', '2024-04-25 17:26:24'),
(19, 'Tara Gusikowski', 'vernice10@example.org', '2024-04-25 17:26:24', '$2y$10$u7ehcuoSthvvhFr6CBUp3eUYfER2/8FOTwBTEO5ZwQahd45eK7oUW', 'publisher', 'U83hGS5y5h', '2024-04-25 17:26:24', '2024-04-25 17:26:24'),
(20, 'Miss Malinda Quigley', 'barbara.kertzmann@example.com', '2024-04-25 17:26:24', '$2y$10$nWaMUbeO1.Sgb.uI/TqQj.D05PO/VALuPK9QKSwdInIBVdYhhaZBi', 'superAdmin', 'AX9cUBfaHl', '2024-04-25 17:26:24', '2024-04-25 17:26:24'),
(21, 'Domingo Wolff', 'wehner.josiane@example.org', '2024-04-25 17:26:24', '$2y$10$gI.ONIAOaqpXSa3W1ZRRtOjgvV6czobySNQhQDXoUM/Hfe4k2many', 'editor', 'SH4aCSkgth', '2024-04-25 17:26:24', '2024-04-25 17:26:24'),
(22, 'Oleta O\'Keefe', 'alison53@example.com', '2024-04-25 17:26:24', '$2y$10$VOTQPV.MA5/eNHes4ifTS.NDZQueoc9b11oAaniTuSNF3itnMJBgS', 'publisher', '4DPr4Ag8mX', '2024-04-25 17:26:24', '2024-04-25 17:26:24'),
(23, 'Ms. Shirley Collier MD', 'crooks.christina@example.net', '2024-04-25 17:26:24', '$2y$10$fxfi73H8KNBzHA6lAQsbK.hxO8qWPO7fcoTBTEr2PP7KII645rUMy', 'superAdmin', 'IDbWKCwjxH', '2024-04-25 17:26:24', '2024-04-25 17:26:24'),
(24, 'Anthony Reinger', 'haylie53@example.net', '2024-04-25 17:26:24', '$2y$10$rpJI56w0oe.ZQZK1cHpAu.LRyrehK1XsW.8K7LuiISndlVr1q7SYm', 'superAdmin', 'AUCGYgGcsm', '2024-04-25 17:26:24', '2024-04-25 17:26:24'),
(25, 'Dr. Hattie Roberts', 'amari.keebler@example.com', '2024-04-25 17:26:24', '$2y$10$6ZZel79LgowY/eDY69yhpuJDLS3VLRm.mNn9P.Hpgf/DiPgV14SaG', 'publisher', 'lZnCuosCEX', '2024-04-25 17:26:25', '2024-04-25 17:26:25'),
(26, 'Albina Beier Jr.', 'ngrady@example.org', '2024-04-25 17:26:25', '$2y$10$2oNfHK6NkB5rNNNu1RX1tOvGPjTIUmejGNUuvWKo3TQtgEwaNs3my', 'editor', 'SciPVJzlml', '2024-04-25 17:26:25', '2024-04-25 17:26:25'),
(27, 'Alf Kuvalis MD', 'mherzog@example.com', '2024-04-25 17:26:25', '$2y$10$ilFXg0M2ckbHGXd9MzGyuORY5fLkd4ElrNIadkPs2l82yxxzz.wa.', 'publisher', '4qCqq1qRA0', '2024-04-25 17:26:25', '2024-04-25 17:26:25'),
(28, 'Kathlyn Jones', 'wking@example.org', '2024-04-25 17:26:25', '$2y$10$xBVHkM.43B2us0bHHIATHOqPBtHZ43Fups80X/dmw7RKUNoH7CmSq', 'editor', 'SggjtLiPZ1', '2024-04-25 17:26:25', '2024-04-25 17:26:25'),
(29, 'Xzavier Auer', 'helga01@example.net', '2024-04-25 17:26:25', '$2y$10$Su7W9KMETulzJiFcEz79K.eJNIBu8ns9qGulDLRVgJ2iT2ioook26', 'publisher', 'rNwfN9Mlbr', '2024-04-25 17:26:25', '2024-04-25 17:26:25'),
(30, 'Jeanette Daniel PhD', 'german74@example.com', '2024-04-25 17:26:25', '$2y$10$xT8MfBvVLPOf5bReb7MyD.Dcof3KT6fvhzV0xaV3T5qbfpQegclrK', 'superAdmin', 'jGiD257LGd', '2024-04-25 17:26:25', '2024-04-25 17:26:25'),
(31, 'Marina Howell', 'terrell.tremblay@example.org', '2024-04-25 17:26:25', '$2y$10$zsRrPt8SDHaE6jCNpS.D0uJjQPcbJj414nhE2Nzfi0tcZXYQHXLii', 'editor', 'TeuLTvIIJQ', '2024-04-25 17:26:25', '2024-04-25 17:26:25'),
(32, 'Montana Klein', 'cframi@example.net', '2024-04-25 17:26:25', '$2y$10$Scvg5N4FqGLk4IMoBMgyH.6WhLvlIe/iVw/hfbioWU39e5M5dfTAa', 'editor', 'ajAGOBNf7a', '2024-04-25 17:26:25', '2024-04-25 17:26:25'),
(33, 'Elwin Fahey', 'bernita.mertz@example.net', '2024-04-25 17:26:25', '$2y$10$mCBdEG/yeSwOX3pMtgUY8e8840VQPWQaQkcDo6s1ExDkEC5CJo9e6', 'admin', 'ybJCNQ1MyN', '2024-04-25 17:26:26', '2024-04-25 17:26:26'),
(34, 'Kaylee Effertz', 'frederik.brekke@example.net', '2024-04-25 17:26:26', '$2y$10$8OcNuCqOhMt3WQj6KT/6f.tq..4p4TJ1Tr0jhBHsYokWFNXC5AiMS', 'superAdmin', '2CLWyjxwxh', '2024-04-25 17:26:26', '2024-04-25 17:26:26'),
(35, 'Hermann Rutherford', 'dibbert.myriam@example.org', '2024-04-25 17:26:26', '$2y$10$yDDrMgOKATy1txP8YlQZT.0H/NCdSKOtMXit2Am7hqW44rfIx1Wxq', 'publisher', 'BuyTSkHGLN', '2024-04-25 17:26:26', '2024-04-25 17:26:26'),
(36, 'Myra O\'Connell MD', 'yazmin.jerde@example.com', '2024-04-25 17:26:26', '$2y$10$eRuvSF.1gSlpF0FPHSKVV.ngPmuVbu50RiVyxKPPl9aTNhZiFEh5C', 'publisher', 'dhAOwuHT8S', '2024-04-25 17:26:26', '2024-04-25 17:26:26'),
(37, 'Joseph Sauer', 'cassidy.turner@example.com', '2024-04-25 17:26:26', '$2y$10$JOUMeNaoul0kx6hseImzzeUVOQB5OFWjwIlguXOHHKz/PdQCta9mu', 'editor', 'D7k5prvPwy', '2024-04-25 17:26:26', '2024-04-25 17:26:26'),
(38, 'Dr. Flavio Mraz', 'carmel.rohan@example.com', '2024-04-25 17:26:26', '$2y$10$tBJvibiLAiwhNohWqohjIuM3fJmQsD96oMFxEBpij2.eYbkaiHwC.', 'superAdmin', 'jfr5kQvZAN', '2024-04-25 17:26:26', '2024-04-25 17:26:26'),
(39, 'Summer Medhurst', 'qspinka@example.net', '2024-04-25 17:26:26', '$2y$10$Npdw1DXbyti6LItewnf3.eAaFPnw/9iolqG.bmjczJ94tzUyi6iEa', 'admin', 'AbCsTpkQbO', '2024-04-25 17:26:26', '2024-04-25 17:26:26'),
(40, 'Miss Selina Beahan II', 'murray.madeline@example.org', '2024-04-25 17:26:26', '$2y$10$ld2RXKxbSFU9OTGBVPl4F.SiHOMFEVMOMwoBqSUsnDd/rT/FBHddy', 'superAdmin', 'KMVEqe6Zsm', '2024-04-25 17:26:26', '2024-04-25 17:26:26'),
(41, 'Arne Langosh', 'ward.rowe@example.com', '2024-04-25 17:26:26', '$2y$10$pw9J62xt03XfI1lidZPBPe1X9BVoAGk3Z7TaasBg5QHrhWzCOHRum', 'editor', '4Pv5ncjifc', '2024-04-25 17:26:26', '2024-04-25 17:26:26'),
(42, 'Jeremie Robel', 'buckridge.oswaldo@example.org', '2024-04-25 17:26:26', '$2y$10$ck2PIGQUHnhv2FcGKK9Dyuj7k3bzQaSRKw.1BZN4bDHzx05yTCeXK', 'admin', 'ptmRgVsRu1', '2024-04-25 17:26:27', '2024-04-25 17:26:27'),
(43, 'Greg Grady', 'gudrun05@example.net', '2024-04-25 17:26:27', '$2y$10$hFT/OimBLBGpBJ3Pukfwn./Eq5sFSNtm4zCOGG6aH412k2cNrvDTy', 'superAdmin', 'RoNVQbzAyO', '2024-04-25 17:26:27', '2024-04-25 17:26:27'),
(44, 'Camilla Conroy', 'ewalsh@example.com', '2024-04-25 17:26:27', '$2y$10$O7t.SI8iQG24tHbfpAp.f.O6OhyMwesRgNjq6Hzs5nZYolc8GfP0i', 'publisher', 'QSjt68f8O7', '2024-04-25 17:26:27', '2024-04-25 17:26:27'),
(45, 'Brooke White', 'reuben56@example.net', '2024-04-25 17:26:27', '$2y$10$6vwvUd6P1uJf8ixiJY0fveT.HcKD5iyM0kLr3mEhk1YRXHDfZenaG', 'admin', 'U4vaSvpQuH', '2024-04-25 17:26:27', '2024-04-25 17:26:27'),
(46, 'Wiley Kub IV', 'camylle74@example.net', '2024-04-25 17:26:27', '$2y$10$JsV.y1I8to0Wd3m6QOjSwuoiAdQMu1N7U.cCmI/Lbsf80a86YhMyq', 'superAdmin', 'AYPAkIMFXv', '2024-04-25 17:26:27', '2024-04-25 17:26:27'),
(47, 'Milan Dickens', 'klocko.lynn@example.com', '2024-04-25 17:26:27', '$2y$10$zA51DLNhSQH1Il9pi7ZM9.9QIggiqZrg.haMQruRcwT86Lj/LJW6q', 'editor', 'Kqhb9noza5', '2024-04-25 17:26:27', '2024-04-25 17:26:27'),
(48, 'Mrs. Tabitha Walter', 'cheyenne.turcotte@example.org', '2024-04-25 17:26:27', '$2y$10$Jr4zt.LNj0zpKA5Ncqm5/etDXHZvmmwhjy4lvFGz1qWKAy2eBKENS', 'publisher', '6cE6XJgvpy', '2024-04-25 17:26:27', '2024-04-25 17:26:27'),
(49, 'Carlie Larkin', 'rmueller@example.org', '2024-04-25 17:26:27', '$2y$10$JWBBtBc0LCPgFdDtg9/1ZOkQe7ouFEh9lxLakkP2ip6aFYE56hn5K', 'superAdmin', 'yEvBkxCecu', '2024-04-25 17:26:27', '2024-04-25 17:26:27'),
(50, 'Ziad Hassan', 'zeyad.h.abaza@gmail.com', '2024-04-25 17:26:29', '$2y$10$/j.g3Z2dUe9quhclr0PtNOQDnuVHtxaYo6AWUvyY1Zyyf2M2C/Q6u', 'superAdmin', 'E0088cPAIT', NULL, NULL),
(51, 'Omer Al-Gamel', 'omeralgamel@gmail.com', '2024-04-25 17:26:29', '$2y$10$kjlq0r6Axz.QA4z8oSBrFO.GM0dtv5QKyaZU1rlu0iN/VdqeOYv8u', 'superAdmin', 'Aow3fAZ8bD', NULL, NULL),
(52, 'Ahmed Al-Shentenawy', 'elshentenawy@gmail.com', '2024-04-25 17:26:29', '$2y$10$AD24qhoNeeKLL5YqIfi.oOivOuDRJuNSsJI1O.aQCAzRx3mVJrkOW', 'superAdmin', 'qfbsFJ1pkB', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_universities`
--
ALTER TABLE `about_universities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `about_universities_user_id_foreign` (`user_id`);

--
-- Indexes for table `applyings`
--
ALTER TABLE `applyings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `applyings_user_id_foreign` (`user_id`);

--
-- Indexes for table `apply_staff`
--
ALTER TABLE `apply_staff`
  ADD PRIMARY KEY (`id`),
  ADD KEY `apply_staff_user_id_foreign` (`user_id`);

--
-- Indexes for table `apply_studies`
--
ALTER TABLE `apply_studies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `apply_studies_user_id_foreign` (`user_id`),
  ADD KEY `apply_studies_faculty_id_foreign` (`faculty_id`);

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `certificates_user_id_foreign` (`user_id`),
  ADD KEY `certificates_staff_programs_id_foreign` (`staff_programs_id`),
  ADD KEY `certificates_staff_members_id_foreign` (`staff_members_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `departments_faculty_id_foreign` (`faculty_id`),
  ADD KEY `departments_user_id_foreign` (`user_id`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `events_user_id_foreign` (`user_id`);

--
-- Indexes for table `event_media`
--
ALTER TABLE `event_media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_media_event_id_foreign` (`event_id`);

--
-- Indexes for table `event_staff_programs`
--
ALTER TABLE `event_staff_programs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_staff_programs_event_id_foreign` (`event_id`),
  ADD KEY `event_staff_programs_staff_program_id_foreign` (`staff_program_id`);

--
-- Indexes for table `faculties`
--
ALTER TABLE `faculties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `faculties_user_id_foreign` (`user_id`);

--
-- Indexes for table `faculty_agents`
--
ALTER TABLE `faculty_agents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `faculty_agents_user_id_foreign` (`user_id`);

--
-- Indexes for table `faculty_agent_staff`
--
ALTER TABLE `faculty_agent_staff`
  ADD PRIMARY KEY (`id`),
  ADD KEY `faculty_agent_staff_faculty_id_foreign` (`faculty_id`),
  ADD KEY `faculty_agent_staff_user_id_foreign` (`user_id`);

--
-- Indexes for table `faculty_leaders`
--
ALTER TABLE `faculty_leaders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `faculty_leaders_faculty_id_foreign` (`faculty_id`),
  ADD KEY `faculty_leaders_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grades_grade_student_id_foreign` (`grade_student_id`);

--
-- Indexes for table `grade_students`
--
ALTER TABLE `grade_students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grade_students_department_id_foreign` (`department_id`);

--
-- Indexes for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_opportunities`
--
ALTER TABLE `job_opportunities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_opportunities_user_id_foreign` (`user_id`),
  ADD KEY `job_opportunities_department_id_foreign` (`department_id`);

--
-- Indexes for table `leader_councils`
--
ALTER TABLE `leader_councils`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leader_councils_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `politics`
--
ALTER TABLE `politics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `politics_user_id_foreign` (`user_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indexes for table `post_media`
--
ALTER TABLE `post_media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_media_post_id_foreign` (`post_id`);

--
-- Indexes for table `president_alerts`
--
ALTER TABLE `president_alerts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `researches`
--
ALTER TABLE `researches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `researches_user_id_foreign` (`user_id`),
  ADD KEY `researches_staff_programs_id_foreign` (`staff_programs_id`),
  ADD KEY `researches_staff_members_id_foreign` (`staff_members_id`);

--
-- Indexes for table `social_links`
--
ALTER TABLE `social_links`
  ADD PRIMARY KEY (`id`),
  ADD KEY `social_links_user_id_foreign` (`user_id`);

--
-- Indexes for table `staff_members`
--
ALTER TABLE `staff_members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `staff_members_user_id_foreign` (`user_id`),
  ADD KEY `staff_members_faculty_id_foreign` (`faculty_id`),
  ADD KEY `staff_members_department_id_foreign` (`department_id`);

--
-- Indexes for table `staff_programs`
--
ALTER TABLE `staff_programs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `staff_programs_user_id_foreign` (`user_id`),
  ADD KEY `staff_programs_department_id_foreign` (`department_id`);

--
-- Indexes for table `staff_socials`
--
ALTER TABLE `staff_socials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `staff_socials_user_id_foreign` (`user_id`),
  ADD KEY `staff_socials_staff_programs_id_foreign` (`staff_programs_id`),
  ADD KEY `staff_socials_staff_members_id_foreign` (`staff_members_id`),
  ADD KEY `staff_socials_faculty_leaders_id_foreign` (`faculty_leaders_id`),
  ADD KEY `staff_socials_university_leaders_id_foreign` (`university_leaders_id`),
  ADD KEY `staff_socials_faculty_agent_staff_id_foreign` (`faculty_agent_staff_id`);

--
-- Indexes for table `student_projects`
--
ALTER TABLE `student_projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_projects_user_id_foreign` (`user_id`),
  ADD KEY `student_projects_department_id_foreign` (`department_id`);

--
-- Indexes for table `study_plans`
--
ALTER TABLE `study_plans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `study_plans_user_id_foreign` (`user_id`),
  ADD KEY `study_plans_department_id_foreign` (`department_id`),
  ADD KEY `study_plans_staff_programs_id_foreign` (`staff_programs_id`),
  ADD KEY `study_plans_staff_members_id_foreign` (`staff_members_id`);

--
-- Indexes for table `university_leaders`
--
ALTER TABLE `university_leaders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `university_leaders_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_universities`
--
ALTER TABLE `about_universities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `applyings`
--
ALTER TABLE `applyings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `apply_staff`
--
ALTER TABLE `apply_staff`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `apply_studies`
--
ALTER TABLE `apply_studies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `event_media`
--
ALTER TABLE `event_media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `event_staff_programs`
--
ALTER TABLE `event_staff_programs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `faculties`
--
ALTER TABLE `faculties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `faculty_agents`
--
ALTER TABLE `faculty_agents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `faculty_agent_staff`
--
ALTER TABLE `faculty_agent_staff`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `faculty_leaders`
--
ALTER TABLE `faculty_leaders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grade_students`
--
ALTER TABLE `grade_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_applications`
--
ALTER TABLE `job_applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `job_opportunities`
--
ALTER TABLE `job_opportunities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `leader_councils`
--
ALTER TABLE `leader_councils`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `politics`
--
ALTER TABLE `politics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `post_media`
--
ALTER TABLE `post_media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `president_alerts`
--
ALTER TABLE `president_alerts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `researches`
--
ALTER TABLE `researches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `social_links`
--
ALTER TABLE `social_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `staff_members`
--
ALTER TABLE `staff_members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `staff_programs`
--
ALTER TABLE `staff_programs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `staff_socials`
--
ALTER TABLE `staff_socials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `student_projects`
--
ALTER TABLE `student_projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `study_plans`
--
ALTER TABLE `study_plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `university_leaders`
--
ALTER TABLE `university_leaders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `about_universities`
--
ALTER TABLE `about_universities`
  ADD CONSTRAINT `about_universities_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `applyings`
--
ALTER TABLE `applyings`
  ADD CONSTRAINT `applyings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `apply_staff`
--
ALTER TABLE `apply_staff`
  ADD CONSTRAINT `apply_staff_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `apply_studies`
--
ALTER TABLE `apply_studies`
  ADD CONSTRAINT `apply_studies_faculty_id_foreign` FOREIGN KEY (`faculty_id`) REFERENCES `faculties` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `apply_studies_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `certificates`
--
ALTER TABLE `certificates`
  ADD CONSTRAINT `certificates_staff_members_id_foreign` FOREIGN KEY (`staff_members_id`) REFERENCES `staff_programs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `certificates_staff_programs_id_foreign` FOREIGN KEY (`staff_programs_id`) REFERENCES `staff_programs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `certificates_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `departments_faculty_id_foreign` FOREIGN KEY (`faculty_id`) REFERENCES `faculties` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `departments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `event_media`
--
ALTER TABLE `event_media`
  ADD CONSTRAINT `event_media_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `event_staff_programs`
--
ALTER TABLE `event_staff_programs`
  ADD CONSTRAINT `event_staff_programs_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `event_staff_programs_staff_program_id_foreign` FOREIGN KEY (`staff_program_id`) REFERENCES `staff_programs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `faculties`
--
ALTER TABLE `faculties`
  ADD CONSTRAINT `faculties_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `faculty_agents`
--
ALTER TABLE `faculty_agents`
  ADD CONSTRAINT `faculty_agents_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `faculty_agent_staff`
--
ALTER TABLE `faculty_agent_staff`
  ADD CONSTRAINT `faculty_agent_staff_faculty_id_foreign` FOREIGN KEY (`faculty_id`) REFERENCES `faculties` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `faculty_agent_staff_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `faculty_leaders`
--
ALTER TABLE `faculty_leaders`
  ADD CONSTRAINT `faculty_leaders_faculty_id_foreign` FOREIGN KEY (`faculty_id`) REFERENCES `faculties` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `faculty_leaders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `grades`
--
ALTER TABLE `grades`
  ADD CONSTRAINT `grades_grade_student_id_foreign` FOREIGN KEY (`grade_student_id`) REFERENCES `grade_students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `grade_students`
--
ALTER TABLE `grade_students`
  ADD CONSTRAINT `grade_students_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `job_opportunities`
--
ALTER TABLE `job_opportunities`
  ADD CONSTRAINT `job_opportunities_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `job_opportunities_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `leader_councils`
--
ALTER TABLE `leader_councils`
  ADD CONSTRAINT `leader_councils_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `politics`
--
ALTER TABLE `politics`
  ADD CONSTRAINT `politics_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post_media`
--
ALTER TABLE `post_media`
  ADD CONSTRAINT `post_media_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `researches`
--
ALTER TABLE `researches`
  ADD CONSTRAINT `researches_staff_members_id_foreign` FOREIGN KEY (`staff_members_id`) REFERENCES `staff_programs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `researches_staff_programs_id_foreign` FOREIGN KEY (`staff_programs_id`) REFERENCES `staff_programs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `researches_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `social_links`
--
ALTER TABLE `social_links`
  ADD CONSTRAINT `social_links_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `staff_members`
--
ALTER TABLE `staff_members`
  ADD CONSTRAINT `staff_members_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `staff_members_faculty_id_foreign` FOREIGN KEY (`faculty_id`) REFERENCES `faculties` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `staff_members_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `staff_programs`
--
ALTER TABLE `staff_programs`
  ADD CONSTRAINT `staff_programs_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `staff_programs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `staff_socials`
--
ALTER TABLE `staff_socials`
  ADD CONSTRAINT `staff_socials_faculty_agent_staff_id_foreign` FOREIGN KEY (`faculty_agent_staff_id`) REFERENCES `faculty_agent_staff` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `staff_socials_faculty_leaders_id_foreign` FOREIGN KEY (`faculty_leaders_id`) REFERENCES `faculty_leaders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `staff_socials_staff_members_id_foreign` FOREIGN KEY (`staff_members_id`) REFERENCES `staff_members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `staff_socials_staff_programs_id_foreign` FOREIGN KEY (`staff_programs_id`) REFERENCES `staff_programs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `staff_socials_university_leaders_id_foreign` FOREIGN KEY (`university_leaders_id`) REFERENCES `university_leaders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `staff_socials_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_projects`
--
ALTER TABLE `student_projects`
  ADD CONSTRAINT `student_projects_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_projects_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `study_plans`
--
ALTER TABLE `study_plans`
  ADD CONSTRAINT `study_plans_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `study_plans_staff_members_id_foreign` FOREIGN KEY (`staff_members_id`) REFERENCES `staff_members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `study_plans_staff_programs_id_foreign` FOREIGN KEY (`staff_programs_id`) REFERENCES `staff_programs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `study_plans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `university_leaders`
--
ALTER TABLE `university_leaders`
  ADD CONSTRAINT `university_leaders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
