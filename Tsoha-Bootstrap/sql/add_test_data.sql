-- Kayttaja-taulun testidata
INSERT INTO Kayttaja (name, password, admin) VALUES ('bokseri', 'canisfamiliaris', true); -- Koska id-sarakkeen tietotyyppi on SERIAL, se asetetaan automaattisesti
-- Rotu-taulun testidata
INSERT INTO Rotu (name, registered, description, published, country, added) VALUES ('Alaskanmalamuutti', true, 'Raskaiden kuormien vetokoira', '2011-11-11', 'USA', NOW());
-- Roturyhma-taulun testidata
INSERT INTO Roturyhma (kayttaja_id, rotu_id, name, count, class) VALUES (1, 1, 'Terrierit', '5', 'FCI 3');
-- Lisää INSERT INTO lauseet tähän tiedosto
