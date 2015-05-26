<?php
function curl_post($url, $data, &$info){

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, curl_postData($data));
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_REFERER, $url);
  $html = trim(curl_exec($ch));
  curl_close($ch);

  return $html;
}

function curl_postData($data){

  $fdata = "";
  foreach($data as $key => $val){
    $fdata .= "$key=" . urlencode($val) . "&";
  }

  return $fdata;

}

$url = 'http://thebestspinner.com/api.php';

#$testmethod = 'identifySynonyms';
$testmethod = 'replaceEveryonesFavorites';


# Build the data array for authenticating.

$data = array();
$data['action'] = 'authenticate';
$data['format'] = 'php'; # You can also specify 'xml' as the format.

# The user credentials should change for each UAW user with a TBS account.

$data['username'] = 'abhay@afycon.com';
$data['password'] = '5554a27025970';

# Authenticate and get back the session id.
# You only need to authenticate once per session.
# A session is good for 24 hours.
$output = unserialize(curl_post($url, $data, $info));

if($output['success']=='true'){
  # Success.
  $session = $output['session'];
  
  # Build the data array for the example.
  $data = array();
  $data['session'] = $session;
  $data['format'] = 'php'; # You can also specify 'xml' as the format.
  $data['text'] = 'Losing weight can be a difficult thing to do.';
  $data['action'] = $testmethod;
  $data['maxsyns'] = '3'; # The number of synonyms per term.
  
  if($testmethod=='replaceEveryonesFavorites'){
    # Add a quality score for this method.
    $data['quality'] = '1';
  }

  # Post to API and get back results.
  $output = curl_post($url, $data, $info);
  $output = unserialize($output);
  
  # Show results.
  echo "<p><b>Method:</b><br>$testmethod</p>";
  echo "<p><b>Text:</b><br>$data[text]</p>";
  
  $data['action'] = 'apiQuota';
  $quota = curl_post($url, $data, $info);
  $quota = unserialize($quota);
  
  if($output['success']=='true'){
    echo "<p><b>Output:</b><br>" . str_replace("\r", "<br>", $output['output']) . "</p><p>Remaining quota: $quota[output]</p>";
  }
  else{
    echo "<p><b>Error:</b><br>$output[error]</p>";
  }
}
else{
  # There were errors.
  echo "<p><b>Error:</b><br>$output[error]</p>";
}
?>