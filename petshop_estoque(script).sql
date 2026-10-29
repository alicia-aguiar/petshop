CREATE DATABASE IF NOT EXISTS petshop
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE petshop;

CREATE TABLE IF NOT EXISTS users (
  id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL UNIQUE,
  email_verified_at TIMESTAMP NULL,
  password VARCHAR(255) NOT NULL,
  remember_token VARCHAR(100) NULL,
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS cadastros (
  id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(255) NOT NULL,
  descricao TEXT NOT NULL,
  marca VARCHAR(255) NOT NULL,
  categoria VARCHAR(255) NOT NULL,
  unidade_medida VARCHAR(30) NULL,
  tamanho_embalagem VARCHAR(80) NULL,
  preco_custo DECIMAL(8,2) NOT NULL,
  preco_venda DECIMAL(8,2) NOT NULL,
  qtd_disponivel INT NOT NULL DEFAULT 0,
  estoque_minimo INT NOT NULL DEFAULT 0,
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL,
  INDEX idx_cadastros_nome (nome),
  INDEX idx_cadastros_estoque (qtd_disponivel, estoque_minimo)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS movimentacaos (
  id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  produto_id BIGINT UNSIGNED NOT NULL,
  user_id BIGINT UNSIGNED NOT NULL,
  tipo ENUM('entrada','saida') NOT NULL,
  quantidade INT UNSIGNED NOT NULL,
  data_movimentacao DATETIME NOT NULL,
  observacao VARCHAR(500) NULL,
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL,
  INDEX idx_movimentacaos_data (data_movimentacao),
  CONSTRAINT fk_movimentacaos_produto
    FOREIGN KEY (produto_id)
    REFERENCES cadastros(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT,
  CONSTRAINT fk_movimentacaos_funcionario
    FOREIGN KEY (user_id)
    REFERENCES users(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
) ENGINE=InnoDB;

-- Usuário demonstrativo: funcionario@petshop.com / password
INSERT INTO users (name, email, password, created_at, updated_at)
VALUES (
  'Funcionário Demo',
  'funcionario@petshop.com',
  '$2y$12$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi.',
  NOW(),
  NOW()
)
ON DUPLICATE KEY UPDATE name = VALUES(name);

INSERT INTO cadastros (
  nome,
  descricao,
  marca,
  categoria,
  unidade_medida,
  tamanho_embalagem,
  preco_custo,
  preco_venda,
  qtd_disponivel,
  estoque_minimo,
  created_at,
  updated_at
)
VALUES
(
  'Ração Premium para Cães 10 kg',
  'Ração completa para cães adultos.',
  'PetVida',
  'Ração',
  'kg',
  '10 kg',
  120.00,
  159.90,
  18,
  5,
  NOW(),
  NOW()
),
(
  'Shampoo neutro para cães 500 ml',
  'Shampoo neutro para higiene de cães.',
  'PetVida',
  'Higiene',
  'ml',
  '500 ml',
  18.50,
  29.90,
  2,
  6,
  NOW(),
  NOW()
);
