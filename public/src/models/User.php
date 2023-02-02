<?php
class User
{
    private string $id;
    public string $lastname;
    public string $firstname;
    public string $email;
    public int $phoneNumber;
    private string $password;
    public string $defaultNbrGuest;
    public string $allergies;
    private int $isAdmin;

    public function getId(): string
    {
        return $this->id;
    }

    public function getIsAdmin(): int
    {
        return $this->isAdmin;
    }

    public function isPasswordValid(string $password): bool
    {
        return password_verify($password, $this->password);
    }
}
