<?php
$user = $this->requestAction('users/loggeduser/');
$employee = $this->requestAction('employees/getemployee/' . $user['User']['employeeno']);



?>



<center>
<table style="width: 70%; position: center;">
    <tr><td colspan="2"><?php echo '<h3>Welcome ' . $user['User']['firstname'] . '!</h3>'; ?> </td></tr>
    <tr>
        <td style="width: 50%;">
            <div style="border: 1px solid black; width: 300px; ">
            <br/><br/>
            <?php
            
                $file_location = APP.'webroot/img/employees/'.DS . $employee['Employee']['picture'];
                if(file_exists($file_location) && $employee['Employee']['picture'] != NULL){
                    echo $this->Html->image("employees/" . $employee['Employee']['picture'], array('width' => '100%'));
                    echo '<center><br/>' . $this->Html->link('Change Image', array('controller' => 'employees', 'action' => 'edit', $employee['Employee']['id'], 2, $employee['Employee']['employeeno'])) . '</center>';
                }else{
                    echo $this->Html->image('default.png', array('width' => '100%'));
                    echo '<center><br/>' . $this->Html->link('Change Image', array('controller' => 'employees', 'action' => 'edit', $employee['Employee']['id'], 2, $employee['Employee']['employeeno'])) . '</center>';
                }
            
            ?>
            <br/><br/>
            </div> 
        </td>
        <td style="width: 50%;">
            
        <td>
    </tr>
    <tr> <td colspan="2"><br/><br/></td></tr>
    <tr>
        <td colspan="2">
            <table style="width: 100%;">
                <tr>
                    <td style="width: 20%;"><button class="timein">Shift In</button></td>
                    <td style="width: 20%;">
                            <button class="breakin">Break In</button><br/>
                            <button class="breakout">Break Out</button>
                    </td>
                    <td style="width: 20%;">
                            <button class="breakin">Lunch In</button><br/>
                            <button class="breakout">Lunch Out</button>
                    </td>
                    <td style="width: 20%;">
                            <button class="breakin">Break In</button><br/>
                            <button class="breakout">Break Out</button>
                    </td>
                    <td style="width: 20%;"><button class="timeout">Shift Out</button></td>
                </tr>

            </table>            
        </td>
    </tr>

</table>