<?php

namespace miniErp\modules\auth\domain\models\valueObjects;

use Error;

final class Uuid
{
    private string $uuid;

    public function __construct(string $uuid)
    {
        $this->validate($uuid);
    }

    public function validate(string $uuid)
    {
        $filterdUuid = filter_var($uuid, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/^[0-9a-f]{8}-[0-9a-f]{4}-[1-8][0-9a-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12}$/i']]);
        if ($filterdUuid) {
            $this->uuid = $filterdUuid;
        } else {
            throw new Error("not valid uuid");
        }
    }

    public function __toString()
    {
        return $this->uuid;
    }
}
