<!-- php -S localhost:9000 -->

<?php
    // ob_end_flush();
    // get the incoming POST data
    // $post = file_get_contents('php://input') ?? $_POST;
    
    $post = $_POST;
    
    // var_dump($post);
    // echo "<h1>We've received your message</h1>";
    // decode the JSON data
    // $post = json_decode($post, true);
    

    $name = $post['uname'];
	$email = $post['uemail'];
    $msg = $post['udescription'];
    $solutions = "";

    

    foreach($post['check_list'] as $selected){
        $solutions .= $selected."</br>";
    }

    $outgoing = "Inquiry at: " . time() . " \n\nProject Description: " . wordwrap($msg,200) . "\n\nCLIENT NAME: " . $name . "\nCLIENT EMAIL: " . $email . "\nNEEDS HELP WITH: " . $solutions;

    file_put_contents( 'debug' . time() . '.log', var_export( $outgoing, true));

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