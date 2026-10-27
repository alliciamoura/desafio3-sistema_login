<?php
session_start();

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $senha   = $_POST['senha'];
    $cor     = $_POST['cor'];

    // Conexão com o banco de dados
    $servername = "localhost";
    $username   = "root";
    $password   = "Senai@118";
    $dbname     = "exercicio";

    // Conecta com o mysql
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica a conexão
    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

    // Consulta se o usuário e senha existem na tabela usuários
    $sql    = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND senha ='$senha'";
    $result = $conn->query($sql);

    // Verifica se encontrou o usuário
    if ($result->num_rows > 0) {
        // Salva as informações necessárias na sessão
        $_SESSION['usuario'] = $usuario;
        $_SESSION['cor']     = $cor;

        // --- LÓGICA PARA AJUSTAR A COR DO TEXTO (CLARO / ESCURO) ---
        // Remove o '#' da cor (ex: '#000000' vira '000000')
        $hex = str_replace('#', '', $cor);
        
        // Separa e converte os valores de Vermelho (R), Verde (G) e Azul (B) para números inteiros
        $r = hexdec(substr($hex, 0, 2));
        $g = hexdec(substr($hex, 2, 2));
        $b = hexdec(substr($hex, 4, 2));
        
        // Fórmula matemática de luminosidade para calcular o "brilho" da cor
        $luminosidade = ($r * 299 + $g * 587 + $b * 114) / 1000;

        // Se a cor de fundo for escura (luminosidade menor que 128), a letra fica branca. 
        // Caso contrário, a letra fica preta.
        if ($luminosidade < 128) {
            $_SESSION['cor_texto'] = '#ffffff'; // Letra branca
        } else {
            $_SESSION['cor_texto'] = '#000000'; // Letra preta
        }
        // -----------------------------------------------------------

        // Redireciona para a página de perfil
        header("Location: 15d_perfil.php");
        exit();
    } else {
        $erro = "Usuário ou senha incorretos";
    }

    // Fecha a conexão
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2> ➜] LOGIN</h2>

    <form action="" method="post">
        <label for="usuario"> 👤 Usuário: </label><br>
        <input type="text" name="usuario" required><br><br>

        <label for="senha"> 🔑 Senha: </label><br>
        <input type="password" name="senha" required><br><br>

        <label for="cor"> 🎨 Cor de fundo: </label><br>
        <input type="color" name="cor" value="#ffffff" required><br><br>

        <button type="submit">Entrar</button>
    </form>

    <?php
    // Se houver erro, exibe a mensagem aboixo do formulário
    if (isset($erro)) {
        echo "<p style='color: red;'>$erro</p>";
    }
    ?>
</body>
</html>