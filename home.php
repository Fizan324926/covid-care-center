<?php include_once ("classes/crud.php");
include "connection.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="styles.css" type="text/css">
    <script src="https://kit.fontawesome.com/d73fda720e.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <?php  include "script.php";?>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />



</head>

<body>
    <div class="main">
        <div class="navigation">
            <h2 class="logo">COVID CC.</h2>
            <ul>
                <li><a href="#" ><i class="fa-solid fa-house"></i>Home</a></li>
                <li><a href="#" class="s-link" onclick="toggleForm()"><i class="fa-solid fa-hospital-user"></i>Patients</a></li>
                <li><a href="#" class="s-link" onclick="toggleForm()"><i class="fa-solid fa-users"></i>Staff</a></li>
                <li><a href="#" class="s-link" onclick="toggleForm()"><i class="fa-solid fa-bed-pulse"></i>Ward</a></li>
                <li><a href="#" class="s-link" onclick="toggleForm()" ><i class="fa-solid fa-arrow-right-from-bracket"></i>Log Out</a></li>
            </ul>
            
        </div>
        <div class="home-content pages">
            <div class="header">
                <h2>Home</h2>
            </div>
            <div class="content">

                <div class="row">
                    <div class="coulmn">
                        <div class="c-items">
                            <h3>Confirmed cases</h3>
                            <p><span class="c-values">17384623</span></p>
                            
                        </div>
                        <div class="c-items">
                            <h3>Deaths</h3>
                            <p><span class="c-values">123</span></p>
                        </div>
                        <div class="c-items">
                            <h3>Recovered</h3>
                            <p><span class="c-values">432</span></p>
                        </div>
                        
                        <div class="c-items">
                            <h3>Total Wards</h3>
                            <p><span class="c-values">12</span></p>
                        </div>
                        <div class="c-items">
                            <h3>Total Beds</h3>
                            <p><span class="c-values">32</span></p>
                        </div>
                        <div class="c-items">
                            <h3>Total Staff</h3>
                            <p><span class="c-values">12</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!--    Patient Page  -->
        <div class="patients-content pages">
            <div class="header">
                <h2>Patients</h2>
            </div>
            <div class="patients">
                <div class="patients-operation">
                    <div class="items">
                        <ul>
                            <li><button id="b-a0">Show All</button></li>
                            <li><button id="b-a1">Add New</button></li>
                            <li><button id="b-a2">Update</button></li>
                            <li><button id="b-a3">Delete</button></li>
                        </ul>
                    </div>
                </div>
                <div class="patients-data" id="p-a0">
                    <div class="table-position">
                        <table class="fixed_header" id="patient-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Age</th>
                                    <th>Gender</th>
                                    <th>Contact</th>
                                    <th>Test No</th>
                                    <th>Condition</th>
                                    <th>Ward Id</th>
                                    <th>Bed No</th>
                                    <th>Reports</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                 
                                $crud= new crud(); 
                                $result = $crud->selectalldata("patient"); 
                                if(!$result){
                                    die("invalid query".$conn->errno);
                                }
                                while($row=$result->fetch_assoc()){
                                    echo "<form action='downloadreport.php' method='post'><tr>
                                <td class='near'>".$row["patientid"] ."</td>
                                <td>".$row["fullname"] ."</td>
                                <td>".$row["age"] ."</td>
                                <td>".$row["gender"] ."</td>
                                <td>".$row["contact"] ."</td>
                                <td>".$row["testno"] ."</td>
                                <td>".$row["patientstatus"] ."</td>
                                <td>".$row["wardid"] ."</td>
                              
                                <td>".$row["bedno"] ."</td>
                                <td><button class='DownloadBtn' name='downloadbtn'><a>Download</a></button></td>
                            </tr></form>";
                                }
                                  
                        
                                
                                ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="add-new list-style" id="p-a1">
                    <?php 
                    $name="";
                    ?>
                    <form action="managedatabase.php" method="post">
                        <ul>
                            <li>
                                <div class="p-add-new"><label for="fname">Patient's Name</label>
                                    <input type="text" id="pa-fname" name="fullname" placeholder="Full name.."></div>
                            </li>
                            <li>
                                <div class="p-add-new"><label for="fname">Patient's Age</label>
                                    <input type="text" id="pa-age" name="age" placeholder="Age"></div>
                            </li>
                            <li>
                                <div class="p-add-new"><label for="fname">Contact Number</label>
                                    <input type="text" id="pa-contact" name="contact" placeholder="Contact"></div>
                            </li>
                            <li>
                                <div class="p-add-new"><label for="fname">Gender</label>
                                    <select id="pa-gender" name='gender'>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="otehr">Other</option>
                                        </select></div>
                            </li>
                            <li>
                                <div class="p-add-new"><label for="fname">Condition</label>
                                <select id="pa-cond" name='condition'>
                                        <option value="male">serious</option>
                                        <option value="female">normal</option>
                                        <option value="female">recovered</option>
                                        <option value="otehr">dead</option>
                                        </select>
                                    </div>
                            </li>
                            <li>
                                <div class="p-add-new"><label for="fname">Test No.</label><input type="text" id="pa-fname" name="test" placeholder="Test No">
                                </div>
                            </li>
                            <li>
                                <div class="p-add-new"><label for="fname">Ward ID</label><select name='ward' id="pa-wardid">
                                    
                                    
                                    </select>
                                </div>
                            </li>
                            
                            <li>
                                <div class="p-add-new"><label for="fname">Bed No</label><input type="text" id="pa-fname" name="bed" placeholder="Bed No"></div>
                            </li>
                        </ul>
                    
                         <button name='p-addbtn' id="pat-add-btn">Add</button>
                  </form>
                </div>
                <div class="update" id="p-a2">
                    <div class="table-position">
                        <table class="fixed_header">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Age</th>
                                    <th>Gender</th>
                                    <th>Contact</th>
                                    <th>Test No</th>
                                    <th>Condition</th>
                                    <th>Ward Id</th>
                                   
                                    <th>Bed No</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                
                                $crud= new crud(); 
                                $result = $crud->selectalldata("patient"); 
                                if(!$result){
                                    die("invalid query".$conn->errno);
                                }
                                while($row=$result->fetch_assoc()){
                                    echo "<tr>
                                <td>".$row["patientid"] ."</td>
                                <td>".$row["fullname"] ."</td>
                                <td>".$row["age"] ."</td>
                                <td>".$row["gender"] ."</td>
                                <td>".$row["contact"] ."</td>
                                <td>".$row["testno"] ."</td>
                                <td>".$row["patientstatus"] ."</td>
                                <td>".$row["wardid"] ."</td>
                              
                                <td>".$row["bedno"] ."</td>
                                
                            </tr>";
                                }
                                  
                        
                                
                                ?>
                                
                            </tbody>
                        </table>
                    </div>
                    <div class="pu-data list-style">
                        <ul>
                        <li>
                                <div class="data"><label for="pu-contact">Patient Id</label>
                                <select id="pu-id">
                                    
                                    </select></div>
                            </li>
                            <li>
                                <div class="data"><label for="pu-contact">Contact</label>
                                    <input type="text" id="pu-contact" name="firstname" placeholder="Contact"></div>
                            </li>
                            <li>
                                <div class="data"><label for="fname">Condition</label>
                                    <input type="text" id="pu-condition" name="firstname" placeholder="Condition.."></div>
                            </li>
                            <li>
                                <div class="data"><label for="fname">Test No</label>
                                    <input type="text" id="pu-test" name="firstname" placeholder="Test No."></div>
                            </li>
                            <button>Update</button>
                            

                        </ul>

                    </div>
                </div>
                <div class="delete" id="p-a3">
                    <div class="table-position">
                        <table class="fixed_header">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Age</th>
                                    <th>Gender</th>
                                    <th>Contact</th>
                                    <th>Test No</th>
                                    <th>Condition</th>
                                    <th>Ward Id</th>
                                   
                                    <th>Bed No</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                $crud= new crud(); 
                                $result = $crud->selectalldata("patient"); 
                                if(!$result){
                                    die("invalid query".$conn->errno);
                                }
                                while($row=$result->fetch_assoc()){
                                    echo "<tr>
                                <td>".$row["patientid"] ."</td>
                                <td>".$row["fullname"] ."</td>
                                <td>".$row["age"] ."</td>
                                <td>".$row["gender"] ."</td>
                                <td>".$row["contact"] ."</td>
                                <td>".$row["testno"] ."</td>
                                <td>".$row["patientstatus"] ."</td>
                                <td>".$row["wardid"] ."</td>
                              
                                <td>".$row["bedno"] ."</td>
                              
                            </tr>";
                                }
                                  
                        
                                
                                ?>
                               
                            </tbody>
                        </table>
                    </div>
                    <div class="pd-data list-style">
                        
                        <ul>
                            <li>
                                <div class="data"><label for="pu-contact">Patient ID</label>
                                    <select id="pd-id">
                                        <
                                        
                                        </select></div>
                            </li>


                        </ul>

                    </div><button>Delete</button>
                </div>

            </div>
        </div>

        <!--    Staff Page  -->


        <div class="staff-content pages">
            <div class="header">
                <h2>Staff</h2>
            </div>
            <div class="s-content">
                <div class="s-header">
                    <div class="items">
                        <ul>
                            <li><button id="s-a0">Show All</button></li>
                            <li><button id="s-a1">Add New</button></li>
                            <li><button id="s-a2">Update</button></li>
                            <li><button id="s-a3">Delete</button></li>
                        </ul>
                    </div>
                </div>
                <div class="s-content">
                    <div class="s-b0">
                        <div class="table-position">
                            <table class="fixed_header">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Gender</th>
                                        <th>Contact</th>
                                        <th>Address</th>
                                        <th>Ward</th>
                                        <th>Report</th>

                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                $crud= new crud(); 
                                $result = $crud->selectalldata("staff"); 
                                if(!$result){
                                    die("invalid query".$conn->errno);
                                }
                                while($row=$result->fetch_assoc()){
                                    echo "<form action='downloadreport.php' method='post'><tr>
                                <td class='near'>".$row["staffid"] ."</td>
                                <td>".$row["fullname"] ."</td>
                                
                                <td>".$row["gender"] ."</td>
                                <td>".$row["contact"] ."</td>
                                <td>".$row["address"] ."</td>
                                
                                <td>".$row["wardid"] ."</td>
                              
                                
                                <td><button class='sDownloadBtn' name='downloadbtn'><a>Download</a></button></td>
                            </tr></form>";
                                }
                                  
                        
                                
                                ?>
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div>
                        <div class="s-b1">
                            <div class="add-new list-style" id="p-a1">
                            <form action="managedatabase.php" method="post">
                                    <ul>
                                        <li>
                                            <div class="p-add-new"><label for="fname">Staff's Name</label>
                                                <input type="text" id="pa-fname" name="name" placeholder="Full name.."></div>
                                        </li>
                                        <li>
                                            <div class="p-add-new"><label for="fname">Gender</label><select name='gender' id="pa-gender">
                                                <option value="male">male</option>
                                                <option value="female">female</option>
                                                <option value="otehr">other</option>
                                                </select></div>
                                        </li>
                                        <li>
                                            <div class="p-add-new"><label for="fname">Contact No</label>
                                                <input type="text" id="pa-age" name="contact" placeholder="Contact"></div>
                                        </li>

                                        <li>
                                            <div class="p-add-new"><label for="fname">Address</label>
                                                <input type="text" id="pa-condition" name="address" placeholder="Home Address"></div>
                                        </li>



                                        <li>
                                            <div class="p-add-new"><label for="fname">Ward</label><select name='ward' id="sa-id">
                                                
                                                </select></div>
                                        </li>
                                    </ul>
                                
                                <button name='s-addbtn'>Add</button></form>
                            </div>
                        </div>
                    </div>
                    <div class="s-b2">
                        <div class="table-position">
                            <table class="fixed_header">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Gender</th>
                                        <th>Contact</th>
                                        <th>Address</th>
                                        <th>Ward</th>


                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                $crud= new crud(); 
                                $result = $crud->selectalldata("staff"); 
                                if(!$result){
                                    die("invalid query".$conn->errno);
                                }
                                while($row=$result->fetch_assoc()){
                                    echo "<tr>
                                <td>".$row["staffid"] ."</td>
                                <td>".$row["fullname"] ."</td>
                                
                                <td>".$row["gender"] ."</td>
                                <td>".$row["contact"] ."</td>
                                <td>".$row["address"] ."</td>
                                
                                <td>".$row["wardid"] ."</td>
                              
                                
                               
                            </tr>";
                                }
                                  
                        
                                
                                ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="pu-data list-style">
                            <ul>
                            <li>
                                    <div class="data"><label for="fname">Staff</label>
                                        <select id="su-id">
                                            
                                            </select></div>
                                </li>
                                
                                <li>
                                    <div class="data"><label for="pu-contact">Contact</label>
                                        <input type="text" id="pu-contact" name="firstname" placeholder="Contact"></div>
                                </li>
                                <li>
                                    <div class="data"><label for="fname">Wards</label>
                                        <select id="su-wid">
                                            
                                            </select></div>
                                </li>

                                

                            </ul>

                        </div><button>Update</button>
                    </div>
                    <div class="s-b3">
                        <div class="table-position">
                            <table class="fixed_header">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Gender</th>
                                        <th>Contact</th>
                                        <th>Address</th>
                                        <th>Ward</th>
                                     

                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                $crud= new crud(); 
                                $result = $crud->selectalldata("staff"); 
                                if(!$result){
                                    die("invalid query".$conn->errno);
                                }
                                while($row=$result->fetch_assoc()){
                                    echo "<tr>
                                <td>".$row["staffid"] ."</td>
                                <td>".$row["fullname"] ."</td>
                                
                                <td>".$row["gender"] ."</td>
                                <td>".$row["contact"] ."</td>
                                <td>".$row["address"] ."</td>
                                
                                <td>".$row["wardid"] ."</td>
                              
                                
                               
                            </tr>";
                                }
                                  
                        
                                
                                ?>    
                            </tbody>
                            </table>
                        </div>
                        <div class="pd-data list-style">
                            <ul>
                                <li>
                                    <div class="data"><label for="pu-contact">Staff ID</label>
                                        <select id="sd-id">
                                            <
                                            
                                            </select></div>
                                </li>


                            </ul>

                        </div><button>Delete</button>
                    </div>
                </div>
            </div>
        </div>

        <!--    Ward Page  -->


        <div class="wards-content pages">
            <div class="header">
                <h2>Wards</h2>
            </div>
            <div class="w-content">
                <div class="w-header">
                    <div class="items">
                        <ul>
                            <li><button id="w-a0">Show All</button></li>
                            <li><button id="w-a1">Add New</button></li>
                            <li><button id="w-a2">Update</button></li>
                            <li><button id="w-a3">Delete</button></li>
                        </ul>
                    </div>
                </div>
                <div class="w-content">
                    <div class="w-b0">
                        <div class="table-position">
                            <table class="fixed_header">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Condition</th>
                                    
                                        <th>Beds</th>
                                        <th>Staff</th>
                                        <th>Reports</th>

                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                $crud= new crud(); 
                                $result = $crud->selectalldata("wards"); 
                                if(!$result){
                                    die("invalid query".$conn->errno);
                                }
                                while($row=$result->fetch_assoc()){
                                    echo "<form action='downloadreport.php' method='post'><tr>
                                <td class='near'>".$row["wardid"] ."</td>
                                <td>".$row["wardname"] ."</td>
                                
                                <td>".$row["wardcondition"] ."</td>
                                <td>".$row["beds"] ."</td>
                                <td>".$row["staff"] ."</td>
                                
                              
                                
                                <td><button name='downloadbtn' class='wDownloadBtn'><a >Download</a></button></td>
                            </tr></form>";
                                }
                                  
                        
                                
                                ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="w-b1">
                        <div class="add-new list-style" id="p-a1">
                        <form action="managedatabase.php" method="post">
                                <ul>
                                    <li>
                                        <div class="p-add-new"><label for="fname">Ward Name</label>
                                            <input type="text" id="pa-fname" name="name" placeholder="Ward Name.."></div>
                                    </li>

                                   

                                    <li>
                                        <div class="p-add-new"><label for="fname">Total Beds</label>
                                            <input type="text" id="pa-condition" name="beds" placeholder="Beds"></div>
                                    </li>
                                    <li>
                                        <div class="p-add-new"><label for="fname">Total Staff</label>
                                            <input type="text" id="pa-age" name="staff" placeholder="Staff"></div>
                                    </li>
                                    <li>
                                        <div class="p-add-new"><label for="fname">Condition</label>
                                            <input type="text" id="pa-age" name="condition" placeholder="Condition.."></div>
                                    </li>




                                </ul>
                            
                            <button name='w-addbtn'>Add</button></form>
                        </div>
                    </div>
                    <div class="w-b2">
                        <div class="table-position">
                            <table class="fixed_header">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Condition</th>
                                        
                                        <th>Beds</th>
                                        <th>Staff</th>

                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                $crud= new crud(); 
                                $result = $crud->selectalldata("wards"); 
                                if(!$result){
                                    die("invalid query".$conn->errno);
                                }
                                while($row=$result->fetch_assoc()){
                                    echo "<tr>
                                <td>".$row["wardid"] ."</td>
                                <td>".$row["wardname"] ."</td>
                                
                                <td>".$row["wardcondition"] ."</td>
                                <td>".$row["beds"] ."</td>
                                <td>".$row["staff"] ."</td>
                                
                              
                                
                             
                            </tr>";
                                }
                                  
                        
                                
                                ?>
                                    
                                </tbody>
                            </table>
                        </div>
                        <div class="pu-data list-style">
                            <ul>
                            <li>
                                    <div class="data"><label for="pu-contact">Ward Id</label>
                                    <select id="wu-id">
                                            
                                            
                                            </select>
                                        </div>
                                </li>
                            

                                <li>
                                    <div class="data"><label for="pu-contact">Beds</label>
                                        <input type="text" id="pu-contact" name="firstname" placeholder="Beds"></div>
                                </li>
                                <li>
                                    <div class="data"><label for="fname">Staff</label>
                                        <input type="text" id="pu-condition" name="firstname" placeholder="Staff"></div>
                                </li>
                               



                            </ul>

                        </div><button>Update</button>
                    </div>
                    <div class="w-b3">
                        <div class="table-position">
                            <table class="fixed_header">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Condition</th>
                                    
                                        <th>Beds</th>
                                        <th>Staff</th>

                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                $crud= new crud(); 
                                $result = $crud->selectalldata("wards"); 
                                if(!$result){
                                    die("invalid query".$conn->errno);
                                }
                                while($row=$result->fetch_assoc()){
                                    echo "<tr>
                                <td>".$row["wardid"] ."</td>
                                <td>".$row["wardname"] ."</td>
                                
                                <td>".$row["wardcondition"] ."</td>
                                <td>".$row["beds"] ."</td>
                                <td>".$row["staff"] ."</td>
                                
                              
                                
                               
                            </tr>";
                                }
                                  
                        
                                
                                ?>
                                    
                                </tbody>
                            </table>
                        </div>
                        <div class="pd-data list-style">
                            <ul>
                                <li>
                                    <div class="data"><label for="pu-contact">Ward ID</label>
                                        <select id="wd-id">
                                            <option value="male">1</option>
                                            
                                            </select></div>
                                </li>


                            </ul>

                        </div><button>Delete</button>
                    </div>
                </div>
            </div>
        </div>

        <!--    Report Page  -->


        

        <!--    Log Out Page  -->


        <div class="logout-content pages">
            <div class="header">
                <h2>Log Out</h2>
            </div>
            <div class="l-content">
                <h1><button><a href="logout.php">Log Out</a></button></h1>
            </div>
        </div>
    </div>
</body>

</html>