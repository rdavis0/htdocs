<?php

/**
 *    Reviews Model
 */

// Insert a new review 
function saveReview($clientId, $invId, $reviewText) {
    $db = phpmotorsConnect();
    $sql = 'INSERT INTO reviews (reviewText, invId, clientId)
        VALUES (:reviewText, :invId, :clientId)';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':reviewText', $reviewText, PDO::PARAM_STR);
    $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
    $stmt->bindValue(':clientId', $clientId, PDO::PARAM_INT);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}

// Get reviews by inventory id
function getReviewsByInvId($invId) {
    $db = phpmotorsConnect();
    $sql = 'SELECT * FROM reviews WHERE invId = :invId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
    $stmt->execute();
    $reviews = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $reviews;
}

// Get reviews by client id
function getReviewsByClientId($clientId) {
    $db = phpmotorsConnect();
    $sql = 'SELECT * FROM reviews WHERE clientId = :clientId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':clientId', $clientId, PDO::PARAM_INT);
    $stmt->execute();
    $reviews = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $reviews;
}

function getReviewById($reviewId) {
    $db = phpmotorsConnect();
    $sql = 'SELECT * FROM reviews WHERE reviewId = :reviewId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':reviewId', $reviewId, PDO::PARAM_INT);
    $stmt->execute();
    $review = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $review;
}

function updateReview($reviewId) {
    $db = phpmotorsConnect();
    $sql = 'UPDATE reviews SET reviewText = :reviewText
        WHERE reviewId = :reviewId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':reviewId', $reviewId, PDO::PARAM_INT);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}

function deleteReview($reviewId) {
    $db = phpmotorsConnect();
    $sql = 'DELETE FROM reviews WHERE reviewId = :reviewId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':reviewId', $reviewId, PDO::PARAM_INT);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}
?>