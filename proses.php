<?php
// Detail perusahaan
$nama_perusahaan = "PT. MARWA MITRA SEJAHTERA TOUR AND TRAVEL";
$alamat_perusahaan = "Jl. Bung Karno, Jelojok Rt/Rw: /, Kelurahan Kopang Rembiga, Kecamatan Kopang, Kab. Lombok Tengah, Nusa Tenggara Barat";
$telepon_perusahaan = "0817-1716-0575";
$invoice_no = "INV" . rand(1000, 9999);

// Ambil data dari form
$jumlah_jamaah = $_POST['jumlah_jamaah'];
$jumlah_hari = $_POST['jumlah_hari'];
$tanggal_pemesanan = date('Y-m-d');

// Buat array untuk menyimpan data jamaah
$jamaah_data = [];

// Simpan data jamaah
for ($i = 1; $i <= $jumlah_jamaah; $i++) {
    $nama = $_POST["nama_$i"] ?? '';
    $alamat = $_POST["alamat_$i"] ?? '';
    $telepon = $_POST["telepon_$i"] ?? '';
    $no_paspor = $_POST["no_paspor_$i"] ?? '';
    
    // Simpan data ke array
    $jamaah_data[] = [$nama, $alamat, $telepon, $no_paspor];
}

// Simpan data ke file CSV
$csv_file = 'data_jamaah.csv'; // Ubah nama file ke data_jamaah.csv
$fp = fopen($csv_file, 'w');

// Cek apakah fopen berhasil
if ($fp === false) {
    die("Error: Unable to open file $csv_file for writing. Check permissions.");
}

// Menulis header ke file CSV
fputcsv($fp, ['Nama', 'Alamat', 'Telepon', 'No Paspor', 'Jumlah Hari', 'Tanggal Pemesanan']);

// Menulis data jamaah ke file CSV
foreach ($jamaah_data as $data) {
    fputcsv($fp, array_merge($data, [$jumlah_hari, $tanggal_pemesanan]));
}

// Tutup file CSV
fclose($fp);

// Menampilkan struk pembayaran
echo "<div style='font-family: Arial, sans-serif; max-width: 600px; margin: auto; padding: 20px; border: 1px solid #ddd; background-color: #f9f9f9;'>";
echo "<h2 style='text-align: center; color: #d5006d;'>INVOICE</h2>";

// Logo Perusahaan
echo "<div style='text-align: center; margin-bottom: 20px;'>";
echo "<img src='logo.jpeg' style='width: 150px; height: auto;'>";
echo "</div>";

echo "<div style='border-bottom: 1px solid #d5006d; padding-bottom: 10px;'>";
echo "<p><strong>$nama_perusahaan</strong></p>";
echo "<p>$alamat_perusahaan</p>";
echo "<p>Telp: $telepon_perusahaan</p>";
echo "</div>";

echo "<div style='margin-top: 20px;'>";
echo "<p><strong>Invoice No:</strong> $invoice_no</p>";
echo "<p><strong>Tanggal:</strong> $tanggal_pemesanan</p>";
echo "</div>";

// Menampilkan data jamaah
foreach ($jamaah_data as $index => $data) {
    echo "<div style='margin-top: 20px;'>";
    echo "<p><strong>Nama Jamaah " . ($index + 1) . ":</strong> {$data[0]}</p>";
    echo "<p><strong>Alamat:</strong> {$data[1]}</p>";
    echo "<p><strong>Telepon:</strong> {$data[2]}</p>";
    echo "<p><strong>No. Paspor:</strong> {$data[3]}</p>";
    echo "</div>";
}

// Menampilkan detail pemesanan
echo "<table style='width: 100%; border-collapse: collapse; margin-top: 20px;'>";
echo "<thead>";
echo "<tr style='background-color: #d5006d; color: white;'>";
echo "<th style='border: 1px solid #ddd; padding: 8px;'>Jumlah Hari</th>";
echo "<th style='border: 1px solid #ddd; padding: 8px;'>Tanggal Pemesanan</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";
echo "<tr>";
echo "<td style='border: 1px solid #ddd; padding: 8px;'>$jumlah_hari Hari</td>";
echo "<td style='border: 1px solid #ddd; padding: 8px;'>$tanggal_pemesanan</td>";
echo "</tr>";
echo "</tbody>";
echo "</table>";

echo "<div style='text-align: center; margin-top: 40px;'>";
echo "<p>Terima kasih atas kepercayaan Anda, semoga perjalanan ibadah Anda diberkahi.</p>";
echo "<p><strong>$nama_perusahaan</strong></p>";
echo "</div>";

// Tambahkan tombol cetak
echo "<div style='text-align: center; margin-top: 20px;'>";
echo "<button onclick='window.print()' style='background-color: #d5006d; color: white; border: none; padding: 10px 20px; cursor: pointer;'>Cetak Struk</button>";
echo "</div>";

?>
