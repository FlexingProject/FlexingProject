<?php 
include_once("base.php");
?><br>
<form action="procura.php" method="post" enctype="multipart/form-data">
    Nome:  <input type="text" name="username" value="" placeholder="" size="20">
    <input type="submit" value="Search" name="submit">
</form>

<?php 

include_once("db/connect.php");

    if (isset($_POST['username']))
    {
        $username = $_POST['username'];
        
        $sql = "SELECT * FROM usuarios WHERE username ='$username';";
        
        $result = $conectar->query($sql);

        if($result->num_rows < 0){
            echo "<h2> Nenhum resultado para este nome</h2>";
        }
        
        if ($result->num_rows > 0) {
   ?>

   <?php
            while($row = $result->fetch_assoc()) {



echo   '<html>';
echo   '<head>';
echo   '<meta charset="utf-8">';
echo   '<link href="perfil.css" rel="stylesheet"><script src="perfil.js" type="text/javascript"></script></head><body>
<title >Flexing</title>   <link href="perfil.css" rel="stylesheet">
            <script src="perfil.js" type="text/javascript"></script>

          </head>
          
          <body>


                                  <!--Navbar-->


        <div class="image-holder">
         <div class="ipsList_inline ipsPos_left">       
           
              <li>
                <h4 class="ipsType_minorHeading">Posts</h4>
                <span>4,179&nbsp&nbsp&nbsp</span>
              </li>
              <li>
                <h4 class="ipsType_minorHeading">Joined</h4>
                <time datetime="2009-11-25T22:48:11Z" title="11/25/2009 02:48  PM" data-short="9 yr">November 25, 2009&nbsp&nbsp&nbsp</time>
              </li>     
              <li>
                <h4 class="ipsType_minorHeading">Followers&nbsp&nbsp&nbsp</h4>
                <span data-ipstooltip="">'.$row["num_follows"].'&nbsp&nbsp&nbsp</span>
              </li>
           <li>
             <a  class="flw-btn" href="">Follow</a>
           </li>
        </div>
        </div>
        



        <div class="user-lvl-and-name">
        <div class="bottom-left">'.$row["username"].'</div>
        <div class="profile-images">
        <div class="user-stuff">
        <div class="bottom-right"><img class="image-2" src="https://proxy.duckduckgo.com/iu/?u=https%3A%2F%2Fupload.wikimedia.org%2Fwikipedia%2Fcommons%2Fthumb%2F6%2F6b%2FTaka_Shiba.jpg%2F1200px-Taka_Shiba.jpg&f=1"</img></div>

         
        </div>

        <div class="container">
         
          <div class="left">
          </div>
          
              <div class="about">
                <h2 class="pro-info">Metas</h2>
                <hr>
                
                <h2>'.$row["metas"].'<h2>

          </div>

             <div class="user-posts">
              <a href="#""><h2>POSTS</h2></a>
               
               <div class="user-image-post">
                 
                 <img class="user-post" src="https://www.w3schools.com/howto/img_avatar.png"></img>
           <div class="overlay">
            <div class="text">Hello World</div>
          </div>
               </div>
               
                <div class="view-followers aligncenter">
              <a href="#">View Posts</a>
            </div>
          </div>
        </div>
        </body>
        </html>
';

        
                echo '<table>';
                echo '<tr><td>ID:</td><td>'.$row["id"].'</td></tr>';
                echo '<tr><td>Avatar:</td><td><img src="'.$row["avatar"].'" width="100px" /></td></tr>';
                echo '<tr><td>Firstname:</td><td>'.$row["username"].'</td></tr>';
                echo '<tr><td>Metas:</td><td>'.$row["metas"].'</td></tr>';
                echo '<tr><td>Atividade Favorita:</td><td>'.$row["atv"].'</td></tr>';
                echo '</table>';
                echo '<hr />';
            }
        }
        else {
           echo "0 results";
        }
    }
    

?>