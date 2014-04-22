<?php

$errors = !empty($errors) ? $errors : [];
$messages = !empty($messages) ? $messages : [];

$class = function ($name) use ($errors)
{
    $class = 'form-group';
    if (in_array($name, $errors)) {
        $class .= ' has-error';
    }

    echo $class;
};
 ?>
<?php require "./../includes/_head.php"; ?>
<body>
<!--Top logo-->
<?php require "./../includes/_navigation.php" ?>
   <h2 id="pagename">Contact Us&#58;</h2>
    <div class="container">
  <!--All contact info-->
        <div class="col-xs-4 col-md-4">
          <p class ="bold center">Mailing Address&#58;</p>
          <p class="center" style="padding-bottom:1.5em">P.O. Box 1215<br> Brenham TX 77834</p>
        </div>
        <div class="col-xs-4 col-md-4">
          <p class ="bold center">Physical Address&#58;</p>
          <p class="center" style="padding-bottom:1.5em">405 N. Dixie Street <br> Brenham TX 77833</p>
        </div>
        <div class="col-xs-4 col-md-4">
          <p class ="bold center">Phone&#58;</p>                 
          <p class="center" style="padding-bottom:1.5em">979-836-5083</p>
        </div>
    <div class="col-md-5">
     <img class="images" src="/images/dixie_street_storage.jpg" alt="Dixie Street Storage Units">
    </div>
    <?php if (!empty($messages)): ?>
      <div class="alert alert-danger">
        <ul>
          <?php foreach ($messages as $message): ?>
            <li><?php echo $message; ?></li>
          <?php endforeach ?>
        </ul>
      </div>
    <?php endif ?>
    <div class="col-md-7">
     <form action="/contact_action.php" method="POST" role="form">
          <legend>Contact us&#58;</legend>
            <div class="<?php $class('name'); ?>">
              <label for="name">&#42;Name&#58;</label>
              <input type="text" name="name" class="form-control" id="name" value="<?php echo @$fname ?>" required>
            </div>
            <div class="<?php $class('email'); ?>">
              <label for="email">&#42;E&#150;mail&#58;</label>
              <input type="email" name="email" class="form-control" value="<?php echo @$femail ?>" required>
            </div>
            <div class="<?php $class('phone'); ?>">
              <label for="phone">&#42;Phone Number&#58;</label>
              <input type="tel" name="phone" class="form-control" value="<?php echo @$fphone1 ?>" required>
            </div>
            <div class="<?php $class('message'); ?>">
              <label for="message">&#42;Message&#58;</label>
              <textarea name="message" placeholder="Please enter a brief message here&hellip;" class="form-control" required></textarea>
            </div>
            <input type="submit" value="Submit" class="btn btn-block btn-primary">
      </form>
    </div>
    </div>
<?php require "./../includes/_footer.php"; ?>
</body>
</html>