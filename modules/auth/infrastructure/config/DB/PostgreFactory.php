<?php
namespace miniErp\modules\auth\infrastructure\config\DB;

use Override;
use PDO;

class PostgreFactory implements DBFactory {
    private PDO $dataBase; 
    public function __construct(Postgre $postgre)
    {
       $this->dataBase = $postgre->getInstance();
    }
    #[Override]
    public function getDataBase()
    {
       return $this->dataBase;
    }
}