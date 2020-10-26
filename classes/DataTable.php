<?php


class DataTable
{

    private $dataSet;
    private $columns;

    /**
     * DataTable constructor.
     */
    public function __construct($dataSet)
    {
        $this->dataSet = $dataSet;
    }

    public function addColumn($key, $humanReadableKey)
    {
        $this->columns[$key] = $humanReadableKey;
    }

    public function render()
    {
        echo ' <table style="width:100%">';
        echo '<tr>';
        foreach ($this->columns as $key => $value) {
            echo '<th>' . $value . '</th>';
        }
        echo '</tr>';
        foreach ($this->dataSet as $row) {
            echo ' <tr>';
            foreach ($this->columns as $key => $value) {
                echo '<td>' . $row[$key] . '</td>';
            }
            echo '</tr>';
        }

        echo '</table>';
    }
}