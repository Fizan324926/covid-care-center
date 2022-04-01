$(document).ready(function() {
    showHome();
    screens = [showHome, showPatients, showStaff, showWards, showReports, showLogOut];
    for (i = 0; i < 6; i++) { $(".navigation ul li:eq(" + i + ")").click(screens[i]); }
    $("table tr").click(function() {
        $(this).addClass('selected').siblings().removeClass('selected');
    });

})

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
}

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
    homeData = [23, 432, 56, 24, 76, 46, 76, 54];
    for (i = 0; i < 9; i++) {
        $(".c-values:eq(" + i + ")").empty().append(homeData[i])
    }
}

//             table selected modification