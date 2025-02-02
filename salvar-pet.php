<?php
    try {
        switch ($_REQUEST["action"]) {
            case "cadastrar":
                $nome = $_POST["nome"];
                $dono = $_POST["dono"];
                $telefone = $_POST["telefone"];
                $email = $_POST["email"];
                $url_foto = $_POST["url-foto"];

                $sql = "INSERT INTO tb_pets (nome, dono, telefone, email, url_foto) VALUES ('{$nome}', '{$dono}', '{$telefone}', '{$email}', '{$url_foto}')";
                $res = $conn->query($sql);

                if ($res === true) {
                    print "<script>location.href='?page=listar-db&status=cadastrar-sucesso'</script>";
                } else {
                    throw new Exception("Erro ao cadastrar pet.");
                }
                break;
            
            case "editar":
                $nome = $_POST["nome"];
                $dono = $_POST["dono"];
                $telefone = $_POST["telefone"];
                $email = $_POST["email"];
                $url_foto = $_POST["url-foto"];

                $sql = "UPDATE tb_pets SET nome='{$nome}', dono='{$dono}', telefone='{$telefone}', email='{$email}', url_foto='{$url_foto}' WHERE id=".$_REQUEST["id"];
                $res = $conn->query($sql);

                if ($res === true) {
                    print "<script>location.href='?page=listar-db&status=editar-sucesso'</script>";
                } else {
                    throw new Exception("Erro ao editar pet.");
                }
                break;
            
            case "excluir":
                $sql = "DELETE FROM tb_pets WHERE id=".$_REQUEST["id"];
                $res = $conn->query($sql);

                if ($res === true) {
                    print "<script>location.href='?page=listar-db&status=excluir-sucesso'</script>";
                } else {
                    throw new Exception("Erro ao excluir pet.");
                }
                break;
            
            default:
                throw new Exception("Ação não reconhecida.");
        }
    
    } catch (Exception $e) { ?>

        <div class='alert alert-danger alert-dismissible fade show' role='alert'>";
            <?= htmlspecialchars($e->getMessage()); ?>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>";
        </div>"

    <?php } ?>