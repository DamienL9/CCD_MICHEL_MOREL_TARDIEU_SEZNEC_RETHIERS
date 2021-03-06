<?php

namespace GEG\vue;

use Slim\Slim;
const INTERFACE_CONNEXION = 1;

class VueCompte{

  public $arr;

    public function __construct($a)
    {
        $this->arr = $a;
    }


    public function afficherInterfaceConnexion(){
      $urlConnexion = Slim::getInstance()->urlFor('formCo');
      return "$urlConnexion";
    }

    public function render($selecteur){
          $app = Slim::getInstance();
          $content = "";
          $co = "Se connecter";
          switch ($selecteur) {
              case INTERFACE_CONNEXION:
              {
                  $content = $this->afficherInterfaceConnexion();
                  break;
              }
          }
          $urlRacine = $app->urlFor('racine');
          $urlCSS = $app->request->getRootURI() . '/www/css';
          $urlJS = $app->request->getRootURI() . '/www/js';
          $urlVendor = $app->request->getRootURI() . '/www/vendor';
          $html = <<<END
          <!DOCTYPE html>
          <html lang="en">

          <head>

            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta name="description" content="">
            <meta name="author" content="">

            <title>GEG 2 - Login</title>

            <!-- Custom fonts for this template-->
            <link href="$urlVendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
            <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

            <!-- Custom styles for this template-->
            <link href="$urlCSS/sb-admin-2.css" rel="stylesheet">

          </head>

          <body class="bg-gradient-primary">

            <div class="container">

              <!-- Outer Row -->
              <div class="row justify-content-center">

                <div class="col-xl-10 col-lg-12 col-md-9">

                  <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                      <!-- Nested Row within Card Body -->
                      <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6">
                          <div class="p-5">
                            <div class="text-center">
                              <h1 class="h4 text-gray-900 mb-4">Connexion</h1>
                            </div>
                            <form method="post" action="$content" enctype="multipart/form-data class="user">
                              <div class="form-group">
                                <input type="text" name="login" class="form-control form-control-user" id="exampleInputLogin" aria-describedby="login" placeholder="Entrez votre login">
                              </div>
                              <div class="form-group">
                                <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Mot de passe">
                              </div>


                              <button class="btn btn-primary btn-user btn-block" type="submit">Valider</button>
                            </form>
                            <hr>

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>

              </div>

            </div>

            <!-- Bootstrap core JavaScript-->
            <script src="vendorjs/jquery/jquery.min.js"></script>
            <script src="vendorjs/bootstrap/js/bootstrap.bundle.min.js"></script>

            <!-- Core plugin JavaScript-->
            <script src="vendorjs/jquery-easing/jquery.easing.min.js"></script>

            <!-- Custom scripts for all pages-->
            <script src="$urlJS/sb-admin-2.js"></script>

          </body>

          </html>
END;
          echo $html;
    }
}
