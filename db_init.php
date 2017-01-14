<?php
//This file is specifically created to make the database copy on sql server
//Version : 0.0.1 
//Date: 09/04/2016

$conn = mysqli_connect("mysql1.freehosting.com","webiousi_dba","Lkstr@wb!db92","webiousi_linkster");
$query = "SELECT * FROM content";
$result = mysqli_query($conn,$query);


if(mysqli_num_rows($result) > 0){
	//Each row output
	while($row = mysqli_fetch_assoc($result)){
		echo "LinkSeg: ".$row['linkSeg']."  *Content: ".$row['content'];
	}
}

mysqli_close($conn);
echo "DB_INIT executed successfully."

?>