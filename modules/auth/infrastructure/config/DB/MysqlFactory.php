<?php 
namespace miniErp\modules\auth\infrastructure\config\DB;

use Override;
use PDO;

class MysqlFactory implements DBFactory {
    private PDO $dataBase;
    public function __construct(Mysql $mySql)
    {
        $this->dataBase = $mySql->getInstance();
    }
    #[Override]
    public function getDataBase()
    {
        return $this->dataBase;
    }
}