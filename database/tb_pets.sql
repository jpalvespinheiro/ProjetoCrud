
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Banco de dados: `db_cadastro_pets`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_pets`
--

CREATE TABLE `tb_pets` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `dono` varchar(255) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `url_foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `tb_pets` (`id`, `nome`, `dono`, `telefone`, `email`, `url_foto`) VALUES
(24, 'Dogão', 'Matheus', '(62) 9 86086299', 'matheus@teste.com', 'https://www.cnnbrasil.com.br/wp-content/uploads/sites/12/2024/02/cachorro-messi-anatomia-de-uma-queda-e1708119960460.jpg?w=1080'),
(25, 'Milla', 'Luanna', '(62) 9 90883234', 'luanna@teste.com', 'https://ufape.com.br/wp-content/uploads/2024/03/Ufape-Hospital-Veterinario-cachorro-braquicefalico-GS2-MKT-Freepik.jpg'),
(26, 'Ralf', 'João', '(62) 9 98436789', 'joao@teste.com', 'https://diariodonordeste.verdesmares.com.br/image/contentid/policy:1.3495068:1711737971/shutterstock_477589291%20(1)%20(1).jpg?f=16x9&$p$f=864c108'),
(30, 'Tequila', 'Rafael', '(62) 9 98634567', 'rafael@gmail.com', 'https://www.pedigree.com.br/cdn-cgi/image/format=auto,q=90/sites/g/files/fnmzdf2401/files/2022-04/hero-icon-Savannah_0.png');

--
-- Índices de tabela `tb_pets`
--
ALTER TABLE `tb_pets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_pets`
--
ALTER TABLE `tb_pets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;
