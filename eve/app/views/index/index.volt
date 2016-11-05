<!DOCTYPE html>
<html>
  <head>
  {{ assets.outputCss() }}
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  </head>
  <body>
  {% block js %}

  <script type="text/javascript">
  
// This is how to pass variable from php controller to js
  var page_data = {
    greeting: {{ greeting | json_encode  }}
  };
  </script>
  {% endblock %}

  {{ assets.outputJs() }}
  <div class="row">
    <div id="container" class="small-11 small-centered columns realFx">
      <!--<div class="message positionDown">{{greeting.text}}</div>-->
    </div>
  </div>

  <div class="row">
    <div class="small-11 small-centered columns" >  
      <input id="userInput" class="positionDown realFx" type="text" placeholder="Let's talk" autofocus > 
    </div> 
  </div>


  </body>
</html>