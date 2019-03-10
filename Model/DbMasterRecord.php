<?php
namespace Model  ;

use TStuff\Php\DBMapper\DbObject;
 

   abstract class DbMasterRecord extends DbObject {

    /**
     * Owning User
     *
     * @var int
     */
    public $ownerId;
    /**
     * Created by User
     *
     * @var int
     */
    public $createdBy;
    /**
     * Last modified by User
     *
     * @var int
     */
    public $modifiedBy;
    /**
     * create date
     *
     * @var timestamp
     * @DBMapper {"default":"CURRENT_TIMESTAMP"}
     */
    public $createdOn;
     /**
     * create date
     *
     * @var timestamp
     * @DBMapper {"default":"CURRENT_TIMESTAMP"}
     */
    public $modifiedOn;
    
     /**
     * create date
     *
     * @var bool
     * @DBMapper {"default":"1"}
     */
    public $status;

    }