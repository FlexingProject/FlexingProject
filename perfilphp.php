<?php
    session_start();
    if(isset($_SESSION["LOG"])){
        $user = $_SESSION["LOG"]["User"];
        $pass = $_SESSION["LOG"]["Senha"];
        $mail = $_SESSION["LOG"]["Login"];
        
    } else {
        header('Location: login.php');
    }

    include_once("base.php");
?>

<html>
<head>



</hrad>

<body>

<?php
    include_once("db/connect.php");

    if (isset($_GET['username']))
    {
        $username = $_GET['username'];
        $sql = "SELECT * FROM usuarios WHERE username='$username'";
        
        $result = $conectar->query($sql);
        
        if ($result->num_rows > 0) {
            
            if($row = $result->fetch_assoc()) {






                <?php
    session_start();
    if(isset($_SESSION["LOG"])){
        $user = $_SESSION["LOG"]["User"];
        $pass = $_SESSION["LOG"]["Senha"];
        $mail = $_SESSION["LOG"]["Login"];
        
    } else {
        header('Location: login.php');
    }

    include_once("base.php");
?>

<html>
  <head>
    <meta charset="utf-8">
    <title >Flexing</title> 
    
    <link href="perfil.css" rel="stylesheet">
    <script src="perfil.js" type="text/javascript"></script>

  </head>
  
  <body>


                          <!--Navbar-->




<div class='banner'>
  <img class='image-banner' src='https://proxy.duckduckgo.com/iu/?u=https%3A%2F%2Fupload.wikimedia.org%2Fwikipedia%2Fcommons%2Fthumb%2F6%2F6b%2FTaka_Shiba.jpg%2F1200px-Taka_Shiba.jpg&f=1'></img>
</div>



  
  <!-- sidebar stuff -->z

  
  <div  id='sidebar'>
  <div class='toggle-btn' onclick='toggleSidebar()'>
    <span ></span>
    <span ></span>
    <span ></span>
  </div>
      <a title='close' href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  
  <div  class='profile-info'>
     <img class='image' src='https://external-content.duckduckgo.com/iu/?u=http%3A%2F%2Fcdn.akc.org%2Fakcdoglovers%2FShibaInu_hero.jpg&f=1&nofb=1'></img> <p>FLUFFERS</p>

  
  <hr>

</div>
[]
 <div class='search-box'>
   <a href='#' class='fas' id='search-btn'>&#xf002;</a><input class='search-txt' type='search' name='' placeholder="SEARCH"/>
  </div> 


<div class='site-quick-links'>
  <a id='quick-link-posts' href='#'><i class='far'>&#xf2b9;</i> POSTS</a>
  <a id='quick-link-upload' href='#'><i class='fas fa-upload'></i> UPLOAD</a>
</div>
   <!-- sidebar stuff -->
  
  <div class="dropdown">
    <button class="dropbtn"><img src="https://assets.codepen.io/3000883/internal/avatars/users/default.png?format=auto&height=80&version=1590703361&width=80" align="middle" alt="User image" width="50" height="50" > FLUFFERS
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="#">Profile</a>
      <a href="#">Create post</a>
      <a href="#">Members</a>
      <a href="#">Updates</a>
      <a href="#">Edit Account</a>
      <a href="#">Contact</a>
      <hr>
      <a href="#">Logout</a>
    </div>
  </div>
  
  
</div>


<div class='image-holder'>
 <ul class="ipsList_inline ipsPos_left">
   
      <li>
        <h4 class="ipsType_minorHeading">Posts</h4>
        <span>4,179</span>
      </li>
      <li>
        <h4 class="ipsType_minorHeading">Joined</h4>
        <time datetime="2009-11-25T22:48:11Z" title="11/25/2009 02:48  PM" data-short="9 yr">November 25, 2009</time>
      </li>
            
      
      <li>
        <h4 class="ipsType_minorHeading">Followers</h4>
        <span data-ipstooltip="" >4 Billion</span>
      </li>
   
    <li>
        <h4 class="ipsType_minorHeading">REP</h4>
        <span>2</span>
      </li>
   
   <li>
     <a  class='flw-btn' href='#'>Follow  <i class='fas'>&#xf067;</i></a>
   </li>
      
    </ul>
</div>



<div class='user-lvl-and-name'>
<div class="bottom-left">FLUFFERS</div>
<div class='user-level'>Owner</div>
</div>
<div class='profile-images'>
<div class='user-stuff'>
  <div class="bottom-right"><img class='image-2' src='https://proxy.duckduckgo.com/iu/?u=https%3A%2F%2Fupload.wikimedia.org%2Fwikipedia%2Fcommons%2Fthumb%2F6%2F6b%2FTaka_Shiba.jpg%2F1200px-Taka_Shiba.jpg&f=1'></img></div>

 <div class="bottom-right"><img class='image-3' src='https://proxy.duckduckgo.com/iu/?u=https%3A%2F%2Fcdn.emojidex.com%2Femoji%2Fseal%2Fgreen_circle.png%3F1524351848&f=1'></img></div>
</div>
</div>








<div class='container'>
 
  
      <div class='about'>
        <h2 class='pro-info'>Metas</h2>
        <hr>
        
        <h2>Minha meta é emagracer<h2>     
  </div>

     <div class='user-posts'>
      <a href='#'><h2>POSTS</h2></a>
       
       <div class='user-image-post'>
         
         <img class='user-post' src='https://www.w3schools.com/howto/img_avatar.png'></img>
   <div class="overlay">
    <div class="text">Hello World</div>
  </div>
       </div>
       
        <div class='view-followers aligncenter'>
      <a href='#'>View Posts</a>
    </div>
  </div>
</div>
</body>
</html>







                
                echo '<table>';
                echo '<h1> Perfil de '.$row["username"]."'</h1>";
                //echo '<tr><td></td><td>'.$row[""].'</td></tr>';
                echo '<tr><td>Avatar:</td><td><img src="'.$row["avatar"].'" width="100px" /></td></tr>';
                echo '<tr><td></td><td>'.$row["username"].'</td></tr>';
                echo '<tr><td>Metas:</td><td>'.$row["metas"].'</td></tr>';
                echo '<tr><td>Atividade Favorita</td><td>'.$row["atv"].'</td></tr>';

            }
            echo '</table>';
        }
        else {
           echo "0 results";
        }
    }
    else {

        echo '<h2>All our members:</h2>';

        $sql = "SELECT * FROM usuarios";
        
        $result = $conectar->query($sql);
        
        if ($result->num_rows > 0) {
   
            while($row = $result->fetch_assoc()) {
                
                echo '<hr />';
                echo '<table>';
                echo '<tr><td>ID:</td><td>'.$row["id"].'</td></tr>';
                echo '<tr><td>Avatar:</td><td><img src="'.$row["avatar"].'" width="100px" /></td></tr>';
                echo '<tr><td>Firstname:</td><td>'.$row["username"].'</td></tr>';
                echo '<tr><td>Metas:</td><td>'.$row["metas"].'</td></tr>';
                echo '<tr><td>Country:</td><td>'.$row["atv"].'</td></tr>';
                echo '</table>';
                
            }
        }
        else {
           echo "0 results";
        }
    }
    
    include_once("base.php");
?>
</body>

</html>