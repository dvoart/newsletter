<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Newsletter Signup</title>
  <!-- Latest compiled and minified CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Latest compiled JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

  <div class="container">
    <div class="row">
      <div class="col-md-12">

        <h1>Newsletter Signup</h1>

        <?php
        if (isset($_SESSION['alert'])) {

          //added
          if ($_SESSION['alert'] == 'userAdded') {
            echo '<div class="alert alert-success alert-dismissible">
<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
<strong>Success!</strong> Thanks for joining our newsletter. Do not look at the emails below.
</div>';
          }

          //deleted
          if ($_SESSION['alert'] == 'userDeleted') {
            echo '<div class="alert alert-warning alert-dismissible">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  <strong>Success!</strong> You have been unsubscribed.
  </div>';
          }

          //updated
          if ($_SESSION['alert'] == 'userUpdated') {
            echo '<div class="alert alert-info alert-dismissible">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  <strong>Success!</strong> Email has been updated.
  </div>';
          }

          unset($_SESSION['alert']);
        }

        if (isset($_POST['editEmail'])) {
        ?>
          <form action="update.php" method="post">
            <input type="hidden" name="id" value="<?= $_POST['id'] ?>">
            Your Email: <input type="email" name="userEmail" value="<?= $_POST['userEmail'] ?>" required>
            <button type="submit" name="updateEmail">Update Email</button>
          </form>
        <?

        } else {

        ?>
          <form action="join.php" method="post">
            Your Email: <input type="email" name="userEmail" required>
            <button type="submit" name="joinnewsletter">Join Newsletter</button>
          </form>

        <?
        }
        ?>

        <br><br>
        <table class="table table-hover table-striped">
          <tr>
            <th>ID</th>
            <th>Email</th>
            <th></th>
            <th></th>
          </tr>
          <?php

          include 'db.php';

          $sql = "SELECT * FROM newsletter";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
          ?>

              <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['userEmail'] ?></td>
                <td>
                  <form action="index.php" method="post">
                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                    <input type="hidden" name="userEmail" value="<?= $row['userEmail'] ?>">
                    <button type="submit" name="editEmail" class="btn btn-success btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                      </svg></button>
                  </form>
                </td>
                <td>
                  <form action="delete.php" method="post">
                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                    <button type="submit" name="deleteEmail" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete?'); return false;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                      </svg></button>
                  </form>
                </td>
              </tr>
          <?php

            }
          } else {
            echo "0 results";
          }
          $conn->close();


          ?>

      </div>
    </div>
  </div>


</body>

</html>