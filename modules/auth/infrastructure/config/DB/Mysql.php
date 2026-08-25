<?php

namespace miniErp\modules\auth\infrastructure\config\DB;

use miniErp\modules\auth\infrastructure\adapters\EnvAdapter;
use Override;
use PDO;

class Mysql implements DB
{

    #[Override]
    public function getInstance()
    {
        return new PDO("mysql:host={$_ENV['HOST']};port={$_ENV['PORT']};dbname={$_ENV['DB_NAME']}", $_ENV['DB_USER'], $_ENV['DB_PASSWORD']);
    }
}
