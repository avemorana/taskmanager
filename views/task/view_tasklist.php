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
    <h1>here all tasks</h1>
    <a href="new_task/"> [Create new task] </a>
    <br><br>

    <form name="filterForm" action="" method="post">
        <div class="btn-group" role="group">
            <button type="submit" class="btn btn-secondary" id="filterAllTasks" name="filterAllTasks">All Tasks</button>
            <button type="submit" class="btn btn-secondary" id="filterComplTasks" name="filterComplTasks">Completed
                Tasks
            </button>

    </form>
    <br>
    <?
    for ($i = 0; $i < count($list); $i++) {
        ?>
        <br>
        <? if ($list[$i]["done"]) { ?>
            <span><a href="task/<?= $list[$i]["id"] ?>" class="tasklist"><?= $list[$i]["task_name"] ?></a> +</span>
        <? } else { ?>
            <span><a href="task/<?= $list[$i]["id"] ?>"><?= $list[$i]["task_name"] ?></a></span>
        <? }
    }
    ?>

</div>
</body>
</html>