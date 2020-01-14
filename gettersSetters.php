<?php
#GETTERS E SETTERS

class Produto{

    private $descricao;
    private $preco;

    /*public function __construct($descricao, $preco){
        $this->descricao = $descricao;
        $this->preco = $preco;
    }*/

    public function getDetalhes(){
        return "O produto {$this->descricao} custa {$this->preco} reais";
    }


    #Getters & Setters
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }
    
    public function setPreco($preco)
    {
        $this->preco = $preco;

        return $this;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function getPreco()
    {
        return $this->preco;
    }
}

/*$p1 = new Produto('Livro', 50);*/

#Atribuindo Valores para o Objeto
$p1->setDescricao = 'Livro';
$p1->setPreco = 2;

//var_dump($p1);//Mostra na tela a info do obj
echo $p1->getDetalhes();