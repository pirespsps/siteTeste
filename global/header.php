<?php include_once __DIR__ . "/../config/config.php" ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= GLOBAL_STYLE ?>">

</head>

<body>

    <div id="headerFundo">

        <nav>
            <img id="iconDagon" src="<?= ICON_PATH_PNG ?>"> </img>
            <ul>
                <a class="linkHeader" href="<?= BASE_URL ?>">
                    <li class="optionHeader">Home</li>
                </a>

                <li id="list" class="optionHeader"><a class="linkHeader" href="<?= BASE_URL ?>list">Listas</a>
                    <div id="divMenuLista">
                        <ul>
                            <a class="linkHeader" href="<?= BASE_URL ?>list/disco">
                                <li class="menuItem">Listar Discos</li>
                            </a>
                            <li class="menuItem">Listar tal coisa meu deus</li>
                        </ul>
                    </div>
                </li>

                <li id="criar" class="optionHeader"><a class="linkHeader" href="<?= BASE_URL ?>create">Criar</a>
                    <div id="divMenuCriar">
                        <ul>
                            <a class="linkHeader" href="<?= BASE_URL ?>create/disco">
                                <li class="menuItem">Criar Discos</li>
                            </a>
                            <li class="menuItem">Criar tal coisa meu deus</li>
                        </ul>
                    </div>
                </li>

                <a class="linkHeader" href="<?= BASE_URL?>tradutor">
                    <li class="optionHeader">Tradutor</li>
                </a>

                <a class="linkHeader" href="<?= BASE_URL?>jogo">
                    <li class="optionHeader">Jogo</li>
                </a>
            </ul>
        </nav>
    </div>

</body>

</html>