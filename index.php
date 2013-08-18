<?php
//Include necessary data
require_once('./resources/Autoloader.php');
require_once('./resources/templates/header.php');

//Supress the messages
ob_start();
    //Initialize the database connection
    $conn = new \Resources\Database\Connection();
    $db = new \Resources\Database\Database();
    $result = new \Resources\Database\Result();
ob_end_clean();


//Output the entries
if($connection = $conn->openConnection('127.0.0.1:3306', 'root', '', 'inno_tree')){
    $tree = $db->getTreeSummary($connection);
    $assoc_tree = $result->getAssocTree($tree);

    //$result->showByRows($tree);
    $result->createTreeView($assoc_tree, 0);
    $conn->closeConnection($connection);
}
//Include the common footer markup
?>

<form action="/Ajax.php" method="post" enctype="multipart/form-data">
    <?php $result->createList($tree); ?>
    <input type="text" name="name" placeholder="Name">
    <input type="text" name="title" placeholder="Title">
    <input type="submit" value="Add">
</form>