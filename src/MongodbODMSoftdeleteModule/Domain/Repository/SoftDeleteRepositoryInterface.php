<?php
namespace MongodbODMSoftdeleteModule\Domain\Repository;

use Doctrine\ODM\MongoDB\SoftDelete\SoftDeleteManager;
use Doctrine\ODM\MongoDB\SoftDelete\SoftDeleteable;

/**
 *
 * @author mat wright <mat@bstechnologies.com>
 *        
 */
interface SoftDeleteRepositoryInterface
{

    public function getEntityClass();

    public function setEntityClass($entityClass);

    /**
     * Soft delete a single document
     *
     * @param SoftDeleteable $entity            
     * @return SoftDeleteRepository
     */
    public function softDelete(SoftDeleteable $entity, $flush = true);

    /**
     * Restore a single softdeleted document
     *
     * @param SoftDeleteable $entity            
     * @return SoftDeleteRepository
     */
    public function softRestore(SoftDeleteable $entity, $flush = true);

    /**
     * Schedule some special criteria to delete some documents by.
     *
     * @param array $criteria
     *            The array of criteria to delete from the classes collection.
     * @param array $flags
     *            The array of flags to set on the deleted documents which distinguish this delete.
     */
    public function softDeleteBy(array $criteria, array $flags = array());

    /**
     * Schedule some special criteria to restore some documents by.
     *
     * @param array $criteria
     *            The array of criteria to restore from the classes collection.
     * @param array $flags
     *            The array of flags to limit the restored documents to.
     */
    public function softRestoreBy(array $criteria, array $flags = array());

    /**
     * Get the SoftDeleteManager instance
     *
     * @param SoftDeleteManager $sdm            
     */
    public function setSoftDeleteManager(SoftDeleteManager $sdm);

    /**
     * Set the SoftDeleteManager instance
     *
     * @return SoftDeleteManager
     */
    public function getSoftDeleteManager();
}

?>