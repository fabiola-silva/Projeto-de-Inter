<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Idosos extends CI_Controller
{

	function __construct()
	{

		parent::__construct();
		$this->load->helper("url");
		$this->load->helper("functions");
		$this->load->database();
		$this->load->model("consultas");
	}
	public function eventos_editar()
	{

		// print_r(count ($_POST));
		// die();

		$dados['evento'] = '';
		if (isset($_POST['editar']) == 'Editar') {

			try {

				$evento = strip_tags(trim($_POST['evento']));
				$res = !$this->consultas->getEvento($evento) ? null :  $this->consultas->getEvento($evento);
				$dados['evento'] = $res->row() ? $res->row() : null;
			} catch (Exception $e) {
				$dados['msgAlert'] = "Erro ao recuperar dados " . $e->getMessage();
			}

			$dados['acao'] = 'Atualizar';
			$this->load->view("evento", $dados);
		} else if (count($_POST) > 2) {



			$nome = strip_tags(trim($_POST['nome_evento']));
			$local = strip_tags(trim($_POST['local']));
			$contato = strip_tags(trim($_POST['contato']));
			$data = strip_tags(trim($_POST['data']));
			$horario = strip_tags(trim($_POST['horario']));
			$descricao = strip_tags(trim($_POST['descricao']));
			$id = trim($_POST['id']);
			if (
				empty($nome)
				&& empty($local)
				&& empty($contato)
				&& empty($data)
				&& empty($horario)
			) {
				$dados['msgAlert'] = "ERRO: Preencha todos os campos!";
			} else {

				try {
					$res = $this->consultas->atualizar_evento($nome, $local, $contato, $data, $horario, $descricao, $id);
					if ($res) {
						$dados['msgAlert'] = "Evento atulizado com sucesso";
						redirect(base_url(), 'location');
					}
				} catch (Exception $e) {

					$dados['msgAlert'] = "Erro ao salvar evento no banco de dados! " . $e->getMessage();
				}
			}

			$this->load->view("evento", $dados);
		} else {
			$dados['acao'] = 'Atualizar';
			$this->load->view("evento", $dados);
		}
	}
	public function eventos()
	{


		$dados['evento'] = '';
		if (isset($_POST['Cadastrar']) == 'Cadastrar') {


			$nome = strip_tags(trim($_POST['nome_evento']));
			$local = strip_tags(trim($_POST['local']));
			$contato = strip_tags(trim($_POST['contato']));
			$data = strip_tags(trim($_POST['data']));
			$horario = strip_tags(trim($_POST['horario']));
			$descricao = strip_tags(trim($_POST['descricao']));

			if (
				empty($nome)
				&& empty($local)
				&& empty($contato)
				&& empty($data)
				&& empty($horario)
			) {
				$dados['msgAlert'] = "ERRO: Preencha todos os campos!";
			} else {

				try {
					$res = $this->consultas->registrar_evento($nome, $local, $contato, $data, $horario, $descricao);

					if ($res) {
						$dados['msgAlert'] = "Evento cadastrado com sucesso";
					}
				} catch (Exception $e) {
					// 	//throw $th;
					$dados['msgAlert'] = "Erro ao salvar evento no banco de dados! " . $e->getMessage();
				}
			}
			$dados['acao'] = 'Cadastrar';
			$this->load->view("evento", $dados);
		} else {
			$dados['acao'] = 'Cadastrar';
			$this->load->view("evento", $dados);
		}
	}



	public function eventos_selecionado()
	{

		try {

			$dados['eventos'] = !$this->consultas->getEventos() ? null :  $this->consultas->getEventos();
		} catch (Exception $e) {
			$dados['msgAlert'] = "Erro ao recuperar dados " . $e->getMessage();
		}

		$this->load->view('evento_selecionado', $dados);
	}

	public function gerenciar_estoque()
	{
		$dados['estilo'] = "EstiloGerenciar.css";
		if (isset($_POST['material_estoque'])) {

			$material = strip_tags(trim($_POST['material']));
			$produto = $_POST['material'] == "Outros" ? strip_tags(trim($_POST['produto'])) : strip_tags(trim($_POST['material']));
			$quant = strip_tags(trim($_POST['quant']));
			$procedencia = strip_tags(trim($_POST['procedencia']));

			if (empty($quant)) {
				$dados['msgAlert'] = "ERRO: Preencha todos os campos!";
			} else {

				try {

					$res = $this->consultas->registrar_material($produto, $quant, $procedencia);
					if ($res) {
						$dados['msgAlert'] = "Cadastro realizado com sucesso";
					}
				} catch (Exception $e) {

					$dados['msgAlert'] = "Erro aos salvar dados no banco de dados! " . $e->getMessage();
				}
			}
		} else if (isset($_POST['dinheiro_estoque'])) {
			$doacao = strip_tags(trim($_POST['doacao']));
			$proced2 = strip_tags(trim($_POST['proced2']));
			if (empty($doacao)) {
				$dados['msgAlert'] = "ERRO: Preencha o campo de doação";
			} else {

				try {
					$res = $this->consultas->registrar_doacao($doacao, $proced2);
					if ($res) {
						$dados['msgAlert'] = "Cadastro realizado com sucesso";
					}
				} catch (Exception $e) {

					$dados['msgAlert'] = "Erro aos salvar dados no banco de dados! " . $e->getMessage();
				}
			}
		}


		$this->load->view('gerenciar_estoque', $dados);
	}


	//controle de cadastra idosos
	public function index()
	{

		// print_r($_POST);
		// die();
		
		if (isset($_POST['cadastro_idoso'])) {
			
			$nome = strip_tags(trim($_POST['nome']));
			$rg = strip_tags(trim($_POST['rg']));
			$cpf = strip_tags(trim($_POST['cpf']));
			$telefone1 = strip_tags(trim($_POST['telefone1']));
			$telefone2 = strip_tags(trim($_POST['telefone2']));
			$rua = strip_tags(trim($_POST['rua']));
			$numero = strip_tags(trim($_POST['numero']));
			$complemento = strip_tags(trim($_POST['complemento']));
			$sexo = strip_tags(trim($_POST['sexo']));
			$dependentes = strip_tags(trim($_POST['dep']));
			$qts_dep = empty(strip_tags(trim($_POST['quantos']))) ? 0 : strip_tags(trim($_POST['quantos']));

			if (
				empty($nome) &&
				empty($rg) &&
				empty($cpf) &&
				empty($telefone1) &&
				empty($rua) &&
				empty($numero)
				
			) {
				$dados['msgAlert'] = "ERRO: Preencha todos os campos!";
			} else {


				try {

					$res = $this->consultas->cadastrar_idoso($nome, $rg, $cpf, $telefone1, $telefone2, $rua, $numero, $complemento, $sexo, $dependentes, $qts_dep);
					
					if ($res) {
						$dados['msgAlert'] = "Cadastro realizado com sucesso";
					}
				} catch (Exception $e) {

					$dados['msgAlert'] = "Erro aos salvar dados no banco de dados! " . $e->getMessage();
				}
			}
			$this->load->view('home', $dados);
		} else {
			$this->load->view('home');
		}
	}
}
