<html>
    
<head>
    <title>Claudio</title>
</head>
<body>
    <h1>PHP</h1>
    <p>This is a test page for Claudio!</p>
    <?php 
    
        $nome = "Claudio";
        $cognome = "Cavalli";

        $nome_completo = $nome." ".$cognome;
        echo $nome_completo;
        echo "<br>";
        
        $nome_completo2 = $nome;
        $nome_completo2 .= " ".$cognome;
        echo $nome_completo2;
        echo "<br>";
    
    ?>

        
</html>