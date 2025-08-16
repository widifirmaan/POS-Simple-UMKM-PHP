<?php
session_start();
include 'config.php';
// ini_set('display_errors', 1); // Enable error display on the screen
// ini_set('display_startup_errors', 1); // Enable display of errors during PHP startup
// error_reporting(E_ALL);
// echo json_encode('Test');

//NOTA GET
if(isset($_GET['idbarang'])){
    $idbarang = $_GET['idbarang'] ?? '';
    $sql = "SELECT * FROM stock WHERE id ='$idbarang'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    echo json_encode($row ?: []);
}

//SAVE TRANSAKSI
if(isset($_GET['task'])){
    if($_GET['task'] == 'saveTrans'){
        $input = file_get_contents('php://input');
        $data = json_decode($input, true);

        //get data from json (($cleaned_string = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', '', $html_string);))
        $databarang = $data['dataBarang'];
        $datahtml = str_replace("'", "\"", preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', '', $data['dataHTML']));
        $datatotaltrans = $data['dataTrans'];
        $datatoko = $_SESSION['toko'];
        $datausername = $_SESSION['username'];
        $dataPayment = $data['dataPayment'];
        
        //add to invoice
        $sql = "INSERT INTO invoice (databarang, nota, money, toko, tgl, username, payment) VALUES ('".json_encode($databarang)."', '".$datahtml."', ".$datatotaltrans.",".$datatoko.",sysdate(),'".$datausername."','".$dataPayment."')";
        $result = $conn->query($sql);
        $encodeBarang = json_encode($databarang);
        $databarangenc = json_decode($encodeBarang);
        $resultBarang = "";
        foreach ($databarangenc as $item) {
            $idbarang = $item->idbarang;
            $qty = $item->qty;
            $sql = "SELECT * FROM stock WHERE id ='$idbarang'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            if($row){
                $resultBarang .= $row['name']. " (" . $qty . "), ";
                //kurangi stock
                $stockBarang = (int)$row['qty'];
                $pembelian = (int)$qty;
                $penguranganStock = $stockBarang - $pembelian;
                $sql = "UPDATE stock SET qty = ".$penguranganStock.", updated_at = sysdate() WHERE id = ".$idbarang;
                $result = $conn->query($sql);
            }else{
                $resultBarang .= $idbarang. " (" . $qty . "), ";
            }
        }

        //add to transaction
        $sql = "INSERT INTO transaction (product, amount, user_id, toko, payment) VALUES ('".$resultBarang."', ".$datatotaltrans.",'".$datausername."', ".$datatoko.",'".$dataPayment."')";
        $result = $conn->query($sql);
    }
    if($_GET['task'] == 'tambahBarang'){
        $dataName = $_POST['name'];
        $dataQty = $_POST['qty'];
        $dataPriceInit = $_POST['priceinit'];
        $dataPriceFinal = $_POST['pricefinal'];
        $dataToko = $_POST['toko'];
        
        //add to invoice
        $sql = "INSERT INTO stock (name, qty, priceinit, pricefinal, store) VALUES ('$dataName', '$dataQty', '$dataPriceInit','$dataPriceFinal','$dataToko')";
        if($conn->query($sql)){
            echo "<script>";
            echo "alert('Barang Berhasil Ditambahkan');"; // Display the alert message
            echo "window.location.href = 'stock-barang.php';"; // Redirect to the new page
            echo "</script>";
        }
    }
    if($_GET['task'] == 'editBarang'){
        $dataName = $_POST['productname'];
        $dataQty = $_POST['qty'];
        $dataPriceInit = str_replace(".", "", $_POST['priceinit']);
        $dataPriceFinal = str_replace(".", "", $_POST['pricefinal']);
        $dataToko = $_POST['editToko'];
        $username = $_SESSION['username'];      
        $dataId = $_POST['dataid']; 
        //editBarang
        $sql = "UPDATE stock SET name = '$dataName', qty = '$dataQty', priceinit = '$dataPriceInit', pricefinal = '$dataPriceFinal', store = '$dataToko', updated_at = sysdate(), modified_by = '$username' where id = '$dataId'";
        if($conn->query($sql)){
            echo "<script>";
            echo "alert('Barang Berhasil Diubah oleh ".$username."');"; // Display the alert message
            echo "window.location.href = 'stock-barang.php';"; // Redirect to the new page
            echo "</script>";
        }
    }
    if($_GET['task'] == 'deleteBarang'){
        $dataId = $_GET['id']; 
        //editBarang
        $sql = "DELETE from stock where id = '$dataId'";
        if($conn->query($sql)){
            echo "<script>";
            echo "alert('Barang Berhasil Dihapus');"; // Display the alert message
            echo "window.location.href = 'stock-barang.php';"; // Redirect to the new page
            echo "</script>";
        }
    }
    if($_GET['task'] == 'editTrans'){
        $dataProduct = $_POST['product'];
        $dataPrice = str_replace(".", "", $_POST['amount']);
        $dataToko = $_POST['editToko'];
        $dataDate = $_POST['date'];    
        $dataId = $_POST['dataid']; 
        $username = $_SESSION['username'];
        $sql = "UPDATE transaction SET product = '$dataProduct', amount = '$dataPrice', toko = '$dataToko', date = STR_TO_DATE('$dataDate','%Y-%m-%d'), user_id = '$username' where id = '$dataId'";
        if($conn->query($sql)){
            echo "<script>";
            echo "alert('Transaksi Berhasil Diubah oleh ".$username."');"; // Display the alert message
            echo "window.location.href = 'finance.php';"; // Redirect to the new page
            echo "</script>";
        }
    }
    if($_GET['task'] == 'deleteTrans'){
        $dataId = $_GET['id']; 
        $sql = "DELETE from transaction where id = '$dataId'";
        if($conn->query($sql)){
            echo "<script>";
            echo "alert('Transaksi Berhasil Dihapus');"; // Display the alert message
            echo "window.location.href = 'finance.php';"; // Redirect to the new page
            echo "</script>";
        }
    }
    if($_GET['task'] == 'tambahBill'){
        $dataNama = $_POST['nama'];
        $dataNominal = $_POST['nominal'];
        $dataKet = $_POST['ket'];
        $username = $_SESSION['username'];
        $dataStatus = $_POST['status'];
        $dataNominalMin = $_POST['nominalminus'];
        $dataDueDate = $_POST['duedate'];
        
        if(isset($_POST['billImageData'])){
            $dataPic = $_POST['billImageData'];
            $sql = "INSERT INTO bill (nama, nominal, ket, pic, created_at, created_by, status, nominalminus, duedate) VALUES ('$dataNama', '$dataNominal', '$dataKet','$dataPic',sysdate(),'$username','$dataStatus','$dataNominalMin','$dataDueDate')";
        }else{
            $sql = "INSERT INTO bill (nama, nominal, ket, pic, created_at, created_by, status, nominalminus, duedate) VALUES ('$dataNama', '$dataNominal', '$dataKet',null,sysdate(),'$username','$dataStatus','$dataNominalMin','$dataDueDate')";
        }
        if($conn->query($sql)){
            echo "<script>";
            echo "alert('Barang Berhasil Ditambahkan');"; // Display the alert message
            echo "window.location.href = 'bill.php';"; // Redirect to the new page
            echo "</script>";
        }
    }
    if($_GET['task'] == 'editBill'){
        $dataNama = $_POST['nama'];
        $dataNominal = $_POST['nominal'];
        $dataKet = $_POST['ket'];
        $dataStatus = $_POST['status'];
        $dataNominalMin = $_POST['nominalminus'];
        $dataDueDate = $_POST['duedate'];
        $dataId = $_POST['dataid'];
        $username = $_SESSION['username'];

        if(isset($_POST['billImageData'])){
            $dataPic = $_POST['billImageData'];
            $sql = "UPDATE bill SET nama = '$dataNama', nominal = '$dataNominal', ket = '$dataKet', pic = '$dataPic', status = '$dataStatus', nominalminus = '$dataNominalMin', duedate = '$dataDueDate' where id = '$dataId'";
        }else{
             $sql = "UPDATE bill SET nama = '$dataNama', nominal = '$dataNominal', ket = '$dataKet', status = '$dataStatus', nominalminus = '$dataNominalMin', duedate = '$dataDueDate' where id = '$dataId'";
        }
       
        if($conn->query($sql)){
            echo "<script>";
            echo "alert('Barang Berhasil Diubah oleh ".$username."');";
            echo "window.location.href = 'bill.php';";
            echo "</script>";
        }
    }
    if($_GET['task'] == 'deleteBill'){
        $dataId = $_GET['id']; 
        //editBarang
        $sql = "DELETE from bill where id = '$dataId'";
        if($conn->query($sql)){
            echo "<script>";
            echo "alert('Bill Berhasil Dihapus');";
            echo "window.location.href = 'bill.php';";
            echo "</script>";
        }
    }
     if($_GET['task'] == 'cetakBarcode'){
        $dataFrom = $_POST['id-from'];
        $dataTo = $_POST['id-to'];
        
        $sql = "DELETE from bill where id = '$dataId'";
        if($conn->query($sql)){
            echo "<script>";
            echo "alert('Bill Berhasil Dihapus');";
            echo "window.location.href = 'bill.php';";
            echo "</script>";
        }
    }
    
}
?>