window.artyom = new Artyom(); 
//products 
  function mouseDownP() {
    products();
  }
  function mouseUpP() {
    productstop();
  }
  function dblclickP(){
     
    window.location.href = "#/Products";
    
  }
  //login
  function mouseDownL() {
    login();
  }
  function mouseUpP() {
    loginstop();
  }
  function dblclickL(){
    window.location.href = "#/login";
  }
  //registro
  function mouseDownR() {
    registro();
  }
  function mouseUpR() {
    registrostop();
  }
  function dblclickR(){
    window.location.href = "#/listado";
  }
  //usando la libreria 
  //producto
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
  //login
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
  //registro
  function registro(){
    artyom.initialize({
      lang:"es-ES",
      continous:false,
      debug:true,
      listen:true
    });
    artyom.say("Esta es la página de inicio de registro, para ingresar preciona 2 veces");
    function stopArtyom(){
      artyom.fatality();
    }
  }
  function registrostop(){
    function stopArtyom(){
      artyom.fatality();
    }
  }