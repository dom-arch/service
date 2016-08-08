<?php

namespace Traits;

trait Users
{
    protected static $printables = [
        'id',
        'createdAt',
        'updatedAt',
        'archivedAt',
        'account',
        'type',
        'email',
        'locale'
    ];

    public function isPassword(
        string $password
    )
    {
        return password_verify($password, $this->getPassword());
    }
}
