<?php
    session_start();
    if (!isset($_SESSION['nome'])) {
        header('Location: index.php?status=erro&msg=Acesso negado');
        exit;
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="content-language" content="pt-br">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="imagens/mechanic.png" type="image/png">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <title>Mecanica</title>
        <style>
            body {
                background-color: #DCDCDC;
            }
            .header {
                float: right;
            }
            .texto-destaque{
                font-size: 24px;
                color: #005B74;
                font-weight:bold
            }
            table, th, td {
                font-size: 11px;
            }
        </style>
    </head>
    <body>
        <div class="container-fluid">
            <img src="imagens/banner.png" width="450" heigth="450">
            <?php
                echo "<div class='header'>";
                if (isset($_SESSION['nome'])) {
                    $nome = $_SESSION['nome'];
                    echo "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-person-circle' viewBox='0 0 16 16'>
                        <path d='M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0'/>
                        <path fill-rule='evenodd' d='M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1'/>
                        </svg>&nbsp;<b>".$nome."</b> | <a href='sair.php' style='color: black; text-decoration: none; font-weight: bold;'>SAIR</a>";
                }
                echo "</div>";
            ?>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <nav>
            <?php
                include 'menu.php';
            ?>
        </nav>
        <br/>
        <div class ="container">
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="card shadow border-2">
                        <div class=" card-header bg-gray border-bottom py-3">
                            <?php
                                date_default_timezone_set('America/Sao_Paulo');
                                $meses = [
                                    1 => 'Janeiro', 2 => 'Fevereiro', 3 => 'Março', 4 => 'Abril',
                                    5 => 'Maio', 6 => 'Junho', 7 => 'Julho', 8 => 'Agosto',
                                    9 => 'Setembro', 10 => 'Outubro', 11 => 'Novembro', 12 => 'Dezembro'
                                ];
                                $mesAtual = (int) date('m');
                                echo "<svg xmlns='http://www.w3.org/2000/svg' width='35' height='35' fill='#005B74' class='bi bi-clipboard-check' viewBox='0 0 16 16'>
                                    <path fill-rule='evenodd' d='M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0'/>
                                    <path d='M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1z'/>
                                    <path d='M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0z'/>
                                    </svg>&nbsp;&nbsp;<spam class='texto-destaque'>ORDENS DE SERVIÇO - <spam/>".$meses[$mesAtual];
                            ?>
                        </div>
                        <div class ="card-body">
                            <?php
                                include 'conecta.php';
                                $sql = "SELECT COUNT(id) AS total FROM ordens WHERE MONTH(data_entrada) = MONTH(NOW()) AND YEAR(data_entrada) = YEAR(NOW())";
                                $consulta = $pdo->query($sql);
                                $totalordens = $consulta->fetchAll(PDO::FETCH_ASSOC);
                                if (count($totalordens) > 0) {
                                    foreach ($totalordens as $item) {
                                        $total = $item['total'];
                                    }
                                } 
                            ?>
                            Total de ordens de serviços deste mês:&nbsp;&nbsp;<?php echo "<b>" . htmlspecialchars($item['total']) . "</b>"?>
                            <br/>
                            <?php
                                include 'conecta.php';
                                $sql = "SELECT COUNT(*) AS total_abertas FROM ordens WHERE MONTH(data_entrada) = MONTH(NOW()) AND YEAR(data_entrada) = YEAR(NOW()) AND status = 0";
                                $consulta = $pdo->query($sql);
                                $totalordens = $consulta->fetchAll(PDO::FETCH_ASSOC);
                                if (count($totalordens) > 0) {
                                    foreach ($totalordens as $item) {
                                        $total = $item['total_abertas'];
                                    }
                                } 
                            ?>
                            Total de ordens abertas:&nbsp;&nbsp;<?php echo "<b>" . htmlspecialchars($item['total_abertas']) . "</b>"?>
                            <br/>
                            <?php
                                include 'conecta.php';
                                $sql = "SELECT COUNT(*) AS total_fechadas FROM ordens WHERE MONTH(data_entrada) = MONTH(NOW()) AND YEAR(data_entrada) = YEAR(NOW()) AND status = 1";
                                $consulta = $pdo->query($sql);
                                $totalordens = $consulta->fetchAll(PDO::FETCH_ASSOC);
                                if (count($totalordens) > 0) {
                                    foreach ($totalordens as $item) {
                                        $total = $item['total_fechadas'];
                                    }
                                } 
                            ?>
                            Total de ordens fechadas:&nbsp;&nbsp;<?php echo "<b>" . htmlspecialchars($item['total_fechadas']) . "</b>"?>
                            <br/>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card shadow border-2">
                        <div class=" card-header bg-gray border-bottom py-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="#005B74" class="bi bi-pie-chart-fill" viewBox="0 0 16 16">
                            <path d="M15.985 8.5H8.207l-5.5 5.5a8 8 0 0 0 13.277-5.5zM2 13.292A8 8 0 0 1 7.5.015v7.778zM8.5.015V7.5h7.485A8 8 0 0 0 8.5.015"/>
                            </svg>&nbsp;&nbsp;<spam class="texto-destaque">PRIORIDADES<spam/>
                        </div>
                        <div class ="card-body">
                            <?php
                                include 'graf_prioridades.php';
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>