-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2024 at 04:46 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `handicraft`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `admin_uname` varchar(30) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `admin_uname`, `admin_password`) VALUES
(1, 'admin', 'admin'),
(2, 'rabna', 'rabna');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `product_id`, `product_title`, `image`, `product_price`, `Quantity`) VALUES
(2, 18, 16, 'Double Frame', '12.png', '7000.00', 1),
(3, 18, 19, 'A4 long', '18.png', '1500.00', 1),
(4, 17, 23, 'A4 Simple', '3.png', '1000.00', 3),
(12, 19, 63, 'Om Frame', '11.png', '1600.00', 2),
(13, 19, 19, 'A4 long', '18.png', '1500.00', 1),
(14, 21, 28, 'White Buddha Mask', '20.png', '1200.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `ctitle` varchar(255) NOT NULL,
  `cimage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `ctitle`, `cimage`) VALUES
(1, 'Wooden Frames', 'categories.png'),
(2, 'Paper Mask', 'mask.png'),
(3, 'Glass Stupa', 'stupa.png'),
(43, 'Bell and Manis', '49.png');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `email`, `name`, `message`) VALUES
(5, 'user@gmail.com', 'user', 'nice products'),
(6, 'demo@gmail.com', 'demo', 'hellohello');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `id`, `product_title`, `product_description`, `product_price`, `image`) VALUES
(15, 1, 'A4 frame ', ' The A4 Simple frame offers a clean and minimalist design to display your A4-sized prints or documents with ease. Its understated style effortlessly complements any space, making it perfect for home or office use.', 1300, '8.png'),
(16, 1, 'Double Frame', 'A double frame is a stylish and practical display option designed to hold two pictures, artworks, or documents side by side.Available in various materials and finishes, the double frame not only highlights the beauty of your displayed items but also enhan', 7000, '12.png'),
(17, 1, 'Peacock with Toran', 'The Peacock Frame with Toran is a beautifully crafted decorative piece that combines traditional artistry with cultural symbolism. The Toran, typically featuring beads, fabric, and traditional motifs, adds a festive and auspicious touch. Together, the Pea', 25000, '15.png'),
(18, 1, 'Kumari Frame', 'This photo frame will enhance and highlight  any portrait that will be fitted in it.\r\nKumari is the the name of the goddess Durga(Taleju) as a child.\r\n', 2500, '2.png'),
(19, 1, 'A4 long', 'An A4 Long frame is designed to hold documents, artwork, or photographs of the A4 size (8.3 x 11.7 inches or 21 x 29.7 cm) in a vertical orientation. This frame is perfect for displaying certificates, diplomas, or any portrait-oriented prints.', 1500, '18.png'),
(20, 1, 'A4 long(heavy)', 'Featuring intricate detailing and a substantial build, this frame is made from high-quality materials such as solid wood, often with elaborate carvings, embossing, or decorative accents.', 4500, '13.png'),
(21, 1, 'Peacock small', 'Ideal for display on shelves, desks, or mantels, this Peacock brings a sense of grace and cultural richness to your decor. Its petite size makes it a versatile accent piece, perfect for gifting or enhancing the beauty of your home or office.', 1000, '10.png'),
(23, 1, 'A4 Simple', 'The A4 Simple frame offers a clean and minimalist design to display your A4-sized prints or documents with ease. Its understated style effortlessly complements any space, making it perfect for home or office use.', 1000, '3.png'),
(24, 1, 'Scale door', 'A scale door with sliding functionality is a miniature version of a sliding door, commonly found in architectural models. It allows for realistic representation of sliding doors in scaled-down settings.', 2500, '6.png'),
(25, 1, '5*7 Frame', 'A 5x7 frame is a simple and classic way to display your favorite photos or artwork.', 600, '14.png'),
(26, 1, 'Ganesh Frame', 'The Ganesh Frame is a beautiful and spiritual decor piece featuring the revered deity Lord Ganesh, known as the remover of obstacles and the god of wisdom and prosperity. It serves as a symbol of auspiciousness and protection in Hindu culture.', 2000, '17.png'),
(27, 2, 'Ganesh Mask', ' The Ganesh Mask is a handcrafted piece of art depicting the revered Hindu deity Lord Ganesh, characterized by his elephant head. Often crafted from various materials like wood, metal, or paper mache, Ganesh masks are used in religious ceremonies, festiva', 1200, '23.png'),
(28, 2, 'White Buddha Mask', 'The Buddha Mask is a symbolic representation of the serene and enlightened face of Lord Buddha, embodying peace, wisdom, and compassion. Crafted with intricate details, these masks are often used for meditation, spiritual practices, or as decorative piec', 1200, '20.png'),
(29, 2, 'Shiva Mask', 'The Shiva Mask is a striking portrayal of the Hindu deity Lord Shiva, representing power, destruction, and transformation. These masks, often adorned with intricate designs and symbolic features like the third eye and serpent, are used in religious ritual', 1200, '19.png'),
(30, 2, 'Kal Bhairav Mask', 'The Kalbhairav Mask represents the fierce and powerful aspect, symbolizing protection and fearlessness. Crafted with intricate details, these masks are often used in Hindu rituals, ceremonies, or as decorative pieces to invoke strength and safeguard again', 1200, '21.png'),
(31, 2, 'mask', '  Lorem ipsum dolor, sit amet consectetur adipisicing elit. Blanditiis labore sed repellendus voluptatem, tenetur voluptatum atque veniam.', 1700, '22.png'),
(32, 2, 'Blue Buddha Mask', 'The Blue Buddha Mask is an exquisite portrayal of the serene and enlightened face of Lord Buddha, characterized by its calming blue hue. Crafted with intricate details, this mask symbolizes peace, wisdom, and spiritual enlightenment. ', 1200, '28.png'),
(33, 3, 'Big Pashupati', ' The Big Pashupati Glass with Wooden Stand is a stunning art piece depicting the sacred deity Pashupati, a form of Lord Shiva revered in Hinduism. Crafted from glass with intricate designs, this sculpture is mounted on a wooden stand for display.', 2200, '24.png'),
(34, 3, 'Swoyambhu Stupa', 'The Swayambhunath Stupa in Glass is a captivating artistic rendition of the iconic religious monument located in Kathmandu, Nepal. Crafted with meticulous detail and set within a glass enclosure, this miniature version of the Swayambhunath Stupa captures ', 900, '26.png'),
(39, 3, 'Pashupatinath', ' The Pashupatinath Temple is a mesmerizing artistic depiction of the revered Hindu temple located in Kathmandu, Nepal. Crafted with intricate detail and enclosed within glass, this miniature rendition captures the sacred essence and architectural beauty o', 900, '25.png'),
(40, 2, 'Sun Mask', ' The Sun Mask is a vibrant and symbolic representation of the sun, often depicted with radiant rays and intricate designs. The Sun Mask holds significance in many cultures worldwide, symbolizing warmth, vitality, and life-giving energy.', 1200, '27.png'),
(41, 2, 'Swet Bhairab Mask', ' The Swet Bhairab Mask is a striking depiction of the fierce and protective form. Characterized by its intricate craftsmanship and often white color, this mask embodies strength, protection, and divine power. Used in religious rituals, cultural festivals,', 1200, '30.png'),
(42, 2, 'Red Buddha Mask', ' The Red Buddha Mask is a captivating representation of Lord Buddha, characterized by its vibrant red color. This mask symbolizes wisdom, compassion, and spiritual energy. Often crafted with intricate details and expressive features, the Red Buddha Mask i', 1200, '29.png'),
(43, 43, 'Mani with single stand', ' The Mani with Single Stand is a beautifully crafted decorative item featuring a Mani, or prayer wheel, mounted on a single stand. Commonly used in Tibetan Buddhism, the Mani prayer wheel is inscribed with sacred mantras such as \"Om Mani Padme Hum.\"', 800, '44.png'),
(44, 43, 'Mani with double stand', 'The Mani with Double Stand is an elegant and symbolic piece featuring a Mani, or prayer wheel, mounted on a double stand. The double stand provides stability and balance, making it a perfect addition to home altars, meditation spaces, or as a decorative i', 1000, '46.png'),
(45, 43, 'Mani with four corner stand', 'The Mani with Four Corner Stand is a beautifully designed decorative item featuring a Mani, or prayer wheel, mounted on a stand with four corners. The four corner stand adds stability and elegance, making it an ideal piece for home altars, meditation spac', 1000, '48.png'),
(46, 43, 'Mani with round base', ' The Mani with Round Base is a graceful and symbolic decorative piece featuring a Mani, or prayer wheel, mounted on a round base. Commonly used in Tibetan Buddhism, the Mani prayer wheel is inscribed with sacred mantras and spinning it is believed to brin', 1000, '47.png'),
(47, 43, 'Mani with heavy carving stand', ' The Mani with Heavy Carving Stand is an intricately crafted and symbolic decorative piece featuring a Mani, or prayer wheel, mounted on a stand with heavy carvings.  heavy carving stand adds a sense of tradition and elegance, making it an ideal addition ', 2500, '49.png'),
(48, 43, 'Small bell with single stand', ' The Small Bell with Single Stand is a charming and symbolic decorative item featuring a small bell mounted on a single stand. This compact design is perfect for home altars, meditation spaces, or as a decorative piece that adds a touch of tranquility and', 800, '45.png'),
(49, 43, 'Small bell with double stand', ' The Small Bell with Double Stand is a delightful decorative piece featuring a small bell mounted on a stand with two arms. Bells are often used in spiritual practices to bring positive energy and mindfulness. This double stand design adds stability and e', 1000, '51.png'),
(50, 43, 'Dalucha', ' A lighting fixture with a retro classic style for the house. Lighting is important at home, in the workplace, and in every institution, but architecture is also an art form of interior expression. A home lighting fixture that blends the two to produce a ', 1200, '50.png'),
(51, 1, 'Bhaktapur Peacock Window', 'The Peacock Window, which is also called the \"Mona Lisa of Nepal\", is a rare masterpiece in wood. Dating back to the early 15th century, the unique latticed window has an intricately carved peacock in its center. Woodcarving in Nepal is an excellent examp', 58000, '1.png'),
(52, 1, 'Antique Three-Faced Window', ' The Antique Three-Faced Window is a captivating architectural piece featuring three distinct window openings with intricate antique designs. Often crafted from wood or metal, this window style adds character and charm to any space. Its vintage appearance', 80000, '42.png'),
(53, 1, 'Tikki Jhya with Toran', ' The Tikki Jhya with Toran is a traditional Nepali decorative item consisting of a wooden carved window frame, typically adorned with intricate patterns, and a hanging toran. The toran is a decorative door hanging made of beads, fabric, or other materials', 58000, '32.png'),
(54, 1, 'Astamangal Door with Toran', ' The Astamangal Door with Toran is a traditional Nepali decorative piece featuring an intricately carved wooden door frame adorned with Astamangal symbols, representing auspiciousness and prosperity in Hindu culture. Accompanied by a toran, a decorative h', 12000, '7.png'),
(55, 1, 'Astamangal Door', ' The Astamangal Door is a traditional Nepali architectural element adorned with intricate carvings depicting the eight auspicious symbols known as Astamangal. These symbols represent prosperity, good fortune, and spiritual blessings in Hindu culture. The ', 7000, '41.png'),
(56, 1, 'Tikki Jhya', ' The Tikki Jhya is a traditional Nepali architectural window characterized by its intricately carved wooden frame featuring traditional patterns and designs. Often found in Nepali homes and buildings, the Tikki Jhya adds cultural richness and elegance to ', 28000, '16.png'),
(57, 1, 'Round Peacock', ' The Round Peacock is a decorative piece featuring a circular frame adorned with a beautifully crafted peacock design. Inspired by the majestic bird, known for its vibrant colors and graceful appearance, the Round Peacock adds a touch of elegance and char', 2000, '5.png'),
(58, 1, 'Three-Faced Peacock Window', ' The Three-Faced Peacock Window is a stunning architectural element featuring three distinct openings adorned with intricately carved peacock designs. Inspired by traditional Nepali craftsmanship, this window adds a touch of elegance and cultural signific', 15000, '39.png'),
(59, 1, 'Three-Faced Tikki Jhya ', ' The Three-Faced Tikki Jhya is a traditional Nepali architectural window with three distinct openings, each adorned with intricately carved designs. This window style adds character and charm to buildings, reflecting Nepali craftsmanship and cultural heri', 15000, '38.png'),
(60, 1, 'Four-Faced Photo Frame', ' The Four-Faced Photo Frame is a stylish and versatile display option designed to hold four photographs in a single frame. With four separate openings, it allows you to showcase multiple memories or images in one elegant display. Made from various materia', 22000, '43.png'),
(61, 1, ' Sha Jhya with single window', ' Sha Jhya design Asthamangal door with beauty lady on its both sides.', 18000, '34.png'),
(62, 1, 'Sha Jhya design Asthamangal door', 'Sha Jhya design Asthamangal door with beauty lady on its both sides.', 18000, '33.png'),
(63, 1, 'Om Frame', ' The Om Frame is a spiritually significant and aesthetically pleasing decorative piece that beautifully displays the sacred symbol \"Om.\" Ideal for personal use or as a thoughtful gift, the Om Frame combines traditional craftsmanship with spiritual signifi', 1600, '11.png');

-- --------------------------------------------------------

--
-- Table structure for table `userorder`
--

CREATE TABLE `userorder` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `payment` varchar(100) NOT NULL,
  `total_price` varchar(255) NOT NULL,
  `payment_status` varchar(50) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userorder`
--

INSERT INTO `userorder` (`id`, `name`, `number`, `email`, `address`, `city`, `payment`, `total_price`, `payment_status`) VALUES
(85, 'rabina', '2147483647', 'rabina@gmail.com', 'Newroad', 'Kathmandu', 'esewa', '4700', '1'),
(86, 'rabina', '2147483647', 'rabina@gmail.com', 'Lagan', 'kathmandu', 'esewa', '7000', '1'),
(87, 'sarina', '34567890', 'sam@gmail.com', 'dallu', 'lalitpur', 'esewa', '10000', '1'),
(88, 'test test', '34567890', 'testing@gmail.com', 'dhka', 'bkt', 'esewa', '4500', '1'),
(89, 'Rabina Shakya', '2147483647', 'rabina_shakya@ymail.com', 'Bouddha', 'Kathmandu', 'esewa', '4600', '1'),
(90, 'Sammy', '243165789', 'sammy@gmail.com', 'Babarmahal', 'Kathmandu', 'esewa', '3700', '1'),
(91, 'sam', '2147483647', 'sam@gmail.com', 'Teku', 'kathmandu', 'esewa', '4700', 'Pending'),
(92, 'hello', '23456789', 'hello@gmail.com', 'dhka', 'bkt', 'esewa', '4700', 'Pending'),
(93, 'demo', '98432074390', 'demo@gmail.com', 'Bouddha', 'kathmandu', 'esewa', '1200', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user_db`
--

CREATE TABLE `user_db` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_db`
--

INSERT INTO `user_db` (`id`, `username`, `email`, `password`, `user_type`) VALUES
(15, 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(16, 'user', 'user@gmail.com', 'ee11cbb19052e40b07aac0ca060c23ee', 'user'),
(17, 'testing', 'testing@gmail.com', '098f6bcd4621d373cade4e832627b4f6', 'user'),
(19, 'Rabina Shakya', 'rabina_shakya@ymail.com', '571359645926e44d0971f8bb2f495b72', 'user'),
(20, 'Sammy', 'sam@gmail.com', '4385695633f8c6c8ab52592092cecf04', 'user'),
(21, 'demod', 'demo@gmail.com', 'fe01ce2a7fbac8fafaed7c982a04e229', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `userorder`
--
ALTER TABLE `userorder`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `user_db`
--
ALTER TABLE `user_db`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `userorder`
--
ALTER TABLE `userorder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `user_db`
--
ALTER TABLE `user_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
