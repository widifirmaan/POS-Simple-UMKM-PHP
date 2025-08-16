<?php
include 'config.php';
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}
if(!isset($_SESSION['toko'])){
  $_SESSION['toko'] = 1;
}
if(isset($_POST['toko'])){
   $_SESSION['toko'] = $_POST['toko'];
}
if (isset($_SESSION['username'])) {
  if ($_SESSION['username'] != 'hamam') {
    header("Location: kasir.php");
  }
}
$user_agent = $_SERVER['HTTP_USER_AGENT'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    Prima Elektronik
  </title>
  <link href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,800" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css" rel="stylesheet" />
  
  <script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.5/dist/JsBarcode.all.min.js"></script>
  
</head>
<style>
  @media print {
    body {
    }
    @page {
      padding-top:1cm;
      margin-top: 0;
      margin-bottom: 0;
      margin-left: 1cm;
      margin-right: 1cm;
    }
    .rmvBtn{
      visibility: collapse;
    }
  }
</style>
<body class="g-sidenav-show bg-gray-100" onload="myFunction()">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="#">
        <h4 class="font-weight-bold">Prima Elektronik</h4>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link  active" href="../dashboard.php">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <svg width="12px" height="12px" viewBox="0 0 45 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>shop </title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                      <g transform="translate(0.000000, 148.000000)">
                        <path class="color-background opacity-6" d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z"></path>
                        <path class="color-background" d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link  " href="../stock-barang.php">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <svg width="12px" height="12px" viewBox="0 0 42 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>office</title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-1869.000000, -293.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                      <g id="office" transform="translate(153.000000, 2.000000)">
                        <path class="color-background opacity-6" d="M12.25,17.5 L8.75,17.5 L8.75,1.75 C8.75,0.78225 9.53225,0 10.5,0 L31.5,0 C32.46775,0 33.25,0.78225 33.25,1.75 L33.25,12.25 L29.75,12.25 L29.75,3.5 L12.25,3.5 L12.25,17.5 Z"></path>
                        <path class="color-background" d="M40.25,14 L24.5,14 C23.53225,14 22.75,14.78225 22.75,15.75 L22.75,38.5 L19.25,38.5 L19.25,22.75 C19.25,21.78225 18.46775,21 17.5,21 L1.75,21 C0.78225,21 0,21.78225 0,22.75 L0,40.25 C0,41.21775 0.78225,42 1.75,42 L40.25,42 C41.21775,42 42,41.21775 42,40.25 L42,15.75 C42,14.78225 41.21775,14 40.25,14 Z M12.25,36.75 L7,36.75 L7,33.25 L12.25,33.25 L12.25,36.75 Z M12.25,29.75 L7,29.75 L7,26.25 L12.25,26.25 L12.25,29.75 Z M35,36.75 L29.75,36.75 L29.75,33.25 L35,33.25 L35,36.75 Z M35,29.75 L29.75,29.75 L29.75,26.25 L35,26.25 L35,29.75 Z M35,22.75 L29.75,22.75 L29.75,19.25 L35,19.25 L35,22.75 Z"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1">Stock Barang</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link  " href="../finance.php">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>credit-card</title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                      <g transform="translate(453.000000, 454.000000)">
                        <path class="color-background opacity-6" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z"></path>
                        <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1">Keuangan</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../bill.php">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <svg fill="#000000" width="100px" height="100px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="p-2"><path d="M14,11H10a2,2,0,0,1,0-4h5a1,1,0,0,1,1,1,1,1,0,0,0,2,0,3,3,0,0,0-3-3H13V3a1,1,0,0,0-2,0V5H10a4,4,0,0,0,0,8h4a2,2,0,0,1,0,4H9a1,1,0,0,1-1-1,1,1,0,0,0-2,0,3,3,0,0,0,3,3h2v2a1,1,0,0,0,2,0V19h1a4,4,0,0,0,0-8Z"/></svg>
            </div>
            <span class="nav-link-text ms-1">Tagihan</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Akun</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link  " href="/logout.php">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <svg width="12px" height="12px" viewBox="0 0 40 44" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>document</title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-1870.000000, -591.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                      <g transform="translate(154.000000, 300.000000)">
                        <path class="color-background opacity-6" d="M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z"></path>
                        <path class="color-background" d="M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1">Keluar</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Dashboard</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-lg-6 col-12">
          <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
              <div class="card">
                <span class="mask bg-primary opacity-10 border-radius-lg"></span>
                <div class="card-body p-3 position-relative">
                  <div class="row">
                    <div class="col-8 text-start">
                      <h5 class="text-white font-weight-bolder mb-0 mt-3">
                        <?php
                          $sql = "SELECT SUM(amount) FROM transaction WHERE DATE(date) = CURDATE() AND toko = ".$_SESSION['toko'];
                          $result = $conn->query($sql);
                          $row = $result->fetch_assoc();
                          $labaKotor = number_format($row['SUM(amount)'] ?? 0, 0, ',', '.');
                          echo "Rp. ".$labaKotor."";
                        ?>
                      </h5>
                      <span class="text-white text-sm">Laba Kotor Hari ini</span>
                    </div>
                    <div class="col-4">
                      <p class="text-white text-sm text-end font-weight-bolder mt-auto mb-0">Uang Masuk</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-4 mt-md-0">
              <div class="card">
                <span class="mask bg-dark opacity-10 border-radius-lg"></span>
                <div class="card-body p-3 position-relative">
                  <div class="row">
                    <div class="col-8 text-start">
                      <h5 class="text-white font-weight-bolder mb-0 mt-3">
                        Toko <?php echo $_SESSION['toko'];?>
                      </h5>
                      <span class="text-white text-sm uppercase">Logged in as <?php echo $_SESSION['username'];?></span>
                    </div>
                    <div class="col-4">
                      <p class="text-white text-sm text-end font-weight-bolder mt-auto mb-0">Info</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <hr>
            <div class="col-12">
              <div class="card bg-transparent shadow-xl">
                <div class="overflow-hidden position-relative border-radius-xl" style="background-image: url('../assets/img/curved-images/curved14.jpg');">
                  <span class="mask bg-gradient-dark"></span>
                    <div class="card-body position-relative z-index-1 p-3">
                      <i class="fas fa-wifi text-white p-2"></i>
                                    <h5 class="text-white mt-4 mb-5 pb-2">
                                            4562&nbsp;&nbsp;&nbsp;1122&nbsp;&nbsp;&nbsp;4594&nbsp;&nbsp;&nbsp;7852</h5>
                                        <div class="d-flex">
                                            <div class="d-flex">
                                                <div class="me-4">
                                                    <p class="text-white text-sm opacity-8 mb-0">BCA</p>
                                                    <h6 class="text-white mb-0">M Hamam</h6>
                                                </div>
                                                <div>
                                                    <p class="text-white text-sm opacity-8 mb-0">Expires</p>
                                                    <h6 class="text-white mb-0">11/22</h6>
                                                </div>
                                            </div>
                                            <div class="ms-auto w-20 d-flex align-items-end justify-content-end">
                                                <img class="w-60 mt-2" src="https://www.bca.co.id/-/media/Feature/Card/List-Card/Tentang-BCA/Brand-Assets/Logo-BCA/Logo-BCA_Putih.png" alt="logo">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                </div>
              </div>
          </div>
        </div>
        <div class="col-lg-6 col-12 mt-4 mt-lg-0">
          <div class="card shadow h-100">
            <div class="card-header pb-0 p-3">
              <h6 class="mb-0">Menu</h6>
            </div>
            <div class="card-body pb-0 p-3">
              <form role="form" action="" method="POST">
                <div class="input-group">
                  <span class="input-group-text text-body"><i class="fas fa-store" aria-hidden="true"></i></span>
                  <input type="number" class="form-control text-center" id="toko" name="toko" value="<?php echo $_SESSION['toko'];?>"  min="1" max="3">
                </div>
                <hr>
                <div class="input-group">
                  <button id="button" type="submit" name="submit" class="btn btn-primary w-100 rounded" value="ganti-toko">Ganti Toko</button>
                </div>
              </form>
              
              <?php
                if(isset($_POST['submit'])){
                  if ($_POST['submit'] == "ganti-toko") {
                    $_SESSION['toko'] = $_POST['toko'];
                  }
                }
              ?>
              <div class="input-group">
              </div>
            </div>
            <div class="card-footer pt-0 p-3 d-flex align-items-center">
            </div>
          </div>
        </div>
      </div>
      <div class="row my-4">
        <div class="col-12">
          <div class="card">
            <div class="card-header pb-0">
              <div class="text-center">
                <div id="interactive" class="w-100" allow="autoplay">
              </div>
              </div>
              <div class="float-right text-end">
                <a data-mdb-ripple-init class="btn btn-light text-capitalize border-0" data-mdb-ripple-color="dark" onClick="printDiv('printableArea')"><i class="fas fa-print text-primary"></i> &nbsp; Cetak & Bayar</a>
              </div>
            </div>
            <hr class="border border-2">
            <div class="card-body" id="printableArea">
              <div id="tableResp" class="table-responsive">
                <div class="text-center">
                  <h3>Prima Elektronik</h3>
                    <p class="text-muted">KIOS NO 12B. JL BARON, WNO<br/>CABANG: JL KH AGUS SALIM (Timur Bangjo Kranon)<br/>TELP: (0274)392092 / WA: 0895323089801</p>
                    <hr>
                </div>
                <div class="row" style="text: size 12pt;">
                  <div class="col-6">
                    <div class="input-group mb-3 pl-2">
                      <span class="input-group-text" id="basic-addon1">Kepada: </span>
                      <input type="text" class="form-control" id="buyerName" placeholder="Nama Pembeli" onkeyup="saveName()">
                    </div>
                    <div class="input-group mb-3 pl-2" id="paymentMtdHead">
                      <span class="input-group-text" id="basic-addon1">Pembayaran: </span>
                       <select class="form-select" aria-label="Default select example" id="paymentMtd">
                        <option value="CASH">Cash</option>
                        <option value="QRIS">QRIS</option>
                        <option value="TRANSFER">Transfer</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-6">            
                    <ul>
                      <?php
                        $sqlId = "SELECT count(id) FROM invoice";
                        $resultId = $conn->query($sqlId);
                        $rowId = $resultId->fetch_assoc();
                      ?>
                      <li><span class="fw-bold">ID: </span><?=$rowId['count(id)']+1?></li>
                      <li><span class="fw-bold">Tanggal: </span><a id="date-nota"></a></li>
                    </ul>
                  </div>
                </div>
                  <table class="table" id="tablenota">
                    <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah</th>
                                    <th>@</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                    </thead>
                    <tbody>
                            <tr id="inputTable">
                              <td>#</td>
                              <td>
                                  <input list="productSelects" class="form-control" id="productSelect" onchange="getPrice(this.value)" name="productSelect" placeholder="Nama Barang/ID">
                                    <datalist id="productSelects">
                                      <?php
                                        $sql = "SELECT * FROM stock";
                                        $result = $conn->query($sql);
                                        while($row = $result->fetch_assoc()) {
                                          if($row["qty"] > 0){
                                            ?><option value="<?=$row["id"];?>"><?=$row["name"];?> (<?=$row["qty"];?>)</option>
                                        <?php }} ?>
                                    </datalist>
                              </td>
                                    <td><input class="form-control" type="number" id="hargaqty" placeholder="0" min="1" onchange="updateQty(this.value)"/></td>
                                    <td id="hargasatuan" contenteditable="true">Rp. 0</td>
                                    <td id="hargatotal" contenteditable="true">Rp. 0</td>
                                    <td><button id="button" class="btn btn-primary" value="" onclick="addToTable()">+</button></td>
                                </tr>
                            </tbody>
                        </table>
                        <hr>
                        <b>
                          <div class="input-group mb-2 mr-sm-2">
                            <div class="input-group-prepend">
                              <div class="input-group-text">Harga Total: Rp.</div>
                            </div>
                            <input type="text" class="form-control" id="totalAll" placeholder="0">
                          </div>   
                    </div>
                  </b>
                  
                  <script>
                    window.addEventListener('load',function() { // onLoad Function
                      n =  new Date();
                      y = n.getFullYear();
                      m = n.getMonth() + 1;
                      d = n.getDate();
                      document.getElementById("date-nota").innerHTML = m + "/" + d + "/" + y;
                      scanner();
                    });

                    document.getElementById('buyerName').addEventListener('keyup', function() { // onKeyUp Name
                      let buyerName = document.getElementById("buyerName").value;
                      console.log(buyerName);
                      document.getElementById("buyerName").placeholder = buyerName;
                    });

                    document.getElementById('paymentMtd').addEventListener('change', function() { // onKeyUp Payment
                      let paymentMtd = document.getElementById("paymentMtd").value;
                      console.log(paymentMtd);
                      document.getElementById("paymentMtd").value = paymentMtd;
                    });

                    function getPrice(input){ //getPrice after select product
                      console.log(input);
                      fetch("engine.php?idbarang=" + encodeURIComponent(input))
                      .then(response => response.json())
                      .then(data => {
                        document.getElementById('hargasatuan').innerHTML = "Rp. "+data.pricefinal.toLocaleString('id-ID');
                        document.getElementById('hargaqty').value = "1";
                        document.getElementById('hargatotal').innerHTML = "Rp. "+data.pricefinal.toLocaleString('id-ID');
                        return "1";
                      })
                      .catch(err => {
                        console.error("Fetch error:", err);
                      });
                    }

                    function updateQty(input){ // update price after select quantity
                      let harga = parseInt(document.getElementById('hargasatuan').innerHTML.replace(/[^\d]/g, ""));
                      let total = Number(input)*Number(harga);
                      document.getElementById('hargatotal').innerHTML = "Rp. "+total;
                    }

                    function addToTable() {
                      let input = document.getElementById('productSelect').value;
                      let qty = document.getElementById('hargaqty').value;
                      let hargasatuan = parseInt(document.getElementById('hargasatuan').innerHTML.replace(/[^\d]/g, ""));
                      let hargatotal = parseInt(document.getElementById('hargatotal').innerHTML.replace(/[^\d]/g, ""));
                      const table = document.getElementById("tablenota").getElementsByTagName('tbody')[0];
                      const rows = table.getElementsByTagName("tr");
                      const noUrut = rows.length;
                      fetch("engine.php?idbarang=" + encodeURIComponent(input))
                        .then(response => response.json())
                        .then(data => {
                          const table = document.getElementById("tablenota").getElementsByTagName('tbody')[0];
                                const newRow = table.insertRow();
                                newRow.insertCell(0).textContent = noUrut;
                                if(data.name){
                                  newRow.insertCell(1).textContent = data.name;
                                }
                                else{
                                  newRow.insertCell(1).textContent = input;
                                }
                                newRow.insertCell(2).textContent = qty;
                                newRow.insertCell(3).textContent = "Rp. "+hargasatuan;
                                newRow.insertCell(4).textContent = "Rp. "+hargatotal;
                                newRow.setAttribute('contenteditable', 'true');
                                
                                //button
                                const hapusCell = newRow.insertCell(5);
                                const btn = document.createElement("button");
                                btn.textContent = "-";
                                btn.className = "btn btn-primary rmvBtn";
                                btn.id = "hapus-" + noUrut;
                                btn.onclick = function () {
                                  hapusProduk(newRow);
                                };
                                hapusCell.appendChild(btn);

                                //id
                                const hiddenCell = newRow.insertCell(6);
                                hiddenCell.textContent = input;
                                hiddenCell.hidden = true;
                                updateNomorBaris()
                      })
                      .catch(err => {
                        console.error("Fetch error:", err);
                      });
                      updateTotal()  
                    }

                    function hapusProduk(inputbutton) {
                              inputbutton.remove();
                              updateNomorBaris();
                              updateTotal()
                    }
                    
                    function updateNomorBaris() {
                              const tbody = document.getElementById("tablenota").getElementsByTagName('tbody')[0];
                              Array.from(tbody.rows).forEach((row, index) => {
                                row.cells[0].textContent = index;
                              });
                    }
                            
                    function updateTotal() {
                              const tbody = document.querySelector("#tablenota tbody");
                              let total = 0;

                              Array.from(tbody.rows).forEach(row => {
                                const cellValue = row.cells[4].textContent.replace(/[^\d]/g, "");
                                total += parseInt(cellValue || 0);
                              });
                              // const colzero = parseInt(document.getElementById("hargatotal").innerHTML.replace(/[^\d]/g, "") || 0);
                              totalAll = total;
                              document.getElementById("totalAll").value = totalAll;
                              document.getElementById("totalAll").placeholder = totalAll;
                      setTimeout(scanner(), 5000); 
                    }
                    
                    function scanner(){
                      const barcodeInput = document.getElementById('productSelect');
                        Quagga.init({
                          inputStream: {
                            name: "Live",
                            type: "LiveStream",
                                        target: document.querySelector('#interactive'),
                                        showCanvas: false,
                                        constraints: {
                                            width: 480,
                                            height: 320,
                                            facingMode: "environment",
                                            showCanvas: false // Use rear camera on mobile
                                        },
                                    },
                                    decoder: {
                                        readers: [
                                            "ean_reader",
                                            "ean_8_reader",
                                            "code_128_reader",
                                            "code_39_reader",
                                            "code_39_vin_reader",
                                            "codabar_reader",
                                            "upc_reader",
                                            "upc_e_reader"
                                        ]
                                    },
                                    debug: {
                                      showCanvas: false,
                                    },
                                    showCanvas: false,
                                    locate: true
                                }, function(err) {
                                    if (err) {
                                    console.error(err);
                                    Quagga.stop();
                                    Quagga.offProcessed();
                                    Quagga.offDetected();
                                    }
                                    setTimeout(function() {
                                    Quagga.start();
                                    }, 1000); 
                                });
                                setTimeout(function() {
                                    var canvas = document.getElementsByTagName('canvas')[0];
                                    var video = document.getElementsByTagName('video')[0];
                                  if (canvas) {
                                      canvas.style.display = "none";
                                      video.style.width = "100%";
                                      video.style.height = "100px";
                                  }
                                }, 2000); 
                                Quagga.onDetected(function(result) {
                                  const code = result.codeResult.code;
                                  result = null;
                                  Quagga.stop();
                                  Quagga.offProcessed();
                                  Quagga.offDetected();
                                  getPrice(code);
                          setTimeout(function() {
                            console.log(code);
                            document.getElementById('productSelect').value = code;
                            addToTable();
                          }, 1000); // 2000 milliseconds = 2 seconds
                        });
                      };


                    function printDiv(divId) { //Tombol Cetak & Bayar
                      if (confirm("Transaksi akan tercatat. Apakah anda yakin?")) {
                        let paymentMtd = document.getElementById("paymentMtd").value;
                        let paymentMtdHead = document.getElementById("paymentMtdHead");
                        let hideheader = document.getElementById("inputTable");
                        hideheader.remove();
                        paymentMtdHead.remove();
                        // class="table-responsive"
                        let hideResp = document.getElementById("tableResp");
                        hideResp.classList.remove('table-responsive');
                        const myElement = document.getElementById('res');
                        var printContents = document.getElementById(divId).innerHTML;
                        var originalContents = document.body.innerHTML;
                        document.body.innerHTML = printContents;
                        const table = document.getElementById('tablenota');
                        const rows = table.querySelectorAll('tbody tr');
                        let data1 = [];
                        let combinedData = {};
                        let data2 = document.body.innerHTML;
                        let data3 = document.getElementById("totalAll").placeholder;
                        window.print();
                        // document.querySelector('script').remove();
                        rows.forEach(row => {
                          let cells = row.querySelectorAll('td');
                          let rowData = {
                            idbarang: cells[6].textContent,
                            qty: cells[2].textContent
                          };
                          data1.push(rowData);
                        });
                        
                        combinedData = {
                          task : "saveTrans",
                          dataBarang : data1,
                          dataHTML : data2,
                          dataTrans : data3,
                          dataPayment : paymentMtd
                        };
                        // Post the data to a server
                        saveTrans(combinedData);
                       
                        // .then(response => alert(JSON.stringify(response.json())));
                        
                      } else {
                        console.log("Cancel Payment");
                      }
                    }

                    function saveTrans(combinedData){
                      fetch("engine.php?task=saveTrans", {
                          method: 'POST',
                          headers: {
                            'Content-Type': 'application/json',
                          },
                          body: JSON.stringify(combinedData)
                      })
                      .then(response => response.text())
                      .then(data => {
                        console.log(data);
                        window.location.reload(); // 'data' will contain the actual text content
                      })
                      .catch(error => {
                        console.error('Error fetching text:', error);
                        window.location.reload();
                      });
                    }
                  </script>
                </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer" id="footer">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 pb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                © Prima Elektronik <script>
                  document.write(new Date().getFullYear())
                </script>,
                made with <i class="fa fa-heart"></i> by
                <a href="https://widifirmaan.github.io" class="font-weight-bold" target="_blank">W</a>
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </main>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../assets/js/soft-ui-dashboard.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/quagga/0.12.1/quagga.min.js"></script>
</body>

</html>