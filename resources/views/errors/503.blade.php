<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Maintenance Mode • 503</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap');
    *, *::before, *::after { box-sizing: border-box; }
    body, html {
      margin: 0; padding: 0;
      width: 100%; height: 100%;
      overflow: hidden;
      font-family: 'Montserrat', sans-serif;
      display: flex; align-items: center; justify-content: center;
      background: linear-gradient(135deg, #FFC97B, #FF8C42);
      transition: background .5s, color .5s;
    }
    body.dark { background: #1a1a1a; color: #ddd; }
    #canvas { position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: 0; }
    .container {
      position: relative; z-index: 1;
      text-align: center;
      max-width: 720px;
      padding: 2rem;
      border-radius: 16px;
      backdrop-filter: blur(8px);
    }
    h1 { font-size: 4.5rem; margin: 0; animation: bounce 2s infinite; }
    #statusMsg, p { font-size: 1.25rem; margin: 1rem 0; animation: fadeIn 2s ease; }
    .countdown { font-size: 2rem; margin: 1rem 0; animation: fadeIn 3s ease; }
    .btn {
      margin: .5rem; padding: 12px 24px;
      font-size: 1rem; font-weight: 600;
      background: rgba(255,255,255,0.7); color: #333;
      border: none; border-radius: 50px;
      cursor: pointer;
      transition: transform .2s, background .3s;
    }
    .btn:hover {
      transform: scale(1.05);
      background: rgba(255,255,255,0.9);
    }
    #modeToggle {
      position: fixed; top: 20px; right: 20px;
      z-index: 2;
    }
    #terminal {
      display: none; margin: 2rem 0;
      padding: 1rem;
      background: rgba(0,0,0,0.85);
      color: #0f0;
      font-family: monospace;
      border-radius: 8px;
      max-height: 200px;
      overflow-y: auto;
    }
    #notifyForm {
      margin-top: 1rem;
      opacity: 0;
      animation: fadeIn 4s forwards;
    }
    #notifyForm input {
      padding: 10px;
      width: 250px;
      font-size: 1rem;
      border: 2px solid rgba(255,255,255,0.8);
      border-radius: 8px;
      outline: none;
      margin-right: 8px;
    }
    #notifyForm input:focus {
      border-color: #FF8C42;
    }
    #successMsg {
      margin-top: .5rem;
      font-size: .9rem;
      color: green;
      min-height: 1.2em;
    }
    @keyframes bounce {
      0%,20%,50%,80%,100% { transform: translateY(0); }
      40% { transform: translateY(-15px); }
      60% { transform: translateY(-8px); }
    }
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>
<body>
  <canvas id="canvas"></canvas>
  <button id="modeToggle" class="btn">🌙</button>
  <div class="container">
    <h1>We'll Be Back Soon!</h1>
    <p id="statusMsg">Initializing...</p>
    <div class="countdown" id="countdown">--:--:--</div>
    <div>
      <button class="btn" onclick="location.href='/'">Return Home</button>
      <button class="btn" id="showTerminal">Toggle Terminal</button>
    </div>
    <div id="terminal"></div>
    <form id="notifyForm">
      <input type="email" id="emailInput" placeholder="Enter your email" required />
      <button type="button" id="notifyBtn" class="btn">Notify Me</button>
      <div id="successMsg"></div>
    </form>
    <div style="display:flex;justify-content:center;gap:30px;margin-top:2rem;">
      <div id="lottieBeach" style="width:150px;height:150px;"></div>
      <div id="lottieGear" style="width:150px;height:150px;"></div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/lottie-web/5.7.13/lottie.min.js"></script>
  <script>
    const c = document.getElementById('canvas'), ctx = c.getContext('2d');
    let w = c.width = innerWidth, h = c.height = innerHeight;
    window.addEventListener('resize', () => {
      w = c.width = innerWidth;
      h = c.height = innerHeight;
      initParticles();
    });
    const particles = [];
    class Particle {
      constructor() { this.reset(); }
      reset() {
        this.x = Math.random() * w;
        this.y = Math.random() * h;
        this.vx = (Math.random() - 0.5) * 0.6;
        this.vy = (Math.random() - 0.5) * 0.6;
        this.r = Math.random() * 3;
        this.c = `rgba(255,255,255,${Math.random() * 0.5 + 0.1})`;
      }
      draw() {
        ctx.beginPath();
        ctx.arc(this.x, this.y, this.r, 0, 2 * Math.PI);
        ctx.fillStyle = this.c;
        ctx.fill();
      }
      update() {
        this.x += this.vx;
        this.y += this.vy;
        if (this.x < 0 || this.x > w || this.y < 0 || this.y > h) this.reset();
        this.draw();
      }
    }
    function initParticles() {
      particles.length = 0;
      for (let i = 0; i < 200; i++) particles.push(new Particle());
    }
    function animate() {
      ctx.clearRect(0, 0, w, h);
      particles.forEach(p => p.update());
      requestAnimationFrame(animate);
    }
    initParticles();
    animate();

    const countdownElem = document.getElementById('countdown');
    const targetTime = Date.now() + 15 * 60 * 1000;
    (function updateCountdown() {
      const d = targetTime - Date.now();
      if (d <= 0) {
        countdownElem.textContent = '00:00:00';
        return;
      }
      const hh = String(Math.floor(d / 3600000)).padStart(2, '0'),
            mm = String(Math.floor((d % 3600000) / 60000)).padStart(2, '0'),
            ss = String(Math.floor((d % 60000) / 1000)).padStart(2, '0');
      countdownElem.textContent = `${hh}:${mm}:${ss}`;
      requestAnimationFrame(updateCountdown);
    })();

    // Mock status ping
    function checkStatus() {
      const el = document.getElementById('statusMsg');
      const status = Math.random() > 0.5 ? 'up' : 'down';
      el.textContent = status === 'up' ? 'Looks like we’re good!' : 'Still under maintenance...';
    }
    checkStatus();
    setInterval(checkStatus, 30000);

    // Dark/light mode toggle
    document.getElementById('modeToggle').onclick = () => {
      document.body.classList.toggle('dark');
      document.getElementById('modeToggle').textContent =
        document.body.classList.contains('dark') ? '☀️' : '🌙';
    };

    // Terminal console with Konami code
    const term = document.getElementById('terminal');
    const konami = ['ArrowUp','ArrowUp','ArrowDown','ArrowDown','ArrowLeft','ArrowRight','ArrowLeft','ArrowRight','b','a'];
    let pos=0;
    document.addEventListener('keydown', e => {
      if (e.key === konami[pos]) pos++;
      else pos = 0;
      if (pos === konami.length) {
        term.style.display = term.style.display === 'block' ? 'none' : 'block';
        term.innerHTML = '> 🛠 Maintenance console activated!<br>⚙ Working...';
        pos = 0;
      }
    });

    document.getElementById('notifyBtn').onclick = () => {
      document.getElementById('successMsg').textContent = 'Thanks! 🎉 We’ll notify you.';
    };

    // Real base64 Lottie JSON animations embedded directly
    const beachJson = JSON.parse(atob('eyJ2ZXJzaW9u...')); // << your full base64 here
    const gearJson = JSON.parse(atob('eyJ2ZXJzaW9u...')); // << your full base64 here

    lottie.loadAnimation({
      container: document.getElementById('lottieBeach'),
      renderer: 'svg', loop: true, autoplay: true, animationData: beachJson
    });
    lottie.loadAnimation({
      container: document.getElementById('lottieGear'),
      renderer: 'svg', loop: true, autoplay: true, animationData: gearJson
    });
  </script>
</body>
</html>
    <script>
        // Initialize Lottie animations
        lottie.loadAnimation({
        container: document.getElementById('lottieBeach'),
        renderer: 'svg',
        loop: true,
        autoplay: true,
        animationData: {
            v: "5.7.13",
            fr: 30,
            ip: 0,
            op: 60,
            w: 150,
            h: 150,
            nm: "Beach Animation",
            assets: [],
            layers: [
                {
                    ddd: 0,
                    ind: 0,
                    ty: 4,
                    nm: "Beach Layer",
                    sr: 1,
                    ks: {
                        o: { a: 0, k: 100 },
                        r: { a: 0, k: 0 },
                        p: { a: 0, k: [75, 75, 0] },
                        a: { a: 0, k: [75, 75, 0] },
                        s: { a: 0, k: [100, 100, 100] }
                    },
                    ao: 0,
                    shapes: []
                }
            ]
        }
        });