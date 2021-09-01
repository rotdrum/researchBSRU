<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายงาน</title>

    <?php include('root.php'); ?>

    <?php include('import.php'); ?>

</head>
<body>

<?php include('teacher_navbarLogin.php'); ?>

<section class="container">
      <div class="txt-header-manage">
        <h3 class="text-header">รายงานบัณฑิตนิพนธ์</h3>
        <div class="report-header">
        <a href="report_research.php?personal_id=<?php echo $_REQUEST['personal_id'] ; ?>" class="rp-select rp-active">บัณฑิตนิพนธ์</a>
          <a href="report_teacher.php?personal_id=<?php echo $_REQUEST['personal_id'] ; ?>" class="rp-select">ภาระอาจารย์ที่ปรึกษา</a>
          <a href="report_exam.php?personal_id=<?php echo $_REQUEST['personal_id'] ; ?>" class="rp-select">งานการจัดสอบ</a>
          <a href="report_user.php?personal_id=<?php echo $_REQUEST['personal_id'] ; ?>" class="rp-select">ผู้ใช้ระบบ</a>
        </div>
      </div>

      <div class="report-filter">

        <!-- filter main -->
        <div class="report-filter-control">
          <p>ตัวกรอง</p>
          <select  class="sel sel-report-filter" id="ft-main">
            <option value="none">แสดงทั้งหมด</option>
            <option value="ft-year">ปีการศึกษา</option>
            <option value="ft-status">สถานะบัณฑิตนิพนธ์</option>
            <option value="ft-name">ชื่อ-สกุล</option>
            <!--
            <option value="ft-id">รหัสนักศึกษา</option>
            -->
            <option value="ft-teacher">อาจารย์ที่ปรึกษา</option>
          </select>
        </div>

        <!-- filter 1 -->
        <div id="ft-year" class="report-filter-control" style="display: none;">
          <p>ปีการศึกษา</p>
          <select id="year"  onchange="myFunction1()"  class="sel sel-report-filter">
            <option value="">--- เลือก ---</option>
            <option value="2570">2570</option>
            <option value="2569">2569</option>
            <option value="2568">2568</option>
            <option value="2567">2567</option>
            <option value="2566">2566</option>
            <option value="2565">2565</option>
            <option value="2564">2564</option>
            <option value="2563">2563</option>
            <option value="2562">2562</option>
            <option value="2561">2561</option>
            <option value="2560">2560</option>
          </select>
        </div>

        <!-- filter 2 -->
        <div id="ft-status" class="report-filter-control" style="display: none;">
          <p>สถานะบัณฑิตนิพนธ์</p>
          <select  id="status" onchange="myFunction2()"  class="sel sel-report-filter">
            <option value="">--- เลือก ---</option>
            <option value="บัณฑิตนิพนธ์ฉบับสมบูรณ์">บัณฑิตนิพนธ์ฉบับสมบูรณ์</option>
            <option value="รออนุมัติป้องกันบัณฑิตนิพนธ์">รออนุมัติป้องกันบัณฑิตนิพนธ์</option>
            <option value="ผ่านป้องกันบัณฑิตนิพนธ์">ผ่านป้องกันบัณฑิตนิพนธ์</option>
            <option value="รออนุมัติป้องกันบัณฑิตนิพนธ์">รออนุมัติป้องกันบัณฑิตนิพนธ์</option>
            <option value="ผ่านก้าวหน้าบัณฑิตนิพนธ์">ผ่านก้าวหน้าบัณฑิตนิพนธ์</option>
            <option value="รออนุมัติก้าวหน้าบัณฑิตนิพนธ์">รออนุมัติก้าวหน้าบัณฑิตนิพนธ์</option>
            <option value="ผ่านหัวข้อบัณฑิตนิพนธ์">ผ่านหัวข้อบัณฑิตนิพนธ์</option>
            <option value="รออนุมัติหัวข้อบัณฑิตนิพนธ์">รออนุมัติหัวข้อบัณฑิตนิพนธ์</option>
          </select>
        </div>

        <!-- filter 3 -->
        <div id="ft-name" class="report-filter-control" style="display: none;">
          <p>ชื่อ-สกุล นักศึกษา</p>
          <input type="search"   id="name_stu" onkeyup="myFunction4()"   class="txt txt-filter-report" placeholder="กรอกชื่อ-สกุล นักศึกษา">
        </div>

        <!-- filter 4 -->
        <!-- 
        <div id="ft-id" class="report-filter-control" style="display: none;">
          <p>รหัสนักศึกษา</p>
          <input type="search" class="txt txt-filter-report" placeholder="กรอกรหัสนักศึกษา">
        </div>
        -->

        <!-- filter 5 -->
        <div id="ft-teacher" class="report-filter-control" style="display: none;">
          <p>อาจารย์ที่ปรึกษา</p>
          <select  id="teacher" onchange="myFunction3()"  class="sel sel-report-filter">
            <option value="">--- เลือก ---</option>
            <?php 
                        $stmt = $pdo->query("select * from personal  ");
                        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                        ?>
            <option value="<?php echo $row['tname'] ; ?><?php echo $row['fname'] ; ?> <?php echo $row['lname'] ; ?>"><?php echo $row['tname'] ; ?><?php echo $row['fname'] ; ?> <?php echo $row['lname'] ; ?></option>
            <?php 
            }
            ?>
          </select>
        </div>



        <div class="report-filter-control report-filter-control-special ">
          <div class="report-m"></div>
          <a onclick="window.print()" class="btn btn-warning"><i class="fas fa-print"></i>พิมพ์เอกสาร</a>
        </div>
      </div>

      <h1 class="title-print">รายงานหัวข้อบัณฑิตนิพนธ์</h1>
      <p id="shownone" style="display: none; width: 100%; text-align: center;">ไม่มีรายงานหัวข้อบัณฑิตนิพนธ์</p>

      <!-- table -->
      <div id="table" class="table-scroll">
        <table class="table table-research"  id="myTable">
            <thead>
              <tr>
                <th class="w-50">ลำดับ</th>
                <th class="w-100">ปีการศึกษา</th>
                <th class="w-250">ชื่อ-สกุล</th>
                <th class="w-250">อาจารย์ที่ปรึกษา</th>
                <th class="w-200">หัวข้อบัณฑิตนิพนธ์</th>
                <th class="w-200">สถานะบัณฑิตนิพนธ์</th>
              </tr>
            </thead>
            <tbody id="tbody">
              
            </tbody>
        </table>
      </div>


    </section>
    <?php include('footer.php'); ?>
    <script>
    var teacher, research;
    var html
    
    $.ajax({
      type: "POST",
      dataType: "JSON",
      url: "./api/index/get_teacher.php",
      data: {},
      success: function(response) {
        teacher = response.result;
        console.log("good", response)
      }, error: function(err) {
        console.log("err", err)
      }
    })
  

      setTimeout(() => {
        $.ajax({
          type: "POST",
          dataType: "JSON",
          url: "./api/index/get_research.php",
          data: {},
          success: function(response) {
            research = response.result
            console.log("good", response)
            render()
          }, error: function(err) {
            console.log("err", err)
          }
        })
      }, 500);

      function render() {
        html = '';
        var count = 0;
        for(var i=0; i<research.length; i++, count++) {
           
           html += `
             <tr>
               <td>
                 <p class="p-td-center">${i+1}</p>
               </td>
               <td>
                 <p class="p-td-center">${research[i].year}</p>
               </td>
               <td>
                 <p>${research[i].student_one}</p>`;
           research[i].student_two != "" ? html += `<p>${research[i].student_two}</p>` : "" ;
           html += `  
               </td>
               <td>`;
           for(var j=0; j<teacher.length; j++) {
               if(research[i].personal_main == teacher[j].personal_id) {
                 html += `<p>${teacher[j].name}</p>`
               }
           }
           for(var j=0; j<teacher.length; j++) {
              if(research[i].personal_sub == teacher[j].personal_id) {
                  html += `<p>${teacher[j].name}</p>`
               }
           }
           html += `
               </td>
               <td>
                 <p>${research[i].name_th}</p>
               </td>
               <td>`;
           if(research[i].status4 == "2") {
             html += `<p class="color-success p-td-center"><i class="fas fa-circle"></i> บัณฑิตนิพนธ์ฉบับสมบูรณ์</p>`;
           } else if(research[i].status4 == "1") {
             html += `<p class="color-danger p-td-center"><i class="fas fa-circle"></i> รออนุมัติป้องกันบัณฑิตนิพนธ์</p>`;
           } else if(research[i].status3 == "2") {
             html += `<p class="color-success p-td-center"><i class="fas fa-circle"></i> ผ่านป้องกันบัณฑิตนิพนธ์</p>`;
           } else if(research[i].status3 == "1") {
             html += `<p class="color-danger p-td-center"><i class="fas fa-circle"></i> รออนุมัติป้องกันบัณฑิตนิพนธ์</p>`;
           } else if(research[i].status2 == "2") {
             html += `<p class="color-success p-td-center"><i class="fas fa-circle"></i> ผ่านก้าวหน้าบัณฑิตนิพนธ์</p>`;
           } else if(research[i].status2 == "1") {
             html += `<p class="color-danger p-td-center"><i class="fas fa-circle"></i> รออนุมัติก้าวหน้าบัณฑิตนิพนธ์</p>`;
           } else if(research[i].status1 == "2") {
             html += `<p class="color-success p-td-center"><i class="fas fa-circle"></i> ผ่านหัวข้อบัณฑิตนิพนธ์</p>`;
           } else if(research[i].status1 == "1") {
             html += `<p class="color-danger p-td-center"><i class="fas fa-circle"></i> รออนุมัติหัวข้อบัณฑิตนิพนธ์</p>`;
           }
             html += `
               </td>
             </tr>
           `;
         }
         if(count <= 0) {
           $("#shownone").show()
           $("#table").hide()
         } else {
           $("#tbody").html(html)
         }
      }

      $("#ft-main").change(() => {
        render()
      })

      



function myFunction1() {
  
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("year");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}

function myFunction2() {
  
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("status");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[5];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}

function myFunction3() {
  
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("teacher");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[3];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}


function myFunction4() {
  
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("name_stu");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>
</body>
</html>