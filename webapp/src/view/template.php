<html data-bs-theme="light" lang="en">
    <head>
        <script src="/docs/5.3/assets/js/color-modes.js">

        </script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.118.2">
    <title>Manger</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


    

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

<link href="/docs/5.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


    <style>
      .custom-btn {
       margin-right: 10px; 
       font-size: 20px; 
       color: black; 
       border: 2px solid black; 
        }
        .custom-btn-group {
    margin-bottom: 1.5rem; 
    display: flex; 
    gap: 10px; 
   }
       .custom-btn:hover {
           border-color: lightgray; 
       }
       .custom-circles {
        display: flex;
        align-items: center;
        margin-right: 1rem;

       }
       .d-flex {
    display: flex;
}
   
   .align-items-center {
       align-items: center;
   }
   
   .mr-3 {
       margin-right: 35px; 
       margin-bottom: 1rem;
   
   }
   .red-circle {
       background-color: #ff0000;
   }
   
   .orange-circle {
       background-color: #ffa500;
   }
   
   .yellow-circle {
       background-color: #ffff00;
   }
   
   .green-circle {
       background-color: #00ff00;
   }
   
   .gray-circle {
       background-color: #808080;
   }
   
   
   .bd-placeholder-img {
           font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        width: 100%;
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }

      .btn-bd-primary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

        --bs-btn-font-weight: 600;
        --bs-btn-color: var(--bs-white);
        --bs-btn-bg: var(--bd-violet-bg);
        --bs-btn-border-color: var(--bd-violet-bg);
        --bs-btn-hover-color: var(--bs-white);
        --bs-btn-hover-bg: #6528e0;
        --bs-btn-hover-border-color: #6528e0;
        --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
        --bs-btn-active-color: var(--bs-btn-hover-color);
        --bs-btn-active-bg: #5a23c8;
        --bs-btn-active-border-color: #5a23c8;
      }

      .bd-mode-toggle {
        z-index: 1500;
      }

      .bd-mode-toggle .dropdown-menu .active .bi {
        display: block !important;
      }
      .circle {
      width: 150px;
      height: 150px;
      border-radius: 50%;
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: 24px;
    }
    .green-circle {
      background-color: #28a745;
      color: #fff;
    }
    .red-circle {
      background-color: #dc3545;
      color: #fff;
      <style>
    }
    .recipe-container {
        width: calc(33.33% - 20px); 
        margin: 10px;
        float: left;
        border: 1px solid #ccc;
        padding: 10px;
    }

.recipe-container h2 {
    margin-top: 0;
}

.recipe-image img {
    max-width: 50%;
    height: 50px;
}

.row {
    display: inline-block;
    flex-wrap: wrap;
    margin-right: -500px;
    margin-left: -500px;
}


      body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }
        .container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
        }
        h1 {
            color: #007bff;
        }
        p {
            margin-bottom: 20px;
        }
        .feature {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
        }
    </style>

    
    <!-- Custom styles for this template -->
    
    <link href="navbar-static.css" rel="stylesheet">
  </head>
  <body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
    <?php
if(!is_null( $userType))
  require VIEWDIR.DS.'navbar.php';


?>
</nav>


<main class="container">
<?php
if(!is_null( $ressource) && !is_null( $file)&&!is_null( $content) )
require VIEWDIR.DS.$ressource.DS.$file.'.php';


?>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>