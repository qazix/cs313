<head>
   <title>Survey</title>
   <script type="text/javascript" src="jshelper/survey.js"></script>
</head>
<body>
   <p>This is the Survey</p>
   <form class="form" onsubmit="return 1SurveyValidate()" action="../1survey.php" method="POST">
      <p>Name <input type="text" id='name' name="name" onblur="validName(this)"></input></p>
      <p>Gender <select id='gender' name="gender" onblur="validGender(this)">
                  <option value="na"> </option>
                  <option value="ma">Male</option>
                  <option value="fe">Female</option>
                </select></p>
      <p>Do you play League of Legends &nbsp;    yes<input type='radio' name='play' value='yes' checked='checked'/>
         no<input type='radio' name='play' value='no'/></p>
      <p>If the above question is yes what positions do you prefer</p>
      <div class='checkBox'>
            <input type="checkbox" name="pos[]" value="top">Top<br/>
				<input type="checkbox" name="pos[]" value="mid">Mid<br/>
				<input type="checkbox" name="pos[]" value="jg">Jungle<br/>
				<input type="checkbox" name="pos[]" value="adc">ADC<br/>
				<input type="checkbox" name="pos[]" value="supp">Support<br/>
				<input type="checkbox" name="pos[]" value="na">I don't play<br/>
      </div>
      <button type='submit' name='respond' value='true'/>
      <button type='cancel' name='respond' value='false'/>
   </form>
</body>
