<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <?php
    $output_form = false;
    if (isset($_POST['submit'])) {
      $first_name = $_POST['first_name'];
      $last_name = $_POST['last_name'];
      $e_mail = $_POST['e_mail'];

        if (empty($first_name) && empty($last_name) && empty($e_mail)) {
          echo 'Preencher todos os campos para cadastrar o e-mail';
          $output_form = true;
        }
        if (empty($first_name) && empty($last_name) && (!empty($e_mail))) {
          echo 'Preencher os campos nome e sobrenome';
          $output_form = true;
        }
        if (empty($first_name) && (!empty($last_name)) && (!empty($e_mail))) {
          echo 'Preencher o campo nome';
          $output_form = true;
        }
        if ((!empty($first_name)) && (!empty($last_name)) && empty($e_mail)){
          echo 'Preencher o campo e-mail';
          $output_form = true;
        }
        if ((!empty($first_name)) && empty($last_name) && (!empty($e_mail))) {
          echo 'Preencher o campo sobrenome';
          $output_form = true;
        }
        if ((!empty($first_name)) && empty($last_name) && empty($e_mail)) {
          echo 'Preencher os campos sobrenome e e-mail';
          $output_form = true;
        }
        if (empty($first_name) && (!empty($last_name)) && empty($e_mail)) {
          echo 'Preencher os campos nome e e-mail';
          $output_form = true;
        }
        if ((!empty($first_name)) && (!empty($last_name)) && (!empty($e_mail))) {
          $dbc= mysqli_connect('localhost', 'root', '', 'web_store')
          or die('Erro ao conectar servidor MYSQL');

          $query = "INSERT INTO email_list(first_name, last_name, email)
          VALUES('$first_name', '$last_name', '$e_mail')";

          mysqli_query($dbc, $query)
          or die('Erro de requisição ao banco de dados');
          echo 'E-mail inserido com sucesso!';

          mysqli_close($dbc);
        }
    }
    else {
      $output_form = true;
    }
    if ($output_form) {
    ?>
    <fieldset>
    <legend>Ultilize o formulário para receber nossas ofertas</legend>
    <form class="" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
      <label for="first_name">First Name:</label>
      <input class="form_input" type="text" name="first_name" value="<?php echo $first_name; ?>"><br/>
      <label for="last_name">Last Name:</label>
      <input class="form_input" type="text" name="last_name" value="<?php echo $last_name; ?>"><br/>
      <label for="email">E-mail</label>
      <input class="form_input" type="text" name="e_mail" value="<?php echo $e_mail; ?>"><br/>

      <input type="submit" name="submit" value="Enviar">

    </form>
    </fieldset>
    <?php
    }
    ?>
  </body>
</html>
