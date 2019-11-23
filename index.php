<?php
$version = "v1.2";
if(@$_GET['launcher']) $version = $version."b";
if(!empty($_GET['ti'])) $ti = abs($_GET['ti']);
else $ti = 25;

?><!DOCTYPE html>
<html lang="en" xml:lang="en">
<head>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport"/>
<!-- <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0, maximum-scale=1.0"/> -->
<!-- Search Engine -->
<meta name="description" content="Metrónomo irregular polirrítmico">
<meta name="image" content="/mc/metronomo_705x368.png">
<meta name="author" content="Santiago Chávez">
<link rel="manifest" href="/mc/manifest.php?ti=<?php echo $ti; ?>">
<title>Metrónomo irregular polirrítmico</title>
<meta name="theme-color" content="#202020" />
<!-- Allow web app to be run in full-screen mode. -->
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="mobile-web-app-capable" content="yes">
<meta name="application-name" content="Metrónomo polirrítmico">
<meta name="apple-mobile-web-app-title" content="Metrónomo polirrítmico">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<link rel="apple-touch-icon" href="/mc/launcher-icon-4x.png">
<!-- Open Graph general (Facebook, Pinterest & Google+) -->
<meta name="og:title" content="Metrónomo irregular polirrítmico">
<meta name="og:description" content="Metrónomo irregular polirrítmico en línea, gratuito y libre. Sin anuncios.">
<meta name="og:image" content="/mc/metronomo.png">
<meta name="og:url" content="https://lengua.la/mc/">
<meta name="og:site_name" content="La Lengua">
<meta name="og:locale" content="es_MX">
<meta name="og:type" content="website">
<meta name="website:author" content="Santiago Chávez">
<!-- Schema.org for Google -->
<meta itemprop="name" content="Metrónomo polirrítmico">
<meta itemprop="description" content="Metrónomo irregular polirrítmico en línea, gratuito y libre. Sin anuncios.">
<meta itemprop="image" content="/mc/metronomo.png">
<!-- Twitter -->
<meta name="twitter:card" content="summary">
<meta name="twitter:title" content="Metrónomo polirrítmico">
<meta name="twitter:description" content="Metrónomo irregular polirrítmico en línea, gratuito y libre. Sin anuncios.">
<meta name="twitter:site" content="@grupolalengua">
<meta name="twitter:creator" content="@sanxofon">
<meta name="twitter:image:src" content="https://lengua.la/mc/metronomo.png">

<!-- Disable automatic phone number detection. -->
<meta name="format-detection" content="telephone=no">
<!-- FAVICON -->
<link rel="shortcut icon" href="/mc/favicon.png" type="image/png">
<link rel="icon" href="/mc/favicon.png" type="image/png">
<!-- STYLES -->
<link rel="stylesheet" type="text/css" href="/mc/w3.css">
<style type="text/css">
  *{
    padding:0;
    margin:0;
  }
  body {
    background-color:#444;
    touch-action: manipulation;
  }
  .bloque {
    display: inline-block;
  }
  td.text {
    color: #ddd;
    background-color: transparent;
    border: none;
    font-family: "Courier New",Courier,monospace;
    width: 100px;
    font-size: 1.2em;
  }
  select {
    color: #ddd;
    background-color: #404040;
    border: 1px solid #606060;
    font-family: "Courier New",Courier,monospace;
    width: 100px;
    font-size: 1.2em;
  }
  input[type=text],
  input[type=number] {
    color: #ddd;
    background-color: transparent;
    border: 1px solid #404040;
    font-family: "Courier New",Courier,monospace;
    width: 100px;
    font-size: 1.2em;
  }
  input[type=text],
  input[type=number] {
    text-align: center;
  }
  /*input[type=text].chico,
  input[type=number].chico {
    width: 60px;
  }*/
  input[type=text],
  input[type=number] {
    box-sizing : border-box;
    width: 100%;
  }

  /*button {
    color: #ddd;
    background-color: #333;
    font-family: "Courier New",Courier,monospace;
    font-size: 1.2em;
    margin: 5px;
    padding: 6px;
    border-radius: 8px;
    cursor: pointer;
  }
  button:hover {
    background-color: #633;
  }*/
  td.text {
    text-align: right;
  }
  .exterior {
    border: 1px solid #666;
    padding:0;
    margin:0;
    background: #222;
    vertical-align: top;
  }
  .exterior div {
    vertical-align: top;
  }
  tr,td {
    padding:0;
    margin:0;
  }
  /*table.interior td:nth-child(6) {
    padding-right: 20px;
  }*/
  table.interior td:nth-child(1) {
    text-align: right !important;
    /*padding-left: 20px;*/
  }
  .oculto {
    height: 0px;
    overflow: auto;
  }

  .rs {
    border: 1px solid #666;
    resize: both;
    overflow: hidden;
    width: 500px;
    height: 500px;
  }
  .ts {
    max-width: 500px;
    overflow: auto;
  }
  @media (max-width : 640px) {
    .rs {
      width: 100%;
      height: 99vw;
    }
    .ts {
      max-width: 100vw;
    }
  }

  #canvas {
    background-color:transparent;
    height: inherit;
  }
  .fondo {
    background: #222;
  }
  .fondo1 {
    background: #333;
  }
  .fondo2 {
    background: #444;
  }
  table.cuadricula {
    width: 100%;
  }
  table.cuadricula td {
    width: 16.6%;
    text-align: center !important;
  }


  /*STYLED CHECKBOX*/
   /* Customize the label (the container) */
  .container {
    display: inline-block;
    position: relative;
    cursor: pointer;
    font-size: 22px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    width: 25px !important;
    height: 25px !important;
    border: 2px solid #aaa;
  }

  /* Hide the browser's default checkbox */
  .container input {
    opacity: 0;
    cursor: pointer;
    height: 0;
    width: 0;
  }

  /* Create a custom checkbox */
  .checkmark {
    position: absolute;
    top: 0;
    left: 0;
    height: 25px;
    width: 25px;
    background-color: #a88;
  }

  /* On mouse-over, add a grey background color */
  .container:hover input ~ .checkmark {
    background-color: #ccc;
  }

  /* When the checkbox is checked, add a blue background */
  .container input:checked ~ .checkmark {
    background-color: #44cc00;
  }

  /* Create the checkmark/indicator (hidden when not checked) */
  .checkmark:after {
    content: "";
    position: absolute;
    display: none;
  }

  /* Show the checkmark when checked */
  .container input:checked ~ .checkmark:after {
    display: block;
  }

  /* Style the checkmark/indicator */
  .container .checkmark:after {
    left: 9px;
    top: 5px;
    width: 5px;
    height: 10px;
    border: solid white;
    border-width: 0 3px 3px 0;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
  } 
  /*----- RANGOS -----*/
  input[type=range] {
    width: 100%;
    -webkit-appearance: none;
    background: #222;
  }
  input[type=range]:focus {
    outline: none;
  }
  input[type=range]::-webkit-slider-runnable-track {
    width: 100%;
    height: 18px;
    cursor: pointer;
    background: #5a5a5a;
    border-radius: 25px;
    border: 2.3px solid #464646;
  }
  input[type=range]:focus::-webkit-slider-runnable-track {
    background: #6e6e6e;
  }
  input[type=range]::-moz-range-track {
    width: 100%;
    height: 18px;
    cursor: pointer;
    background: #5a5a5a;
    border-radius: 25px;
    border: 2.3px solid #464646;
  }
  input[type=range]::-ms-track {
    width: 100%;
    height: 18px;
    cursor: pointer;
    background: transparent;
    border-color: transparent;
    color: transparent;
  }
  input[type=range]::-ms-fill-lower {
    background: #464646;
    border: 2.3px solid #464646;
    border-radius: 50px;
  }
  input[type=range]::-ms-fill-upper {
    background: #5a5a5a;
    border: 2.3px solid #464646;
    border-radius: 50px;
  }
  input[type=range]:focus::-ms-fill-lower {
    background: #5a5a5a;
  }
  input[type=range]:focus::-ms-fill-upper {
    background: #6e6e6e;
  }
  input[type=range]::-webkit-slider-thumb {
    border: 7px solid #7d7d7d;
    height: 30px;
    width: 30px;
    border-radius: 50px;
    background: #414141;
    cursor: pointer;
    -webkit-appearance: none;
    margin-top: -8.3px;
  }
  input[type=range]::-moz-range-thumb {
    border: 7px solid #7d7d7d;
    height: 30px;
    width: 30px;
    border-radius: 50px;
    background: #414141;
    cursor: pointer;
  }
  input[type=range]::-ms-thumb {
    border: 7px solid #7d7d7d;
    height: 30px;
    width: 30px;
    border-radius: 50px;
    background: #414141;
    cursor: pointer;
    height: 18px;
  }


  /* VErtical slider */
  input[type=range].vertical {
    -webkit-appearance: none;
    height: 100px;
    width: 18px;
    writing-mode: bt-lr;
    /* IE */
    -webkit-appearance: slider-vertical;
    /* WebKit */
  }

  input[type=range].vertical::-webkit-slider-runnable-track {
    height: 100%;
    width: 9px;
  }
  input[type=range].vertical:focus::-webkit-slider-runnable-track {
    background: #6e6e6e;
  }
  input[type=range].vertical::-moz-range-track {
    height: 100%;
    width: 9px;
  }
  input[type=range].vertical::-ms-track {
    height: 100%;
    width: 9px;
  }
  input[type=range].vertical::-webkit-slider-thumb {
    height: 15px;
    width: 15px;
  }
  input[type=range].vertical::-moz-range-thumb {
    height: 15px;
    width: 15px;
  }
  input[type=range].vertical::-ms-thumb {
    height: 15px;
    width: 15px;
  }


  input[type=range].small::-webkit-slider-runnable-track {
    width: 100%;
    height: 9px;
  }
  input[type=range].small:focus::-webkit-slider-runnable-track {
    background: #6e6e6e;
  }
  input[type=range].small::-moz-range-track {
    width: 100%;
    height: 9px;
  }
  input[type=range].small::-ms-track {
    width: 100%;
    height: 9px;
  }
  input[type=range].small::-webkit-slider-thumb {
    height: 15px;
    width: 15px;
  }
  input[type=range].small::-moz-range-thumb {
    height: 15px;
    width: 15px;
  }
  input[type=range].small::-ms-thumb {
    height: 15px;
    width: 15px;
  }
  /*---------------*/

</style>
</head>
<body>

<div class="exterior bloque" style="vertical-align: top;">
  <div class="bloque rs" id="canvasResizer">
      <canvas id="canvas" width="800" height="800"></canvas>
  </div>
  <div class="bloque ts">
    <table style="width: 98%;margin-top: 12px;">
      <tr>
        <td colspan="2" style="text-align:center;">
          <button style="width: 92%;" id="playButton" class="w3-xlarge w3-button w3-green w3-round">Play</button>
        </td>
      </tr>
      <tr>
        <td style="text-align:center;" class="w3-text-grey">
          <br><br><input style="width: 92%;" type="range" id="vol" min="0" max="1" step="0.05"><br>Volumen general<br>
        </td>
        <td><button onclick="document.getElementById('canal-modal').style.display='block';" style="width: 100%;padding:3px;" class="w3-button w3-round-xlarge w3-grey"><img src="cog.png" width="100%"></i></button></td>
      </tr>
      <tr>
        <td style="text-align:center;" class="w3-text-grey">
          <br><input style="width: 92%;" class="small" type="range" id="cpmslide" step="0.1" min="10" max="60"><br>Compases Por Minuto<br>
        </td>
        <td width="80"><input class="w3-xlarge" type="number" id="cpm" step="0.1" min="1" max="90" style="border: none;background-color: #333;padding: 0;line-height: 100%;"></td>
      </tr>
    </table>
    
    <table class="cuadricula" style="width: 98%; margin: 0 auto;">
      <tr class="w3-large fondo1">
        <td><label class="container"><input class="activo" type="checkbox" checked="checked"><span class="checkmark"></span></label></td>
        <td><label class="container"><input class="activo" type="checkbox" checked="checked"><span class="checkmark"></span></label></td>
        <td><label class="container"><input class="activo" type="checkbox" checked="checked"><span class="checkmark"></span></label></td>
        <td><label class="container"><input class="activo" type="checkbox" checked="checked"><span class="checkmark"></span></label></td>
        <td><label class="container"><input class="activo" type="checkbox" checked="checked"><span class="checkmark"></span></label></td>
        <td class="text w3-medium">Activo</td>
      </tr>
      <tr class="w3-large">
        <td><input class="nmax" type="number" min="0" max="64"></td>
        <td><input class="nmax" type="number" min="0" max="64"></td>
        <td><input class="nmax" type="number" min="0" max="64"></td>
        <td><input class="nmax" type="number" min="0" max="64"></td>
        <td><input class="nmax" type="number" min="0" max="64"></td>
        <td class="text w3-medium">Número</td>
      </tr>
      <tr class="w3-large fondo1">
        <td><input class="bpm" type="text" readonly="readonly"></td>
        <td><input class="bpm" type="text" readonly="readonly"></td>
        <td><input class="bpm" type="text" readonly="readonly"></td>
        <td><input class="bpm" type="text" readonly="readonly"></td>
        <td><input class="bpm" type="text" readonly="readonly"></td>
        <td class="text w3-medium">BPM</td>
      </tr>
      <tr class="w3-large">
        <td><input class="pulso" type="text" readonly="readonly"></td>
        <td><input class="pulso" type="text" readonly="readonly"></td>
        <td><input class="pulso" type="text" readonly="readonly"></td>
        <td><input class="pulso" type="text" readonly="readonly"></td>
        <td><input class="pulso" type="text" readonly="readonly"></td>
        <td class="text w3-medium">Pulso</td>
      </tr>
      <tr class="w3-large fondo1">
        <td><input orient="vertical" class="vol vertical" type="range" min="0.0" max="1.0" step="0.01"></td>
        <td><input orient="vertical" class="vol vertical" type="range" min="0.0" max="1.0" step="0.01"></td>
        <td><input orient="vertical" class="vol vertical" type="range" min="0.0" max="1.0" step="0.01"></td>
        <td><input orient="vertical" class="vol vertical" type="range" min="0.0" max="1.0" step="0.01"></td>
        <td><input orient="vertical" class="vol vertical" type="range" min="0.0" max="1.0" step="0.01"></td>
        <td class="text w3-medium">Vol</td>
      </tr>
      <tr class="w3-large">
        <td><input class="octava" type="number" min="0" max="10" step="1"></td>
        <td><input class="octava" type="number" min="0" max="10" step="1"></td>
        <td><input class="octava" type="number" min="0" max="10" step="1"></td>
        <td><input class="octava" type="number" min="0" max="10" step="1"></td>
        <td><input class="octava" type="number" min="0" max="10" step="1"></td>
        <td class="text w3-medium">Octava</td>
      </tr>
      <tr class="w3-large fondo1">
        <td><input class="tipbip" type="number" min=0 max=3 step=1></td>
        <td><input class="tipbip" type="number" min=0 max=3 step=1></td>
        <td><input class="tipbip" type="number" min=0 max=3 step=1></td>
        <td><input class="tipbip" type="number" min=0 max=3 step=1></td>
        <td><input class="tipbip" type="number" min=0 max=3 step=1></td>
        <td class="text w3-medium">Tipo</td>
      </tr>
    </table>
    <table class="interior cuadricula" style="width: 98%; margin: 0 auto;">
      <tr class="w3-large">
        <td class="text w3-medium">Compás:</td>
        <td colspan="2"><input type="number" id="compas" step=1></td>
        <td class="text w3-medium" style="text-align: right !important;">CPM Real:</td>
        <td colspan="2"><input type="text" id="cpmr" readonly="readonly"></td>
      </tr>
    </table>

    <div align="center" class="w3-text-white w3-small"><a href="javascript:void(0);" class="w3-text-grey" onclick="toggleClass('vermas','oculto');">Opciones avanzadas</a></div>
    <div class="oculto" id="vermas">
      <table width="96%" style="margin: 0 auto;">
        <tr class="fondo1 w3-large">
          <!-- <td class="text w3-medium">Ángulo:</td><td><input type="text" id="angulo" readonly="readonly"></td> -->
        </tr>
        <tr class="w3-large">
          <td class="text w3-small">Ss:&nbsp;<input type="text" id="segs" min="1" max="240" step="1.000" readonly="readonly" style="width: 70%;"></td>
          <td class="text w3-small">Ti:&nbsp;<input type="text" id="ti" step="1.000" readonly="readonly" style="width: 70%;"></td>
          <td class="text w3-small">Pr:&nbsp;<input type="text" id="precisionmax" readonly="readonly" ondblclick="precisionmax=0;" style="width: 70%;"><!-- <input type="text" id="precision" readonly="readonly" style="width: 50%;"> --></td>
        </tr>
        <tr class="w3-large">
          <td colspan="3" style="text-align:center; padding:20px;" class="w3-text-grey"><button class="w3-button w3-green w3-round" id="playSync">PlaySync</button>&nbsp;<input type="number" id="ss" value="2" style="width: 30%;"> segundos</td>
        </tr>
      </table>
    </div>
  </div>
  <div align="center" class="w3-text-grey w3-small" style="background: #101010;">
    <div><b>Metrónomo irregular polirrítmico</b> <?php echo $version; ?></div>
    <div><a href="https://lengua.la" target="_blank">@sanxofon</a> (2018-<?php echo date("Y"); ?>)</div>
  </div>
</div>

<div id="canal-modal" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-dark-grey w3-animate-zoom" style="background-color: #202020 !important; max-width: 500px;">

    <header class="w3-container w3-dark-grey w3-padding">
      <button class="w3-button w3-right w3-white w3-border" 
      onclick="document.getElementById('canal-modal').style.display='none'">Cerrar</button>
      <h2 style="margin:0;padding:0;">Configurar<span id="canal-num"></span></h2>
    </header>

    <div class="w3-container">
      <p class="w3-padding">Define las <b>notas</b> y el <b>volumen</b> del golpe, el acento y el silencio.</p>
<?php
$notas=array("A","A#","B","C","C#","D","D#","E","F","F#","G","G#","AUTO");
?>
      <div class="w3-padding" style="border: 1px solid #606060;">
        <table align="center" class="w3-large" style="width:100%;max-width: 400px; margin:0 auto;">
          <tr>
            <td align="right">Golpe:</td><td><select id="notu1"><?php foreach($notas as $i=>$n){ ?><option value="<?php echo $i; ?>"<?php if($i==0)echo ' selected'; ?>><?php echo $n; ?></option><?php } ?></select></td><td><input class="small" type="range" id="volu1" min="0" max="1" step="0.05" value="0.5"></td>
          </tr>
          <tr>
            <td align="right">Acento:</td><td><select id="notu2"><?php foreach($notas as $i=>$n){ ?><option value="<?php echo $i; ?>"<?php if($i==7)echo ' selected'; ?>><?php echo $n; ?></option><?php } ?></select></td><td><input class="small" type="range" id="volu2" min="0" max="1" step="0.05" value="1.0"></td>
          </tr>
        </table>
      </div>
      <p class="w3-padding w3-text-grey">Si seleccionas <b>AUTO</b> la frecuencia en <b>Hertz</b> de cada golpe está dada por su posición en el círculo. La <b>afinación</b> de la escala cromática se puede generar con un <b>número</b> de <b>12</b>.</p>
      <p>&nbsp;</p>
    </div>

  </div>
</div>
<script>
// Este código verifica si la API del service worker está disponible. Si está disponible, se registra el service worker de /mc/sw.js una vez que se carga la página.
if ('serviceWorker' in navigator) {
  window.addEventListener('load', function() {
    navigator.serviceWorker.register('/mc/sw.js').then(function(registration) {
      // Registration was successful
      console.log('ServiceWorker registrado exitosamente en: ', registration.scope);
    }, function(err) {
      // registration failed :(
      console.log('Error en el registro del ServiceWorker: ', err);
    });
  });
}
</script>
<script>
// Toggle css class
function toggleClass(id,cla) {
  var element = document.getElementById(id);
  if (element.classList) { 
    element.classList.toggle(cla);
  } else {
    var classes = element.className.split(" ");
    var i = classes.indexOf(cla);
    if (i >= 0) 
      classes.splice(i, 1);
    else 
      classes.push(cla);
      element.className = classes.join(" "); 
  }
}
// Sonido con ocilador
var beep = (function () {
  return function (duration, golpe, type, vo, nota, n, oct, finishedCallback) {
    duration = +duration;

    // Only 0-3 are valid types.
    if(type<=0 || type>3) type=0;

    if (typeof finishedCallback != "function") {
        finishedCallback = function () {};
    }

    if(notu[golpe]>11) { // AUTO
      var hertz = getFrequency(nota,n,oct);
    } else {
      var hertz = getFrequency(notu[golpe],12,oct);
    }
    // console.log('golpe',golpe);
    // console.log('notu[golpe]',notu[golpe]);
    // console.log('oct',oct);
    // console.log('hertz',hertz);

    var osc = actx.createOscillator();
    var types = [
      'sine', // A sine wave. This is the default value.
      'square', // A square wave with a duty cycle of 0.5; that is, the signal is "high" for half of each period.
      'sawtooth', // A sawtooth wave.
      'triangle', // A triangle wave.
    ];
    osc.type = types[type];
    //osc.type = "sine";


    // osc.connect(actx.destination);
    var gainNode = actx.createGain();
    osc.connect(gainNode);
    gainNode.connect(actx.destination);
    gainNode.gain.value = Math.pow(vol,2)*vo*volu[golpe];
    // if (osc.noteOff) {
    //   try{osc.noteOff(0);}
    //   catch(error) {console.log("No osc.noteOff");}
    // }
    // if (osc.stop) {
    //   try{osc.stop();}
    //   catch(error){console.log("No osc.stop");}
    // }
    osc.frequency.setValueAtTime(hertz, actx.currentTime);
    // gainNode.gain.exponentialRampToValueAtTime(vol, actx.currentTime+0.1);
    if (osc.noteOn) osc.noteOn(0);
    if (osc.start) osc.start();

    setTimeout(function () {
      // gainNode.gain.exponentialRampToValueAtTime(0.0001, actx.currentTime+0.1);
      if (osc.noteOff) osc.noteOff(0);
      if (osc.stop) osc.stop();
      finishedCallback();
    }, duration);

  };
})();
var getFrequency = function (nota,n,oct) {
  // console.log("IN:",nota,n,oct);
  nota -= -oct*n;
  // console.log("OT:",nota,n,oct);
  return 32.70 * Math.pow(2, (nota-1) / n);
};
var getMousePos = function(c, e) {
    var rect = c.getBoundingClientRect();
    return {
        x: (800*e.clientX/rect.width) - rect.left - (800/2),
        y: (800*e.clientY/rect.height) - rect.top - (800/2)
    };
}
// Objetos y Variables globales
var canvas = document.getElementById("canvas");
var ctx = canvas.getContext("2d");
// canvas onclick
canvas.onclick=function (evt) {
    var mousePos = getMousePos(canvas, evt);
    for (var i = 0; i < regiones.length; i++) {
      if(Math.abs(regiones[i].pos.x-mousePos.x)<radius*0.08 && Math.abs(regiones[i].pos.y-mousePos.y)<radius*0.08) {
        // console.log("Poli: ",pol[regiones[i].e]['patron']);
        if(pol[regiones[i].e]['patron'][regiones[i].i]>1)pol[regiones[i].e]['patron'][regiones[i].i]=0;
        else if(pol[regiones[i].e]['patron'][regiones[i].i]==1)pol[regiones[i].e]['patron'][regiones[i].i]=2;
        else pol[regiones[i].e]['patron'][regiones[i].i]=1;
        // console.log("Poli: ",pol[regiones[i].e]['patron']);
        drawClock();
      }
    }
}
// Variable que guarda cada variable poliritmia
var pol = [
  {
    'activo':false,
    'nmax':11,
    'octava':5,
    'tipbip':3,
    'pulso':0,
    'vol':0.5,
    'patron':[2,1,1,1,1,1,1,1,1,1,1],
  },
  {
    'activo':false,
    'nmax':7,
    'octava':4,
    'tipbip':3,
    'pulso':0,
    'vol':0.5,
    'patron':[2,1,1,1,1,1,1],
  },
  {
    'activo':true,
    'nmax':5,
    'octava':4,
    'tipbip':3,
    'pulso':0,
    'vol':0.5,
    'patron':[2,1,1,1,1],
  },
  {
    'activo':true,
    'nmax':3,
    'octava':3,
    'tipbip':3,
    'pulso':0,
    'vol':0.5,
    'patron':[2,1,1],
  },
  {
    'activo':false,
    'nmax':2,
    'octava':2,
    'tipbip':3,
    'pulso':0,
    'vol':0.5,
    'patron':[2,1],
  }
];
volu = [0.5,0.8];
notu = [0,5];
var colores = [
  ['#099','#9ff'],
  ['#eb0','#fc9'],
  ['#e0e','#f9f'],
  ['#4e4','#9f9'],
  ['#44e','#99f'],
];
var actx = null; // Web audio context
var regiones = [];
var isPlaying = false;
var radius = canvas.height / 2;
var angulo = 0;
var cpm = 30;
var duracompas = 60/cpm; // Duración del compás en segundos
// DEFINE SEGS --------------
// var segs = 70; // Pasos en el círculo
// var ti = Math.round( (duracompas*1000*1000) / segs ) / 1000; // En microsegundos (millonésimas)
// DEFINE TI   --------------

var ti = <?php echo $ti; ?>; // Milisegundos por tick
var segs = Math.round( (duracompas*1000) / ti ); // Pasos en el círculo
// --------------------------
var compas = 0;
var sto;
var vol = 0.75;
var ss,sti;
ctx.translate(radius, radius); // Movemos el centro
var bordep = 0.05; // Porcentaje de borde (0 - 1)
radius = radius * (1-bordep); // Un poco más pequeño que el canvas
// Variables para mantener la precisión en el tiempo
var start = null,  
    time = 0,  
    elapsed = '0.0';
var precisionmax = 0;

// Definiciones interfaz ----------
// Complejas
var claNames = ['nmax','octava','tipbip','vol'];
var lista;
for (var j = 0; j < claNames.length; j++) {
  lista = document.getElementsByClassName(claNames[j]);
  for (var i = 0; i < lista.length; ++i) {
    lista[i].value=pol[i][claNames[j]];
  }
}
lista = document.getElementsByClassName('activo');
for (var i = 0; i < lista.length; ++i) {
  lista[i].checked=pol[i]['activo'];
}
updateBPM();
// Simples
document.getElementById("ti").value=ti;
document.getElementById("segs").value=segs;
document.getElementById("vol").value=vol;
// 60000/(ti*segs) // Tiempo por vuelta en ms / minuto
document.getElementById("cpm").value=cpm;
document.getElementById("cpmslide").value=cpm;
document.getElementById("cpmr").value=Math.round(60000000/(ti*segs))/1000;
document.getElementById("compas").value=compas;

document.getElementById("volu1").value=volu[0];
document.getElementById("volu2").value=volu[1];
document.getElementById("notu1").value=notu[0];
document.getElementById("notu2").value=notu[1];

drawFace(ctx,radius);
drawClock();

// Funciones para mantener la precisión en el tiempo
function tiempo() {  
    time += ti;  
    elapsed = Math.floor(time / ti) / 10;  
    if(Math.round(elapsed) == elapsed) { elapsed += '.0'; }  
    var diff = (new Date().getTime() - start) - time;
    // document.getElementById('precision').value=Math.round(diff);
    if(diff>precisionmax){
      precisionmax=diff;
      if(precisionmax>1000)document.getElementById('precisionmax').value=-1;
      else document.getElementById('precisionmax').value=Math.round(precisionmax);
      if(precisionmax>ti)document.getElementById('precisionmax').style.backgroundColor='#a00';
      else document.getElementById('precisionmax').style.backgroundColor='#222';
    }
    var r = (ti - diff);
    // console.log("t:",ti,"r:",r);
    if(r<0)r=0;
    return r;
}
function clearTiempo(){
  start = new Date().getTime(); 
  time = 0;
  elapsed = '0.0';
  precisionmax=0;
  // document.getElementById('precision').value=0;
  document.getElementById('precisionmax').value=0;
}
// SyncStart funciones
function playSync(n=20) {
  ss = Math.round((new Date().getTime()+(n*1000))/1000)*1000;
  sti = setTimeout(syncStart,ti);
}
function syncStart() {
  clearInterval(sti);
  var s = new Date().getTime();
  document.getElementById('ss').value=Math.round((ss-s)/1000);
  if(ss<=s)playStart()
  else sti = setTimeout(syncStart,ti);
}

// Listeners ----------------------
document.getElementById('canvasResizer').onclick = function(){
  this.style.width=this.style.height;
};

var lista;
lista = document.getElementsByClassName('nmax');
for (var i = 0; i < lista.length; ++i) {
  (function(index){
    lista[index].onchange = function() {
      pol[index]['nmax']=this.value;
      var mem = pol[index]['patron'];
      pol[index]['patron']=[];
      for (var i = 0; i < pol[index]['nmax']; i++) {
        if(mem[i]>=0)pol[index]['patron'].push(mem[i]);
        else pol[index]['patron'].push(1);
      }
      document.getElementsByClassName('bpm')[index].value=Math.round(this.value*60000/(ti*segs));
      drawClock();
    }
  }(i));
}

lista = document.getElementsByClassName('octava');
for (var i = 0; i < lista.length; ++i) {
  (function(index){
    lista[index].onchange = function() {
      pol[index]['octava']=this.value;
    }
  }(i));
}
lista = document.getElementsByClassName('tipbip');
for (var i = 0; i < lista.length; ++i) {
  (function(index){
    lista[index].onchange = function() {
      pol[index]['tipbip']=this.value;
    }
  }(i));
}
lista = document.getElementsByClassName('vol');
for (var i = 0; i < lista.length; ++i) {
  (function(index){
    lista[index].onchange = function() {
      pol[index]['vol']=parseFloat(this.value);
    }
    lista[index].ondblclick = function() {
      this.value=0.5;
      pol[index]['vol']=0.5;
    }
  }(i));
}

lista = document.getElementsByClassName('activo');
for (var i = 0; i < lista.length; ++i) {
  (function(index){
    lista[index].onchange = function() {
      pol[index]['activo']=this.checked;
      drawClock();
    }
  }(i));
}

function changeCPM(v) {
  cpm = v;
  document.getElementById('cpmslide').value = cpm;
  document.getElementById('cpm').value = cpm;
  duracompas = 60/cpm; // Duración del compás en segundos
  segs = Math.round( (duracompas*1000) / ti ) ; // En microsegundos (millonésimas)
  document.getElementById('segs').value = segs;
  document.getElementById("cpmr").value=Math.round(60000000/(ti*segs))/1000;
  updateBPM();
}

document.getElementById('compas').onchange = function() {
  compas=this.value;
};
document.getElementById('vol').onchange = function() {
  vol=this.value;
};
document.getElementById('vol').ondblclick = function() {
  this.value = 0.5;
  vol = 0.5;
};
document.getElementById('volu1').onchange = function() {
  volu[0]=this.value;
};
document.getElementById('volu2').onchange = function() {
  volu[1]=this.value;
};
document.getElementById('notu1').onchange = function() {
  notu[0]=this.value;
};
document.getElementById('notu2').onchange = function() {
  notu[1]=this.value;
};
document.getElementById('cpmslide').onchange = function() {
  changeCPM(this.value);
};
document.getElementById('cpm').onchange = function() {
  changeCPM(this.value);
};
document.getElementById('playButton').onclick = function() {
  if(isPlaying){
    this.textContent="PLAY";
    toggleClass('playButton',"w3-green");
    toggleClass('playButton',"w3-red");
    isPlaying=false;
    playStop();
  }else{
    actx = new AudioContext();
    this.textContent="STOP";
    toggleClass('playButton',"w3-green");
    toggleClass('playButton',"w3-red");
    isPlaying=true;
    compas = 1;
    document.getElementById('compas').value=compas;
    playStart();
  }
};
document.getElementById('playSync').onclick = function() {
  playSync(document.getElementById('ss').value);
};
document.getElementById('ti').onchange = function() {
  ti=this.value;
  segs = Math.round( (duracompas*1000) / ti ) ;
  document.getElementById("segs").value=segs;
  document.getElementById("cpmr").value=Math.round(60000000/(ti*segs))/1000;
  updateBPM();
};
document.getElementById('segs').onchange = function() {
  segs=this.value;
  ti = Math.round( (duracompas*1000*1000) / segs ) / 1000 ;
  document.getElementById("ti").value=ti;
  document.getElementById("cpmr").value=Math.round(60000000/(ti*segs))/1000;
  updateBPM();
};

function updateBPM() {
  var lista = document.getElementsByClassName('bpm');
  for (var i = 0; i < lista.length; ++i) {
    lista[i].value=Math.round(pol[i]['nmax']*60000/(ti*segs));
  }
}

// FUNCIONES ----------------------
function playStart() {
  // Loop del intervalo
  clearInterval(sto);
  clearTiempo();
  angulo = 0;
  for (var i = 0; i < pol.length; i++) {
    var e = i-(-1);
    pol[i]['pulso'] = 0;
  }
  drawClock();
}
function playStop() {
  // Loop del intervalo
  clearInterval(sti);
  clearInterval(sto);
}

// Funciones del reloj
function drawClock() {
  var redo=true;
  if(!isPlaying)redo=false;
  clearInterval(sto);
  drawFace(ctx, radius);
  if(redo)drawTime(ctx, radius);
  regiones=[];
  for (var i = 0; i < pol.length; i++) {
    var e = i-(-1);
    if(pol[i]['activo'])drawNumbers(ctx, radius*((5-i)/5), pol[i]['nmax'], angulo, i);
  }
  var t = tiempo();
  // console.log('drawClock:',ti,t);
  if(redo)sto=setTimeout(drawClock,t);
}

// Dibuja la cara del reloj
function drawFace(ctx, radius) {
  ctx.strokeStyle = '#999'; // Color de borde
  // Dibuja el círculo fondo y el borde exterior
  ctx.beginPath();
  ctx.arc(0, 0, radius, 0, 2*Math.PI);
  ctx.fillStyle = '#000'; // Color del fondo del reloj
  ctx.fill();
  ctx.lineWidth = radius*bordep; // Lo que sobra es borde
  ctx.stroke();
  ctx.closePath();

  // Círculos Niveles
  var rad = radius*0.83/5;
  var ra1 = radius*0.1;
  for (var i = 1; i < 6; i++) {
    ctx.beginPath();
    ctx.arc(0, 0, ra1+rad*(5-i), 0, 2*Math.PI);
    if(i==5)ctx.fillStyle = '#999'; //Circulo central
    else if(i/2!=Math.floor(i/2))ctx.fillStyle = '#222'; // Claro
    else ctx.fillStyle = '#000'; // Obscuro
    ctx.fill();
    ctx.closePath();
  }
}
function drawNumbers(ctx, radi, n, a, ii) {
  var ang,p;
  ctx.font = radius*0.15 + "px arial";
  ctx.textBaseline="middle";
  ctx.textAlign="center";
  p = Math.ceil(a*n/segs);
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
    if(pol[ii]['patron'][num-1]==0) {
      ctx.fillStyle = '#333';
      ctx.fillText('X', 0, 0);
    } else if(pol[ii]['patron'][num-1]==2) {
      ctx.fillStyle = '#f33';
      ctx.fillText(num.toString(), 0, 0);
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
}
function drawTime(ctx, radius){
  angulo++;
  if(angulo>segs) {
    angulo=1;
    compas++;
    document.getElementById("compas").value=compas;
  }
  // document.getElementById("angulo").value=angulo;

  lista = document.getElementsByClassName('pulso');
  for (var i = 0; i < pol.length; i++) {
    var e = i-(-1);
    pol[i]['pulso'] = Math.ceil(angulo*pol[i]['nmax']/segs);
    if(pol[i]['pulso']!=lista[i].value){
      if(pol[i]['activo']){
        if(pol[i]['patron'][pol[i]['pulso']-1]==0) {
        } else  {
          beep(150, pol[i]['patron'][pol[i]['pulso']-1]-1, pol[i]['tipbip'], pol[i]['vol'], pol[i]['pulso'], pol[i]['nmax'], pol[i]['octava']);
        }
      }
      lista[i].value=pol[i]['pulso'];
    }
  }
  var second=((angulo-1)*Math.PI/(segs/2));
  drawHand(ctx, second, radius*0.9, radius*0.02);
}

// Dibuja la manecilla del reloj
function drawHand(ctx, second, length, width) {
  ctx.beginPath();
  ctx.lineWidth = width;
  ctx.lineCap = "round";
  ctx.moveTo(0,0);
  ctx.rotate(second);
  ctx.lineTo(0, -length);
  ctx.stroke();
  ctx.rotate(-second);
  ctx.closePath();
}

</script>

</body>
</html>
