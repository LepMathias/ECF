<?php
require 'Setting.php';
class SettingManager
{
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }
    public function getSettings($name)
    {
        $statement = $this->pdo->prepare("SELECT * FROM settings WHERE name = :name");
        $statement->bindValue(':name', $name);
        $statement->setFetchMode(PDO::FETCH_CLASS, 'Setting');
        $statement->execute();

        return $statement->fetch();
    }
    public function updateSetting( $setting, $id)
    {

        $statement = $this->pdo->prepare('UPDATE settings
                                                SET content = :setting
                                                WHERE id = :id');
        $statement->bindValue(':setting', $setting);
        $statement->bindValue(':id', $id);

        $statement->execute();
    }
}