<?php 
include_once("base.php");
?><br>
<form action="amigos.php" method="post" enctype="multipart/form-data">
    Adcione um amigo:  <input type="text" name="username" value="" placeholder="" size="20">
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


<style>
  .att{

    text-align: center;

  }
  
.info {
  background-color: #0707ab;
  width: 600px;
  border:  10px solid royalblue;
  border-radius: 10px;
  margin: 0;
  background: #0707ab;
  position: relative;
  top: 15%;
  left: 25%;
  margin-right: -50%;
  transform: translate(-50%, -50%)

  }
  .info-r {
  background-color: #0707ab;
  width: 600px;
  border:  10px solid royalblue;
  border-radius: 10px;
  margin: 0;
  background: #0707ab;
  position: relative;
  top: 15%;
  left: 90%;
  margin-right: -50%;
  transform: translate(-50%, -50%)

  }

body{
  color: #ffffff;
}

h2{
  color: #ffffff;
}  
h3{
  color: white;
  padding: 10px;
}
h4{
  padding:10px;
}


</style>

          </head>
          
          <body>


                                  <!--Navbar-->


        <div class="image-holder">
         <div class="ipsList_inline ipsPos_left">       
           
              <li>
                <h4 class="ipsType_minorHeading">Data de Inscrição&nbsp&nbsp&nbsp</h4>
                <span>&nbsp&nbsp&nbsp&nbsp'.$row["data_inscri"].'</span>
              </li>
              <li>
                <h4 class="ipsType_minorHeading">Seguidores&nbsp&nbsp&nbsp</h4>
                <span data-ipstooltip="">&nbsp&nbsp&nbsp&nbsp'.$row["num_follows"].'&nbsp&nbsp&nbsp</span>
              </li>
           <li>
            <form class="form-signin" action="acoes.php" method="post" >
             <button class="btn-signin"name="campo1">Salvar</button>
           </form>
           </li>
        </div>
        </div>
        



        <div class="user-lvl-and-name">
        <div class="bottom-left">'.$row["username"].'</div>
        <div class="profile-images">
        <div class="user-stuff">
        <div class="bottom-right"><img class="image-2" src="https://proxy.duckduckgo.com/iu/?u=https%3A%2F%2Fupload.wikimedia.org%2Fwikipedia%2Fcommons%2Fthumb%2F6%2F6b%2FTaka_Shiba.jpg%2F1200px-Taka_Shiba.jpg&f=1"</img></div>

         
        </div><br><br><br><br><br><br><br><br>

        <div class="container">
         
          
              <div class="info">
                <h2 class="pro-info">Metas</h2>
                <hr>
                
                <h2>'.$row["metas"].'<h2>

          </div>
                        <div class="info-r">
                <h2 class="pro-info">Atividades Favoritas</h2>
                <hr>
                
                <h2>'.$row["atv"].'<h2>

          </div>

             
        </body>
        </html>
';

            }
        }
        else {
           echo "0 results";
        }
    }
    

?>