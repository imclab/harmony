<html>
<body>
<p>Sending email...</p>
<?php
	include 'vendor/autoload.php';

	/**********************************************************
	 *  TEST AWS SES CAPABILITIES
	 *********************************************************/
	// Instantiates the ses client with AWS credentials

	use Aws\Ses\SesClient;

	$client = SesClient::factory(array(
		'key' => '',
		'secret' => '',
		'region' => 'us-west-2'
	));

	echo "Ses Client created.\n";

	/*
    Loops for each email address the user entered
    need to replace the email text data with an official link
    Link should be of the form: http://45.56.101.195/room.php?id=' . $id . '
    Need to integrate this code with create.php
    */
    for($i=0;$i<count($_POST["emailAddress"]);$i++)
    {
        //$toAddress = $_POST["emailAddress"][$i]
    	$result = $client->sendEmail(array(
        // Source is required
        'Source' => 'harmony.mailservice@gmail.com',
        // Destination is required
        'Destination' => array(
            'ToAddresses' => array($_POST["emailAddress"][$i]),
            //'CcAddresses' => array('string', ... ),
            //'BccAddresses' => array('string', ... ),
        ),
        // Message is required
        'Message' => array(
            // Subject is required
            'Subject' => array(
                // Data is required
                'Data' => 'whats up. its yo boi harmony'
                //'Charset' => 'string',
            ),
            // Body is required
            'Body' => array(
                'Text' => array(
                    // Data is required
                    'Data' => 'hows my stream? holla back atchyo boi'
                    //'Charset' => 'string',
                )/*
                'Html' => array(
                    // Data is required
                    'Data' => 'string',
                    'Charset' => 'string',
                ),*/
            ),
        ),/*
        'ReplyToAddresses' => array('string', ... ),
        'ReturnPath' => 'string',*/
    	));
    }

	echo "Email sent\n";
?>

<p>Email Sent</p>
</body>
</html>
