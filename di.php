<?php
/**
 * Created by PhpStorm.
 * User: tairo
 * Date: 08/05/16
 * Time: 23:07
 */

/*Vai autenticar por email e senha
 *Se Login der certo retorna true
 *      Logar tentativa de login
 *      Vai ter de armazenar usuario e senha na sessão
 *Se der errado
 *      Mandar email pro usuario
 *      Logar tentativa de login
*/

class Autenticacao{
    public function autenticar($email, $senha){

        $logger = new SystemLog();
        $dados = new UsuariosDados();
        $correto = $dados->buscarEmailSenha($email, $senha);

        if($correto){
            $_SESSION['user'] = $email;
            $logger->success('Login para ' . $email);
            return $correto;
        }

        $enviadorEmail = new EnviadorEmail();
        $enviadorEmail->enviar($email);


        $logger->warning('Tentativa de login falha para '. $email);
    }
}

$auth = new Autenticacao();
if($auth->autenticar($email, $senha)){
    header('Location: admin/index.php');
}else {
    echo 'Deu errado';
}