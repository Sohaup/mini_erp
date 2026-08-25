<?php

namespace miniErp\modules\auth\domain\models\entities;

use DateTime;
use miniErp\modules\auth\domain\models\valueObjects\Hash;
use miniErp\modules\auth\domain\models\valueObjects\Uuid;

class Token
{
    private Uuid $uuid;
    private Hash $text;
    private bool $status;
    private DateTime $created_at;
    private DateTime $updated_at;
    public function __construct(?Uuid $uuid = null, Hash $text, bool $status, string $created_at)
    {
        $uuid ? $this->uuid = $uuid : "";
        $this->text = $text;
        $this->status = $status;
        $this->created_at = new DateTime($created_at);
    }

    public function initialize(Uuid $uuid, string $text, bool $status)
    {
        $this->uuid = $uuid;
        $this->text = new Hash($text);
        $this->status = $status;
    }

    public function save(string $text, bool $status, string $created_at, string $updated_at)
    {
        $this->text = new Hash($text);
        $this->status = $status;
        $this->created_at = new DateTime($created_at);
        $this->updated_at = new DateTime($updated_at);
    }

    public function getUuid()
    {
        return $this->uuid;
    }

    public function getStatus()
    {
        return $this->status;
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
}
