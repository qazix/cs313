function validName()
{
   var obj = document.getElementById("name");

   if(obj.value == "" || obj.value == null)
   {
      obj.style.backgroundColor = "red";
      return false;
   }
   else
   {
      obj.style.backgroundColor = "LawnGreen";
      return true;
   }
   return false;
}

function validGender()
{
   var obj = document.getElementById("gender");
   if(obj.value == "na")
   {
      obj.style.backgroundColor = "Red";
      return false;
   }
   else
   {
      obj.style.backgroundColor = "LawnGreen";
      return true;
   }
   return false;
}

function submitForm(obj)
{  
   if(obj == "Submit")
   {
     if(validName(document.getElementById("name").value) &&
        validGender(document.getElementById("gender").value))
      {
         document.getElementById("response").value = "true";
         document.getElementById("form").submit();
      }
   }
   else
   {
      document.getElementById("response").value = "false";
      document.getElementById("form").submit();
   }
}
