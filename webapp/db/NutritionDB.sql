-- Créer la table Category
CREATE TABLE Category (
    id INT AUTO_INCREMENT PRIMARY KEY,
    label VARCHAR(255) -- Libellé de la catégorie
);

-- Créer la table Ingredient
CREATE TABLE Ingredient (
    id INT AUTO_INCREMENT PRIMARY KEY,
    label VARCHAR(255), -- Libellé de l'ingrédient
    calories INT, -- Calories pour 100g
    photo VARCHAR(255), -- Chemin de la photo
    category_id INT, -- Clé étrangère vers la table Category
    FOREIGN KEY (category_id) REFERENCES Category(id)
);

-- Créer la table UserType
CREATE TABLE UserType (
    id INT AUTO_INCREMENT PRIMARY KEY,
    label VARCHAR(255) -- Libellé du type d'utilisateur
);

-- Créer la table User
CREATE TABLE User (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255),
    username VARCHAR(255),
    password VARCHAR(255), -- Mot de passe hashé en PHP
    user_type_id INT, -- Clé étrangère vers la table UserType
    FOREIGN KEY (user_type_id) REFERENCES UserType(id)
);

-- Créer la table Country
CREATE TABLE Country (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) -- Nom du pays
);

-- Créer la table DifficultyLevel
CREATE TABLE DifficultyLevel (
    id INT AUTO_INCREMENT PRIMARY KEY,
    level INT -- Niveau de difficulté de préparation de la recette (entier)
);

-- Créer la table Recipe
CREATE TABLE Recipe (
    id INT AUTO_INCREMENT PRIMARY KEY,
    label VARCHAR(255),
    preparation_time INT, -- Temps de préparation estimé en minutes
    description TEXT, -- Description de la préparation
    number_person INT, -- Nombre de personnes pour la recette
    photo VARCHAR(255),
    country_origin_id INT, -- Clé étrangère vers la table Country
    difficulty_level_id INT, -- Clé étrangère vers la table DifficultyLevel
    creator_id INT, -- Clé étrangère vers la table User
    FOREIGN KEY (country_origin_id) REFERENCES Country(id),
    FOREIGN KEY (difficulty_level_id) REFERENCES DifficultyLevel(id),
    FOREIGN KEY (creator_id) REFERENCES User(id)
);

-- Créer la table IngredientRecipe (table de jonction pour la relation plusieurs à plusieurs)
CREATE TABLE IngredientRecipe (
    recipe_id INT,
    ingredient_id INT,
    quantity INT, -- En grammes
    optional BOOLEAN, -- Booléen : vrai lorsque l'ingrédient est facultatif dans la recette
    PRIMARY KEY (recipe_id, ingredient_id),
    FOREIGN KEY (recipe_id) REFERENCES Recipe(id),
    FOREIGN KEY (ingredient_id) REFERENCES Ingredient(id)
);

-- Créer la table Step avec une clé étrangère référençant Recipe
CREATE TABLE Step (
    id INT AUTO_INCREMENT PRIMARY KEY,
    description TEXT, -- Description de l'étape
    recipe_id INT, -- Clé étrangère vers la table Recipe
    FOREIGN KEY (recipe_id) REFERENCES Recipe(id)
);

-- Créer la table Meal
CREATE TABLE Meal (
    recipe_id INT,
    user_id INT,
    date DATETIME, -- Date et heure
    PRIMARY KEY (recipe_id, user_id, date),
    FOREIGN KEY (recipe_id) REFERENCES Recipe(id),
    FOREIGN KEY (user_id) REFERENCES User(id)
);

