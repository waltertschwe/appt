<?php

namespace App\Models\Base;

use \Exception;
use \PDO;
use App\Models\Appointments as ChildAppointments;
use App\Models\AppointmentsQuery as ChildAppointmentsQuery;
use App\Models\Map\AppointmentsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'appointments' table.
 *
 *
 *
 * @method     ChildAppointmentsQuery orderByAppointmentId($order = Criteria::ASC) Order by the appointment_id column
 * @method     ChildAppointmentsQuery orderByUserId($order = Criteria::ASC) Order by the user_id column
 * @method     ChildAppointmentsQuery orderByAppointmentDateTime($order = Criteria::ASC) Order by the appointment_date_time column
 * @method     ChildAppointmentsQuery orderByAppointmentDetails($order = Criteria::ASC) Order by the appointment_details column
 * @method     ChildAppointmentsQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildAppointmentsQuery orderByUpatedAt($order = Criteria::ASC) Order by the upated_at column
 *
 * @method     ChildAppointmentsQuery groupByAppointmentId() Group by the appointment_id column
 * @method     ChildAppointmentsQuery groupByUserId() Group by the user_id column
 * @method     ChildAppointmentsQuery groupByAppointmentDateTime() Group by the appointment_date_time column
 * @method     ChildAppointmentsQuery groupByAppointmentDetails() Group by the appointment_details column
 * @method     ChildAppointmentsQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildAppointmentsQuery groupByUpatedAt() Group by the upated_at column
 *
 * @method     ChildAppointmentsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAppointmentsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAppointmentsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAppointmentsQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAppointmentsQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAppointmentsQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAppointmentsQuery leftJoinUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the User relation
 * @method     ChildAppointmentsQuery rightJoinUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the User relation
 * @method     ChildAppointmentsQuery innerJoinUser($relationAlias = null) Adds a INNER JOIN clause to the query using the User relation
 *
 * @method     ChildAppointmentsQuery joinWithUser($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the User relation
 *
 * @method     ChildAppointmentsQuery leftJoinWithUser() Adds a LEFT JOIN clause and with to the query using the User relation
 * @method     ChildAppointmentsQuery rightJoinWithUser() Adds a RIGHT JOIN clause and with to the query using the User relation
 * @method     ChildAppointmentsQuery innerJoinWithUser() Adds a INNER JOIN clause and with to the query using the User relation
 *
 * @method     \App\Models\UserQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildAppointments findOne(ConnectionInterface $con = null) Return the first ChildAppointments matching the query
 * @method     ChildAppointments findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAppointments matching the query, or a new ChildAppointments object populated from the query conditions when no match is found
 *
 * @method     ChildAppointments findOneByAppointmentId(int $appointment_id) Return the first ChildAppointments filtered by the appointment_id column
 * @method     ChildAppointments findOneByUserId(int $user_id) Return the first ChildAppointments filtered by the user_id column
 * @method     ChildAppointments findOneByAppointmentDateTime(string $appointment_date_time) Return the first ChildAppointments filtered by the appointment_date_time column
 * @method     ChildAppointments findOneByAppointmentDetails(string $appointment_details) Return the first ChildAppointments filtered by the appointment_details column
 * @method     ChildAppointments findOneByCreatedAt(string $created_at) Return the first ChildAppointments filtered by the created_at column
 * @method     ChildAppointments findOneByUpatedAt(string $upated_at) Return the first ChildAppointments filtered by the upated_at column *

 * @method     ChildAppointments requirePk($key, ConnectionInterface $con = null) Return the ChildAppointments by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAppointments requireOne(ConnectionInterface $con = null) Return the first ChildAppointments matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAppointments requireOneByAppointmentId(int $appointment_id) Return the first ChildAppointments filtered by the appointment_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAppointments requireOneByUserId(int $user_id) Return the first ChildAppointments filtered by the user_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAppointments requireOneByAppointmentDateTime(string $appointment_date_time) Return the first ChildAppointments filtered by the appointment_date_time column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAppointments requireOneByAppointmentDetails(string $appointment_details) Return the first ChildAppointments filtered by the appointment_details column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAppointments requireOneByCreatedAt(string $created_at) Return the first ChildAppointments filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAppointments requireOneByUpatedAt(string $upated_at) Return the first ChildAppointments filtered by the upated_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAppointments[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAppointments objects based on current ModelCriteria
 * @method     ChildAppointments[]|ObjectCollection findByAppointmentId(int $appointment_id) Return ChildAppointments objects filtered by the appointment_id column
 * @method     ChildAppointments[]|ObjectCollection findByUserId(int $user_id) Return ChildAppointments objects filtered by the user_id column
 * @method     ChildAppointments[]|ObjectCollection findByAppointmentDateTime(string $appointment_date_time) Return ChildAppointments objects filtered by the appointment_date_time column
 * @method     ChildAppointments[]|ObjectCollection findByAppointmentDetails(string $appointment_details) Return ChildAppointments objects filtered by the appointment_details column
 * @method     ChildAppointments[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildAppointments objects filtered by the created_at column
 * @method     ChildAppointments[]|ObjectCollection findByUpatedAt(string $upated_at) Return ChildAppointments objects filtered by the upated_at column
 * @method     ChildAppointments[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AppointmentsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \App\Models\Base\AppointmentsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\App\\Models\\Appointments', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAppointmentsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAppointmentsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAppointmentsQuery) {
            return $criteria;
        }
        $query = new ChildAppointmentsQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildAppointments|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AppointmentsTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AppointmentsTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildAppointments A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT appointment_id, user_id, appointment_date_time, appointment_details, created_at, upated_at FROM appointments WHERE appointment_id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildAppointments $obj */
            $obj = new ChildAppointments();
            $obj->hydrate($row);
            AppointmentsTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildAppointments|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildAppointmentsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AppointmentsTableMap::COL_APPOINTMENT_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAppointmentsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AppointmentsTableMap::COL_APPOINTMENT_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the appointment_id column
     *
     * Example usage:
     * <code>
     * $query->filterByAppointmentId(1234); // WHERE appointment_id = 1234
     * $query->filterByAppointmentId(array(12, 34)); // WHERE appointment_id IN (12, 34)
     * $query->filterByAppointmentId(array('min' => 12)); // WHERE appointment_id > 12
     * </code>
     *
     * @param     mixed $appointmentId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAppointmentsQuery The current query, for fluid interface
     */
    public function filterByAppointmentId($appointmentId = null, $comparison = null)
    {
        if (is_array($appointmentId)) {
            $useMinMax = false;
            if (isset($appointmentId['min'])) {
                $this->addUsingAlias(AppointmentsTableMap::COL_APPOINTMENT_ID, $appointmentId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($appointmentId['max'])) {
                $this->addUsingAlias(AppointmentsTableMap::COL_APPOINTMENT_ID, $appointmentId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AppointmentsTableMap::COL_APPOINTMENT_ID, $appointmentId, $comparison);
    }

    /**
     * Filter the query on the user_id column
     *
     * Example usage:
     * <code>
     * $query->filterByUserId(1234); // WHERE user_id = 1234
     * $query->filterByUserId(array(12, 34)); // WHERE user_id IN (12, 34)
     * $query->filterByUserId(array('min' => 12)); // WHERE user_id > 12
     * </code>
     *
     * @see       filterByUser()
     *
     * @param     mixed $userId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAppointmentsQuery The current query, for fluid interface
     */
    public function filterByUserId($userId = null, $comparison = null)
    {
        if (is_array($userId)) {
            $useMinMax = false;
            if (isset($userId['min'])) {
                $this->addUsingAlias(AppointmentsTableMap::COL_USER_ID, $userId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($userId['max'])) {
                $this->addUsingAlias(AppointmentsTableMap::COL_USER_ID, $userId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AppointmentsTableMap::COL_USER_ID, $userId, $comparison);
    }

    /**
     * Filter the query on the appointment_date_time column
     *
     * Example usage:
     * <code>
     * $query->filterByAppointmentDateTime('fooValue');   // WHERE appointment_date_time = 'fooValue'
     * $query->filterByAppointmentDateTime('%fooValue%', Criteria::LIKE); // WHERE appointment_date_time LIKE '%fooValue%'
     * </code>
     *
     * @param     string $appointmentDateTime The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAppointmentsQuery The current query, for fluid interface
     */
    public function filterByAppointmentDateTime($appointmentDateTime = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($appointmentDateTime)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AppointmentsTableMap::COL_APPOINTMENT_DATE_TIME, $appointmentDateTime, $comparison);
    }

    /**
     * Filter the query on the appointment_details column
     *
     * Example usage:
     * <code>
     * $query->filterByAppointmentDetails('fooValue');   // WHERE appointment_details = 'fooValue'
     * $query->filterByAppointmentDetails('%fooValue%', Criteria::LIKE); // WHERE appointment_details LIKE '%fooValue%'
     * </code>
     *
     * @param     string $appointmentDetails The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAppointmentsQuery The current query, for fluid interface
     */
    public function filterByAppointmentDetails($appointmentDetails = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($appointmentDetails)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AppointmentsTableMap::COL_APPOINTMENT_DETAILS, $appointmentDetails, $comparison);
    }

    /**
     * Filter the query on the created_at column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedAt('2011-03-14'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt('now'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt(array('max' => 'yesterday')); // WHERE created_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $createdAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAppointmentsQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(AppointmentsTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(AppointmentsTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AppointmentsTableMap::COL_CREATED_AT, $createdAt, $comparison);
    }

    /**
     * Filter the query on the upated_at column
     *
     * Example usage:
     * <code>
     * $query->filterByUpatedAt('2011-03-14'); // WHERE upated_at = '2011-03-14'
     * $query->filterByUpatedAt('now'); // WHERE upated_at = '2011-03-14'
     * $query->filterByUpatedAt(array('max' => 'yesterday')); // WHERE upated_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $upatedAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAppointmentsQuery The current query, for fluid interface
     */
    public function filterByUpatedAt($upatedAt = null, $comparison = null)
    {
        if (is_array($upatedAt)) {
            $useMinMax = false;
            if (isset($upatedAt['min'])) {
                $this->addUsingAlias(AppointmentsTableMap::COL_UPATED_AT, $upatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($upatedAt['max'])) {
                $this->addUsingAlias(AppointmentsTableMap::COL_UPATED_AT, $upatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AppointmentsTableMap::COL_UPATED_AT, $upatedAt, $comparison);
    }

    /**
     * Filter the query by a related \App\Models\User object
     *
     * @param \App\Models\User|ObjectCollection $user The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildAppointmentsQuery The current query, for fluid interface
     */
    public function filterByUser($user, $comparison = null)
    {
        if ($user instanceof \App\Models\User) {
            return $this
                ->addUsingAlias(AppointmentsTableMap::COL_USER_ID, $user->getUserId(), $comparison);
        } elseif ($user instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AppointmentsTableMap::COL_USER_ID, $user->toKeyValue('PrimaryKey', 'UserId'), $comparison);
        } else {
            throw new PropelException('filterByUser() only accepts arguments of type \App\Models\User or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the User relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildAppointmentsQuery The current query, for fluid interface
     */
    public function joinUser($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('User');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'User');
        }

        return $this;
    }

    /**
     * Use the User relation User object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \App\Models\UserQuery A secondary query class using the current class as primary query
     */
    public function useUserQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinUser($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'User', '\App\Models\UserQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAppointments $appointments Object to remove from the list of results
     *
     * @return $this|ChildAppointmentsQuery The current query, for fluid interface
     */
    public function prune($appointments = null)
    {
        if ($appointments) {
            $this->addUsingAlias(AppointmentsTableMap::COL_APPOINTMENT_ID, $appointments->getAppointmentId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the appointments table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AppointmentsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AppointmentsTableMap::clearInstancePool();
            AppointmentsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AppointmentsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AppointmentsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AppointmentsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AppointmentsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AppointmentsQuery
