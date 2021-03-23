<?php


namespace App\EventListener;
use App\Entity;
use Doctrine\Persistence\Event\LifecycleEventArgs;


class SearchIndexer
{
    public function postPersist(LifecycleEventArgs $args): void
    {
        $entity = $args->getObject();

        // if this listener only applies to certain entity types,
        // add some code to check the entity type as early as possible
        if (!$entity instanceof Entity\CustomerOrders) {
            return;
        }

        $entityManager = $args->getObjectManager();
        // ... do something with the Product entity
    }
}