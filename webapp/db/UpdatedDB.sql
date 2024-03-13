-- MySQL dump 10.13  Distrib 8.0.32, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: nutritiondb
-- ------------------------------------------------------
-- Server version	8.0.32

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `label` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'Entrée'),(2,'Plat principal'),(3,'Dessert'),(4,'Boisson');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `country`
--

DROP TABLE IF EXISTS `country`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `country` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `country`
--

LOCK TABLES `country` WRITE;
/*!40000 ALTER TABLE `country` DISABLE KEYS */;
INSERT INTO `country` VALUES (1,'Égypte'),(2,'Rwanda'),(3,'France');
/*!40000 ALTER TABLE `country` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `difficultylevel`
--

DROP TABLE IF EXISTS `difficultylevel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `difficultylevel` (
  `id` int NOT NULL AUTO_INCREMENT,
  `level` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `difficultylevel`
--

LOCK TABLES `difficultylevel` WRITE;
/*!40000 ALTER TABLE `difficultylevel` DISABLE KEYS */;
INSERT INTO `difficultylevel` VALUES (1,1),(2,2),(3,3),(4,4),(5,5);
/*!40000 ALTER TABLE `difficultylevel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ingredient`
--

DROP TABLE IF EXISTS `ingredient`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ingredient` (
  `id` int NOT NULL AUTO_INCREMENT,
  `label` varchar(255) DEFAULT NULL,
  `calories` int DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `category_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `ingredient_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ingredient`
--

LOCK TABLES `ingredient` WRITE;
/*!40000 ALTER TABLE `ingredient` DISABLE KEYS */;
INSERT INTO `ingredient` VALUES (1,'Pomme de terre',77,'https://img-3.journaldesfemmes.fr/ZfmzxO5Kyg0e3j1URh4V8Mf3slc=/1500x/smart/097777a79f144a048f7008573f8584d5/ccmcms-jdf/27424516.jpg',1),(2,'Poulet',239,'https://img-3.journaldesfemmes.fr/vFEM-3POiKT8i8NmZvqwIZiG9kg=/1500x/smart/1a712856aaaf419dbfa5d24cc9808e03/ccmcms-jdf/35925017.jpg',2),(3,'Chocolat',546,'https://images.pexels.com/photos/65882/chocolate-dark-coffee-confiserie-65882.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2',3),(4,'Tomate',18,'https://images.pexels.com/photos/533280/pexels-photo-533280.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2',1),(5,'Riz',130,'https://images.pexels.com/photos/4110251/pexels-photo-4110251.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2',2),(6,'Épices égyptiennes',0,'https://www.cairotoptours.com/storage/2527/conversions/8eccd10fcf984d33fd8ee491003a6064-webp.webp',1),(7,'Brochette de viande rwandaise',300,'rwandan_kebab.jpg',2),(8,'Baguette française',250,'https://tinyurl.com/3k563t73',1);
/*!40000 ALTER TABLE `ingredient` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ingredientrecipe`
--

DROP TABLE IF EXISTS `ingredientrecipe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ingredientrecipe` (
  `recipe_id` int NOT NULL,
  `ingredient_id` int NOT NULL,
  `quantity` int DEFAULT NULL,
  `optional` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`recipe_id`,`ingredient_id`),
  KEY `ingredient_id` (`ingredient_id`),
  CONSTRAINT `ingredientrecipe_ibfk_1` FOREIGN KEY (`recipe_id`) REFERENCES `recipe` (`id`) ON DELETE CASCADE,
  CONSTRAINT `ingredientrecipe_ibfk_2` FOREIGN KEY (`ingredient_id`) REFERENCES `ingredient` (`id`),
  CONSTRAINT `meal_ibfk_1` FOREIGN KEY (`recipe_id`) REFERENCES `recipe` (`id`) ON DELETE CASCADE,
  CONSTRAINT `step_ibfk_1` FOREIGN KEY (`recipe_id`) REFERENCES `recipe` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ingredientrecipe`
--

LOCK TABLES `ingredientrecipe` WRITE;
/*!40000 ALTER TABLE `ingredientrecipe` DISABLE KEYS */;
INSERT INTO `ingredientrecipe` VALUES (1,1,300,0),(1,5,200,0),(1,6,100,0),(3,1,200,0),(3,4,300,0),(3,6,100,0),(4,3,500,0),(4,7,200,1),(5,2,600,0),(5,8,200,0),(6,5,400,0),(6,8,300,0),(7,5,400,0),(7,8,300,0),(8,8,800,0),(9,2,600,0),(9,4,200,0),(10,2,600,0),(10,4,200,0),(11,4,200,0),(11,8,200,0),(12,3,400,0),(12,8,200,0);
/*!40000 ALTER TABLE `ingredientrecipe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `meal`
--

DROP TABLE IF EXISTS `meal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `meal` (
  `recipe_id` int DEFAULT NULL,
  `user_id` int NOT NULL,
  `date` datetime NOT NULL,
  KEY `user_id` (`user_id`),
  CONSTRAINT `meal_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `meal`
--

LOCK TABLES `meal` WRITE;
/*!40000 ALTER TABLE `meal` DISABLE KEYS */;
INSERT INTO `meal` VALUES (1,1,'2024-02-10 21:48:17'),(2,1,'2024-02-10 21:48:17'),(3,1,'2024-02-10 21:48:17'),(4,1,'2024-02-10 21:48:17'),(5,1,'2024-02-10 21:48:17'),(6,2,'2024-02-10 21:48:17'),(7,2,'2024-02-10 21:48:17'),(8,2,'2024-02-10 21:48:17'),(9,2,'2024-02-10 21:48:17'),(10,2,'2024-02-10 21:48:17'),(11,3,'2024-02-10 21:48:17'),(12,3,'2024-02-10 21:48:17'),(NULL,19,'2024-03-13 00:00:00'),(1,19,'2024-03-13 00:00:00'),(NULL,19,'2024-03-13 00:00:00'),(4,19,'2024-03-13 00:00:00'),(NULL,19,'2024-03-13 00:00:00'),(7,19,'2024-03-13 00:00:00'),(NULL,19,'2024-03-13 00:00:00'),(8,19,'2024-03-13 00:00:00'),(NULL,19,'2024-03-13 00:00:00'),(1,19,'2024-03-13 00:00:00'),(NULL,19,'2024-03-13 00:00:00'),(4,19,'2024-03-13 00:00:00'),(NULL,19,'2024-03-13 00:00:00'),(4,19,'2024-03-13 00:00:00'),(NULL,19,'2024-03-13 00:00:00'),(4,19,'2024-03-13 00:00:00'),(NULL,19,'2024-03-13 00:00:00'),(1,19,'2024-03-13 00:00:00'),(NULL,19,'2024-03-13 00:00:00'),(4,19,'2024-03-13 00:00:00'),(NULL,19,'2024-03-13 00:00:00'),(4,19,'2024-03-13 00:00:00'),(NULL,19,'2024-03-13 00:00:00'),(NULL,19,'2024-03-13 00:00:00');
/*!40000 ALTER TABLE `meal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recipe`
--

DROP TABLE IF EXISTS `recipe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `recipe` (
  `id` int NOT NULL AUTO_INCREMENT,
  `label` varchar(255) DEFAULT NULL,
  `preparation_time` int DEFAULT NULL,
  `description` text,
  `number_person` int DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `country_origin_id` int DEFAULT NULL,
  `difficulty_level_id` int DEFAULT NULL,
  `creator_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `country_origin_id` (`country_origin_id`),
  KEY `difficulty_level_id` (`difficulty_level_id`),
  KEY `creator_id` (`creator_id`),
  CONSTRAINT `recipe_ibfk_1` FOREIGN KEY (`country_origin_id`) REFERENCES `country` (`id`),
  CONSTRAINT `recipe_ibfk_2` FOREIGN KEY (`difficulty_level_id`) REFERENCES `difficultylevel` (`id`),
  CONSTRAINT `recipe_ibfk_3` FOREIGN KEY (`creator_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recipe`
--

LOCK TABLES `recipe` WRITE;
/*!40000 ALTER TABLE `recipe` DISABLE KEYS */;
INSERT INTO `recipe` VALUES (1,'Boeuf bourguignon',120,'Plat français de viande de bœuf mijotée avec du vin rouge, des champignons et des oignons.',4,'https://images.pexels.com/photos/361184/asparagus-steak-veal-steak-veal-361184.jpeg',3,5,2),(3,'Quiche Lorraine',60,'Tarte salée française à base d\'œufs, de crème fraîche, de lardons et de fromage.',6,'https://images.pexels.com/photos/103888/pexels-photo-103888.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2',3,3,2),(4,'Crème brûlée',45,'Dessert français à base de crème, d\'œufs, de sucre et de vanille, caramélisé à la surface.',4,'https://media.istockphoto.com/id/864319230/fr/photo/cr%C3%A8me-br%C3%BBl%C3%A9e.jpg?s=612x612&w=0&k=20&c=AkEQYZ5V7bA_5rFhrL0Qu8n74X1oBWhXGzj1T2km7Jo=',3,2,2),(5,'Koshari',60,'Plat traditionnel égyptien à base de riz, de lentilles, de pâtes et de sauce tomate.',4,'https://www.mealgarden.com/media/recipe/2022/07/bigstock-Arabic-Cuisine-Kushari-Of-Ric-119321594.jpeg',1,3,2),(6,'Ful Medames',30,'Plat égyptien à base de fèves cuites et assaisonnées, généralement servi avec du pain.',2,'https://mj.bald-news.com/wp-content/uploads/2024/03/acb4e634a94842ae7732159c6a547e1ea0e3372b-1-800x500.jpg?v=1709974358',1,2,2),(7,'Mahshi',90,'Courgettes farcies à la viande hachée et au riz, cuites dans une sauce tomate.',4,'https://www.annaharar.com/ContentFilesArchive/622637Image1-1180x677_d.jpg?version=4858065',1,4,2),(8,'Umm Ali',45,'Dessert égyptien composé de feuilles de pâte feuilletée, de lait, de noix et de raisins secs.',6,'https://cdn-rdb.arla.com/Files/puckarabia-ar/4214643647/4fbc458b-4ef5-4a4d-83c2-193f2996286f.jpg?w=1230&h=670&mode=crop&ak=aee88f72&hm=5f828870',1,3,2),(9,'Poulet Nyama Choma',90,'Brochettes de poulet marinées et grillées, souvent accompagnées de bananes plantain.',4,'https://recettes.africa/wp-content/uploads/2024/01/daniel-hooper-PaaboPF3dVY-unsplash-1.jpg',2,4,2),(10,'Ibihaza',60,'Plat rwandais à base de manioc bouilli, généralement servi avec de la viande ou du poisson.',4,'https://www.best-country.com/images/countryInformation/185_food_best-country_1567626796_crop.jpg',2,3,2),(11,'Isombe',45,'Plat rwandais de purée de feuilles de manioc avec du poisson ou de la viande.',4,'https://static.worldcuisine.info/wp-content/uploads/2020/06/06073151/1a2d603ef215914fbb7ee499b6c2a558-1030x687.jpg',2,3,2),(12,'Brochettes de bananes plantain',30,'Brochettes de bananes plantain grillées, souvent assaisonnées de sel ou d\'épices.',4,'https://upload.wikimedia.org/wikipedia/commons/2/2a/Brochettes_d%27alloco.jpg',2,2,2);
/*!40000 ALTER TABLE `recipe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `step`
--

DROP TABLE IF EXISTS `step`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `step` (
  `id` int NOT NULL AUTO_INCREMENT,
  `description` text,
  `recipe_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `recipe_id` (`recipe_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `step`
--

LOCK TABLES `step` WRITE;
/*!40000 ALTER TABLE `step` DISABLE KEYS */;
INSERT INTO `step` VALUES (1,'Faire cuire le riz, les lentilles et les pâtes.',1),(2,'Préparer la sauce tomate et la mélanger avec les ingrédients cuits.',1),(3,'Faire cuire les fèves et les assaisonner.',2),(4,'Farcir les courgettes avec le mélange de viande hachée et de riz.',3),(5,'Les faire cuire dans la sauce tomate.',3),(6,'Mélanger le lait, les noix et les raisins secs.',4),(7,'Faire bouillir le mélange.',4),(8,'Verser sur les feuilles de pâte feuilletée et cuire au four.',4),(9,'Mariner les brochettes de poulet dans une marinade d\'épices et d\'huile.',5),(10,'Griller les brochettes sur un feu ouvert ou un gril.',5),(11,'Faire bouillir le manioc.',6),(12,'Préparer la purée de feuilles de manioc.',7),(13,'Faire cuire le poisson ou la viande.',7),(14,'Couper les bananes plantain en morceaux.',8),(15,'Les enfiler sur des brochettes et les griller.',8),(16,'Faire mijoter le bœuf dans du vin rouge.',9),(17,'Faire mijoter le poulet dans du vin rouge avec des champignons et du lard.',10),(18,'Préparer la pâte et la garniture.',11),(19,'Cuire au four jusqu\'à ce que la pâte soit dorée.',11),(20,'Mélanger la crème, les œufs, le sucre et la vanille.',12),(21,'Verser dans des ramequins et cuire au four.',12),(22,'Saupoudrer de sucre et caraméliser avec un chalumeau.',12);
/*!40000 ALTER TABLE `step` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `user_type_id` int DEFAULT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `country_id` int DEFAULT NULL,
  `caloriesobjective` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_email` (`email`),
  UNIQUE KEY `unique_username` (`username`),
  KEY `user_type_id` (`user_type_id`),
  KEY `country_id` (`country_id`),
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`user_type_id`) REFERENCES `usertype` (`id`),
  CONSTRAINT `user_ibfk_2` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'user1@example.com','user1','password1',1,'',NULL,NULL,NULL,NULL),(2,'admin@example.com','admin','password2',2,'',NULL,NULL,NULL,NULL),(3,'nutritionist@example.com','nutritionist','password3',3,'',NULL,NULL,NULL,NULL),(19,'ahmedhazem@gmail.com','Ahmed10Hazem','$2y$10$3RHTMoXLs08QkoPCRtvg3OsKjCaHYqC98JKOvpTWHj/1nFIxwrOae',1,'Ahmed Hazem','Youssef','13 Rue des Frères Lumière, 68350 Brunstatt-Didenheim, France',3,5000);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usertype`
--

DROP TABLE IF EXISTS `usertype`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usertype` (
  `id` int NOT NULL AUTO_INCREMENT,
  `label` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usertype`
--

LOCK TABLES `usertype` WRITE;
/*!40000 ALTER TABLE `usertype` DISABLE KEYS */;
INSERT INTO `usertype` VALUES (1,'Utilisateur régulier'),(2,'Admin'),(3,'Nutritionniste');
/*!40000 ALTER TABLE `usertype` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-03-13 23:45:44
