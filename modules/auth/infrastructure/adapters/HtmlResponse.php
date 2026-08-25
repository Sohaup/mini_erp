<?php

namespace miniErp\modules\auth\infrastructure\adapters;

use Error;
use Laminas\Diactoros\Response;
use miniErp\modules\auth\app\ports\ResponsePort;
use Override;
use Throwable;

class HtmlResponse implements ResponsePort
{
    #[Override]
    public function getResponse(string $html)
    {
        try {
            $respone = new Response();
            $respone->getBody()->write($html);
            return $respone;
        } catch (Throwable $err) {
            throw new Error("error in handling html response");
        }
    }
}
