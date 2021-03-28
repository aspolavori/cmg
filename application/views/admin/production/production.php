    <div class="container top">
      
      <ul class="breadcrumb">
        <li>
          <a href="<?php echo site_url("admin"); ?>">
            <?php echo ucfirst($this->uri->segment(1));?>
          </a> 
          <span class="divider">/</span>
        </li>
        <li>
          <a href="<?php echo site_url("admin").'/'.$this->uri->segment(2); ?>">
            <?php echo ucfirst($this->uri->segment(2));?>
          </a> 
          <span class="divider">/</span>
        </li>
        <li class="active">
          <a href="#">New</a>
        </li>
      </ul>
      
      <div class="page-header">
        <h2>
          Adding <?php echo ucfirst($this->uri->segment(2));?>
        </h2>
      </div>
 
      <?php
      //flash messages
      if(isset($flash_message)){
        if($flash_message == TRUE)
        {
          echo '<div class="alert alert-success">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>Well done!</strong> new boia created with success.';
          echo '</div>';       
        }else{
          echo '<div class="alert alert-error">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>Oh snap!</strong> change a few things up and try submitting again.';
          echo '</div>';          
        }
      }
      ?>
      
      <?php
      //form data
      $attributes = array('class' => 'form-horizontal', 'id' => '');
      $options_equipamento = array('' => "Select");
      foreach ($equipamentos as $row)
      {
        $options_equipamento[$row['id']] = $row['titulo'];
      }

      //form validation
      echo validation_errors();
      
      echo form_open('admin/boias/add', $attributes);
      ?>
        <fieldset>
          <div class="control-group">
            <label for="inputError" class="control-label">Titulo</label>
            <div class="controls">
              <input type="text" id="" name="titulo" value="<?php echo set_value('titulo'); ?>" >
              <!--<span class="help-inline">Woohoo!</span>-->
            </div>
          </div>
          <div class="control-group">
            <label for="inputError" class="control-label">Descrição</label>
            <div class="controls">
              <input type="text" id="" name="descricao" value="<?php echo set_value('descricao'); ?>">
              <!--<span class="help-inline">Cost Price</span>-->
            </div>
          </div> 
          <?php
          /*
          echo '<div class="control-group">';
            echo '<label for="equipamentoId" class="control-label">Equipamento</label>';
            echo '<div class="controls">';
              //echo form_dropdown('equipamentoId', $options_equipamento, '', 'class="span2"');
              
              echo form_dropdown('equipamentoId', $options_equipamento, set_value('equipamentoId'), 'class="span2"');

            echo '</div>';
          echo '</div">';
          */
          ?>
          <div class="form-actions">
            <button class="btn btn-primary" type="submit">Save changes</button>
            <button class="btn" type="reset">Cancel</button>
          </div>
        </fieldset>

      <?php echo form_close(); ?>

    </div>
     