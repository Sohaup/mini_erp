<?php

namespace miniErp\modules\auth\infrastructure\config\DB;

use Error;
use PDO;

class DBManeger
{
    private static ?PDO $dataBase = null;
    private function __construct(DBFactory $factory)
    {
        self::$dataBase = $factory->getDataBase();
    }
    private function __clone() {}
    public static function initializeDataBase()
    {
        if (!self::$dataBase) {
            switch ($_ENV['DB_DRIVER']) {
                case "pgsql":
                    $postgre = new PostgreFactory(new Postgre());
                    new self($postgre);
                    break;
                case "mysql":
                    $mysql = new MysqlFactory(new Mysql());
                    new self($mysql);
                    break;
                default:
                    throw new Error("unsppoerted dataBase Drive" . " " . $_ENV['DB_DRIVER']);
            }
        } else {
            return self::$dataBase;
        }
    }

    public function getDataBase() : PDO {
        return self::$dataBase;
    }
}
