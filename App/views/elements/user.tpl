<div id="user_resource">
    <h3>ユーザー</h3>
    <ul>
        <li>{$body.name}</li>
        <li>{$body.age}</li>
        <li>ID={$body.id}</li>
    </ul>
    <div id="time">現在時刻: {$smarty.now|date_format:'%Y/%m/%d %H:%M:%S'}</div>
</div>
