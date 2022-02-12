function Check() {
	//regex=/^[a-zA-Z0-9]+@[a-zA-Z0-9]+.[a-zA-Z0-9]+$/;
	regex=/^[^\s@]+@[^\s@]+\.[^\s@]{1,2}$/;
	input = document.getElementById("e").value;
	if (regex.test(input)){
		document.getElementById("e").style.color="green";
	}else{
		document.getElementById("e").style.color="red";
	}
}