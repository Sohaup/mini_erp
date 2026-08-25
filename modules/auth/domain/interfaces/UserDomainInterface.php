<?php

namespace miniErp\modules\auth\domain\interfaces;

use miniErp\modules\auth\domain\models\entities\User;

interface UserDomainInterface
{
    public function findAll();
    public function findOne(string $uuid);
    public function findBy(array $critiria);
    public function create(User $user);
    public function update(User $user);
    public function delete(string $uuid);
}
