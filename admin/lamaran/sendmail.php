<?php

require_once("../../include/initialize.php");

include('../../plugins/phpmailer/class.phpmailer.php');
include('../../plugins/phpmailer/class.smtp.php');


$id=$_GET['id'];

$sql = "SELECT * FROM `tbpelamar` WHERE `IDPELAMAR`='{$id}'";
$mydb->setQuery($sql);
$res = $mydb->loadSingleResult();

$email = $res->EMAIL;

/**
 * This example shows settings to use when sending via Google's Gmail servers.
 * The IMAP section shows how to save this message to the 'Sent Mail' folder using IMAP commands.
 */

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');

require '../../plugins/phpmailer/PHPMailerAutoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer;

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;

//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';

//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "superrootuser13@gmail.com";

//Password to use for SMTP authentication
$mail->Password = "bramada13";

//Set who the message is to be sent from
$mail->setFrom('noreply@gmail.com', 'LokerBB');

//Set an alternative reply-to address
$mail->addReplyTo('noreply@gmail.com', 'LokerBB');

//Set who the message is to be sent to
$mail->addAddress($email);

//Set the subject line
$mail->Subject = 'Konfirmasi lamaran';

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->Body = '<h2></h2> Anda sudah lebih dari 3 hari dipanggil interview dan melakukan konfirmasi apakah diterima kerja atau tidak. Mohon luangkan waktu sejenak untuk membuka website LokerBB dan lakukan konfirmasi.<hr><h3> Segera lakukan konfirmasi lamaran!</h3>';

//Replace the plain text body with one created manually
$mail->AltBody = 'Konfirmasi';

// //Attach an image file
// $mail->addAttachment(web_root.'/dist/img/kop.png');

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
    message("Email konfirmasi berhasil dikirim.", "success");
    redirect("index.php?view=view&id=".$id);
    //Section 2: IMAP
    //Uncomment these to save your message in the 'Sent Mail' folder.
    #if (save_mail($mail)) {
    #    echo "Message saved!";
    #}
}

//Section 2: IMAP
//IMAP commands requires the PHP IMAP Extension, found at: https://php.net/manual/en/imap.setup.php
//Function to call which uses the PHP imap_*() functions to save messages: https://php.net/manual/en/book.imap.php
//You can use imap_getmailboxes($imapStream, '/imap/ssl') to get a list of available folders or labels, this can
//be useful if you are trying to get this working on a non-Gmail IMAP server.
function save_mail($mail) {
    //You can change 'Sent Mail' to any other folder or tag
    $path = "{imap.gmail.com:993/imap/ssl}[Gmail]/Sent Mail";

    //Tell your server to open an IMAP connection using the same username and password as you used for SMTP
    $imapStream = imap_open($path, $mail->Username, $mail->Password);

    $result = imap_append($imapStream, $path, $mail->getSentMIMEMessage());
    imap_close($imapStream);

    return $result;
}
