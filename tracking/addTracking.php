<html>
    <head>
        <script src="../ajax.js"></script>
    </head>
    <body>
        <form name='registra'>
            <input type="text" name="name">
            <input type="text" name="carrier">
            <input type="text" name="tracking">
            <input type="button" name="submit" onclick="POST('controller.php', 'registra', 'error')" value="aggiungi">
        </form>
        <div id="error">
        </div>
    </body>