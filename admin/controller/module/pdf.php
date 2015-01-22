<?php
class ControllerModulePdf extends Controller
{
	private $error = array();
	
	public function index()
	{
		$data = array();
		
		$this->assignDefaultData($data);
		
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->load->model('setting/setting');
			
			$this->model_setting_setting->editSetting('pdf', $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$this->response->redirect($this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL'));
		}
		
		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}
		
		if (isset($this->request->post['pdf_header'])) {
			$data['pdf_header'] = $this->request->post['pdf_header'];
		} else {
			$data['pdf_header'] = $this->config->get('pdf_header');
		}
		
		if (isset($this->request->post['pdf_footer'])) {
			$data['pdf_footer'] = $this->request->post['pdf_footer'];
		} else {
			$data['pdf_footer'] = $this->config->get('pdf_footer');
		}

		$this->response->setOutput($this->load->view('module/pdf.tpl', $data));
	}
	
	public function test()
	{
		$title = "Opencart PDF Generate Manual";
		$content = "1.\$this->load->model('tool/pdf');\n2.\$this->model_tool_pdf->create(\$title, \$content);\n\nAuthor: Joker Huang\nAuthor Blog: http://ybo.me/";
		
		$this->load->model('tool/pdf');
		$this->model_tool_pdf->create($title, $content);
	}
	
	protected function validate() {
		if (!$this->user->hasPermission('modify', 'module/pdf')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		return !$this->error;
	}
	
	protected function assignDefaultData(&$data)
	{
		$this->load->language('module/pdf');

		$this->document->setTitle($this->language->get('heading_title'));

		$data['heading_title']	= $this->language->get('heading_title');
		$data['text_manual']	= $this->language->get('text_manual');
		$data['text_setting']	= $this->language->get('text_setting');
		$data['text_example']	= $this->language->get('text_example');
		$data['text_step_1']	= $this->language->get('text_step_1');
		$data['text_step_2']	= $this->language->get('text_step_2');
		
		$data['entry_header']	= $this->language->get('entry_header');
		$data['entry_footer']	= $this->language->get('entry_footer');
		
		$download_test_link		= $this->url->link('module/pdf/test', 'token=' . $this->session->data['token'], 'SSL');
		$data['download_link']	= sprintf($this->language->get('text_test_link'), $download_test_link);
		
		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], 'SSL')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_module'),
			'href' => $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL')
		);
		
		$data['action'] = $this->url->link('module/pdf', 'token=' . $this->session->data['token'], 'SSL');
		$data['cancel'] = $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL');
		$data['button_cancel'] = $this->language->get('button_cancel');
		$data['button_save'] = $this->language->get('button_save');
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
	}
}