<?

session_start();

//VARIAVEL QUE VERIFICA SE A AUTENTICAÇÃO FOI REALIZADA
$usuario_autenticado = false;
$usuario_id = null;
$ususario_perfil_id = null;
$perfis = array(1 =>'Adm', 2=> 'Usuário');

//USUARIOS DO SISTEMA
$usuarios_app = array(
    array('id' => 1, 'email' =>'andre@gmail.com', 'senha' => '123','perfil_id' => 1),
    array('id' => 2, 'email' =>'maria@teste.com.br', 'senha' => '123','perfil_id' => 1),
    array('id' => 3, 'email' =>'ana@teste.com', 'senha' => '123','perfil_id' => 2),
    array('id' => 4, 'email' =>'joao@gmail.com', 'senha' => '123','perfil_id' => 2)
);
/*

echo '<pre>';
print_r($usuarios_app);
echo '</pre>';

*/

foreach($usuarios_app as $user){
    /*
    echo 'Usuario app: ' . $user['email'] . '/' . $user['senha'];
    echo '<br />';
    echo 'Usuario form: ' . $_POST['email'] . '/' . $_POST['senha'];
    echo '<hr />';
    */
    if($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']){
        $usuario_autenticado = true;
        $usuario_id = $user['id'];
        $ususario_perfil_id = $user['perfil_id'];
    }
}

    if($usuario_autenticado){
        echo 'Usuário autenticado.';

        $_SESSION['autenticado'] = 'SIM';
        $_SESSION['id'] = $usuario_id;
        $_SESSION['perfil_id'] = $ususario_perfil_id;
       
        header('Location: home.php');
    }else{  
        $_SESSION['autenticado'] = 'NÃO';
        header('Location: index.php?login=erro');
      }


/*
print_r($_GET)

echo '<br />'
echo $_GET['email']
echo '<br />'
echo $_GET['senha']
print_r($_POST);
*/

?>