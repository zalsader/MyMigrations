<?php

namespace MyMigrations;

use Migrations\AbstractMigration as BaseAbstractMigration;

class AbstractMigration extends BaseAbstractMigration
{

    /**
     * {@inheritdoc}
     */
    public $autoId = true;

    /**
     * {@inheritdoc}
     *
     * @return MyMigrations\Table
     */
    public function table($tableName, $options = array())
    {
        $defaultOptions = array(
            'collation' => 'utf8mb4_unicode_ci',
        );
        $options = array_merge($defaultOptions, $options);
        if ($this->autoId === false) {
            $options['id'] = false;
        }

        return new Table($tableName, $options, $this->getAdapter());
    }
}
