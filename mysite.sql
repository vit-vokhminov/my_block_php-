-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 26 2022 г., 18:00
-- Версия сервера: 5.7.33
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `mysite`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(12) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `page` int(10) NOT NULL,
  `email` varchar(110) NOT NULL,
  `comment` text NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `status`, `page`, `email`, `comment`, `created_date`) VALUES
(1, 1, 7, 'admin@test.test', 'ичество символов внутри комментаричество символов внутри комментар', '2022-09-25 20:34:15'),
(2, 0, 7, 'email@email.ru', '11111111111111111111', '2022-09-25 20:05:04'),
(3, 1, 7, 'email@email.ru', '11111112221111111111111', '2022-09-25 20:34:48'),
(4, 0, 7, 'admin@test.test', 'dwdwddwdwdwdwdwdwd', '2022-09-25 20:32:58'),
(5, 1, 7, 'admin@test.test', 'dwdw3232323ddwdwdwdwdwdwd', '2022-09-25 20:34:57'),
(6, 1, 7, 'admin@test.test', 'dwdwddwdwdwdwdwdwd', '2022-09-25 20:08:42'),
(7, 1, 7, 'email@email.ru', '77777', '2022-09-25 20:36:33'),
(8, 0, 7, 'email@email.ru', '77777', '2022-09-25 20:36:39'),
(9, 1, 7, 'admin@test.test', '66666666666', '2022-09-25 20:39:06');

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int(12) NOT NULL,
  `id_user` int(12) NOT NULL,
  `title` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  `id_topic` int(12) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `id_user`, `title`, `img`, `content`, `status`, `id_topic`, `created_date`) VALUES
(2, 19, 'Только кровь стынет в жилах', '1664204246_285f172fc25ef36d33ac.jpg', 'Разнообразный и богатый опыт говорит нам, что постоянный количественный рост и сфера нашей активности позволяет оценить значение системы массового участия. Как уже неоднократно упомянуто, тщательные исследования конкурентов являются только методом политического участия и функционально разнесены на независимые элементы. В своём стремлении улучшить пользовательский опыт мы упускаем, что ключевые особенности структуры проекта призваны к ответу!\r\nПовседневная практика показывает, что экономическая повестка сегодняшнего дня напрямую зависит от новых предложений. Принимая во внимание показатели успешности, реализация намеченных плановых заданий позволяет оценить значение модели развития. Но высокое качество позиционных исследований обеспечивает широкому кругу (специалистов) участие в формировании системы обучения кадров, соответствующей насущным потребностям.', 1, 6, '2022-09-22 17:05:30'),
(3, 19, 'Выбранный нами инновационный путь так же органично вписывается в наши планы', '1664204020_2048x1280_1123907e.jpg', 'Господа, постоянный количественный рост и сфера нашей активности выявляет срочную потребность глубокомысленных рассуждений. Также как разбавленное изрядной долей эмпатии, рациональное мышление позволяет оценить значение существующих финансовых и административных условий. Задача организации, в особенности же укрепление и развитие внутренней структуры представляет собой интересный эксперимент проверки приоретизации разума над эмоциями.', 1, 2, '2022-09-22 17:53:48'),
(4, 19, 'Сложно сказать, почему обереги никого не защитили', '1664204180_1636001514_3838.jpg', 'Являясь всего лишь частью общей картины, предприниматели в сети интернет и по сей день остаются уделом либералов, которые жаждут быть рассмотрены исключительно в разрезе маркетинговых и финансовых предпосылок. Господа, высокотехнологичная концепция общественного уклада играет важную роль в формировании своевременного выполнения сверхзадачи. Как уже неоднократно упомянуто, действия представителей оппозиции и по сей день остаются уделом либералов, которые жаждут быть подвергнуты целой серии независимых исследований.', 1, 6, '2022-09-22 18:47:26'),
(5, 19, 'Светлый лик правового взаимодействия определил дальнейшее развитие', '1664204042_1637014289_11.jpg', 'Кстати, действия представителей оппозиции ассоциативно распределены по отраслям. С учётом сложившейся международной обстановки, курс на социально-ориентированный национальный проект напрямую зависит от своевременного выполнения сверхзадачи. Ясность нашей позиции очевидна: новая модель организационной деятельности требует определения и уточнения позиций, занимаемых участниками в отношении поставленных задач.', 1, 2, '2022-09-22 19:14:14'),
(6, 19, 'Принцип работы генератора бредотекста', '1664204055_1646999940_1646999933.jpg', '<p>Генерация рыбатекста происходит довольно просто: есть несколько фиксированных наборов фраз и словочетаний, из которых в опредёленном порядке формируются предложения. Предложения складываются в абзацы — и вы наслаждетесь очередным бредошедевром.</p><p>Сама идея работы генератора заимствована у псевдосоветского \"универсального кода речей\", из которого мы выдернули используемые в нём словосочетания, запилили приличное количество собственных, в несколько раз усложнили алгоритм, добавив новые схемы сборки, — и оформили в виде быстрого и удобного сервиса для получения тестового контента.</p>', 1, 2, '2022-09-23 15:10:04'),
(7, 19, 'Новая модель организационной деятельности станет частью наших традиций', '1664204069_1647000017_6.jpg', 'В своём стремлении повысить качество жизни, они забывают, что сплочённость команды профессионалов напрямую зависит от дальнейших направлений развития. Принимая во внимание показатели успешности, сложившаяся структура организации напрямую зависит от прогресса профессионального сообщества. Как уже неоднократно упомянуто, ключевые особенности структуры проекта являются только методом политического участия и смешаны с не уникальными данными до степени совершенной неузнаваемости, из-за чего возрастает их статус бесполезности.', 1, 2, '2022-09-23 15:10:31'),
(8, 19, 'Если вам есть, что сказать', '1664204084_15014888625971b8.jpg', '<p>Сама того не зная, в процессе становления идеи и реализации проекта принимала активное участие Гильдия Вольных Проектировщиков, за что ей огромное спасибо. Комрады, вы реально лучшие.<br>Ну и отдельного упоминания заслужили аналогичные сервисы по генерации случайного контента (как российские, так и зарубежные): мы честно подсмотрели несколько идей. Ребята, примите нашу искреннюю благодарность — если бы ваши сайты были удобны и всегда доступны, мы бы никогда не сели за создание этого. </p>', 1, 2, '2022-09-23 15:11:42'),
(9, 19, 'Сложно сказать, почему сознание наших соотечественников не замутнено пропагандой', '1664204215_fonstola.jpg', '<p>Банальные, но неопровержимые выводы, а также ключевые особенности структуры проекта призывают нас к новым свершениям, которые, в свою очередь, должны быть превращены в посмешище, хотя само их существование приносит несомненную пользу обществу. Имеется спорная точка зрения, гласящая примерно следующее: представители современных социальных резервов лишь добавляют фракционных разногласий и объективно рассмотрены соответствующими инстанциями. Значимость этих проблем настолько очевидна, что глубокий уровень погружения обеспечивает актуальность экспериментов, поражающих по своей масштабности и грандиозности.</p>', 1, 6, '2022-09-26 18:17:34'),
(10, 19, 'Нашу победу сопровождал треск разлетающихся скреп', '1664204279_fonstola.ru_421254.jpg', '<p>Но многие известные личности, превозмогая сложившуюся непростую экономическую ситуацию, смешаны с не уникальными данными до степени совершенной неузнаваемости, из-за чего возрастает их статус бесполезности. И нет сомнений, что некоторые особенности внутренней политики набирают популярность среди определенных слоев населения, а значит, должны быть представлены в исключительно положительном свете. Следует отметить, что существующая теория требует определения и уточнения укрепления моральных ценностей.</p>', 1, 3, '2022-09-26 21:49:22');

-- --------------------------------------------------------

--
-- Структура таблицы `topics`
--

CREATE TABLE `topics` (
  `id` int(12) NOT NULL,
  `name` varchar(126) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `topics`
--

INSERT INTO `topics` (`id`, `name`, `description`) VALUES
(2, 'Спорт', 'Всякое про спорт'),
(3, 'Работа', 'Всякое о работе'),
(6, 'Top topics', 'Статьи для слайдера');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(12) NOT NULL,
  `admin` tinyint(4) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `admin`, `username`, `email`, `password`, `created`) VALUES
(1, 1, 'Виталя', 'vit@email.ru', '$2y$10$PtsO9eudyOtosF9s87iP3OjOhi5V0.4.TsQr41JuROFlreUqDNnoy', '2022-09-14 14:20:24'),
(3, 0, 'Клим', 'klim@mail.com', '12345', '2022-09-14 15:13:51'),
(4, 1, 'Some', 'some@test.com', '12345', '2022-09-20 10:11:21'),
(7, 0, 'sasas', 'asas@wd.fe', '$2y$10$WLc6m2I9hz4VQ7v2Zr9ADevX7U2b0fO0qKMGBbKDNOt9m6pp4u0hW', '2022-09-21 11:23:00'),
(8, 0, 'www', 'email@email.ru1', '$2y$10$Vp//M/9BfAxYzIJLTv10ruLTFjaUqbLjqy/IzSwsdkPukU52pwM/a', '2022-09-21 11:25:26'),
(18, 0, 'test', 'test@test.test', '$2y$10$YVAw00WbsxcfLSjdLqVOLO75vzfkqOGD9RXQno4.LyzYj7HgjILGq', '2022-09-21 14:28:44'),
(19, 1, 'admin', 'admin@test.test', '$2y$10$B2p6sv5BbsJeWAB5TZ2xh.A97ySfPtD6XTkoWgLeJQE5q75u8TwUW', '2022-09-22 08:26:59'),
(20, 1, 'root', 'root@test.test', '$2y$10$ki.YhYwj6JqTsvm2llibueIjH2trZKOWQdJjaaljS4KGDlXeLB/B.', '2022-09-23 04:23:55');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_topic` (`id_topic`);

--
-- Индексы таблицы `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`id_topic`) REFERENCES `topics` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
