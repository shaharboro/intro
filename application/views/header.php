<?php  echo doctype('html5');  ?>
<html>
    <head>
        <link rel='stylesheet' href="<?php  echo base_url('styles/style.css'); ?>"   type="text/css">
        <script src="http://images.mensaprep.com/images/jquery-1.5.1.min.js" type="text/javascript"></script>

    </head>
    <body>
        <table>
            <tr>
                <td style="width: 15%;"><table><tr><td><div id="mainHeader"><br><br>SHAHAR CMS on git!</div></td></tr></table></td>
                <td style="width: 70%;">
                    <table id='x' style="height: 60px;padding:0px;margin: 0;border-color: #EEEE;"><tr><td style="background-color: #888"><header id="nav">
                        <ul>
                            <li><a href="<?php   echo base_url('site/index');  ?>">Home</a></li>
                            <li><a href="<?php   echo base_url('site/archives');  ?>">Archives</a></li>
                            <li><a href="<?php   echo base_url('site/post');  ?>">Post</a></li>
                            <li><a href='#'>Contact</a></li>
                            <li><a href="<?php   echo base_url('login/index');  ?>">Login</a></li>
                            <li><a href="<?php   echo base_url('register/index');  ?>">Register</a></li>
                        </ul>
                    </header></td>
                    <td style="background-color: #EEE; vertical-align: top;">
                        <?php $attr = array('style'=> 'text-decoration:underline;color:blue'); 
                    if($this->session->userdata('uId') && $this->session->userdata('uName')) {
                        echo "hello ".$this->session->userdata('uName').'  '.anchor('login/logoutuser','logout',$attr);
                    }
                    else{
                        echo anchor('login/index','login',$attr);
                    }
                ?>
                    </td></tr></table>
                    
                </td>
                
            </tr>
        </table>
        
        