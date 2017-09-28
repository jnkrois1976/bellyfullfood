<?php $this->load->view('admin_templates/header_view', $data); ?>

<?php $this->load->view($data['main_content'], $data); ?>

<?php $this->load->view('admin_templates/footer_view'); ?>
