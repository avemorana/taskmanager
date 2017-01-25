<!DOCTYPE html>
<head>
    <?php
    $title = "Task Manager";
    require_once ROOT.'/views/blocks/head.php';
    ?>
</head>
<body>
<? require_once ROOT.'/views/blocks/header.php';
$i = 0;
$list = array();
if ($row = mysqli_fetch_array($taskById)) {
    $list = $row;
} ?>
<div class="container">
    <h1><?= $list["task_name"] ?></h1>

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
        <label for="TaskDescr" class="col-sm-2 form-control-label">Task Description</label>
        <div class="col-sm-10">
            <span class="form-control" name="TaskDescr" id="TaskDescr"><?= $list["task"] ?></span>
        </div>
    </div>

    <div class="form-group row">
        <label for="UploadImg" class="col-sm-2 form-control-label">Task Image</label>
        <div class="col-sm-10">
            <img src="/uploads/<?=$list["img_name"]?>" class="form-control-file" name="UploadImg" id="UploadImg" width="320px"
                 height="auto">
        </div>
    </div>
    <div class="form-group row">
        <label for="TaskDone" class="col-sm-2 form-control-label">Task Is Done</label>
        <div class="col-sm-10">
            <? if ($list["done"]) {
                ?><span class="form-control alert alert-success" name="TaskDone" id="TaskDone">Yes</span><?
            } else {
                ?><span class="form-control alert alert-warning" name="TaskDone" id="TaskDone">No</span><?
            }
            ?>
        </div>
    </div>
    <a href="http://task-manager.zzz.com.ua/task_list"> [To list] </a>
</div>
</body>
</html>