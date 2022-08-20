<?php

class Artigo
{
    private $mysql;
    public function __construct(mysqli $mysql) {
        $this->mysql = $mysql;
    }


    // funcao para adicionar um artigo no banco
    public function adicionar(string $titulo, string $conteudo): void {
        $insereArtigo = $this->mysql->prepare('INSERT INTO artigos VALUES (NULL, ?, ?);');
        $insereArtigo->bind_param('ss', $titulo, $conteudo);
        $insereArtigo->execute();
    }


    // funcao para remover um artigo 
    public function remover(string $id): void { // void e para qdo a funcao n retorna nada
        $removerArtigo = $this->mysql->prepare('DELETE FROM artigos WHERE id = ?');
        $removerArtigo->bind_param('s', $id);
        $removerArtigo->execute();
    }

    // funcao para exibir todos os artigos na pagina
    public function exibirTodos(): array {
        $resultado = $this->mysql->query('SELECT id, titulo, conteudo FROM artigos');
        $artigos = $resultado->fetch_all(MYSQLI_ASSOC);
        return $artigos;
    }

        
    public function encontrarPorId(string $id) {
        $selecionaArtigo = $this->mysql->prepare("SELECT id, titulo, conteudo FROM artigos WHERE id = ?");
        $selecionaArtigo->bind_param('s', $id);
        $selecionaArtigo->execute();
        $artigo = $selecionaArtigo->get_result()->fetch_assoc();
        return $artigo;
    }

    public function editar(string $id, string $titulo, string $conteudo): void {
        $editarArtigo = $this->mysql->prepare('UPDATE artigos SET titulo = ?, conteudo = ? WHERE id = ?');
        $editarArtigo->bind_param('sss', $titulo, $conteudo, $id);
        $editarArtigo->execute();
    }
}
