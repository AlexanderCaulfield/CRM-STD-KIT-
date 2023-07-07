-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 07 2023 г., 10:46
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `STD-KIT`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Otzyvy`
--

CREATE TABLE `Otzyvy` (
  `id_Otzyv` int NOT NULL,
  `Praktikant_Otzyv` int NOT NULL,
  `Text_Otzyv` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `Otzyvy`
--

INSERT INTO `Otzyvy` (`id_Otzyv`, `Praktikant_Otzyv`, `Text_Otzyv`) VALUES
(4, 2, 'Студент проявил(а) оживленный интерес к работе в области разработки интернет-сайтов и продемонстрировал(а) хорошие способности в области программирования и других аспектах, связанных с профильной деятельностью нашего предприятия. В течение практики студент демонстрировал(а) отличное усвоение теоретических знаний и умение применять их на практике. Благодаря хорошей учебной базе, он(а) справлялся(лась) с поставленными перед ним(ней) задачами эффективно и качественно.');

-- --------------------------------------------------------

--
-- Структура таблицы `Praktikanty`
--

CREATE TABLE `Praktikanty` (
  `id_Praktikant` int NOT NULL,
  `Fio_Praktikant` varchar(100) NOT NULL,
  `Deyatelnost_Praktikant` varchar(100) NOT NULL,
  `Telephon_Praktikant` varchar(12) NOT NULL,
  `Pochta_Praktikant` varchar(60) NOT NULL,
  `Universitet_Praktikant` int NOT NULL,
  `Fakultet_Praktikant` varchar(60) NOT NULL,
  `Kurs_Praktikant` int NOT NULL,
  `Gruppa_Praktikant` varchar(10) NOT NULL,
  `NachaloPraktiki_Praktikant` date NOT NULL,
  `KonecPraktiki_Praktikant` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `Praktikanty`
--

INSERT INTO `Praktikanty` (`id_Praktikant`, `Fio_Praktikant`, `Deyatelnost_Praktikant`, `Telephon_Praktikant`, `Pochta_Praktikant`, `Universitet_Praktikant`, `Fakultet_Praktikant`, `Kurs_Praktikant`, `Gruppa_Praktikant`, `NachaloPraktiki_Praktikant`, `KonecPraktiki_Praktikant`) VALUES
(1, 'Ткаченко Александр Владимирович', 'Разработка', '+79885092521', 'alex.caulfield0@gmail.com', 1, 'Прикладная информатика', 3, 'ПИ2002', '2023-06-19', '2023-07-14'),
(2, 'Жмышенко Валерий Альбертович', 'Дизайн', '+78005553535', 'zhmyshenko.albert@gmail.com', 2, 'Информатика и вычислительная техника', 2, 'ИВ2101', '2023-06-19', '2023-07-14'),
(3, 'Мильковский Евгений Геннадьевич', 'Контент-менеджмент', '+79603554671', 'evgeniy.milkovskiy@mail.ru', 3, 'Прикладная математика', 3, 'ПМ2004', '2023-06-19', '2023-07-15'),
(4, 'Сомусева Софья Алексеевна', 'Маркетолог', '+79284539512', 'somuseva.sofia@yandex.ru', 1, 'Прикладная информатика', 2, 'ИТ2001', '2023-06-19', '2023-07-15'),
(5, 'Олешева Алина Евгеньевна', 'Разработка', '+79615356287', 'olesheva.alina@gmail.com', 2, 'Информатика и вычислительная техника', 3, 'ИВ2101', '2023-06-19', '2023-07-15');

-- --------------------------------------------------------

--
-- Структура таблицы `SpisokZadach`
--

CREATE TABLE `SpisokZadach` (
  `id_SpisokZadach` int NOT NULL,
  `Tip_SpisokZadach` int NOT NULL,
  `Praktikant_SpisokZadach` int NOT NULL,
  `Imya_SpisokZadach` varchar(60) NOT NULL,
  `Opisaniye_SpisokZadach` varchar(200) NOT NULL,
  `DataNachalo_SpisokZadach` date NOT NULL,
  `DataKonec_SpisokZadach` date NOT NULL,
  `Status_SpisokZadach` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `SpisokZadach`
--

INSERT INTO `SpisokZadach` (`id_SpisokZadach`, `Tip_SpisokZadach`, `Praktikant_SpisokZadach`, `Imya_SpisokZadach`, `Opisaniye_SpisokZadach`, `DataNachalo_SpisokZadach`, `DataKonec_SpisokZadach`, `Status_SpisokZadach`) VALUES
(3, 1, 1, 'CRM-система', 'Создать CRM-систему для управления задачами практикантов', '2023-06-26', '2023-06-30', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `StatusyZadach`
--

CREATE TABLE `StatusyZadach` (
  `id_StatusZadach` int NOT NULL,
  `Imya_StatusZadach` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `StatusyZadach`
--

INSERT INTO `StatusyZadach` (`id_StatusZadach`, `Imya_StatusZadach`) VALUES
(1, 'В работе'),
(2, 'Выполнено');

-- --------------------------------------------------------

--
-- Структура таблицы `TipyZadach`
--

CREATE TABLE `TipyZadach` (
  `id_TipZadach` int NOT NULL,
  `Imya_TipZadach` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `TipyZadach`
--

INSERT INTO `TipyZadach` (`id_TipZadach`, `Imya_TipZadach`) VALUES
(1, 'Разработка'),
(2, 'Дизайн');

-- --------------------------------------------------------

--
-- Структура таблицы `Universitety`
--

CREATE TABLE `Universitety` (
  `id_Universitet` int NOT NULL,
  `Imya_Universitet` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `Universitety`
--

INSERT INTO `Universitety` (`id_Universitet`, `Imya_Universitet`) VALUES
(1, 'Кубанский государственный аграрный университет имени И. Т. Трубилина'),
(2, 'Кубанский государственный технологический университет'),
(3, 'Кубанский государственный университет');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Otzyvy`
--
ALTER TABLE `Otzyvy`
  ADD PRIMARY KEY (`id_Otzyv`),
  ADD KEY `Praktikant_Otzyv` (`Praktikant_Otzyv`);

--
-- Индексы таблицы `Praktikanty`
--
ALTER TABLE `Praktikanty`
  ADD PRIMARY KEY (`id_Praktikant`),
  ADD KEY `Universitet_Praktikant` (`Universitet_Praktikant`);

--
-- Индексы таблицы `SpisokZadach`
--
ALTER TABLE `SpisokZadach`
  ADD PRIMARY KEY (`id_SpisokZadach`),
  ADD KEY `Praktikant_SpisokZadach` (`Praktikant_SpisokZadach`),
  ADD KEY `Status_SpisokZadach` (`Status_SpisokZadach`),
  ADD KEY `Tip_SpisokZadach` (`Tip_SpisokZadach`);

--
-- Индексы таблицы `StatusyZadach`
--
ALTER TABLE `StatusyZadach`
  ADD PRIMARY KEY (`id_StatusZadach`);

--
-- Индексы таблицы `TipyZadach`
--
ALTER TABLE `TipyZadach`
  ADD PRIMARY KEY (`id_TipZadach`);

--
-- Индексы таблицы `Universitety`
--
ALTER TABLE `Universitety`
  ADD PRIMARY KEY (`id_Universitet`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Otzyvy`
--
ALTER TABLE `Otzyvy`
  MODIFY `id_Otzyv` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `Praktikanty`
--
ALTER TABLE `Praktikanty`
  MODIFY `id_Praktikant` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `SpisokZadach`
--
ALTER TABLE `SpisokZadach`
  MODIFY `id_SpisokZadach` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `StatusyZadach`
--
ALTER TABLE `StatusyZadach`
  MODIFY `id_StatusZadach` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `TipyZadach`
--
ALTER TABLE `TipyZadach`
  MODIFY `id_TipZadach` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `Universitety`
--
ALTER TABLE `Universitety`
  MODIFY `id_Universitet` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `Otzyvy`
--
ALTER TABLE `Otzyvy`
  ADD CONSTRAINT `otzyvy_ibfk_1` FOREIGN KEY (`Praktikant_Otzyv`) REFERENCES `Praktikanty` (`id_Praktikant`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `Praktikanty`
--
ALTER TABLE `Praktikanty`
  ADD CONSTRAINT `praktikanty_ibfk_1` FOREIGN KEY (`Universitet_Praktikant`) REFERENCES `Universitety` (`id_Universitet`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `SpisokZadach`
--
ALTER TABLE `SpisokZadach`
  ADD CONSTRAINT `spisokzadach_ibfk_1` FOREIGN KEY (`Praktikant_SpisokZadach`) REFERENCES `Praktikanty` (`id_Praktikant`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `spisokzadach_ibfk_3` FOREIGN KEY (`Status_SpisokZadach`) REFERENCES `StatusyZadach` (`id_StatusZadach`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `spisokzadach_ibfk_4` FOREIGN KEY (`Tip_SpisokZadach`) REFERENCES `TipyZadach` (`id_TipZadach`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
