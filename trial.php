 





<link rel="stylesheet" type="text/css" href="css/bootstrap.css">

<link rel="stylesheet" type="text/css" href="style.css">

<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Caveat&family=EB+Garamond:ital@1&family=Economica&family=Roboto+Flex:opsz,wght@8..144,300&family=Roboto:wght@300&display=swap"
        rel="stylesheet">


        <!-- <section>

            <!-- <div class="container-fluid">

            <nav class="navbar navbar-dark bg-dark justify-content-end">

                <ul class="nav ">

                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Active</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                
                </ul>

  <!-- Navbar content -->
        <!-- </nav> -->


            <!-- container fluid ends here -->
            <!-- </div> --> 


        <!-- <nav class="navbar navbar-dark bg-dark shadow">

      <div class="container-fluid">
       <span class="navbar-brand mb-0 h1 text-white">ADOPTME</span>



        <ul class="nav ">

                <li>

                <button type="button" class="btn btn-light">
            Notifications <span class="badge bg-danger">4</span>
             </button>
             
                </li>

                <li class="nav-item ms-5">
                    <a class="nav-link btn btn-light" href="">Logout</a>
                </li>

                
                
                </ul>

       </div>


       
       </nav> -->

        <!-- </section> --> 

        <style>
            .trialfooter{
                margin-left: 600px;
            }

            .w-250{
                height: 230px;
                 width:275px;
                 border:2px solid white;
                
              
                 
            }

        </style>

        <?php
        
        include_once("trialheader.php");
        
        ?>


<section>

<div class="container">

<div class="row">
    <div class="col-md-4 mt-3">

        <div class="card bg-dark shadow mt-3">
            <div class="card-title">
                <!-- <h1 class="companytextcolor mynumberheading m-3">Adopt Me</h1> -->

                <?php include_once("bpnav.php"); ?>
            </div>

            <div class="card-body">

            <div class="row">

              
           <img src="fosterphotos/pictures/<?php echo $_SESSION['profilepicture']?>" alt="myprofilepp" class=" img-fluid w-250 mx-auto shadow mb-3 p-2 bg-dark rounded myimage">
          
    
          

    <!-- <img src="images/profilepicture.png" alt="myprofilepp" class=" rounded-3 img-fluid w-75 mx-auto shadow mb-3"> -->


    </div>

                <div class="row mt-3">
                <button class="btn btn-light mb-3" id="btnupdate">Update profile</button>

               <a href="kidreg.php" class="btn btn-light" id="btnregister">Register kid</a>

                <a href="parentkids.php" class="btn btn-light mt-3" id="btnregister">View Registered kids</a>

                <!-- <button class="btn btn-light" id="btnregister">Register Kid</button> -->

                </div>

            </div>

            <!-- card ends here -->
        </div>

        <!-- col ends here -->
    </div>

      <div class="col-md-7 mt-3 myform">
        <div class="card">

        <div class="card-title">
            <h2 class="htext birthparentcardtitle mt-3">Register kid</h2>


            <?php

                    if (!empty($errors)) {
                        echo "<div class='alert alert-danger'>";

                          foreach ($errors as $key => $value) {
                              echo "<p class='m-0'>$value</p>";
                          }
                          echo "</div>";
                    }

                        

                    ?>
        </div>

      <!-- <div class="col-md-12 mt-4">
     <div class="card  shadow m-auto birthparent ">

        <div class="card-title ">
            <h3 class="mb-0 htext mt-3 birthparentcardtitle">Creat account as foster kid</h3>
            <small class="birthparentcardsubtitle">It's quick and easy</small>
            <hr>
        </div> -->

      <form action="" method="POST">

      <div class="row m-1 mt-2 mb-3">

      <div class="col-md-6">

        <input type="text" class="form-control " name="fkfirstname" placeholder="First name" aria-label="First name"
                id="fkfirstname" >
      </div>

      <div class="col-md-6">

        <input type="text" class="form-control " name="fklastname" placeholder="Last name" aria-label="Last name"
                id="fklastname">
      </div>

      </div>


      <div class="row m-1 mb-3">

      <div class="col-md-6">

        <input type="email" class="form-control " name="fkemail" placeholder="Email address" aria-label="email address"
                id="fkemailaddress">
      </div>

      <div class="col-md-6">

        <input type="date" class="form-control " name="fkdateofbirth" aria-label="date" id="fkdateofbirth">
            <small class=" companytextcolor">Date of birth</small>
      </div>

      </div>


      <div class="row m-1 mb-3">

      <div class="col-md-6">

        <select name="fkgender" id="fkgender" class="form-select" aria-label="gender">
                <option value="">Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
    
            </select>
      </div>

      <div class="col-md-6">

        <input type="text" class="form-control " name="fkhobbies" placeholder="enter hobbies" aria-label="hobbies"
                id="fkhobbies">
      </div>

      </div>


      <div class="row m-1 mb-3">

      <div class="col-md-6">

        <input type="file" class="form-control " name="fkpicture" aria-label="picture" id="fkpicture">
            <small class=" companytextcolor">Upload a picture</small>
      </div>

      <div class="col-md-6">

        <input type="text" class="form-control " name="fkbloodgroup" placeholder="Blood group" aria-label="blood group"
                id="fkbloodgroup">
      </div>

      </div>



      <div class="row m-1 mb-3">

      <div class="col-md-6">

        <input type="file" class="form-control " name="fkdnareport" aria-label="dna report" id="fkdnareport">
            <small class=" companytextcolor">Upload DNA report</small>
      </div>

      <div class="col-md-6">

        <input type="text" class="form-control " name="fkallergies" placeholder="state allergies" aria-label="allergies"
                id="fkallergies">
      </div>

      </div>


      <div class="row m-1 mb-3">

      <div class="col">

        <textarea name="fkmedicalchallenges" id="fkmedicalchallenges" cols="30" rows="5" class="form-control"
            placeholder="State other medical challenges"></textarea>
      </div>

      

      </div>



      <div class="row">
        <div class="col-md-8 mt-4 myagreement ">
            <input type="checkbox" name="fkcheckbox" id="fkcheckbox" class="form-check-input">
            <small class="text-muted">By clicking register, you agree to our Terms, Data Policy and Cookie Policy. You may
                receive SMS notifications from us
                and can opt out at any time.</small>
        </div>
    
        <!-- row ends here -->
    </div>


    <div class="row">
        <div class="col-md-12 mt-4 mb-3 birthmodal">
            <input type="submit" name="btnfosterkid" class=" btn text-white btn-primary w-50 " id="btnfosterkid"
                value="Register" disabled>
            
        </div>
    </div>
      
      </form>


<!-- card ends here -->
      </div>
      </div>


      <!-- <div class="col-md-4"></div> -->

    <div class="col-md-8 mt-3 myupdate">

                    
                    <?php
                    
                    #include class

                include_once('shared/user.php');

                #create club object
                $userobj = new User();

                $output = $userobj->getparentdetails($_SESSION['parent_id']);

                $medoutput = $userobj->getmedicaldetails($_SESSION['parent_id']);

                // echo "<pre>";
                // print_r($output);
                // echo "</pre>";

                // echo "<pre>";
                // print_r($medoutput);
                // echo "</pre>";

                //check if button is clicked
                if (isset($_POST['btncompleteregister'])) {
                    #validate

                    if (empty($_POST['firstname']) || empty($_POST['lastname']) || empty($_POST['dateofbirth']) || empty($_POST['email']) || empty($_POST['username']) || empty($_POST['homeaddress']) ) {

                        $errors = "Fill in all required fields";
                    }



                            include_once("bpnav.php");
   

                                 #sanitize
                            $firstname = sanitizeInput($_POST['firstname']);
                            $lastname = sanitizeInput($_POST['lastname']);
                            $dateofbirth = $_POST['dateofbirth'];
                            $email = sanitizeInput($_POST['email']);
                            $username = $_POST['username'];
                            $homeaddress = sanitizeInput($_POST['homeaddress']);
                            $bloodgroup = sanitizeInput($_POST['bloodgroup']);
                            $medicalchallenges = sanitizeInput($_POST['medicalchallenges']);
                            $parent_id = $_SESSION['parent_id'];


                       $data = $userobj->updateparentdetails($firstname, $lastname, $dateofbirth, $email, $username, $homeaddress, $parent_id  );  

                       $datamed = $userobj->updateparentmedicdetails($bloodgroup, $medicalchallenges, $parent_id);
                       
                       
                                #check if its successful
                            if ($data == 1 || $datamed == 1) {

                                echo "<div class='alert alert-success'>";

                                  echo "Yay! your update was successfull";

                                    echo "</div>";

                                //redirect

                                // header("Location: trial.php?m=$msg");
                                
                            }elseif ($data == 0 && $datamed == 0) {
                                
                                echo "<div class='alert alert-info'>";

                                  echo "No changes were made";

                                    echo "</div>";

                                //redirect
                                
                                // header("Location: trial.php?m=$msg");
                            }else{

                                echo "<div class='alert alert-danger'>";

                                  echo "Oops! could not update details";

                                    echo "</div>";

                            } 


                            

                            if (!empty($msg)) {

                             echo "$msg";
                            }
                            



                             #check if data medical  successful
                            // if ($datamed == 1) {
                            //     $msg = "<div class='alert alert-success'>Details was successfully updated</div>";

                            //     //redirect

                            //     // header("Location: listclubs.php?m=$msg");
                                
                            // }elseif ($datamed == 0) {
                            //     $msg = "<div class='alert alert-info'>No changes was made</div>";

                            //     //redirect
                                
                            //     // header("Location: listclubs.php?m=$msg");
                            // }else{

                            //     $errors[] = "Oops! Could not update details. ".$datamed;
                            // } 

                            // echo $msg;
                            
                            
                }
                    
                    
                    ?>


          <?php
        
        if (!empty($errors)) {

              echo "<ul class='alert alert-danger'>";

          foreach ($errors as $key => $value) {
              echo "<li>$value</li>";
          }

          echo "</ul>";
        }
        
        ?>

        <form action="" method="POST"  action="trial.php?parent_id=<?php
        
        
        if (isset($_SESSION['parent_id'])) {
          echo $_SESSION['parent_id'];
        }
        
        
        ?>">

        <h3 class="mynumberheading">Update profile</h3>

        
<div class="card p-3 shadow">
                
            <div class="row">
                <div class="col-md-6">
                    <input type="text" class="form-control" placeholder="Enter first name" name="firstname"  value="<?php if(isset($output['parent_firstname'])){

                    echo($output['parent_firstname']);

              }?>">

                </div>

                <div class="col-md-6">
                    <input type="text" class="form-control" placeholder="Enter last name" name="lastname"  value="<?php if(isset($output['parent_lastname'])){

                    echo($output['parent_lastname']);

              }?>">
                </div>

            <!-- row ends here -->
            </div>


            
            <div class="row ">
                <div class="col-md-6 mt-3">
                    <input type="email" class="form-control parentinput " name="email" placeholder="Email address"
            aria-label="email address" id="email" value="<?php if(isset($output['emailaddress'])){

                    echo($output['emailaddress']);

              }?>">
                </div>

                <div class="col-md-6 mt-3">
                    <input type="date" class="form-control " name="dateofbirth" aria-label="date" id="dateofbirth"  value="<?php if(isset($output['parent_date_of_birth'])){

                    echo($output['parent_date_of_birth']);

              }?>">
                </div>

            <!-- row ends here -->
            </div>


            <div class="row ">

                <div class="col mt-3">
                    <input type="text" class="form-control " name="homeaddress" placeholder="Enter full home address"
            aria-label="home address" id="homeaddress"  value="<?php if(isset($output['parent_address'])){

                    echo($output['parent_address']);

              }?>">

                </div>

            <!-- row ends here -->
            </div>



            <div class="row ">

                <div class="col mt-3">
                    <input type="text" class="form-control " name="username" placeholder="username" aria-label="username"
            id="username"  value="<?php if(isset($output['username'])){

                    echo($output['username']);

              }?>">
            
                </div>


                <div class="col mt-3">
                    <input type="password" class="form-control " name="password" placeholder="password" aria-label="password"
            id="password" disabled>
            
                </div>

            <!-- row ends here -->
            </div>




          <div class="row ">

                <div class="col-md-6 mt-3">

                   <input type="password" class="form-control " name="confirmpassword" placeholder="confirm password"
            aria-label="confirm password" id="confirmpassword" disabled>
            
                </div>


                <div class="col-md-6 mt-3">
                    
            <select name="gender" id="gender" class="form-select"  disabled>

            <option value="">choose gender</option>
            <option value="male">male</option>
            <option value="female">female</option>
            <option value="other">others</option>
        </select>
            
                </div>

            <!-- row ends here -->
            </div>  




            <div class="row ">

                <div class="col-md-6 mt-3">

        <input type="file" class="form-control " name="picture" aria-label="picture" id="picture" disabled>

        <small class=" companytextcolor">Upload a picture</small>
            
                </div>


                <div class="col-md-6 mt-3">
                    
            <input type="text" class="form-control " name="bloodgroup" placeholder="Blood group" aria-label="bloodgroup"
            id="bloodgroup"  value="<?php if(isset($medoutput['blood_group'])){

                    echo($medoutput['blood_group']);

              }?>">
            
                </div>

            <!-- row ends here -->
            </div>  



        <div class="row ">

        <div class="col mt-3">
                    
            <textarea name="medicalchallenges" id="medicalchallenges" cols="30" rows="5" class="form-control"
            placeholder="Enter medical status/challenges, e.g. I'm hale and healthy"><?php if(isset($medoutput['medical_challenges'])){echo($medoutput['medical_challenges']); }?></textarea>
            
                </div>

            <!-- row ends here -->
            </div>  



            <div class="row ">

        <div class="col mt-3">

              
              <input type="hidden" name="parentid" value="<?php
          
          
          if (isset($output['parent_id'])) {
            echo $output['parent_id'];
          }
          
          
          ?>">
                    
            <button type="submit" class="btn btn-primary" name="btncompleteregister" id="btncompleteregister">update profile</button>
            
                </div>

            <!-- row ends here -->
            </div> 


        </form>

        <!-- card ends here -->
        </div>
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

    <script type="text/javascript">

        $(document).ready(function(){

            $(".myform").hide();
            $(".myupdate").show();


            $("#btnupdate").click(function(){

                $(".myupdate").show();
                 $(".myform").hide();
            });

            $("#btnregister").click(function(){


                $(".myupdate").hide();
                $(".myform").show();
                

            });
            
        });

    </script>


<footer class="bg-dark text-white p-1 mt-3 shadow">

<p class="trialfooter mt-3 text-muted" >@copyright. All rights reserved</p>
</footer> 