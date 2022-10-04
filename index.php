<?php
include_once("./class/index.php");
include_once("./components/components.php");
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?= Componentes::head("Pokémon"); ?>
</head>

<body class="bg-secondary">
    <header>
        <nav class="navbar navbar-expand-lg bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand text-warning fw-bold fs-4" href="./index.php">Pokémon</a>
            </div>
        </nav>
    </header>

    <main class="container my-4 rounded p-3 bg-light">
        <div class="row">
            <?= Pokemon::returnPokemons(); ?>
        </div>
    </main>
</body>

</html>