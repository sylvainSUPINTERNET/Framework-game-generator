<?php include '../app/controllers/introController.php' ?>

<?php
print("<h1 class='text-center'>" . $title . "</h1>");
print("<br>");
print("<p class='text-center'>Choisissez une direction pour commencer</p>");
print("<br>");
print("Sortie");
print("<a href='/north'>
    <div class='doorClose'></div>
</a>
<br>");
print("Entrée bar");
print("
<a href='/south'>
    <div class='doorClose'></div>
</a>
<br>");
print("Vestiaire");
print("
<a href='/west'>
    <div class='doorClose'>
    </div>
</a>
<br>");
?>
?>
<script src="js/jquery.js"></script>
<script>
    $(function () {
        var doorsClose = $('.doorClose');
        var doorsOpen = $('.doorOpen');
        doorsClose.css({
            "background": "red",
            "width": "100px",
            "height": "100px",
            "border-radius": "50%"
        });
        doorsClose.mouseover(function () {
            $(this).css({
                "background": "black",
                "transition" : "1s"
            });
        });
        doorsClose.mouseout(function () {
            $(this).css({
                "background": "red"
            });
        });
    });
</script>
