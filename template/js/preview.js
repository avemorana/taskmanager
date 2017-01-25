$(document).ready(function () {

    $("#previewDiv").hide();

    $("#inputPreview").click(function () {
        alert("hello");
        $("#createDiv").hide();

        var task_name = $("#inputTaskName").val();
        var user_name = $("#inputUserName").val();
        var task_descr = $("#inputTaskDescr").val();
        var email = $("#inputEmail").val();

        $("#PrTaskName").html(task_name);
        $("#PrUserName").html(user_name);
        $("#PrTaskDescr").html(task_descr);
        $("#email").html(email);

        $("#previewDiv").show();

    });
});
