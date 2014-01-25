function validName(obj)
{
   if(obj.value == "")
   {
      obj.border = red;
   }
}

function validGender(obj)
{
   if(obj.value == "na")
   {
      obj.border = red;
   }
}

function submit()
{
   document.getElementById("form").submit();
}
