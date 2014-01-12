
        <script type="text/javascript">
        
        $(document).ready(function () {
            
            populatePageIds();
        });
        
        function populatePageIds() {

            $.ajax({
                type: "POST",
                url: "<?php  echo base_url('GeneralUtil/PopulatePageIds'); ?>",
                dataType: "json",
                success: function (result) {
                    debugger;
                var arr = result.PageIds.split(',');
                $.each(arr, function (val, text) {
                     $('[name="pageIds"]').append($('<option></option>').val(val+1).html(text));
                });
                },
            });
        }
        </script>
        
<?php echo form_open('site/archives'); 
echo heading('ARCHIVES');
?>
<div ud="mainSelect">
    <fieldset style="border:2px solid;">
            <legend style="text-decoration:underline;">Main</legend>
            <?php

            echo "select page:". form_dropdown('pageIds');
            echo form_submit('mysubmit', 'VIEW PAGE!');
            ?>
    </fieldset>
    </div>
</form>
