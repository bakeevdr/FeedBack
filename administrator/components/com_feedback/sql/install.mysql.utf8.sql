SET FOREIGN_KEY_CHECKS=0;

-- --------------------------------------------------------
-- Структура таблицы `Тип отзыва`
CREATE TABLE IF NOT EXISTS `#__FeedBack_Type` (
	`id`				int(11)			NOT NULL	AUTO_INCREMENT 		COMMENT 'Уникальный идентификатор',
	`name`				varchar(20)		NOT NULL						COMMENT 'Наименование',
	
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Тип отзыва';

insert into `#__FeedBack_Type` value 
	(1,'Идея'),
	(2,'Проблема'),
	(3,'Вопрос'),
	(4,'Благодарность');
	
-- --------------------------------------------------------
-- Структура таблицы `Тип отзыва`
CREATE TABLE IF NOT EXISTS `#__feedback_region` (
	`code`			int(11)			NOT NULL							COMMENT 'Код',
	`subject_rf`	varchar(50)		NOT NULL							COMMENT 'Наименование',
	`type`			varchar(5)		NOT NULL							COMMENT 'Тип',
	`genitive_case`	varchar(50)		NOT NULL							COMMENT 'Полное наименование',
	`full_name`		varchar(50)		NOT NULL							COMMENT 'Наименование в родительском падеже',
	PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Субъекты Российской Федерации';

insert into `#__feedback_region` value 
	('1','Адыгея','респ','республике Адыгея','Республика Адыгея'),
	('2','Башкортостан','респ','республике Башкортостан','Республика Башкортостан'),
	('3','Бурятия','респ','республике Бурятия','Республика Бурятия'),
	('4','Алтай','респ','республике Алтай','Республика Алтай'),
	('5','Дагестан','респ','республике Дагестан','Республика Дагестан'),
	('6','Ингушетия','респ','республике Ингушетия','Республика Ингушетия'),
	('7','Кабардино-Балкарская','респ','Кабардино-Балкарской республике','Кабардино-Балкарская Республика'),
	('8','Калмыкия','респ','республике Калмыкия','Республика Калмыкия'),
	('9','Карачаево-Черкесская','респ','Карачаево-Черкесской республике','Карачаево-Черкесская Республика'),
	('10','Карелия','респ','республике Карелия','Республика Карелия'),
	('11','Коми','респ','республике Коми','Республика Коми'),
	('12','Марий Эл','респ','республике Марий Эл','Республика Марий Эл'),
	('13','Мордовия','респ','республике Мордовия','Республика Мордовия'),
	('14','Саха (Якутия)','респ','республике Саха (Якутия)','Республика Саха (Якутия)'),
	('15','Северная Осетия - Алания','респ','республике Северная Осетия - Алания','Республика Северная Осетия-Алания'),
	('16','Татарстан','респ','республике Татарстан','Республика Татарстан'),
	('17','Тыва','респ','республике Тыва','Республика Тыва'),
	('18','Удмуртская','респ','Удмуртской республике','Удмуртская Республика'),
	('19','Хакасия','респ','республике Хакасия','Республика Хакасия'),
	('20','Чеченская','респ','Чеченской республике','Чеченская Республика'),
	('21','Чувашская Республика -','Чувашия','Чувашской республике - Чувашии','Чувашская Республика - Чувашия'),
	('22','Алтайский','край','Алтайскому краю','Алтайский край'),
	('23','Краснодарский','край','Краснодарскому краю','Краснодарский край'),
	('24','Красноярский','край','Красноярскому краю','Красноярский край'),
	('25','Приморский','край','Приморскому краю','Приморский край'),
	('26','Ставропольский','край','Ставропольскому краю','Ставропольский край'),
	('27','Хабаровский','край','Хабаровскому краю','Хабаровский край'),
	('28','Амурская','обл','Амурской области','Амурская область'),
	('29','Архангельская','обл','Архангельской области','Архангельская область'),
	('30','Астраханская','обл','Астраханской области','Астраханская область'),
	('31','Белгородская','обл','Белгородской области','Белгородская область'),
	('32','Брянская','обл','Брянской области','Брянская область'),
	('33','Владимирская','обл','Владимирской области','Владимирская область'),
	('34','Волгоградская','обл','Волгоградской области','Волгоградская область'),
	('35','Вологодская','обл','Вологодской области','Вологодская область'),
	('36','Воронежская','обл','Воронежской области','Воронежская область'),
	('37','Ивановская','обл','Ивановской области','Ивановская область'),
	('38','Иркутская','обл','Иркутской области','Иркутская область'),
	('39','Калининградская','обл','Калининградской области','Калининградская область'),
	('40','Калужская','обл','Калужской области','Калужская область'),
	('41','Камчатский','край','Камчатского края','Камчатский край'),
	('42','Кемеровская','обл','Кемеровской области','Кемеровская область'),
	('43','Кировская','обл','Кировской области','Кировская область'),
	('44','Костромская','обл','Костромской области','Костромская область'),
	('45','Курганская','обл','Курганской области','Курганская область'),
	('46','Курская','обл','Курской области','Курская область'),
	('47','Ленинградская','обл','Ленинградской области','Ленинградская область'),
	('48','Липецкая','обл','Липецкой области','Липецкая область'),
	('49','Магаданская','обл','Магаданской области','Магаданская область'),
	('50','Московская','обл','Московской области','Московская область'),
	('51','Мурманская','обл','Мурманской области','Мурманская область'),
	('52','Нижегородская','обл','Нижегородской области','Нижегородская область'),
	('53','Новгородская','обл','Новгородской области','Новгородская область'),
	('54','Новосибирская','обл','Новосибирской области','Новосибирская область'),
	('55','Омская','обл','Омской области','Омская область'),
	('56','Оренбургская','обл','Оренбургской области','Оренбургская область'),
	('57','Орловская','обл','Орловской области','Орловская область'),
	('58','Пензенская','обл','Пензенской области','Пензенская область'),
	('59','Пермский','край','Пермского края','Пермский край'),
	('60','Псковская','обл','Псковской области','Псковская область'),
	('61','Ростовская','обл','Ростовской области','Ростовская область'),
	('62','Рязанская','обл','Рязанской области','Рязанская область'),
	('63','Самарская','обл','Самарской области','Самарская область'),
	('64','Саратовская','обл','Саратовской области','Саратовская область'),
	('65','Сахалинская','обл','Сахалинской области','Сахалинская область'),
	('66','Свердловская','обл','Свердловской области','Свердловская область'),
	('67','Смоленская','обл','Смоленской области','Смоленская область'),
	('68','Тамбовская','обл','Тамбовской области','Тамбовская область'),
	('69','Тверская','обл','Тверской области','Тверская область'),
	('70','Томская','обл','Томской области','Томская область'),
	('71','Тульская','обл','Тульской области','Тульская область'),
	('72','Тюменская','обл','Тюменской области','Тюменская область'),
	('73','Ульяновская','обл','Ульяновской области','Ульяновская область'),
	('74','Челябинская','обл','Челябинской области','Челябинская область'),
	('75','Забайкальский','край','Забайкальского края','Забайкальский край'),
	('76','Ярославская','обл','Ярославской области','Ярославская область'),
	('77','Москва','г','городу Москве','Москва'),
	('78','Санкт-Петербург','г','городу Санкт-Петербургу','Санкт-Петербург'),
	('79','Еврейская','Аобл','Еврейской автономной области','Еврейская автономная область'),
	('80','Агинский Бурятский','АО','Агинскому Бурятскому автономному округу',''),
	('81','Коми-Пермяцкий','АО','Коми-Пермяцкому автономному округу',''),
	('82','Корякский','АО','Корякскому автономному округу',''),
	('83','Ненецкий','АО','Ненецкому автономному округу','Ненецкий автономный округ'),
	('84','Таймырский (Долгано-Ненецкий)','АО','Таймырскому (Долгано-Ненецкому) автономному округу',''),
	('85','Усть-Ордынский Бурятский','АО','Усть-Ордынскому Бурятскому автономному округу',''),
	('86','Ханты-Мансийский Автономный округ - Югра','АО','Ханты-Мансийскому автономному округу - Югре','Ханты-Мансийский автономный округ - Югра'),
	('87','Чукотский','АО','Чукотскому автономному округу','Чукотский автономный округ'),
	('88','Эвенкийский','АО','Эвенкийскому автономному округу',''),
	('89','Ямало-Ненецкий','АО','Ямало-Ненецкому автономному округу','Ямало-Ненецкий автономный округ'),
	('91','Крым','респ','республике Крым','Республика Крым'),
	('92','Севастополь','г','городу Севастополь','Севастополь');

-- --------------------------------------------------------
-- Структура таблицы `Status`
CREATE TABLE IF NOT EXISTS `#__FeedBack_Status` (
	`id`				int(11)			NOT NULL	AUTO_INCREMENT		COMMENT 'Уникальный идентификатор',
	`name`				varchar(20)		NOT NULL						COMMENT 'Название',
	`color`				varchar(10)		NOT NULL DEFAULT '#999'			COMMENT 'Цвет заливки',
	
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Статус обработи отзыва';

insert into `#__FeedBack_Status` value 
	(1,'Подан','#999'),
	(2,'На расcмотрении','#5bc0de'),
	(3,'В работе','#428bca'),
	(4,'Выполнно','#5cb85c'),
	(5,'Отвергнут','#d9534f');

-- ----------------------------------------------------------------------------------------------------------------
-- Структура таблицы `Project`
CREATE TABLE IF NOT EXISTS `#__FeedBack_Project` (
	`id`			int(11)				NOT NULL	AUTO_INCREMENT		COMMENT 'Уникальный идентификатор',
	`name`			varchar(100)		NOT NULL						COMMENT 'Название',
	`wwwsite`		varchar(100)		NOT NULL						COMMENT 'Место размещения',
	`manager_id`	int(11)				NOT NULL						COMMENT 'Основной менеджер',
	`description`	text				NOT NULL						COMMENT 'Краткое описание',
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Проекты';

insert into `#__FeedBack_Project` value 
	(1,'Отзовик','My site',173,'.');

-- --------------------------------------------------------
-- Структура таблицы `Категории`
CREATE TABLE IF NOT EXISTS `#__FeedBack_Category` (
	`id`				int(11)			NOT NULL	AUTO_INCREMENT		COMMENT 'Уникальный идентификатор',
	`project_id`		int(11)			NOT NULL						COMMENT 'Идентификатор проэкта',
	`parent_id`			int(11)											COMMENT 'Родительская категория',
	`name`				varchar(100)	NOT NULL						COMMENT 'Название',
	
	PRIMARY KEY (`id`),
	KEY `project_id` (`project_id`),
	KEY `parent_id` (`parent_id`),
	
	FOREIGN KEY (`parent_id`)	REFERENCES `#__FeedBack_Category` (`id`)	ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (`project_id`)	REFERENCES `#__FeedBack_Project` (`id`)		ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Категории';

-- ----------------------------------------------------------------------------------------------------------------
-- Структура таблицы `Пользователи`
CREATE TABLE IF NOT EXISTS `#__FeedBack_User` (
	`id`			int(11)				NOT NULL	AUTO_INCREMENT		COMMENT 'Уникальный идентификатор',
	`sys_id`		int(11)												COMMENT 'Системный пользователь',
	`name`			varchar(100)		NOT NULL	DEFAULT 'Гость'		COMMENT 'Выводимое имя',
	`name_change`	tinyint(1)			NOT NULL 	DEFAULT 0			COMMENT 'Признак смены имени',
	`ip`			varchar(15)			NOT NULL						COMMENT 'Текущий IP адрес',
	`date_ip`		datetime			NOT NULL	DEFAULT CURRENT_TIMESTAMP COMMENT 'дата установки IP',
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Пользователи';

-- ----------------------------------------------------------------------------------------------------------------
-- Структура таблицы `Отзывы`
CREATE TABLE IF NOT EXISTS `#__FeedBack` (
	`id`			int(11)				NOT NULL	AUTO_INCREMENT		COMMENT 'Уникальный идентификатор',
	`project_id`	int(11)				NOT NULL						COMMENT 'ID проэкта',
	`category_id`	int(11)												COMMENT 'ID категории',
	`type_id`		int(11)				NOT NULL						COMMENT 'ID типа отзыва',
	`status_id`		int(11)				NOT NULL	DEFAULT 1			COMMENT 'ID статуса выполнения',
	`user_id`		int(11)				NOT NULL						COMMENT 'ID пользователя',
	`title`			varchar(100)		NOT NULL						COMMENT 'Краткое наименование отзыва',
	`description`	text												COMMENT 'Описание отзыва',
	`hide`			tinyint(1)			NOT NULL						COMMENT 'Скрытое',
	`date`			datetime			NOT NULL	DEFAULT CURRENT_TIMESTAMP COMMENT 'Дата создания',
	
	PRIMARY KEY (`id`),
	KEY `project_id` (`project_id`),
	KEY `category_id` (`category_id`),
	KEY `type_id` (`type_id`),
	KEY `status_id` (`status_id`),
	KEY `user_id` (`user_id`),
	
	FOREIGN KEY (`project_id`)	REFERENCES `#__FeedBack_Project` (`id`)		ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (`category_id`)	REFERENCES `#__FeedBack_Category` (`id`)	ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (`type_id`)		REFERENCES `#__FeedBack_Type` (`id`),
	FOREIGN KEY (`status_id`)	REFERENCES `#__FeedBack_Status` (`id`),
	FOREIGN KEY (`user_id`)		REFERENCES `#__FeedBack_User` (`id`)		ON DELETE CASCADE ON UPDATE CASCADE
	
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Отзывы';

-- ----------------------------------------------------------------------------------------------------------------
-- Структура таблицы `Голосование за отзыв`
CREATE TABLE IF NOT EXISTS `#__FeedBack_Vote` (
	`id`			int(11)				NOT NULL	AUTO_INCREMENT		COMMENT 'Уникальный идентификатор',
	`feedback_id`	int(11)				NOT NULL						COMMENT 'ID отзыва',
	`user_id`		int(11)				NOT NULL						COMMENT 'ID проголосовавшегося пользователя',
	`status`		TINYINT 			NOT NULL 	DEFAULT '0'			COMMENT 'Голос',
	PRIMARY KEY (`id`),
	KEY `feedback_id` (`feedback_id`),
	FOREIGN KEY (`feedback_id`)	REFERENCES `#__FeedBack` (`id`)		ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Голосование за отзыв';

-- ----------------------------------------------------------------------------------------------------------------
-- Структура таблицы `Комментарии`
CREATE TABLE IF NOT EXISTS `#__FeedBack_Comment` (
	`id`				int(11)			NOT NULL	AUTO_INCREMENT		COMMENT 'Уникальный идентификатор',
	`feedback_id`		int(11)			NOT NULL						COMMENT 'ID отзыва',
	`parent_id`			int(11)											COMMENT 'Родительский коментарий',
	`user_id`			int(11)			NOT NULL						COMMENT 'ID пользователя',
	`date`				datetime		NOT NULL	DEFAULT CURRENT_TIMESTAMP COMMENT 'Дата коментария',
	`comment`			text 			NOT NULL						COMMENT 'Коментарий',
	`answer`			TINYINT			NOT NULL	DEFAULT '0'			COMMENT 'Признак правильного ответа',
	
	PRIMARY KEY (`id`),
	KEY `feedback_id` (`feedback_id`),
	KEY `parent_id` (`parent_id`),
	KEY `user_id` (`user_id`),
	
	FOREIGN KEY (`parent_id`)	REFERENCES `#__FeedBack_Comment` (`id`)		ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (`feedback_id`)	REFERENCES `#__FeedBack` (`id`)				ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (`user_id`)		REFERENCES `#__FeedBack_User` (`id`)		ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Комментарии';

-- ----------------------------------------------------------------------------------------------------------------
-- Структура таблицы `Голосование за коментарий`
CREATE TABLE IF NOT EXISTS `#__FeedBack_Comment_Vote` (
	`id`			int(11)				NOT NULL	AUTO_INCREMENT		COMMENT 'Уникальный идентификатор',
	`comment_id`	int(11)				NOT NULL						COMMENT 'ID коментария',
	`user_id`		int(11)				NOT NULL						COMMENT 'ID пользователя',
	`status`		TINYINT 			NOT NULL 	DEFAULT '0'			COMMENT 'Голос',
	PRIMARY KEY (`id`),
	KEY `comment_id` (`comment_id`),
	FOREIGN KEY (`comment_id`)	REFERENCES `#__FeedBack_Comment` (`id`)		ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Голосование за коментарий';

SET FOREIGN_KEY_CHECKS=1;