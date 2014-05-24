<?php
namespace MongodbODMSoftdeleteModule\Domain\Repository;

use Doctrine\Common\Util\Debug;
use Doctrine\ODM\MongoDB\SoftDelete\SoftDeleteable;
/**
 *
 * @author matwright
 *        
 */
trait SoftDeleteRepositoryTrait
{
    /*
     * (non-PHPdoc) @see \MongodbODMSoftdeleteModule\src\MongodbODMSoftdeleteModule\Domain\Repository\SoftDeleteRepositoryInterface::softDelete()
     */
    public function softDelete(SoftDeleteable $entity, $flush = true)
    {
        $this->sdm->delete($entity);
        if ($flush) {
            $this->sdm->flush();
        }
    }
    /*
     * (non-PHPdoc) @see \MongodbODMSoftdeleteModule\Domain\Repository\SoftDeleteRepositoryInterface::setSoftDeleteManager()
     */
    public function setSoftDeleteManager(\Doctrine\ODM\MongoDB\SoftDelete\SoftDeleteManager $sdm)
    {
        $this->sdm = $sdm;
    }
    /*
     * (non-PHPdoc) @see \MongodbODMSoftdeleteModule\Domain\Repository\SoftDeleteRepositoryInterface::softRestore()
     */
    public function softRestore(SoftDeleteable $entity, $flush = true)
    {
        $this->sdm->restore($entity);
        if ($flush) {
            $this->sdm->flush();
        }
    }
    
    /*
     * (non-PHPdoc) @see \MongodbODMSoftdeleteModule\Domain\Repository\SoftDeleteRepositoryInterface::softDeleteBy()
     */
    public function softDeleteBy(array $criteria, array $flags = array())
    {
        $this->sdm->deleteBy($this->getEntityClass(), $criteria, $flags);
        

        $this->sdm->flush();
    }
    
    /*
     * (non-PHPdoc) @see \MongodbODMSoftdeleteModule\Domain\Repository\SoftDeleteRepositoryInterface::softRestoreBy()
     */
    public function softRestoreBy(array $criteria, array $flags = array())
    {
        $this->sdm->restoreBy($this->getEntityClass(), $criteria, $flags);
        $this->sdm->flush();
    }
    
    /*
     * (non-PHPdoc) @see \MongodbODMSoftdeleteModule\Domain\Repository\SoftDeleteRepositoryInterface::getSoftDeleteManager()
     */
    public function getSoftDeleteManager()
    {
        return $this->sdm;
    }
}

?>