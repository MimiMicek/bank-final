<?php

?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        console.log
        $("#hideLogin").click(function () {
            $("#logForm").hide();
            $("#regForm").show();
        })
    });

    $(document).ready(function () {
        $("#hideRegister").click(function () {
            $("#logForm").show();
            $("#regForm").hide();

        })
    });

</script>
<script src="js/register.js"></script>
</body>
</html>