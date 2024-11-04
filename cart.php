<!-- connect file -->
<?php 
include('./includes/connect.php');
include('./function/common_function.php');
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- font awsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Bag Collection Shop</title>

    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        .logo{
            width: 100px;
            border-radius: 30%;
            box-shadow: 1px 1px 2px 3px;
        }
        .nav-link{
            color: white;
            font-size: 20px;
        }
        .card-img-top{
            width: 100%;
            height: 200px;
            object-fit: contain;
        }
        .img-product{
            width: 100px;
        }
    </style>
</head>
<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white">
            <div class="container-fluid">

                        <!-- logo img -->
                        <img src="./images/logo.jfif" alt="" class="logo mx-3">

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                        <!-- for home -->
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">ʜᴏᴍᴇ</a>
                    </li>

                        <!-- for products -->
                    <li class="nav-item">
                        <a class="nav-link" href="display_all.php">ᴘʀᴏᴅᴜᴄᴛꜱ</a>
                    </li>

                        <!-- for register -->
                    <li class="nav-item">
                        <a class="nav-link" href="./user_area/user_registration.php">ʀᴇɢɪꜱᴛᴇʀ</a>
                    </li>

                        <!-- for contact -->
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">ᴄᴏɴᴛᴀᴄᴛ</a>
                    </li>

                        <!-- for cart -->
                    <li class="nav-item">
                        <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php total_items(); ?></sup></a>
                    </li>

                        


                </ul>
                <!-- <form class="d-flex" action="search_product.php" method="get">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                    <input type="submit" value="Search" name="search_data_product" class="btn btn-outline-light">
                </form> -->
                </div>
            </div>
        </nav>

        <?php 
            cart();
        ?>


        <!-- second child -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-warning">
            <ul class="navbar-nav m-auto">
                
                <!-- បើ user login អោយប៊ូតុងបង្ហាញឈ្មោះរបស់ user -->
                <?php
                    if(!isset($_SESSION['user_name'])){

                        echo "
                        <li class='nav-link'>
                             <a class='nav-link' href='#'>ᴡᴇʟᴄᴏᴍᴇ ɢᴜᴇꜱᴛ</a>
                        </li>
                        ";

                    }else{

                        echo "
                        <li class='nav-link'>
                             <a class='nav-link' href='#'>Welcome ".$_SESSION['user_name']."</a>
                        </li>
                        ";
                        
                    }

                ?>

                <!-- បើ user login អោយប៊ូតុងបង្ហាញពាក្យ logout -->
                <?php 
                        if(!isset($_SESSION['user_name'])){
                            echo "
                            <li class='nav-link'>
                                <a class='nav-link' href='./user_area/user_login.php'></a>
                            </li>
                            ";
                        }else{
                            echo "
                            <li class='nav-link'>
                                <a class='nav-link' href='./user_area/user_logout.php'>ʟᴏɢᴏᴜᴛ</a>
                            </li>
                            ";
                        }
                    ?>
            </ul>
        </nav>
        
        <div class="container mt-5">
            <div class="row">
                <!-- Form -->
                <form action="" method="post">

                
                <table class="table table-bordered text-center">

                

                 <!-- PHP code -->

                 <?php 
                    global $con;
                    $get_ip_address = getIPAddress();
                    $total_price=0;
                    $cart_query="Select * from `cart_details` where ip_address='$get_ip_address'";
                    $result=mysqli_query($con,$cart_query);
                    $result_count=mysqli_num_rows($result);
                        if($result_count>0){

                            echo "
                                    <thead>
                                        <tr>
                                            <th>Product title</th>
                                            <th>Prodcut image</th>
                                            <th>Quantity</th>
                                            <th>Total price</th>
                                            <th>Remove</th>
                                            <th colspan='2'>Operations</th>
                                        </tr>
                                    </thead>
                            <tbody>
                            ";

                    while($row=mysqli_fetch_array($result)){

                        // Get product id from cart detail table
                        $product_id=$row['product_id'];
                        // Query for getting data about products in cart details
                        $select_product="select * from `products` where product_id='$product_id'";
                        $result_product=mysqli_query($con,$select_product);

                            while($row_product_price=mysqli_fetch_array($result_product)){

                                $product_price=array($row_product_price['product_price']);

                                $price_table=$row_product_price['product_price'];
                                $product_title=$row_product_price['product_title'];
                                $product_img=$row_product_price['product_image'];
                                $product_value=array_sum($product_price);

                                $total_price+=$product_value;

                           

                 
                ?>
                    <tr>
                        <td class="py-5"> <?php echo $product_title ?></td>

                        <td><img src="./cafe/<?php echo $product_img ?>" alt="" class="img-product"></td>

                        <td class="py-5"><input type="text" name="qty" class="form-input w-50"></td>
                        <?php 
                             $get_ip_address = getIPAddress();
                             if(isset($_POST['update_cart'])){
                                $qty= intval($_POST['qty']);
                                $update_cart="Update `cart_details` set quantity='$qty' where ip_address='$get_ip_address'";
                                $result_update=mysqli_query($con,$update_cart);
                                $total_price=$total_price * $qty;
                             }

                        ?>

                        <td class="py-5"> <?php echo $price_table ?></td>

                        <td class="py-5">
                            <input type="checkbox" name="remove_item[]" value="<?php echo $product_id ?>">
                        </td>

                        <td class="py-5">
                            <input type="submit" value="Update Cart" class="btn btn-info" name="update_cart">
                            <input type="submit" value="Remove Cart" class="btn btn-danger" name="remove_cart">
                        </td>

                    </tr>

                    <?php 
                     }
                    }
                    }else{
                        echo "<h4 class='text-danger text-center'>ʏᴏᴜʀ ᴄᴀʀᴛ ɪꜱ ᴇᴍᴘᴛʏ.</h4>";
                        echo "<h4 class='text-danger text-center'>(つ╥﹏╥)つ</h4>";
                        echo "<h4 class='text-danger text-center'>ᴀᴅᴅ ꜱᴏᴍᴇᴛʜɪɴɢ ᴛᴏ ᴍᴀᴋᴇ ᴍᴇ ʜᴀᴘᴘʏ.</h4>";
                    }
                    ?>

                </tbody>



                </table>

                <!-- Sub total -->
                <div class="d-flex mb-5">

                <?php 
                    $get_ip_address = getIPAddress();
                    $cart_query="Select * from `cart_details` where ip_address='$get_ip_address'";
                    $result=mysqli_query($con,$cart_query);
                    $result_count=mysqli_num_rows($result);
                        if($result_count>0){
                            echo "
                            <h4 class='px-3 m-3'>Subtotal: <strong class='text-info'> $total_price $</strong></h4>

                            <input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 border-0 mx-3 btn' name='continue_shopping'>
        
                            <button class='bg-info px-3 m-3 border-0 btn btn-info'><a href='./user_area/checkout.php' class='text-light text-decoration-none'>Checkout</a></button>
        
                            ";
                        }else{
                            echo "
                            <input type='submit' value='ʀᴇᴛᴜʀɴ ᴛᴏ ꜱᴛᴏʀᴇ' class='btn btn-info' name='continue_shopping'>
                            ";
                        }

                        if(isset($_POST['continue_shopping'])){
                            echo "<script>window.open('index.php','_self')</script>";
                        }
                ?>


                </div>
            </div>
        </div>
        </form>

        <!-- function to remove cart -->
        <?php 
            function RemoveCart(){
                global $con;
                if(isset($_POST['remove_cart'])){
                    foreach($_POST['remove_item'] as $remove_id){
                        echo $remove_id;
                        $delete_query="Delete from `cart_details` where product_id='$remove_id'";
                        $run_delete=mysqli_query($con,$delete_query);
                        if($run_delete){
                            echo "<script>window.open('cart.php','_self')</script>";
                        }
                    }
                }
            }
            echo $remove_item=RemoveCart();
        ?>
       




        <!-- last child -->
        <!-- include footer -->
        <?php
        include('./includes/footer.php');
        ?>
    </div>


    <!-- Bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>