<div class="container p-5">
<div class="card">
  <div class="card-header text-center">
    <h4>SERVIÇOS <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#modalAddServico" > <i class="bi bi-plus-lg"></i></button><h4>
  </div>
  <div class="card-body">

    
    <table class="table table-responsive table-hover" style='width:100%'>
      <thead>
        <tr>
          <th scope="col" width='3%'>CÓDIGO</th>
          <th scope="col" width='84%'>SERVIÇO</th>
          <th scope="col" width='13%'>AÇÃO</th>
        </tr>
      </thead>
      <tbody class="table-group-divider">
       <?php 
       $servico = listarTabela ('idservico,servico','servico','idservico');
       if ($servico != 'Vazio') {
       foreach ($servico as $servicoitem) {
        $idservico = $servicoitem -> idservico; 
        $servico = $servicoitem -> servico;
        ?>
        <tr>
          <th scope="row"><?php echo $idservico?></th>
          <td><?php echo $servico?></td>
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
        echo ('Não há serviços disponíveis!');
      }
               ?>
      </tbody>
    </table>

</div>
</div>
</div>