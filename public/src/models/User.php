<?php
class User
{
    private string $id;
    public string $lastName;
    public string $firstName;
    public string $email;
    public int $phoneNumber;
    public string $password;
    public string $defaultNbrGuest;
    public string $allergies;
    public int $isAdmin;

    public function getId(): string
    {
        return $this->id;
    }

    public function getIsAdmin(): int
    {
        return $this->isAdmin;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPhoneNumber(): int
    {
        return $this->phoneNumber;
    }

    public function getDefaultNbrGuest(): string
    {
        return $this->defaultNbrGuest;
    }

    public function getAllergies(): string
    {
        return $this->allergies;
    }

    public function isPasswordValid(string $password): bool
    {
        return password_verify($password, $this->password);
    }
}
