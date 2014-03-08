<head>
   <title>Survey</title>
   <script type="text/javascript" src="jshelper/survey.js"></script>
</head>
<body>
   <p>This is the Survey</p>
<<<<<<< HEAD
   <form id="form" class="form" action="1survey.php" method="GET">
      <p>Name <input type="text" id="name" name="name" onblur="validName(value)"></input></p>
      <p>Gender <select id="gender" name="gender" onblur="validGender(value)">
                  <option value="na"> </option>
                  <option value="ma">Male</option>
                  <option value="fe">Female</option>
                </select></p>
      <p>Do you play League of Legends&nbsp;     &nbsp;yes<input type="radio" name="play" value="yes" checked="checked"/>
         no<input type="radio" name="play" value="no"/></p>
=======
   <form id="form" class="form" action="1survey.php" method="POST">
      <p>Name <input type="text" id="name" name="name" onblur="validName()">
         </input></p>
      <p>Gender 
         <select id="gender" name="gender" onblur="validGender()">
            <option value="na"> </option>
            <option value="ma">Male</option>
            <option value="fe">Female</option>
         </select></p>
      <p>Do you play League of Legends&nbsp;     &nbsp;
         yes<input type="radio" name="play" value="yes"/>
         no<input type="radio" name="play" value="no" checked="checked"/></p>
>>>>>>> origin/master
      <p>If the above question is yes what positions do you prefer</p>
      <div class="checkBox">
         <input type="checkbox" name="pos[]" value="top">Top<br/>
         <input type="checkbox" name="pos[]" value="mid">Mid<br/>
         <input type="checkbox" name="pos[]" value="jg">Jungle<br/>
         <input type="checkbox" name="pos[]" value="adc">ADC<br/>
         <input type="checkbox" name="pos[]" value="supp">Support<br/>
         <input type="checkbox" name="pos[]" value="na" checked="checked">I don't play<br/>
      </div>
      <input id="response" name="response" type="text" hidden="true"></input>
<<<<<<< HEAD
      <input type="button" value="Submit" onclick="submitForm('Submit')"/>
      <input type="button" value="Cancel" onclick="submitForm('Cancel')"/>
=======
      <input type="button" value="Submit" name="response" onclick="submitForm(value)"/>
      <input type="button" value="Cancel" name="response" onclick="submitForm(value)"/>
>>>>>>> origin/master
   </form>
</body>
