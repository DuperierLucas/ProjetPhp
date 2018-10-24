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

CREATE TABLE achat (
  ref INT,
  id INT,
  nbArticle INT,
	etatLivraison TEXT check (etatLivraison = "A FAIRE" ou etatLivraison = "EN COURS" ou etatLivraison = "LIVRÉ"),
  PRIMARY KEY(ref, id),
  FOREIGN KEY(ref) REFERENCES article(ref),
  FOREIGN KEY(id) REFERENCES client(id)
)

CREATE TABLE panier (
  ref INT,
  id INT,
  nbArticle INT,
  PRIMARY KEY(ref, id),
  FOREIGN KEY(ref) REFERENCES article(ref),
  FOREIGN KEY(id) REFERENCES client(id)
)
