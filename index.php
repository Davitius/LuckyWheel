<?php
require_once 'assets/php/connect.php';

$scores = "SELECT * FROM game_lw_scores ORDER  BY score DESC LIMIT 10";
$result = $mysql->query($scores);

$questionsCount = "SELECT * FROM game_lw_questions ORDER  BY id DESC";
$countResult = $mysql->query($questionsCount);
$countRow = $countResult->fetch_object();

$randomQuest = rand(1, $countRow->id);
$question = "SELECT * FROM game_lw_questions WHERE id = '$randomQuest'";
$questionResult = $mysql->query($question);
$questionRow = $questionResult->fetch_object();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png+xml" href="assets/images/action-circle.png"/>
    <title>იღბლიანი ბორბალი</title>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/Mystyle.css">


</head>
<body>
<div class="start container" id="start">
    <div class="menu">
        <div class="headerDiv">
            <img src="assets/images/header.PNG" id="" class="headerImg">
        </div>
        <span class="databaseText">მიმდინარე ბაზა შეიცავს <?php echo $countRow->id; ?> შეკითხვას.</span>


        <div class="bodyDiv row">
            <div class="gameMenuDiv col-lg-6">

                <div class="frame" id="frame">
                    <div class="userCardDiv row mt-5" id="userCard3">

                        <div class="menuPlayersInputDiv col-12" id="menuPlayersInputDiv1">
                            <span class="menuPlayersText">მოთამაშე № 1</span>
                            <input class="form-control" type="text" name="player1Input" placeholder="მოთამაშის სახელი" id="player1Input"
                                   maxlength="15">
                        </div>
                    </div>

                    <div class="userCardDiv row" id="userCard3">

                        <div class="menuPlayersInputDiv col-12" id="menuPlayersInputDiv2">
                            <span class="menuPlayersText">მოთამაშე № 2</span>
                            <input class="form-control" type="text" name="player2Input" placeholder="მოთამაშის სახელი" id="player2Input"
                                   maxlength="15">
                        </div>
                    </div>

                    <div class="userCardDiv row" id="userCard3">

                        <div class="menuPlayersInputDiv col-12" id="menuPlayersInputDiv3">
                            <div class="">
                                <div class="btn-group ml-3">
                                    <button class="btn btn-outline-success" id="" name="" onclick="addPlayer3()">ჩართე
                                        მოთამაშე №3
                                    </button>
                                    <button class="btn btn-outline-danger" id="" name="" onclick="removePlayer3()">
                                        გამორთე
                                    </button>
                                </div>

                            </div>
                            <input class="form-control mt-2" type="text" name="player3Input" placeholder="მოთამაშის სახელი" id="player3Input"
                                   maxlength="15" hidden>

                        </div>
                    </div>
                    <div class="userCardDiv row" id="userCard3">

                        <div class="menuPlayersInputDiv col-12" id="menuPlayersInputDiv4">
                            <div class="">
                                <div class="btn-group">
                                    <button class="btn btn-outline-success" id="" name="" onclick="addPlayer4()">ჩართე
                                        მოთამაშე №4
                                    </button>
                                    <button class="btn btn-outline-danger" id="" name="" onclick="removePlayer4()">
                                        გამორთე
                                    </button>
                                </div>
                            </div>
                            <input class="form-control mt-2" type="text" name="player4Input" placeholder="მოთამაშის სახელი" id="player4Input"
                                   maxlength="15" hidden>
                        </div>
                    </div>
                </div>


                <button class="btn btn-success mt-3 mb-4" id="gameStartBtn" type="submit" onclick="gameStart()">თამაშის
                    დაწყება
                </button>

                <button class="btn btn-success mt-5" id="newGameBtn" onclick="reload();" hidden>ახალი თამაში</button>
            </div>
            <div class="scoreListDiv col-lg-6">
                <span class="SqoreListHeader mt-4 mb-3">საუკეთესო ათეული</span>
                <table class="table table-info table-hover">
                    <thead>
                    <tr>
                        <th>სახელი</th>
                        <th>ქულა</th>
                        <th>თარიღი</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    while ($row = $result->fetch_object()): ?>
                        <tr>
                            <td><?php echo $row->name; ?></td>
                            <td><?php echo $row->score; ?></td>
                            <td><?php echo $row->date; ?></td>
                        </tr>
                    <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="footerDiv mt-2">
            <span class="">v.0.6.0 Beta</span>
            <span class="">created by Davitius</span>
        </div>
    </div>
</div>


<div class="game container" id="game" style="min-height: 100vh" hidden>

    <div class="menuBtnDiv">
        <button class="menuBtn" id="menuBtn"
                onclick="goToMenu()">
            მენიუ
        </button>
    </div>
    <div class="massageAreaDiv col-md-12">
        <span class="massageAreaSpan" id="massageAreaSpan">დავიწყოთ თამაში</span>
    </div>

    <div class="quest">
        <div class="quest_text">
            <span class="" id="">შეკითხვა №<?php echo $questionRow->id; ?></span>
        </div>
        <div class="quest_text">
            <span class="">
        <?php echo $questionRow->question; ?>
    </span>
        </div>
    </div>

    <div class="quest_word">
        <?php
        $questWord = explode('.', $questionRow->answer);
        $len = count($questWord);
        for ($w = 0; $w < count($questWord); $w++) {
            $ww = $w + 1;
            $questLetterId = 'questLetterId' . $ww;
            $questLetterDivId = 'questLetterDivId' . $ww;
            ?>
            <script>var len = <?php echo $len; ?>;</script>
            <div class="quest_letter_div" id="<?php echo $questLetterDivId ?>">
                <span class="" id="<?php echo $questLetterId ?>"> <?php echo $questWord[$w] ?> </span>
                <div class="shield"></div>
            </div>
        <?php } ?>
    </div>

    <div class="abcDiv col-md-12" id="abcDiv">
        <div class="abcShield" id="abcShield" hidden></div>
        <?php
        //ანბანის ასოების გამოტანა.
        $abc = ['!', 'ა', 'ბ', 'გ', 'დ', 'ე', 'ვ', 'ზ', 'თ', 'ი',
            'კ', 'ლ', 'მ', 'ნ', 'ო', 'პ', 'ჟ', 'რ', 'ს', 'ტ', 'უ',
            'ფ', 'ქ', 'ღ', 'ყ', 'შ', 'ჩ', 'ც', 'ძ', 'წ', 'ჭ', 'ხ', 'ჯ', 'ჰ'];
        for ($i = 1; $i <= 33; $i++) {
            $letterDivId = 'letterDivId' . $i;
            $letterId = 'letterId' . $i;
            ?>
            <div class="abc_letter_div" id="<?php echo $letterDivId ?>">
                <span class="letter" id="<?php echo $letterId ?>"> <?php echo $abc[$i]; ?> </span>
            </div>
        <?php } ?>
    </div>


    <div class="gamePad_Div row">
        <div class="action_circle_div col-md-8">
            <div class="arrow_Div" id="arrowDiv">
                <img class="arrow" id="arrow" src="assets/images/arrow.png">
            </div>
            <img class="action_circle" id="action_circle" src="assets/images/action-circle.png">
            <span class="winnerText" id="winnerText" hidden></span>
            <span class="winnerText" id="winnerScore" hidden></span>
            <br>
            <form method="post" action="assets/php/addscore.php" id="scoreAddForm" hidden>
                <input type="text" id="addNameInput" name="addNameInput" hidden>
                <input type="text" id="addScoreInput" name="addScoreInput" hidden>
                <button class="btn btn-success" type="submit" id="scoreAddBtn">რეზულტატის დამახსოვრება</button>
            </form>
            <img class="action_circle" id="winnerImg" src="assets/images/winner.gif" hidden>
        </div>

        <div class="players col-md-4">
            <span class="queue1" id="queue" style="color: navajowhite" hidden>1</span>
            <span class="" id="successCheck" style="color: navajowhite" hidden>0</span>

            <div class="userCardDiv row" id="userCardStyle1">
                <div class="playerImgDiv col-4">
                    <img class="playerImg" id="playerImg" src="assets/images/user.png">
                </div>
                <div class="scoreDiv col-8">
                    <span class="scoreText" id="player1"></span>
                    <span class="scoreText" id="player1Score">0</span>
                </div>
            </div>

            <div class="userCardDiv row" id="userCardStyle2">
                <div class="playerImgDiv col-4">
                    <img class="playerImg" id="playerImg" src="assets/images/user.png">
                </div>
                <div class="scoreDiv col-8">
                    <span class="scoreText" id="player2"></span>
                    <span class="scoreText" id="player2Score">0</span>
                </div>
            </div>

            <div class="userCardDiv row" id="userCardStyle3" hidden>
                <div class="playerImgDiv col-4">
                    <img class="playerImg" id="playerImg" src="assets/images/user.png">
                </div>
                <div class="scoreDiv col-8">
                    <span class="scoreText" id="player3"></span>
                    <span class="scoreText" id="player3Score">0</span>
                </div>
            </div>

            <div class="userCardDiv row" id="userCardStyle4" hidden>
                <div class="playerImgDiv col-4">
                    <img class="playerImg" id="playerImg" src="assets/images/user.png">
                </div>
                <div class="scoreDiv col-8">
                    <span class="scoreText" id="player4"></span>
                    <span class="scoreText" id="player4Score">0</span>
                </div>
            </div>

        </div>
    </div>

</div>

<script src="assets/js/Mymain.js"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>
</html>