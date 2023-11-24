<?php

class CommentsRepository extends Connection
{

    public function __construct()
    {
        $this->connect();
    }

    public function insertComment(int $idMovie, int $idUser, string $comment): bool
    {
        //calculo idComment

        $sql = $this->conn->query("select MAX(`idComentario`) as maxIdComentario from comentario");
        $id = $sql->fetch(PDO::FETCH_ASSOC);
        if ($id['maxIdComentario'] == NULL) {
            $newIdComment = 1;
        } else {
            $newIdComment = $id['maxIdComentario'] + 1;
        }

        //insercion
        $stmtInsertComment = $this->conn->prepare("INSERT INTO `comentario`(`idComentario`, `idPelicula`, `idUsuario`, `comentario`) VALUES (?,?,?,?)");

        $stmtInsertComment->bindParam(1, $newIdComment, PDO::PARAM_INT);
        $stmtInsertComment->bindParam(2, $idMovie, PDO::PARAM_INT);
        $stmtInsertComment->bindParam(3, $idUser, PDO::PARAM_INT);
        $stmtInsertComment->bindParam(4, $comment, PDO::PARAM_STR);

        return $stmtInsertComment->execute();
    }

    public function getCommentsByIdMovie(int $idMovie): array
    {

        $stmt = $this->conn->prepare("SELECT usuario.usuario, comentario.comentario from usuario join comentario on usuario.id=comentario.idUsuario where `idPelicula`= ? ");

        $stmt->bindParam(1, $idMovie, PDO::PARAM_INT);

        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            $arrComments[] = new Comments(...$row);
        }

        return $arrComments;
    }

    public function drawComments(array $dataComments): string {
        $output = "";

        foreach ($dataComments as $comment) {
            $output .= "<h4>".$comment->getUserAccount()."</h4>";
            $output .= "<q>".$comment->getComment()."</q>";
        }

        return $output;
    }
}
