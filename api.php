<?php

$headers=[
    "accept: application/json" ,
    "apikey: 40ph9uyta7ivtf6054wkugtq8jxlgws3"
];

#Agents Report
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,"https://manyagroup.ladesk.com/api/reports/agents?&date_from=2019-11-13&date_to=2022-09-25&apikey=dnl682zpzpre3ccdvp0klarftyttljh3&columns=created_tickets,resolved_tickets");
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
$curl_response=curl_exec($ch);
if ($curl_response === false) {
    $info = curl_error($ch);
    curl_close($ch);
    die("error occurred during curl exec. Additional info: " . var_export($info, true));
}

curl_close($ch);
$agent_report=json_decode($curl_response,true);
$agent_report=$agent_report['response']['agents'];
$agent_report_array=array();

foreach($agent_report as $agents){
    if (($key = array_search('txmsfln0',$agents)) === false){
      array_push($agent_report_array,$agents);
    }
  }
$agent_report=$agent_report_array;
?>


