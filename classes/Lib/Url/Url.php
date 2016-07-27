<?php
namespace Lib;

use Doctrine\ORM\QueryBuilder;

class Url extends \DOMArch\Url
{
    protected $_metas;

    public function __construct(array $fields)
    {
        $this->_metas = Metas::empty();

        parent::__construct($fields);
    }

    /**
     * @return Metas
     */
    public function getMetas()
    {
        return $this->_metas;
    }

    public function setModuleName(
        string $name
    )
    {
        $this->getMetas()
            ->set('moduleName', $name);

        return $this;
    }

    public function getModuleName()
    {
        return $this->getMetas()
            ->get('moduleName');
    }

    public function setClassName(
        string $name
    )
    {
        $this->getMetas()
            ->set('className', $name);

        return $this;
    }

    public function getClassName()
    {
        return $this->getMetas()
            ->get('className');
    }
    
    public function setEntityId(
        int $id
    )
    {
        $this->getMetas()
            ->set('entityId', $id);

        return $this;
    }

    public function getEntityId()
    {
        return $this->getMetas()
            ->get('entityId');
    }

    public function setSubEntityId(
        int $id
    )
    {
        $this->getMetas()
            ->set('subEntityId', $id);

        return $this;
    }

    public function getSubEntityId()
    {
        return $this->getMetas()
            ->get('subEntityId');
    }

    public function buildQuery(
        QueryBuilder $builder
    )
    {
        $alias = $builder->getRootAliases()[0] . '.';
        
        foreach ($this->getParams()->toArray() as $name => $value) {
            if ($name[0] !== '$') {
                $name = $alias . $name;
                $builder->andWhere($builder->expr()->eq($name, $value));

                continue;
            }

            if ($name === '$limit') {
                $builder->setMaxResults($value);

                continue;
            }

            if ($name === '$offset') {
                $builder->setFirstResult($value);

                continue;
            }

            if ($name === '$order') {
                foreach ($value as $values) {
                    $values[0] = $alias . $values[0];
                    
                    $builder->orderBy(...$values);
                }

                continue;
            }

            if ($name === '$gt') {
                foreach ($value as $values) {
                    $values[0] = $alias . $values[0];

                    $builder->expr()->gt(...$values);
                }

                continue;
            }

            if ($name === '$gte') {
                foreach ($value as $values) {
                    $values[0] = $alias . $values[0];

                    $builder->expr()->gte(...$values);
                }

                continue;
            }

            if ($name === '$lt') {
                foreach ($value as $values) {
                    $values[0] = $alias . $values[0];

                    $builder->expr()->lt(...$values);
                }

                continue;
            }

            if ($name === '$lte') {
                foreach ($value as $values) {
                    $values[0] = $alias . $values[0];

                    $builder->expr()->lte(...$values);
                }

                continue;
            }

            if ($name === '$null') {
                foreach ($value as $values) {
                    $values[0] = $alias . $values[0];

                    $builder->expr()->isNull(...$values);
                }

                continue;
            }

            if ($name === '$like') {
                foreach ($value as $values) {
                    $values[0] = $alias . $values[0];

                    $builder->expr()->like(...$values);
                }

                continue;
            }

            if ($name === '$in') {
                foreach ($value as $values) {
                    $values[0] = $alias . $values[0];

                    $builder->expr()->in(...$values);
                }

                continue;
            }
        }

        return $builder;
    }
}
