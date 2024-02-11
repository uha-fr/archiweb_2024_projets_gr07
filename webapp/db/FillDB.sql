INSERT INTO Category (label) VALUES ('Plat principal'), ('Dessert'), ('Entrée'), ('Accompagnement');

-- Ajouter des données à la table Ingredient
INSERT INTO Ingredient (label, calories, category_id) VALUES
('Riz', 130, 1),
('Lentilles', 116, 1),
('Pâtes', 158, 1),
('Sauce tomate', 82, 1),
('Fèves', 341, 1),
('Courgettes', 17, 1),
('Viande hachée', 250, 1),
('Feuilles de pâte feuilletée', 299, 2),
('Lait', 42, 2),
('Noix', 654, 2),
('Raisins secs', 299, 2),
('Poulet', 165, 1),
('Manioc', 160, 1),
('Feuilles de manioc', 49, 1),
('Bananes plantain', 122, 1),
('Bœuf', 250, 1),
('Vin rouge', 85, 3),
('Champignons', 22, 1),
('Lard', 900, 1);

-- Ajouter des données à la table UserType
INSERT INTO UserType (label) VALUES ('Utilisateur régulier'), ('Admin'), ('Nutritionniste');

-- Ajouter des données à la table User
INSERT INTO User (email, username, password, user_type_id) VALUES
('utilisateur@exemple.com', 'utilisateur', 'motdepasse', 1),
('admin@exemple.com', 'admin', 'motdepasse', 2),
('nutritionniste@exemple.com', 'nutritionniste', 'motdepasse', 3);

-- Ajouter des données à la table Country
INSERT INTO Country (name) VALUES ('Égypte'), ('Rwanda'), ('France');

-- Ajouter des données à la table DifficultyLevel
INSERT INTO DifficultyLevel (level) VALUES (1), (2), (3), (4), (5);

-- Ajouter des recettes égyptiennes
INSERT INTO Recipe (label, preparation_time, description, number_person, photo, country_origin_id, difficulty_level_id, creator_id) VALUES
('Koshari', 60, 'Plat traditionnel égyptien à base de riz, de lentilles, de pâtes et de sauce tomate.', 4, 'koshari.jpg', 1, 3, 2),
('Ful Medames', 30, 'Plat égyptien à base de fèves cuites et assaisonnées, généralement servi avec du pain.', 2, 'ful_medames.jpg', 1, 2, 2),
('Mahshi', 90, 'Courgettes farcies à la viande hachée et au riz, cuites dans une sauce tomate.', 4, 'mahshi.jpg', 1, 4, 2),
('Umm Ali', 45, 'Dessert égyptien composé de feuilles de pâte feuilletée, de lait, de noix et de raisins secs.', 6, 'umm_ali.jpg', 1, 3, 2);

-- Ajouter des recettes rwandaises
INSERT INTO Recipe (label, preparation_time, description, number_person, photo, country_origin_id, difficulty_level_id, creator_id) VALUES
('Poulet Nyama Choma', 90, 'Brochettes de poulet marinées et grillées, souvent accompagnées de bananes plantain.', 4, 'nyama_choma.jpg', 2, 4, 2),
('Ibihaza', 60, 'Plat rwandais à base de manioc bouilli, généralement servi avec de la viande ou du poisson.', 4, 'ibihaza.jpg', 2, 3, 2),
('Isombe', 45, 'Plat rwandais de purée de feuilles de manioc avec du poisson ou de la viande.', 4, 'isombe.jpg', 2, 3, 2),
('Brochettes de bananes plantain', 30, 'Brochettes de bananes plantain grillées, souvent assaisonnées de sel ou d\'épices.', 4, 'plantain_kebabs.jpg', 2, 2, 2);

-- Ajouter des recettes françaises

INSERT INTO Recipe (label, preparation_time, description, number_person, photo, country_origin_id, difficulty_level_id, creator_id) VALUES
('Boeuf bourguignon', 120, 'Plat français de bœuf mijoté dans du vin rouge avec des légumes.', 4, 'boeuf_bourguignon.jpg', 3, 4, 2),
('Quiche Lorraine', 60, 'Tarte salée française à base de pâte brisée, d\'œufs, de crème et de lardons.', 6, 'quiche_lorraine.jpg', 3, 3, 2),
('Crème brûlée', 60, 'Dessert français composé de crème, d\'œufs, de sucre et de vanille, caramélisé sur le dessus.', 4, 'creme_brulee.jpg', 3, 2, 2);

-- Ajouter des ingrédients pour chaque recette
INSERT INTO IngredientRecipe (recipe_id, ingredient_id, quantity, optional) VALUES
-- Koshari
(1, 1, 200, 0), (1, 2, 200, 0), (1, 3, 200, 0), (1, 4, 100, 0),
-- Ful Medames
(2, 5, 300, 0),
-- Mahshi
(3, 6, 4, 0), (3, 7, 300, 0),
-- Umm Ali
(4, 8, 200, 0), (4, 9, 100, 0), (4, 10, 100, 0), (4, 11, 100, 0),
-- Poulet Nyama Choma
(5, 12, 500, 0), (5, 17, 1, 0),
-- Ibihaza
(6, 13, 500, 0),
-- Isombe
(7, 14, 500, 0), (7, 15, 200, 0),
-- Brochettes de bananes plantain
(8, 16, 4, 0);

-- Ajouter des étapes pour chaque recette
INSERT INTO Step (description, recipe_id) VALUES
-- Koshari
('Faire cuire le riz, les lentilles et les pâtes.', 1),
('Préparer la sauce tomate et la mélanger avec les ingrédients cuits.', 1),
-- Ful Medames
('Faire cuire les fèves et les assaisonner.', 2),
-- Mahshi
('Farcir les courgettes avec le mélange de viande hachée et de riz.', 3),
('Les faire cuire dans la sauce tomate.', 3),
-- Umm Ali
('Mélanger le lait, les noix et les raisins secs.', 4),
('Faire bouillir le mélange.', 4),
('Verser sur les feuilles de pâte feuilletée et cuire au four.', 4),
-- Poulet Nyama Choma
('Mariner les brochettes de poulet dans une marinade d\'épices et d\'huile.', 5),
('Griller les brochettes sur un feu ouvert ou un gril.', 5),
-- Ibihaza
('Faire bouillir le manioc.', 6),
-- Isombe
('Préparer la purée de feuilles de manioc.', 7),
('Faire cuire le poisson ou la viande.', 7),
-- Brochettes de bananes plantain
('Couper les bananes plantain en morceaux.', 8),
('Les enfiler sur des brochettes et les griller.', 8),
-- Boeuf bourguignon
('Faire mijoter le bœuf dans du vin rouge.', 9),

-- Quiche Lorraine
('Préparer la pâte et la garniture.', 11),
('Cuire au four jusqu\'à ce que la pâte soit dorée.', 11),
-- Crème brûlée
('Mélanger la crème, les œufs, le sucre et la vanille.', 12),
('Verser dans des ramequins et cuire au four.', 12),
('Saupoudrer de sucre et caraméliser avec un chalumeau.', 12);

INSERT INTO Meal (recipe_id, user_id, date) VALUES
-- Utilisateur régulier
(1, 1, NOW()),
(2, 1, NOW()),
(3, 1, NOW()),
(4, 1, NOW()),
(5, 1, NOW()),
-- Admin
(6, 2, NOW()),
(7, 2, NOW()),
(8, 2, NOW()),
(9, 2, NOW()),
(10, 2, NOW()),
-- Nutritionniste
(11, 3, NOW()),
(12, 3, NOW());