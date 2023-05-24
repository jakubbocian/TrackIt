<html>

<head>
    <?php
    include_once "../session.php";
    ?>
    <script src="../ajax.js"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body onload="GET('controller.php?trackings', 'dummy', 'trackings')">
    <form name='dummy'>
    </form>
    <div id="trackings">
    </div>
</body>

</html>