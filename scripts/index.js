function Search(){
	input=document.getElementById("input-bar").value.toLowerCase();
	div = document.getElementsByClassName("post-title");
	a = document.getElementsByClassName("post");

	for (i = 0; i < div.length; i++) {
		post= div[i].textContent.toLowerCase();
		if (post.indexOf(input) > -1) {
            		a[i].style.display = "";
        	} else {
            		a[i].style.display = "none";
        	}
	}
}