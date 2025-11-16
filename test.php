<!DOCTYPE html>
<html>
<head>
<title>Portfolio</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"/>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

<link rel="stylesheet" href="assets/css/style.css"/>



</head>

<body>

<header>
	<div class="container">
		<div class="row align-items-center">
			<div class="col-md-3">
				<div class="logo">
					<ul>
						<li>
							<img src="assets/images/logo.png">
						</li>
						<li>
							<h2>Umair Shakeel</h2>
							<p>SaaS UI/UX Designer</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-md-6">
				<div class="menu">
					<ul>
						<li><a href="javascript:;">Portfolio</a></li>
						<li><a href="javascript:;">Services</a></li>
						<li><a href="javascript:;">Tools</a></li>
						<li><a href="javascript:;">About Me</a></li>
					</ul>
				</div>
			</div>
			<div class="col-md-3">
				<div class="btnn">
					<a href="javascript:;">Message me on Upwork <i class="fa-regular fa-paper-plane"></i></a>
				</div>
			</div>
		</div>
	</div>
</header>

<section class="banner">
	<div class="container">
		<div class="row">

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


<!-- Optional visible combined route (soft) -->
<path id="routePath" class="route" d="" />
<path id="trailPath" class="trail" d="" stroke-dasharray="30 3000" stroke-linejoin="round"/>


<!-- tracer (a small rounded rectangle) -->
<g id="tracerGroup" transform="translate(0,0)">
<rect id="tracer" class="tracer" width="12" height="6" rx="3" x="0" y="0" transform="translate(-6,-3)" />
</g>


</svg>
</div>


				
			
		</div>
	</div>
</section>




<script>
s = ((s % total) + total) % total;
let acc = 0;
for(let i=0;i<segLengths.length;i++){
const L = segLengths[i];
if(acc + L >= s){
const t = (s-acc)/L;
const a = allPoints[i];
const b = allPoints[i+1];
return [ a[0] + (b[0]-a[0])*t, a[1] + (b[1]-a[1])*t, i ];
}
acc += L;
}
return allPoints[allPoints.length-1];
}


// animate with requestAnimationFrame
let start = null;
let distanceTravelled = 0;


function animate(ts){
if(!start) start = ts;
const dt = ts - start;
start = ts;
distanceTravelled += speed * dt; // pixels


const [x,y,segIndex] = posAt(distanceTravelled);
tracer.setAttribute('transform', `translate(${x},${y})`);


// set trail dash offset to create moving glow along route
const trailLen = 3000;
const offset = (distanceTravelled % trailLen);
trailPath.setAttribute('stroke-dashoffset', -offset);


requestAnimationFrame(animate);
}


// expose controls in console if you want
window._snake = { allPoints, total, segLengths, setSpeed(s){ speed = s; }, restart(){ distanceTravelled=0; } }


requestAnimationFrame(animate);


// optional UI helpers: click any box to jump tracer to its top-left
boxes.forEach((b, idx)=>{
b.style.cursor = 'pointer';
b.addEventListener('click', ()=>{
const x = parseFloat(b.getAttribute('x')) + 2;
const y = parseFloat(b.getAttribute('y')) + 2;
// find nearest point along path
let best = 0; let bd = Infinity;
for(let i=0;i<allPoints.length;i++){
const d = distance(allPoints[i],[x,y]);
if(d<bd){ bd=d; best=i; }
}
// compute distance to that index
let s = 0; for(let i=0;i<best;i++) s += segLengths[i]||0;
distanceTravelled = s;
})
});


</script>







<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>

