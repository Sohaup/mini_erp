<?php

namespace miniErp\modules\auth\domain\models\entities;

use miniErp\modules\auth\domain\models\valueObjects\Email;

class GoogleUser
{
    private string $uuid;
    private string $name;
    private Email $email;
    private string $avatar;
    public function __construct(?string $uuid = null, string $name, Email $email,  string $avatar)
    {
        $uuid ? $this->uuid = $uuid : "";
        $this->name = $name;
        $this->email = $email;
        $this->avatar = $avatar;
    }

    public function register(string $uuid, string $name, string $email)
    {
        $this->uuid = $uuid;
        $this->name = $name;
        $this->email = new Email($email);
    }

    public function save(string $name, Email $email, string $avatar)
    {
        $this->name = $name;
        $this->email = $email;
        $this->avatar = $avatar;
    }

    public function getUuid()
    {
        return $this->uuid;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }


    public function getAvatar()
    {
        return $this->avatar;
    }
}
