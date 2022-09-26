<?php
include "../../path.php";
include "../../app/controllers/posts.php";
?>


<?php include("../../app/include/header.php"); ?>

<div class="container">
    <div class="row">
        <?php include "../../app/include/sidebar-admin.php"; ?>

        <div class="posts col-10">
            <div class="button row">
                <a href="<?php echo BASE_URL . "admin/posts/create.php"; ?>" class="col-2 btn btn-success">Создать</a>
            </div>
            <div class="row title-table">
                <h2>Управление записями</h2>
                <div class="col-1">ID</div>
                <div class="col-5">Название</div>
                <div class="col-2">Автор</div>
                <div class="col-4">Управление</div>
            </div>
            <?php foreach ($postsAdm as $key => $post) : ?>
                <div class="row post">
                    <div class="id col-1"><?= $key + 1; ?></div>
                    <div class="title col-5"><?= mb_substr($post['title'], 0, 50, 'UTF-8') . '...'  ?></div>
                    <div class="author col-2"><?= $post['username']; ?></div>

                    <div class="row col-4">
                        <div class="red col-4"><a href="edit.php?id=<?= $post['id']; ?>">Изменить</a></div>
                        <div class="del col-4"><a href="edit.php?delete_id=<?= $post['id']; ?>">Удалить</a></div>
                        <?php if ($post['status']) : ?>
                            <div class="status col-4"><a href="edit.php?publish=0&pub_id=<?= $post['id']; ?>">Скрыть</a></div>
                        <?php else : ?>
                            <div class="status col-4"><a href="edit.php?publish=1&pub_id=<?= $post['id']; ?>">Опубликовать</a></div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>


<?php include '../../app/include/footer.php'; ?>