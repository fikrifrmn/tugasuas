<?php
	include("config.php");

	// ambil parameter id
	$a=$_GET['id'];
  $sql= "select*from user where id_user='$a'";
	$query=mysqli_query($koneksi,$sql)or die ("gagalsql");

	$hasil=mysqli_fetch_array($query);

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Tiny Dashboard - A Bootstrap Dashboard Template</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="css/simplebar.css">
    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="css/feather.css">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="css/daterangepicker.css">
    <!-- App CSS -->
    <link rel="stylesheet" href="css/app-light.css" id="lightTheme">
    <link rel="stylesheet" href="css/app-dark.css" id="darkTheme" disabled>
    
  </head>
  <body class="vertical  light  ">
    <div class="wrapper">
      <?php
        include 'navBar.php';
      ?>
      <main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              <h2 class="page-title">Form Layout</h2>
              <p class="text-muted">Demo for form control styles, layout options, and custom components for creating a wide variety of forms.</p>
              <div class="card-deck">
                <div class="card shadow mb-4">
                  <div class="card-header">
                    <strong class="card-title">Horizontal form</strong>
                  </div>
                  <div class="card-body">
                    <form method="POST" action="saveAbsen.php">
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                          <input type="email" class="form-control" value="<?php echo $hasil['email']; ?>" id="inputEmail3" placeholder="Email" name="email" disabled>
                        </div>
                      </div>
                      <div class="form-group row">
                          <input type="hidden" class="form-control" value="<?php echo $hasil['gender']; ?>" id="inputPassword3" name="gender">
                          <input type="hidden" class="form-control" value="<?php echo $hasil['level']; ?>" id="inputPassword3" name="level">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">Name</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" value="<?php echo $hasil['nama']; ?>" id="inputPassword3" placeholder="Name" name="nama" disabled>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="disabledInput" class="col-sm-3 col-form-label">NIP</label>
                        <div class="col-sm-9">
                          <input class="form-control" id="disabledInput" value="<?php echo $hasil['nip']; ?>" type="text" placeholder="NIP" name="nip" disabled>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-sm-3">Checkbox</div>
                        <div class="col-sm-9">
                          <div class="form-check">
                            <input class="form-check-input" value="Present" type="checkbox" id="gridCheck" onclick="onlyOne(this)" name="status">
                            <label class="form-check-label" for="gridCheck1"> Present </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" value="Excused" type="checkbox" id="gridCheck" name="status" onclick="onlyOne(this)">
                            <label class="form-check-label" for="gridCheck1"> Excused </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Sick" id="gridCheck" name="status" onclick="onlyOne(this)">
                            <label class="form-check-label" for="gridCheck1"> Sick </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Alpha" id="gridCheck" name="status" onclick="onlyOne(this)">
                            <label class="form-check-label" for="gridCheck1"> Alpha </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-3" for="controlTextArea">Textarea</label>
                        <div class="col-sm-9">
                          <textarea class="form-control" id="controlTextArea" rows="2" name="textarea" disabled></textarea>
                        </div>
                      </div>
                      <div class="form-group mb-2">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div> <!-- .col-12 -->
        </div> <!-- .container-fluid -->
      </main> <!-- main -->
    </div> <!-- .wrapper -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/moment.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/simplebar.min.js"></script>
    <script src='js/daterangepicker.js'></script>
    <script src='js/jquery.stickOnScroll.js'></script>
    <script src="js/tinycolor-min.js"></script>
    <script src="js/config.js"></script>
    <script src="js/apps.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag()
      {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      gtag('config', 'UA-56159088-1');
    </script>

    <script type="text/javascript">
      // Fungsi untuk memilih 1 checkbox
        function onlyOne(checkbox) {
            var checkboxes = document.getElementsByName('status')
            checkboxes.forEach((item) => {
                if (item !== checkbox) item.checked = false
            });

            // Fungsi untuk disable-enable text area
            var textarea = document.getElementById('controlTextArea');
            if (checkbox.value === 'Excused' && checkbox.checked) {
                textarea.disabled = false;
            } else {
                textarea.value = '';
                textarea.disabled = true;
            }
        }
    </script>

    
  </body>
</html>