<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario'])) {
    header("Location: 15a_sistema.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do Usuário</title>
</head>
<body style="background-color: <?php echo $_SESSION['cor']; ?>; color: <?php echo $_SESSION['cor_texto']; ?>;">
    <h2>Bem vindo(a) ao seu perfil, <?php echo $_SESSION['usuario']; ?>!</h2>
    <p>Esta é sua página personalizada!</p><br>
    <hr><br><br>

    <!-- Volta para a página de login -->
     <a href="15d_logout.php" style="color: <?php echo $_SESSION['cor_texto']; ?>;">Logout</a>
    
</body>
</html>