<?php
class AnimalView {
    public function exibirAnimais(int $limite = 9): void {
        $animalControl = new AnimalController();
        $listaAnimal = $animalControl->listar($limite);

        if (empty($listaAnimal)) {
            echo "<p>Nenhum animal encontrado.</p>";
            return;
        }

        foreach ($listaAnimal as $animal) {
            $nome = is_array($animal) ? ($animal['nome'] ?? '') : $animal->getNome();
            $especieNome = is_array($animal)
                ? ($animal['especie_nome'] ?? '')
                : $animal->getEspecie()->getNome();

            $imagem = is_array($animal)
                ? ($animal['imagem_url'] ?? './img/6.jpg')
                : ($animal->getImagemUrl() ?? './img/1338355.jpg');

            $descricao = is_array($animal)
                ? ($animal['descricao'] ?? 'Sem descrição disponível.')
                : ($animal->getDescricao() ?? 'Sem descrição disponível.');

            $nome = htmlspecialchars($nome);
            $especieNome = htmlspecialchars($especieNome);
            $descricao = htmlspecialchars($descricao);

            echo "
                <div class='card'>
                    <img src='{$imagem}' alt='{$nome}'>
                    <h4>Nome: {$nome}</h4>
                    <p><b>Espécie:</b> <i>{$especieNome}</i></p>
                    <p class='descricao'><b>Descrição:</b> {$descricao}</p>
                </div>
            ";
        }
    }
}
