<?php

require_once 'MyDbConnection.php';

class User {
    public static function createUser($nom, $prenom, $email, $password, $role) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $pdo = MyDbConnection::getInstance(); 

        try {
            $stmt = $pdo->prepare('INSERT INTO users (nom, prenom, email, password, role) VALUES (?, ?, ?, ?, ?)');
            $stmt->execute([$nom, $prenom, $email, $hashedPassword, $role]);

            return "Utilisateur ajouté avec succès.";
        } catch (PDOException $e) {
            return "Erreur : " . $e->getMessage();
        }
    }

    public static function deleteUser($id) {
        $pdo = MyDbConnection::getInstance(); 

        try {
            $stmt = $pdo->prepare('DELETE FROM users WHERE id_user = ?');
            $stmt->execute([$id]);
            return "Utilisateur supprimé avec succès.";
        } catch (PDOException $e) {
            return "Erreur : " . $e->getMessage();
        }
    }

    public static function updateUser($id, $nom, $prenom, $email, $role) {
        $pdo = MyDbConnection::getInstance(); 

        try {
            $stmt = $pdo->prepare('UPDATE users SET nom = ?, prenom = ?, email = ?, role = ? WHERE id_user = ?');
            $stmt->execute([$nom, $prenom, $email, $role, $id]);
            return "Utilisateur mis à jour avec succès.";
        } catch (PDOException $e) {
            return "Erreur : " . $e->getMessage();
        }
    }

    public static function getUserById($id) {
        $pdo = MyDbConnection::getInstance(); 
        $stmt = $pdo->prepare('SELECT * FROM users WHERE id_user = ?');
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public static function getAllUsers() {
        $pdo = MyDbConnection::getInstance(); 
        $stmt = $pdo->prepare('SELECT * FROM users');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getAllUsersWithRoles() {
        $pdo = MyDbConnection::getInstance(); 
        $stmt = $pdo->prepare('SELECT * FROM users');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
