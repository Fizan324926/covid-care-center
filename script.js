$(document).ready(function() {
    showHome();
    screens = [showHome, showPatients, showStaff, showWards, showReports, showLogOut];
    for (i = 0; i < 6; i++) { $(".navigation ul li:eq(" + i + ")").click(screens[i]); }

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
    showPaitentHome();
    screens = [showPaitentHome, showPaitentNew, showPaitentUpdate, showPaitentDelete];
    for (i = 0; i < 4; i++) { $(".patients-operation .items ul li :eq(" + i + ")").click(screens[i]); }
}

function showPaitentHome() {
    $(".patients .patient-data").css("display", "block");
    $(".patients .add-new").css("display", "none");
    $(".patients .update").css("display", "none");
    $(".patients .delete").css("display", "none");
}

function showPaitentNew() {
    $(".patients .add-new").css("display", "block");
    $(".patients .patient-data").css("display", "none");

    $(".patients .update").css("display", "none");
    $(".patients .delete").css("display", "none");
}

function showPaitentUpdate() {
    $(".patients .patient-data").css("display", "none");
    $(".patients .add-new").css("display", "none");
    $(".patients .update").css("display", "block");
    $(".patients .delete").css("display", "none");
}

function showPaitentDelete() {
    $(".patients .patient-data").css("display", "none");
    $(".patients .add-new").css("display", "none");
    $(".patients .update").css("display", "none");
    $(".patients .delete").css("display", "block");
}

function showStaff() {
    $(".patients-content").css("display", "none");
    $(".home-content").css("display", "none");
    $(".staff-content").css("display", "block");
    $(".wards-content").css("display", "none");
    $(".reports-content").css("display", "none");
    $(".logout-content").css("display", "none");

}

function showWards() {
    $(".patients-content").css("display", "none");
    $(".home-content").css("display", "none");
    $(".staff-content").css("display", "none");
    $(".wards-content").css("display", "block");
    $(".reports-content").css("display", "none");
    $(".logout-content").css("display", "none");

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
    _getConfirmedPatients = "21";
    _getDeadPatients = "13241";
    _getRecoveredPatients = "321" + "+";
    _getTodayPatients = "21";
    _getTDeathPatients = "2134";
    _getTRecoveredPatients = "5321" + "+";
    _getFBedsPatients = "2122";
    _getTBedsPatients = "215";
    _confirmedPatients = $(".c-values:eq(0)");
    _confirmedPatients.empty().append(_getConfirmedPatients);
    _deadPatients = $(".c-values:eq(1)");
    _deadPatients.empty().append(_getDeadPatients);
    _recPatients = $(".c-values:eq(2)");
    _recPatients.empty().append(_getRecoveredPatients);
    _confirmedPatients = $(".c-values:eq(3)");
    _confirmedPatients.empty().append(_getConfirmedPatients);
    _confirmedPatients = $(".c-values:eq(4)");
    _confirmedPatients.empty().append(_getConfirmedPatients);
    _confirmedPatients = $(".c-values:eq(5)");
    _confirmedPatients.empty().append(_getConfirmedPatients);
    _confirmedPatients = $(".c-values:eq(6)");
    _confirmedPatients.empty().append(_getConfirmedPatients);
    _confirmedPatients = $(".c-values:eq(7)");
    _confirmedPatients.empty().append(_getConfirmedPatients);

}