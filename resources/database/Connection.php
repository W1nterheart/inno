<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Exiri
 * Date: 14.08.13
 * Time: 21:14
 * To change this template use File | Settings | File Templates.
 */

namespace Resources\Database;

class Connection {
    private $data = array();

    public function __construct(){

    }

    public function openConnection($host = false, $username = false, $password = false, $dbname = false){
        if(!empty($host) && !empty($username) && !empty($dbname)){
            $this->data['connection'] = mysqli_connect($host, $username, $password);
            $this->data['db']         = mysqli_select_db($this->data['connection'], "$dbname");
            if($this->data['error'] = mysqli_connect_errno($this->data['connection'])){
                return $this->data['error'];
            } else {
                unset($this->data['error']);
                return $this->data['connection'];
            }
        } else {
            return json_encode(array('success' => false));
        }
    }

    public function closeConnection($connection){
        if(!empty($connection)){
            return mysqli_close($connection);
        }
    }


}