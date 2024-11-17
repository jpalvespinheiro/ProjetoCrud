<h1>🐾 Editar Usuário 🐾</h1><br>

<?php
try {
    if (!isset($_REQUEST["id"]) || empty($_REQUEST["id"])) {
        throw new Exception("ID do pet não informado.");
    }

    $sql = "SELECT * FROM tb_pets WHERE id = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        throw new Exception($conn->error);
    }

    $stmt->bind_param("i", $_REQUEST["id"]);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($res->num_rows === 0) {
        throw new Exception("Pet não encontrado com o ID informado.");
    }

    $row = $res->fetch_object();
} catch (Exception $e) {
    echo "<div class='alert alert-danger'>Erro: " . $e->getMessage() . "</div>";
    exit;
}
?>

<div class="container my-5">
    <div class="row align-items-center">
        <div class="col-md-6 mb-4">
            <h2 class="mb-4 text-center text-md-start">Formulário</h2>

            <form action="?page=salvar" method="POST">
                <input type="hidden" name="action" value="editar">
                <input type="hidden" name="id" value="<?php print $row->id; ?>">
                <div class="md-3 mt-2">
                    <label>Nome</label>
                    <input type="text" name="nome" class="form-control" value="<?php print $row->nome ?>">
                </div>
                <div class="md-3 mt-2">
                    <label>Dono</label>
                    <input type="text" name="dono" class="form-control" value="<?php print $row->dono ?>">
                </div>
                <div class="md-3 mt-2">
                    <label>Telefone</label>
                    <input type="text" name="telefone" class="form-control" value="<?php print $row->telefone ?>">
                </div>
                <div class="md-3 mt-2">
                    <label>E-mail</label>
                    <input type="email" name="email" class="form-control" value="<?php print $row->email ?>">
                </div>
                <div class="md-3 mt-2">
                    <label>URL Foto</label>
                    <input type="text" name="url-foto" class="form-control" value="<?php print $row->url_foto ?>">
                </div>
                <div class="mb-3 mt-3">
                    <button type="submit" class="btn btn-success">Editar Pet</button>
                </div>
            </form>
        </div>
        
        <div class="col-md-6 d-flex justify-content-center">
            <img src="<?php print $row->url_foto ?>" alt="Imagem do Pet" class="img-fluid rounded">
        </div>
    </div>
</div>
