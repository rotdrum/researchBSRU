<?php include('./session.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>จัดการสาขาวิชา</title>
    <?php include('root.php'); ?>

    <?php include('import.php'); ?>

</head>
<body>
<?php include('navbar.php'); ?>

    

    <section class="main">
        <div class="btn btn-hamburger">
            <i class="fas fa-bars"></i>
        </div>
        
        <div class="sidebar">
            <?php include('sidebar.php'); ?>
        </div>
        <div class="dashboard">
            <div class="moretype_title">
                <h2 class="dashboard-title">จัดการสาขาวิชา</h2>
                <a href="more_department_add.php" class="btn btn-addtype">
                    เพิ่มสาขาวิชา
                </a>
            </div>

            <!-- table -->
            <div class="table-scroll">
                <table class="table table-research" >
                    <thead>
                        <tr>
                            <th class="w-50">ลำดับ</th>
                            <th class="w-300">คณะ</th>
                            <th class="w-300">สาขาวิชา</th>
                            <th class="w-100">จัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
           
                    <?php 
    $count = 1 ;
    $stmt = $pdo->query("select * from selection_sup");
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            ?>
                        <tr>
                            <td>
                                <p class="p-td-center"><?php echo $count  ; ?></p>
                            </td>
                            <td>
    <?php 
    $stmt2 = $pdo->query("select * from selection where selection_id = ".$row['selection_id']." order by data_select ");
    while($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
                                 echo "(". $row['selection_id'] .") " .  $row2['data_select']  ;
    }
            ?>
                            </td>
                            <td>
                                <p><?php echo "(". $row['selection_sup_id'] .") " . $row['data_select']  ; ?></p>
                            </td>
                            
                            <td class="btn-td-control">
                                <a href="more_edit_department.php?selection_sup_id=<?php echo $row['selection_sup_id']  ; ?>" class="btn btn-warning">แก้ไข</a>
                                <a href="postmore_delete.php?selection_sup_id=<?php echo $row['selection_sup_id']  ; ?>&type_select=3" class="btn btn-danger">ลบ</a>
                            </td>
                        </tr>
                        <?php 
    $count++ ;
    }
            ?>

                    </tbody>
                </table>
            </div>

        </div>
    </section>

  
</body>
</html>