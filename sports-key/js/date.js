var objToday = new Date(),

weekday = new Array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'),
dayOfWeek = weekday[objToday.getDay()],

domEnder = function() { var a = objToday; if (/1/.test(parseInt((a + "").charAt(0)))) return "th"; a = parseInt((a + "").charAt(1)); return 1 == a ? "st" : 2 == a ? "nd" : 3 == a ? "rd" : "th" }(),
dayOfMonth = today + ( objToday.getDate() < 10) ? '0' + objToday.getDate() + domEnder : objToday.getDate() + domEnder,

months = new Array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'),
curMonth = months[objToday.getMonth()],

curYear = objToday.getFullYear();
//curHour = ("0" + objToday.getHours()).slice(-2),
//curMin = ("0" + objToday.getMinutes()).slice(-2),
//curSec = ("0" + objToday.getSeconds()).slice(-2);                
                
var today = "Today- " + " " + dayOfMonth + " of " + curMonth + ", " + curYear + " " + dayOfWeek;
document.getElementsByTagName('h4')[0].textContent = today;