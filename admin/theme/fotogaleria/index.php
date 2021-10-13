<?php 
    include '../../assets/header.php';

    if(isset($_GET['action']) && $_GET['action'] == "logout") {
        header('Location: ../login/index.php');
        exit();
    }
?>

  <h1>Fotogaléria - <span>publikované fotky</span></h1>
  <div class="table-box">
      <p class="top">Fotky v Národnom parku</p>
      <table class="table">
          <thead>
            <tr>
                <th>#</th>
                <th>Názov článku</th>
                <th>Status</th>
                <th>Úprava článku</th>
            </tr>
          </thead>
      </table>
  </div>
<?php
    include '../../assets/footer.php';
?>
