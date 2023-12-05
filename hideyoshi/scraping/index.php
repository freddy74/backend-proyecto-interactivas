<?php
    require_once '../../database.php';

    include('simple_html_dom.php');
    /*
    LIBANO
    https://www.allrecipes.com/recipes/1824/world-cuisine/middle-eastern/lebanese/

    ALEMANIA
    https://www.allrecipes.com/recipes/722/world-cuisine/european/german/

    INDIA
    https://www.allrecipes.com/recipes/17136/world-cuisine/asian/indian/main-dishes/
    https://www.allrecipes.com/recipes/15935/world-cuisine/asian/indian/drinks/

    MEXICO
    https://www.allrecipes.com/recipes/728/world-cuisine/latin-american/mexican/
    https://www.allrecipes.com/recipes/15936/world-cuisine/latin-american/mexican/drinks/

    JAPON
    https://www.allrecipes.com/recipes/699/world-cuisine/asian/japanese/

    CHINA
    https://www.allrecipes.com/recipes/695/world-cuisine/asian/chinese/

    COREA
    https://www.allrecipes.com/recipes/700/world-cuisine/asian/korean/

    ITALIA
    https://www.allrecipes.com/recipes/1789/world-cuisine/european/italian/authentic/
    https://www.allrecipes.com/recipes/17551/world-cuisine/european/italian/drinks/

    FRANCIA
    https://www.allrecipes.com/recipes/721/world-cuisine/european/french/

    ESPAÑA
    https://www.allrecipes.com/recipes/726/world-cuisine/european/spanish/

    NORDICA
    https://www.allrecipes.com/recipes/1892/world-cuisine/european/scandinavian/danish/

    GENERIC DRINKS
    https://www.allrecipes.com/recipes/77/drinks/

    */

    //link
    $link = "https://www.allrecipes.com/recipes/79/desserts/";

    $filenames = [];
    $menu_item_names = [];
    $menu_item_descriptions = [];
    $image_urls = [];

    $menu_items = 6;

    $items = file_get_html($link);

    //save meals info and filenames for the images
    foreach ($items->find('.card--no-image') as $item){

        //busca la clase del titulo y lo guarda en un array
        $title = $item->find('.card__title-text');

        //hace otro scraping con un file_get_html() usando el href del item
        //esto entra al href del link del card, para entrar al platillo donde está toda la info
        $details = file_get_html($item->href);

        //busca la clase de la descripcion y la guarda en un array
        $description = $details->find('.article-subheading');

        //busca la clase de las imagenes y las guarda en un array
        $image = $details->find('.primary-image__image');

        //image debe tener las imagenes suficientes para llenar el array con las imagenes que se necesitan
        //si el contenido de image es mayor a 0, entonces se le asigna el src de esas imagenes
        if(count($image) > 0){
            $image_urls[] = $image[0]->src;
        }else{
            $replace_img = $item->find('.universal-image__image');
            if(count($replace_img) > 0){
                //{'data-src'} se utiliza para acceder a la propiedad "data-src" de un objeto o array en PHP.
                $image_urls[] = $replace_img[0]->{'data-src'};
            }
        }

        //algo parecido a la imagen, solo que dandole formato con trim, strtolower, etc
        if(count($description) > 0){
            if($menu_items == 0) break;

            $menu_item_names[] = trim($title[0]->plaintext);
            $menu_item_descriptions[] = $description[0]->plaintext;

            $filename = strtolower(trim($title[0]->plaintext));
            $filename = str_replace(' ', '-', $filename);
            $filenames[] = $filename;

            $menu_items--;
        }
    }

    foreach($filenames as $index=>$item){
        echo "******************";
        echo "<br>";
        echo $item;
        echo "<br>";
        echo $menu_item_names[$index];
        echo "<br>";
        echo $menu_item_descriptions[$index];
        echo "<br>";
        echo $image_urls[$index];
        echo "<br>";
        echo rand (1*10, 70*10)/10;
        echo "<br>";
        //$menu_items--;
        //if($menu_items == 0) break;
    }

    //get and download images
     foreach ($filenames as $index=>$image){
        file_put_contents("../imgs/".$image.".jpg", file_get_contents($image_urls[$index]));
        
     }

    //Reference: https://medoo.in/api/insert
    // $database->select("tb_dishes",[
    //     "[>]tb_categories"=>["category_id" => "category_id"],
    //     "[>]tb_people_categories"=>["people_category_id" => "people_category_id"]
    // ],[
    //     "tb_dishes.dish_id",
    //     "tb_dishes.dish_name",
    //     "tb_dishes.dish_image",
    //     "tb_dishes.dish_featured",
    //     "tb_dishes.dish_description",
    //     "tb_dishes.dish_price",
    //     "tb_categories.category_name",
    //     "tb_categories.category_description",
    //     "tb_people_categories.people_category_name",
    //     "tb_people_categories.people_category_description",
    // ],[
    //     "dish_id"=>$_GET["id"]
    // ]);

    for($i=0; $i<6; $i++){
    $database->insert("tb_dishes",[
        "people_category_id"=> 1,
        "category_id"=> 3,
        "dish_name"=> $menu_item_names[$i],
        "dish_image"=> $filenames[$i].".jpg",
        "dish_featured"=> "n",
        "dish_description"=> $menu_item_descriptions[$i],
        "dish_price"=> rand (1*10, 40*10)/10
    ]);
}

?>