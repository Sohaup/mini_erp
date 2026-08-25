<?php

namespace miniErp\modules\auth\domain\models\valueObjects;

use Error;

final class Email
{
    private string $email;
    public function __construct(string $email)
    {
        $this->validate($email);
    }
    public function validate(string $email)
    {
        $filteredEmail = filter_var($email, FILTER_VALIDATE_EMAIL);
        if ($filteredEmail) {
            $this->email = $filteredEmail;
        } else {
            throw new Error("not valid email");
        }
    }
    public function __toString()
    {
        return $this->email;
    }
}
