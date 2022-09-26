<?php
$url_header = $_SERVER['REQUEST_URI'];
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8" />
    <meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />

    <title>PHP lesson site</title>

    <link rel="icon" href="<?php echo BASE_URL . "assets/media/img/favicon.ico"; ?>" type="image/x-icon" />

    <link rel="stylesheet" href="<?php echo BASE_URL . "assets/media/css/resetNormalize.min.css"; ?>" type="text/css" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo BASE_URL . "assets/media/css/style.css"; ?>" type="text/css" />
    <link rel="stylesheet" href="<?php echo BASE_URL . "assets/media/css/media_style.css"; ?>" type="text/css" />
</head>

<body>

    <div class="main_wrapper">

        <div class="wrapper">

            <?php
            if (strpos($url_header, "admin")) {
            ?>
                <header class="container-fluid">
                    <div class="container">
                        <div class="row">
                            <div class="col-4">
                                <h1>
                                    <a href="<?php echo BASE_URL ?>">My blog</a>
                                </h1>
                            </div>
                            <nav class="col-8">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-user"></i>
                                            <?php echo $_SESSION['login']; ?>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo BASE_URL . "logout.php"; ?>">Выход</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </header>
            <?php
            } else {
            ?>
                <header class="container-fluid">
                    <div class="container">
                        <div class="row">
                            <div class="col-4">
                                <h1>
                                    <a href="<?php echo BASE_URL ?>">My blog</a>
                                </h1>
                            </div>
                            <nav class="col-8">
                                <ul>
                                    <li><a href="<?php echo BASE_URL ?>">Главная</a> </li>
                                    <li><a href="<?php echo BASE_URL . 'articles.php' ?>">Статьи</a> </li>
                                    <li>
                                        <?php if (isset($_SESSION['id'])) : ?>
                                            <a href="#">
                                                <i class="fa fa-user"></i>
                                                <?php echo $_SESSION['login']; ?>
                                            </a>
                                            <ul>
                                                <?php if ($_SESSION['admin']) : ?>
                                                    <li><a href="<?php echo BASE_URL . "admin/posts/index.php"; ?>">Админ панель</a> </li>
                                                <?php endif; ?>
                                                <li><a href="<?php echo BASE_URL . "logout.php"; ?>">Выход</a> </li>
                                            </ul>
                                        <?php else : ?>
                                            <a href="<?php echo BASE_URL . "log.php"; ?>">
                                                <i class="fa fa-user"></i>
                                                Войти
                                            </a>
                                            <ul>
                                                <li><a href="<?php echo BASE_URL . "reg.php"; ?>">Регистрация</a> </li>
                                            </ul>
                                        <?php endif; ?>

                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </header>
            <?php
            }
            ?>



            <div class="main">