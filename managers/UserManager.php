<?php

/**
 * @author : Gaellan
 * @link : https://github.com/Gaellan
 */


class UserManager extends AbstractManager
{


    public function findByEmail(string $email): ?object
    {
        $selectByEmail = $this->db->prepare('SELECT * FROM users WHERE email = :email');
        $parameters = [
            'email' => $email,
        ];
        $selectByEmail->execute($parameters);
        $user = $selectByEmail->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            $newUser = new User($user['email'], $user['password']);
            $newUser->settId($user['id']);
            $_SESSION['connecter'] = 'oui';

            return $newUser;
        } else {
            return null;
        }
    }



    public function create(User $user): void
    {
        $createQuery = $this->db->prepare('INSERT INTO users (email, password) VALUES (:email, :password)');
        $parameters = [
            'email' => $user->getEmail(),
            'password' => $user->getPassword(),
        ];

        $password =
            $createQuery->execute($parameters);

        $user->settId($this->db->lastInsertId());
    }
}
