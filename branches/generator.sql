SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


CREATE TABLE IF NOT EXISTS `formations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `json` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

INSERT INTO `formations` (`id`, `name`, `json`) VALUES
(3, '4-4-2', '{"players":[{"name":"","number":1,"x":"45px","y":"169px"},{"name":"","number":2,"x":"141px","y":"41px"},{"name":"","number":3,"x":"141px","y":"137px"},{"name":"","number":4,"x":"141px","y":"201px"},{"name":"","number":5,"x":"141px","y":"297px"},{"name":"","number":6,"x":"261px","y":"41px"},{"name":"","number":7,"x":"261px","y":"137px"},{"name":"","number":8,"x":"261px","y":"201px"},{"name":"","number":9,"x":"261px","y":"297px"},{"name":"","number":10,"x":"381px","y":"201px"},{"name":"","number":11,"x":"381px","y":"137px"}]}'),
(4, '4-2-3-1', '{"players":[{"name":"","number":1,"x":"45px","y":"169px"},{"name":"","number":2,"x":"117px","y":"41px"},{"name":"","number":3,"x":"117px","y":"137px"},{"name":"","number":4,"x":"117px","y":"201px"},{"name":"","number":5,"x":"117px","y":"297px"},{"name":"","number":6,"x":"213px","y":"201px"},{"name":"","number":7,"x":"213px","y":"105px"},{"name":"","number":8,"x":"333px","y":"265px"},{"name":"","number":9,"x":"309px","y":"169px"},{"name":"","number":10,"x":"333px","y":"73px"},{"name":"","number":11,"x":"405px","y":"169px"}]}'),
(5, '3-5-2', '{"players":[{"name":"","number":1,"x":"21px","y":"169px"},{"name":"","number":2,"x":"165px","y":"41px"},{"name":"","number":3,"x":"117px","y":"105px"},{"name":"","number":4,"x":"117px","y":"169px"},{"name":"","number":5,"x":"117px","y":"233px"},{"name":"","number":6,"x":"165px","y":"297px"},{"name":"","number":7,"x":"285px","y":"73px"},{"name":"","number":8,"x":"213px","y":"169px"},{"name":"","number":9,"x":"285px","y":"265px"},{"name":"","number":10,"x":"381px","y":"201px"},{"name":"","number":11,"x":"381px","y":"137px"}]}'),
(8, '4-4-1-1', '{"players":[{"name":"","number":1,"x":"45px","y":"169px"},{"name":"","number":2,"x":"141px","y":"41px"},{"name":"","number":3,"x":"141px","y":"137px"},{"name":"","number":4,"x":"141px","y":"201px"},{"name":"","number":5,"x":"141px","y":"297px"},{"name":"","number":6,"x":"261px","y":"41px"},{"name":"","number":7,"x":"261px","y":"137px"},{"name":"","number":8,"x":"261px","y":"201px"},{"name":"","number":9,"x":"261px","y":"297px"},{"name":"","number":10,"x":"405px","y":"169px"},{"name":"","number":11,"x":"333px","y":"169px"}]}'),
(9, '4-5-1', '{"players":[{"name":"","number":1,"x":"45px","y":"169px"},{"name":"","number":2,"x":"141px","y":"41px"},{"name":"","number":3,"x":"141px","y":"137px"},{"name":"","number":4,"x":"141px","y":"201px"},{"name":"","number":5,"x":"141px","y":"297px"},{"name":"","number":6,"x":"261px","y":"41px"},{"name":"","number":7,"x":"261px","y":"137px"},{"name":"","number":8,"x":"261px","y":"201px"},{"name":"","number":9,"x":"261px","y":"297px"},{"name":"","number":10,"x":"381px","y":"169px"},{"name":"","number":11,"x":"213px","y":"169px"}]}');

CREATE TABLE IF NOT EXISTS `players` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `team_id` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `nick` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `birthday` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=61 ;

INSERT INTO `players` (`id`, `team_id`, `number`, `name`, `nick`, `position`, `country`, `birthday`, `foto`) VALUES
(1, 1, 91, 'Воробьёв Александр Александрович', 'Воробьёв', 'вратарь', 'Россия', '14.04.1994', 'http://rus.rfpl.org/picturedb.php?module=player&id=16217&size=small'),
(2, 1, 97, 'Костриков Юрий Сергеевич', 'Костриков', 'вратарь', 'Россия', '27.03.1994', 'http://rus.rfpl.org/picturedb.php?module=player&id=15912&size=small'),
(3, 1, 22, 'Крешич Дарио ', 'Крешич', 'вратарь', 'Хорватия', '11.01.1984', 'http://rus.rfpl.org/picturedb.php?module=player&id=17119&size=small'),
(4, 1, 41, 'Лобанцев Мирослав Александрович', 'Лобанцев', 'вратарь', 'Россия', '27.05.1995', 'http://rus.rfpl.org/picturedb.php?module=player&id=16656&size=small'),
(5, 1, 1, 'Маринато Гилерме Алвим ', 'Гилерме', 'вратарь', 'Бразилия', '12.12.1985', 'http://rus.rfpl.org/picturedb.php?module=player&id=9434&size=small'),
(6, 1, 35, 'Фильцов Александр Евгеньевич', 'Фильцов', 'вратарь', 'Россия', '02.01.1990', 'http://rus.rfpl.org/picturedb.php?module=player&id=15788&size=small'),
(7, 1, 93, 'Барышников Денис Олегович', 'Барышников', 'защитник', 'Россия', '26.10.1995', 'http://rus.rfpl.org/picturedb.php?module=player&id=16686&size=small'),
(8, 1, 51, 'Беляев Максим Александрович', 'Беляев', 'защитник', 'Россия', '30.09.1991', 'http://rus.rfpl.org/picturedb.php?module=player&id=11324&size=small'),
(9, 1, 5, 'Бурлак Тарас Александрович', 'Бурлак', 'защитник', 'Россия', '22.02.1990', 'http://rus.rfpl.org/picturedb.php?module=player&id=8032&size=small'),
(10, 1, 57, 'Бурнаш Георгий Владимирович', 'Бурнаш', 'защитник', 'Россия', '08.08.1993', 'http://rus.rfpl.org/picturedb.php?module=player&id=16231&size=small'),
(11, 1, 28, 'Дюрица Ян ', 'Дюрица', 'защитник', 'Словакия', '10.12.1981', 'http://rus.rfpl.org/picturedb.php?module=player&id=4531&size=small'),
(12, 1, 50, 'Ещенко Андрей Олегович', 'Ещенко', 'защитник', 'Россия', '09.02.1984', 'http://rus.rfpl.org/picturedb.php?module=player&id=1916&size=small'),
(13, 1, 61, 'Зуйков Сергей Андреевич', 'Зуйков', 'защитник', 'Россия', '19.09.1993', 'http://rus.rfpl.org/picturedb.php?module=player&id=15786&size=small'),
(14, 1, 96, 'Линда Янис Игоревич', 'Линда', 'защитник', 'Россия', '01.03.1994', 'http://rus.rfpl.org/picturedb.php?module=player&id=17269&size=small'),
(15, 1, 79, 'Лысцов Виталий Александрович', 'Лысцов', 'защитник', 'Россия', '11.07.1995', 'http://rus.rfpl.org/picturedb.php?module=player&id=16684&size=small'),
(16, 1, 34, 'Мартынов Михаил Александрович', 'Мартынов', 'защитник', 'Россия', '01.02.1995', 'http://rus.rfpl.org/picturedb.php?module=player&id=16263&size=small'),
(17, 1, 95, 'Мурачёв Олег Алексеевич', 'Мурачёв', 'защитник', 'Россия', '22.02.1995', 'http://rus.rfpl.org/picturedb.php?module=player&id=16687&size=small'),
(18, 1, 67, 'Мустафин Темур Ильдарович', 'Мустафин', 'защитник', 'Россия', '15.04.1995', 'http://rus.rfpl.org/picturedb.php?module=player&id=16260&size=small'),
(19, 1, 75, 'Серасхов Александр Андреевич', 'Серасхов', 'защитник', 'Россия', '05.02.1994', 'http://rus.rfpl.org/picturedb.php?module=player&id=16225&size=small'),
(20, 1, 87, 'Смирнов Владимир Сергеевич', 'Смирнов', 'защитник', 'Россия', '09.10.1993', 'http://rus.rfpl.org/picturedb.php?module=player&id=16384&size=small'),
(21, 1, 48, 'Цвейба Сандро Ахрикович', 'Цвейба', 'защитник', 'Россия', '05.09.1993', 'http://rus.rfpl.org/picturedb.php?module=player&id=16228&size=small'),
(22, 1, 3, 'Циглер Рето Пирмин ', 'Циглер', 'защитник', 'Швейцария', '16.01.1986', 'http://rus.rfpl.org/picturedb.php?module=player&id=17202&size=small'),
(23, 1, 62, 'Чалов Даниил Николаевич', 'Чалов', 'защитник', 'Россия', '17.06.1994', 'http://rus.rfpl.org/picturedb.php?module=player&id=17270&size=small'),
(24, 1, 14, 'Чорлука Ведран ', 'Чорлука', 'защитник', 'Хорватия', '05.02.1986', 'http://rus.rfpl.org/picturedb.php?module=player&id=17001&size=small'),
(25, 1, 49, 'Шишкин Роман Александрович', 'Шишкин', 'защитник', 'Россия', '27.01.1987', 'http://rus.rfpl.org/picturedb.php?module=player&id=1025&size=small'),
(26, 1, 55, 'Янбаев Ренат Рудольфович', 'Янбаев', 'защитник', 'Россия', '07.04.1984', 'http://rus.rfpl.org/picturedb.php?module=player&id=684&size=small'),
(27, 1, 43, 'Ярковой Александр Александрович', 'Ярковой', 'защитник', 'Россия', '10.02.1993', 'http://rus.rfpl.org/picturedb.php?module=player&id=15750&size=small'),
(28, 1, 74, 'Барсов Максим Борисович', 'Барсов', 'нападающий', 'Россия', '29.04.1993', 'http://rus.rfpl.org/picturedb.php?module=player&id=15748&size=small'),
(29, 1, 90, 'Битенкурт Майкон Маркес ', 'Майкон', 'нападающий', 'Бразилия', '18.02.1990', 'http://rus.rfpl.org/picturedb.php?module=player&id=15716&size=small'),
(30, 1, 25, 'Кайседо Корозо Фелипе Сальвадор ', 'Кайседо', 'нападающий', 'Эквадор', '05.09.1988', 'http://rus.rfpl.org/picturedb.php?module=player&id=16640&size=small'),
(31, 1, 30, 'Корян Аршак Рафаэльевич', 'Корян', 'нападающий', 'Россия', '17.06.1995', 'http://rus.rfpl.org/picturedb.php?module=player&id=16810&size=small'),
(32, 1, 56, 'Курзенёв Алексей Александрович', 'Курзенёв', 'нападающий', 'Россия', '09.01.1995', 'http://rus.rfpl.org/picturedb.php?module=player&id=17002&size=small'),
(33, 1, 72, 'Муллин Камиль Шамилевич', 'Муллин', 'нападающий', 'Россия', '05.01.1994', 'http://rus.rfpl.org/picturedb.php?module=player&id=16850&size=small'),
(34, 1, 13, 'Нсофор Обинна Виктор ', 'Обинна', 'нападающий', 'Нигерия', '25.03.1987', 'http://rus.rfpl.org/picturedb.php?module=player&id=16627&size=small'),
(35, 1, 18, 'Павлюченко Роман Анатольевич', 'Павлюченко', 'нападающий', 'Россия', '15.12.1981', 'http://rus.rfpl.org/picturedb.php?module=player&id=1010&size=small'),
(36, 1, 11, 'Сычёв Дмитрий Евгеньевич', 'Сычёв', 'нападающий', 'Россия', '26.10.1983', 'http://rus.rfpl.org/picturedb.php?module=player&id=788&size=small'),
(37, 1, 69, 'Турик Алексей Николаевич', 'Турик', 'нападающий', 'Россия', '25.04.1995', 'http://rus.rfpl.org/picturedb.php?module=player&id=15783&size=small'),
(38, 1, 8, 'Глушаков Денис Борисович', 'Глушаков', 'полузащитник', 'Россия', '27.01.1987', 'http://rus.rfpl.org/picturedb.php?module=player&id=4574&size=small'),
(39, 1, 6, 'Григорьев Максим Сергеевич', 'Григорьев', 'полузащитник', 'Россия', '06.07.1990', 'http://rus.rfpl.org/picturedb.php?module=player&id=7748&size=small'),
(40, 1, 92, 'Дубчак Никита Кириллович', 'Дубчак', 'полузащитник', 'Россия', '12.08.1993', 'http://rus.rfpl.org/picturedb.php?module=player&id=16227&size=small'),
(41, 1, 94, 'Жижин Александр Дмитриевич', 'Жижин', 'полузащитник', 'Россия', '01.01.1994', 'http://rus.rfpl.org/picturedb.php?module=player&id=16383&size=small'),
(42, 1, 58, 'Закускин Александр Олегович', 'Закускин', 'полузащитник', 'Россия', '12.03.1993', 'http://rus.rfpl.org/picturedb.php?module=player&id=15828&size=small'),
(43, 1, 9, 'Ибричич Сенияд ', 'Ибричич', 'полузащитник', 'Хорватия', '26.09.1985', 'http://rus.rfpl.org/picturedb.php?module=player&id=16224&size=small'),
(44, 1, 78, 'Калинский Николай Николаевич', 'Калинский', 'полузащитник', 'Россия', '22.09.1993', 'http://rus.rfpl.org/picturedb.php?module=player&id=15749&size=small'),
(45, 1, 70, 'Кирисов Евгений Владимирович', 'Кирисов', 'полузащитник', 'Россия', '14.02.1994', 'http://rus.rfpl.org/picturedb.php?module=player&id=16226&size=small'),
(46, 1, 68, 'Ломакин Александр Владимирович', 'Ломакин', 'полузащитник', 'Россия', '14.02.1995', 'http://rus.rfpl.org/picturedb.php?module=player&id=15785&size=small'),
(47, 1, 10, 'Лоськов Дмитрий Вячеславович', 'Лоськов', 'полузащитник', 'Россия', '12.02.1974', 'http://rus.rfpl.org/picturedb.php?module=player&id=775&size=small'),
(48, 1, 59, 'Миранчук Алексей Андреевич', 'Миранчук Ал.', 'полузащитник', 'Россия', '17.10.1995', 'http://rus.rfpl.org/picturedb.php?module=player&id=16808&size=small'),
(49, 1, 60, 'Миранчук Антон Андреевич', 'Миранчук Ан.', 'полузащитник', 'Россия', '17.10.1995', 'http://rus.rfpl.org/picturedb.php?module=player&id=16809&size=small'),
(50, 1, 88, 'Михайленко Дмитрий Викторович', 'Михайленко', 'полузащитник', 'Россия', '06.01.1995', 'http://rus.rfpl.org/picturedb.php?module=player&id=16685&size=small'),
(51, 1, 27, 'Оздоев Магомед Мустафаевич', 'Оздоев', 'полузащитник', 'Россия', '05.11.1992', 'http://rus.rfpl.org/picturedb.php?module=player&id=9921&size=small'),
(52, 1, 65, 'Подберёзкин Вячеслав Михайлович', 'Подберёзкин', 'полузащитник', 'Россия', '21.06.1992', 'http://rus.rfpl.org/picturedb.php?module=player&id=16655&size=small'),
(53, 1, 81, 'Поляков Данила Алексеевич', 'Поляков', 'полузащитник', 'Россия', '09.06.1993', 'http://rus.rfpl.org/picturedb.php?module=player&id=16847&size=small'),
(54, 1, 38, 'Саламатов Никита Васильевич', 'Саламатов', 'полузащитник', 'Россия', '23.02.1994', 'http://rus.rfpl.org/picturedb.php?module=player&id=16760&size=small'),
(55, 1, 19, 'Самедов Александр Сергеевич', 'Самедов', 'полузащитник', 'Россия', '19.07.1984', 'http://rus.rfpl.org/picturedb.php?module=player&id=1016&size=small'),
(56, 1, 4, 'Сапатер Архол Альберт ', 'Сапатер', 'полузащитник', 'Испания', '13.06.1985', 'http://rus.rfpl.org/picturedb.php?module=player&id=16636&size=small'),
(57, 1, 23, 'Тарасов Дмитрий Алексеевич', 'Тарасов', 'полузащитник', 'Россия', '18.03.1987', 'http://rus.rfpl.org/picturedb.php?module=player&id=1608&size=small'),
(58, 1, 26, 'Тигорев Ян Александрович', 'Тигорев', 'полузащитник', 'Беларусь', '10.03.1984', 'http://rus.rfpl.org/picturedb.php?module=player&id=16297&size=small'),
(59, 1, 21, 'Торбинский Дмитрий Евгеньевич', 'Торбинский', 'полузащитник', 'Россия', '28.04.1984', 'http://rus.rfpl.org/picturedb.php?module=player&id=1021&size=small'),
(60, 1, 63, 'Хартияди Панайот Дмитриевич', 'Хартияди', 'полузащитник', 'Россия', '07.05.1993', 'http://rus.rfpl.org/picturedb.php?module=player&id=16265&size=small');

CREATE TABLE IF NOT EXISTS `teams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT 'Название команды',
  `logo` varchar(255) NOT NULL COMMENT 'Ссылка на логотип',
  `url` varchar(255) NOT NULL COMMENT 'Ссылка на команду на соккер.ру',
  `tshirts` varchar(255) NOT NULL COMMENT 'ссылка на футболку',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

INSERT INTO `teams` (`id`, `name`, `logo`, `url`, `tshirts`) VALUES
(1, 'Локомотив', 'http://rus.rfpl.org/img/clubs-big/lokomotiv.png', 'http://rus.rfpl.org/index.php/club/clubmap/lokomotiv', 'loko.png');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
