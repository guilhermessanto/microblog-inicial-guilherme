<?php
namespace Microblog;
use PDO, Exception;

final class Noticia{
    private int $id;
    private string $nome;
    private string $data;
    private string $texto;
    private string $resumo;
    private string $imagem;
    private string $destaque;
    private int $categoria_id;

    /* 
    Criando uma propriedade do tipo usuario, ou seja, a partir de uma classe que criamos com o objetivo de reutilizar recursos dela
    
    Isto permitirá fazer uma ASSOCIAÇÃO entre classes.
    */
    public Usuario $usuario;
    private PDO $conexao;

    public function __construct()
    {
        /* No momento em que um objeto Noticia for instanciado nas páginas, aproveitaremos para também instanciar um objeto Usuario e com isso acessar recursos desta classe. */
        $this->usuario = new Usuario;
        $this->conexao = $this->usuario->getConexao();
    }

    public function inserir():void
    {
        $sql = "INSERT INTO noticias(titulo, texto, resumo, imagem , destaque, usuario_id, categoria_id) VALUES(:titulo, :texto, :resumo, :imagem , :destaque, :usuario_id, :categoria_id)";

        try{
            $consulta = $this->conexao->prepare($sql);
            $consulta->bindParam(":titulo", $this->titulo, PDO::PARAM_STR);
            $consulta->bindParam(":texto", $this->texto, PDO::PARAM_STR);
            $consulta->bindParam(":resumo", $this->resumo, PDO::PARAM_STR);
            $consulta->bindParam(":imagem", $this->imagem, PDO::PARAM_STR);
            $consulta->bindParam(":destaque", $this->destaque, PDO::PARAM_STR);
            $consulta->bindParam(":categoria_id", $this->categoria_id, PDO::PARAM_INT);
            $consulta->bindValue(":usuario_id",$this->usuario->getId(), PDO::PARAM_INT);
            $consulta->execute();
            
        }catch(Exception $erro){
            die("Erro:". $erro->getMessage());
        }
    }






































    /* GETTERS E SETTERS */
    
    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = filter_var($id,FILTER_SANITIZE_NUMBER_INT);

    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome)
    {
        $this->nome = filter_var($nome, FILTER_SANITIZE_SPECIAL_CHARS);

    }
    public function getData(): string
    {
        return $this->data;
    }

    public function setData(string $data)
    {
        $this->data = filter_var($data, FILTER_SANITIZE_SPECIAL_CHARS);

    }

    public function getTexto(): string
    {
        return $this->texto;
    }

    public function setTexto(string $texto)
    {
        $this->texto = filter_var($texto, FILTER_SANITIZE_SPECIAL_CHARS);

    }

    public function getResumo(): string
    {
        return $this->resumo;
    }

    public function setResumo(string $resumo)
    {
        $this->resumo = filter_var($resumo, FILTER_SANITIZE_SPECIAL_CHARS);

    }

    public function getImagem(): string
    {
        return $this->imagem;
    }

    public function setImagem(string $imagem)
    {
        $this->imagem = filter_var($imagem, FILTER_SANITIZE_SPECIAL_CHARS);

    }

    public function getDestaque(): string
    {
        return $this->destaque;
    }

    public function setDestaque(string $destaque)
    {
        $this->destaque = filter_var($destaque, FILTER_SANITIZE_SPECIAL_CHARS);

    }

    public function getCategoriaId(): int
    {
        return $this->categoria_id;
    }
    public function setCategoriaId(int $categoria_id)
    {
        $this->categoria_id = $categoria_id;
    }
}