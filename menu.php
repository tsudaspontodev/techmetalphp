<?php
    $funcao = $_SESSION['funcao'];
    if ($funcao == "Admin"){
       echo "<a href='mecanica.php' style = 'color: black; text-decoration: none; font-weight: bold'>HOME</a>";
       echo "<b> | </b>";
       echo "<a href='pecas.php' style = 'color: black; text-decoration: none; font-weight: bold'>PEÇAS</a>";
       echo "<b> | </b>";
       echo "<a href='servicos.php' style = 'color: black; text-decoration: none; font-weight: bold'>SERVIÇOS</a>";
       echo "<b> | </b>";
       echo "<a href='usuarios.php' style = 'color: black; text-decoration: none; font-weight: bold'>USUARIOS</a>";
       echo "<b> | </b>";
       echo "<a href='ordens.php' style = 'color: black; text-decoration: none; font-weight: bold'>ORDEM DE SERVIÇOS</a>";
      
    }
    else if ($funcao == "Administrativo"){
        echo "<a href='mecanica.php' style = 'color: black; text-decoration: none; font-weight: bold'>HOME</a>";
        echo "<b> | </b>";
        echo "<a href='pecas.php' style = 'color: black; text-decoration: none; font-weight: bold'>PEÇAS</a>";
        echo "<b> | </b>";
        echo "<a href='servicos.php' style = 'color: black; text-decoration: none; font-weight: bold'>SERVIÇOS</a>";
        echo "<b> | </b>";       
        echo "<a href='ordens.php' style = 'color: black; text-decoration: none; font-weight: bold'>ORDEM DE SERVIÇOS</a>";
    }
    else{
        echo "<a href='mecanica.php' style = 'color: black; text-decoration: none; font-weight: bold'>HOME</a>";
        echo "<b> | </b>";             
        echo "<a href='ordens_mec.php' style = 'color: black; text-decoration: none; font-weight: bold'>ORDEM DE SERVIÇOS</a>";
    }
?>