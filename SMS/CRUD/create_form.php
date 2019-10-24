<!--
	-we have our html form here where user information will be entered
	-we used the 'required' html5 property to prevent empty fields
-->
<form id='addUserForm' action='#' method='post' border='0'>
    <table>
        <tr>
            <td>Title</td>
            <td><input type='text' name='title' required maxlength="100" /></td>
        </tr>
        <tr>
            <td>Message</td>
            <td><textarea name='message' required maxlength="160" style="width: 240px; height: 80px;" ></textarea> </td>
        </tr>
<!--        <tr>
            <td>Username</td>
            <td><input type='text' name='username' required /></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type='password' name='password' required /></td> -->
        <tr>
            <td></td>
            <td>                
                <input type='submit' value='Save' class='customBtn' />
            </td>
        </tr>
    </table>
</form>