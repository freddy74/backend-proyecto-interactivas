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




            if($decoded["language"]== "JP"){

                $item = $database->select("tb_dishes",[
                    "tb_dishes.dish_name",
                    "tb_dishes.dish_description",
                ],[
                    "dish_id"=>$decoded["dish_id"]//Where: id_destinations sea igual al que nos entró por parámetro
                ]);

                $dish["name"]= $item[0]["dish_name"];
                $dish["description"]= $item[0]["dish_description"];



            }else{

                $item = $database->select("tb_dishes",[
                    "tb_dishes.dish_name_jp",
                    "tb_dishes.dish_description_jp",
                ],[
                    "dish_id"=>$decoded["dish_id"]//Where: id_destinations sea igual al que nos entró por parámetro
                ]);
    
                $dish["name"]= $item[0]["dish_name_jp"];
                $dish["description"]= $item[0]["dish_description_jp"];

            }
            echo json_encode($destination);


        }
    }

?>