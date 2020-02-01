-- --------------------------------------------------------
-- Host:                         localhost
-- Versión del servidor:         5.7.24 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             9.5.0.5332
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando estructura para tabla sait.agents
CREATE TABLE IF NOT EXISTS `agents` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `status_id` bigint(20) unsigned NOT NULL DEFAULT '1',
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dni` bigint(20) unsigned NOT NULL,
  `cuil` bigint(20) unsigned NOT NULL,
  `born_date` date NOT NULL,
  `email` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cellphone` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_deleted` enum('0','1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `agents_status_id_foreign` (`status_id`),
  CONSTRAINT `agents_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sait.agents: ~100 rows (aproximadamente)
/*!40000 ALTER TABLE `agents` DISABLE KEYS */;
REPLACE INTO `agents` (`id`, `status_id`, `name`, `surname`, `dni`, `cuil`, `born_date`, `email`, `phone`, `cellphone`, `address`, `city`, `state`, `country`, `is_deleted`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Yeray Ávalos Tercero', 'Aragón', 51435926, 20127035201, '1986-10-28', 'kdelvalle@naranjo.org', '901 705798', '+34 904 35 8673', 'Plaza Ruelas, 80, 9º 6º, 51441, Narváez de las Torres', 'San Amaya', 'El Cortés del Pozo', 'Nigeria', '0', '2019-11-10 20:23:36', '2019-11-10 20:23:36'),
	(2, 1, 'Sr. Yago Soria', 'Polo', 93457025, 20343913417, '1980-10-15', 'prado.hugo@yahoo.com', '+34 671 612157', '+34 931-44-2285', 'Camino Granado, 8, 35º E, 39442, Vall Arredondo', 'San Vallejo del Bages', 'A Lorente', 'Marruecos', '0', '2019-11-10 20:23:36', '2019-11-10 20:23:36'),
	(3, 1, 'Ing. Cristina Lorente', 'Pichardo', 36720038, 20710774029, '1971-02-28', 'lucia76@cuenca.org', '989-055761', '+34 985-65-5525', 'Ronda Reyna, 8, 33º B, 90641, L\' Aguirre de Ulla', 'A Alonso', 'Serra Medio', 'Tanzania', '0', '2019-11-10 20:23:36', '2019-11-10 20:23:36'),
	(4, 1, 'Leo de Jesús', 'Luque', 58561290, 22509193651, '1993-12-30', 'icastro@latinmail.com', '615 34 1001', '671173645', 'Carrer Oriol, 89, Bajo 9º, 89758, Las Luis de San Pedro', 'O Garibay', 'As Cisneros', 'Libia', '0', '2019-11-10 20:23:36', '2019-11-10 20:23:36'),
	(5, 1, 'Alberto Tejeda', 'Véliz', 24819115, 22695445849, '1968-04-17', 'valdivia.adriana@candelaria.org', '+34 913 885970', '+34 962-439082', 'Paseo Hugo, 909, Bajo 3º, 22016, O Saldivar', 'O Mayorga del Puerto', 'Los Rangel', 'Laos', '0', '2019-11-10 20:23:36', '2019-11-10 20:23:36'),
	(6, 1, 'Sr. Juan José Meléndez', 'Sotelo', 68180552, 22768689067, '1987-03-23', 'oriol.delapaz@live.com', '+34 996-679490', '984-023443', 'Avinguda Sepúlveda, 48, 62º C, 33803, As Rincón del Mirador', 'L\' Soliz de Lemos', 'A Collazo del Pozo', 'Madagascar', '0', '2019-11-10 20:23:36', '2019-11-10 20:23:36'),
	(7, 1, 'Lic. Manuel Sanabria', 'Urbina', 82635191, 22892664269, '1996-01-11', 'izquierdo.marco@naranjo.com', '615 89 0845', '+34 924 92 5420', 'Avinguda Agosto, 684, 5º 9º, 69929, Díaz Medio', 'Valles de Lemos', 'As Vargas', 'Barbados', '0', '2019-11-10 20:23:36', '2019-11-10 20:23:36'),
	(8, 1, 'Sra. Noelia Delacrúz', 'Niño', 65665735, 20469385257, '1982-05-10', 'pmontalvo@live.com', '+34 648-43-7000', '675 425525', 'Rúa Natalia, 183, 6º A, 98282, Las Collazo', 'As Jasso', 'Villa Soriano', 'Brunéi Darusalam', '0', '2019-11-10 20:23:36', '2019-11-10 20:23:36'),
	(9, 1, 'Rodrigo Román', 'Pichardo', 69074109, 21716156137, '1982-04-04', 'jorge01@yahoo.com', '+34 975775688', '+34 919 074988', 'Avenida Teresa, 1, 95º 0º, 73257, El Treviño', 'O Vega', 'Os Badillo', 'Guinea-Bisáu', '0', '2019-11-10 20:23:36', '2019-11-10 20:23:36'),
	(10, 1, 'Nahia Gamboa', 'Rincón', 11449343, 22141471687, '1972-03-13', 'mar27@sanabria.com', '+34 653745718', '698311981', 'Camino Arce, 0, 3º C, 80791, Herrero del Penedès', 'Os Mercado', 'Ayala de Arriba', 'Ruanda', '0', '2019-11-10 20:23:36', '2019-11-10 20:23:36'),
	(11, 1, 'Raúl Muro Tercero', 'Navarro', 16207845, 20854995599, '1984-08-16', 'zalonzo@palomo.com', '+34 665117603', '693-44-6500', 'Avinguda Espinoza, 46, 83º A, 59720, Orozco del Vallès', 'A Crespo', 'L\' Domingo', 'Senegal', '0', '2019-11-10 20:23:36', '2019-11-10 20:23:36'),
	(12, 1, 'Gabriel Saldaña', 'Moya', 69218791, 20691859421, '1975-02-09', 'lidia27@terra.com', '+34 631 975248', '+34 671 17 5713', 'Praza Laia, 399, 96º B, 30269, Villa Reyna de la Sierra', 'Villa Araña', 'Vall Duarte', 'Sudán', '0', '2019-11-10 20:23:36', '2019-11-10 20:23:36'),
	(13, 1, 'Marta Rael', 'Varela', 90128029, 22357378549, '1977-08-19', 'gonzalo.villareal@live.com', '+34 687 748239', '+34 654 34 2518', 'Passeig Dario, 44, 76º C, 50192, O Vergara del Bages', 'Piñeiro del Barco', 'El Candelaria', 'Santo Tomé y Príncipe', '0', '2019-11-10 20:23:36', '2019-11-10 20:23:36'),
	(14, 1, 'Dr. Jaime Gurule', 'Cintrón', 67108905, 20997898117, '1965-02-11', 'sotelo.mar@latinmail.com', '619-870213', '606 346440', 'Paseo Miriam, 15, 9º E, 83498, L\' Sauceda', 'La Hernández', 'Guevara del Penedès', 'Kenia', '0', '2019-11-10 20:23:36', '2019-11-10 20:23:36'),
	(15, 1, 'José Aparicio', 'Muñiz', 29035787, 21620043577, '1991-07-23', 'xposada@bravo.org', '+34 913 86 4904', '697 860835', 'Camino Andreu, 9, Ático 2º, 73147, Mata del Bages', 'L\' Jaime', 'L\' Meraz', 'Granada', '0', '2019-11-10 20:23:36', '2019-11-10 20:23:36'),
	(16, 1, 'Emma Narváez Tercero', 'Sarabia', 75415167, 20750807307, '1971-10-16', 'mar.llorente@otero.com', '+34 601 976812', '+34 950-114375', 'Camino Vera, 6, 67º A, 44961, Mora del Vallès', 'Ponce Baja', 'Los Guardado', 'Afganistán', '0', '2019-11-10 20:23:36', '2019-11-10 20:23:36'),
	(17, 1, 'Naia Bañuelos', 'Mondragón', 45271858, 22825107769, '1965-06-20', 'calvo.luis@chavarria.es', '918-112834', '+34 967 79 4672', 'Carrer Natalia, 91, 7º A, 16416, La Conde Alta', 'Casado del Mirador', 'Las Llorente', 'Bután', '0', '2019-11-10 20:23:36', '2019-11-10 20:23:36'),
	(18, 1, 'Dn. Eric Báez', 'Griego', 13806309, 20168295741, '1970-12-01', 'bueno.roberto@hispavista.com', '+34 985 010834', '933-40-0679', 'Calle Vera, 658, 0º B, 09418, San Acuña de Arriba', 'As Vigil', 'Rico del Penedès', 'Polonia', '0', '2019-11-10 20:23:36', '2019-11-10 20:23:36'),
	(19, 1, 'Óscar Ojeda', 'Sierra', 91120658, 22438896207, '1973-05-24', 'hernando.pau@live.com', '+34 602426863', '606 653506', 'Rúa Corona, 329, 30º F, 29038, Mesa Baja', 'Los Villalobos de Lemos', 'L\' Lerma', 'Chad', '0', '2019-11-10 20:23:36', '2019-11-10 20:23:36'),
	(20, 1, 'Alonso Rendón', 'Gámez', 73933153, 20720782491, '1982-02-04', 'angela.vigil@castaneda.com', '+34 931-213902', '+34 975 072789', 'Ronda Diego, 346, 97º D, 69556, O Delarosa de la Sierra', 'A Cisneros', 'Quiñónez de Arriba', 'Croacia', '0', '2019-11-10 20:23:36', '2019-11-10 20:23:36'),
	(21, 1, 'Marco Aguilar', 'Mercado', 48565927, 21143575157, '2000-09-17', 'franciscojavier16@gmail.com', '+34 641-66-4801', '+34 676763320', 'Travessera Escudero, 6, 5º C, 06459, San Valencia', 'San Pelayo de Lemos', 'A Ramos', 'Tuvalu', '0', '2019-11-10 20:23:36', '2019-11-10 20:23:36'),
	(22, 1, 'Mar Verduzco', 'Piña', 49064486, 22721485031, '1997-10-22', 'fonseca.aroa@arevalo.com', '661 038267', '617 25 8439', 'Calle Nuria, 3, Bajos, 14923, La Hernándes del Bages', 'Las Crespo de Ulla', 'Archuleta Baja', 'Suazilandia', '0', '2019-11-10 20:23:36', '2019-11-10 20:23:36'),
	(23, 1, 'Srita. Irene Almanza Segundo', 'Melgar', 94565874, 21366929311, '1989-08-20', 'silvia51@latinmail.com', '+34 955-797752', '+34 900-731647', 'Plaça Morales, 75, 5º 9º, 71290, San Robles', 'Orta del Barco', 'As Pons del Puerto', 'Lesoto', '0', '2019-11-10 20:23:36', '2019-11-10 20:23:36'),
	(24, 1, 'Alberto Calderón', 'Valenzuela', 82993391, 20556891531, '1985-08-03', 'sara10@live.com', '995288197', '922-621627', 'Camiño Beatriz, 01, 5º 6º, 33641, As Rodarte', 'Los Magaña de Arriba', 'De la Fuente de Arriba', 'Tayikistán', '0', '2019-11-10 20:23:36', '2019-11-10 20:23:36'),
	(25, 1, 'Srita. Aina Casárez Segundo', 'Mejía', 48674779, 20870299241, '1966-07-21', 'dominquez.sofia@yahoo.com', '678-13-8988', '622169508', 'Avinguda Alba, 6, 19º A, 36162, Vall Hurtado del Vallès', 'Las Soler del Pozo', 'Mendoza Medio', 'Noruega', '0', '2019-11-10 20:23:36', '2019-11-10 20:23:36'),
	(26, 1, 'Abril Zapata', 'Arevalo', 64744112, 20691196291, '1966-11-07', 'javier.perez@salgado.es', '958 74 5057', '+34 900698272', 'Ronda Alba, 208, 0º E, 66711, L\' Olmos de las Torres', 'Os Cuenca', 'Esparza Alta', 'Seychelles', '0', '2019-11-10 20:23:36', '2019-11-10 20:23:36'),
	(27, 1, 'Nayara Blasco', 'Riojas', 59365070, 22522182331, '1969-08-11', 'aina88@yahoo.com', '675 947451', '+34 992-851885', 'Camiño Nuria, 09, 9º F, 77550, Luna del Barco', 'La Montemayor', 'A Corral', 'Polonia', '0', '2019-11-10 20:23:36', '2019-11-10 20:23:36'),
	(28, 1, 'Adrián Asensio', 'Contreras', 40005973, 20784771419, '1999-04-19', 'mario94@terra.com', '682 799128', '621 02 0886', 'Carrer Aina, 69, Bajos, 47581, As Loera', 'Hernández del Pozo', 'El Rosado del Puerto', 'Camerún', '0', '2019-11-10 20:23:36', '2019-11-10 20:23:36'),
	(29, 1, 'Javier Magaña', 'Carrión', 74247106, 21208412879, '1973-11-01', 'nahia82@plaza.com', '973 29 0850', '+34 651 986770', 'Plaça Lucía, 7, 0º 1º, 17427, Toledo de Lemos', 'Las Espinal del Puerto', 'Vall Treviño de Arriba', 'Líbano', '0', '2019-11-10 20:23:36', '2019-11-10 20:23:36'),
	(30, 1, 'Sara Gaona', 'Patiño', 39845640, 22126435639, '1967-07-22', 'zmena@vallejo.net', '968968344', '617-517610', 'Ronda Abril, 7, 34º B, 49441, San Pedroza Medio', 'Vall Reynoso', 'Las Villagómez', 'España', '0', '2019-11-10 20:23:36', '2019-11-10 20:23:36'),
	(31, 1, 'Ing. Sergio Godoy Tercero', 'Carretero', 79434971, 22868692357, '1966-05-13', 'alexia.roybal@gmail.com', '+34 671-651595', '+34 952 82 2147', 'Rúa Bruno, 28, 61º E, 27906, Villa Zapata', 'A Castellanos', 'Marín de las Torres', 'Camboya', '0', '2019-11-10 20:23:36', '2019-11-10 20:23:36'),
	(32, 1, 'Celia Prado', 'Naranjo', 98223600, 20299461251, '1975-12-17', 'diego.soriano@viera.es', '+34 632-98-4406', '+34 627-408056', 'Plaza Pedraza, 60, 9º E, 97578, Vargas de Arriba', 'Merino de la Sierra', 'La Cadena', 'Reino Unido de Gran Bretaña e Irlanda del Norte', '0', '2019-11-10 20:23:36', '2019-11-10 20:23:36'),
	(33, 1, 'Anna Valles', 'Luque', 93602486, 20879547821, '2000-10-01', 'puga.isaac@gmail.com', '970-08-5382', '+34 616373397', 'Paseo Cuevas, 084, 34º 6º, 35648, Tejada del Puerto', 'A Soto', 'L\' Martín', 'Mónaco', '0', '2019-11-10 20:23:36', '2019-11-10 20:23:36'),
	(34, 1, 'Lic. Mireia Romero', 'Soliz', 29018821, 20676385937, '1968-11-06', 'dolivo@hotmail.es', '959 242729', '931 82 3813', 'Rúa Nieves, 84, 8º 9º, 66855, Vargas de Arriba', 'A Frías de San Pedro', 'Vall Escobar del Penedès', 'Irán', '0', '2019-11-10 20:23:36', '2019-11-10 20:23:36'),
	(35, 1, 'Elsa Solís', 'Naranjo', 71396154, 22126745917, '1990-03-06', 'blanca02@martinez.com', '993 501074', '985245077', 'Passeig Gaitán, 996, 4º B, 39898, El Alejandro', 'Aragón del Penedès', 'Las Mondragón del Bages', 'Omán', '0', '2019-11-10 20:23:36', '2019-11-10 20:23:36'),
	(36, 1, 'Srita. Vega Ulloa', 'Roig', 24159616, 21574476547, '1991-12-09', 'heredia.jose@hotmail.com', '692794007', '631-36-4846', 'Plaza Miguel Ángel, 934, 6º C, 45074, A Mota', 'As Briseño de Lemos', 'Villa Rentería', 'Maldivas', '0', '2019-11-10 20:23:36', '2019-11-10 20:23:36'),
	(37, 1, 'David Córdoba Tercero', 'Oliver', 59299226, 20891461097, '1993-10-12', 'acuellar@hotmail.es', '+34 629 92 3217', '+34 934-07-2909', 'Praza Malak, 427, 6º, 49070, Vall Arias de Ulla', 'Puente de Lemos', 'Las Chavarría', 'Suiza', '0', '2019-11-10 20:23:36', '2019-11-10 20:23:36'),
	(38, 1, 'Francisco Aguirre', 'Peres', 49598420, 21914760217, '1988-06-25', 'alicia.carrasco@naranjo.com', '936-63-8981', '+34 989694457', 'Passeig Francisco Javier, 590, 78º 8º, 52258, San Tejada', 'A Núñez de San Pedro', 'Porras Medio', 'Polonia', '0', '2019-11-10 20:23:36', '2019-11-10 20:23:36'),
	(39, 1, 'Ing. Paula Zayas Tercero', 'Casado', 55438390, 22962308797, '1986-07-28', 'franciscojavier.gonzalez@calero.com', '964-187794', '941 419200', 'Avinguda Ontiveros, 858, 1º C, 94837, De la Cruz Medio', 'Villa Morán del Mirador', 'Os Enríquez', 'San Vicente y las Granadinas', '0', '2019-11-10 20:23:36', '2019-11-10 20:23:36'),
	(40, 1, 'Dr. María Hinojosa', 'Monroy', 57024027, 22980887101, '1971-11-04', 'samuel.atencio@hotmail.com', '908 57 8108', '687798107', 'Rúa Alejandro, 40, 55º C, 09304, Cornejo del Barco', 'Andreu de Lemos', 'San Centeno', 'Samoa', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(41, 1, 'Nicolás Gaona', 'Valenzuela', 46153903, 22357429899, '1970-02-19', 'marti34@hotmail.es', '+34 679647638', '925 540654', 'Travessera Mireia, 138, 1º A, 48852, A Navas', 'Villa Calvillo del Penedès', 'Sosa de Lemos', 'Ghana', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(42, 1, 'Lucas Urías', 'Villaseñor', 92476598, 21375997129, '1999-11-29', 'vega.delacruz@hotmail.es', '665 69 0767', '+34 969356875', 'Avenida Biel, 616, 83º C, 02088, As Balderas', 'La Raya Medio', 'A Gastélum de la Sierra', 'Letonia', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(43, 1, 'Sra. Lidia Reynoso Segundo', 'Rodríquez', 39334142, 22983990467, '1989-08-27', 'alma.calderon@hotmail.es', '+34 682 329187', '+34 956-690001', 'Camiño Cuevas, 970, 6º E, 53163, Los Tovar del Puerto', 'San Garza', 'O Chapa del Bages', 'Rumanía', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(44, 1, 'Diana Millán', 'Carreón', 90980027, 21877811447, '1994-11-11', 'aleix.galvan@gmail.com', '+34 681-42-0657', '689670217', 'Passeig Jordi, 190, 59º D, 51982, La Duarte', 'Los Costa del Barco', 'Simón del Bages', 'Rusia', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(45, 1, 'Francisco Javier Garibay', 'Rico', 58316357, 20901267741, '1983-01-10', 'npedroza@latinmail.com', '+34 935 146938', '+34 945 376822', 'Calle Africa, 72, 15º C, 35831, O Villagómez del Pozo', 'Vall Rojo', 'Los Tejada', 'Guatemala', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(46, 1, 'Sra. Carlota Adorno', 'Rueda', 20809000, 21219605287, '1984-02-16', 'noa27@delarosa.es', '946-228996', '+34 677-51-5355', 'Plaça Vázquez, 065, Bajo 4º, 01968, Abeyta del Vallès', 'El Ordoñez', 'Preciado de la Sierra', 'Guatemala', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(47, 1, 'Ignacio Saldivar', 'Anaya', 41276963, 22724068167, '1971-01-22', 'lucero.rayan@arias.es', '+34 976 19 3146', '+34 658 38 2531', 'Rúa Díez, 3, Entre suelo 7º, 89124, Vall Gurule', 'San Delafuente del Penedès', 'San Becerra de Arriba', 'Dominica', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(48, 1, 'Ing. Nahia Naranjo Hijo', 'Alonso', 99284530, 20991548999, '1970-01-20', 'leyre.pagan@yahoo.es', '+34 968055189', '671-93-1388', 'Avinguda Munguía, 12, 7º, 57185, Rascón de Ulla', 'L\' Parra', 'Villa Silva', 'Filipinas', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(49, 1, 'Aleix Lázaro', 'Navarro', 68039517, 21210454879, '1993-05-16', 'rguevara@hispavista.com', '911866466', '+34 902-274085', 'Praza Jan, 142, 8º C, 85765, Puente de Lemos', 'Pulido Baja', 'San Betancourt del Barco', 'Laos', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(50, 1, 'Óscar Amador Segundo', 'Vigil', 41105217, 21519721881, '1994-12-03', 'marti48@hotmail.es', '998-32-2100', '957-594628', 'Paseo Mayorga, 1, 1º, 73442, Os Santiago del Barco', 'Puga del Mirador', 'Prieto de Lemos', 'Bután', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(51, 1, 'Srita. Malak Miramontes', 'Vargas', 27127796, 21365012179, '1991-03-16', 'puga.omar@feliciano.es', '+34 647 005554', '+34 957 658530', 'Carrer Jan, 019, 65º A, 14871, Pascual de Ulla', 'L\' Raya de las Torres', 'L\' Altamirano del Vallès', 'Suiza', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(52, 1, 'Aitor Padrón', 'Piñeiro', 86204992, 21118294761, '1989-02-20', 'david25@padron.com.es', '+34 912 019015', '+34 928 782968', 'Carrer Crespo, 39, 82º A, 30456, Balderas del Pozo', 'L\' Rendón', 'Las Montalvo del Barco', 'Rusia', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(53, 1, 'Elsa Puga Tercero', 'Riojas', 69937567, 20766741871, '1996-04-24', 'negron.nayara@live.com', '905 00 8072', '610 982091', 'Travesía Valenzuela, 0, Entre suelo 1º, 48549, Llorente del Vallès', 'Villa Aragón del Bages', 'Tamayo del Penedès', 'Japón', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(54, 1, 'Carlos Cano', 'Peralta', 25895731, 21732204489, '1966-10-23', 'hibanez@jaramillo.com', '905 77 5692', '645412953', 'Calle Lara, 7, 4º, 03517, Los Ávila', 'O Curiel Medio', 'L\' Alfaro', 'Papúa Nueva Guinea', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(55, 1, 'Ing. Julia Ruvalcaba', 'Sandoval', 98893889, 20114767019, '1978-01-18', 'yaiza24@grijalva.org', '+34 947 075799', '+34 912408640', 'Passeig Arredondo, 30, 1º B, 55573, As Malave', 'O Valenzuela', 'As Frías', 'Bahamas', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(56, 1, 'Lic. Martí Mondragón', 'Caraballo', 89837082, 22290996789, '1992-04-09', 'limon.pedro@castellanos.com', '938 762743', '666-67-3432', 'Rúa Jorge, 5, 0º F, 84948, Escalante del Bages', 'Montemayor de las Torres', 'Bueno de San Pedro', 'Chile', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(57, 1, 'Adriana Venegas', 'Delao', 24625730, 22162619549, '1988-09-04', 'fernando91@esquibel.com', '+34 617-63-3435', '914 26 0983', 'Camiño Expósito, 6, 91º 8º, 22427, Delrío de Lemos', 'L\' Abeyta de las Torres', 'La Betancourt de Lemos', 'Micronesia', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(58, 1, 'Miguel Solís', 'Parra', 94761530, 22562867147, '1973-06-17', 'elena.simon@carrera.org', '+34 632 60 6749', '+34 699-32-7818', 'Travesía Mar, 122, 1º E, 10151, Magaña Baja', 'Marrero de la Sierra', 'Vall Chacón de la Sierra', 'Polonia', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(59, 1, 'Fátima Camacho Tercero', 'Tejada', 71458154, 22394720229, '1995-06-18', 'helena.barroso@hotmail.es', '999663687', '+34 925 27 4962', 'Avenida Bruno, 1, Bajo 1º, 68680, Hernádez de las Torres', 'Vall Mercado', 'Vall Villar Baja', 'Argentina', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(60, 1, 'Naiara Saiz', 'Moral', 85758563, 20611475341, '1971-11-14', 'adrian26@espino.com', '+34 977892997', '+34 916-228467', 'Ruela Francisco Javier, 356, 44º 0º, 57774, Os Romo de la Sierra', 'Villa Montoya de Lemos', 'Las Benítez', 'Honduras', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(61, 1, 'Hugo Mateos', 'Zúñiga', 37244642, 20319458957, '1965-01-30', 'vera.ruelas@yahoo.es', '+34 900 97 3026', '626 26 6917', 'Praza Peláez, 30, 6º E, 95590, L\' Molina', 'Las Centeno', 'San Manzanares del Mirador', 'Mauricio', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(62, 1, 'Antonio Sierra', 'Alanis', 23580292, 22780870481, '1967-04-14', 'iterrazas@hispavista.com', '+34 964-57-1394', '978596989', 'Rúa Sáenz, 452, 9º E, 34153, Villa Miramontes', 'Hernándes de Lemos', 'Villa Orta del Penedès', 'Seychelles', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(63, 1, 'Rodrigo Valles Segundo', 'Adame', 36822897, 21828294427, '1982-07-25', 'escribano.noelia@gastelum.org', '+34 641-36-7573', '650-073352', 'Travesía Cano, 8, 5º F, 52508, Los Escamilla del Penedès', 'San Noriega de Arriba', 'Esquibel Alta', 'Madagascar', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(64, 1, 'Dn. Andrés De la Torre', 'Delgado', 15971129, 21894590477, '1999-09-22', 'lucas76@hotmail.com', '678-980184', '615 83 0586', 'Avinguda Ane, 25, 3º D, 23331, San Costa del Puerto', 'El Jaime de las Torres', 'Carretero del Puerto', 'Guatemala', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(65, 1, 'Ing. Jimena Becerra Segundo', 'Hurtado', 73234338, 21589736901, '1975-05-09', 'noelia56@gmail.com', '926-18-9383', '609 31 7552', 'Plaça Bernal, 17, 7º B, 68514, Calero Medio', 'Villa Posada', 'O Palacios Baja', 'Kuwait', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(66, 1, 'Jana Quiñónez', 'Chapa', 33958956, 21804596327, '1982-02-07', 'pardo.nahia@hispavista.com', '625-146819', '922 78 7661', 'Passeig Ocasio, 105, 12º B, 24359, Mendoza de San Pedro', 'La Salgado', 'Bravo de Lemos', 'China', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(67, 1, 'Srita. Luna Mota', 'Pozo', 35052881, 22839161177, '1997-01-16', 'rpuente@hotmail.com', '+34 945 998074', '+34 969 458100', 'Passeig Angela, 160, 7º 3º, 70000, Los Beltrán del Puerto', 'Soliz de la Sierra', 'L\' Adame del Penedès', 'Islandia', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(68, 1, 'Lic. Lara Martos', 'Tijerina', 44012654, 20553089197, '1975-06-30', 'carlos.corral@calero.com', '967-315353', '606 881217', 'Avinguda Ulloa, 45, 66º E, 53582, Os Solorzano', 'Os Márquez Medio', 'L\' Miguel', 'India', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(69, 1, 'Dr. Aitana Sanz', 'Bermúdez', 83746950, 22449505957, '1996-07-21', 'yaiza.espinoza@hispavista.com', '+34 602-80-4037', '+34 999-61-4865', 'Plaza Cervantes, 218, 69º C, 11337, La Vallejo', 'A Urrutia de Lemos', 'Escribano del Penedès', 'Cuba', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(70, 1, 'Óscar Zepeda', 'Ibarra', 79914727, 22864868409, '1975-05-10', 'trejo.vega@carretero.org', '651-369814', '650-73-9621', 'Rúa Iván, 236, 6º, 06039, Rubio del Penedès', 'San Guzmán de Arriba', 'González Medio', 'Kirguistán', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(71, 1, 'Arnau Del Río', 'Bahena', 74807990, 20725002517, '2000-07-31', 'valentina.santana@sevilla.org', '662-783371', '+34 636 287570', 'Rúa Manzano, 9, 75º F, 76575, A Abad del Puerto', 'San Botello', 'O Cruz', 'Perú', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(72, 1, 'Raquel Lucio', 'Mateos', 55087183, 20111468389, '1995-07-11', 'mar.saavedra@santos.org', '+34 976-653248', '+34 661-769851', 'Avenida Raúl, 7, 38º D, 42282, El Muñiz', 'O Tejeda', 'As Almonte de Ulla', 'Burundi', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(73, 1, 'Nora Sepúlveda', 'Villaseñor', 72080538, 20489734257, '1988-10-06', 'miguel28@mejia.com.es', '+34 606-48-2026', '+34 928274964', 'Travessera Casas, 69, 91º A, 55280, Las Toledo', 'Martos del Pozo', 'A Orta', 'Guinea Ecuatorial', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(74, 1, 'Gael De la Fuente', 'Juárez', 57819331, 20343923751, '1997-04-19', 'eordonez@aviles.org', '+34 699-87-6939', '918-35-7562', 'Travesía Fernando, 00, 5º F, 14094, Vall Hernándes', 'Rosales de Arriba', 'Las Llamas', 'Serbia', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(75, 1, 'Naiara Balderas', 'Cuevas', 11455975, 20657404091, '1999-09-27', 'josemanuel97@yahoo.es', '+34 649-83-2545', '908 41 4456', 'Carrer Álvaro, 65, 58º F, 77033, Meraz Alta', 'Villa De la Fuente del Puerto', 'Los Aranda de las Torres', 'China', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(76, 1, 'Carmen Simón', 'Colunga', 47652990, 21492213889, '1996-07-03', 'angulo.mario@baeza.com', '+34 907 07 2530', '+34 699 57 7917', 'Rúa Unai, 55, 1º A, 42043, Las Hurtado Baja', 'Villa Deleón', 'A Tamez', 'Birmania', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(77, 1, 'Elena León', 'Bautista', 33809507, 20885982207, '1981-10-03', 'vega.olvera@caldera.net', '+34 611795723', '+34 696-91-2887', 'Paseo Bahena, 5, 2º A, 32726, El Partida', 'Vall Balderas', 'Zavala de la Sierra', 'Filipinas', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(78, 1, 'Sra. Irene Armendáriz', 'Puig', 58601327, 20323798121, '1975-03-09', 'gerard74@latinmail.com', '615-662940', '+34 955 71 5770', 'Ruela Muro, 95, 4º C, 83149, L\' Henríquez de Arriba', 'A Roybal', 'Granados del Puerto', 'Andorra', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(79, 1, 'Ing. Nora Garrido Segundo', 'Madrid', 69866061, 20344487811, '1976-07-12', 'sisneros.jesus@valadez.es', '+34 639 53 1308', '+34 939-482611', 'Camino Diana, 8, 81º B, 46634, Flórez de Arriba', 'Las Martínez', 'San Díaz de Lemos', 'Etiopía', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(80, 1, 'Srita. Martí Polo Hijo', 'Pastor', 17294978, 22995538477, '1976-08-19', 'brito.raquel@hotmail.es', '+34 906 666851', '+34 675 09 3554', 'Passeig Betancourt, 49, Ático 5º, 64828, Cobo de Lemos', 'La Garrido del Pozo', 'Apodaca del Puerto', 'Maldivas', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(81, 1, 'Helena Caldera', 'Tamez', 89956483, 20658207509, '1979-08-22', 'cordero.angel@peres.es', '+34 602083576', '+34 699225918', 'Paseo Alonso, 76, 54º B, 44192, Villa Alarcón', 'Los Véliz', 'Los Concepción del Puerto', 'Guyana', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(82, 1, 'Inés Jimínez Hijo', 'Niño', 53883093, 21830538159, '1981-01-30', 'aleix.avalos@moya.com', '987854273', '+34 900 848309', 'Camino Velázquez, 81, 87º A, 06001, Vera del Mirador', 'L\' Cotto de las Torres', 'La Madera', 'Uganda', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(83, 1, 'Óscar Abeyta Tercero', 'Casanova', 57368969, 22207443487, '1972-09-30', 'dario74@gmail.com', '+34 654-07-6286', '+34 997 511815', 'Avenida Vega, 194, 7º 7º, 58552, L\' Díez del Bages', 'Alfaro del Pozo', 'El Bernal de San Pedro', 'Yibuti', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(84, 1, 'Teresa Ozuna', 'Carrero', 59019897, 22859671737, '1969-08-17', 'yago.lira@yahoo.com', '691-028478', '698-30-3405', 'Carrer Barrientos, 8, 2º 7º, 89076, Sanabria de las Torres', 'Las Henríquez de Ulla', 'Acuña del Vallès', 'República Democrática del Congo', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(85, 1, 'Sra. Angela Rodarte Segundo', 'Hernádez', 83793962, 22567321769, '1985-06-01', 'nsaldivar@pozo.com', '+34 650-03-1937', '991 04 3824', 'Avinguda Garay, 134, 03º A, 58264, Los Armijo Medio', 'Tejeda de Lemos', 'Vall Villagómez de San Pedro', 'Haití', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(86, 1, 'Nahia Olivares', 'Aranda', 58462743, 20991867361, '1968-03-15', 'cantu.juanjose@ceja.com', '+34 658617298', '950179741', 'Passeig Serna, 00, 00º A, 40237, Vall Ordoñez de Lemos', 'San Suárez', 'O Ontiveros', 'Dominica', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(87, 1, 'Saúl Zarate', 'Osorio', 34598424, 20479464237, '1980-04-12', 'yago79@terra.com', '+34 645760191', '+34 936-50-3636', 'Plaza Verdugo, 50, 65º E, 08842, Negrón del Barco', 'Los Quesada', 'Vall Villalobos Baja', 'India', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(88, 1, 'Dr. Naiara García Tercero', 'Ruvalcaba', 11031075, 22201234629, '1987-01-07', 'asier72@galvez.com', '+34 604-65-4668', '+34 670 139152', 'Camino Fátima, 786, 0º D, 89210, L\' Riera de Arriba', 'Las Delacrúz de Arriba', 'Delapaz Medio', 'Vanuatu', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(89, 1, 'Alberto Mateos', 'Casárez', 55146363, 22307847087, '1988-10-13', 'nadia27@romo.org', '690-65-6195', '+34 625-08-4730', 'Camiño Sedillo, 63, 0º E, 30920, As Cepeda del Pozo', 'La Uribe', 'Villa Rosado Medio', 'Vanuatu', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(90, 1, 'Naia Vaca', 'Olivas', 59009922, 22241074269, '1974-05-01', 'lechevarria@live.com', '+34 905313476', '+34 925-20-0201', 'Ruela Antonio, 5, Bajo 2º, 45544, Las Treviño', 'Villegas Medio', 'Las Lugo Medio', 'Macedonia', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(91, 1, 'Aya Venegas', 'Godínez', 39422862, 21973368709, '1975-08-13', 'salmanza@tirado.com.es', '+34 952 80 0423', '+34 637-594759', 'Passeig Centeno, 8, 1º C, 80815, Carrillo del Puerto', 'Casillas Baja', 'O Arriaga de la Sierra', 'Birmania', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(92, 1, 'Fernando Carranza', 'Rodarte', 71754183, 22345167217, '1982-05-05', 'abriones@salcedo.com', '+34 629 00 2171', '992 31 1856', 'Camiño Iria, 036, Bajo 7º, 24904, Barrera del Penedès', 'Delgadillo del Pozo', 'Caro de San Pedro', 'Portugal', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(93, 1, 'Samuel Rico Hijo', 'Vélez', 24697925, 20270310419, '1995-03-28', 'gabriela27@alfaro.com', '+34 907597024', '932-84-7441', 'Camiño Urías, 452, 97º D, 17827, O Martos del Puerto', 'El Zapata', 'L\' Araña de Arriba', 'Chipre', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(94, 1, 'Valeria Millán', 'Benavides', 95746907, 22555791957, '1977-11-30', 'nmadrid@hotmail.com', '969-81-3937', '+34 692353659', 'Carrer Pedroza, 264, 3º C, 94297, As Zamora', 'A Lucas', 'Perea del Barco', 'Uganda', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(95, 1, 'Laura Cobo', 'Hernando', 87138052, 20714920331, '1975-02-09', 'francisco.flores@latinmail.com', '912 459728', '601 79 1354', 'Plaza Ángel, 65, 24º E, 84078, Vall Reyes del Puerto', 'Os Ibarra del Vallès', 'Vall Ríos de Arriba', 'Haití', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(96, 1, 'Lic. Isaac Córdoba Tercero', 'Carranza', 37462529, 20990029629, '1970-07-21', 'ivan88@carbajal.com', '+34 631 352243', '+34 650 614578', 'Paseo Gabriel, 9, 37º D, 94833, Los Márquez', 'A Balderas', 'Villa Ybarra', 'Congo', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(97, 1, 'Alejandro Montoya', 'Aparicio', 93927356, 20159191111, '1976-10-26', 'armas.joseantonio@yahoo.es', '+34 974-974420', '+34 682-91-2970', 'Avinguda Cano, 847, Entre suelo 5º, 49454, Delagarza del Barco', 'Las Herrero', 'Villa Prado de San Pedro', 'Noruega', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(98, 1, 'Dr. Yago Robledo Hijo', 'Pichardo', 41587220, 21349903229, '1982-05-24', 'oabreu@yahoo.es', '662-710025', '607-68-3349', 'Plaça Mesa, 47, 1º E, 80878, Dueñas del Bages', 'Delagarza del Mirador', 'Os Calderón', 'San Marino', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(99, 1, 'Leo Escamilla', 'Posada', 79293954, 22487639299, '1993-01-03', 'cristina.vallejo@navarrete.com', '+34 688-84-7436', '+34 635-98-9048', 'Paseo Esparza, 7, 2º E, 79244, Escudero del Barco', 'Las Betancourt', 'Navas del Vallès', 'Togo', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(100, 1, 'Saúl Garza', 'Valladares', 37374605, 20585249111, '1978-12-25', 'joan64@hispavista.com', '+34 985 841246', '+34 661646729', 'Passeig Gallego, 5, 3º D, 17396, L\' Martos', 'Los Patiño de San Pedro', 'A Zepeda del Puerto', 'Polonia', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37');
/*!40000 ALTER TABLE `agents` ENABLE KEYS */;

-- Volcando estructura para tabla sait.agent_contacts
CREATE TABLE IF NOT EXISTS `agent_contacts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `agent_id` bigint(20) unsigned NOT NULL,
  `relationship_id` bigint(20) unsigned NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dni` bigint(20) unsigned NOT NULL,
  `born_date` date DEFAULT NULL,
  `email` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cellphone` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_deleted` enum('0','1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `agent_contacts_agent_id_foreign` (`agent_id`),
  KEY `agent_contacts_relationship_id_foreign` (`relationship_id`),
  CONSTRAINT `agent_contacts_agent_id_foreign` FOREIGN KEY (`agent_id`) REFERENCES `agents` (`id`),
  CONSTRAINT `agent_contacts_relationship_id_foreign` FOREIGN KEY (`relationship_id`) REFERENCES `relationships` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sait.agent_contacts: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `agent_contacts` DISABLE KEYS */;
/*!40000 ALTER TABLE `agent_contacts` ENABLE KEYS */;

-- Volcando estructura para tabla sait.agent_licenses
CREATE TABLE IF NOT EXISTS `agent_licenses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `agent_id` bigint(20) unsigned NOT NULL,
  `license_code_id` bigint(20) unsigned NOT NULL,
  `request_date` date NOT NULL,
  `start_date` date NOT NULL,
  `certificate_number` smallint(5) unsigned NOT NULL,
  `certificate_receipt_date` date NOT NULL,
  `certificate_file` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `agent_licenses_agent_id_foreign` (`agent_id`),
  KEY `agent_licenses_license_code_id_foreign` (`license_code_id`),
  CONSTRAINT `agent_licenses_agent_id_foreign` FOREIGN KEY (`agent_id`) REFERENCES `agents` (`id`),
  CONSTRAINT `agent_licenses_license_code_id_foreign` FOREIGN KEY (`license_code_id`) REFERENCES `license_codes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sait.agent_licenses: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `agent_licenses` DISABLE KEYS */;
/*!40000 ALTER TABLE `agent_licenses` ENABLE KEYS */;

-- Volcando estructura para tabla sait.agent_position_types
CREATE TABLE IF NOT EXISTS `agent_position_types` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `agent_id` bigint(20) unsigned NOT NULL,
  `position_type_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `agent_position_types_agent_id_foreign` (`agent_id`),
  KEY `agent_position_types_position_type_id_foreign` (`position_type_id`),
  CONSTRAINT `agent_position_types_agent_id_foreign` FOREIGN KEY (`agent_id`) REFERENCES `agents` (`id`),
  CONSTRAINT `agent_position_types_position_type_id_foreign` FOREIGN KEY (`position_type_id`) REFERENCES `position_types` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sait.agent_position_types: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `agent_position_types` DISABLE KEYS */;
/*!40000 ALTER TABLE `agent_position_types` ENABLE KEYS */;

-- Volcando estructura para tabla sait.agent_position_type_transactions
CREATE TABLE IF NOT EXISTS `agent_position_type_transactions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `agent_position_type_id` bigint(20) unsigned NOT NULL,
  `transaction_status_id` bigint(20) unsigned NOT NULL,
  `file` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `procedure_number` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `agent_position_type_transactions_agent_position_type_id_foreign` (`agent_position_type_id`),
  KEY `agent_position_type_transactions_transaction_status_id_foreign` (`transaction_status_id`),
  CONSTRAINT `agent_position_type_transactions_agent_position_type_id_foreign` FOREIGN KEY (`agent_position_type_id`) REFERENCES `agent_position_types` (`id`),
  CONSTRAINT `agent_position_type_transactions_transaction_status_id_foreign` FOREIGN KEY (`transaction_status_id`) REFERENCES `transaction_statuses` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sait.agent_position_type_transactions: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `agent_position_type_transactions` DISABLE KEYS */;
/*!40000 ALTER TABLE `agent_position_type_transactions` ENABLE KEYS */;

-- Volcando estructura para tabla sait.agent_schedules
CREATE TABLE IF NOT EXISTS `agent_schedules` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `agent_id` bigint(20) unsigned NOT NULL,
  `day` tinyint(3) unsigned NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `is_deleted` enum('0','1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `agent_schedules_agent_id_foreign` (`agent_id`),
  CONSTRAINT `agent_schedules_agent_id_foreign` FOREIGN KEY (`agent_id`) REFERENCES `agents` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sait.agent_schedules: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `agent_schedules` DISABLE KEYS */;
/*!40000 ALTER TABLE `agent_schedules` ENABLE KEYS */;

-- Volcando estructura para tabla sait.agent_subjects
CREATE TABLE IF NOT EXISTS `agent_subjects` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `agent_id` bigint(20) unsigned NOT NULL,
  `subject_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `agent_subjects_agent_id_foreign` (`agent_id`),
  KEY `agent_subjects_subject_id_foreign` (`subject_id`),
  CONSTRAINT `agent_subjects_agent_id_foreign` FOREIGN KEY (`agent_id`) REFERENCES `agents` (`id`),
  CONSTRAINT `agent_subjects_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sait.agent_subjects: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `agent_subjects` DISABLE KEYS */;
/*!40000 ALTER TABLE `agent_subjects` ENABLE KEYS */;

-- Volcando estructura para tabla sait.agent_subject_schedules
CREATE TABLE IF NOT EXISTS `agent_subject_schedules` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `agent_subject_id` bigint(20) unsigned NOT NULL,
  `day` tinyint(3) unsigned NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `is_deleted` enum('0','1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `agent_subject_schedules_agent_subject_id_foreign` (`agent_subject_id`),
  CONSTRAINT `agent_subject_schedules_agent_subject_id_foreign` FOREIGN KEY (`agent_subject_id`) REFERENCES `agent_subjects` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sait.agent_subject_schedules: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `agent_subject_schedules` DISABLE KEYS */;
/*!40000 ALTER TABLE `agent_subject_schedules` ENABLE KEYS */;

-- Volcando estructura para tabla sait.agent_unsubscribe_transactions
CREATE TABLE IF NOT EXISTS `agent_unsubscribe_transactions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `agent_id` bigint(20) unsigned NOT NULL,
  `transaction_status_id` bigint(20) unsigned NOT NULL,
  `file` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `procedure_number` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `agent_unsubscribe_transactions_agent_id_foreign` (`agent_id`),
  KEY `agent_unsubscribe_transactions_transaction_status_id_foreign` (`transaction_status_id`),
  CONSTRAINT `agent_unsubscribe_transactions_agent_id_foreign` FOREIGN KEY (`agent_id`) REFERENCES `agents` (`id`),
  CONSTRAINT `agent_unsubscribe_transactions_transaction_status_id_foreign` FOREIGN KEY (`transaction_status_id`) REFERENCES `transaction_statuses` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sait.agent_unsubscribe_transactions: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `agent_unsubscribe_transactions` DISABLE KEYS */;
/*!40000 ALTER TABLE `agent_unsubscribe_transactions` ENABLE KEYS */;

-- Volcando estructura para tabla sait.attendances
CREATE TABLE IF NOT EXISTS `attendances` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `agent_subject_schedule_id` bigint(20) unsigned NOT NULL,
  `attendance_state_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `attendances_agent_subject_schedule_id_foreign` (`agent_subject_schedule_id`),
  KEY `attendances_attendance_state_id_foreign` (`attendance_state_id`),
  CONSTRAINT `attendances_agent_subject_schedule_id_foreign` FOREIGN KEY (`agent_subject_schedule_id`) REFERENCES `agent_subject_schedules` (`id`),
  CONSTRAINT `attendances_attendance_state_id_foreign` FOREIGN KEY (`attendance_state_id`) REFERENCES `attendance_states` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sait.attendances: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `attendances` DISABLE KEYS */;
/*!40000 ALTER TABLE `attendances` ENABLE KEYS */;

-- Volcando estructura para tabla sait.attendance_states
CREATE TABLE IF NOT EXISTS `attendance_states` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_deleted` enum('0','1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sait.attendance_states: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `attendance_states` DISABLE KEYS */;
/*!40000 ALTER TABLE `attendance_states` ENABLE KEYS */;

-- Volcando estructura para tabla sait.careers
CREATE TABLE IF NOT EXISTS `careers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `year` smallint(5) unsigned NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_deleted` enum('0','1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sait.careers: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `careers` DISABLE KEYS */;
REPLACE INTO `careers` (`id`, `year`, `name`, `is_deleted`, `created_at`, `updated_at`) VALUES
	(1, 2019, 'PROF. EDUCACION INICIAL', '1', '2019-11-10 21:47:23', '2019-11-10 21:55:46'),
	(2, 2020, 'CARRERA DEL AO QUE VIENE', '0', '2019-11-10 21:51:25', '2019-11-10 21:51:25');
/*!40000 ALTER TABLE `careers` ENABLE KEYS */;

-- Volcando estructura para tabla sait.career_courses
CREATE TABLE IF NOT EXISTS `career_courses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `career_id` bigint(20) unsigned NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_deleted` enum('0','1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `career_courses_career_id_foreign` (`career_id`),
  CONSTRAINT `career_courses_career_id_foreign` FOREIGN KEY (`career_id`) REFERENCES `careers` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sait.career_courses: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `career_courses` DISABLE KEYS */;
REPLACE INTO `career_courses` (`id`, `career_id`, `name`, `is_deleted`, `created_at`, `updated_at`) VALUES
	(1, 1, '1', '1', '2019-11-10 21:47:36', '2019-11-10 21:48:02'),
	(2, 1, '2', '1', '2019-11-10 21:47:40', '2019-11-10 21:54:31');
/*!40000 ALTER TABLE `career_courses` ENABLE KEYS */;

-- Volcando estructura para tabla sait.career_course_divisions
CREATE TABLE IF NOT EXISTS `career_course_divisions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `career_course_id` bigint(20) unsigned NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_deleted` enum('0','1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `career_course_divisions_career_course_id_foreign` (`career_course_id`),
  CONSTRAINT `career_course_divisions_career_course_id_foreign` FOREIGN KEY (`career_course_id`) REFERENCES `career_courses` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sait.career_course_divisions: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `career_course_divisions` DISABLE KEYS */;
REPLACE INTO `career_course_divisions` (`id`, `career_course_id`, `name`, `is_deleted`, `created_at`, `updated_at`) VALUES
	(1, 2, 'A', '0', '2019-11-10 21:48:18', '2019-11-10 21:48:18'),
	(2, 2, 'B', '0', '2019-11-10 21:48:23', '2019-11-10 21:48:23'),
	(3, 2, 'C', '0', '2019-11-10 21:48:27', '2019-11-10 21:48:27');
/*!40000 ALTER TABLE `career_course_divisions` ENABLE KEYS */;

-- Volcando estructura para tabla sait.documents
CREATE TABLE IF NOT EXISTS `documents` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auto_generate` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_deleted` enum('0','1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sait.documents: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `documents` DISABLE KEYS */;
/*!40000 ALTER TABLE `documents` ENABLE KEYS */;

-- Volcando estructura para tabla sait.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sait.failed_jobs: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Volcando estructura para tabla sait.kind_days
CREATE TABLE IF NOT EXISTS `kind_days` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_deleted` enum('0','1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sait.kind_days: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `kind_days` DISABLE KEYS */;
/*!40000 ALTER TABLE `kind_days` ENABLE KEYS */;

-- Volcando estructura para tabla sait.levels
CREATE TABLE IF NOT EXISTS `levels` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_deleted` enum('0','1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sait.levels: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `levels` DISABLE KEYS */;
REPLACE INTO `levels` (`id`, `name`, `is_deleted`, `created_at`, `updated_at`) VALUES
	(1, 'Inicial', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(2, 'Primario', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(3, 'Secundario', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(4, 'Superior', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(5, 'Terciario', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(6, 'Universitario', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37');
/*!40000 ALTER TABLE `levels` ENABLE KEYS */;

-- Volcando estructura para tabla sait.license_codes
CREATE TABLE IF NOT EXISTS `license_codes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `granting_officer_id` bigint(20) unsigned NOT NULL,
  `intervening_officer_id` bigint(20) unsigned NOT NULL,
  `license_type_id` bigint(20) unsigned NOT NULL,
  `kind_days` enum('corridos','habiles') COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `old_article` smallint(5) unsigned DEFAULT NULL,
  `new_article` smallint(5) unsigned DEFAULT NULL,
  `number_days` tinyint(3) unsigned NOT NULL,
  `is_deleted` enum('0','1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `license_codes_granting_officer_id_foreign` (`granting_officer_id`),
  KEY `license_codes_intervening_officer_id_foreign` (`intervening_officer_id`),
  KEY `license_codes_license_type_id_foreign` (`license_type_id`),
  CONSTRAINT `license_codes_granting_officer_id_foreign` FOREIGN KEY (`granting_officer_id`) REFERENCES `license_officers` (`id`),
  CONSTRAINT `license_codes_intervening_officer_id_foreign` FOREIGN KEY (`intervening_officer_id`) REFERENCES `license_officers` (`id`),
  CONSTRAINT `license_codes_license_type_id_foreign` FOREIGN KEY (`license_type_id`) REFERENCES `license_types` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sait.license_codes: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `license_codes` DISABLE KEYS */;
/*!40000 ALTER TABLE `license_codes` ENABLE KEYS */;

-- Volcando estructura para tabla sait.license_officers
CREATE TABLE IF NOT EXISTS `license_officers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_deleted` enum('0','1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sait.license_officers: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `license_officers` DISABLE KEYS */;
REPLACE INTO `license_officers` (`id`, `name`, `is_deleted`, `created_at`, `updated_at`) VALUES
	(1, 'Director Unidad Escolar', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(2, 'Director Prov. RRHH - Min. de Educ. C. y T.', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(3, 'Dir. Prov. RRHH', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(4, 'Director de Nivel', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(5, 'Director de Unidad Escolar - Director de Nivel', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(6, 'Secretario de Unidad Escolar', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(7, 'Poder Ejecutivo', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(8, 'Min. de Educ. C. y T.', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37');
/*!40000 ALTER TABLE `license_officers` ENABLE KEYS */;

-- Volcando estructura para tabla sait.license_types
CREATE TABLE IF NOT EXISTS `license_types` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_deleted` enum('0','1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sait.license_types: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `license_types` DISABLE KEYS */;
REPLACE INTO `license_types` (`id`, `name`, `is_deleted`, `created_at`, `updated_at`) VALUES
	(1, 'Especiales', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(2, 'Extraordinarias con goce de haberes', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(3, 'Extraordinarias sin goce de haberes', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(4, 'Justificación de inasistecias', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(5, 'Franquicias', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37');
/*!40000 ALTER TABLE `license_types` ENABLE KEYS */;

-- Volcando estructura para tabla sait.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=661 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sait.migrations: ~44 rows (aproximadamente)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
REPLACE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(617, '2014_10_12_000000_create_users_table', 1),
	(618, '2014_10_12_100000_create_password_resets_table', 1),
	(619, '2016_01_15_105324_create_roles_table', 1),
	(620, '2016_01_15_114412_create_role_user_table', 1),
	(621, '2016_01_26_115212_create_permissions_table', 1),
	(622, '2016_01_26_115523_create_permission_role_table', 1),
	(623, '2016_02_09_132439_create_permission_user_table', 1),
	(624, '2019_08_19_000000_create_failed_jobs_table', 1),
	(625, '2019_10_26_023500_create_agents_table', 1),
	(626, '2019_10_26_023501_create_relationships_table', 1),
	(627, '2019_10_26_023523_create_positions_table', 1),
	(628, '2019_10_26_023549_create_levels_table', 1),
	(629, '2019_10_26_023559_create_shifts_table', 1),
	(630, '2019_10_26_023608_create_years_table', 1),
	(631, '2019_10_26_023627_create_regimens_table', 1),
	(632, '2019_10_26_023748_create_attendance_states_table', 1),
	(633, '2019_10_26_023803_create_documents_table', 1),
	(634, '2019_10_26_023814_create_transaction_statuses_table', 1),
	(635, '2019_10_26_023838_create_unsubscribe_types_table', 1),
	(636, '2019_10_26_023839_create_kind_days_table', 1),
	(637, '2019_10_26_023840_create_license_types_table', 1),
	(638, '2019_10_26_023841_create_license_officers_table', 1),
	(639, '2019_10_26_024204_create_agent_contacts_table', 1),
	(640, '2019_10_26_024217_create_position_types_table', 1),
	(641, '2019_10_26_024229_create_careers_table', 1),
	(642, '2019_10_26_024240_create_career_courses_table', 1),
	(643, '2019_10_26_024303_create_career_course_divisions_table', 1),
	(644, '2019_10_26_024448_create_agent_schedules_table', 1),
	(645, '2019_10_26_024550_create_pofs_table', 1),
	(646, '2019_10_26_024745_create_subjects_table', 1),
	(647, '2019_10_26_024814_create_agent_position_types_table', 1),
	(648, '2019_10_26_024903_create_position_documents_table', 1),
	(649, '2019_10_26_024921_create_unsubscribe_type_documents_table', 1),
	(650, '2019_10_26_031618_create_license_codes_table', 1),
	(651, '2019_10_26_033921_add_agent_to_users', 1),
	(652, '2019_10_26_033922_create_agent_subjects_table', 1),
	(653, '2019_10_26_033923_create_agent_subject_schedules_table', 1),
	(654, '2019_10_27_015632_create_agent_position_type_transactions_table', 1),
	(655, '2019_10_27_020301_create_agent_unsubscribe_transactions_table', 1),
	(656, '2019_10_27_020302_create_agent_licenses_table', 1),
	(657, '2019_10_27_020303_create_attendances_table', 1),
	(658, '2019_10_30_025549_create_statuses_table', 1),
	(659, '2019_10_30_025808_add_status_to_agents', 1),
	(660, '2019_11_09_225150_add_is_deleted_to_users_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Volcando estructura para tabla sait.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sait.password_resets: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Volcando estructura para tabla sait.permissions
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sait.permissions: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
REPLACE INTO `permissions` (`id`, `name`, `slug`, `description`, `model`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Puede ver usuarios', 'view.users', 'Puede ver usuarios', 'User', '2019-11-10 20:23:37', '2019-11-10 20:23:37', NULL),
	(2, 'Puede crear usuarios', 'create.users', 'Puede crear usuarios', 'User', '2019-11-10 20:23:37', '2019-11-10 20:23:37', NULL),
	(3, 'Puede editar usuarios', 'edit.users', 'Puede editar usuarios', 'User', '2019-11-10 20:23:37', '2019-11-10 20:23:37', NULL),
	(4, 'Puede borrar usuarios', 'delete.users', 'Puede borrar usuarios', 'User', '2019-11-10 20:23:37', '2019-11-10 20:23:37', NULL),
	(5, 'Puede listar documentos de P.O.F.', 'pof.documents.index', 'Puede listar documentos de P.O.F.', 'PofDocument', '2019-11-10 20:23:37', '2019-11-10 20:23:37', NULL),
	(6, 'Puede crear documentos de P.O.F.', 'pof.documents.create', 'Puede crear documentos de P.O.F.', 'PofDocument', '2019-11-10 20:23:37', '2019-11-10 20:23:37', NULL),
	(7, 'Puede guardar documentos de P.O.F.', 'pof.documents.store', 'Puede guardar documentos de P.O.F.', 'PofDocument', '2019-11-10 20:23:37', '2019-11-10 20:23:37', NULL),
	(8, 'Puede eliminar documentos de P.O.F.', 'pof.documents.destroy', 'Puede eliminar documentos de P.O.F.', 'PofDocument', '2019-11-10 20:23:37', '2019-11-10 20:23:37', NULL);
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;

-- Volcando estructura para tabla sait.permission_role
CREATE TABLE IF NOT EXISTS `permission_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permission_role_permission_id_index` (`permission_id`),
  KEY `permission_role_role_id_index` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sait.permission_role: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
REPLACE INTO `permission_role` (`id`, `permission_id`, `role_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 1, 1, '2019-11-10 20:23:37', '2019-11-10 20:23:37', NULL),
	(2, 2, 1, '2019-11-10 20:23:37', '2019-11-10 20:23:37', NULL),
	(3, 3, 1, '2019-11-10 20:23:37', '2019-11-10 20:23:37', NULL),
	(4, 4, 1, '2019-11-10 20:23:37', '2019-11-10 20:23:37', NULL);
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;

-- Volcando estructura para tabla sait.permission_user
CREATE TABLE IF NOT EXISTS `permission_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permission_id` int(10) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permission_user_permission_id_index` (`permission_id`),
  KEY `permission_user_user_id_index` (`user_id`),
  CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `permission_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sait.permission_user: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `permission_user` DISABLE KEYS */;
REPLACE INTO `permission_user` (`id`, `permission_id`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 1, 1, '2019-11-10 20:23:37', '2019-11-10 20:23:37', NULL),
	(2, 2, 1, '2019-11-10 20:23:37', '2019-11-10 20:23:37', NULL),
	(3, 3, 1, '2019-11-10 20:23:37', '2019-11-10 20:23:37', NULL),
	(4, 4, 1, '2019-11-10 20:23:37', '2019-11-10 20:23:37', NULL),
	(5, 5, 1, '2019-11-10 20:23:37', '2019-11-10 20:23:37', NULL),
	(6, 6, 1, '2019-11-10 20:23:37', '2019-11-10 20:23:37', NULL),
	(7, 7, 1, '2019-11-10 20:23:37', '2019-11-10 20:23:37', NULL),
	(8, 8, 1, '2019-11-10 20:23:37', '2019-11-10 20:23:37', NULL);
/*!40000 ALTER TABLE `permission_user` ENABLE KEYS */;

-- Volcando estructura para tabla sait.pofs
CREATE TABLE IF NOT EXISTS `pofs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `level_id` bigint(20) unsigned NOT NULL,
  `shift_id` bigint(20) unsigned NOT NULL,
  `year` smallint(5) unsigned NOT NULL,
  `upload_date` date NOT NULL,
  `cue` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institution` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_approved_teaching_positions` smallint(5) unsigned NOT NULL,
  `total_approved_non_teaching_positions` smallint(5) unsigned NOT NULL,
  `total_teaching_approved_hours` smallint(5) unsigned NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_deleted` enum('0','1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pofs_level_id_foreign` (`level_id`),
  KEY `pofs_shift_id_foreign` (`shift_id`),
  CONSTRAINT `pofs_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`),
  CONSTRAINT `pofs_shift_id_foreign` FOREIGN KEY (`shift_id`) REFERENCES `shifts` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sait.pofs: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `pofs` DISABLE KEYS */;
/*!40000 ALTER TABLE `pofs` ENABLE KEYS */;

-- Volcando estructura para tabla sait.positions
CREATE TABLE IF NOT EXISTS `positions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `year` smallint(5) unsigned NOT NULL,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_deleted` enum('0','1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sait.positions: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `positions` DISABLE KEYS */;
REPLACE INTO `positions` (`id`, `year`, `name`, `is_deleted`, `created_at`, `updated_at`) VALUES
	(1, 2019, 'Cargos de conducción', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(2, 2019, 'Cargos de apoyo', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(3, 2019, 'Cargos no docentes', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(4, 2019, 'Docente', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(5, 2019, 'Horas institucionales', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(6, 2020, 'CARGO 1', '0', '2019-11-10 21:58:19', '2019-11-10 21:58:19');
/*!40000 ALTER TABLE `positions` ENABLE KEYS */;

-- Volcando estructura para tabla sait.position_documents
CREATE TABLE IF NOT EXISTS `position_documents` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `position_id` bigint(20) unsigned NOT NULL,
  `document_id` bigint(20) unsigned NOT NULL,
  `is_deleted` enum('0','1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `position_documents_position_id_foreign` (`position_id`),
  KEY `position_documents_document_id_foreign` (`document_id`),
  CONSTRAINT `position_documents_document_id_foreign` FOREIGN KEY (`document_id`) REFERENCES `documents` (`id`),
  CONSTRAINT `position_documents_position_id_foreign` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sait.position_documents: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `position_documents` DISABLE KEYS */;
/*!40000 ALTER TABLE `position_documents` ENABLE KEYS */;

-- Volcando estructura para tabla sait.position_types
CREATE TABLE IF NOT EXISTS `position_types` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `position_id` bigint(20) unsigned NOT NULL,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quota` smallint(5) unsigned NOT NULL,
  `points` smallint(5) unsigned NOT NULL,
  `is_deleted` enum('0','1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `position_types_position_id_foreign` (`position_id`),
  CONSTRAINT `position_types_position_id_foreign` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sait.position_types: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `position_types` DISABLE KEYS */;
REPLACE INTO `position_types` (`id`, `position_id`, `name`, `quota`, `points`, `is_deleted`, `created_at`, `updated_at`) VALUES
	(1, 1, 'rector', 1, 679, '0', '2019-11-10 21:45:49', '2019-11-10 21:45:49');
/*!40000 ALTER TABLE `position_types` ENABLE KEYS */;

-- Volcando estructura para tabla sait.regimens
CREATE TABLE IF NOT EXISTS `regimens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abbreviation` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `is_deleted` enum('0','1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sait.regimens: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `regimens` DISABLE KEYS */;
REPLACE INTO `regimens` (`id`, `name`, `abbreviation`, `start_date`, `end_date`, `is_deleted`, `created_at`, `updated_at`) VALUES
	(1, '1er Cuatrimestre', '1C', '2019-01-02', '2019-05-09', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(2, '2do Cuatrimestre', '2C', '2019-06-15', '2019-11-30', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(3, 'Anual', 'A', '2019-01-02', '2019-11-30', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37');
/*!40000 ALTER TABLE `regimens` ENABLE KEYS */;

-- Volcando estructura para tabla sait.relationships
CREATE TABLE IF NOT EXISTS `relationships` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_deleted` enum('0','1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sait.relationships: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `relationships` DISABLE KEYS */;
REPLACE INTO `relationships` (`id`, `name`, `is_deleted`, `created_at`, `updated_at`) VALUES
	(1, 'Hermano/a', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(2, 'Primo/a', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(3, 'Tío/a', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(4, 'Sobrino/a', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(5, 'Abuelo/a', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(6, 'Esposo/a', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(7, 'Otro', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37');
/*!40000 ALTER TABLE `relationships` ENABLE KEYS */;

-- Volcando estructura para tabla sait.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sait.roles: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
REPLACE INTO `roles` (`id`, `name`, `slug`, `description`, `level`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Superusuario', 'superuser', 'Superuser Role', 1, '2019-11-10 20:23:37', '2019-11-10 20:23:37', NULL),
	(2, 'Supervisor', 'supervisor', 'Supervisor Role', 2, '2019-11-10 20:23:37', '2019-11-10 20:23:37', NULL),
	(3, 'Administrativo', 'administrative', 'Administrative Role', 3, '2019-11-10 20:23:37', '2019-11-10 20:23:37', NULL),
	(4, 'Bedel', 'janitor', 'Janitor Role', 4, '2019-11-10 20:23:37', '2019-11-10 20:23:37', NULL),
	(5, 'Ninguno', 'unverified', 'Unverified Role', 0, '2019-11-10 20:23:37', '2019-11-10 20:23:37', NULL);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Volcando estructura para tabla sait.role_user
CREATE TABLE IF NOT EXISTS `role_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(10) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `role_user_role_id_index` (`role_id`),
  KEY `role_user_user_id_index` (`user_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sait.role_user: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
REPLACE INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 1, 1, '2019-11-10 20:23:37', '2019-11-10 20:23:37', NULL),
	(2, 2, 2, '2019-11-10 20:23:37', '2019-11-10 20:23:37', NULL),
	(3, 3, 3, '2019-11-10 20:23:37', '2019-11-10 20:23:37', NULL),
	(4, 4, 4, '2019-11-10 20:23:37', '2019-11-10 20:23:37', NULL);
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;

-- Volcando estructura para tabla sait.shifts
CREATE TABLE IF NOT EXISTS `shifts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `is_deleted` enum('0','1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sait.shifts: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `shifts` DISABLE KEYS */;
REPLACE INTO `shifts` (`id`, `name`, `start_time`, `end_time`, `is_deleted`, `created_at`, `updated_at`) VALUES
	(1, 'Mañana', '07:00:00', '12:00:00', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(2, 'Tarde', '14:00:00', '18:00:00', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(3, 'Noche', '19:00:00', '23:00:00', '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37');
/*!40000 ALTER TABLE `shifts` ENABLE KEYS */;

-- Volcando estructura para tabla sait.statuses
CREATE TABLE IF NOT EXISTS `statuses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_deleted` enum('0','1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sait.statuses: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `statuses` DISABLE KEYS */;
REPLACE INTO `statuses` (`id`, `name`, `is_deleted`, `created_at`, `updated_at`) VALUES
	(1, 'Interino', '0', '2019-11-10 20:23:36', '2019-11-10 20:23:36'),
	(2, 'Reemplazante', '0', '2019-11-10 20:23:36', '2019-11-10 20:23:36'),
	(3, 'Titular', '0', '2019-11-10 20:23:36', '2019-11-10 20:23:36');
/*!40000 ALTER TABLE `statuses` ENABLE KEYS */;

-- Volcando estructura para tabla sait.subjects
CREATE TABLE IF NOT EXISTS `subjects` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `career_course_id` bigint(20) unsigned NOT NULL,
  `career_course_division_id` bigint(20) unsigned NOT NULL,
  `regimen_id` bigint(20) unsigned NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hours` smallint(5) unsigned NOT NULL,
  `is_deleted` enum('0','1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subjects_career_course_id_foreign` (`career_course_id`),
  KEY `subjects_career_course_division_id_foreign` (`career_course_division_id`),
  KEY `subjects_regimen_id_foreign` (`regimen_id`),
  CONSTRAINT `subjects_career_course_division_id_foreign` FOREIGN KEY (`career_course_division_id`) REFERENCES `career_course_divisions` (`id`),
  CONSTRAINT `subjects_career_course_id_foreign` FOREIGN KEY (`career_course_id`) REFERENCES `career_courses` (`id`),
  CONSTRAINT `subjects_regimen_id_foreign` FOREIGN KEY (`regimen_id`) REFERENCES `regimens` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sait.subjects: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `subjects` DISABLE KEYS */;
REPLACE INTO `subjects` (`id`, `career_course_id`, `career_course_division_id`, `regimen_id`, `name`, `hours`, `is_deleted`, `created_at`, `updated_at`) VALUES
	(1, 2, 1, 2, 'ASIGNATURA DE PRUEBA', 4, '0', '2019-11-10 21:49:37', '2019-11-10 21:49:37');
/*!40000 ALTER TABLE `subjects` ENABLE KEYS */;

-- Volcando estructura para tabla sait.transaction_statuses
CREATE TABLE IF NOT EXISTS `transaction_statuses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_deleted` enum('0','1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sait.transaction_statuses: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `transaction_statuses` DISABLE KEYS */;
/*!40000 ALTER TABLE `transaction_statuses` ENABLE KEYS */;

-- Volcando estructura para tabla sait.unsubscribe_types
CREATE TABLE IF NOT EXISTS `unsubscribe_types` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_deleted` enum('0','1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sait.unsubscribe_types: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `unsubscribe_types` DISABLE KEYS */;
/*!40000 ALTER TABLE `unsubscribe_types` ENABLE KEYS */;

-- Volcando estructura para tabla sait.unsubscribe_type_documents
CREATE TABLE IF NOT EXISTS `unsubscribe_type_documents` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `unsubscribe_type_id` bigint(20) unsigned NOT NULL,
  `document_id` bigint(20) unsigned NOT NULL,
  `is_deleted` enum('0','1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `unsubscribe_type_documents_unsubscribe_type_id_foreign` (`unsubscribe_type_id`),
  KEY `unsubscribe_type_documents_document_id_foreign` (`document_id`),
  CONSTRAINT `unsubscribe_type_documents_document_id_foreign` FOREIGN KEY (`document_id`) REFERENCES `documents` (`id`),
  CONSTRAINT `unsubscribe_type_documents_unsubscribe_type_id_foreign` FOREIGN KEY (`unsubscribe_type_id`) REFERENCES `unsubscribe_types` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sait.unsubscribe_type_documents: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `unsubscribe_type_documents` DISABLE KEYS */;
/*!40000 ALTER TABLE `unsubscribe_type_documents` ENABLE KEYS */;

-- Volcando estructura para tabla sait.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `agent_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_deleted` enum('0','1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_agent_id_foreign` (`agent_id`),
  CONSTRAINT `users_agent_id_foreign` FOREIGN KEY (`agent_id`) REFERENCES `agents` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sait.users: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
REPLACE INTO `users` (`id`, `agent_id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `is_deleted`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Superusuario', 'superusuario@sait.com', NULL, '$2y$10$W/FiqDCV6K1499yE0z/ug.41Bg9z9KCoK5QGOcLT2jz25LdmAbw4W', NULL, '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(2, 2, 'Supervisor', 'supervisor@sait.com', NULL, '$2y$10$4GuTLp26Ffg6nt.WGxqfQu.aZRyF0fZwmJ4hYqysypCx0PAnUvj1C', NULL, '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(3, 3, 'Administrativo', 'administrativo@sait.com', NULL, '$2y$10$2PfcBUIXg8niIDZ3xE0zZeY3xWpvZrC6F.vqZlAPBZC7QKvOKMSde', NULL, '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37'),
	(4, 4, 'Bedel', 'bedel@sait.com', NULL, '$2y$10$irXYg8dOAsE2jTYRRyuiq.bEy70aiKDhIACUeVj.LB8k3tZvjWVz.', NULL, '0', '2019-11-10 20:23:37', '2019-11-10 20:23:37');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Volcando estructura para tabla sait.years
CREATE TABLE IF NOT EXISTS `years` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `year` tinyint(3) unsigned NOT NULL,
  `is_deleted` enum('0','1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sait.years: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `years` DISABLE KEYS */;
/*!40000 ALTER TABLE `years` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
