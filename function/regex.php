<script type="text/javascript">
$('#nama_user').bind('keypress', function (event) {
    var regex = new RegExp("^[A-Za-z ]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
       event.preventDefault();
       return false;
    }
});
$('#username').bind('keypress', function (event) {
    var regex = new RegExp("^[A-Za-z0-9._-]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
       event.preventDefault();
       return false;
    }
});
$('#email').bind('keypress', function (event) {
    var regex = new RegExp("^[A-Za-z0-9.@_-]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
       event.preventDefault();
       return false;
    }
});
$('#password').bind('keypress', function (event) {
    var regex = new RegExp("^[A-Za-z0-9]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
       event.preventDefault();
       return false;
    }
});
$('#repassword').bind('keypress', function (event) {
    var regex = new RegExp("^[A-Za-z0-9]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
       event.preventDefault();
       return false;
    }
});
</script>