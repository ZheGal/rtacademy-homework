<?php
declare( strict_types=1 );
namespace lib\models;

class UsersModel
{
    public function getByLoginPassword( string $login, string $password ) : ?\lib\entities\Author
    {
        try {
            $db = \lib\DbConnection::getConnection();
            $statement = $db->prepare("
                SELECT
                    user.id,
                    user.firstname,
                    user.lastname,
                    role.name as role_name
                FROM
                    users AS user
                INNER JOIN
                    users_roles AS role ON ( user.role_id = role.id )        
                INNER JOIN
                    users_statuses AS status ON ( user.name = 'active' AND user.status_id = status.id )
                WHERE
                    user.login = :login
                    AND
                    user.password = :password
                LIMIT 1
            ");

            $statement->execute([
                ':login' => $login,
                ':password' => md5($password)
            ]);

            $row = $statement->fetch( \PDO::FETCH_ASSOC );

            if (empty($row)) {
                return null;
            }

            $author = new \lib\entities\Author();
            $author->setId( $row['id'] );
            $author->setFirstName( $row['firstname'] );
            $author->setLastName( $row['lastname'] );
            $author->setRoleName( $row['role_name'] );

            return $author;

        } catch ( \PDOException $e ) {
            echo "<div>Помилка: {$e->getMessage()}</div>";
            return null;
        }
    }
}