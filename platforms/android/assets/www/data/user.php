<?php
  define('DB_HOST', 'localhost');
  define('DB_USER', 'root');
  define('DB_PASSWORD', 'root');
  define('DB_NAME', 'devchallenge');

  function startConn() {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    return $conn;
  }

  function closeConn($conn) {
    $conn->close();
  }

  function getUsers() {
    $conn = startConn();

    $sql = "SELECT * FROM User";

    $result = $conn->query($sql);

    if (!$result) {
      printf("Query failed: %s\n", $conn->error);
      exit;
    }

    $users = array();
    while($user = $result->fetch_assoc()) {
      $users[]=$user;
    }

    $result->close();
    closeConn($conn);
    return $users;
  }

  function loginUser($username, $password) {
    $conn = startConn();
    foreach(getUsers() as $user) {
      if($user['Username'] == $username && $user['Password'] == sha1($password)) {
        session_start();
        $_SESSION['userId'] = $user['id'];
        header('Location: notebook.php');
      }
    }
  }

  function checkUserLoginCredentials($username, $password) {
    $conn = startConn();
    $matched = false;
    foreach(getUsers() as $user) {
      if($user['Username'] == $username && $user['Password'] == sha1($password)) {
        $matched = true;
      }
    }
    return $matched;
  }

  function logoutUser() {
    session_start();
    session_destroy();
  }

  function register($username, $password) {
    $oldUsername = $username;
    $oldPassword = $password;
    $unique = true;
    foreach(getUsers() as $user) {
      if($user['Username'] == $username) $unique = false;
    }
    if($unique) {
      $conn = startConn();
      $username = $conn->real_escape_string($username);
      $password = sha1($password);
      $password = $conn->real_escape_string($password);
      $sql = "INSERT INTO User(Username, Password) VALUES ('$username', '$password')";
      $conn->query($sql);
      loginUser($oldUsername, $oldPassword);
      closeConn($conn);
    }
  }
?>
