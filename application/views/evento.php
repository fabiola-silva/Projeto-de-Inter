<?php

$this->load->view("cabecalho");
?>




  <form id="form_cadastro" name="cod" method="POST"  onsubmit="return validacao_evento()">
    <fieldset>
      <div id="pagina">
        <h1>Informação do Evento</h1>

        <label for="nome"> <b style="color:red;">*</b>Nome do evento: </label> <br>
        <input name="id" type="hidden" value="<?php echo $evento ?   $evento->id : ''; ?>" />
        <input id="nome_evento" type="text" name="nome_evento" size="30" maxlength="40"  title="somente letra" pattern="[a-z-A-Z\s]+$" value="<?php echo $evento ?   $evento->nome_evento : ''; ?>" />
        <br>
        <label for="evento"> <b style="color:red;">*</b>Local do evento: </label> <br>
        <input id="local" type="text" name="local" size="30" maxlength="40"  title="somente letra" pattern="[a-z-A-Z\s]+$" value="<?php echo $evento ?   $evento->local : ''; ?>" />
        <br>
        <label for="telefone"> <b style="color:red;">*</b>Telefone para contato: </label> <br>
        <input id="contato" type="tel" name="contato" size="10" maxlength="9" placeholder="0000-0000"  title="somente número" pattern="[0-9\s]+$" value="<?php echo $evento ?   $evento->contato : ''; ?>" />
        <br>
        <b style="color:red;">*</b>
        Data: <br>
        <input id="data" type="text" name="data" value="<?php echo $evento ?    $evento->data : ''; ?>">
        
        <br>
        <label for="tempo"> <b style="color:red;">*</b>Duração: </label><br>
        <input id="horario" type="text" name="horario" value="<?php echo $evento ?  $evento->horario : ''; ?>">
        <br>
        <b style="color:red;">*</b>
        Descricao do evento: <br>
        <textarea name="descricao" id="descricao" cols="35" rows="5" placeholder="Descreva seu evento aqui!!!"> <?php echo $evento ?   $evento->descricao : ''; ?></textarea>
        <br>
      </div>

      <input type="submit" class="btn-lime" name="<?php echo $acao ?>" value="<?php echo $acao ?>" />

    </fieldset>

  </form>


  <!-- VAlidação dos campos do formulario de Evento  -->
  <script>
   function validacao_evento(){
       var nome = document.getElementById('nome_evento').value;
       var local = document.getElementById('local').value;
       var contato = document.getElementById('contato').value;
       var data = document.getElementById('data').value;
       var horario = document.getElementById('horario').value;
       var descricao = document.getElementById('descricao').value;

     if(nome == ''){
       alert('Nome é obrigatório. ');
       return false;
     }
     if (local == '') {
           alert('Local é obrigatório.');
           return false;   
     }
     if (contato == '') {
          alert('Telefone para contato é obrigatório.');
          return false;   
      }
      if (data == '') {
          alert('Data  é obrigatório.');
          return false;   
      }if (horario == '') {
          alert('Duração é obrigatório');
          return false;   
      }if (descricao == " ") {
          alert('Descrição é obrigatório');
          return false;   
      }


  }





</script> 


<?php

$this->load->view("rodape");
?>