<?php

class UserRepository extends Connection
{

    public function __construct()
    {
        $this->connect();
    }

    public function encriptPassword(array $data): string
    {
        $encriptedPassword = password_hash($data['password'], PASSWORD_BCRYPT);
        return $encriptedPassword;
    }

    public function insertUser(array $data, string $securePassword): bool
    {

        //calculo de la id

        $sql = $this->conn->query("SELECT MAX(id) as 'maxIdUser' from usuario");
        $id = $sql->fetch(PDO::FETCH_ASSOC);
        if ($id['maxIdUser'] == NULL) {
            $newId = 1;
        } else {
            $newId = $id['maxIdUser'] + 1;
        }

        //estamentos preparados

        $stmtInsert = $this->conn->prepare("INSERT INTO `usuario`(`id`, `nombre`, `apellidos`, `usuario`, `contraseña`, `securePassword`, `email`) VALUES (?,?,?,?,?,?,?)");

        $stmtInsert->bindParam(1, $newId, PDO::PARAM_INT);
        $stmtInsert->bindParam(2, $data['name'], PDO::PARAM_STR);
        $stmtInsert->bindParam(3, $data['sureName'], PDO::PARAM_STR);
        $stmtInsert->bindParam(4, $data['userAccount'], PDO::PARAM_STR);
        $stmtInsert->bindParam(5, $data['password'], PDO::PARAM_STR);
        $stmtInsert->bindParam(6, $securePassword, PDO::PARAM_STR);
        $stmtInsert->bindParam(7, $data['email'], PDO::PARAM_STR);

        return $stmtInsert->execute();
    }

    public function getUserId(string $nameAccount): array
    {

        $stmt = $this->conn->prepare("SELECT `id` FROM `usuario` WHERE `usuario`= ? ");

        $stmt->bindParam(1, $nameAccount, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
