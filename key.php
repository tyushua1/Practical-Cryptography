<?php
// 以下是最终使用的公钥证书中可以被查看的Distinguished Name（简称：DN）信息
$dn = array(
    "countryName" => "CN",
    "stateOrProvinceName" => "Beijing",
    "localityName" => "Chaoyang",
    "organizationName" => "CUC",
    "organizationalUnitName" => "CS",
    "commonName" => "", 
    "emailAddress" => "xxx@cuc.edu.cn"
);
$pk_config = array(
    'private_key_bits' => 2048,
    'private_key_type' => OPENSSL_KEYTYPE_RSA,
    'digest_alg' => 'sha256',
);


function Generat($name,&$pkeyout,&$certout)
{
   $dn["commonName"]=$name;  //用户名
   $privkey = openssl_pkey_new($pk_config);   // 产生公私钥对一套
   openssl_pkey_export($privkey, $pkeyout);   // $pkeyout:私钥
   $csr = openssl_csr_new($dn, $privkey, $pk_config);
   // 对CSR文件进行自签名（第2个参数设置为null，否则可以设置为CA的证书路径），设置证书有效期：365天
   $sscert = openssl_csr_sign($csr, null, $privkey, 365, $pk_config);
   openssl_pkey_free($privkey);
   openssl_csr_export($csr, $csrout);
   openssl_x509_export($sscert, $certout);  //$certout:公钥证书
}
