function submitForm(obj)
{
   var floor;
   if (obj.name == "building" && document.getElementById("floor") != null)
      document.getElementById("floor").value = "na";
   
   document.getElementById("results").submit();
}

function getXMLRequest(func)
{
   var xmlRequest = new XMLHttpRequest();
      xmlRequest.onreadystatechange = function() {
         if (xmlRequest.readyState == 4 && xmlRequest.status == 200)
         {
            func(xmlRequest.responseText);
         }
      }
   
   return xmlRequest;   
}

function handleRequest(text, pass)
{
   alert(text);
   return text == pass;
}

function fillFloors()
{
   if(document.getElementById("building").value != "na")
   {
      var xmlRequest = new XMLHttpRequest();
      xmlRequest.onreadystatechange = function() {
         if (xmlRequest.readyState == 4 && xmlRequest.status == 200)
         {
            getFloors(xmlRequest.responseText);
         }
      }
      
      xmlRequest.open("GET", "../phphelper/getFloors.php?buildingId=" + 
                        document.getElementById("building").value, true);
      xmlRequest.send();
   }
   else
   {
      getFloors(0);
   }
}

function getFloors(response)
{
   string = '<select id="selectFloor" name="floor" onchange="submitForm(this)"><option value="na" selected="selected">Floor</option>' + "\n";
   
   for (i = 1; i <= response; i++)
   {  
      string += '<option value="' + i + '">' + i + '</option>' + "\n";
   }
   
   document.getElementById("floor").innerHTML = string;
}

function changePage(url)
{
   window.location.href = url;
}

function validFount()
{
   var building = document.getElementById("building").value;
   var floor =    document.getElementById("selectFloor").value;
   var room =     document.getElementById("roomNum").value;
   var size =     document.getElementById("size").value;
   var bottle =   document.getElementById("bottle").value;
   
   if (building != "na" && floor != "na" &&
       room != null && room != "")
   {
      var xmlRequestLoc = getXMLRequest(addLocation);
      xmlRequestLoc.open("GET", "../phphelper/getLoc.php?building=" + building + "&floor=" + 
                      floor + "&room=" + room, false);
      xmlRequestLoc.send();
   }
   
   if (size != 'na' && bottle != 'na')
   {
      var xmlRequestFount = getXMLRequest(addFountain);
      xmlRequestFount.open("GET", "../phphelper/addFount.php?loc=" + xmlRequestLoc.responseText +
                           "&size=" + size + "&bottle=" + bottle, false); 
      xmlRequestFount.send();
   }   
   
   if(xmlRequestLoc.status == 200 && xmlRequestFount.status == 200)
   {
      document.getElementById('newFount').action = "loadFount.php?fount=" +
                                                   xmlRequestFount.responseText;
      return true;
   }
   else
   {
      return false;
   }
   return false;
}

function addLocation(text)
{
//   alert(text);
}

function addFountain(text)
{
//   alert(text);
}