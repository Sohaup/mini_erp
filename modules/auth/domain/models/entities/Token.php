<?php

namespace miniErp\modules\auth\domain\models\entities;

use DateTime;
use miniErp\modules\auth\domain\models\valueObjects\Hash;
use miniErp\modules\auth\domain\models\valueObjects\Serial;
use miniErp\modules\auth\domain\models\valueObjects\Uuid;

class Token
{
    private Uuid $uuid;
    private Hash $text;
    private bool $state;
    private Serial $family_serial;
    private Uuid $user_id;
    private DateTime $created_at;
    private DateTime $updated_at;

    public function __construct(?Uuid $uuid = null, Hash $text, bool $state, ?Serial $family_serial = null, Uuid $user_id,  string $created_at)
    {
        $uuid ? $this->uuid = $uuid : "";
        $this->text = $text;
        $this->state = $state;
        $family_serial ? $this->family_serial = $family_serial : $this->family_serial = new Serial(0);
        $this->user_id = $user_id;
        $this->created_at = new DateTime($created_at);
    }

    public function initialize(Uuid $uuid, string $text, bool $state)
    {
        $this->uuid = $uuid;
        $this->text = new Hash($text);
        $this->state = $state;
    }

    public function save(string $text, bool $state, string $created_at, string $updated_at)
    {
        $this->text = new Hash($text);
        $this->state = $state;
        $this->created_at = new DateTime($created_at);
        $this->updated_at = new DateTime($updated_at);
    }

    public function getUuid()
    {
        return $this->uuid;
    }

    public function getState()
    {
        return $this->state;
    }

    public function getText()
    {
        return $this->text;
    }

    public function getcreatedAt()
    {
        return $this->created_at->format("y-m-d h:m:i");
    }

    public function getUpdatedAt()
    {
        return $this->updated_at->format("y-m-d h:m:i");
    }

    public function getSerial()
    {
        return $this->family_serial;
    }

    public function getUserId()
    {
        return $this->user_id;
    }
}
