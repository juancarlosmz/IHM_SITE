
<!DOCTYPE html>
<html>
<head>
    <script src="../artyom.js/build/artyom.window.js"></script>
    <script src="js/jquery-3.4.1.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .tactilproducts{
            background-color: green;
            width: 100%;
            height:100%;
        }
        .tactillogin{
            background-color: yellow;
            width: 100%;
            height:100%;
        }
        .tactilregistro{
            background-color: red;
            width: 100%;
            height:100%;
        }
        .tactilseguir{
            background-color: blue;
            width: 100%;
            height:100%;
        }
        .row{
            margin-bottom: 30px;
            margin-top: 30px;
        }
        .row .cajas{
            height:100px;
            text-align: center;
        }
    </style>
  <title></title>
</head>
<body>


<div class="container">

  <div class="row">
    <div class="col-sm cajas">
        <div class="tactilproducts">
            <span>Productos</span>
        </div>
    </div>
    <div class="col-sm cajas">
        <div class="tactillogin">
            <span>Login</span>
        </div>
    </div>
  </div>

  <div class="row">
    <div class="col-sm cajas">
        <div class="tactilregistro">
            <span>Registro</span>
        </div>
    </div>
    <div class="col-sm cajas">
        <div class="tactilseguir">
            <span>Seguir</span>
        </div>
    </div>
  </div>
  
</div>


    <div>
        <input type="button" onclick="startArtyom()" value="Start"/><br>
        <input type="button" onclick="stopArtyom()" value="Stop"/><br>
        <span id="output"></span>
    </div>

    


<script>

window.artyom = new Artyom();

    $( "div.tactilproducts" ).mousedown(function() {
        products();
    }).mouseup(function() {
        productstop();
    });

    $( "div.tactilproducts" ).dblclick(function() {
        $(location).attr('href', 'pagina/products.php')
    });

    $( "div.tactillogin" ).mousedown(function() {
        login();
    }).mouseup(function() {
        loginstop();
    });

    $( "div.tactillogin" ).dblclick(function() {
        alert( "doble click login" );
    });

        
        //code
/*
        artyom.addCommands([
            {
                description:"Artyom can talk, lets say something if we say hello",
                indexes:["hola","amigo"],
                action:function(i){
                    if(i == 0){
                        artyom.say("Como estas");
                    }else if(i == 1){
                        artyom.say("Amigo mio");
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
*/

        function products(){
            artyom.initialize({
                lang:"es-ES",
                continous:false,
                debug:true,
                listen:true
            });
            artyom.say("Esta es la página productos, para ingresar preciona 2 veces");
            function stopArtyom(){
                artyom.fatality();
            }
        }
        function productstop(){
            function stopArtyom(){
                artyom.fatality();
            }
        }

        function login(){
            artyom.initialize({
                lang:"es-ES",
                continous:false,
                debug:true,
                listen:true
            });
            artyom.say("Esta es la página de inicio de sesión, para ingresar preciona 2 veces");
            function stopArtyom(){
                artyom.fatality();
            }
        }
        function loginstop(){
            function stopArtyom(){
                artyom.fatality();
            }
        }


       

    </script>
</body>
</html>


