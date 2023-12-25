<?php 
include_once('../db/connection.php');


$user_id = $_COOKIE['user_id'];
$orderId = time();
// $sql5 = mysqli_query($con,"SELECT * from payment order by payment_id desc limit 1 ");
// $result = mysqli_fetch_assoc($sql5);
// ?><script type="text/javascript">//alert("<?php //echo mysqli_num_rows($sql5); ?>");</script><?php
// if(mysqli_num_rows($sql5) >= 1)
// {
  
// }
// else
// {
//   $orderId=1 ;  
// }


$host="https://bac8-2402-8100-2418-f5fa-1d1a-d153-ba2f-2e82.ngrok.io/";
$returnUrl = $host."/fashion/user/return.php";

$orderDetails = array();
$orderDetails["returnUrl"] = $returnUrl;


$userDetails = getUserDetails($orderId);
$order = getOrderDetails($orderId);
$orderDetails["customerName"] = $userDetails['customerName'];
$orderDetails["customerEmail"] = $userDetails['customerEmail'];
$orderDetails["customerPhone"] = $userDetails['customerPhone'];
$orderDetails["orderId"] = $order['orderId'];
$orderDetails["orderAmount"] = $order['orderAmount'];
$orderDetails["appId"] = "93026edef5a4a4fa9f736460f62039";
$orderDetails["signature"] = generateSignature($orderDetails);


function getUserDetails($orderId) {
$user_id = $_COOKIE['user_id'];
include '../db/connection.php';
$user = mysqli_fetch_assoc(mysqli_query($con,"select * from user where user_id='$user_id'"));
    return array(
      "customerName" => $user['name'],
      "customerEmail" => $user['email'],
      "customerPhone" => $user['mobile_no']
    );
}

function getOrderDetails($orderId) {
$amount = $_POST['final_amount'];
  return array(
    "orderId" => $orderId,
    "orderAmount" => $amount,
  );
}

function generateSignature($postData){
  $secretKey = "f17a487c80052c8570ff9c922f74b17b818a84e1";
 ksort($postData);
 $signatureData = "";
 foreach ($postData as $key => $value){
      $signatureData .= $key.$value;
 }
 $signature = hash_hmac('sha256', $signatureData, $secretKey,true);
 $signature = base64_encode($signature);
 return $signature;
}

echo json_encode($orderDetails);
?>  
  <form id="redirectForm" method="post" action="https://test.cashfree.com/billpay/checkout/post/submit">
    <input type="hidden" name="appId" value="<?php echo $orderDetails["appId"] ?>"/>
    <input type="hidden" name="orderId" value="<?php echo $orderDetails["orderId"] ?>"/>
    <input type="hidden" name="orderAmount" value="<?php echo $orderDetails["orderAmount"] ?>"/>
    <input type="hidden" name="customerName" value="<?php echo $orderDetails["customerName"] ?>"/>
    <input type="hidden" name="customerEmail" value="<?php echo $orderDetails["customerEmail"] ?>"/>
    <input type="hidden" name="customerPhone" value="<?php echo $orderDetails["customerPhone"] ?>"/>
    <input type="hidden" name="returnUrl" value="<?php echo $orderDetails["returnUrl"] ?>"/>
    <input type="hidden" name="signature" value="<?php echo $orderDetails["signature"] ?>"/>
  </form>

  <script>document.getElementById("redirectForm").submit();</script>

<?php
setcookie("cashfree_email",'' ,time()-84600,'/');
setcookie("cashfree_mobileNo",'' ,time()-84600,'/');
setcookie("cashfree_price",'' ,time()-84600,'/');
        
setcookie("cashfree_email",$orderDetails["customerEmail"] ,time()+600,'/');
setcookie("cashfree_mobileNo",$orderDetails["customerPhone"] ,time()+600,'/');
setcookie("cashfree_price",$orderDetails["orderAmount"] ,time()+600,'/');

// echo json_encode($_COOKIE);
?>

