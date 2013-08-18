<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Exiri
 * Date: 14.08.13
 * Time: 20:42
 * To change this template use File | Settings | File Templates.
 */

require_once('./resources/Autoloader.php');
//Minimum security check
if(!$_POST){
    header("Location: /");
    exit;
}

//AJAX and Form requests handler controller
if($_POST){
    //That's for supressing the messages of loading resources
    ob_start();
    $conn = new \Resources\Database\Connection();

    //Check if the connection was made
    if($connection = $conn->openConnection('127.0.0.1:3306', 'root', '', 'inno_tree')){
        //Create the DB object
        $db = new \Resources\Database\Database();

        //This as AJAX
        if(intval($_POST['id'])){
            $success = $db->removeBranch($connection, $_POST['id']);
            die(json_encode(array('success' => $success)));
        }

        //This is as form
        if(!empty($_POST['name'])){
            $db->addBranch($connection, $_POST);
            //For using F5 on index page
            unset($_POST);
            header("Location: /");
        }

        //Closing the DB connection
        $conn->closeConnection($connection);
        //Clear out data
        unset($_POST);
        unset($connection);
        unset($conn);
        unset($db);
    }
    ob_end_clean();
}
?>