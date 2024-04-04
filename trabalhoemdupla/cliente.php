
<div class="card">
  <div class="card-header text-center">
    <h4>CLIENTES <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#AddCliente"> <i class="bi bi-plus-lg"></i></button><h4>
  </div>
  <div class="card-body">

    
    <table class="table table-responsive table-hover" style='width:100%'>
      <thead>
        <tr>
          <th scope="col" width='3%'>CÓDIGO</th>
          <th scope="col" width='45%'>NOME</th>
          <th scope="col" width='39%'>CPF</th>
          <th scope="col" width='13%'>AÇÃO</th>
        </tr>
      </thead>
      <tbody class="table-group-divider">
       <?php 
       $cliente = listarTabela ('idcliente,nome,cpf','cliente','idcliente');
       if ($cliente != 'Vazio') {
       foreach ($cliente as $clienteitem) {
        $idcliente = $clienteitem -> idcliente; 
        $nome = $clienteitem -> nome;
        $cpf = $clienteitem -> cpf;
        ?>
        <tr>
          <th scope="row"><?php echo $idcliente?></th>
          <td><?php echo $nome ?></td>
          <td><?php echo $cpf ?></td>
          <td>
          <div class="btn-group btn-group-sm" role="group" aria-label="Basic mixed styles example">
          <button class="btn btn-outline-warning"><i class="bi bi-info-circle"></i>
         <button class="btn btn-outline-danger">Excluir</button>
          <button type="button" class="btn btn-outline-primary">Alterar</button>
            
        </div>
        </td>
        </tr>
      <?php 
      }
       } else {
        echo ('Não há clientes disponíveis!');
      }
               ?>
      </tbody>
    </table>

</div>
</div>


