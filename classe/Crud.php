<?php
include('database/conexao.php');

$db = new Conexao();

class CrudProduto{
    private $conn;

    public function __construct($db){
        $this->conn = $db;
    }

    public function create($postValue){
        $nome_produto = $postValue['nome_produto'];
        $ano = $postValue['ano'];
        $combustivel = $postValue['combustivel'];
        $potencia = $postValue['potencia'];
        $portas = $postValue['portas'];
        $tracao = $postValue['tracao'];
        $cambio = $postValue['cambio'];
        $porta_malas = $postValue['porta_malas'];
        $tanque = $postValue['tanque'];
        $velocidade = $postValue['velocidade'];
        $aceleracao = $postValue['aceleracao'];
        $consumo = $postValue['consumo'];
        $qt_produtos = $postValue['qt_produtos'];
        $marca = $postValue['marca'];
        $preco = $postValue['preco'];
        


        if(isset($_FILES['foto_produto'])){
            $arquivo = $_FILES['foto_produto'];
            $extensao = pathinfo($arquivo['name'], PATHINFO_EXTENSION);
            $ex_permitidos = array('jpg', 'jpeg', 'png', 'jfif');
    
            if (in_array(strtolower($extensao), $ex_permitidos)) {
                $caminho_arquivo = 'foto_produtos/' . $arquivo['name'];
                move_uploaded_file($arquivo['tmp_name'], $caminho_arquivo);
            } else {
                die('Você não pode fazer upload desse tipo de arquivo');
            }
        } else {
            $caminho_arquivo = ''; // Se nenhum arquivo foi enviado, defina o caminho como vazio
        }
        

        $query = "INSERT INTO produtos (nome_produto, ano, combustivel, potencia, portas, tracao, cambio, porta_malas, tanque, velocidade, aceleracao, consumo, qt_produtos, marca, foto_produto, preco) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1,$nome_produto);
        $stmt->bindParam(2,$ano);
        $stmt->bindParam(3,$combustivel);
        $stmt->bindParam(4,$potencia);
        $stmt->bindParam(5,$portas);
        $stmt->bindParam(6,$tracao);
        $stmt->bindParam(7,$cambio);
        $stmt->bindParam(8,$porta_malas);
        $stmt->bindParam(9,$tanque);
        $stmt->bindParam(10,$velocidade);
        $stmt->bindParam(11,$aceleracao);
        $stmt->bindParam(12,$consumo);
        $stmt->bindParam(13,$qt_produtos);
        $stmt->bindParam(14,$marca);
        $stmt->bindParam(15,$caminho_arquivo);
        $stmt->bindParam(16,$preco);


        $rows = $this->read();
        if($stmt->execute()){
            print "<script> alert('Cadastro realizado com sucesso!!! ')</script>";
            print"<script>  location.href='?action=read';</script>";
            return true;
        }else{
            return false;
        }

    }


    public function read(){
        $query = "SELECT * FROM produtos";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }


    public function update($postValues){
        $id_produto = $postValues['id_produto'];
        $nome_produto = $postValues['nome_produto'];
        $ano = $postValues['ano'];
        $combustivel = $postValues['combustivel'];
        $potencia = $postValues['potencia'];
        $portas = $postValues['portas'];
        $tracao = $postValues['tracao'];
        $cambio = $postValues['cambio'];
        $porta_malas = $postValues['porta_malas'];
        $tanque = $postValues['tanque'];
        $velocidade = $postValues['velocidade'];
        $aceleracao = $postValues['aceleracao'];
        $consumo = $postValues['consumo'];
        $qt_produtos = $postValues['qt_produtos'];
        $marca = $postValues['marca'];
        $caminho_arquivo = $postValues['caminho_arquivo'];
        $preco = $postValues['preco'];

        if(empty($id_produto) || empty($nome_produto) || empty($ano) || empty($combustivel) || empty($potencia) || empty($portas) || empty($tracao) || empty($cambio) || empty($porta_malas)|| empty($tanque) || empty($velocidade) || empty($aceleracao) || empty($consumo) || empty($qt_produtos) || empty($marca) || empty($caminho_arquivo) || empty($preco)){
            return false;
        }

        $query = "UPDATE produtos SET nome_produto = ?, ano = ?, combustivel = ?, potencia = ?, portas = ?, tracao = ?, cambio = ?, porta_malas = ?, tanque = ?, velocidade = ?, aceleracao = ?, consumo = ?, qt_produtos = ?, marca = ?, foto_produto = ?, preco = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1,$nome_produto);
        $stmt->bindParam(2,$ano);
        $stmt->bindParam(3,$combustivel);
        $stmt->bindParam(4,$potencia);
        $stmt->bindParam(5,$portas);
        $stmt->bindParam(6,$tracao);
        $stmt->bindParam(7,$cambio);
        $stmt->bindParam(8,$porta_malas);
        $stmt->bindParam(9,$tanque);
        $stmt->bindParam(10,$velocidade);
        $stmt->bindParam(11,$aceleracao);
        $stmt->bindParam(12,$consumo);
        $stmt->bindParam(13,$qt_produtos);
        $stmt->bindParam(14,$marca);
        $stmt->bindParam(15,$caminho_arquivo);
        $stmt->bindParam(16,$preco);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function delete($id){
        $query = "DELETE FROM produtos WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

}
?>