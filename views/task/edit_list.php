<!DOCTYPE html>
<head>
    <?php
    $title = "Task Manager";
    require_once '/views/blocks/head.php';
    ?>
</head>
<body>
<? require_once '/views/blocks/header.php' ?>
<div class="container">
    <h1>edit tasks</h1>
    <form method="post">
        <div class="form-group row">
            <div class="col-sm-2">
                <input type="submit" class="form-control" name="inputLogoutAdm" id="inputLogoutAdm" value="Log out">
            </div>
        </div>
    </form>

    <br>
    <form name="filterForm" action="" method="post">
        <div class="btn-group" role="group">
            <button type="submit" class="btn btn-secondary" id="filterAllTasks" name="filterAllTasks">All Tasks</button>
            <button type="submit" class="btn btn-secondary" id="filterComplTasks" name="filterComplTasks">Completed
                Tasks
            </button>
        </div>
    </form>

    <?
    for ($i = 0; $i < count($list); $i++) {
        ?>
        <br>
        <? if ($list[$i]["done"]) { ?>
            <span><a href="edit_task/<?= $list[$i]["id"] ?>"><?= $list[$i]["task_name"] ?></a> +</span>
        <? } else { ?>
            <span><a href="edit_task/<?= $list[$i]["id"] ?>"><?= $list[$i]["task_name"] ?></a></span>
        <? }
    }
    ?>
</div>

</body>
</html>