<?php

namespace app\DAO;

use app\Core\MariaDB;

/**
 * Description of BaseDAO
 *
 * @author Jonathan
 */
class BaseDAO {
    
    protected $bd;
    
    public function __construct() {
        $this->bd = new MariaDB();
    }
    
    
    
}

?>