<?php
// checks if message is sent, returns a null value otherwise. excluding this block results in an undefined index error
if(isset($_POST["submit"])) {

    $msg = $_POST["message"];

$msg = strtolower($msg);

//ends

// fragment the message to filter the stop words
$msg_array= (explode(" ", $msg));

// counts the fragmented message
$msg_counter = (count($msg_array))-1;

// read the stop words in the file into an array
$stopwrds = fopen("stopwords.txt", "r") or die("Unable to open file!");
$stopwords = fread($stopwrds,filesize("stopwords.txt"));

$stopwrds = explode(" ", $stopwords);

// filters the framented message by removing the stop words using txt.file
$basewrds = array_diff($msg_array, $stopwrds);

//re-indexes the array to make up for the lost elements in $msg_array
$basewrds = array_values($basewrds);

//reads the file and extracts the contents into $file,  
$file = fopen("hello.txt", "r") or die ("my brain is lost, error 001");
$file = fread($file, filesize("hello.txt"));
//explodes it into an array line by line so that each element of the array is a line in the txt file
$Questionanswer = explode(PHP_EOL, $file);

//function to explode through each element, and delivers the first element --Topics
function get_topic($val){
    $setter = explode("-", $val);
    return $setter[0];
}

// the actual process of the function get_topic to extract the terms in the file 
$terms = array_values(array_map("get_topic", $Questionanswer));
// ends

function get_meaning($val){
    $setter = explode("-", $val);
    return $setter[1];
}
// the actual process of the function get_meaning to extract the meaning in the file in to an array
$meaning = array_map("get_meaning", $Questionanswer);

//recombines the $msg elements into  a sentence and then pushing the base sentence into an array
$possible = array();
array_push($possible, implode(" ", $basewrds));

// comparing both the basewords and the keywords to check for a match
$arr = array_intersect($terms, $possible);
//stores the keys of the array $arr into another array $bash to better find the meaning
$bash = (array_keys($arr));
//finds the meaning by matching the indexes of the matched array in line 59 directly with the elements in the meaning array $meaning
for($i=0; $i<count($arr); $i++){
    echo $meaning[$bash[$i]];
}
//incase line 59 doesnt find a match in the terms array, then it outputs in line 68
if($arr !=$possible ){
    echo "I don't undestand your question<br>Could you try rephrasing that question?";
}
}
else{
    $msg = " .";
    
}
?>