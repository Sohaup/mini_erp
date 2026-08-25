<?php

namespace miniErp\modules\auth\domain\interfaces;

use miniErp\modules\auth\domain\models\entities\Token;

interface TokenDomainInterface
{
    public function findAll();
    public function findOne(string $uuid);
    public function findBy(array $critiria);
    public function create(Token $token);
    public function update(Token $token);
    public function delete(string $uuid);
}
