<?php

include 'connection.php';

//Set useful variables for paypal form
$paypal_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr'; //Test PayPal API URL
$paypal_id = 'sayuj666@gmail.com'; //Business Email

//fetch products from the database
$results = mysql_query("SELECT * FROM products");
?>
<form action="<?php echo $paypal_url; ?>" method="post">

        <!-- Identify your business so that you can collect the payments. -->
        <input type="hidden" name="business" value="<?php echo $paypal_id; ?>">
        
        <!-- Specify a Buy Now button. -->
        <input type="hidden" name="cmd" value="_cart">
		 <input type="hidden" name="upload" value="1">
<?php
$count = 1;
while($row = mysql_fetch_assoc($results))
{

?>

    	<img src="images/<?php echo $row['image']; ?>"/>
    	Name: <?php echo $row['name']; ?>
    	Price: <?php echo $row['price']; ?>
    	
        
        <!-- Specify details about the item that buyers will purchase. -->
        <input type="hidden" name="item_name_<?php echo $count;?>" value="<?php echo $row['name']; ?>">
        <input type="hidden" name="item_number_<?php echo $count;?>" value="<?php echo $row['id']; ?>">
        <input type="hidden" name="amount_<?php echo $count;?>" value="<?php echo $row['price']; ?>">
        
        
      
        
  

<?php 
$count++;

} ?>

	  <!-- Specify URLs -->
	 
        <input type='hidden' name='cancel_return' value='http://example.com/cancel.php'>
        <input type='hidden' name='return' value='http://example.com/success.php'>
      <!-- Display the payment button. -->
        <input type="image" name="submit" border="0"
        src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" alt="PayPal - The safer, easier way to pay online">
        <img alt="" border="0" width="1" height="1" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >
    
    </form>