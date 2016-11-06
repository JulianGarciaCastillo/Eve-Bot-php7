$(document).ready(function () {

  // Array containing all messages
  var messages = {
    eve: [],
    user: [],
    all: []
  };
  var eve_answers = _shuffle(page_data.eve_answers);

  setTimeout(function () {
    initialize();
  }, 201);


  // Load  required functions
  function initialize() {
    greetings();
    input();
  }

  // Eve's' greetings
  function greetings() {
    for (let i = 0; i < eve_answers.length; i++) {
      if (eve_answers[i].type == "greetings") {
        addSentence(eve_answers[i].text, true);
        break;
      }

    }
  }

  // Input field to send message
  function input() {

    $("#userInput").on('keyup', function (e) {
      if (e.keyCode == 13) {
        var userSentence = $(this).val();
        $(this).val("");
        addSentence(userSentence, false);
      }
    });
  }

  /* 
  Append sentence to array and render
  @sentence: String, @eve: Boolean
  */
  function addSentence(sentence, eve) {
    let who;

    if (eve) {
      who = "eve"
      sayIt(sentence);
    } else {
      who = "user";
    }
    messages[who].push(sentence);

    messages["all"].push(sentence);
    var div = $("<div>", {
      "class": "message " + who
    });
    div.html(sentence);
    $("#container").append(div);
    div.addClass("fade");



  }

  /*
  Speak Sentences
  @sentence: String
  */
  function sayIt(sentence) {
    responsiveVoice.speak(sentence);
  }


  //////// TOOLS

  /* 
  Shuffle array
  @array: Array
  */
  function _shuffle(array) {
    var currentIndex = array.length,
      temporaryValue, randomIndex;

    // While there remain elements to shuffle...
    while (0 !== currentIndex) {

      // Pick a remaining element...
      randomIndex = Math.floor(Math.random() * currentIndex);
      currentIndex -= 1;

      // And swap it with the current element.
      temporaryValue = array[currentIndex];
      array[currentIndex] = array[randomIndex];
      array[randomIndex] = temporaryValue;
    }

    return array;
  }

});