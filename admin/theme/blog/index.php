<?php 
    include '../../assets/header.php';

    if(isset($_GET['action']) && $_GET['action'] == "logout") {
        header('Location: ../login/index.php');
        exit();
    }

$prispevky = [];
$suborPrispevky = fopen('../../../public/theme/kontakt/prispevky.csv', 'r');

while ($prispevok = fgetcsv($suborPrispevky,1000, ';')) {
    $prispevky[] = $prispevok;
}

fclose($suborPrispevky);

$prispevky = array_reverse($prispevky);

?>

          <h1>Blog - <span>publikované príspevky</span></h1>
          <div class="table-box">
              <p class="top">Príspevky v Národnom parku</p>
              <table class="table">
                  <thead>
                    <tr>
                        <th>#</th>
                        <th>Meno</th>
                        <th>Text</th>
                        <th>Datum</th>
                        <th>Úprava</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php

                  foreach ($prispevky as $prispevok) {
                      $datum = date_format(date_create($prispevok[3]),'d.m.Y H:i');

                      ?>
                          <tr>
                              <td><?php echo $prispevok[0]; ?></td>
                              <td><?php echo $prispevok[1]; ?></td>
                              <td><?php echo substr($prispevok[2], 0, 80); ?>...</td>
                              <td><?php echo $datum; ?></td>
                              <td><a class="btn btn-danger btn-sm">Zmazať</a></td>
                          </tr>
                      <?php

                  }

                  ?>

                  <tr></tr>
                  </tbody>
              </table>
          </div>
<?php
    include '../../assets/footer.php';
?>
