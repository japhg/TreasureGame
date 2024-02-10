var boo_audio = new Audio("sounds/boo.mp3");
var applause_audio = new Audio("sounds/applause.mp3");
var blop_audio = new Audio("sounds/wrong.mp3"); // Audio for selecting the wrong words
var right_audio = new Audio("sounds/correct.mp3"); // Audio for selecting the right words

var winOrLose = false;


$(".letter").click(function () {
    $.ajax({
        data: { letter: $(this).text(), action: 2 },
        type: "POST",
        dataType: "json",
        url: "controller.php",
        context: this,
        success: function (data) {
            if (!winOrLose) {
                $("#hangman").attr("src", data.image);
                $("#lives-left").text(data.lives);
                $("#guessed-word-div").html(data.guessedWord);
                $(this).addClass("display-none");

				var selectedLetter = data.letter.toLowerCase();
				var correctWord = data.word.toLowerCase();
				
                if (correctWord.includes(selectedLetter)) {
                    right_audio.play();
                } else {
                    blop_audio.play();
                }
                if (data.win === false) {
                    winOrLose = true;
                    $("#lives-left").text(data.lives);
                    $("#hangman").attr("src", data.image);
                    $("#the-word-was-div").html(data.word);
                    $("#the-word-was-div").removeClass("display-none");
                    $("#play-again-div").removeClass("display-none");
                    boo_audio.play();
                } else if (data.win === true) {
                    winOrLose = true;
                    $("#guessed-word-div").html(data.guessedWord);
                    $("#play-again-div").removeClass("display-none");
                    applause_audio.play();
                }
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            // Handle error
        }
    });
});
