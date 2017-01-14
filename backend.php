<?php

header("Access-Control-Allow-Origin: *");
//header("Content-Type: application/json; charset= ISO-8859-1");
$mode = $_POST['mode'];
$lnk = $_POST['lnk'];


if($mode == "retrieve"){

$conn = mysqli_connect("mysql1.freehosting.com","webiousi_dba","Lkstr@wb!db92","webiousi_linkster");
$query = mysqli_query($conn,"SELECT linkSeg, content from content where linkSeg = '$lnk' " );

if(mysqli_connect_errno()){
	echo "Failed to connect to DB";
}

while($r = mysqli_fetch_assoc($query)){
	$rows[] = $r;
}
echo json_encode($rows);
mysqli_close($conn);
}
elseif ($mode == "save") {
	//IF lnk already exist give error

$content = $_POST['content'];
$conn = mysqli_connect("mysql1.freehosting.com","webiousi_dba","Lkstr@wb!db92","webiousi_linkster");
$query = "INSERT INTO content (linkSeg, content) VALUES('$lnk','$content')";

if(mysqli_query($conn,$query)){
	echo "Save successful";
}
else{
	echo "Not saved".mysqli_error($conn);
}
mysqli_close($conn);
}
elseif($mode == "update"){

$content = $_POST['content'];
$conn = mysqli_connect("mysql1.freehosting.com","webiousi_dba","Lkstr@wb!db92","webiousi_linkster");
$query = "UPDATE content SET content = '$content' WHERE linkSeg = '$lnk'";

if(mysqli_query($conn,$query)){
	echo "Content Successfully updated.";
}
else{
	echo "Could not update!!! - ".mysqli_error($conn);
}
mysqli_close($conn);


}
//$json = file_get_contents('php://input'); 
//$obj = json_decode($json);
//echo $_POST["lnk"];
//mysqli_close($conn);
?>