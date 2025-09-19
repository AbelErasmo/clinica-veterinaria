<?php
class AnimalView {

    private function renderCards(array $lista): void {
        $dirSistema = realpath(__DIR__ . '/../../img') . DIRECTORY_SEPARATOR;
        $urlBase    = '/clinica-veterinaria/img/';

        foreach ($lista as $row) {
        $id    = (int)$row['animal_id'];
        $nome  = htmlspecialchars($row['animal_nome']);
        $esp   = htmlspecialchars($row['especie_nome']);

        $arquivo = $dirSistema . $id . '.jpg';
        if (file_exists($arquivo)) {
            $imgUrl = $urlBase . $id . '.jpg';
        } else {
            $imgUrl = $urlBase . 'placeholder.jpg';
        }

        echo "
            <div class='card'>
            <img src='{$imgUrl}' alt='Foto de {$nome}'>
            <h4>Nome: {$nome}</h4>
            <p><b>Espécie:</b> <i>{$esp}</i></p>
            </div>
        ";
        }
    }
    public function exibirAnimais(int $limite = 9): void {
        $dados = (new AnimalController())->listar($limite);
        $this->renderCards($dados);
    }

    public function exibirPesquisa(string $term, int $limit = 9): void {
        $dados = (new AnimalController())->pesquisar($term, $limit);
        if (empty($dados)) {
            printf("<p>Nenhum resultado para '<strong>%s</strong>'.</p>",htmlspecialchars($term));
            return;
        }

        $this->renderCards($dados);
    }

}
