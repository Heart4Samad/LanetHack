<?php
session_start();
// Restrict unauthenticated access
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LanetHack - Command Center</title>
    <link href="https://jsdelivr.net" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>
<body>

<!-- Dynamic Electric Gold Matrix Rain Background -->
<canvas id="matrix-canvas"></canvas>

<!-- Cyber Navbar -->
<nav class="navbar navbar-dark navbar-cyber sticky-top">
    <div class="container">
        <span class="navbar-brand mb-0 h1 text-neon-gold fw-bold">
            <span class="spinner-grow spinner-grow-sm text-warning me-2" role="status"></span>
            LANETHACK // MAINFRAME
        </span>
        <div class="d-flex align-items-center">
            <span class="text-white me-3 d-none d-sm-inline small">OPERATOR: <strong class="text-neon-gold"><?= htmlspecialchars($_SESSION['username']); ?></strong></span>
            <a href="logout.php" class="btn btn-outline-danger btn-sm px-3 fw-bold">TERMINATE SESSION</a>
        </div>
    </div>
</nav>

<div class="container mt-5" style="position: relative; z-index: 1;">
    <!-- Welcome Header Card with Neon Pulse -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card-cyber-neon p-5 text-center text-sm-start">
                <h1 class="display-5 fw-bold text-neon-gold mb-2">ACCESS GRANTED.</h1>
                <p class="fs-5 text-white-50">Welcome to your secure administrative portal, node <span class="text-neon-gold"><?= htmlspecialchars($_SESSION['username']); ?></span>. Local encryption modules are running at optimal performance parameters.</p>
                <hr class="border-secondary opacity-25 my-4">
                <button class="btn btn-cyber-gold px-4 py-2" type="button" onclick="triggerBreachAlert()">RUN NETWORK DIAGNOSTIC</button>
            </div>
        </div>
    </div>

    <!-- Metrics Row -->
    <div class="row g-4 mb-4">
        <div class="col-md-4">
            <div class="stat-box">
                <div class="text-neon-gold small fw-bold tracking-wider">FIREWALL STATUS</div>
                <div class="h2 my-2 fw-bold text-white">ACTIVE</div>
                <div class="progress bg-dark" style="height: 4px;">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 100%"></div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stat-box">
                <div class="text-neon-gold small fw-bold">DECRYPTION ENGINE</div>
                <div class="h2 my-2 fw-bold text-white">256-BIT</div>
                <div class="progress bg-dark" style="height: 4px;">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 75%"></div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stat-box">
                <div class="text-neon-gold small fw-bold">DATABASE CONNECTIVITY</div>
                <div class="h2 my-2 fw-bold text-success">ONLINE</div>
                <div class="progress bg-dark" style="height: 4px;">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Interactive Live Terminal Log -->
    <div class="row">
        <div class="col-12">
            <div class="terminal-window">
                <div class="terminal-header d-flex justify-content-between align-items-center">
                    <span>SYSTEM_LOG_SHELL // lanethack_core</span>
                    <span class="badge bg-warning text-dark px-2">LIVE STREAM</span>
                </div>
                <div class="terminal-body">
                    <div id="terminal-text"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// --- Matrix Rain Logic ---
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

// --- Terminal Simulator ---
const logLines = [
    "&gt; Initializing secure terminal node...",
    "&gt; Verifying PDO security keys... [OK]",
    "&gt; Access authorization checked for User ID: <?= $_SESSION['user_id']; ?>",
    "&gt; Matrix canvas injection background layer operational.",
    "&gt; LanetHack protocol online. Ready for execution commands."
];

let lineIndex = 0;
const terminalText = document.getElementById('terminal-text');

function printLogLine() {
    if (lineIndex < logLines.length) {
        const p = document.createElement('p');
        p.className = 'mb-1 text-success';
        p.style.fontFamily = 'monospace';
        p.innerHTML = logLines[lineIndex];
        terminalText.appendChild(p);
        lineIndex++;
        setTimeout(printLogLine, 800); // 800ms delay between prints
    }
}
// Run typing simulation on mount
window.onload = printLogLine;

function triggerBreachAlert() {
    alert("Diagnostic executed: Zero malicious exploits found. Mainframe fully secure.");
}
</script>

</body>
</html>
