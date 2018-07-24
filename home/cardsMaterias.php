<div class="owl-carousel owl-theme" ><?
	while($exibir = $server_data->fetch()){
		include "./php/corCards.php";
		if (($exibir["tipo"]=="Prova 1")  or ($exibir["tipo"]=="Prova 2") or ($exibir["tipo"]=="Prova Única") or ($exibir["tipo"]=="Recuperação") or ($exibir["tipo"]=="Substutiva") ){
			$subtipo = $exibir["tipo"].' '.$exibir['subtipo'];
		} else {
			$subtipo = $exibir["subtipo"];
		}
		echo'
	 	<div class="col s12 item">
		 	<div class="card hoverable">
			 	<div class="card-img" style="overflow:hidden;">
			 		<div class="'.$cor.'" style="height:150px; width:100%;"></div>
			 		<a class="white-text" target="_blank" href="'.$exibir["link"].'">
			 			<button class="btn-floating btn-large white" style="margin-top:-40px; margin-left:70%;">
			 				<i class="material-icons '.$textoCor.'">open_in_new</i>
			 			</button>
			 		</a>
			 	</div>
			 	<div class="card-content" style="padding: 5px 15px 5px;">
			 		<p class="'.$cor.'-text" style="font-size:10px;">Professor</p>
			 		<div class="card-title">'.$exibir["professor"].' </div>
			 		<p class="grey-text text-darken-2">'.$subtipo.'</p>
			 	</div>
			 	<div class="card-action">
			 		<p class="'.$cor.'-text" style="font-size:10px;">Quad</p>
			 		<p class="grey-text text-darken-2">'.$exibir["quad"].'<span class="right '.$textoCor.'">'.$texto.'</span></p>
			 	</div>
			 </div>
		 </div>';
	}?>
</div>
