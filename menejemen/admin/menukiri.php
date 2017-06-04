
<?php include '../config/notif.php' ?>

<aside class="main-sidebar">
    <section class="sidebar"> 
      <div class="user-panel">
        <div class="pull-left image">
        <!-- nambah foto buat profile sesuai database nya euy   -->
        <!-- DISINIIIII -->
          <img src="../upload/image-user/<?php echo $_SESSION['operator_image'] ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['operator_username']; ?></p>
        </div> 
      </div>
      <ul class="sidebar-menu"> 
        <li class="header">MAIN NAVIGATION</li>
        <?php
        
        $sqlmenu1="select menu_id, menu_name, menu_parent from ref_menu where menu_parent=0";
        $resultmenu1=mysql_query($sqlmenu1);
        while($datamenu1=mysql_fetch_array($resultmenu1)){
            $varMenuId=$datamenu1['menu_id'];
            $varMenuName=$datamenu1['menu_name'];
            $varMenuParent=$datamenu1['menu_parent'];?>
            <li class="treeview">
                <a href="#"><i class="fa fa-tag"></i><?php echo $varMenuName?><span class="fa fa-angle-left pull-right"></span></a>
                <?php
                //--tonton menu_id berdasarkan levelnya apa
                $sqlmenu2="select menu_id_fk from trx_level_menu where level_id_fk='".$_SESSION['level_id']."'";
                $resultmenu2=mysql_query($sqlmenu2);
                while($datamenu2=mysql_fetch_array($resultmenu2)){
                    $varMenuId2=$datamenu2['menu_id_fk'];
                    //--tampilan daftar menunya
                    $sqlmenu3="select menu_id, menu_name, menu_url from ref_menu where menu_id='".$varMenuId2."' and menu_parent='".$varMenuId."'";
                    $resultmenu3=mysql_query($sqlmenu3);
                    while($datamenu3=mysql_fetch_array($resultmenu3)){
                        $varMenuName3=$datamenu3['menu_name'];
                        $varMenuUrl3=$datamenu3['menu_url'];?>
                        <ul class="treeview-menu">
                            <li>
                                <a href="index.php?hal=<?php echo $varMenuUrl3?>"><i class="fa fa-location"></i><?php echo $varMenuName3?>
                                    <?php 
                                        if ($varMenuName3=='Konfirmasi Pembayaran' && $nKonfirmasi>0) { ?>
                                            <span class="label label-danger"><?php echo $nKonfirmasi; ?></span> <?php
                                        } elseif ($varMenuName3=='Data Registrasi Member' && $nRegistrasi>0) { ?>
                                            <span class="label label-danger"><?php echo $nRegistrasi; ?></span> <?php
                                        } 
                                    ?>
                                </a>
                            </li>
                        </ul>
                    <?php
                    }//tutup while dalemnya
                }//while luar
                ?>
            </li>
        <?php
        }//tutup while sql pertama 
        ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>