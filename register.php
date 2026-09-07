<?php
require 'db.php';
$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (!empty($username) && !empty($password)) {
        // Securely hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        try {
            $stmt = $pdo->prepare('INSERT INTO users (username, password) VALUES (?, ?)');
            $stmt->execute([$username, $hashed_password]);
            $message = "<div class='alert alert-success border-success bg-dark text-success py-2 text-center' style='box-shadow: 0 0 10px rgba(40,167,69,0.5);'>Registration successful! <a href='login.php' class='text-neon-gold fw-bold'>Login here</a></div>";
        } catch (\PDOException $e) {
            $message = "<div class='alert alert-danger border-danger bg-dark text-danger py-2 text-center' style='box-shadow: 0 0 10px rgba(220,53,69,0.5);'>Operator ID already exists.</div>";
        }
    } else {
        $message = "<div class='alert alert-danger border-danger bg-dark text-danger py-2 text-center' style='box-shadow: 0 0 10px rgba(220,53,69,0.5);'>Please fill in all security fields.</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LanetHack - Request Access</title>
    <link href="https://jsdelivr.net" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>
<body>

<!-- Dynamic Electric Gold Matrix Digital Rain Layer -->
<canvas id="matrix-canvas"></canvas>

<div class="container d-flex justify-content-center align-items-center min-vh-100" style="position: relative; z-index: 1;">
    <div class="row w-100 justify-content-center">
        <div class="col-md-4 card-cyber-neon p-4">
            <h3 class="text-center mb-4 text-neon-gold fw-bold">REQUEST ACCESS</h3>
            
            <?= $message; ?>
            
            <form method="POST">
                <div class="mb-3">
                    <label class="form-label text-neon-gold small fw-bold">CREATE OPERATOR ID</label>
                    <input type="text" name="username" class="form-control form-control-cyber" autocomplete="off" required>
                </div>
                <div class="mb-3">
                    <label class="form-label text-neon-gold small fw-bold">GENERATE ACCESS KEY</label>
                    <input type="password" name="password" class="form-control form-control-cyber" required>
                </div>
                <button type="submit" class="btn btn-cyber-gold w-100 mt-3">REGISTER OPERATOR</button>
            </form>
            
            <p class="text-center mt-4 mb-0">
                <a href="login.php" class="text-white text-decoration-none small" style="opacity: 0.5; transition: opacity 0.2s;" onmouseover="this.style.opacity=1" onmouseout="this.style.opacity=0.5">
                    [ Back to Secure Login Gateway ]
                </a>
            </p>
        </div>
    </div>
</div>

<!-- Matrix Code Script Injection -->
<script>
const canvas = document.getElementById('matrix-canvas');
const ctx = canvas.getContext('2d');

function resizeCanvas() {
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
}
resizeCanvas();
window.addEventListener('resize', resizeCanvas);

const chars = "ｦｧｨｩｪｫｬｭｮｯｰｱｲｳｴｵｶｷｸｹｺｻｼｽｾｿﾀﾁﾂﾃﾄﾅﾆﾇﾈﾉﾊﾋﾌﾍﾎﾏﾐﾑﾒﾓﾔﾕﾖﾗﾘﾙﾚﾛﾜﾝ1234567890ABCDEFGHIJKLMNOXYZ";
const charArray = chars.split("");

const fontSize = 14;
const columns = canvas.width / fontSize;
const rainDrops = Array(Math.floor(columns)).fill(1);

function drawMatrixRain() {
    ctx.fillStyle = 'rgba(3, 3, 3, 0.06)';
    ctx.fillRect(0, 0, canvas.width, canvas.height);
    
    ctx.fillStyle = '#ffdf00'; 
    ctx.font = fontSize + 'px monospace';
    
    for (let i = 0; i < rainDrops.length; i++) {
        const text = charArray[Math.floor(Math.random() * charArray.length)];
        ctx.fillText(text, i * fontSize, rainDrops[i] * fontSize);
        
        if (rainDrops[i] * fontSize > canvas.height && Math.random() > 0.975) {
            rainDrops[i] = 0;
        }
        rainDrops[i]++;
    }
}

setInterval(drawMatrixRain, 33);
</script>

</body>
</html>
