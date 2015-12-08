<h2>2015 NFL Prediction Web-App</h2>

<p>Welcome to our NFL game prediction application. This webapp is developed by students from BCIT in the COMP4711 course.</p>
<p>The National Football League (NFL) is a professional American football league consisting of 32 teams, divided equally between the National Football Conference (NFC) and the American Football Conference (AFC). The NFL is one of the four major professional sports leagues in North America, and the highest professional level of American football in the world.[4] The NFL's 17-week regular season runs from the week after Labor Day to the week after Christmas, with each team playing sixteen games and having one bye week.</p>
<p>The team with the most NFL championships is the Green Bay Packers with thirteen; the team with the most Super Bowl championships is the Pittsburgh Steelers with six. The current NFL champions are the New England Patriots, who defeated the Seattle Seahawks 28–24 in Super Bowl XLIX.</p>

  <title> Ajax Exmaples! </title>
  <!--Load JQUERY from Google's network -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
  <script> 
    // using JQUERY's ready method to know when all dom elements are rendered
    $( document ).ready(function () {
      // set an on click on the button
      $("#button").click(function () {
        // get the team code if clicked via an ajax get queury
        // see the code in the controller welcome/testing
        $abc = $('#team_list').val();
        $.post("/Welcome/testing",{ code: $abc }).done(function (team) {
          // update the textarea with the time
          $("#text").html("The Team code selected is:" + team +"<br>");
          $("#text").append("add the predictions here :)");
        });
      });
    });
  </script>


  <select id="team_list" name="team_list">
{dropdown}
    </select>
  <button id="button" >
    Select an opponent team
  </button>  

    
  <h1> Get Data from Controller over Ajax </h1>
  <div id="text" readonly>
  </div>
