<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
</head>
<body>

    

    <form action="" method="post">

        <label> User: </label>
        <input name="username" type="text"> <br>

        <?php
        $productos = file("productos.txt");
        foreach ($productos as $producto){
            $producto = trim($producto);
            echo "\t\t"."<label>".trim($producto)."</label>"."\n";
            echo "\t\t"."<input name='products[]' type='checkbox' value='".$producto."' >"."<br>\n";
        }
        ?>
        <input name="enviar" type="submit">

    </form>

    <?php

        if(isset($_POST['enviar'])){
            if(is_array($_POST['products'])){
                $selected = "";
                $num_products = count($_POST['products']);
                $current = 0;
                foreach ($_POST['products'] as $key => $value){
                    $value = trim($value);
                    if ($current != $num_products-1){
                        $selected.=$value.',';
                    }
                    $current++;
                }
            }
            $nameUser = $_POST['username'];
            $comanda = $nameUser.','.$selected;
            $file = fopen("comanda.txt","a");
            fwrite($file, substr($comanda, 0, -1));
            fwrite($file,"\n");
            fclose($file);
        }

        

    ?>

   
    
</body>
</html>