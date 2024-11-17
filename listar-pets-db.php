<h1> Lista dos pets cadastrados </h1><br>

<?php if (isset($_GET['status'])): ?>
    <div class="alert alert-<?= strpos($_GET['status'], 'sucesso') !== false ? 'success' : 'danger'; ?> alert-dismissible fade show" role="alert">
        <?php
        switch ($_GET['status']) {
            case 'cadastrar-sucesso':
                print "Cadastro realizado com sucesso!";
                break;
            case 'cadastrar-erro':
                print "Falha ao realizar o cadastro. Tente novamente.";
                break;
            case 'editar-sucesso':
                print "Edição realizada com sucesso!";
                break;
            case 'editar-erro':
                print "Falha ao realizar a edição. Tente novamente.";
                break;
            case 'excluir-sucesso':
                print "Pet deletado com sucesso!";
                break;
            case 'excluir-erro':
                print "Falha ao deletar o pet. Tente novamente.";
                break;
        }
        ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<?php
try {
    $sql = "SELECT * FROM tb_pets";
    $res = $conn->query($sql);

    if (!$res) {
        throw new Exception("Erro ao realizar consulta no banco de dados.");
    }

    $rows = $res->fetch_all(MYSQLI_ASSOC);

    if (count($rows) > 0): ?>
        <table class="table table-hover table-striped table-bordered">
            <thead class="table-primary">
                <tr>
                    <th style="text-align: center">Foto</th>
                    <th style="text-align: center">Nome</th>
                    <th style="text-align: center">Dono</th>
                    <th style="text-align: center">Telefone</th>
                    <th style="text-align: center">E-mail</th>
                    <th style="text-align: center" colspan="2">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rows as $row): ?>
                    <tr>
                        <td style="text-align: center; vertical-align: middle;">
                            <img src="<?= htmlspecialchars($row['url_foto']); ?>" alt="foto do cachorro" class="img-pet"/>
                        </td>
                        <td style="text-align: center; vertical-align: middle;"><?= htmlspecialchars($row['nome']); ?></td>
                        <td style="text-align: center; vertical-align: middle;"><?= htmlspecialchars($row['dono']); ?></td>
                        <td style="text-align: center; vertical-align: middle;"><?= htmlspecialchars($row['telefone']); ?></td>
                        <td style="text-align: center; vertical-align: middle;"><?= htmlspecialchars($row['email']); ?></td>
                        <td style="text-align: center; vertical-align: middle;">
                            <button onclick="location.href='?page=editar&id=<?= htmlspecialchars($row['id']); ?>'" 
                                    class="btn btn-success">
                                <i class="fas fa-edit"></i> Editar
                            </button>
                        </td>
                        <td style="text-align: center; vertical-align: middle;">
                            <button onclick="if(confirm('Tem certeza que deseja excluir?')) { location.href='?page=salvar&action=excluir&id=<?= htmlspecialchars($row['id']); ?>' }" 
                                    class="btn btn-danger">
                                <i class="fas fa-trash-alt"></i> Excluir
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="alert alert-danger">Não encontrou resultados!</p>
    <?php endif; 

} catch (Exception $e) { ?>

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= htmlspecialchars($e->getMessage()); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

<?php } ?>
