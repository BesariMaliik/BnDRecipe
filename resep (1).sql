-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Des 2023 pada 17.14
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `resep`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`) VALUES
(1, 'admin123', '123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `book`
--

CREATE TABLE `book` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `des` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `book`
--

INSERT INTO `book` (`id`, `name`, `des`, `price`, `image`) VALUES
(5, 'Traditional Indonesian cuisine', 'This book has many food recipes from Sabang to Merauke in Indonesia', 99000, 'book1.jpg'),
(6, 'Traditional Food recipes on the Website', 'This book features food recipes from breakfast, lunch, dinner to more snacks.', 59000, 'tess.jpg'),
(7, 'traditional snack recipes', 'This book sells a very diverse range of snacks', 49000, 'tesss.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `messages`
--

CREATE TABLE `messages` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `messages`
--

INSERT INTO `messages` (`id`, `user_id`, `name`, `email`, `number`, `message`) VALUES
(4, 4, 'Mail', 'mail@gmail.com', '0812987728', 'resepnya enak-enak saya sudah mencobanya dirumah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `number` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` date NOT NULL DEFAULT current_timestamp(),
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `recipe`
--

CREATE TABLE `recipe` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `recipe`
--

INSERT INTO `recipe` (`id`, `name`, `type`, `description`, `image`) VALUES
(5, 'Bubur Kacang Ijo', 'breakfast', 'Ingredients:\r\n\r\n- 250 gr green beans\r\n- 120 gr brown sugar\r\n- 120 gr granulated sugar\r\n- 600 ml Liquid Coconut Milk\r\n- 2 pandan leaves, summed\r\n\r\nSteps:\r\n\r\n1. Wash the green beans and soak for 1 hour.\r\n\r\n2. Boil the green beans for approximately 30 minutes until tender.\r\n\r\n3. Add pandan leaves and liquid coconut milk containing Sasa\r\n\r\n4. Omega 3, 6, and Fiber. Then stir until smooth.\r\n\r\n5. Add brown sugar and granulated sugar.\r\n\r\n6. Cook until dissolved and cooked.\r\n\r\n7. Green Bean Porridge is ready to be served.', 'Bubur Kacang Ijo.png'),
(6, 'Bubur Ayam', 'breakfast', 'Ingredients:\r\n\r\n- 1/2 kg rice (wash until clean)\r\n- 2 glasses of chicken stock\r\n- 2 glasses of plain water\r\n- Salt to taste)\r\n- 1/4 chicken meat (boneless)\r\n- Fried onions (to taste)\r\n- Salty or sweet soy sauce (to taste)\r\n- 1 spring onion (small slices)\r\n- 1 stalk celery leaves (small slices)\r\n- 1 egg (boiled, peeled and split in half)\r\n- Powdered chicken stock (if you like, to taste)\r\n- Chili sauce (if you like)\r\n\r\nSteps:\r\n\r\n1. Cook rice with plain water and chicken stock. Add salt and chicken stock to taste.\r\n\r\n2. Cook the rice until it becomes luscious and soft, about half an hour. So that the cooking pot doesn&#39;t burn, don&#39;t forget to stir the rice. If it&#39;s cooked, set aside for a moment.\r\n\r\n3 Next, season the chicken with salt then fry until cooked and slice thinly.\r\n\r\n4. Take a bowl and place the chicken porridge on it. Sprinkle fried chicken, fried onions, green onions, celery leaves and eggs.\r\n\r\n5. Add soy sauce or sweet soy sauce on top. Also add chili sauce if you like.', 'Bubur ayame.png'),
(7, 'Lontong Sayur ', 'breakfast', 'ingredients :\r\n\r\n- 1/4kg chicken\r\n- Peas\r\n- Carrot\r\n- Potato\r\n- 1 lemongrass stalk\r\n- 1 cm galangal\r\n- 3 bay leaves\r\n- The oil for frying\r\n- 65 ml coconut milk\r\n- Water\r\n- Sugar to taste\r\n- Sufficient flavoring\r\n- 5 red onions\r\n- 3 cloves of garlic\r\n- 1 turmeric finger joint, roasted\r\n- 1/4 finger ginger\r\n- 3 roasted candlenuts\r\n- 10 curly red chilies\r\n- 3 cayenne peppers\r\n- Salt\r\n- Rice cakes\r\n- Boiled eggs\r\n- Fried onions\r\n- potato sauce\r\n- Crispy shrimp\r\n\r\nHow to make:\r\n\r\n1. Wash the chicken which has been cut into small pieces, set aside.\r\n\r\n2. Heat oil, saute ground spices along with bay leaves and lemongrass. Stir until the aroma is fragrant.\r\n\r\n3. Add the chicken, stir until it changes color.\r\n\r\n4. Add water, add coconut milk, then stir until evenly mixed. Cook until boiling.\r\n\r\n5. Add the cut and washed vegetables, add sugar and spices.\r\n\r\n6. Serve with lontong, eggs, potato chili sauce and fried onions.', 'Lontong Sayur.png'),
(8, 'Gado - Gado', 'breakfast', 'Ingredients:\r\n\r\n- 2 Lontong, cut into pieces\r\n- 50 g Bean sprouts\r\n- 3 pieces of Tofu\r\n- 1/2 board Tempeh\r\n- 1 large potato, peeled\r\n- 3 boiled eggs, peeled\r\n- 6 lettuce leaves\r\n- 1/4 Cabbage, coarsely sliced\r\n- shrimp crackers or emping\r\n\r\nPeanut Sauce:\r\n\r\n- 300 g peanuts\r\n- 7 cloves of garlic\r\n- 9 red onions\r\n- 3 large red chilies\r\n- 400 ml coconut milk\r\n- 2 tablespoons tamarind water\r\n- 50 g Brown sugar\r\n- 1/2 tbsp Salt\r\n- 1/2 tbsp Broth Powder\r\n- 3 pieces of lime leaves\r\n- 2 bay leaves\r\n-1/2 tbsp liquid cornstarch\r\n\r\nSteps:\r\n\r\n1. Peanut Sauce: Fried Bamer peanuts, baput and red chilies.\r\n\r\n2. Puree the peanuts, shallots, garlic and red chilies.\r\n\r\n3. Prepare a frying pan, add all the ground ingredients, add enough water\r\n\r\n4. Add sugar, salt, stock powder, coconut milk and cornstarch.\r\n\r\n5. Cook until boiling and cooked.\r\n\r\n6. Filling ingredients, fried tofu and tempeh. Boil potatoes, bean sprouts and cabbage\r\n\r\n7. Prepare all the filling ingredients in a plate, then drizzle with peanut sauce\r\n\r\n8. Serve with crackers', 'Gado Gado.png'),
(9, 'Nasi Kuning', 'breakfast', 'ingredients :\r\n\r\n-Enough rice (3 cups 200g each)\r\n- 1 turmeric measuring 10 cm\r\n- 1 piece of ginger sliced\r\n- 4 lemongrass leaves, crushed\r\n- 3 pandan leaves, tied in a knot\r\n- 2 lime leaves\r\n- 1 piece of galangal, crushed\r\n- 5 bay leaves\r\n- 1 pack of 200ml Liquid Coconut Milk Sasa\r\n- 5 red onions, sliced\r\n- 4 cloves of garlic, sliced\r\n- Salt and sugar to taste\r\n\r\nSteps:\r\n\r\n1. Blend turmeric with approximately 3 tablespoons of water, strain, then take the water.\r\n\r\n2. Cook Sasa Liquid Coconut Milk and all the spices and turmeric water. Add water according to the amount for cooking rice. Stir until cooked.\r\n\r\n3. Wash the rice thoroughly, you can use the tips above, drain it, then put it in the rice cooker.\r\n\r\n4. Pour the coconut milk cooking water and spices into the rice cooker while stirring until mixed evenly with the rice.\r\n\r\n5. Start the cooking process in the rice cooker and wait until it is cooked.\r\nYellow rice is ready to be served with various fillings.', 'nasi kuning tumpeng.png'),
(10, 'Soto Ayam Kuning', 'lunch', 'Ingredients :\r\n\r\n- chicken breast\r\n- water\r\n- salt\r\n- sugar\r\n- powdered chicken stock\r\n- 1 tbsp pepper\r\n- 1 tbsp coriander\r\n- 8 cloves of red onion\r\n- 6 cloves of garlic\r\n- 5 candlenut seeds\r\n- 2 segments of turmeric\r\n- 1 segment of ginger\r\n- galangal\r\n- lemongrass\r\n- Bay leaf\r\n- lime leaves\r\n\r\nStep :\r\n\r\n1. Puree the pepper, coriander, shallots, garlic, candlenuts, ginger and turmeric.\r\n\r\n2. Bring the water to a boil, once it boils, add the chicken breast.\r\n\r\n3. Saute the ground spices until fragrant.\r\n\r\n4. Put the ground spices in a pan containing water and chicken, add bay leaves, lemongrass, galangal and lime leaves.\r\n\r\n5. Add powdered chicken stock, salt and sugar, test the taste.\r\n\r\n6. If the taste is right and the chicken is cooked, drain the chicken\r\n\r\n7. If you feel the water is not enough, you can add more water. Please add more salt/stock powder for a taste test\r\n\r\n8. You can fry the boiled chicken or not, I just fry it briefly until shredded.\r\n\r\n9. Cabbage and spring onions are thinly sliced, bean sprouts are washed clean, chicken is shredded, vermicelli is simply sprinkled with warm water.\r\n\r\n10. Arrange the ingredients in a container, add the tomato slices then pour over the soto sauce, add a sprinkling of fried onions and lime juice.\r\n\r\n11. And the soup is ready to be served.', 'Soto Ayam.png'),
(11, 'Mie Ayam', 'lunch', 'Ingredients :\r\n\r\n- 1 kg wet/fresh egg noodles\r\n- 4 tbsp soy sauce\r\n- 2 tablespoons sweet soy sauce\r\n- 4 tablespoons vegetable oil\r\n- 2 tablespoons vegetable oil\r\n- 1/2 tsp sesame oil\r\n- 3 cloves of garlic, finely chopped\r\n- 500 g chicken meat, cut into small pieces\r\n- 1 spring onion, roughly chopped\r\n- 3 tablespoons oyster sauce\r\n- 100 ml sweet soy sauce\r\n- 200 ml of water\r\n- 1/2 tsp ground pepper\r\n- 1 tsp salt\r\n- mustard leaves, cut into pieces, boiled\r\n- Beef meatballs\r\n- finely sliced spring onions\r\n- Fried onion\r\n\r\nSteps:\r\n\r\n1. Press the lump of noodles until it breaks down. Rinse with hot water until slightly soft then drain.\r\n\r\n2. Mix vegetable oil and soy sauce in a container, stir well.\r\n\r\n3. Add the noodles to the soy sauce and oil mixture then stir until evenly mixed and set aside.\r\n\r\n4.. Sauteed Chicken: Saute the garlic until yellowish and fragrant.\r\n\r\n5. Add the chicken pieces, stir until stiff.\r\n\r\n6. Add green onions, soy sauce and oyster sauce. Mix well.\r\n\r\n7. Pour in water, season with pepper and salt. Cook until it boils and the chicken is cooked then remove from heat.\r\n\r\n8. Place the noodles in serving bowls, add toppings and accessories.\r\nServe warm.', 'Mie Ayam.png'),
(12, 'Rendang', 'lunch', 'Ingredients :\r\n\r\n- 1kg beef\r\n- 1 liter of thick coconut milk from 3 coconuts (squeeze them first without water)\r\n- 550 grams of grated coconut, roasted until brown\r\n- 5 bay leaves\r\n- 1 turmeric leaf\r\n- 10 lime leaves\r\n- 5 lemongrass stalks\r\n- 1/2 cinnamon stick\r\n- 3 cloves\r\n- 2 tsp salt\r\n- 1 star anise flower\r\n- 65 grams of garlic\r\n- 125 grams of shallots\r\n- 15 grams of turmeric\r\n- 35 grams of ginger\r\n- 75 grams of galangal\r\n- 35 grams of candlenuts\r\n- 1/2 tsp ground pepper\r\n- 1 tsp coriander\r\n- 1 cardamom pod\r\n- 1/4 nutmeg\r\n\r\nStep :\r\n\r\n1. Saute ground spices and roasted grated coconut. Stir well.\r\n\r\n2. Add bay leaves, lime leaves, turmeric leaves and lemongrass. Cook until fragrant.\r\n\r\n3. Add meat. Stir well.\r\n\r\n4. Pour in coconut milk. Stir well.\r\n\r\n5. Cook the rendang over low heat until the rendang is dry.', 'Rendang Lezat.png'),
(13, 'Bakso', 'lunch', 'Ingredients :\r\n\r\n-500 grams of beef\r\n-1 egg\r\n-100 grams of starch\r\n-3 cloves of garlic, crushed\r\n-1 teaspoon ground pepper\r\n-1/2 tsp ground nutmeg\r\n-1 tbsp salt\r\n-1/2 tsp powdered beef stock\r\n-Enough water to boil\r\n\r\nSteps:\r\n\r\n1. Grind 500 grams of cleaned beef. When it is smooth, add the eggs and other spices except starch.\r\n\r\n2. Next, pour in the starch little by little while continuing to stir.\r\n\r\n3. Once the meatball mixture is ready, cook the water until it boils.\r\nThen roll the dough into balls according to taste and put them in boiling water.\r\n\r\n4. Let it float, lift and drain. Beef meatballs are ready to be processed into a delicious dish. You can process meatballs into fried meatballs, grilled meatballs, or other meatball dishes.', 'Bakso.png'),
(14, 'Nasi Padang', 'lunch', 'Ingredients :\r\n \r\n- 500 gr chicken meat\r\n- 500 ml thick coconut milk\r\n- 200 ml of water\r\n- 2 stalks of crushed lemongrass\r\n- 4 pieces of lime leaves\r\n- 2 bay leaves\r\n- 1 piece turmeric leaves\r\n- 1 star anise flower\r\n- to taste Salt, sugar\r\n- 2 tablespoons roasted grated coconut, puree\r\n- 8 red onions\r\n- 5 pieces of garlic\r\n- 8 red chilies\r\n- 1/4 nutmeg\r\n- 1/2 tbsp coriander\r\n- 1 segment of ginger\r\n- 3 cm galangal\r\n- 1 segment of turmeric\r\n\r\nGreen chili sauce:\r\n\r\n- 20 curly green chilies\r\n- 10 green bird&#39;s eye chilies\r\n- 2 green tomatoes\r\n- 4 red onions\r\n- To taste salt, sugar\r\n\r\nSteps:\r\n\r\n1. Mix ground spices, complementary spices and coconut milk, stir well. Cook, stirring occasionally, until the water reduces slightly.\r\n\r\n2. Then add the chicken meat. (Put the chicken in the middle so that the chicken doesn&#39;t fall apart when cooked for a long time. Because you use domestic chicken, not free-range chicken). Cook until cooked, the spices are absorbed into the chicken and the water is reduced. Check the taste, remove from heat and serve.\r\n\r\n3. Steam curly green chilies, green cayenne peppers, green tomatoes, red onions. Once it softens a bit. Lift. Then knead roughly.\r\nAfter that, fry with cooking oil. Add salt, sugar to taste. Taste correction. Ready to serve.', 'Nasdang.png'),
(15, 'Sate Padang', 'dinner', 'Ingredients :\r\n\r\n- 500 gr beef hash (can be mixed with offal or beef tongue)\r\n- Water for boiling meat\r\n- 100 grams of Rice Flour\r\n- 8 cloves of red onion\r\n- 5 Cloves of Garlic\r\n- 1/2 tsp pepper\r\n- 1/2 tsp Cumin\r\n- 1/2 tsp coriander\r\n- 10 Red Chilies\r\n- 2 cayenne peppers\r\n- 1/2 nutmeg\r\n- 1 segment of turmeric\r\n- 1 segment of ginger\r\n- 2 Cardamom Fruits\r\n- 2 star anise\r\n- 5 cm Cinnamon\r\n- 1 stalk of Lemongrass\r\n- 1 galangal segment\r\n- 1 turmeric leaf\r\n- 2 Orange Leaves\r\n- 2 bay leaves\r\n- to taste Salt\r\n- Flavoring\r\n- Fried onions\r\n- Rice cake\r\n- Skin crackers\r\n\r\nSteps:\r\n\r\n1. Wash the meat thoroughly\r\n\r\n2. Blend all the spices. For galangal and lemongrass, just crush them.\r\n\r\n3. Heat a frying pan, pour cooking oil, saute ground spices. Add galangal, lemongrass, bay leaves, lime leaves and turmeric leaves. Saute until fragrant.\r\n\r\n4. Add water, add chicken/beef. Cook until the meat is cooked.\r\n\r\n5. Once the meat is cooked, remove the meat, cut into small slices and skewer using a skewer or stick then grill, occasionally brushing with cooking oil.\r\n\r\n6. Meanwhile, let the spiced cooking water continue to boil and add the rice flour which has been dissolved in water. Stir quickly, don&#39;t let it clump. Let it cook and thicken.\r\n\r\n7. Serve with rice cake slices and a sprinkling of fried onions on top.', 'sate padang.png'),
(16, 'Gudeg Nangka', 'dinner', 'Ingredients :\r\n\r\n- 1 kg young jackfruit\r\n- 4 tablespoons brown sugar\r\n- 3 tablespoons granulated sugar or to taste\r\n- 1 tbsp salt\r\n- 2 teak leaves\r\n- 7 bay leaves\r\n- 2 galangal segments\r\n- 1 liter coconut milk\r\n- 5 garlic\r\n- 5 candlenuts\r\n- 10 red onions\r\n- 1/2 tsp coriander\r\n- 1/2 tsp ground pepper\r\n- Oil for frying\r\n\r\nSteps:\r\n\r\n1. Cut the young jackfruit into small pieces according to taste.\r\n\r\n2. Roast the coriander and candlenuts until fragrant, remove from the heat and grind with the other spices that need to be ground.\r\n\r\n3. Heat enough oil. Saute the ground spices until cooked, stirring constantly so they don&#39;t burn.\r\n\r\n4. Add brown sugar, granulated sugar and salt. Stir well, remove from heat.\r\n\r\n5. Prepare a pan, mix the spices with young jackfruit. Arrange on the bottom of the pan and insert the teak leaves between the young jackfruit. Thinly chop and bruise the galangal, and add it to the young jackfruit mixture.\r\n\r\n6. Pour in the coconut milk and boil until cooked for approximately 2 hours, stirring occasionally. Check the taste, add sugar and salt as needed if it doesn&#39;t taste enough.\r\n\r\n7. If the coconut milk has reduced a lot, you have to check more often so that it doesn&#39;t burn at the bottom.\r\n\r\n8. Remove and serve the sweet and savory gudeg young jackfruit with warm rice.', 'Resep Gudeg Nangka.png'),
(17, 'Nasi Goreng Babat', 'dinner', 'Ingredients :\r\n\r\n- 1 Plate Full of Rice\r\n- 200 gr boiled tripe, sliced squares\r\n- Omelet\r\n- Cucumber\r\n- Fried onions\r\n- Enough cooking oil\r\n- 3 Garlic Cloves\r\n- 4 Red Onion Cloves\r\n- 3 Red Chilies\r\n- 4 Cayenne Peppers\r\n- 1/2 tsp shrimp paste (can skip)\r\n- 1/4 spoon Pepper Powder\r\n- 1/2 tsp Flavoring (can skip)\r\n- 1 tsp Broth Powder\r\n- Salt\r\n- 2 tablespoons Sweet Soy Sauce\r\n\r\nSteps:\r\n\r\n1. For the tripe, I use tripe that I have seasoned and cooked until soft, so just slice it.\r\n\r\n2. Blend all the ground spice ingredients by mashing or in a blender. Prepare a frying pan and cooking oil, saute the ground spices and sweet soy sauce until fragrant, then add the tripe slices.\r\n\r\n3. Stir well, cook the ground spices and tripe for just a moment then add the rice. Keep stirring until the spices are evenly mixed with the rice. cook until done.\r\n\r\n4. Serve with omelet, cucumber and a sprinkling of fried onions.', 'Nasi Goreng Babate.png'),
(18, 'Mie Goreng Aceh', 'dinner', 'Ingredients :\r\n\r\n- 300 gr wet yellow noodles\r\n- 1 carrot\r\n- Chinese cabbage\r\n- 10 meatballs\r\n- 2 stalks of celery\r\n- 1 tablespoon tomato sauce\r\n- 1 tbsp hot sauce\r\n- 2 tablespoons sweet soy sauce\r\n- 5 red onions\r\n- 4 pieces of garlic\r\n- 2 candlenuts\r\n- 1/2 tsp ground pepper\r\n- 1/2 tsp powdered shrimp paste\r\n- Salt\r\n\r\nSteps:\r\n\r\n1. Heat the water until it boils, then pour over the noodles so that the oil reduces.\r\n\r\n2. Slice carrots, Chinese cabbage, celery and meatballs.\r\n\r\n3. Blend the spice ingredients.\r\n\r\n4. Saute the ground spices until fragrant, add mustard greens, carrots, celery, meatballs and salt. Stir until wilted.\r\n\r\n5. Add noodles, add tomato sauce, spicy sauce and soy sauce. Mix well again.\r\n\r\n6. Serve while warm.', 'Mie Goreng Acehe.png'),
(19, 'Sate Ayam Bumbu Kacang', 'dinner', 'Ingredients :\r\n\r\n- 250 gr chicken breast meat\r\n- 100 gr peanuts\r\n- 200 ml of water\r\n- 3 tablespoons sweet soy sauce\r\n- 3 cloves of garlic\r\n- 2 Spring onions\r\n- 3 roasted candlenuts\r\n- 10 cayenne peppers\r\n- 1/2 tsp salt\r\n- 1 tbsp brown sugar\r\n- 1 kaffir lime leaf\r\n- Sliced raw shallots\r\n- Sliced cayenne pepper\r\n\r\nSteps:\r\n\r\n1. Clean and dice the chicken meat. Then coat with 1 teaspoon salt and lime juice. Leave it for a moment to let it sink in.\r\n\r\n2. Roast the peanuts until cooked.\r\n\r\n3. Crush/blend the nuts until smooth and add 1 tbsp of brown sugar.\r\n\r\n4. Mix in the ground spices, along with the lime leaves.\r\n\r\n5. Heat enough oil, saute the ground spices.\r\n\r\n6. After that, add water. Cook until it boils.\r\n\r\n7. Once boiling, add the beans that have been stirred earlier\r\n\r\n8. Add 3 tablespoons soy sauce, then cook until thick over low heat. Taste correction. Then lift.\r\n\r\n9. Take 3 tablespoons of peanut sauce and put it in a bowl. Add 1 tablespoon soy sauce and 1 tablespoon water. Stir well.\r\n\r\n10. Skewer the meat onto a special stick for satay.\r\n\r\n11. After that, dip 3 tablespoons of peanut sauce into the meat that has been skewered. Leave in the refrigerator for the flavors to infuse for approximately 1 hour.\r\n\r\n12. Grill the satay until cooked.\r\n\r\n13. The satay is ready to be enjoyed.', 'Sate Ayam & Bumbu Kacang.png'),
(20, 'Cireng', 'snack', 'Ingredients:\r\n\r\n- 2 tablespoons tapioca flour for starter\r\n- 250 grams of tapioca flour for dough\r\n- 5 cloves of garlic, crushed\r\n- 1 tsp salt\r\n- 1 tsp stock powder\r\n- 400 ml of water\r\n\r\nSteps:\r\n\r\n1. Boil water. Add 2 tablespoons tapioca flour. Stir until thickened. Turn off the heat.\r\n\r\n2. Mix the starter ingredients with 250 grams of tapioca flour, salt, stock powder and garlic.\r\n\r\n3. Knead the dough until mixed.\r\n\r\n4. Shape the dough into a flat shape. Leave it for 10 minutes.\r\n\r\n5. Heat the oil over low heat. Fry the cireng until cooked. Lift and drain.', 'cireng.jpg'),
(21, 'Kue Putu', 'snack', 'Ingredients:\r\n\r\n- 400 gr rice flour\r\n- 200 ml pandan water\r\n- 1/2 tsp fine salt\r\n- Enough pandan paste\r\n- Enough yellow coloring\r\n- 200-250 gr brown sugar\r\n- 300 gr grated coconut\r\n- 1/2 tsp salt\r\n- 2 pandan leaves\r\n\r\nSteps:\r\n\r\n1. Make a mold, prepare 1 banana leaf, then cut the banana leaf to the width of a food coloring bottle, then roll the leaf until it looks like a bamboo mold, then clip it with a stapler. Do it until it&#39;s finished.\r\n\r\n2. Heat the steamer, prepare a heat-proof container, then line it with banana leaves, add the rice flour, then steam the rice flour for 20-25 minutes until cooked.\r\n\r\n3. After the flour has finished steaming, transfer it to a container, stir briefly so that the heat dissipates, then add the salt, stir well, and add the mixture of pandan water, pandan paste and yellow coloring, little by little while stirring with your hands, until the mixture is grainy.\r\n\r\n4. Strain the mixture by stirring while pressing.\r\nAfter the mixture is filtered, put a few spoonfuls into the formed banana leaves, add the finely combed brown sugar, then cover again with the flour mixture until it is full. Flatten.\r\n\r\n5. Heat the steamer and steam for 10-15 minutes, or until cooked.\r\n\r\n6. add grated coconut, salt, and pandan leaves in a container, then steam until cooked.', 'kue putu.jpg'),
(22, 'Cimol', 'snack', 'Ingredients:\r\n\r\n- 300 grams tapioca\r\n- 1 tbsp flour\r\n- 3 cloves of garlic, crushed\r\n- 350 ml water\r\n- 1 tsp stock powder\r\n- ¾ tbsp salt\r\n- 1 spring onion, finely sliced (optional)\r\n- Cooking oil\r\n- Sprinkle spices according to taste\r\n\r\nSteps:\r\n\r\n1. Combine water, crushed garlic, salt to taste, and stock in a pan.\r\n\r\n2. Cook until boiling and don&#39;t forget to turn off the heat when finished.\r\n\r\n3. Pour the spices that have been made previously into the container containing the tapioca flour and wheat flour mixture little by little, while also kneading.\r\n\r\n4. If you feel the texture of the dough is right and smooth, don&#39;t add more water. Don&#39;t forget to taste the mixture.\r\n\r\n5. Shape the mixture into small balls like meatballs, put them in a container at a distance so that the mixture doesn&#39;t stick to each other.\r\n\r\n6. Heat a large amount of cooking oil in a frying pan.\r\nPut the dough balls one by one into a frying pan filled with hot cooking oil.\r\n\r\n7. Once the hot cooking oil is filled with dough balls, immediately reduce the heat so that the cimol doesn&#39;t explode.\r\n\r\n8. Remove the Cimol when it is golden yellow. Then drain.\r\n\r\n9. Serve on a plate warm. Don&#39;t forget to sprinkle spices of various flavors according to taste evenly.', 'cimol.jpg'),
(23, 'Serabi', 'snack', 'Ingredients:\r\n\r\n- 150 gr medium protein flour\r\n- 50 gr rice flour\r\n- 1/2 tsp yeast\r\n- 1 tsp baking powder\r\n- 1/2 tsp salt\r\n- 2 tablespoons sugar\r\n- 1 egg\r\n- 65 ml coconut milk\r\n- 200 ml pandan water\r\n- 200 gr brown sugar\r\n- 3 tablespoons sugar (according to taste)\r\n- 300 ml of water\r\n- 200 ml coconut milk\r\n- 1/2 tsp salt\r\n- 1 pandan sheet\r\n\r\nSteps:\r\n\r\n1. Mix all the dry ingredients, and stir well.\r\n2. Add the wet ingredients, and stir well using a whisk until smooth without any grinding. Cover and let stand for 30 minutes.\r\n3. Heat the Teflon, pour enough mixture, cook until it sets and the surface is dry, and remove from heat.\r\n4. Kinca sauce: mix brown sugar, granulated sugar and water. Cook until the sugar dissolves then strain. Add coconut milk, salt, and pandan leaves, cook until boiling, and add cornstarch solution while stirring.', 'serabi.jpg'),
(24, 'Lumpia', 'snack', 'Ingredients:\r\n\r\n- 15 ready-to-use spring roll skins\r\n- 200 corned beef\r\n- 50 grams of button mushrooms, cut into small pieces\r\n- 50 grams of jicama, cut into matchsticks\r\n- 50 grams of white tofu, crushed\r\n- 6 red onions, finely chopped\r\n- 4 cloves of garlic, finely chopped\r\n- 100 grams of onion, finely chopped\r\n- 1 spring onion, finely sliced\r\n- 1 tablespoon ready-to-use curry spices\r\n- 1/4 tsp ground pepper\r\n- 1/2 tbsp granulated sugar\r\n- Salt to taste\r\n\r\nSteps:\r\n\r\n1. Saute the shallots, garlic, and onions until fragrant.\r\n\r\n2. Add spring onions, jicama, tofu, corned beef, and mushrooms. Mix well.\r\n3. Add curry spices, ground pepper, sugar and salt.\r\n\r\n4. Cook until all ingredients are cooked. Lift.\r\n\r\n5. Prepare spring roll skins, and fill with 1 1/2 to 2 tablespoons of filling. Roll it up and seal the ends with egg white.\r\n\r\n6. Do this until all the spring roll skins are used up.\r\n\r\n7. Fry spring rolls over medium heat until golden brown.\r\n\r\n8. Lift, and drain. Serve spring rolls with pickles and chili sauce.', 'lumpia.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `number` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `number`, `password`, `address`) VALUES
(3, 'jono', 'jeno@gmail.com', '0321', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2', ''),
(4, 'mal', 'mal@gmail.com', '0819219', '87a6f00bb07d897ac96f06dbc22d77c3cb249a4f', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `recipe`
--
ALTER TABLE `recipe`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `book`
--
ALTER TABLE `book`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `recipe`
--
ALTER TABLE `recipe`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
