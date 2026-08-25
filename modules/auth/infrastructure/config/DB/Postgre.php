<?php

namespace miniErp\modules\auth\infrastructure\config\DB;

use miniErp\modules\auth\infrastructure\adapters\EnvAdapter;
use Override;
use PDO;

class Postgre implements DB
{

    #[Override]
    public function getInstance()
    {
        return new PDO("pgsql:host={$_ENV['HOST']};port={$_ENV['PORT']};dbname={$_ENV['DB_NAME']}", $_ENV['DB_USER'], $_ENV['DB_PASSWORD']);
    }
}
