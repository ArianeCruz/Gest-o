-- Criação da tabela de usuários
CREATE TABLE IF NOT EXISTS users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    role ENUM('admin', 'user') NOT NULL DEFAULT 'user'
);

INSERT INTO users (username, password_hash, role) VALUES
('admin', '123', 'admin'),
('user1', '$2y$10$zjIeP1j3.JRZpH.SyhA8leINhEaU5Q/krZzef3o93TmQ0sJiQDvrq', 'user'),
('user2', '$2y$10$C8c9Ap4B9Hj3D2QyeFtGe.qvmN3eZc8YhDV3ESuY87nYiZc82uHZG', 'user');

CREATE TABLE IF NOT EXISTS scripts (
    id INT PRIMARY KEY AUTO_INCREMENT,
    test_environment TEXT NOT NULL,
    execution_steps TEXT NOT NULL,
    input_data TEXT NOT NULL,
    expected_results TEXT NOT NULL,
    evaluation_conditions TEXT NOT NULL,
    variable_section TEXT NOT NULL,
    category VARCHAR(50) NOT NULL,
    attachments VARCHAR(255),  -- Use o tipo de dado adequado para armazenar o caminho do arquivo ou blob, dependendo do que você planeja fazer
    user_id INT NOT NULL,
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);






