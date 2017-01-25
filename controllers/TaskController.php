<?php

include_once ROOT . '/models/Admin.php';
include_once ROOT . '/models/Task.php';

class TaskController
{
    public function actionIndex()
    {
        $result = Task::getAllTasks();
        $i = 0;
        $list = array();
        while ($row = mysqli_fetch_array($result)) {
            if (isset($_POST["filterComplTasks"])) {
                if ($row['done'] == 1) {
                    $list[$i] = $row;
                    $i++;
                }
            } else {
                $list[$i] = $row;
                $i++;
            }
        }
        require_once ROOT . '/views/task/view_tasklist.php';
        return true;
    }

    public function actionEdit()
    {
        if (!Admin::checkLogged()) {
            header("Location: admin");
        }
        if (isset($_POST["inputLogoutAdm"])) {
            Admin::logout();
        }
        $result = Task::getAllTasks();
        $i = 0;
        $list = array();
        while ($row = mysqli_fetch_array($result)) {
            if (isset($_POST["filterComplTasks"])) {
                if ($row['done'] == 1) {
                    $list[$i] = $row;
                    $i++;
                }
            } else {
                $list[$i] = $row;
                $i++;
            }

        }
        require_once ROOT . '/views/task/edit_list.php';
        return true;
    }

    public function actionCreate()
    {
        session_start();
        $error = false;
        $error_message = "";
        $task_name = "";
        $task_descr = "";
        $user_name = "";
        $email = "";

        if (isset($_POST["inputCreateNew"])) {

            $types = array('image/gif', 'image/png', 'image/jpeg');
            $path = "uploads/";

            $task_name = htmlspecialchars($_POST["inputTaskName"]);
            $task_descr = htmlspecialchars($_POST["inputTaskDescr"]);
            $user_name = htmlspecialchars($_POST["inputUserName"]);
            $email = htmlspecialchars($_POST["inputEmail"]);
            $_SESSION["task_name"] = $task_name;
            $_SESSION["task_descr"] = $task_descr;
            $_SESSION["user_name"] = $user_name;
            $_SESSION["email"] = $email;

            if ($task_name == '') {
                $error_message .= "Enter name of the task.<br>";
                $error = true;
            }
            if ($task_descr == '') {
                $error_message .= "Enter description of the task.<br>";
                $error = true;
            }
            if ($user_name == '') {
                $error_message .= "Enter name of the user.<br>";
                $error = true;
            }
            if ($email == '') {
                $error_message .= "Enter email of the user.<br>";
                $error = true;
            }

            if (!in_array($_FILES['inputUploadImg']['type'], $types)) {
                $error_message .= "Your image has a bad format.<br>";
                $error = true;
            }
//            if (!$error) {
//                $type = new finfo(FILEINFO_MIME_TYPE);
//                $ext = array_search(
//                    $type->file($_FILES["inputUploadImg"]["tmp_name"]),
//                    array(
//                        'jpg' => 'image/jpg',
//                        'jpeg' => 'image/jpeg',
//                        'png' => 'image/png'
//                    ), true);
//                if (false === $ext) {
//                    $error_message .= "Your image has a bad format.<br>";
//                    $error = true;
//                }
//            }
//            if (!$error and move_uploaded_file($_FILES['inputUploadImg']['tmp_name'],
//                    sprintf('./uploads/%s',
//                        $_FILES['inputUploadImg']['name']))
//            ) {
//                $img_route = "/uploads/" . $_FILES['inputUploadImg']['name'];
//                $result = Task::sendTaskToDb($task_name, $user_name, $task_descr, $email, $img_route);
//                if ($result) {
//                    header("Location: http://taskmanager/task_list");
//                }
//            }
            if (!$error) {
                $nameImg = Task::resize($_FILES['inputUploadImg']);
                if (@copy($nameImg['tmp_name'], $path . $nameImg['name'])) {
                    $img_name = $nameImg ['name'];
                    $result = Task::sendTaskToDb($task_name, $user_name, $task_descr, $email, $img_name);
                    if ($result) {
                        header("Location: http://task-manager.zzz.com.ua/task_list");
                    }
                }
            }
        }

        require_once ROOT . '/views/task/create_new_task.php';
        return true;
    }

    public function actionOne($id)
    {
        $taskById = Task::getTaskById($id);
        require_once ROOT . '/views/task/view_one_task.php';
        return true;
    }

    public function actionEditOne($id)
    {
        $taskById = Task::getTaskById($id);

        if (isset($_POST["inputUpdateTask"])) {
            $task_descr = htmlspecialchars($_POST["editTaskDescr"]);
            $done = 0;
            if (isset($_POST["editTaskDone"])) {
                $done = 1;
            }
            if ($task_descr != '') {
                Task::updateTask($id, $task_descr, $done);
                header("Location: http://task-manager.zzz.com.ua/edit_task/$id");
            } else {
                $error_message = "You didn`t enter description for task";
            }


        } elseif (isset($_POST["inputCancel"])) {
            header("Location: http://task-manager.zzz.com.ua/edit_task");
        }
        require_once ROOT . '/views/task/edit_one_task.php';
        return true;
    }

}