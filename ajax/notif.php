<?php
session_start();
if(isset($_SESSION['token_procurement'])) {
    require_once('../class/connection.php');
    $kategori = mysqli_escape_string($procurement,$_POST['notif']);


    $sql_notif = mysqli_query($procurement,"select * from notif where kategori = '$kategori'");
    $num_notif = mysqli_num_rows($sql_notif);
    ?>
    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
        <i class="icon-bell"></i>
        <span class="badge badge-success"> <?=$num_notif?> </span>
    </a>
    <ul class="dropdown-menu">
        <li class="external">
            <h3>
                <span class="bold"><?=$num_notif?> pending</span> notifications</h3>
        </li>
        <li>
            <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
                <?php
                if($num_notif == 0){
                    ?>
                    <li>
                        <a href="javascript:;">
                                                <span class="details">
												<span class="label label-sm label-icon label-success">
													<i class="fa fa-bullhorn"></i>
												</span> Tidak ada notifikasi sementara </span>
                        </a>
                    </li>
                    <?php
                }else {
                    while ($re_notif = mysqli_fetch_array($sql_notif)) {
                        $judulnotif = $re_notif['judulnotif'];
                        $isinotif = $re_notif['isinotif'];
                        $tipenotif = $re_notif['tipenotif'];
                        $status = $re_notif['status'];
                        $created_date = $re_notif['created_date'];
                        ?>
                        <li>
                            <a href="javascript:;">
                                                <span class="details">
												<span class="label label-sm label-icon label-<?= $status ?>">
													<i class="fa fa-plus"></i>
												</span> <?=$isinotif?> </span>
                            </a>
                        </li>
                        <?php
                    }
                }
                ?>
            </ul>
        </li>
    </ul>
    <?php
}