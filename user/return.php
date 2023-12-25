    <?php
    include '../db/connection.php';
     $orderId = $_POST["orderId"];
     $orderAmount = $_POST["orderAmount"];
     $referenceId = $_POST["referenceId"];
     $txStatus = $_POST["txStatus"];
     $paymentMode = $_POST["paymentMode"];
     $txMsg = $_POST["txMsg"];
     $txTime = $_POST["txTime"];
     $signature = $_POST["signature"];
     $secretkey = "f17a487c80052c8570ff9c922f74b17b818a84e1";
     $data = $orderId.$orderAmount.$referenceId.$txStatus.$paymentMode.$txMsg.$txTime;
     $hash_hmac = hash_hmac('sha256', $data, $secretkey, true) ;
     $computedSignature = base64_encode($hash_hmac);
     if ($signature == $computedSignature && $txStatus == 'SUCCESS') {
      echo "success";
     $email = $_COOKIE['cashfree_email'] ;
     $mobileNo = $_COOKIE['cashfree_mobileNo'] ;
     $price = $_COOKIE['cashfree_price'] ;
     // setcookie("cashfree_email",'' ,time()-600,'/');
     // setcookie("cashfree_mobileNo",'' ,time()-600,'/');
     // setcookie("cashfree_price",'' ,time()-600,'/');
      $fetch_id = mysqli_fetch_assoc(mysqli_query($con,"select * from user where email = '$email'"));
      $user_id = $fetch_id['user_id'];
      $sql = mysqli_query($con, "INSERT INTO payment(payment_id,user_id,amount,reference_id,status,payment_mode,payment_time) VALUES ('$orderId','$user_id','$price','$referenceId','$txStatus','$paymentMode','$txTime')");
        if($sql == true)
        {
         $payment_id = mysqli_insert_id($con);
          $cart_sql = mysqli_query($con,"select * from cart where user_id='$user_id'");
          while($cart_fetch = mysqli_fetch_assoc($cart_sql))
            {
               $product_id = $cart_fetch['product_id'];
               $total_items = $cart_fetch['total_items'];
               $t =$cart_fetch['total_items'];
               $product_sql = mysqli_query($con,"select * from product where product_id='$product_id'");
               $product_fetch = mysqli_fetch_assoc($product_sql);
               $amount = $t * $product_fetch['price'];
               if($product_fetch['discount']>0)
               {
                  $discount_per_item = ($product_fetch['price'] * $product_fetch['discount'])/100;
                  $discounted_amount = $product_fetch['price']-$discount_per_item;
                  $tax_per_item = ($discounted_amount * 1.90)/100;
                  $final_amount = $discounted_amount+$tax_per_item;   
               }
               else
               {
                  $discounted_amount = 0;
                  $tax_per_item = ($amount * 18)/100;
                  $final_amount = $amount+$tax_per_item;
               }
               $modify_date = date("Y/m/d");
               $order_query = "insert into orders (user_id,product_id,payment_id,total_item,amount,discounted_amount,tax_amount,final_amount,status,modify_date) values('$user_id','$product_id','$payment_id','$total_items','$amount','$discounted_amount','$tax_per_item','$final_amount','0','$modify_date')";
               $order_sql = mysqli_query($con,$order_query);
               if($order_query == true)
               {
                  $p_item = $product_fetch['total_items']-$total_items;
                  echo $p_item; 
                  $product_update_query = mysqli_query($con,"update product set total_items='$p_item' where product_id='$product_id'");
                  if($product_update_query == true)
                  {
                     $cart_delete_query = mysqli_query($con,"delete from cart where user_id='$user_id'");  
                     if($cart_delete_query == true)
                     {
                        ?><script>location.href="order.php"</script><?php
                     }
                  }
               }
            }
        }
      } else {
          ?><script type="text/javascript">location.href= 'cart.php?all=1&paymentfailed=0'; </script><?php
     }

 ?>