<?php
session_start();
include 'conexao_bd.php';

$score = 0;

if (isset($_SESSION['respostas']) && isset($_SESSION['nome'])) {
    $respostas_usuario = $_SESSION['respostas'];
    $nome = $_SESSION['nome'];
    
    $sql = "SELECT * FROM perguntas";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if ($respostas_usuario[$row['id']] == $row['resposta_correta']) {
                $score++;
            }
        }
    }

    $stmt = $conn->prepare("INSERT INTO ranking (nome, pontuacao) VALUES (?, ?)");
    $stmt->bind_param("si", $nome, $score);
    $stmt->execute();
    $stmt->close();
}

session_destroy();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado do Quiz</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Resultado do Quiz</h1>
        <p class="text-center">Você acertou <?php echo $score; ?> de 5 perguntas.</p>
        <div class="text-center">
            <a href="index.php" class="btn btn-primary">Voltar ao Início</a>
            <a href="ranking.php" class="btn btn-info">Ver Ranking</a>
        </div>
    </div>
</body>
</html>

<?php
$conn->close();
?>
