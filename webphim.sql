-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 29, 2022 lúc 10:38 AM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `webphim`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug_category` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `title`, `slug_category`, `description`, `status`) VALUES
(8, 'Phim chiếu rạp', 'phim-chieu-rap', NULL, 1),
(15, 'Phim lẻ', 'phim-le', NULL, 1),
(16, 'Phim bộ', 'phim-bo', NULL, 1),
(17, 'Trailer', 'trailer', NULL, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `slug_country` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `countries`
--

INSERT INTO `countries` (`id`, `title`, `slug_country`, `description`, `status`) VALUES
(6, 'Việt Nam', 'viet-nam', NULL, 1),
(7, 'Ấn Độ', 'an-do', NULL, 1),
(8, 'Mỹ', 'my', NULL, 1),
(9, 'Hồng Kông', 'hong-kong', NULL, 1),
(10, 'Nhật Bản', 'nhat-ban', NULL, 1),
(11, 'Trung Quốc', 'trung-quoc', NULL, 1),
(12, 'Hàn Quốc', 'han-quoc', NULL, 1),
(13, 'Đài Loan', 'dai-loan', NULL, 1),
(14, 'Thái Lan', 'thai-lan', NULL, 1),
(15, 'Philippin', 'philippin', NULL, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `episodes`
--

CREATE TABLE `episodes` (
  `id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `link` varchar(255) NOT NULL,
  `episode` int(11) NOT NULL,
  `ngaytao` date NOT NULL,
  `ngaycapnhat` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `episodes`
--

INSERT INTO `episodes` (`id`, `movie_id`, `link`, `episode`, `ngaytao`, `ngaycapnhat`) VALUES
(6, 31, '<p><iframe allowfullscreen frameborder=\"0\" width=\"100%\" height=\"450\" src=\"https://short.ink/azNkZcAiq\"></iframe></p>', 1, '2022-07-07', '2022-07-07'),
(7, 32, '<p><iframe allowfullscreen frameborder=\"0\" width=\"100%\" height=\"450\" src=\"https://short.ink/eElGHqmUM\"></iframe></p>', 1, '2022-07-07', '2022-07-07'),
(8, 33, '<p><iframe allowfullscreen frameborder=\"0\" width=\"100%\" height=\"450\" src=\"https://short.ink/Q-s-lLmIF\"></iframe></p>', 1, '2022-07-07', '2022-07-07'),
(9, 34, '<p><iframe allowfullscreen frameborder=\"0\" width=\"100%\" height=\"450\" src=\"https://short.ink/yKOWhqhbV\"></iframe></p>', 1, '2022-07-07', '2022-07-07'),
(10, 35, '<p><iframe allowfullscreen frameborder=\"0\" width=\"100%\" height=\"450\" src=\"https://short.ink/80oo1QOCO\"></iframe></p>', 1, '2022-07-07', '2022-07-07'),
(11, 36, '<p><iframe allowfullscreen frameborder=\"0\" width=\"100%\" height=\"450\" src=\"https://short.ink/TVQmLexcg\"></iframe></p>', 1, '2022-07-07', '2022-07-07'),
(12, 37, '<p><iframe allowfullscreen frameborder=\"0\" width=\"100%\" height=\"450\" src=\"https://short.ink/G0vvTGuIG\"></iframe></p>', 1, '2022-07-07', '2022-07-07'),
(13, 38, '<p><iframe allowfullscreen frameborder=\"0\" width=\"100%\" height=\"450\" src=\"https://short.ink/L4KrbLzhF\"></iframe></p>', 1, '2022-07-07', '2022-07-07'),
(14, 39, '<p><iframe allowfullscreen frameborder=\"0\" width=\"100%\" height=\"450\" src=\"https://short.ink/pamYRJO2s\"></iframe></p>', 1, '2022-07-07', '2022-07-07'),
(15, 40, '<p><iframe allowfullscreen frameborder=\"0\" width=\"100%\" height=\"450\" src=\"https://short.ink/LYtszXxdC\"></iframe></p>', 1, '2022-07-07', '2022-07-07'),
(16, 41, '<p><iframe allowfullscreen frameborder=\"0\" width=\"100%\" height=\"450\" src=\"https://short.ink/auBILo12v\"></iframe></p>', 1, '2022-07-07', '2022-07-07'),
(17, 42, '<p><iframe allowfullscreen frameborder=\"0\" width=\"100%\" height=\"450\" src=\"https://short.ink/pD3sJ87_7\"></iframe></p>', 1, '2022-07-07', '2022-07-07'),
(18, 43, '<p><iframe allowfullscreen frameborder=\"0\" width=\"100%\" height=\"450\" src=\"https://short.ink/XD4Ps0W4m\"></iframe></p>', 1, '2022-07-07', '2022-07-07'),
(19, 44, '<p><iframe allowfullscreen frameborder=\"0\" width=\"100%\" height=\"450\" src=\"https://short.ink/FT46zOJNZ\"></iframe></p>', 1, '2022-07-07', '2022-07-07'),
(21, 48, '<p><iframe allowfullscreen frameborder=\"0\" width=\"100%\" height=\"450\" src=\"https://short.ink/qVbz3ejm3\"></iframe></p>', 1, '2022-07-08', '2022-07-08'),
(22, 48, '<p><iframe allowfullscreen frameborder=\"0\" width=\"100%\" height=\"450\" src=\"https://short.ink/UepnMm7Sb\"></iframe></p>', 2, '2022-07-08', '2022-07-08'),
(23, 48, '<p><iframe allowfullscreen frameborder=\"0\" width=\"100%\" height=\"450\" src=\"https://short.ink/-oqOYAVpi9\"></iframe></p>', 3, '2022-07-08', '2022-07-08'),
(24, 48, '<p><iframe allowfullscreen frameborder=\"0\" width=\"100%\" height=\"450\" src=\"https://short.ink/hPfcfl3rp\"></iframe></p>', 4, '2022-07-08', '2022-07-08'),
(25, 48, '<p><iframe allowfullscreen frameborder=\"0\" width=\"100%\" height=\"450\" src=\"https://short.ink/Sj6cXjkfs\"></iframe></p>', 5, '2022-07-08', '2022-07-08'),
(26, 48, '<p><iframe allowfullscreen frameborder=\"0\" width=\"100%\" height=\"450\" src=\"https://short.ink/F2Q1JOXIC\"></iframe></p>', 6, '2022-07-08', '2022-07-08'),
(27, 48, '<p><iframe allowfullscreen frameborder=\"0\" width=\"100%\" height=\"450\" src=\"https://short.ink/9Lqmq094G\"></iframe></p>', 7, '2022-07-08', '2022-07-08'),
(28, 48, '<p><iframe allowfullscreen frameborder=\"0\" width=\"100%\" height=\"450\" src=\"https://short.ink/GXAWKCeHY\"></iframe></p>', 8, '2022-07-08', '2022-07-08'),
(29, 48, '<p><iframe allowfullscreen frameborder=\"0\" width=\"100%\" height=\"450\" src=\"https://short.ink/MHs7RuWv9\"></iframe></p>', 9, '2022-07-08', '2022-07-08'),
(30, 48, '<p><iframe allowfullscreen frameborder=\"0\" width=\"100%\" height=\"450\" src=\"https://short.ink/heMUb9TIY\"></iframe></p>', 10, '2022-07-08', '2022-07-08');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `genres`
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `slug_genre` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `genres`
--

INSERT INTO `genres` (`id`, `title`, `slug_genre`, `description`, `status`) VALUES
(1, 'Hành động', 'hanh-dong', NULL, 1),
(2, 'Viễn Tưỡng', 'vien-tuong', NULL, 1),
(4, 'Tâm Lý', 'tam-ly', NULL, 1),
(5, 'Hoạt Hình', 'hoat-hinh', NULL, 1),
(6, 'Kinh Dị', 'kinh-di', NULL, 1),
(7, 'Hài Hước', 'hai-huoc', NULL, 1),
(8, 'Hình Sự', 'hinh-su', NULL, 1),
(9, 'Võ Thuật', 'vo-thuat', NULL, 1),
(10, 'Cổ Trang', 'co-trang', NULL, 1),
(11, 'Phim Ma', 'phim-ma', NULL, 1),
(12, 'Tình Cảm', 'tinh-cam', NULL, 1),
(13, 'Thể Thao', 'the-thao', NULL, 1),
(14, 'Âm Nhạc', 'am-nhac', NULL, 1),
(15, 'Thần Thoại', 'than-thoai', NULL, 1),
(16, 'Tài Liệu', 'tai-lieu', NULL, 1),
(17, 'Phiêu Lưu', 'phieu-luu', NULL, 1),
(18, 'Gia Đình', 'gia-dinh', NULL, 1),
(19, 'Chiến Tranh', 'chien-tranh', NULL, 1),
(20, 'Phim hoạt hình', 'phim-hoat-hinh', NULL, 1),
(21, 'Phim Netflix', 'phim-netflix', NULL, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `trailer` varchar(50) DEFAULT NULL,
  `slug_movie` varchar(255) NOT NULL,
  `fullepi` int(11) NOT NULL,
  `time` int(20) DEFAULT NULL,
  `view` int(50) DEFAULT NULL,
  `description` longtext NOT NULL,
  `tags` text DEFAULT NULL,
  `year` varchar(20) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `hot` int(1) NOT NULL,
  `new` int(11) NOT NULL,
  `resolution` int(11) NOT NULL,
  `sub` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `ngaytao` datetime NOT NULL,
  `ngaycapnhat` date DEFAULT NULL,
  `top_day` int(11) NOT NULL,
  `top_week` int(11) NOT NULL,
  `top_month` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `movies`
--

INSERT INTO `movies` (`id`, `title`, `trailer`, `slug_movie`, `fullepi`, `time`, `view`, `description`, `tags`, `year`, `status`, `hot`, `new`, `resolution`, `sub`, `image`, `category_id`, `genre_id`, `country_id`, `ngaytao`, `ngaycapnhat`, `top_day`, `top_week`, `top_month`) VALUES
(24, 'SÁCH TRẮNG KẾT HÔN, WELCOME TO WEDDING HELL (2022)', NULL, 'sach-trang-ket-hon-welcome-to-wedding-hell-2022', 16, 60, 7, 'Sách Trắng Kết Hôn, Welcome to Wedding Hell (2022) - Lời cầu hôn được xem là một kết thúc có hậu. Nhưng đối với cặp đôi này, nó trở thành khởi đầu của một trận chiến khó khăn: chuẩn bị đám cưới.', 'Sách Trắng Kết Hôn, Welcome to Wedding Hell (2022)', '2022', 1, 1, 1, 0, 0, 'sach-trang-ket-hon-welcome-to-wedding-hell-2022_Tr.jpg', 16, 12, 12, '2022-07-06 18:00:34', NULL, 0, 0, 0),
(31, 'Chỉ Hoạ Bì', 'https://www.youtube.com/embed/', 'chi-hoa-bi', 1, 120, 6, 'Hoạ sư cung đình Lục Cửu Khanh vô tình dùng bút thần mở ra thế giới trong tranh, gặp gỡ tinh linh thảo mộc Nhan Ca. Nữ tử trong thành liên tiếp bị huỷ hoại gương mặt, để điều tra chân tướng hai người họ đã vào mộ sinh tử. Yêu vương lột đi da mặt của chúng tinh linh thảo mộc, Nhan Ca mất đi gương mặt xinh đẹp trở thành cành cây khô cằn dữ tợn. Một cuộc thử thách giữa vẻ bề ngoài và tấm lòng được đặt ra ngay trước mặt Lục Cửu Khanh.', 'Chỉ Hoạ Bì - Paper Beauty, Paper Beauty 2022 Full', '2022', 1, 1, 1, 0, 0, 'chi-hoa-bi_IQ.jpg', 15, 2, 11, '2022-07-07 20:56:11', '2022-07-07', 0, 0, 0),
(32, 'Tân Môn Huyền Án – The Curious Case Of Tianjin', 'https://www.youtube.com/embed/', 'tan-mon-huyen-an-the-curious-case-of-tianjin', 1, 120, 1, 'Trong thời kỳ Dân Quốc, tình hình tại bến cảng Tân Môn lại trở lên hỗn loạn. Tào vận và bang Thanh Long đánh nhau tranh chấp địa bàn làm ăn kinh doanh. Tần Phàm đi đàm phán nhưng vô tình đánh chết hai người anh em của bang phái, bị gán cho cái tên là kẻ giết người vượt ngục trộm xác sau đó bị cảnh sát và hai bang phái truy đuổi. các băng nhóm với nhau. Qin Fan vì không nhớ mình đã trốn thoát bằng cách nào nên đã quyết định đích thân tìm ra nguyên nhân thực sự cái chết của tên trộm xác chết và hai người em trai của hắn để chứng minh mình vô tội. Sảnh lớn khói mịt mù cả bến tàu Âm mưu hại nước hại dân, Tần Sở có thể thoát ra ngoài an toàn? Làm thế nào để ngăn chặn những hành động xấu xa của người nước ngoài?', 'Tân Môn Huyền Án - The Curious Case Of Tianjin, The Curious Case Of Tianjin 2022 Full', '2022', 1, 1, 1, 0, 0, 'tan-mon-huyen-an-the-curious-case-of-tianjin_oS.jpg', 15, 1, 11, '2022-07-07 21:31:45', '2022-07-07', 0, 0, 0),
(33, 'Những Cuộc Phiêu Lưu Của Maid Marian – The Adventures of Maid Marian', 'https://www.youtube.com/embed/', 'nhung-cuoc-phieu-luu-cua-maid-marian-the-adventures-of-maid-marian', 1, 120, 1, 'Sau ba năm ẩn náu trong một vương viện hẻo lánh, Marian nhận được tin tức rằng Vua Richard the Lionheart đã chết. Robin Hood, người yêu của cô đang trở về sau cuộc chiến. Rời khỏi thánh địa của mình, cô vội vã đến gặp anh ta nhưng họ phát hiện ra tất cả không phải như nó có vẻ. William De Wendenal, Cảnh sát trưởng bị thất sủng của Nottingham, đã trở về sau cuộc sống lưu vong và ra ngoài để trả thù. Bị phục kích, Marian và Robin chiến đấu để giành lấy mạng sống của họ và trốn thoát, nhưng Robin bị thương nặng. Ở sâu trong rừng và hàng dặm để được giúp đỡ và bị săn đuổi bởi những tên lính đánh thuê tàn nhẫn, Marian phải sử dụng tất cả các kỹ năng theo ý mình để giữ Robin sống sót và đưa anh ta đến nơi an toàn.', 'Những Cuộc Phiêu Lưu Của Maid Marian - The Adventures of Maid Marian, The Adventures of Maid Marian 2022 Full', '2022', 1, 1, 1, 0, 0, 'nhung-cuoc-phieu-luu-cua-maid-marian-the-adventures-of-maid-marian_Pl.jpg', 15, 1, 8, '2022-07-07 21:37:38', '2022-07-07', 0, 0, 0),
(34, 'Thoát Khỏi Cánh Đồng – Escape the Field', 'https://www.youtube.com/embed/', 'thoat-khoi-canh-dong-escape-the-field', 1, 120, 10, 'Sáu người lạ thức dậy bị mắc kẹt trong một cánh đồng ngô dài vô tận chỉ để khám phá ra một điều gì đó bí ẩn đang săn lùng họ.', 'Thoát Khỏi Cánh Đồng - Escape the Field, Escape the Field 2022 Full', '2022', 1, 1, 1, 0, 0, 'thoat-khoi-canh-dong-escape-the-field_ap.jpg', 15, 6, 8, '2022-07-07 21:43:10', '2022-07-07', 0, 6, 6),
(35, 'Vỏ Bọc Ma: SAC_2045 Chiến Tranh Trường Kỳ – Ghost in the Shell: SAC_2045 Sustainable War', 'https://www.youtube.com/embed/', 'vo-boc-ma-sac-2045-chien-tranh-truong-ky-ghost-in-the-shell-sac-2045-sustainable-war', 1, 120, 9, 'Vào năm 2045, lính đánh thuê điều khiển học Motoko Kusanagi quay trở lại Phần 9 để đối mặt với một mối đe dọa mới nguy hiểm: những người sau khi chết. Bản tóm tắt có thời lượng dài của phần đầu tiên của Ghost in the Shell: SAC_2045.', 'Vỏ Bọc Ma: SAC_2045 Chiến Tranh Trường Kỳ - Ghost in the Shell: SAC_2045 Sustainable War, Ghost in the Shell: SAC_2045 Sustainable War 2022 Full', '2022', 1, 1, 1, 0, 0, 'vo-boc-ma-sac-2045-chien-tranh-truong-ky-ghost-in-the-shell-sac-2045-sustainable-war_5f.jpg', 15, 1, 10, '2022-07-07 21:47:50', '2022-07-07', 0, 0, 0),
(36, 'Hoàng Hôn Đời Sát Thủ – Time', 'https://www.youtube.com/embed/', 'hoang-hon-doi-sat-thu-time', 1, 140, 2, 'Thế hệ sát thủ cuối cùng chuyển đến HK vào những năm 50/60 và được coi là bộ ba “sát thủ cho thuê” để khắc phục tất cả các loại vấn đề cho khách hàng của họ. Nhiều thập kỷ trôi qua, giờ đây họ trở nên thừa thãi tại nơi làm việc và gia đình. Một nhiệm vụ tình cờ gọi đến họ hóa ra lại là một vụ tự sát được hỗ trợ. Bộ ba đột nhiên tìm thấy “cuộc sống” mới … với tư cách là “Các thiên thần hộ mệnh của các trưởng lão”. Ngay khi họ đang tìm thấy ý nghĩa cho vai trò mới này, một mệnh lệnh từ một thiếu niên lại đảo lộn công việc mới của họ … Đây cũng có thể là công việc cuối cùng của họ.', 'Hoàng Hôn Đời Sát Thủ - Time, Time 2021 Full', '2021', 1, 1, 1, 0, 0, 'hoang-hon-doi-sat-thu-time_cs.jpg', 15, 1, 11, '2022-07-07 22:00:51', '2022-07-07', 0, 0, 0),
(37, 'Đội Trưởng Nova – Captain Nova', 'https://www.youtube.com/embed/', 'doi-truong-nova-captain-nova', 1, 125, 2, 'Một phi công chiến đấu du hành ngược thời gian để cứu thế giới tương lai khỏi thảm họa môi trường, nhưng một tác dụng phụ khiến cô ấy trẻ lại và không ai coi trọng cô ấy.', 'Đội Trưởng Nova - Captain Nova, Captain Nova 2022 Full', '2022', 1, 1, 1, 0, 0, 'doi-truong-nova-captain-nova_Is.jpg', 15, 2, 8, '2022-07-07 22:04:33', '2022-07-07', 0, 0, 0),
(38, 'Chú Thuật Hồi Chiến 0 – Jujutsu Kaisen 0 Movie (Gekijouban Jujutsu Kaisen 0)', 'https://www.youtube.com/embed/', 'chu-thuat-hoi-chien-0-jujutsu-kaisen-0-movie-gekijouban-jujutsu-kaisen-0', 1, 140, 7, 'Yuta Okkotsu, một học sinh trung học giành được quyền kiểm soát một Linh hồn bị nguyền rủa cực kỳ mạnh mẽ và được các phù thủy Jujutsu đăng ký vào trường trung học Jujutsu tỉnh Tokyo để giúp anh ta kiểm soát sức mạnh của mình và để mắt đến anh ta.', 'Chú Thuật Hồi Chiến 0 - Jujutsu Kaisen 0 Movie (Gekijouban Jujutsu Kaisen 0), Jujutsu Kaisen 0 Movie (Gekijouban Jujutsu Kaisen 0) 2022 CAM', '2022', 1, 1, 1, 3, 0, 'chu-thuat-hoi-chien-0-jujutsu-kaisen-0-movie-gekijouban-jujutsu-kaisen-0_Ee.jpg', 8, 20, 10, '2022-07-07 22:07:46', '2022-07-07', 5, 5, 5),
(39, 'Lời Nguyền – The Cursed (Eight For Silver)', 'https://www.youtube.com/embed/', 'loi-nguyen-the-cursed-eight-for-silver', 1, 130, 5, 'Ở vùng nông thôn nước Pháp vào thế kỷ 19, một mối đe dọa siêu nhiên, bí ẩn đang đe dọa một ngôi làng nhỏ. John McBride, một nhà nghiên cứu bệnh học, đến thị trấn để điều tra mối nguy hiểm – và xua đuổi một số con quỷ của chính mình trong quá trình này.', 'Lời Nguyền - The Cursed (Eight For Silver), The Cursed (Eight For Silver) 2021 Full', '2021', 1, 1, 1, 0, 0, 'loi-nguyen-the-cursed-eight-for-silver_xa.jpg', 15, 6, 8, '2022-07-07 22:12:19', '2022-07-07', 0, 4, 4),
(40, 'Quá Khứ Đồng Sơn – Tongshan Past Without Darkness Under The Lamp', 'https://www.youtube.com/embed/', 'qua-khu-dong-son-tongshan-past-without-darkness-under-the-lamp', 1, 70, 2, 'Quá khứ đồng sơn – Tongshan past without darkness under the lamp là bộ phim thuộc thể loại hành động, hài hước, tình tiết của Trung Quốc. Tác phẩm do đạo diễn Li Cheng Ru chịu trách nhiệm chỉ đạo, với sự tham gia của các diễn viên Xu Jun Cong, Yu En Tai và Cui Zhen Zhen.\r\n\r\nBộ phim lấy bối cảnh vào thời Bắc Dương, có tên cướp chính nghĩa Bắc Cẩu đã dẫn theo người của mình giết chết tên Huyền Vũ của trấn Đồng Sơn, nhằm bảo vệ bình yên cho trấn. Sau đó, thuộc hạ của Đô Thống là Hạ Tham đã đến gặp Huyền Vũ nhằm lấy lại số vàng đã bị cướp trước đó.\r\n\r\nHắc Cẩu, người đang ở trong tình thế tiến thoái lưỡng nan đã chiến đấu hết mình, tới chết vì công lý và thành công giữ bình yên cho thị trấn Đồng Sơn.', 'Quá Khứ Đồng Sơn - Tongshan Past Without Darkness Under The Lamp, Tongshan Past Without Darkness Under The Lamp 2022 Full', '2022', 1, 1, 1, 0, 0, 'qua-khu-dong-son-tongshan-past-without-darkness-under-the-lamp_uq.jpg', 15, 1, 11, '2022-07-07 22:16:04', '2022-07-07', 0, 0, 0),
(41, 'Khai Quan – Open The Coffin', 'https://www.youtube.com/embed/', 'khai-quan-open-the-coffin', 1, 90, 7, 'Khai quan – Open the Coffin là bộ phim thuộc thể loại kinh dị, tội phạm, giật gân của Trung Quốc. Tác phẩm do do Han Dong chịu trách nhiệm chỉ đạo, với sự tham gia của các diễn viên Zhong Lei và Jiang Chao.\r\n\r\nCâu chuyện dựa trên vụ trộm mộ ở núi Dayun, Xuyi, Giang Tô gây chấn động cả nước vào năm 2009. Phim được xử lý một cách đầy sáng tạo qua kỹ xảo nghệ thuật dưới góc nhìn của cảnh sát nhân dân Shen Chunhe, kể về câu chuyện trộm mộ cổ và quá trình phá án. Câu chuyện dựa trên một vụ trộm mộ có thật, đồng thời kết hợp các yếu tố của một bộ phim giật gân qua những phân cảnh điều tra tội phạm.', 'Khai Quan - Open The Coffin, Open The Coffin 2022 Full', '2022', 1, 1, 1, 0, 0, 'khai-quan-open-the-coffin_UW.jpg', 15, 1, 11, '2022-07-07 22:20:13', '2022-07-07', 0, 2, 2),
(42, 'Mọi Thứ Mọi Nơi Mọi Lúc – Everything Everywhere All at Once', 'https://www.youtube.com/embed/', 'moi-thu-moi-noi-moi-luc-everything-everywhere-all-at-once', 1, 140, 4, 'Một người nhập cư Trung Quốc lớn tuổi bị cuốn vào một cuộc phiêu lưu điên rồ, nơi cô ấy một mình có thể cứu thế giới bằng cách khám phá các vũ trụ khác kết nối với những cuộc sống mà cô ấy có thể đã dẫn dắt.', 'Mọi Thứ Mọi Nơi Mọi Lúc - Everything Everywhere All at Once, Everything Everywhere All at Once 2022 Full', '2022', 1, 1, 1, 0, 0, 'moi-thu-moi-noi-moi-luc-everything-everywhere-all-at-once_To.jpg', 8, 1, 8, '2022-07-07 22:30:32', '2022-07-07', 0, 2, 2),
(43, 'Vạch Trần Địa Ngục Số: Phòng Chat Thứ N – Cyber Hell: Exposing an Internet Horror', 'https://www.youtube.com/embed/', 'vach-tran-dia-nguc-so-phong-chat-thu-n-cyber-hell-exposing-an-internet-horror', 1, 105, 14, 'Ẩn danh và bóc lột, một mạng lưới các phòng chat trực tuyến lan tràn tội phạm tình dục. Cuộc săn lùng nhằm hạ bệ những kẻ điều hành đòi hỏi sự gan dạ và kiên trì.', 'Vạch Trần Địa Ngục Số: Phòng Chat Thứ N - Cyber Hell: Exposing an Internet Horror, Cyber Hell: Exposing an Internet Horror 2022 Full', '2022', 1, 1, 1, 0, 0, 'vach-tran-dia-nguc-so-phong-chat-thu-n-cyber-hell-exposing-an-internet-horror_Pp.jpg', 15, 8, 12, '2022-07-07 22:35:00', '2022-07-07', 0, 0, 0),
(44, 'Đường Đua Tham Vọng – Jockey', 'https://www.youtube.com/embed/', 'duong-dua-tham-vong-jockey', 1, 90, 20, 'Một tay đua ngựa già đang nhắm đến chức vô địch cuối cùng, khi một tay đua tân binh đến tự xưng là con trai của anh ta.', 'Đường Đua Tham Vọng - Jockey, Jockey 2021 Full', '2022', 1, 1, 1, 0, 0, 'duong-dua-tham-vong-jockey_rX.jpg', 15, 4, 8, '2022-07-07 22:38:16', '2022-07-07', 1, 2, 2),
(45, 'Squid Game Season 2 (2022)', 'https://www.youtube.com/embed/Ns4hts64Zqo', 'squid-game-season-2-2022', 10, 65, 4, 'Vào cuối season 1 của Squid Game, Gi-hun đã không thể hiện mong muốn tiêu số tiền thắng lớn của mình, điều dễ hiểu là đã bị hủy hoại bởi trải nghiệm chứng kiến ​​bạn bè của mình lần lượt thiệt mạng trong trò chơi. Và khi anh ấy chuẩn bị bay đến Los Angeles để gặp con gái thì liền phát hiện ra trò chơi chết chóc kia vẫn đang tiếp tục. Vậy là Gi-hun quay đầu xuống máy bay với quyết tâm và một kế hoạch để ngăn chặn nó.\r\n\r\nTrong khi đó Hwang In-ho đã thắng trò chơi vào năm 2015 và bằng cách nào đó quyết định trở thành Front Man, điều hành giải đấu cho người dẫn chương trình bí ẩn, hóa ra là người chơi số 001 Oh Il-nam. In-ho chắc chắn đã bắn anh trai mình, sĩ quan cảnh sát Hwang Jun-ho, nhưng chúng ta chưa bao giờ nhìn thấy xác chết của anh ta, và xung đột anh em sẽ tạo nên một cốt truyện mùa 2 hấp dẫn. Điều gì sẽ xảy ra nếu Jun-ho sống sót và hai anh em bắt đầu hạ gục trò chơi?', 'Squid Game 2, squid game, Trò Chơi Con Mực, xem Trò Chơi Con Mực, xem tro choi con muc, xem squid game, squid game netflix, xem tro choi con muc netflix, tro choi con muc netflix', '2022', 1, 0, 0, 0, 0, 'squid-game-season-2-2022_mj.png', 17, 1, 12, '2022-07-08 09:31:41', '2022-07-08', 0, 0, 0),
(46, 'Now You See Me 3', 'https://www.youtube.com/embed/r8k9S5GPD2U', 'now-you-see-me-3', 1, 120, 6, 'NỘI DUNG PHIM\r\nPhim Phi Vụ Thế Kỷ 3 – Now You See Me 3 Full HD Vietsub\r\nPhi Vụ Thế Kỷ 3 – Now You See Me 3 là bộ phim thuộc thể loại hành động, hình sự, tâm lý, kịch tính của Mỹ được sản xuất vào năm 2022 do David Gould biên kịch và chịu trách nhiệm chỉ đạo, Now You See Me được khán giả yêu mến nhờ tính bất ngờ và luôn khiến người xem phải đặt nghi vấn. Bất cứ nhà ảo thuật nào cũng không thể diễn mãi một màn, và loạt phim cần đem tới những điều mới mẻ ở phần 3.', 'BiChill, BiluTV, Biphim, DongPhim, FPTPlay, Luotphim, MotChill, MotPhim, Now You See Me, Now You See Me 3, Phi Vụ Thế Kỷ, Phi Vụ Thế Kỷ 3, Phi Vụ Thế Kỷ Phần 3, PhimChill, PhimMoi.Net, SSphim, SubNhanh, TVHay, xem phim phi vụ thế kỷ 3 vietsub phimmoi, phi', '2022', 1, 0, 0, 0, 0, 'now-you-see-me-3_lp.jpg', 17, 1, 8, '2022-07-08 09:34:47', '2022-07-08', 0, 0, 0),
(48, 'Lưới Điện – Grid', 'https://www.youtube.com/embed/', 'luoi-dien-grid', 10, 50, 25, 'Trái đất đã sống sót sau những cơn gió mặt trời thảm khốc dưới sự bảo vệ của Grid, lá chắn bảo vệ hành tinh của nó. Kim Sae Ha, một nhân viên của Cục, gặp phải một kẻ giết người. Jung Sae Byeok, một thám tử, được cử đi truy bắt kẻ giết người. Nhưng tại sao cô ấy lại tiếp tay cho kẻ chạy trốn? Đây là một bộ phim kinh dị theo đuổi sự thật bí ẩn đằng sau những gì đã cứu nhân loại khỏi một ngày tận thế.', 'Lưới Điện - Grid, Grid 2022 HD', '2021', 1, 1, 1, 0, 0, 'luoi-dien-grid_rc.jpg', 16, 1, 12, '2022-07-08 09:47:43', '2022-07-08', 1, 15, 15);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `movie_category`
--

CREATE TABLE `movie_category` (
  `id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `movie_category`
--

INSERT INTO `movie_category` (`id`, `movie_id`, `category_id`) VALUES
(38, 24, 16),
(45, 31, 15),
(46, 32, 15),
(47, 33, 15),
(48, 34, 15),
(49, 35, 15),
(50, 36, 15),
(51, 37, 15),
(52, 38, 8),
(53, 39, 15),
(54, 40, 15),
(55, 41, 15),
(56, 42, 8),
(57, 43, 15),
(58, 44, 15),
(59, 45, 17),
(60, 46, 17),
(62, 48, 16);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `movie_genre`
--

CREATE TABLE `movie_genre` (
  `id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `movie_genre`
--

INSERT INTO `movie_genre` (`id`, `movie_id`, `genre_id`) VALUES
(61, 24, 12),
(62, 24, 18),
(84, 31, 2),
(85, 31, 10),
(86, 32, 1),
(87, 32, 9),
(88, 33, 1),
(89, 33, 17),
(90, 34, 6),
(91, 35, 1),
(92, 35, 2),
(93, 36, 1),
(94, 36, 7),
(95, 37, 2),
(96, 37, 4),
(97, 37, 17),
(98, 38, 20),
(99, 39, 6),
(100, 40, 1),
(101, 40, 7),
(102, 41, 1),
(103, 41, 2),
(104, 41, 9),
(105, 42, 1),
(106, 42, 2),
(107, 42, 7),
(108, 42, 9),
(109, 42, 17),
(110, 43, 8),
(111, 43, 16),
(112, 44, 4),
(113, 45, 1),
(114, 45, 6),
(115, 45, 12),
(116, 45, 18),
(117, 46, 1),
(118, 46, 7),
(119, 46, 17),
(124, 48, 1),
(125, 48, 4),
(126, 48, 12);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Phong', 'admin@gmail.com', NULL, '$2y$10$Tmfv1CYpySeW5ou/ivDo/eX2smLaUjLzFVCl.m2C9N.DGaUCTxjHi', NULL, '2022-07-03 23:14:15', '2022-07-03 23:14:15');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `episodes`
--
ALTER TABLE `episodes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `movie_category`
--
ALTER TABLE `movie_category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `movie_genre`
--
ALTER TABLE `movie_genre`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `episodes`
--
ALTER TABLE `episodes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT cho bảng `movie_category`
--
ALTER TABLE `movie_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT cho bảng `movie_genre`
--
ALTER TABLE `movie_genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
