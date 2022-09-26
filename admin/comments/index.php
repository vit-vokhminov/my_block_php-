<?php
include "../../path.php";
include "../../app/controllers/commentaries.php";
?>

<?php include("../../app/include/header.php"); ?>

<div class="container">
    <div class="row">
        <?php include "../../app/include/sidebar-admin.php"; ?>

        <div class="posts col-10">
            <div class="row title-table">
                <h2>Управление комментариями</h2>
                <div class="col-1">ID</div>
                <div class="col-5">Текст</div>
                <div class="col-2">Автор</div>
                <div class="col-4">Управление</div>
            </div>
            <?php foreach ($commentsForAdm as $key => $comment) : ?>
                <div class="row post">
                    <div class="id col-1"><?= $comment['id']; ?></div>
                    <div class="title col-5"><?= mb_substr($comment['comment'], 0, 50, 'UTF-8') . '...'  ?></div>
                    <?php
                    $user = $comment['email'];
                    $user = explode('@', $user);
                    $user = $user[0];
                    ?>
                    <div class="author col-2"><?= $user . "@"; ?></div>
                    <div class="red col-1"><a href="edit.php?id=<?= $comment['id']; ?>">edit</a></div>
                    <div class="del col-1"><a href="edit.php?delete_id=<?= $comment['id']; ?>">delete</a></div>
                    <?php if ($comment['status']) : ?>
                        <div class="status col-2"><a href="edit.php?publish=0&pub_id=<?= $comment['id']; ?>">Скрыть</a></div>
                    <?php else : ?>
                        <div class="status col-2"><a href="edit.php?publish=1&pub_id=<?= $comment['id']; ?>">Опубликовать</a></div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?php include '../../app/include/footer.php'; ?>