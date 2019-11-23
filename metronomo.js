// FUNCIONES GENERALES /////////////////////////////////
// Toggle css class
const toggleClass = (id,cla) => {
  const element = document.getElementById(id);
  if (element.classList) { 
    element.classList.toggle(cla);
  } else {
    const classes = element.className.split(" ");
    const i = classes.indexOf(cla);
    if (i >= 0) 
      classes.splice(i, 1);
    else 
      classes.push(cla);
      element.className = classes.join(" "); 
  }
};
// Actualiza BPM de cada canal
const updateBPM = () => {
  const lista = document.getElementsByClassName('bpm');
  for (var i = 0; i < lista.length; ++i) {
    lista[i].value=Math.round(pol[i]['nmax']*cpm);
  }
};
// Posicion del mouse/pointer dentro de elemento
const getMousePos = (c, e) => {
  const rect = c.getBoundingClientRect();
  return {
    x: (800*e.clientX/rect.width) - rect.left - (800/2),
    y: (800*e.clientY/rect.height) - rect.top - (800/2)
  };
};

// canvas onclick detector
const clickDetector = (evt) => {
  // detecta la posición del click
  const mousePos = getMousePos(canvas, evt);
  // Detecta en que región (si acaso) sucedió el click
  const cercania = 0.08; // Porcentaje: 0.99 => 99%
  for (var i = 0; i < regiones.length; i++) {
    // Si se clicó en la región
    if(Math.abs(regiones[i].pos.x-mousePos.x)<radius*cercania && Math.abs(regiones[i].pos.y-mousePos.y)<radius*cercania) {
      // Revisa en que estado se encuentra la región y lo invierte
      if(pol[regiones[i].e]['patron'][regiones[i].i]>0)pol[regiones[i].e]['patron'][regiones[i].i]=0;
      else pol[regiones[i].e]['patron'][regiones[i].i]=36;
      // Vuelve a dibujar el patron
      drawClock();
    }
  }
};
// Filtra canales a solo activos
const soloActivos = (p) => {
  var r = [];
  for (var i = 0; i < p.length; i++) {
    if(p[i]['activo'])r.push(p[i]);
  }
  return r;
};
// OPERACIONES POLIRRITMICAS //////////////////////////////////
const producto_mcm = (a,b) => {
  var r = a * b;
  var m = Math.max(a,b);
  var n = Math.min(a,b);
  m = m/n;
  if (Number.isInteger(m)) r = r/n;
  return r;
};
const array_mcm = (n=[]) => {
  n.sort(function(a, b){return b-a});
  var m = 1;
  for (var i = 0; i < n.length; i++) {
    m = producto_mcm(m,n[i]);
  }
  return m;
};
const multiplicar = (pp=[]) => {
  // console.log("pp:",pp);
  // Cuenta la longitud de cada patrón en n[]
  var n = [];
  for (var i = 0; i < pp.length; i++) {
    n.push(pp[i]['patron'].length);
  }
  // console.log("n:",n);
  // Calcula mcm de las longitudes de los patrones
  var m = array_mcm(JSON.parse(JSON.stringify(n))); // El paso por JSON evita pasar el array por referencia (https://stackoverflow.com/a/40470792)
  // console.log("m:",m);
  // Calcula la distancia en micropulsos de cada pulso del patron actual
  var d = [];
  for (var i = 0; i < pp.length; i++) {
    d.push(m/n[i]);
  }
  // console.log("d:",d);
  // Crea un patrón unificado a partir de los patrones recibidos
  // La longitud de patrón será: m
  var p = []; // Patrón de salida
  var v = []; // Volumen de salida
  for (var i = 0; i < m; i++) {
    p.push(0);
    v.push(0);
  }
  // Los patrones posteriores sobrescriben a los anteriores si caen en el mismo pulso
  // Pero un silencio (0) NO sobrescribe golpe (>0)
  for (var i = 0; i < pp.length; i++) {
    // console.log("n[i]:",n[i]," | d[i]:",d[i]);
    for (var j = 0,k = 0; j < m; j+=d[i],k++) {
      // pp[i][k] => Golpe o Silencio del patron actual
      // p[j] => Golpe o Silencio del patron de salida
      // console.log("Actual:",pp[i][k]," | Salida:",p[j]);
      if(p[j]<=0 || pp[i][k]>0) {
        p[j]=pp[i]['patron'][k];
        v[j]=pp[i]['vol'][k];
      }
    }
  }
  return {
    'nmax':m,
    'patron':p,
    'vol':v,
  };
};
// Metrónomo //////////////////////////////////////
const frequency = (n=0,tune=440) => {
  if(n==0)return 0;
  else return (tune/8) * Math.pow(2, n/12);
};
const metronomo = (callback, currentBeat = 0) => {
  const ppc = operado['nmax']; // (micro) pulsos por compas
  const now = context.currentTime; // Tiempo actual
  const bps = cps * ppc; // Beats por segundo
  const bl =  1/bps; // beat length (en segundos)
  const zero = 0.00001;

  pulso = currentBeat % ppc;
  const freq = frequency(operado['patron'][pulso]);

  if(pulso==0) {
    compas++;
    document.getElementById("compas").value=compas;
  }
  angulo = pulso*Math.PI/(operado['nmax']/2);
    // var second=((angulo-1)*Math.PI/(segs/2));
  document.getElementById("pulso").value=pulso;
  drawClock();

  let gainNode = context.createGain();
  let osc = context.createOscillator();
  gainNode.connect(context.destination);
  osc.connect(gainNode);
  const vo = Math.pow(operado['vol'][pulso],2)*vol;
  gainNode.gain.value = (operado['vol'][pulso]>0 && vol>0 && vo>0) ? vo:zero; // vol = volumen general (lineal)

  var bla =  bl-0;
  var np = 0;
  while(true){
    np++;
    const nextpulso = (currentBeat+np) % ppc;
    if(operado['patron'][nextpulso]==0)bla+=bl;
    else break;
  }
  currentBeat+=np-1;

  var ble = maxBeepDuration-0;
  if(ble>bla/2)ble=bla/2;
  gainNode.gain.exponentialRampToValueAtTime(zero, now + ble);

  // Tipo de onda en el ocilador
  // Only 0-3 are valid types.
  if(tipbip<=0 || tipbip>3) tipbip=0;
  const types = [
    'sine', // A sine wave. This is the default value.
    'square', // A square wave with a duty cycle of 0.5; that is, the signal is "high" for half of each period.
    'sawtooth', // A sawtooth wave.
    'triangle', // A triangle wave.
  ];
  osc.type = types[tipbip];

  osc.frequency.value = freq;
  osc.start(now);
  osc.stop(now + bla);


  if (typeof callback === "function")callback(now);
  //{now:now,cps:cps,ppc:ppc,bps:bps,bla:bla,pulso:pulso,freq:freq,patron:operado['patron'][pulso],vol:operado['vol'][pulso]});

  osc.onended = () => {
    drawClock();
    if(isPlaying)metronomo(callback, (currentBeat += 1));
    osc = null;
    gainNode = null;
  }
}
//////////////////////////////////////////
const play = () => {
  document.getElementById('playButton').innerHTML="STOP";
  toggleClass('playButton',"w3-green");
  toggleClass('playButton',"w3-red");
  isPlaying=true;
  playStart(); // metronomo.js
};
const stop = () => {
  document.getElementById('playButton').innerHTML="PLAY";
  toggleClass('playButton',"w3-green");
  toggleClass('playButton',"w3-red");
  isPlaying=false;
};
// Inicia el metrónomo
const playStart = () => {
  // Actualiza a cero los pulsos de cada canal
  for (var i = 0; i < pol.length; i++) {
    pol[i]['pulso'] = 0;
  }
  // Inicia el metrónomo
  compas = 0;
  // metronomo(cps,operado['nmax'],drawClock,tipbip);
  if(operado['nmax']>1)metronomo();
  else stop();
  // Dibuja el reloj
  // drawClock();
};

// Funciones del reloj
const drawClock = () => {
  pola = soloActivos(JSON.parse(JSON.stringify(pol)));
  operado = multiplicar(pola);
  drawFace(ctx, radius, bordep);
  drawTime(ctx, radius);
  drawHand(ctx, angulo, radius*0.9, radius*0.02);
  regiones=[];
  for (var i = 0; i < pol.length; i++) {
    if(pol[i]['activo'])drawNumbers(ctx, radius*((5-i)/5), pol[i]['nmax'], i);
  }
};

function drawTime(ctx, radi){
  lista = document.getElementsByClassName('pulso');
  for (var i = 0; i < pol.length; i++) {
    // if(!pol[i]['activo']) continue;
    pol[i]['pulso'] = Math.ceil((pulso+1)*pol[i]['nmax']/operado['nmax']);
    if(pol[i]['pulso']!=lista[i].value){
      lista[i].value=pol[i]['pulso'];
    }
  }
}

// Dibuja la cara del reloj
const drawFace = (ctx, radi, bordep) => {
  ctx.strokeStyle = '#999'; // Color de borde
  // Dibuja el círculo fondo y el borde exterior
  ctx.beginPath();
  ctx.arc(0, 0, radi, 0, 2*Math.PI);
  ctx.fillStyle = '#000'; // Color del fondo del reloj
  ctx.fill();
  ctx.lineWidth = radi*bordep; // Lo que sobra es borde
  ctx.stroke();
  ctx.closePath();

  // Círculos Niveles
  var rad = radi*0.83/5;
  var ra1 = radi*0.1;
  for (var i = 1; i < 6; i++) {
    ctx.beginPath();
    ctx.arc(0, 0, ra1+rad*(5-i), 0, 2*Math.PI);
    if(i==5)ctx.fillStyle = '#999'; //Circulo central
    else if(i/2!=Math.floor(i/2))ctx.fillStyle = '#222'; // Claro
    else ctx.fillStyle = '#000'; // Obscuro
    ctx.fill();
    ctx.closePath();
  }
};

// Dibuja los números de un círculo
const drawNumbers = (ctx, radi, n, ii) => {
  ctx.font = radius*0.15 + "px arial";
  ctx.textBaseline="middle";
  ctx.textAlign="center";
  var p = Math.ceil((pulso+1)*n/operado['nmax']);
  var ang;
  for(var num = 1; num <= n; num++){
    ang = (n+num-1) * Math.PI / (n/2);

    ctx.beginPath();
    ctx.arc(Math.sin(ang)*radi*0.85,-Math.cos(ang)*radi*0.85, radius*0.08, 0, 2*Math.PI);
    if (p==num)ctx.fillStyle = colores[ii][0];
    else ctx.fillStyle = '#444';
    ctx.fill();
    ctx.closePath();

    ctx.rotate(ang);
    ctx.translate(0, -radi*0.85);
    ctx.rotate(-ang);
    if(pol[ii]['patron'][num-1]==0 || pol[ii]['vol'][num-1]==0) {
      ctx.fillStyle = '#600';
      ctx.fillText('X', 0, 0);
    } else {
      if (p==num)ctx.fillStyle = '#fff';
      else ctx.fillStyle = colores[ii][1];
      ctx.fillText(num.toString(), 0, 0);
    }

    var posi = {
      x:Math.sin(ang)*radi*0.85,
      y:-Math.cos(ang)*radi*0.85
    };
    // console.log(posi);
    regiones.push({e:ii,n:n,i:num-1,pos:posi});
    ctx.rotate(ang);
    ctx.translate(0, radi*0.85);
    ctx.rotate(-ang);
  }
};

// Dibuja la manecilla del reloj
const drawHand = (ctx, second, length, width) => {
  ctx.beginPath();
  ctx.lineWidth = width;
  ctx.lineCap = "round";
  ctx.moveTo(0,0);
  ctx.rotate(second);
  ctx.lineTo(0, -length);
  ctx.stroke();
  ctx.rotate(-second);
  ctx.closePath();
};