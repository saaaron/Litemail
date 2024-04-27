<?php
  // start session
  session_start();

  // db connection
  include 'db_connect.php';

  // format time function
  include "format_time_function.php";

  if (isset($_REQUEST["q"])) {
    // user id
    $id = $_SESSION['id'];

    $keyword = $_REQUEST["q"]; // keyword

    // mails
    $select_mails = "SELECT * FROM mails WHERE subject LIKE CONCAT('%', ?, '%') AND user_id = ? AND subject != '' AND recycled = 'no' LIMIT 5";
    if ($stmt = mysqli_prepare($db, $select_mails)) {
      mysqli_stmt_bind_param($stmt, "si", $keyword, $id);
      mysqli_stmt_execute($stmt);
      while (mysqli_stmt_fetch($stmt)) {
        // fetch results
      }

      $total_mails = mysqli_stmt_num_rows($stmt);
    }

    echo '<div class="m-1">Showing results for "<b>'.$keyword.'</b>" | <b>'.$total_mails.'</b> found</div>';

    $select_mails = "SELECT * FROM mails WHERE subject LIKE CONCAT('%', ?, '%') AND user_id = ? AND subject != '' AND recycled = 'no' LIMIT 5";
    $stmt = mysqli_prepare($db, $select_mails);
    mysqli_stmt_bind_param($stmt, "si", $keyword, $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
      // fetch results
      $mail_id = $row["mail_id"];
      $from_user_id = $row["from_user_id"];
      $mail_subject = $row["subject"];
      $mail_body = strip_tags($row["body"]);
      $mail_starred = $row["starred"];
      $mail_reply = $row["reply"];
      $date_n_time = $row["date_n_time"];

      if ($from_user_id == $id && $mail_reply == "no") {
        $from_user_full_name = "You";
      } elseif ($from_user_id !== $id && $mail_reply == "no") {
        // select from user's full name query
        $select_fufn = "SELECT full_name FROM users WHERE id = ?";
        if ($stmt = mysqli_prepare($db, $select_fufn)) {
          mysqli_stmt_bind_param($stmt, "i", $from_user_id);
          mysqli_stmt_execute($stmt);
          mysqli_stmt_bind_result($stmt, $from_user_full_name);
          while (mysqli_stmt_fetch($stmt)) {
            // fetch results
          }     
        }
      } else {
        $from_user_full_name = "Re"; // reply
      }

      // highlight email as new if not viewed
      if ($row["viewed"] == "no") {
        $new = '<span class="badge bg-danger">new</span>';
        $text_muted = '';
      } else {
        $new = '';
        $text_muted = ' text-muted';
      }

      // filter mail body
      if (strlen($mail_body) > 41) {
        $mail_body = mb_substr($mail_body, 0, 41).'...';
      } else {
        $mail_body = $mail_body;
      }

      // star button
      if ($mail_starred == "no") {
        $star_button = '
        <div class="star">
          <span class="bi-star text-muted"></span>
        </div>';
      } else {
        $star_button = '
        <div class="star">
          <span class="bi-star-fill text-warning"></span>
        </div>';
      }
      
      echo '
        <div class="card d-flex justify-content-start border-0 p-2 m-1 mail-cont">
          <div class="d-flex justify-content-between">
            <a href="'.$mail_id.'">
              <div class="me-2 mail-title-prev'.$text_muted.'">
                <b>'.$from_user_full_name.': '.$mail_subject.'</b>
                '.$new.'
              </div>
            </a>
            <div class="d-flex justify-content-end">
              '.$star_button.'
            </div>
          </div>
          <a href="'.$mail_id.'">
            <div class="d-flex justify-content-between mail-body-prev'.$text_muted.'">
              <div>'.$mail_body.'</div>
              <div>
                '.format_time($date_n_time).'
              </div>
            </div>
          </a>
        </div>';
    }

    // no results found
    if ($total_mails > 0) {
      // show searched results...
    } else {
      echo '
        <div class="text-center p-5 text-muted">
          <div class="bi-exclamation-circle" style="font-size: 20pt;"></div>
          <p>No mail found</p>
        </div>';
    }    
    // close statement
    mysqli_stmt_close($stmt);
  } 
  // close db connection
  mysqli_close($db);
?>