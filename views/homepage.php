<?php include './../connect.php';  ?>

<?php   

  $sql = "SELECT * FROM products";
  $result = $pdo->query($sql); // exécute directement la requête
  $product_list = $result->fetchAll(PDO::FETCH_ASSOC);

  $cookie_name = "basket";
  $cookie_value = [];

  json_encode($cookie_value);
  if(!isset($_COOKIE[$cookie_name])) {
    setcookie($cookie_name, json_encode($cookie_value), time() + (86400 * 30), "/"); // 86400 = 1 day
  } else {
    $cookie_value = json_decode($_COOKIE[$cookie_name], true);
  }
  // var_dump($cookie_value); 
    // exit;
  if(isset($_GET['item'])){
    $selected_item = null;
    $selected_item_index  = null;
    foreach($product_list as $key => $row){
      if($row['id'] == $_GET['item']){
        echo ' - Product found in DB : ' . $row['name'];
        $selected_item = $row;
        $selected_item_index = $key;
      }
    }
    if(!$selected_item ){
      echo '<h1> JAJAJ </h1>';
      exit;
    }
    
    if($selected_item){
      if($_GET['action'] == 'remove'){
        echo '<h1> JAJAJ </h1>';
        unset($cookie_value[$selected_item_index]);
      }
      else if($_GET['action'] == 'add'){
        array_push($cookie_value, $selected_item);
      }
    }
    setcookie($cookie_name, json_encode($cookie_value), time() + (86400 * 30), "/");


    // exit;
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



<!DOCTYPE html>
    <html lang="en">

    <?php include 'layout/head.php'; ?>

    <body>
        <?php  include 'layout/header.php';?>

        <div class="" style="margin-top:80px"> 
          <div class="" id="content" style="margin-left:80px">
            <div id="hero" class="w-100 d-none justify-content-center align-items-center justify-content-center">
              <h1 class="text-center">Welcome to My Shop</h1>
              <div>
                <button class="ml-3 button">Click me</button>
              </div>
            </div>

            <div id="s2" class="w-100 d-flex justify-content-center align-items-center">
                <?php foreach ($product_list as $key => $row) { ?>
                  <div class="card m-3 p-3">
                    <h2 class="text-center"><?= $row['name']?></h2>
                    <h2 class="text-center"><?= $row['id']?></h2>
                    <img width="80" height="80" src="https://img.freepik.com/photos-gratuite/style-vie-adorable-du-chat_23-2151593330.jpg?t=st=1757008323~exp=1757011923~hmac=62823fe64d5df1efd885f576c792dfdeacaed357a9e95fce82a01545b3d5ce8f&w=1480" alt="">
                    <p class="text-center">$<?= $row['price']?></p>
                      <a target="_blank" href="?item=<?= $row['id']?>&action=add">
                        <button class="button">Add to cart</button>
                      </a>
                  </div>  
            
                <?php } ?>
            </div>


            <div class="w-100 d-flex flex-column justify-content-center align-items-center">
              <h1>Contenu du cookie</h1>
                <?php foreach($cookie_value as $key => $row ){?>
                  <div class="d-flex">
                    <p class="mr-2">Item in basket:</p>
                    <p class="font-weight-bold mr-2"><?=$row['name']?></p>
                    <a  href="?item=<?= $row['id']?>&action=remove">
                      <button class="button">Remove from cart</button>
                    </a>
                    <?php //var_dump($resultats[$value]); ?>
                  </div>

                <?php } ?>
            </div>

        
          </div>
        </div>
        
        <?php include 'layout/footer.php';?>
   </body> 
</html>
