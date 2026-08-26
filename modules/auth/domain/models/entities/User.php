<?php

namespace miniErp\modules\auth\domain\models\entities;

use miniErp\modules\auth\domain\models\valueObjects\Email;
use miniErp\modules\auth\domain\models\valueObjects\Password;
use miniErp\modules\auth\domain\models\valueObjects\Phone;
use miniErp\modules\auth\domain\models\valueObjects\Uuid;

class User
{
    private Uuid $uuid;
    private string $name;
    private Email $email;
    private ?Password $password;
    private ?Phone $phone;
    private string $avatar;
    
    public function __construct(?Uuid $uuid = null, string $name, Email $email, Password $password, Phone $phone, string $avatar)
    {
        $uuid ? $this->uuid = $uuid : "";
        $this->name = $name;
        $this->email = $email;
        $password ? $this->password = $password : "";
        $phone ? $this->phone = $phone : "";
        $this->avatar = $avatar;
    }

    public function register(Uuid $uuid, string $name, string $email, string $password)
    {
        $this->uuid = $uuid;
        $this->name = $name;
        $this->email = new Email($email);
        $this->password = new Password($password);
    }

    public function save(string $name, Email $email, Password $password, Phone $phone, string $avatar)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->phone = $phone;
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

    public function getPhone()
    {
        return $this->phone;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getAvatar()
    {
        return $this->avatar;
    }
}
