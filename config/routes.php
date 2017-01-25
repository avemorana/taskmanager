<?php
return array(
    'edit_task/([0-9]+)' => 'task/editOne/$1',
    'task/([0-9]+)' => 'task/one/$1',
    'new_task' => 'task/create',
    'edit_task' => 'task/edit',
    'admin' => 'admin/login',
    'task_list' => 'task/index',
    '' => "main/index"
);