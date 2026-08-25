<?php
namespace miniErp\modules\auth\app\ports;

interface EnvPort {
    public static function initialize();
    public function locateEnv();
    public function load();  
}