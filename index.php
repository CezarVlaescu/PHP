<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class=" lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
<style>
   *{
      padding: 0;
      margin: 0;
      box-sizing: border-box;
      font-family: sans-serif;
    }

    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      margin: 0;
      padding: 20px;
    }

	.container{
        width: 100%;
        max-width: 650px;
        padding: 28px;
        margin: 20px;
        border-radius: 10px;
    }

    .range-form {
      max-width: 500px;
      margin: 0 auto;
      background-color: #ffffff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .range-input {
      display: flex;
      align-items: center;
      margin-bottom: 15px;
    }

    .range-input label {
      margin-right: 10px;
      flex-basis: 60px;
      flex-shrink: 0;
    }

    .range-input .form-range {
      flex-grow: 1;
    }

    .range-input .form-number {
      width: 60px;
    }

    .range-input .skill-value {
      font-weight: bold;
	  display: inline-block;
	  padding: 5px 10px;
	  border: 1px solid #ccc;
	  border-radius: 5px;
	  cursor:pointer;
    }

    .range-input .range-bar {
      position: relative;
      flex-grow: 1;
    }

    @media (max-width: 480px) {
      .range-input {
		flex-direction: column;
      }

      .range-input label {
        flex-basis: 100%;
        margin-bottom: 5px;
      }
    }
  </style>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
	<div class="container">
	<h2>Personal Details</h2>
    <br>
	<form role="form" action="procesare.php" method="post" enctype="multipart/form-data">
		
		<div class="mb-3 d-flex align-items-center">
			<label for="name" class="me-3">Name</label>
			<input type="text" class="form-control" name="name" id="name" placeholder="Enter name" required>			
		</div>
		<div class="mb-3 d-flex align-items-center">
			<label for="email" class="me-3">Email</label>
			<input type="email" class="form-control" name="email" id="email" placeholder="Enter email" required>
		</div>
		<div class="mb-3 d-flex align-items-center">
		    <label for="photo" class="me-3">Photo</label>
            <input type="file" id="photo" name="form-control" accept="image/jpeg, image/gif, image/png" required>
		</div>

		<br>

		<h3>Skills</h3>
		<br>
		<br>

		<div class="range-input">
			<label for="html-skill">HTML</label>
			<input type="number" class="form-number" name="html-skill-value" id="html-skill-value" min="0" max="10" value="1">
			<span style="margin-right: 10px;"></span>
			<input type="range" class="form-range" name="html-skill" id="html-skill" min="0" max="10" value="1" required>
		</div>
		<br>
		<div class="range-input">
			<label for="css-skill">CSS</label>
			<input type="number" class="form-number" name="css-skill-value" id="css-skill-value" min="0" max="10" value="1">
			<span style="margin-right: 10px;"></span>
			<input type="range" class="form-range" name="css-skill" id="css-skill" min="0" max="10" value="1" required>
		</div>
		<br>
		<div class="range-input">
			<label for="php-skill-name">PHP</label>
			<input type="number" class="form-number" name="php-skill-value"  id="php-skill-value" min="0" max="10" value="1">
			<span style="margin-right: 10px;"></span>
			<input type="range" class="form-range" name="php-skill" id="php-skill" min="0" max="10" value="1" required>
			
		</div>
		<br>
		<div class="range-input">
			<label for="js-skill">JS</label>
			<input type="number" class="form-number" name="js-skill-value" id="js-skill-value" min="0" max="10" value="1">
			<span style="margin-right: 10px;"></span>
			<input type="range" class="form-range" name="js-skill" id="js-skill" min="0" max="10" value="1" required>
			
		</div>
		<br>
		<div class="text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
	</form>
</div>
	<script>
		const rangeInputs = document.querySelectorAll('.form-range');
        const numberInputs = document.querySelectorAll('.form-number');

        rangeInputs.forEach(function(input, index) {
          const skillNumberInput = numberInputs[index];

           input.addEventListener('input', function() {
            skillNumberInput.value = input.value;
            document.getElementById(input.id + '-value').textContent = input.value;
           });

           skillNumberInput.addEventListener('input', function() {
            const inputValue = parseInt(skillNumberInput.value);
            if (inputValue >= parseInt(input.min) && inputValue <= parseInt(input.max)) {
               input.value = inputValue;
               input.dispatchEvent(new Event('input'));
            }
          });
        });
	</script>
	<script src="js/script.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>   
</html>
