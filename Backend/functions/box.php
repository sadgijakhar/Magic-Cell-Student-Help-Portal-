<?php
include('./includes/connect.php');

// -----------------All Quieris------------
function getdatabox(){
    global $con;
    if(isset($_GET['id'])){
    $select_query = "Select * from `query`";
    $result_query = mysqli_query($con, $select_query);
    while($row_data = mysqli_fetch_assoc($result_query)){

        $query_id = $row_data['id'];
        $query_name = $row_data['name'];
        $query_email = $row_data['email'];
        $query_rollno = $row_data['rollno'];
        $query_mobile_no = $row_data['mobile_no'];
        $query_year = $row_data['year'];
        $query_program = $row_data['program'];
        echo "<div class='col-md-6'>
        <div class='card text-center'>
            <div class='card-header'>
                <ul class='nav nav-pills card-header-pills'>
                <li class='nav-item'>
                <a class='nav-link active' href='allqueries.php?id=$query_id'>Info</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href='query.php?id=$query_id'>Query</a>
                </li>
                </ul>
            </div>
            <div class='card-body'>
                <h5 class='cah1'> Name : $query_name</h5>
                <h5 class='cah1'>Email : $query_email</h5>
                <h5 class='cah1'>Roll No. : $query_rollno</h5>
                <h5 class='cah1'>Mobile Number : $query_mobile_no</h5>
                <h5 class='cah1'>Year : $query_year</h5>
                <h5 class='cah2'>Program: $query_program</h5> 
                     </div>    
            </div>
    </div>";
    }
}
}
function delete_1(){
    global $con;
    // $delete = "Delete from `query` WHERE (query.id) in (select solved.id from `solved`)";
    // $result = mysqli_query($con, $delete);
    if(isset($_GET['id'])){
        $row_id = $_GET['id'];
        $check_query = "SELECT COUNT(*) as count
        FROM `Dr.Bindu`
        WHERE id = $row_id
        UNION
        SELECT COUNT(*) as count
        FROM `Kshitij`
        WHERE id = $row_id
        UNION
        SELECT COUNT(*) as count
        FROM `Sadgi`
        WHERE id = $row_id";

        // Execute the query
        $check_result = mysqli_query($con, $check_query);

        // Loop through the results
        while ($row = mysqli_fetch_assoc($check_result)) {
            if ($row["count"] > 0) {
                // Query to delete the row
                $delete_query = "DELETE FROM `query`
                WHERE id = $row_id";

                // Execute the query
                $delete_result = mysqli_query($con, $delete_query);

                // Check if the delete was successful
                
                break;
            }
        }
        header("Location: allqueries.php");
    }
}

function viewdetails(){
    global $con;
    if(isset($_GET['id'])){
        $dataid = $_GET['id'];
        $select_query = "Select * from `query` where id = $dataid";
        $result_query = mysqli_query($con, $select_query);
        while($row_data = mysqli_fetch_assoc($result_query)){

            $query_id = $row_data['id'];
            $query_name = $row_data['name'];
            $query_email = $row_data['email'];
            $query_rollno = $row_data['rollno'];
            $query_mobile_no = $row_data['mobile_no'];
            $query_year = $row_data['year'];
            $query_program = $row_data['program'];
            $query_issue = $row_data['issue'];            
            $query_date = $row_data['date'];
            $query_brief = $row_data['brief'];

            
            echo "
            <div class='card text-center'>
                <div class='card-header'>
                    <ul class='nav nav-pills card-header-pills'>
                    <li class='nav-item'>
                    <a class='nav-link' href='allqueries.php?id=$query_id'>Info</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link active' href='query.php?id=$query_id'>Query</a>
                    </li>
                    </ul>
                </div>
                <div class='card-body'>
                <div class='container text-left'>
                    <div class='row justify-content-start mb-2'>
                        <div class='col-4'>
                            <h5 class='cah1'> <strong>Name</strong> </h5>
                        </div>
                        <div class='col-8 text-align-left p-0'>
                            <h6 class='cah1'>$query_name</h6>
                        </div>
                    </div>
                    <div class='row justify-content-start mb-2'>
                        <div class='col-4'>
                            <h5 class='cah1'> <strong>Email</strong> </h5>
                        </div>
                        <div class='col-8 text-align-left p-0' text-align-left>
                            <h6 class='cah1'>$query_email</h6>
                        </div>
                    </div>
                    <div class='row justify-content-start mb-2'>
                        <div class='col-4'>
                            <h5 class='cah1'> <strong>Roll No.</strong> </h5>
                        </div>
                        <div class='col-8 text-align-left p-0'>
                            <h6 class='cah1'>$query_rollno</h6>
                        </div>
                    </div>
                    <div class='row justify-content-start mb-2'>
                        <div class='col-4'>
                            <h5 class='cah1'> <strong>Mobile No.</strong> </h5>
                        </div>
                        <div class='col-8 text-align-left p-0'>
                            <h6 class='cah1'>$query_mobile_no</h6>
                        </div>
                    </div>
                    <div class='row justify-content-start mb-2'>
                        <div class='col-4'>
                            <h5 class='cah1'> <strong>Year</strong> </h5>
                        </div>
                        <div class='col-8 text-align-left p-0'>
                            <h6 class='cah1'>$query_year</h6>
                        </div>
                    </div>
                    <div class='row justify-content-start mb-2'>
                        <div class='col-4'>
                            <h5 class='cah1'> <strong>Program</strong> </h5>
                        </div>
                        <div class='col-8 text-align-left p-0'>
                            <h6 class='cah1'>$query_program</h6>
                        </div>
                    </div>
                    
                    <div class='row justify-content-start mb-2 text-align-left'>
                        <div class='col-4'>
                            <h5 class='cah1'> <strong>Issue Type</strong> </h5>
                        </div>
                        <div class='col-8 text-align-left p-0'>
                            <h6 class='cah1'>$query_issue</h6>
                        </div>
                    </div>
                    <div class='row justify-content-start mb-2'>
                        <div class='col-4'>
                            <h5 class='cah1'> <strong>Date - Time</strong> </h5>
                        </div>
                        <div class='col-8 text-align-left p-0'>
                            <h6 class='cah1'>$query_date</h6>
                        </div>
                    </div>

                    <div class='row justify-content-flex-start mb-2 '>
                        <div class='col-4'>
                            <h5 class='cah1'><strong>Description</strong></h5>
                        </div>
                        <div class='col-md-8 text-align-left p-0'>
                            <h6 class='cah1'>$query_brief</h6>
                        </div>
                    </div>
                    <div class='row justify-content-flex-start mb-2 '>
                        <div class='col-4'>
                            <h5 class='cah1'><strong>Assigned To</strong></h5>
                        </div>
                        <div class='col-md-3 text-align-left p-0'>
                        <form action='' method='post' enctype=multipart/form-data'>


                       

                            <div class=col-md-12 '>
                               
                                <select class='form-select ' name ='year' id='year' required='required'>
                                <option selected disabled value=''>Assigned</option>
                                <option value='Dr. Bindu Thakral'>Dr. Bindu Thakral</option>
                                <option value='Mr. Kshitij Gupta'>Mr. Kshitij Gupta</option>
                                <option value='Sadgi Jakhar'>Sadgi Jakhar</option>
                                </select>
                            </div>

                        

                        <div class='form-button mt-3'>
                            <input type='submit' name='register' id='register' class='btn btn-success mb-3 px-3' value = 'Assigned'>
                        </div>
                    </div>
                    
                            
                </div>
        </div>";
        }
    }
   
}

// -----------------------Dr.Bindu----------------------
function getdatabox1(){
    global $con;
    if(isset($_GET['id'])){
    $select_query = "Select * from `Dr.Bindu`";
    $result_query = mysqli_query($con, $select_query);
    while($row_data = mysqli_fetch_assoc($result_query)){

        $query_id = $row_data['id'];
        $query_name = $row_data['name'];
        $query_email = $row_data['email'];
        $query_rollno = $row_data['rollno'];
        $query_mobile_no = $row_data['mobile_no'];
        $query_year = $row_data['year'];
        $query_program = $row_data['program'];
        echo "<div class='col-md-6'>
        <div class='card text-center'>
            <div class='card-header'>
                <ul class='nav nav-pills card-header-pills'>
                <li class='nav-item'>
                <a class='nav-link active' href='dr.bindumain.php?id=$query_id'>Info</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href='Dr.Bindu.php?id=$query_id'>Query</a>
                </li>
                </ul>
            </div>
            <div class='card-body'>
                <h5 class='cah1'> Name : $query_name</h5>
                <h5 class='cah1'>Email : $query_email</h5>
                <h5 class='cah1'>Roll No. : $query_rollno</h5>
                <h5 class='cah1'>Mobile Number : $query_mobile_no</h5>
                <h5 class='cah1'>Year : $query_year</h5>
                <h5 class='cah2'>Program: $query_program</h5> 
             </div>    
        </div>
    </div>";
    }
}
}
function delete2(){
    global $con;
    
    $delete_query = "DELETE FROM `Dr.Bindu` WHERE `id` IN (SELECT `id` FROM `solved`)";
    $delete_result = mysqli_query($con, $delete_query);
    
    
}

function viewdetails2(){
    global $con;
    if(isset($_GET['id'])){
        $dataid = $_GET['id'];
        $select_query = "Select * from `Dr.Bindu` where id = $dataid";
        $result_query = mysqli_query($con, $select_query);
        while($row_data = mysqli_fetch_assoc($result_query)){

            $query_id = $row_data['id'];
            $query_name = $row_data['name'];
            $query_email = $row_data['email'];
            $query_rollno = $row_data['rollno'];
            $query_mobile_no = $row_data['mobile_no'];
            $query_year = $row_data['year'];
            $query_program = $row_data['program'];
            $query_issue = $row_data['issue'];            
            $query_date = $row_data['date'];
            $query_brief = $row_data['brief'];

            
            echo "
            <div class='card text-center'>
                <div class='card-header'>
                    <ul class='nav nav-pills card-header-pills'>
                    <li class='nav-item'>
                    <a class='nav-link' href='dr.bindumain.php?id=$query_id'>Info</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link active' href='Dr.Bindu.php?id=$query_id'>Query</a>
                    </li>
                    </ul>
                </div>
                <div class='card-body'>
                <div class='container text-left'>
                    <div class='row justify-content-start mb-2'>
                        <div class='col-4'>
                            <h5 class='cah1'> <strong>Name</strong> </h5>
                        </div>
                        <div class='col-8 text-align-left p-0'>
                            <h6 class='cah1'>$query_name</h6>
                        </div>
                    </div>
                    <div class='row justify-content-start mb-2'>
                        <div class='col-4'>
                            <h5 class='cah1'> <strong>Email</strong> </h5>
                        </div>
                        <div class='col-8 text-align-left p-0' text-align-left>
                            <h6 class='cah1'>$query_email</h6>
                        </div>
                    </div>
                    <div class='row justify-content-start mb-2'>
                        <div class='col-4'>
                            <h5 class='cah1'> <strong>Roll No.</strong> </h5>
                        </div>
                        <div class='col-8 text-align-left p-0'>
                            <h6 class='cah1'>$query_rollno</h6>
                        </div>
                    </div>
                    <div class='row justify-content-start mb-2'>
                        <div class='col-4'>
                            <h5 class='cah1'> <strong>Mobile No.</strong> </h5>
                        </div>
                        <div class='col-8 text-align-left p-0'>
                            <h6 class='cah1'>$query_mobile_no</h6>
                        </div>
                    </div>
                    <div class='row justify-content-start mb-2'>
                        <div class='col-4'>
                            <h5 class='cah1'> <strong>Year</strong> </h5>
                        </div>
                        <div class='col-8 text-align-left p-0'>
                            <h6 class='cah1'>$query_year</h6>
                        </div>
                    </div>
                    <div class='row justify-content-start mb-2'>
                        <div class='col-4'>
                            <h5 class='cah1'> <strong>Program</strong> </h5>
                        </div>
                        <div class='col-8 text-align-left p-0'>
                            <h6 class='cah1'>$query_program</h6>
                        </div>
                    </div>
                    
                    <div class='row justify-content-start mb-2 text-align-left'>
                        <div class='col-4'>
                            <h5 class='cah1'> <strong>Issue Type</strong> </h5>
                        </div>
                        <div class='col-8 text-align-left p-0'>
                            <h6 class='cah1'>$query_issue</h6>
                        </div>
                    </div>
                    <div class='row justify-content-start mb-2'>
                        <div class='col-4'>
                            <h5 class='cah1'> <strong>Date - Time</strong> </h5>
                        </div>
                        <div class='col-8 text-align-left p-0'>
                            <h6 class='cah1'>$query_date</h6>
                        </div>
                    </div>

                    <div class='row justify-content-flex-start mb-2 '>
                        <div class='col-4'>
                            <h5 class='cah1'><strong>Description</strong></h5>
                        </div>
                        <div class='col-md-8 text-align-left p-0'>
                            <h6 class='cah1'>$query_brief</h6>
                        </div>
                    </div>
                    <div class='row justify-content-flex-start mb-2 '>
                        <div class='col-4'>
                            <h5 class='cah1'><strong>Remarks</strong></h5>
                        </div>
                        <div class='col-md-4 text-align-left p-0'>
                        <form action='' method='post' enctype=multipart/form-data'>
                            <div class='col-md-12'>
                                <input type='text' name='remark' id='remark' class='form-control m-2' placeholder='Remark' required='required'>
                            </div>
                        
                    
                    <input type='submit' class='btn1 mb-4' name='submit' id='submit' value='Solved'>
                    </form>
                    </div>
                            
                </div>
        </div>";
        }
    }
   
}

// ---------------------Kshitij--------------------
function getdatabox3(){
    global $con;
    if(isset($_GET['id'])){
    $select_query = "Select * from `Kshitij`";
    $result_query = mysqli_query($con, $select_query);
    while($row_data = mysqli_fetch_assoc($result_query)){

        $query_id = $row_data['id'];
        $query_name = $row_data['name'];
        $query_email = $row_data['email'];
        $query_rollno = $row_data['rollno'];
        $query_mobile_no = $row_data['mobile_no'];
        $query_year = $row_data['year'];
        $query_program = $row_data['program'];
        echo "<div class='col-md-6'>
        <div class='card text-center'>
            <div class='card-header'>
                <ul class='nav nav-pills card-header-pills'>
                <li class='nav-item'>
                <a class='nav-link active' href='kshitijmain.php'>Info</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href='kshitij.php?id=$query_id'>Query</a>
                </li>
                </ul>
            </div>
            <div class='card-body'>
                <h5 class='cah1'> Name : $query_name</h5>
                <h5 class='cah1'>Email : $query_email</h5>
                <h5 class='cah1'>Roll No. : $query_rollno</h5>
                <h5 class='cah1'>Mobile Number : $query_mobile_no</h5>
                <h5 class='cah1'>Year : $query_year</h5>
                <h5 class='cah2'>Program: $query_program</h5> 
             </div>    
        </div>
    </div>";
    }
}
}
function delete3(){
    global $con;
    
    $delete_query = "DELETE FROM `Kshitij` WHERE `id` IN (SELECT `id` FROM `solved`)";
    $delete_result = mysqli_query($con, $delete_query);
    
    
}


function viewdetails3(){
    global $con;
    if(isset($_GET['id'])){
        $dataid = $_GET['id'];
        $select_query = "Select * from `Kshitij` where id = $dataid";
        $result_query = mysqli_query($con, $select_query);
        while($row_data = mysqli_fetch_assoc($result_query)){

            $query_id = $row_data['id'];
            $query_name = $row_data['name'];
            $query_email = $row_data['email'];
            $query_rollno = $row_data['rollno'];
            $query_mobile_no = $row_data['mobile_no'];
            $query_year = $row_data['year'];
            $query_program = $row_data['program'];
            $query_issue = $row_data['issue'];            
            $query_date = $row_data['date'];
            $query_brief = $row_data['brief'];

            
            echo "
            <div class='card text-center'>
                <div class='card-header'>
                    <ul class='nav nav-pills card-header-pills'>
                    <li class='nav-item'>
                    <a class='nav-link' href='kshitijmain.php?id=$query_id'>Info</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link active' href='kshitij.php?id=$query_id'>Query</a>
                    </li>
                    </ul>
                </div>
                <div class='card-body'>
                <div class='container text-left'>
                    <div class='row justify-content-start mb-2'>
                        <div class='col-4'>
                            <h5 class='cah1'> <strong>Name</strong> </h5>
                        </div>
                        <div class='col-8 text-align-left p-0'>
                            <h6 class='cah1'>$query_name</h6>
                        </div>
                    </div>
                    <div class='row justify-content-start mb-2'>
                        <div class='col-4'>
                            <h5 class='cah1'> <strong>Email</strong> </h5>
                        </div>
                        <div class='col-8 text-align-left p-0' text-align-left>
                            <h6 class='cah1'>$query_email</h6>
                        </div>
                    </div>
                    <div class='row justify-content-start mb-2'>
                        <div class='col-4'>
                            <h5 class='cah1'> <strong>Roll No.</strong> </h5>
                        </div>
                        <div class='col-8 text-align-left p-0'>
                            <h6 class='cah1'>$query_rollno</h6>
                        </div>
                    </div>
                    <div class='row justify-content-start mb-2'>
                        <div class='col-4'>
                            <h5 class='cah1'> <strong>Mobile No.</strong> </h5>
                        </div>
                        <div class='col-8 text-align-left p-0'>
                            <h6 class='cah1'>$query_mobile_no</h6>
                        </div>
                    </div>
                    <div class='row justify-content-start mb-2'>
                        <div class='col-4'>
                            <h5 class='cah1'> <strong>Year</strong> </h5>
                        </div>
                        <div class='col-8 text-align-left p-0'>
                            <h6 class='cah1'>$query_year</h6>
                        </div>
                    </div>
                    <div class='row justify-content-start mb-2'>
                        <div class='col-4'>
                            <h5 class='cah1'> <strong>Program</strong> </h5>
                        </div>
                        <div class='col-8 text-align-left p-0'>
                            <h6 class='cah1'>$query_program</h6>
                        </div>
                    </div>
                    
                    <div class='row justify-content-start mb-2 text-align-left'>
                        <div class='col-4'>
                            <h5 class='cah1'> <strong>Issue Type</strong> </h5>
                        </div>
                        <div class='col-8 text-align-left p-0'>
                            <h6 class='cah1'>$query_issue</h6>
                        </div>
                    </div>
                    <div class='row justify-content-start mb-2'>
                        <div class='col-4'>
                            <h5 class='cah1'> <strong>Date - Time</strong> </h5>
                        </div>
                        <div class='col-8 text-align-left p-0'>
                            <h6 class='cah1'>$query_date</h6>
                        </div>
                    </div>

                    <div class='row justify-content-flex-start mb-2 '>
                        <div class='col-4'>
                            <h5 class='cah1'><strong>Description</strong></h5>
                        </div>
                        <div class='col-md-8 text-align-left p-0'>
                            <h6 class='cah1'>$query_brief</h6>
                        </div>
                    </div>
                    <div class='row justify-content-flex-start mb-2 '>
                        <div class='col-4'>
                            <h5 class='cah1'><strong>Remarks</strong></h5>
                        </div>
                        <div class='col-md-4 text-align-left p-0'>
                        <form action='' method='post' enctype=multipart/form-data'>
                            <div class='col-md-12'>
                                <input type='text' name='remark' id='remark' class='form-control m-2' placeholder='Remark' required='required'>
                            </div>
                        
                    
                    <input type='submit' class='btn1 mb-4' name='submit' id='submit' value='Solved'>
                    </form>
                    </div>
                            
                </div>
        </div>";
        }
    }
   
}
// ---------------------Sadgi--------------------
function getdatabox4(){
    global $con;
    if(isset($_GET['id'])){
    $select_query = "Select * from `Sadgi`";
    $result_query = mysqli_query($con, $select_query);
    while($row_data = mysqli_fetch_assoc($result_query)){

        $query_id = $row_data['id'];
        $query_name = $row_data['name'];
        $query_email = $row_data['email'];
        $query_rollno = $row_data['rollno'];
        $query_mobile_no = $row_data['mobile_no'];
        $query_year = $row_data['year'];
        $query_program = $row_data['program'];
        echo "<div class='col-md-6'>
        <div class='card text-center'>
            <div class='card-header'>
                <ul class='nav nav-pills card-header-pills'>
                <li class='nav-item'>
                <a class='nav-link active' href='sadgimain.php?id = $query_id'>Info</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href='Sadgi.php?id=$query_id'>Query</a>
                </li>
                </ul>
            </div>
            <div class='card-body'>
                <h5 class='cah1'> Name : $query_name</h5>
                <h5 class='cah1'>Email : $query_email</h5>
                <h5 class='cah1'>Roll No. : $query_rollno</h5>
                <h5 class='cah1'>Mobile Number : $query_mobile_no</h5>
                <h5 class='cah1'>Year : $query_year</h5>
                <h5 class='cah2'>Program: $query_program</h5> 
             </div>    
        </div>
    </div>";
    }
}
}
function delete4(){
    global $con;
    $delete_query = "DELETE FROM `Sadgi` WHERE `id` IN (SELECT `id` FROM `solved`)";
    $delete_result = mysqli_query($con, $delete_query);
}


function viewdetails4(){
    global $con;
    if(isset($_GET['id'])){
        $dataid = $_GET['id'];
        $select_query = "Select * from `Sadgi` where id = $dataid";
        $result_query = mysqli_query($con, $select_query);
        while($row_data = mysqli_fetch_assoc($result_query)){

            $query_id = $row_data['id'];
            $query_name = $row_data['name'];
            $query_email = $row_data['email'];
            $query_rollno = $row_data['rollno'];
            $query_mobile_no = $row_data['mobile_no'];
            $query_year = $row_data['year'];
            $query_program = $row_data['program'];
            $query_issue = $row_data['issue'];            
            $query_date = $row_data['date'];
            $query_brief = $row_data['brief'];

            
            echo "
            <div class='card text-center'>
                <div class='card-header'>
                    <ul class='nav nav-pills card-header-pills'>
                    <li class='nav-item'>
                    <a class='nav-link' href='sadgimain.php?id=$query_id'>Info</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link active' href='Sadgi.php?id=$query_id'>Query</a>
                    </li>
                    </ul>
                </div>
                <div class='card-body'>
                <div class='container text-left'>
                    <div class='row justify-content-start mb-2'>
                        <div class='col-4'>
                            <h5 class='cah1'> <strong>Name</strong> </h5>
                        </div>
                        <div class='col-8 text-align-left p-0'>
                            <h6 class='cah1'>$query_name</h6>
                        </div>
                    </div>
                    <div class='row justify-content-start mb-2'>
                        <div class='col-4'>
                            <h5 class='cah1'> <strong>Email</strong> </h5>
                        </div>
                        <div class='col-8 text-align-left p-0' text-align-left>
                            <h6 class='cah1'>$query_email</h6>
                        </div>
                    </div>
                    <div class='row justify-content-start mb-2'>
                        <div class='col-4'>
                            <h5 class='cah1'> <strong>Roll No.</strong> </h5>
                        </div>
                        <div class='col-8 text-align-left p-0'>
                            <h6 class='cah1'>$query_rollno</h6>
                        </div>
                    </div>
                    <div class='row justify-content-start mb-2'>
                        <div class='col-4'>
                            <h5 class='cah1'> <strong>Mobile No.</strong> </h5>
                        </div>
                        <div class='col-8 text-align-left p-0'>
                            <h6 class='cah1'>$query_mobile_no</h6>
                        </div>
                    </div>
                    <div class='row justify-content-start mb-2'>
                        <div class='col-4'>
                            <h5 class='cah1'> <strong>Year</strong> </h5>
                        </div>
                        <div class='col-8 text-align-left p-0'>
                            <h6 class='cah1'>$query_year</h6>
                        </div>
                    </div>
                    <div class='row justify-content-start mb-2'>
                        <div class='col-4'>
                            <h5 class='cah1'> <strong>Program</strong> </h5>
                        </div>
                        <div class='col-8 text-align-left p-0'>
                            <h6 class='cah1'>$query_program</h6>
                        </div>
                    </div>
                    
                    <div class='row justify-content-start mb-2 text-align-left'>
                        <div class='col-4'>
                            <h5 class='cah1'> <strong>Issue Type</strong> </h5>
                        </div>
                        <div class='col-8 text-align-left p-0'>
                            <h6 class='cah1'>$query_issue</h6>
                        </div>
                    </div>
                    <div class='row justify-content-start mb-2'>
                        <div class='col-4'>
                            <h5 class='cah1'> <strong>Date - Time</strong> </h5>
                        </div>
                        <div class='col-8 text-align-left p-0'>
                            <h6 class='cah1'>$query_date</h6>
                        </div>
                    </div>

                    <div class='row justify-content-flex-start mb-2 '>
                        <div class='col-4'>
                            <h5 class='cah1'><strong>Description</strong></h5>
                        </div>
                        <div class='col-md-8 text-align-left p-0'>
                            <h6 class='cah1'>$query_brief</h6>
                        </div>
                    </div>
                    <div class='row justify-content-flex-start mb-2 '>
                        <div class='col-4'>
                            <h5 class='cah1'><strong>Remarks</strong></h5>
                        </div>
                        <div class='col-md-4 text-align-left p-0'>
                        <form action='' method='post' enctype=multipart/form-data'>
                            <div class='col-md-12'>
                                <input type='text' name='remark' id='remark' class='form-control m-2' placeholder='Remark' required='required'>
                            </div>
                        
                    
                    <input type='submit' class='btn1 mb-4' name='submit' id='submit' value='Solved'>
                    </form>
                    </div>
                            
                </div>
        </div>";
        }
    }
   
}


// ---------------------Solved-----------------
function solry(){
    global $con;
    // if(isset($_GET['id'])){
    $select_query = "Select * from `solved`";
    $result_query = mysqli_query($con, $select_query);
    while($row_data = mysqli_fetch_assoc($result_query)){

        $query_id = $row_data['id'];
        $query_name = $row_data['name'];
        $query_email = $row_data['email'];
        $query_rollno = $row_data['rollno'];
        $query_mobile_no = $row_data['mobile_no'];
        $query_year = $row_data['year'];
        $query_program = $row_data['program'];
    
        echo "<div class='col-md-6'>
        <div class='card text-center'>
            <div class='card-header'>
                <ul class='nav nav-pills card-header-pills'>
                <li class='nav-item'>
                <a class='nav-link active' href='solved.php?id=$query_id'>Info</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href='solvedquery.php?id=$query_id'>Query</a>
                </li>
                </ul>
            </div>
            <div class='card-body'>
                <h5 class='cah1'> Name : $query_name</h5>
                <h5 class='cah1'>Email : $query_email</h5>
                <h5 class='cah1'>Roll No. : $query_rollno</h5>
                <h5 class='cah1'>Mobile Number : $query_mobile_no</h5>
                <h5 class='cah1'>Year : $query_year</h5>
                <h5 class='cah2'>Program: $query_program</h5> 
            </div>    
        </div>
    </div>";
    }
}

function viewdetails1(){
    global $con;
    if(isset($_GET['id'])){
        $dataid = $_GET['id'];
        $select_query = "Select * from `solved` where id = $dataid";
        $result_query = mysqli_query($con, $select_query);
        while($row_data = mysqli_fetch_assoc($result_query)){

            $query_id = $row_data['id'];
            $query_name = $row_data['name'];
            $query_email = $row_data['email'];
            $query_rollno = $row_data['rollno'];
            $query_mobile_no = $row_data['mobile_no'];
            $query_year = $row_data['year'];
            $query_program = $row_data['program'];
            $query_issue = $row_data['issue'];            
            $query_date = $row_data['date'];
            $query_brief = $row_data['brief'];
            $query_remarks = $row_data['Remarks'];

            
            echo "
            <div class='card text-center'>
                <div class='card-header'>
                    <ul class='nav nav-pills card-header-pills'>
                    <li class='nav-item'>
                    <a class='nav-link' href='solved.php?id=$query_id'>Info</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link active' href='solvedquery.php?id=$query_id'>Query</a>
                    </li>
                    </ul>
                </div>
                <div class='card-body'>
                <div class='container text-left'>
                    <div class='row justify-content-start mb-2'>
                        <div class='col-4'>
                            <h5 class='cah1'> <strong>Name</strong> </h5>
                        </div>
                        <div class='col-8 text-align-left p-0'>
                            <h6 class='cah1'>$query_name</h6>
                        </div>
                    </div>
                    <div class='row justify-content-start mb-2'>
                        <div class='col-4'>
                            <h5 class='cah1'> <strong>Email</strong> </h5>
                        </div>
                        <div class='col-8 text-align-left p-0' text-align-left>
                            <h6 class='cah1'>$query_email</h6>
                        </div>
                    </div>
                    <div class='row justify-content-start mb-2'>
                        <div class='col-4'>
                            <h5 class='cah1'> <strong>Roll No.</strong> </h5>
                        </div>
                        <div class='col-8 text-align-left p-0'>
                            <h6 class='cah1'>$query_rollno</h6>
                        </div>
                    </div>
                    <div class='row justify-content-start mb-2'>
                        <div class='col-4'>
                            <h5 class='cah1'> <strong>Mobile No.</strong> </h5>
                        </div>
                        <div class='col-8 text-align-left p-0'>
                            <h6 class='cah1'>$query_mobile_no</h6>
                        </div>
                    </div>
                    <div class='row justify-content-start mb-2'>
                        <div class='col-4'>
                            <h5 class='cah1'> <strong>Year</strong> </h5>
                        </div>
                        <div class='col-8 text-align-left p-0'>
                            <h6 class='cah1'>$query_year</h6>
                        </div>
                    </div>
                    <div class='row justify-content-start mb-2'>
                        <div class='col-4'>
                            <h5 class='cah1'> <strong>Program</strong> </h5>
                        </div>
                        <div class='col-8 text-align-left p-0'>
                            <h6 class='cah1'>$query_program</h6>
                        </div>
                    </div>
                    
                    <div class='row justify-content-start mb-2 text-align-left'>
                        <div class='col-4'>
                            <h5 class='cah1'> <strong>Issue Type</strong> </h5>
                        </div>
                        <div class='col-8 text-align-left p-0'>
                            <h6 class='cah1'>$query_issue</h6>
                        </div>
                    </div>
                    <div class='row justify-content-start mb-2'>
                        <div class='col-4'>
                            <h5 class='cah1'> <strong>Date - Time</strong> </h5>
                        </div>
                        <div class='col-8 text-align-left p-0'>
                            <h6 class='cah1'>$query_date</h6>
                        </div>
                    </div>

                    <div class='row justify-content-flex-start mb-2 '>
                        <div class='col-4'>
                            <h5 class='cah1'><strong>Description</strong></h5>
                        </div>
                        <div class='col-md-8 text-align-left p-0'>
                            <h6 class='cah1'>$query_brief</h6>
                        </div>
                    </div>
                    <div class='row justify-content-flex-start mb-2 '>
                        <div class='col-4'>
                            <h5 class='cah1'><strong>Remarks</strong></h5>
                        </div>
                        <div class='col-md-8 text-align-left p-0'>
                            <h6 class='cah1'>$query_remarks</h6>
                        </div>
                    </div>
                            
                </div>
        </div>";
        }
    }
   
}

?>