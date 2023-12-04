<?php
require_once '../database.php';

if (isset($_SERVER["CONTENT_TYPE"])) {
    $contentType = $_SERVER["CONTENT_TYPE"];

    if ($contentType === "application/json") {
        $content = trim(file_get_contents("php://input"));

        $decoded = json_decode($content, true);

        $items = $database->select("tb_dishes", "*", [
            "AND" => [
                "people_category_id" => $decoded["qty"]
            ]
        ]);

        /*$state = $database->select("tb_us_states","*",[
                "id_us_state" => $_GET["destination_state"]
            ]);*/

        echo json_encode($items);
    }
}
