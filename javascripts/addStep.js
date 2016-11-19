
function more(){

	var steps = document.getElementById("steps");
	
	var children = steps.childNodes;
	
		
	stepnumber = parseInt(children[1].innerHTML.replace("Step ",""));
	
	
	stepnumber++
	/*
	for(var i = 0;i<children.length;i++){
		alert(children[i]);
	}
	*/
	
	var label=document.createElement("label");
	var t = document.createTextNode("Step "+stepnumber);
	var fileupload = document.createElement("input");
	fileupload.setAttribute("type","file")
	fileupload.setAttribute("name","fileToUpload");
	
	
	label.append(t);
	
	var recipiestep= document.createElement("textarea");
	recipiestep.setAttribute("name","Step"+ stepnumber);
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