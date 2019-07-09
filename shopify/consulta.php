
<?php
include ("apishopify.php");


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
<!DOCTYPE html>
<html>
<head>
    <script src="../artyom.js/build/artyom.window.js">

    </script>
  <title></title>
</head>
<body>
    <div>
        <input type="button" onclick="startArtyom()" value="Start"/><br>
        <input type="button" onclick="stopArtyom()" value="Stop"/><br>
        <span id="output"></span>
    </div>
    <div>
        <form id="artyom-speech-form">
            <div>
                <textarea type="text" id="artyom-speech-textarea">
                    Hola como estas hoy
                </textarea>
                <i>
                    <input type="submit" id="artyom-speech-button" value="Sintetizar">
                </i>
            </div>
        </form>
    </div>
    <script>
        window.artyom = new Artyom();
        //code
        artyom.addCommands([
            {
                description:"Artyom can talk, lets say something if we say hello",
                indexes:["hi","amigo"],
                action:function(i){
                    if(i == 0){
                        artyom.say("No te amo");
                    }
                }
            },
            {
                indexes:["ella me ama"],
                action:function(i){
                    if(i == 0){
                        console.log("definitivamente no </3");
                    }
                }
            },
            {
                indexes:["adiós"],
                action:function(){
                    alert("Now all is over.");
                }
            },






        ]);

        artyom.redirectRecognizedTextOutput(function(text,isFinal){
            var span= document.getElementById('output');
            if(isFinal){
                span.innerHTML = '';
            }else{
                span.innerHTML = text;
            }
        });
        //end

        function startArtyom(){
            artyom.initialize({
                lang:"es-ES",
                continous:false,
                debug:true,
                listen:true
            });
        }
        function stopArtyom(){
            artyom.fatality();
        }


       

    </script>
</body>
</html>


