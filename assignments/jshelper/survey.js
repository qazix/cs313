function validName(obj)
{
   if(obj == "")
   {
      // obj.backgroundcolor = red;
      return false;
   }
   else
   {
      // obj.backgroundcolor = green;
      return true;
   }
   return false;
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
   return false;
}

function submitForm(obj)
{  
   alert("hi");
   if(obj == "Submit")
   {
     if(validName(document.getElementById("name")) &&
        validGender(document.getElementById("gender")))
      {
         document.getElementById("response").set("value", "true");
         document.getElementById("form").submit();
      }
   }
   else
   {
      document.getElementById("response").value = "false";
      document.getElementById("form").submit();
   }
}
