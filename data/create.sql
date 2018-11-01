CREATE TABLE article (
	ref INT PRIMARY KEY,
	libelle TEXT,
  description TEXT,
  pourcentageAlcool REAL,
	annee INT,
	categorie INTEGER,
	prix REAL,
	image TEXT,
	FOREIGN KEY(categorie) REFERENCES categorie(ref)
);

CREATE TABLE categorie (
	ref INT PRIMARY KEY,
	nom TEXT,
	image TEXT
);

CREATE TABLE client (
  id INT PRIMARY KEY,
  nom TEXT,
  prenom TEXT,
  adresse TEXT,
	telephone INT,
  mail TEXT,
  motDePasse TEXT
);

CREATE TABLE gestionnaire (
  id CHAR PRIMARY KEY,
  nom TEXT,
  prenom TEXT,
  mail TEXT,
  motDePasse TEXT
);
