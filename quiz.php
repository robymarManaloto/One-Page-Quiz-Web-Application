<?php

require "vendor/autoload.php";

session_start();

use App\QuestionManager;

$number = null;
$question = null;

try {
    $manager = new QuestionManager;
    $manager->initialize();
	
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Questionnaire Page</title>
		<link rel="icon" type="image/x-icon" href="icon.png">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	</head>	
	<body>
		<div class="container mt-5">
		   <div class="d-flex justify-content-center row">
			  <div class="col-md-10 col-lg-10">
				<div class="question bg-white p-3 border-bottom">
					<div class="d-flex flex-row justify-content-between align-items-center mcq">
						<h2>Analogy Questions</h2>
						<span><?php echo $manager->getQuestionSize(); ?> Questions</span>
					</div>
				</div>
				<div class="question bg-white p-3 border-bottom">
					<div class="justify-content-between align-items-center mcq">
						<h4>Instructions</h4>
						<p>There is a certain relationship between two given words on one side of : : and one word is given on another side of : : while another word is to be found from the given alternatives, having the same relation with this word as the words of the given pair bear. Choose the correct alternative.</p>
					</div>
				</div>
				
				<form method="POST" action="result.php">				
				   <?php
				   for ($x = 1; $x <= $manager->getQuestionSize(); $x++) {
				   		$question = $manager->retrieveQuestion($x);
				   ?>

				 <div class="border">
					<div class="question bg-white p-3 border-bottom">
					   <div class="d-flex flex-row align-items-center question-title">
						  <h3 class="text-danger"><?php echo $question->getNumber(); ?>.&nbsp</h3>
						  <h5 class="mt-1 ml-2"><?php echo $question->getQuestion(); ?></h5>
					   </div>
					   
					   <?php foreach ($question->getChoices() as $choice): ?>
						
						<div class="ans ml-2">
						  <label class="radio">
							<input
							type="radio"
							name="<?php echo $question->getNumber(); ?>_answer"
							value="<?php echo $choice->letter; ?>"
							/>
							<span>
								<?php echo $choice->letter; ?>)
								<?php echo $choice->label; ?><br />
							</span>
						  </label>    
					   </div>

						<?php endforeach; ?>
					</div>
				 </div>
				 <br>
				 <?php } ?>

				 	<div class="d-flex flex-row justify-content-between align-items-center p-3 bg-white">
						<input class="btn btn-primary border-success align-items-center btn-success" type="submit" value="Submit" name="Submit">
					</div>
				 </form>
				 
			  </div>
		   </div>
		</div>
		
	</body>
</html>

<?php
} catch (Exception $e) {
    echo '<h1>An error occurred:</h1>';
    echo '<p>' . $e->getMessage() . '</p>';
    exit;
}


?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
