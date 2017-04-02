<?php

namespace App\Models\Map;

use App\Models\Appointments;
use App\Models\AppointmentsQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'appointments' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AppointmentsTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'App.Models.Map.AppointmentsTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'appointments';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\App\\Models\\Appointments';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'App.Models.Appointments';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 6;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 6;

    /**
     * the column name for the appointment_id field
     */
    const COL_APPOINTMENT_ID = 'appointments.appointment_id';

    /**
     * the column name for the user_id field
     */
    const COL_USER_ID = 'appointments.user_id';

    /**
     * the column name for the appointment_date_time field
     */
    const COL_APPOINTMENT_DATE_TIME = 'appointments.appointment_date_time';

    /**
     * the column name for the appointment_details field
     */
    const COL_APPOINTMENT_DETAILS = 'appointments.appointment_details';

    /**
     * the column name for the created_at field
     */
    const COL_CREATED_AT = 'appointments.created_at';

    /**
     * the column name for the updated_at field
     */
    const COL_UPDATED_AT = 'appointments.updated_at';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('AppointmentId', 'UserId', 'AppointmentDateTime', 'AppointmentDetails', 'CreatedAt', 'UpdatedAt', ),
        self::TYPE_CAMELNAME     => array('appointmentId', 'userId', 'appointmentDateTime', 'appointmentDetails', 'createdAt', 'updatedAt', ),
        self::TYPE_COLNAME       => array(AppointmentsTableMap::COL_APPOINTMENT_ID, AppointmentsTableMap::COL_USER_ID, AppointmentsTableMap::COL_APPOINTMENT_DATE_TIME, AppointmentsTableMap::COL_APPOINTMENT_DETAILS, AppointmentsTableMap::COL_CREATED_AT, AppointmentsTableMap::COL_UPDATED_AT, ),
        self::TYPE_FIELDNAME     => array('appointment_id', 'user_id', 'appointment_date_time', 'appointment_details', 'created_at', 'updated_at', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('AppointmentId' => 0, 'UserId' => 1, 'AppointmentDateTime' => 2, 'AppointmentDetails' => 3, 'CreatedAt' => 4, 'UpdatedAt' => 5, ),
        self::TYPE_CAMELNAME     => array('appointmentId' => 0, 'userId' => 1, 'appointmentDateTime' => 2, 'appointmentDetails' => 3, 'createdAt' => 4, 'updatedAt' => 5, ),
        self::TYPE_COLNAME       => array(AppointmentsTableMap::COL_APPOINTMENT_ID => 0, AppointmentsTableMap::COL_USER_ID => 1, AppointmentsTableMap::COL_APPOINTMENT_DATE_TIME => 2, AppointmentsTableMap::COL_APPOINTMENT_DETAILS => 3, AppointmentsTableMap::COL_CREATED_AT => 4, AppointmentsTableMap::COL_UPDATED_AT => 5, ),
        self::TYPE_FIELDNAME     => array('appointment_id' => 0, 'user_id' => 1, 'appointment_date_time' => 2, 'appointment_details' => 3, 'created_at' => 4, 'updated_at' => 5, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('appointments');
        $this->setPhpName('Appointments');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\App\\Models\\Appointments');
        $this->setPackage('App.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('appointment_id', 'AppointmentId', 'INTEGER', true, null, null);
        $this->addForeignKey('user_id', 'UserId', 'INTEGER', 'users', 'user_id', true, null, null);
        $this->addColumn('appointment_date_time', 'AppointmentDateTime', 'VARCHAR', true, 255, null);
        $this->addColumn('appointment_details', 'AppointmentDetails', 'VARCHAR', false, 255, null);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', true, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('User', '\\App\\Models\\User', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':user_id',
    1 => ':user_id',
  ),
), null, null, null, false);
    } // buildRelations()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('AppointmentId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('AppointmentId', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('AppointmentId', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('AppointmentId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('AppointmentId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('AppointmentId', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('AppointmentId', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? AppointmentsTableMap::CLASS_DEFAULT : AppointmentsTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (Appointments object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AppointmentsTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AppointmentsTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AppointmentsTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AppointmentsTableMap::OM_CLASS;
            /** @var Appointments $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AppointmentsTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = AppointmentsTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AppointmentsTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Appointments $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AppointmentsTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(AppointmentsTableMap::COL_APPOINTMENT_ID);
            $criteria->addSelectColumn(AppointmentsTableMap::COL_USER_ID);
            $criteria->addSelectColumn(AppointmentsTableMap::COL_APPOINTMENT_DATE_TIME);
            $criteria->addSelectColumn(AppointmentsTableMap::COL_APPOINTMENT_DETAILS);
            $criteria->addSelectColumn(AppointmentsTableMap::COL_CREATED_AT);
            $criteria->addSelectColumn(AppointmentsTableMap::COL_UPDATED_AT);
        } else {
            $criteria->addSelectColumn($alias . '.appointment_id');
            $criteria->addSelectColumn($alias . '.user_id');
            $criteria->addSelectColumn($alias . '.appointment_date_time');
            $criteria->addSelectColumn($alias . '.appointment_details');
            $criteria->addSelectColumn($alias . '.created_at');
            $criteria->addSelectColumn($alias . '.updated_at');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(AppointmentsTableMap::DATABASE_NAME)->getTable(AppointmentsTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AppointmentsTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AppointmentsTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AppointmentsTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Appointments or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Appointments object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AppointmentsTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \App\Models\Appointments) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AppointmentsTableMap::DATABASE_NAME);
            $criteria->add(AppointmentsTableMap::COL_APPOINTMENT_ID, (array) $values, Criteria::IN);
        }

        $query = AppointmentsQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AppointmentsTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AppointmentsTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the appointments table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AppointmentsQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Appointments or Criteria object.
     *
     * @param mixed               $criteria Criteria or Appointments object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AppointmentsTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Appointments object
        }

        if ($criteria->containsKey(AppointmentsTableMap::COL_APPOINTMENT_ID) && $criteria->keyContainsValue(AppointmentsTableMap::COL_APPOINTMENT_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AppointmentsTableMap::COL_APPOINTMENT_ID.')');
        }


        // Set the correct dbName
        $query = AppointmentsQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AppointmentsTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AppointmentsTableMap::buildTableMap();
