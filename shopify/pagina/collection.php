
<?php
include ("../private/apishopify.php");


$default_col = "87030497326";
$shopify     = new shopify();
$result      = $shopify->getViewCollection($default_col);

if (!isset($result['products'])) {
   echo 'Error happened when pulling data from Shopify API.';
   exit;
}

foreach ($result['products'] as $prod) {
    $titulos = $prod["title"];
    $codigo = $prod["id"];
    $descripcion = $prod["body_html"];
    $imagen = $prod['image']['src'];
    $psocionimg = $prod['image']["position"];
    echo "Codigo: ".$codigo."<br>Producto: ".$titulos."<br>Descripcion: ".$descripcion."<br>La imagen: <img src='".$imagen."'/><br>Posicion :".$psocionimg;


}

?>