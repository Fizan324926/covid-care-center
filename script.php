<?php 
include "connection.php";
include "FPDF/fpdf.php";
?>
<?php 
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }
      // patient data
      $conf_query = "select * from patient";
      $conf_result=mysqli_query($conn, $conf_query);
      $conf_result=$conf_result->num_rows;
      // get patient ids
      $pid_query = "select patientid from patient";
      $pid_result=mysqli_query($conn, $pid_query);
      $pid_list=[];
      while($row=$pid_result->fetch_assoc()){
          array_push($pid_list,$row['patientid']);
      }
      // dead patient
      $dead_query = "select * from patient where patientstatus='dead'";
      $dead_result=mysqli_query($conn, $dead_query);
      $dead_result=$dead_result->num_rows;
      //recovered patient
      $rec_query = "select * from patient where patientstatus='recovered'";
      $rec_result=mysqli_query($conn, $rec_query);
      $rec_result=$rec_result->num_rows;
      // total beds
      $tb_query = "select beds from wards";
      $tb_result1=mysqli_query($conn, $tb_query);
      $tb_result=0;
      while($row=$tb_result1->fetch_assoc()){
          $tb_result=$tb_result+$row['beds'];
      }
      
    

      // total staff
      $ts_query = "select * from staff";
      $ts_result1=mysqli_query($conn, $ts_query);
      $ts_result=$ts_result1->num_rows;
      
      // total wards
      $tw_query = "select * from wards";
      $tw_result=mysqli_query($conn, $tw_query);
      $tw_result=$tw_result->num_rows;
      
        
    ?>


<script>
$(document).ready(function() {
    showHome();
    screens = [showHome, showPatients, showStaff, showWards, showLogOut];
    for (i = 0; i < 6; i++) { $(".navigation ul li:eq(" + i + ")").click(screens[i]); }
    $("table tr").click(function() {
        $(this).addClass('selected').siblings().removeClass('selected');
    });
  
   // $("#s-button").click(signUp);
})

function signUp() {
    var name = $("#s-name");
    var userName = $("#s-username");
    var email = $("#s-email");
    var pass = $("#s-pass");
    var repass = $("#s-repass");
    if (!name.val() || !userName.val() || !email.val() || !pass.val() || !repass.val()) {
        alert("Values Can't be ampty");
    } else {
        var emailValue = email.val().toString();
        if (emailValue.indexOf("@") != -1 && pass.val().toString() == repass.val().toString()) {
         
            
        } else { alert("pass doesn't match") }
    }
}


function showHome() {
    $(".patients-content").css("display", "none");
    $(".home-content").css("display", "block");
    $(".staff-content").css("display", "none");
    $(".wards-content").css("display", "none");
    $(".reports-content").css("display", "none");
    $(".logout-content").css("display", "none");
    getHomeData();
}

function showPatients() {
    $(".patients-content").css("display", "block");
    $(".home-content").css("display", "none");
    $(".staff-content").css("display", "none");
    $(".wards-content").css("display", "none");
    $(".reports-content").css("display", "none");
    $(".logout-content").css("display", "none");
    getPatientsdata();
}

function getPatientsdata() {
    for (i = 1; i < 4; i++) {
        $("#p-a" + i).hide()
    }
    // $("#a2").click(showPAll);
    list = [showPAll, showPAddNew, showPUpdate, showPDelete]
    for (i = 0; i < 4; i++) {
        $("#b-a" + i).click(list[i])
    }

    // set values from database
    // set ward ids
    var wcount=<?php echo json_encode($tw_result);?>;
    var b='';
    for(i=1;i<=wcount;i++){
        b=b+"<option>"+i+"</option>";
    }
    $("#pa-ward").html(b);
    $("#pa-wardid").html(b);
    //set patietn ids
    var pids=<?php echo json_encode($conf_result);?>;
    var b='';
    for(i=1;i<=pids;i++){
        b=b+"<option>"+i+"</option>";
    }
    
    $("#pu-id").html(b);
    $("#pd-id").html(b);


}

function table() { alert(document.getElementById("able").rows[0].innerHTML); }


function showPAll() {

    $("#p-a0").show();
    $("#p-a1").hide();
    $("#p-a2").hide();
    $("#p-a3").hide();
}

function showPAddNew() {
    $("#p-a0").hide();
    $("#p-a1").show();
    $("#p-a2").hide();
    $("#p-a3").hide();
    $("#pat-add-btn").click(addPatData);
}
function addPatData(){}

function showPUpdate() {
    $("#p-a0").hide();
    $("#p-a1").hide();
    $("#p-a2").show();
    $("#p-a3").hide();
}

function showPDelete() {
    $("#p-a0").hide();
    $("#p-a1").hide();
    $("#p-a2").hide();
    $("#p-a3").show();
}



function showStaff() {
    $(".patients-content").css("display", "none");
    $(".home-content").css("display", "none");
    $(".staff-content").css("display", "block");
    $(".wards-content").css("display", "none");
    $(".reports-content").css("display", "none");
    $(".logout-content").css("display", "none");

    getStaffdata();
}

function getStaffdata() {

    for (i = 1; i < 4; i++) {
        $(".s-b" + i).hide();

    }

    // $("#a2").click(showPAll);
    list = [showSAll, showSAddNew, showSUpdate, showSDelete]
    for (i = 0; i < 4; i++) {
        $("#s-a" + i).click(list[i])
    }
    //set staff ids
    var sids=<?php echo json_encode($tw_result);?>;
    var b='';
    for(i=1;i<=sids;i++){
        b=b+"<option>"+i+"</option>";
    }
    $("#sa-id").html(b);
    $("#pa-wardid").html(b);
    $("#su-wid").html(b); 
    $("#sd-id").html(b);
    var suds=<?php echo json_encode($ts_result);?>;
    var b='';
    for(i=1;i<=suds;i++){
        b=b+"<option>"+i+"</option>";
    }
    
    $("#su-id").html(b);
    $("#sd-id").html(b);
    // set p ids in staff

}

function showSAll() {
    $(".s-b0").show();
    $(".s-b1").hide();
    $(".s-b2").hide();
    $(".s-b3").hide();
}

function showSAddNew() {
    $(".s-b0").hide();
    $(".s-b1").show();
    $(".s-b2").hide();
    $(".s-b3").hide();
}

function showSUpdate() {
    $(".s-b0").hide();
    $(".s-b1").hide();
    $(".s-b2").show();
    $(".s-b3").hide();
}

function showSDelete() {
    $(".s-b0").hide();
    $(".s-b1").hide();
    $(".s-b2").hide();
    $(".s-b3").show();
}



function showWards() {
    $(".patients-content").css("display", "none");
    $(".home-content").css("display", "none");
    $(".staff-content").css("display", "none");
    $(".wards-content").css("display", "block");
    $(".reports-content").css("display", "none");
    $(".logout-content").css("display", "none");
    getWardData();

}

function getWardData() {

    for (i = 1; i < 4; i++) {
        $(".w-b" + i).hide();

    }

    // $("#a2").click(showPAll);
    list = [showWAll, showWAddNew, showWUpdate, showWDelete]
    for (i = 0; i < 4; i++) {
        $("#w-a" + i).click(list[i])
    }
    // set ward id // set ward ids
    var wcount=<?php echo json_encode($tw_result);?>;
    var b='';
    for(i=1;i<=wcount;i++){
        b=b+"<option>"+i+"</option>";
    }
    $("#pa-ward").html(b);
    $("#wd-id").html(b);
    $("#wu-id").html(b);
    
}

function showWAll() {
    $(".w-b0").show();
    $(".w-b1").hide();
    $(".w-b2").hide();
    $(".w-b3").hide();
}

function showWAddNew() {
    $(".w-b0").hide();
    $(".w-b1").show();
    $(".w-b2").hide();
    $(".w-b3").hide();
}

function showWUpdate() {
    $(".w-b0").hide();
    $(".w-b1").hide();
    $(".w-b2").show();
    $(".w-b3").hide();
}

function showWDelete() {
    $(".w-b0").hide();
    $(".w-b1").hide();
    $(".w-b2").hide();
    $(".w-b3").show();
}


function showReports() {
    $(".patients-content").css("display", "none");
    $(".home-content").css("display", "none");
    $(".staff-content").css("display", "none");
    $(".wards-content").css("display", "none");
    $(".reports-content").css("display", "block");
    $(".logout-content").css("display", "none");

}

function showLogOut() {
    $(".patients-content").css("display", "none");
    $(".home-content").css("display", "none");
    $(".staff-content").css("display", "none");
    $(".wards-content").css("display", "none");
    $(".reports-content").css("display", "none");
    $(".logout-content").css("display", "block");

}



function getHomeData() {
    
    homeData = [
        <?php echo json_encode($conf_result);?>,
        <?php echo json_encode($dead_result);?>,
        <?php echo json_encode($rec_result);?>, 
        <?php echo json_encode($tw_result);?>,
        <?php echo json_encode($tb_result);?>,
        <?php echo json_encode($ts_result);?>];
    for (i = 0; i < 6; i++) {
        $(".c-values:eq(" + i + ")").empty().append(homeData[i])
    }
}

//             table selected modification</script>