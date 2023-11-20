<?php
require_once ('assets/php/connect.php');
$questions = "SELECT * FROM game_lw_questions ORDER  BY id DESC";
$count = "SELECT * FROM game_lw_questions ORDER  BY id DESC";
$countResult = $mysql->query($count);
$countRow = $countResult->fetch_object();

$result = $mysql->query($questions);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>insert</title>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/Mystyle.css">
</head>
<body>
<div class="insertForm container">
    <div class="row">


        <div class="addForm col-lg-12" id="insert">
            <span class="">შეკითხვის დამატება</span>
            <form method="post" action="assets/php/addquestion.php">
                <div class="textareaDiv mt-5">
                    <span class="">შეკითხვა.</span>
                    <textarea name="question" id="question" class="form-control" rows="6" required></textarea>
                </div>


                <div class="inputDiv mt-3">
                    <span class="">პასუხი.</span>
                    <input class="form-control w-100" name="answer" id="answer" required>
                </div>

                <div class="mt-3">
                    <button class="btn btn-success" name="" id="" type="submit">დაამატე</button>
                </div>
            </form>
        </div>



        <div class="questionTable col-lg-12 mt-5">

            <span class="">ბაზა შეიცავს <?php echo $countRow->id; ?> შეკითხვას.</span>

            <table class="table table-info table-hover mt-2">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>პასუხი</th>
                    <th>შეკითხვა</th>
                    <th>ქმედება</th>
                </tr>
                </thead>
                <tbody>
                <?php while ($row = $result->fetch_object()): ?>
                <tr>
                    <td><button class="btn btn-info" name="" id=""><?php echo $row->id; ?></button></td>
                    <td><?php echo $row->answer; ?></td>
                    <td><?php echo $row->question; ?></td>
                    <td>

                            <a type="submit" class="btn btn-warning" href="update.php?id=<?php echo $row->id ?>"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-gear-wide-connected" viewBox="0 0 16 16">
                                    <path d="M7.068.727c.243-.97 1.62-.97 1.864 0l.071.286a.96.96 0 0 0 1.622.434l.205-.211c.695-.719 1.888-.03 1.613.931l-.08.284a.96.96 0 0 0 1.187 1.187l.283-.081c.96-.275 1.65.918.931 1.613l-.211.205a.96.96 0 0 0 .434 1.622l.286.071c.97.243.97 1.62 0 1.864l-.286.071a.96.96 0 0 0-.434 1.622l.211.205c.719.695.03 1.888-.931 1.613l-.284-.08a.96.96 0 0 0-1.187 1.187l.081.283c.275.96-.918 1.65-1.613.931l-.205-.211a.96.96 0 0 0-1.622.434l-.071.286c-.243.97-1.62.97-1.864 0l-.071-.286a.96.96 0 0 0-1.622-.434l-.205.211c-.695.719-1.888.03-1.613-.931l.08-.284a.96.96 0 0 0-1.186-1.187l-.284.081c-.96.275-1.65-.918-.931-1.613l.211-.205a.96.96 0 0 0-.434-1.622l-.286-.071c-.97-.243-.97-1.62 0-1.864l.286-.071a.96.96 0 0 0 .434-1.622l-.211-.205c-.719-.695-.03-1.888.931-1.613l.284.08a.96.96 0 0 0 1.187-1.186l-.081-.284c-.275-.96.918-1.65 1.613-.931l.205.211a.96.96 0 0 0 1.622-.434l.071-.286zM12.973 8.5H8.25l-2.834 3.779A4.998 4.998 0 0 0 12.973 8.5zm0-1a4.998 4.998 0 0 0-7.557-3.779l2.834 3.78h4.723zM5.048 3.967c-.03.021-.058.043-.087.065l.087-.065zm-.431.355A4.984 4.984 0 0 0 3.002 8c0 1.455.622 2.765 1.615 3.678L7.375 8 4.617 4.322zm.344 7.646.087.065-.087-.065z"/>
                                </svg></a>

                    </td>
                </tr>
                <?php endwhile; ?>
                </tbody>
            </table>
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