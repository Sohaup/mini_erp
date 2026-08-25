<?php

namespace miniErp\modules\auth\infrastructure\adapters;

use Dotenv\Dotenv;
use Error;
use miniErp\modules\auth\app\ports\EnvPort;
use Override;
use Throwable;

class EnvAdapter implements EnvPort
{
    private Dotenv $dotenv;
    private function __construct()
    {
        $this->locateEnv();
        $this->load();
    }
    #[Override]
    public static function initialize()
    {
        try {
            $self = new self();
        } catch (Throwable $err) {
            throw new Error("can not find .env directory");
        }
    }
    #[Override]
    public function locateEnv()
    {
        try {
            $this->dotenv = Dotenv::createImmutable(__DIR__ . "/../../../../");
        } catch (Throwable $err) {
            throw new Error("can not find .env directory");
        }
    }
    #[Override]
    public function load()
    {
        try {
            $this->dotenv->load();
        } catch (Throwable $err) {
            throw new Error("can not load env ");
        }
    }
}
