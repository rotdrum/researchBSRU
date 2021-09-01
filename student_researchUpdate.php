<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>แก้ไขบัณฑิตนิพนธ์</title>
    <?php include('root.php'); ?>
    <?php include('import.php'); ?>

  </head>
  <body>
  <?php include('session_student.php'); ?>

  <?php include('student_navbarLogin.php'); ?>

  <?php 
    $stmt = $pdo->query("select * from student where student_id = ".$_REQUEST['student_id']." ");
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $research_id = $row['research_id'];
    }
  ?>


  <?php 
    $stmt = $pdo->query("select * from research where research_id = ".$research_id." ");
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
  ?>
    <form class="container" action="poststudent_researchUpdate.php?research_id=<?php echo $research_id ; ?>&student_id=<?php echo $_REQUEST['student_id'] ; ?>" method="post" enctype="multipart/form-data" >
      <div class="txt-header-manage">
        <h3 class="text-header">แก้ไขบัณฑิตนิพนธ์</h3>
      </div>

      <div class="card-column">
        <h4 class="header-manage-research">เกี่ยวกับบัณฑิตนิพนธ์</h4>
        <div class="form-control">
            <p>ชื่อบัณฑิตนิพนธ์ (ภาษาไทย)</p>
            <input required value="<?php echo $row['name_th'] ; ?>" name="name_th"   type="text" class="txt-input" placeholder="กรอกชื่อบัณฑิตนิพนธ์ภาษาไทย">
        </div>
        <div class="form-control">
            <p>ชื่อบัณฑิตนิพนธ์ (ภาษาอังกฤษ)</p>
            <input required value="<?php echo $row['name_eng'] ; ?>" name="name_eng"  type="text" class="txt-input" placeholder="กรอกชื่อบัณฑิตนิพนธ์ภาษาอังกฤษ">
        </div>
        <div class="form-control">
            <p>ประเภทบัณฑิตนิพนธ์</p>
            <select required name="types" class="sel sel-input">
                <option value="<?php echo $row['types'] ; ?>"><?php echo $row['types'] ; ?></option>
                <?php 
    $stmt2 = $pdo->query("select * from selection where type_select = 1 ");
    while($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
    ?>
                    <option value="<?php echo $row2['data_select'] ?>"><?php echo $row2['data_select'] ?></option>
                <?php 
    }
    ?>
            </select>
        </div>

        <div class="form-control">
            <p>ภาคเรียน</p>
            <select required name="term"  class="sel sel-input">
                <option value="<?php echo $row['term'] ; ?>"><?php echo $row['term'] ; ?></option>
                <option value="1">1</option>
                    <option value="2">2</option>
            </select>
        </div>
        <div class="form-control">
            <p>ปีการศึกษา</p>
            <select required name="year" class="sel sel-input">
                    <option value="<?php echo $row['year'] ; ?>"><?php echo $row['year'] ; ?></option>
                    <option value="2560">2560</option>
                    <option value="2561">2561</option>
                    <option value="2562">2562</option>
                    <option value="2563">2563</option>
                    <option value="2564">2564</option>
                    <option value="2565">2566</option>
                    <option value="2567">2567</option>
                    <option value="2568">2568</option>
                    <option value="2569">2569</option>
                    <option value="2570">2570</option>
            </select>
        </div>


    
        <h4 class="mt-50 header-manage-research">อาจารย์ที่ปรึกษา</h4>
        <div class="form-control">
            <p>อาจารย์ที่ปรึกษาหลัก</p>
            <select id="personal_main" required name="personal_main"   class="sel sel-input">
            <?php 
    $stmt2 = $pdo->query("select * from personal where personal_id = ".$row['personal_main']." ");
    while($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
    ?>
                <option value="<?php echo $row2['personal_id'] ?>"><?php echo $row2['tname'] ?><?php echo $row2['fname'] ?> <?php echo $row2['lname'] ?></option>
                <?php 
            }
    ?>
                <?php 
    $stmt2 = $pdo->query("select * from personal ");
    while($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
    ?>
                <option value="<?php echo $row2['personal_id'] ?>"><?php echo $row2['tname'] ?><?php echo $row2['fname'] ?> <?php echo $row2['lname'] ?></option>
                <?php 
            }
    ?>
            </select>
        </div>
        <div class="form-control">
            <p>อาจารย์ที่ปรึกษาร่วม</p>
            <select id="personal_sub" required name="personal_sup"  class="sel sel-input">
            <?php 
    $stmt2 = $pdo->query("select * from personal where personal_id = ".$row['personal_sup']." ");
    while($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
    ?>
                <option value="<?php echo $row2['personal_id'] ?>"><?php echo $row2['tname'] ?><?php echo $row2['fname'] ?> <?php echo $row2['lname'] ?></option>
                <?php 
            }
    ?>
        <option value="">--- เลือก ---</option>
                <?php 
    $stmt2 = $pdo->query("select * from personal ");
    while($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
    ?>
                <option value="<?php echo $row2['personal_id'] ?>"><?php echo $row2['tname'] ?><?php echo $row2['fname'] ?> <?php echo $row2['lname'] ?></option>
                <?php 
            }
    ?>
            </select>
        </div>
   

        <h4 class="mt-50 header-manage-research">คณะผู้จัดทำ</h4>


        <div class="form-control">
            <p>คณะผู้จัดทำ</p>
            <input required name="student_one" value="<?php echo $row['student_one'] ; ?>"   type="text" class="txt-input" placeholder="กรอกชื่อ-สกุล นักศึกษาคนที่ 1">
        </div>
  
        <div class="form-control">
            <p>คณะผู้จัดทำ</p>
            <input name="student_two" value="<?php echo $row['student_two'] ; ?>" type="text" class="txt-input" placeholder="กรอกชื่อ-สกุล นักศึกษาคนที่ 2">
        </div>

        <!--
        <h4 class="mt-50 header-manage-research">ความคืบหน้าไฟล์</h4>
        <div class="form-control">
            <p>ประเภทไฟล์</p>
            <select  name="type_file" class="sel sel-input">
                <option value="">--- เลือกประเภทไฟล์ ---</option>
                <option value="1">หัวข้อบัณฑิตนิพนธ์</option>
                <option value="2">ก้าวหน้าบัณฑิตนิพนธ์</option>
                <option value="3">ป้องกันบัณฑิตนิพนธ์</option>
                <option value="4">บัณฑิตนิพนธ์ฉบับสมบูรณ์</option>
            </select>
        </div>
          
        <div class="form-upload">
            <label for="file-upload-1">อัพโหลดไฟล์
              <input   name="name_file" type="file" id="file-upload-1" class="file-upload" accept=".pdf" required>
            </label>
            <p id="filename-1" class="filename">อัพโหลดไฟล์บัณฑิตนิพนธ์ (.PDF)</p>
        </div>
          -->



        <h4 class="mt-50 header-manage-research">บทคัดย่อ</h4>
        <textarea required  name="abstract" class="txt-textarea" placeholder="กรอกบทคัดย่อ"><?php echo $row['abstract'] ; ?></textarea>
        <input required type="hidden" id="date" name="update_up" value="<?php echo date("M j, Y - H:i:s"); ?>">


        <div class="btn-control">
            <button class="btn btn-info btn-submit">บันทึก</button>
            <a id="btn_cancel" class="btn btn-danger btn-submit">ยกเลิก</a>
        </div>

        

      </div>


    </form>
    <?php 
            }
    ?>
    <?php include('footer.php'); ?>

    <div id="overlay" style="display: none; justify-content: center; align-items: center; z-index: 999; width: 100%; height: 100%; background-color: rgba(0,0,0,0.5); position: fixed; top: 0;">
      <div style="display: flex; justify-content: center; align-items: center; flex-direction: column; width: 500px; height: 300px; background: #fff; border-radius: 20px; padding: 50px;">
        <i class="fas fa-exclamation-triangle" style="font-size: 5rem; color: red; margin-bottom: 20px;"></i>
        <h3>คุณแน่ใจว่าต้องการยกเลิก?</h3>
        <div style="display: flex; width: 100%; justify-content: center; margin-top: 30px;">
          <a href="student_research.php?student_id=<?php echo $_REQUEST['student_id'] ; ?>" class="btn btn-danger" style="margin-right: 20px;"><i class="fas fa-trash-alt"></i> ยืนยัน</a>
          <a id="btn_reject" class="btn" style="background: #f7f7f7; border: 1px solid #e5e5e5; color: #333;">ยกเลิก</a>
        </div>
      </div>
    </div>

    <script>
    $("#personal_sub").blur(() => {
        if($("#personal_main").val() == $("#personal_sub").val()) {
          Swal.fire({
            icon: 'error',
            title: 'อาจารย์ที่ปรึกษาซ้ำกัน',
            text: 'โปรดเลือกอาจารย์ที่ปรึกษาร่วมใหม่'
          })
          $("#personal_sub").val("")
        }
      })

      $("#btn_cancel").click(() => {
        $("#overlay").css("display", "flex");
      });
      $("#overlay").click(() => {
        $("#overlay").css("display", "none");
      });
      $("#btn_reject").click(() => {
        $("#overlay").css("display", "none");
      });
    </script>
   
  </body>
</html>
