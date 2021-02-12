<?php if(!isset($_SESSION['user']))
{
    header("location: login.php");
}
switch($_SESSION['role'])
{
    case 0:
        header("location: dashboard.php");
        break;
    case 1:
        header("location: index.php");
        break;
}
?>

<div class="menu-wrap">

    <button class="close-button" id="close-button">Close Menu</button>
    <div class="morph-shape" id="morph-shape" data-morph-open="M-1,0h101c0,0,0-1,0,395c0,404,0,405,0,405H-1V0z">
        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 100 800" preserveAspectRatio="none">
            <path d="M-1,0h101c0,0-97.833,153.603-97.833,396.167C2.167,627.579,100,800,100,800H-1V0z"/>
        </svg>
    </div>
</div>

<div class="content-wrap">
    <div class="content">
        <header class="codrops- header">
	<a href="<?php echo BASE_URL . 'seller.php'?>">
        	<img id="Logo" src="images/Logo.png"></a>
        </header>
    </div>

    <script>
        document.addEventListener('contextmenu', event => event.preventDefault());

    </script>
    
 