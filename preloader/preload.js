(function(){
	var preload = document.getElementById('preload');
	var loading = 0;
	var id=setInterval(frame,34);
	function frame(){
		if(loading==50){
			clearInterval(id);
			window.open("../index.php","_self");
		}
		else{
			loading=loading+1;
			if (loading==40) {
				preload.style.animation= "fadeout 1s ease";
			}
		}
	}

})();