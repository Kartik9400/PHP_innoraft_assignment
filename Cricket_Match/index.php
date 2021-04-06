<?php
    require 'CricketMatch.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <!-- by submitting we get highest scorer -->
  <form method = "post" action = "<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>">
    Highest Scorer Player:
    <input type="submit" name="player">
  </form>
  <!-- By submitting we get winner of the tournament -->
  <form method = "post" action = "<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>">
    Winner of the tournament:
    <input type="submit" name="league">
  </form>
  <!-- By submitting we get max score in a match -->
  <form method = "post" action = "<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>">
    Maximum score in a match:
    <input type="textbox" name="match">
    <input type="submit" name="submit">
  </form>

  <?php
    $Tournament = new CricketMatch();
    if (isset($_POST["player"])) {
        print_r($Tournament->HighestScoringPlayer);
    } elseif (isset($_POST['league'])) {
        print_r($Tournament->WinnerOfTournament);
    } else {
        $Tournament->giveMaxScoreInAMatch($_POST['match']);
    }
  ?>
</body>
</html>
