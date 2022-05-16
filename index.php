
<?php

$t = ["a", "b", "c"];
// $t = [
//     0 => "a",
//     1 => "b",
//     2 => "c"
// ];

echo($t[0]);

$t = [
    "key" => 123,
    125 => "doij"
];

foreach($t as $key => $value) {
    // var_dump("clé : " . $key, "value : " . $value);
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo("ok"); ?></title>
</head>
<body>
    <h1>hello</h1>
    <p>je suis complètement <span id="test"><?php echo("ok"); ?></span></p>

    <!-- http://localhost:8888/php-b1-ca-2122-ang/index.php?toto=aizubdiazbdihazd&tata=aoizdoaznduo -->
    <!-- <p>je suis un paramètre en GET : <?php // if(isset($_GET["toto"])) { echo($_GET["toto"]); } ?></p>
    <p>je suis un paramètre en GET : <?php // if(isset($_GET["tata"])) { echo($_GET["tata"]); } ?></p> -->

    <form action="" method="POST">
        <input type="text" name="toto">
        <button type="submit">envoyer</button>
    </form>

    <p>
        je viens d'être soumis par le formulaire : <?php if(isset($_POST["toto"]) && !empty($_POST["toto"])) {echo($_POST["toto"]);} ?>
        <?php /*
            debug
            <pre>
                <code>
                    <?php
                        var_dump($_POST["toto"]);
                    ?>
                </code>
            </pre> */
        ?>
    </p>

    <script>
        document.querySelector("#test").innerHTML = "KO";
    </script>


</body>
</html>

<?php

// echo("toto");

// $toto = "toto";
// $table = [
//     "a",
//     "a",
//     "a",
//     "a",
//     "a",
//     "a",
//     "a",
// ];

// for ($i=0; $i < count($table); $i++) {
//     echo($table[$i]);
// }

// foreach($table as $case) {
//     echo($case);
// }

?>