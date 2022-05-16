<?php
// var_dump magique et propre
// echo("<pre>");
// echo("<code>");
// var_dump($elements);
// echo("</code>");
// echo("</pre>");

function dd($a) {
    echo("<pre>");
    echo("<code>");
    var_dump($a);
    echo("</code>");
    echo("</pre>");
    die();
}

function check($a){
    return  isset($_POST[$a]) &&
            !is_null(isset($_POST[$a])) &&
            !empty(isset($_POST[$a]));
}

// suppression
function delete($pdo, $id) {
    $stmt = $pdo->query('DELETE FROM `toto` WHERE id = ' . $id);
    $stmt->execute();
}

// connexion BDD
$user = "tata";
$pass = "tata";
try {
    $pdo = new PDO('mysql:host=localhost:8889;dbname=tata', $user, $pass);
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}

if (isset($_POST["delete"])) {
    delete($pdo, $_POST["delete"] );
}

// traitement formulaire ajout
if(check("toto")) {
    $stmt = $pdo->prepare("INSERT INTO toto (name) VALUES (?)");
    $stmt->bindParam(1, $name);
    // 1 correspond à l'ordre des "?" dans la requête SQL quand il y en a plusieurs. Ex :
    // $stmt->bindParam(1, $_POST["update_name"]);
    // $stmt->bindParam(2, $_POST["id"]);
    $name = $_POST["toto"];
    $stmt->execute();
}

// traitement modification
if(check("update_name")) {
    $sql = "UPDATE toto SET name = ? WHERE id = ? ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([ $_POST["update_name"], $_POST["id"] ]);
}
// update_name

// récupération des éléments pour le tableau
$stmt = $pdo->query('SELECT id, name from toto;');
// $elements = $stm->fetch(); => 1 seul élément
$elements = $stmt->fetchAll(); // plusieurs éléments (tableau)

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo("ok"); ?></title>
    <style>
        th, td {padding: 15px;}
    </style>
</head>
<body>
    <h1>BDD</h1>

    <form action="" method="POST">
        <label for="">ajouter un nom : </label>
        <input type="text" name="toto">
        <button type="submit">envoyer</button>
    </form>

    <table border="1" style="margin-top:30px;">
        <thead>
            <tr>
                <th width="200px">id</th>
                <th width="500px">name</th>
                <th colspan="2">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if(isset($elements) && !empty($elements) && !is_null($elements)): ?>
                <?php foreach($elements as $element): ?>
                    <tr>
                        <form action="" method="POST">
                            <td>
                                <?php echo($element["id"]); ?>
                            </td>
                            <td>
                                <input style="width: 100%;" type="text" name="update_name" value="<?= $element["name"]; ?>">
                            </td>
                            <td>
                                <input type="hidden" name="id" value="<?= $element["id"]; ?>">Modifier</input>
                                <button type="submit">Modifier</button>
                            </td>
                        </form>
                            <td>
                                <form class="delete_form" action="" method="POST">
                                    <input type="hidden" name="delete" value="<?= $element["id"] ?>">
                                    <button type="submit">supprimer</button>
                                </form>
                            </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
            <?php
                // NE JAMAIS FAIRE SOUS PEINE DE MORT
                // if(isset($elements) && !empty($elements) && !is_null($elements)) {
                //     foreach($elements as $element) {
                //         echo("<tr>");
                //         echo("<td>" . $element["id"] . "</td>");
                //         echo("<td>" . $element["name"] . "</td>");
                //         echo("</tr>");
                //     }
                // }
            ?>
        </tbody>
    </table>


</body>
</html>