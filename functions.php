<?php
require_once('connection.php');
// function createData($post)
// {
//     // var_dump($post);
//     // exit;

//     createTodoData($post['content']);  // ここを追記　13
//     // var_dump($post['content']);
// //     exit;
// }

function getTodoList()
{
    return getAllRecords();
    
}

function getSelectedTodo($id)
{
    return getTodoTextById($id); 
}

// 追記
function savePostedData($post)
{
    $path = getRefererPath();
    switch ($path) {
        case '/new.php':
            createTodoData($post['content']);
            break;
        case '/edit.php':
            updateTodoData($post);
            break;
        // 追記
        case '/index.php': 
            deleteTodoData($post['id']); 
            break; 
        default:
            break;
    }
}

function getRefererPath()
{
    $urlArray = parse_url($_SERVER['HTTP_REFERER']);
    return $urlArray['path'];
}
