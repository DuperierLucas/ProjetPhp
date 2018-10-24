CREATE TABLE article (
	ref INT PRIMARY KEY,
	libelle TEXT,
  description TEXT,
  caracteristique TEXT,
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
