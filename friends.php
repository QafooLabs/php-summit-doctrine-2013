<?php

$potentialFriend = $entityManager->getReference('User', 1234);

$currentUser = $entityManager->find('User', 1);
if ( ! $currentUser->friends->contains($potentialFriend)) {
    $currentUser->friends->add($potentialFriend);
}
