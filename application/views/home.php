<?php

$this->load->view("cabecalho");
?>


        <form id="form_cadastro" name="cod" method="POST" action="<?php echo base_url();?>/index.php/Idosos">
          <fieldset style="background-color:turquoise ">
              <h1>Dados Cadastrais</h1>
              <br>
              

                <b style="color:red;">*</b>Nome<br>
                <input id="nome" type="text" name="nome" size="40" maxlength="50" required="required" title="somente letras" pattern="[a-z-A-Z\s]+$"/>
                <br>

                <b style="color:red;">*</b>RG<br>
                <input id="RG" type="text" name="rg" size="20" maxlength="8" required="required" title="somente numeros" pattern="[0-9\s]+$"/>
                <br>
                
                <b style="color:red;">*</b>CPF<br>
                <input id="CPF" type="text" name="cpf" size="20" maxlength="11" required="required" title="somente numeros" pattern="[0-9\s]+$"/>
                <br>
                
                <b style="color:red;">*</b>Telefone 1<br>
                <input id="Telefone1" type="tel" name="telefone1" size="20" maxlength="8" required="required" title="somente numeros" pattern="[0-9\s]+$"/>
                <br>
                
                Telefone 2:<br>
                <input id="Telefone2" type="tel" name="telefone2" size="20" maxlength="8" required="required" title="somente numeros" pattern="[0-9\s]+$"/>
                <br><br>
                
                Endereço:<br>
               
                <b style="color:red;">*</b>Rua<br>
                <input id="Rua" type="text" name="rua" size="40" maxlength="30" required="required" title="somente letras" pattern="[a-z-A-Z\s]+$"/><br>
                    
                <b style="color:red;">*</b>Número<br>
                <input id="Numero" type="text" name="numero" size="20" maxlength="4" required="required" title="somente numeros" pattern="[0-9\s]+$"/><br>
                    
                Complemento<br>
                
                <input type="text" name="complemento" size="40" maxlength="25" required="required" title="somente letras" pattern="[a-z-A-Z\s]+$"/><br>
                    
                <b style="color:red;">*</b>Sexo<br>
                <input type="radio" name="sexo" value="masculino" checked>
                Masculino
                <br>
                <input type="radio" name="sexo" value="feminino">
                Feminino
                <br>
                
                <b style="color:red;">*</b>Dependentes<br>
                <input type="radio" name="dep" value="0" >
                Não<br> 
                <input type="radio" name="dep" value="1" checked>
                Sim
                <br>
                Quantos?
                <input type="text" name="quantos">
                <br><br>
                <input type="submit" class="btn btn-lime"  name="cadastro_idoso" value="ENVIAR" />
        
            </fieldset>
		</form>
            <br><br>

<?php

$this->load->view("rodape");
?>
