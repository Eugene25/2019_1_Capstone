<!DOCTYPE HTML>
<HTML>
 <head>

  <TITLE> abCliC </TITLE>
  <META charset="UTF-8">
  <link rel="stylesheet" href="../css/clic_voca.css">
<script src='https://cdn.jsdelivr.net/gh/naptha/tesseract.js@v1.0.14/dist/tesseract.min.js'></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</head>

 <body>
   <div id="menu"> <a href="./main.php"><image id="banner" src="../img/abclic.png"/></a>
      <div>Menu</div>
      <a class="active" href="./main.php">HOME</a>
      <a class="active_drop" href="./voca.php">Vocabulary Note</a>
		<a class="voca_drop" href="./my_note.php">My Voca Note</a>
		<a class="voca_drop" href="./search.php">Search</a>
		<a class="voca_drop" href="./voca.php">Extraction</a>
      <a class="active" href="./study.php">Study</a>
      <a class="active" href="./community.php">Community</a>
      <a href="../process/logout.php" id="logout">logout</a>
    </div>



<div id="Note">
<div class="row">
<div class="col-5">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

	<div class="modal-header">
        <h4 class="modal-title">Type your text here</h4>
	<button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">
		파일로 업로드하기 </button>
      </div>

	<div class="modal-body">
	<form action="#" method="post">
	<textarea name = "str" cols = "1000" rows = "10" placeholder="텍스트를 입력해주세요."></textarea>
	<div class="modal-footer">
			<button type="submit"  class="btn btn-secondary">추출</button>
		<!--input id="ok" type = "submit" value = "추출"/-->
	</div>
    	</form>
      </div>
    </div>
</div>
</div>

<div class="modal fade" id="exampleModal">
<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">파일로 업로드하기</h5>
        </button>
      </div>
      <div class="modal-body">
       		<form action="../process/img.php" method="post" enctype="multipart/form-data">
    				<input type="file" name="fileToUpload" id="fileToUpload">
   			<!--input type="submit" value="Upload Image" name="submit">
		</form-->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">닫기</button>
       	<button type="submit" value="Upload Image" name="submit" class="btn btn-info">추출</button>
		</form>
      </div>
    </div>
  </div>
</div>

<div class="col-2">
<image id="arrow" src="../img/arrow.png"/>
</div>

<div class="col-5">

<div class="modal-dialog" role="document">
    <div class="modal-content">

	<div class="modal-header">
        <h4 class="modal-title">Type your text here</h4>
	<button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">
		파일로 업로드하기 </button>
      </div>

	<div class="modal-body">
	<form action="#" method="post">
	<textarea name = "str" cols = "1000" rows = "10" placeholder="텍스트를 입력해주세요."></textarea>
	<div class="modal-footer">
		<input id="ok" type = "submit" value = "추출"/>
	</div>
    	</form>
      </div>
    </div>
</div>

</div>

</div>
</div>


	

<div id="words">
    <?php
      require_once('../process/db_connection.php');
    //require_once ('../lib/PorterStemmer.php');
      $text = $_POST["str"];
      // $text   = "Hello there, Mr. Smith. What're you doing today... Smith,"
      //       . " my friend?\n\nI hope it's good. This last sentence will"
      //       . " cost you $2.50! Just kidding :)";

      function splitIt($s){
        $str = strtolower($s);
        preg_match_all('/([a-zA-Z]|\xC3[\x80-\x96\x98-\xB6\xB8-\xBF]|\xC5[\x92\x93\xA0\xA1\xB8\xBD\xBE]){4,}/', $str, $match_arr);
        $words = $match_arr[0];
        return $words;
      }

       $result = splitIt($text);

       for($i = 0; $i < count($result); $i++){
         if($i == 0){
          echo $result[$i];
         }
         else  echo " <br> ".$result[$i];
	if($i%10==0) 
       }

      //  $text = preg_replace('/([^a-zA-Z]|\xC3[\x80-\x96\x98-\xB6\xB8-\xBF]|\xC5[\x92\x93\xA0\xA1\xB8\xBD\xBE]){4,}/',"",$text);
      //  //$text = preg_replace("/[ #\&\+\-%@=\/\\\:;,\.'\"\^`~\_|\!\?\*$#<>()\[\]\{\}]/i", "", $text);
      //  $stop_words = array("the", "and", "a", "to", "of", "in", "i", "is",
      //                    "that", "it", "on", "you", "this", "for", "but",
      //                    "with", "are", "have", "be", "at", "or", "as",
      //                    "was", "so", "if", "out", "not");
      // $words = explode(" ", $text);
      //
      // foreach($words as $word) {
      //   $stem = PorterStemmer::Stem($word);
      //
      //   if(!in_array($stem, $stop_words)){
      //     $stem_words[] = $stem;
      //   }
      // }
      //
      //  for($i = 0; $i < count($stem_words); $i++){
      //    if($i == 0){
      //      echo $stem_words[$i];
      //    }
      //    else {
      //      echo " / ".$stem_words[$i];
      //    }
      //  }

    ?>
</div>

 </body>
</HTML>


<!--div>Icons made by <a href="https://www.freepik.com/" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" 			    title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" 			    title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div-->