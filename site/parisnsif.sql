-- Création de la table 'users' (utilisateurs)
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
-- Ajouter un utilisateur
INSERT INTO users (username, password, email) 
VALUES ('john_doe', 'hashed_password_example', 'john.doe@example.com');
-- Création de la table 'matches' (matchs)
CREATE TABLE matches (
    id INT AUTO_INCREMENT PRIMARY KEY,
    team1 VARCHAR(100) NOT NULL,
    team2 VARCHAR(100) NOT NULL,
    team1_odds DECIMAL(5, 2),
    team2_odds DECIMAL(5, 2),
    match_date DATETIME,
    status INT DEFAULT 0,  -- 0 = en cours, 1 = terminé
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
-- Ajouter un match
INSERT INTO matches (team1, team2, team1_odds, team2_odds, match_date, status)
VALUES ('Paris SG', 'Marseille', 1.85, 3.20, '2025-12-05 21:00:00', 0);


-- Création de la table 'bets' (paris)
CREATE TABLE bets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    match_id INT,
    amount DECIMAL(10, 2),
    bet_type VARCHAR(50),  -- Exemple: "victoire équipe 1", "match nul"
    bet_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (match_id) REFERENCES matches(id)
);
-- Ajouter un pari
INSERT INTO bets (user_id, match_id, amount, bet_type) 
VALUES (1, 1, 50.00, 'Paris SG gagne');
