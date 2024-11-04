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
            color: #eb7096;
            font-size: 20px;
        }
        .card-img-top{
            width: 100%;
            height: 200px;
            object-fit: contain;
        }
    </style>
</head>
<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
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
                        <?php 
                            if(isset($_SESSION['user_name'])){
                                echo "
                                <li class='nav-item'>
                                    <a class='nav-link' href='./user_area/profile.php'>ᴍʏ ᴀᴄᴄᴏᴜɴᴛ</a>
                                </li>
                                ";
                            }else{
                                echo "
                                <li class='nav-item'>
                                    <a class='nav-link' href='./user_area/user_registration.php'>ʀᴇɢɪꜱᴛᴇʀ</a>
                                </li>
                                ";
                            }
                        ?>
                    

                        <!-- for contact -->
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">ᴄᴏɴᴛᴀᴄᴛ</a>
                    </li>

                        <!-- for cart -->
                    <li class="nav-item">
                        <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php total_items(); ?></sup></a>
                    </li>

                        <!-- for total price -->
                    <li class="nav-item">
                        <a class="nav-link" href="#"> <?php total_price(); ?>$ </a>
                    </li>


                </ul>
                <form class="d-flex" action="search_product.php" method="get">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                    <input type="submit" value="Search" name="search_data_product" class="btn btn-outline-light bg-success">
                </form>
                </div>
            </div>
        </nav>

        <?php 
            cart();
        ?>


        <!-- second child -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-success">
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
                                <a class='nav-link' href='./user_area/user_login.php'>ʟᴏɢɪɴ</a>
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


        <!-- third child -->
        <!-- <div class="bg-success">
            <h3 class="text-center">Hidden store</h3>
            <p class="text-center">Communication is at the heart of e-commerce and community</p>
        </div> -->


        <!-- fourth child Product and Category -->
        <div class="row px-3 mt-5">
            <!-- product side -->
            <div class="col-md-10">
                <!-- product -->
                <div class="row">

                <?php

                //call function
                    GetProduct();

                    GetUniqueCategory();

                    GetUniqueBrand();

                    
                    // $ip = getIPAddress();  
                    // echo 'User Real IP Address - '.$ip; 
                ?>
                    
                </div>
            </div>
                



            <!-- side nav -->
            <div class="col-md-2 bg-secondary p-0">

                <!-- display brand -->
                    <ul class="navbar-nav me-auto">

                        <li class="nav-item bg-warning">
                            <a href="#" class="nav-link text-center text-ligh bg-dark"><h4>ʙʀᴀɴᴄʜ</h4></a>
                        </li>

                        <?php 
                            GetBrand();                    
                        ?>

                    </ul>


                <!-- display category -->
                    <ul class="navbar-nav me-auto">

                        <li class="nav-item bg-success">
                            <a href="#" class="nav-link text-center text-light"><h4>ᴄᴀᴛᴇɢᴏʀʏ</h4></a>
                        </li>

                        <?php
                            GetCategory();
                        ?>

                    </ul>
            </div>

        </div>




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