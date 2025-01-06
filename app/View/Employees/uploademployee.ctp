<?php echo $this->element('page_back', ['controller' => 'employees', 'action' => 'index']); ?>
<?php echo $this->element('page_title', ['title' => 'Upload Employee']); ?>
<hr />
<?php echo $this->Form->create('Employee', ['type' => 'file']); ?>

<div class="row">
    <div class="col-md-4">
            <label for="file">Select CSV File</label>
            <?php echo $this->Form->file('file', ['class' => 'form-control']); ?>
            <br />
            <button type="submit" class="btn btn-success">Continue</button>
           <?php echo $this->Form->end(); ?>
    </div>
    <div class="col-md-8">

    <?php echo $this->Flash->render(); ?>
    </div>
</div>