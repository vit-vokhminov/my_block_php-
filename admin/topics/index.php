<?php session_start();
include "../../path.php";
include "../../app/controllers/topics.php";
?>

<?php include("../../app/include/header.php"); ?>

<div class="container">
    <div class="row">
        <?php include "../../app/include/sidebar-admin.php"; ?>

        <div class="posts col-10">
            <div class="button row">
                <a href="<?php echo BASE_URL . "admin/topics/create.php"; ?>" class="col-2 btn btn-success">Создать</a>
            </div>
            <div class="row title-table">
                <h2>Управление категориями</h2>
                <div class="col-1">№</div>
                <div class="col-5">Название</div>
                <div class="col-4">Управление</div>
            </div>
            <?php foreach ($topics as $key => $topic) : ?>
                <div class="row post">
                    <div class="id col-1"><?= $key + 1; ?></div>
                    <div class="title col-5"><?= $topic['name']; ?></div>
                    <div class="red col-2"><a href="edit.php?id=<?= $topic['id']; ?>">Edit</a></div>
                    <div class="del col-2"><a href="index.php?del_id=<?= $topic['id']; ?>">Delete</a></div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>


<?php include '../../app/include/footer.php'; ?>