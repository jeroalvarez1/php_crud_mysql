<?php
    include("db.php");
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM task WHERE id = $id";
        $result_edit = mysqli_query($conn, $query);
        /* Pregunta si encontro una fila en la base de datos que coincida */
        if (mysqli_num_rows($result_edit) == 1) {
            $row = mysqli_fetch_array($result_edit);
        }
    }
    if (isset($_POST['update_task'])) {
        $id = $_GET['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $query = "UPDATE task SET title = '$title', description = '$description' WHERE id = $id";
        $result_update = mysqli_query($conn, $query);
        $_SESSION['message'] = "Task updated successfully";
        $_SESSION['message_type'] = 'warning';
        header("Location: index.php");
    }
    include("includes/header.php");
?>
<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit_task.php?id=<?= $id ?>" method="POST">
                    <div class="mb-3">
                        <input type="text" name="title" class="form-control" placeholder="Task Title" value="<?= $row['title'];?>" autofocus>
                    </div>
                    <div class="mb-3">
                        <textarea name="description" rows="2" class="form-control" placeholder="Task Description"><?= $row['description'];?></textarea>
                    </div>
                    <div class="d-grid gap-2">
                        <input type="submit" class="btn btn-success" name="update_task" value="Save Task">
                    </div>
                </form>
            </div>
        </div>  
    </div>
</div>
<?php
    include("includes/footer.php");
?>