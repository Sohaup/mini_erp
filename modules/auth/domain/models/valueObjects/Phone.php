<?php

namespace miniErp\modules\auth\domain\models\valueObjects;

use Error;

final class Phone
{
    private string $phone;
    public function __construct(string $phone)
    {
        $this->validate($phone);
    }
    public function validate(string $phone)
    {
        $filterdPhone = filter_var($phone, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/^01[0125][0-9]{8}$/']]);
        if ($filterdPhone) {
            $this->phone = $filterdPhone;
        } else {
            throw new Error("phone number must be egyption phone number");
        }
    }

    public function __toString()
    {
        return $this->phone;
    }
}
