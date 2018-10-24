CREATE TABLE article (
	ref INT PRIMARY KEY,
	libelle TEXT,
  description TEXT,
  caracteristique TEXT,
	categorie INTEGER,
	prix REAL,
	image TEXT,
  nbStock INT,
	FOREIGN KEY(categorie) REFERENCES categorie(id)
);

CREATE TABLE categorie (
	ref INT PRIMARY KEY,
	nom TEXT
);

CREATE TABLE client (
  id INT PRIMARY KEY,
  nom TEXT,
  prenom TEXT,
  adresse TEXT,
  mail TEXT,
  motDePasse TEXT,
)

CREATE TABLE administrateur (
  id INT PRIMARY KEY,
  nom TEXT,
  prenom TEXT,
  mail TEXT,
  motDePasse TEXT,
)
