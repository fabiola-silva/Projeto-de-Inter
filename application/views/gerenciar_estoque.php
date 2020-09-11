<?php

 $this->load->view("cabecalho");

?>

<form id="form_cadastro2" name="cod" method="POST"  onsubmit="return validacao_estoque_materiais()" action="<?php echo base_url(); ?>index.php/Idosos/gerenciar_estoque" >



    <fieldset id="CorpoDoControle" style="background-color:turquoise ">


        <h1 id="gerenciar">Estoque de Materiais</h1>

        <select name="material">
            <option selected value="Selecione">Selecione</option>
            <option value="Cadeira de Rodas">Cadeira de Rodas</option>
            <option value="Fralda Adulto">Fralda Adulto</option>
            <option value="Fralda Infantil">Fralda Infantil</option>
            <option value="Medicamentos Tarja Amarela">Medicamentos Tarja Amarela</option>
            <option value="Medicamentos Tarja Vermelha">Medicamentos Tarja Vermelha</option>
            <option value="Medicamentos Tarja Preta">Medicamentos Tarja Preta</option>
            <option value="Medicamentos Calmantes">Medicamentos Calmantes</option>
            <option value="Seringa">Seringa</option>
            <option value="Equipamento para Aferir Pressão">Equipãamento para Aferir Pressão</option>
            <option value="Leite Nan">Leite Nan</option>
            <option value="Andador para Idoso">Andador para Idoso</option>
            <option value="Lencol">Lencol</option>
            <option value="Roupas">Roupas</option>
            <option value="Material Escolar">Material Escolar</option>
            <option value="Alimentos">Alimentos</option>
            <option value="Outros">Outros</option>


        </select>
        <div>
            <b style="color:red;">*</b>Nome do Produto Recebido por Doação:</b>
            <input type="text" id="produto" name="produto" maxlength="50" size="50">
            <br>
            <b style="color:red;">*</b>Quantidade:<br>
            <input type="text" id="quant" name="quant">
            <br>
            <b style="color:red;">*</b>Procedencia:<br>
            <input type="radio" name="procedencia"  value="interno" checked>
            <label>Internos</label>
            <input type="radio" name="procedencia" value="externo">
            <label>Externos</label>
            <br>

        </div>
        <br>
        <input type="submit" class="btn btn-lime" name="material_estoque" value="ENVIAR" />
    </fieldset>
    
</form>
<br/>

<form id="form_cadastro" name="cod" method="POST" onsubmit="return validacao_dinheiro()" action="<?php echo base_url(); ?>Idosos/gerenciar_estoque"  >

       
        <fieldset style="background-color:turquoise; ">
            <h1 id="Doacao_dinheiro">Doação em dinheiro</h1>
            <b style="color:red;">*</b> Valor em dinheiro
            <input id="doacao" type="text" name="doacao">
            <br>
            <b style="color:red;">*</b>Procedencia:
            <input type="radio" name="proced2" value="interno">
            <label for="proced2">Interno</label>
            <input type="radio" id="proced2" name="proced2" value="externo" checked>
            <label for="proced2">Externo</label><br><br>
            <input type="submit" class="btn btn-lime" name="dinheiro_estoque" value="ENVIAR" />
        </fieldset>
        
    


</form>




<script>
    function validacao_estoque_materiais() {
        var produto = document.getElementById("produto").value;
        var quant = document.getElementById("quant").value;

        if (produto == '') {
            alert("Nome do produto é obrigatório.");
            return false;
        }
        if (quant == '') {
            alert("Quantidade é obrigatório.");
            return false;
        }

    }








    function validacao_dinheiro() {
        var doacao = document.getElementById('doacao').value;

        if (doacao == '') {
            alert('Valor em dinheiro é obrigatório. ');
            return false;
        }
    }
</script>

<?php

$this->load->view("rodape");
?>