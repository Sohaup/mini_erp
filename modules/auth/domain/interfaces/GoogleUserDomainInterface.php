<?php

namespace miniErp\modules\auth\domain\interfaces;

use miniErp\modules\auth\domain\models\entities\GoogleUser;

interface GoogleUserDomainInterface
{
    public function findAll();
    public function findOne(string $uuid);
    public function findBy(array $critiria);
    public function create(GoogleUser $user);
    public function update(GoogleUser $user);
    public function delete(string $uuid);
}
