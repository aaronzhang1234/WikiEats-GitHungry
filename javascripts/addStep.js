
function more(){

	var steps = document.getElementById("steps");
	
	var children = steps.childNodes;
	
	var numbered = steps.getElementsByClassName("numbered");
	var length = numbered.length-1;
	
	
	stepnumber = parseInt(numbered[length].innerHTML.replace("Step ",""));
/*	
	for(var i=0;i <numbered.length;i++){
		alert(numbered[i].innerHTML);
	}
*/		
	
	stepnumber++;
	

	var label=document.createElement("label");
	label.setAttribute("class","numbered");
	var t = document.createTextNode("Step "+stepnumber);
	label.className += " col-md-2 control-label";
	label.append(t);
	
	
	var fileupload = document.createElement("input");
	fileupload.setAttribute("type","file")
	fileupload.setAttribute("name","image"+stepnumber);

	
	var recipiestep= document.createElement("textarea");
	recipiestep.setAttribute("name","step"+ stepnumber);
	recipiestep.className += "col-md-5";
	var skip = document.createElement("br");
	
	var addStep = steps.lastChild;
	steps.removeChild(steps.lastChild);
	
	steps.appendChild(label);
	steps.appendChild(recipiestep);
	steps.appendChild(skip);
	steps.appendChild(fileupload);
	steps.appendChild(skip);
	steps.appendChild(addStep);
}