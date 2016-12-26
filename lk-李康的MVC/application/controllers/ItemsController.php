<?php

class ItemsController extends Controller {

        function views($id = null,$name = null) {
           $this->view('view',array('todo'=>$this->Item->select($id),'title'=>$name.' - My Todo List App'));
       }
       function viewall() {
           $this->view('viewall',['todo'=>$this->Item->selectAll(),'title'=>'All Items - My Todo List App']);
       }
       function add() {
           $todo = $_POST['todo'];
           $items = $this->Item->query('insert into items (item_name) values (\''.mysql_real_escape_string($todo).'\')');
           $this->view('add',['title'=>'Success - My Todo List App','todo'=>$items]);
       }
       function delete($id) {

          $itme = $this->Item->query('delete from items where id = \''.mysql_real_escape_string($id).'\'');
           $this->view('delete',['todo'=>$itme,'title'=>'Success - My Todo List App']);
       }


       function likang(){
            $this->view('likang');
       }
}