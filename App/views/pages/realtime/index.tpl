<h2>リアルタイムweb</h2>
<input type="text" id="text" value="★Hello★"></input>
<button onClick="mysock.send(escape($('#text').val()))">Send</button>
<button onClick="mysock.star()">★</button>
<div id="msg"></div>