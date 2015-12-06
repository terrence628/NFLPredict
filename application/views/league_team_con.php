<form action="/League_team/Order" method="POST">
Layout: <input type="radio" name="layout" value="League" checked>League</button>
<input type="radio" name="layout" value="Conference">Conference</button>
<input type="radio" name="layout" value="Division">Division</button><br>
Layout Choice: {layout}<br>
Order By:<input type="radio" name="order" value="City" checked>City</button>
<input type="radio" name="order" value="Team">Team</button>
<input type="radio" name="order" value="Standing">Standing</button><br>
Order Choice: {order}<br>
calculation?<input type="radio" name="points" value="Net Point" checked>Net Point</button>
<input type="radio" name="points" value="Points For">Points For</button>
<input type="radio" name="points" value="Points Against">Points Against</button><br>
Points Summary:{points}<br>
<button type="Submit" name="submit">Go</button><br>
<h1>Conference - AFC</h1>
{thetable_afc}
<h1>Conference - NFC</h1>
{thetable_nfc}


</form>

