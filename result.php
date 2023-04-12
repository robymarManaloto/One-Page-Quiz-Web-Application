<?php

require "vendor/autoload.php";

session_start();

use App\QuestionManager;

$score = null;

try {
    $manager = new QuestionManager;
    $manager->initialize();

    for ($number = 1; $number <= $manager->getQuestionSize(); $number++) {
        $_SESSION['answers'][$number] = $_POST[$number.'_answer'];
    }

    if (!isset($_SESSION['answers'])) {
        throw new Exception('Missing answers');
    }
    $score = $manager->computeScore($_SESSION['answers']);
	  $results = $manager->results($_SESSION['answers']);
} catch (Exception $e) {
    echo '<h1>An error occurred:</h1>';
    echo '<p>' . $e->getMessage() . '</p>';
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="icon.png">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <title>Result</title>
</head>

<body>

  <div class="container mt-5">
    <div class="text-center">
      <h1>Thank You! </h1>
      <h3>Congratulations <strong><?php echo $_SESSION['user_complete_name']; ?></strong> (<strong><?php echo $_SESSION['user_email']; ?></strong>)</h3>
      <p class="lead">Score: <font color="blue"><b><?php echo $score; ?></b></font> out of <?php echo $manager->getQuestionSize() ;?> items</p>
      <h4>Your Answers</h4>
  	 </div>
	 <ol class="list-group list-group-numbered">
	  	<?php 
			foreach ($results as $number => $answers) {
				if($answers[1] == 1){
					echo "<li class='list-group-item  list-group-item-success'>".$answers[0]."</li>";
				}else{
					echo "<li class='list-group-item  list-group-item-danger'>".$answers[0]."</li>";
				}
			}
		?>
	</ol>
    <div class="d-flex flex-row justify-content-between align-items-center p-3 bg-white">
        <a href="index.php" class="btn btn-primary mt-3">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/>
  <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/></svg>
Retake the Exam</a>
    </div>
  </div>
  
</body>

</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>