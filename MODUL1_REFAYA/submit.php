<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berhasil</title>
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
        .success-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
        }
        .success-container h1 {
            color: #28a745;
        }
        .success-container p {
            text-align: left;
            margin-left: 20px;
        }
    </style>
</head>
<body>
    <div class="success-container">
        <h1>Berhasil!</h1>
        <p>Data pendaftaran telah diterima.</p>
        <p><strong>Nama:</strong> <?php echo htmlspecialchars($_POST['name']); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($_POST['email']); ?></p>
        <p><strong>NIM:</strong> <?php echo htmlspecialchars($_POST['nim']); ?></p>
        <button onclick="window.location.href='index.php'">Back</button>
    </div>
</body>
</html>