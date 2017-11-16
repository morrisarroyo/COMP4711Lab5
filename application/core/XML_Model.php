<?php
/**
 * CSV-persisted collection.
 *
 * @author		Morris Arroyo, Gabriel Yip
 * ------------------------------------------------------------------------
 */
class XML_Model
{
    function __construct($origin = null, $keyfield = 'id', $entity = null)
    {
        /**
         * Constructor.
         * @param string $origin Filename of the CSV file
         * @param string $keyfield  Name of the primary key field
         * @param string $entity	Entity name meaningful to the persistence
         */
        parent::_construct();

        //guess at persistent name if not specified
        if ($origin == null)
            $this->_origin = get_class($this);
        else
            $this->_origin = $origin;

        // start with an empty collection
		$this->_data = array(); // an array of objects
		$this->fields = array(); // an array of strings
		// and populate the collection
		$this->load();
    }

}