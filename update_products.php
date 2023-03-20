<?php
include ('conn.php');

$status = '';
$result = '';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['productCode'])) {
        //query untuk mengupdate data
        $productCode_upd = $_GET['productCode'];
        $query = "SELECT * FROM products WHERE productCode = '$productCode_upd'";

        //eksekusi query
        $result = mysqli_query(connection(),$query);
      }
  }

  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productCode = $_POST['productCode'];
    $productName = $_POST['productName'];
    $productLine = $_POST['productLine'];
    $productScale = $_POST['productScale'];
    $productVendor = $_POST['productVendor'];
    $productDescription = $_POST['productDescription'];
    $quantityInStock = $_POST['quantityInStock'];
    $buyPrice = $_POST['buyPrice'];
    $MSRP = $_POST['MSRP'];
    
    //query SQL
    $sql = "UPDATE products SET productName='$productName', productLine ='$productLine', productScale='$productScale', productVendor='$productVendor', 
    productDescription='$productDescription', quantityInStock='$quantityInStock', buyPrice='$buyPrice', MSRP='$MSRP'
    WHERE productCode='$productCode'";

    //eksekusi query
    $result = mysqli_query(connection(),$sql);
    if ($result) {
        $status = 'ok';
    }
    else {
        $status = 'err';
    }

    //redirect ke halaman lain
    header('Location: products.php?status='.$status);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>update customer</title>
</head>
<body>
<div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column" style="margin-top:100px;">
              <li class="nav-item">
                <a class="nav-link active" href="<?php echo "customers.php"; ?>">Data Customers</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo "customers.php"; ?>">Update Data</a>
              </li>
            </ul>
          </div>
        </nav>

                <tr class="akhir">
                    <td colspan="3">
                        <h2>UPDATE PRODUCTS</h2>
                            <form action="update_products.php" method="POST">
                                <?php while($data = mysqli_fetch_array($result)) : ?>
                                <div>
                                    <label>Product Code</label>
                                    <input type="text" class="form-control" placeholder="Product Code" name="productCode" value="<?php echo $data['productCode']; ?>" required="required" readonly>        
                                </div>

                                <div>
                                    <label>Product Name</label>
                                    <input type="text" class="form-control" placeholder="Product Name" name="productName" value="<?php echo $data['productName']; ?>" required="required">
                                </div>

                                <div>
                                    <label>Product Line</label>
                                    <input type="text" class="form-control" placeholder="Product Line" name="productLine" value="<?php echo $data['productLine']; ?>" required="required">
                                </div>

                                <div>
                                    <label>Product Scale</label>
                                    <input type="text" class="form-control" placeholder="Product Scale" name="productScale" value="<?php echo $data['productScale']; ?>" required="required">
                                </div>

                                <div>
                                    <label>Product Vendor</label>
                                    <input type="text" class="form-control" placeholder="Product Vendor" name="productVendor" value="<?php echo $data['productVendor']; ?>" required="required">
                                </div>

                                <div>
                                    <label>Product Description</label>
                                    <input type="text" class="form-control" placeholder="Product Description" name="productDescription" value="<?php echo $data['productDescription']; ?>" required="required">
                                </div>

                                <div>
                                    <label>Quantity In Stock</label>
                                    <input type="text" class="form-control" placeholder="Quantity In Stock" name="quantityInStock" value="<?php echo $data['quantityInStock']; ?>" required="required">
                                </div>

                                <div>
                                    <label>Buy Price</label>
                                    <input type="text" class="form-control" placeholder="Buy Price" name="buyPrice" value="<?php echo $data['buyPrice']; ?>" required="required">
                                </div>

                                <div>
                                    <label>MSRP</label>
                                    <input type="text" class="form-control" placeholder="MSRP" name="MSRP" value="<?php echo $data['MSRP']; ?>" required="required">        
                                </div>

                                <?php endwhile; ?>

                                <button type="submit">Update</button>
                            </form>
                    </td>
            </tr>
</body>
</html>