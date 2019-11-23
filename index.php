<?php
$version = "v1.8";
if(@$_GET['launcher']) $version = $version."b";
if(!empty($_GET['ti'])) $ti = abs($_GET['ti']);
else $ti = 25;
if(!empty($_GET['c'])) $clave = preg_replace('/[^0-9a-zA-Z\.\/]/i','',$_GET['c']);
else $clave = '11.b/9.9/7.7/5.5/3.3';

?><!DOCTYPE html>
<html lang="en" xml:lang="en">
<head>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport"/>
<!-- <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0, maximum-scale=1.0"/> -->
<!-- Search Engine -->
<meta name="description" content="Metrónomo irregular polirrítmico">
<meta name="image" content="/mc/img/metronomo_705x368.png">
<meta name="author" content="Santiago Chávez Novaro">
<link rel="manifest" href="/mc/manifest.php?ti=<?php echo $ti; ?>">
<title>Metrónomo irregular polirrítmico</title>
<meta name="theme-color" content="#202020" />
<!-- Allow web app to be run in full-screen mode. -->
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="mobile-web-app-capable" content="yes">
<meta name="application-name" content="Metrónomo polirrítmico">
<meta name="apple-mobile-web-app-title" content="Metrónomo polirrítmico">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<link rel="apple-touch-icon" href="/mc/img/launcher-icon-4x.png">
<!-- Open Graph general (Facebook, Pinterest & Google+) -->
<meta name="og:title" content="Metrónomo irregular polirrítmico">
<meta name="og:description" content="Metrónomo irregular polirrítmico en línea, gratuito y libre. Sin anuncios.">
<meta name="og:image" content="/mc/img/metronomo.png">
<meta name="og:url" content="https://lengua.la/mc/">
<meta name="og:site_name" content="La Lengua">
<meta name="og:locale" content="es_MX">
<meta name="og:type" content="website">
<meta name="website:author" content="Santiago Chávez Novaro">
<!-- Schema.org for Google -->
<meta itemprop="name" content="Metrónomo polirrítmico">
<meta itemprop="description" content="Metrónomo irregular polirrítmico en línea, gratuito y libre. Sin anuncios.">
<meta itemprop="image" content="/mc/img/metronomo.png">
<!-- Twitter -->
<meta name="twitter:card" content="summary">
<meta name="twitter:title" content="Metrónomo polirrítmico">
<meta name="twitter:description" content="Metrónomo irregular polirrítmico en línea, gratuito y libre. Sin anuncios.">
<meta name="twitter:site" content="@grupolalengua">
<meta name="twitter:creator" content="@sanxofon">
<meta name="twitter:image:src" content="https://lengua.la/mc/img/metronomo.png">

<!-- Disable automatic phone number detection. -->
<meta name="format-detection" content="telephone=no">
<!-- FAVICON -->
<link rel="shortcut icon" href="/mc/favicon.png" type="image/png">
<link rel="icon" href="/mc/favicon.png" type="image/png">
<!-- STYLES -->
<link rel="stylesheet" type="text/css" href="/mc/w3.css">
<link rel="stylesheet" type="text/css" href="/mc/mc.css">
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
        <td><button onclick="document.getElementById('canal-modal').style.display='block';" style="width: 100%;padding:3px;" class="w3-button w3-round-xlarge w3-grey"><img src="/mc/img/cog.png" width="100%"></i></button></td>
      </tr>
      <tr>
        <td style="text-align:center;" class="w3-text-grey">
          <br><input style="width: 92%;" class="small" type="range" id="cpmslide" step="0.1" min="10" max="60"><br>Compases Por Minuto<br>
        </td>
        <td width="80"><input class="w3-xlarge" type="number" id="cpm" step="0.1" min="1" max="90" style="border: none;background-color: #333;padding: 0;line-height: 100%;"></td>
      </tr>
    </table>

    <div style="width: 98%; margin: 0 auto;"><input type="text" id="clave" value="" class="small" style="background-color:#404040;"></div>
    
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

    <div align="center" class="w3-text-white w3-small"><a href="javascript:void(0);" class="w3-text-grey" onclick="toggleClass('vermas','oculto');">Opciones avanzadas</a></div>
    <div class="oculto" id="vermas">
      <table width="96%" style="margin: 0 auto;">
        <!-- <tr class="fondo1 w3-large">
          <td class="text w3-medium">Ángulo:</td><td><input type="text" id="angulo" readonly="readonly"></td>
        </tr> -->
        <tr class="w3-large">
          <td class="text w3-small" title="Compás #">Co:<input type="number" id="compas" step=1 style="width: 70%;"></td>
          <td class="text w3-small" title="CPM Real">CR: <input type="text" id="cpmr" readonly="readonly" style="width: 70%;"></td>
        </tr>
        <tr class="w3-large">
          <td class="text w3-small" title="Micropulso imperceptible">Ss:&nbsp;<input type="text" id="segs" min="1" max="240" step="1.000" readonly="readonly" style="width: 70%;"></td>
          <td class="text w3-small" title="Intervalo de tiempo mímimo">Ti:&nbsp;<input type="text" id="ti" step="1.000" readonly="readonly" style="width: 70%;"></td>
          <td class="text w3-small" title="Error de precisión máximo en microsegundos">Pr:&nbsp;<input type="text" id="precisionmax" readonly="readonly" ondblclick="precisionmax=0;" style="width: 70%;"><!-- <input type="text" id="precision" readonly="readonly" style="width: 50%;"> --></td>
        </tr>
        <tr class="w3-large">
          <td colspan="3" style="text-align:center; padding:20px;" class="w3-text-grey w3-small"><button class="w3-button w3-green w3-round w3-small" id="playSync">PlaySync</button>&nbsp;<input type="number" id="ss" value="2" style="width: 30%;" class="w3-small"> segundos</td>
        </tr>
      </table>
    </div>
  </div>
  <div align="center" class="w3-text-grey w3-small" style="background: #101010;">
    <div><b>Metrónomo irregular polirrítmico</b> <?php echo $version; ?></div>
    <div>Creado por <a href="https://lengua.la" target="_blank" title="(2018-<?php echo date("Y"); ?>)">Santiago C. Novaro</a></div>
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
<script type="text/javascript">
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
      'patron':[2,0],
    }
  ];
  var clave = '<?=$clave?>';
</script>
<script type="text/javascript">
<?php
ob_start();
require "mathjs-rythm.class.js"; // Procesamiento de claves rítmicas
require "mc.js"; // Funciones del sistema MC
require "vars.js"; // Variables de MC
$js = explode("\n",trim(ob_get_contents()));
ob_end_clean();
// echo implode("\n",$js); exit;
foreach ($js as $l) {
    $l = explode('//',$l,2);
    $l = trim($l[0]);
    if (!empty($l)) echo $l." ";
}
?>
</script>
</body>
</html>
