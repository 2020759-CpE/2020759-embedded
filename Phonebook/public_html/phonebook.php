<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}
?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Castillo-Phonebook</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="css/style.css">
      <!-- responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- awesome fontfamily -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   </head>
   <!-- body -->
   <body class="main-layout inner_page">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="" /></div>
      </div>
      <!-- end loader -->
      <!-- header -->
      <header>
         <div class="header">
            <div class="container-fluid">
               <div class="row d_flex">
                  <div class=" col-md-2 col-sm-3 col logo_section">
                     <div class="full">
                        <div class="center-desk">
                           <div class="logo">
                              <a href="index.html"><img src="images/logo.png" alt="#" /></a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-8 col-sm-9">
                     <nav class="navigation navbar navbar-expand-md navbar-dark ">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarsExample04">
                           <ul class="navbar-nav mr-auto">
                              <li class="nav-item">
                                 <a class="nav-link" href="home.php">Home</a>
                              </li>
                              <li class="nav-item active">
                                 <a class="nav-link" href="phonebook.php">Phonebook </a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="logout.php">Logout</a>
                              </li>
                           </ul>
                        </div>
                     </nav>
                  </div>
                  <div class="col-md-2 d_none">
                     <ul class="email text_align_right">
                        <li> <a href="Javascript:void(0)">  </a></li>
                        <li> <a href="Javascript:void(0)"> <i class="fa fa-search" style="cursor: pointer;" aria-hidden="true"> </i></a> </li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </header>
      <!-- end header -->
      <!-- portfolio -->
      <div class="portfolio">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage text_align_left">
                     <h2>Phonebook  </h2>
                  </div>
               </div>
            </div>
<style>
    /* Custom CSS */
    .contact-table {
      border: 1px solid #ddd;
      border-radius: 0.25rem;
      padding: 10px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .contact-table thead th {
      border-right: 1px solid #ddd;
      background-color: blanchedalmond;;
      color: #fff;
      padding: 10px;
    }

    .contact-table tbody td {
      border-right: 1px solid #ddd;
      padding: 10px;
    }

    .contact-table tbody tr {
      border-bottom: 1px solid #ddd;
    }

    .contact-table thead th:last-child,
    .contact-table tbody td:last-child {
      border-right: none;
    }

    .form-control {
    margin: 2%;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <form id="contactForm">
          <input type="hidden" id="contactId">
          <div class="form-group" style = "width: 300px;">
            <label for="firstName">First Name:</label>
            <input type="text" class="form-control" id="firstName" placeholder="Enter first name">
          </div>
          <div class="form-group" style = "width: 300px;>
            <label for="lastName">Last Name:</label>
            <input type="text" class="form-control" id="lastName" placeholder="Enter last name">
          </div>
          <div class="form-group" style = "width: 300px;>
            <label for="middleName">Middle Name:</label>
            <input type="text" class="form-control" id="middleName" placeholder="Enter middle name">
          </div>
          <div class="form-group" style = "width: 300px;>
            <label for="address">Address:</label>
            <input type="text" class="form-control" id="address" placeholder="Enter address">
          </div>
          <div class="form-group" style = "width: 300px;>
            <label for="phoneNumber">Phone Number:</label>
            <input type="text" class="form-control" id="phoneNumber" placeholder="Enter phone number">
          </div>
          <div class="form-group" style = "width: 300px;>
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" placeholder="Enter email">
          </div>
          <div class="form-group" style = "width: 300px;>
            <label for="notes">Notes:</label>
            <textarea class="form-control" id="notes" placeholder="Enter notes"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Save</button>
        </form>
      </div>
      <div class="col-md-6">
        <h2 class="text-center">Contact List</h2>
        <input type="text" class="form-control" id="searchInput" placeholder="Search">
        <ul id="contactList" class="list-group" style="display: -ms-flexbox;
        
        display: flex;
        -ms-flex-direction: column;
        flex-direction: row-reverse;
        padding-left: 0;
        margin-bottom: 0;
        border-radius: 0.25rem;
        flex-wrap: nowrap;
        justify-content: center; margin-right: 69px;"></ul>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script src="script.js"></script>

  
</body>
</html>





      <!-- end footer -->
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/custom.js"></script>
   </body>
</html>