<?php

use App\Task;

function getDone($id) {

    $num = Task::where('project_id', $id)->count();
    $done = Task::where('project_id', $id)->where('status', 'done')->count();

    if($num < 1 && $done < 1) {

       return 0;

    }

    $res =  ( $num / $done);

     return 100 / $res;
}
