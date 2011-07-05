<h1>Pageリソース</h1>
<h2>pageをリソースとして扱う事ができます</h2>
<h3>ページにsetされたリソース(ro)をページリソースとする場合</h3>
<p>options: array('output' => 'resource')</p>
{$page|@printa}
<h3>出力HTML(string)をページリソースとする場合</h3>
<p>options: array('output' => 'html')</p>
<h4>headers</h4>
{$headers|@printa}
<h4>body</h4>
{$body|@printa}
<h3>UAをDocomoにして出力HTML(string)をページリソースとする場合</h3>
<p>options: array('output' => 'html', 'ua' => 'Docomo')</p>
<h4>headers</h4>
{$docomo_headers|@printa}
<h4>body</h4>
{$docomo_body|@printa}
