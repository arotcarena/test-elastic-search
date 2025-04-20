<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProductFixtures extends Fixture
{
    private const PRODUCTS = [
        // Furniture
        ['designation' => 'Chaise en paille', 'price' => 2999],
        ['designation' => 'Table en bois massif', 'price' => 8999],
        ['designation' => 'Canapé 3 places en cuir', 'price' => 11999],
        ['designation' => 'Bibliothèque en chêne', 'price' => 5999],
        ['designation' => 'Table basse en verre', 'price' => 3999],
        ['designation' => 'Fauteuil relax', 'price' => 4999],
        ['designation' => 'Commode 3 tiroirs', 'price' => 3499],
        ['designation' => 'Table à manger extensible', 'price' => 12999],
        ['designation' => 'Meuble TV design', 'price' => 4499],
        ['designation' => 'Tabouret de bar', 'price' => 1999],

        // Electronics
        ['designation' => 'Smartphone Samsung S22', 'price' => 89999],
        ['designation' => 'TV LED 55 pouces 4K', 'price' => 69999],
        ['designation' => 'Laptop HP 15 pouces', 'price' => 79999],
        ['designation' => 'Casque sans fil Sony', 'price' => 19999],
        ['designation' => 'Enceinte Bluetooth JBL', 'price' => 9999],
        ['designation' => 'Tablette Samsung Galaxy', 'price' => 39999],
        ['designation' => 'Smartwatch Apple Watch', 'price' => 49999],
        ['designation' => 'Drone DJI Mini 2', 'price' => 59999],
        ['designation' => 'Console PS5', 'price' => 49999],
        ['designation' => 'Switch Nintendo', 'price' => 29999],

        // Garden
        ['designation' => 'Pelle en acier', 'price' => 1999],
        ['designation' => 'Râteau en métal', 'price' => 1499],
        ['designation' => 'Tondeuse à gazon électrique', 'price' => 19999],
        ['designation' => 'Arrosoir 10L', 'price' => 999],
        ['designation' => 'Kit outils de jardinage', 'price' => 4999],
        ['designation' => 'Brouette en métal', 'price' => 6999],
        ['designation' => 'Sécateur professionnel', 'price' => 2499],
        ['designation' => 'Taille-haie électrique', 'price' => 8999],
        ['designation' => 'Serre de jardin', 'price' => 29999],
        ['designation' => 'Barbecue à charbon', 'price' => 7999],

        // Baby
        ['designation' => 'Poussette trio', 'price' => 49999],
        ['designation' => 'Siège auto groupe 0+', 'price' => 19999],
        ['designation' => 'Lit parapluie', 'price' => 8999],
        ['designation' => 'Baignoire bébé', 'price' => 2999],
        ['designation' => 'Tapis d\'éveil', 'price' => 3999],
        ['designation' => 'Transat bébé', 'price' => 5999],
        ['designation' => 'Parc à jouets', 'price' => 12999],
        ['designation' => 'Chaise haute évolutive', 'price' => 7999],
        ['designation' => 'Trotteur musical', 'price' => 4999],
        ['designation' => 'Mobile musical', 'price' => 2999],

        // Kitchen
        ['designation' => 'Robot multifonction', 'price' => 29999],
        ['designation' => 'Machine à café automatique', 'price' => 39999],
        ['designation' => 'Mixeur plongeant', 'price' => 4999],
        ['designation' => 'Grille-pain 4 tranches', 'price' => 2999],
        ['designation' => 'Bouilloire électrique', 'price' => 1999],
        ['designation' => 'Cocotte minute', 'price' => 8999],
        ['designation' => 'Set de casseroles', 'price' => 12999],
        ['designation' => 'Couteau de chef', 'price' => 3999],
        ['designation' => 'Planche à découper', 'price' => 999],
        ['designation' => 'Passoire inox', 'price' => 1499],

        // Sports
        ['designation' => 'Vélo de route', 'price' => 99999],
        ['designation' => 'Tapis de yoga', 'price' => 1999],
        ['designation' => 'Haltères ajustables', 'price' => 4999],
        ['designation' => 'Corde à sauter', 'price' => 999],
        ['designation' => 'Ballon de football', 'price' => 1999],
        ['designation' => 'Raquette de tennis', 'price' => 8999],
        ['designation' => 'Chaussures de running', 'price' => 12999],
        ['designation' => 'Sac de sport', 'price' => 2999],
        ['designation' => 'Bouteille isotherme', 'price' => 1499],
        ['designation' => 'Montre GPS sport', 'price' => 19999],

        // DIY
        ['designation' => 'Perceuse visseuse', 'price' => 7999],
        ['designation' => 'Scie circulaire', 'price' => 9999],
        ['designation' => 'Ponceuse orbitale', 'price' => 5999],
        ['designation' => 'Mètre ruban 5m', 'price' => 999],
        ['designation' => 'Niveau à bulle', 'price' => 1499],
        ['designation' => 'Tournevis set 6 pièces', 'price' => 1999],
        ['designation' => 'Clé à molette', 'price' => 999],
        ['designation' => 'Pince coupante', 'price' => 1499],
        ['designation' => 'Masque de protection', 'price' => 999],
        ['designation' => 'Gants de travail', 'price' => 999],

        // Office
        ['designation' => 'Chaise de bureau ergonomique', 'price' => 19999],
        ['designation' => 'Bureau réglable en hauteur', 'price' => 29999],
        ['designation' => 'Lampe de bureau LED', 'price' => 2999],
        ['designation' => 'Organiseur de bureau', 'price' => 1999],
        ['designation' => 'Souris sans fil', 'price' => 2999],
        ['designation' => 'Clavier mécanique', 'price' => 8999],
        ['designation' => 'Support pour écran', 'price' => 3999],
        ['designation' => 'Tapis de souris', 'price' => 999],
        ['designation' => 'Classeur 4 anneaux', 'price' => 999],
        ['designation' => 'Stylo plume', 'price' => 1999],

        // Pets
        ['designation' => 'Cage pour hamster', 'price' => 2999],
        ['designation' => 'Litière pour chat', 'price' => 1999],
        ['designation' => 'Collier GPS pour chien', 'price' => 9999],
        ['designation' => 'Jouet pour chat', 'price' => 999],
        ['designation' => 'Os à mâcher', 'price' => 999],
        ['designation' => 'Brosse pour chien', 'price' => 1499],
        ['designation' => 'Transporteur pour chat', 'price' => 2999],
        ['designation' => 'Fontaine à eau', 'price' => 1999],
        ['designation' => 'Gamelle anti-glouton', 'price' => 1499],
        ['designation' => 'Harnais pour chien', 'price' => 1999],

        // Beauty
        ['designation' => 'Sèche-cheveux professionnel', 'price' => 3999],
        ['designation' => 'Lisseur à cheveux', 'price' => 2999],
        ['designation' => 'Kit manucure', 'price' => 1999],
        ['designation' => 'Crème hydratante', 'price' => 1499],
        ['designation' => 'Masque facial', 'price' => 999],
        ['designation' => 'Brosse à dents électrique', 'price' => 2999],
        ['designation' => 'Rasoir électrique', 'price' => 3999],
        ['designation' => 'Epilateur', 'price' => 4999],
        ['designation' => 'Balance de précision', 'price' => 1999],
        ['designation' => 'Tondeuse à barbe', 'price' => 2999],

        // Home
        ['designation' => 'Aspirateur robot', 'price' => 29999],
        ['designation' => 'Fer à repasser vapeur', 'price' => 4999],
        ['designation' => 'Machine à laver', 'price' => 39999],
        ['designation' => 'Sèche-linge', 'price' => 29999],
        ['designation' => 'Lave-vaisselle', 'price' => 34999],
        ['designation' => 'Four à micro-ondes', 'price' => 9999],
        ['designation' => 'Réfrigérateur américain', 'price' => 99999],
        ['designation' => 'Plaque de cuisson induction', 'price' => 19999],
        ['designation' => 'Hotte aspirante', 'price' => 14999],
        ['designation' => 'Cafetière programmable', 'price' => 3999],

        // Outdoor
        ['designation' => 'Tente 4 places', 'price' => 19999],
        ['designation' => 'Sac de couchage', 'price' => 4999],
        ['designation' => 'Lampe frontale', 'price' => 1999],
        ['designation' => 'Chaussures de randonnée', 'price' => 9999],
        ['designation' => 'Sac à dos 40L', 'price' => 7999],
        ['designation' => 'Gourde isotherme', 'price' => 1999],
        ['designation' => 'Bâtons de marche', 'price' => 2999],
        ['designation' => 'Trousse de secours', 'price' => 1999],
        ['designation' => 'Couteau de survie', 'price' => 2999],
        ['designation' => 'Boussole', 'price' => 999],

        // Toys
        ['designation' => 'Lego Star Wars', 'price' => 9999],
        ['designation' => 'Poupée interactive', 'price' => 4999],
        ['designation' => 'Voiture télécommandée', 'price' => 2999],
        ['designation' => 'Jeu de société', 'price' => 1999],
        ['designation' => 'Puzzle 1000 pièces', 'price' => 1499],
        ['designation' => 'Kit de magie', 'price' => 1999],
        ['designation' => 'Trampoline', 'price' => 29999],
        ['designation' => 'Balancelle', 'price' => 9999],
        ['designation' => 'Toboggan', 'price' => 14999],
        ['designation' => 'Toboggan gonflable', 'price' => 4999],

        // Music
        ['designation' => 'Guitare acoustique', 'price' => 19999],
        ['designation' => 'Piano numérique', 'price' => 99999],
        ['designation' => 'Violon 4/4', 'price' => 29999],
        ['designation' => 'Batterie électronique', 'price' => 49999],
        ['designation' => 'Microphone USB', 'price' => 9999],
        ['designation' => 'Câble jack 6.35mm', 'price' => 999],
        ['designation' => 'Support pour guitare', 'price' => 1999],
        ['designation' => 'Métronome', 'price' => 999],
        ['designation' => 'Sangle pour guitare', 'price' => 999],
        ['designation' => 'Jeu de cordes', 'price' => 1999],

        // Photography
        ['designation' => 'Appareil photo reflex', 'price' => 79999],
        ['designation' => 'Objectif 50mm', 'price' => 29999],
        ['designation' => 'Trépied photo', 'price' => 9999],
        ['designation' => 'Flash externe', 'price' => 4999],
        ['designation' => 'Sac photo', 'price' => 7999],
        ['designation' => 'Filtre polarisant', 'price' => 1999],
        ['designation' => 'Carte mémoire 64GB', 'price' => 2999],
        ['designation' => 'Batterie de rechange', 'price' => 1999],
        ['designation' => 'Nettoyant pour objectif', 'price' => 999],
        ['designation' => 'Kit de nettoyage', 'price' => 1499],

        // Automotive
        ['designation' => 'Pneu hiver', 'price' => 9999],
        ['designation' => 'Batterie voiture', 'price' => 9999],
        ['designation' => 'Kit de dépannage', 'price' => 2999],
        ['designation' => 'Câble de démarrage', 'price' => 1999],
        ['designation' => 'GPS voiture', 'price' => 19999],
        ['designation' => 'Caméra de recul', 'price' => 9999],
        ['designation' => 'Kit de lavage auto', 'price' => 2999],
        ['designation' => 'Coussin chauffant', 'price' => 1999],
        ['designation' => 'Organiseur de coffre', 'price' => 1499],
        ['designation' => 'Tapis de sol', 'price' => 1999],

        // Stationery
        ['designation' => 'Carnet moleskine', 'price' => 1999],
        ['designation' => 'Stylo roller', 'price' => 999],
        ['designation' => 'Crayon à papier', 'price' => 99],
        ['designation' => 'Gomme blanche', 'price' => 99],
        ['designation' => 'Taille-crayon', 'price' => 99],
        ['designation' => 'Règle 30cm', 'price' => 99],
        ['designation' => 'Surligneur', 'price' => 199],
        ['designation' => 'Trombones', 'price' => 99],
        ['designation' => 'Agenda 2024', 'price' => 1499],
        ['designation' => 'Calculatrice scientifique', 'price' => 1999],

        // Food
        ['designation' => 'Café en grains 1kg', 'price' => 1999],
        ['designation' => 'Thé vert bio', 'price' => 999],
        ['designation' => 'Miel de lavande', 'price' => 1499],
        ['designation' => 'Huile d\'olive extra vierge', 'price' => 1999],
        ['designation' => 'Pâtes artisanales', 'price' => 999],
        ['designation' => 'Riz basmati 5kg', 'price' => 1499],
        ['designation' => 'Farine bio 1kg', 'price' => 999],
        ['designation' => 'Sucre roux 1kg', 'price' => 999],
        ['designation' => 'Sel de Guérande', 'price' => 999],
        ['designation' => 'Vinaigre balsamique', 'price' => 1499],

        // Health
        ['designation' => 'Tensiomètre électronique', 'price' => 4999],
        ['designation' => 'Thermomètre digital', 'price' => 999],
        ['designation' => 'Balance connectée', 'price' => 2999],
        ['designation' => 'Bracelet connecté', 'price' => 1999],
        ['designation' => 'Masque de protection FFP2', 'price' => 199],
        ['designation' => 'Gel hydroalcoolique', 'price' => 999],
        ['designation' => 'Complément alimentaire', 'price' => 1999],
        ['designation' => 'Huile essentielle', 'price' => 999],
        ['designation' => 'Diffuseur d\'huiles', 'price' => 2999],
        ['designation' => 'Coussin cervical', 'price' => 1999],

        // Fashion
        ['designation' => 'T-shirt coton', 'price' => 1999],
        ['designation' => 'Jean slim', 'price' => 4999],
        ['designation' => 'Veste en cuir', 'price' => 19999],
        ['designation' => 'Chaussures de ville', 'price' => 8999],
        ['designation' => 'Ceinture en cuir', 'price' => 2999],
        ['designation' => 'Sac à main', 'price' => 9999],
        ['designation' => 'Montre bracelet', 'price' => 19999],
        ['designation' => 'Lunettes de soleil', 'price' => 4999],
        ['designation' => 'Chapeau Panama', 'price' => 2999],
        ['designation' => 'Écharpe en laine', 'price' => 1999],

        // Jewelry
        ['designation' => 'Bague en argent', 'price' => 4999],
        ['designation' => 'Collier en or', 'price' => 9999],
        ['designation' => 'Boucles d\'oreilles', 'price' => 2999],
        ['designation' => 'Bracelet en perles', 'price' => 3999],
        ['designation' => 'Pendentif en pierre', 'price' => 1999],
        ['designation' => 'Alliance en platine', 'price' => 19999],
        ['designation' => 'Broche vintage', 'price' => 2999],
        ['designation' => 'Chaîne en or blanc', 'price' => 7999],
        ['designation' => 'Bague de fiançailles', 'price' => 29999],
        ['designation' => 'Parure complète', 'price' => 14999],

        // Books
        ['designation' => 'Roman best-seller', 'price' => 1999],
        ['designation' => 'Livre de cuisine', 'price' => 2999],
        ['designation' => 'Guide de voyage', 'price' => 1999],
        ['designation' => 'BD collector', 'price' => 2999],
        ['designation' => 'Livre pour enfants', 'price' => 999],
        ['designation' => 'Dictionnaire', 'price' => 3999],
        ['designation' => 'Cahier d\'exercices', 'price' => 999],
        ['designation' => 'Livre audio', 'price' => 1999],
        ['designation' => 'Livre de coloriage', 'price' => 999],
        ['designation' => 'Carnet de notes', 'price' => 999],

        // Art
        ['designation' => 'Toile à peindre', 'price' => 1999],
        ['designation' => 'Set de peinture', 'price' => 2999],
        ['designation' => 'Pinceaux professionnels', 'price' => 1999],
        ['designation' => 'Chevalet en bois', 'price' => 3999],
        ['designation' => 'Crayons de couleur', 'price' => 999],
        ['designation' => 'Feutres artistiques', 'price' => 1999],
        ['designation' => 'Papier à dessin', 'price' => 999],
        ['designation' => 'Gomme mie de pain', 'price' => 999],
        ['designation' => 'Fusain', 'price' => 999],
        ['designation' => 'Carnet de croquis', 'price' => 1999],

        // Party
        ['designation' => 'Ballons de fête', 'price' => 999],
        ['designation' => 'Guirlande lumineuse', 'price' => 1999],
        ['designation' => 'Confettis', 'price' => 99],
        ['designation' => 'Chapeau de fête', 'price' => 99],
        ['designation' => 'Sifflet', 'price' => 99],
        ['designation' => 'Serpentin', 'price' => 99],
        ['designation' => 'Bougie d\'anniversaire', 'price' => 99],
        ['designation' => 'Décorations murales', 'price' => 999],
        ['designation' => 'Nappe de fête', 'price' => 999],
        ['designation' => 'Assiettes en carton', 'price' => 999]
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::PRODUCTS as $productData) {
            $product = new Product();
            $product->setDesignation($productData['designation']);
            $product->setPrice($productData['price']);
            
            $manager->persist($product);
        }

        $manager->flush();
    }
} 