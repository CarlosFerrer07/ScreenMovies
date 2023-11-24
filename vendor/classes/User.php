<?php

class User
{

    private int $idUser;
    private string $name;
    private string $sureName;
    private string $userAccount;
    private string $password;
    private string $securePassword;
    private string $email;

    public function __construct(int $id, string $nombre, string $apellidos, string $usuario, string $contraseña, string $securePassword, string $email)
    {
        $this->idUser = $id;
        $this->name = $nombre;
        $this->sureName = $apellidos;
        $this->userAccount = $usuario;
        $this->password = $contraseña;
        $this->securePassword = $securePassword;
        $this->email = $email;
    }

    /**
     * Get the value of idUser
     */
    public function getIdUser(): int
    {
        return $this->idUser;
    }

    /**
     * Get the value of name
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Get the value of sureName
     */
    public function getSureName(): string
    {
        return $this->sureName;
    }

    /**
     * Get the value of userAccount
     */
    public function getUserAccount(): string
    {
        return $this->userAccount;
    }

    /**
     * Get the value of password
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * Get the value of securePassword
     */
    public function getSecurePassword(): string
    {
        return $this->securePassword;
    }

    /**
     * Get the value of email
     */
    public function getEmail(): string
    {
        return $this->email;
    }
}
