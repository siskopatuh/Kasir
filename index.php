<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pemesan paket umrah Al - Marwa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 50%;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-top: 10px;
        }

        input[type="text"], input[type="number"], select {
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 100%;
        }

        input[type="submit"], button {
            padding: 10px;
            background-color: #d5006d;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }

        input[type="submit"]:hover, button:hover {
            background-color: #d5000d;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        p {
            font-size: 18px;
        }
    </style>
    <script>
        function generateFields() {
            var jumlahJamaah = document.getElementById('jumlah_jamaah').value;
            var jamaahContainer = document.getElementById('jamaahContainer');
            jamaahContainer.innerHTML = ''; // Reset konten lama

            for (var i = 1; i <= jumlahJamaah; i++) {
                jamaahContainer.innerHTML += `
                    <h3>Data Jamaah ${i}</h3>
                    <label for="nama_${i}">Nama:</label>
                    <input type="text" id="nama_${i}" name="nama_${i}" required>

                    <label for="alamat_${i}">Alamat:</label>
                    <input type="text" id="alamat_${i}" name="alamat_${i}" required>

                    <label for="telepon_${i}">Telepon:</label>
                    <input type="text" id="telepon_${i}" name="telepon_${i}" required>

                    <label for="no_paspor_${i}">No Paspor:</label>
                    <input type="text" id="no_paspor_${i}" name="no_paspor_${i}" required>
                    <hr>
                `;
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <h1>Form PForm Pemesan paket umrah Al - Marwa</h1>
        <form action="proses.php" method="post">
            <label for="jumlah_jamaah">Jumlah Jamaah:</label>
            <input type="number" id="jumlah_jamaah" name="jumlah_jamaah" min="1" max="10" required>
            <button type="button" onclick="generateFields()">Isi Data Jamaah</button>

            <div id="jamaahContainer"></div>

            <label for="jumlah_hari">Jumlah Hari Umrah:</label>
            <input type="number" id="jumlah_hari" name="jumlah_hari" min="1" required>

            <input type="submit" value="Proses Pemesanan">
        </form>
    </div>
</body>
</html>
