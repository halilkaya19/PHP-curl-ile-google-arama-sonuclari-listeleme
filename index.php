<?php
$aranan = urlencode('halil kaya');
$site ="https://www.google.com.tr/search";
$parametre ="?q=$aranan&gbv=1&prmd=ivns&source=lnt&tbs=qdr:y&sa=X&ei=67-nVLR7hP3LA_ycgpAL&ved=0CA0QpwU";
$url = $site . $parametre;
$curl = curl_init();
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_URL, $url);
$sonuc =curl_exec($curl);
curl_close($curl);
$sonuc = iconv("ISO-8859-9", "UTF-8", $sonuc);
$yeni = preg_replace("/<\!doctype.*?<ol>/is", "", $sonuc);
$yeni = preg_replace("/<\/ol>.*/is", "", $yeni);
$yeni = preg_replace("/<span.*?<\/span>/is", "", $yeni);
$yeni = preg_replace("/\/url\?q=/is", "", $yeni);
$yeni = preg_replace("/&amp;sa=U&amp;ei=.*?\">/is", "\">", $yeni);
echo '<ol>'.$yeni.'</ol>';
?>