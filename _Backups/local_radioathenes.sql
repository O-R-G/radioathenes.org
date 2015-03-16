-- MySQL dump 10.13  Distrib 5.6.16, for osx10.9 (x86_64)
--
-- Host: localhost    Database: local_radioathenes
-- ------------------------------------------------------
-- Server version	5.6.16

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `media`
--

DROP TABLE IF EXISTS `media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `media` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `active` int(1) unsigned NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `object` int(10) unsigned DEFAULT NULL,
  `weight` float DEFAULT NULL,
  `rank` int(10) unsigned DEFAULT NULL,
  `type` varchar(10) NOT NULL DEFAULT 'jpg',
  `caption` blob,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `media`
--

LOCK TABLES `media` WRITE;
/*!40000 ALTER TABLE `media` DISABLE KEYS */;
INSERT INTO `media` VALUES (1,0,'2015-03-12 22:18:52','2015-03-13 01:03:54',3,NULL,1,'mp4',''),(2,1,'2015-03-13 00:55:13','2015-03-13 22:09:31',5,NULL,1,'mp4',''),(3,1,'2015-03-13 01:03:54','2015-03-13 01:04:54',3,NULL,1,'mp4',''),(4,1,'2015-03-13 01:05:03','2015-03-13 22:09:15',4,NULL,1,'mp4',''),(5,1,'2015-03-13 01:05:12','2015-03-13 22:09:49',6,NULL,1,'mp4','');
/*!40000 ALTER TABLE `media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `objects`
--

DROP TABLE IF EXISTS `objects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `objects` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `active` int(1) unsigned NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `rank` int(10) unsigned DEFAULT NULL,
  `name1` tinytext,
  `name2` tinytext,
  `address1` text,
  `address2` text,
  `city` tinytext,
  `state` tinytext,
  `zip` tinytext,
  `country` tinytext,
  `phone` tinytext,
  `fax` tinytext,
  `url` tinytext,
  `email` tinytext,
  `begin` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `head` tinytext,
  `deck` blob,
  `body` blob,
  `notes` blob,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `objects`
--

LOCK TABLES `objects` WRITE;
/*!40000 ALTER TABLE `objects` DISABLE KEYS */;
INSERT INTO `objects` VALUES (1,1,'2015-03-07 04:34:28','2015-03-07 04:34:28',10,'Events',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,'','',NULL),(2,1,'2015-03-07 04:34:37','2015-03-16 00:25:54',20,'Impressum',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,'','Radio Athènes institute for the advancement \r\nof contemporary visual culture is a non profit organization \r\nregistered in Athens with vat id # EL997216854\r\n\r\nRadio Athènes was conceived and founded by Helena Papadopoulos in December 2014\r\nwith founding member Andreas Melas\r\n\r\nThe centre of operations that doubles as a bookstore is on 15 Petraki Street in Athens, \r\nGreece, zip code 10563, near Mitropoleos Square\r\n\r\nThe nearest metro stops are Syntagma and Monastiraki\r\n\r\nYou can reach us at wave@radioathenes.org \r\nIf you want to see what we are up to you can follow us on <a href=\'\' target=\'new\'>Facebook</a>, <a href=\'\' target=\'new\'>Instagram</a>, & <a href=\'\' target=\'new\'>Twitter</a>.\r\n\r\nTo subscribe to our mailing list please enter your details <a href=\'\' target=\'new\'>here</a>.\r\n\r\nRadio Athènes is grateful to the following organizations and individuals for their generous support\r\nin 2015\r\n\r\nPatrons\r\nOutset. The Contemporary Art Fund (Greece)\r\nThe Swiss Arts Council Pro Helvetia\r\nThe Benaki Museum\r\nAegean Airlines\r\nIon Constas\r\nStephen Alexander John Kelly Kyriakopoulos\r\nAnastasia Sgoumbopoulou\r\n\r\nFriends\r\nOlivier Berggruen\r\nAnnie-Claire Geisinger\r\nYerassimos Yannopoulos\r\nTheodore Katsas\r\nRallou Panagiotou\r\nDespina Papadopoulos\r\nStacy Stark\r\nElina Kountouri',NULL),(3,1,'2015-03-07 04:35:11','2015-03-15 23:32:18',10,'Kostas Sahpazis',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,'2015-03-28 12:00:00','2015-05-10 00:00:00',NULL,NULL,'Old-Eyed Première\r\nApollonos 14','Kostas Sahpazis continues his material reveries with an exhibition of new sculptural works that find their way to the rooms of a former office space in a distinctive neo-classical building on 14 Apollonos Street. In <a href=\'http://artnews.org/melaspapadopoulos/?exi=33959\' target=\'new\'>The Gift of Screws</a>, his first one-person show in Athens in 2012, Emily Dickinson’s poem Essential Oils was his departure point. In What a Tailor Can Do presented at <a href=\'http://www.nzz.ch/aktuell/feuilleton/art-basel/die-neuen-1.18095384\' target=\'new\'>Art Basel Statements</a> in June 2013, he worked after Goya’s homonymous “Lo, que puede un sastre!”, the 52nd plate of Los Caprichos. The artist reflected on the maker and the model, the creation of a form made up of totally unstable, changing parts and how they are in the end, held together in a fantasy.\r\n\r\nIn Apollonos Street he follows the conditions of the space placing objects where there have been abrasions, as with accidents that take place with greater ease at the same spot where a previous one has occurred. In Old-Eyed Première, Kostas Sahpazis assembles a body of work around the ideas of repetition, movement and the instantané, taking his cue from Gwendolyn Brooks’s 1987 poem <a href=\'http://www.poetryfoundation.org/poem/172094\' target=\'new\'>Boy Breaking Glass</a>.\r\n\r\nKostas Sahpazis was the recipient of the <a href=\'http://deste.gr/deste-prize-2013-winner/\' target=\'new\'>Deste Prize</a> in 2013. He lives and works in Athens. \r\n\r\nJoin us for the opening of Old-Eyed Première on Saturday, March 28th, at 12 noon. Visiting hours are 11 am to 5 pm on Saturdays and Sundays, and by appointment.\r\n\r\nRadio Athènes wishes to thank Anastasia Sgoumbopoulou for her hospitality.',NULL),(4,1,'2015-03-07 04:45:23','2015-03-15 23:33:29',20,'Peter Fischli & David Weiss',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,'2015-04-06 20:00:00','2015-05-10 20:00:00',NULL,NULL,'The Benaki Museum','Radio Athènes presents an installation of 3 films by the Swiss artists Peter Fischli and David Weiss at the Pireos annex of <a href=\'http://www.benaki.gr/index.asp?id=40202&lang=en\' target=\'new\'>The Benaki Museum</a>.\r\n\r\n<a href=\'https://www.youtube.com/watch?v=GXrRC3pfLnE\' target=\'new\'>Der Lauf der Dinge</a> (The Way Things Go 1986-7) one of the most celebrated films of our time since its first appearance in Documenta 8 in Kassel, follows the precarious life of objects in a sequence of compelling, dramatic and hilarious events orchestrated by the artists in their studio.\r\n\r\nIn Der geringste Widerstand (The Point of Least Resistance 1980-1) and Der Rechte Weg (The Right Way 1982-3) Fischli and Weiss star as the Rat and the Bear wandering in the Swiss Alps and in the freeways and art galleries of Los Angeles. Reflecting on issues small and large the two artists in costume talk about life, nature, art, money, truth, the good and the beautiful.\r\n\r\nThe work of Fischli and Weiss has been exhibited at museums and biennials around the world. The artists represented Switzerland at the Venice Biennale in 1995 and 2003. They also took part in Documenta 8 in 1987 and 10 in 1997. In 2006 <a href=\'http://www.tate.org.uk/whats-on/tate-modern/exhibition/fischli-weiss\' target=\'new\'>Tate Modern</a> presented a comprehensive career retrospective, Flowers and Questions, which traveled to the Kunsthaus Zürich and the Deichtorhallen Hamburg. More recently, they have had exhibitions at the Art institute of Chicago in 2011 and the Serpentine Gallery, London in 2013.\r\n\r\nThe exhibition was made possible through the generous support of The Swiss Arts Council Pro Helvetia, the Benaki Museum, and OUTSET Contemporary Art Fund (Greece).  Radio Athènes would like to thank Polyna Kosmadaki, Curator, Department of Paintings, Drawings, Prints at the Benaki Museum, and Eva Presenhuber and Markus Rischgasser of Galerie Eva Presenhuber, Zurich. \r\n\r\nLooking forward to seeing you at the opening of Small Questions Big Questions 3 Films by Peter Fischli & David Weiss on Monday, April 6th at 8 pm. Visiting hours are Thursdays, Sundays 10 am to 6 pm and Fridays, Saturdays 10 am to 10 pm.',''),(5,1,'2015-03-07 04:46:37','2015-03-15 23:36:06',30,'Kirsty Bell on The Artist’s House',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,'2015-04-23 19:00:00','2015-04-23 21:00:00',NULL,NULL,'Apollonos 14','Join us on Thursday April 23rd, at 7pm for a slide lecture by writer Kirsty Bell.\r\n\r\nHer interviews with Jorge Pardo, Mirosław Bałka, Danh Vo, Gregor Schneider, Frances Stark, Marc Camille Chaimowicz, Dominique Gonzalez-Foerster, Paweł Althamer, Mark Leckey, Monika Sosnowska, Gabriel Orozco, Rirkrit Tiravanija, and Andrea Zittel—are contextualized by key artists of the twentieth century such as Kurt Schwitters, Alice Neel, Edward Krasiński, Carlo Mollino, and Louise Bourgeois.\r\n\r\nHer book, The Artist’s House: From Workplace to Artwork, looks at developments in contemporary art, domestic architecture and interior space. Gaston Bachelard says in his 1958 book “La poétique de l’espace:” “The house shelters day-dreaming, the house protects the dreamer, the house allows one to dream in peace”.\r\n\r\nKirsty Bell lives in Berlin. A contributing editor to frieze and frieze d/e, she also writes regularly for Art in America, art agenda, Mousse Magazine and Camera Austria. She has written many catalogue essays for institutions including the Hamburger Bahnhof in Berlin, the Museum für Gegenwartskunst in Basel, Tate Liverpool and the Ludwig Museum in Cologne.\r\n\r\nThe slide lecture will take place at Apollonos 14, first floor, at 7pm.\r\n\r\nThank you Aegean Airlines for flying Kirsty Bell to Athens and thank you Anastasia Sgoumbopoulou for hosting Radio Athènes.',''),(6,1,'2015-03-07 04:48:17','2015-03-15 23:36:52',40,'Let’s talk about Order and Cleanliness',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,'2015-04-30 17:00:00','2015-04-30 23:00:00',NULL,NULL,'Radio Athènes bookstore','Let’s talk about Order and Cleanliness, life, career, boredom, confusion, stupidity, animals, fashion, organized crime, brain driven persons, tyrants, heros……Join us on Thursday April 30th   at the Radio Athènes bookstore to peruse Issue number 2 of The Bulletins of the Serving Library, the composite printed/electronic publication edited by Stuart Bailey, Angie Keefer and David Reinfurt. This issue includes a reproduction of <a href=\'http://www.servinglibrary.org/read.html?id=10023\' target=\'new\'>Ordnung und Reinlichkeit</a>, a self-made booklet of diagrams that artists Peter Fischli and David Weiss distributed after a late night screening of their film The Least Resistance, at a cinema theater in Zurich in 1981. \r\n\r\nJoin us from 5pm until late.\r\n\r\nThe Radio Athènes bookstore is on Petraki 15. It’s a light traffic cobbled street parallel to Mitropoleos Street. The nearest metro stops are Syntagma and Monastiraki.','');
/*!40000 ALTER TABLE `objects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wires`
--

DROP TABLE IF EXISTS `wires`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wires` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `active` int(1) unsigned NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `fromid` int(10) unsigned DEFAULT NULL,
  `toid` int(10) unsigned DEFAULT NULL,
  `weight` float NOT NULL DEFAULT '1',
  `notes` blob,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wires`
--

LOCK TABLES `wires` WRITE;
/*!40000 ALTER TABLE `wires` DISABLE KEYS */;
INSERT INTO `wires` VALUES (1,1,'2015-03-07 04:34:28','2015-03-07 04:34:28',0,1,1,NULL),(2,1,'2015-03-07 04:34:37','2015-03-07 04:34:37',0,2,1,NULL),(3,1,'2015-03-07 04:35:11','2015-03-07 04:35:11',1,3,1,NULL),(4,1,'2015-03-07 04:45:23','2015-03-07 04:45:23',1,4,1,NULL),(5,1,'2015-03-07 04:46:37','2015-03-07 04:46:37',1,5,1,NULL),(6,1,'2015-03-07 04:48:17','2015-03-07 04:48:17',1,6,1,NULL);
/*!40000 ALTER TABLE `wires` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-03-16 17:55:43
