<!DOCTYPE html>
<head>
    <?php
    $title = "Task Manager";
    require_once '/views/blocks/head.php';
    ?>
</head>
<body>
<? require_once '/views/blocks/header.php';
$i = 0;
$list = array();
if ($row = mysqli_fetch_array($taskById)) {
    $list = $row;
} ?>
<div class="container">
    <h1><?= $list["task_name"] ?></h1>
    <form name="editTaskForm" action="" method="post">
        <div class="form-group row">
            <label for="UserName" class="col-sm-2 form-control-label">User name</label>
            <div class="col-sm-10">
                <span class="form-control" name="UserName" id="UserName"><?= $list["user"] ?></span>
            </div>
        </div>
        <div class="form-group row">
            <label for="Email" class="col-sm-2 form-control-label">E-mail</label>
            <div class="col-sm-10">
                <span class="form-control" name="Email" id="Email"><?= $list["email"] ?></span>
            </div>
        </div>
        <div class="form-group row">
            <label for="editTaskDescr" class="col-sm-2 form-control-label">Task Description</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="editTaskDescr" id="editTaskDescr"
                       value="<?= $list["task"] ?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="UploadImg" class="col-sm-2 form-control-label">Task Image</label>
            <div class="col-sm-10">
                <img src="/uploads/<?= $list["img_name"]?>" class="form-control-file" name="UploadImg" id="UploadImg" width="320px"
            </div>
        </div>
        <div class="form-group row">
            <label for="TaskDone" class="col-sm-2 form-control-label">Task Is Done</label>
            <div class="col-sm-10">
                <? if ($list["done"]) {
                    ?>
                    <input type="checkbox" class="form-control" name="editTaskDone" checked id="editTaskDone">
                <? } else { ?>
                    <input type="checkbox" class="form-control" name="editTaskDone" id="editTaskDone">
                <? } ?>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-2">
                <input type="submit" class="form-control" name="inputUpdateTask" id="inputUpdateTask" value="Update">
            </div>
            <div class="col-sm-2">
                <input type="submit" class="form-control" name="inputCancel" id="inputCancel" value="Cancel">
            </div>
        </div>
    </form>
</div>
</body>
</html>