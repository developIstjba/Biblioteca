<?php

namespace app\Core;

use PDO;
use PDOException;

/**
 * Description of Database
 *
 * @author Jonathan
 */
class MariaDB{
     
    private $pdo;
    
    public function __construct() {
        try{
            $config = require('./config/database.php');
            $this->pdo = new \PDO($config['MariaDB']['driver'].':host='.$config['MariaDB']['host'].';dbname='.$config['MariaDB']['dbname'].';charset='.$config['MariaDB']['charset'], 
                    $config['MariaDB']['user'], 
                    $config['MariaDB']['password']);
            
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(\PDOException $err){
            echo 'Error: '.$err->getMessage();
            exit();
        }
        
    }
    
    
    public function select($sql, $params, $model){
                
        try{
            $sth = $this->pdo->prepare($sql);
            
            foreach ($params as $key => $value) {
                $sth->bindValue(":".$key, $value);
            }
            
            $sth->execute();
            return $sth->fetchAll(PDO::FETCH_CLASS, $model);
            
        }catch(PDOException $err){
            
            return [];
            
        }
        
    }
    
    
    public function execute($sql, $params){
        
        try{
            $sth = $this->pdo->prepare($sql);
            
            foreach ($params as $key => $value) {
                $sth->bindValue(":".$key, $value);
            }
            
            $this->pdo->beginTransaction();
            $rsp = $sth->execute();
            $this->pdo->commit();           
            return $rsp;
            
        }catch(PDOException $err){
            
            $this->pdo->rollBack();            
            return 0;
        }
        
    }
    
    
    public function lastInsertId(){
        
        try {
            $sth = $this->pdo->query('SELECT @@identity AS id');
            $rsp = $sth->fetchColumn();
            
        } catch (Exception $err) {
             $rsp = 0;
        }
        return $rsp;

    }
    
    
    public function selectArray($sql, $params){
                
        try{
            $sth = $this->pdo->prepare($sql);
            
            foreach ($params as $key => $value) {
                $sth->bindValue(":".$key, $value);
            }
            
            $sth->execute();
            return $sth->fetchAll();
            
        }catch(PDOException $err){
            
            return [];
            
        }
        
    }
    
    
}
?>