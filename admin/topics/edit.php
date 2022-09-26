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
                <h2>Обновление категорию</h2>
            </div>
            <div class="row add-post">
                <div class="mb-12 col-12 col-md-12 err">
                    <p><?= $errMsg ?></p>
                </div>
                <form action="edit.php" method="post">
                    <input name="id" value="<?= $id; ?>" type="hidden">
                    <div class="col">
                        <input name="name" value="<?= $name; ?>" type="text" class="form-control" placeholder="Имя категории" aria-label="Имя категории">
                    </div>
                    <div class="col">
                        <label for="content" class="form-label">Описание категории</label>
                        <textarea name="description" class="form-control" id="content" rows="3"><?= $description; ?></textarea>
                    </div>
                    <div class="col">
                        <button name="topic-edit" class="btn btn-primary" type="submit">Обновить категорию</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>


<?php include '../../app/include/footer.php'; ?>