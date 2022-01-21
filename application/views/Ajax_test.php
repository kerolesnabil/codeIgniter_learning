



<script src="<?=base_url("/")?>public/jquery-3.6.0.min.js" type="text/javascript" ></script>
<script   type="text/javascript" >

    var base_url = '<?=base_url("/")?>'  ;

    $(document).ready(function () {
        $('#get_btn').click(function () {


            $.ajax({
                url: base_url + 'welcome/info_Ajax_test',
                data: {
                    name: 'keroles', age: 23, country: 'mina'

                },
                type: 'post',
                success: function (data) {
                    alert(data);
                }
            });


            // $.post(base_url+'welcome/info_Ajax_test',{name:'keroles', age : 23 , country:'mina'},function (data) {
            //     alert(data)
            // })
        });
    });

</script>

<button id="get_btn" type="submit" > Get Data !! </button>
