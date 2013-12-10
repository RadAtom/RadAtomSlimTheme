/*
 * Rad Atom Javascript Library
 * http://radatom.com
 * Developed By: Andrew Verdin
 *
 *
*/
//
//
document.getElementById("schema_snippet_field").onchange = function() {
	localStorage['schema_snippet_field'] = document.getElementById("schema_snippet_field").value;
	}
	window.onload= function(){
		if(localStorage['schema_snippet_field'])
			document.getElementById("schema_snippet_field").value = localStorage['schema_snippet_field'];
	}