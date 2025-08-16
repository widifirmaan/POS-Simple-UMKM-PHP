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
  if ($_SESSION['username'] == 'hamam') {
    header("Location: dashboard.php");
  }
}
$user_agent = $_SERVER['HTTP_USER_AGENT'];
// if (stripos($user_agent, 'iPhone') !== false) {
//     header('Location: mobile.php');
// }
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
                <div class="input-group">
                  <a class="btn btn-primary w-100 rounded" href="logout.php">Keluar</a>
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