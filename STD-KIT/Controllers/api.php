<?php
// Universitety
function getAllUniversitety($db) {
    $sql = "SELECT * FROM `Universitety`";
    $result = array();

    $stmt = $db->prepare($sql);

    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

function getUniversitetById($db, $id){
    $sql = "SELECT * FROM `Universitety`
            WHERE id_Universitet = :id_Universitet
            ";
    $stmt = $db->prepare($sql);

    $stmt->bindValue('id_Universitet', $id, PDO::PARAM_INT);

    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row;
}

function saveUpdateUniversitetImya($db, $imya, $id) {
    $sql = "UPDATE Universitety
            SET Imya_Universitet = :Imya_Universitet
            WHERE id_Universitet = :id_Universitet;
            ";
    $stmt = $db->prepare($sql);

    $stmt->bindValue(':Imya_Universitet', $imya, PDO::PARAM_STR);
    $stmt->bindValue(':id_Universitet', $id, PDO::PARAM_INT);

    $stmt->execute();
}

function addUniversitet($db, $imya) {
    $sql = "INSERT INTO Universitety(Imya_Universitet)
            VALUES(:Imya_Universitet);
            ";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':Imya_Universitet', $imya, PDO::PARAM_STR);
    $stmt->execute();
}

function deleteUniversitet($db, $id){
    $sql = "DELETE FROM Universitety WHERE id_Universitet = :id_Universitet";

    $stmt = $db->prepare($sql);
    $stmt->bindValue(":id_Universitet", $id, PDO::PARAM_INT);

    $stmt->execute();
}

// StatusyZadach
function getAllStatusyZadach($db) {
    $sql = "SELECT * FROM `StatusyZadach`";
    $result = array();

    $stmt = $db->prepare($sql);

    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

function getStatusZadachById($db, $id){
    $sql = "SELECT * FROM `StatusyZadach`
            WHERE id_StatusZadach = :id_StatusZadach
            ";
    $stmt = $db->prepare($sql);

    $stmt->bindValue('id_StatusZadach', $id, PDO::PARAM_INT);

    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row;
}

function saveUpdateStatusZadachImya($db, $imya, $id) {
    $sql = "UPDATE StatusyZadach
            SET Imya_StatusZadach = :Imya_StatusZadach
            WHERE id_StatusZadach = :id_StatusZadach;
            ";
    $stmt = $db->prepare($sql);

    $stmt->bindValue(':Imya_StatusZadach', $imya, PDO::PARAM_STR);
    $stmt->bindValue(':id_StatusZadach', $id, PDO::PARAM_INT);

    $stmt->execute();
}

function addStatusZadach($db, $imya) {
    $sql = "INSERT INTO StatusyZadach(Imya_StatusZadach)
            VALUES(:Imya_StatusZadach);
            ";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':Imya_StatusZadach', $imya, PDO::PARAM_STR);
    $stmt->execute();
}

function deleteStatusZadach($db, $id){
    $sql = "DELETE FROM StatusyZadach WHERE id_StatusZadach = :id_StatusZadach";

    $stmt = $db->prepare($sql);
    $stmt->bindValue(":id_StatusZadach", $id, PDO::PARAM_INT);

    $stmt->execute();
}

// TipyZadach
function getAllTipyZadach($db) {
    $sql = "SELECT * FROM `TipyZadach`";
    $result = array();

    $stmt = $db->prepare($sql);

    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

function getTipZadachById($db, $id){
    $sql = "SELECT * FROM `TipyZadach`
            WHERE id_TipZadach = :id_TipZadach
            ";
    $stmt = $db->prepare($sql);

    $stmt->bindValue('id_TipZadach', $id, PDO::PARAM_INT);

    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row;
}

function saveUpdateTipZadachImya($db, $imya, $id) {
    $sql = "UPDATE TipyZadach
            SET Imya_TipZadach = :Imya_TipZadach
            WHERE id_TipZadach = :id_TipZadach;
            ";
    $stmt = $db->prepare($sql);

    $stmt->bindValue(':Imya_TipZadach', $imya, PDO::PARAM_STR);
    $stmt->bindValue(':id_TipZadach', $id, PDO::PARAM_INT);

    $stmt->execute();
}

function addTipZadach($db, $imya) {
    $sql = "INSERT INTO TipyZadach(Imya_TipZadach)
            VALUES(:Imya_TipZadach);
            ";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':Imya_TipZadach', $imya, PDO::PARAM_STR);
    $stmt->execute();
}

function deleteTipZadach($db, $id){
    $sql = "DELETE FROM TipyZadach WHERE id_TipZadach = :id_TipZadach";

    $stmt = $db->prepare($sql);
    $stmt->bindValue(":id_TipZadach", $id, PDO::PARAM_INT);

    $stmt->execute();
}

// Praktikanty
function getAllPraktikanty($db) {
    $sql = "SELECT * FROM `Praktikanty`
    LEFT JOIN Universitety ON `Praktikanty`.Universitet_Praktikant = `Universitety`.id_Universitet
    ";
    $result = array();

    $stmt = $db->prepare($sql);

    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

function getPraktikantById($db, $id){
    $sql = "SELECT * FROM `Praktikanty`
            LEFT JOIN Universitety ON `Praktikanty`.Universitet_Praktikant = `Universitety`.id_Universitet
            WHERE id_Praktikant = :id_Praktikant
            ";
    $stmt = $db->prepare($sql);

    $stmt->bindValue('id_Praktikant', $id, PDO::PARAM_INT);

    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row;
}

function getAllPraktikantyUniversitety($db){
    $sql = "SELECT * FROM `Universitety`";
    $res = array();

    $stmt = $db->prepare($sql);

    $stmt->execute();

    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $res[$row['id_Universitet']] = $row;
    }

    return $res;
}

function saveUpdatePraktikantFio($db, $fio, $id) {
    $sql = "UPDATE Praktikanty
            SET Fio_Praktikant = :Fio_Praktikant
            WHERE id_Praktikant = :id_Praktikant;
            ";
    $stmt = $db->prepare($sql);

    $stmt->bindValue(':Fio_Praktikant', $fio, PDO::PARAM_STR);
    $stmt->bindValue(':id_Praktikant', $id, PDO::PARAM_INT);

    $stmt->execute();
}

function saveUpdatePraktikantDeyatelnost($db, $deyat, $id) {
    $sql = "UPDATE Praktikanty
            SET Deyatelnost_Praktikant = :Deyatelnost_Praktikant
            WHERE id_Praktikant = :id_Praktikant;
            ";
    $stmt = $db->prepare($sql);

    $stmt->bindValue(':Deyatelnost_Praktikant', $deyat, PDO::PARAM_STR);
    $stmt->bindValue(':id_Praktikant', $id, PDO::PARAM_INT);

    $stmt->execute();
}

function saveUpdatePraktikantTelephon($db, $phone, $id) {
    $sql = "UPDATE Praktikanty
            SET Telephon_Praktikant = :Telephon_Praktikant
            WHERE id_Praktikant = :id_Praktikant;
            ";
    $stmt = $db->prepare($sql);

    $stmt->bindValue(':Telephon_Praktikant', $phone, PDO::PARAM_STR);
    $stmt->bindValue(':id_Praktikant', $id, PDO::PARAM_INT);

    $stmt->execute();
}

function saveUpdatePraktikantPochta($db, $pochta, $id) {
    $sql = "UPDATE Praktikanty
            SET Pochta_Praktikant = :Pochta_Praktikant
            WHERE id_Praktikant = :id_Praktikant;
            ";
    $stmt = $db->prepare($sql);

    $stmt->bindValue(':Pochta_Praktikant', $pochta, PDO::PARAM_STR);
    $stmt->bindValue(':id_Praktikant', $id, PDO::PARAM_INT);

    $stmt->execute();
}

function saveUpdatePraktikantUniversitet($db, $univer, $id) {
    $sql = "UPDATE `Praktikanty`
            SET Universitet_Praktikant = :Universitet_Praktikant
            WHERE id_Praktikant = :id_Praktikant;
            ";
    $stmt = $db->prepare($sql);

    $stmt->bindValue(':Universitet_Praktikant', $univer, PDO::PARAM_INT);
    $stmt->bindValue(':id_Praktikant', $id, PDO::PARAM_INT);

    $stmt->execute();
}

function saveUpdatePraktikantFakultet($db, $fakultet, $id) {
    $sql = "UPDATE Praktikanty
            SET Fakultet_Praktikant = :Fakultet_Praktikant
            WHERE id_Praktikant = :id_Praktikant;
            ";
    $stmt = $db->prepare($sql);

    $stmt->bindValue(':Fakultet_Praktikant', $fakultet, PDO::PARAM_STR);
    $stmt->bindValue(':id_Praktikant', $id, PDO::PARAM_INT);

    $stmt->execute();
}

function saveUpdatePraktikantKurs($db, $kurs, $id) {
    $sql = "UPDATE Praktikanty
            SET Kurs_Praktikant = :Kurs_Praktikant
            WHERE id_Praktikant = :id_Praktikant;
            ";
    $stmt = $db->prepare($sql);

    $stmt->bindValue(':Kurs_Praktikant', $kurs, PDO::PARAM_STR);
    $stmt->bindValue(':id_Praktikant', $id, PDO::PARAM_INT);

    $stmt->execute();
}

function saveUpdatePraktikantGruppa($db, $gruppa, $id) {
    $sql = "UPDATE Praktikanty
            SET Gruppa_Praktikant = :Gruppa_Praktikant
            WHERE id_Praktikant = :id_Praktikant;
            ";
    $stmt = $db->prepare($sql);

    $stmt->bindValue(':Gruppa_Praktikant', $gruppa, PDO::PARAM_STR);
    $stmt->bindValue(':id_Praktikant', $id, PDO::PARAM_INT);

    $stmt->execute();
}

function saveUpdatePraktikantNachaloPraktiki($db, $nachalo, $id) {
    $sql = "UPDATE Praktikanty
            SET NachaloPraktiki_Praktikant = :NachaloPraktiki_Praktikant
            WHERE id_Praktikant = :id_Praktikant;
            ";
    $stmt = $db->prepare($sql);

    $stmt->bindValue(':NachaloPraktiki_Praktikant', $nachalo, PDO::PARAM_STR);
    $stmt->bindValue(':id_Praktikant', $id, PDO::PARAM_INT);

    $stmt->execute();
}

function saveUpdatePraktikantKonecPraktiki($db, $konec, $id) {
    $sql = "UPDATE Praktikanty
            SET KonecPraktiki_Praktikant = :KonecPraktiki_Praktikant
            WHERE id_Praktikant = :id_Praktikant;
            ";
    $stmt = $db->prepare($sql);

    $stmt->bindValue(':KonecPraktiki_Praktikant', $konec, PDO::PARAM_STR);
    $stmt->bindValue(':id_Praktikant', $id, PDO::PARAM_INT);

    $stmt->execute();
}

function addPraktikant($db, $fio, $deyat, $phone, $pochta, $univer, $fakultet, $kurs, $gruppa, $nachalo, $konec) {
    $sql = "INSERT INTO Praktikanty(Fio_Praktikant, Deyatelnost_Praktikant, Telephon_Praktikant, Pochta_Praktikant, Universitet_Praktikant,
            Fakultet_Praktikant, Kurs_Praktikant, Gruppa_Praktikant, NachaloPraktiki_Praktikant, KonecPraktiki_Praktikant)
            VALUES(:Fio_Praktikant, :Deyatelnost_Praktikant, :Telephon_Praktikant, :Pochta_Praktikant, :Universitet_Praktikant,
            :Fakultet_Praktikant, :Kurs_Praktikant, :Gruppa_Praktikant, :NachaloPraktiki_Praktikant, :KonecPraktiki_Praktikant);
            ";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':Fio_Praktikant', $fio, PDO::PARAM_STR);
    $stmt->bindValue(':Deyatelnost_Praktikant', $deyat, PDO::PARAM_STR);
    $stmt->bindValue(':Telephon_Praktikant', $phone, PDO::PARAM_STR);
    $stmt->bindValue(':Pochta_Praktikant', $pochta, PDO::PARAM_STR);
    $stmt->bindValue(':Universitet_Praktikant', $univer, PDO::PARAM_STR);
    $stmt->bindValue(':Fakultet_Praktikant', $fakultet, PDO::PARAM_STR);
    $stmt->bindValue(':Kurs_Praktikant', $kurs, PDO::PARAM_STR);
    $stmt->bindValue(':Gruppa_Praktikant', $gruppa, PDO::PARAM_STR);
    $stmt->bindValue(':NachaloPraktiki_Praktikant', $nachalo, PDO::PARAM_STR);
    $stmt->bindValue(':KonecPraktiki_Praktikant', $konec, PDO::PARAM_STR);
    $stmt->execute();
}

function deletePraktikant($db, $id){
    $sql = "DELETE FROM Praktikanty WHERE id_Praktikant = :id_Praktikant";

    $stmt = $db->prepare($sql);
    $stmt->bindValue(":id_Praktikant", $id, PDO::PARAM_INT);

    $stmt->execute();
}

// SpisokZadach
function getAllSpisokZadach($db) {
    $sql = "SELECT * FROM `SpisokZadach`
    LEFT JOIN TipyZadach ON `SpisokZadach`.Tip_SpisokZadach = `TipyZadach`.id_TipZadach
    LEFT JOIN Praktikanty ON `SpisokZadach`.Praktikant_SpisokZadach = `Praktikanty`.id_Praktikant
    LEFT JOIN StatusyZadach ON `SpisokZadach`.Status_SpisokZadach = `StatusyZadach`.id_StatusZadach
    ";
    $result = array();

    $stmt = $db->prepare($sql);

    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

function getSpisokZadachById($db, $id){
    $sql = "SELECT * FROM `SpisokZadach`
            LEFT JOIN TipyZadach ON `SpisokZadach`.Tip_SpisokZadach = `TipyZadach`.id_TipZadach
            WHERE id_SpisokZadach = :id_SpisokZadach
            ";
    $stmt = $db->prepare($sql);

    $stmt->bindValue('id_SpisokZadach', $id, PDO::PARAM_INT);

    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row;
}

function getAllSpisokZadachTipyZadach($db){
    $sql = "SELECT * FROM `TipyZadach`";
    $res = array();

    $stmt = $db->prepare($sql);

    $stmt->execute();

    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $res[$row['id_TipZadach']] = $row;
    }

    return $res;
}

function getAllSpisokZadachPraktikanty($db){
    $sql = "SELECT * FROM `Praktikanty`";
    $res = array();

    $stmt = $db->prepare($sql);

    $stmt->execute();

    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $res[$row['id_Praktikant']] = $row;
    }

    return $res;
}

function getAllSpisokZadachStatusyZadach($db){
    $sql = "SELECT * FROM `StatusyZadach`";
    $res = array();

    $stmt = $db->prepare($sql);

    $stmt->execute();

    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $res[$row['id_StatusZadach']] = $row;
    }

    return $res;
}

function saveUpdateSpisokZadachTipZadach($db, $tip, $id) {
    $sql = "UPDATE `SpisokZadach`
            SET Tip_SpisokZadach = :Tip_SpisokZadach
            WHERE id_SpisokZadach = :id_SpisokZadach;
            ";
    $stmt = $db->prepare($sql);

    $stmt->bindValue(':Tip_SpisokZadach', $tip, PDO::PARAM_INT);
    $stmt->bindValue(':id_SpisokZadach', $id, PDO::PARAM_INT);

    $stmt->execute();
}

function saveUpdateSpisokZadachPraktikant($db, $prak, $id) {
    $sql = "UPDATE `SpisokZadach`
            SET Praktikant_SpisokZadach = :Praktikant_SpisokZadach
            WHERE id_SpisokZadach = :id_SpisokZadach;
            ";
    $stmt = $db->prepare($sql);

    $stmt->bindValue(':Praktikant_SpisokZadach', $prak, PDO::PARAM_INT);
    $stmt->bindValue(':id_SpisokZadach', $id, PDO::PARAM_INT);

    $stmt->execute();
}

function saveUpdateSpisokZadachImya($db, $imyaSP, $id) {
    $sql = "UPDATE SpisokZadach
            SET Imya_SpisokZadach = :Imya_SpisokZadach
            WHERE id_SpisokZadach = :id_SpisokZadach;
            ";
    $stmt = $db->prepare($sql);

    $stmt->bindValue(':Imya_SpisokZadach', $imyaSP, PDO::PARAM_STR);
    $stmt->bindValue(':id_SpisokZadach', $id, PDO::PARAM_INT);

    $stmt->execute();
}

function saveUpdateSpisokZadachOpisaniye($db, $desc, $id) {
    $sql = "UPDATE SpisokZadach
            SET Opisaniye_SpisokZadach = :Opisaniye_SpisokZadach
            WHERE id_SpisokZadach = :id_SpisokZadach;
            ";
    $stmt = $db->prepare($sql);

    $stmt->bindValue(':Opisaniye_SpisokZadach', $desc, PDO::PARAM_STR);
    $stmt->bindValue(':id_SpisokZadach', $id, PDO::PARAM_INT);

    $stmt->execute();
}

function saveUpdateSpisokZadachDataNachalo($db, $nachaloSP, $id) {
    $sql = "UPDATE SpisokZadach
            SET DataNachalo_SpisokZadach = :DataNachalo_SpisokZadach
            WHERE id_SpisokZadach = :id_SpisokZadach;
            ";
    $stmt = $db->prepare($sql);

    $stmt->bindValue(':DataNachalo_SpisokZadach', $nachaloSP, PDO::PARAM_STR);
    $stmt->bindValue(':id_SpisokZadach', $id, PDO::PARAM_INT);

    $stmt->execute();
}

function saveUpdateSpisokZadachDataKonec($db, $konecSP, $id) {
    $sql = "UPDATE SpisokZadach
            SET DataKonec_SpisokZadach = :DataKonec_SpisokZadach
            WHERE id_SpisokZadach = :id_SpisokZadach;
            ";
    $stmt = $db->prepare($sql);

    $stmt->bindValue(':DataKonec_SpisokZadach', $konecSP, PDO::PARAM_STR);
    $stmt->bindValue(':id_SpisokZadach', $id, PDO::PARAM_INT);

    $stmt->execute();
}

function saveUpdateSpisokZadachStatusZadach($db, $status, $id) {
    $sql = "UPDATE `SpisokZadach`
            SET Status_SpisokZadach = :Status_SpisokZadach
            WHERE id_SpisokZadach = :id_SpisokZadach;
            ";
    $stmt = $db->prepare($sql);

    $stmt->bindValue(':Status_SpisokZadach', $status, PDO::PARAM_INT);
    $stmt->bindValue(':id_SpisokZadach', $id, PDO::PARAM_INT);

    $stmt->execute();
}

function addSpisokZadach($db, $tip, $prak, $imyaSP, $desc, $nachaloSP, $konecSP, $status) {
    $sql = "INSERT INTO SpisokZadach(Tip_SpisokZadach, Praktikant_SpisokZadach, Imya_SpisokZadach, Opisaniye_SpisokZadach, 
            DataNachalo_SpisokZadach, DataKonec_SpisokZadach, Status_SpisokZadach)
            VALUES(:Tip_SpisokZadach, :Praktikant_SpisokZadach, :Imya_SpisokZadach, :Opisaniye_SpisokZadach, 
            :DataNachalo_SpisokZadach, :DataKonec_SpisokZadach, :Status_SpisokZadach);
            ";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':Tip_SpisokZadach', $tip, PDO::PARAM_STR);
    $stmt->bindValue(':Praktikant_SpisokZadach', $prak, PDO::PARAM_STR);
    $stmt->bindValue(':Imya_SpisokZadach', $imyaSP, PDO::PARAM_STR);
    $stmt->bindValue(':Opisaniye_SpisokZadach', $desc, PDO::PARAM_STR);
    $stmt->bindValue(':DataNachalo_SpisokZadach', $nachaloSP, PDO::PARAM_STR);
    $stmt->bindValue(':DataKonec_SpisokZadach', $konecSP, PDO::PARAM_STR);
    $stmt->bindValue(':Status_SpisokZadach', $status, PDO::PARAM_STR);
    $stmt->execute();
}

function deleteSpisokZadach($db, $id){
    $sql = "DELETE FROM SpisokZadach WHERE id_SpisokZadach = :id_SpisokZadach";

    $stmt = $db->prepare($sql);
    $stmt->bindValue(":id_SpisokZadach", $id, PDO::PARAM_INT);

    $stmt->execute();
}

// Otzyvy
function getAllOtzyvy($db) {
    $sql = "SELECT * FROM `Otzyvy`
    LEFT JOIN Praktikanty ON `Otzyvy`.Praktikant_Otzyv = `Praktikanty`.id_Praktikant
    ";
    $result = array();

    $stmt = $db->prepare($sql);

    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

function getOtzyvById($db, $id){
    $sql = "SELECT * FROM `Otzyvy`
            WHERE id_Otzyv = :id_Otzyv
            ";
    $stmt = $db->prepare($sql);

    $stmt->bindValue('id_Otzyv', $id, PDO::PARAM_INT);

    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row;
}

function getAllOtzyvyPraktikanty($db){
    $sql = "SELECT * FROM `Praktikanty`";
    $res = array();

    $stmt = $db->prepare($sql);

    $stmt->execute();

    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $res[$row['id_Praktikant']] = $row;
    }

    return $res;
}

function saveUpdateOtzyvPraktikant($db, $prak, $id) {
    $sql = "UPDATE `Otzyvy`
            SET Praktikant_Otzyv = :Praktikant_Otzyv
            WHERE id_Otzyv = :id_Otzyv;
            ";
    $stmt = $db->prepare($sql);

    $stmt->bindValue(':Praktikant_Otzyv', $prak, PDO::PARAM_INT);
    $stmt->bindValue(':id_Otzyv', $id, PDO::PARAM_INT);

    $stmt->execute();
}

function saveUpdateOtzyvText($db, $otzyv, $id) {
    $sql = "UPDATE Otzyvy
            SET Text_Otzyv = :Text_Otzyv
            WHERE id_Otzyv = :id_Otzyv;
            ";
    $stmt = $db->prepare($sql);

    $stmt->bindValue(':Text_Otzyv', $otzyv, PDO::PARAM_STR);
    $stmt->bindValue(':id_Otzyv', $id, PDO::PARAM_INT);

    $stmt->execute();
}

function addOtzyv($db, $prak, $otzyv) {
    $sql = "INSERT INTO Otzyvy(Praktikant_Otzyv, Text_Otzyv)
            VALUES(:Praktikant_Otzyv, :Text_Otzyv);
            ";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':Praktikant_Otzyv', $prak, PDO::PARAM_STR);
    $stmt->bindValue(':Text_Otzyv', $otzyv, PDO::PARAM_STR);
    $stmt->execute();
}

function deleteOtzyv($db, $id){
    $sql = "DELETE FROM Otzyvy WHERE id_Otzyv = :id_Otzyv";

    $stmt = $db->prepare($sql);
    $stmt->bindValue(":id_Otzyv", $id, PDO::PARAM_INT);

    $stmt->execute();
}