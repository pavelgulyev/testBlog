<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body class="fixed-nav sticky-footer ">
    <nav class="navbar navbar-dark bg-dark">

        <ul class="nav ">
            <li class="nav-item">
                <a class="navbar-brand" href="/">
                    Blog
                </a>
            </li>
            <?php
            if (isset($_SESSION['login'])) :            ?>


                <li class="nav-item">
                    <a class="text-white"><?= $_SESSION['login'] ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/logout">Выход</a>
                </li>
                <div class="row" id="navbarNav">


                </div>
        </ul>
    <?php else : ?>
                <li class="nav-item">
                    <a class="btn btn-outline-success" href="/login">Вход</a>
                </li>
            </ul>
        </div>
    <?php endif; ?>


    </nav>
    <?php echo $content; ?>
    <hr>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <ul class="list-inline text-center">
                        <li class="list-inline-item">
                            <a href="https://www.youtube.com/user/Shift63770" target="_blank">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-youtube fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://vk.com/php.youtube" target="_blank">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-vk fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="/" target="_blank">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                    <p class="copyright text-muted">&copy; <?= date("Y") ?></p>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>