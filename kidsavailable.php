
<?php  
	session_start();
	if (!isset($_SESSION['fosterparent_id'])) {

		# redirect the unauthenticated user to login/index
		 header("Location: signin.php");
	}
?>

<?php

// session_start();
// var_dump($_SESSION);

// include_once("frontheader.php");

// if ($_SERVER['REQUEST_METHOD'] == 'POST') {

//     //validate inputs

//     if (empty($_POST['fkfirstname'])) {
//      $errors['fkfirstname'] = "Firstname field is required";
//          }

//     if (empty($_POST['fklastname'])) {
//     $errors['fklastname'] = "lastname field is required";
//          }

//     if (empty($_POST['fkdateofbirth'])) {
//     $errors['fkdateofbirth'] = "date of birth field is required";
//                     }

//      if (empty($_POST['fkgender'])) {
//     $errors['fkgender'] = "Gender field is required";
//                     }

//     if (empty($_POST['fkemail'])) {
//     $errors['fkemail'] = "Email field is required";
//                     }
      
//     // if (empty($_POST['username'])) {
//     // $errors['username'] = "Username field is required";
//     //                 }                 

//     // if (empty($_POST['password'])) {
//     // $errors['password'] = "Password field is required";
//     //  }else if(strlen($_POST['password']) <6){

//     // $errors['password'] = "Password must be more than 5 characters";

//     //                 }
//     //   if (empty($_POST['gender'])) {
//     // $errors['gender'] = "Gender field is required";  //for picture field
//     //                 }   
    
//     // if (empty($_POST['fkhomeaddress'])) {
//     // $errors['homeaddress'] = "Home address field is required";
//     //         }
    
//     if (empty($_POST['fkmedicalchallenges'])) {
//     $errors['fkmedicalchallenges'] = "Message field is required";
//             }        


//      if (empty($errors)) {

//         # sanitize input

//         include_once("shared/common.php");

//          //creating object of common
//           $cmobj = new Common();

//          #make use of sanitize input method
//          $fkfirstname = $cmobj->sanitizeInputs($_POST['fkfirstname']);
//          $fklastname = $cmobj->sanitizeInputs($_POST['fklastname']);
//          $fkdateofbirth = $cmobj->sanitizeInputs($_POST['fkdateofbirth']);
//          $fkgender = $cmobj->sanitizeInputs($_POST['fkgender']);
//          $fkhobbies = $cmobj->sanitizeInputs($_POST['fkhobbies']);

//         // $picture = $cmobj->sanitizeInputs($_POST['picture']); //picture field
        
//         // $medicalchallenges = $cmobj->sanitizeInputs($_POST['fkmedicalchallenges']);

//         //include file 
//     include_once('shared/user.php');

//     //create object of class
//     $obj = new User();

    
//     // $fosterparent = $_SESSION['fosterparent_id'];
//     include_once("bpnav.php");
//     $parent = $_SESSION['parent_id'];

//     // var_dump($_SESSION['parent_id']);

//     $output = $obj->perfosterkid( $_POST['fkfirstname'], $_POST['fklastname'], $_POST['fkdateofbirth'], $_POST['fkgender'], $_POST['fkhobbies'], $parent);

//     if($output > 0){
//     $output1 = $obj->medfosterkid($output, $_POST['fkbloodgroup'], $_POST['fkallergies'], $_POST['fkdnareport'], $_POST['fkmedicalchallenges']);
//     }

//     // echo "<pre>";
//     // print_r($output);
//     // echo "</pre>";

//     if ($output == true && $output1 == true) {

//         $msg = "<div class='alert alert-success'>Registration Successful</div>";

//         //redirect to dashboard page
//         header("Location: trial.php");
//         exit();
//         }else{

//             $msg = "<div class='alert alert-danger'>Oops! something happened. Try again later</div>";
//         //  $errors[] = "Oops! sonthing happened. Try again later.";
//          }


//         // if ($output1 == true) {

//         // //redirect to success page
//         // // header("Location: signin.php");
//         // }else{

//         //  $errors[] = "Oops! something happened. Try again later.";
//         //  } 


    

//      }         

    
// }

?>



<link rel="stylesheet" type="text/css" href="css/bootstrap.css">

<link rel="stylesheet" type="text/css" href="style.css">

<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Caveat&family=EB+Garamond:ital@1&family=Economica&family=Roboto+Flex:opsz,wght@8..144,300&family=Roboto:wght@300&display=swap"
        rel="stylesheet">

    <style>
        .displaykidsheader{

            margin-left:200px;
        }

        .displaykidstext{

            font-family: 'Bebas Neue', cursive;
            word-spacing: 5px;
        }

        .shift{

            margin-left:150px;
        }

        .backtodashboard{

            margin-left:170px;
        }
    </style>

<?php
        
        include_once("trialheader.php");
        
        ?>




      <section class="mt-4"> 

      <div class="container">

            <!-- importing navigation -->
        <?php include_once("kidregnav.php"); ?>

        <div class="col-md-6 mb-3 backtodashboard">
            <a href="trial2.php" class="btn btn-outline-primary htext">Back to dashboard</a>
        </div>


      <div class="row justify-content-center">

      <div class="col-md-8">

      <div class="card">

            <div class="card-title">
                <h3 class="htext mt-3 displaykidsheader text-decoration-underline">Foster kids available for adoption</h3>
                
            </div>

    </div>
        <!-- col ends here -->
    </div>

    <!-- row ends here -->

    </div>


    <div class="row mt-3">

    <div class="col shift">

        <?php
        
        //include file 
       include_once('shared/user.php');

       //create object of class
          $obj = new User();

          //make reference to get foster kids method
        $fosterkid = $obj->getfosterkids();

    // echo "<pre>";
    // print_r($fosterkid);
    // echo "</pre>";

        

        if (count($fosterkid) > 0) {
            
            # loop thru the array using foreach
            foreach ($fosterkid as $key => $value) {
                # code...
            
        
        ?>

        <div style="width:250px; float:left; margin:15px;" class="displaykidstext">

         <div class="card">

        <div class="card-body">

        <p><?php echo $value['fosterkid_firstname']; ?>  <?php echo $value['fosterkid_lastname']; ?></p> 

        <img src="fosterphotos/pictures<?php echo $value['picture']; ?>" alt="photo" class="img-fluid shadow" style="height:150px;">

        <p class="mt-2 mb-0">Gender: <?php echo $value['gender']; ?> </p> 

         <p class=" mb-0">Age: 
            
         <?php

         $bday = new DateTime($value['dateof_birth']); // Your date of birth
            $today = new Datetime(date('m.d.y'));
            $diff = $today->diff($bday);

            printf('%d years, %d months, %d days', $diff->y, $diff->m, $diff->d);
            printf("\n");
         
        
         
         
         ?> </p> 

         <p class="mb-0">Hobbies: 
            
         <?php echo $value['hobbies']; ?> 

         <form method="post" action="insertrequests.php">


                <input type="hidden" name="fosterkid_id" value="<?php echo $value['fosterkid_id']; ?>">

                <input type="hidden" name="firstname" value="<?php echo $value['fosterkid_firstname']; ?>">

                <input type="hidden" name="lastname" value="<?php echo $value['fosterkid_lastname']; ?>">

                <input type="hidden" name="gender" value="<?php echo $value['gender']; ?>">

                <input type="hidden" name="medicalchallenge" value="<?php echo $value['medical_challenge']; ?>">

                <input type="hidden" name="mypicture" value="<?php echo $value['picture']; ?>">

                <input type="submit" name="btnrequest" value="Make a request" class="btn btn-outline-primary mt-2">

                </form>
        
        
        </p> 

        <hr>

            <!-- card-body ends here -->
            </div>
            
                <!-- card ends here -->
            </div>
                

            </div>

           


        <?php 
        }

    }
        ?>

      

      <!-- col ends here -->
      </div>

      <!-- row ends here -->
      </div>



      <!-- container ends here -->
      </div>
      </section>

      <!-- jquery script file -->
<script type="text/javascript" src="jquery.min.js"></script>

<!-- external script  goes here -->
<script type="text/javascript" src="app.js"></script>
    <!-- Bootstrap java script goes here-->

    <script type="text/javascript" src="js/bootstrap.bundle.js"></script>


    <footer class="bg-dark text-white p-3 mt-3 shadow">

<p class="">All rights reserved</p>
</footer> 