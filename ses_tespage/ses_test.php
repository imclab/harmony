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
		'key' => 'AKIAIN3WOX62STU6HCBQ',
		'secret' => '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',
		'region' => 'us-west-2'
	));

	echo "Ses Client created.\n";

	$address = $_GET["address"];

	$result = $client->sendEmail(array(
    // Source is required
    'Source' => 'harmony.mailservice@gmail.com',
    // Destination is required
    'Destination' => array(
        'ToAddresses' => array($address),
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

	echo "Email sent\n";
?>

<p>Email Sent</p>
</body>
</html>
