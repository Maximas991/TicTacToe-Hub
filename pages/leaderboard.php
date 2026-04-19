<?php
include("../inc/inc_modules.php");

$title = "Welcome to TicTacToe-Hub";
$additionalcss1 = '<link rel="stylesheet" href="/TicTacToe-Hub/assets/css/leaderboard.css">';



makeHead($title, $additionalcss1);
startBody();
makeHeader2();
?>

<main>

  <table class="leaderboard">
    <thead>
      <tr>
        <th>Rank</th>
        <th>Player</th>
        <th>Points</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>🥇1</td>
        <td>Htet Myat Lin</td>
        <td></td>
      </tr>
      <tr>
        <td>🥈2</td>
        <td>Buttergabel</td>
        <td></td>
      </tr>
      <tr>
        <td>🥉3</td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>4</td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>5</td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>6</td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>7</td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>8</td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>9</td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>10</td>
        <td>NoobMaster Justin</td>
        <td>42069</td>
      </tr>
    </tbody>
  </table>
</main>


<?php
makeFooter();
closeBody();
?>