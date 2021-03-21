<?php

$ch = curl_init();

$arOptions = [
    CURLOPT_URL => "https://amazon-products1.p.rapidapi.com/asin?url=https%3A%2F%2Fwww.amazon.com%2FHyperX-Cloud-Flight-Detachable-Comfortable%2Fdp%2FB077ZGRY9V%3Fpf_rd_r%3D1TYRM42Q74V7E2JPZ4WN%26pf_rd_p%3D6d2ce2da-9cfb-4c5c-ab7a-c4d61c9f9875%26pd_rd_r%3Dfe1cb1de-34f4-44e1-94fe-6adcbcedfe9c%26pd_rd_w%3DFU6ls%26pd_rd_wg%3DzQGMv%26ref_%3Dpd_gw_unk",
    CURLOPT_RETURNTRANSFER => true,

];
curl_setopt_array($ch, $arOptions);

$result = curl_exec($ch);

curl_close($ch);

//$errors = curl_errno($ch);
//
//if ($errors) {
//    echo 'Errors (' . $errors . '): ' . curl_error($ch);
//} else {
//    return json_decode($result, true);
//}


?>
<div class="products">

</div>
