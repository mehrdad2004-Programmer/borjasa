<?php

    class SMS{
        private $api_key , $api_url;
        public function __construct(){
            $this->api_key = '50d9f9b32b623f8381d550e74edc2553ff4731813ba2a83af4a53a9928f119f4';
            $this->api_url = 'https://api.ghasedak.me/v2/verification/send/simple';
        }

        public function send_sms(array $data){
            $prams = '';
            foreach(array_keys($data) as $item){
                if($item == 'receptor' || $item == 'temp'){
                    continue;
                }

                $prams .= $item + "=" + $data[$item] + '&';
            }
            try{
                $curl = curl_init($this->api_url);
                curl_setopt_array($curl, array(
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "POST",
                    CURLOPT_POSTFIELDS => "receptor=".$data['receptor']."&template=".$data['temp']."&type=1&" . rtrim($prams, ','),
                    CURLOPT_HTTPHEADER => array(
                        "apikey: " . $this->api_key,
                        "cache-control: no-cache",
                        "content-type: application/x-www-form-urlencoded",
                    ),
                ));
                $response = curl_exec($curl);
                $err = curl_error($curl);
                curl_close($curl);
            }catch(Exception $e){
                echo $e;
            }
        }
    }