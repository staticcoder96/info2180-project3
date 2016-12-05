<?php
$id = $_REQUEST['message_id'];

$query = "SELECT message_id,reader_id FROM Message_read WHERE message_id = '$id' AND reader_id = (SELECT id FROM User WHERE Username = "".$_SESSION['user']."");";

$result = mysql_query($query);

if (mysql_num_rows($result)== 0) 
{
    $query1 = "INSERT INTO message_read(message_id,reader_id,date_sent) VALUES ( '$id', (SELECT recipient_id FROM )
}