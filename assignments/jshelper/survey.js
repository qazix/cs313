function validName(obj)
{
   if(obj.value == "")
   {
      obj.backgroundcolor = red;
      return false;
   }
   else
   {
      obj.backgroundcolor = green;
      return true;
   }
}

function validGender(obj)
{
   if(obj.value == "na")
   {
      obj.backgroundcolor = red;
      return false;
   }
   else
   {
      obj.backgroundcolor = green;
      return true;
   }
}

function submit(obj)
{  
   if(obj.value == "Cancel" || (obj.value == "Submit" && 
                               validName(document.getElementById("name")) &&
                               validGender(document.getElementById("gender"))))
         document.getElementById("form").submit();
}
