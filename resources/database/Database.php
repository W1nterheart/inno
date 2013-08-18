<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Exiri
 * Date: 14.08.13
 * Time: 21:06
 * To change this template use File | Settings | File Templates.
 */

namespace Resources\Database{

    class Database {
        private $data = array();

        public function __construct(){

        }

        //Return all rows
        public  function getTreeSummary($connection){
            if(!empty($connection)){
                return mysqli_query($connection, 'SELECT * FROM trees');
            }
        }

        //Single
        public  function getBranch($connection, $parent_id){
            if(!empty($connection) && intval($parent_id)){
                $this->data['query'] = mysqli_query($connection, "SELECT * FROM trees WHERE tree.id_parent = $parent_id");
                return $this->data['query'];
            }
        }

        //No need to delete child branches because of CASCADE
        public  function removeBranch($connection, $id){
            if(!empty($connection) && intval($id)){
                $this->data['query'] = mysqli_query($connection, "DELETE FROM trees WHERE id = $id");
                return $this->data['query'];
            } else {
                return array();
            }
        }

        public  function addBranch($connection, $data = array()){
            if(!empty($connection) && (intval($data['parent_id']) || $data['parent_id'] == 'NULL') && !empty($data['name'])){

                $p_id = $data['parent_id'];
                $name = $data['name'];
                $title = $data['title'];

                $this->data['query'] = mysqli_query($connection, "INSERT INTO  trees (id , parent_id , title , name) VALUES (NULL , $p_id,  '".$title."',  '".$name."');");
                return $this->data['query'];
            } else {
                return array();
            }
        }

    }
}

?>