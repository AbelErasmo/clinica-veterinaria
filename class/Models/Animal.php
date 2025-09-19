<?php
class Animal {
    private int $id;
    private string $nome;
    private Especie $especie;
    private ?string $descricao;
    private ?string $imagemUrl;

    public function __construct(int $id, string $nome, Especie $especie, ?string $descricao = null,
        ?string $imagemUrl = null ) {
        $this->id = $id;
        $this->nome = $nome;
        $this->especie = $especie;
        $this->descricao = $descricao;
        $this->imagemUrl = $imagemUrl;
    }

    public function getId(): int { return $this->id; }
    public function getNome(): string { return $this->nome; }
    public function getEspecie(): Especie { return $this->especie; }
    public function getDescricao(): ?string { return $this->descricao; }
    public function getImagemUrl(): ?string { return $this->imagemUrl; }
}
