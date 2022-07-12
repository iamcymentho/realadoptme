<?php
include_once("adminheader.php");

?>

<?php

//include user class
include_once("shared/user.php");

//create object of user
$obj = new User();

//access total birth parent method
// $output = $obj->totalbirthparent($parent_id);

//     echo "<pre>";
//     print_r($output);
//     echo "</pre>";

?>

<section>
            <!-- first section starts here -->

            <div class="container">

            <div class="row">
                <div class="col-md-3 mt-4">
                    <div class="card bg-info mt-3 shadow">
                        <div class="card-title">
                            <p class="text-white mt-4 myadmintext m-3"><i class="fa-solid fa-users fa-2x"></i> All active users</p>
                        </div>

                        <div class="card-body">
                            <div class="card-text ">
                                <h1 class="text-white text-decoration-underline subcardnumber">150</h1>
                            </div>
                            <a href="" class="mt-3 text-white myadmintext"><small>View Report ( Usage - Total active users )</small></a>
                        </div>
                        <!-- card ends here -->
                    </div>
                </div>



                <div class="col-md-3 mt-4">
                    <div class="card bg-dark mt-3 shadow">
                        <div class="card-title">
                            <p class="text-white mt-4 myadmintext m-3"><i class="fa-solid fa-users fa-2x"></i> Total birth parent's accounts</p>
                        </div>
                
                        <div class="card-body">
                            <div class="card-text ">
                                <h1 class="text-white text-decoration-underline subcardnumber">70</h1>
                            </div>
                            <a href="" class="mt-3 text-white myadmintext"><small>View Report (  birth parent's accounts )</small></a>
                        </div>
                        <!-- card ends here -->
                    </div>
                </div>

                <div class="col-md-3 mt-4">
                    <div class="card bg-primary mt-3 shadow">
                        <div class="card-title">
                            <p class="text-white mt-4 myadmintext m-3"><i class="fa-solid fa-users fa-2x"></i> Total adoptive parent's accounts</p>
                        </div>
                        <div class="card-body">
                            <div class="card-text ">
                                <h1 class="text-white text-decoration-underline subcardnumber">100</h1>
                            </div>
                            <a href="" class="mt-3 text-white myadmintext"><small>View Report (  adoptive parent's 
                                </small></a>
                        </div>
                        <!-- card ends here -->
                    </div>
                </div>


                <div class="col-md-3 mt-4">
                    <div class="card  mt-3 shadow" style="background-color:rgba(0,128,128,0.7)">
                        <div class="card-title">
                            <p class="text-white mt-4 myadmintext m-3"><i class="fa-solid fa-users fa-2x"></i> Payment </p>
                        </div>
                        <div class="card-body">
                            <div class="card-text ">
                                <h1 class="text-white text-decoration-underline subcardnumber">$$</h1>
                            </div>
                            <a href="" class="mt-3 text-white myadmintext"><small>View Report ( Payment details )
                                </small></a>
                        </div>
                        <!-- card ends here -->
                    </div>
                </div>


                <!-- row ends here -->
            </div>




            <div class="row">
                <div class="col-md-3 mt-4">
                    <div class="card bg-secondary mt-3 shadow">
                        <div class="card-title">
                            <p class="text-white mt-4 myadmintext m-3"><i class="fa-solid fa-envelope-open-text fa-2x"></i> Total requests</p>
                        </div>
                        <div class="card-body">
                            <div class="card-text ">
                                <h1 class="text-white text-decoration-underline subcardnumber">69</h1>
                            </div>
                            <a href="" class="mt-3 text-white myadmintext"><small>View Report ( Usage - Total requests
                                    )</small></a>
                        </div>
                        <!-- card ends here -->
                    </div>
                </div>



                <div class="col-md-3 mt-4">
                    <div class="card bg-warning mt-3 shadow">
                        <div class="card-title">
                            <p class="text-white mt-4 myadmintext m-3"><i class="fa-solid fa-voicemail fa-2x"></i> Total pending</p>
                        </div>
                        <div class="card-body">
                            <div class="card-text ">
                                <h1 class="text-white text-decoration-underline subcardnumber">13</h1>
                            </div>
                            <a href="" class="mt-3 text-white myadmintext"><small>View Report ( Usage - Total pending
                                    )</small></a>
                        </div>
                        <!-- card ends here -->
                    </div>
                </div>
            
            
            
                <div class="col-md-3 mt-4">
                    <div class="card bg-danger mt-3 shadow">
                        <div class="card-title">
                            <p class="text-white mt-4 myadmintext m-3"><i class="fa-solid fa-ban fa-2x"></i> Total declined</p>
                        </div>
                        <div class="card-body">
                            <div class="card-text ">
                                <h1 class="text-white text-decoration-underline subcardnumber">15</h1>
                            </div>
                            <a href="" class="mt-3 text-white myadmintext"><small>View Report ( Usage - Total declined )</small></a>
                        </div>
                        <!-- card ends here -->
                    </div>
                </div>
            
            
            
                <div class="col-md-3 mt-4">
                    <div class="card bg-success mt-3 shadow">
                        <div class="card-title">
                            <p class="text-white mt-4 myadmintext m-3"><i class="fa-solid fa-envelope-circle-check fa-2x"></i> Total requests granted</p>
                        </div>
                        <div class="card-body">
                            <div class="card-text ">
                                <h1 class="text-white text-decoration-underline subcardnumber">40</h1>
                            </div>
                            <a href="" class="mt-3 text-white myadmintext"><small>View Report ( Usage - request granted
                                    )</small></a>
                        </div>
                        <!-- card ends here -->
                    </div>
                </div>
                <!--  second row ends here -->
            </div>
            <!-- container ends here -->
            </div>
            <!-- first section ends here -->
        </section>

        <?php
        
        include_once("adminfooter.php");
        
        ?>