
<html>
    <head>

    </head>
    <body>
        <?=$result ?>
        <form method="post" >


            <input type="text" name="first_name" value="<?=set_value('first_name') ?>" >



            <input type="text" name="last_name" value="<?=set_value('last_name') ?>" >

            total time      : <?=$this->benchmark->elapsed_time()?>
            total memory    : <?=$this->benchmark->memory_usage()?>

            <input type="submit" name="submit" value="submit" >

            total time :{elapsed_time}
            memory usage : {memory_usage}

        </form>
    </body>


</html>


