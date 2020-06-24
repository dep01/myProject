<?php


    function FormatDate($tgl)
    {
        $date = date_create($tgl);
        return date_format($date, 'l, j F Y') ; 
    }
    function Formatcurrency($currency)
    {
        return number_format($currency, 0, ',', '.');
    }
    function format_date($tgl)
    {
        $date = date_create($tgl);
        return date_format($date, 'j F Y') ; 
    }
    function print_data($header,$data,$name)
    {
        $ci =& get_instance();
        $cek['header'] = $header;
        $cek['print_data']= $data;
        $print = $ci->load->view('Print_docs', $cek, TRUE);
        $mpdf = new \Mpdf\Mpdf();
		$mpdf->WriteHTML($print);
		$mpdf->Output($name,'I');
    }
    function token_generate($username,$date){
        $ciphering = "AES-128-CTR"; 
        $iv_length = openssl_cipher_iv_length($ciphering); 
        $options = 0; 
        $encryption_iv = '1312111098765432';
        $encryption_key = $date;
        $encrypt_data = openssl_encrypt($username, $ciphering,$encryption_key, $options, $encryption_iv);

        return $encrypt_data;
    }
    function token_decription($token){
        $ci =& get_instance();
        $len = strlen($token);
        $date = substr($token, -21);
        $t = substr($token,0,-21);
        $data =  $ci->db->query('select id_user from user_table where token="'.$t.'" and token_date = "'.$date.'"')->result_array();
        if($data){
            $return = array(
                'code'  =>200,
                'message'=>'succes',
                'result'=>$data[0]);
        }else{
            $return = array(
                'code'  =>404,
                'message'=>'unn',
                'result'=>null);
        }
        return $return;
    }

?>