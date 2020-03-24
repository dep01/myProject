
 <?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Encrypt extends CI_Model {
 
    public function Encrypt_data($data){
        $ciphering = "AES-128-CTR"; 
        $iv_length = openssl_cipher_iv_length($ciphering); 
        $options = 0; 
        $encryption_iv = '1312111098765432';
        $encryption_key = "dep01";
        $encrypt_data = openssl_encrypt($data, $ciphering,$encryption_key, $options, $encryption_iv);

        return $encrypt_data;
    }
 }
?>