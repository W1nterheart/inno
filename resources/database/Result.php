<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Exiri
 * Date: 15.08.13
 * Time: 22:11
 * To change this template use File | Settings | File Templates.
 */

//File for visual output(mostly) in HTML
namespace Resources\Database;

class Result {

    private $data = array();

    //Just to test SQL connection
    public function showByRows($myslq_result){
        print_r('Number of rows: '.$myslq_result->num_rows.'<br>');
        foreach($myslq_result as $key => $row){
            print_r($row);
            print_r("<br>");
        }
    }

    public function createList($myslq_result){
        print_r('<select name="parent_id">');
        print_r('<option value="NULL">ROOT</option>');
        foreach($myslq_result as $key => $row){
            print_r('<option value="'.$row['id'].'">'.$row['id'].' '.$row['name'].'</option>');
        }
        print_r('</select>');
    }

    //For easier use of mysql_result
    public function getAssocTree($mysql_result){
        $this->data['branches'] = array();
        //While there's rows, show them as associative array
        while($row = mysqli_fetch_assoc($mysql_result)){
            //Nesting
            $this->data['branches'][$row['id']] = array("id" => $row['id'], "parent_id" => $row['parent_id'], "name" => $row['name'], "title" => $row['title']);
        }
        return $this->data['branches'];
    }

    //Now viewing the whole nested tree
    function createTreeView($array, $current_parent, $curr_level = 0, $prev_level = -1) {
        foreach ($array as $key => $branch) {

            if ($current_parent == $branch['parent_id']) {
                if ($curr_level > $prev_level){
                    print_r("<ul class='tree' style='list-style: none;'>");
                } else  if ($curr_level == $prev_level){
                    print_r("</li>");
                }

                print_r('<li id="branch'.$branch['id'].'"><label>'.$branch['parent_id'].'---'.$branch['id'].' '.$branch['title'] .' '. $branch['name'] .'</label><button onclick="tools.delete('.$branch['id'].')" >Delete</button>');

                if ($curr_level > $prev_level) { $prev_level = $curr_level; }
                $curr_level++;
                //The recursive method of viewing the nested array
                $this->createTreeView ($array, $key, $curr_level, $prev_level);
                $curr_level--;
            }
        }
        if ($curr_level == $prev_level){
            print_r("</li></ul>");
        }
    }

}
?>