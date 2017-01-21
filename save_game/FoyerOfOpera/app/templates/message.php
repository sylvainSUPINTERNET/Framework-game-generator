<?php include '../app/controllers/messageController.php' ?>


<?php


print("<p class='text-center'>$messageEnd</p>");
if(!empty($cheater)){
    printf("<p class='text-center'><span class='glyphicon glyphicon-thumbs-up' aria-hidden=\"true\"></span> %s <span class='glyphicon glyphicon-thumbs-up' aria-hidden=\"true\"></span></p>", $cheater);
}
?>

<p class="text-center">


    <br><br>
<h3 class="text-center">Credits</h3>
<ul class="text-center" style="list-style-type: none">
    <li><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Joly Sylvain - CTO</li>
    <li><span class="glyphicon glyphicon-flag" aria-hidden="true"></span> Guillaume Etendard - Stagiaire</li>
    <li><span class="glyphicon glyphicon-alert" aria-hidden="true"></span> Julien Brandin - Chef de projet </li>
</ul>
</p>

<h1 class="text-center">FIN</h1>
