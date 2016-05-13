<?php
/**
 * Created by PhpStorm.
 * User: tairo
 * Date: 08/05/16
 * Time: 23:07
 */


interface UsuarioDados {
    function buscarPorEmailSenha($email, $senha);
}

class UsuarioDadosDB implements UsuarioDados{
    function buscarPorEmailSenha($email, $senha) {
        $con = null;
        $sql = "Select * from usuarios where email= '{$email}' and senha = '{senha}'";
        if($con->count()){
            return true;
        }

        return false;
    }
}

class UsuarioDadosExcel implements UsuarioDados{
    function buscarPorEmailSenha($email, $senha) {
        return  buscarLinhaArquivo($email,$senha);
    }
}

interface Logger {
    function success($msg);
}

class LittleServerLogger implements Logger {
    function success($msg) {
        file_get_contents('/var/www/', $msg);
    }
}

class DBLogger implements Logger {
    function success($msg) {
        $con = null;
        $sql = "insert into log('{$msg}')";
    }
}

interface Mailer{
    function enviar($address);
}

class ZendMail implements Mailer {
    function enviar($address) {
        mail('to','bar' ,'xxx' );
    }
}

class SwiftMail implements Mailer {
    function enviar($address) {
        mail('to','bar' ,'xxx' );
    }
}
########################################################################################################################
########################################################################################################################
/*Vai autenticar por email e senha
 *Se Login der certo retorna true
 *      Logar tentativa de login
 *      Vai ter de armazenar usuario e senha na sessão
 *Se der errado
 *      Mandar email pro usuario
 *      Logar tentativa de login
*/

class Autenticacao{
    /**
     * Autenticacao constructor.
     */
    public function __construct(UsuarioDados $usuarioDados, Logger $logger, Mailer $mailer) {
        $this->dados = $usuarioDados;
        $this->logger = $logger;
        $this->mailer = $mailer;
    }

    /** Injeta a dependencia  da interface*/
    public function autenticar($email, $senha){

        $correto = $this->dados->buscarPorEmailSenha($email, $senha);

        if($correto){
            $_SESSION['user'] = $email;
            $this->logger->success('Login para ' . $email);
            return $correto;
        }

        $this->mailer->enviar($email);
        return false;
    }
}


###################################
/** Pagina de login */
$auth = new Autenticacao(new UsuarioDadosDB(), new LittleServerLogger(), new ZendMail());
$email = $_POST['email'];
$senha = $_POST['senha'];
if($auth->autenticar($email, $senha)){
    header('Location: admin/index.php');
}else {
    echo 'Deu errado';
}

####################################
/** Autenticação automatica */
$auth = new Autenticacao(new UsuarioDadosExcel(), new DBLogger(), new SwiftMail());
$email = 'tairoroberto@hotmail.com';
$senha = '*******';
if($auth->autenticar($email, $senha)){
    $file = file_get_contents('http://teste.com.br');
}else {
    echo 'Deu errado';
}