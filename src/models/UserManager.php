<?php

class UserManager
{
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function addUser(string $lastName, string $firstName, string $email, string $phoneNumber,
                            string $password, int $defaultNbrGuest, string $allergies)
    {

        $statement = $this->pdo->prepare('INSERT INTO users 
    (id, lastName, firstName, email, phoneNumber, password, defaultNbrGuest, allergies) 
VALUES (UUID(), :lastName, :firstName,:email, :phoneNumber, :password, :defaultNbrGuest, :allergies)');
        $statement->bindValue(':lastName', $lastName);
        $statement->bindValue(':firstName', $firstName);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':phoneNumber', $phoneNumber);
        $statement->bindValue(':password', password_hash($password, PASSWORD_BCRYPT));
        $statement->bindValue(':defaultNbrGuest', $defaultNbrGuest);
        $statement->bindValue(':allergies', $allergies);

        $statement->execute();
    }

    public function connectUser(string $email, string $password)
    {
        require 'src/models/User.php';
        $statement = $this->pdo->prepare('SELECT * FROM users WHERE email = :email');
        $statement->setFetchMode(PDO::FETCH_CLASS, 'User');
        $statement->bindValue(':email', $email);
        if ($statement->execute()) {
            while ($user = $statement->fetch()) {
                if ($user->isPasswordValid($password)) {
                    $_SESSION['id'] = $user->getId();
                    return $user;
                }
            }
        }
        throw new Exception('Identifiants invalides');
    }
}
