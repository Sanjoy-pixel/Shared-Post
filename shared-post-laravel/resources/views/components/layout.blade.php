
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Share Post</title>
    <link rel="stylesheet" href="{{url('assets/css/style.css')}}"/>
    <script href="{{url('assets/js/jquery.min.js')}}"></script>
</head>
<body>
    {{$slot}}
</body>
</html>

<script>


$(document).ready(function(){
    $("#openModal").click(function(){
        $("#customModal").fadeIn();
    });
    $(".custom-close").click(function(){
        $("#customModal").fadeOut();
    });
    $(window).click(function(event){
        if (event.target == $("#customModal")[0]) {
            $("#customModal").fadeOut();
        }
    });
});















function displayImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    document.getElementById('profile-pic').setAttribute('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }



</script>