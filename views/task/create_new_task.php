<!DOCTYPE html>
<head>
    <?php
    $title = "Task Manager";
    require_once ROOT.'/views/blocks/head.php';
    ?>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

	<script> 
$(document).ready(function () {

    $(".previewDiv").hide();

    $("#inputPreview").click(function () {
        $(".createDiv").hide();

        var task_name = $("#inputTaskName").val();
        var user_name = $("#inputUserName").val();
        var task_descr = $("#inputTaskDescr").val();
        var email = $("#inputEmail").val();

        $("#PrTaskName").html(task_name);
        $("#PrUserName").html(user_name);
        $("#PrTaskDescr").html(task_descr);
        $("#email").html(email);

        $(".previewDiv").show();

    });
	
	$("#inputBack").click(function () {
        $(".previewDiv").hide();
		$(".createDiv").show();

    });
});

</script>
</head>
<body>
<? require_once ROOT.'/views/blocks/header.php' ?>
<div class="container" id="createDiv">

    <h1 class="createDiv">Create new task</h1>
	
    <form  name="uploadImgForm" action="" method="post" enctype="multipart/form-data">
        <div class="form-group row createDiv">
            <label for="inputTaskName" class="col-sm-2 form-control-label">Task name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="inputTaskName" id="inputTaskName" placeholder="Task Name"
                       value="<?= $_SESSION["task_name"] ?>">
            </div>
        </div>
        <div class="form-group row createDiv">
            <label for="inputUserName" class="col-sm-2 form-control-label">Your name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="inputUserName" id="inputUserName" placeholder="Your Name"
                       value="<?= $_SESSION["user_name"] ?>">
            </div>
        </div>
        <div class="form-group row createDiv">
            <label for="inputEmail" class="col-sm-2 form-control-label">E-mail</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" name="inputEmail" id="inputEmail" placeholder="E-mail"
                       value="<?= $_SESSION["email"] ?>">
            </div>
        </div>
        <div class="form-group row createDiv">
            <label for="inputTaskDescr" class="col-sm-2 form-control-label">Task Description</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="inputTaskDescr" id="inputTaskDescr"
                       placeholder="Task Description" value="<?= $_SESSION["task_descr"] ?>">
            </div>
        </div>

        <div class="form-group row createDiv">
            <label for="inputUploadImg" class="col-sm-2 form-control-label">Task Image</label>
            <div class="col-sm-10">
                <input type="file" class="form-control-file" name="inputUploadImg" id="inputUploadImg"
                       value="<?= $_SESSION["file"] ?>">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-2">
                <input type="submit" class="form-control" name="inputCreateNew" id="inputCreateNew" value="Create">
            </div>
            <div class="col-sm-2 createDiv">
                <input type="button" class="form-control" name="inputPreview" id="inputPreview" value="Preview">
            </div>
			<div class="col-sm-2 previewDiv">
                <input type="button" class="form-control" name="inputBack" id="inputBack" value="Back">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10">
                <span><?= $error_message ?></span>
            </div>
        </div>
    </form>
</div>

<div class="container previewDiv">
    <h1 id="PrTaskName"></h1>

    <div class="form-group row">
        <label for="PrUserName" class="col-sm-2 form-control-label">User name</label>
        <div class="col-sm-10">
            <span class="form-control" name="PrUserName" id="PrUserName"></span>
        </div>
    </div>
    <div class="form-group row">
        <label for="PrEmail" class="col-sm-2 form-control-label">E-mail</label>
        <div class="col-sm-10">
            <span class="form-control" name="PrEmail" id="PrEmail"></span>
        </div>
    </div>
    <div class="form-group row">
        <label for="PrTaskDescr" class="col-sm-2 form-control-label">Task Description</label>
        <div class="col-sm-10">
            <span class="form-control" name="PrTaskDescr" id="PrTaskDescr"></span>
        </div>
    </div>

    <div class="form-group row">
        <label for="PrUploadImg" class="col-sm-2 form-control-label">Task Image</label>
        <div class="col-sm-10">
            <img src="/uploads/<?= $list["img_name"] ?>" class="form-control-file" name="PrUploadImg" id="PrUploadImg"
                 width="320px"
                 height="auto">
        </div>
    </div>
    <div class="form-group row">
        <label for="PrTaskDone" class="col-sm-2 form-control-label">Task Is Done</label>
        <div class="col-sm-10">
            <span class="form-control alert alert-warning" name="PrTaskDone" id="PrTaskDone">No</span>
        </div>
    </div>
</div>
</body>
</html>	