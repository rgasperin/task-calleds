-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           8.0.30 - MySQL Community Server - GPL
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para plss-challenge_db
DROP DATABASE IF EXISTS `plss-challenge_db`;
CREATE DATABASE IF NOT EXISTS `plss-challenge_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `plss-challenge_db`;

-- Copiando dados para a tabela plss-challenge_db.calleds: ~3 rows (aproximadamente)
INSERT INTO `calleds` (`id`, `id_categories`, `id_situation`, `title`, `description`, `situation_term`, `call_resolved`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 4, 3, 'Teste final', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec mollis bibendum turpis quis rhoncus. Fusce sapien nibh, cursus quis nibh vel, convallis tristique enim. Nullam sit amet mauris ut turpis tempus lacinia eget nec erat. Integer et dolor mattis, tristique purus id, tincidunt felis. Nam nec eros malesuada, venenatis mi ac, mattis leo. Donec eu est purus. Donec vitae libero eget mi egestas laoreet. Etiam porttitor in ex id malesuada. Donec non porta elit. In hac habitasse platea dictumst. Sed mollis feugiat sem non convallis. Integer venenatis justo placerat metus porta consectetur. Proin sed consectetur nibh. Nullam felis ipsum, pellentesque nec ullamcorper at, gravida id magna.\r\n\r\nSed feugiat lacus a nunc venenatis, vel ornare ipsum mattis. Vestibulum quis urna quis diam aliquam pellentesque interdum id urna. Proin vitae fringilla leo, non sodales augue. Aenean vulputate est quis ornare interdum. In urna metus, tempus vitae convallis quis, tincidunt non diam. Nunc dignissim tortor sit amet lectus dignissim vestibulum. Nullam id aliquet risus, ut mollis ipsum. In sed lectus ac risus vulputate facilisis at nec sapien. Cras et ornare lectus.', '2024-05-01', '2024-04-28', '2024-04-28 22:34:55', '2024-04-28 22:35:03', NULL),
	(2, 1, 2, 'Computador - Backup', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec mollis bibendum turpis quis rhoncus. Fusce sapien nibh, cursus quis nibh vel, convallis tristique enim. Nullam sit amet mauris ut turpis tempus lacinia eget nec erat. Integer et dolor mattis, tristique purus id, tincidunt felis. Nam nec eros malesuada, venenatis mi ac, mattis leo. Donec eu est purus. Donec vitae libero eget mi egestas laoreet. Etiam porttitor in ex id malesuada. Donec non porta elit. In hac habitasse platea dictumst. Sed mollis feugiat sem non convallis. Integer venenatis justo placerat metus porta consectetur. Proin sed consectetur nibh. Nullam felis ipsum, pellentesque nec ullamcorper at, gravida id magna.\r\n\r\nSed feugiat lacus a nunc venenatis, vel ornare ipsum mattis. Vestibulum quis urna quis diam aliquam pellentesque interdum id urna. Proin vitae fringilla leo, non sodales augue. Aenean vulputate est quis ornare interdum. In urna metus, tempus vitae convallis quis, tincidunt non diam. Nunc dignissim tortor sit amet lectus dignissim vestibulum. Nullam id aliquet risus, ut mollis ipsum. In sed lectus ac risus vulputate facilisis at nec sapien. Cras et ornare lectus.', '2024-05-01', NULL, '2024-04-28 22:35:21', '2024-04-28 22:35:25', NULL),
	(3, 2, 1, 'Impressora - Instalar', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec mollis bibendum turpis quis rhoncus. Fusce sapien nibh, cursus quis nibh vel, convallis tristique enim. Nullam sit amet mauris ut turpis tempus lacinia eget nec erat. Integer et dolor mattis, tristique purus id, tincidunt felis. Nam nec eros malesuada, venenatis mi ac, mattis leo. Donec eu est purus. Donec vitae libero eget mi egestas laoreet. Etiam porttitor in ex id malesuada. Donec non porta elit. In hac habitasse platea dictumst. Sed mollis feugiat sem non convallis. Integer venenatis justo placerat metus porta consectetur. Proin sed consectetur nibh. Nullam felis ipsum, pellentesque nec ullamcorper at, gravida id magna.\r\n\r\nSed feugiat lacus a nunc venenatis, vel ornare ipsum mattis. Vestibulum quis urna quis diam aliquam pellentesque interdum id urna. Proin vitae fringilla leo, non sodales augue. Aenean vulputate est quis ornare interdum. In urna metus, tempus vitae convallis quis, tincidunt non diam. Nunc dignissim tortor sit amet lectus dignissim vestibulum. Nullam id aliquet risus, ut mollis ipsum. In sed lectus ac risus vulputate facilisis at nec sapien. Cras et ornare lectus.', '2024-05-01', NULL, '2024-04-28 22:35:36', '2024-04-28 22:35:36', NULL);

-- Copiando dados para a tabela plss-challenge_db.categories: ~3 rows (aproximadamente)
INSERT INTO `categories` (`id`, `name`) VALUES
	(1, 'Backup'),
	(2, 'Impressora'),
	(3, 'Computador'),
	(4, 'Formatação');

-- Copiando dados para a tabela plss-challenge_db.failed_jobs: ~0 rows (aproximadamente)

-- Copiando dados para a tabela plss-challenge_db.migrations: ~0 rows (aproximadamente)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- Copiando dados para a tabela plss-challenge_db.password_reset_tokens: ~0 rows (aproximadamente)

-- Copiando dados para a tabela plss-challenge_db.personal_access_tokens: ~0 rows (aproximadamente)

-- Copiando dados para a tabela plss-challenge_db.situation: ~3 rows (aproximadamente)
INSERT INTO `situation` (`id`, `name`) VALUES
	(1, 'Novo'),
	(2, 'Pendente'),
	(3, 'Resolvido');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
