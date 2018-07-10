function toggleClasses() {
	var myPanelClasses = document.getElementById("pan1").classList;
	var myNavClasses = document.getElementById("login-menu");
	var myElementClasses = document.getElementById("el1").classList;
	var myTopNavClasses = document.getElementsByClassName("navigation-top")[0].className;
	

  if (myPanelClasses.contains("hide")) {
	myPanelClasses.remove("hide");
	myPanelClasses.add("shadow");
  } else {
	myPanelClasses.add("hide");
	myPanelClasses.remove("shadow");
	myNavClasses.classList.remove("shadow");
  }
  if (myPanelClasses.contains("show")) {
	myPanelClasses.remove("show");
	myPanelClasses.remove("shadow");
  } else {
	myPanelClasses.add("show");
	myPanelClasses.add("shadow");
  }

}

document.onscroll = function(){	
	var myNavClasses = document.getElementById("login-menu");	
	var myTopNavClasses = document.getElementsByClassName("navigation-top")[0].className;

  if (myTopNavClasses === "navigation-top shadow site-navigation-fixed") {
	myNavClasses.classList.remove("shadow");
  } else {
	myNavClasses.classList.add("shadow");
  }

};



