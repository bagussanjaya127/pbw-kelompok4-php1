<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">

    <link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">  
    <link rel="manifest" href="/site.webmanifest">
    <title>Travoluka</title>
</head>
<body>

  <header>
    <nav class="navbar bg-body-tertiary shadow-lg mb-5">
      <div class="container-fluid">
      <a class="navbar-brand ps-3">
        <img src="img/favicon-32x32.png" alt="logo">
        <strong>Travoluka</strong></a>
      </div>
    </nav>  
  </header>

  
  <div class="container">
    <form>
    <h1 class = "text-center" id="hah">Pemesanan Tiket Pesawat</h1>
    <div class="mb-3 mt-3">
    <div class="form-group mt-3 ">
				<label for="nama-maskapai" >Nama Maskapai</label>
				<input type="text" class="form-control" id="nama-maskapai" name="nama-maskapai" required>
		</div>

    <!-- Dropdown Bandara Asal -->
    <label for="bandara-asal" class="form-label">Bandara Asal</label>
    <select class="form-control" id="bandara-asal" name="bandara-asal" required>
    <option value="">Pilih Bandara Asal</option>
					<?php 
					$bandaraAsal = array(
						"Soekarno Hatta",
						"Husein Sastranegara",
						"Abdul Rachman Saleh",
						"Juanda"
					);

					sort($bandaraAsal);

					foreach ($bandaraAsal as $bandara) {
						echo "<option value='" . $bandara . "'>" . $bandara . "</option>";
					}
					?>
				</select>
  </div>
  
  <!-- Dropdown Bandara Tujuan -->
  <div class="mb-3 mt-3">
    <label for="bandara-tujuan" class="form-label">Bandara Tujuan</label>
    <select class="form-control" id="bandara-tujuan" name="bandara-tujuan" required>
    <option value="">Pilih Bandara Tujuan</option>
					<?php 
					$bandaraTujuan = array(
						"Ngurah Rai",
						"Hasanuddin",
						"Inanwatan",
						"Sultan Iskandar Muda"
					);

					sort($bandaraTujuan);

					foreach ($bandaraTujuan as $bandaraT) {
						echo "<option value='" . $bandaraT . "'>" . $bandaraT . "</option>";
					}
					?>
				</select>
  </div>

    <div class="form-group mt-3 mb-3 ">
				<label for="harga-tiket" >Harga Tiket</label>
				<input type="text" class="form-control" id="harga-tiket" name="harga-tiket" required>
		</div>
    
  

  <button type="submit" class="btn btn-primary">Pesan</button>
    </form>
  </div>

  <?php
          if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Mengambil nilai dari form
            $namaMaskapai = $_POST["nama-maskapai"];
            $bandaraAsal = $_POST["bandara-asal"];
            $bandaraTujuan = $_POST["bandara-tujuan"];
            $tanggalKeberangkatan = $_POST["tanggal-keberangkatan"];
            $hargaTiket = $_POST["harga-tiket"];

            // Menghitung pajak bandara asal
            switch ($bandaraAsal) {
              case "Soekarno Hatta":
                $pajakBandaraAsal = 65000;
                break;
              case "Husein Sastranegara":
                $pajakBandaraAsal = 50000;
                break;
              case "Abdul Rachman Saleh":
                $pajakBandaraAsal = 40000;
                break;
              case "Juanda":
                $pajakBandaraAsal = 30000;
                break;
            }

            // Menghitung pajak bandara tujuan
            switch ($bandaraTujuan) {
              case "Ngurah Rai":
                $pajakBandaraTujuan = 85000;
                break;
              case "Hasanuddin":
                $pajakBandaraTujuan = 70000;
                break;
              case "Inanwatan":
                $pajakBandaraTujuan = 90000;
                break;
              case "Sultan Iskandar Muda":
                $pajakBandaraTujuan = 60000;
                break;
            }

            // Menghitung total pajak
            $totalPajak = $pajakBandaraAsal + $pajakBandaraTujuan;

            // Menghitung total harga tiket
            $totalHargaTiket = $hargaTiket + $totalPajak;
		  }
       ?>

       <!-- Collapse -->
       <div style="min-height: 120px;">
			     <div class="collapse collapse-horizontal" id="collapseWidthExample">
				   <div class="card card-body mt-3  border border-primary mx-auto" style="width: 400px;">
				         <h3 class="text-center mb-4">Tiket</h3>
				         <table>
							<!-- menampilkan output nama maskapai dan nilainya saat data di input-->
							<tr>
								<td>Nama Maskapai</td>
								<td>:</td>
								<td><?php echo $namaMaskapai; ?></td>
							</tr>
							  <!-- menampilkan output asal penerbangan dan nilainya saat data diinput -->
                            <tr>
								<td>Asal Penerbangan</td>
								<td>:</td>
								<td><?php echo $bandaraAsal; ?></td>
							</tr>
							<!-- menampilkan output tujuan penerbangan dan nilainya saat data diinput -->
							<tr>
								<td>Tujuan Penerbangan</td>
								<td>:</td>
								<td><?php echo $bandaraTujuan; ?></td>
							</tr>
							<!-- menampilkan output harga tiket dan nilainya saat data diinput -->
							<tr>
								<td>Harga Tiket</td>
								<td>:</td>
								<td> Rp. <?php echo $hargaTiket; ?></td>
							</tr>
							<!-- menampilkan output pajak dan nilainya saat data diinput -->
							<tr>
								<td>Pajak</td>
								<td>: </td>
								<td> Rp. <?php echo $totalPajak; ?></td>
							</tr>
							<!-- menampilkan output total harga tiket  dan nilainya saat data diinput -->
							<tr>
								<td>Total Harga Tiket</td>
								<td>: </td>
								<td> Rp.<?php echo $totalHargaTiket; ?></td>
							</tr>
						</table>
					</div>
		    </div> 
		</div>
		</form>
	</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>