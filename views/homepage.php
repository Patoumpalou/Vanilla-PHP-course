

<?php   

  $sql = "SELECT * FROM products";
  $result = $pdo->query($sql); // exécute directement la requête
  $resultats = $result->fetchAll(PDO::FETCH_ASSOC);



  $cookie_name = "basket";
  $cookie_value = [];

  json_encode($cookie_value);
  if(!isset($_COOKIE[$cookie_name])) {
    setcookie($cookie_name, json_encode($cookie_value), time() + (86400 * 30), "/"); // 86400 = 1 day
  } else {
    // echo "Cookie '" . $cookie_name . "' is set!<br>";
    $cookie_value = json_decode($_COOKIE[$cookie_name], true);
    // var_dump($cookie_value);
    
  }

  if(isset($_GET['item'])){
    echo 'GET PARAM : ' . $_GET['item']; 
    array_push($cookie_value, $_GET['item']);
    setcookie($cookie_name, json_encode($cookie_value), time() + (86400 * 30), "/");

    $url = strtok($_SERVER["REQUEST_URI"], '?');
    header("Location: $url"); 
  }
?>



<!-- <div id="sidebar">
    <p class="">Element 1</p>
    <p class="mb-3">Element 2</p>
    <p class="mb-3">Element 3</p>
    <p class="mb-3">Element 4</p>
</div> -->
<?php include 'connect.php';  ?>


<!DOCTYPE html>
    <html lang="en">

    <?php include 'views/layout/head.php'; ?>

    <body>
        <?php  include 'views/layout/header.php';?>

        <div class="" style="margin-top:80px"> 
          <div class="" id="content" style="margin-left:80px">
            <div id="hero" class="w-100 d-none justify-content-center align-items-center justify-content-center">
              <h1 class="text-center">Welcome to My Shop</h1>
              <div>
                <button class="ml-3 button">Click me</button>
              </div>
            </div>

            <div id="s2" class="w-100 d-flex justify-content-center align-items-center">
                <?php foreach ($resultats as $key => $row) { ?>
                  <div class="card m-3 p-3">
                    <h2 class="text-center"><?= $row['name']?></h2>
                    <img width="80" height="80" src="https://img.freepik.com/photos-gratuite/style-vie-adorable-du-chat_23-2151593330.jpg?t=st=1757008323~exp=1757011923~hmac=62823fe64d5df1efd885f576c792dfdeacaed357a9e95fce82a01545b3d5ce8f&w=1480" alt="">
                    <p class="text-center">$<?= $row['price']?></p>
                    <a target="_blank" href="?item=<?= $key?>">
                      <button class="button">Buy Now</button>
                    </a>
                  </div>  
            
                <?php } ?>
            </div>


            <div class="w-100 d-flex flex-column justify-content-center align-items-center">
                <?php foreach($cookie_value as $key => $value ){?>
                  <div class="d-flex">
                    <p class="mr-2">Item in basket:</p>
                    <p class="font-weight-bold mr-2"><?=$value?></p>
                    <?php var_dump($resultats[$value]); ?>
                  </div>

                <?php } ?>
            </div>

            <div class="w-100 d-flex flex-column justify-content-center align-items-center">
              <h2 class="text-center">Headers balises show off</h2>
              <h1>this is h1</h1>
              <h2>this is h2</h2>
              <h3>this is h3</h3>
              <h4>this is h4</h4>
              <h5>this is h5</h5>

            </div>
          </div>
        </div>
        
        <?php include 'views/layout/footer.php';?>
   </body> 
</html>
