<?php

namespace miniErp\modules\auth\domain\models\valueObjects;

use Error;

final class Password
{
    private string $password;
    public function __construct(string $password)
    {
        $this->validate($password);
    }
    public function validate(string $password)
    {
        $filteredPassword = filter_var($password, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/^[a-zA-Z][a-z]{8,}[\S]+$/']]);
        if ($filteredPassword) {
            $this->password = $this->hashed($filteredPassword);
        } else {
            throw new Error("password must at least be 10 charchters ends with one symbol and capital charachters allowed only at the first charachter");
        }
    }

    public function hashed(string $password)
    {
        return hash("sha256", $password);
    }

    public function __toString()
    {
        return $this->password;
    }
}
