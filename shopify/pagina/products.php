
<?php
include ("../private/apiallproducts.php");
$shopify     = new shopify();
$result      = $shopify->getViewProducts();
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
    $precio = array($prod['variants']);
    //print_r($precio);

    $productsphp = array(
        "id"=>$codigo, 
        "title"=>$titulos, 
        "body_html"=>$descripcion);
    print_r(json_encode($productsphp).",");
}
?>

<!DOCTYPE html>
<html>
<head>

    <script src="../../artyom.js/build/artyom.window.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title></title>
</head>
<body>

<div class="container">
  <div class="row">
    <div class="col-sm-6">

    <?php foreach ($result['products'] as $prod) { ?>
  
            <div class="card cardaudio" style="width: 18rem;">
                <img class="card-img-top" src="<?php echo $imagen ?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $titulos ?></h5>
                    <p class="card-text cardtextaudio"><?php echo $descripcion ?></p>
                    
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                    <a href="#" class="card-link">Another link</a>
                </div>
            </div>

    <?php } ?>

    </div>
  </div>
</div>

</body>
</html>

<script>
    var texttitulo = "<?php foreach ($result['products'] as $prod) { echo $titulos;  } ?>";   
    window.artyom = new Artyom();
    
    

    $( "div.cardaudio" ).mousedown(function() {
        infoproduct();
    }).mouseup(function() {
        infoproductstop();
    });

    function infoproduct(){
        artyom.initialize({
            lang:"es-ES",
            continous:false,
            debug:true,
            listen:true
        });
        artyom.say(texttitulo);
        function stopArtyom(){
            artyom.fatality();
        }
    }
    function infoproductstop(){
        function stopArtyom(){
            artyom.fatality();
        }
    }
    
    </script>