<?php
    include('../../root.php');


    if($_SERVER['REQUEST_METHOD'] == "POST") {
        $select_stmt = $pdo->prepare("SELECT * FROM research r LEFT JOIN exam e ON r.research_id = e.research_id");
        $select_stmt->execute();

        $data_arr = array();
        $data_arr["result"] = array();
        while ($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $data_items = array(
                "research_id" => $research_id,
                "name_th" => $name_th,
                "name_eng" => $name_eng,
                "look" => $look,
                "types" => $types,
                "term" => $term,
                "year" => $year,
                "personal_main" => $personal_main,
                "personal_sup" => $personal_sup,
                "student_one" => $student_one,
                "student_two" => $student_two,
                "abstract" => $abstract,
                "file1" => $file1,
                "file2" => $file2,
                "file3" => $file3,
                "file4" => $file4,
                "status1" => $status1,
                "status2" => $status2,
                "status3" => $status3,
                "status4" => $status4,
                "create_up" => $create_up,
                "update_up" => $update_up,
                "id" => $id,
                "room" => $room,
                "ex_date1" => $ex_date1,
                "ex_time1" => $ex_time1,
                "ex_date2" => $ex_date2,
                "ex_time2" => $ex_time2,
                "ex_status" => $ex_status,
                "teacher1" => $teacher1,
                "teacher2" => $teacher2,
                "teacher3" => $teacher3,
                "update_time" => $update_time
            );
            array_push($data_arr["result"], $data_items);
        }

        echo json_encode($data_arr);
        http_response_code(200);

    }
    else {
        http_response_code(405);
    }
?>