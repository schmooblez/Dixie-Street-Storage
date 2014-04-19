<?php

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
      <p id="locdesc">We are located less than half a mile from the intersection of 290 and 36.</p><hr>
  <!--All contact info-->
      <table class="cinfo">
        <tr>
          <td class ="bold">Mailing Address&#58;</td>
          <td class ="bold">Physical Address&#58;</td>
          <td class ="bold">Phone&#58;</td>
        </tr>
        <tr>
          <td>P.O. Box 1215<br> Brenham TX 77834</td>
          <td>405 N. Dixie Street <br> Brenham TX 77833</td>
          <td>979-836-5083</td>
        </tr>
      </table>
    <div class="dss">
    <img id="dssunits" src="/images/dixie_street_storage.jpg" alt="Dixie Street Storage Units">
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
          <p id="disclaimer">&#42;Dixie Street Storage does not sell or share your information with outside vendors and only uses your personal information for the purpose of contacting you regarding our services.</p>
      </form>
    </div>
<?php require "./../includes/_footer.php"; ?>
</body>
</html>