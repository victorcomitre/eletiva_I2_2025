-- MySQL dump 10.13  Distrib 8.0.43, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: projeto_artcontrol
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Dumping data for table `artista`
--

LOCK TABLES `artista` WRITE;
/*!40000 ALTER TABLE `artista` DISABLE KEYS */;
INSERT INTO `artista` VALUES (1,'Leonardo da Vinci','Italiano','O arquétipo do \"Homem do Renascimento\". Polímata (pintor, cientista, inventor), revolucionou a arte com o sfumato (transição suave de sombras) e o estudo profundo da natureza e anatomia humana.'),(2,'Eugène Delacroix','Francês','O maior representante do Romantismo francês. Conhecido pelo uso expressivo da cor, pinceladas vibrantes e temas dramáticos inspirados na literatura e em eventos históricos contemporâneos.'),(3,'Jacques-Louis David','Francês','Líder do Neoclassicismo. Foi o pintor oficial da Revolução Francesa e, posteriormente, de Napoleão Bonaparte. Sua arte é marcada pela rigidez, ordem, clareza e temas heróicos.'),(4,'Théodore Géricault','Francês','Precursor do Romantismo. Teve uma vida curta, mas impactante. Rompeu com o idealismo clássico para focar no sofrimento humano real, na emoção crua e na mortalidade.'),(6,'Paolo Veronese','Italiano','Mestre da Escola Veneziana do Renascimento. Famoso por suas enormes telas narrativas cheias de figuras, arquitetura grandiosa e cores luminosas e festivas.'),(7,'Johannes Vermeer','Holandês','Um dos grandes nomes da Era de Ouro Holandesa. Mestre absoluto da luz e da intimidade, focado em cenas domésticas silenciosas com um detalhismo quase fotográfico.');
/*!40000 ALTER TABLE `artista` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-11-27 17:10:57
