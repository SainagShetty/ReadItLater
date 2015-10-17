var myBlurFunction = function(state) {
    /* state can be 1 or 0 */
    var containerElement = document.getElementById('main_container');
    var popupboxEle = document.getElementById('popupbox');

    if (state) {
        popupboxEle.style.display = 'block';
        containerElement.setAttribute('class', 'blur');
    } else {
        popupboxEle.style.display = 'none';
        containerElement.setAttribute('class', null);
    }
};
function login(showhide){
if(showhide == "show"){
    document.getElementById('popupbox').style.visibility="visible";
	myBlurFunction(1);
}else if(showhide == "hide"){
    document.getElementById('popupbox').style.visibility="hidden"; 
myBlurFunction(0);
}
}
$(document).ready(function(){
    $("#myBtn3").click(function(){
        $("#myModal3").modal({backdrop: "static"});
    });
});
