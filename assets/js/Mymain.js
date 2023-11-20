let shieldRemoveSound = new Audio('assets/audio/shieldRemove.mp3');
let abcClickSound = new Audio('assets/audio/abcClick.wav');
let gameStartSound = new Audio('assets/audio/gameStart.wav');
let applauseSound = new Audio('assets/audio/applause.mp3');
let incorrect = new Audio('assets/audio/incorrect.mp3');
let winnerImg = document.getElementById('winnerImg');
let arrowDiv = document.getElementById('arrowDiv');
let abcDiv = document.getElementById('abcDiv');
let action_circle = document.getElementById('action_circle');
let massageAreaSpan = document.getElementById('massageAreaSpan');
let game = document.getElementById('game');
let start = document.getElementById('start');
let gameStartBtn = document.getElementById('gameStartBtn');
let newGameBtn = document.getElementById('newGameBtn');
let frame = document.getElementById('frame');
let player1Input = document.getElementById('player1Input');
let player2Input = document.getElementById('player2Input');
let player3Input = document.getElementById('player3Input');
let player4Input = document.getElementById('player4Input');
let player1 = document.getElementById('player1');
let player2 = document.getElementById('player2');
let player3 = document.getElementById('player3');
let player4 = document.getElementById('player4');
let player1Score = document.getElementById('player1Score');
let player2Score = document.getElementById('player2Score');
let player3Score = document.getElementById('player3Score');
let scoreAddForm = document.getElementById('scoreAddForm');
let addNameInput = document.getElementById('addNameInput');
let addScoreInput = document.getElementById('addScoreInput');
let winnerText = document.getElementById('winnerText');
let winnerScore = document.getElementById('winnerScore');


//გამოსაცნობი სიტყვის სელეცტორი.
for (let q = 1; q <= 10; q++) {
    let qlId = 'questLetterId' + q;
    let qLetterN = 'qLetterN' + q;
    qLetterN = document.getElementById(qlId);
}
//ანბანის ასოების არჩევა.
for (let l = 1; l <= 33; l++) {
    let letterDivId = 'letterDivId' + l;
    let letterDivN = 'letterN' + l;
    let letterId = 'letterId' + l;
    let letterN = 'letterN' + l;
    letterDivN = document.getElementById(letterDivId);
    letterN = document.getElementById(letterId);

    document.getElementById('userCardStyle1').style.border = '2px solid greenyellow';


    winnerImg.hidden = true;
    var openShields = 0;
    letterDivN.addEventListener('click', (e) => {
        document.getElementById('successCheck').innerHTML = 0;
        if (letterDivN.className === 'abc_letter_div') {
            massageAreaSpan.innerHTML = "";

            //ბორბლის ტრიალი.
            let randomWeel = Math.floor(Math.random() * 24) + 1;
            let randDeg = randomWeel * 15;
            let randWellDeg = randDeg + 'deg'
            let scores = ['null', 16, 1, 13, 20, 2, 10, 4, 11, 9, 21, 'Bankrot',
                22, 8, 19, 12, 6, 14, 7, 17, 5, 15, 3, 18, 0];
            let score = scores[randomWeel];
            document.getElementById('action_circle').style.transform = 'rotate(' + randWellDeg + ')';
            abcClickSound.play();
            document.getElementById('abcShield').hidden = false;
            letterDivN.className = 'abc_letter_div2';

            let queue = document.getElementById('queue').innerHTML;

            setTimeout(() => {
                for (let k = 1; k <= 33; k++) {
                    if (letterN.innerText === document.getElementById('questLetterDivId' + k).innerText) {
                        shieldRemoveSound.play();
                        document.getElementById('questLetterDivId' + k).className = 'quest_letter_div2';
                        document.getElementById('successCheck').innerHTML = 1;
                        openShields++
                        let addSqore = parseInt(document.getElementById('player' + queue + 'Score').innerHTML) + score;
                        if (score === "Bankrot"){
                            addSqore = document.getElementById('player' + queue + 'Score').innerHTML = 0;
                        }
                        document.getElementById('player' + queue + 'Score').innerHTML = addSqore;

                        let wordLenght = len;
                        if (openShields === wordLenght) {
                            arrowDiv.hidden = true;
                            abcDiv.hidden = true;
                            action_circle.hidden = true;
                            winnerImg.hidden = false;
                            scoreAddForm.hidden = false;

                            winnerText.innerHTML = 'გილოცავ გამარჯვებას ' + document.getElementById('player'+queue).innerText+'!';
                            winnerScore.innerHTML = 'თქვენ დააგროვეთ ' + document.getElementById('player'+queue+'Score').innerText+' ქულა.';
                            winnerText.hidden = false;
                            winnerScore.hidden = false;
                            applauseSound.play();

                            //ბაზაში შესატან ველებში მონაცემების ჩასმა.
                            let plnam = document.getElementById('queue').innerHTML;
                            addNameInput.value = document.getElementById('player'+plnam).innerHTML;
                            addScoreInput.value = document.getElementById('player'+plnam+'Score').innerText;
                        }
                    }

                    setTimeout(() => {
                        massageAreaSpan.innerHTML = "დატრიალეთ ბორბალი";
                        document.getElementById('abcShield').hidden = true;
                    }, 2500)


                    setTimeout(() => {
                        if (document.getElementById('successCheck').innerHTML == 0) {
                            incorrect.play();
                            if (score === "Bankrot"){
                                document.getElementById('player' + queue + 'Score').innerHTML = 0;
                            }
                        }
                    }, 300)
                }
            }, 2500)
        }

        if ((player3Input.hidden == false) && (player4Input.hidden == true)){
            var plNum = 3;
        }else if ((player3Input.hidden == false) && (player4Input.hidden == false)){
            var plNum = 4;
        }else{
            var plNum = 2;
        }




        setTimeout(() => {
            if (document.getElementById('successCheck').innerHTML == 0) {
                //რიგითობის გადასვლა.
                if (document.getElementById('queue').innerHTML == plNum) {
                    var uN = document.getElementById('queue').innerHTML = 1;
                } else {
                    uN = parseInt(document.getElementById('queue').innerHTML);
                    uN++;
                    document.getElementById('queue').innerHTML = uN;
                }
                let userCardN = 'userCardStyle' + uN;
                document.getElementById(userCardN).style.border = '3px solid greenyellow';
                if (uN == 1) {
                    document.getElementById('userCardStyle2').style.border = '2px solid royalblue';
                    document.getElementById('userCardStyle3').style.border = '2px solid royalblue';
                    document.getElementById('userCardStyle4').style.border = '2px solid royalblue';
                }
                if (uN == 2) {
                    document.getElementById('userCardStyle1').style.border = '2px solid royalblue';
                    document.getElementById('userCardStyle3').style.border = '2px solid royalblue';
                    document.getElementById('userCardStyle4').style.border = '2px solid royalblue';
                }
                if (uN == 3) {
                    document.getElementById('userCardStyle1').style.border = '2px solid royalblue';
                    document.getElementById('userCardStyle2').style.border = '2px solid royalblue';
                    document.getElementById('userCardStyle4').style.border = '2px solid royalblue';
                }
                if (uN == 4) {
                    document.getElementById('userCardStyle1').style.border = '2px solid royalblue';
                    document.getElementById('userCardStyle2').style.border = '2px solid royalblue';
                    document.getElementById('userCardStyle3').style.border = '2px solid royalblue';
                }
            }
        }, 3000)
    })
}

function addPlayer3() {
player3Input.hidden = false;
document.getElementById('userCardStyle3').hidden = false;
}
function addPlayer4() {
    if (player3Input.hidden == false){
        player4Input.hidden = false;
        document.getElementById('userCardStyle4').hidden = false;
    }else{
        blink(3);
    }
}
function removePlayer3() {
    if (player4Input.hidden == true){
        player3Input.hidden = true;
        document.getElementById('userCardStyle3').hidden = true;
    }else{
        blink(4);
    }
}
function removePlayer4() {
    player4Input.hidden = true;
    document.getElementById('userCardStyle4').hidden = true;
}


function gameStart() {
    gameStartSound.play();
    game.hidden = false;
    start.hidden = true;
    player1.innerHTML = player1Input.value.trim();
    player2.innerHTML = player2Input.value.trim();
    player3.innerHTML = player3Input.value.trim();
    player4.innerHTML = player4Input.value.trim();
}

function goToMenu() {
    game.hidden = true;
    start.hidden = false;
    newGameBtn.hidden = false;
    gameStartBtn.innerHTML = 'თამაშის გაგრძელება';
    frame.hidden = true;
}

function reload() {
    const reloadButton = document.getElementById('newGameBtn');
    reloadButton.addEventListener("click", () => {
        window.location.reload();
    })

}

function blink(T) {
    setTimeout( () => {
        document.getElementById('menuPlayersInputDiv'+T).style.border = '2px solid greenyellow';
    }, 200)
    setTimeout( () => {
        document.getElementById('menuPlayersInputDiv'+T).style.border = '2px solid royalblue';
    }, 400)
    setTimeout( () => {
        document.getElementById('menuPlayersInputDiv'+T).style.border = '2px solid greenyellow';
    }, 600)
    setTimeout( () => {
        document.getElementById('menuPlayersInputDiv'+T).style.border = '2px solid royalblue';
    }, 800)
    setTimeout( () => {
        document.getElementById('menuPlayersInputDiv'+T).style.border = '2px solid greenyellow';
    }, 1000)
    setTimeout( () => {
        document.getElementById('menuPlayersInputDiv'+T).style.border = '1px solid royalblue';
    }, 1200)
}