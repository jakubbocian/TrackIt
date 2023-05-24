<!doctype html>
<html lang="en" data-bs-theme="auto">
<script src="../ajax.js"></script>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.111.3">
  <title>Registrazione</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/">

  <link href="../css/bootstrap2.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="sign-in.css" rel="stylesheet">
</head>



<body class="text-center">

  <main class="form-signin w-100 m-auto">
    <form name="registrazione">
      <a href = "../index.html"><img class="mb-4" src="../images/pack.png" alt="" width="72" height="75"></a>
      <h1 class="h3 mb-3 fw-normal">Registrati</h1>

      <div class="form-floating">
        <input type="fname" class="form-control" id="floatingInput" placeholder="a" name="name">
        <label for="floatingInput">Nome</label>
      </div>
      <br>
      <div class="form-floating">
        <input type="fname" class="form-control" id="floatingInput" placeholder="a" name="surname">
        <label for="floatingInput">Cognome</label>
      </div>
      <br>
      <div class="form-floating">
        <input type="fname" class="form-control" id="floatingInput" placeholder="a" name="username">
        <label for="floatingInput">Username</label>
      </div>
      <div class="form-floating">
        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
        <label for="floatingInput">Email address</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
        <label for="floatingPassword">Password</label>
      </div>

      <p class="mt-3 mb-3 text-body-secondary">
        Sei già registrato? <a href="login.php">Accedi qui</a>
      </p>

      <!--<div class="checkbox mb-3">
         <label>
          <input type="checkbox" value="1" name="ricordami"> Ricordami
        </label>
      </div>-->
      
      <button class="w-100 btn btn-lg btn-primary" type="button" onclick="POST('controller.php?', 'registrazione', 'res')">Sign in</button>
      <div id="res">
      </div>
      <p class="mt-5 mb-3 text-body-secondary">&copy; TrackIT 2017–2023</p>
    </form>
  </main>


</body>

</html>