<?php
session_start();
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

function Encrypt(&$plaintext,$psw)
{
   $method="aes-256-cbc";
   $enc_key=bin2hex($psw);
   $enc_options=0;
   $iv_length=openssl_cipher_iv_length($method);
   $iv=openssl_random_pseudo_bytes($iv_length);
   $ciphertext=openssl_encrypt($plaintext,$method,$enc_key,$enc_options,$iv);

   // 定义我们“私有”的密文结构
   $saved_ciphertext = sprintf('%s$%d$%s$%s', $method, $enc_options, bin2hex($iv), $ciphertext);

   $plaintext=$saved_ciphertext;
}


function Decrypt(&$saved_ciphertext,$psw)
{
   $method="aes-256-cbc";
   $enc_key=bin2hex($psw);
   $enc_options=0;

   // 检查密文格式是否正确、符合我们的定义
   if(preg_match('/.*$.*$.*$.*/', $saved_ciphertext) !== 1) {
    fprintf(STDERR, "无法解密的密文格式\n");
    exit(1);
}
   // 解析密文结构，提取解密所需各个字段
   list($extracted_method, $extracted_enc_options, $extracted_iv, $extracted_ciphertext) = explode('$', $saved_ciphertext); 
    
   $decryptedtext = openssl_decrypt($extracted_ciphertext, $extracted_method, $enc_key, 
$enc_options, hex2bin($extracted_iv));
   $saved_ciphertext=$decryptedtext;
}


