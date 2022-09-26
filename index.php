<?php
include "path.php";
include "app/controllers/topics.php";
$page = isset($_GET['page']) ? $_GET['page'] : 1;

// для пагинации лимит аостов на странице
$limit = 2;
$offset = $limit * ($page - 1);
$total_pages = round(countRow('posts') / $limit, 0);

$posts = selectAllFromPostsWithUsersOnIndex('posts', 'users', $limit, $offset);
$topTopic = selectTopTopicFromPostsOnIndex('posts');

?>

<?php include 'app/include/header.php'; ?>


<!-- блок карусели START-->
<div class="container">
    <div class="row">
        <h2 class="slider-title">Топ публикации</h2>
    </div>
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php foreach ($topTopic as $key => $post) : ?>
                <?php if ($key == 0) : ?>
                    <div class="carousel-item active">
                    <?php else : ?>
                        <div class="carousel-item">
                        <?php endif; ?>
                        <img src="<?= BASE_URL . 'assets/images/posts/' . $post['img'] ?>" alt="<?= $post['title'] ?>" class="d-block w-100">
                        <div class="carousel-caption-hack carousel-caption d-none d-md-block">
                            <h5><a href="<?= BASE_URL . 'single.php?post=' . $post['id']; ?>"><?= substr($post['title'], 0, 120) . '...'  ?></a></h5>
                        </div>
                        </div>
                    <?php endforeach; ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
        </div>
    </div>
    <!-- блок карусели END-->


    <!-- блок main-->
    <div class="container">

        <h2>Последние публикации</h2>

        <div class="content row">
            <!-- Main Content -->
            <div class="main-content col-md-9 col-12">

                <?php foreach ($posts as $post) : ?>
                    <div class="post row">
                        <div class="img col-12 col-md-4">
                            <?php if ($post['img']) : ?>
                                <img src="<?= BASE_URL . 'assets/images/posts/' . $post['img'] ?>" alt="<?= $post['title'] ?>" class="img-thumbnail">
                            <?php else : ?>
                                <img src="<?= BASE_URL . 'assets/media/img/no-image.jpg' ?>" alt="<?= $post['title'] ?>" class="img-thumbnail">
                            <?php endif; ?>
                        </div>
                        <div class="post_text col-12 col-md-8">
                            <h3>
                                <a href="<?= BASE_URL . 'single.php?post=' . $post['id']; ?>"><?= substr($post['title'], 0, 80) . '...'  ?></a>
                            </h3>
                            <p class="post_datauser">
                                <span><i class="far fa-user"></i><?= $post['username']; ?></span>
                                <span><i class="far fa-calendar"></i><?= $post['created_date']; ?></span>
                            </p>
                            <p class="preview-text">
                                <?= mb_substr($post['content'], 0, 55, 'UTF-8') . '...'  ?>
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <!-- sidebar Content -->
            <div class="sidebar col-md-3 col-12">

                <div class="section search">
                    <h3>Поиск</h3>
                    <form action="search.php" method="post">
                        <input type="text" name="input-search-term" class="text-input" placeholder="Введите искомое слово...">
                    </form>
                </div>


                <div class="section topics">
                    <h3>Категории</h3>
                    <ul>
                        <?php foreach ($topics as $key => $topic) : ?>
                            <li>
                                <a href="<?= BASE_URL . 'category.php?id=' . $topic['id']; ?>"><?= $topic['name']; ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

            </div>
        </div>
    </div>


    <?php include 'app/include/footer.php'; ?>