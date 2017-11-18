<?php
/**
 * XML-persisted collection.
 *
 * @author		Morris Arroyo, Gabriel Yip
 * ------------------------------------------------------------------------
 */
class XML_Model extends Memory_Model
{
    function __construct($origin = null, $keyfield = 'id', $entity = null)
    {
        /**
         * Constructor.
         * @param string $origin  Filename of the XML file
         * @param string $keyfield  Name of the primary key field
         * @param string $entity	Entity name meaningful to the persistence
         */
        parent::__construct();

        //guess at persistent name if not specified
        if ($origin == null)
            $this->_origin = null;
        else
            $this->_origin= $origin;

        // remember the other constructor fields
		$this->_keyfield = $keyfield;
		$this->_entity = $entity;

        // start with an empty collection
		$this->_data = array(); // an array of objects
		$this->fields = array(); // an array of strings
		// and populate the collection
		$this->load();
    }


	/**
	 * Load the collection state appropriately, depending on persistence choice.
	 * OVER-RIDE THIS METHOD in persistence choice implementations
	 */
	protected function load()
	{
		//---------------------
		if ($this->_origin == null) {
		    return;
        }
        $this->xml = simplexml_load_file($this->_origin);
        foreach ($this->xml->task->children() as $key => $property) {
            $this->_fields[] = (string)$key;
        }
        // extract tasks
        foreach ($this->xml->task as $task) {
            $this->createTask($task);
        }
        $this->reindex();
	}

	/*
	 * Load the collection state appropriately
	 */
	private function createTask($element) {
	    $record = new stdClass();
	    $record->id         = (int) $element->id;
	    $record->task       = (string) $element->task;
	    $record->priority   = (int) $element->priority;
	    $record->size       = (int) $element->size;
	    $record->group      = (int) $element->group;
	    $record->deadline   = (!empty($element->deadline)) ? (int) $element->deadline : null;
	    $record->status     = (!empty($element->status)) ? (int) $element->status : null;
	    $record->flag       = (!empty($element->flag)) ? (int) $element->flag : null;
	    $key = $record->{$this->_keyfield};
	    $this->_data[$key] = $record;
    }
	
	protected function store()
	{
		$tasks = new SimpleXMLElement("<?xml version=\"1.0\" encoding=\"utf-8\"?><tasks></tasks>");
		foreach($this->_data as &$v) {
			$task = $tasks->addChild("task");
			foreach($v as $key => $value) {
				$task->addChild($key,  htmlspecialchars($value));
			}
		}

		$tasks->asXML($this->_origin);
	}
}