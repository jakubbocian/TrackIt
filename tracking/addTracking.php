<html>

<head>

    <?php
    include_once "../session.php";
    ?>
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
    <script>
        function genCarriers() {

            var input = document.getElementById("carrier");
            var carrier = input.value;
            console.log(carrier);
            var url = "controller.php?carriers=" + carrier;
            GET(url + "&", "addTracking", "carriers");
        }
    </script>
</head>

<body oncontextmenu='return false' class='snippet-body'>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="trackings.php">Tuoi pacchi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../accesso/logout.php">Esci</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="booking" class="section">
        <div class="section-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-md-push-5">
                        <div class="booking-cta">
                            <h1>Aggiungi un pacco da tracciare</h1>
                            <p>Tracciare i tuoi pacchi non è mai stato così comodo.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4 col-md-pull-7">
                        <div class="booking-form">
                            <form name="addTracking">
                                <div class="form-group">
                                    <span class="form-label">Dai un nome al tracciamento</span>
                                    <input class="form-control" type="text" placeholder="Che nome vorresti dare?"
                                        name="name">
                                </div>

                                <div class="form-group">
                                    <span class="form-label">Corriere</span>
                                    <input class="form-control" type="text"
                                        placeholder="A quale corriere è stato assegnato?" name="carrier" id="carrier"
                                        list="carriers" onchange="genCarriers()">
                                    <datalist id='carriers'>

                                    </datalist>
                                </div>

                                <div class="form-group">
                                    <span class="form-label">Codice spedizione</span>
                                    <input class="form-control" type="text" placeholder="Qual'è il codice del pacco?"
                                        name="tracking">
                                </div>
                                <div class="form-btn">
                                    <button class="submit-btn"
                                        onclick="POST('controller.php', 'addTracking', 'dummy')">Avvia
                                        tracciamento</button>
                                </div>
                                <div id="dummy">

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type='text/javascript'></script>
</body>

</html>