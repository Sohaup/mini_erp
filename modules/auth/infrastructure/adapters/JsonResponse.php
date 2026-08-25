<?php

namespace miniErp\modules\auth\infrastructure\adapters;

use Error;
use Laminas\Diactoros\Response;
use Laminas\Diactoros\Response\JsonResponse as ResponseJsonResponse;
use miniErp\modules\auth\app\ports\ResponsePort;
use Override;
use Throwable;

class JsonResponse implements ResponsePort
{
    #[Override]
    public function getResponse(string $json)
    {
        try {
            $response = new ResponseJsonResponse($json);
            return $response;
        } catch (Throwable $err) {
            throw new Error("error in handle json response");
        }
    }
}
