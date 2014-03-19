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

  function getNotes() {
    $notes = array();
    $conn = startConn();
    session_start();
    if(isset($_SESSION['userId'])) {
      $userId = $_SESSION['userId'];

      $sql = "SELECT * FROM Notes WHERE userID=$userId ORDER BY created DESC";

      $result = $conn->query($sql);

      if (!$result) {
        printf("Query failed: %s\n", $conn->error);
        exit;
      }

      while($note = $result->fetch_assoc()) {
        $notes[]=$note;
      }

      $result->close();
    }
    closeConn($conn);
    return $notes;
  }
?>
