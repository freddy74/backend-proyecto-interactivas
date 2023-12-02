<?php 
    require_once '../database.php';

    $dish = [];

    if(isset($_SERVER["CONTENT_TYPE"])){
        $contentType = $_SERVER["CONTENT_TYPE"];

        if($contentType == "application/json"){
            $content = trim(file_get_contents("php://input"));

            $decoded = json_decode($content, true);

            $response = "server response";
            //echo json_encode($decoded["language"]);




            if($decoded["language"]== "EN"){

                $item = $database->select("tb_dishes",[
                    "tb_dishes.dish_name",
                    "tb_dishes.dish_description",
                ],[
                    "id_destination"=>$decoded["dish_id"]//Where: id_destinations sea igual al que nos entró por parámetro
                ]);

                $dish["name"]= $item[0]["destination_lname"];
                $dish["description"]= $item[0]["destination_description"];



            }else{

                $item = $database->select("tb_destinations",[
                    "tb_destinations.destination_lname_tr",
                    "tb_destinations.destination_description_tr",
                ],[
                    "id_destination"=>$decoded["id_destination"]//Where: id_destinations sea igual al que nos entró por parámetro
                ]);
    
                $destination["name"]= $item[0]["destination_lname_tr"];
                $destination["description"]= $item[0]["destination_description_tr"];

            }
            echo json_encode($destination);


        }
    }

?>