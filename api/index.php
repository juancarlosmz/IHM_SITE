<?php

// Cargamos Vendor
require __DIR__ . '/vendor/autoload.php';

$pdo = new PDO('mysql:host=localhost;dbname=IHM_DB;charset=utf8', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

$fluent = new FluentPDO($pdo);

$action = isset($_GET['a']) ? $_GET['a'] : null;

switch($action) {

    case 'listar':
        header('Content-Type: application/json');
        print_r(json_encode(listar($fluent)));
        break;
    case 'obtener':
        header('Content-Type: application/json');
        print_r(json_encode(obtener($fluent, $_GET['id'])));
        break;
    case 'registrar':
        header('Content-Type: application/json');
        $data = json_decode(utf8_encode(file_get_contents("php://input")), true);
        print_r(json_encode(registrar($fluent, $data)));
        break;
    case 'eliminar':
        header('Content-Type: application/json');
        print_r(json_encode(eliminar($fluent, $_GET['id'])));
        break;
    case 'startlogin':
        header('Content-Type: application/json');
        $data = json_decode(utf8_encode(file_get_contents("php://input")), true);
        $email = $data->email; 
        $contra = $data->contra;
        print_r(json_encode(startlogin($fluent,$email,$contra)));
        break;
}


function listar($fluent)
{
    return $fluent
         ->from('user')
         ->select('user.nombre, user.apellido, user.email, user.sexo, user.fnacimiento')
         ->orderBy("id DESC")
         ->fetchAll();
}

function obtener($fluent, $id)
{
    return $fluent->from('user', $id)
                  ->select('user.*, user.Nombre as User')
                  ->fetch();
}

function eliminar($fluent, $id)
{
    $fluent->deleteFrom('user', $id)
             ->execute();
    
    return true;
}

function registrar($fluent, $data)
{
    /*$data['FechaRegistro'] = date('Y-m-d');*/
    $fluent->insertInto('user', $data)
           ->execute();
    
    return true;
}

function startlogin($fluent,$email,$contra)
{
    $fluent->from('user')
           ->select('user.*') 
           ->where('email LIKE ? and contra LIKE ?','%'.$email.'%','%'.$contra.'%')
           ->fetch();
    return true;
    
    /*
    $fluent-> prepare ( "SELECT email,contra from user WHERE email=".$_GET['email']." && contra=".$_GET['contra'])
           ->execute();
    return true;
*/
      
    
}