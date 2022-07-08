<?php

//importing constants
include_once("constants.php");
include_once('common.php');

//creating class for implementation
class User{

//listing member class / properties
  public $firstname;
  public $lastname;
  public $date_of_birth;
  public $username;
  public $password;
  public $picture;
  public $homeaddress;
  public $dbconn; //database connector / handler

  //connect to the database by initializing construct
  public function __construct(){

     //create object of MYSQLi
     $this->dbconn = new MYSQLi(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASENAME);

     //check for connectivity error
     if ($this->dbconn->connect_error) {

        die("Connection failed: ".$this->dbconn->connect_error);
     }
  }
        //end constructor

        //begin birth parent registration 

        function perbirthregister($parent_firstname, $parent_lastname, $parent_date_of_birth, $gender, $emailaddress, $username, $password, $parent_address){

            // $picture = "image";

            // encrypt password
		 $pwd = password_hash($password, PASSWORD_DEFAULT);

         //prepare statement for database
         $statement = $this->dbconn->prepare("INSERT INTO birthparent(parent_firstname, parent_lastname, parent_date_of_birth, gender, emailaddress, username, password, picture, parent_address) VALUES(?,?,?,?,?,?,?,?,?)");

         //create extentions
            $ext = array('jpg', 'png', 'jpeg', 'gif');

            //create common object
            $obj = new Common;
            $picture = $obj->uploadAnyFile("fosterphotos/pictures/", 1048576, $ext);

            // echo "<pre>";
            // print_r($emblem);
            // echo "</pre>";
            // exit();

            if (array_key_exists('success', $picture)) {
              
                $filename = $picture['success'];

                //bind parameters
            $statement->bind_param("sssssssss",$parent_firstname, $parent_lastname, $parent_date_of_birth, $gender, $emailaddress, $username, $pwd, $filename, $parent_address);

            #execute
          $statement->execute();

        // check for errors
            if ($statement->affected_rows == 1){
						return $this->dbconn->insert_id;

				}else{

					return false;
				}

            }else {
              
              return $filename['error'];
            }

        //     //bind parameters
        //     $statement->bind_param("sssssssss",$parent_firstname, $parent_lastname, $parent_date_of_birth, $gender, $emailaddress, $username, $pwd, $picture, $parent_address);

        //     #execute
        // $statement->execute();

        // // check for errors
        //     if ($statement->affected_rows == 1){
				// 		return $this->dbconn->insert_id;
				// }else{

				// 	return false;
				// }

        }

        //end birth parent registration 


        //login function starts here
        
        function birthparentlogin($emailaddress, $password){

                //prepare statement
		$statement = $this->dbconn->prepare("SELECT * FROM birthparent WHERE emailaddress=?");

    // var_dump($emailaddress);

        #bind parameters
		$statement->bind_param("s", $emailaddress);

		#execute
		$statement->execute();

        //get result
		$result = $statement->get_result();

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();

            

            //check if password match
        if (password_verify($password, $row['password'])) {

            
            // create session variable
			session_start();

      // $_SESSION['fosterparent_id']= $row['fosterparent_id'];
      $_SESSION['parent_id']= $row['parent_id'];
			$_SESSION['fname'] = $row['parent_firstname'];
			$_SESSION['lname'] = $row['parent_lastname'];
      $_SESSION['mycode'] = 'christophercolumbus'; // secrete code

            return true;
        }else{

            return false;
        }


        }else {
            return false;
        }


        }

        //login function ends here

        //birth parent medical record

        function medbirthregister($parent_id, $blood_group, $medical_challenges){

            $dna_report = "image";

            //prepare statement for database
         $statement = $this->dbconn->prepare("INSERT INTO birthparent_medicalrecord(parent_id, blood_group, medical_challenges) VALUES(?,?,?)");

            //bind parameters
         $statement->bind_param("sss",$parent_id, $blood_group,  $medical_challenges);

           #execute
        $statement->execute();

        // check for errors
            if ($statement->affected_rows == 1){
						return true;
				}else{

					return false;
				}


        }
        //birth parent medical record ends here


        function peradoptiveregister($fosterparent_firstname, $fosterparent_lastname, $fosterparent_dateof_birth, $emailaddress, $fosterparent_username, $fosterparent_password, $fosterparent_address, $picture){

              $picture = "image";

               // encrypt password
		 $pwd = password_hash($fosterparent_password, PASSWORD_DEFAULT);

         //prepare statement for database
         $statement = $this->dbconn->prepare("INSERT INTO fosterparent(fosterparent_firstname, fosterparent_lastname, fosterparent_dateof_birth, emailaddress, fosterparent_username, fosterparent_password, fosterparent_address, picture) VALUES(?,?,?,?,?,?,?,?)");

         //bind parameters
         $statement->bind_param("ssssssss", $fosterparent_firstname, $fosterparent_lastname, $fosterparent_dateof_birth, $emailaddress, $fosterparent_username, $pwd, $fosterparent_address, $picture );

          #execute
        $statement->execute();

            // check for errors
            if ($statement->affected_rows == 1){
						return $this->dbconn->insert_id;
				}else{

					return false;
				}

        }
        //foster parent personal records end here having returned the insert_id which helps to input their financial record into a different table from the same form


        //start adoptive parents financial function / method

        function financeadoptiveregister($fosterparent_id, $profession, $marital_status, $police_record, $householder, $annual_income, $marriage_certificate){

                    $police_record = "image";
                    $marriage_certificate = "image";

                    //prepare statememt for database
            $statement = $this->dbconn->prepare("INSERT INTO fosterparent_financialrecord(fosterparent_id, profession, marital_status, police_record, householder, annual_income, marriage_certificate) VALUES(?,?,?,?,?,?,?)");   
            
            //bind parameters
            $statement->bind_param("issssss", $fosterparent_id, $profession, $marital_status, $police_record, $householder, $annual_income, $marriage_certificate);

            //execute statement
            $statement->execute();

            // check for errors
            if ($statement->affected_rows == 1){
						return true;
				}else{

					return false;
				}


        }
        #end adoptive parents financial function /method


        #foster kid registration starts

         function perfosterkid($fosterkid_firstname, $fosterkid_lastname, $dateof_birth, $gender, $hobbies, $picture, $parent_id){

              $picture = "image";

        //        // encrypt password
		//  $pwd = password_hash($password, PASSWORD_DEFAULT);

         //prepare statement for database
         $statement = $this->dbconn->prepare("INSERT INTO fosterkid(fosterkid_firstname, fosterkid_lastname, dateof_birth, gender, hobbies, picture, parent_id) VALUES(?,?,?,?,?,?,?)");

         //bind parameters
         $statement->bind_param("ssssssi", $fosterkid_firstname, $fosterkid_lastname, $dateof_birth, $gender, $hobbies, $picture, $parent_id);

          #execute
        $statement->execute();

            // check for errors
            if ($statement->affected_rows == 1){

						return $this->dbconn->insert_id;
				}else{

					return false;
				}

        }
        #foster kid registration ends



        //foster kid medical record

        function medfosterkid($fosterkid_id, $blood_group, $allergies, $dna_report, $medical_challenge){

            $dna_report = "image";

            //prepare statement for database
         $statement = $this->dbconn->prepare("INSERT INTO fosterkid_medicalrecord(fosterkid_id, blood_group, allergies, dna_report, medical_challenge) VALUES(?,?,?,?,?)");

            //bind parameters
         $statement->bind_param("issss", $fosterkid_id, $blood_group, $allergies, $dna_report, $medical_challenge);

           #execute
        $statement->execute();

        // check for errors
            if ($statement->affected_rows == 1){
						return true;
				}else{

					return false;
				}


        }
        //fosterkid medical record ends here



        //foster parent login starts

         function fosterparentlogin($emailaddress, $fosterparent_password){

            //prepare statement
            $statement = $this->dbconn->prepare("SELECT * FROM fosterparent WHERE emailaddress=?");

            //bind parameters
            $statement->bind_param("s", $emailaddress);

            //execute statement
            $statement->execute();

            //get result
		      $result = $statement->get_result();



          if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();

            //check if password match
        if (password_verify($fosterparent_password, $row['fosterparent_password'])) {

          
            
            // create session variable
			session_start();

      // $_SESSION['fosterparent_id']= $row['fosterparent_id'];
      $_SESSION['fosterparent_id']= $row['fosterparent_id'];
			$_SESSION['fname'] = $row['fosterparent_firstname'];
			$_SESSION['lname'] = $row['fosterparent_lastname'];
      $_SESSION['mycode'] = 'christophercolumbus'; // secrete code

            return true;
        }else{

            return false;
        }


        }else {
            return false;
        }

         }
        //foster parent login ends



        #begin get birth parent details

      function getparentdetails($parent_id){

        #prepare statement
        $statement = $this->dbconn->prepare("SELECT * FROM birthparent WHERE parent_id=?");

        // $statement = $this->dbconn->prepare("SELECT * FROM birthparent  JOIN birthparent_medicalrecord ON birthparent.parent_id = birthparent_medicalrecord.parent_id ");


          #bind parameter

        $statement->bind_param("i", $parent_id);

        #execute

        $statement->execute();

        #get result
        $result = $statement->get_result();

        return $result->fetch_assoc();
      }

     #end  get birth parent details


     //start get parents medical records

     function getmedicaldetails($parent_id){

        #prepare statement
        $statement = $this->dbconn->prepare("SELECT * FROM birthparent_medicalrecord WHERE parent_id=?");

        // $statement = $this->dbconn->prepare("SELECT * FROM birthparent  JOIN birthparent_medicalrecord ON birthparent.parent_id = birthparent_medicalrecord.parent_id ");


          #bind parameter

        $statement->bind_param("i", $parent_id);

        #execute

        $statement->execute();

        #get result
        $result = $statement->get_result();

        return $result->fetch_assoc();
      }

     #end  get birth parent medical records


     //begin birth parents personal details update

     function updateparentdetails($parent_firstname, $parent_lastname, $parent_date_of_birth, $emailaddress, $username, $parent_address, $parent_id){

      //prepare statement
      $statement = $this->dbconn->prepare("UPDATE birthparent SET parent_firstname=?, parent_lastname=?, parent_date_of_birth=?, emailaddress=?, username=?, parent_address=? WHERE parent_id=?");

      //bind parameters
      $statement->bind_param("ssssssi", $parent_firstname, $parent_lastname, $parent_date_of_birth, $emailaddress, $username, $parent_address, $parent_id);

      //execute statement
      $statement->execute();

      //check if record was updated
         return $statement->affected_rows;


     }
     //end birth parent personal details update


     //begin update parent medical details
     function updateparentmedicdetails($blood_group, $medical_challenges, $parent_id){

      //prepare statement
      $statement = $this->dbconn->prepare("UPDATE birthparent_medicalrecord SET blood_group=?, medical_challenges=? WHERE parent_id=?");

      //bind parameters
      $statement->bind_param("ssi",$blood_group, $medical_challenges, $parent_id);

      //execute statement
      $statement->execute();

      //check if record was updated
         return $statement->affected_rows;


     }
     //end update parent medical details


     //start get adoptive details 

      function getadoptivedetails($fosterparent_id){

        #prepare statement
        $statement = $this->dbconn->prepare("SELECT * FROM fosterparent WHERE fosterparent_id=?");

        // $statement = $this->dbconn->prepare("SELECT * FROM birthparent  JOIN birthparent_medicalrecord ON birthparent.parent_id = birthparent_medicalrecord.parent_id ");


          #bind parameter
        $statement->bind_param("i", $fosterparent_id);

        #execute
        $statement->execute();

        #get result
        $result = $statement->get_result();

        return $result->fetch_assoc();
      }

     //end get adoptive details 



     //start get adoptive financial details

     function getadoptivefinance($fosterparent_id){

        #prepare statement
        $statement = $this->dbconn->prepare("SELECT * FROM fosterparent_financialrecord WHERE fosterparent_id=?");

        // $statement = $this->dbconn->prepare("SELECT * FROM birthparent  JOIN birthparent_medicalrecord ON birthparent.parent_id = birthparent_medicalrecord.parent_id ");


          #bind parameter

        $statement->bind_param("i", $fosterparent_id);

        #execute

        $statement->execute();

        #get result
        $result = $statement->get_result();

        return $result->fetch_assoc();
      }

     //end get adoptive financial details


     //begin foster kids personal details update

     function updateadoptivedetails($fosterparent_firstname, $fosterparent_lastname, $fosterparent_dateof_birth, $emailaddress, $fosterparent_username, $fosterparent_address, $fosterparent_id){

      //prepare statement
      $statement = $this->dbconn->prepare("UPDATE fosterparent SET fosterparent_firstname=?, fosterparent_lastname=?, fosterparent_dateof_birth=?, emailaddress=?, fosterparent_username=?, fosterparent_address=? WHERE fosterparent_id=?");

      //bind parameters
      $statement->bind_param("ssssssi", $fosterparent_firstname, $fosterparent_lastname, $fosterparent_dateof_birth, $emailaddress, $fosterparent_username, $fosterparent_address, $fosterparent_id);

      //execute statement
      $statement->execute();

      //check if record was updated
         return $statement->affected_rows;


     }
     //end foster kids personal details update


     //begin update adoptive financial details
     function updateadoptivefinancedetails($profession, $annual_income, $fosterparent_id){

      //prepare statement
      $statement = $this->dbconn->prepare("UPDATE fosterparent_financialrecord SET profession=?, annual_income=? WHERE fosterparent_id=?");

      //bind parameters
      $statement->bind_param("ssi", $profession, $annual_income, $fosterparent_id);

      //execute statement
      $statement->execute();

      //check if record was updated
      return $statement->affected_rows;


     }
     //end update adoptive  financial details




     function adminlogin($emailaddress, $password){


      //prepare statement
      $statement = $this->dbconn->prepare("SELECT * FROM administer WHERE emailaddress=?");

      //bind parameters
      $statement->bind_param("s", $emailaddress);

        //execute statement
        $statement->execute();

        //get result
		    $result = $statement->get_result();


       if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();

            var_dump($row);

            //check if password match
        if (password_verify($password, $row['password'])) {

            return true;
        }else{

            return false;
        }


        }else {
            return false;
        }
     }


      //list foster kids method begins here

      function listfosterkids(){

        //prepare statement
        $statement = $this->dbconn->prepare("SELECT * FROM fosterkid LEFT JOIN fosterkid_medicalrecord ON fosterkid.fosterkid_id = fosterkid_medicalrecord.fosterkid_id" );

        #execute
        $statement->execute();

        #get result
        $result = $statement->get_result();

        //fetch records
        $records = array();

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){

               $records[] = $row;
            }

          
        }
         return $records;

      }
      //list foster kids method ends here

    
    
   #begin logout function 

     function logout(){

        session_start();
        session_destroy();

        #redirect to login
        header("Location: signin.php");
        exit();

         }

           #end logout function  
           
           


}

?>