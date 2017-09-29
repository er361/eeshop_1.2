<?php
/**
 * Created by PhpStorm.
 * User: Maint
 * Date: 29.09.2017
 * Time: 17:47
 */
namespace common\traits;

trait MCrypt
{

    private $secret_key = 'my_simple_secret_key';
    private $secret_iv = 'my_simple_secret_iv';
    private $md5_key = 'sf7kmmr';

    function crypt($string, $action = 'e' )
    {

        // you may change these values to your own
        $output = false;
        $encrypt_method = "AES-256-CBC";
        $key = hash( 'sha256', $this->secret_key );
        $iv = substr( hash( 'sha256', $this->secret_iv ), 0, 16 );

        if( $action == 'e' ) {
            $output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
        }
        else if( $action == 'd' ){
            $output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
        }

        return $output;
    }

    function compareKey($hash)
    {
        return (md5($this->md5_key) == $hash);
    }

}