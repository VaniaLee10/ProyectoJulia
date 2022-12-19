<?php
  session_start();

  //1. Establecer la conexion a la base de datos
  if($_SESSION['login']=='0'){
      header('Location: logout.php');
  }

  $Conexion=mysqli_connect('localhost','root','','mydb');

  //1.1 Verificar que se pudo conectar a la base de datos
  if(!$Conexion){
      die("Error al conectarse a la base de datos: ".mysqli_connect_error());
  }

  //2. Definimos la consulta a la base de datos
  $ConsultaAlumno = "SELECT `alumno`.*, `materias_has_alumno`.*, `materias`.* FROM `alumno` 
    LEFT JOIN `materias_has_alumno` ON `materias_has_alumno`.`Alumno_idAlumno` = `alumno`.`idAlumno` 
    LEFT JOIN `materias` ON `materias_has_alumno`.`Materia_idMateria` = `materias`.`idMaterias`
    WHERE `alumno`.`idAlumno` = '".$_SESSION['id_usuario']."' ;";
  
  //3. Ejecutamos la consulta
  $ResultadoAlumno = mysqli_query($Conexion, $ConsultaAlumno);
  //print_r($ResultadoAlumno);
    
  //echo "Parametros por POST: ";
  //print_r($_POST);
  //print_r($_SESSION);
  //print_r($_GET);
    
?>

<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Dashboard - Analytics | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="assets/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="assets/js/config.js"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="index.html" class="app-brand-link">
              <span class="app-brand-logo demo">
                <svg
                  width="25"
                  viewBox="0 0 25 42"
                  version="1.1"
                  xmlns="http://www.w3.org/2000/svg"
                  xmlns:xlink="http://www.w3.org/1999/xlink"
                >
                  <defs>
                    <path
                      d="M13.7918663,0.358365126 L3.39788168,7.44174259 C0.566865006,9.69408886 -0.379795268,12.4788597 0.557900856,15.7960551 C0.68998853,16.2305145 1.09562888,17.7872135 3.12357076,19.2293357 C3.8146334,19.7207684 5.32369333,20.3834223 7.65075054,21.2172976 L7.59773219,21.2525164 L2.63468769,24.5493413 C0.445452254,26.3002124 0.0884951797,28.5083815 1.56381646,31.1738486 C2.83770406,32.8170431 5.20850219,33.2640127 7.09180128,32.5391577 C8.347334,32.0559211 11.4559176,30.0011079 16.4175519,26.3747182 C18.0338572,24.4997857 18.6973423,22.4544883 18.4080071,20.2388261 C17.963753,17.5346866 16.1776345,15.5799961 13.0496516,14.3747546 L10.9194936,13.4715819 L18.6192054,7.984237 L13.7918663,0.358365126 Z"
                      id="path-1"
                    ></path>
                    <path
                      d="M5.47320593,6.00457225 C4.05321814,8.216144 4.36334763,10.0722806 6.40359441,11.5729822 C8.61520715,12.571656 10.0999176,13.2171421 10.8577257,13.5094407 L15.5088241,14.433041 L18.6192054,7.984237 C15.5364148,3.11535317 13.9273018,0.573395879 13.7918663,0.358365126 C13.5790555,0.511491653 10.8061687,2.3935607 5.47320593,6.00457225 Z"
                      id="path-3"
                    ></path>
                    <path
                      d="M7.50063644,21.2294429 L12.3234468,23.3159332 C14.1688022,24.7579751 14.397098,26.4880487 13.008334,28.506154 C11.6195701,30.5242593 10.3099883,31.790241 9.07958868,32.3040991 C5.78142938,33.4346997 4.13234973,34 4.13234973,34 C4.13234973,34 2.75489982,33.0538207 2.37032616e-14,31.1614621 C-0.55822714,27.8186216 -0.55822714,26.0572515 -4.05231404e-15,25.8773518 C0.83734071,25.6075023 2.77988457,22.8248993 3.3049379,22.52991 C3.65497346,22.3332504 5.05353963,21.8997614 7.50063644,21.2294429 Z"
                      id="path-4"
                    ></path>
                    <path
                      d="M20.6,7.13333333 L25.6,13.8 C26.2627417,14.6836556 26.0836556,15.9372583 25.2,16.6 C24.8538077,16.8596443 24.4327404,17 24,17 L14,17 C12.8954305,17 12,16.1045695 12,15 C12,14.5672596 12.1403557,14.1461923 12.4,13.8 L17.4,7.13333333 C18.0627417,6.24967773 19.3163444,6.07059163 20.2,6.73333333 C20.3516113,6.84704183 20.4862915,6.981722 20.6,7.13333333 Z"
                      id="path-5"
                    ></path>
                  </defs>
                  <g id="g-app-brand" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g id="Brand-Logo" transform="translate(-27.000000, -15.000000)">
                      <g id="Icon" transform="translate(27.000000, 15.000000)">
                        <g id="Mask" transform="translate(0.000000, 8.000000)">
                          <mask id="mask-2" fill="white">
                            <use xlink:href="#path-1"></use>
                          </mask>
                          <use fill="#696cff" xlink:href="#path-1"></use>
                          <g id="Path-3" mask="url(#mask-2)">
                            <use fill="#696cff" xlink:href="#path-3"></use>
                            <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-3"></use>
                          </g>
                          <g id="Path-4" mask="url(#mask-2)">
                            <use fill="#696cff" xlink:href="#path-4"></use>
                            <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-4"></use>
                          </g>
                        </g>
                        <g
                          id="Triangle"
                          transform="translate(19.000000, 11.000000) rotate(-300.000000) translate(-19.000000, -11.000000) "
                        >
                          <use fill="#696cff" xlink:href="#path-5"></use>
                          <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-5"></use>
                        </g>
                      </g>
                    </g>
                  </g>
                </svg>
              </span>
              <span class="app-brand-text demo menu-text fw-bolder ms-2">Alumno</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item">
                <a href="planeaciones.html" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-collection"></i>
                  <div data-i18n="Basic">Alumno</div>
                </a>
              </li>
             

            <!-- Layouts -->
           

            
            
            
            <!-- Components -->
            
            <!-- Cards -->
           
            <!-- User interface -->
           
               
                

            <!-- Extended components -->
           
          

            <!-- Forms & Tables -->
         
            <!-- Forms -->
           
             
            <!-- Misc -->
       
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <!-- Search -->
              <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                  <i class="bx bx-search fs-4 lh-0"></i>
                  <input
                    type="text"
                    class="form-control border-0 shadow-none"
                    placeholder="Search..."
                    aria-label="Search..."
                  />
                </div>
              </div>
              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render. -->
               

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block">Grupos
                            </span>
                            <small class="text-muted">Alumno</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">Mi perfil</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <i class="bx bx-cog me-2"></i>
                        <span class="align-middle">Configuración</span>
                      </a>
                    </li>
                  
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="login_alumnos.php">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Salir</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                <!-- Materia 1-->
                <div class="card mb-4">
                   
                    <div class="card-body">
                      <div class="row">
                        <!-- Custom content with heading -->
                        
                        <div class="nav-align-top mb-4">
                          <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                              <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-planeaciones" aria-controls="navs-top-planeaciones" aria-selected="true">
                                Planeaciones
                              </button>
                            </li>
                            <li class="nav-item">
                              <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-recursos" aria-controls="navs-top-recursos" aria-selected="false">
                                Recursos
                              </button>
                            </li>
                            <li class="nav-item">
                              <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-evaluaciones" aria-controls="navs-top-evaluaciones" aria-selected="false">
                                Evaluaciones
                              </button>
                            </li>
                          </ul>
                          <div class="tab-content">
                            <div class="tab-pane fade show active" id="navs-top-planeaciones" role="tabpanel">
                              <!--Planeaciones-->
                                <?php
                                    if($RegistroAlumno = mysqli_fetch_assoc($ResultadoAlumno)){
                                        echo '<div class="mb-3 row">';
                                        echo '<label for="html5-date-input" class="col-md-2 col-form-label">Nombre: </label>';
                                        echo '<div class="col-md-3">';
                                            echo '<input type="text" style="width : 500px" class="form-control" id="materiaId" placeholder="'.$RegistroAlumno['nombre_alumno'].'" aria-describedby="materiaId" disabled>';
                                        echo '</div>';
                                        echo '</div>';
                                        echo '<div class="mb-3 row">';
                                        echo '<label for="materiaId" class="col-md-2 col-form-label">Grupo : </label> ';
                                        echo '<div class="col-md-3">';
                                          echo '<input type="text" style="width : 500px" class="form-control" id="materiaId" placeholder="'.$RegistroAlumno['grupo_alumno'].'" aria-describedby="materiaId" disabled>';
                                        echo '</div>';
                                      echo '</div>';
                                    }
                                ?>
                              <div class="mb-3 row">
                                <label for="html5-date-input" class="col-md-2 col-form-label">Fecha de inicio:</label>
                                <div class="col-md-3">
                                  <input class="form-control" type="date" value="2021-06-18" id="html5-date-input">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="html5-date-input" class="col-md-2 col-form-label">Fecha final:</label>
                                <div class="col-md-3">
                                  <input class="form-control" type="date" value="2021-06-18" id="html5-date-input">
                                </div>
                                <br>
                                <br>
                                <div class="table-responsive text-nowrap">
                                  <table class="table">
                                    <thead>
                                      <tr>
                                        <th>Fecha</th>
                                        <th>Materia</th>
                                        <th>Actividades</th>
                                        <th>Recursos</th>
                                       
                                      </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                      <tr>
                                        <td>08/11/2022 </td>
                                        <td>Matematicas</td>
                                        <td>Cuadernillo</td>
                                        <td>Material por defecto</td>
  
  
                                      </tr>
                                      <tr>
                                        <td>09/11/2022</td>
                                        <td>Español</td>
                                        <td>Cuadernilo</td>
                                        <td>Material por defecto</td>
                                      
                                      </tr>
                                      <tr>
                                        <td>10/11/2022 </td>
                                        <td>Quimica</td>
                                        <td>Formulario</td>
                                        <td>Material por defecto</td>
                                        
                                      </tr>
                                     
                                    </tbody>
                                  </table>
                                </div>
                                

                             
                             
                              </div>
                              <div class="tab-pane fade show active" id="horizontal-Planeaciones">
                                <a href="administrador/pdf/pdfplaneacionesalumnos.php" class="btn btn-outline-primary">Descargar</a>
                             </div>
                              <!--Planeaciones-->
                            </div>
                            <div class="tab-pane fade" id="navs-top-recursos" role="tabpanel">
                              <!--Recursos-->
                              <?php
                                    if($RegistroAlumno){
                                        echo '<div class="mb-3 row">';
                                        echo '<label for="html5-date-input" class="col-md-2 col-form-label">Nombre: </label>';
                                            echo '<div class="col-md-3">';
                                                echo '<input type="text" style="width : 500px" class="form-control" id="materiaId" placeholder="'.$RegistroAlumno['nombre_alumno'].'" aria-describedby="materiaId" disabled>';
                                            echo '</div>';
                                        echo '</div>';
                                        echo '<div class="mb-3 row">';
                                            echo '<label for="materiaId" class="col-md-2 col-form-label">Grupo : </label> ';
                                            echo '<div class="col-md-3">';
                                                echo '<input type="text" style="width : 500px" class="form-control" id="materiaId" placeholder="'.$RegistroAlumno['grupo_alumno'].'" aria-describedby="materiaId" disabled>';
                                            echo '</div>';
                                        echo '</div>';
                                    }
                                ?>
                              <div class="mb-3 row">
                                <label for="html5-date-input" class="col-md-2 col-form-label">Fecha de inicio:</label>
                                <div class="col-md-3">
                                  <input class="form-control" type="date" value="2021-06-18" id="html5-date-input">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="html5-date-input" class="col-md-2 col-form-label">Fecha final:</label>
                                <div class="col-md-3">
                                  <input class="form-control" type="date" value="2021-06-18" id="html5-date-input">
                                </div>
                                <br>
                                <br>
                                <table class="table">
                                  <thead>
                                    <tr>
                                      <th>Fecha</th>
                                      <th>Materia</th>
                                      <th>Material por defecto</th>
                                      <th>Material extra</th>
                                     
                                    </tr>
                                  </thead>
                                  <tbody class="table-border-bottom-0">
                                    <tr>
                                      <td>08/11/2022 </td>
                                      <td>Matematicas</td>
                                      <td>Goma, lapiz, plumon</td>
                                      <td>Material por defecto</td>


                                    </tr>
                                    <tr>
                                      <td>09/11/2022</td>
                                      <td>Español</td>
                                      <td>Goma, lapiz, plumon</td>
                                      <td>Material por defecto</td>
                                    
                                    </tr>
                                    <tr>
                                      <td>10/11/2022 </td>
                                      <td>Quimica</td>
                                      <td>Goma, lapiz, plumon</td>
                                      <td>Material por defecto</td>
                                      
                                    </tr>
                                   
                                  </tbody>
                                </table>
                                <div class="tab-pane fade show active" id="horizontal-Recursos">
                                  <a href="administrador/pdf/pdfrecursosalumnos.php" class="btn btn-outline-primary">Descargar</a>
                               </div>
                              </div>
                               <!--Recursos-->
                            </div>
                            <div class="tab-pane fade" id="navs-top-evaluaciones" role="tabpanel">
                              <!--Evaluaciones-->
                              
                              <div class="tab-pane fade active show" id="navs-top-messages" role="tabpanel">
                                <p>
                                    </p><h3 class="card-header">Evaluaciones</h3>
                                    <?php
                                    if($RegistroAlumno){
                                        echo '<div class="mb-3 row">';
                                        echo '<label for="html5-date-input" class="col-md-2 col-form-label">Nombre: </label>';
                                            echo '<div class="col-md-3">';
                                                echo '<input type="text" style="width : 500px" class="form-control" id="materiaId" placeholder="'.$RegistroAlumno['nombre_alumno'].'" aria-describedby="materiaId" disabled>';
                                            echo '</div>';
                                        echo '</div>';
                                        echo '<div class="mb-3 row">';
                                            echo '<label for="materiaId" class="col-md-2 col-form-label">Grupo : </label> ';
                                            echo '<div class="col-md-3">';
                                                echo '<input type="text" style="width : 500px" class="form-control" id="materiaId" placeholder="'.$RegistroAlumno['grupo_alumno'].'" aria-describedby="materiaId" disabled>';
                                            echo '</div>';
                                        echo '</div>';
                                    }
                                    ?>
                                    <div class="card-body">
                                      <div class="row">
                                        <!-- Custom content with heading -->
                                        <div class="col-lg-10  mb-4 mb-xl-0">
                                          <div class="mt-3">
                                            <div class="row">
                                              <div class="col-md-4 col-12 mb-3 mb-md-0">
                                                <div class="list-group">
                                                    <?php
                                                        if($RegistroAlumno){
                                                            $num_materias = mysqli_num_rows ($ResultadoAlumno);
                                                        }
                                                        //echo '<a class="list-group-item list-group-item-action" id="list-home-list" data-bs-toggle="list" href="#list-materia1">Hi</a>';
                                                        //print_r($RegistroAlumno);
                                                        for ($i=1; $i <= $num_materias; $i++) { 
                                                            echo '<a class="list-group-item list-group-item-action" id="list-home-list" data-bs-toggle="list" href="#list-materia'.$i.'">Materia '.$i.'</a>';
                                                        }
                                                    ?>
                                                  </div>
                                              </div>
      
                                
                    <div class="col-md-8 col-12">
                        <div class="tab-content p-0">
                            <?php

                            for ($i=1; $i <= $num_materias; $i++) {

                            $ConsultaMateria = "SELECT `alumno`.*, `materias_has_alumno`.*, `actividades_has_alumno`.* FROM `alumno` 
                            LEFT JOIN `materias_has_alumno` ON `materias_has_alumno`.`Alumno_idAlumno` = `alumno`.`idAlumno` 
                            LEFT JOIN `actividades_has_alumno` ON `actividades_has_alumno`.`Alumno_idAlumno` = `alumno`.`idAlumno`
                            WHERE alumno.idAlumno = '".$_SESSION['id_usuario']."' AND materias_has_alumno.Materia_idMateria = '".$i."'";

                            $ResultadoMateria = mysqli_query($Conexion, $ConsultaMateria);
                            //print_r($ResultadoMateria);

                            if($RegistroMateria = mysqli_fetch_assoc($ResultadoMateria)){
                                echo'<div class="tab-pane fade" id="list-materia'.$i.'">';
                                    echo'<div class="tab-pane fade show active" id="list-home">';

                                        echo'<div class="card">';
                                            echo'<h5 class="card-header">Evaluaciones de Actividades</h5>';
                                            echo'<div class="card-body">';
                                                echo'<div class="table-responsive text-nowrap">';
                                                    echo'<table class="table table-bordered">';
                                                        echo'<thead>';
                                                            echo'<tr>';
                                                                echo'<th>Actividades</th>';
                                                                echo'<th>Calificación</th>';
                                                            echo'</tr>';
                                                        echo'</thead>';
                                                        echo'<tbody>';
                                                            echo'<tr>';
                                                                echo'<td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Actividad 1</strong>';
                                                                echo'</td>';
                                                                echo'<td>10</td>';
                                                            echo'</tr>';
                                                            echo'<tr>';
                                                                echo'<td><i class="fab fa-react fa-lg text-info me-3"></i> <strong>Actividad 2</strong></td>';
                                                                echo'<td>8</td>';
                                                            echo'</tr>';
                                                            echo'<tr>';
                                                                echo'<td><i class="fab fa-vuejs fa-lg text-success me-3"></i> <strong>Actividad 3</strong></td>';
                                                                echo'<td>9</td>';
                                                            echo'</tr>';
                                                            echo'<tr>';
                                                                echo'<td><i class="fab fa-bootstrap fa-lg text-primary me-3"></i> <strong>Actividad 4</strong></td>';
                                                                echo'<td>8</td>';
                                                            echo'</tr>';
                                                        echo'</tbody>';
                                                    echo'</table>';
                                                echo'</div>';
                                            echo'</div>';
                                        echo'</div>';


                                        echo'<div class="card">';
                                            echo'<h5 class="card-header">Evaluaciones Parciales</h5>';
                                            echo'<div class="card-body">';
                                                echo'<div class="table-responsive text-nowrap">';
                                                    echo'<table class="table table-bordered">';
                                                        echo'<thead>';
                                                            echo'<tr>';
                                                                echo'<th>Parciales</th>';
                                                                echo'<th>Calificación</th>';
                                                            echo'</tr>';
                                                        echo'</thead>';
                                                        echo'<tbody>';
                                                            echo'<tr>';
                                                            echo '<tr>';
                                                                echo '<td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Parcial 1</strong></td>';
                                                                echo '<td>'.$RegistroMateria['calificacion_parcial1'].'</td>';
                                                            echo '</tr>';
                                                            echo '<tr>';
                                                                echo '<td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Parcial 2</strong></td>';
                                                                echo '<td>'.$RegistroMateria['calificacion_parcial2'].'</td>';
                                                            echo '</tr>';
                                                            echo '<tr>';
                                                                echo '<td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Parcial 3</strong></td>';
                                                                echo '<td>'.$RegistroMateria['calificacion_parcial3'].'</td>';
                                                            echo '</tr>';
                                                        echo'</tbody>';
                                                    echo'</table>';
                                                echo'</div>';
                                            echo'</div>';
                                        echo'</div>';

                                        echo'<div class="card">';
                                            echo'<h5 class="card-header">Evaluaciones Finales</h5>';
                                            echo'<div class="card-body">';
                                                echo'<div class="table-responsive text-nowrap">';
                                                    echo'<table class="table table-bordered">';
                                                        echo'<thead>';
                                                            echo'<tr>';
                                                                echo'<th>Calificación Final</th>';
                                                                echo'<th>Calificación</th>';
                                                            echo'</tr>';
                                                        echo'</thead>';
                                                        echo'<tbody>';
                                                            echo'<tr>';
                                                                echo'<td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Final</strong></td>';
                                                                echo '<td>'.$RegistroMateria['calificacion_final'].'</td>';
                                                            echo'</tr>';
                                                        echo'</tbody>';
                                                    echo'</table>';
                                                echo'</div>';
                                            echo'</div>';
                                        echo'</div>';

                                    echo'</div>';
                                echo'</div>';
                            }
                            }
                            ?>   

                    </div>
                                    
      
      
                                </div>
      
                              </div>
                            </div>
                          </div>
                          <!--/ Custom content with heading -->
                        </div>
                    </div>
                                <p></p>
                              </div>
                  
                              <!--Evaluaciones-->
                            </div>
                          </div>
                        </div>
                        </div>
                        <!--/ Custom content with heading -->
                      </div>
                    </div>
                  </div>
                </div>
                </div>
                <!-- Total Revenue -->
                
                <!--/ Total Revenue -->
                <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
                  <div class="row">
                    <div class="col-6 mb-4">
                    
                    </div>
                  
                    <!-- </div>
    <div class="row"> -->
                    <div class="col-12 mb-4">
                     
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <!-- Order Statistics -->
                <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
                  </div>
                </div>
                <!--/ Order Statistics -->

                <!-- Expense Overview -->
                
                <!--/ Expense Overview -->

                <!-- Transactions -->
               
                <!--/ Transactions -->
              </div>
            </div>
            <!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  
             
                 
                 
                </div>
                <div>
              

           

                
                </div>
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

     
    <!-- Extra Large Modal -->
    
    <div class="modal fade" id="edit" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel4">Modal title</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <div class="row">
              
              <div class="col mb-3">
                <label for="nameExLarge" class="form-label">Actividad</label>
                <input type="text" id="nameExLarge" class="form-control" placeholder="Enter Name" />
              </div>
              <div class="col mb-3">
                <label for="nameExLarge" class="form-label">Obejtivo</label>
                <input type="text" id="nameExLarge" class="form-control" placeholder="Enter Name" />
              </div>
              <div class="col mb-3">
                <label for="nameExLarge" class="form-label">Descripción</label>
                <input type="text" id="nameExLarge" class="form-control" placeholder="Enter Name" />
              </div>
              
              <div class="col mb-3">
                <label for="nameExLarge" class="form-label">Recursos</label>
                <input type="text" id="nameExLarge" class="form-control" placeholder="Enter Name" />
              </div>
              <div class="mb-3 row">
                <label for="html5-date-input" class="col-md-2 col-form-label">Fecha de entrega:</label>
                <div class="col-md-3">
                  <input class="form-control" type="date" value="2021-06-18" id="html5-date-input">
                </div>
              </div>
            </div>
          
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
              Salir
            </button>
            <button type="button" class="btn btn-primary">Subir</button>
          </div>
        </div>
      </div>
    </div>
    


   
    

    </body>
  </div>
  </div>
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="assets/vendor/libs/jquery/jquery.js"></script>
    <script src="assets/vendor/libs/popper/popper.js"></script>
    <script src="assets/vendor/js/bootstrap.js"></script>
    <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
