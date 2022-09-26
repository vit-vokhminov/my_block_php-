<?php

session_start();    //TODO что как для чего
require 'connect.php';


// вывод лога и exit
function tt($value)
{
    echo '<pre>';
    print_r($value);
    echo '</pre>';
    exit();
}

// вывод лога
function tte($value)
{
    echo '<pre>';
    print_r($value);
    echo '</pre>';
}

// Проверка выполнения запроса к БД
function dbCheckError($query)
{
    $errInfo = $query->errorInfo();
    if ($errInfo[0] !== PDO::ERR_NONE) {
        echo $errInfo[2];
        exit();
    }
    return true;
}

// Запрос на получение данных с одной таблицы
function selectAll($table, $params = [])
{
    global $pdo;    //TODO почему нужно объявлять именно global $pdo; и при этом внутри функции
    $sql = "SELECT * FROM $table";

    if (!empty($params)) {    // если массив не пустой
        $i = 0;
        foreach ($params as $key => $value) {
            if (!is_numeric($value)) {
                $value = "'" . $value . "'";
            }
            if ($i === 0) {
                $sql = $sql . " WHERE $key=$value";
            } else {
                $sql = $sql . " AND $key=$value";
            }
            $i++;
        }
    }

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}

// $paramsSelectOne = [
//     "admin" => 1,
//     "username" => "Some"
// ];

//tt(selectAll("users", $paramsSelectOne));


// Запрос на получение одной строки с выбранной таблицы
function selectOne($table, $params = [])
{
    global $pdo;
    $sql = "SELECT * FROM $table";

    if (!empty($params)) {
        $i = 0;
        foreach ($params as $key => $value) {
            if (!is_numeric($value)) {
                $value = "'" . $value . "'";
            }
            if ($i === 0) {
                $sql = $sql . " WHERE $key=$value";
            } else {
                $sql = $sql . " AND $key=$value";
            }
            $i++;
        }
    }

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetch();     // fetch выведет одно значение
}

// tt(selectOne("users"));


// Запись в таблицу БД
function insert($table, $params)
{
    global $pdo;
    $i = 0;
    $coll = '';
    $mask = '';
    foreach ($params as $key => $value) {
        if ($i === 0) {
            $coll = $coll . "$key";
            $mask = $mask . "'" . "$value" . "'";
        } else {
            $coll = $coll . ", $key";
            $mask = $mask . ", '" . "$value" . "'";
        }
        $i++;
    }
    //"INSERT INTO 'users' (admin, username, email, password) VALUES ('1', 'vova', 'email@emal.ru', '123')"
    $sql = "INSERT INTO $table ($coll) VALUES ($mask)";
    $query = $pdo->prepare($sql);
    $query->execute($params);
    dbCheckError($query);
    return $pdo->lastInsertId();    // вернуть id
}

// $paramsInsert = [
//     "admin" => '1',
//     "username" => "22",
//     "email" => "re@dw.ed",
//     "password" => "123"
// ];

//tt(insert("users", $paramsInsert));


// Обновление строки в таблице
function update($table, $id, $params)
{
    global $pdo;
    $i = 0;
    $str = '';
    foreach ($params as $key => $value) {
        if ($i === 0) {
            $str = $str . $key . " = '" . $value . "'";
        } else {
            $str = $str . ", " . $key . " = '" . $value . "'";
        }
        $i++;
    }

    //"UPDATE 'users' SET admin = '1', username = '2233', email = 're@dw.ed333', password = '123333'
    $sql = "UPDATE $table SET $str WHERE id = $id";
    $query = $pdo->prepare($sql);
    $query->execute($params);
    dbCheckError($query);
}

// $paramsUpdate = [
//     "admin" => '1',
//     "username" => "2233",
//     "email" => "re@dw.ed333",
//     "password" => "123333"
// ];
// tt(update("users", 5, $paramsUpdate));



// Удаление строки в таблице
function delete($table, $id)
{
    global $pdo;
    //DELETE FROM `users` WHERE id = 5
    $sql = "DELETE FROM $table WHERE id =" . $id;
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
}

// tt(delete("users", 5));

// MySQL немного о JOIN'ах: https://anton-pribora.ru/articles/mysql/mysql-join/
// Выборка записей (posts) с автором в админку
function selectAllFromPostsWithUsers($table1, $table2)
{ // TODO для заполнения в поле таблицы нужно вызвать функцию join
    global $pdo;
    $sql = "SELECT 
    t1.id,
    t1.title,
    t1.img,
    t1.content,
    t1.status,
    t1.id_topic,
    t1.created_date,
    t2.username
    FROM $table1 AS t1 JOIN $table2 AS t2 ON t1.id_user = t2.id";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}

// Выборка записей (posts) с автором на главную
function selectAllFromPostsWithUsersOnIndex($table1, $table2, $limit, $offset)
{
    global $pdo;
    $sql = "SELECT posts.*, user.username FROM $table1 AS posts JOIN $table2 AS user ON posts.id_user = user.id WHERE posts.status=1 LIMIT $limit OFFSET $offset";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}

// Выборка записей (posts) с автором на главную
function selectTopTopicFromPostsOnIndex($table1)
{
    global $pdo;
    $sql = "SELECT * FROM $table1 WHERE id_topic = 6";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}


// Поиск по заголовкам и содержимому (простой)
function seacrhInTitileAndContent($text, $table1, $table2)
{
    $text = trim(strip_tags(stripcslashes(htmlspecialchars($text))));
    global $pdo;

    $sql = "SELECT 
    posts.*, users.username 
    FROM $table1 AS posts 
    JOIN $table2 AS users 
    ON posts.id_user = users.id 
    WHERE posts.status=1
    AND posts.title LIKE '%$text%' OR posts.content LIKE '%$text%'";

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}

// Выборка записи (posts) с автором для синг
function selectPostFromPostsWithUsersOnSingle($table1, $table2, $id)
{
    global $pdo;
    $sql = "SELECT p.*, u.username FROM $table1 AS p JOIN $table2 AS u ON p.id_user = u.id WHERE p.id=$id";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetch();
}

// Считаем количество строк в таблице
function countRow($table)
{
    global $pdo;
    $sql = "SELECT Count(*) FROM $table";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchColumn();
}
