<html>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title> Nuovo tracciamento</title>
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css' rel='stylesheet'>
    <link href='addTracking.css' rel='stylesheet'>

    <script type='text/javascript' src=''></script>
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js'></script>
    <script type='text/javascript'
        src='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js'></script>
    <script src='../ajax.js'></script>
    <link rel="stylesheet" href="style.css">
    <?php
    include_once "../session.php";
    ?>
</head>

<body onload="GET('controller.php?trackings', 'dummy', 'trackings')">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="addTracking.php">Aggiungi un tracking</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../accesso/logout.php">Esci</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <form name='dummy'>
    </form>
    <div id="trackings">
    </div>
</body>

</html>