<html>
<body>
<nav>
    <ul>
        <li>Menu 1</li>
    </ul>
</nav>

<main>

<?php
 // http://localhost/vtc/home.php?page=reservation

 $page = $_GET['page'] ?? 'accueil';

 switch($page)
 {
     case 'reservations':
        require './views/reservations.php';
     break;
     case 'profil':
        require './views/profil.php';
     break;
     default: 
        require './views/accueil.php';
 }

?>

</main>
<footer>Copyright</footer>
</body>
</html>