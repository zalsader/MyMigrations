<?php

namespace MyMigrations;

use Migrations\Table as BaseTable;

class Table extends BaseTable
{
    /**
     * {@inheritdoc}
     */
    public function create()
    {
        if (!isset($this->options['id']) || $this->options['id'] === true) {
            $this->options['id'] = false;
            $this->options['primary_key'] = 'id';
            $this->addColumn('id', 'integer', [
                'identity' => true,
                'signed' => false
            ]);
            $lastCol = array_pop($this->columns);
            array_unshift($this->columns, $lastCol);
        }

        parent::create();
    }
}
