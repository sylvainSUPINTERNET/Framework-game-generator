<?php include '../app/controllers/introController.php' ?>

<?php
printf("<h1 class='text-center'>%s</h1>",$title);
?>

<br>
<p class='text-center'>Choisissez une direction pour commencer</p>
<br>
<br>
<div class="doors-container">
    <ul class="list-inline center-block text-center">
        <li>
            Sortie
            <a href='/north'>
                <div class='doorClose'></div>
            </a>
        </li>
        <li>
            Entrée au bar
            <a href='/south'>
                <div class='doorClose'></div>
            </a>
        </li>
        <li>
            Entrée au vestiaire
            <a href='/west'>
                <div class='doorClose'>
                </div>
            </a>
        </li>
    </ul>


</div>
<script src="js/jquery.js"></script>
<script>
    $(function () {
        var doorsClose = $('.doorClose');
        var doorsOpen = $('.doorOpen');
        doorsClose.css({
            "background": "silver",
            "width": "100px",
            "height": "100px",
            "border-radius": "50%"
        });
        doorsClose.mouseover(function () {
            $(this).css({
                "background": "black",
                "transition": "1s"
            });
        });
        doorsClose.mouseout(function () {
            $(this).css({
                "background": "silver",
                "transition": "0.3s"
            });
        });
    });
</script>
