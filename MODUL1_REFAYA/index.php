<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Refaya Azzam Maheswara 102022340400</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px; 
            text-align: left; 
        }
        .form-container h1 {
            margin-bottom: 20px;
            text-align: center; 
        }
        .form-container label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-container input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box; 
        }
        .form-container .error {
            color: red;
            font-size: 0.9em;
            margin-bottom: 10px;
            display: none; 
        }
        .form-container button {
            background-color: #28a745;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%; 
            font-size: 1em; 
        }
        .form-container button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Formulir Pendaftaran Mahasiswa Baru</h1>
        <form action="submit.php" method="post" onsubmit="return validateForm()">
            <label for="name">Nama</label>
            <input type="text" id="name" name="name" value="<?php echo isset($_GET['name']) ? htmlspecialchars($_GET['name']) : ''; ?>">
            <div id="nameError" class="error">* Nama wajib diisi</div>
            
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?php echo isset($_GET['email']) ? htmlspecialchars($_GET['email']) : ''; ?>">
            <div id="emailError" class="error">* Email wajib diisi</div>
            
            <label for="nim">NIM</label>
            <input type="text" id="nim" name="nim" value="<?php echo isset($_GET['nim']) ? htmlspecialchars($_GET['nim']) : ''; ?>">
            <div id="nimError" class="error">* NIM harus berupa angka</div>
            
            <button type="submit">Daftar</button>
        </form>
    </div>

    <script>
        function validateForm() {
            let isValid = true;

            const name = document.getElementById('name').value;
            const nameError = document.getElementById('nameError');
            if (name.trim() === '') {
                nameError.style.display = 'block';
                isValid = false;
            } else {
                nameError.style.display = 'none';
            }

            const email = document.getElementById('email').value;
            const emailError = document.getElementById('emailError');
            if (email.trim() === '') {
                emailError.style.display = 'block';
                isValid = false;
            } else {
                emailError.style.display = 'none';
            }

            const nim = document.getElementById('nim').value;
            const nimError = document.getElementById('nimError');
            if (nim.trim() === '' || isNaN(nim)) {
                nimError.style.display = 'block';
                isValid = false;
            } else {
                nimError.style.display = 'none';
            }

            return isValid;
        }
    </script>
</body>
</html>