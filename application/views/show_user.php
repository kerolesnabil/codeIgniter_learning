


<table border="1px">
    <tr>
        <th>name</th>
        <th>country</th>
        <th>mail</th>

    </tr>


    <?php foreach ($user as $row){

        echo'<tr>' ;

            echo '<td>' .$row->user_name . '</td>';
            echo'<td>'  .$row->country . '</td>';
            echo '<td>'  .$row->mail . '</td>';

        echo '</tr>';

    }

    ?>

</table>