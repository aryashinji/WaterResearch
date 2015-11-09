public function cek($sandi)
		{
			$this->load->library('form_validation');
			$nama_pengguna = $this->input->post('nama_pengguna');
			$result = $this->login_model->login($nama_pengguna,$sandi);
			
			if($result)
			{
				$sess_array = array();
				foreach($result as $row)
				{
					$sess_array = array(
										'nama_pengguna'=>$row->nama_pengguna
										);
					$this->session->set_userdata('logged_in',$sess_array);
				}
				return TRUE;
			}
			else
			{
				$this->form_validation->set_message('cek','nama_pengguna dan sandi yang dimasukkan tidak cocok');
				return FALSE;
			}
		}