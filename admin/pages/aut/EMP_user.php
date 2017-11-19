<?php

require_once("../../Connections/EMP_config.php");

class usuarioDAO {

    function __construct() {
        $this->pdo = Conexao::EMP_getInstance();
    }

/*    function cadastrar(usuario $entUsuario) {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO admin VALUES ('', :us_nome, :us_email, :us_sexo, :us_data, :us_hora, :us_ip)");
            $param = array(
                ":us_nome" => $entUsuario->getUs_nome(),
                ":us_email" => $entUsuario->getUs_email(),
                ":us_sexo" => $entUsuario->getUs_sexo(),
                ":us_data" => date("Y/m/d"),
                ":us_hora" => date("h:i:s"),
                ":us_ip" => $_SERVER["REMOTE_ADDR"]
            );

            return $stmt->execute($param);
        } catch (PDOException $ex) {
            echo "ERRO 01: {$ex->getMessage()}";
        }
    }

    function consultarCodUsuario($us_email) {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM usuario WHERE us_email = :us_email");
            $param = array(":us_email" => $us_email);


            $stmt->execute($param);

            if ($stmt->rowCount() > 0) {

                $consulta = $stmt->fetch(PDO::FETCH_ASSOC);
                return $consulta['us_cod'];
            } else {
                return "";
            }
        } catch (PDOException $ex) {
            echo "ERRO 02: {$ex->getMessage()}";
        }
    }

    function consultarEmail($us_email) {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM usuario WHERE us_email = :us_email");
            $param = array(":us_email" => $us_email);


            $stmt->execute($param);

            if ($stmt->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $ex) {
            echo "ERRO 03: {$ex->getMessage()}";
        }
    }*/

    function login($EMP_us_email, $EMP_se_senha) {
        try {

 
              $EMP_us_email = addslashes($EMP_us_email);
              $EMP_se_senha = addslashes($EMP_se_senha);
  
              $stmt = $this->pdo->prepare("SELECT * FROM admin WHERE email = :EMP_us_email AND password = :EMP_se_senha");

            $param = array(
                ":EMP_us_email" => $EMP_us_email,
                ":EMP_se_senha" => $EMP_se_senha
            );


            $stmt->execute($param);

            if ($stmt->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $ex) {
            echo "ERRO 04: {$ex->getMessage()}";
        }
    }

}

?>