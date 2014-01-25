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
   if(obj.value == "Submit")
   {
     if(validName(document.getElementById("name")) &&
        validGender(document.getElementById("gender")))
      {
         document.getElementById("response").value = "true"
         document.getElementById("form").submit();
      }
   }
   else
   {
      document.getElementById("response").value = "false"
      document.getElementById("form").submit();
   }
}
