<?php
session_start();
include 'conexao_bd.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['respostas'] = $_POST['respostas'];
    $_SESSION['nome'] = $_POST['nome'];
    header('Location: resultado.php');
    exit();
}

$sql = "SELECT * FROM perguntas";
$result = $conn->query($sql);
$perguntas = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $perguntas[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perguntas</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Perguntas do Quiz</h1>
        <form method="POST" action="perguntas.php">
            <div class="form-group">
                <label for="nome">Seu Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <?php foreach ($perguntas as $index => $pergunta) : ?>
                <div class="mb-4">
                    <h4><?php echo $pergunta['enunciado']; ?></h4>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="respostas[<?php echo $pergunta['id']; ?>]" value="<?php echo $pergunta['opcao1']; ?>" required>
                        <label class="form-check-label"><?php echo $pergunta['opcao1']; ?></label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="respostas[<?php echo $pergunta['id']; ?>]" value="<?php echo $pergunta['opcao2']; ?>" required>
                        <label class="form-check-label"><?php echo $pergunta['opcao2']; ?></label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="respostas[<?php echo $pergunta['id']; ?>]" value="<?php echo $pergunta['opcao3']; ?>" required>
                        <label class="form-check-label"><?php echo $pergunta['opcao3']; ?></label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="respostas[<?php echo $pergunta['id']; ?>]" value="<?php echo $pergunta['opcao4']; ?>" required>
                        <label class="form-check-label"><?php echo $pergunta['opcao4']; ?></label>
                    </div>
                </div>
            <?php endforeach; ?>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Ver Resultado</button>
            </div>
        </form>
    </div>
</body>
</html>

<?php
$conn->close();
?>
