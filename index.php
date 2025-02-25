<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Kalkulator Sederhana</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
	<style type="text/css">
		body {
			background-image: url('bg2.jpg');
			background-size: cover;
			background-position: center;
			background-repeat: no-repeat;
			height: 100vh;
			margin: 0;
			padding: 0;
		}

		.container {
			background-color: rgba(255, 255, 255, 0.7);
			padding: 20px;
			border-radius: 10px;
			box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
			max-width: 400px;
		}

		form {
			background-color: rgba(255, 255, 255, 0.5);
			padding: 15px;
			border-radius: 10px;
		}

		.bg-light {
			background-color: rgba(255, 255, 255, 0.5) !important;
			padding: 15px;
			border-radius: 10px;
		}

		.btn {
			width: 100%;
			padding: 10px;
			font-size: 14px;
		}

		.form-control {
			padding: 8px;
			font-size: 14px;
		}

		h2 {
			font-size: 24px;
		}

		h4 {
			font-size: 18px;
		}

		/* Warna kustom untuk tombol */
		.btn-tambah {
			background-color: #FAEBD7; /* Warna merah muda */
			border-color: #FAEBD7;
		}

		.btn-kurang {
			background-color: #FFB6C1; /* Warna ungu */
			border-color: #FFB6C1;
		}

		.btn-kali {
			background-color: #ADD8E6; /* Warna hijau */
			border-color: #ADD8E6;
		}

		.btn-bagi {
			background-color: #D8BFD8; /* Warna oranye */
			border-color: #D8BFD8;
		}

		.btn-tambah:hover, .btn-kurang:hover, .btn-kali:hover, .btn-bagi:hover {
			opacity: 0.8; /* Efek hover */
		}
	</style>
</head>
<body>
	<div class="container mt-5">
		<h2 class="text-center">Kalkulator Sederhana</h2>
		<div class="row justify-content-center">
			<div class="col-md-12">
				<form method="POST" class="p-2 border rounded">
					<label class="form-label">Angka Pertama</label>
					<input type="number" name="angka1" class="form-control" autocomplete="off" min="0" autofocus required onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="<?php echo isset($_POST['hasil']) ? $_POST['hasil'] : '' ?>">
					<label class="form-label">Angka Kedua</label>
					<input type="number" name="angka2" class="form-control" autocomplete="off" min="0" autofocus required onkeypress="return event.charCode >= 48 && event.charCode <= 57">
					<div class="d-flex justify-content-center gap-2 mt-2">
						<button type="submit" class="btn btn-tambah" name="operator" value="+" title="Tambah"><i class="fas fa-plus"></i></button>
						<button type="submit" class="btn btn-kurang" name="operator" value="-" title="Kurang"><i class="fas fa-minus"></i></button>
						<button type="submit" class="btn btn-kali" name="operator" value="*" title="Kali"><i class="fas fa-xmark"></i></button>
						<button type="submit" class="btn btn-bagi" name="operator" value="/" title="Bagi"><i class="fas fa-divide"></i></button>
						|
						<button type="reset" name="reset" class="btn btn-warning" value="reset" title="Clear Entry">CE</button>
					</div>
				</form>

				<div class="p-2 border rounded mt-3">
					<h4 class="text-center">
						<?php 
						if (isset($_POST['operator'])) {
							$angka1 = $_POST['angka1'];
							$angka2 = $_POST['angka2'];
							$operator = $_POST['operator'];

							if (!is_numeric($angka1) || !is_numeric($angka2)) {
								echo "<script>alert('Input harus berupa angka')</script>";
							} elseif ($operator == '/' && $angka2 == 0) {
								echo "<script>alert('Tidak dapat membagi dengan Nol')</script>";
							} else {
								switch ($operator) {
									case '+':
										$hasil = $angka1 + $angka2;
										break;
									case '-':
										$hasil = $angka1 - $angka2;
										break;
									case '*':
										$hasil = $angka1 * $angka2;
										break;
									case '/':
										$hasil = $angka1 / $angka2;
										break;
									default:
										echo "Operator tidak valid";
										break;
								}
								echo "$angka1 $operator $angka2 = $hasil";
							}
						} else {
							echo "Hasil : ";
						}
						?>
					</h4>

					<div class="row">
						<div class="col-6">
							<?php if (!empty($hasil)) : ?>
								<form method="POST">
									<input type="hidden" name="hasil" value="<?php echo $hasil ?>">
									<button type="submit" class="btn btn-primary" title="Memory Entry">ME</button>
								</form>
							<?php endif; ?>
						</div>
						<div class="col-6">
							<?php if (isset($hasil) && $hasil !== null): ?>
								<form method="POST">
									<button type="submit" name="resethasil" class="btn btn-danger" title="Memory Clean">MC</button>
								</form>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>	

	<p class="text-center">&copy; UKK RPL 2025 | Fahlina | XII RPL</p>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>