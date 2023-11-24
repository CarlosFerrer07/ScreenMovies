<?php

class Comments {

    private string $userAccount;
    private string $comment;

    public function __construct(string $usuario, string $comentario)
    {
        $this->userAccount = $usuario;
        $this->comment = $comentario;
    }

    /**
     * Get the value of userAccount
     */
    public function getUserAccount(): string
    {
        return $this->userAccount;
    }

    /**
     * Get the value of comment
     */
    public function getComment(): string
    {
        return $this->comment;
    }
}