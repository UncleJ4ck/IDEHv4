<?php
class User {
    public $username;
    public $isAdmin = false;

    public function __construct($username) {
        $this->username = $username;
    }

    public function __destruct() {
          $file = 'error.log';

        file_put_contents($file, serialize($this));
    }
}

if (isset($_COOKIE['user'])) {
    $user = unserialize($_COOKIE['user']);
    echo "Welcome " . $user->username;
    if ($user->isAdmin) {
       echo '<script>alert("Welcome Admin ");</script>';

        echo '<script>alert("Flag : IDEH{DE5ErIalIsA710n_Dy41_lAh_Ih53N_13waN} ");</script>';

    }
} else {
    $user = new User("guest");
    setcookie('user', serialize($user));
    echo "Welcome guest";
    }
?>

<!DOCTYPE html>
<html>
<head>
  <title>IDEH CTF</title>
  <style>
    body {
      background-image: url("https://i.imgur.com/nEqxPKl.png");
      background-size: cover;
      background-repeat: no-repeat;
      color: white;
      font-family: Arial, sans-serif;
      text-align: center;
      margin: 0;
      padding: 0;
    }

    h1 {
      font-size: 3em;
      font-weight: bold;
      margin-top: 50px;
    }

    img {
      width: 30%;
      height: auto;
      margin: 0;
      padding: 0;
    }

    footer {
      margin-top: 50px;
      padding-bottom: 20px;
    }
  </style>
</head>
<body>

  <img src="https://i.imgur.com/kfr6X2q.png" alt="Picture at the bottom">

  <footer>
    <p>&copy; 2023 IDEH CTF. </p>
  </footer>
</body>
</html>




