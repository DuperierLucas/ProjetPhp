CREATE TABLE article (
	libelle TEXT PRIMARY KEY,
  description TEXT,
  caracteristique TEXT,
	categorie INTEGER,
	prix REAL,
	image TEXT,
  nbStock INT,
	FOREIGN KEY(categorie) REFERENCES categorie(id)
);

CREATE TABLE categorie (
	nom TEXT PRIMARY KEY,
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
  libelleArticle TEXT,
  id INT,
  nbArticle INT,
	etatLivraison TEXT check (etatLivraison = "A FAIRE" ou etatLivraison = "EN COURS" ou etatLivraison = "LIVRÉ")
  PRIMARY KEY(libelleArticle, id),
  FOREIGN KEY(libelleArticle) REFERENCES article(libelle),
  FOREIGN KEY(id) REFERENCES client(id)
)

CREATE TABLE panier (
  libelleArticle TEXT,
  id INT,
  nbArticle INT,
  PRIMARY KEY(libelleArticle, id),
  FOREIGN KEY(libelleArticle) REFERENCES article(libelle),
  FOREIGN KEY(id) REFERENCES client(id)
)
