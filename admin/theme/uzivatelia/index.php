<?php 
    include '../../assets/header.php';
?>
<body>
<div class="admin">
    <div class="bg-dark w-full left-box">
        <div class="user-box">
            <img src="../../assets/images/default.jpeg" width="100">
            <p class="user-name"><?php echo $_SESSION['meno']; ?></p>
            <p class="user-info"><?php echo $_SESSION['username']; ?><br><?php echo $_SESSION['rola']; ?></p>
        </div>

        <ul>
            <li><a class="" href="../aktuality/">Aktuality</a></li>
            <li><a href="../uzivatelia/">Uživatelia</a></li>
        </ul>

    </div>
    <div class="bg-grey w-full">

        <div class="right-top">
            <ul>
                <li><a href="?action=logout">Odhlásenie</a></li>
            </ul>
        </div>

          <h1>Uživatelia - <span>aktívni uživatelia</span></h1>
          <div class="table-box">
              <table class="table">
                  <thead>
                    <tr>
                        <th>#</th>
                        <th>Username</th>
                        <th>Meno</th>
                        <th>Rola</th>
                        <th>Úprava</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                        $query = 'SELECT * FROM uzivatelia';
                        $users = $mysql->query($query);

                        while($row = $users->fetch_assoc()) {
                            echo "<tr>
                                        <td>".$row['id']."</td>
                                        <td>".$row['login']."</td>
                                        <td>".$row['meno']."</td>
                                        <td>".$row['rola']."</td>
                                        <td><a href='#' class='btn-primary btn btn-sm'>Upraviť</a></td>
                                    </tr>";
                        }
                    ?>
                  </tbody>
              </table>
          </div>
    </div>
</div>
</body>

<?php
    include '../../assets/footer.php';
?>
