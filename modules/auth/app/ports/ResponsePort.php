<?php
namespace miniErp\modules\auth\app\ports;

interface ResponsePort {
    public function getResponse(string $res);
}