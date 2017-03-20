/* 一些簡易的共用功能函數 */

//今天日期
function getTodayYmd() {

    var date = new Date();

    //取得今天日期
    Date.prototype.ymd = function () {
        var mm = this.getMonth() + 1; // getMonth() is zero-based
        var dd = this.getDate();

        return [this.getFullYear(),
            (mm > 9 ? '' : '0') + mm,
            (dd > 9 ? '' : '0') + dd
        ].join('-');
    };
    return date.ymd();
}

//昨天日期
function getYesterdayYmd() {
    var today = new Date();
    var yesterday = new Date(today);
    yesterday.setDate(today.getDate() - 1); //setDate also supports negative values, which cause the month to rollover.

    var dd = yesterday.getDate();
    var mm = yesterday.getMonth() + 1; //January is 0!

    var yyyy = yesterday.getFullYear();
    if (dd < 10)  dd = '0' + dd;
    if (mm < 10) mm = '0' + mm;
    yesterday = yyyy + "-" + mm + "-" + dd;

    return yesterday;
}

//現在日期時間
function getTodayYmdHis() {

    var date = new Date();

    var year = date.getFullYear();
    var month = date.getMonth() + 1;
    var day = date.getDate();
    var hours = date.getHours();
    var minutes = date.getMinutes();
    var seconds = date.getSeconds();

    if (month <= 9) month = '0' + month;
    if (day <= 9) day = '0' + day;
    if (hours <= 9) hours = '0' + hours;
    if (minutes <= 9) minutes = '0' + minutes;
    if (seconds <= 9) seconds = '0' + seconds;

    return year + "-" + month + "-" + day + " " + hours + ":" + minutes + ":" + seconds;
}

//上個月區間
function getLastMonth() {
    var date = new Date();
    var firstDay = new Date(date.getFullYear(), date.getMonth()-1, 1);
    var lastDay = new Date(date.getFullYear(), date.getMonth(), 0);

    var dd = firstDay.getDate();
    var mm = firstDay.getMonth() + 1; //January is 0!

    var yyyy = firstDay.getFullYear();
    if (dd < 10)  dd = '0' + dd;
    if (mm < 10) mm = '0' + mm;

    var dd_last = lastDay.getDate();
    if (dd_last < 10)  dd_last = '0' + dd_last;

    var first_day = yyyy + "-" + mm + "-" + dd;
    var last_day = yyyy + "-" + mm + "-" + dd_last;


    return { "s":first_day, "e":last_day};
}

//本月區間
function getThisMonth() {
    var date = new Date();
    var firstDay = new Date(date.getFullYear(), date.getMonth(), 1);
    var lastDay = new Date(date.getFullYear(), date.getMonth()+1, 0);

    var dd = firstDay.getDate();
    var mm = firstDay.getMonth() + 1; //January is 0!

    var yyyy = firstDay.getFullYear();
    if (dd < 10)  dd = '0' + dd;
    if (mm < 10) mm = '0' + mm;

    var dd_last = lastDay.getDate();
    if (dd_last < 10)  dd_last = '0' + dd_last;

    var first_day = yyyy + "-" + mm + "-" + dd;
    var last_day = yyyy + "-" + mm + "-" + dd_last;


    return { "s":first_day, "e":last_day};
}


//一週前日期
function getLastWeekYmd() {
    var today = new Date();
    var yesterday = new Date(today);
    yesterday.setDate(today.getDate() - 7); //setDate also supports negative values, which cause the month to rollover.

    var dd = yesterday.getDate();
    var mm = yesterday.getMonth() + 1; //January is 0!

    var yyyy = yesterday.getFullYear();
    if (dd < 10)  dd = '0' + dd;
    if (mm < 10) mm = '0' + mm;
    yesterday = yyyy + "-" + mm + "-" + dd;

    return yesterday;
}


//一個月前日期
function getLastMonthYmd() {
    var today = new Date();
    var yesterday = new Date(today);
    yesterday.setDate(today.getDate() - 30); //setDate also supports negative values, which cause the month to rollover.

    var dd = yesterday.getDate();
    var mm = yesterday.getMonth() + 1; //January is 0!

    var yyyy = yesterday.getFullYear();
    if (dd < 10)  dd = '0' + dd;
    if (mm < 10) mm = '0' + mm;
    yesterday = yyyy + "-" + mm + "-" + dd;

    return yesterday;
}

//取得上班前時間
function getBeforeWorkTime() {

    //先取得今天是星期幾
    var weekday = new Date().getDay();
    var date_s;
    var date_e;

    switch (weekday) {
        case 0:
            //星期日 昨天2200-今天1300
            date_s  = getYesterdayYmd()+" 22:00:00";
            date_e  = getTodayYmd()+" 13:00:00";
            break;
        case 1:
            //@todo: 星期一 週五1800-今天0900
            //date_s  = getYesterdayYmd()+" 18:00";
            date_s = "wtf";
            date_e  = getTodayYmd()+" 09:00:00";
            break;
        case 2:
        case 5:
            //星期二,五 昨天1800-今天0900
            date_s  = getYesterdayYmd()+" 18:00:00";
            date_e  = getTodayYmd()+" 09:00:00";
            break;
        case 3:
            //星期三 昨天1800-今天0800
            date_s  = getYesterdayYmd()+" 18:00:00";
            date_e  = getTodayYmd()+" 09:00:00";
            break;
        case 4:
            //星期四 昨天1700-今天0900
            date_s  = getYesterdayYmd()+" 17:00:00";
            date_e  = getTodayYmd()+" 09:00:00";
            break;
        case 6:
            //星期六 昨天1800-今天1300
            date_s  = getYesterdayYmd()+" 18:00:00";
            date_e  = getTodayYmd()+" 13:00:00";
            break;
    }


    return {
        "s": date_s,
        "e": date_e,
    };
}