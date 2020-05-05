<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <fieldset>
      <legend>Selecione os e-mails a serem removidos e clique em remover</legend>
      <form class="" action="index.html" method="post">
        <?php
          $dbc = mysqli_connect('localhost', 'root', '', 'web_store')
          or die('Erro ao se conectar com o servidor MYSQL');
          $query = "SELECT * FROM email_list";
          $result = mysqli_query($dbc, $query);

          while ($row = mysqli_fetch_array($result)) {
            echo '<input type="checkbox" value="'.$row['id'].'" name="todelete[]"/>';

            echo $first_name = $row['first_name'];
            echo ' '.$last_name = $row['last_name'];
            echo ' - '.$e_mail = $row['email'];

            echo '<br/>';
          }
          mysqli_close($dbc);
         ?>

         <input type="submit" name="submit" value="Remove">
      </form>
    </fieldset>
  </body>
</html>
