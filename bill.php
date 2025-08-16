<?php
include 'config.php';
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}
if (isset($_SESSION['username'])) {
  if ($_SESSION['username'] != 'hamam') {
    header("Location: kasir.php");
  }
}
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
          zoom: 2;
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
<body class="g-sidenav-show  bg-gray-100">
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
          <a class="nav-link" href="../dashboard.php">
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
          <a class="nav-link" href="../stock-barang.php">
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
          <a class="nav-link active" href="../bill.php">
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
          <a class="nav-link" href="../index.php">
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
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Tagihan</li>
          </ol>
          <h6 class="font-weight-bolder">Daftar Tagihan Sales</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group">
              <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
              <input type="text" class="form-control" id="searchInput" placeholder="Cari Tagihan" onkeyup="filterTable()">
            </div>
          </div>
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a class="nav-link text-body p-0" id="iconNavbarSidenav">
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
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <!-- <div class="card-header pb-0">
              <h6>Toko 1</h6>
            </div> -->
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary font-weight-bolder opacity-7">Nama/Org Sales</th>
                      <th class="text-center text-uppercase text-secondary font-weight-bolder opacity- ps-2">Nominal</th>
                      <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7">Keterangan</th>
                      <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7">Status</th>
                      <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7">Date/Due Date</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody id="toko1">
                  <?php $sql = "SELECT * FROM bill";
                  $result = $conn->query($sql);
                  while($row = $result->fetch_assoc()) { ?> 
                    <tr>
                      <td>
                        <p class="p-3"><?=$row['nama']?></p>
                      </td>
                      <td>
                        <p class="text-center font-weight-bold">Rp. <?=number_format($row['nominal'], 0, ',', '.')?></p>
                        <p class="text-center text-secondary">Kekurangann Rp. <?=number_format($row['nominalminus'], 0, ',', '.')?></p>
                      </td>
                      <td>
                        <p class="text-center"><?=$row['ket']?></p>
                      </td>
                      <td>
                        <p class="text-center font-weight-bold"><?php
                        if($row['status'] == 1){
                          echo '<span class="badge badge-sm bg-gradient-success">Lunas</span>';
                        }else
                        if($row['status'] == 2){
                          echo '<span class="badge badge-sm bg-gradient-danger">Belum Dibayar</span>';
                        }
                        if($row['status'] == 3){
                          echo '<span class="badge badge-sm bg-gradient-warning">Belum Lunas</span>';
                        }
                        ?></p>
                      </td>
                      <td>
                        <p class="text-center font-weight-bold"><?=$row['created_at']?></p>
                        <p class="text-center text-secondary"><?=$row['duedate']?></p>
                      </td>
                      <td>
                        <button id="editbill" class="btn btn-primary col" data-bs-toggle="modal" data-bs-target="#editbill<?=$row['id']?>">
                          Edit
                        </button>&nbsp;
                        <form onsubmit="return confirm('Apakah anda yakin?');" class="col" method="POST" action="engine.php?task=deleteBill&id=<?=$row['id']?>">
                          <button type="submit" class="btn btn-danger">
                            Hapus
                          </button>
                        </form> 
                        <div class="modal" id="editbill<?=$row['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Bill</h5>
                                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <form onsubmit="return confirm('Apakah anda yakin?');" method="POST" action="engine.php?task=editBill">
                                <div class="modal-body">
                                  <input type="number" class="form-control" id="dataid" name="dataid" placeholder="0" value="<?=$row['id']?>" hidden>
                                  <div class="form-group">
                                    <label for="billpic" class="form-label">Foto Pelunasan</label>
                                      <input type="file" id="billpic<?=$row['id']?>" name="pic" class="form-control" accept="image/*">
                                      <?php 
                                      if(isset($row['pic'])){
                                        echo '<input type="hidden" name="billImageData" id="billImageDataInput'.$row['id'].'" value="'.$row['pic'].'">';
                                        echo '<br/><img id="preview'.$row['id'].'" class="img-fluid" src="'.$row['pic'].'">';
                                      }else{
                                        echo '<input type="hidden" name="billImageData" id="billImageDataInput'.$row['id'].'">';
                                        echo '<br/><img class="img-fluid" id="preview'.$row['id'].'">';
                                      }
                                      ?>
                                    <script>
                                      document.getElementById("billpic<?=$row['id']?>").addEventListener('change', function(event) {
                                          const file = event.target.files[0];
                                          if (!file) return;

                                          const reader = new FileReader();
                                          reader.onload = function(e) {
                                              const img = new Image();
                                              img.onload = function() {
                                                  const canvas = document.createElement('canvas');
                                                  const ctx = canvas.getContext('2d');
                                                  
                                                  canvas.width = 1080;
                                                  canvas.height = 1080;
                                                  ctx.drawImage(img, 0, 0, 1080, 1080);

                                                  const compressedBase64 = canvas.toDataURL('image/jpeg', 0.8);
                                                  document.getElementById('preview<?=$row['id']?>').src = compressedBase64;
                                                  document.getElementById('preview<?=$row['id']?>').style.display = 'block';

                                                  document.getElementById('billImageDataInput<?=$row['id']?>').value = compressedBase64;
                                              };
                                              img.src = e.target.result;
                                          };
                                          reader.readAsDataURL(file);
                                      });
                                  </script>
                                  </div>
                                  <div class="form-group">
                                    <label for="nama">Nama Sales / Perusahaan</label>
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="eg. Mbak Anis PT. Bakul" value="<?=$row['nama']?>" required>
                                  </div>
                                  <div class="form-group">
                                    <label for="nominal">Jumlah Tagihan</label>
                                    <input type="number" class="form-control" id="nominal" name="nominal" placeholder="0" value="<?=$row['nominal']?>" required>
                                  </div>
                                  <div class="form-group">
                                    <label for="nominalminus">Jumlah Kekurangan Dibayar</label>
                                    <input type="number" class="form-control" id="nominalminus" name="nominalminus" placeholder="0" value="<?=$row['nominalminus']?>" required>  
                                  </div>
                                  <div class="form-group">
                                    <label for="duedate">Jatuh Tempo</label>
                                    <input type="date" class="form-control" id="duedate" name="duedate"  value="<?=$row['duedate']?>" required>
                                  </div>
                                  <div class="form-group">
                                    <label for="ket">Keterangan</label>
                                    <textarea type="text" class="form-control" id="ket" name="ket" placeholder="Keterangan" rows="4" required><?=$row['ket']?></textarea>
                                  </div>
                                  <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control" id="status" name="status">
                                      <option value="1" <?php if($row['status'] == 1){echo 'selected';}?>>Lunas</option>
                                      <option value="2" <?php if($row['status'] == 2){echo 'selected';}?>>Belum Dibayar</option>
                                      <option value="3" <?php if($row['status'] == 3){echo 'selected';}?>>Belum Lunas</option>
                                    </select>
                                  </div>         
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                                  <button type="submit" class="btn bg-gradient-primary">Save changes</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <footer class="footer">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>, Prima Company
                made with <i class="fa fa-heart"></i> by
                <a href="https://widifirmaan.web.id" class="font-weight-bold" target="_blank">W</a>
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </main>
  <div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
      <i class="fa fa-plus py-2"> </i>
    </a>
    <div class="card shadow-lg">
      <div class="card-header pb-0 pt-3 ">
        <div class="float-start">
          <h5 class="mt-3">Tambah Barang</h5>
          <p>*Hanya untuk jenis barang yang belum ada di tabel.</p>
        </div>
      </div>
      <div class="card-body pt-sm-3 pt-0" style="height: 100%; overflow-y: scroll;">
        <form onsubmit="return confirm('Apakah anda yakin?');" method="POST" action="engine.php?task=tambahBill">
                                <div class="modal-body">
                                  <input type="number" class="form-control" id="dataid" name="dataid" placeholder="0" hidden>
                                  <div class="form-group">
                                    <label for="billpic" class="form-label">Foto Pelunasan</label>
                                      <input type="file" id="billpic" name="pic" class="form-control" accept="image/*">
                                      <input type="hidden" name="billImageData" id="billImageDataInput">
                                      <img class="img-fluid" id="preview">
                                    <script>
                                      document.getElementById("billpic").addEventListener('change', function(event) {
                                          const file = event.target.files[0];
                                          if (!file) return;

                                          const reader = new FileReader();
                                          reader.onload = function(e) {
                                              const img = new Image();
                                              img.onload = function() {
                                                  const canvas = document.createElement('canvas');
                                                  const ctx = canvas.getContext('2d');
                                                  
                                                  // Set canvas dimensions to 512x512
                                                  canvas.width = 1080;
                                                  canvas.height = 1080;

                                                  // Draw the image onto the canvas, resizing it
                                                  // This will stretch or shrink the image to fit 512x512
                                                  ctx.drawImage(img, 0, 0, 1080, 1080);

                                                  // Get the Base64 string from the canvas
                                                  const compressedBase64 = canvas.toDataURL('image/jpeg', 0.8); // 0.8 is the quality
                                                  
                                                  // Display the compressed image preview
                                                  document.getElementById('preview').src = compressedBase64;
                                                  document.getElementById('preview').style.display = 'block';

                                                  // Set the compressed Base64 string to the hidden input field
                                                  document.getElementById('billImageDataInput').value = compressedBase64;
                                              };
                                              img.src = e.target.result;
                                          };
                                          reader.readAsDataURL(file);
                                      });
                                  </script>
                                  </div>
                                  <div class="form-group">
                                    <label for="nama">Nama Sales / Perusahaan</label>
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="eg. Mbak Anis PT. Bakul" required>
                                  </div>
                                  <div class="form-group">
                                    <label for="nominal">Jumlah Tagihan</label>
                                    <input type="number" class="form-control" id="nominal" name="nominal" placeholder="0" required>
                                  </div>
                                  <div class="form-group">
                                    <label for="nominalminus">Jumlah Kekurangan Dibayar</label>
                                    <input type="number" class="form-control" id="nominalminus" name="nominalminus" value="0" min="0" required>  
                                  </div>
                                  <div class="form-group">
                                    <label for="duedate">Jatuh Tempo</label>
                                    <input type="date" class="form-control" id="duedate" name="duedate" required>
                                  </div>
                                  <div class="form-group">
                                    <label for="ket">Keterangan</label>
                                    <textarea type="text" class="form-control" id="ket" name="ket" placeholder="Keterangan" rows="4" required></textarea>
                                  </div>
                                  <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control" id="status" name="status">
                                      <option value="1">Lunas</option>
                                      <option value="2">Belum Dibayar</option>
                                      <option value="3">Belum Lunas</option>
                                    </select>
                                  </div>         
                                </div>
                                <div class="modal-footer">
                                  <button type="submit" class="btn btn-primary w-100 px-3 mb-2 ms-2" data-class="bg-white">Tambah</button>
                                </div>
                              </form>
      </div>
    </div>
  </div>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../assets/js/soft-ui-dashboard.min.js?v=1.1.0"></script>
  <script>
    document.getElementById('searchInput').addEventListener('keyup', function() {
      const input = document.getElementById('searchInput');
      const filter = input.value.toUpperCase();
      const table1 = document.getElementById('toko1');
      const rows1 = table1.getElementsByTagName('tr');

      for (let i = 0; i < rows1.length; i++) {
        const cells = rows1[i].getElementsByTagName('td');
        let match = false;

        for (let j = 0; j < cells.length; j++) {
          if (cells[j].textContent.toUpperCase().includes(filter)) {
            match = true;
            break;
          }
        }
        rows1[i].style.display = match ? '' : 'none';  
      }
    })
  </script>
</body>
</html>