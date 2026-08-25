<?php

namespace miniErp\modules\auth\domain\models\valueObjects;

final class Hash
{
    private string $hash;
    public function __construct(string $hash)
    {
        $this->hash = hash("sha256", $hash);
    }

    public function __toString()
    {
        return $this->hash;
    }
}
