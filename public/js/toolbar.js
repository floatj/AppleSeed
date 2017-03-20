$(function () {
    //日曆
    $('#date_s').datetimepicker({
        "dateFormat": "yy-mm-dd",
        "timeFormat": "HH:mm"
    });
    $('#date_e').datetimepicker({
        "dateFormat": "yy-mm-dd",
        "timeFormat": "HH:mm"
    });
    //$('#mydate').timepicker({"timeFormat": "HH:mm"}); //只有 時、分、秒 用 timepicker

    //日期時間區間按鈕
    //今天
    $("#today_button").click(function(){
        $("#date_s").val(getTodayYmd()+" 00:00:00");
        $("#date_e").val(getTodayYmdHis());
    });

    //上班前
    $("#before_worktime_button").click(function(){
        $("#date_s").val(getBeforeWorkTime()['s']);
        $("#date_e").val(getBeforeWorkTime()['e']);
    });

    //昨天
    $("#yesterday_button").click(function(){
        $("#date_s").val(getYesterdayYmd()+" 00:00:00");
        $("#date_e").val(getYesterdayYmd()+" 23:59:59");
    });

    //當月
    $("#thismonth_button").click(function(){
        $("#date_s").val(getThisMonth()['s']+" 00:00:00");
        //$("#date_e").val(getThisMonth()['e']+" 23:59:59");
        $("#date_e").val(getTodayYmdHis()); //當月結束時間到查詢當下為止
    });

    //上個月
    $("#lastmonth_button").click(function(){
        $("#date_s").val(getLastMonth()['s']+" 00:00:00");
        $("#date_e").val(getLastMonth()['e']+" 23:59:59");
    });

    //一週
    $("#week_button").click(function(){
        $("#date_s").val(getLastWeekYmd()+" 00:00:00");
        $("#date_e").val(getTodayYmdHis());
    });

    //一個月
    $("#month_button").click(function(){
        $("#date_s").val(getLastMonthYmd()+" 00:00:00");
        $("#date_e").val(getTodayYmdHis());
    });
});
