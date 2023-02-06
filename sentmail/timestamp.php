<?
    // phpinfo();
    date_default_timezone_set('Asia/Bangkok');

?>


<script>
// var date = new Date(1605587716000);
// // 1434460015000
// var dd = date.getDate();
// var mm = date.getMonth() + 1; //January is 0!
// var time = date.getTime();
// var yyyy = date.getFullYear();
// if (dd < 10) {
//     dd = '0' + dd
// }
// if (mm < 10) {
//     mm = '0' + mm
// }

// var date = dd + '/' + mm + '/' + yyyy;

date = 1606966107;
var timestamp = date * 1000;

d = new Date(timestamp);

var dd = d.getDate();
var mm = d.getMonth() + 1; //January is 0!
var yyyy = d.getFullYear();

if (dd < 10) {
    dd = '0' + dd
}
if (mm < 10) {
    mm = '0' + mm
}


console.log(dd + ' / ' + mm + ' / ' + yyyy);
console.log(new Date(timestamp).toTimeString());
console.log(new Date(timestamp).toLocaleTimeString());
</script>