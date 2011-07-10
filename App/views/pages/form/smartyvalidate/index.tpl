<form method="post" action="smartyvalidate.php">
    <div style='color:red'>
    {validate id="fullname" message="Full Name Cannot Be Empty<br /> "}
    {validate id="phone" message="Phone Number Must be a Number<br /> "}
    {validate id="expdate" message="Exp Date not valid<br />"}
    {validate id="email" message="Email not valid<br />"}
    {validate id="date" message="Date not valid<br />"}
    {validate id="password" message="passwords do not match<br />"}
    </div>
    Full Name: <input type="text" name="FullName" value="{$FullName|escape}"><br />
    Phone :<input type="text" name="Phone" value="{$Phone|escape}" empty="yes"><br />
    Exp Date: <input type="text" name="CCExpDate" size="8" value="{$CCExpDate|escape}"><br />
    Email: <input type="text" name="Email" size="30" value="{$Email|escape}"><br />
    Date: <input type="text" name="Date" size="10" value="{$Date|escape}"><br />
    password: <input type="password" name="password" size="10" value="{$password|escape}"><br />
    password2: <input type="password" name="password2" size="10" value="{$password2|escape}"><br />
    <input type="submit">
</form>