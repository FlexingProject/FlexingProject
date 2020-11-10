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

  <!-- sidebar stuff -->  
  
</div>


<div class='image-holder'>
 <div class="ipsList_inline ipsPos_left">
   
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
    </div>
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
 
  <div class='left'>
    <a href='#'><h2>FOLLOWERS</h2></a>
    
    <div class='view-followers aligncenter'>
      <a href='#'>View Followers</a>
      aaaaaaaaaaaaaaa
    </div>
  </div>
  
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