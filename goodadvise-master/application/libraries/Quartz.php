<?php 
class Quartz {
        /**
         * checks if Quartz can be used on current server.
         */
        static function isAvailable() {
                $disabled = explode(', ', ini_get('disable_functions'));
                if(in_array('exec', $disabled)) return false;
                if (!Quartz::_checkApp("crontab")) return false;
                return Quartz::_getFirstAvailable() != false;
        }

        /**
         * schedules a new job, if it already existed, the new one isn't added
         * @param ARRAY $time array ("min" => "0", "hour" => "5", "day" => "*", "month" => "*", "week" => "*")
         * @param STRING $event event's name (for example user:notify)
         * @return job's ID if the job has been scheduled successfully, else FALSE
         */
         static function customJob($time, $event,$packageid) {
      
               $prog = (Quartz::_getFirstAvailable())." /home/technoes/public_html/goodadvise/sms_test/statuslogger.php";
 exec("crontab -l > temp.cron");
             $cron1 = file("temp.cron");
//                $file = "";
//                
//           
             $cron[] = $time["min"]." ".$time["hour"]." ".$time["day"]." ".$time["month"]." ".$time["week"]." ".$prog."  0"." #\$id:".md5($packageid); 
              
                foreach ($cron1 as $line) {
                        if (preg_match('@\s*#\s*[$]id:\s*([a-zA-Z0-9]+)\s*$@', $line, $match)) {
                        $cron[]= $line;
                        }
                }
//                 $file .=$time["min"]." ".$time["hour"]." ".$time["day"]." ".$time["month"]." ".$time["week"]." ".$prog." ".$packageid." # \$id: ".md5($packageid); 
//                 echo $file;
//                  file_put_contents("temp.cron", preg_replace("/&#?[a-z0-9]+;/i","",$file));
//                // file_put_contents("temp.cron", $file);
//                        exec("crontab temp.cron");
                //$cron[]=$file;
                  file_put_contents("temp.cron", implode("\n", $cron)."\n");
                exec("crontab temp.cron");
               unlink("temp.cron");
                
                return $id;
         }
         static function listJob($time, $event,$packageid) {
               $prog = (Quartz::_getFirstAvailable())." /home/technoes/public_html/goodadvise/sms_test/demo_cron.php";
             exec("crontab -l > temp.cron");
             $cron1 = file("temp.cron");
//                $file = "";
//                
//           
$cron=array();
             //$cron[] = $time["min"]." ".$time["hour"]." ".$time["day"]." ".$time["month"]." ".$time["week"]." ".$prog." ".$packageid." # \$id: ".md5($packageid); 
              
                foreach ($cron1 as $line) {
                     //echo'<br>$line:'.$line;
                        if (preg_match('@\s*#\s*[$]id:\s*([a-zA-Z0-9]+)\s*$@', $line, $match)) {
                           // echo'<br>$line:'.$line;
                           // echo'<br>$match:'.$match;
                       $cron[]= $line;
                        }
                        
                }
//                 $file .=$time["min"]." ".$time["hour"]." ".$time["day"]." ".$time["month"]." ".$time["week"]." ".$prog." ".$packageid." # \$id: ".md5($packageid); 
//                 echo $file;
//                  file_put_contents("temp.cron", preg_replace("/&#?[a-z0-9]+;/i","",$file));
//                // file_put_contents("temp.cron", $file);
//                        exec("crontab temp.cron");
                //$cron[]=$file;
                echo implode("\n", $cron)."\n";
                 // file_put_contents("temp.cron", implode("\n", $cron)."\n");
         }
         
        static function addJob($time,$packageid) {
$prog = (Quartz::_getFirstAvailable())." /home/technoes/public_html/goodadvise/sms_test/sendsms.php";
 exec("crontab -l > temp.cron");
             $cron1 = file("temp.cron");
//                $file = "";
//                
//           
             $cron[] = $time["min"]." ".$time["hour"]." ".$time["day"]." ".$time["month"]." ".$time["week"]." ".$prog."  ".$packageid." #\$id:".md5($packageid); 
              
                foreach ($cron1 as $line) {
                        if (preg_match('@\s*#\s*[$]id:\s*([a-zA-Z0-9]+)\s*$@', $line, $match)) {
                        $cron[]= $line;
                       // print_r($match);
                        }
                }
//                 $file .=$time["min"]." ".$time["hour"]." ".$time["day"]." ".$time["month"]." ".$time["week"]." ".$prog." ".$packageid." # \$id: ".md5($packageid); 
//                 echo $file;
//                  file_put_contents("temp.cron", preg_replace("/&#?[a-z0-9]+;/i","",$file));
//                // file_put_contents("temp.cron", $file);
//                        exec("crontab temp.cron");
                //$cron[]=$file;
               // echo implode("\n", $cron)."\n";
                  file_put_contents("temp.cron", implode("\n", $cron)."\n");
                exec("crontab temp.cron");
               unlink("temp.cron");
                
               // return $id;
        }
        
        /**
         * removes a scheduled job
         * @param MIXED $idTime job's ID or a time array
         * @param MIXED $event event's name in case no ID has been specified
         * @return TRUE if successfully removed, else false
         */
        
         static function removeAllJob($time, $event,$packageid) {
            file_put_contents("temp.cron", '');
                       exec("crontab temp.cron");
                unlink("temp.cron");
                
               // return $found;
        }
        static function removeJob($packageid) {
               $id = md5($packageid);
                exec("crontab -l > temp.cron");
                $cron = file("temp.cron");
                $file = "";
                $found = false;
                foreach ($cron as $line) {
                        if (preg_match('@\s*#\s*[$]id:\s*([a-zA-Z0-9]+)\s*$@', $line, $match)) {
                                if ($id == $match[1]) { 
                                     $found = true;
                                       
                                } else {
                                   $file .= $line."\n";     
                                }
                               //echo'<br>id:'.$id;
                             // print_r($match);
                                
                        }
                }
                //echo $file;
               
                if ($found) {
                        file_put_contents("temp.cron", $file);
                       exec("crontab temp.cron");
                        //echo '<br>found:'.$found;
                }
                unlink("temp.cron");
                
                return $found;
        }
        
        static function _getFirstAvailable() {
        exec("whereis php", $list);
        if (strpos(implode("\n", $list), "php ") === false) return null;
        
                return "/usr/bin/php -q ";
        }
        
        static function _checkApp($name) {
                $result = exec($name." 2>&1", $result, $returnValue);
                return $returnValue != 127;
        }
        
        static function _normalizeTime($time) {
                $entries = Array("min", "hour", "day", "month", "week");
                if (!is_array($time)) $time = Array();
                $foundStar = false;
                foreach ($entries as $entry) {
                        if ($foundStar && ($entry == "day" || $entry == "month" || $entry == "hour")) {
                                $time[$entry] = "*";
                        } else if (!$time[$entry]) { 
                                $time[$entry] = "*";
                                $foundStar = true;
                        } else if ($time[$entry][0] == "*") {
                                $foundStar = true;
                        } else {
                                $time[$entry] = preg_replace('/0([0-9]+)/mi', '\1', $time[$entry]);
                        }
                }
                return $time;
        }
}
if (defined('STDIN')) { 
        // job is to be executed!
        if ($argc > 1) {
                preg_match('/[^?]+\?event=(.*)/mi', $argv[1], $match);
                echo "[".date("Y-m-d H:i:s")."] [".$match[1]."] ".file_get_contents($argv[1])."\n";
        } else {
                echo "[".date("Y-m-d H:i:s")."] ERROR - unable to find job to be executed!\n";
        }
}
?>
