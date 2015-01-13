<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BDD
 *
 * @author angagnon3
 */
class BDD {
    
    static private $instance = null;
    static $db = null;    
    
    public static function getInstance(){
        if(self::$instance == null)
        {
            self::$instance = new self;
        }
        return self::$instance;
    }
    
    public function __construct(){
      try {
        self::$db = new PDO("mysql:host=localhost;dbname=".$GLOBALS['dbname'], $GLOBALS['user'], $GLOBALS['pass']);
      } catch ( Exception $e ) {
        echo "Connection à MySQL impossible : ", $e->getMessage();
        die();
      }

    }
    
    public function Executer($req, $param = null) {

       $statement = self::$db->prepare($req);
       
       if(!$statement){
          echo "\nPDO::errorInfo():\n";
          print_r($db->errorInfo());
          return false;
       }
       
       $statement->execute($param);


        return $statement;
    }
    
}
