<!-- php -S localhost:9000 -->

<?php
    ob_end_flush();
    // get the incoming POST data
    // $post = file_get_contents('php://input') ?? $_POST;
    $post = $_POST;
    // echo "<h1>We've received your message</h1>";
    // decode the JSON data
    $post = json_decode($post, true);
    

    $name = $post['name'];
	$email = $post['email'];
    $msg = $post['form-description'];
    $solutions = "";

    if(!empty($_post['contacts'])){
        foreach($post['check_list'] as $selected){
            $solutions .= $selected."</br>";
        }
    }

    $outgoing = "Project: " . wordwrap($msg,70) 
        . "\n\nCLIENT NAME: " . $name 
        . "\nCLIENT EMAIL: " . $email
        . "\nNEEDS HELP WITH: " . $solutions;

    // // send email
    mail("jun.a.kagaya@gmail.com","WEBBI CONSULTING | WEB ENQUIRY",$outgoing);
    mail("powerofrepetition@gmail.com","WEBBI CONSULTING | WEB ENQUIRY",$outgoing);

    print($message);
    flush();
    ob_flush();

    echo "outgoing: " . $outgoing;
    echo "We've received your message";
    return http_response_code(200);
?>