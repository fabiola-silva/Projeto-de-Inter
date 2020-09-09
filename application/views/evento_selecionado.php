
<?php

$this->load->view("cabecalho");
?>

<form id="form_cadastro2" name="cod" method="POST" action="/Idosos/eventos_editar">
	
         
    
	<fieldset> 
                <h1>Editar Evento</h1>
                <label for="nome"> Selecione o evento: </label> <br> 
				
				<select name="evento">
				<?php
					 if($eventos){
						  foreach($eventos->result() as $key){
							echo "<option value=\"{$key->id}\">{$key->nome_evento}</option>";
						}	
					 }
					 
				?>
				</select><br><br>
		    <input type="submit" class="btn-lime" name="editar" value="Editar" />             
    </fieldset>   
</form>

<?php

	$this->load->view("rodape");
?>
