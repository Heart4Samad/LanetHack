<?php
require 'db.php';
session_start();
$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $stmt = $pdo->prepare('SELECT * FROM users WHERE username = ?');
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header('Location: dashboard.php');
        exit;
    } else {
        $message = "<div class='alert alert-danger border-danger bg-dark text-danger py-2 text-center' style='box-shadow: 0 0 10px rgba(220,53,69,0.5);'>Access Denied: Invalid Credentials</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LanetHack - Secure Gateway</title>
    <link href="https://jsdelivr.net" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>
<body>

<!-- Dynamic Electric Gold Matrix Digital Rain Layer -->
<canvas id="matrix-canvas"></canvas>

<div class="container d-flex justify-content-center align-items-center min-vh-100" style="position: relative; z-index: 1;">
    <div class="row w-100 justify-content-center">
        <div class="col-md-4 card-cyber-neon p-4">
            <h3 class="text-center mb-4 text-neon-gold fw-bold">LANETHACK SYSTEM</h3>
            
            <?= $message; ?>
            
            <form method="POST">
                <div class="mb-3">
                    <label class="form-label text-neon-gold small fw-bold">OPERATOR ID</label>
                    <input type="text" name="username" class="form-control form-control-cyber" autocomplete="off" required>
                </div>
                <div class="mb-3">
                    <label class="form-label text-neon-gold small fw-bold">ACCESS ENCRYPTION KEY</label>
                    <input type="password" name="password" class="form-control form-control-cyber" required>
                </div>
                <button type="submit" class="btn btn-cyber-gold w-100 mt-3">BYPASS SECURITY</button>
            </form>
            
            <p class="text-center mt-4 mb-0">
                <a href="register.php" class="text-white text-decoration-none small" style="opacity: 0.5; transition: opacity 0.2s;" onmouseover="this.style.opacity=1" onmouseout="this.style.opacity=0.5">
                    [ Request System Access Matrix ]
                </a>
            </p>
        </div>
    </div>
</div>

<!-- Matrix Code Script Injection -->
<script>
const canvas = document.getElementById('matrix-canvas');
const ctx = canvas.getContext('2d');

// Size setup dynamically
function resizeCanvas() {
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
}
resizeCanvas();
window.addEventListener('resize', resizeCanvas);

// Katakana, alphabet and numeric characters mix
const chars = "ｦｧｨｩｪｫｬｭｮｯｰｱｲｳｴｵｶｷｸｹｺｻｼｽｾｿﾀﾁﾂﾃﾄﾅﾆﾇﾈﾉﾊﾋﾌﾍﾎﾏﾐﾑﾒﾓﾔﾕﾖﾗﾘﾙﾚﾛﾜﾝ1234567890ABCDEFGHIJKLMNOXYZ";
const charArray = chars.split("");

const fontSize = 14;
const columns = canvas.width / fontSize;
const rainDrops = Array(Math.floor(columns)).fill(1);

function drawMatrixRain() {
    // Fades previous frames down slightly to leave trailing trails
    ctx.fillStyle = 'rgba(3, 3, 3, 0.06)';
    ctx.fillRect(0, 0, canvas.width, canvas.height);
    
    // Set text style to Electric Gold
    ctx.fillStyle = '#ffdf00'; 
    ctx.font = fontSize + 'px monospace';
    
    for (let i = 0; i < rainDrops.length; i++) {
        const text = charArray[Math.floor(Math.random() * charArray.length)];
        ctx.fillText(text, i * fontSize, rainDrops[i] * fontSize);
        
        // Random reset pattern logic
        if (rainDrops[i] * fontSize > canvas.height && Math.random() > 0.975) {
            rainDrops[i] = 0;
        }
        rainDrops[i]++;
    }
}

// Render loop ticking smoothly at ~30 FPS for cyber retro look
setInterval(drawMatrixRain, 33);
</script>

</body>
</html>
