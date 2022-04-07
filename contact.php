<?php require_once("includes/header.php"); ?>

<?php require_once("includes/navbar.php"); ?>

<div class="container my-5">

  <p class="display-1 text-center my-5">Contact Admin and visit us!</p>

  <div class="row">

      <div class="col-lg-6">
        <form id="contactForm">
          <div class="form-group mb-3">
            <label class="form-label mb-1">Name:</label>
            <input type="text" name="user_name" id="user_name" class="form-control" value="">
          </div>

          <div class="form-group mb-3">
            <label class="form-label mb-1">Email:</label>
            <input type="email" name="email" id="email" class="form-control" value="">
          </div>

          <div class="form-group mb-3">
            <label class="form-label mb-1">Message:</label>
            <textarea name="text" id="text" class="form-control" rows="8" cols="80"></textarea>
          </div>

          <button type="button" name="sendContact" id="sendContact" class="btn btn-primary">Send Message</button>
        </form>
        <p id="contactResponse" class="mt-3"></p>
      </div><!-- END FIRST COl-->




    <!--Requireing for map-->
    <div class="col-lg-6">
      <?php require_once "map.php"; ?>
    </div><!-- END SECOND COL-->




  </div><!-- END ROW-->
</div><!--END CONTAINER-->

<?php require_once("includes/footer.php") ?>
