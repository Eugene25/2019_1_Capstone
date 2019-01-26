<?php
	$lengthOfNewList = 0;
?> 

<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<?php include('templete/menu.php') ?>
	
		<h1> 
			<input type="text" id="newName" name="newName" placeholder="제목">
		</h1>
		
		<!--------- 단어장 설정부분 ----------------->
		<div id="shareDiv" style="cursor: pointer; width:70px; border:1px solid black;" onclick="isShared()">공유함</div>
		<select class="noteCategory">
			<option value="0">카테고리</option>
    			<option>경영경제</option>
    			<option>전산/전자</option>
   		 	<option>심리/사회복지</option>
   		 	<option>의학/약학</option>
			<option>예술</option>
  		</select>

		<br><br>

		<div style="border:1px solid black;" >
			<div id="typeNewWords">
				<input type="text"  id="<?php echo "word".$lengthOfNewList;?>" placeholder="단어">
				<button onclick="addConfirmList(<?php echo $lengthOfNewList;?>)">확인</button>
				<br>
				<input type="text"  id="<?php echo "meaning".$lengthOfNewList;?>" placeholder="뜻">
			</div>
			<div id="confirmNewWords">
				<p id="confirmedWord"></p>
				<button onclick="retriveTypeDiv()">수정</button>
				<br>
				<p id="confirmedMeaning"></p>
			</div>
		</div>
		
		<!--------- space to add type inputs ----------------->
		<div class="div0"></div>
		<button id="addButton">추가하기</button>
		<br><br>
		<button onclick="createNewList()">만들기</button>
		<button onclick="goBack();">취소</button>

	<script>
		
		var newWordList =  [];
		var newMeaningList = [];
		var id=0;
		var isShare = 0;

		$('#confirmNewWords').hide();

		$("#addButton").click(function(){
			id++;
  			$(".div0").append("<div id='div"
			  	+id+"'><br><div style='border:1px solid black;'><input type='text' value='"
				+id+"'placeholder='단어' id='word"
				+id+"' ><button  onclick='addConfirmList("
				+id+")'>확인</button><button onclick='emptyThisDiv("
				+id+")'>-</button><br><input type='text'  placeholder='뜻' id='meaning"
				+id+"'></div></div>");
		});
	
		function goBack() {
			window.history.back();
		}

		function retriveTypeDiv(){
			$('#typeNewWords').show();
			$('#confirmNewWords').hide();
		}

		function addConfirmList(givenId){
			
			//단어리스트에 단어 추가하기
			var newWord = $('#word'+givenId).val();
			var newMeaning = $('#meaning'+givenId).val();
			var dupIndex=-1;
			
			// 푸시 할때 중복, 빈칸체크도 해야겠다
			newWordList.forEach(function (index) {
				//중복된 단어의 index
				dupIndex = newWordList.indexOf(newWord);
			});
			
			//단어 인덱스가 없으면 -1이 들어감 -> 해당하는 단어가 배열안에 존재하지 않음
			if(dupIndex==-1) {
				newWordList.push(newWord);
				newMeaningList.push(newMeaning);
			}
			
			
			console.log(newWordList);
			console.log(newMeaningList);
			
			/*
			//ui handling
			$('#confirmedWord').text(newWord);
			$('#confirmedMeaning').text(newMeaning);
			$('#typeNewWords').hide();
			$('#confirmNewWords').show();*/
			
			
		
		}
		
		function emptyThisDiv(givenId){
			
			//단어목록에서 단어빼기
			var newWord = $('#word'+givenId).val();
			var newMeaning = $('#meaning'+givenId).val();

			newWordList.splice(newWordList.indexOf(newWord),1);
			newMeaningList.splice(newMeaningList.indexOf(newMeaning),1);

			console.log(newWordList);
			console.log(newMeaningList);
	
			//div 없애기
			$('#div'+givenId).empty();

		}

		function isShared(){
			var shareTxt = $('#shareDiv').text();
			if(shareTxt=="공유함") {
				$('#shareDiv').text("공유안함");
				isShare = 1;
			}
			else  {
				$('#shareDiv').text("공유함");
				isShare = 0;
			}
		}
		
		function getCategory(){
			return $('select.noteCategory').children("option:selected").val();	
		}

		function createNewList(){
			
			//카테고리 옵션 가져오기
			var selectedCategory= getCategory();

			var newName=$('#newName').val();
			//리스트 지우기
			var http = new XMLHttpRequest();
			var url = "../process/addList.php";

			var params = 'newWordArray='+newWordList +'&newMeaningArray='+newMeaningList 
				+'&option=2&newList='+newName +'&isShared='
				+ isShare +'&category=' + selectedCategory;

			console.log(params);
			
			http.open('POST', url, true);
			http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
			
			http.onload = function () {
				var result = http.responseText;
				if(result=="dup"){
					window.alert("중복된 이름의 단어장이 이미 존재합니다");
				}else if(result=="success"){
					location.href="./my_note.php";
				}
				//location.reload();
				//console.log(http.responseText);
			};
			
			http.send(params);
		}

	</script>

</body>
</html>
