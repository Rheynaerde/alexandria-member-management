--
-- Just some randomly generated persons/members for testing-purposes.
-- 

INSERT INTO `persons` (`firstName`, `lastName`, `birthdate`, `gender_id`) VALUES
  ('Radouane', 'De Rijck', '1956-04-25', '1'),
  ('Samia', 'Aerts', '1952-05-26', '2'),
  ('Gaby', 'Pelleriaux', '1947-08-27', '1'),
  ('Everdina', 'Renard', '1946-03-22', '2'),
  ('Romilda', 'Van Der Elst', '1970-02-14', '2'),
  ('Rudie', 'Dumortier', '1994-09-10', '1'),
  ('Danika', 'Van Brabant', '1965-07-16', '2'),
  ('Dilan', 'Van Der Mauten', '1970-04-24', '1'),
  ('Fleurine', 'Delbeke', '1991-02-10', '2'),
  ('Boris', 'Vermeire', '1980-03-02', '1'),
  ('Misja', 'Denys', '1971-02-24', '2'),
  ('Dany', 'Vandenbroucke', '1948-08-09', '1'),
  ('Kiana', 'Eylenbosch', '1998-11-02', '2'),
  ('Youssra', 'Sabbe', '2005-10-05', '2'),
  ('Jael', 'Haerinck', '1974-04-17', '2'),
  ('Selma', 'Boonen', '2004-03-09', '2'),
  ('Kees', 'Fremaut', '1972-05-05', '1'),
  ('Dana', 'Van Den Bossche', '1946-05-16', '1'),
  ('Nele', 'Rogge', '2000-11-25', '2'),
  ('Grada', 'Janssens', '2004-05-28', '2'),
  ('Jasperina', 'Desramaults', '1997-10-06', '2'),
  ('Eelko', 'Delmote', '1952-05-17', '1'),
  ('Reda', 'Carlier', '1994-01-12', '1'),
  ('Philip', 'Six', '1997-04-08', '1'),
  ('Hylke', 'Schoonjans', '1987-09-08', '2'),
  ('Arvid', 'Deman', '2001-02-18', '1'),
  ('Hafssa', 'Depraetere', '1960-04-14', '2'),
  ('Evangeline', 'Depoorter', '1954-08-15', '2'),
  ('Jasmina', 'Parmentier', '1942-04-07', '2'),
  ('Beitske', 'Delrue', '2005-06-04', '2'),
  ('Sharon', 'De Coster', '1956-10-10', '1'),
  ('Brigitte', 'Roussel', '1997-11-13', '2'),
  ('Serginio', 'Harnie', '1941-10-14', '1'),
  ('Jazzy', 'Malfait', '2001-02-05', '1'),
  ('Annie', 'Robert', '2001-11-12', '2'),
  ('Rida', 'Van Der Borght', '1983-08-08', '1'),
  ('Krishna', 'Pauwels', '2003-07-23', '1'),
  ('Aditya', 'Jans', '1999-12-20', '1'),
  ('Egemen', 'Vandenabeele', '1959-08-17', '1'),
  ('Lenny', 'Verhelst', '1967-02-04', '1'),
  ('Marlotte', 'Van Isterdael', '2004-02-12', '2'),
  ('Elle', 'De Koster', '1985-08-07', '2'),
  ('Frida', 'Denys', '1944-04-02', '2'),
  ('Frankie', 'Arijs', '1957-07-06', '1'),
  ('Alen', 'Claeys', '2002-03-02', '1'),
  ('Thessa', 'Ghesquiere', '1969-02-20', '2'),
  ('Zacharias', 'Steenput', '1966-02-07', '1'),
  ('Teska', 'Catelle', '2003-11-11', '2'),
  ('Niko', 'Dierckx', '1981-12-01', '1'),
  ('Kingsley', 'Van Brabant', '1980-08-09', '1'),
  ('Mikal', 'Messiaen', '1943-10-19', '1'),
  ('Ylana', 'Vlogaert', '1964-04-13', '2'),
  ('Majida', 'Zelderloo', '1950-05-04', '2'),
  ('Ergin', 'Roesems', '1970-07-24', '1'),
  ('Eugene', 'Jonckheere', '1999-01-04', '1'),
  ('Kader', 'Raes', '1958-07-24', '1'),
  ('Admir', 'Mertens', '1956-01-06', '1'),
  ('Anne-Lotte', 'Cluysen', '1954-11-09', '2'),
  ('Mack', 'Himpe', '1946-12-12', '1'),
  ('Tineke', 'Peleriaux', '1973-05-25', '2'),
  ('Aimane', 'Dewulf', '2003-02-04', '1'),
  ('Loeki', 'Pauwels', '1962-05-03', '2'),
  ('Elske', 'Michiels', '1973-03-03', '2'),
  ('Daniek', 'Van Schepdael', '1975-06-18', '1'),
  ('Taco', 'Vermote', '2001-09-06', '1'),
  ('Renate', 'Vandaele', '2003-01-22', '2'),
  ('Aisling', 'De Valck', '2002-10-14', '2'),
  ('Rosanna', 'Raes', '1981-12-23', '2'),
  ('Lijntje', 'Huyghe', '1950-04-01', '2'),
  ('Emilius', 'Desramaults', '2005-02-28', '1'),
  ('Edzard', 'Hoste', '1945-07-08', '1'),
  ('Jia', 'Tyberghein', '1962-01-25', '1'),
  ('Jessie', 'Van Lierde', '1943-11-20', '2'),
  ('Siegfried', 'Eylenbosch', '1996-10-08', '1'),
  ('Joanna', 'Debode', '1975-01-23', '2'),
  ('Timon', 'Callens', '1989-10-05', '1'),
  ('Saya', 'Crabbe', '1999-06-22', '2'),
  ('Jady', 'Vermeulen', '1957-04-07', '2'),
  ('Emelia', 'Anckaert', '1967-01-02', '2'),
  ('Giny', 'Demets', '1941-05-27', '2');

INSERT INTO `members` (`person_id`, `federation_id`, `hand_id`) VALUES
  ('1', '107342', '1'),
  ('2', '101746', '1'),
  ('3', '104981', '2'),
  ('4', '100357', '1'),
  ('5', '106520', '1'),
  ('6', '105892', '1'),
  ('7', '103936', '2'),
  ('8', '108313', '2'),
  ('9', '101639', '1'),
  ('10', '102661', '2'),
  ('11', '109061', '1'),
  ('12', '102328', '3'),
  ('13', '109597', '2'),
  ('14', '103535', '1'),
  ('15', '101093', '2'),
  ('16', '109573', '1'),
  ('17', '106534', '1'),
  ('18', '106705', '1'),
  ('19', '100975', '1'),
  ('20', '106552', '1'),
  ('21', '109153', '2'),
  ('22', '103391', '1'),
  ('23', '100867', '3'),
  ('24', '102910', '1'),
  ('25', '100814', '1'),
  ('26', '109622', '1'),
  ('27', '101611', '3'),
  ('28', '109620', '1'),
  ('29', '100976', '3'),
  ('30', '105833', '1'),
  ('31', '102723', '1'),
  ('32', '109377', '1'),
  ('33', '109231', '1'),
  ('34', '107185', '1'),
  ('35', '101558', '1'),
  ('36', '102793', '1'),
  ('37', '100597', '2'),
  ('38', '103485', '1'),
  ('39', '106869', '2'),
  ('40', '104389', '2'),
  ('41', '101914', '2'),
  ('42', '103188', '1'),
  ('43', '106393', '1'),
  ('44', '101453', '1'),
  ('45', '104820', '1'),
  ('46', '104336', '2'),
  ('47', '109996', '1'),
  ('48', '106673', '1'),
  ('49', '100716', '1'),
  ('50', '103242', '1'),
  ('51', '108281', '1'),
  ('52', '108545', '1'),
  ('53', '101000', '1'),
  ('54', '101080', '1'),
  ('55', '105231', '3'),
  ('56', '107884', '1'),
  ('57', '107396', '1'),
  ('58', '100691', '1'),
  ('59', '102657', '1'),
  ('60', '100803', '1'),
  ('61', '107721', '2'),
  ('62', '104192', '3'),
  ('63', '109021', '3'),
  ('64', '100771', '1'),
  ('65', '101708', '2'),
  ('66', '108151', '1'),
  ('67', '109502', '1'),
  ('68', '109802', '3'),
  ('69', '103796', '1'),
  ('70', '102883', '1'),
  ('71', '105643', '1'),
  ('72', '101911', '1'),
  ('73', '102196', '1'),
  ('74', '104108', '1'),
  ('75', '102750', '1'),
  ('76', '108964', '1'),
  ('77', '104970', '2'),
  ('78', '102840', '1'),
  ('79', '109517', '1'),
  ('80', '104944', '1');

--
-- Create some users. Only use this for local testing.
--
INSERT INTO `users` (`email`, `firstName`, `lastName`, `username`, `password`, `isAdmin`, `hasMemberManagementRights`) VALUES
  ('test@domain.com', 'Test', 'User', 'test1', SHA1('password'), '1', '1'),
  ('test@domain.com', 'Test', 'User', 'test2', SHA1('password'), '0', '1'),
  ('test@domain.com', 'Test', 'User', 'test3', SHA1('password'), '0', '0');

--
-- Connect some members to the third user
--
INSERT INTO `user_member` (`id`, `user_id`, `member_id`, `type_id`) VALUES
  (NULL, '3', '13', '1'),
  (NULL, '3', '74', '2');

--
-- Create some cities
--
INSERT INTO `cities` (`name`, `zip`, `country_id`) VALUES
  ('Gent', '9000', '1'),
  ('Dendermonde', '9200', '1');

INSERT INTO `addresses` (`street`, `number`, `box`, `city_id`) VALUES
  ('Sesamstraat', '42', NULL, 1),
  ('Straatje zonder einde', '2', 'B5', 2);

INSERT INTO `person_address` (`person_id`, `address_id`, `comment`) VALUES
  ('1', '1', NULL),
  ('2', '2', NULL);

INSERT INTO `mailaddresses` (`mailaddress`) VALUES
  ('wolkje@domein.be'),
  ('wolkje@mijn-werk.be');

INSERT INTO `mailaddresses` (`mailaddress`, `isActive`) VALUES
  ('regenwolkje@domein.be', '0');

INSERT INTO `person_mailaddress` (`person_id`, `mailaddress_id`, `comment`) VALUES
  ('2', '1', NULL),
  ('2', '2', 'werk'),
  ('2', '3', 'lijkt niet meer toe te komen');
