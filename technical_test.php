<!DOCTYPE html>
<html>
<body>
	<button id="btn1" onclick="showElm(1)">Papan catur</button>
	<button id="btn2" onclick="showElm(2)">Pairs</button>
	<button id="btn3" onclick="showElm(3)">Sorting</button>
	<form action="technical_test.php" method="POST">
		<div id="chess" style="display: none;">
			Silakan input jumlah kotak untuk papan catur <input type="text" name="box" id="box" ><br>
			Silakan input Panjang kotak untuk papan catur <input type="text" name="board" id="board" ><br>

		</div>
		<div id="pair" style="display: none;">
			Silakan Input angka: <input type="text" name="pairs" id="pairs" ><br>
			ex: 1,2,4,4,3,2
		</div>
		<div id="asc" style="display: none;">
			Silakan Input angka yang akan di sort ASC: <input type="text" name="sort" id="sort" ><br>
			ex: 1,2,4,4,3,2
		</div>
		
		<div id="btn" style="display: none;"><input type="submit" name="submit"></div>
	</form>
</body>
</html>
<script type="text/javascript">
	function showElm(btn){
		if(btn==1){
			document.getElementById("pair").style.display = "none";
			document.getElementById("asc").style.display = "none";
			document.getElementById("chess").style.display = "block";
			document.getElementById("btn").style.display = "block";
		}else if(btn ==2){
			document.getElementById("pair").style.display = "block";
			document.getElementById("chess").style.display = "none";
			document.getElementById("asc").style.display = "none";
			document.getElementById("btn").style.display = "block";

		}else if (btn==3){
			document.getElementById("pair").style.display = "none";
			document.getElementById("chess").style.display = "none";
			document.getElementById("asc").style.display = "block";
			document.getElementById("btn").style.display = "block";
		}
	}
</script>
<?php
	if(isset($_POST['submit'])) {
		if($_POST['pairs'] !=null){
			echo "Angka yang anda input kan : ".$_POST['pairs']."<br>";

			echo "Angka yang tidak memiliki pasangan: ";
			$pairs= pairs($_POST['pairs']);
			for ($i=0; $i <sizeof($pairs) ; $i++) { 
				if($i==0 && $i !=sizeof($pairs)){
					echo $pairs[$i].",";
				}else if($i !=0 && $i !=sizeof($pairs)-1){
					echo $pairs[$i].",";
				}else{
					echo $pairs[$i];
				}
			}
			echo "<br>";
		}
		if($_POST['sort'] !=null){
			echo "Angka yang anda input kan : ".$_POST['sort']."<br>";
			$arrSort= explode(',',$_POST['sort']);
			$sort = bubbleSort($arrSort);
			echo "Hasil Sorting Angka : ";
			for ($i=0; $i <sizeof($sort) ; $i++) { 
				if($i==0 && $i !=sizeof($sort)){
					echo $sort[$i].",";
				}else if($i !=0 && $i !=sizeof($sort)-1){
					echo $sort[$i].",";
				}else{
					echo $sort[$i];
				}
			}
			echo "<br>";
		}
		if($_POST['box'] !=null && $_POST['board'] !=null){
			echo "Ukuran Kotak : ".$_POST['box']."<br>";
			echo "Ukuran Papan : ".$_POST['board']."<br>";
			$box=$_POST['box'];
			$board=$_POST['board'];
			if(($board % $box)!=0 ){
				echo " nilai kotak(x) dan board(y) tidak valid ";
			}else{
				echo chess($box,$board);
			}
		}
	}

	function pairs($pair){
		$arrPair= explode(',',$pair);
		$arrUnique = array_values(array_unique($arrPair));
		$noPair=array();
		$jmlPair;
		for ($i=0; $i < sizeof($arrUnique); $i++) { 
			$jmlPair=0;
			for ($j=0; $j < sizeof($arrPair); $j++) { 
				if($arrUnique[$i]==$arrPair[$j]){
					$jmlPair++;
				}
			}
			if($jmlPair ==1){
				array_push($noPair, $arrUnique[$i]);
			}
		}
		return (bubbleSort($noPair));
	}

	function bubbleSort($array){
		if(!$length = count($array)){
  			return $array;
 		}
	 	else
	 		for ($i = 0; $i < $length; $i++) {
	  			for ($j = 0; $j < $length; $j++) {
	   				if ($array[$i] < $array[$j]) {
	    				$tmp = $array[$i];
	    				$array[$i] = $array[$j];
	    				$array[$j] = $tmp;
	   				}
	  			}
	 		}
	 		return $array;
	}

	function chess($x,$y){
		$modboars = $y % 2;
		if($modboars==0){
			$jmlfor= $y/2;
			// echo $jmlfor;
			for ($b1=0; $b1 < $jmlfor; $b1++) { 
				if($b1%2==0){
					for ($bb1=0; $bb1 < $x; $bb1++) {
						for ($i=0; $i <$jmlfor ; $i++) { 
							if($i%2==0){
								for ($j=0; $j < $x; $j++) { 
									echo "x";
								}
							}else{
								for ($j=0; $j < $x; $j++) { 
									echo "-";
								}
							}
						}
						echo "<br>";
					}
				}else{
					for ($bb1=0; $bb1 < $x; $bb1++) {
						for ($i=0; $i <$jmlfor ; $i++) { 
							if($i%2==0){
								for ($j=0; $j < $x; $j++) { 
									echo "-";
								}
							}else{
								for ($j=0; $j < $x; $j++) { 
									echo "x";
								}
							}
						}
						echo "<br>";
					}
				}
			}
			
		}else{
			$jmlfor= ($y-1)/2;
			// echo $jmlfor;
			for ($b1=0; $b1 < $jmlfor; $b1++) { 
				if($b1%2==0){
					for ($bb1=0; $bb1 < $x; $bb1++) {
						for ($i=0; $i <$jmlfor ; $i++) { 
							if($i%2==0){
								for ($j=0; $j < $x; $j++) { 
									echo "x";
								}
							}else{
								for ($j=0; $j < $x; $j++) { 
									echo "-";
								}
							}
						}
						echo "<br>";
					}
				}else{
					for ($bb1=0; $bb1 < $x; $bb1++) {
						for ($i=0; $i <$jmlfor ; $i++) { 
							if($i%2==0){
								for ($j=0; $j < $x; $j++) { 
									echo "-";
								}
							}else{
								for ($j=0; $j < $x; $j++) { 
									echo "x";
								}
							}
						}
						echo "<br>";
					}
				}
			}
			if($jmlfor %2==0){
				for ($bb1=0; $bb1 < $x; $bb1++) {
						for ($i=0; $i <$jmlfor ; $i++) { 
							if($i%2==0){
								for ($j=0; $j < $x; $j++) { 
									echo "x";
								}
							}else{
								for ($j=0; $j < $x; $j++) { 
									echo "-";
								}
							}
						}
						echo "<br>";
					}
				}else{
					for ($bb1=0; $bb1 < $x; $bb1++) {
						for ($i=0; $i <$jmlfor ; $i++) { 
							if($i%2==0){
								for ($j=0; $j < $x; $j++) { 
									echo "-";
								}
							}else{
								for ($j=0; $j < $x; $j++) { 
									echo "x";
								}
							}
						}
						echo "<br>";
					}
				}
			
		}
	}
?>