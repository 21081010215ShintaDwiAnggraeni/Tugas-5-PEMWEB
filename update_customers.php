<?php
include ('conn.php');

$status = '';
$result = '';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['customerNumber'])) {
        //query untuk mengupdate data
        $customerNumber_upd = $_GET['customerNumber'];
        $query = "SELECT * FROM customers WHERE customerNumber = '$customerNumber_upd'";

        //eksekusi query
        $result = mysqli_query(connection(),$query);
      }
  }

  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $customerNumber = $_POST['customerNumber'];
    $customerName = $_POST['customerName'];
    $contactLastName = $_POST['contactLastName'];
    $contactFirstName = $_POST['contactFirstName'];
    $phone = $_POST['phone'];
    $addressLine1 = $_POST['addressLine1'];
    $addressLine2 = $_POST['addressLine2'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $postalCode = $_POST['postalCode'];
    $country = $_POST['country'];
    $salesRepEmployeeNumber = $_POST['salesRepEmployeeNumber'];
    $creditLimit = $_POST['creditLimit'];
    
    //query SQL
    $sql = "UPDATE customers SET customerName='$customerName', contactLastName ='$contactLastName', contactFirstName='$contactFirstName', phone='$phone', addressLine1='$addressLine1', 
    addressLine2='$addressLine2', city='$city', state='$state', postalCode='$postalCode', country='$country', salesRepEmployeeNumber='$salesRepEmployeeNumber', creditLimit='$creditLimit'
    WHERE customerNumber='$customerNumber'";

    //eksekusi query
    $result = mysqli_query(connection(),$sql);
    if ($result) {
        $status = 'ok';
    }
    else {
        $status = 'err';
    }

    //redirect ke halaman lain
    header('Location: customers.php?status='.$status);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HALAMAN UPDATE</title>
</head>
<body>
    <ul>
        <li>
            <a href="<?php echo "customers.php"; ?>"> CUSTOMERS</a>
        </li>
        <li>
            <a href="<?php echo "create_customers.php"; ?>"> UPDATE CUSTOMERS</a>
        </li>
    </ul>

    <h2>UPDATE CUSTOMERS</h2>
    <form action="update_customers.php" method="POST">
        <?php while($data = mysqli_fetch_array($result)) : ?>
        <div>
            <label>Customer Number</label>
            <input type="text" class="form-control" placeholder="Customer Number" name="customerNumber" value="<?php echo $data['customerNumber']; ?>" required="required">        
        </div>

        <div>
            <label>Customer Name</label>
            <input type="text" class="form-control" placeholder="Customer Name" name="customerName" value="<?php echo $data['customerName']; ?>" required="required">
        </div>

        <div>
            <label>Contact Last Name</label>
            <input type="text" class="form-control" placeholder="Contact Last Name" name="contactLastName" value="<?php echo $data['contactLastName']; ?>" required="required">
        </div>

        <div>
            <label>Contact First Name</label>
            <input type="text" class="form-control" placeholder="Contact First Name" name="contactFirstName" value="<?php echo $data['contactFirstName']; ?>" required="required">
        </div>

        <div>
            <label>Phone</label>
            <input type="text" class="form-control" placeholder="Phone Number" name="phone" value="<?php echo $data['phone']; ?>" required="required">
        </div>

        <div>
            <label>Address Line 1</label>
            <input type="text" class="form-control" placeholder="Addres Line 1" name="addressLine1" value="<?php echo $data['addressLine1']; ?>" required="required">
        </div>

        <div>
            <label>Address Line 2</label>
            <input type="text" class="form-control" placeholder="Addres Line 2" name="addressLine2" value="<?php echo $data['addressLine2']; ?>" required="required">
        </div>

        <div>
            <label>City</label>
            <input type="text" class="form-control" placeholder="City" name="city" value="<?php echo $data['city']; ?>" required="required">
        </div>

        <div>
            <label>State</label>
            <input type="text" class="form-control" placeholder="state" name="state" value="<?php echo $data['state']; ?>" required="required">        
        </div>

        <div>
            <label>Postal Code</label>
            <input type="text" class="form-control" placeholder="state" name="postalCode" value="<?php echo $data['postalCode']; ?>" required="required">        
        </div>

        <div>
            <label>Country</label>
            <input type="text"  class="form-control" placeholder="Country" name="country" value="<?php echo $data['country']; ?>" required="required">
        </div>

        <div>
            <label>Sales Rep Employee Number</label>
            <input type="text" class="form-control" placeholder="Sales Rep Employee Number" name="salesRepEmployeeNumber" value="<?php echo $data['salesRepEmployeeNumber']; ?>" required="required">        
        </div>

        <div>
            <label>Credit Limit</label>
            <input type="text" class="form-control" placeholder="Credit Limit" name="creditLimit" value="<?php echo $data['creditLimit']; ?>" required="required">        
        </div>

        <?php endwhile; ?>

        <button type="submit">Update</button>
    </form>
</body>
</html>