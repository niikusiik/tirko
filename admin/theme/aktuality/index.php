<?php 
    include '../../assets/header.php';

    if(isset($_GET['action']) && $_GET['action'] == "logout") {
        header('Location: ../login/index.php');
        exit();
    }
?>
<body>
<div class="admin">
    <div class="bg-dark w-full left-box">
        <div class="user-box">
            <img src="../../assets/images/default.jpeg" width="100">
            <p class="user-name">Nikoletta Pitáková</p>
            <p class="user-info"><?php echo $_SESSION['meno']; ?><br>administrácia</p>
        </div>

        <ul>
            <li><a class="" href="../aktuality/">Aktuality</a></li>
            <li><a href="../fotogaleria/">Fotogaléria</a></li>
            <li><a href="../blog/">Blog</a></li>
            <li><a href="../uzivatelia/">Uživatelia</a></li>
        </ul>

    </div>
    <div class="bg-grey w-full">

        <div class="right-top">
            <ul>
                <li><a href="?action=logout">Odhlásenie</a></li>
            </ul>
        </div>

          <h1>Aktuality - <span>publikované články</span></h1>
          <div class="table-box">
              <p class="top">Aktuality v Národnom parku</p>
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
    </div>
</div>
</body>

<?php
    include '../../assets/footer.php';
?>
