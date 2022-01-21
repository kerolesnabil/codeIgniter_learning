

<table>

    <tr>
        <td>Mail</td>
        <td>User Name</td>
        <td>Country</td>

    </tr>
    <?php  foreach ($users as $user){  ?>
        <tr>

            <td> <?=$user->mail?> </td>
            <td> <?=$user->user_name?> </td>
            <td> <?=$user->country?> </td>

        </tr>


    <?php } ?>
</table>


