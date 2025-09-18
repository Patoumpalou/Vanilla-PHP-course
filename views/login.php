<?php include './../connect.php';  ?>
<?php

    if($_POST){
        var_dump($_POST);
        // enregistrer dans la BDD 
    }

    if($_GET){
        var_dump($_GET);
    }
    exit;
?>

<!DOCTYPE html>
    <html lang="en">
        <?php include 'layout/head.php'; ?>
    <body>
        <?php include 'layout/header.php'; ?>
        <div class="d-flex justify-content-center w-100 mt-3" style="margin-top:80px">
          
            
            <div  class="d-flex flex-column justify-content-center align-items-center card">
                <h1 class="text-center">Login Page</h1>
                <form action="./login.php" method="post" class="d-flex flex-column justify-content-center align-items-center">
                    <div class="form-control d-flex flex-column flex-start w-100">
                        <label for="">Email</label>
                        <input class="mb-3" type="text" name="email" placeholder="" required>
                    </div>
                    <div class="form-control d-flex flex-column flex-start w-100">
                        <label for="">Password</label>
                        <input class="mb-3" type="password" name="password" placeholder="" required>
                    </div>
                    <button class="button btn-primary" type="submit" name="submit">Submit</button>
                </form>

            </div>

        </div>
        
        <?php include 'layout/footer.php';?>
   </body> 
</html>


