<?php
include 'conexao_bd.php';

$sql = "SELECT * FROM ranking ORDER BY pontuacao DESC";
$result = $conn->query($sql);
$ranking = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $ranking[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ranking</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Ranking do Quiz</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Pontuação</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ranking as $rank) : ?>
                    <tr>
                        <td><?php echo htmlspecialchars($rank['nome']); ?></td>
                        <td><?php echo $rank['pontuacao']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="text-center">
            <a href="index.php" class="btn btn-primary">Voltar ao Início</a>
        </div>
    </div>
</body>
</html>

<?php
$conn->close();
?>
