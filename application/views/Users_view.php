


<table border="1px">
    <tr>
        <th>name</th>
        <th>country</th>
        <th>mail</th>

    </tr>


        <?php foreach ($users as $user){

           echo'<tr>' ;
                 echo '<td>' .$user->user_name . '</td>';
                 echo'<td>'  .$user->country . '</td>';
                 echo '<td>'  .$user->mail . '</td>';

            echo '</tr>';

        }

         ?>

</table>

