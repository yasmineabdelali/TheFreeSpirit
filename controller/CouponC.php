<?php

require '../config.php';

class CouponC
{

    public function listCoupons()
    {
        $sql = "SELECT * FROM coupon";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteCoupon($id)
    {
        $sql = "DELETE FROM Coupon WHERE id_coup = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function addCoupon($coupon)
    {
        $sql = "INSERT INTO Coupon  
        VALUES (NULL, :id_com, :code_coup)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'id_com' => $coupon->getId_command(),
                'code_coup' => $coupon->getCode_coupon(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    function showCoupon($id)
    {
        $sql = "SELECT * from Coupon where id_coup = :id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':id', $id);
            $query->execute();
            $coupon = $query->fetch();
            return $coupon;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateCoupon($coupon, $id_coup)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE Coupon SET 
                    id_com = :id_com, 
                    code_coup = :code_coup
                WHERE id_coup = :id_coup'
            );

            $query->execute([
                'id_com' => $coupon->id_com,
                'code_coup' => $coupon->code_coup,
                'id_coup' => $id_coup,
            ]);

            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
