<?php
require_once './config/db_connect.php';

class AnimalController {

    public function listar(int $limit = 9): array {
        global $conn;

        $limit = max(1, min(9, (int)$limit));

        $sql = "
            SELECT 
                a.codigo AS animal_id,
                a.nome   AS animal_nome,
                e.codigo AS especie_id,
                e.nome   AS especie_nome
            FROM animal a
            JOIN especie e ON a.cod_especie = e.codigo
            ORDER BY a.codigo ASC
            LIMIT {$limit}
        ";

        // // VERSÃO 2: schema com id / especie
        // $sql = "
        //     SELECT 
        //         a.id     AS animal_id,
        //         a.nome   AS animal_nome,
        //         e.id     AS especie_id,
        //         e.nome   AS especie_nome
        //     FROM animal a
        //     JOIN especie e ON a.especie = e.id
        //     ORDER BY a.id ASC
        //     LIMIT {$limit}
        // ";

        $result = mysqli_query($conn, $sql);
       
        $animais = [];
        while ($linha = mysqli_fetch_assoc($result)) {
            $animais[] = [
                'id'           => (int)$linha['animal_id'],
                'nome'         => $linha['animal_nome'],
                'especie_id'   => (int)$linha['especie_id'],
                'especie_nome' => $linha['especie_nome'],
            ];
        }

        return $animais;
    }
}
