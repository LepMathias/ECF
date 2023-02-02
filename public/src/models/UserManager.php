<?php
require_once 'User.php';
class UserManager
{
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function addUser(string $lastname, string $firstname, string $email, string $phoneNumber,
                            string $password, int $defaultNbrGuest, string $allergies)
    {

        $statement = $this->pdo->prepare('INSERT INTO users 
    (id, lastname, firstname, email, phoneNumber, password, defaultNbrGuest, allergies) 
VALUES (UUID(), :lastname, :firstname,:email, :phoneNumber, :password, :defaultNbrGuest, :allergies)');
        $statement->bindValue(':lastname', $lastname);
        $statement->bindValue(':firstname', $firstname);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':phoneNumber', $phoneNumber);
        $statement->bindValue(':password', password_hash($password, PASSWORD_BCRYPT));
        $statement->bindValue(':defaultNbrGuest', $defaultNbrGuest);
        $statement->bindValue(':allergies', $allergies);

        $statement->execute();
    }

    public function connectUser(string $email, string $password)
    {
        $statement = $this->pdo->prepare('SELECT * FROM users WHERE email = :email');
        $statement->setFetchMode(PDO::FETCH_CLASS, 'User');
        $statement->bindValue(':email', $email);
        if ($statement->execute()) {
            while ($user = $statement->fetch()) {
                if ($user->isPasswordValid($password)) {
                    session_start();
                    $_SESSION['id'] = $user->getId();
                    $_SESSION['admin'] = $user->getisAdmin();
                    $_SESSION['firstname'] = $user->firstname;
                    $_SESSION['lastname'] = $user->lastname;
                    $_SESSION['defaultNbrGuest'] = $user->defaultNbrGuest;
                    $_SESSION['email'] = $user->email;
                    $_SESSION['phoneNumber'] = $user->phoneNumber;
                    $_SESSION['allergies'] = $user->allergies;
                    return $user;
                }
            }
        }
        throw new Exception('Identifiants invalides');
    }
}
