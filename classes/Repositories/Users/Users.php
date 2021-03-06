<?php

namespace Repositories;

use Indoctrinated\Repository;
use Users as Entity;

/**
 * Users
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class Users extends Repository
{
    public function selectByLogin(
        string $account,
        string $password
    )
    {
        $user = $this->selectBy([
            'account' => $account
        ]);
        
        if (!$user) {
            return;
        }

        if ($user->isPassword($password)) {
            return $user;
        }
    }
}
