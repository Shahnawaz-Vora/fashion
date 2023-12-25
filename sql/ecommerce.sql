-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2021 at 10:28 AM
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
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(6) NOT NULL,
  `modify_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `email`, `password`, `modify_date`) VALUES
(3, 'nirav1562@gmail.com', 'nirav1', '2021-11-20'),
(4, 'nirav1562@gmail.com', 'nirav1', '2021-11-20');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `total_items` int(11) NOT NULL,
  `modify_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `product_id`, `total_items`, `modify_date`) VALUES
(52, 67, 272, 1, '2021-11-22');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `message` varchar(500) NOT NULL,
  `modify_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `message`, `modify_date`) VALUES
(4, 'NIrav', 'nirav1562@gmail.com', 'Hi there..!', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `total_item` int(11) NOT NULL,
  `amount` float NOT NULL,
  `discounted_amount` float NOT NULL,
  `tax_amount` float NOT NULL,
  `final_amount` float NOT NULL,
  `status` int(1) NOT NULL,
  `modify_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `product_id`, `payment_id`, `total_item`, `amount`, `discounted_amount`, `tax_amount`, `final_amount`, `status`, `modify_date`) VALUES
(54, 67, 245, 1632938570, 1, 879, 0, 0, 879, 0, '2021-11-22'),
(55, 67, 272, 1632938571, 1, 350, 0, 0, 350, 0, '2021-11-02'),
(56, 67, 257, 1632938572, 1, 2200, 0, 0, 2200, 1, '2021-11-01');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `reference_id` int(11) NOT NULL,
  `status` varchar(15) NOT NULL,
  `payment_mode` varchar(20) NOT NULL,
  `payment_time` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `user_id`, `amount`, `reference_id`, `status`, `payment_mode`, `payment_time`) VALUES
(1632938570, 67, 879, 1, '0', 'card', '1'),
(1632938571, 67, 350, 2, '0', 'card', '2'),
(1632938572, 67, 2200, 3, '0', 'card', '3');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `category` varchar(10) NOT NULL,
  `sub_category` varchar(20) NOT NULL,
  `image1` varchar(40) NOT NULL,
  `image2` varchar(40) NOT NULL,
  `image3` varchar(40) NOT NULL,
  `product_name` varchar(40) NOT NULL,
  `price` float NOT NULL,
  `size` varchar(3) NOT NULL,
  `discount` int(2) NOT NULL,
  `total_items` int(11) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `modify_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `category`, `sub_category`, `image1`, `image2`, `image3`, `product_name`, `price`, `size`, `discount`, `total_items`, `description`, `modify_date`) VALUES
(238, 'Mens', 'Jackets', '6198cf489279b.jpg', '6198cf4892f20.jpg', '6198cf48935ec.jpg', 'Full Sleeve Solid Men Riding Jacket', 2100, 'M', 5, 5, 'This stylish regular** fit jacket** in the display has long sleeves and round neck. It also guarantees premium stitching throughout, inside pockets and branded zippers. This winter jacket for men is made from *finest fabric, blazer is light in weight and will ensure comfort all day long.*', '2021-11-20'),
(239, 'Mens', 'Blazzers', '6198d0428e766.jpg', '6198d0428ec49.jpg', '6198d0428f095.jpg', 'Solid Single Breasted Casual Men Small', 1200, 'L', 10, 10, 'New Stylish **\\\'LAMBENCY\\\'** Blazer With Lots Of Stylish Made From Faux Leather (High Quality Rexine/PU) (Substitute Of Leather) Giving It Marvelous Look And Cost Effectiveness Slim Fit, Properly Stitched, Cool Classic Created Especially For Young Guns, Living Statement Of Luxury On Others And Warmness From Inside And Made In Proper Indian Size To Wear.', '2021-11-20'),
(240, 'Mens', 'Jeans', '6198d0e4f3edf.jpg', '6198d0e50034a.jpg', '6198d0e5006e2.jpg', 'Jogger Fit Men Blue Jeans', 1151, 'L', 0, 5, '**Versatyl is the innovative fashion trend which is taking over one style at a time**. The brand is known for its versatile yet stylish range of clothing, which also features spill and stain resistant nanotechnology. So you can stay at the top of your fashion game anytime, anywhere. Elasticated Band The jogger jeans comes with an elasticated waist band making it easy to put it on. You can just slip it on with a pair of tee and sneakers and you are just good to go. Quality Material This piece of joggers is made from high quality denim cotton and spandex blend fabric. It has a drawstring on the waist band and is finished with a zipper fly. \\r\\n\\r\\nFunctional Pockets The jogger jeans has two functional back pockets which enhance the overall look of it. It can also be used to store your essentials. Stretchable Fabric The jogger is stretchable making it a comfort wear. It allows free movements of your limbs and also keeps it cool making it versatile to use. Perfect Leisurewear This jogger jeans is an essential leisurewear for your wardrobe. It looks excellent as a casual wear and can also be worn as a semi-formal wear Elasticated Ankle Band The jeans features an elasticated ankle band for keeping the pant securely around the ankle. The style keeps the pant in place while not looking too baggy. Get this pair of great denim jogger pants for men', '2021-11-20'),
(241, 'Mens', 'Casual-Trouser', '6198d1b11dbbb.jpg', '6198d1b11e0f9.jpg', '6198d1b11e543.jpg', 'Regular Fit Men Green Cotton Trousers', 550, 'L', 5, 12, '**AD & AV MENS FORMAL TROUSER** events and workplaces demand a formal dress code. **AD & AV** brings to you this formal trouser with a regular fit that can be worn to such places. They are meticulously stitched out of cotton mix material and feel smooth against your skin.\\r\\n\\r\\nThe side pockets allow you to comfortably place your palms inside them along with storing wallets and handkerchiefs. The mid-rise waist provides a modern look and the belt loops allow a tighter fit when a belt is slipped through the loops. The button and zip closure is easy to use. You can try on these men’s formal trousers to match your professionalism.', '2021-11-20'),
(242, 'Mens', 'Blazzers', '6198d243be510.jpg', '6198d243bec90.jpg', '6198d243bf489.jpg', 'Two Piece Suit 2 Piece Solid Men Suit', 2020, 'M', 5, 3, 'Tailored in a **Slim Fit** , this black solid two piece suit from Louis Philippe by House of Louis Philippe will accentuate your dapper style.', '2021-11-20'),
(243, 'Mens', 'Formal-Trouser', '6198d2f7b58a8.jpg', '6198d2f7b5dc5.jpg', '6198d2f7b6401.jpg', 'Slim Fit Men Grey Polyester Trousers', 600, 'XL', 0, 5, '**Classio Fashion™** men”s*** FORMÄL TROUSERS Pack*** of 1 front slim fit Formal Trousers made of fine poly viscose specially crafted for stylish look. Classïo brings to you this formal Trouser with a regular fit that can be worn to such places. It features front slant pockets and two back pockets.\\r\\n\\r\\nThe button and zip closure is easy to use while the slim fit keeps you in style. Model wears a size 32 and his height is 6 ft. You can try Classïo FormÅL Trouser to match your professionalism. Get the perfect blend of comfort and style by wearing these beige Slim Fit Pánt.', '2021-11-20'),
(244, 'Mens', 'Casual-Trouser', '6198d3a2730c4.jpg', '6198d3a2736dd.jpg', '6198d3a273ba7.jpg', 'Dark Green Polyester Trousers', 500, 'L', 0, 3, 'Fit : Slim Fit\\r\\nOccasion : Casual\\r\\nColor : Dark Green\\r\\nPack of : 1\\r\\nType : Chinos\\r\\nSuitable For : Western Wear\\r\\nPattern : Solid\\r\\nFabric : Polyester', '2021-11-20'),
(245, 'Mens', 'Casual-Trouser', '6198d966b56a8.jpg', '6198d966b5bb1.jpg', '6198d966b60d2.jpg', 'Green Polyester Viscose Blend Trousers', 879, 'L', 0, 10, 'Fit : Slim Fit Occasion : Casual Color : Dark Green Pack of : 1 Type : Chinos Suitable For : Western Wear Pattern : Solid Fabric : Polyester', '2021-11-20'),
(246, 'Mens', 'Formal-Trouser', '6198da47ee161.jpg', '6198da47ee4bb.jpg', '6198da47ee81d.jpg', 'Cream Cotton Blend Trousers', 495, 'L', 0, 10, '**AD & AV MENS FORMAL TROUSER** events and workplaces demand a formal dress code. AD & AV brings to you this formal trouser with a regular fit that can be worn to such places. They are meticulously stitched out of cotton mix material and feel smooth against your skin. \\r\\n\\r\\nThe side pockets allow you to comfortably place your palms inside them along with storing wallets and handkerchiefs. The mid-rise waist provides a modern look and the belt loops allow a tighter fit when a belt is slipped through the loops. The button and zip closure is easy to use. You can try on these men’s formal trousers to match your professionalism.', '2021-11-20'),
(247, 'Mens', 'Track-Shorts', '6198dad2035c2.jpg', '6198dad203ce6.jpg', '6198dad204386.jpg', 'Camouflage Men Multicolor Track Pants', 599, 'L', 5, 5, 'Style Code : 1JG-JOG-CARGO(BLK)\\r\\nFabric : Pure Cotton\\r\\nPattern : Solid\\r\\nColor : light green', '2021-11-20'),
(248, 'Mens', 'Track-Shorts', '6198dbc9d0c6c.jpg', '6198dbc9d1228.jpg', '6198dbc9d1784.jpg', 'Solid Men Blue Track Pants', 400, 'L', 0, 10, 'Style Cod : Solid men trackpants\\r\\nClosure : Drawstring\\r\\nPockets : Side Pockets\\r\\nSales Package :1 Trackpants\\r\\nFabric : Lycra Blend\\r\\nPattern : Solid\\r\\nColor : Blue', '2021-11-20'),
(249, 'Mens', 'Casual-Shoes', '6198dc4ac4e61.jpg', '6198dc4ac5401.jpg', '6198dc4ac57f0.jpg', 'Classy Sneakers For Men', 450, '9', 0, 6, 'Inner materia : Synthetic\\r\\nOuter material : Canvas\\r\\nModel name : Classy\\r\\nIdeal for Men\\r\\nOccasion : Casual\\r\\nSchool shoe : NO\\r\\nSole material : PU\\r\\nWeight : 200 g (per single Shoe) - Weight of the product may vary depending on size.\\r\\nSeason : SS17', '2021-11-20'),
(250, 'Mens', 'Jeans', '6198dd0c9307f.jpg', '6198dd0c933d6.jpg', '6198dd0c9381b.jpg', 'Inner material Synthetic Outer material ', 380, 'M', 0, 5, 'Pack of 1\\r\\nStyle Code : bluee dott\\r\\nFit : Slim\\r\\nFabric : Cotton Blend\\r\\nSleeve : Full Sleeve\\r\\nPattern : Polka Print\\r\\nReversible : No\\r\\nColor : Blue\\r\\nFabric Care : Regular Machine Wash\\r\\nSuitable For : Western Wear', '2021-11-20'),
(251, 'Mens', 'T-Shirts', '6198dd54bd0dd.jpg', '6198dd54bd7bf.jpg', '6198dd54bdb49.jpg', 'Striped Men Polo Neck White T-Shirt', 320, 'L', 0, 34, 'This T-Shirt is made up of 60% Cotton, 40% Polyester. It is bio-washed and softener treated which makes the fabric ultra soft in touch and feel. The fabric GSM is 190.', '2021-11-20'),
(253, 'Mens', 'Casual-Shirts', '6198de5ca5299.jpg', '6198de5ca568e.jpg', '6198de5ca5c8a.jpg', 'Fit Solid Spread Collar Casual Shirt', 450, 'M', 0, 3, 'Fit Solid Spread Collar Casual Shirt', '2021-11-20'),
(254, 'Mens', 'Casual-Shirts', '6198dea593de0.jpg', '6198dea5953e6.jpg', '6198dea595a7d.jpg', 'Solid Button Down Collar Casual Shirt', 400, 'M', 0, 3, 'The Model (height 6 foot and shoulders 18 inches is wearing size 40/M', '2021-11-20'),
(257, 'Mens', 'Jackets', '6198e400d0605.jpg', '6198e400d1c2f.jpg', '6198e400d35f9.jpg', 'Full Sleeve Solid Men Sports Jacket', 2200, 'L', 0, 7, 'The Nike Dri-FIT Jacket combines 4-way stretch fabric that keeps you warm and covered. Sweat-wicking technology helps you stay dry in or out of the gym.', '2021-11-20'),
(258, 'Womens', 'Kurtas-Kurtis-Suits', '6198e4de8dcdd.jpg', '6198e4de8fbf9.jpg', '6198e4de91c72.jpg', 'Women Paisley Cotton Blend A-line Kurta ', 852, 'L', 0, 15, 'Women Paisley Cotton Blend A-line Kurta  (Black)', '2021-11-20'),
(259, 'Womens', 'Skirts-Palazzos', '6198e5d98fa49.jpg', '6198e5d993582.jpg', '6198e5d996ae8.jpg', 'Women Printed A-line Black Skirt', 250, 'L', 5, 5, '**UniqueChoice **offers Flaunt your style wearing this long skirt for women from the house of Cotton Breeze.Made of cotton, this regular fit skirt ensures utmost comfort all day long and is easy to maintain. This skirt will go well with a body-hugging top or short kurta and footwear of your choice.', '2021-11-20'),
(260, 'Womens', 'Sarees', '6198e79659f84.jpg', '6198e7965c116.jpg', '6198e7965e9e1.jpg', 'Floral Print Daily Wear Georgette Saree ', 300, 'L', 5, 5, 'Amazing & Beautiful Georgette office & Everyday Wear Saree with classy Printed work border in work having blouse piece of geoegette fabric.This design have been constructed using amazing embellished work in having Digital printed work .\\r\\n\\r\\nAnand Sarees provides all the types saree in amazing Digital printed ,plain and Printed work in beautiful color combinations.', '2021-11-20'),
(261, 'Womens', 'Flats', '6198e8ac9db07.jpg', '6198e8ac9f6f1.jpg', '6198e8aca1a6b.jpg', 'Women Multicolor Flats Sandal', 450, '10', 60, 5, 'This is Exclusive design and durable materials every step feels light and breezy. Breathable, free-moving fabrics which adjust according to your foot and creates an astoundingly easy-going experience. Great engineering strikes a balance in style, made in the potent design and latest fashion trends. Made for long-term wear, with extra emphasis on providing cushion to the feet, removing heel strain. \\r\\n\\r\\nThe outsoles are made by an air cushion, doubling the effect of shock absorption. Besides, these shoes perform excellent in durability and are also slip resistant. It provides push cushioning comfort for foot pain relief and helps relieve pressure while conforming to your every step.', '2021-11-20'),
(262, 'Womens', 'Dress', '6198e9f5351fb.jpg', '6198e9f536f72.jpg', '6198e9f538f4a.jpg', 'Women Maxi Blue Dress', 1000, 'L', 20, 6, 'Blue printed woven maxi dress, has a V-neck, short sleeves, straight hem', '2021-11-20'),
(263, 'Womens', 'Jackets', '6198eacc86a35.jpg', '6198eacc88c5c.jpg', '6198eacc8aa63.jpg', 'Full Sleeve Solid Women Quilted Jacket', 2400, 'M', 30, 6, 'Beat the Winter Chills with Modeve Jackets for Women. We love the cold breeze and the hot coffee, but these are not just what we love about winters. The other best thing about fall is obviously jackets. Flattering yet functional, these jackets for women will help you beat the winter chills in style. \\r\\n\\r\\nThey’re dependable, unfussy and always make you feel your best whether you want to dress down a heavy-printed dress, toughen up a floral skirt or add color to an all-white ensemble. Stay in style during the chilly days of Winter with this fullsleeves Solid jacket for women with zip from the house of Modeve. Its nylon fabric affirms sheer comfort all day long, keeps you warm yet gives you a stylish & elegant look. Featuring regular fit, this casual jacket is a class apart from others. You can pair this designer long sleeve jacket with a sleeveless top, faded denims, leather shoes and sneakers to complete your look.', '2021-11-20'),
(264, 'Womens', 'Heels', '6198ec7be9f02.jpg', '6198ec7bec31d.jpg', '6198ec7bed961.jpg', 'Women Black Heels Sandal', 1000, '8', 56, 6, 'Care instructions\\r\\nClean With Soft Cloth Only', '2021-11-20'),
(265, 'Kids', 'T-Shirts', '6198ee02233b4.jpg', '6198ee0226693.jpg', '6198ee0227691.jpg', 'Boys Printed Cotton Blend T Shirt', 1000, 'S', 60, 10, 'These lovely t-shirts are made from soft cotton blend fabric that keeps your little one comfortable all day long! These super soft round neck T-shirts have everything you would want in the perfect tee: comfort and style! The adorable print offers a superb classy look. We have a wide range of colors and print to choose from. Every print and design is made very thoughtfully. The simple yet elegant designs of these adorable t-shirts are unmatched.', '2021-11-20'),
(266, 'Kids', 'B-Track-Pyjamas', '6198eef943bf9.jpg', '6198eef945cc3.jpg', '6198eef948f3e.jpg', 'Track Pant For Boys', 400, 'S', 0, 5, 'Dress up your child in this set of colourful track pants which come with an elastic waist band as well as elasticated leg openings that ensure that they will stay securely in place even through rigorous activities. The colourful and vibrant track pants feature a vibrant graphic motif which adds to the style quotient of these track pants for kids.', '2021-11-20'),
(267, 'Kids', 'B-School-Shoes', '6198efc7602f9.jpg', '6198efc7614f9.jpg', '6198efc76253a.jpg', 'Velcro Derby Shoes For Boys', 400, 'k3', 0, 6, 'The Paragon school shoes for kids are comfortable and aptfor your child\\\'s daily adventures. The Velcro closure gives your child a firm and custom grip.', '2021-11-20'),
(269, 'Kids', 'B-Sport-Shoes', '6198f72be130e.jpg', '6198f72be3f90.jpg', '6198f72be6bd2.jpg', 'Lace Running Shoes For Boys ', 300, 'k3', 0, 30, 'Clean your shoes with Synthetic cleaner or shampoo, and use a good quality brush to remove loose surface dirt; if your shoes are wet after cleaning, let them air-dry before your proceed with the next step; dry shoes in room temperature only and never expose them to the sun, heat from the sun will cause the leather to shrink, wrinkle, harden, dry, and crack.', '2021-11-20'),
(270, 'Kids', 'G-School-Shoes', '6198f76949dfa.jpg', '6198f7694b2cb.jpg', '6198f7694c5fd.jpg', 'Velcro Derby Shoes For Girls', 200, 'k3', 0, 5, 'The Paragon school shoes for kids are comfortable and aptfor your child\\\'s daily adventures. The Velcro closure gives your child a firm and custom grip.', '2021-11-20'),
(271, 'Mens', 'Sandals', '619a1ebc0ac24.jpg', '619a1ebc0ecfc.jpg', '619a1ebc15126.jpg', 'Men Black Sandal', 300, '7', 2, 5, 'Type for Flats : Sandal\\r\\nColor : Black', '2021-11-21'),
(272, 'Mens', 'Sandals', '619a1fb7a0b59.jpg', '619a1fb7a6bda.jpg', '619a1fb7ac3db.jpg', 'Men Blue Sandal', 350, '10', 0, 6, '200 g (per single Sandal) - Weight of the product may vary depending on size.', '2021-11-21');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `review` varchar(500) NOT NULL,
  `rating` int(1) NOT NULL,
  `modify_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `user_id`, `product_id`, `review`, `rating`, `modify_date`) VALUES
(20, 67, 242, 'nice Suit', 5, '2021-11-20');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `slider_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` varchar(40) NOT NULL,
  `tag` varchar(15) NOT NULL,
  `description` varchar(40) NOT NULL,
  `modify_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slider_id`, `product_id`, `image`, `tag`, `description`, `modify_date`) VALUES
(18, 238, '6198f8fbaa525.jpg', 'Solid Jacket', 'Full Sleeve Solid Men Riding Jacket', '2021-11-20'),
(19, 239, '6198fa69bae86.jpg', 'Blazer', 'New Stylish LAMBENCY Blazer', '2021-11-20'),
(20, 262, '6198fab76f607.jpg', 'Dress', 'Women Maxi Blue Dress', '2021-11-20');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `mobile_no` bigint(10) NOT NULL,
  `password` varchar(6) NOT NULL,
  `address` varchar(500) NOT NULL,
  `state` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `pincode` int(6) NOT NULL,
  `reset_code` varchar(40) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `modify_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `email`, `mobile_no`, `password`, `address`, `state`, `city`, `pincode`, `reset_code`, `status`, `modify_date`) VALUES
(67, 'Nirav Parmar', 'nirav1562@gmail.com', 7405672601, 'Nir@v1', 'Panchayat sadan', 'Gujarat', 'Naidiad', 387002, NULL, 1, '2021-11-20'),
(68, 'nirav parmar', 'nirav15624916@gmail.com', 9773473612, 'Nir@v1', 'Panchayat sadan', 'Gujarat', 'Nadiad', 387001, NULL, 1, '2021-11-22');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `wishlist_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `modify_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `cart_ibfk_1` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `payment_id` (`payment_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wishlist_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1632938573;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=273;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wishlist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`payment_id`) REFERENCES `payment` (`payment_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `slider`
--
ALTER TABLE `slider`
  ADD CONSTRAINT `slider_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
