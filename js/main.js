

function changeBlog(blogID, type)
{
    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    
    var action = "changeBlogList.php?blogID=" + blogID + "&type=" + type;

    xmlhttp.open("GET",action,false);

    xmlhttp.send(null);

    document.getElementById("blogBox").innerHTML=xmlhttp.responseText;
}

function submitComment()
{
    var name = document.getElementById('name').value;
    var comment = document.getElementById('comment').value;

    if(name == "" || comment ==  "")
    {
        document.getElementById("messageBox").innerHTML="Please fill in your name and comment.";
    }
    else
    {
        document.getElementById("comment_form").submit();
    }

}

function submitJob()
{
    var name = document.getElementById('job_name').value;
    var contact = document.getElementById('job_contact').value;
    var skill = document.getElementById('skill').value;
    var email = document.getElementById('email').value;

    if(name == "" || skill ==  "" || contact == "")
    {
        document.getElementById("job_msgBox").innerHTML="Please fill all required fields.";
    }
    else if(!isInteger(contact))
    {
        document.getElementById("job_msgBox").innerHTML="Invalid contact number.";
    }
    else if(email != "" && !isEmail(email))
    {
        document.getElementById("job_msgBox").innerHTML="Invalid email entered.";
    }
    else
    {
            if (window.XMLHttpRequest)
            {// code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp=new XMLHttpRequest();
            }
            else
            {// code for IE6, IE5
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }

            var action = "submit_job.php?submitJob=true&job_name=" + name + "&job_contact=" + contact + "&email=" + email + "&skill=" + skill;

            xmlhttp.open("GET",action,false);

            xmlhttp.send(null);

            document.getElementById("alertBox").innerHTML=xmlhttp.responseText;
            document.getElementById("alertBox").style.display = "";
            document.getElementById("fancybox-wrap").style.display= "none";

//        document.getElementById("job_form").submit();
    }

}

function submitBooking()
{
    var name = document.getElementById('booking_name').value;
    var contact = document.getElementById('booking_contact').value;
    var booking_case = document.getElementById('case').value;

    if(name == "" || contact ==  "" || booking_case == "")
    {
        document.getElementById("booking_msgBox").innerHTML="Please fill all required fields.";
    }
    else if(!isInteger(contact))
    {
        document.getElementById("booking_msgBox").innerHTML="Invalid contact number.";
    }
    else
    {
        if (window.XMLHttpRequest)
        {// code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
        }
        else
        {// code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }

        var action = "submit_booking.php?submitBooking=true&booking_name=" + name + "&booking_contact=" + contact + "&case=" + booking_case;

        xmlhttp.open("GET",action,false);

        xmlhttp.send(null);

        document.getElementById("alertBox").innerHTML=xmlhttp.responseText;
        document.getElementById("alertBox").style.display = "";
        document.getElementById("fancybox-wrap").style.display= "none";
    }



}


function displaySubMenu()
{

        var pos = getXYpos(document.getElementById("aboutMenu"));

        document.getElementById("subMenu").style.left = pos['x'] + "px";
}

function getXYpos(elem) {
   if (!elem) {
      return {"x":0,"y":0};
   }
   var xy={"x":elem.offsetLeft,"y":elem.offsetTop}
   var par=getXYpos(elem.offsetParent);
   for (var key in par) {
      xy[key]+=par[key];
   }
   return xy;
}


function startCPSEffect()
{

    var zipcode = document.getElementById("zipcode").value;

    if(zipcode == "")
    {
        document.getElementById("msg").innerHTML = "Please enter your ZipCode.";
        document.getElementById("alertButton2").style.display='none';
        document.getElementById("alertButton").style.display='';
        document.getElementById("fancybox-overlay").style.display='block';
        document.getElementById("alertBox").style.display="";
    }
    else if(!isInteger(zipcode))
    {
        document.getElementById("msg").innerHTML = "Invalid ZipCode.";
        document.getElementById("alertButton2").style.display='none';
        document.getElementById("alertButton").style.display='';
        document.getElementById("fancybox-overlay").style.display='block';
        document.getElementById("alertBox").style.display="";}
    else
    {

        var count = 0;
        for(var i=0; i < zipList.length; i ++)
        {
            if(zipcode == zipList[i])
            {
                
                matchedName[count] = nameList[i];

                matchedPopulation[count] = populationList[i];
                count ++;
            }
        }

        if(matchedName.length == 0)
        {
            document.getElementById("msg").innerHTML = "Invalid ZipCode. Please re-enter a NSW ZipCode.";
            document.getElementById("alertButton2").style.display='none';
            document.getElementById("alertButton").style.display='';
            document.getElementById("fancybox-overlay").style.display='block';
            document.getElementById("alertBox").style.display="";

        }
        else if(matchedName.length > 1)
        {
            document.getElementById("msg").innerHTML = "Please choose a suburb:<br/><br/>";

            document.getElementById("msg").innerHTML += "<input type='radio' name='suburbSelect' value='0' checked/> "+ matchedName[0] + "<br/>";
            for(i=1; i < matchedName.length; i ++)
            {
                document.getElementById("msg").innerHTML += "<input type='radio' name='suburbSelect' value='" + i +"'/> " + matchedName[i] + "<br/>";
            }

            document.getElementById("alertButton").style.display='none';
            document.getElementById("alertButton2").style.display='';
            document.getElementById("fancybox-overlay").style.display='block';
            document.getElementById("alertBox").style.display="";   
        }
        else
        {
            displayEffect(0);

        }

    }
    
}



function chooseSuburb()
{
    
    var radioObj= document.getElementsByName('suburbSelect');
    
    var radioLength = radioObj.length;

    for(var i = 0; i < radioLength; i++) {
            if(radioObj[i].checked) {

                    displayEffect(radioObj[i].value);
            }
    }


}

function displayEffect(count)
{

    document.getElementById("alertBox").style.display="none";
    document.getElementById('fancybox-overlay').style.display='none';
    document.getElementById('effectButton').disabled=true;
    document.getElementById('effectButton').style.color='gray';

    if(document.getElementById("effectRow1").innerHTML != "")
    {
        
        for(var i=0; i < 8; i ++)
        {
//            document.getElementById("effectRow" + i).style.visibility ="hidden";
            fadeIn(i);
        }
        
    }

    setTimeout("setEffectInfo(" + count + ")", 1500);

}

function setEffectInfo(count)
{
    var examples = [];
    examples[0] = "That money can buy you 3 pairs of stylish Nike shoes,<br/> or a nice TAG Heuer wrist watch.";
    examples[1] = "That money can buy you 350 Marbars, or a nice Gucci hand bag.";
    examples[2] = "That money can buy you 10 new console video games,<br/> or a brand new iPad with Wi-Fi + 3G.";
    examples[3] = "That money can buy you 45 KFC dinner for two,<br/> or a few pairs of unique PRADA sunglasses.";
    examples[4] = "That money can buy you 35 new released DVDs,<br/> or a nice crystal clear LCD Plasma TV.";
    examples[5] = "That money can buy you a whole year supply of apples,<br/> or a nice 7 days getaway trip to Queensland.";

    var avgWater = (170 + Math.floor(Math.random()*31));
    var avgElectric = (4570 + Math.floor(Math.random()*201));
    var exampleCase = Math.floor(Math.random()*6);

    document.getElementById("effectRow0").style.color = "green";
    document.getElementById("effectRow0").innerHTML = matchedName[count];
    document.getElementById("effectRow1").innerHTML = "Your area population is <label class='infoNumber'>" + addCommas(matchedPopulation[count]) + "</label>";
    document.getElementById("effectRow2").innerHTML = "On average <label class='infoNumber'>" + addCommas(Math.round(matchedPopulation[count] * avgWater)) +
        "</label> kL of water and <label class='infoNumber'>" + addCommas(Math.round(matchedPopulation[count] * avgElectric)) + "</label> kWhs of electricity used yearly.";
    document.getElementById("effectRow3").innerHTML = "This equals to <label class='infoNumber'>" + addCommas(avgWater) + "</label> kL of water and <label class='infoNumber'>" + addCommas(avgElectric) +"</label> kWhs of electricity per household, ";
    document.getElementById("effectRow4").innerHTML = "which can cost up to <label class='infoNumber' style='font-size:24px; color: #d80018;'>$" + (avgWater* 2.24 + avgElectric * 0.20).formatMoney(2, '.', ',') + "</label> per year.";
    document.getElementById("effectRow5").innerHTML = "Cornish can save you potentially <label class='infoNumber' style='font-size:24px;color: #d80018;'>$307</label> of water and  <label class='infoNumber' style='font-size:24px;color: #d80018;'>$394</label> of electrical cost.";
    document.getElementById("effectRow6").style.color = "#ff0069";
    document.getElementById("effectRow6").style.fontSize = "20px";
    document.getElementById("effectRow6").innerHTML = examples[exampleCase];
//    document.getElementById("FBComm").innerHTML = "You live in " + matchedName[count] + "<br/> + You spent " + (avgWater* 2.24 + avgElectric * 0.20).formatMoney(2, '.', ',') + "</label> per year." +
//                                                "<br/> " + document.getElementById("effectRow5").innerHTML +"<br/> " + document.getElementById("effectRow6").innerHTML;

    for(var i=0; i < 8; i ++)
    {
        document.getElementById("effectRow" + i).style.visibility ="visible";

        setTimeout("fadeOut(" + i + ")", i * 2500);
    }

    setTimeout("document.getElementById('effectButton').disabled=false;document.getElementById('effectButton').style.color='#FFFFFF';", 16500);
}

/* set the opacity of the element (between 0.0 and 1.0) */
function setOpacity(level, element)
{

      element.style.opacity = level;
      element.style.MozOpacity = level;
      element.style.KhtmlOpacity = level;
      element.style.filter = "alpha(opacity=" + (level * 100) + ");";
}

function setFirstPicOpacity(count, level)
{
    var element = document.getElementById("effectRow" + count);
      setOpacity(level, element);
}

function setSecondPicOpacity(count, level)
{
    var element = document.getElementById("effectRow" + count);
      setOpacity(level, element);
}


var duration = 1000;  /* 1000 millisecond fade = 1 sec */
var steps = 8;       /* number of opacity intervals   */
var delay = 5000;     /* 5 sec delay before fading out */

function fadeIn(count)
{

  for (i = 0; i <= 1.1; i += (1 / steps))
  {

    setTimeout("setFirstPicOpacity(" + count + "," + i + ")", i * duration);
    setTimeout("setSecondPicOpacity(" + count + "," + (1 - i) + ")", i * duration);
  }
//  setTimeout("fadeOut()", delay);
}

function fadeOut(count) {
  for (i = 0; i <= 1.1; i += (1 / steps))
  {
    setTimeout("setFirstPicOpacity(" + count + "," + (1 - i) + ")", i * duration);
    setTimeout("setSecondPicOpacity(" + count + "," + i + ")", i * duration);
  }
//  setTimeout("fadeIn()", delay);
}

function addCommas(nStr)
{
	nStr += '';
	x = nStr.split('.');
	x1 = x[0];
	x2 = x.length > 1 ? '.' + x[1] : '';
	var rgx = /(\d+)(\d{3})/;
	while (rgx.test(x1)) {
		x1 = x1.replace(rgx, '$1' + ',' + '$2');
	}
	return x1 + x2;
}


Number.prototype.formatMoney = function(c, d, t){
	var n = this, c = isNaN(c = Math.abs(c)) ? 2 : c, d = d == undefined ? "," : d, t = t == undefined ? "." : t, s = n < 0 ? "-" : "", i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
	return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
};


function isInteger(s)
{var i;
    for (i = 0; i < s.length; i++)
    {
        // Check that current character is number.
        var c = s.charAt(i);
        if (((c < "0") || (c > "9"))) return false;
    }
    // All characters are numbers.
    return true;
}

function isEmail(checkEmail)
{
    if ((checkEmail.indexOf('@') < 0) || ((checkEmail.charAt(checkEmail.length-4) != '.') && (checkEmail.charAt(checkEmail.length-3) != '.')))
    {
        return false;
    }
    else
    {
        return true;
    }
}


