CREATE TABLE Kayttaja ( 
    id SERIAL PRIMARY KEY,
    name varchar(50) NOT NULL,
    password varchar(50) NOT NULL,
    admin boolean default false
);

CREATE TABLE Rotu (
  id SERIAL PRIMARY KEY,
  name varchar(50) NOT NULL,
  registered boolean DEFAULT FALSE,
  description varchar(400),
  published DATE,
  country varchar(50) NOT NULL,
  added DATE
);

CREATE TABLE Roturyhma (
    id SERIAL PRIMARY KEY,
    kayttaja_id INTEGER REFERENCES Kayttaja(id) ON DELETE CASCADE,
    rotu_id INTEGER REFERENCES Rotu(id) ON DELETE CASCADE, -- Viiteavain Rotu-tauluun
    name varchar(50) NOT NULL,
    count int DEFAULT NULL,
    class varchar(50) NOT NULL
);

CREATE TABLE Liitostaulu (
    id SERIAL PRIMARY KEY,
    
);
-- Lisää CREATE TABLE lauseet tähän tiedostoon
