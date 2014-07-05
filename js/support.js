function getChildrenByClass (obj,classname){
    
	//Проверяем, есть ли у объекта потомки
	try {
		children=obj.childNodes;
	}
	catch (err) {
	return null;
	}
	
    
    var return_array = new Array();
    for (i=0; i<children.length;i++){
		if (children[i].nodeType==1) {
			
    	//try {
			proxy=children[i].getAttribute("class");
			if(proxy==classname) {
				return_array.push(children[i]);

			}

		//	}
		//catch (err) {
		//}


		
		}
    }
    return return_array;
	
}

function getId (obj) {
	if (obj.hasAttribute('id') ==false || obj.id == '') {
		obj.id=(++nextID);
	}
	if (parseInt(obj.id)==obj.id) {
			return parseInt(obj.id)}
	else return obj.id
	

}

function findRootById (obj,id) {
	proxy_obj=obj
	for (i=1;i>0;i++) {
		proxyNode=proxy_obj.parentNode;
		if(proxyNode.getAttribute("id")==id) {
			return proxyNode;
		}

		if (proxyNode.nodeName=="BODY") {
			return null;
		}
		proxy_obj=proxyNode;


		}
}

function findRootByClass (obj,classname) {
	proxy_obj=obj
	for (i=1;i>0;i++) {
		proxyNode=proxy_obj.parentNode;
		if(proxyNode.getAttribute("class")==classname) {
			return proxyNode;
		}

		if (proxyNode.nodeName=="BODY") {
			return null;
		}
		proxy_obj=proxyNode;


		}
}

var slider;
var sliderIntervalId = 0;
var sliderHeight = 0;
var slidingup = false;
var slidingdown = false;
var slideSpeed = 10;


/*function Slide(obj)
{
   
	if(sliding)
      return;
	
	slider=obj;
   sliding = true;
   if(sliderHeight == 40)
      sliderIntervalId = setInterval('SlideUpRun()', 30);
   else
      sliderIntervalId = setInterval('SlideDownRun()', 30);
}*/

function SlideUp(obj)
{
   
	if(slidingup)
      return;
   slider=obj;
   slidingup = true;
   sliderIntervalId1 = setInterval('SlideUpRun()', 30);
   
}

function SlideDown(obj)
{
 if(slidingdown)
      return;
	
 	slider=obj;
 
   slidingdown = true;
   sliderIntervalId2 = setInterval('SlideDownRun()', 30);
}

function SlideDownRun()
{
   if(sliderHeight <= 0)
   {
      slidingdown = false;
      sliderHeight = 0;
      slider.style.height = '0px';
      clearInterval(sliderIntervalId2);
   }
   else
   {
      sliderHeight -= slideSpeed;
      if(sliderHeight < 0)
      sliderHeight = 0;
      
      slider.style.height = sliderHeight + 'px';
   
   }
}

function SlideUpRun()
{

   if(sliderHeight >= 40)
   {
      slidingup = false;
      sliderHeight = 40;
      slider.style.height = '40px';
      clearInterval(sliderIntervalId1);
   }
   else
   {
      sliderHeight += slideSpeed;
      if(sliderHeight > 40) {sliderHeight = 40;}
      slider.style.height = sliderHeight + 'px';
   }
}

function jfill () {
	var arr=$("div.jfiller");
	var filler="";
	for (var i=0; i<1000; i++) {
		filler+="&nbsp ";
	}
	for (var j=0; j<arr.length; j++ ) {
		arr[j].innerHTML=filler;
	}
	
		
}