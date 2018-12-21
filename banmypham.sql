-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 21, 2018 lúc 06:11 AM
-- Phiên bản máy phục vụ: 10.1.29-MariaDB
-- Phiên bản PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `banmypham`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `don_hang`
--

CREATE TABLE `don_hang` (
  `id` int(11) NOT NULL,
  `ngay_mua` date NOT NULL,
  `id_khach_hang` int(11) DEFAULT NULL,
  `id_nhan_vien` int(11) DEFAULT NULL,
  `gia_tri_don_hang` float NOT NULL,
  `hinh_thuc_thanh_toan` int(11) NOT NULL,
  `trang_thai` int(11) NOT NULL,
  `ho_ten_khach_hang` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `so_dien_thoai_khach_hang` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `dia_chi_khach_hang` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email_khach_hang` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `don_hang`
--

INSERT INTO `don_hang` (`id`, `ngay_mua`, `id_khach_hang`, `id_nhan_vien`, `gia_tri_don_hang`, `hinh_thuc_thanh_toan`, `trang_thai`, `ho_ten_khach_hang`, `so_dien_thoai_khach_hang`, `dia_chi_khach_hang`, `email_khach_hang`) VALUES
(2, '2018-12-11', 0, 6, 2620000, 1, 3, 'Hà', '0123456789', 'Xuân Thủy Cầu Giấy Hà Nội', 'ha@gmail.com'),
(3, '2018-12-11', 0, 6, 1440000, 1, 3, 'Tuấn', '0123456789', 'Xuân Thủy Cầu Giấy Hà Nội', 'tuan@gmail.com'),
(4, '2018-12-12', 0, 7, 480000, 1, 1, 'Linh', '1233211234', 'Xuân Thủy Cầu Giấy Hà Nội', NULL),
(5, '2018-12-13', 0, 0, 480000, 1, 0, 'Duy', '0123426789', 'Xuân Thủy Cầu Giấy Hà Nội', NULL),
(6, '2018-12-13', 0, 0, 590000, 1, 0, 'Ngọc', '5454554545', 'Xuân Thủy Cầu Giấy Hà Nội', NULL),
(7, '2018-12-13', 9, 0, 1070000, 1, 0, 'Ngọc', '1234554321', 'Xuân Thủy Cầu Giấy Hà Nội', NULL),
(8, '2018-12-13', 9, 0, 480000, 1, 0, 'Ngọc', '0123456789', 'Xuân Thủy Cầu Giấy Hà Nội', NULL),
(9, '2018-12-19', 0, 6, 4280000, 1, 4, 'Mạnh', '0123456789', 'Xuân Thủy Cầu Giấy Hà Nội', NULL),
(10, '2018-12-19', 0, 6, 46080000, 1, 4, 'MạnhDD', '0123456789', 'Xuân Thủy Cầu Giấy Hà Nội', NULL),
(11, '2018-12-19', 0, 6, 1920000, 1, 4, 'Mạnhfdsfdsdf', '0123456789', 'Xuân Thủy Cầu Giấy Hà Nội', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `don_hang_chi_tiet`
--

CREATE TABLE `don_hang_chi_tiet` (
  `id` int(11) NOT NULL,
  `id_don_hang` int(11) NOT NULL,
  `id_san_pham` int(11) NOT NULL,
  `so_luong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `don_hang_chi_tiet`
--

INSERT INTO `don_hang_chi_tiet` (`id`, `id_don_hang`, `id_san_pham`, `so_luong`) VALUES
(3, 2, 13, 1),
(4, 2, 14, 2),
(5, 2, 15, 2),
(6, 3, 13, 3),
(7, 4, 15, 1),
(8, 5, 13, 1),
(9, 6, 14, 1),
(10, 7, 14, 1),
(11, 7, 15, 1),
(12, 8, 13, 1),
(13, 9, 14, 4),
(14, 9, 13, 4),
(15, 10, 13, 96),
(16, 11, 13, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hang_san_xuat`
--

CREATE TABLE `hang_san_xuat` (
  `id` int(11) NOT NULL,
  `ten` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gioi_thieu` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hang_san_xuat`
--

INSERT INTO `hang_san_xuat` (`id`, `ten`, `gioi_thieu`) VALUES
(6, 'Pureforet', 'Pure + Foret (rừng bằng tiếng Pháp)\r\nPureforet có nguồn gốc từ công viên chủ đề làm đẹp, nhận ra làn da khỏe mạnh và sống động với mỹ phẩm thiên nhiên, sử dụng những nguyên liệu có giá trị thiên nhiên.'),
(7, 'Mizon', 'Mizon hứa sẽ nghiên cứu và phát triển một cách nhẹ nhàng nhất. Và các vật dụng chăm sóc da không gây kích ứng cho khách hàng. Mizon sản xuất bởi Nabion được thành lập như một công ty chăm sóc da R & D vào năm 2000 bởi các nhà nghiên cứu ở trung tâm R & D của Amorepacific. Mizon là một trong những công ty mỹ phẩm hàng đầu Châu Á. Mỗi nhà nghiên cứu đã phát triển kỹ thuật chuyên môn của riêng mình và bí quyết của họ trong khi chúng tôi sản xuất các công thức chăm sóc da tiên tiến nhất. Kinh nghiệm nổi bật với Stylekorean.'),
(8, 'Innisfree', NULL),
(9, 'WhaMiSa', 'WHAMISA có vẻ đẹp của thiên nhiên Với hoa, quả và hạt hữu cơ lên men tự nhiên. Nếu không trông giống như lạ mắt hoặc sang trọng, chúng tôi đặt trái tim và tâm hồn của mình giống như thức ăn mẹ làm.'),
(10, 'Laneige', 'Dựa trên nguyên tắc cơ bản rằng nước, nguồn sống, là chìa khóa để duy trì làn da trẻ trung và rạng rỡ, Laneige liên tục thiết lập các xu hướng làm đẹp mới và cung cấp các sản phẩm chất lượng cao thông qua đổi mới. Thương hiệu làm đẹp cao cấp Hàn Quốc dành cho phụ nữ trẻ được dành riêng để làm đẹp và thấm nhuần niềm tin vào những khách hàng tận tụy của mình.'),
(11, 'Missha', NULL),
(12, 'SOME BY MI', 'KHÔNG chất gây ung thư, KHÔNG Paraben, KHÔNG Mùi thơm, KHÔNG Chất tạo màu\r\nNó được kê đơn ở 1.000 bệnh viện bao gồm bệnh viện đa khoa Hàn Quốc, bệnh viện bỏng.\r\nTập trung vào việc phục hồi sức mạnh của chính tế bào và phục hồi các thành phần dưỡng ẩm và kích ứng thấp cho sức khỏe tự nhiên của da.\r\nMiracle Toner là mặt hàng bán chạy số 1 trong cửa hàng O *** drung trong nửa đầu năm 2018.'),
(13, 'A\'PIEU', 'Tuổi đôi mươi đáng yêu.- A\'PIEU\r\nGiá như chúng ta có thể mãi mãi duy trì tuổi 20 huy hoàng của mình ..\r\n\r\nĐể làm điều này, A\'PIEU cung cấp các thông tin sau:\r\nXu hướng mặc được: Cung cấp kiểu dáng, màu sắc và họa tiết được những người ở độ tuổi 20 ưa thích\r\nÝ tưởng độc đáo: Các khái niệm sáng tạo được tạo ra để thể hiện sự rung động và quyến rũ riêng của phụ nữ\r\nNăng lượng tinh khiết: Các thành phần nhẹ nhàng được sử dụng để cung cấp năng lượng mềm mại cho da'),
(14, 'Pyunkang Yul', 'Pyunkang Yul là thương hiệu được ra mắt bởi Phòng khám Đông y Pyunkang nổi tiếng, một tổ chức nổi tiếng về điều trị rối loạn da dị ứng.\r\nPyunkang Yul bác bỏ quan niệm rằng mỹ phẩm chỉ đơn giản là một mặt hàng mua sắm khác. Thay vào đó, họ tin rằng chúng là một phương tiện bảo vệ da. Do đó, họ đã chọn loại bỏ tất cả các chất hóa học không cần thiết khỏi sản phẩm của mình để chỉ sử dụng các thành phần tối thiểu, an toàn nhất để bảo vệ và cung cấp sự tôn trọng cho làn da mệt mỏi và bị kích thích của bạn.'),
(15, 'Mediheal', 'MEADIHEAL được tạo ra bởi bác sĩ da liễu có kiến thức chuyên môn về chăm sóc da tham gia nghiên cứu và phát triển. Gia tăng sự quan tâm của khách hàng đối với vũ trụ, MEADIHEAL đã tập trung vào việc phục hồi từ làn da nhạy cảm và rắc rối của họ.'),
(16, 'Etude house', 'Cái tên \'Etude\' có nghĩa là \'nghiên cứu tuyệt đẹp về Chopin\' trong tiếng Pháp. Họ được nhắm đến phụ nữ.\r\nVì vậy, màu chính của chúng là màu hồng. Bởi vì hầu hết phụ nữ thích màu hồng. Màu hồng có liên quan đến tưởng tượng công chúa từ thời thơ ấu của phụ nữ. Ngoài ra khẩu hiệu thương hiệu của Etudehouse là \"Tất cả các bạn được sinh ra như một công chúa!\" Họ biến Princess Fantasy thành hiện thực. Và họ đầu hàng khách hàng của họ thích trang điểm như chơi và vui chơi hơn là coi như thói quen nhàm chán lặp đi lặp lại. Bằng nhiều màu sắc khác nhau, đáp ứng chất lượng, thiết kế đáng yêu. Để làm cho tất cả các cô gái trên thế giới này ngọt ngào với những món đồ thú vị của Etude!'),
(17, 'SNP', 'SNP là một chuyên gia luôn nghiên cứu các sản phẩm cho làn da khỏe mạnh thông qua sự hiểu biết của khách hàng về mối quan tâm của làn da.\r\nCác thành phần mỹ phẩm được SNP sử dụng được khoa học xác nhận và chứng nhận là an toàn.\r\nTất cả các thành phần đã được xác minh cho khoa học da sạch và khỏe mạnh'),
(18, 'Tonymoly', 'Phát hành hơn 1.000 sản phẩm bao gồm các sản phẩm chức năng chăm sóc da & chống nhăn cơ bản kể từ tháng 11/2006. Tonymoly là công ty mỹ phẩm toàn cầu nơi sứ mệnh của chúng tôi là hoàn thiện làn da của bạn. Theo tuổi của chúng tôi, mọi người đều muốn giữ và duy trì làn da trẻ trung của chúng tôi. Chúng tôi đang cố gắng làm thế nào để cung cấp làn da trẻ trung này cho khách hàng để duy trì làn da rạng rỡ, tươi sáng, tái tạo. Tonymoly vừa ra mắt dòng sản phẩm \"Tôi là mặt nạ thật\" và dòng sữa dê dê. Doanh số của Toner & Emuls & Cream ngay bây giờ ~ Ngay cả GOT7 của Jackson và Sanche cũng rơi vào sản phẩm này.'),
(19, 'Banila co', 'Banila Co là thương hiệu mỹ phẩm số 1 của Hàn Quốc do F & F nợ.\r\nRa mắt vào năm 2005, thương hiệu mỹ phẩm banila coila co. tin rằng làn da tuyệt vời là cơ sở tốt nhất để trang điểm tuyệt vời. Bộ sưu tập chăm sóc da và trang điểm của thương hiệu được thiết kế để kết hợp liền mạch với nhau để giúp đạt được làn da hoàn hảo trông tự nhiên và xinh đẹp, có hoặc không trang điểm.'),
(20, 'LABIOTTE', 'LABIOTTE tiếp tục nghiên cứu các phương pháp hấp thụ để giúp phụ nữ da sạch và đẹp bằng cách sử dụng các thành phần tự nhiên. Thông qua LABIOTTE này giúp truyền năng lượng sạch mạnh mẽ từ thiên nhiên vào da. Ngoài việc trở thành người dẫn đầu xu hướng làm đẹp toàn cầu và để làm nổi bật vẻ đẹp từ cuộc sống hàng ngày, giá trị mỹ phẩm masstige được nhấn mạnh với thiết kế bao bì cao cấp và chất lượng sản phẩm.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kieu_san_pham`
--

CREATE TABLE `kieu_san_pham` (
  `id` int(11) NOT NULL,
  `ten` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `id_loai_san_pham` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `kieu_san_pham`
--

INSERT INTO `kieu_san_pham` (`id`, `ten`, `id_loai_san_pham`) VALUES
(1, 'Kem dưỡng ẩm', 1),
(2, 'Trang điểm mặt', 2),
(3, 'Kem chống nắng', 1),
(4, 'Chất tẩy rửa', 1),
(6, 'Trang điểm mắt', 2),
(7, 'Trang điểm môi', 2),
(8, 'Kem dưỡng ẩm cơ thể', 3),
(9, 'Sữa tắm toàn thân', 3),
(10, 'Móng tay', 3),
(11, 'Tóc', 3),
(12, 'Tấm mặt nạ', 5),
(13, 'Mặt nạ ngủ', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_san_pham`
--

CREATE TABLE `loai_san_pham` (
  `id` int(11) NOT NULL,
  `ten` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loai_san_pham`
--

INSERT INTO `loai_san_pham` (`id`, `ten`) VALUES
(1, 'CHĂM SÓC DA'),
(2, 'TRANG ĐIỂM'),
(3, 'CƠ THỂ & TÓC'),
(5, 'MẶT NẠ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `san_pham`
--

CREATE TABLE `san_pham` (
  `id` int(11) NOT NULL,
  `id_kieu_san_pham` int(11) NOT NULL,
  `id_hang_san_xuat` int(11) NOT NULL,
  `ten` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `anh` varchar(2000) COLLATE utf8_unicode_ci NOT NULL,
  `gia` float NOT NULL,
  `so_luong` int(11) NOT NULL,
  `can_nang` float DEFAULT NULL,
  `thoi_gian_bao_hanh` float DEFAULT NULL,
  `mieu_ta` text COLLATE utf8_unicode_ci,
  `thanh_phan` varchar(3000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `video_huong_dan` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `san_pham`
--

INSERT INTO `san_pham` (`id`, `id_kieu_san_pham`, `id_hang_san_xuat`, `ten`, `anh`, `gia`, `so_luong`, `can_nang`, `thoi_gian_bao_hanh`, `mieu_ta`, `thanh_phan`, `video_huong_dan`) VALUES
(13, 1, 6, 'Centella Multi Cream 70ml', 'thumb-ECCS01Cmt_405x405.jpg', 480000, 4, 85, 1, 'Sức mạnh kháng khuẩn và tái tạo mạnh mẽ! Centella Asiatica tạo ra sản phẩm chăm sóc da nhẹ, Centella Multi Cream, cho làn da dễ bị mụn trứng cá.\r\nNhà máy còn được gọi là \"Cỏ hổ\", bởi vì hổ lăn trên cỏ để chữa lành vết thương của họ sau một cuộc chiến. Axit madecassic trong lá và thân của Centella Asiatica có tác dụng chữa bệnh tuyệt vời trên viêm và vết thương.\r\nNó được sử dụng trong thuốc mỡ hoặc mỹ phẩm cho viêm da tiếp xúc, mụn trứng cá, và các vấn đề về viêm da.\r\nBốn thành phần thiết yếu như Centella Asiatica Extract, axit Madecassic, chiết xuất Willow, và dầu cây trà làm việc trong sức mạnh tổng hợp.\r\nHọ ngăn chặn vi khuẩn gây ra các vấn đề về da, loại bỏ các tế bào da chết không cần thiết, và mạnh mẽ chữa lành da.\r\nCây trà, tinh dầu hoa oải hương được chứa trong nước làm sạch đa năng Centella này.\r\nĐiều này tất cả trong một nước làm sạch là có hiệu quả loại bỏ trang điểm, làm sạch da và làm mới. Chiết xuất Centella asiatica giúp làm dịu da bị kích thích.\r\nKhông chứa 26 chất gây dị ứng, 20 hóa chất độc hại trong mỹ phẩm và chất hoạt động bề mặt tổng hợp.\r\nPureforet chống lại các thí nghiệm trên động vật.\r\nKhông có hương thơm nhân tạo, nhưng dầu thơm được chứa.', '\"Centella Asiatica Leaf Water, Propanediol, Helianthus Annuus (Sunflower) Seed Oil, Sodium hyaluronate, Macadamia Ternifolia Seed Oil, Beeswax, Polyglyceryl-3 Methylglucose Distearate, Glyceryl Stearate, Glycerin, 1,2-Hexanediol, rh-Oligopeptide-1, Centella Asiatica Extract, Scutellaria Baicalensis Root Extract, Camellia sinensis leaf Extract, Houttuynia Cordata Extract, Polygonum Cuspidatum Root Extract, Salix Alba (Willow) Bark Extract, Tocopherol, Panthenol, Allantoin, Simmondsia Chinensis (Jojoba) Seed Oil, Butyrospermum Parkii (Shea) Butter, Sodium Acrylate/Sodium Acryloyldimethyl Taurate Copolymer, Polyisobutene, Sorbitan Oleate, Caprylyl/Capryl Glucoside, Sorbitan Sesquioleate, Cetearyl Alcohol, Stearic Acid, Arginine, Carbomer,Ethylhexylglycerin, Melaleuca Alternifolia (Tea Tree) Leaf Oil, Lavandula Angustifolia (Lavender) Oil\"', 'https://www.youtube.com/embed/VF-ekrdkbAU?controls=0'),
(14, 1, 7, 'Collagen 100 ampoule 30ml (Skin Lifting Effect, Granting metablism rate, Highly Enriched Ampoule)', 'thumb-mizon_collagen100_405x405.png', 590000, 136, 150, 1, 'Các taengtaengham thời tiền sử sôi động nâng hiệu ứng da để thả sức mạnh! Ngay lập tức nâng da collagen chứa 90% dung dịch nước. Là một giải pháp nâng cao làm giàu để phục hồi độ đàn hồi da bị mất do môi trường bên ngoài. Kết cấu da mịn làm cho chống nhăn Có chứa các thành phần giữ ẩm cao tập trung Thúc đẩy làn da ẩm và sáng bóng, làn da khỏe mạnh, sức sống của da và độ ẩm trong da bằng cách cho năng lượng để tạo ra các chương trình jumyeo. Kích thích cũng như tránh xa các tác nhân kích thích độc hại bên ngoài từ môi trường, làm cho da bị tổn thương bởi nhiều chất chiết xuất từ thực vật khác nhau để tạo thành lớp bảo vệ giúp bảo vệ và giữ ẩm da một cách an toàn.', 'Collagen dung dịch nước 90%, Caffeoyl Tripeptide-1, VitaminB5, Hyarulonic Acid, cây bạch dương nhựa, chiết xuất từ quả đu đủ, chiết xuất quả mâm xôi, chiết xuất hoa arnica, Gentiana', 'https://www.youtube.com/embed/4DlL_XcWJHY?controls=0'),
(15, 1, 8, '*Time Deal* Jeju Orchid Eye Cream 30ml', 'thumb-1476153954_timedeal_1543989428_405x405.png', 480000, 98, 150, 1, 'Kem dưỡng mắt chống lão hóa được làm từ hoa lan Jeju cho làn da trẻ trung và khỏe mạnh hơn.\r\n1. Elixir ™ giàu chất chống oxy hóa quý giá và tuyệt vời từ Jeju Orchids làm cho da sáng lên đồng thời tăng cường sức mạnh tự vệ tự nhiên của nó.\r\n2. Dinh dưỡng phong phú làm cho da khỏe mạnh hơn bằng cách giảm nếp nhăn, tăng độ đàn hồi và cải thiện tông màu da.\r\n3. Làm săn chắc da và làm cho vùng mắt mượt mà hơn.', 'Nước, Butylene Glycol, Glycerin, Squalane, Cetyl Ethylhexanoate, Limnanthes Alba (Meadowfoam) Dầu hạt, Arbutin, Copernicia Cerif.Era (Carnauba) Sáp, Cyclopentasiloxan, Butyrospermum Parkii (Shea) Bơ, Glyceryl Stearate, Cyclohexasiloxan, Chiết xuất hoa lan, Caffeine, Chiết xuất lá Camellia Sinensis, Chiết xuất lá Camellia Japonica, Chiết xuất từ ​​trái cây Opuntia Coccinellif.Era, Chiết xuất vỏ cam quýt, Adenosine, C12-20 Alkyl Glucoside, Rượu C14-22, Glyceryl Caprylate, Acid lauric, Acid Myristic, Rượu Behenyl, Rượu Cetearyl, Stearic Acid, Arachidyl Glucoside, Arachidyl Rượu, Xanthan Gum, Axit Palmitic, Polyglyceryl-3 Methylglucose Distearate, Polysorbate 20, Polyacrylate-13, Polyisobutene, Propanediol, Peg-100 Stearate, Hydrogen hóa Lecithin, Disodium Edta, Hương thơm', 'https://www.youtube.com/embed/4DlL_XcWJHY?controls=0'),
(16, 1, 9, 'Organic Flowers Olive Leaf Mist 80ml', 'thumb-WHAMIS01MIST_405x405.png', 850000, 200, 100, 1, 'Chiết xuất từ hoa hữu cơ, các thành phần lên men hữu cơ, và chiết xuất nguồn gốc tự nhiên tinh khiết giúp da giữ ẩm, khỏe mạnh và tươi mát. Bạn sẽ cảm thấy mùi mới phát ra từ lá ô liu thực sự mỗi ngày.', NULL, 'https://www.youtube.com/embed/VF-ekrdkbAU?controls=0'),
(17, 2, 10, 'BB Cushion Whitening Cool No.23C', 'thumb-LM16_405x405.jpg', 1100000, 100, 150, 1, 'Giúp ngăn ngừa bóng. Giúp che phủ tự nhiên, lâu dài hơn', 'Active: Ethylhexyl Methoxycinnamate (7%), Titanium Dioxide (4.15%), Zinc Oxide (9.8%). Other: Water, Cyclopentasiloxane, Cyclohexasiloxane, Phenyl Trimethicone, PEG-10 Dimethicone, Butylene Glycol, Dicaprylate/Dicaprate, Lauryl PEG-9 Polydimethylsiloxyethyl Dimethicone, Arbutin, Butylene Glycol, Acrylates/Ethylhexyl Acrylate/Dimethicone Methacrylate Copolymer, Polyhydroxystearic Acid, Sodium Chloride, Aluminum Hydroxide, Polymethyl Methacrylate, Stearic Acid, Triethoxycaprylylsilane, Phenoxyethanol, Disteardimonium Hectorite, HDI/Trimethylol Hexyllactone Crosspolymer, Isostearic Acid, Ethylhexyl Palmitate, Lecithin, Isopropyl Palmitate, Polyglyceryl-3 Polyricinoleate, Ethylhexylglycerin, Acrylates/Stearyl Acrylate/Dimethicone,Methacrylate Copolymer, Melia Azadirachta Extract, Yeast Extract, Dimethicone Crosspolymer, Silica, Manganese Sulfate, Zinc Sulfate, Magnesium Sulfate, Camellia Sinensis Leaf Extract, Caprylyl Glycol, 1,2-Hexanediol, Fragrance, Titanium Dioxide, Iron Oxides.', 'https://www.youtube.com/embed/VF-ekrdkbAU?controls=0'),
(18, 2, 11, 'Line Friends 2018 Perfect Cover BB Cream #21 (Light Beige)', 'thumb-MM99BB21_405x405.jpg', 300000, 100, 60, 1, 'Dòng Friends x Missha 2018! Kem nền M Perfect Cover BB Cream này làm cho tông màu tội lỗi của bạn sạch sẽ và tự nhiên bằng cách che giấu nhược điểm với độ che phủ da tuyệt vời. Nó là một loại kem trang điểm đa chức năng ngăn chặn tia UV, làm trắng và chăm sóc nếp nhăn và đơn giản hóa các thủ tục trang điểm. Ứng dụng giữ ẩm với kết cấu W / S làm cho làn da bóng mượt đồng thời cung cấp độ ẩm và dinh dưỡng cùng một lúc.', NULL, 'https://www.youtube.com/embed/4DlL_XcWJHY?controls=0'),
(19, 2, 12, 'Killing Cover Moisture Cushion 2.0 #21', 'thumb-SBMM02CC21_405x405.jpg', 510000, 100, 150, 1, 'Thành phần nhẹ nhàng đạt được tất cả các vùng phủ sóng mạnh mẽ hơn và làm dịu da, Tất cả trong một. Bác sĩ da liễu thử nghiệm là ít kích ứng. Một Cover Cover an toàn & đáng tin cậy cho làn da nhạy cảm. Thêm vào đó, công thức làm dịu da ba.', 'Hydrogenated Lecithin, Oryza SativaExtract, Carthamus Tinctorius Seed Extract, Cholesterol, Arnica Montana Flower Extract,Artemisia Absinthium Extract, Achillea Millefolium Extract, Gentiana Lutea Root Extract, GlycineSoja Oil, Stearic Acid, Potassium Sorbate, Chaenomeles Sinensis Fruit Extract, Citrus AurantiumDulcis Flower Extract, Melissa Officinalis Extract, Phytosphingosine, Ceramide NP, GlycerylCitrate/Lactate/Linoleate/Oleate, Ethylhexylglycerin, Ceteareth-20, Madecassoside', 'https://www.youtube.com/embed/VF-ekrdkbAU?controls=0'),
(20, 2, 13, 'Pastel Blusher #CR02', 'thumb-7I2464Sk7J281_405x405.jpg', 200000, 100, 150, 1, 'Ngọc trai phát sáng cao cung cấp hiệu ứng lăng kính để tạo ra làn da tuyệt đẹp.\r\nĐặt một lượng vừa phải lên má và thực hiện chuyển màu tự nhiên với cọ trộn tích hợp để tạo cảm giác hoàn thiện.', NULL, 'https://www.youtube.com/embed/4DlL_XcWJHY?controls=0'),
(21, 8, 8, 'Jeju Life Perfumed Hand Cream 30ml #06 (June)', 'thumb-IFBS61HN06_405x405.jpg', 120000, 100, 39, 1, 'SEMI-WAX: Công nghệ này được sử dụng trong việc tạo ra nến, tạo ra mùi thơm khi sáp được nấu chảy ở nhiệt độ nhất định sau khi giữ lại mùi thơm bên trong sáp. Cường độ và sức mạnh lưu giữ của nước hoa được cải thiện, truyền tải một mùi hương phong phú trong một thời gian dài.', NULL, 'https://www.youtube.com/embed/VF-ekrdkbAU?controls=0'),
(22, 8, 8, 'Jeju Life Perfumed Hand Cream 30ml #10 October', 'thumb-IFBS61HN10_405x405.jpg', 100000, 100, 40, 1, 'SEMI-WAX: Công nghệ này được sử dụng trong việc tạo ra nến, tạo ra mùi thơm khi sáp được nấu chảy ở nhiệt độ nhất định sau khi giữ lại mùi thơm bên trong sáp. Cường độ và sức mạnh lưu giữ của nước hoa được cải thiện, truyền tải một mùi hương phong phú trong một thời gian dài.', NULL, 'https://www.youtube.com/embed/4DlL_XcWJHY?controls=0'),
(23, 8, 8, 'Bija Trouble Body Mist 150ml', 'thumb-IFBS24Bmist_405x405.jpg', 350000, 100, 200, 1, 'Chứa dầu nutmug (bija), được ép tươi từ cây, giúp bảo vệ và phục hồi da. Chứa D-Panthenol có thể giúp làm dịu làn da nhạy cảm hoặc da khô.', NULL, 'https://www.youtube.com/embed/VF-ekrdkbAU?controls=0'),
(24, 8, 14, 'A Therapy Hand Cream (Garden Mint)', 'thumb-hand_green_405x405.jpg', 200000, 100, 85, 1, 'Một liệu pháp là đặc biệt. Nó đã sử dụng các thành phần có nguồn gốc từ thiên nhiên để truyền vào một mùi hương lành mạnh và tươi mát giúp thư giãn không chỉ cơ thể mà còn cả tâm trí của bạn. Chữa lành cơ thể và tâm trí mệt mỏi của bạn.\r\n1. Chứa 9 loại dầu tự nhiên để phủ lên làn da của bạn một lớp áo giàu dinh dưỡng để giữ cho bàn tay thô ráp và khô ráo mịn màng và ngậm nước.\r\n2. Bao gồm các hương liệu thư giãn khác nhau để cung cấp một hiệu ứng mới mỗi khi nó được áp dụng.', NULL, 'https://www.youtube.com/embed/4DlL_XcWJHY?controls=0'),
(25, 12, 8, 'My Real Squeeze Mask 5ea (Ginseng)', 'thumb-IFP58MYginseng5_405x405.jpg', 110000, 100, 85, 1, 'Mặt nạ Innisfree My Real Squeeze Mask (Mới 2017) được chiết xuất từ các thành phần tự nhiên phong phú được trồng trong điều kiện nghiêm ngặt của đảo Jeju, Hàn Quốc.\r\nInnisfree My Real Squeeze Mask (Mới 2017) là một bản nâng cấp mới từ Mặt nạ bóp da thật của Innisfree. Với mặt nạ bạch đàn lên men cellulose 100%, phiên bản mới này đạt được khả năng chống rách tốt hơn và mỏng hơn đồng thời nó bám dính vào da khi sử dụng, tăng cường hiệu quả thâm nhập. các chất dinh dưỡng.', NULL, 'https://www.youtube.com/embed/4DlL_XcWJHY?controls=0'),
(26, 12, 15, 'I.P.I Lightmax Ampoule Mask 1ea', 'thumb-002_405x405.jpg', 100000, 100, 85, 1, 'Tác dụng hiệp lực của C-AA2G và dung dịch ánh sáng tạo ra làn da sáng và trong suốt.\r\nArbutin tạo ra làn da sáng và rõ ràng từ bên trong.\r\nLụa như tấm cellulose phù hợp với đường cong tinh tế của khuôn mặt.\r\nTấm cellulose cung cấp tinh chất làm giàu nhẹ.\r\nTấm cellulose (100% cotton nguyên chất)', NULL, 'https://www.youtube.com/embed/VF-ekrdkbAU?controls=0'),
(27, 12, 16, '0.2mm Therapy Air Mask (Artemisia)', 'thumb-EP146AMAM_405x405.jpg', 30000, 100, 40, 1, 'Mặt nạ chống dị ứng hàng ngày cung cấp tinh chất 7-miễn phí cho da trực tiếp thông qua tấm khí 0,2mm.', NULL, 'https://www.youtube.com/embed/4DlL_XcWJHY?controls=0'),
(28, 12, 17, 'Birds Nest Aqua Ampoule Mask', 'thumb-SNP_BirdsNestAquaAmpouleMask25ml10pcs_405x405.jpg', 45000, 100, 35, 1, 'Yến sào là một thành phần lâu đời được sử dụng cho độ đàn hồi của da.\r\nTổ chim Bird bắt nguồn từ chăm sóc da và y học cổ truyền Trung Quốc, nơi nó được ghi nhận là chữa lành nhiễm trùng và giúp duy trì làn da trẻ trung. Ngày nay, nó đã bao gồm trong các sản phẩm như chiết xuất tổ yến swiftlet, có lẽ chỉ là một phiên bản bột được làm sạch. Các thành phần của chiết xuất này được hiển thị để kích thích tái tạo tế bào, chữa lành vết thương và cải thiện hàng rào bảo vệ da. Điều này lần lượt ảnh hưởng đến độ đàn hồi của da, mất nước và cuối cùng là sự mềm mại. Nói một cách đơn giản, yến sào chim yến dành cho kết cấu da và chống lão hóa.', NULL, 'https://www.youtube.com/embed/VF-ekrdkbAU?controls=0'),
(29, 3, 18, 'Tako Pore Sebum Sun Stick', 'thumb-TSM39SS_405x405.jpg', 220000, 200, 60, 1, 'Tako Pore Sebum Sun Stick nhỏ nhưng mạnh mẽ của chúng tôi sẽ giúp làn da của bạn được bảo vệ khỏi các tia UV có hại suốt cả ngày.\r\nVới công thức chiết xuất từ biển và Calamine mạnh mẽ, kem chống nắng màu hồng của chúng tôi ngay lập tức làm dịu làn da tiếp xúc với ánh nắng mặt trời trong khi cung cấp khả năng chống nắng mạnh mẽ để dễ dàng che phủ bất cứ nơi nào cần thiết.', NULL, 'https://www.youtube.com/embed/4DlL_XcWJHY?controls=0'),
(30, 3, 8, 'Perfect UV Protection Cream Triple CareSPF50+ PA+++', 'thumb-IFSM24Triple_405x405.jpg', 200000, 100, 80, 1, '5 Hệ thống miễn phí (màu nhân tạo, vật liệu động vật, paraben, dầu khoáng, hoạt thạch)', NULL, 'https://www.youtube.com/embed/VF-ekrdkbAU?controls=0'),
(31, 3, 19, '*Time Deal* Hello Sunny Essence Sun Stick SPF50+ PA++++ (Fresh)', 'thumb-1529549190_timedeal_1545010795_405x405.png', 300000, 100, 120, 1, '1. Chức năng chống tia cực tím bocame mạnh hơn: SPF50 + PA ++++\r\n2. Tinh chất 36% + hiệu ứng sơn lót + kết thúc bột hiệu quả!\r\n3. Nó có thể được sử dụng mới mà không dính.\r\n4. Nó không để lại diễn viên trắng.\r\n5. Rảnh tay, dễ sử dụng và vệ sinh.\r\n6. Nó không thấm nước có thể được sử dụng trong bãi biển hoặc hồ bơi.\r\n7. Không có màu nhân tạo và không có hương vị nhân tạo.\r\n8. Kích thước túi để bạn có thể dễ dàng mang theo.', 'https://www.youtube.com/embed/4DlL_XcWJHY?controls=0', NULL),
(32, 3, 20, 'Blue Safety Sun Stick SPF50+ PA++++', 'thumb-LTSM18ST_405x405.jpg', 900000, 100, 25, 1, 'Bảo vệ 365 ngày! Từ tia UV đến Ánh sáng xanh, phổ bảo vệ hoàn hảo chống lại các tác động có hại từ cuộc sống hàng ngày đến các hoạt động ngoài trời mọi lúc, mọi nơi 365 ngày một năm giải pháp bảo vệ hàng ngày!', NULL, 'https://www.youtube.com/embed/VF-ekrdkbAU?controls=0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thanh_vien`
--

CREATE TABLE `thanh_vien` (
  `id` int(11) NOT NULL,
  `kieu_thanh_vien` tinyint(4) NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mat_khau` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ho_ten` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gioi_tinh` tinyint(4) DEFAULT NULL,
  `nam_sinh` smallint(4) DEFAULT NULL,
  `so_dien_thoai` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dia_chi` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `anh_dai_dien` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thanh_vien`
--

INSERT INTO `thanh_vien` (`id`, `kieu_thanh_vien`, `email`, `mat_khau`, `ho_ten`, `gioi_tinh`, `nam_sinh`, `so_dien_thoai`, `dia_chi`, `anh_dai_dien`, `facebook`) VALUES
(1, 1, 'domanh266@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Đỗ Mạnh', 1, 1997, '0123456789', 'Hà Nội', '20992888_535081023490091_8342065419725350092_n.jpg', NULL),
(3, 1, 'tuan@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Tuấn', NULL, 1996, NULL, NULL, '31166993_2145617562339184_5225651640635228160_n.jpg', NULL),
(4, 1, 'long@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Long', 1, 1997, NULL, NULL, '30743008_1888948821149161_171555716950130688_n.jpg', NULL),
(5, 3, 'dung@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 2, 'duc@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Đức', 1, 1996, '5453433223', 'Hà Nội', '', NULL),
(7, 2, 'quang@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Quang', 1, 1996, '5453434523', 'Hà Nội', '', NULL),
(8, 2, 'uyen@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Uyên', 2, 1997, '5453499523', 'Hà Nội', '', NULL),
(10, 3, 'abc@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'manhmanh', NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `don_hang_chi_tiet`
--
ALTER TABLE `don_hang_chi_tiet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_don_hang` (`id_don_hang`),
  ADD KEY `id_san_pham` (`id_san_pham`);

--
-- Chỉ mục cho bảng `hang_san_xuat`
--
ALTER TABLE `hang_san_xuat`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `kieu_san_pham`
--
ALTER TABLE `kieu_san_pham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_loai_san_pham` (`id_loai_san_pham`);

--
-- Chỉ mục cho bảng `loai_san_pham`
--
ALTER TABLE `loai_san_pham`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kieu_san_pham` (`id_kieu_san_pham`),
  ADD KEY `id_hang_san_xuat` (`id_hang_san_xuat`);

--
-- Chỉ mục cho bảng `thanh_vien`
--
ALTER TABLE `thanh_vien`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `don_hang_chi_tiet`
--
ALTER TABLE `don_hang_chi_tiet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `hang_san_xuat`
--
ALTER TABLE `hang_san_xuat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `kieu_san_pham`
--
ALTER TABLE `kieu_san_pham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `loai_san_pham`
--
ALTER TABLE `loai_san_pham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `thanh_vien`
--
ALTER TABLE `thanh_vien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `don_hang_chi_tiet`
--
ALTER TABLE `don_hang_chi_tiet`
  ADD CONSTRAINT `don_hang_chi_tiet_ibfk_1` FOREIGN KEY (`id_don_hang`) REFERENCES `don_hang` (`id`),
  ADD CONSTRAINT `don_hang_chi_tiet_ibfk_2` FOREIGN KEY (`id_san_pham`) REFERENCES `san_pham` (`id`);

--
-- Các ràng buộc cho bảng `kieu_san_pham`
--
ALTER TABLE `kieu_san_pham`
  ADD CONSTRAINT `kieu_san_pham_ibfk_1` FOREIGN KEY (`id_loai_san_pham`) REFERENCES `loai_san_pham` (`id`);

--
-- Các ràng buộc cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  ADD CONSTRAINT `san_pham_ibfk_1` FOREIGN KEY (`id_kieu_san_pham`) REFERENCES `kieu_san_pham` (`id`),
  ADD CONSTRAINT `san_pham_ibfk_2` FOREIGN KEY (`id_hang_san_xuat`) REFERENCES `hang_san_xuat` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
