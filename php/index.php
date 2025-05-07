<html>
    
<head>
    <title>PHP Test</title>
</head>
<body>
    <h1>PHP Test</h1>
    <p>This is a test page for PHP.</p>
    <?php

        $anArray = array("first" => 1, "second" => 2, 3, "fourth" => 4, 5);


        echo "{$anArray['first']}";

        $anArray[] = "sei";
        //echo "{$anArray[2]}";
    ?>
</html>