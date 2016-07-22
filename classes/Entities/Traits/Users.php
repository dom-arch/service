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
        'password',
        'token',
        'locale'
    ];
}
