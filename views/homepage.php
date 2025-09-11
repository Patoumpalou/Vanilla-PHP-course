
<?php   

$sql = "SELECT * FROM products";
    $stmt = $pdo->query($sql); // exécute directement la requête

    // Récupérer les résultats
    $resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Affichage
   
    // exit;
?>


<div id="sidebar">
    <p class="">Element 1</p>
    <p class="mb-3">Element 2</p>
    <p class="mb-3">Element 3</p>
    <p class="mb-3">Element 4</p>
</div>

<div class="" id="content" style="margin-left:80px">

  <div id="hero" class="w-100 d-none justify-content-center align-items-center justify-content-center">
    <h1 class="text-center">Welcome to My Shop</h1>
    <div>
      <button class="ml-3 button">Click me</button>
    </div>
  </div>

    <div class="d-flex flex-column" >
        <?php foreach ($resultats as $key => $row) { ?>
            <div class="d-flex">
            <?php foreach ($row as $key => $value) { ?>
            
            
                <div class="d-flex mr-3">
                    <p class=" mr-2"><?=$key?></p>
                    <p class="font-weight-bold mr-2"><?=$value?></p>
                </div>
            <?php }?>
            </div>
        <?php } ?>
    </div>

  <div id="s2" class="w-100 d-flex justify-content-center align-items-center">
    <div class="card m-3 p-3">
      <h2 class="text-center">Product 1</h2>
      <img width="80" height="80" src="https://img.freepik.com/photos-gratuite/style-vie-adorable-du-chat_23-2151593330.jpg?t=st=1757008323~exp=1757011923~hmac=62823fe64d5df1efd885f576c792dfdeacaed357a9e95fce82a01545b3d5ce8f&w=1480" alt="">
      <p class="text-center">$10.00</p>
      <button class="button">Buy Now</button>
    </div>
    <div class="card m-3 p-3">
      <h2 class="text-center">Product 2</h2>
      <p class="text-center">$20.00</p>
      <button class="button">Buy Now</button>
    </div>
    <div class="card m-3 p-3">
      <h2 class="text-center">Product 3</h2>
      <p class="text-center">$30.00</p>
      <button class="button">Buy Now</button>
    </div>

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