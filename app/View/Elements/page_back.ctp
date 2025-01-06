<?php 
    echo $this->Html->link('<i class="fa fa-chevron-left fa-sm"></i> Go Back', 
        ['controller' => $controller, 'action' => $action],
        ['escape' => false, 'class' => 'text-danger nounderline bold']
    );   

?>