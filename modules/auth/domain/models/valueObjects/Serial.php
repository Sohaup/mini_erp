<?php

namespace miniErp\modules\auth\domain\models\valueObjects;

use Error;

final class Serial
{
    private int $serial;

    public function __construct(int $serial)
    {
        $this->validate($serial);
    }

    public function validate(int $serial)
    {
        if ($serial > 0) {
            $this->serial = $serial;
        } else {
            throw new Error("serial must be a positive number");
        }
    }

    public function __toString()
    {
        return $this->serial;
    }
}
