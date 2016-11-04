$(document).ready(function () {

  // Array containing all messages
  var messages = [];
  var voice;

  
  setTimeout(function(){ initialize(); }, 201);

  function initialize() {
    addSentence(page_data.greeting.text);
    input();
  }

  function addSentence(sentence) {

    messages.push(sentence);
    var div = $("<div>", {
      "class": "message"
    });
    div.html(sentence);
    $("#container").append(div);

    sayIt(sentence);
  }

  function sayIt(sentence) {
     responsiveVoice.speak(sentence);
  }

  function input() {

    $("#userInput").on('keyup', function (e) {
      if (e.keyCode == 13) {
        var userSentence = $(this).val();
        $(this).val("");
        addSentence(userSentence);
        console.log(messages)
      }
    });
  }

});