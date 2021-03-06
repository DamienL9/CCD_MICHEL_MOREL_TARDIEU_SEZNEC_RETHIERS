<?php
session_start();

require_once('vendor/autoload.php');

use GEG\controleur\ControleurCompte;
use GEG\controleur\ControleurPlanning;
use \Slim\Slim;
use \Illuminate\Database\Capsule\Manager as EloquentManager;

$app = new Slim();

$db = new EloquentManager();
$db->addConnection(parse_ini_file("src/conf/conf.ini"));
$db->setAsGlobal();
$db->bootEloquent();
$app->get("/liste_creneau", function() {
    $controllerPlaning= new ControllerPlanning();
    $controllerPlaning->getListeCreneau();
});

$app->get("/liste_creneau/:idCreneau", function(){
    $creneauController= new CreneauController();
    $creneauController->getCreneau();
});

$app->post("/liste_creneau/:idCreneau/ajoutBesoin", function() use($app){
    $creneauController= new CreneauController();
    $creneauController->sinscrirCreneau();
});

$app->get('/',function () {
    $c = new ControleurCompte();
    $c->afficherInterfaceConnexion();
})->name('racine');

$app->post('/', function () {
    $c = new ControleurCompte();
    $c->seConnecter();
})->name('formCo');

$app->get('/planning', function () {
    $c = new ControleurPlanning();
    $c->afficherPlanning();
})->name('afficherPlanning');

$app->run();
