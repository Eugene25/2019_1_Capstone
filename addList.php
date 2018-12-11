<?php
  require_once('../process/db_connection.php');
  global $conn;
  session_start();
  $userID=$_SESSION['user_id'] ;
  $wordArray=$_SESSION['splitResult'] ;	
  $selectedListID = $_POST['selectedList'];
  $newName = $_POST['newList'];

  function addWords() {
    echo "Hello world!";
  }

if(strlen($newName)==0) {

 for($i=0;$i<count($wordArray);$i++) {
	$sql= "select wordID from wordlist where word='$wordArray[$i]'";
	$result = $conn->query($sql);
	$insertedWord= $result->fetch_assoc();
	
	$sql="SELECT COUNT(*) as total FROM vocalist where vocalistID=$selectedListID";
	$result = $conn->query($sql);
	$insertedIndex= $result->fetch_assoc();
	
	$sql = "INSERT INTO vocalist(vocalistID, wordID, vocalistIndex) VALUES($selectedListID,".$insertedWord['wordID'].",".$insertedIndex['total'].")";
	$conn->query($sql);
   }

echo "<script>location.href='../src/list.php?ID=<?php  echo $selectedListID ?> ';</script>";

} 

else {
	//add new list at archivelist if $newName is entered
	$sql = "select title from archivelist where title='$newName'";
	$result = $conn->query($sql);
	
	$num_rows = mysqli_num_rows ($result);
		
	if($num_rows>0) {
		//중복처리
		echo"<script>alert('Duplicated list name');history.back();</script>";
	} else {
		$sql = "INSERT INTO archivelist(userID,title) VALUES('$userID','$newName')";
		$conn->query($sql);
	}
}
?>
