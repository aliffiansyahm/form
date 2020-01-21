<?php echo form_open('admin/edit/'.$admin['ID_ADMIN']); ?>

	<div>
		<span class="text-danger">*</span>Place :
		<select name="ID_PLACE">
			<option value="">select place</option>
			<?php
			foreach($all_place as $place)
			{
				$selected = ($place['ID_PLACE'] == $admin['ID_PLACE']) ? ' selected="selected"' : "";

				echo '<option value="'.$place['ID_PLACE'].'" '.$selected.'>'.$place['NAMA'].'</option>';
			}
			?>
		</select>
		<span class="text-danger"><?php echo form_error('ID_PLACE');?></span>
	</div>
	<div>
		<span class="text-danger">*</span>NAMA :
		<input type="text" name="NAMA" value="<?php echo ($this->input->post('NAMA') ? $this->input->post('NAMA') : $admin['NAMA']); ?>" />
		<span class="text-danger"><?php echo form_error('NAMA');?></span>
	</div>
	<div>
		<span class="text-danger">*</span>EMAIL :
		<input type="text" name="EMAIL" value="<?php echo ($this->input->post('EMAIL') ? $this->input->post('EMAIL') : $admin['EMAIL']); ?>" />
		<span class="text-danger"><?php echo form_error('EMAIL');?></span>
	</div>
	<div>
		<span class="text-danger">*</span>PASSWORD :
		<input type="text" name="PASSWORD" value="<?php echo ($this->input->post('PASSWORD') ? $this->input->post('PASSWORD') : $admin['PASSWORD']); ?>" />
		<span class="text-danger"><?php echo form_error('PASSWORD');?></span>
	</div>

	<button type="submit">Save</button>

<?php echo form_close(); ?>
