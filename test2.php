<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>SVG Snake Tracer</title>
  <style>
    body { background:#0b0b0b; display:flex; gap:20px; align-items:flex-start; padding:20px; }
    .border-box{ background:transparent; border-radius:8px; }
    svg{ width:100%; max-width:1200px; height:auto; display:block; }
    .tracer{ fill: #2ecc71; stroke: none; }
  </style>
</head>
<body>
  <div class="border-box" style="width:100%;">
    <svg id="snake-svg" viewBox="0 0 1657 628" xmlns="http://www.w3.org/2000/svg">
      <!-- Boxes (original) -->
      <rect class="box" x="209.434" y="91.8799" width="204.064" height="225.544" rx="14.576" stroke="rgba(255,255,255,0.06)" fill="none"/>
      <rect class="box" x="414.962" y="167.269" width="475.026" height="303.229" rx="14.576" stroke="rgba(255,255,255,0.06)" fill="none"/>
      <rect class="box" x="890.346" y="91.9608" width="123.195" height="378.537" rx="14.576" stroke="rgba(255,255,255,0.06)" fill="none"/>
      <rect class="box" x="1013.9" y="90.784" width="237.334" height="304.406" rx="14.576" stroke="rgba(255,255,255,0.06)" fill="none"/>
      <rect class="box" x="1251.59" y="167.269" width="404.424" height="227.921" rx="14.576" stroke="rgba(255,255,255,0.06)" fill="none"/>
      <rect class="box" x="1251.59" y="395.547" width="205.563" height="230.274" rx="14.576" stroke="rgba(255,255,255,0.06)" fill="none"/>
      <rect class="box" x="1013.9" y="395.547" width="237.334" height="230.274" rx="14.576" stroke="rgba(255,255,255,0.06)" fill="none"/>
      <rect class="box" x="1251.59" y="1.35554" width="146.729" height="165.556" rx="14.576" stroke="rgba(255,255,255,0.06)" fill="none"/>
      <rect class="box" x="1012.72" y="1.35554" width="238.511" height="89.0709" rx="14.576" stroke="rgba(255,255,255,0.06)" fill="none"/>
      <rect class="box" x="413.786" y="1.35554" width="359.71" height="165.556" rx="14.576" stroke="rgba(255,255,255,0.06)" fill="none"/>
      <rect class="box" x="773.854" y="91.9608" width="117.312" height="74.9506" rx="14.576" stroke="rgba(255,255,255,0.06)" fill="none"/>
      <rect class="box" x="773.854" y="1.35554" width="238.511" height="90.2476" rx="14.576" stroke="rgba(255,255,255,0.06)" fill="none"/>
      <rect class="box" x="209.041" y="317.886" width="205.563" height="152.612" rx="14.576" stroke="rgba(255,255,255,0.06)" fill="none"/>
      <rect class="box" x="4.29706" y="399.077" width="205.563" height="71.4206" rx="14.576" stroke="rgba(255,255,255,0.06)" fill="none"/>
      <rect class="box" x="4.29706" y="91.9608" width="205.563" height="306.759" rx="14.576" stroke="rgba(255,255,255,0.06)" fill="none"/>
      <rect class="box" x="1.15803" y="470.356" width="413.466" height="155.466" rx="14.576" stroke="rgba(255,255,255,0.06)" fill="none"/>
      <rect class="box" x="415.158" y="470.356" width="413.466" height="155.466" rx="14.576" stroke="rgba(255,255,255,0.06)" fill="none"/>
      <rect class="box" x="829.158" y="470.356" width="184.466" height="155.466" rx="14.576" stroke="rgba(255,255,255,0.06)" fill="none"/>

      <!-- tracer (a small rounded rectangle) -->
      <g id="tracerGroup" transform="translate(0,0)">
        <rect id="tracer" class="tracer" width="300" height="6" rx="3" x="0" y="0" transform="translate(-6,-3)" />
      </g>

    </svg>
  </div>

  <script>
  const svg = document.getElementById('snake-svg');
  const boxes = Array.from(svg.querySelectorAll('rect.box'));

  function pointsAlongRect(x, y, w, h, stepsPerEdge = 60) {
    const pts = [];
    for (let i = 0; i < stepsPerEdge; i++) {
      const t = i / (stepsPerEdge - 1);
      pts.push([x + w * t, y]);
    }
    for (let i = 1; i < stepsPerEdge; i++) {
      const t = i / (stepsPerEdge - 1);
      pts.push([x + w, y + h * t]);
    }
    for (let i = 1; i < stepsPerEdge; i++) {
      const t = i / (stepsPerEdge - 1);
      pts.push([x + w * (1 - t), y + h]);
    }
    for (let i = 1; i < stepsPerEdge - 1; i++) {
      const t = i / (stepsPerEdge - 1);
      pts.push([x, y + h * (1 - t)]);
    }
    return pts;
  }

  let allPoints = [];
  boxes.forEach((r) => {
    const x = parseFloat(r.getAttribute('x'));
    const y = parseFloat(r.getAttribute('y'));
    const w = parseFloat(r.getAttribute('width'));
    const h = parseFloat(r.getAttribute('height'));
    const pts = pointsAlongRect(x, y, w, h, Math.floor(Math.max(12, Math.min(140, (w + h) / 6))));
    allPoints = allPoints.concat(pts);
  });

  function distance(a, b) {
    return Math.hypot(a[0] - b[0], a[1] - b[1]);
  }

  const tracer = document.getElementById('tracerGroup');
  let speed = 0.12;

  const segLengths = [];
  let total = 0;
  for (let i = 1; i < allPoints.length; i++) {
    const L = distance(allPoints[i - 1], allPoints[i]);
    segLengths.push(L);
    total += L;
  }

  function posAt(s) {
    s = ((s % total) + total) % total;
    let acc = 0;
    for (let i = 0; i < segLengths.length; i++) {
      const L = segLengths[i];
      if (acc + L >= s) {
        const t = (s - acc) / L;
        const a = allPoints[i];
        const b = allPoints[i + 1];
        return [a[0] + (b[0] - a[0]) * t, a[1] + (b[1] - a[1]) * t];
      }
      acc += L;
    }
    return allPoints[allPoints.length - 1];
  }

  let start = null;
  let distanceTravelled = 0;

  function animate(ts) {
    if (!start) start = ts;
    const dt = ts - start;
    start = ts;
    distanceTravelled += speed * dt;

    const [x, y] = posAt(distanceTravelled);
    tracer.setAttribute('transform', `translate(${x},${y})`);

    requestAnimationFrame(animate);
  }

  requestAnimationFrame(animate);
</script>

</body>
</html>
