$(document).ready(function () {

  // Array containing all messages

  var messages = {
    eve: [],
    user: [],
    all: []
  };
  console.log(messages)
  setTimeout(function () {
    initialize();
  }, 201);

  function initialize() {
    addSentence(page_data.greeting.text, true);
    input();
  }

  function addSentence(sentence, eve) {
    if (eve) {
      messages["eve"].push(sentence);
      sayIt(sentence);
    } else {
      messages["user"].push(sentence);
    }
    messages["all"].push(sentence);
    var div = $("<div>", {
      "class": "message"
    });
    div.html(sentence);
    $("#container").append(div);


  }

  function sayIt(sentence) {
    responsiveVoice.speak(sentence);
  }

  function input() {

    $("#userInput").on('keyup', function (e) {
      if (e.keyCode == 13) {
        var userSentence = $(this).val();
        $(this).val("");
        addSentence(userSentence, false);
        
        
        // TESTING AJAX ALFONSO
        $.ajax({
          url: './index/request',
          method: 'GET'
        }).
          done(function (data) {
            console.log(data)
          }).
          fail(function (data) {
            console.log(data)
          });
        // END AJAX CALL
      }
    });
  }

});