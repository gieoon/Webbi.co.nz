<!-- php -S localhost:9000 -->

<?php
    // ob_end_flush();
    // get the incoming POST data
    $post = file_get_contents('php://input') ?? $_POST;
    
    // $post = $_POST;
    
    // var_dump($post);
    // echo "<h1>We've received your message</h1>";
    // decode the JSON data
    $post = json_decode($post, true);
    

    // $name = $post['uname'];
	// $email = $post['uemail'];
    // $msg = $post['udescription'];
    $name = $post['name'];
    $email = $post['email'];
    $company = $post['company'];
    $url = $post['url'];
    $solutions = "";

    

    foreach($post['check_list'] as $selected){
        $solutions .= $selected."</br>";
    }

    $outgoing = "Inquiry at: " . date('Y-m-d H:i:s', time())  . "\n\nCLIENT NAME: " . $name . "\nCLIENT EMAIL: " . $email . "\nNEEDS HELP WITH: " . "\nCOMPANY: " . $company . "\nURL: " . $url . "\n\nSOLUTIONS: " . $solutions;

    // file_put_contents( 'debug' . date('Y-m-d H:i:s', time()) . '.log', var_export( $outgoing, true));

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