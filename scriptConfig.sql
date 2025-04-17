-- Insertion des tailles
INSERT INTO taille (specification) VALUES
('T1'),
('T2'),
('T3'),
('T4'),
('T5'),
('T6'),
('T7'),
('T8'),
('T9');

-- Insertion des bacs
INSERT INTO bac (tare, typeBac) VALUES
(2.5, 'B'),
(4.0, 'F');

-- Insertion des qualités
INSERT INTO qualite (specificationQualite, libeleQualite) VALUES
('E', 'Extra'),
('A', 'Glacé'),
('B', 'Déclassé');

-- Insertion des espèces
INSERT INTO espece (nomEspece, nomScientifiqueEspece, nomCommunEspece) VALUES
('Bar', 'Dicentrarchus labrax', 'Bar commun'),
('Dorade grise', 'Spondyliosoma cantharus', 'Griset'),
('Lieu jaune', 'Pollachius pollachius', 'Lieu jaune'),
('Maquereau', 'Scomber scombrus', 'Maquereau'),
('Sardine', 'Sardina pilchardus', 'Sardine'),
('Thon rouge', 'Thunnus thynnus', 'Thon rouge de l’Atlantique'),
('Merlu', 'Merluccius merluccius', 'Colin'),
('Cabillaud', 'Gadus morhua', 'Morue'),
('Sole', 'Solea solea', 'Sole commune'),
('Rouget barbet', 'Mullus surmuletus', 'Rouget de roche'),
('Haddock', 'Melanogrammus aeglefinus', 'Églefin'),
('Homard', 'Homarus gammarus', 'Homard européen'),
('Tourteau', 'Cancer pagurus', 'Crabe dormeur'),
('Langoustine', 'Nephrops norvegicus', 'Langoustine'),
('Coquille Saint-Jacques', 'Pecten maximus', 'Saint-Jacques'),
('Moules', 'Mytilus edulis', 'Moules de bouchot'),
('Huitres', 'Crassostrea gigas', 'Huitre creuse'),
('Congre', 'Conger conger', 'Congre'),
('Roussette', 'Scyliorhinus canicula', 'Petite roussette'),
('Chapon', 'Scorpaena scrofa', 'Chapon'),
('Saint-Pierre', 'Zeus faber', 'Saint-Pierre'),
('Grondin rouge', 'Chelidonichthys cuculus', 'Rouget grondin'),
('Raie bouclée', 'Raja clavata', 'Raie'),
('Raie douce', 'Raja montagui', 'Raie douce'),
('Seiche', 'Sepia officinalis', 'Seiche commune'),
('Ormeau', 'Haliotis tuberculata', 'Oreille de mer'),
('Praire', 'Venus verrucosa', 'Praire'),
('Palourde', 'Ruditapes decussatus', 'Palourde'),
('Bigorneau', 'Littorina littorea', 'Bigorneau'),
('Coque', 'Cerastoderma edule', 'Coque'),
('Amande de mer', 'Glycymeris glycymeris', 'Amande'),
('Araignée de mer', 'Maja squinado', 'Araignée de mer'),
('Bulot', 'Buccinum undatum', 'Bulot'),
('Crevette rose', 'Palaemon serratus', 'Crevette bouquet'),
('Crevette grise', 'Crangon crangon', 'Crevette grise'),
('Calmar', 'Loligo vulgaris', 'Encornet'),
('Tacaud', 'Trisopterus luscus', 'Tacaud'),
('Mulet', 'Mugil cephalus', 'Mulet doré'),
('Vive', 'Trachinus draco', 'Vive commune'),
('Pageot', 'Pagellus erythrinus', 'Pageot commun'),
('Serran', 'Serranus cabrilla', 'Serran cabrilla'),
('Sabre noir', 'Aphanopus carbo', 'Poisson sabre'),
('Lieu noir', 'Pollachius virens', 'Lieu noir'),
('Chinchard', 'Trachurus trachurus', 'Chinchard'),
('Dorade royale', 'Sparus aurata', 'Dorade royale'),
('Turbot', 'Scophthalmus maximus', 'Turbot'),
('Carrelet', 'Pleuronectes platessa', 'Plie'),
('Espadon', 'Xiphias gladius', 'Espadon'),
('Anchois', 'Engraulis encrasicolus', 'Anchois'),
('Bonite', 'Sarda sarda', 'Bonite à dos rayé');

-- lot(idPresentation,idAcheteur, idPanier ,'prixEnchereMax','dateEnchere','heureDebutEnchere',) null possible