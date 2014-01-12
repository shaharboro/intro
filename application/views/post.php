<div id="divPost">
    <?php echo validation_errors(); ?>
    <?php echo form_open('site/Post'); ?>
    <h2>Post data:</h2>
    <table>
        <tr>
            <td style="vertical-align: top;">

                <label for="add_fields_type">Title:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <?php 

                $data = array(
                             'name'        => 'txtTitle',
                             'id'          => 'txtTitle',
                             'value'       => set_value('txtTitle'),
                             'maxlength'   => '100',
                             'size'        => '50'
                           );

               echo  form_input($data);
                ?>
            </td>
        </tr>
         <tr>
             <td style="vertical-align: top;">
                 <span style="vertical-align: top;">Content:</span>
                    <?php 

                    $data = array(
                                 'name'        => 'txtContent',
                                 'id'          => 'txtContent',
                                 'value'       => set_value('txtContent'),
                                 'rows'        => '20',
                                 'cols'        => '100'
                               );

                   echo  form_textarea($data);
                    ?>
             </td>
         </tr>
    </table>
    
    <?php echo form_submit('mysubmit', 'Submit Post!');  echo form_close(); ?>
</div>

