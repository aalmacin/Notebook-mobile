<?php
  include_once('data/note.php');
  session_start();

  if(!isset($_SESSION['userId'])) {
    header('Location: index.php');
  }
  $notes = getNotes();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BR Notebook</title>
    <script src="//code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="//code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.css">
    <script src="js/main.js"></script>
    <link rel="stylesheet" href="css/main.css">
  </head>
  <body>
    <div data-role="page" id="main">
      <div id="logoutUser">
        <a href="logout.php"  data-ajax="false">Logout</a>
      </div>
      <div id="addNoteButton">
        <a class="addNote" data-role="button" data-icon="plus">Add Note</a>
      </div>
      <div id="noteList">
        <?php if (!empty($notes)): ?>
          <ul data-role="listview" id="allNotes">
              <?php foreach($notes as $note): ?>
              <li class="note ui-li-static ui-body-inherit" data-id="<?php echo $note['id']; ?>"><a><span class="noteTxt"><?php echo $note['note']; ?></span></a></li>
              <?php endforeach; ?>
          </ul>
        <?php else: ?>
          <div class="noNotes">
            <p>There are no notes saved in the database.</p>
          </div>
        <?php endif; ?>
      </div>
      <div id="noteOverlay" class="hide">
        <a href="#" class="cancelButton ui-btn ui-icon-delete ui-btn-icon-notext ui-corner-all"></a>
        <p class="enterNote error">*Note must not be empty.</p>
        <textarea class="newNote"></textarea>
        <a id="saveNote" data-role="button">Save</a>
        <a id="deleteNote" data-role="button">Delete</a>
      </div>
    </div>
  </body>
</html>
