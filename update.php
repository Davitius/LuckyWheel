<?php
require_once ('assets/php/connect.php');
$id = $_GET['id'];
$question = "SELECT * FROM game_lw_questions WHERE id = '$id'";
$result = $mysql->query($question);
$row = $result->fetch_object();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>update</title>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/Mystyle.css">
</head>
<body>
<div class="insertForm container">
    <div class="row">


        <div class="addForm col-lg-12" id="update">
            <div class="backArrow">
                <a class="btn btn-primary" href="insert.php"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                    </svg></a>
            </div>
            <span class="">შეკითხვის შეცვლა</span>
            <form method="post" action="assets/php/updatequestion.php">
                <div class="textareaDiv mt-5">
                    <div class="idDiv mb-3">
<!--                        <span class="ID">ID - </span>-->
                        <a class="btn btn-outline-info fw-bold">ID - <?php echo $row->id; ?></a>
                        <input class="form-control" id="id" name="id" value="<?php echo $row->id; ?>" hidden>
                    </div>
                    <span class="">შეკითხვა.</span>
                    <textarea name="question" id="question" class="form-control" rows="6"><?php echo $row->question; ?></textarea>
                </div>


                <div class="inputDiv mt-3">
                    <span class="">პასუხი.</span>
                    <input class="form-control w-100" name="answer" id="answer" value="<?php echo $row->answer; ?>">
                </div>

                <div class="mt-3">
                    <button class="btn btn-success" name="" id="" type="submit">განახლება</button>
                </div>
            </form>
        </div>






    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>
</html>