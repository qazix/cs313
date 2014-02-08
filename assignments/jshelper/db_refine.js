function submitForm(obj)
{
   var floor;
   if (obj.name == "building" && document.getElementById("floor") != null)
      document.getElementById("floor").value = "na";
   
   document.getElementById("form").submit();
}