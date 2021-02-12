<?php if(!isset($_SESSION['user']))
{
    /*
    if($_SESSION['role']!=1)
    {
        header("location: seller.php");
    }*/
    header("location: login.php");
}
switch($_SESSION['role'])
{
    case 0:
        header("location: dashboard.php");
        break;
    case 2:
        header("location: seller.php");
        break;
}
?>

<div class="menu-wrap">
	<nav class="menu">
    	<div class="icon-list">
            <h2 id="nomeUtente" ><?php echo $_SESSION['user']; ?></h2>
            <a href="<?php echo BASE_URL . 'index.php'?>"><i class="fas fa-home"></i><span>Home</span></a>
            <a href="<?php echo BASE_URL . 'panini.php'?>"><i class="fas fa-hamburger"></i><span>Ordina</span></a>
            <a href="<?php echo BASE_URL . 'carrello.php'?>"><i class="fas fa-shopping-cart"></i><span>Carrello</span></a>
            <a href="<?php echo BASE_URL . 'account.php'?>"><i class="fas fa-user"></i><span>Account</span></a>
            <a href="<?php echo BASE_URL . 'about.php'?>"><i class="far fa-question-circle"></i><span>About</span></a>
            <a href="#"><i></i><span><?php echo '<a class="logout" href="/functions/logout.php">';echo 'ESCI';echo '</a>';?></span></a>
        </div>
    </nav>
    <button class="close-button" id="close-button">Close Menu</button>
    <div class="morph-shape" id="morph-shape" data-morph-open="M-1,0h101c0,0,0-1,0,395c0,404,0,405,0,405H-1V0z">
        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 100 800" preserveAspectRatio="none">
            <path d="M-1,0h101c0,0-97.833,153.603-97.833,396.167C2.167,627.579,100,800,100,800H-1V0z"/>
        </svg>
    </div>
</div>
<button class="menu-button" id="open-button"></button>
<div class="content-wrap">
    <div class="content">
        <header class="codrops- header">
	<a href="<?php echo BASE_URL . 'index.php'?>">
        	<img id="Logo" src="images/Logo.png"></a>
        </header>
    </div>
    
