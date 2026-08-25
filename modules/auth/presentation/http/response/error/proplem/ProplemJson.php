<?php

namespace miniErp\modules\auth\presentation\http\response\error\proplem;

use Error;
use miniErp\modules\auth\infrastructure\adapters\JsonResponse;
use Throwable;

class ProplemJson
{
    public function __construct(private JsonResponse $jsonResponse) {}
    public function getResponse(string $title, string $description, string $type)
    {
        try {
            $res = ["title" => $title, 'description' => $description, 'type' => $type];
            return  $this->jsonResponse->getResponse(json_encode($res));
        } catch (Throwable $err) {
            throw new Error("error in render the error ");
        }
    }
}
